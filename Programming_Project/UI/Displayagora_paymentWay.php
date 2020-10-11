<!DOCTYPE HTML>
<html>
<body bgcolor="1c1d26">
<a href="agores_paymentWay.php" class="button">Back</a>
        <head>
                <link rel="stylesheet" type="text/css" href="button.css">
        </head>
<center><h2 style="color:white;">Αγορές</h2></center>
<br>

<?php
include("DBConnection.php");
session_start();
$search1 = $_REQUEST["search1"];
$search2 = $_REQUEST["search2"];

if ($search1 < 0 || $search2 !=  1 && $search2 != 2){
        echo "<div style ='color:white'> Λάθος είσοδος!</div>";
}

else if ($search2 == 1){ //cache

$query0 = "SELECT DISTINCT Transaction_id
	   FROM Transaction
	   WHERE
	   Store_id = $search1 AND Cash = 1";

$result0 = mysqli_query($con,$query0);

if(!$result0 ||  mysqli_num_rows($result0)==0 ) {
        echo "<div style ='color:white'>Δεν βρέθηκε καμία αγορά για την είσοδο που δώσατε!</div>";
}

else
{
echo "<div style ='color:white'>Βρέθηκαν τα εξείς αποτελέσματα:</div>";
?>
<tr>
<table border="2" align="center" cellpadding="5" cellspacing="5">
<th style="color:white;">Transaction ID</th>
<tr/>

<?php
         while($row0 = mysqli_fetch_assoc($result0)){
        ?>
                <tr>
                <td style="color:white;"><?php echo $row0["Transaction_id"];?> </td>
                </tr>
        <?php
        }
}
}

else if ($search2 == 2){ //cache

$query1 = "SELECT DISTINCT Transaction_id
           FROM Transaction
           WHERE
           Store_id = $search1 AND Card = 1";

$result1 = mysqli_query($con,$query1);

if(!$result1 ||  mysqli_num_rows($result1)==0 ) {
        echo "<div style ='color:white'>Δεν βρέθηκε καμία αγορά για την είσοδο που δώσατε!</div>";
}

else
{
echo "<div style ='color:white'>Βρέθηκαν τα εξείς αποτελέσματα:</div>";
?>
<tr>
<table border="2" align="center" cellpadding="5" cellspacing="5">
<th style="color:white;">Transaction ID</th>
<tr/>

<?php
         while($row1 = mysqli_fetch_assoc($result1)){
        ?>
                <tr>
                <td style="color:white;"><?php echo $row1["Transaction_id"];?> </td>
                </tr>
        <?php
        }
}
}
?>

</html>

