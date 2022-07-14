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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
                                <form action='productOperation.php.php' method='POST'>
                                    <input type='text' name='deleteId'  placeholder='product name' value='{$product['id']}' style='display:none;'>
                                    <button type='submit'>Delete</button>
                                </form>
                                <form action='updateForm.php' method='POST'>
                                    <input type='text' name='updateId'  placeholder='product_id' value='{$product['id']}' style='display:none;'>
                                    <input type='text' name='updateName'  placeholder='product name' value='{$product['name']}' style='display:none;'>
                                    <input type='text' name='updateAmount'  placeholder='product amount' value='{$product['amount']}' style='display:none;'>
                                    <input type='text' name='updatePrice'  placeholder='product price' value='{$product['price']}' style='display:none;'>
                                    <input type='text' name='updateUser_id'  placeholder='user id' value='{$product['user_id']}' style='display:none;'>
                                    <button type='submit'>Update</button>
                                </form>
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
    $(".btnDelete").click(function() {
    // alert(this.id); // or alert($(this).attr('id'));
    $.ajax({
    type: "POST",
    url: "submitForm.php",
    data: { 'action': this.id }
  }).done(function( msg ) {
    alert( "Data Saved: " + msg );
  });
});
</script>
</html>