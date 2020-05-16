<?php
require 'libraries/functions.inc.php';
if (!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}else{
	$result = fetch_user($_SESSION['user_id']);
	if ($result !== false) {
		$user = $result;
		$firstname = $user['firstname'];
		$lastname = $user['lastname'];
		$matricno = $user['matricno'];
		$department = $user['department'];
		$college = $user['college'];
		$level = $user['level'];
		$acc_balance = $user['acc_balance'];
		$last_login = $user['last_login'];
		$account = $user['account'];
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scable-1">
	<meta http-equiv="X-UA-Compatible" content="ie=edge"> 
	<title>Dashboard | G-Pay</title>
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
							</span></a></li>
						<div class="col px-0" id="dash">
								<ul class="navbar-nav mr-auto">
									<li class="nav-item "><a class="nav-link" href="dashboard.php"> My Account </a></li>
									<li class="nav-item "><a class="nav-link" href="profile.php"> View Profile </a></li>
									<li class="nav-item "><a class="nav-link  actived" href="transfer.php">  Make Transfer </a></li>
									<li class="nav-item "><a class="nav-link " href="Transaction.php">  Transaction </a></li>
									<li class="nav-item "><a class="nav-link" href="logout.php"> Log out </a></li>
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
				<div class="container">
					<div class="col-6 col-sm-6 col-md-4 mx-auto py-2">
						<img class="img-responsive w-100 h-100" src="images/logo-mo.png">
					</div>
				</div>
			</div>
		</div>
		<!-- Top/navbar mobile END!! -->





		<div class="row pt-md-5 pt-lg-0">
			<div class="col-12 d-none d-md-block px-0  mt-md-4 mt-lg-0 topbar ">
				<div class="container">
					<div class="col-md-4 col-lg-3 col-lg-2 py-1 float-left px-0">
					    <p class="text float-left mb-0">G-pay</p>
					</div>
				
					<nav class="navbar navbar-expand-md navbar-light bg-light float-right  p-0">
						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<ul class="navbar-nav mr-auto">
                                    <li class="nav-item active"><a class="nav-link" href="about.php">| About Us |</a></li>
                                    <li class="nav-item active"><a class="nav-link" href="contact.php">| Contact Us |</a></li>
                                    <li class="nav-item active"><a class="nav-link" href="news.php">| News |</a></li>
                                    <li class="nav-item active"><a class="nav-link" href="career.php">| Careers |</a></li>
			     			</ul>
						</div>
					</nav>
				</div>
			</div>
		</div>

		
		<div class="row d-none d-md-block second-bar">
			<div class="container p-md-0">
				<nav class="navbar  navbar-expand-md navbar-light  p-0">
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav mr-auto">
                                <?php require 'inc/header_user.inc.php'; ?>
			     		</ul>
					</div>

					<div class="float-right bg-white px-0 login-wrap">
						<a class="text-center acces-center"> <span class="acces"> <i class="fa fa-user"></i> </span><?php echo $_SESSION['firstname']." ".$_SESSION['lastname']; ?> </a>
					</div>
				</nav>
			</div>		
	</div>
</div>


<div class="container-fluid py-5 main">
        <div class="container dash px-0 pt-5 pt-md-3 pt-lg-0 my-5 my-md-0  rounded">
				<div class="col-12 col-sm-6 col-md-3 float-right py-2 px-4 d-lg-none mobile-name">
					<p class="text-sm-right">HI USER</p>
				</div>
                <div class="row py-3  px-2 px-md-5  w-100 ml-0 dash-main">
                    <div class="col-md-6  py-sm-3 my-sm-3">
                            <h1 class="mb-3">Welcome,</h1>
                            <H1 class="mb-4"><?php echo "$firstname $lastname";?></H1>
							<h2 class = "mb-5"> <?php echo "$matricno";?> </h2>
							<h2 class = "mb-5"> <?php echo "$department";?> </h2>
							<h2 class = "mb-5"> <?php echo "$college";?> </h2>
                            <p>your last session was on</p>
                            <b><?php echo $last_login;?></b>
                            <div class="time">
                                <marquee><?php echo "$firstname $lastname";?></marquee>	
                            </div>
                            <!-- <h1 class="mb-3">ACCOUNT BALANCE</h1>
                            <div class="timee">
                                Account number : <?php echo $account;?>
                            </div>
                            <H1 class="mt-3" >$<?php echo "$acc_balance.00";?></H1> -->
                    </div>
                </div>
            </div>
</div>
<footer class="p-3 ">
		<?php require 'inc/footer.inc.php'; ?></footer>


<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>


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
</script>
</body>
</html>