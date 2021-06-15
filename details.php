<?php 
    session_start();
    require 'phpmailer/PHPMailerAutoload.php';

    if (!isset($_SESSION['userid'])){
        header('Location: register.php?err=3');
    } 

    function sendEmail ($email, $message) {
        $emailFrom = "consolatakapuya@gmail.com";

        $mail = new PHPMailer();
        $mail->setFrom($emailFrom, $name);
        $mail->addAddress($emailTo);

        //set subject
        $subject = "Congratulations you won the bid.";
        $mail->Subject = $subject;
        $mail->isHTML(false);
        $mail->Body = $message;
        $mail->send();

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
    <link href="css/custom.css" rel="stylesheet">

    <!-- theme stylesheet -->
    <link href="css/style.default.css" rel="stylesheet" id="theme-stylesheet">

    <!-- your stylesheet with modifications -->
    <link href="css/custom.css" rel="stylesheet">

    <script src="js/respond.min.js"></script>

    <link rel="shortcut icon" href="favicon.png">

   





</head>

<body  onload="countdown(year,month,day,hour,minute)">

    <?php 
        include 'header.php';
    
    ?>


    <!-- *** NAVBAR END *** -->
    <?php 
        include 'conn.php';
          
        $ItemNo = $_GET['ItemNo'];
        $query = "SELECT * FROM item Where ItemID=$ItemNo";
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_array($result);
        $leastValue=$row['CurrentPrice'];
        $ExpectedValue=$row['ExpectedPrice'];
        $date = date("Y-m-d");
		$time = date("h:i:s");
                        
    ?>

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="index.php">Home</a>
                        </li>
                        
                        <li><?php echo $row['ItemName'];?></li>
                    </ul>

                </div>

                <div class="col-md-3">
                    <!-- *** MENUS AND FILTERS *** -->

                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Menu</h3>
                        </div>

                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked category-menu">
                                <li><a href="addlising.php">Add Listing</a></li>
                                <li><a href="mylisting.php">Listings</a></li>
                                <li><a href="bids.php">Bidding</a></li>                      
                            </ul>

                        </div>
                    </div>

                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Categories</h3>
                        </div>

                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked category-menu">
                            <?php
                             $result1 = mysqli_query($db, $query1);
                             $categories = mysqli_fetch_array($result1);
                             
                             while($categories) { 
                        
                               ?>
                    
                                <li>
                                    <a href="category.php?CategoryID=<?php echo $categories['CategoryID'] ?>"><?php echo $categories['Category'];?> </a>
                                    
                                </li>
                                 <?php $categories = $result1->fetch_assoc();} ?>
                                
                            

                            </ul>

                        </div>
                    </div>

                    

                   
                    <!-- *** MENUS AND FILTERS END *** -->
                    


                    <!-- <div class="banner">
                        <a href="#">
                            <img src="img/banner.jpg" alt="sales 2014" class="img-responsive">
                        </a>
                    </div> -->
                </div>

                <div class="col-md-9">

                    <div class="row" id="productMain">
                        <div class="col-sm-6">
                            <div id="mainImage">
                                <img src="img/<?php echo $row['PhotosID'];?>" alt="" class="img-responsive">
                            </div>

                            <div class="ribbon sale">
                                <div class="theribbon">SALE</div>
                                <div class="ribbon-background"></div>
                            </div>
                            <!-- /.ribbon -->

                            <div class="ribbon new">
                                <div class="theribbon">NEW</div>
                                <div class="ribbon-background"></div>
                            </div>
                            <!-- /.ribbon -->

                        </div>
                        <div class="col-sm-6">
                            <div class="box">
                                <h1 class="text-center"><?php echo $row['ItemName'];?></h1>
                                <p class="goToDescription"><a href="#details" class="scroll-to">Scroll to product details, material & care and sizing</a>
                               
                                </p>
                                <?php
                                    $userid = $_SESSION['userid'];
                                    $itemid = $row['ItemID'];
                                    $bidends = $row['EndDate'] . " " . $row['EndTime'];
                                    $query1 = "SELECT max(BidAmount) as BidAmount FROM `bids` INNER JOIN item WHERE bids.ItemID = item.ItemID 
                                               AND bids.ItemID = $itemid";
                                    $result1 = mysqli_query($db, $query1);
                                    $bid = mysqli_fetch_array($result1);

                                    $query2 = "SELECT max(BidAmount) as BidAmount FROM `bids` INNER JOIN item WHERE bids.ItemID = item.ItemID 
                                               AND bids.BidderID = $userid AND bids.ItemID = $itemid";
                                    $result2 = mysqli_query($db, $query2);
                                    $bid2 = mysqli_fetch_array($result2);

                                    $maxbid = $bid['BidAmount'];
                                    $userbid = $bid2['BidAmount'];
                                
                                    $EndDateTime = $row['EndDate'] . " " . $row['EndTime'];
                                    // echo $EndDateTime;

                                    // $time = strtotime($EndDateTime) < time();
                                    // echo strtotime($EndDateTime);
                                    // exit();
                                    if($maxbid == $userbid && strtotime($EndDateTime) < time() && !isset($maxbid) == null){
                                        
                                        $sql1 = "UPDATE bids SET status = 'Won' WHERE UserID = '$userid'";
                                        $res1 = mysqli_query($db, $sql1);

                                        $msg = "Congrats, you won the bid. You can proceed and make the payment in 24hrs, otherwise the bid will be nullified and you might be blacklisted.";
                                        echo '<div class="alert alert-success" style="paddig: 10px;"><div class="text-center">';
                                            echo $msg;
                                        echo '</div></div>';

                                        $sql = "SELECT * FROM profile WHERE id = $userid";
                                        $res = mysqli_query($db, $sql);
                                        $rows = mysqli_fetch_array($res);

                                        $email = $rows['email'];
                                        sendEmail($email, $msg);
                                    }
                                ?>

                                <?php
                                    $query3 = "SELECT * FROM item INNER JOIN profile WHERE item.SellerID = profile.id AND ItemID = $itemid";
                                    $result3 = mysqli_query($db, $query3);
                                    $seller = mysqli_fetch_array($result3);

                                    if($seller['SellerID'] !== $_SESSION['userid']){
                                        if ( strtotime($EndDateTime) > time()){
                                ?>
										
										<h3 class="price">Seller ID: <?php echo $seller['alias'] ?></h3>
								
                                        <p class="price">Current Bid : ZWL <?php echo  number_format($row['CurrentPrice'],2); ?></p>

                                        <form action="" method="post" align="center">

                                            <p align="center">Enter a value greater than ZWL <?php echo number_format($leastValue,2);?> </p>
                                                    
                                                <div class="form-inline">
                                                    <input class="form-control btn-danger" type="submit" align="center" value="ZWL$"><input class="form-control" type="text" name="bidValue" /><input class="form-control btn-primary" type="submit" align="center" value="Bid Now"><br/><br>
                                                </div>                                            

                                                <!-- <input class="btn btn-primary" type="submit" align="center" value="Bid Now"><br/><br> -->
                                            </form>
                                <?php
                                    }
                                }

                                    if($seller['SellerID'] == $_SESSION['userid']){
                                        echo '
                                        <div class="alert alert-info">
                                             <strong>Sorry!</strong> You cannot place bids because you listed this item.
                                        </div>
                                        ';					
                                    }
                                
                                ?>
								<div style="color:red" align="center" >

									<?php 
										function updater($value,$id,$leastValue,$ExpectedValue,$userID){
										    // Create connection
										    include 'conn.php'; 
											
										   
										    if ($db->connect_error) {
										        die("Connection failed: " . $db->connect_error);
										    }   

										    $sql = "UPDATE item SET CurrentPrice='{$value}' WHERE ItemID='$id'";

										    if (($value < $ExpectedValue )&& $value > $leastValue && $db->query($sql) == TRUE) {
										        echo '<div class="alert alert-success">
                                                        <strong>Success!</strong> Your Bid Placed.
                                                      </div>';
										        echo "<meta http-equiv='refresh' content='0'>";

                                                $sql2="INSERT INTO bids (ItemID,BidderID,BidAmount)VALUES ('$id','$userID','$value') " ;
                                                if ($db->query($sql2) === TRUE) {
                                                 //echo "New record created successfully";
                                                    } else {
                                                        echo "Error: " . $sql2 . "<br>" . $db->error;
                                                    }
                                                    
										    } else {
										        echo '<div class="alert alert-danger">
                                                        <strong>Bid not Placed !</strong> The amount entered is not valid !
                                                        </div>' . $db->error;
										    }
										    $db->close();
										}   
                                        
                                        if(isset($_POST['bidValue'])){
                                            if (isset($_SESSION['userid'])) {
                                                updater($_POST['bidValue'],$ItemNo,$leastValue,$ExpectedValue,$_SESSION['userid']);
                                            } else {
                                                echo '
                                                <div class="alert alert-info">
                                                     <strong>Sorry!</strong> You need to <a href="register.php">log in</a> to bid on items.
                                                </div>
                                                ';
                                            }					
										    
										}
										

										?>
								</div>

									<br>

									<script type="text/javascript">


									var current="Auction Ended !";    //-->enter what you want the script to display when the target date and time are reached, limit to 20 characters
									var year=<?php echo date('Y',strtotime($EndDateTime)); ?>;    //-->Enter the count down target date YEAR
									var month=<?php echo date('m',strtotime($EndDateTime)); ?>;      //-->Enter the count down target date MONTH
									var day=<?php echo date('d',strtotime($EndDateTime)); ?>;       //-->Enter the count down target date DAY
									var hour=<?php echo date('h',strtotime($EndDateTime)); ?>;      //-->Enter the count down target date HOUR (24 hour clock)
									var minute=<?php echo date('i',strtotime($EndDateTime)); ?>;    //-->Enter the count down target date MINUTE
									var tz=+2;        //-->Offset for your timezone 

									</script>


									<table id="table" border="0">
									    <tr>
									        <td align="center" colspan="6"><div class="numbers" id="count2" style="padding: 5px 0 0 0; "></div></td>
									    </tr>
									    <tr id="spacer1">
									        <td align="center" ><div class="numbers" ></div></td>
									        <td align="center" ><div class="numbers" id="dday"></div></td>
									        <td align="center" ><div class="numbers" id="dhour"></div></td>
									        <td align="center" ><div class="numbers" id="dmin"></div></td>
									        <td align="center" ><div class="numbers" id="dsec"></div></td>
									        <td align="center" ><div class="numbers" ></div></td>
									    </tr>
									    <tr id="spacer2">
									        <td align="center" ><div class="title" ></div></td>
									        <td align="center" ><div class="title" id="days">Days</div></td>
									        <td align="center" ><div class="title" id="hours">Hours</div></td>
									        <td align="center" ><div class="title" id="minutes">Minutes</div></td>
									        <td align="center" ><div class="title" id="seconds">Seconds</div></td>
									        <td align="center" ><div class="title" ></div></td>
									    </tr>
									</table>


									<br>
									
									

                                <?php

                                    if(isset($msg)){
                                        echo '<p class="text-center buttons">';
                                            echo '<a href="saver.php?ItemNo='; 
                                            echo $itemid;
                                            echo '" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Buy now for ZWL$';   echo number_format($row['CurrentPrice'],2); 
                                            echo '</a> 
                                            
                                        </p>';
                                    }
                                ?>

                                <p class="text-center buttons">
                                    <!-- <a href="payment.php?ItemNo=<?php echo $itemid; ?>" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Buy now for ZWL$  <?php echo number_format($row['ExpectedPrice'],2); ?></a> --> 
                                    
                                </p>


                            </div>

                            
                        </div>

                    </div>
					

                    <div class="box" id="details">

                        <p>
                        
                            <h4>Product details</h4>
                            <p><?php echo $row['Description'] ?></p>
                            

                            <hr>
                         
                    </div>


                    <?php 
	                    $count=1;
						$query2 = "SELECT * FROM item Where CategoryID='$row[CategoryID]'";
						$result = mysqli_query($db, $query2);
						$row2= mysqli_fetch_array($result);

					?>

				

                    <div class="row same-height-row">
                        <div class="col-md-3 col-sm-6">
                            <div class="box same-height">
                                <h3>You may also like these products</h3>
                            </div>
                        </div>

                    <?php 
						while($count <=3 & $row2 = $result->fetch_assoc()) { 

										
						?>
                        <div class="col-md-3 col-sm-6">
                            <div class="product same-height">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                             <a href="detail.php?ItemNo=<?php echo $row2['ItemID'] ?>">
                                                <img src="img/<?php echo $row2['PhotosID'];?>" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                              <a href="detail.php?ItemNo=<?php echo $row2['ItemID'] ?>">
                                                <img src="img/<?php echo $row2['PhotosID'];?>" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="detail.php?ItemNo=<?php echo $row2['ItemID'] ?>" class="invisible">
                                    <img src="img/product2.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3><?php echo $row2['ItemName'] ?></h3>
                                    <p class="price">ZWL$ : <?php echo number_format($row2['CurrentPrice'],2);?></p>
                                </div>
                            </div>
                            <!-- /.product -->
                        </div>

                    <?php 
                    $count++;
						}
										
						?>

                       

                    </div>

               

                </div>
                <!-- /.col-md-9 -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


       <?php include 'footer.php';?>

    

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






</body>

</html>