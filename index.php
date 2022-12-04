<?php
session_start();
include_once 'shopping.db.php';

// urllencode is used when encoding a string to be used in part of a query especially when passing variables to the next page
//taking the current url of the page
 $current_url = urlencode($url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping cart</title>
</head>

<body>
    <h1 style="text-align: center;">Kyle Shoe Game Shop</h1>

    <!-- viewing the cart box -->
    <?php

    if (isset($_SESSION['cart_products']) && count($_SESSION['cart_products']) > 0) {
        echo '<div class = "cart-view-table-front" id="view-cart">';
        echo '<h3>Your shopping Cart</h3>';
        echo '<form action="cart_update.php" method="POST">';

        echo '<table width="100%" cellpadding="6" cellspacing="0">';
        echo '<tbody>';

         $total = 0;
         $b = 0;
         foreach($_SESSION['cart_products'] as $cart_itm) {
            $product_name = $cart_itm["product_name"];
            $product_qty = $cart_itm["product_qty"];
            $product_price = $cart_itm["product_price"];
            $product_code = $cart_itm["product_code"];
            $product_color = $cart_itm["product_color"];

            $bg_color = ($b++ % 2 == 1) ? 'odd' : 'even'; //zebra stripe
            echo '<tr class="' . $bg_color . '">';
            echo '<td>Qty <input type="text" size="2" name="product_qty['.$product_code.']" value="'.$product_qty.'"/></td>';

            echo '<td>'.$product_name.'</td>';

            echo '<td><input type="checkbox" name="remove_code[]" value="'.$product_code.'"/>Remove</td>';
            echo '</tr>';

            // price of the product multiplied by the quantity
             $total_price = $product_price *$product_qty;
         }
         echo '<td colspan="4">';
         echo '<button type="submit">Update</button><a href="view_cart.php" class="button">Checkout</a>';

        echo '</tbody>';
        echo '</table>';
        echo '</form>';
    }else{
        echo "no products";
    }
    ?>
    

</body>

</html>