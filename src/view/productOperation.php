<?php

use Envms\FluentPDO\Query;

    require '../../vendor/autoload.php';
    function addNewProduct($name, $amount, $price, $user_id){
        // $product_id = intval($product_id);
        // $name = strval($name);
        // $amount = intval($amount);
        // $price = floatval($price);
        // $user_id = intval($user_id);
        $value = array(
            'name'=>$name,
            'amount'=>$amount,
            'price'=>$price,
            'user_id'=>$user_id
        );
        $pdo = new PDO('mysql:host=localhost;dbname=phptest', 'root', '');
        $fluent = new \Envms\FluentPDO\Query($pdo);
        $query = $fluent->insertInto('products')->values($value)->execute();  
        header("Location: index.php");  
        return $query;
    }
    function deleteProduct($product_id){
        $product_id = intval($product_id);
        $pdo = new PDO('mysql:host=localhost;dbname=phptest', 'root', '');
        $fluent = new \Envms\FluentPDO\Query($pdo);
        $query = $fluent->deleteFrom('products', $product_id)->execute();
        header("Location: index.php");  
        return $query;
       
    }
    function updateProduct($product_id, $name, $amount, $price, $user_id){
        $value = array(
            'name'=>$name,
            'amount'=>$amount,
            'price'=>$price,
            'user_id'=>$user_id
        );
        $pdo = new PDO('mysql:host=localhost;dbname=phptest', 'root', '');
        $fluent = new \Envms\FluentPDO\Query($pdo);
        $query = $fluent->update('products')->set($value)->where('id', $product_id)->execute();  
        header("Location: index.php");  
        return $query;
    }
    if(isset($_POST['updateId'])){
        updateProduct($_POST['updateId'], $_POST['updateName'], $_POST['updateAmount'], $_POST['updatePrice'], $_POST['updateUser_id']);
    }
    if (isset($_POST['name'])){
        addNewProduct($_POST['name'], $_POST['amount'], $_POST['price'], $_POST['user_id']);
    }
    if(isset($_POST['deleteId'])){
        deleteProduct($_POST['deleteId']);
    }
?>