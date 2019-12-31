<?php
class View
{
    public $page_template;

    // Устанавливать шаболн при создании объекта
    function __construct($page_template = "main_template")
    {
        $this->page_template = $page_template;
    }

    public function generate($page_content, $data = null)
    {
        include "application/views/templates/" . $this->page_template . ".php";
    }
}
