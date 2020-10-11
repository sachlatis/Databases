<!DOCTYPE HTML>
<html>
<body bgcolor="1c1d26">
<a href="profile_General.php" class="button">Back</a>
        <head>
                <link rel="stylesheet" type="text/css" href="button.css">
        </head>
<center><h2 style="color:white;">Προφίλ Πελατών</h2></center>
<br>

<?php
include("DBConnection.php");
session_start();
$search1 = $_REQUEST["search1"];

if ($search1 < 21314151 || $search1 > 21314156){
        echo "<div style ='color:white'> Λάθος είσοδος!</div>";
}
else{
	echo "<div style ='color:white'> Παρακάτω φαίνονται με την σειρά: </div>";
	echo '</br>';
	echo "<div style ='color:white'>* O αριθμός των διαφορετικών καταστημάτων που έχει πεισκεφτεί ο πελάτης και ποια είναι αυτα</div>";
	echo '</br>';
        echo "<div style ='color:white'>* Διάγραμμα με τις συνηθέστερες ώρες επίσκεψης</div>";
	echo '</br>';
        echo "<div style ='color:white'>* Μέσος ώρος επισκέψεων ανά μήνα και ανά βδομάδα</div>";
	echo '</br>';
        echo "<div style ='color:white'>* Top Ten προιοντα και πόσεσ φορές τα έχει αγοράσει</div>";
	echo '</br>';

$query1 = "SELECT COUNT(DISTINCT `Store_id`)
	   FROM `Transaction`
	   WHERE SSN = $search1";

$result1 = mysqli_query($con,$query1);

$query2 = "SELECT DISTINCT`Store_id`
	   FROM `Transaction`
	   WHERE SSN = $search1";

$result2 = mysqli_query($con,$query2);

if(!$result2 ||  mysqli_num_rows($result2)==0){
	 echo "<div style ='color:white'>O Πελάτης δεν έχει επισκεφτεί κανένα Κατάστημα!</div>";

}
else{
// eimai edw epeidi exw kanei sunallages
?>
<tr>
<table border="2" align="center" cellpadding="5" cellspacing="5">
<th style="color:white;">Number of Visited Stores</th>
<tr/>

<?php
         while($row1 = mysqli_fetch_assoc($result1)){
        ?>
                <tr>
                <td style="color:white;"><?php echo $row1["COUNT(DISTINCT `Store_id`)"];?> </td>
                </tr>
        <?php
        }

?>
<tr>
<table border="2" align="center" cellpadding="5" cellspacing="5">
<th style="color:white;">Store ID</th>
<tr/>

<?php
         while($row2 = mysqli_fetch_assoc($result2)){
        ?>
                <tr>
                <td style="color:white;"><?php echo $row2["Store_id"];?> </td>
                </tr>
        <?php
        }

// time stuff to fix not to ignore
$query3 = "SELECT COUNT(`Time`),`Time`
           FROM `Transaction`
           WHERE SSN = $search1
	   GROUP BY `Time`";

$result3 = mysqli_query($con,$query3);

// eimai komple exw wres na plotarw

?>
<tr>
<table border="2" align="center" cellpadding="5" cellspacing="5">
<th style="color:white;">Ώρα Επίσκεψης</th>
<th style="color:white;">Αριθμός Επισκέψεων</th>

<tr/>
<?php
	while($row3 = mysqli_fetch_assoc($result3)){
	?>
		<tr>
		<td style="color:white;"><?php echo $row3["Time"];?> </td>
                <td style="color:white;"><?php echo $row3["COUNT(`Time`)"];?> </td>
		</tr>
        <?php
	}
// teleiwnei h  else

$query4 = "SELECT avg(count)
 	   FROM (
   		 SELECT COUNT(`Transaction_ID`) AS count
   		 FROM `Transaction`
   		 WHERE SSN = $search1
     		 GROUP BY `Month`
   	   ) as counts";
$result4 = mysqli_query($con,$query4);

?>
<tr>
<table border="2" align="center" cellpadding="5" cellspacing="5">
<th style="color:white;">Μέσος Όρος Επισέψεων ανά Μήνα</th>
<tr/>
<?php
        while($row4 = mysqli_fetch_assoc($result4)){
        ?>
                <tr>
                <td style="color:white;"><?php echo $row4["avg(count)"];?> </td>
                </tr>
        <?php
        }
//

$query5 = "SELECT avg(count)
	   FROM (
	   SELECT COUNT(DISTINCT`Transaction_ID`) AS count
	   FROM `Transaction`
	   WHERE SSN = $search1 
	   GROUP BY WEEKDAY(`Day`)
	   ) as counts";
$result5 = mysqli_query($con,$query5);

?>
<tr>
<table border="2" align="center" cellpadding="5" cellspacing="5">
<th style="color:white;">Μέσος Όρος Επισέψεων ανά Βδομάδα</th>
<tr/>
<?php
        while($row5 = mysqli_fetch_assoc($result5)){
        ?>
                <tr>
                <td style="color:white;"><?php echo $row5["avg(count)"];?> </td>
                </tr>
        <?php
        }

//

$query6 = "SELECT DISTINCT`ProductName`,`Many`
           FROM `Product`,`Costumer`,`Bought`
       	   WHERE Costumer.SSN = Bought.SSN &&
	   Bought.Barcode = Product.Barcode && Costumer.SSN = $search1 
	   ORDER BY Bought.`Many` DESC
	   LIMIT 10" ;
$result6 = mysqli_query($con,$query6);

?>
<tr>
<table border="2" align="center" cellpadding="5" cellspacing="5">
<th style="color:white;">Τop Ten Products</th>
<th style="color:white;">Πλήθος</th>
<tr/>
<?php
        while($row6 = mysqli_fetch_assoc($result6)){
        ?>
                <tr>
                <td style="color:white;"><?php echo $row6["ProductName"];?> </td>
                <td style="color:white;"><?php echo $row6["Many"];?> </td>
                </tr>
        <?php
        }


//
}
}
?>
</html>

