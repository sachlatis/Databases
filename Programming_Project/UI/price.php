
<!DOCTYPE html>
<html>
<body bgcolor="1c1d26">
<head>  
       <h1 style="text-align: center; color: white;">Ιστορικό Αλλαγών Τιμών</h1>
       <link rel="stylesheet" type="text/css" href="button.css">
 </head> 

<br>
<?php
include("DBConnection.php");

$sql = "SELECT * FROM Price_History";
$result = mysqli_query($con,$sql);

?>

<table border="2" align="center" cellpadding="5" cellspacing="5">
        <tr>
        <th style="color:white;">Price</th>  
        <th style="color:white;">Day_changed</th>  
        <th style="color:white;">Barcode</th>  
        </tr>
        <?php
                while($row=mysqli_fetch_assoc($result)){
                ?>
                        <tr>
                                <td style="color:white;"><?php echo $row["Price"]; ?></td>
                                <td style="color:white;"><?php echo $row["Day_changed"]; ?></td>
                                <td style="color:white;"><?php echo $row["Barcode"]; ?></td>
      
                        </tr>
                <?php
                }
?>
</table>
</br>
<a href="index.html" class="button">Back</a>
</html>
