<?php
include "config.php";
if (isset($_POST['submit'])) {
    $ClientName = $_POST['ClientName'];
    $MobileNumber = $_POST['MobileNumber'];
    $Building = $_POST['Building'];
    $FlatNumber = $_POST['FlatNumber'];
    $Address1 = $_POST['Address1'];
    $Address2 = $_POST['Address2'];
    $SecondName = $_POST['SecondName'];
    $SecondNumber = $_POST['SecondNumber'];
    $DisplayName = $_POST['DisplayName'];
    $Society = $_POST['Society'];
    
    $sql = "INSERT INTO `clientdetails`(`ClientID`, `ClientName`, `MobileNumber`, `Society`, `Building`, `Flat`, `Address1`, `Address2`, `SecondName`, `SecondMobile`, `DisplayName`) VALUES (NULL,'$ClientName','$MobileNumber','$Society','$Building','$FlatNumber','$Address1','$Address2','$SecondName','$SecondNumber','$DisplayName')";
    $result = mysqli_query($con, $sql);
    if($result){
        header("Location: client_details.php?msg=New record created sucessfully");
    }
    else{
        echo "Failed: ".mysqli_error($con);
    }

    // $sql = mysqli_query("INSERT INTO 'clientdetails'( 'ClientName', 'MobileNumber', 'Society', 'Building', 'Flat', 'Address1', 'Address2', 'SecondName', 'SecondMobile', 'DisplayName') VALUES ('$ClientName','$MobileNumber','$Society','$Building','$Flat','$Address1','$Address2','$SecondName','$SecondMobile','$DisplayName')");
    // if ($sql) {
    //     echo "<script>alert('Client info added Successfully');</script>";
    //     echo "<script>window.location.href ='client_details.php'</script>";
    // }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">\
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Client Details</title>
</head>

<body>
    <h2 style="text-align:center ">The Hindu Mart🚩</h2>
    <div class="main">
        <div class="main-div">
            <form>
                <h3 style="text-align: center;"><u>Client Details form</u></h3>
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
                        <option value="Seagull">Seagull</option>
                        <option value="Villa">Villa</option>
                        <option value="Recidency">Recidency</option>
                    </select>
                </div>


                <!-- <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Society
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Seagull</a>
                        <a class="dropdown-item" href="#">Villa</a>
                        <a class="dropdown-item" href="#">Recidency</a>
                    </div>
                </div> -->

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
                    <small id="emailHelp" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="Address2">ADDRESS2</label>
                    <input type="text" class="form-control" name="Address2" id="Address2" placeholder="ADDRES">
                </div>
                <div class="form-group">
                    <label for="exampleSecondName">Second Name</label>
                    <input type="text" class="form-control" name="SecondName" id="exampleSecondName" placeholder="Second Name">
                </div>
                <div class="form-group">
                    <label for="exampleSecondNumber">Second number</label>
                    <input type="text" class="form-control" name="SecondNumber" id="exampleSecondNumber" placeholder="Second Number">

                </div>
                <div class="form-group">
                    <label for="exampleDisplayName">Display name</label>
                    <input type="text" class="form-control" name="DisplayName" id="exampleDisplayName">
                </div>

                <!-- <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div> -->
                <button type="submit" name="submit" id="submit" class="btn btn-o btn-saucess">
                    Submit
                </button>             
                <!-- <input type="submit" class="btn btn-primary" name="submit" value="submit"> -->
            </form>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>