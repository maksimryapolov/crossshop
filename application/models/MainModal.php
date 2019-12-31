<?php

class MainModal extends Model
{
    public function getListProduct ()
    {
        $result = array();
        $errors = array();
        $pdo = Db::connect();
        $stmt = $pdo->query("SELECT * FROM product");

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            if(!is_array($row["size"])) {
                $row["size"] = $this->sizeProcessing($row["size"]);
            }
            $row["show_price"] = $this->formatePrice($row["price"]);
            $result[] = $row;
        }

        if(!empty($result)) {
            return $result;
        }
    }

    public function getSlideProduct ()
    {
        $pdo = Db::connect();
        $stmt = $pdo->query("SELECT id_product, name FROM product WHERE in_slide=true");

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            $result[] = $row;
        }

        if(!empty($result)) {
            return $result;
        }
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

}