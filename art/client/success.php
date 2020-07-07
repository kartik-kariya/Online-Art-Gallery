        <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

        <link rel="shortcut icon" type="image/x-icon" href="Images/Artboard 1.png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Gilda+Display%7CMontserrat:400,700%7COpen+Sans" rel="stylesheet">

        <!-- Icons -->
        <link href="css/icomoon.css" rel="stylesheet">
        <link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="fonts/icomoon/style.css">
        <!-- CSS assets -->
        <script src="js/plugins/jquery-3.2.1.min.js" type="text/javascript"></script>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- LOAD JQUERY LIBRARY-->

        <!-- Main theme stylesheet -->
        <link href="css/template.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="css/main.css">

        <!--category stylesheets-->
        <link rel="stylesheet" href="css/categorystyle.css" />
        <script src="js/sweetalert.min.js" type="text/javascript"></script>

<?php

include '../connection.php';
session_start();

$status = $_POST["status"];
$firstname = $_POST["firstname"];
$amount = $_POST["amount"];
$txnid = $_POST["txnid"];
$posted_hash = $_POST["hash"];
$key = $_POST["key"];
$productinfo = $_POST["productinfo"];
$email = $_POST["email"];
$salt = "P3JPuEU00Z";

// Salt should be same Post Request 

If (isset($_POST["additionalCharges"])) {
    $additionalCharges = $_POST["additionalCharges"];
    $retHashSeq = $additionalCharges . '|' . $salt . '|' . $status . '|||||||||||' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
} else {
    $retHashSeq = $salt . '|' . $status . '|||||||||||' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
}
$hash = hash("sha512", $retHashSeq);
if ($hash != $posted_hash) {
    echo "Invalid Transaction. Please try again";
} else {
    include './collector_header.php';
    echo "<div style='padding-top:6%;'>";
    echo "<center>";            
    echo "<div class='login100-pic js-titl'>";    
    echo "<a href='collector_home.php' class='site-logo-anch'>";            
    echo "<img  src='arts_files/images/logo3.jpg' width='100' height='100' alt='Vision' style='margin-top: 0%;'> ";            
    echo "</a>";            
    echo "</div>";            
    echo "</center>";            
    echo '<hr/>';
    echo "<div style='padding-left:10%;";
    echo "<h3 style=''>Thank You. Your order status is " . $status . ".</h3>";
    echo "<h4>Your Transaction ID for this transaction is " . $txnid . ".</h4>";
    echo "<h4>We have received a payment of Rs. " . $amount . ". Your order will soon be shipped.</h4>";
    echo "<a href='collector_home.php'>Click Here To Go Home </a>";
    echo "</div>";
    echo "<hr/>";
    echo '</div>';
    include './footer.php';


    $myemail = $_SESSION['payemail'];
    $myfirstname = $_SESSION['payufirstname'];
    $mylastname = $_SESSION['payutxt_lastname'];
    $myamount = $_SESSION['payuamount'];
    $myphone = $_SESSION['payuphone'];
    $mystreetaddress = $_SESSION['payustreetaddress'];
    $mycity = $_SESSION['payucity'];
    $mystate = $_SESSION['payustate'];
    $mycountry = $_SESSION['payucountry'];
    $myzipcode = $_SESSION['payuzipcode'];

    date_default_timezone_set("Asia/Kolkata");
    $date = $time = "";
    $date = date('d-m-Y');
    $time = date('g:i a');

    // $q = "insert into tbl_shoporder values('' , )";

    $cid = array();

    $q = "select cart_id from tbl_cart where customer_id in (select customer_id FROM tbl_customer where customer_username='" . $_SESSION['signin_username'] . "') and cart_status = 0";
    $res = mysqli_query($connection, $q);

    while ($r = mysqli_fetch_assoc($res)) {
        $cid[] = $r['cart_id'];
    }

    $shop_id = $cart_qty = $shop_qty = array();
    $q = "select * from tbl_cart c , tbl_shop s where c.shop_id = s.shop_id and cart_status=0;";
    $res_q = mysqli_query($connection, $q);

    while ($r = mysqli_fetch_assoc($res_q)) {
        $shop_id[] = $r['shop_id'];
        $cart_qty[] = $r['qty'];
    }

    for($j=0 ; $j<sizeof($shop_id) ; $j++) {
        $q = "select available_copies from tbl_shop where shop_id=$shop_id[$j];";
        $res_q = mysqli_query($connection, $q);
        while ($r = mysqli_fetch_assoc($res_q)) {
            $shop_qty[] = $r['available_copies'];
        }
        $shop_qty[$j];
        $cart_qty[$j];
        $q = "update tbl_shop set available_copies=($shop_qty[$j]-$cart_qty[$j]) where shop_id=$shop_id[$j];";
        $res_q = mysqli_query($connection, $q);
        while ($r = mysqli_fetch_assoc($res_q)) {
            $shop_qty[] = $r['available_copies'];
        }
    }

    //$cart_id = implode("%", $cid);
    for ($i = 0; $i < sizeof($cid); $i++) {
        //echo $cid[$i];

        $insert = "insert into tbl_shoporder values('' , $cid[$i] , '$myemail' , '$myphone' , '$mystreetaddress' ,"
                . "'$mycity' , '$mystate' , '$mycountry' , '$myzipcode' , '$myamount' , 'OnlinePay' , 'Done' , 'Pending' , '$date' ,'$time');";
        if (mysqli_query($connection, $insert)) {
            $update = "update tbl_cart set cart_status='1' where cart_id = " . $cid[$i];
            if (mysqli_query($connection, $update)) {
                
            } else {
                echo "Something Went Wrong .!";
            }
        } else {
            echo "Something Went Wrong .!";
        }
    }
}
?>	