<!DOCTYPE HTML>
<html>
<body bgcolor="1c1d26">
        <head>
                <meta charset="UTF-8">
                <link rel="stylesheet" href="bootstrap.css">
                <link rel="stylesheet" type="text/css" href="button.css">
        </head>
<a href="index.html" class="button">Back</a>
<center><h2 style = "color:white;">Προφίλ Πελατών</h2></center>
<form action = "Display_profile.php" method="get">
<br>
<center style="color:white;">SSN Πελάτη (21314151-21314156):
<input type="text" name="search1" size="48">
</br>
<br>
<center style="color:white;">


<input type="submit" value="submit">
<input type="reset" value="Reset">
</center>
<br>

</form>



<?php

echo 'Mapping για SSN πελατών:';

include("DBConnection.php");

$sql = "SELECT * FROM mydb.Costumer";
$result = mysqli_query($con,$sql);

?>
<br>
<table border="2" align="center" cellpadding="5" cellspacing="5">
        <tr>
        <th style="color:white;">SSN</th>
        <th style="color:white;">Name</th>
        <th style="color:white;">Surname</th>
        </tr>
        <?php
                while($row=mysqli_fetch_assoc($result)){
                ?>
                        <tr>
                                <td style="color:white;"><?php echo $row["SSN"]; ?></td>
                                <td style="color:white;"><?php echo $row["Name"]; ?></td>
                                <td style="color:white;"><?php echo $row["Surname"]; ?></td>
                        </tr>
                <?php
                }
?>

</body>
</html>





