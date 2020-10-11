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
<form action = "Displayagora.php" method="get">
<br>
<center style="color:white;">Καταστήματος Αγοράς(1-10):
<input type="text" name="search1" size="48">
</br>

<br>
<center style="color:white;">Ημέρα της Αγοράς (1-31):
<input type="text" name="search2" size="48">
</br>

<br>
<center style="color:white;">Μήνας της Αγοράς(1-12):
<input type="text" name="search3" size="48">
</br>
</center>
<br>

<center style="color:white;">Χρονία της Αγοράς(2015-2020):
<input type="text" name="search4" size="48">
<br></br>
<input type="submit" value="submit">
<input type="reset" value="Reset">
</center>
<br>

</form>


<?php

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


