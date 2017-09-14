<?php
//create variables instead
$serverName = "localhost";
$userName = "root";
$password = "";
$DBName = "pizza";
$DBConnection = mysqli_connect($serverName, $userName, $password,$DBName);

if ($DBConnection === FALSE)
{

$error = "<p>Unable to connect to the database sever.</p>\n";
echo $error;
exit;

}
else
{
  //successful connection to dbms
  $DBName = "Pizza";
  $TableName = "orders";

  //select db on dbms
  if(!mysqli_select_db($DBConnection, $DBName))
  {
    $error = "<p>Unable to select the $DBName database!</p>";
    echo $error;
    exit;
  }
  echo "DEBUG PRINT : Database connection established.<br>";

}

  ?>
