<?php 
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Obaju e-commerce template">
    <meta name="author" content="Ondrej Svestka | ondrejsvestka.cz">
    <meta name="keywords" content="">

    <title>
        Online Auction System
    </title>

    <meta name="keywords" content="">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>

    <!-- styles -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- theme stylesheet -->
    <link href="css/style.default.css" rel="stylesheet" id="theme-stylesheet">

    <!-- your stylesheet with modifications -->
    <link href="css/custom.css" rel="stylesheet">

    <script src="js/respond.min.js"></script>

    <link rel="shortcut icon" href="favicon.png">


    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    
</head>

<body>

    <?php include 'header.php';?>

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="index.php">Home</a>
                        </li>
                        <li>Manage Bids</li>
                    </ul>

                </div>

                <div class="col-md-3">
                    <!-- *** PAGES MENU ***
 _________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Quick Links</h3>
                        </div>

                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked">
                                <li>
                                    <a href="index.php">Home</a>
                                </li>
                                <li>
                                    <a href="contact.php">Contact Us</a>
                                </li>
                                <li>
                                    <a href="faq.php">FAQ</a>
                                </li>

                            </ul>

                        </div>
                    </div>

                    <!-- *** PAGES MENU END *** -->


                    <!-- <div class="banner">
                        <a href="#">
                            <img src="img/banner.jpg" alt="sales 2014" class="img-responsive">
                        </a>
                    </div> -->
                </div>

                <div class="col-md-9">
                    <?php 

                        $query = "SELECT * FROM bids INNER JOIN item INNER JOIN profile INNER JOIN solditems WHERE bids.ItemID = item.ItemID AND bids.BidderID = profile.id AND bids.id = solditems.BidID";
                        $result = mysqli_query($db, $query);

                    ?>

                    <div class="box" id="contact">
                        <h1>Manage Bids</h1>

                        <!-- <p class="lead">Please leave you feedback. We will be happy to respond! </p> -->
                        

                        <hr>

                        <?php
                        if(isset($_GET['err'])) {
                            echo '
                                    <div class="alert alert-info">
                                         <strong>Sorry!</strong> You need to <a href="register.php">log in</a> to add a listing.
                                    </div>
                                    ';
                        }
                        ?>
                        

                        <div class="table-responsive">              
                          <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                              <th>Product</th>
                              <th>Bidder</th>
                              <th>Amount</th>
                              <th>Status</th>
                              <th>Payment</th>
                              <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php  
                              foreach($result as $row)  
                              {  
                                $color = "btn-success";
                                $status = $row["status"];

                                if ($status == "Won") {
                                  $statuscolor = "btn-success";
                                } elseif ($status == "Pending") {
                                  $statuscolor = "btn-warning";
                                }

                                if ($row['payment'] == "Paid") {
                                    $color = "btn-success";
                                } elseif ($row['payment'] == "Pending") {
                                    $color = "btn-warning";
                                }

                                    echo '  
                                    <tr>  
                                        <td>'.$row["ItemName"].'</td>  
                                        <td>'.$row["firstname"]. " " .$row["lastname"].'</td>
                                        <td>'.$row["BidAmount"].'</td>
                                        <td><button type="button" name="status" class="btn btn-xs '.$statuscolor.' status" disabled>'.$row["status"].'</button></td>
                                        <td><button type="button" name="payment" class="btn btn-xs '.$color.' status" disabled>'.$row["payment"].'</button></td>
                                        <td><button type="button" name="transfer" class="btn btn-xs btn-primary status"><a class="text-danger" href="transfer.php?inv='.$row['InvoiceNumber'].'">Transfer Payment</a></button></td>
                                    </tr>  
                                    ';  
                              }  
                            //   <td><button type="button" name="edit" id="'.$row["ShopNam"].'" class="btn btn-warning btn-xs edit_data"  data-toggle="modal" data-target="#edit_data">Edit</button></td>
                                
                              // <td><button type="button" name="transfer" class="btn btn-xs '.$color.' status">Transfer Payment</button></td>
                              // <td><button type="button" name="edit" id="'.$row["id"].'" class="btn btn-warning btn-xs edit_data"  data-toggle="modal" data-target="#edit_data">Edit</button></td>
                                    
                            ?>
                            </tbody>
                            <tfoot>
                            <tr>
                              <th>Product</th>
                              <th>Bidder</th>
                              <th>Amount</th>
                              <th>Status</th>
                              <th>Payment</th>
                              <th>Action</th>
                            </tr>
                            </tfoot>
                          </table>
                        </div>

                </div>
                <!-- /.col-md-9 -->
                <!-- modal -->
                <div id="edit_data" class="modal fade">  
                    <div class="modal-dialog">  
                        <div class="modal-content">  
                            <div class="modal-header">  
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>  
                                    <h4 class="modal-title">Edit Users</h4>  
                            </div>  
                            <div class="modal-body">  
                                    <form method="post" id="insert_form" onsubmit="return confirm('Are you sure you want to save?');">  
                                        <label>Shop Name</label>  
                                        <input type="text" name="ShopName" id="ShopName" class="form-control" />  
                                        <br />  
                                        <label>Shop Address</label>  
                                        <input type="text" name="ShopAddr" id="ShopAddr" class="form-control"></input>  
                                        <br />  
                                        <label>Phone Number</label>  
                                        <input type="text" name="ShopPhon" id="ShopPhon" class="form-control"></input>  
                                        <br />  
                                        <input type="submit" name="update" id="update" value="Save" class="btn btn-primary" />  
                                    </form>  
                            </div>  
                            <div class="modal-footer">  
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                            </div>  
                        </div>  
                    </div>  
                </div>
                <!-- modal end -->
            </div>
            <!-- /.container -->
        </div>
        <!-- *** FOOTER ***
 _________________________________________________________ -->
      
    <?php include 'footer.php';?>
    <!-- /#all -->


    

    <!-- *** SCRIPTS TO INCLUDE ***
 _________________________________________________________ -->
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.cookie.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/modernizr.js"></script>
    <script src="js/bootstrap-hover-dropdown.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/front.js"></script>
    <script src="js/bootstrap.js"></script>



    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.min.css"/>
    <script src="plugins/datatables/jquery.dataTables.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

    <script>
        $('#example1').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "processing": true,
        });

        $(function() {
            $( "#datepicker" ).datepicker({
                dateFormat: "yy-mm-dd"
            });
        });
    </script>
    
        
</body>

</html>