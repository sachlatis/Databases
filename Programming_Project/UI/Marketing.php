<!DOCTYPE HTML>
<html>
<body bgcolor="1c1d26">
<a href="index.html" class="button">Back</a>
        <head>
                <link rel="stylesheet" type="text/css" href="button.css">
        </head>
<center><h2 style="color:white;">Συμπεράσματα Marketing</h2></center>
<br>

<?php
include("DBConnection.php");
session_start();

$query1 = "SELECT `rack`, `corridor` , COUNT(`Product_Barcode`) AS counter
	  FROM `Product` ,`Contained`
	  WHERE `Product`.`Barcode` = `Contained`.`Product_Barcode`
	  GROUP BY `rack`,`corridor`
	  ORDER BY counter DESC";

$result1 = mysqli_query($con,$query1);
echo "<div style ='color:white'>Βρέθηκαν τα εξείς αποτελέσματα:</div>";
?>
<tr>
<table border="2" align="center" cellpadding="5" cellspacing="5">
<th style="color:white;">Rack</th>
<th style="color:white;">Corridor</th>
<tr/>

<?php
         while($row1 = mysqli_fetch_assoc($result1)){
        ?>
                <tr>
                <td style="color:white;"><?php echo $row1["rack"];?> </td>
                <td style="color:white;"><?php echo $row1["corridor"];?> </td>
                </tr>
        <?php
        }
// next query starts here

$query2 = "SELECT `Product`.`Category_id` as a, 100*SUM(case when `Product`.`is_label` = 1 and `Product`.`Barcode` = `Bought`.`Barcode` then 1 else 0 end)/
   SUM(case when `Product`.`Barcode` = `Bought`.`Barcode` then 1 else 0 end) as result
	   FROM `Product`,`Bought`
	   GROUP BY `Product`.`Category_id`";

$result2 = mysqli_query($con,$query2);
?>
<tr>
<table border="2" align="center" cellpadding="5" cellspacing="5">
<th style="color:white;">Category_id</th>
<th style="color:white;">Percentage</th>

<tr/>

<?php
         while($row2 = mysqli_fetch_assoc($result2)){
        ?>
                <tr>
                <td style="color:white;"><?php echo $row2["a"];?> </td>
                <td style="color:white;"><?php echo $row2["result"];?> </td>
		</tr>
        <?php
        }
//

$query3 = "SELECT `Time`
	   FROM `Transaction`
	   GROUP BY `Time`
	   ORDER BY SUM(`Totalcost`) DESC" ;

$result3 = mysqli_query($con,$query3);
?>
<tr>
<table border="2" align="center" cellpadding="5" cellspacing="5">
<th style="color:white;">Famous Working Hours</th>

<tr/>

<?php
         while($row3 = mysqli_fetch_assoc($result3)){
        ?>
                <tr>
                <td style="color:white;"><?php echo $row3["Time"];?> </td>
                </tr>
        <?php
        }

// new query here
$query4 = "SELECT  C1.`Product_Barcode` AS LA , C2.`Product_Barcode` AS LA2
	   FROM `Contained` AS C1 , `Contained` AS C2
           WHERE C1.`Product_Barcode`<> C2.`Product_Barcode` AND C1.`Transaction_Transaction_id` = C2.`Transaction_Transaction_id`
	   GROUP BY C1.`Product_Barcode` , C2.`Product_Barcode`
	   ORDER BY COUNT(*) DESC
	   LIMIT 25";

$result4 = mysqli_query($con,$query4);
?>
<tr>
<table border="2" align="center" cellpadding="5" cellspacing="5">
<th style="color:white;">Barcode Πρώτου Προιόντος</th>
<th style="color:white;">Barcode Δεύτερου Προιόντος</th>

<tr/>

<?php
         while($row4 = mysqli_fetch_assoc($result4)){
        ?>
                <tr>
                <td style="color:white;"><?php echo $row4["LA"];?> </td>
                <td style="color:white;"><?php echo $row4["LA2"];?> </td>
                </tr>
        <?php
        }





//
$query5 = "SELECT 100*SUM(case when (`Costumer`.`Birthday` > '1920-01-01' and `Costumer`.`Birthday` < '1975-01-01' and `Bought`.`SSN` = `Costumer`.`SSN`) then 1 else 0 end)/
    SUM(case when (`Bought`.`SSN` = `Costumer`.`SSN`) then 1 else 0 end) as AGE_45_99,
    100*SUM(case when (`Costumer`.`Birthday` < '1994-01-01' and `Costumer`.`Birthday` > '1975-01-01' and `Bought`.`SSN` = `Costumer`.`SSN`) then 1 else 0 end)/
    SUM(case when (`Bought`.`SSN` = `Costumer`.`SSN`) then 1 else 0 end) as AGE_26_44,
    100*SUM(case when (`Costumer`.`Birthday` < '2020-01-01' and `Costumer`.`Birthday` > '1994-01-01' and `Bought`.`SSN` = `Costumer`.`SSN`) then 1 else 0 end)/
    SUM(case when (`Bought`.`SSN` = `Costumer`.`SSN`) then 1 else 0 end) as AGE_0_25
FROM `Costumer`,`Bought`";

$result5 = mysqli_query($con,$query5);
?>
<tr>
<table border="2" align="center" cellpadding="5" cellspacing="5">
<th style="color:white;">Ποσοστό Πελατών Ηλικίας 0-25</th>
<th style="color:white;">Ποσοστό Πελατών Ηλικίας 26-14</th>
<th style="color:white;">Ποσοστό Πελατών Ηλικίας 45-99</th>

<tr/>

<?php
         while($row5 = mysqli_fetch_assoc($result5)){
        ?>
                <tr>
                <td style="color:white;"><?php echo $row5["AGE_0_25"];?> </td>
                <td style="color:white;"><?php echo $row5["AGE_26_44"];?> </td>
                <td style="color:white;"><?php echo $row5["AGE_45_99"];?> </td>
                </tr>
        <?php
        }


//
?>
</html>
