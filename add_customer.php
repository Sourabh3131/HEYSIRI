<?php
include ("include/connection.php");

if(isset($_POST['submit'])){
    $ClientName = $_POST['ClientName'];
    $MobileNumber = $_POST['MobileNumber'];
    $Society = $_POST['Society'];
    $Building = $_POST['Building'];
    $FlatNumber = $_POST['FlatNumber'];
    $Address1 = $_POST['Address1'];
    $Address2 = $_POST['Address2'];
    $SecondName = $_POST['SecondName'];
    $SecondNumber = $_POST['SecondNumber'];
    $DisplayName = $_POST['DisplayName'];

    $sql = "INSERT INTO `clientdetail`(`ClientName`, `MobileNumber`, `Society`, `Building`, `Flat`, `Address1`, `Address2`, `SecondName`, `SecondMobile`, `DisplayName`) VALUES ('$ClientName','$MobileNumber','$Society','$Building','$FlatNumber','$Address1','$Address2','$SecondName',' $SecondNumber','$DisplayName')";
    $result = mysqli_query($conn,$sql);

    if($result) {
        header("Location: add_customer.php?msg=Data Inserted Sucessfully for ".$ClientName.".");
    }
    else{
        echo "Failed: " . mysqli_error($conn);
    }

}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Customer</title>

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
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            '.$msg.'
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }
        ?>
        <div class="text-center">
            <h3>Add New Customer</h3>
            <p class="text-muted">Complete following form to add new user.</p>
        </div>

        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width:50vw; min-width:300px;">
                <div class="form-group">
                    <label for="ClientName1">Client Name</label>
                    <input type="text" class="form-control" name="ClientName" id="ClientName" placeholder="Enter Client Name">
                </div>

                <div class="form-group">
                    <label for="MobileNumber">Mobile Number</label>
                    <input type="text" class="form-control" name="MobileNumber" id="MobileNumber" placeholder="Enter Mobile Number">
                </div>

                <div class="form-group">
                    <label for="Society">Society</label>
                    <select name="Society" class="form-control">
                        <option>Select Society</option>
                        <option value="Green City">Green City</option>
                        <option value="Navratna">Navratna</option>
                        <option value="Pebble Park">Pebble Park</option>
                        <option value="Runwal">Runwal</option>
                        <option value="Sanskruti">Sanskruti</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="Building">Building</label>
                    <input type="text" class="form-control" name="Building" id="Building" placeholder="Enter Building Number or Name">
                </div>
                <div class="form-group">
                    <label for="FlatNumber">Flat Number</label>
                    <input type="text" class="form-control" name="FlatNumber" id="FlatNumber" placeholder="Enter Flat/Apartment Number">
                </div>

                <div class="form-group">
                    <label for="Address1">ADDRESS1</label>
                    <input type="text" class="form-control" name="Address1" id="Address1" placeholder="ADDRESS">
                    
                </div>
                <div class="form-group">
                    <label for="Address2">ADDRESS2</label>
                    <input type="text" class="form-control" name="Address2" id="Address2" placeholder="ADDRES">
                </div>
                <div class="form-group">
                    <label for="SecondName">Second Name</label>
                    <input type="text" class="form-control" name="SecondName" id="SecondName" placeholder="Second Name">
                </div>
                <div class="form-group">
                    <label for="SecondNumber">Second number</label>
                    <input type="text" class="form-control" name="SecondNumber" id="SecondNumber" placeholder="Second Number">

                </div>
                <div class="form-group">
                    <label for="DisplayName">Display name</label>
                    <input type="text" class="form-control" name="DisplayName" id="DisplayName">
                </div>

                <div style="align-self: center;">
                <button type="submit" name="submit" id="submit" class="btn btn-success" style="align-self: center;">
                    Submit
                </button>
                </div> 
            </form>
        </div>
    </div>


    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>