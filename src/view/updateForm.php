<?php
    $name = $_POST['updateName'];
    $amount = $_POST['updateAmount'];
    $price = $_POST['updatePrice'];
    $user_id = $_POST['updateUser_id'];

    echo("
        <h1 style='margin:50px;'>Update Product</h1>
        <form action='productOperation.php' method='POST' style='margin-left: 50px'>
            <input type='text' name='updateName' placeholder='product name' value='{$name}' style='display: block; margin: 20px; padding: 10px; border-radius: 8px; border: 1px solid black' >
            <input type='text' name='updateAmount' placeholder='product amount' value='{$amount}' style='display: block; margin: 20px; padding: 10px; border-radius: 8px; border: 1px solid black'>
            <input type='text' name='updatePrice' placeholder='product price'value='{$price}' style='display: block; margin: 20px; padding: 10px; border-radius: 8px; border: 1px solid black'>
            <input type='text' name='updateUser_id' placeholder='user id' value='{$user_id}' style='display: block; margin: 20px; padding: 10px; border-radius: 8px; border: 1px solid black'>
            <button type='submit'>Update</button>
        </form>
    ");

?>