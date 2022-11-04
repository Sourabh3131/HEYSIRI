<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <!-- font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <title>Purchase Details</title>
</head>

<body>
<?php
    include("include/header.php");
    ?>
    <div class="container d-flex justify-content-center"><h2 class="align-middle">Purchase Details</h2></div>
    <div class="container  d-flex justify-content-center">
        
        <div class="col-md-6  d-flex justify-content-center">
            <input type="date" id="PurchaseDate" class="form-control form-control-sm" placeholder="Enter CLient name to place order" name="ClientName" />&nbsp;
            <button type="submit" name="submit" id="submit" class="btn btn-success" style="align-self: center;">
                Submit
            </button>
        </div>
        
    </div>
    <div class="container">
    <div id="detail" style="margin-top:16px;" class=" d-flex justify-content-center"></div> 
    </div>
    <script>
        $('#submit').on('click', function() {
            var date = $('#PurchaseDate').val()
            $('#detail').html('');
            $.ajax({
                type: "POST",
                data: {
                    date : date
                },
                url: 'include/fetch.php',
                success: function(data) {
                    $('#detail').html(data);
                },
            });
        });
    </script>
</body>
<script>
    var date = new Date();
    var year = date.getFullYear();
    var month = String(date.getMonth() + 1).padStart(2, '0');
    var todayDate = String(date.getDate()).padStart(2, '0');
    var datePattern = year + '-' + month + '-' + todayDate;
    document.getElementById("PurchaseDate").value = datePattern;
</script> 
</html>