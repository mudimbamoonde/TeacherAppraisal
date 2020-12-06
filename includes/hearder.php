<?php
include "includes/config.php";
if(!isset($_SESSION["id"])){
    header("location:logout.php");
}

?>
<!DOCTYPE html>
	<html lang="en" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="Teacher Appraisal" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="codepixer">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Teacher Appraisal</title>
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="css/linearicons.css">
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/magnific-popup.css">
			<link rel="stylesheet" href="css/nice-select.css">					
			<link rel="stylesheet" href="css/animate.min.css">
			<link rel="stylesheet" href="css/owl.carousel.css">
			<link rel="stylesheet" href="css/main.css">
		</head>
		<body>
			  <header id="header" id="home">
			    <div class="container">	
			    	<div class="row align-items-center justify-content-center d-flex">
				      <nav id="nav-menu-container">
				        <ul class="nav-menu">
                       <?php if($_SERVER["PHP_SELF"]=="/TeacherAppraisal/index.php"){ ?>
				          <li class="menu-active"><a href="index.php">Home</a></li>	
						 <?php }else{?>
						      <li><a href="index.php">Home</a></li>
						 <?php }?>


                            <?php if ($_SESSION["position"]=='master' OR $_SESSION["position"]=='hod' OR $_SESSION["position"]=='standOffice'){?>
							   <?php if ($_SERVER["PHP_SELF"] == "/TeacherAppraisal/appraisalAn.php") { ?>
                                   <li class="menu-active"><a href="appraisalAn.php">Appraisal Analysis</a></li>
                                 <?php } else { ?>
                                      <li><a href="appraisalAn.php">Appraisal Analysis</a></li>
                                 <?php } ?>
                            <?php }?>

<!--				          <li class="menu-has-children"><a href="">System Users</a>-->
<!--				            <ul>-->
<!--								<li><a href="Vuser.php">Manage User</a></li>-->
<!--                                <li><a href="blog-single.html">Manage HOD</a></li>-->
<!--                                <li><a href="blog-single.html">Manage learners</a></li>-->
<!--				            </ul>-->
<!--				          </li>-->
                            <?php if ($_SESSION["position"]=='master'){?>

                            <?php if ($_SERVER["PHP_SELF"] == "/TeacherAppraisal/Vuser.php") { ?>
                                <li class="menu-active"><a href="Vuser.php">System Users</a></li>
                            <?php } else { ?>
                                <li ><a href="Vuser.php">System Users</a></li>
                            <?php } ?>



                            <?php if ($_SERVER["PHP_SELF"] == "/TeacherAppraisal/settings.php") { ?>
                                <li class="menu-active"><a href="settings.php">Settings</a></li>
                            <?php } else { ?>
                                <li ><a href="settings.php">Settings</a></li>
                            <?php } ?>

                            <?php }?>



                            <li><a href="logout.php">Logout</a></li>

                            <li><a href="logout.php" class="alert alert-info"> <?php
                                    if (!isset($_SESSION['fname']) || !isset($_SESSION["surname"])){
                                        header("location:logout.php");
                                    }
                                    echo "Hi,".$_SESSION['fname']." ".$_SESSION["surname"];
                                    ?></a></li>
				        </ul>
				      </nav><!-- #nav-menu-container -->		    		
			    	</div>
			    </div>
			  </header><!-- #header -->
              <hr>