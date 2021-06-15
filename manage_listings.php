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
                        <li>Feedback</li>
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

                        $query = "SELECT * FROM user INNER JOIN profile WHERE user.UserID = profile.id";
                        $result = mysqli_query($db, $query);

                    ?>

                    <div class="box" id="contact">
                        <h1>Manage Users</h1>

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
                              <th>First Name</th>
                              <th>Last Name</th>
                              <th>Email</th>
                              <th>Phone Number</th>
                              <th>Address</th>
                              <th>Status</th>
                              <th>Edit</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php  
                              foreach($result as $row)  
                              {  
                                $color = "btn-success";
                                $status = $row["status"];

                                if ($status == "Active") {
                                  $color = "btn-success";
                                } elseif ($status == "Inactive") {
                                  $color = "btn-danger";
                                }
                                    echo '  
                                    <tr>  
                                        <td>'.$row["firstname"].'</td>  
                                        <td>'.$row["lastname"].'</td>
                                        <td>'.$row["nationalid"].'</td>   
                                        <td>'.$row["contact"].'</td>  
                                        <td>'.$row["address"].'</td> 
                                        <td><button type="button" name="status" id="'.$row["id"].'" value="'.$row["status"].'" class="btn btn-xs '.$color.' status">'.$row["status"].'</button></td>
                                    </tr>  
                                    ';  
                              }  
                              // <td><button type="button" name="edit" id="'.$row["id"].'" class="btn btn-warning btn-xs edit_data"  data-toggle="modal" data-target="#edit_data">Edit</button></td>
                                    
                            ?>
                            </tbody>
                            <tfoot>
                            <tr>
                              <th>First Name</th>
                              <th>Last Name</th>
                              <th>Email</th>
                              <th>Phone Number</th>
                              <th>Address</th>
                              <th>Status</th>
                              <th>Edit</th>
                            </tr>
                            </tfoot>
                          </table>
                        </div>

                </div>
                <!-- /.col-md-9 -->
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

    <script>
        $(function() {
            $( "#datepicker" ).datepicker({
                dateFormat: "yy-mm-dd"
            });
        });
    </script>
    
        
</body>

</html>