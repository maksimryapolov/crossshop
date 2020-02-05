<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


class MainModel extends Model
{

    const SHOW_COUNTER = 3;
    protected $page;

    public function getListProduct ($page)
    {
        $result = array();
        $errors = array();
        $this->page = $page;

        $pdo = Db::connect();
        $limit = self::SHOW_COUNTER;
        $offset = ($page - 1) * self::SHOW_COUNTER;

        $stmt = $pdo->prepare("SELECT * FROM product LIMIT :count OFFSET :offset");

        $stmt->bindParam('count', $limit, PDO::PARAM_INT);
        $stmt->bindParam('offset', $offset, PDO::PARAM_INT);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            if(!is_array($row["size"])) {
                $row["size"] = $this->sizeProcessing($row["size"]);
            }
            $row["show_price"] = $this->formatePrice($row["price"]);
            $row["image"] = $this->productGetImage($row["id_product"]);
            $result[] = $row;
        }

        if(isset($_REQUEST['AJAX']) && $_REQUEST['AJAX'] === 'Y') {
            $this->page++;
            $this->toJson($result, $page);
        }

        if(!empty($result)) {
            return $result;
        }
    }

    private function toJson($param, $page)
    {
        $response = false;

        if (!empty($param)) {
            $response['page'] = $this->checkLastID($param) ? false : $this->page;
            $response['items'] = $param;
        }

        echo json_encode($response);
        die;
    }

    private function checkLastID ($arParm)
    {
        $lastID = $this->getLastId();

        foreach ($arParm as $arElem) {
            if($arElem['id_product'] == $lastID) {
                return true;
            }
        }
        return false;
    }


    public function getSlideProduct ()
    {
        $pdo = Db::connect();
        $stmt = $pdo->query("SELECT id_product FROM product WHERE in_slide=true");

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            $row = $this->productGetImage($row["id_product"]);
            $result[] = $row;
        }

        if(!empty($result)) {
            return $result;
        }
    }

    private function getLastId()
    {
        $pdo = Db::connect();
        $stmt = $pdo->query('SELECT MAX(id_product) FROM product');
        $res = $stmt->fetch();
        return intval($res["MAX(id_product)"]);
    }


    private function sizeProcessing ($size)
    {
        return explode(",", $size);
    }

    private function formatePrice ($price)
    {
        if (!empty($price)) {
            return intval($price) . " ₽";
        }

    }

    private function productGetImage($id) 
    {
        $id = intval($id);
        $path = ROOT . "/upload/cross/cross_${id}.jpg";
        if(file_exists($path)) {
            return "/upload/cross/cross_${id}.jpg";
        }
        return "/upload/cross/no-image.jpg";
    }

    public function saveOrder($option)
    {
        $db = new Db;
        $pdo = $db->connect();

        $stat = $pdo->prepare("INSERT INTO orders (phone, user, id_product, question, size) VALUES (:phone, :user, :id_product, :question, :size)");
        $stat->bindParam("phone", $option["PHONE"]);
        $stat->bindParam("user", $option["USER"]);
        $stat->bindParam("id_product", $option["ID"]);
        $stat->bindParam("question", $option["QUESTION"]);
        $stat->bindParam("size", $option["SIZE"]);

        return $stat->execute();
    }

    public function sendMail($data = array())
    {
        $mail = new PHPMailer(true);
        $response = array();
        $smtp_param = require_once ROOT . "/application/config/smtp-param.php";

        try {
            $mail->CharSet = 'UTF-8';
        
            // Настройки SMTP
            $mail->isSMTP();
            $mail->SMTPAuth = true;
            $mail->SMTPDebug = 0;
            
            $mail->Host = $smtp_param["host"];
            $mail->SMTPAuth = true; 
            $mail->Port = 465;
            $mail->Username = $smtp_param["auth_name"];
            $mail->Password = $smtp_param["auth_password"];
            
            // От кого
            $mail->setFrom($smtp_param["from_mail"],  $smtp_param["from_site"]);		
            
            // Кому
            $mail->addAddress($smtp_param["to_mail"]);
            $mail->isHTML(true);

            // Тело письма
            $body = $this->templateMail($data);;
            $mail->msgHTML($body);
            
            // $mail->send();
            $response["success"] = true;
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            $response["success"] = false;
        }
        return $response;
    }
    private function templateMail($option)
    {
        
        $hooks = array(
            "#NUMBER#" => $option["PHONE"],
            "#NAME_PRODUCT#" => $option["NAME_PRODUCT"],
            "#ID_PRODUCT#" => $option["ID"],
            "#USER#" => $option["USER"],
            "#QUESTION#" => $option["QUESTION"],
            "#SIZE#" => $option["SIZE"]
        );

        $tpl = file_get_contents(ROOT . "/application/views/mail/template.html");
        $str = "";

        foreach ($hooks as $key => $hook) {
            if (!empty($str)) {
                $str = str_replace($key, $hook, $str); 
            } else {
                $str = str_replace($key, $hook, $tpl); 
            }
            
        }
        return $str;
    }
}