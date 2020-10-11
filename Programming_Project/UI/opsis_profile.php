<!DOCTYPE HTML>
<html>
<body bgcolor="1c1d26">
        <head>
                <meta charset="UTF-8">
                <link rel="stylesheet" href="bootstrap.css">
                <link rel="stylesheet" type="text/css" href="button.css">
        </head>
<a href="opsis.html" class="button">Back</a>

<center><h2 style = "color:white;">Προφίλ Πελατών</h2></center>
</form>


<?php


include("DBConnection.php");

$sql = "SELECT * from ourcostumers";
$result = mysqli_query($con,$sql);

?>

<table border="2" align="center" cellpadding="5" cellspacing="5">
        <tr>
        <th style="color:white;">Name</th>
        <th style="color:white;">Surname</th>
        <th style="color:white;">Birthday</th>
        <th style="color:white;">SSN</th>
        </tr>
        <?php
                while($row=mysqli_fetch_assoc($result)){
                ?>
                        <tr>
                                <td style="color:white;"><?php echo $row["Name"]; ?></td>
                                <td style="color:white;"><?php echo $row["Surname"]; ?></td>
                                <td style="color:white;"><?php echo $row["Birthday"]; ?></td>
                                <td style="color:white;"><?php echo $row["SSN"]; ?></td>
                        </tr>
                <?php
                }
?>
</table>
</br>
</html>

