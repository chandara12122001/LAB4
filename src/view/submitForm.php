<?php
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
    function updateProduct($product_id, $name, $amount, $price, $user_id){
        $product_id = intval($product_id);
        $name = strval($name);
        $amount = intval($amount);
        $price = floatval($price);
        $user_id = intval($user_id);
        $pdo = new PDO("mysql:dbname=phptest", "root", "");
        $sql = "UPDATE products SET name=?, amount=?, price=?, user_id=? WHERE id=?";
        $pdo->prepare($sql)->execute([$name, $amount, $price, $user_id, $product_id]);
    }
    if (isset($_POST['name'])){
        addNewProduct($_POST['name'], $_POST['amount'], $_POST['price'], $_POST['user_id']);
    }
?>