<?php
require 'libraries/functions.inc.php';
if (!isset($_SESSION['user_id'])){
    header("Location: index.php");
    exit();
}else{
	$result = fetch_user($_SESSION['user_id']);
	if ($result !== false) {
		$user = $result;
		$firstname = $user['firstname'];
		$lastname = $user['lastname'];
		$acc_balance = $user['acc_balance'];
		$last_login = $user['last_login'];
		$account = $user['account'];
		$address = $user['address'];
		$country = $user['country'];
		$depart = $user['department'];
		$level = $user['level'];
		$email = $user['email'];
		$college = $user['college'];
		$matric = $user['matricno'];
		$pin = $user['pin'];

	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scable-1">
	<meta http-equiv="X-UA-Compatible" content="ie=edge"> 
	<title>Profile | G-Pay</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link rel="stylesheet" type="text/css" href="css/dashboard.css">
</head>


<body>
	<div class="outer-wrap " id="top-bar">
			<nav class="mobile-nav w-100">
				<ul class="">
						<li class="mobile-list first"><a class="mobile-link" id="dash-open" style="color:#fff!important;"> Dashboard  <span class="open "><i class="fa fa-plus"></i></span> <span class="close"><i class="fa fa-minus"></i>
                            </span></a>
                        </li>
						<div class="col px-0" id="dash">
								<ul class="navbar-nav mr-auto">
									<?php require 'inc/header_user.inc.php'; ?>
								 </ul>
                        </div>                       
                        <?php require 'inc/header.inc.php'; ?>
			     </ul>
			</nav>
</div>
<div id="main">	


	<div class="container-fluid">

		
		<div class="row d-lg-none">
			<div class="mobile-bar w-100 fixed-top">
				<div class="col-2 py-3 float-left bar" id="t-bar">
					<i class="fa fa-bars"></i>
				</div>
				
			</div>
		</div>


		<!-- Top/navbar mobile END!! -->


		<div class="row pt-md-5 pt-lg-0">
			<div class="col-12 d-none d-md-block px-0 mt-md-4 mt-lg-0 topbar ">
				<div class="container">
					<div class="col-md-4 col-lg-3 col-lg-2 py-1 float-left px-0">
					    <p class="text float-left mb-0">G-Pay</p>
					</div>
				
					<nav class="navbar navbar-expand-md navbar-light bg-light float-right  p-0">
						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<ul class="navbar-nav mr-auto">
                                    <li class="nav-item"><a class="nav-link actived" href="about.php">| About Us |</a></li>
                                    <li class="nav-item"><a class="nav-link actived" href="contact.php">| Contact Us |</a></li>
                                    <li class="nav-item"><a class="nav-link actived" href="news.php">| News |</a></li>
                                    <li class="nav-item"><a class="nav-link actived" href="career.php">| Careers |</a></li>
			     			</ul>
						</div>
					</nav>
				</div>
			</div>

			<div class="container logo-main">
				
			</div>
		</div>
		<div class="row d-none d-md-block second-bar">
			<div class="container p-md-0">
				<nav class="navbar  navbar-expand-md navbar-light  p-0">
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav mr-auto">
						
									<li class="nav-item "><a class="nav-link " href="dashboard.php"> My Account </a></li>
                                <li class="nav-item "><a class="nav-link actived" href="profile.php"> View Profile </a></li>
                                <li class="nav-item "><a class="nav-link  " href="transfer.php">  Payment Portal </a></li>
                                <li class="nav-item "><a class="nav-link " href="Transaction.php">  Transaction Receipt</a></li>
                                <li class="nav-item "><a class="nav-link " href="logout.php"> Log out </a></li>
								
			     		</ul>
					</div>

					<div class="float-right bg-white px-0 login-wrap">
						<a class="text-center acces-center"> <span class="acces"> <i class="fa fa-user"></i> </span><?php echo "$firstname $lastname" ?> </a>
					</div>
				</nav>
			</div>		
	</div>
</div>


<div class="container-fluid py-5 main">
    <div class="container dash px-0 pt-5 pt-md-3 pt-lg-0 my-5 my-md-0 rounded">
	
			<div class="col-12 col-sm-6 col-md-3 float-right py-2 px-4 d-lg-none mobile-name">
					<p class="text-sm-right"><?php echo "$firstname $lastname" ?></p>
				</div>

			<div class="col-12 py-3" style = "text-align:center; postion: relative;">
	   			<h2  ><u>STUDENT PROFILE</u></h2>
	  		</div>
		
       
	   <div class="row  pt-0 pt-md-5 pb-5 px-2 px-md-5  w-100 ml-0 pro-main">
       		<div class="col-sm-8 col-md-7 col-lg-5 mx-auto mb-5 pic">
				<img src="<?php echo $image?>" alt="" class="img img-thumbnail" style="height: 100%; width: 100%;">
            </div>

            <div class="col-12 py-3">
       			<h1 class="col-sm-6 float-sm-left text-sm-right text-center ">Full name:</h1>
       			<h1 class="col-sm-6 float-sm-right text-sm-left text-center"><?php echo $firstname,' ', $lastname;?></h1>
       		</div>
       		
       		<div class="col-12 py-3">
       			<h1 class="col-sm-6 float-sm-left text-sm-right text-center ">Matric Number:</h1>
       			<h1 class="col-sm-6 float-sm-right text-sm-left text-center"><?php echo $matric;?></h1>
       		</div>
       		<div class="col-12 py-3">
       			<h1 class="col-sm-6 float-sm-left text-sm-right text-center ">Department:</h1>
       			<h1 class="col-sm-6 float-sm-right text-sm-left text-center"><?php echo $depart;?></h1>
       		</div>
       		<div class="col-12 py-3">
       			<h1 class="col-sm-6 float-sm-left text-sm-right text-center ">College:</h1>
       			<h1 class="col-sm-6 float-sm-right text-sm-left text-center"><?php echo $college;?></h1>
       		</div>
       		<div class="col-12 py-3">
       			<h1 class="col-sm-6 float-sm-left text-sm-right text-center ">Level:</h1>
       			<h1 class="col-sm-6 float-sm-right text-sm-left text-center"><?php echo $level;?></h1>
       		</div>
       		<div class="col-12 py-3">
       			<h1 class="col-sm-6 float-sm-left text-sm-right text-center ">Session:</h1>
       			<h1 class="col-sm-6 float-sm-right text-sm-left text-center"><?php echo '2019 / 2020';?></h1>
       		</div>
			   <br> <br>
			   <div class="col-12 py-3">
			   <h1 style="float: left; display: inline; position: relative; margin-left: 50px;"><u>Payment Break Down:</u></h1>
       		</div>
			<div class="col-12 py-3">
				<h1 style="float: left; display: inline; position: relative; margin-left: 40px;">Academic fee:</h1>
				<h1 style="float: left; display: inline; position: relative; margin-left: 20px;"><?php echo '437,500.00';?></h1>
       		</div>
			<div class="col-12 py-3">
				<h1 style="float: left; display: inline; position: relative; margin-left: 40px;">Accomodation fee:</h1>
				<h1 style="float: left; display: inline; position: relative; margin-left: 20px;"><?php echo '180,000.00';?></h1>
       		</div>
			<div class="col-12 py-3">
       			<h1 style="float: left; display: inline; position: relative; margin-left: 40px;">Other fee:</h1>
				   <h1 style="float: left; display: inline; position: relative; margin-left: 50px;"><?php echo '70,000.00';?></h1>
       		</div>
			   <div class="col-12 py-3">
       			<h1 style="float: left; display: inline; position: relative; margin-left: 40px;">Bench fee:</h1>
				   <h1 style="float: left; display: inline; position: relative; margin-left: 50px;"><?php echo '20,000.00';?></h1>
       		</div>
			   <div class="col-12 py-3">
       			<h1 style="float: left; display: inline; position: relative; margin-left: 40px;">Bupaf fee:</h1>
				<h1 style="float: left; display: inline; position: relative; margin-left: 50px;"><?php echo '10,000.00';?></h1>
       		</div>
			<div class="col-12 py-3">
			   <h1 style="float: left; display: inline; position: relative; margin-left: 50px;"><u>Departmental Fees:</u></h1>
       		</div>
			<div class="col-12 py-3">
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
			   <h1 style=" display: inline; float: none; margin-left: 50px;"> Department<span style= "color: red !important;">*</span></h1>
                    <select id="department" name="department" class="form-control col-md-6 float-md-right " style=" display: inline; float: none; margin-left: 40px;">
                        <option value="cit">COMPUTER SCIENCE AND INFORMATION TECHNOLOGY</option>
                        <option value="chs">MEDICINE</option>
                        <option value="law">LAW</option>
                        <option value="masscomm">MASS COMMUNICATION</option>
                        <option value="econ">ECONOMICS</option>
                        <option value="acc">ACCOUNTING</option>
                        <option value="pol">POLITICAL SCIENCE</option>
                        <option value="ana">ANATOMY</option>
                        <option value="sociology">SOCIOLOGY</option>
                        <option value="agric">AGRIC</option>
                        <option value="MBBBS">MBBS</option>
                        <option value="physiology">PHYSIOLOGY</option>
                     </select> 
					 <?php 
					 $type = $_POST['department'];
					 if(!empty($type)){
						 $dep = ['department'];
						 if ($dep == ['cit']){
							$depart = 'NACOSS';
							echo "<h1 style='float: left; display: inline; position: relative; margin-left: 40px;'>$type</h1>";
						 }
					 } ?>
					
			</form>
			</div>
       </div> 
	   </div>          
    </div>
</div>
</div>
<footer class="p-3 ">
		<?php require 'inc/footer.inc.php'; ?>
</footer>





<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script src="js/custom.js"></script>

<script>
$(document).ready(function () {
	$('#t-bar').click(function () {
		$('#top-bar').toggleClass('show');
	});

	$('#dash-open').click(function () {
		$('#dash').slideToggle();
		$('.close').toggleClass('on');
		$('.open').toggleClass('off');
	});
});
</script>
</body>
</html>