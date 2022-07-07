<?php
    require '../../vendor/autoload.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <?php
        function getAllProducts(){
            $pdo = new PDO('mysql:host=localhost;dbname=phptest', 'root', '');
            $fluent = new \Envms\FluentPDO\Query($pdo);
            $query = $fluent->from('products')->where('id', 1)->fetch();
            print_r($query);
            return $query;
        }
        function getProductById($product_id){
            $pdo = new PDO("mysql:dbname=phptest", "root", "");
            $query = $pdo->query("SELECT * FROM products WHERE id = $product_id");
            return $query;
        }
        function addNewProduct($product_id, $name, $amount, $price, $user_id){
            $product_id = intval($product_id);
            $name = strval($name);
            $amount = intval($amount);
            $price = floatval($price);
            $user_id = intval($user_id);
            $pdo = new PDO("mysql:dbname=phptest", "root", "");
            $query = $pdo->query("INSERT INTO products (id, name, amount, price, user_id) VALUES ('$product_id', '$name', '$amount', '$price')");
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
        function deleteProduct($product_id){
            $product_id = intval($product_id);
            $pdo = new PDO("mysql:dbname=phptest", "root", "");
            $pdo->prepare("DELETE FROM products WHERE id=?")->execute([$product_id]);
        }
    ?>
    <style>
        th, td{
            padding: 20px;
            border: 1px solid black;
            border-collapse: collapse;
        }

        table{
            border: 1px solid black;
            border-collapse: collapse;
        }
        input{
            padding: 10px;
            border: 1px solid black;
            border-radius: 10px;
            margin: 5px;
            width: 100px;
        }
        button{
            padding: 10px;
            border: 1px solid black;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <div style="display: flex; margin: 10px">
       <div style="margin: 10px;">
         <table>
             <tr>
                 <th>ID</th>
                 <th>Title</th>
                 <th>Amount</th>
                 <th>Price</th>
             </tr>
             <?php
                 $allProduct = getAllProducts();
                 foreach($allProduct as $product){
                     echo("
                         <tr>
                             <td>{$product['id']}</td>
                             <td>{$product['name']}</td>
                             <td>{$product['amount']}</td>
                             <td>{$product['price']}</td>
                         </tr>
                     ");
                }
             ?>
         </table>
       </div>
       <div style="margin: 10px;">
            <h1>Product</h1>
            <form action="index.php" method="post">
                <input type="text" name="product_id" id="product_id" placeholder="product id">
                <input type="text" name="name" id="name" placeholder="product name">
                <input type="text" name="amount" id="amount" placeholder="product amount">
                <input type="text" name="price" id="price" placeholder="product price">
                <input type="text" name="user_id" id="user_id" placeholder="user_id">
                <button type="submit">ADD NEW</button>
            </form>
       </div>
       <?php
            if (isset($_POST['product_id'])){
                $newProduct = addNewProduct($_POST['product_id'], $_POST['name'], $_POST['amount'], $_POST['price'], $_POST['user_id']);
                print_r($newProduct);
            }
       ?>
    </div>

    
</body>
</html>