<?php
session_start();
error_reporting(0);
include('includes/config.php');
// if(strlen($_SESSION['login'])==0)
// { 
//     header('location:index.php');
// }
// else { ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Online Library Management System | Admin Dashboard</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body style="background: url('bg6.jpg') no-repeat center center fixed; background-size: cover;">

    <!------MENU SECTION START-->
    <?php include('aheader.php'); ?>
    <!-- MENU SECTION END-->

    <div class="content-wrapper">
        <div class="container">
            <div class="row pad-botm">
                <div class="col-md-12">
                    <h4 class="header-line" style="color:white">ADMIN DASHBOARD</h4>
                </div>
            </div>

            <div class="row">
                <!-- Button for All Registered Students -->
                <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="alert alert-info back-widget-set text-center">
                        <i class="fa fa-users fa-5x"></i>
                        <?php 
                        $sql ="SELECT id FROM tblstudents";
                        $query = $dbh->prepare($sql);
                        $query->execute();
                        $students = $query->rowCount();
                        ?>
                        <h3><?php echo htmlentities($students); ?></h3>
                        <p>Registered Students</p>
                        <a href="reg-students.php" class="btn btn-info btn-sm">View Details</a>
                    </div>
                </div>

                <!-- Button for All Books -->
                <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="alert alert-success back-widget-set text-center">
                        <i class="fa fa-book fa-5x"></i>
                        <?php 
                        $sql ="SELECT id FROM tblbooks";
                        $query = $dbh->prepare($sql);
                        $query->execute();
                        $books = $query->rowCount();
                        ?>
                        <h3><?php echo htmlentities($books); ?></h3>
                        <p>Total Books</p>
                        <a href="manage-books.php" class="btn btn-success btn-sm">View Details</a>
                    </div>
                </div>

                <!-- Button for All Authors -->
                <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="alert alert-warning back-widget-set text-center">
                        <i class="fa fa-pencil fa-5x"></i>
                        <?php 
                        $sql ="SELECT id FROM tblauthors";
                        $query = $dbh->prepare($sql);
                        $query->execute();
                        $authors = $query->rowCount();
                        ?>
                        <h3><?php echo htmlentities($authors); ?></h3>
                        <p>Total Authors</p>
                        <a href="manage-authors.php" class="btn btn-warning btn-sm">View Details</a>
                    </div>
                </div>

                <!-- Button for All Categories -->
<div class="col-md-3 col-sm-3 col-xs-6">
    <div class="alert alert-success back-widget-set text-center">
        <i class="fa fa-list-alt fa-5x"></i>
        <?php 
        $sql = "SELECT id FROM tblcategory";
        $query = $dbh->prepare($sql);
        $query->execute();
        $categories = $query->rowCount();
        ?>
        <h3><?php echo htmlentities($categories); ?></h3>
        <p>Total Categories</p>
        <a href="manage-categories.php" class="btn btn-success btn-sm">View Details</a>
    </div>
</div>


                <!-- Issued Books -->
                <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="alert alert-danger back-widget-set text-center">
                        <i class="fa fa-bookmark fa-5x"></i>
                        <?php 
                        $sql ="SELECT id FROM tblissuedbookdetails";
                        $query = $dbh->prepare($sql);
                        $query->execute();
                        $issued = $query->rowCount();
                        ?>
                        <h3><?php echo htmlentities($issued); ?></h3>
                        <p>Books Issued</p>
                        <a href="manage-issued-books.php" class="btn btn-danger btn-sm">View Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->

    <?php include('includes/footer.php'); ?>
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
<?php  ?>

