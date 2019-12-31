<?php

class AdminController extends Controller
{
    public function actionIndex()
    {
        $modlaAdmin = $this->model->init("AdminModal");
        $modlaAdmin->isAdmin();
    }
}