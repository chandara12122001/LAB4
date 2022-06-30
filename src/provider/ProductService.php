<?php   
class ProductService {
    function getAllProducts($fluent){
        $quary = $fluent->from('products')->fetch();
        $fluent->close();
        return $quary;
    }
    function getProductById($fluent, $id){
        $quary = $fluent->from('products', $id)->fetch();
        $fluent->close();
        return $quary;
    }
    function addProduct($id, $name, $price, $amount, $user_id, $fluent){
        $value = array(
            'id'=>$id,
            'name'=>$name,
            'price'=>$price,
            'amount'=>$amount,
            'user_id'=>$user_id
        );
        $quary = $fluent->insertInto('products', $value)->execute();
        $fluent->close();
        return $quary;
    }
    function updateProduct($id, $name, $price, $amount, $user_id, $fluent){
        $value = array(
            'id'=>$id,
            'name'=>$name,
            'price'=>$price,
            'amount'=>$amount,
            'user_id'=>$user_id
        );
        $quary = $fluent->update('products', $value, $id)->execute();
        $fluent->close();
        return $quary;
    }
    function deleteProduct($id, $fluent){
        $quary = $fluent->deleteFrom('products', $id)->excecute();
        $fluent->close();
        return $quary;
    }

}