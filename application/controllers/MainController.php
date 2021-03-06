<?php

use Components\pagination\Pagination;

class MainController extends Controller
{
    const DEFAULT_START_PAGIN = 1;

    public function actionIndex()
    {
        $modleProduct = $this->model->init("MainModel");
        $page = (isset($_REQUEST['AJAX']) && isset($_REQUEST["VALUE"])) ? intval($_REQUEST["VALUE"]) : self::DEFAULT_START_PAGIN;

        $result = $modleProduct->getListProduct($page);
        $slides = $modleProduct->getSlideProduct();
        $page++;
        require_once ROOT . "/application/views/index/index.php";
    }

    public function ActionOrder()
    {
        if(isset($_POST['ajax']) && $_POST['ajax'] == "Y") {
            $data = array(
                "ID" => isset($_POST['id_product']) ? intval($_POST['id_product']) : 0,
                "USER" => isset($_POST['user']) ? $_POST['user'] : "Без имени",
                "PHONE" => $_POST['phone'],
                "SIZE" => isset($_POST["size"]) ? $_POST['size'] : "Нет",
                "QUESTION" => isset($_POST["question"]) ? $_POST['user'] : "Нет",
                "NAME_PRODUCT" => isset($_POST["product"]) ? $_POST["product"] : "Нет"
            );
            $modleProduct = $this->model->init("MainModel");
            $result = $modleProduct->saveOrder($data);
            if($result) {
                $success = $modleProduct->sendMail($data);
            }
           echo json_encode($success);
           return;
        }
        die("ErrorPage");
    }
}