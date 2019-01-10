<?php
// initialize shopping cart class
include 'cart.php';
$cart = new Cart;

// include database configuration file
include 'db/dbconnect.php';
//$result = @mysqli_query($connect, $query);


if(isset($_REQUEST['action']) && !empty($_REQUEST['action'])){
    if($_REQUEST['action'] == 'addToCart' && !empty($_REQUEST['id'])){
        $productID = $_REQUEST['id'];

        // get product details
        $query = "SELECT * FROM TBMENU WHERE id = '$productID'";
        $result = mysqli_query($connect, $query);
        $row = mysqli_fetch_assoc($result);

        $itemData = array(
            'id' => $row['id'],
            'name' => $row['dname'],
            'price' => $row['dprice'],
            'qty' => 1
        );
        $insertItem = $cart->insert($itemData);
        $redirectLoc = $insertItem?'front_viewCart.php':'index.php';
        header("Location: ".$redirectLoc);




    }elseif($_REQUEST['action'] == 'updateCartItem' && !empty($_REQUEST['id'])){
        if($_REQUEST['qty']<0 || $_REQUEST['qty'] != (int)$_REQUEST['qty']){
//not intger
echo 'error';

}else{
        $itemData = array(
            'rowid' => $_REQUEST['id'],
            'qty' => $_REQUEST['qty']
        );
        $updateItem = $cart->update($itemData);
        echo $updateItem?'ok':'err';die;
    }

    }elseif($_REQUEST['action'] == 'removeCartItem' && !empty($_REQUEST['id'])){
        $deleteItem = $cart->remove($_REQUEST['id']);
        header("Location: front_viewCart.php");

    
    }elseif($_REQUEST['action'] == 'placeOrder' && $cart->total_items() > 0 && !empty($_SESSION['userid'])){
        // insert order details into database
        $insertOrder = $db->query("INSERT INTO orders (customer_id, total_price, created, modified) VALUES ('".$_SESSION['userid']."', '".$cart->total()."', '".date("Y-m-d H:i:s")."', '".date("Y-m-d H:i:s")."')");
        
        if($insertOrder){
            $orderID = $db->insert_id;
            $sql = '';
            // get cart items
            $cartItems = $cart->contents();
            foreach($cartItems as $item){
                $sql .= "INSERT INTO order_items (order_id, product_id, quantity) VALUES ('".$orderID."', '".$item['id']."', '".$item['qty']."');";
            }
            // insert order items into database
            $insertOrderItems = $db->multi_query($sql);
            
            
            if($insertOrderItems){
                $cart->destroy();
                header("Location: orderSuccess.php?id=$orderID");
            }else{
                header("Location: checkout.php");
            }
        }else{
            header("Location: checkout.php");
        }
    }else{
        header("Location: front_menu.php");
    }
}else{
    header("Location: front_menu.php");
}