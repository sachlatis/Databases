<!DOCTYPE HTML>
<html>
<body bgcolor="1c1d26">
<a href="opsis_agores.php" class="button">Back</a>
        <head>
                <link rel="stylesheet" type="text/css" href="button.css">
        </head>
<center><h2 style="color:white;">Πωλήσεις ανα κατηγορία ανα μαγαζί</h2></center>
<br>

<?php
include("DBConnection.php");
session_start();
$search1 = $_REQUEST["search1"];
$search2 = $_REQUEST["search2"];

$query = "SELECT `Transaction_id`
          FROM transa
          WHERE
          `Store_id` = $search1 AND
          `Category_id` = $search2";

$result = mysqli_query($con,$query);

if ($search1 < 0 || $search1 > 10 || $search2 < 0 || $search2 > 7 ){
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

