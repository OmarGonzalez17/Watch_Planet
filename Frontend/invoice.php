<?php
session_start();
require_once ('./php/cartF.php');
require_once('./php/cartTesterDB.php');

$productQuery = "SELECT * FROM watches";
$productTable = mysqli_query($conn, $productQuery);

$invoice_date = date("d-m-Y");
$invoice_date = str_replace("-","/", $invoice_date);

//SESSION VARIABLES $_SESSION[]
// $_SESSION['clickID'] -> Variable that saves ID of product clicked
// $_SESSION['cart'] -> Array that saves item IDs from database table to be used with cart and checkout
// $_SESSION['qty'] -> Array that saves quantity of cart items (SHARES INDEX WITH CART ARRAY!!!)
// $_SESSION['subtotal'] -> Variable that saves cart subtotal
// $_SESSION['tax'] -> Variable that saves cart tax
// $_SESSION['total'] -> Variable that saves cart total
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Watch Planet | Invoice</title>
    <link rel="stylesheet" href="css/invoice.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<header>
                <div class="row mx-auto d-flex">
                    <div class="col">
                        <a href="index.php">
                            <img src="img/brand/watch_planet.png"  width="300px"/>
                            </a>
                    </div>
                    <div class="col-6 align-self-center company-details">
                        <h2 class="name">
                            <a target="_blank" href="https://lobianijs.com">
                            </a>
                        </h2>
                        <div class="text-right">Carr. 653 Km. 0.8 Sector Las Dunas, Arecibo P.R. 00614</div>
                        <div class="text-right">(787) 815-0000</div>
                        <div class="text-right">contact@watch-planet.com</div>
                    </div>
                </div>
            </header>
<div id="invoice">
    <div class="invoice mx-auto overflow-auto">
        <div style="min-width: 600px">
            
            <main>
                <div class="row contacts">
                    <div class="col-8 invoice-to">
                        <div class="text-gray-light">INVOICE TO:</div>
                        <h2 class="to"><?php echo $_SESSION['firstName'].' '.$_SESSION['lastName']?></h2>
                        <div class="address"><?php echo $_SESSION['address']?></div>
                        <div class="email"><a href="mailto:john@example.com"><?php echo $_SESSION['email']?></a></div>
                    </div>
                    <div class="col invoice-details">
                        <h1 class="invoice-id">INVOICE: #321</h1>
                        <div class="date">Date of Invoice: <?php echo $invoice_date?></div>
                        <!--<div class="date">Due Date: 30/10/2018</div>-->
                    </div>
                </div>
                <table border="0" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th class="text-left">DESCRIPTION</th>
                            <th class="text-right">PRICE</th>
                            <th class="text-right">QUANTITY</th>
                            <th class="text-right">TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>

                        
                            <?php
                            $cartIndex = 0; //stores index for every cart item on session list (used for item removal)
                                $subtotal = 0; //stores subtotal

                                //fetch all products in our table
                                while ($row = mysqli_fetch_assoc($productTable))
                                {
                                    //fetch all of our ID's stored in our cart array
                                    foreach (array_column($_SESSION['cart'], "prodID") as $currentID){
                                        //Only display products with ID's in our cart array.
                                        if ($currentID == $row['id']){
                                            $price =  (int)$row['price'];
                                            //fetches item quantity from quantity arrray using the same index of our cart array
                                            $quantity = (int)$_SESSION['qty'][$cartIndex]; 
                                            $qtyPrice = $price * $quantity;
                                           // cartItem($row['name'], $qtyPrice, $row['image'], $cartIndex, $quantity);
                                            $cartIndex++;
                                            $subtotal = $subtotal + $qtyPrice;
                                             echo " <tr>
                                                        <td class='no'>".$cartIndex."</td>
                                                        <td class='text-left'><h3>
                                                            <a target='_blank'>"
                                                            .$row['name'].
                                                            "</a>
                                                            </h3>
                                                           <a target='_blank' href='https://www.youtube.com/channel/UC_UMEcP_kF0z4E6KbxCpV1w'>
                                                               
                                                           </a>"
                                                           .$row['description']."
                                                        </td>
                                                        <td class='unit'>$".number_format($row['price'],2)."</td>
                                                        <td class='qty'>".$quantity."</td>
                                                        <td class='total'>$".number_format($qtyPrice, 2)."</td>
                                    </tr>";
                                        }
                                    }
                                }
                                ?>
                        
                        
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">SUBTOTAL</td>
                            <td>$<?php echo number_format($_SESSION['subtotal'],2)?></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">TAX 11.5%</td>
                            <td>$<?php echo number_format($_SESSION['tax'],2)?></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">GRAND TOTAL</td>
                            <td>$<?php echo number_format($_SESSION['total'],2)?></td>
                        </tr>
                    </tfoot>
                </table>
                <div class="thanks">Thank you for your purchase!</div>
            </main>
            <footer>
                Invoice was created on a computer and is valid without the signature and seal.
            </footer>
        </div>
        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
        <div></div>
    </div>
</div>
</body>
<script>
     $('#printInvoice').click(function(){
            Popup($('.invoice')[0].outerHTML);
            function Popup(data) 
            {
                window.print();
                return true;
            }
        });
</script>
</html>