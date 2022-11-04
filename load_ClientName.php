<?php

include("include/connection.php");

$search_name = $_POST['ClientName'];

$sql = "SELECT ClientName , ClientID FROM clientdetail WHERE ClientName LIKE '%{$search_name}%'";
$result = mysqli_query($conn, $sql) or die("SQL query failed.");

$output = "<option value=".">";

if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $output .= "<option>{$row['ClientName']}</option>";
  }
} else {
  $output .= "<option>Enter client name here.</option>";
}
// $output .= "</ul>";

echo $output;

?>