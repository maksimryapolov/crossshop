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

}