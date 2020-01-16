<?php

return array(

    "auth" => "admin/auth",
    "admin" => "admin/index",
    "admin/product/add" => "admin/add",
    "admin/edit/([0-9]+)" => "admin/edit/$1",
    "admin/delete/([0-9]+)" => "admin/delete/$1",

    "callback" => "main/order",

    "index" => "main/index",
);