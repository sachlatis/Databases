<!DOCTYPE html>
<html>
<body bgcolor="1c1d26">
<head>  
       <h1 style="text-align: center; color: white;">Τα Προιόντα μας!</h1>
       <link rel="stylesheet" type="text/css" href="button.css">
 </head> 

<br>
<?php
include("DBConnection.php");

$sql = "SELECT * from mydb.Product";
$result = mysqli_query($con,$sql);

?>

<table border="2" align="center" cellpadding="5" cellspacing="5">
	<tr>
	<th style="color:white;">Barcode</th>  
        <th style="color:white;">Product Name</th>  
        <th style="color:white;">Current Price</th>  
        <th style="color:white;">Masoutis Label</th> 
        <th style="color:white;">Points</th>
        <th style="color:white;">Rank</th>
        <th style="color:white;">Corridor</th>

	</tr>
	<?php
		while($row=mysqli_fetch_assoc($result)){
		?>
			<tr>
				<td style="color:white;"><?php echo $row["Barcode"]; ?></td>
				<td style="color:white;"><?php echo $row["ProductName"]; ?></td>
				<td style="color:white;"><?php echo $row["curr_price"]; ?></td>
				<td style="color:white;"><?php echo $row["is_label"]; ?></td>
				<td style="color:white;"><?php echo $row["points"]; ?></td>
				<td style="color:white;"><?php echo $row["rack"]; ?></td>
				<td style="color:white;"><?php echo $row["corridor"]; ?></td>
			</tr>
		<?php
		}
?>		
</table>
</br>
<a href="index.html" class="button">Back</a>
</html>
