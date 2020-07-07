<?php
$sel = "SELECT * from tbl_shoporder shoporder , tbl_cart cart , tbl_customer customer , "
        . "tbl_shop shop , tbl_artist artist where shoporder.cart_id = cart.cart_id "
        . "and cart.customer_id = customer.customer_id and cart.shop_id = shop.shop_id "
        . "and shop.artist_id = artist.artist_id and "
        . "shoporder.shoporder_id ='$order_code'";
$res = mysqli_query($conn, $sel);
$row = mysqli_fetch_array($res);

$shoporder_id = $row['shoporder_id'];
$customer_id = $row['customer_id'];
$arttitle = $row['arttitle'];
$email = $row['customer_emailid'];
$country = $row['shop_country'];
$state = $row['shop_state'];
$city = $row['shop_city'];
$zipcode = $row['shop_zipcode'];
$date = $row['shop_date'];
$time = $row['shop_time'];
$qty = $row['qty'];
$price = $row['price'] + $row['shipcost'];
$amount = $row['shop_amount'];


$_SESSION['bill'] = "
         <center>
            <h1 style='color:#755588'>
                Vision Arts
            </h1>
            <hr/>
        </center>
        <center>
            <table style='border:solid 1px;'>
                <tr>
                </tr>
                <tr style='border:solid 1px;'>
                    <td style='padding: 5px;border:solid 1px;font-weight: bold;'>
                        Order Id :
                    </td>
                    <td style='padding: 5px;border:solid 1px;'>
                        $shoporder_id
                    </td>
                    <td style='padding: 5px;border:solid 1px;font-weight: bold;'>
                        Customer Id : 
                    </td>
                    <td style='padding: 5px;border:solid 1px;'>
                        $customer_id
                    </td>
                </tr>
                <tr style='border:solid 1px;'>
                    <td style='padding: 5px;border:solid 1px;font-weight: bold;'>
                        Artwork : 
                    </td>
                    <td style='padding: 5px;border:solid 1px;'>
                        $arttitle
                    </td>
                    <td style='padding: 5px;border:solid 1px;font-weight: bold;'>
                        Email Id : 
                    </td>
                    <td style='padding: 5px;border:solid 1px;'>
                        $email
                    </td>
                </tr>
                 <tr style='border:solid 1px;'>
                    <td style='padding: 5px;border:solid 1px;font-weight: bold;'>
                        Country : 
                    </td>
                    <td style='padding: 5px;border:solid 1px;'>
                        $country
                    </td>
                    <td style='padding: 5px;border:solid 1px;font-weight: bold;'>
                        State : 
                    </td>
                    <td style='padding: 5px;border:solid 1px;'>
                        $state
                    </td>
                </tr>
                <tr style='border:solid 1px;'>
                    <td style='padding: 5px;border:solid 1px;font-weight: bold;'>
                        City : 
                    </td>
                    <td style='padding: 5px;border:solid 1px;'>
                        $city
                    </td>
                    <td style='padding: 5px;border:solid 1px;font-weight: bold;'>
                        Zip Code : 
                    </td>
                    <td style='padding: 5px;border:solid 1px;'>
                        $zipcode
                    </td>
                </tr>
                <tr style='border:solid 1px;'>
                    <td style='padding: 5px;border:solid 1px;font-weight: bold;'>
                        Date : 
                    </td>
                    <td style='padding: 5px;border:solid 1px;'>
                        $date
                    </td>
                    <td style='padding: 5px;border:solid 1px;font-weight: bold;'>
                        Time : 
                    </td>
                    <td style='padding: 5px;border:solid 1px;'>
                        $time
                    </td>
                </tr>
                <tr style='border:solid 1px;'>
                    <td style='padding: 5px;border:solid 1px;font-weight: bold;'>
                        Quntity : 
                    </td>
                    <td style='padding: 5px;border:solid 1px;'>
                        $qty
                    </td>
                    <td style='padding: 5px;border:solid 1px;font-weight: bold;'>
                        Price : 
                    </td>
                    <td style='padding: 5px;border:solid 1px;'>
                        $price
                    </td>
                </tr>
                 <tr style='border:solid 1px;'>
                    <td style='padding: 5px;align-text:center;font-weight: bold;'>
                    </td>                 
                    <td style='padding: 5px;align-text:center;font-weight: bold;'>
                    </td>                 
                    <td style='padding: 5px;align-text:center;font-weight: bold;font-size:20px;'>
                    Total Amount : 
                    </td>
                    <td style='padding: 5px;align-text:center;font-weight: bold;font-size:18px;'>
                    $amount
                    </td>
                </tr>
                </tr>
            </table>
            <hr/>
        </center>";
?>
<html>
    <head>
    <body>
<!--        <table style="border:solid 1px;">
            <hr/>
            <tr>
            <center>
                <h1>
                    Vision Arts
                </h1>
            </center>
        </tr>
        <hr/>
        <tr >
            <td style="padding-left: 50px;">
                Order Id : 
            </td>
            <td>
                $shoporder_id
            </td>
        </tr>
    </table>-->
    </body>
</head>
</html>