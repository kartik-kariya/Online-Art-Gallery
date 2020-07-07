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
if (!isset($_GET['msgid']) || $_GET['msgid'] == NULL) {
    echo "<script>window.location = 'contact_view_details.php'</script>";
} else {
    $id = $_GET['msgid'];
}
?>
<?php
if (isset($_POST['back'])) {
    echo "<script>window.location = 'contact_view_details.php'</script>";
}
?>

<div class="grid_10">

    <div class="box round first grid">
        <h2>View Message</h2>

<?php
if (isset($_POST['back'])) {
    echo "<script>window.location = 'contact_view_details.php'</script>";
}

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



        <div class="block"> 

        <?php
        $query = "SELECT * FROM `tbl_contact` WHERE id = '$id' order by id desc";
        $catSelect = $conn->query($query);
        while ($result = $catSelect->fetch_assoc()) {
            ?>

                <form action="" method="post">
                    <table class="form">

                        <tr>
                            <td>
                                <label>To</label>
                            </td>
                            <td>
                                <input type="text"  readonly name="toEmail" value= "<?php echo $result['email']; ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Message</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="message"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            </td>
                            <td>
                                <input type="submit" name="submit" Value="Send" />
                                <input type="submit" name="back" Value="Back" />
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
include('footer.php');
include('js_link.php');
?>
            

