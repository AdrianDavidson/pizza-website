<html>
<head>
	<meta charset = "utf-8">
	<title>Update Order</title>
</head>

<body>
	<h1> Please make any changes </h1>
<?php
include 'inc_DBConnect.php';

	$Order_ID = $_GET['Order_ID'];
	$sql = "SELECT * FROM orders where order_id = '$Order_ID'";
	$result = $DBConnection->query($sql);
  $row = $result->fetch_assoc();


	function validateInput($input, $DBConnection)
	{
	  $input = trim($input);
	  $input = stripslashes($input);
	  $input = mysqli_real_escape_string($DBConnection, $input);
	  return $input;
	}

	// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	// 														CUSTOMER DETAILS
	// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	echo "<h3> Your Details </h3>";
	$fName = $row['firstname'];
	$lName = $row['lastname'];
	$email_Address  = $row['email'];
	$address = $row['address'];
	$phoneNo  = $row['phone'];
	$Order_ID = $row['order_id'];
	$price = $row['price'];
	?>
	  <form  id="pizza-form"  action="UpdateOrder.php" onSubmit="return validateInput();" name="orderPizza" method="post" >
	First name
  <input type="text" name= "fName" value= "<?php echo $fName; ?> "size=30> </br></br>
	Last name
  <input type="text" name= "lName" value= "<?php echo $lName; ?> "size=30></br></br>
	Email
  <input type="text" name= "email" value= "<?php echo $email_Address ; ?> "size=30></br></br>
	Address
  <input type="text" name= "address" value= "<?php echo $address; ?> "size=30></br></br>
	Phone Number
  <input type="text" name= "address" value= "<?php echo $phoneNo ; ?> "size=30></br></br>


<?php
		// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
		// 														TOPPING OF PIZZA
		// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

			echo "<h3> Your Toppings </h3>";

			$student = 'N';
			$anchovies = 'N';
			$pineapple = 'N';
			$pepperoni = 'N';
			$olives = 'N';
			$onions = 'N';
			$peppers = 'N';

		if (isset($_POST['addAnchovies']) == 'y')
		{
		  $anchovies= 'Y';
		}

		if (isset($_POST['addPineapple']) == 'y')
		{
		  $pineapple ='Y';
		}
		if (isset($_POST['addPepperoni']) == 'y')
		{
		  $pepperoni= 'Y';
		}
		if (isset($_POST['addOlives']) == 'y')
		{
		  $olives= 'Y';
		}
		if (isset($_POST['addOnion']) == 'y')
		{
		  $onions= 'Y';
		}
		if (isset($_POST['addPeppers']) == 'y')
		{
		  $peppers= 'Y';
		}

			echo "Pizza Toppings: ";

	$Toppings  = array('anchovies','pineapple','pepperoni','peppers','olives','onion');
	for($i = 0; $i < sizeof($Toppings ); $i++)
	{
		if($row[$Toppings [$i]] == 'y')
		{
	 		echo $Toppings [$i] . ":<input id=" . $Toppings [$i] . " type='checkbox' name=" . $Toppings [$i] . " value='y' checked/>";
	 	}
	 	else
		{
	 		echo $Toppings [$i] . ": <input id=" . $Toppings [$i] . " type='checkbox' name=" . $Toppings [$i] . " value='n'/>";
	 	}
	 }
	 ?>
 </br>
 </br>

	 <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	  															SIZE OF PIZZA
	  	 +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->

 <?php
 	echo "<h3> The size of your pizza </h3>";
 echo "Pizza Size: ";
	 $PizzaSize = array('small','medium','large');

	for($i = 0; $i < sizeof($PizzaSize); $i++)
	{
		if($PizzaSize[$i] == $row['size'])
		{
			echo $PizzaSize[$i] . ":<input id=" . $PizzaSize[$i] . " type='radio' name='pizzaSize' value=".$PizzaSize[$i]." checked/>";
			$pizzaSize = $PizzaSize[$i];
		}
		else
		{
			echo  $PizzaSize[$i] . ": <input id=" . $PizzaSize[$i] . " type='radio' name='pizzaSize' value=".$PizzaSize[$i]."/>";
		}
	}
	?>
</br>
</br>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
															 STUDENT
		+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
	<?php
	echo "<h3> Are You a student?</h3>";
	echo "Student:";

	if($row['student'] == 'y')
	{
 	echo "<input type='checkbox' name='student' checked/>";
  }
 else
 {
 	echo "<input type='checkbox' name='student'/>";
 }
 // +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
 // 															UPDATING
 // +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

 echo "<br><input type='submit' value='submit' name='submit'/>";
 ?>
 </form>
 <?php
 if(isset($_POST['submit']))
 {
 	$sql = "UPDATE orders Set student = '$student', firstname = '$fName', lastname = '$lName', email = '$email_Address', address = '$address', phone = '$phoneNo', size = '$pizzaSize' WHERE order_id = '$Order_ID'";
	 if ($DBConnection->query($sql) === TRUE)
	 {
		 echo "Record updated successfully";
	 }
	 else
	 {
		 echo "Error updating record: " . $DBConnection->error;
	 }
}

	  include 'Receipt.html.php';
	 ?>

</form>
</body>
</html>
