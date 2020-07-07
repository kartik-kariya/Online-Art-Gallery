<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style type="text/css">
        </style>
    </head>
    <body>
        <form method="post">
            <input type="submit" name="submit" value="submit"/>
            <?php $dt = "<table><tr><td>Name :</td></tr></table>"; ?>
        </form>
        <?php
        if (isset($_POST['submit'])) {
            echo "<table border='2' style='width:100%'> ";
            echo "<br>";
            echo "<br>";
            echo "Fname";
            echo "<br>";
            echo "<br>";
            echo "Lname";
            echo "<br>";
            echo "<br>";
            echo "Oid";
            echo "<br>";
            echo "<br>";
        }
        ?>
        <div>This is not printed</div>
        <?php
        ?>
        <table class='print' border='2' style='width:100%'>
            <tr>
                <td>
                    Fname : 
                </td>
            </tr>
            <tr>
                <td>
                    Lname : 
                </td>
            </tr>
            <tr>
                <td>
                    Oid : 
                </td>
            </tr>
        </table>
        <a href="javascript:window.print()">Click to print</a>
    </body>
</html>
