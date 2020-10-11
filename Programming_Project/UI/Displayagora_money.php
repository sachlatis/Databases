<!DOCTYPE HTML>
<html>
<body bgcolor="1c1d26">
<a href="agores_money.php" class="button">Back</a>
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

$query = "SELECT DISTINCT Transaction_id
          FROM Transaction
          WHERE
          Totalcost = $search2 AND 
          Store_id = $search1";

$result = mysqli_query($con,$query);

if ($search1 < 0 || $search1 > 10 || $search2 < 0){
        echo "<div style ='color:white'> Λάθος είσοδος!</div>";
}
else if(!$result ||  mysqli_num_rows($result)==0 ) {
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
         while($row = mysqli_fetch_assoc($result)){
        ?>
                <tr>
                <td style="color:white;"><?php echo $row["Transaction_id"];?> </td>
                </tr>
        <?php
        }
}
?>
</html>
