<html>
	<head>
	<title>Delete Order</title>
	<meta charset ="utf-8" />
</head>

<body>
	<?php
session_start();
include 'inc_DBConnect.php';
$new = $_SESSION["order_id"];
$orderdelete = $new;

echo "are you sure you want to delete ", $new;
echo "<form action='DeleteOrder.php'>
    <input type='submit' value='$new' name='delete' 'yes'/>
</form>";


			if(isset($_GET['delete'])){
				$sql = "DELETE FROM orders WHERE order_id = '$orderdelete'";

			if ($DBConnection->query($sql) === TRUE) {
					echo "Record deleted successfully<br>";
			} else {
					echo "Error deleting record: " . $DBConnection->error;
			}
		}
?>

<!-- <?php
session_start();

include 'inc_DBConnect.php';

// Check connection
if (!$DBConnection) {
    die("Connection failed: " . mysqli_connect_error());
}
$new = $_SESSION["order_id"];
$orderdelete = $new;

// sql to delete a record
$sql = "DELETE FROM orders WHERE order_id = '$orderdelete'";
echo $sql;
if (mysqli_query($DBConnection, $sql))
{
  echo "Record deleted successfully";
}
else
{
  echo "Error deleting record: " . mysqli_error($DBConnection);
}
mysqli_close($DBConnection);
?> -->
</body>
</html>
