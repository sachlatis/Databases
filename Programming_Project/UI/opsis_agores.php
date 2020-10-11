<!DOCTYPE HTML>
<html>
<body bgcolor="1c1d26">
        <head>
                <meta charset="UTF-8">
                <link rel="stylesheet" href="bootstrap.css">
                <link rel="stylesheet" type="text/css" href="button.css">
        </head>
<a href="opsis.html" class="button">Back</a>

<center><h2 style = "color:white;">Πωλήσεις ανα κατηγορία ανα μαγαζί</h2></center>
<form action = "Display_opsis_agores.php" method="get">
<br>
<center style="color:white;">ΙD Καταστήματος(1-10):
<input type="text" name="search1" size="48">
</br>

<br>
<center style="color:white;">ID Κατηγορίας(1-7):
<input type="text" name="search2" size="48">
</br>
<br>
<input type="submit" value="submit">
<input type="reset" value="Reset">
</center>
<br>
</form>

<?php

echo 'Mapping για ID Καταστημάτων και Κατηγρορίας Προιόντων:';

include("DBConnection.php");

$sql = "SELECT * from mydb.Store";
$result = mysqli_query($con,$sql);

?>
<br>
<table border="2" align="left" cellpadding="5" cellspacing="5">
        <tr>
        <th style="color:white;">Store ID </th>  
        <th style="color:white;">Street</th>  
        <th style="color:white;">Number</th>  
        <th style="color:white;">City</th> 
        </tr>
        <?php
                while($row=mysqli_fetch_assoc($result)){
                ?>
                        <tr>
                                <td style="color:white;"><?php echo $row["Store_id"]; ?></td>
                                <td style="color:white;"><?php echo $row["Street"]; ?></td>
                                <td style="color:white;"><?php echo $row["Number"]; ?></td>
                                <td style="color:white;"><?php echo $row["City"]; ?></td>
                        </tr>
                <?php
                }

$sql1 = "SELECT * from mydb.Category";
$result1 = mysqli_query($con,$sql1);
?>
<br>
<table border="2" align="center" cellpadding="5" cellspacing="5">
        <tr>
        <th style="color:white;">Category ID </th>  
        <th style="color:white;">Name</th>  
        </tr>
        <?php
                while($row1=mysqli_fetch_assoc($result1)){
                ?>
                        <tr>
                                <td style="color:white;"><?php echo $row1["Category_id"]; ?></td>
                                <td style="color:white;"><?php echo $row1["Name"]; ?></td>
                        </tr>
                <?php
                }
?>
</body>
</html>

