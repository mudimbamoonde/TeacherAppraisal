<?php include "includes/hearder.php"; ?>
<?php
if(!isset($_SESSION['id'])) {
    unset($_SESSION["id"]);
    header("location:login.php");
}
?>
			<!-- start banner Area -->
			<section class="banner-area" id="home">	
				<div class="container-fluid">				
					<div class="row fullscreen d-flex align-items-center justify-content-start">
						<div class="banner-content col-lg-9">
							<h6>Analyze the Effectiveness of Educators in minutes</h6>
							<h1 class="text-white text-capalize">
								Teacher Effectiveness Rating  <br>
								MINISTRY OF EDUCATION<br>

							</h1>
                            <?php if ($_SESSION["position"]=='hod'){?>
							<a href="teacher_depart.php" class="genric-btn circle">Start Analyze <?php echo $_SESSION["fname"]." ".$_SESSION["surname"]  ?></a>
                            <?php }?>

                            <?php if ($_SESSION["position"]=='learner'){?>
							<a href="teacher.php" class="genric-btn circle">Start Analyze <?php echo $_SESSION["fname"]." ".$_SESSION["surname"]  ?></a>
                            <?php }?>


                            <?php if ($_SESSION["position"]=='teacher'){?>
							<a href="appraisalAn.php" class="genric-btn circle">View Reports <?php echo $_SESSION["fname"]." ".$_SESSION["surname"]  ?></a>
                            <?php }?>

                            <?php if ($_SESSION["position"]=='master' AND $_SESSION["position"]=='hod'){?>
                            <a href="appraisalAn.php" class="genric-btn circle">Start to Analyze</a>
                            <?php }?>
						</div>
						<img class="header-img img-fluid align-self-end d-flex" src="img/header-img.png" alt="">			
					</div>
				</div>
			</section>
			<!-- End banner Area -->			
			<!-- Start feature Area -->
			<section class="feature-area" id="service">
				<div class="container">
					<div class="row">
                        <?php if ($_SESSION["position"]=='master'){?>
						<div class="col-lg-4 col-md-6">
							<div class="single-feature">
                                <a href="teacher.php">
								<h4><span class="lnr lnr-users"></span>Learners</h4>
                                </a>
								<p>
									Collect forms and details after an evaluation is take.
								</p>
							</div>
						</div>
                            <?php } ?>

                        <?php if ($_SESSION["position"]=='hod' OR $_SESSION["position"]=='master'){ ?>
						<div class="col-lg-4 col-md-6">
							<div class="single-feature">
                                <a href="teacher_depart.php">
                                    <h4><span class="lnr lnr-license"></span>Departmental Rate</h4></a>
								<p>
									Rated by the Head Of Department and the results.
								</p>								
							</div>
						</div>
                        <?php }?>
                        <?php if ($_SESSION["position"]=='master' OR $_SESSION["position"]=='standOffcie'){?>
						<div class="col-lg-4 col-md-6">
							<div class="single-feature">
                                <a href="report_t.php">
                                    <h4><span class="lnr lnr-star-half"></span>Standard Officer</h4></a>
								<p>
								 Evaluate and Comment on teacher progress and monitor the working progress.
								</p>								
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="single-feature">
                                <a href="reports.php">
								<h4><span class="lnr lnr-arrow-down-circle"></span>Reports</h4>
                                </a>
								<p>
									Generate reports and print.
								</p>

							</div>
						</div>
                        <?php }?>
                        <?php if ($_SESSION["position"]=='master'){?>
						<div class="col-lg-4 col-md-6">
							<div class="single-feature">
                                <a href="settings.php">
								<h4><span class="lnr lnr-cog"></span>Configurations</h4>
                        </a>
								<p>
									Configure  the system to your own preference.
								</p>								
							</div>
						</div>


						<div class="col-lg-4 col-md-6">
							<div class="single-feature">
                                <a href="Vuser.php">
                                    <h4><span class="lnr lnr-user"></span>User Settings</h4></a>
								<p>
									Change Your password and User Details.
								</p>									
							</div>
						</div>
                        <?php }?>
					</div>
				</div>	
			</section>
			<!-- End feature Area -->	

			<!-- start footer Area -->		
			<?php include "includes/footer.php"; ?>
			<!-- End footer Area -->




