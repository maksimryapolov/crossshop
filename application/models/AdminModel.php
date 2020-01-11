<?php 

class AdminModel
{
    public function isAdmin()
    {
        $user_id = $this->CheckAuthAdmin();
        if($user_id) {
            $db = new Db();
            $pdo = $db->connect();
            $state = $pdo->prepare("SELECT ROLE FROM users WHERE ID=:id");
            $state->bindParam(":id", $user_id);
            $state->execute();

            if($state->fetch()["ROLE"] == "admin") {
                return $user_id;
            }
        }

        header('Location: /auth/');
    }

    public function CheckAuthAdmin()
    {
        if(isset($_SESSION["ID_USER"])) {
            return $_SESSION["ID_USER"];
        }
        return false;
    }

    public function getListProduct ()
    {
        $result = array();
        $errors = array();
        $pdo = Db::connect();
        $stmt = $pdo->query("SELECT * FROM product");

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            $result[] = $row;
        }

        if(!empty($result)) {
            return $result;
        }
    }

    public function AuthAction()
    {
        if(isset($_POST['submit'])) {
            $login = trim($_POST["login"]);
            $password = trim($_POST["password"]);
            $password = empty($password) ? '' : md5($password);

            $errors = array();

            if(empty($login))
                $errors[] = "Введите логин";

            if(empty($password))
                $errors[] = "Введите пароль";

            if(empty($errors)) {
                $db = new Db;
                $pdo = $db->connect();

                $stat = $pdo->prepare("SELECT ID FROM users WHERE LOGIN=:login AND PASSWORD=:password");
                $stat->bindParam("login", $login);
                $stat->bindParam("password", $password);
                $stat->execute();
                $data = $stat->fetch();

                if($data && $data["ID"] >= 1) {
                    $_SESSION["ID_USER"] = $data["ID"];
                    header('Location: /admin/');

                } else {
                    $errors[] = "Неверный логин или пароль";
                }

            }
            return $errors;
        }
    }

    public function addProductAction($data)
    {
        $db = new Db;
        $pdo = $db->connect();

        $size = implode(",", $data["SIZE"]);
        $in_slide = $data["IN_SLIDE"] == "on" ? 1 : 0;

        $stat = $pdo->prepare("INSERT INTO product (name, size, price, sex, avl, in_slide) VALUES (:name, :size, :price, :sex, :avl, :in_slide)");
        $stat->bindParam("name", $data["NAME"]);
        $stat->bindParam("size", $size);
        $stat->bindParam("price", intval($data["PRICE"]));
        $stat->bindParam("sex", $data["SEX"]);
        $stat->bindParam("avl", $data["AVL"]);
        $stat->bindParam("in_slide", $in_slide);
        if($stat->execute()) {
            return $pdo->lastInsertId();
        }

        return 0;
    }

    public function editProductAction($id, $data) 
    {
        $this->saveImage($id);
        $db = new Db();
        $pdo = $db->connect();
        $size = implode(",", $data["SIZE"]);
        $in_slide = $data["IN_SLIDE"] == "on" ? 1 : 0;

        $stat = $pdo->prepare("UPDATE product SET 
                                                name=:name, 
                                                size=:size, 
                                                price=:price, 
                                                sex=:sex, 
                                                avl=:avl, 
                                                in_slide=:in_slide 
                                            WHERE 
                                                id_product=:id"
                                            );
        $stat->bindParam("id", $id);
        $stat->bindParam("name", $data["NAME"]);
        $stat->bindParam("size", $size);
        $stat->bindParam("price", intval($data["PRICE"]));
        $stat->bindParam("sex", $data["SEX"]);
        $stat->bindParam("avl", $data["AVL"]);
        $stat->bindParam("in_slide", $in_slide);
        if($stat->execute()) {
            return true;
        }
        return false;
    }

    public function getProductById($id)
    {
        if(is_int($id)) {
            $db = new Db();
            $pdo = $db->connect();

            $stat = $pdo->prepare("SELECT * FROM product WHERE id_product=:id");
            $stat->bindParam("id", $id, PDO::PARAM_INT);
            $stat->execute();
            $result = $stat->fetch();
            $result['size'] = $this->transformStringToArray($result['size']);
            $result['image'] = $this->productGetImage($result['id_product']);

            return $result;

        }
    }

    public function deleteProduct($id)
    {
        if(is_int($id)) {
            $db = new Db();
            $pdo = $db->connect();

            $stat = $pdo->prepare("DELETE FROM product WHERE id_product=:id");
            $stat->bindParam("id", $id, PDO::PARAM_INT);
            return $stat->execute();
        }
    }

    private function transformStringToArray($var)
    {
        if(is_string($var)) {
            return explode(",", $var);
        }
        return $var;
        
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

    public function saveImage($id)
    {
        if($id) {
            if (is_uploaded_file($_FILES["IMAGE"]["tmp_name"])) {
                move_uploaded_file($_FILES["IMAGE"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/cross/cross_{$id}.jpg");
            }
        }
    }
}