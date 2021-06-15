<?php 
    session_start(); 
    include 'conn.php';

    if(isset($_SESSION['userid'])){
        $userid = $_SESSION['userid'];
    }else {
        $userid = "";
    }

    $query = "SELECT * FROM bids INNER JOIN item INNER JOIN solditems WHERE bids.ItemID = item.ItemID AND bids.ItemID = solditems.ItemID AND bids.BidderID = solditems.BuyerID AND status = 'Won' AND EndTime < DATE_SUB(NOW(), INTERVAL 1 DAY)"; 
    #Replace CURR_DATE() with NOW() & 1 Day with 24 hour 
    #BidTime < EndTime
    $result = mysqli_query($db, $query);

    foreach ($result as $row){
        $itemid = $row['ItemID'];
        $bidderid = $row['BidderID'];

        $query1 = "SELECT * FROM counter WHERE itemid = $itemid AND bidderid = $bidderid";
        $result1 = mysqli_query($db, $query1);

        if(mysqli_num_rows($result1) == 0){
            $sql = "INSERT INTO counter (itemid, bidderid) VALUES ($itemid, $bidderid)";
            $res = mysqli_query($db, $sql);
        }
    }

    $query2 = "SELECT DISTINCT bidderid FROM counter ORDER BY bidderid DESC";
    $result2 = mysqli_query($db, $query2);

    foreach($result2 as $row2){
        $bidder = $row2['bidderid'];
        // echo $bidder;
        // if($row2['strikes'] < 3){
        //     $sql = "UPDATE user SET strikes = strikes + 1 WHERE UserID = '$bidderid'";
        //     $res = mysqli_query($db, $sql);
        // }

        $query3 = "SELECT COUNT(*) AS strikes FROM counter WHERE bidderid = $bidder";
        $result3 = mysqli_query($db, $query3);
        // $row3 = mysqli_fetch_all($result3);

        foreach($result3 as $row3){
            if($row3['strikes'] >= 3){
                $sql1 = "UPDATE user SET status = 'Inactive' WHERE UserID = $bidder";
                $res1 = mysqli_query($db, $sql1);
            }
        }
    }

    $query4 = "SELECT * FROM feedbackprofile WHERE rating <= 2";
    $result4 = mysqli_query($db, $query4);
    // $row3 = mysqli_fetch_all($result3);

    foreach($result4 as $row4){
        $refNum = $row4['InvoiceNumber'];

        $query5 = "SELECT * FROM solditems WHERE InvoiceNumber = $refNum";
        $result5 = mysqli_query($db, $query5);


        foreach($result5 as $row5){
            $buyer = $row5['BidderID'];
            
            $sql1 = "UPDATE user SET status = 'Inactive' WHERE UserID = $buyer";
            $res1 = mysqli_query($db, $sql1);
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
        Bid Now : Auction Marketplace
    </title>

    <meta name="keywords" content="">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>

    <!-- styles -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.css" rel="stylesheet">

    <!-- theme stylesheet -->
    <link href="css/style.default.css" rel="stylesheet" id="theme-stylesheet">

    <!-- your stylesheet with modifications -->
    <link href="css/custom.css" rel="stylesheet">

    <script src="js/respond.min.js"></script>

    <link rel="shortcut icon" href="favicon.png">



</head>

<body>

     <?php 
        include 'conn.php';

		$query1 = "SELECT * FROM category ";
		$result1 = mysqli_query($db, $query1);
		$categories = mysqli_fetch_array($result1);

	?>
	<?php include 'header.php';?>
	 <div class="navbar-collapse collapse" id="navigation">

                <ul class="nav navbar-nav navbar-left">
                 <?php
                while($categories) { 
                
                    ?>
                    
                    <li class="inactive"><a href="category.php?CategoryID=<?php echo $categories['CategoryID'] ?>">
                    <?php echo $categories['Category'];?></a>
                    </li>
                   <?php $categories = $result1->fetch_assoc();} ?>
                </ul>

            </div>
            <!--/.nav-collapse -->

    <div id="all">
        <div class="container">
            <?php if(isset($_SESSION['username'])) { ?>
            <form class="navbar-form" role="search" action="results.php" method="POST">
                <div class="form-inline pull-right">
                    <input type="text" class="form-control" placeholder="Search" name="keyword">
                    <select class="form-control" name="BidStatus">
                        <option value="ongoing">Ongoing Bids</option>
                        <option value="finished">Finished Bids</option>
                    </select>
                    <span class="">
                        <button type="submit" class="btn btn-primary" name="search"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            </form>
            <?php } ?>
        </div></br>
        <div id="content">
            <!-- <div class="alert alert-danger alert-dismissable"></div> -->
            <div class="container">
                <div class="col-md-12">
                    <div id="main-slider">
                        <div class="item">
                            <img src="img/main-slider1.jpg" alt="" class="img-responsive">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="img/main-slider2.jpg" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="img/main-slider3.jpg" alt="">
                        </div>
                        
                    </div>
                    <!-- /#main-slider -->
                </div>
            </div>

            <!-- *** ADVANTAGES HOMEPAGE ***
 _________________________________________________________ -->
            <div id="advantages">

                <div class="container">
                    <div class="same-height-row">
                        <div class="col-sm-4">
                            <div class="box same-height clickable">
                                <div class="icon"><i class="fa fa-heart"></i>
                                </div>

                                <h3><a href="#">We love our customers</a></h3>
                                <p>We are known to provide best possible service ever</p>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="box same-height clickable">
                                <div class="icon"><i class="fa fa-tags"></i>
                                </div>

                                <h3><a href="#">Best prices</a></h3>
                                <p>You can check that the height of the boxes adjust when longer text like this one is used in one of them.</p>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="box same-height clickable">
                                <div class="icon"><i class="fa fa-thumbs-up"></i>
                                </div>

                                <h3><a href="#">100% satisfaction guaranteed</a></h3>
                                <p>Free returns on everything for 3 months.</p>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->

                </div>
                <!-- /.container -->

            </div>
            <!-- /#advantages -->

            <!-- *** ADVANTAGES END *** -->

            <!-- *** HOT PRODUCT SLIDESHOW ***


 _________________________________________________________ -->


            <?php 

				$query = "SELECT * FROM item order by ItemID DESC";
				$result = mysqli_query($db, $query);
				$row = mysqli_fetch_array($result);

			?>

            <div id="hot">

                <div class="box">
                    <div class="container">
                        <div class="col-md-12">
                            <h2>Latest Products</h2>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="product-slider">
                        

                <?php
                 $count=1;
				while($row && $count <=10) { 
				
					?>

				 <div class="item">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="detail.php?ItemNo=<?php echo $row['ItemID'] ?>">
                                                <img src="img/<?php echo $row['PhotosID'];?>" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="detail.php?ItemNo=<?php echo $row['ItemID'] ?>">
                                                <img src="img/<?php echo $row['PhotosID'];?>" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="detail.php?ItemNo=<?php echo $row['ItemID'] ?>" class="invisible">
                                    <img src="img/product1.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3><a href="detail.php?ItemNo=<?php echo $row['ItemID'] ?>"><?php echo $row['ItemName']?></a></h3>
                                    <p class="price">ZWL$  <?php echo number_format($row['CurrentPrice'],2)?></p>
									

                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>

                       <?php $row = $result->fetch_assoc();
                   			$count=$count+1;
                   		}
					?>

					</div>
                </div>

                
                <!-- /.container -->
			</div>

            <?php 
				$query3 = "SELECT * FROM category";
				$result3 = mysqli_query($db, $query3);
				$row3 = mysqli_fetch_array($result3);

				while($row3) { 

				$query5 = "SELECT * FROM item Where CategoryID=$row3[CategoryID]";
				$result5 = mysqli_query($db, $query5);
				$row5 =mysqli_fetch_array($result5);


			?>

             <div id="hot">

                <div class="box">
                    <div class="container">
                        <div class="col-md-12">
                            <h2><?php echo $row3['Category'];?></h2>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="product-slider">
                        

                <?php
				while($row5) { 
				
					?>

				 <div class="item">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="detail.php?ItemNo=<?php echo $row5['ItemID'] ?>">
                                                <img src="img/<?php echo $row5['PhotosID'];?>" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="detail.php?ItemNo=<?php echo $row5['ItemID'] ?>">
                                                <img src="img/<?php echo $row5['PhotosID'];?>" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="detail.php?ItemNo=<?php echo $row5['ItemID'] ?>" class="invisible">
                                    <img src="img/product1.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3><a href="detail.php?ItemNo=<?php echo $row5['ItemID'] ?>"><?php echo $row5['ItemName']?></a></h3>
                                    <p class="price">ZWL$  <?php echo number_format($row5['CurrentPrice'],2)?></p>
									

                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>

                       <?php $row5 = $result5->fetch_assoc();}
					?>

					</div>
                </div>

                
                <!-- /.container -->

            </div>
             <?php $row3 = $result3->fetch_assoc();}
					?>
            <!-- *** GET INSPIRED ***
 _________________________________________________________ -->
           

            <!-- *** BLOG HOMEPAGE ***
 _________________________________________________________ -->

            <div class="box text-center" data-animate="fadeInUp">
                <div class="container">
                    <div class="col-md-12">
                        <h3 class="text-uppercase">Grab products for lowest prices</h3>

                        <p class="lead">Start Bidding Keep on Winning 
                        </p>
                    </div>
                </div>
            </div>

           

            <!-- *** BLOG HOMEPAGE END *** -->


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