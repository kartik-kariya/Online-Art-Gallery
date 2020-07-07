<?php
ob_start();
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
if (isset($_GET['senid'])) {
    $id = $_GET['senid'];

    $query_update = "UPDATE tbl_contact SET status = '1' WHERE id= '$id'";
    $updaterow = $conn->query($query_update);
    if ($updaterow) {
        echo "<snap class ='sussess'>Measseage Send To Seen Box!</snap>";
    } else {
        echo "<snap class ='error'>Measseage Not send to Seen Box!!</snap>";
    }
}
?>
<?php
if (isset($_GET['delid'])) {
    $id = $_GET['delid'];

    $query = "DELETE FROM `tbl_contact` WHERE id =$id";
    $del = $conn->query($query);
    if ($del) {
        echo "<snap class ='sussess'>Message Deleted Sussessfully !</snap>";
    } else {
        echo "<snap class ='error'>Message Not Deleted !</snap>";
    }
}
?>
<html>
    <head>
        <title>View Contact Details</title>
    </head>
    <body>   
        <script type="text/javascript">

            $(document).ready(function () {
                setupLeftMenu();

                $('.datatable').dataTable();
                setSidebarHeight();
            });
        </script>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
                <fieldset>
                    <div class="control-group">
                        <div class="block-content collapse in">
                            <div class="span12">
                                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                    <thead>
                                        <tr>
                                            <th>Serial No.</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Message</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = "SELECT  * FROM `tbl_contact` WHERE status = 0 order by id desc ";
                                        $cat = $conn->query($query);
                                        if ($cat) {
                                            $i = 0;
                                            while ($result = $cat->fetch_assoc()) {
                                                $i++;
                                                ?>
                                                <tr align="center">	
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $result['name']; ?></td>
                                                    <td><?php echo $result['email']; ?></td>
                                                    <td><?php echo $result['body']; ?></td>
                                                    <td><?php echo $result['date']; ?></td>
                                                    <td> 
                                                        <a class="btn btn-info" href="viewMsg.php?msgid=<?php echo $result['id']; ?>">View</a> |
                                                        <a class="btn btn-primary" href="replayMsg.php?msgid=<?php echo $result['id']; ?>">Reply</a> |
                                                        <a class="btn btn-inverse" onclick="return confirm('Are You Sure You Want to Move the Message!!')" href="?senid=<?php echo $result['id']; ?>">Seen</a>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>

        <br/><br/><br/><br/><br/><br/>

        <div class="grid_10" style="margin-left: 23%;">
            <div class="box round first grid">
                <h2>Seen Box</h2>
                <fieldset>
                    <div class="control-group">
                        <div class="block-content collapse in">
                            <div class="span12">
                                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                    <thead>
                                        <tr>
                                            <th>Serial No.</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Message</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = "SELECT  * FROM `tbl_contact` WHERE `status` = 1 order by id desc ";
                                        $cat = $conn->query($query);
                                        if ($cat) {
                                            $i = 0;
                                            while ($result = $cat->fetch_assoc()) {
                                                $i++;
                                                ?>
                                                <tr align="center">	
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $result['name']; ?></td>			
                                                    <td><?php echo $result['email']; ?></td>
                                                    <td><?php echo $result['body']; ?></td>
                                                    <td><?php echo $result['date']; ?></td>
                                                    <td>
                                                        <a class="btn btn-info" href="viewMsg.php?msgid=<?php echo $result['id']; ?>">View</a> |
                                                        <a class="btn btn-danger" onclick="return confirm('Are you sure to Delete!!')" href="?delid=<?php echo $result['id']; ?>">Delete</a> 
                                                        <?php
                                                    }
                                                    ?>	
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <?php
                }
                ?>
            </div>
        </div>
    </body>
</html>
<?php
include('footer.php');
include('js_link.php');

ob_flush();
?>