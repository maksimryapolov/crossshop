<?
class Route
{
    private $controller = "";
    private $action = "";
    private $id = null;

    public function start()
    {
        $this->initRouts();

        // подцепляем файл с классом контроллера
        $controller_file = ucfirst($this->controller).'.php';
        $controller_path = ROOT . "/application/controllers/".$controller_file;
        
        if(file_exists($controller_path))
        {
            include $controller_path;
        }
        else
        {
            /*
            правильно было бы кинуть здесь исключение,
            но для упрощения сразу сделаем редирект на страницу 404
            */
            self::ErrorPage404();
        }

        // создаем контроллер
        $controller = new $this->controller;
        $action = $this->action;

        if(method_exists($controller, $action))
        {
            // вызываем действие контроллера
            $controller->$action($this->id);
        }
        else
        {
            // здесь также разумнее было бы кинуть исключение
            self::ErrorPage404();
        }

    }

    static function ErrorPage404()
    {
        echo "ErrorPage";
        die;
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:'.$host.'404');
    }

    private function initRouts()
    {
        $path_routs = ROOT . "/application/config/routs.php";
        $url_path = $_SERVER["REQUEST_URI"] == "/" ? "index" : trim($_SERVER["REQUEST_URI"], "/");
        $url_methods = require_once $path_routs;
        
        foreach($url_methods as $key => $path)
        {

            if (preg_match("~$key~", $url_path)) {

                $segments = preg_replace("~$key~", $path, $url_path);
                
                $arSegments = explode("/", $segments);

                $this->controller = ucfirst(array_shift($arSegments)) . "Controller";
                
                $this->action = "Action" . ucfirst(array_shift($arSegments));

                $this->id = array_shift($arSegments);

            }

        }
        
    }
}