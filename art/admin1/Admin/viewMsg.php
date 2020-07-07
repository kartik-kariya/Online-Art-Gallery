<?php
session_start();
if (empty($_SESSION['username'])) {
    header("location:login.php");
}
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
<div class="grid_10">
    <center>	
        <div class="box round first grid" style="width: 50%;">
            <h2>View Message</h2>

<?php
if (isset($_POST['submit'])) {
    echo "<script>window.location = 'contact_view_details.php'</script>";
}
?>



            <div class="block"> 

<?php
$query = "SELECT * FROM `tbl_contact` WHERE id = '$id' order by id desc";
$catSelect = $conn->query($query);
while ($result = $catSelect->fetch_assoc()) {
    ?>

                    <form action="" method="post" >
                        <br/>
                        <table class="form">

                            <tr>
                                <td>
                                    <label>Name</label>
                                </td>
                                <td>
                                    <input type="text" readonly="1" name="name" value= "<?php echo $result['name']; ?>" class="medium" />
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label>Email</label>
                                </td>
                                <td>
                                    <input type="text" readonly="1" name="name" value= "<?php echo $result['email']; ?>" class="medium" />
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label>Date</label>
                                </td>
                                <td>
                                    <input type="text" readonly="1" name="name" value= "<?php echo $result['date']; ?>" class="medium" />
                                </td>
                            </tr>														                     


                            <tr>
                                <td style="vertical-align: top; padding-top: 9px;">
                                    <label>Message</label>
                                </td>
                                <td>
                                    <textarea readonly class="tinymce" name="body"> <?php echo $result['body']; ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                </td>
                                <td>
                                    <input type="submit" name="submit" Value="OK" />
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
<center>          
<?php
include('footer.php');
include('js_link.php');
?>
</center>
