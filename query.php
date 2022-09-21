<?php
    require('config.php');
    require('main.php');
	$cProducts = new CProducts($HOST, $LOGIN, $PASSWORD, $DB_NAME);

    $method = $_GET['method'];
    switch ($method){
        case 'hideProduct':
            $id = $_GET['id'];
            if (!empty($id))
                $cProducts->HideProduct($id);
            break;
            
        case 'changeQuantity':
            $dif = $_GET['dif'];
            $id = $_GET['id'];
            if (!empty($dif))
                $cProducts->ChangeQuantity($id, $dif);
            break;
    }