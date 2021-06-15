


    <!-- *** TOPBAR ***
 _________________________________________________________ -->


    <div id="top">
        <div class="container">
            <div class="col-md-6 offer" data-animate="fadeInDown">
                
            </div>
            <div class="col-md-6" data-animate="fadeInDown">
                <ul class="menu" role="menu">
                    <?php

                    if(isset($_SESSION['username'])) {
                        echo '
                            <li><i style="color:white; margin-right:5px" class="fa fa-user" aria-hidden="true"></i><a href="useritems.php">'.$_SESSION["username"].'</a></li>
                            <li><a href="changepassword.php">Change Password</li> &nbsp; |
                            <li><i style="color:white; margin-right:5px" class="fa fa-user" aria-hidden="true"></i><a href="logout.php">Logout</a></li>
                        ';
                    } else {
                        echo '
                        <li><a href="register.php">Login</a></li>
                        <li><a href="register.php">Register</a></li>
                        ';
                    }
                    ?>
                </ul>
            </div>
        </div>

    </div>

    <!-- *** TOP BAR END *** -->

    <!-- *** NAVBAR ***
 _________________________________________________________ -->

    <div class="navbar navbar-default yamm" role="navigation" id="navbar">
        <div class="container">
            <div class="navbar-header">

                <a class="navbar-brand home" href="index.php" data-animate-hover="bounce">
                   <img height="50px" src="img/logo.png" alt="Obaju logo" class="hidden-xs">
                    <img src="img/logo-small.png" alt="Obaju logo" class="visible-xs"><span class="sr-only">Go to Homepage</span>
                </a>
                <div class="navbar-buttons">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="fa fa-align-justify"></i>
                    </button>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle search</span>
                        <i class="fa fa-search"></i>
                    </button>
                    



                   
                </div>
            </div>
            <!--/.navbar-header -->

            <!-- <div class="navbar-collapse collapse" id="navigation">

                <ul class="nav navbar-nav navbar-left">
                <?php
                include 'conn.php';

	            $query1 = "SELECT * FROM category ";
	            $result1 = mysqli_query($db, $query1);
	            $categories = mysqli_fetch_array($result1);

                while($categories) { 
                
                    ?>
                    
                    <li class="inactive"><a href="category.php?CategoryID=<?php echo $categories['CategoryID'] ?>">
                    <?php echo $categories["Category"];?></a>
                    </li>
                   <?php $categories = $result1->fetch_assoc();} ?>
                </ul>

            </div> -->
            <!--/.nav-collapse -->

            <div class="navbar-buttons">

            <?php
                    if(isset($_SESSION['username']) AND $_SESSION['userrole'] == 2) {
                        echo '
                        <div class="navbar-collapse collapse right" id="basket-overview">
                            <a href="feedback.php" class="btn btn-primary navbar-btn"><span class="hidden-sm fa fa-shopping-cart">    Feedback</span></a>
                        </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <div class="navbar-collapse collapse right" id="basket-overview">
                            <a href="bids.php" class="btn btn-primary navbar-btn"><span class="hidden-sm fa fa-shopping-cart">    Bidding</span></a>
                        </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <!--/.nav-collapse -->
                        <div class="navbar-collapse collapse right">
                            <a href="mylisting.php" class="btn btn-primary navbar-btn"><span class="hidden-sm fa fa-tag">    Listings</span></a>
                        </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <div class="navbar-collapse collapse right">
                            <a href="addlisting.php" class="btn btn-primary navbar-btn"><span class="hidden-sm fa fa-plus-square"> Add Listing</span></a>
                        </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        ';
                    }

                    if(isset($_SESSION['userrole']) AND $_SESSION['userrole'] == 1) {
                        echo '
                        <div class="navbar-collapse collapse right" id="basket-overview">
                            <a href="manage_bids.php" class="btn btn-primary navbar-btn"><span class="hidden-sm fa fa-shopping-cart">    Manage Bids</span></a>
                        </div>
                        <!--/.nav-collapse -->
                        <div class="navbar-collapse collapse right">
                            <a href="manage_users.php" class="btn btn-primary navbar-btn"><span class="hidden-sm fa fa-tag">    Manage Users</span></a>
                        </div>
                        ';
                    }
            ?>
                <!-- <div class="navbar-collapse collapse right" id="basket-overview">
                    <a href="addlisting.php" class="btn btn-primary navbar-btn"><span class="hidden-sm fa fa-plus-square"> Add Listing</span></a>
                </div> -->
                <!--/.nav-collapse -->
                <!-- <div class="navbar-collapse collapse right">
                    <a href="bids.php" class="btn btn-primary navbar-btn"><span class="hidden-sm fa fa-shopping-cart">  My Bids</span></a>
                </div> -->

                <div class="navbar-collapse collapse right" id="search-not-mobile">
                    <button type="button" class="btn navbar-btn btn-primary" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle search</span>
                        <i class="fa fa-search"></i>
                    </button>
                </div>

            </div>

            <div class="collapse clearfix" id="search">

                <form class="navbar-form" role="search" action="results.php" method="POST">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search" name="keyword">
                        <span class="input-group-btn">

            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>

            </span>
                    </div>
                </form>

            </div>
            <!--/.nav-collapse -->

        </div>
        <!-- /.container -->
    </div>
    <!-- /#navbar -->

    <!-- *** NAVBAR END *** -->

