<?php

class AdminController extends Controller
{
    public function actionIndex()
    {
        $modleAdmin = $this->model->init("AdminModel");

        if($modleAdmin->isAdmin()) {
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
}