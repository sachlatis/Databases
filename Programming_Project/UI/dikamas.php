<!DOCTYPE HTML>
<html>
<body bgcolor="1c1d26">
<a href="index.html" class="button">Back</a>
        <head>
                <link rel="stylesheet" type="text/css" href="button.css">
        </head>
<center><h2 style="color:white;">Δικά μας ερωτήματα!</h2></center>
<br>

<?php
include("DBConnection.php");
session_start();

$query1 = "SELECT `Costumer`.`Name` , `Costumer`.`Surname`, `Transaction`.`Totalcost`
	   FROM `Costumer`, `Transaction`
	   WHERE `Costumer`.`SSN` = `Transaction`.`SSN`
	   ORDER BY `Transaction`.`Totalcost` DESC
	   LIMIT 1";

$result1 = mysqli_query($con,$query1);
echo "<div style ='color:white'>Βρέθηκαν τα στοιχεία του πελάτη με την μεγαλύτερη συναλλαγή και το ποσοστό των αγορών που χρησιμοποιήθηκε η giftcard: </div>";
echo "<br/>";
?>
<tr>
<table border="2" align="center" cellpadding="5" cellspacing="5">
<th style="color:white;">Όνομα</th>
<th style="color:white;">Επίθετο</th>
<th style="color:white;">Συνολικό Κόστος</th>
<tr/>

<?php
         while($row1 = mysqli_fetch_assoc($result1)){
        ?>
                <tr>
                <td style="color:white;"><?php echo $row1["Name"];?> </td>
                <td style="color:white;"><?php echo $row1["Surname"];?> </td>
                <td style="color:white;"><?php echo $row1["Totalcost"];?> </td>
                </tr>
        <?php
        }
// next query starts here
$query2 = "SELECT
  	   100*SUM(case when `Transaction`.`Giftcard` = 1 then 1 else 0 end)/
 	   count(distinct`Transaction_id`) AS result
  	   FROM `Transaction`";

$result2 = mysqli_query($con,$query2);
?>
<tr>
<table border="2" align="center" cellpadding="5" cellspacing="5">
<th style="color:white;">Αποτέλεσμα</th>
<tr/>

<?php
         while($row2 = mysqli_fetch_assoc($result2)){
        ?>
                <tr>
                <td style="color:white;"><?php echo $row2["result"];?> </td>
                </tr>
        <?php
        }



?>
</html>
