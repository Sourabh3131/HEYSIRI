<?php
include ("include/connection.php");
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
<?php include ('include/header.php'); ?>
    <div class="container">
        <?php
        if(isset($_GET['msg'])){
            $msg = $_GET['msg'];
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            '.$msg.'
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }
        ?>
        <table class="table table-hover text-center table-bordered table-sm" id="sample-table-1">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ClientID</th>
                    <th scope="col">Client Name</th>
                    <th scope="col">Mobile Number</th>
                    <th scope="col">Society</th>
                    <th scope="col">Building</th>
                    <th scope="col">Flat Number </th>
                    <th scope="col">Address 1</th>
                    <th scope="col">Address 2</th>
                    <th scope="col">Second Name </th>
                    <th scope="col">Second Mobile</th>
                    <th scope="col">Display Name </th>
                    <!-- <th scope="col">Action</th> -->
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = mysqli_query($conn, "select * from clientdetail");
                while ($row = mysqli_fetch_array($sql)) {
                ?>
                    <tr>

                        <td><?php echo $row['ClientID']; ?></td>
                        <td><?php echo $row['ClientName']; ?></td>
                        <td><?php echo $row['MobileNumber']; ?></td>
                        <td><?php echo $row['Society']; ?></td>
                        <td><?php echo $row['Building']; ?></td>
                        <td><?php echo $row['Flat']; ?></td>
                        <td><?php echo $row['Address1']; ?></td>
                        <td><?php echo $row['Address2']; ?></td>
                        <td><?php echo $row['SecondName']; ?></td>
                        <td><?php echo $row['SecondMobile']; ?></td>
                        <td><?php echo $row['DisplayName']; ?></td>
                        <!-- <td>
                            <a href="edit_customer.php?id=<?php echo $row['ClientID'] ?>"  class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
                            <a href="delete_customer.php?id=<?php echo $row['ClientID'] ?>"  class="link-dark"><i class="fa-solid fa-trash fs-5 me-3"></i></a>
                        </td> -->
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