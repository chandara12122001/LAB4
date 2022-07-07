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
            $query = $fluent->from('products');
            return $query;
        }
        function getProductById($product_id){
            $pdo = new PDO('mysql:host=localhost;dbname=phptest', 'root', '');
            $fluent = new \Envms\FluentPDO\Query($pdo);
            $query = $fluent->from('products')->where('id', 1);
            return $query;
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
            margin: 5px;
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
                 <th>Actiion</th>
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
                             <td>
                                <button id='{$product['id']}'>Edit</button>
                            </td>
                        </tr>
                    ");
                        
                }
             ?>
         </table>
       </div>
       <div style="margin: 10px;">
            <h1>Product</h1>
            <form action="submitForm.php" method="POST">
                <input type="text" name="name" id="name" placeholder="product name">
                <input type="text" name="amount" id="amount" placeholder="product amount">
                <input type="text" name="price" id="price" placeholder="product price">
                <input type="text" name="user_id" id="user_id" placeholder="user_id">
                <button type="submit">ADD NEW</button>
            </form>
       </div>
    </div>

    
</body>
<script>
    
</script>
</html>