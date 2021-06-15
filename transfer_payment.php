<?php 
session_start();
require_once 'Paynow-PHP-SDK-master/autoloader.php';


if(isset($_POST['SubmitTransfer'])){ 
    $InvoiceNumber = $_POST['ReferenceNumber'];
    $PaymentAmount = $_POST['PaymentAmount'];
    $PaymentEmail = $_POST['PaymentEmail'];
}

$paynow = new Paynow\Payments\Paynow(
    '9713',
    '09c5be39-7a11-47ae-8ada-a3e2488ad40b',
    'http://localhost/Online-Auction-System/clintpay_success.php',
    'http://localhost/Online-Auction-System/clintpay_success.php'
);

// 'http://localhost/Online-Auction-System/clintpay_success.php?inv='.$InvoiceNumber.'&ItemID='.$PaymentAmount.'&buyer='.$PaymentEmail.'',
// 'http://localhost/Online-Auction-System/clintpay_success.php?inv='.$InvoiceNumber.''
$payment = $paynow->createPayment($InvoiceNumber, $PaymentEmail);


$payment->add($InvoiceNumber, $PaymentAmount);
        // ->add('Sadza and Hot Water', 20.5);

// Optionally set a description for the order.
// By default, a description is generated from the items
// added to a payment
$payment->setDescription("Transfer from Holding Account");

// Initiate a Payment 
$response = $paynow->send($payment);
// var_dump($response);

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
    <?php include 'header.php'; ?>  
    
    <div id="all">
        <div id="content">
            <div class="container">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="index.php">Home</a>
                        </li>
                        <li>Transfer Payment</li>
                    </ul>

                </div>
                <div class="col-md-3">
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
                </div>
                <div class="col-md-9">
                    <div class="box" id="contact">
                        <h1>Transfer Payment</h1>
                        <!-- <p class="lead">Please leave you feedback. We will be happy to respond! </p> -->
                        <hr>
                        <div class="panel-group" id="accordion">
                        <?php if(!$response->success): ?>

                        <h2>An error occured while communicating with Paynow</h2>
                        <p><?= $response->error ?></p>

                        <?php else: ?>

                        <a href="<?= $response->redirectUrl() ?>">Click here to make payment of $<?= $payment->total ?></a> 

                        <?php endif; ?>


                        <?php if(isset($_GET['paynow-return'])): ?>
                        <script>
                            alert('Thank you for your payment!');
                        </script>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- /.col-md-9 -->
            </div>
            <!-- /.container -->
        </div>
    </div>

    <?php include 'footer.php'; ?>

    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.cookie.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/modernizr.js"></script>
    <script src="js/bootstrap-hover-dropdown.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/front.js"></script>
    <script src="js/bootstrap.js"></script>
</body>

</html>