<?php

//fetch.php;

$connect = new PDO("mysql:host=localhost; dbname=thm", "root", "");

if (isset($_POST['query'])) {
   $query = "
 SELECT DISTINCT ClientName FROM clientdetail 
 WHERE ClientName LIKE '%" . trim($_POST["query"]) . "%'
 ";

   $statement = $connect->prepare($query);

   $statement->execute();

   $result = $statement->fetchAll();

   $output = '';

   foreach ($result as $row) {
      $output .= '
  <li class="list-group-item contsearch">
   <a href="javascript:void(0)" class="gsearch" style="color:#333;text-decoration:none;">' . $row["ClientName"] . '</a>
  </li>
  ';
   }

   echo $output;
}

if (isset($_POST['email'])) {
   $query = "
 SELECT * FROM clientdetail 
 WHERE ClientName = '" . trim($_POST["email"]) . "' 
 LIMIT 1
 ";

   $statement = $connect->prepare($query);

   $statement->execute();

   $result = $statement->fetchAll();

   $output = '
 <table class="table table-borderless">
  <tr>
   <th>Client ID</th>
   <th>Mobile Number</th>
   <th>Society</th>
   <th>Building</th>
  </tr>
 ';

   foreach ($result as $row) {
      $output .= '
  <tr>
   <td><input type="text" name="ClientID" value="' . $row["ClientID"] . '" readonly /></td>
   <td>' . $row["MobileNumber"] . '</td>
   <td>' . $row["Society"] . '</td>
   <td>' . $row["Building"] . '</td>
  </tr>
  ';
   }
   $output .= '</table>';

   echo $output;
}

if (isset($_POST['date'])) {
   $query = "
 CALL upsPurchaseDetail( '" . trim($_POST["date"]) . "')";

   $statement = $connect->prepare($query);

   $statement->execute();

   $result = $statement->fetchAll();

   $output = '
 <table class="table text-center">
  <tr>
   <th>Purchase By Name</th>
  </tr>
 ';

   foreach ($result as $row) {
      $output .= '
  <tr>
   <td>' . $row["PurchaseByName"] . '</td>
  </tr>
  ';
   }
   $output .= '</table>';

   echo $output;
}

if (isset($_POST['bill_date'])) {
   $query = "
 CALL upsBillingDetail ('" . trim($_POST["bill_date"]) . "')";

   $statement = $connect->prepare($query);

   $statement->execute();

   $result = $statement->fetchAll();

   $output = '
 <table class="table table-bordered table-sm text-center">
  <tr>
   <th>Delivery Date</th>
   <th>Client Name</th>
   <th>Item Code</th>
   <th>Weight</th>
   <th>Todays Rate</th>
   <th>Item Bill</th>
   <th>Packing Sorting Number</th>
  </tr>
 ';

   foreach ($result as $row) {
      $output .= '
  <tr>
   <td>' . $row["DeliveryDate"] . '</td>
   <td>' . $row["ClientName"] . '</td>
   <td>' . $row["ItemCode"] . '</td>
   <td>' . $row["Weight"] . '</td>
   <td>' . $row["TodaysRate"] . '</td>
   <td>' . $row["ItemBill"] . '</td>
   <td>' . $row["PackingSortingNumber"] . '</td>
  </tr>
  ';
   }

   $output .= '</table>&nbsp;';
   echo $output;

//    $query1 = "
//  CALL upsBillingDetail ('" . trim($_POST["bill_date"]) . "')";

//    $statement1 = $connect->prepare($query1);

//    $statement1->execute();

//    $result1 = $statement1->fetchAll();

//    $output1 = '
//  <table class="table table-bordered table-sm text-center">
//   <tr>
//    <th>Client Name</th>
//    <th>Item Bill</th>
//   </tr>
//  ';

//    foreach ($result1 as $row1) {
//       $output1 .= '
//   <tr>
//    <td>' . $row1["ClientName"] . '</td>
//    <td>' . $row1["TotalBill"] . '</td>
//   </tr>
//   ';
//    }
//    $output1 .= '</table>';
//    echo $output1;
}
