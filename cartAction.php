<?php
// initialize shopping cart class
include 'cart.php';
$cart = new Cart;
date_default_timezone_set("Asia/Hong_Kong");
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
            'detail'=> $row['detail'],
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

    }elseif($_REQUEST['action'] == 'removeCartItemall'){
        $cart->destroy();
        header("Location: front_viewCart.php");


    }elseif($_REQUEST['action'] == 'ChangeAddress'){
 if($_POST['address']==1){

       $otheraddress = $_POST['Otheraddresstext'];

session_start();
$_SESSION['othersaddress'] = $otheraddress;

 header("Location: checkout.php");

 }else{

unset($_SESSION['othersaddress']);
 
header("Location: checkout.php");
 }

    }elseif($_REQUEST['action'] == 'placeOrder' && $cart->total_items() > 0 && !empty($_SESSION['userid'] && $_POST['disposition-group']==0)){
        //COD method
        // insert order details into database
$payment = $_POST['disposition-group'];

if(isset($_SESSION['othersaddress'])){

        $query = "  
INSERT INTO TBORDER(uid, amount, odate, status, oaddress, paytype)  
VALUES('".$_SESSION['userid']."', '".$cart->total()."', '".date("Y-m-d H:i:s")."', '0','".$_SESSION['othersaddress']."', $payment)";


}else{

    $query = "  
    INSERT INTO TBORDER(uid, amount, odate, status, oaddress, paytype)  
    VALUES('".$_SESSION['userid']."', '".$cart->total()."', '".date("Y-m-d H:i:s")."', '0','".$_SESSION['defaultaddress']."', $payment)";
        

}

unset($_SESSION['othersaddress']);

//die();
$result1 = mysqli_query($connect, $query);

$insertOrder = $query;

        if($insertOrder){
            $orderID = mysqli_insert_id($connect);

            $sql = '';
            // get cart items
            $cartItems = $cart->contents();
        
            foreach($cartItems as $item){
        
                $sql .= "INSERT INTO TBORDER_DETAIL (oid, did, qty, subtotal) VALUES ('".$orderID."', '".$item['id']."', '".$item['qty']."', ".$item["price"]."*".$item['qty'].");";
                
    }
            // insert order items into database
            $insertOrderItems = $connect->multi_query($sql);

            if($insertOrderItems){
                $cart->destroy();
                header("Location: front_ordersuccess.php?id=$orderID");
            }else{

                header("Location: checkout.php");
            }

        }else{

            header("Location: checkout.php");
        }
    }else{

//if select paypal payment method $_POST['disposition-group']==1      

if(!isset($_SESSION['ispaypal'])){
    //if not create paypal process can create new paypal process
session_start();
$_SESSION['forpaypalamount'] = $cart->total();
header("Location: paypal_first.php");
}

if(isset($_SESSION['ispaypal']) && $_REQUEST['action'] == 'placeOrderpaypal' && $cart->total_items() > 0 && !empty($_SESSION['userid'])){
    //paypal payment completed action
	Session_start();
    unset($_SESSION['ispaypal']);
    unset($_SESSION['forpaypalamount']);
    
       // insert order details into database
       $payment = 1;

       if(isset($_SESSION['othersaddress'])){
       
               $query1 = "  
       INSERT INTO TBORDER(uid, amount, odate, status, oaddress, paytype)  
       VALUES('".$_SESSION['userid']."', '".$cart->total()."', '".date("Y-m-d H:i:s")."', '0','".$_SESSION['othersaddress']."', $payment)";
       
       
       }else{
       
           $query1 = "  
           INSERT INTO TBORDER(uid, amount, odate, status, oaddress, paytype)  
           VALUES('".$_SESSION['userid']."', '".$cart->total()."', '".date("Y-m-d H:i:s")."', '0','".$_SESSION['defaultaddress']."', $payment)";
               
       
       }
       
       unset($_SESSION['othersaddress']);
       
       //die();
       $result1 = mysqli_query($connect, $query1);
       
       $insertOrder1 = $query1;
       
               if($insertOrder1){
                   $orderID1 = mysqli_insert_id($connect);
       
                   $sql1 = '';
                   // get cart items
                   $cartItems1 = $cart->contents();
               
                   foreach($cartItems1 as $item){
               
                       $sql1 .= "INSERT INTO TBORDER_DETAIL (oid, did, qty, subtotal) VALUES ('".$orderID1."', '".$item['id']."', '".$item['qty']."', ".$item["price"]."*".$item['qty'].");";
                       
           }
                   // insert order items into database
                   $insertOrderItems1 = $connect->multi_query($sql1);
       
                   if($insertOrderItems1){
                       $cart->destroy();
                       header("Location: front_ordersuccess.php?id=$orderID1");
                   }else{
                    die('3');
                       header("Location: checkout.php");
                   }
                   
               }else{
                die('4');
                   header("Location: checkout.php");
               }
//end paypal payment
}



die('error in paypal payment');


    }
}else{
    header("Location: front_menu.php");
}

mysqli_close($connect);