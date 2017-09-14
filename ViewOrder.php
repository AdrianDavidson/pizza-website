<!DOCTYPE html>
<head>
    <meta charset = "utf-8">
        <title>View Order</title>
</head>
<body>
<?php

//Generate a unique ID number
$Order_ID = uniqid();

session_start();
$_SESSION["order_id"] = $Order_ID;

$fName = "";
$lName = "";
$email_Address = "";
$address = "";
$phoneNo = "";
$price = 0;

include 'inc_DBConnect.php';

function validateInput($input, $DBConnection)
{
  $input = trim($input);
  $input = stripslashes($input);
  //$input = htmlspecialchars($input);
  $input = mysqli_real_escape_string($DBConnection, $input);
  return $input;
}

if ($_SERVER['REQUEST_METHOD'] == "POST") //form has been submitted by POST method
{
  $fName = validateInput($_POST["firstName"], $DBConnection);
  $lName = validateInput($_POST["lastName"], $DBConnection);
  $address = validateInput($_POST["address"], $DBConnection);
  $email_Address = validateInput($_POST["emailAddress"], $DBConnection);
  $phoneNo = validateInput($_POST["phoneNo"], $DBConnection);
  $price = validateInput($_POST["totalPrice"], $DBConnection);

// +++++++++++++++++++++++++++++++
//    displays the size selected
// +++++++++++++++++++++++++++++++
  if(isset($_POST['pizzaSize']))
  {
    if($_POST['pizzaSize'] == "small")
    {
      $size = "small";
      // echo $size;
    }
    if($_POST['pizzaSize']=="medium")
    {
      $size = "medium";
      // echo $size;
    }
    if($_POST ['pizzaSize'] == "large")
    {
      $size = "large";
      // echo $size;
    }
  }

  // +++++++++++++++++++++++++++++++++
  //  displays the toppings selected
  // +++++++++++++++++++++++++++++++++

  $student = 'N';
  $anchovies = 'N';
  $pineapple = 'N';
  $pepperoni = 'N';
  $olives = 'N';
  $onions = 'N';
  $peppers = 'N';

if(isset($_POST['student'])){
  $student = 'Y';}
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

  $insertSQL = "INSERT INTO orders (order_id, student, firstname, lastname, email, address, phone, price, size, anchovies, pineapple, pepperoni, peppers, olives, onion)
  VALUES ('$Order_ID', '$student','$fName','$lName','$email_Address','$address','$phoneNo','$price','$size','$anchovies', '$pineapple','$pepperoni','$peppers','$olives','$onions')";

  if($DBConnection ->query($insertSQL) === TRUE)
  {
    echo "A new entry was succesfully created";
  }
  else {
    echo "Error: " . $insertSQL . "<br>" . $DBConnection->error;
  }
    mysqli_close($DBConnection);
}
include 'Receipt.html.php';
?>
</br>
</body>
</html>
