<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(isset($_POST['add']))
{
    $studentName = $_POST['studentName'];
    $email = $_POST['email'];
    $mobileNumber = $_POST['mobileNumber'];
    $regDate = date("Y-m-d");

    // Insert the data into the database
    $sql = "INSERT INTO tblstudents (StudentName, EmailId, MobileNumber, RegDate) 
            VALUES (:studentName, :email, :mobileNumber, :regDate)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':studentName', $studentName, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':mobileNumber', $mobileNumber, PDO::PARAM_STR);
    $query->bindParam(':regDate', $regDate, PDO::PARAM_STR);
    $query->execute();

    if($query->rowCount() > 0) {
        $_SESSION['msg'] = "Student added successfully!";
    } else {
        $_SESSION['error'] = "Something went wrong. Please try again.";
    }

    header('location:reg-students.php');
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Online Library Management System | Add Student</title>
    <!-- BOOTSTRAP CORE STYLE -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <!------MENU SECTION START-->
    <?php include('aheader.php'); ?>
    <!-- MENU SECTION END-->

    <div class="content-wrapper">
        <div class="container">
            <div class="row pad-botm">
                <div class="col-md-12">
                    <h4 class="header-line">Add Student Record</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Enter Student Details
                        </div>
                        <div class="panel-body">
                            <form method="post">
                                <div class="form-group">
                                    <label>Student Name</label>
                                    <input class="form-control" type="text" name="studentName" required />
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" type="email" name="email" required />
                                </div>
                                <div class="form-group">
                                    <label>Mobile Number</label>
                                    <input class="form-control" type="text" name="mobileNumber" required />
                                </div>
                                <button type="submit" name="add" class="btn btn-primary">Add Record</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- CONTENT-WRAPPER SECTION END-->
    <?php include('includes/footer.php'); ?>
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME -->
    <!-- CORE JQUERY -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
