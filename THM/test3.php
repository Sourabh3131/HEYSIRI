<?php error_reporting(0); ?> 

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "thm";

$conn  = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed" . mysqli_connect_error());
}


$sql = "select * from itemdetail where ItemType = 'Vegetable'";
$vegetable = mysqli_query($conn, $sql);
$vegetable2 = mysqli_query($conn, $sql);
$vegetable3 = mysqli_query($conn, $sql);
$vegetable4 = mysqli_query($conn, $sql);
$vegetable5 = mysqli_query($conn, $sql);
$vegetable6 = mysqli_query($conn, $sql);
$vegetable7 = mysqli_query($conn, $sql);
$vegetable8 = mysqli_query($conn, $sql);





if (isset($_POST['submit'])) {

    $ClientID = $_POST['ClientID'];    

    $ClientName = $_POST['ClientName'];
    $DeliveryDate = $_POST['DeliveryDate'];

    $VegItemCode1 = $_POST['vegetable_1'];
    $VegItemCode2 = $_POST['vegetable_2'];
    $VegItemCode3 = $_POST['vegetable_3'];
    $VegItemCode4 = $_POST['vegetable_4'];
    $VegItemCode5 = $_POST['vegetable_5'];
    $VegItemCode6 = $_POST['vegetable_6'];
    $VegItemCode7 = $_POST['vegetable_7'];
    $VegItemCode8 = $_POST['vegetable_8'];


    $VegQuantity1 = $_POST['vegetable_qty_1'];
    $VegQuantity2 = $_POST['vegetable_qty_2'];
    $VegQuantity3 = $_POST['vegetable_qty_3'];
    $VegQuantity4 = $_POST['vegetable_qty_4'];
    $VegQuantity5 = $_POST['vegetable_qty_5'];
    $VegQuantity6 = $_POST['vegetable_qty_6'];
    $VegQuantity7 = $_POST['vegetable_qty_7'];
    $VegQuantity8 = $_POST['vegetable_qty_8'];




    $insert_sql = "CALL upsCreateOrderTest('$ClientID','$DeliveryDate','$VegItemCode1','$VegItemCode2','$VegItemCode3','$VegItemCode4','$VegItemCode5','$VegItemCode6','$VegItemCode7','$VegItemCode8','$VegQuantity1','$VegQuantity2','$VegQuantity3','$VegQuantity4','$VegQuantity5','$VegQuantity6','$VegQuantity7','$VegQuantity8')";

    $result1 = mysqli_query($conn, $insert_sql);

    if ($result1) {
        header("Location: order_details.php?msg=New record created sucessfully");
        echo "<script>alert('Order Created Sucessfully!!')</script>";
    } else {
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
    <!-- <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script> -->


    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <!-- font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>


    <!-- search client scripts -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="JsLocalSearch.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
    <style>
        .mark {
            background-color: #d7ffe7 !important
        }

        .mark .gsearch {
            font-size: 20px
        }

        .unmark {
            background-color: #e8e8e8 !important
        }

        .unmark .gsearch {
            font-size: 10px
        }

        .marktext {
            font-weight: bold;
            background-color: antiquewhite;
        }
    </style>



    <!-- end search client scripts -->

    <title>Purchase Details</title>
</head>

<body onload="addDate();">
    <nav class="navbar navbar-light justify-content-center fs-3 mb-3" style="background-color: #FF5733">🚩The Hindu Mart🚩</nav>

    <div class="d-flex justify-content-center">
        <a href="add_customer.php" class="btn btn-dark mb-3">Add Customer<a>&nbsp;
                <a href="customer_details.php" class="btn btn-dark mb-3">Customer Details<a>&nbsp;
                        <a href="order_details.php" class="btn btn-dark mb-3">Order Details<a>&nbsp;
                                <a href="Item_details.php" class="btn btn-dark mb-3">Item Details<a>&nbsp;
                                        <a href="purchase_details.php" class="btn btn-dark mb-3">Purchase Details<a>&nbsp;
    </div>

    <div class="container">
        <form action="" method="post" id="search-form" style="width:70vw; ">
            <!-- Client search code 1 -->
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <input type="text" id="gsearchsimple" class="form-control form-control-sm" placeholder="Enter CLient name to place order" name="ClientName" />
                    <ul class="list-group">
                    </ul>
                    <div id="localSearchSimple"></div>
                    <div id="detail" style="margin-top:16px;"></div>
                </div>
                <div class="col-md-3"></div>
            </div>

            <script>
                $(document).ready(function() {
                    $('#gsearchsimple').keyup(function() {
                        var query = $('#gsearchsimple').val();
                        $('#detail').html('');
                        $('.list-group').css('display', 'block');
                        if (query.length == 2) {
                            $.ajax({
                                url: "fetch.php",
                                method: "POST",
                                data: {
                                    query: query
                                },
                                success: function(data) {
                                    $('.list-group').html(data);
                                }
                            })
                        }
                        if (query.length == 0) {
                            $('.list-group').css('display', 'none');
                        }
                    });

                    $('#localSearchSimple').jsLocalSearch({
                        action: "Show",
                        html_search: true,
                        mark_text: "marktext"
                    });

                    $(document).on('click', '.gsearch', function() {
                        var email = $(this).text();
                        $('#gsearchsimple').val(email);
                        $('.list-group').css('display', 'none');
                        $.ajax({
                            url: "fetch.php",
                            method: "POST",
                            data: {
                                email: email
                            },
                            success: function(data) {
                                $('#detail').html(data);
                            }
                        })
                    });
                });
            </script>
            <!-- End Client search code 1 -->


            <div class="form-group d-flex justify-content-center">
                <lable for="DeliveryDate">Enter Delivery Date : </lable>&nbsp;
                <input type="date" name="DeliveryDate" id="DeliveryDate" placeholder="Enter Here..." />
            </div>

            <div class="container d-flex justify-content-center">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col" style="width:33%; min-width:90px; text-align: center">Vegetable</th>
                            <th scope="col" style="width:33%; min-width:90px; text-align: center">Fruit</th>
                            <th scope="col" style="width:33%; min-width:90px; text-align: center">Chicken</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="btn-group dropright">
                                    <select class="form-control form-control-sm" name="vegetable_1">
                                    <option value="">Select</option>
                                        <?php
                                        while ($category = mysqli_fetch_array($vegetable)) :;
                                        ?>
                                            <option value="<?php echo $category["ItemCode"]; ?>">
                                                <?php echo $category["ItemCode"]; ?>
                                            </option>
                                        <?php
                                        endwhile;
                                        ?>
                                    </select>&nbsp;
                                    <select class="form-control form-control-sm" name="vegetable_qty_1">
                                        <option value="0">0</option>
                                        <option value="0.25">0.25</option>
                                        <option value="0.5">0.5</option>
                                        <option value="1">1</option>
                                        <option value="1.5">1.5</option>
                                        <option value="2">2</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </td>
                            <td>
                                <div class="btn-group dropright">
                                    <select class="form-control form-control-sm">
                                        <option>पिअर/पिअर </option>
                                        <option>सफरचंद/सेब</option>
                                        <option>संत्रे/संतरा </option>
                                        <option>मोसंबी/मोसंबी</option>
                                        <option>पेरू/अमरूद</option>
                                        <option>अननस/अननस</option>
                                    </select>&nbsp;
                                    <select class="form-control form-control-sm">
                                        <option value="0">0</option>
                                        <option value="0.25">0.25</option>
                                        <option value="0.5">0.5</option>
                                        <option value="1">1</option>
                                        <option value="1.5">1.5</option>
                                        <option value="2">2</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </td>
                            <td>
                                <div class="btn-group dropright">
                                    <select class="form-control form-control-sm">
                                        <option>Whole Chicken</option>
                                        <option>Boneless Chicken</option>
                                        <option>Skinless Chicken</option>
                                        <option>With Skin Ckicken</option>
                                        <option>Biryani Chicken</option>
                                        <option>Tandoor Chicken</option>
                                    </select>&nbsp;
                                    <select class="form-control form-control-sm">
                                        <option value="0">0</option>
                                        <option value="0.25">0.25</option>
                                        <option value="0.5">0.5</option>
                                        <option value="1">1</option>
                                        <option value="1.5">1.5</option>
                                        <option value="2">2</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="btn-group dropright">
                                    <select class="form-control form-control-sm" name="vegetable_2">
                                    <option value="">Select</option>
                                       <?php
                                        while ($category = mysqli_fetch_array($vegetable2, MYSQLI_ASSOC)) :;
                                        ?>
                                            <option value="<?php echo $category["ItemCode"]; ?>">
                                                <?php echo $category["ItemCode"]; ?>
                                            </option>
                                        <?php endwhile; ?>
                                    </select>&nbsp;
                                    <select class="form-control form-control-sm" name="vegetable_qty_2">
                                        <option value="0">0</option>
                                        <option value="0.25">0.25</option>
                                        <option value="0.5">0.5</option>
                                        <option value="1">1</option>
                                        <option value="1.5">1.5</option>
                                        <option value="2">2</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </td>
                            <td>
                                <div class="btn-group dropright">
                                    <select class="form-control form-control-sm" name="">
                                        <option>पिअर/पिअर </option>
                                        <option>सफरचंद/सेब</option>
                                        <option>संत्रे/संतरा </option>
                                        <option>मोसंबी/मोसंबी</option>
                                        <option>पेरू/अमरूद</option>
                                        <option>अननस/अननस</option>
                                    </select>&nbsp;
                                    <select class="form-control form-control-sm">
                                        <option value="0">0</option>
                                        <option value="0.25">0.25</option>
                                        <option value="0.5">0.5</option>
                                        <option value="1">1</option>
                                        <option value="1.5">1.5</option>
                                        <option value="2">2</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </td>
                            <td>
                                <div class="btn-group dropright">
                                    <select class="form-control form-control-sm">
                                        <option>Whole Chicken</option>
                                        <option>Boneless Chicken</option>
                                        <option>Skinless Chicken</option>
                                        <option>With Skin Ckicken</option>
                                        <option>Biryani Chicken</option>
                                        <option>Tandoor Chicken</option>
                                    </select>&nbsp;
                                    <select class="form-control form-control-sm">
                                        <option value="0">0</option>
                                        <option value="0.25">0.25</option>
                                        <option value="0.5">0.5</option>
                                        <option value="1">1</option>
                                        <option value="1.5">1.5</option>
                                        <option value="2">2</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="btn-group dropright">
                                    <select class="form-control form-control-sm" name="vegetable_3">
                                    <option value="">Select</option>
                                    <?php
                                        while ($category = mysqli_fetch_array($vegetable3, MYSQLI_ASSOC)) :;
                                        ?>
                                            <option value="<?php echo $category["ItemCode"]; ?>">
                                                <?php echo $category["ItemCode"]; ?>
                                            </option>
                                        <?php endwhile; ?>
                                    </select>&nbsp;
                                    <select class="form-control form-control-sm" name="vegetable_qty_3">
                                        <option value="0">0</option>
                                        <option value="0.25">0.25</option>
                                        <option value="0.5">0.5</option>
                                        <option value="1">1</option>
                                        <option value="1.5">1.5</option>
                                        <option value="2">2</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </td>
                            <td>
                                <div class="btn-group dropright">
                                    <select class="form-control form-control-sm">
                                        <option>पिअर/पिअर </option>
                                        <option>सफरचंद/सेब</option>
                                        <option>संत्रे/संतरा </option>
                                        <option>मोसंबी/मोसंबी</option>
                                        <option>पेरू/अमरूद</option>
                                        <option>अननस/अननस</option>
                                    </select>&nbsp;
                                    <select class="form-control form-control-sm">
                                        <option value="0">0</option>
                                        <option value="0.25">0.25</option>
                                        <option value="0.5">0.5</option>
                                        <option value="1">1</option>
                                        <option value="1.5">1.5</option>
                                        <option value="2">2</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </td>
                            <td>
                                <div class="btn-group dropright">
                                    <select class="form-control form-control-sm">
                                        <option>Whole Chicken</option>
                                        <option>Boneless Chicken</option>
                                        <option>Skinless Chicken</option>
                                        <option>With Skin Ckicken</option>
                                        <option>Biryani Chicken</option>
                                        <option>Tandoor Chicken</option>
                                    </select>&nbsp;
                                    <select class="form-control form-control-sm">
                                        <option value="0">0</option>
                                        <option value="0.25">0.25</option>
                                        <option value="0.5">0.5</option>
                                        <option value="1">1</option>
                                        <option value="1.5">1.5</option>
                                        <option value="2">2</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="btn-group dropright">
                                    <select class="form-control form-control-sm" name="vegetable_4">
                                    <option value="">Select</option>
                                        <?php
                                        while ($category = mysqli_fetch_array($vegetable4, MYSQLI_ASSOC)) :;
                                        ?>
                                            <option value="<?php echo $category["ItemCode"]; ?>">
                                                <?php echo $category["ItemCode"]; ?>
                                            </option>
                                        <?php endwhile; ?>
                                    </select>&nbsp;
                                    <select class="form-control form-control-sm" name="vegetable_qty_4">
                                        <option value="0">0</option>
                                        <option value="0.25">0.25</option>
                                        <option value="0.5">0.5</option>
                                        <option value="1">1</option>
                                        <option value="1.5">1.5</option>
                                        <option value="2">2</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </td>
                            <td>
                                <div class="btn-group dropright">
                                    <select class="form-control form-control-sm">
                                        <option>पिअर/पिअर </option>
                                        <option>सफरचंद/सेब</option>
                                        <option>संत्रे/संतरा </option>
                                        <option>मोसंबी/मोसंबी</option>
                                        <option>पेरू/अमरूद</option>
                                        <option>अननस/अननस</option>
                                    </select>&nbsp;
                                    <select class="form-control form-control-sm">
                                        <option value="0">0</option>
                                        <option value="0.25">0.25</option>
                                        <option value="0.5">0.5</option>
                                        <option value="1">1</option>
                                        <option value="1.5">1.5</option>
                                        <option value="2">2</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </td>
                            <td>
                                <div class="btn-group dropright">
                                    <select class="form-control form-control-sm">
                                        <option>Whole Chicken</option>
                                        <option>Boneless Chicken</option>
                                        <option>Skinless Chicken</option>
                                        <option>With Skin Ckicken</option>
                                        <option>Biryani Chicken</option>
                                        <option>Tandoor Chicken</option>
                                    </select>&nbsp;
                                    <select class="form-control form-control-sm">
                                        <option value="0">0</option>
                                        <option value="0.25">0.25</option>
                                        <option value="0.5">0.5</option>
                                        <option value="1">1</option>
                                        <option value="1.5">1.5</option>
                                        <option value="2">2</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="btn-group dropright">
                                    <select class="form-control form-control-sm" name="vegetable_5">
                                    <option value="">Select</option>
                                        <?php
                                        while ($category = mysqli_fetch_array($vegetable5, MYSQLI_ASSOC)) :;
                                        ?>
                                            <option value="<?php echo $category["ItemCode"]; ?>">
                                                <?php echo $category["ItemCode"]; ?>
                                            </option>
                                        <?php endwhile; ?>
                                    </select>&nbsp;
                                    <select class="form-control form-control-sm" name="vegetable_qty_5">
                                        <option value="0">0</option>
                                        <option value="0.25">0.25</option>
                                        <option value="0.5">0.5</option>
                                        <option value="1">1</option>
                                        <option value="1.5">1.5</option>
                                        <option value="2">2</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </td>
                            <td>
                                <div class="btn-group dropright">
                                    <select class="form-control form-control-sm">
                                        <option>पिअर/पिअर </option>
                                        <option>सफरचंद/सेब</option>
                                        <option>संत्रे/संतरा </option>
                                        <option>मोसंबी/मोसंबी</option>
                                        <option>पेरू/अमरूद</option>
                                        <option>अननस/अननस</option>
                                    </select>&nbsp;
                                    <select class="form-control form-control-sm">
                                        <option value="0">0</option>
                                        <option value="0.25">0.25</option>
                                        <option value="0.5">0.5</option>
                                        <option value="1">1</option>
                                        <option value="1.5">1.5</option>
                                        <option value="2">2</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </td>
                            <td>
                                <div class="btn-group dropright">
                                    <select class="form-control form-control-sm">
                                        <option>Whole Chicken</option>
                                        <option>Boneless Chicken</option>
                                        <option>Skinless Chicken</option>
                                        <option>With Skin Ckicken</option>
                                        <option>Biryani Chicken</option>
                                        <option>Tandoor Chicken</option>
                                    </select>&nbsp;
                                    <select class="form-control form-control-sm">
                                        <option value="0">0</option>
                                        <option value="0.25">0.25</option>
                                        <option value="0.5">0.5</option>
                                        <option value="1">1</option>
                                        <option value="1.5">1.5</option>
                                        <option value="2">2</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="btn-group dropright">
                                    <select class="form-control form-control-sm" name="vegetable_6">
                                    <option value="">Select</option>
                                        <?php
                                        while ($category = mysqli_fetch_array($vegetable6, MYSQLI_ASSOC)) :;
                                        ?>
                                            <option value="<?php echo $category["ItemCode"]; ?>">
                                                <?php echo $category["ItemCode"]; ?>
                                            </option>
                                        <?php endwhile; ?>
                                    </select>&nbsp;
                                    <select class="form-control form-control-sm" name="vegetable_qty_6">
                                        <option value="0">0</option>
                                        <option value="0.25">0.25</option>
                                        <option value="0.5">0.5</option>
                                        <option value="1">1</option>
                                        <option value="1.5">1.5</option>
                                        <option value="2">2</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </td>
                            <td>
                                <div class="btn-group dropright">
                                    <select class="form-control form-control-sm">
                                        <option>पिअर/पिअर </option>
                                        <option>सफरचंद/सेब</option>
                                        <option>संत्रे/संतरा </option>
                                        <option>मोसंबी/मोसंबी</option>
                                        <option>पेरू/अमरूद</option>
                                        <option>अननस/अननस</option>
                                    </select>&nbsp;
                                    <select class="form-control form-control-sm">
                                        <option value="0">0</option>
                                        <option value="0.25">0.25</option>
                                        <option value="0.5">0.5</option>
                                        <option value="1">1</option>
                                        <option value="1.5">1.5</option>
                                        <option value="2">2</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </td>
                            <td>
                                <div class="btn-group dropright">
                                    <select class="form-control form-control-sm">
                                        <option>Whole Chicken</option>
                                        <option>Boneless Chicken</option>
                                        <option>Skinless Chicken</option>
                                        <option>With Skin Ckicken</option>
                                        <option>Biryani Chicken</option>
                                        <option>Tandoor Chicken</option>
                                    </select>&nbsp;
                                    <select class="form-control form-control-sm">
                                        <option value="0">0</option>
                                        <option value="0.25">0.25</option>
                                        <option value="0.5">0.5</option>
                                        <option value="1">1</option>
                                        <option value="1.5">1.5</option>
                                        <option value="2">2</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="btn-group dropright">
                                    <select class="form-control form-control-sm" name="vegetable_7">
                                    <option value="">Select</option>
                                        <?php
                                        while ($category = mysqli_fetch_array($vegetable7, MYSQLI_ASSOC)) :;
                                        ?>
                                            <option value="<?php echo $category["ItemCode"]; ?>">
                                                <?php echo $category["ItemCode"]; ?>
                                            </option>
                                        <?php endwhile; ?>
                                    </select>&nbsp;
                                    <select class="form-control form-control-sm" name="vegetable_qty_7">
                                        <option value="0">0</option>
                                        <option value="0.25">0.25</option>
                                        <option value="0.5">0.5</option>
                                        <option value="1">1</option>
                                        <option value="1.5">1.5</option>
                                        <option value="2">2</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </td>
                            <td>
                                <div class="btn-group dropright">
                                    <select class="form-control form-control-sm">
                                        <option>पिअर/पिअर </option>
                                        <option>सफरचंद/सेब</option>
                                        <option>संत्रे/संतरा </option>
                                        <option>मोसंबी/मोसंबी</option>
                                        <option>पेरू/अमरूद</option>
                                        <option>अननस/अननस</option>
                                    </select>&nbsp;
                                    <select class="form-control form-control-sm">
                                        <option value="0">0</option>
                                        <option value="0.25">0.25</option>
                                        <option value="0.5">0.5</option>
                                        <option value="1">1</option>
                                        <option value="1.5">1.5</option>
                                        <option value="2">2</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </td>
                            <td>
                                <div class="btn-group dropright">
                                    <select class="form-control form-control-sm">
                                        <option>Whole Chicken</option>
                                        <option>Boneless Chicken</option>
                                        <option>Skinless Chicken</option>
                                        <option>With Skin Ckicken</option>
                                        <option>Biryani Chicken</option>
                                        <option>Tandoor Chicken</option>
                                    </select>&nbsp;
                                    <select class="form-control form-control-sm">
                                        <option value="0">0</option>
                                        <option value="0.25">0.25</option>
                                        <option value="0.5">0.5</option>
                                        <option value="1">1</option>
                                        <option value="1.5">1.5</option>
                                        <option value="2">2</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="btn-group dropright">
                                    <select class="form-control form-control-sm" name="vegetable_8">
                                    <option value="">Select</option>
                                        <?php
                                        while ($category = mysqli_fetch_array($vegetable8, MYSQLI_ASSOC)) :;
                                        ?>
                                            <option value="<?php echo $category["ItemCode"]; ?>">
                                                <?php echo $category["ItemCode"]; ?>
                                            </option>
                                        <?php endwhile; ?>
                                    </select>&nbsp;
                                    <select class="form-control form-control-sm" name="vegetable_qty_8">
                                        <option value="0">0</option>
                                        <option value="0.25">0.25</option>
                                        <option value="0.5">0.5</option>
                                        <option value="1">1</option>
                                        <option value="1.5">1.5</option>
                                        <option value="2">2</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </td>
                            <td>
                                <div class="btn-group dropright">
                                    <select class="form-control form-control-sm">
                                        <option>पिअर/पिअर </option>
                                        <option>सफरचंद/सेब</option>
                                        <option>संत्रे/संतरा </option>
                                        <option>मोसंबी/मोसंबी</option>
                                        <option>पेरू/अमरूद</option>
                                        <option>अननस/अननस</option>
                                    </select>&nbsp;
                                    <select class="form-control form-control-sm">
                                        <option value="0">0</option>
                                        <option value="0.25">0.25</option>
                                        <option value="0.5">0.5</option>
                                        <option value="1">1</option>
                                        <option value="1.5">1.5</option>
                                        <option value="2">2</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </td>
                            <td>
                                <div class="btn-group dropright">
                                    <select class="form-control form-control-sm">
                                        <option>Whole Chicken</option>
                                        <option>Boneless Chicken</option>
                                        <option>Skinless Chicken</option>
                                        <option>With Skin Ckicken</option>
                                        <option>Biryani Chicken</option>
                                        <option>Tandoor Chicken</option>
                                    </select>&nbsp;
                                    <select class="form-control form-control-sm">
                                        <option value="0">0</option>
                                        <option value="0.25">0.25</option>
                                        <option value="0.5">0.5</option>
                                        <option value="1">1</option>
                                        <option value="1.5">1.5</option>
                                        <option value="2">2</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
            <div class="container">
                <div style="align-self: center;">
                    <button type="submit" name="submit" id="submit" class="btn btn-success" style="align-self: center;">
                        Submit
                    </button>
                </div>
            </div>
        </form>
    </div>

</body>
<script>
      var date = new Date();
      var year = date.getFullYear();
      var month = String(date.getMonth()+1).padStart(2,'0');
      var todayDate = String(date.getDate()).padStart(2,'0');
      var datePattern = year + '-' + month + '-' + todayDate;
      document.getElementById("DeliveryDate").value = datePattern;
    </script>
</html>