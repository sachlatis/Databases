<!DOCTYPE HTML>
<html>
<body bgcolor="1c1d26">
        <head>
                <meta charset="UTF-8">
                <link rel="stylesheet" href="bootstrap.css">
                <link rel="stylesheet" type="text/css" href="button.css">
        </head>
<a href="agoresGeneral.html" class="button">Back</a>
<center><h2 style = "color:white;">Αγορές</h2></center>
<form action = "Displayagora_paymentWay.php" method="get">
<br>
<center style="color:white;">ID Καταστήματος Αγοράς(1-10):
<input type="text" name="search1" size="48">
</br>

<br>
<center style="color:white;">Tρόπος πληρωμής:
<input type="text" name="search2" size="48">
</br>
<br>

<input type="submit" value="submit">
<input type="reset" value="Reset">
</center>
<br>

</form>


<?php

echo 'Για τον τρόπο πληρωμής:';
echo "<br>";
echo 'Πληκτρολογήστε 1 για Μετρητά';
echo "<br>";
echo 'Πληκτρολογήστε 2 για Κάρτα';
echo "<br>";
echo "<br>";
 
echo 'Mapping για ID Καταστημάτων Μασούτης:';

include("DBConnection.php");

$sql = "SELECT * from mydb.Store";
$result = mysqli_query($con,$sql);

?>
<br>
<table border="2" align="center" cellpadding="5" cellspacing="5">
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

?>

</body>
</html>



