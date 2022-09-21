<?php
    //What a clown I am 🤡
    class CProducts{
        private $connect = "";
        public function __construct(string $host, string $login, string $password, string $DBName){
            $this->connect = mysqli_connect($host, $login, $password, $DBName);
        }
        function GetProducts(Int $limit = 10){
            $stmt = $this->connect->prepare("SELECT * FROM `Products` WHERE `IS_FUCKING_HIDDEN` = ? ORDER BY `DATE_CREATE` DESC LIMIT ?");
            $isHidden = 0;
            $stmt->bind_param("ii", $isHidden, $limit);
            $stmt->execute();
            $result = $stmt->get_result();
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $rows;
        }
        function HideProduct(Int $productId){
            $stmt = $this->connect->prepare("UPDATE `Products` SET `IS_FUCKING_HIDDEN` = ? WHERE `Products`.`ID` = ?;");
            $isHidden = 1;
            $stmt->bind_param("ii", $isHidden, $productId);
            $stmt->execute();
        }
        function ChangeQuantity(Int $productId, Int $dif){
            $stmt = $this->connect->prepare("SELECT `PRODUCT_QUANTITY` FROM `Products` WHERE `ID` = ?");
            $stmt->bind_param("i", $productId);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = mysqli_fetch_assoc($result);
            $newDif = $row['PRODUCT_QUANTITY'] + $dif;

            $stmt = $this->connect->prepare("UPDATE `Products` SET `PRODUCT_QUANTITY` = ? WHERE `Products`.`ID` = ?;");
            $stmt->bind_param("ii", $newDif, $productId);
            $stmt->execute();
            echo $newDif;
        }
    }