<?php 
    session_start(); 
    require 'phpmailer/PHPMailerAutoload.php';

    if (isset($_POST['recoverpassword'])){
        $username = $_POST['username'];
        $recoveryemail = $_POST['recoveryemail'];
        $emailFrom = "admin@bidnow.co.zw";
        $emailTo = $recoveryemail;
        $temporarypassword = "123456";
        $temppassword = md5(strip_tags($temporarypassword));

        $query = "SELECT * FROM user WHERE Username = '$username' LIMIT 1";
        $result = mysqli_query($db, $query);

        if (mysqli_num_rows($result) > 0){

            $mail = new PHPMailer();
            $mail->setFrom($emailFrom);
            $mail->addAddress($emailTo);

            //set subject
            $subject = "Request for Password Recovery.";
            $mail->Subject = $subject;
            $mail->isHTML(false);
            $body = "Hi, Your temporary password is $temporarypassword . Please login and change it immediately.";
            $mail->Body = $body;
            $mail->send();

            $query = "UPDATE user SET Password = '$temppassword' WHERE Username = '$username'";
            $result = mysqli_query($db, $query);
            $msg = "Password recovery successful. Please check your email for temporary password.";

        }else{
            $msg = "Username doesnt exist";
        }


    }
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

    <?php
    // $msg = "mmm";
        if(isset($msg)) {
            echo '
            <div class="alert alert-info">';
                    echo $msg;
            echo '</div>';
        }
    ?>
    <?php include 'header.php';?>

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="index.php">Home</a>
                        </li>
                        <li>Forgot Password</li>
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

                    <div class="box" id="contact">
                        <h1>Forgot Password</h1>

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
                        <div class="panel-group" id="accordion">
                        

                        <form class="form-horizontal" method="POST">

                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h4 class="panel-title">

                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">

                                        Enter details here.

                                        </a>

                                    </h4>
                                </div>

                                <!-- <div id="collapseTwo" class="panel-collapse collapse"> -->
                                <div id="collapseTwo" class="panel">
                                    <div class="panel-body">

                                        <label class="control-label col-sm-2" >Username</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="username" placeholder="">
                                            <br>
                                        </div>

                                        <label class="control-label col-sm-2" >Recovery Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" name="recoveryemail" placeholder="">
                                            <br>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- /.panel -->
                        <br>
                        
                         <input type="submit" align ="left" class="btn btn-primary center-block" name="recoverpassword" value="Recover Password">
                       
                        <!-- /.panel-group -->
                    </form>

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
