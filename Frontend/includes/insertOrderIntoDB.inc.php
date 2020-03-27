<?php

require_once('connection.inc.php');
session_start();

/*
  STEPS TO INSERT ORDER, ORDERDETAILS AND INVOICE INTO DATABASE.

1.When user clicks button on paypal.php it will take you to insertOrdersIntoDatabase.php.
2.Inside the file, store the user’s id and date on two variables: $user_id and $order_date.
3.Create query to insert values into orders table and execute mysqli_query.
4.Create query to obtain id and price from watches table. Execute mysqli_query.
5.Create query to obtain the last order_id in the orders table. Execute mysqli_query.
6. Iterate items on the cart. Get their id, quantity, order_id. Insert every item on the orderdetails table.  
7. insert invoice into table.
8. Redirect to confirmation.php
*/

// INSERT ORDER
$productQuery = "SELECT * FROM watches";
$productTable = mysqli_query($conn, $productQuery);
$user_id = $_SESSION['id'];
date_default_timezone_set("America/Puerto_Rico");
$order_date = date("Y-m-d");

echo "<h1>$user_id and $order_date</h1>";

$sql = "INSERT INTO orders(user_id, order_date) VALUES($user_id, '".$order_date."');";
mysqli_query($conn, $sql);


// INSERT ORDER DETAIL
// GET ORDER ID
$sql = "SELECT * FROM orders WHERE order_id=(SELECT max(order_id) FROM orders);"; 
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$order_id = $row['order_id'];


// GET WATCH ID
$productQuery = "SELECT * FROM watches";
$productTable = mysqli_query($conn, $productQuery);

 $cartIndex = 0; //stores index for every cart item on session list (used for item removal)
 $subtotal = 0; //stores subtotal

                                //fetch all products in our table
 while ($row = mysqli_fetch_assoc($productTable))
 {
                                    //fetch all of our ID's stored in our cart array
    foreach (array_column($_SESSION['cart'], "prodID") as $currentID){
                                        //Only display products with ID's in our cart array.
        if ($currentID == $row['id']){
            $watch_id = $row['id'];
            $price =  (int)$row['price'];
                                            //fetches item quantity from quantity arrray using the same index of our cart array
            $quantity = (int)$_SESSION['qty'][$cartIndex]; 
            $qtyPrice = $price * $quantity;
                                           // cartItem($row['name'], $qtyPrice, $row['image'], $cartIndex, $quantity);
            $cartIndex++;
            $subtotal = $subtotal + $qtyPrice;

            $sql = "INSERT INTO orderdetails(order_id, watch_id, quantity) VALUES($order_id, $watch_id, $quantity);";
            mysqli_query($conn, $sql);
        }
    }
 }

// INSERT INVOICE
    $sql = "INSERT INTO invoice(order_id) VALUES($order_id);";
    mysqli_query($conn, $sql);

 // INSERT SHIPPING ADDRESS
  $sql = "INSERT INTO shipping(order_id, user_id, ship_address_line1, ship_address_line2, ship_city, ship_country, ship_zip) 
          VALUES($order_id, $user_id, '".$_SESSION['ship_address_line1']."','".$_SESSION['ship_address_line2']."', 
          '".$_SESSION['ship_city']."',
           '".$_SESSION['ship_country']."', '".$_SESSION['ship_zip']."');";
        echo $sql;
        mysqli_query($conn, $sql);
        header('Location: confirmation.php');

 // INSERT BILLING

   $sql = "INSERT INTO billing(user_id, phone_number, address_line1, address_line2, city, country, zip) 
          VALUES($user_id, '".$_SESSION['phone_number']."', '".$_SESSION['address_line1']."','".$_SESSION['address_line2']."', 
           '".$_SESSION['ship_city']."', '".$_SESSION['ship_country']."', '".$_SESSION['ship_zip']."');";
        echo $sql;
        mysqli_query($conn, $sql);
        header('Location: ../confirmation.php');


























 ?>