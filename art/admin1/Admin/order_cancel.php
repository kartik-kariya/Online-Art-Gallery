<?php
session_start();
if (empty($_SESSION['username'])) {
    header("location:login.php");
}
require 'mailerClass/PHPMailerAutoload.php';
?>
<?php
include('link.php');
include('top_header.php');
include('left_menu.php');
include ('../connection.php');
?>

<?php
$id = $_GET['shop_orderid'];

echo $id;
?>
<div class="grid_10">

    <div class="box round first grid">
        <h2>Enter Reason</h2>

        <?php
        if (isset($_POST['submit'])) {
            $to = $_POST['toEmail'];
            $from = "Vision Art Gallery";
            $subject = "Vision Art Gallery";
            $message = $_POST['message'];

            $mail = new PHPMailer();
            $mail->IsSmtp();
            $mail->SMTPDebug = 0;
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'ssl';

            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );

            //$mail ->Host = "tls.gmail.com";
            $mail->Host = 'smtp.gmail.com';
            //$mail->Host = 'tls://smtp.gmail.com';
            $mail->Port = 465; // or 587
            $mail->IsHTML(true);
            $mail->Username = "vision6570@gmail.com";
            $mail->Password = "7874485660";
            $mail->SetFrom("vision6570@gmail.com");
            $mail->Subject = $subject;
            $mail->Body = $message;
            $mail->AddAddress($to);

            if (!$mail->Send()) {
                echo "<snap class ='sussess'>Something went Wrong!</snap>";
                echo "$mail->ErrorInfo";
            } else {
                echo "<snap class ='sussess'>Message Send Sussessfully!</snap>";
            }
        }
        ?>

        <div class="block" style="margin-left: 20%; padding:2%;"> 

            <?php
            $query = "SELECT * FROM tbl_shoporder s,tbl_cart c,tbl_customer cu WHERE shoporder_id = '$id' and s.cart_id = c.cart_id and c.customer_id = cu.customer_id;";
            $catSelect = $conn->query($query);
            while ($result = $catSelect->fetch_assoc()) {
                ?>

                <form action="" method="post">
                    <table class="form">
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Message : </label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="message"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>To : </label>
                            </td>
                            <td>
                                <input type="text"  readonly name="toEmail" value= "<?php echo $result['customer_emailid']; ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                            </td>
                            <td>
                                <input type="submit" name="submit" Value="Send" />
                            </td>
                        </tr>
                    </table>
                </form>
            <?php } ?>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<?php
if(isset($_POST['submit'])){
    $q = "update tbl_shoporder set shop_orderstatus = 'Cancelled' where shoporder_id = '$id';";
    if(mysqli_query($conn, $q)) {
        echo "<script>alert('Order has been Cancelled...')</script>";
    } else {
        echo "<script>alert('Order has not been Cancelled...Try Again...')</script>";
    }
}

include('footer.php');
include('js_link.php');
?>
            

