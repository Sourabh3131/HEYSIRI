<?php error_reporting(0); ?> 

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "thm";

$conn  = mysqli_connect($servername,$username,$password,$dbname);

if(!$conn){
    die("Connection failed". mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Details</title>
 <!-- Bootstrap -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

<!-- font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
<nav class="navbar navbar-light justify-content-center fs-3 mb-3" style="background-color: #FF5733">🚩The Hindu Mart🚩</nav>
<div class="container">

    <a href="add_customer.php" class="btn btn-dark mb-3">Add Customer<a>&nbsp;
            <a href="customer_details.php" class="btn btn-dark mb-3">Customer Details<a>&nbsp;
                    <a href="order_details.php" class="btn btn-dark mb-3">Order Details<a>&nbsp;
                            <a href="Item_details.php" class="btn btn-dark mb-3">Item Details<a>&nbsp;
                                    <a href="purchase_details.php" class="btn btn-dark mb-3">Purchase Details<a>&nbsp;
</div>
    <div class="container">
     
        <table class="table text-center" id="sample-table-1">
            <thead class="table-dark">
                <tr>
                <th scope="col">Packing Sorting Number</th>
                <!-- <th scope="col">Item Code</th>
                <th scope="col">Weight</th> -->
                <!-- <th scope="col">Unit</th> -->
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = mysqli_query($conn, "CALL upsPurchaseDetail('2022-10-31')");
                while ($row = mysqli_fetch_array($sql)) {
                ?>
                    <tr>
                        <td><?php echo $row['PurchaseByName']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>





    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>