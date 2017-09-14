<!DOCTYPE html>
<head>
	<title>Pizza Order Receipt</title>
	<meta charset="utf-8">
</head>

<body>
	<h1>Your Receipt</h1>
	<br/>
	<?php echo "Order ID: " . $Order_ID; ?>
</br>
<?php echo "Name: " . $fName, " ", $lName; ?>
</br>
<?php echo "Address: " . $address; ?>
</br>
<?php echo "E-mail Address: " . $email_Address; ?>
</br>
<?php echo "Phone Number: " . $phoneNo; ?>
</br>
<?php echo "Price: " . $price; ?>
</br>
<?php echo "Size Of Pizza: " . $size; ?>
</br>
<?php echo "Are you a student: " . $student; ?>
</br>

<h3>Toppings</h3>
<?php echo "Anchovies: " . $anchovies; ?>
</br>
<?php echo "Pineapple: " . $pineapple; ?>
</br>
<?php echo "Pepperoni: " . $pepperoni; ?>
</br>
<?php echo "Olives: " . $olives; ?>
</br>
<?php echo "Onions: " . $onions; ?>
</br>
<?php echo "Peppers: " . $peppers;?>
</br>
<?php
echo "<a href='DeleteOrder.php'>Delete Order</a>";
echo "<a href='UpdateOrder.php?Order_ID=".$Order_ID."'>Update Order</a>";
?>
</body>
</html>
