<?php

class AdminController extends Controller
{
    public function actionIndex()
    {
        $modleAdmin = $this->model->init("AdminModel");

        if($modleAdmin->isAdmin()) {
            $result = $modleAdmin->getListProduct();
            require_once ROOT . "/application/views/admin/index.php";
            return;
        }
        die("<h1>access denied</h1>");
    }

    public function ActionAuth ()
    {
        $modleAdmin = $this->model->init("AdminModel");

        if(!$modleAdmin->CheckAuthAdmin()) {
            $result = $modleAdmin->AuthAction();
            require_once ROOT . "/application/views/admin/auth.php";
            return;
        }
        header("Location: /admin/");
    }

    public function ActionAdd()
    {
        $modleAdmin = $this->model->init("AdminModel");
        if($modleAdmin->CheckAuthAdmin()) {
            if(isset($_POST['SUBMIT'])){
                $errors = array();
                $arDescError = array(
                    "NAME" => "Имя",
                    "SIZE" => "Размер",
                    "PRICE" => "Цена"
                );

                $data = array(
                    'NAME'      => $_POST["NAME"],
                    'SIZE'      => isset($_POST["SIZE"]) ? $_POST["SIZE"] : false,
                    'PRICE'     => $_POST["PRICE"],
                    'SEX'       => $_POST["SEX"],
                    'AVL'       => $_POST["AVL"],
                    'IN_SLIDE'  => isset($_POST["IN_SLIDE"]) ? $_POST["IN_SLIDE"] : false
                );

                foreach ($arDescError as $key => $item) {
                    if(isset($data[$key]) && empty($data[$key])) {
                        $errors[] = "Поле $item не заполнено";
                    }
                }

                if(empty($errors)) {
                    $id = $modleAdmin->addProductAction($data);
                    if($id) {
                        if (is_uploaded_file($_FILES["IMAGE"]["tmp_name"])) {
                             move_uploaded_file($_FILES["IMAGE"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/cross/cross_{$id}.jpg");
                        }
                    }
                    header("Location: /admin/");
                }
            }

            require_once ROOT . "/application/views/admin/addProduct.php";
            return;
        }
        header("Location: /auth/");
    }

    public function ActionEdit($id)
    {
        $modleAdmin = $this->model->init("AdminModel");
        
        if($modleAdmin->CheckAuthAdmin()) {
            $id = intval($id);
            if(isset($_POST['SUBMIT'])){
                $errors = array();
                $arDescError = array(
                    "NAME" => "Имя",
                    "SIZE" => "Размер",
                    "PRICE" => "Цена"
                );

                $data = array(
                    'NAME'      => $_POST["NAME"],
                    'SIZE'      => isset($_POST["SIZE"]) ? $_POST["SIZE"] : false,
                    'PRICE'     => $_POST["PRICE"],
                    'SEX'       => $_POST["SEX"],
                    'AVL'       => $_POST["AVL"],
                    'IN_SLIDE'  => isset($_POST["IN_SLIDE"]) ? $_POST["IN_SLIDE"] : false
                );

                foreach ($arDescError as $key => $item) {
                    if(isset($data[$key]) && empty($data[$key])) {
                        $errors[] = "Поле $item не заполнено";
                    }
                }

                if(empty($errors)) {
                    $res = $modleAdmin->editProductAction($id, $data);
                    // if($id) {
                    //     if (is_uploaded_file($_FILES["IMAGE"]["tmp_name"])) {
                    //          move_uploaded_file($_FILES["IMAGE"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/cross/cross_{$id}.jpg");
                    //     }
                    // }
                    if($res) {
                        header("Location: /admin/");
                    }
                    die('Ошибка добавления');
                }
            }

            $result = $modleAdmin->getProductById($id);
     
            $arSize = array(36,37,38,39,40,41,42,43,44,45,46);
            $arSex = array("Мужской", "Женский", "Унисекс");
            require_once ROOT . "/application/views/admin/editProduct.php";
            return;

        }
        header("Location: /auth/");
        
       
    }
}