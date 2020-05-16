<?php
require 'libraries/functions.inc.php';
if (!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}else{
	$result = fetch_user($_SESSION['user_id']);
	if ($result !== false) {
		$user = $result;
		$user_id = $user['user_id'];
		$firstname = $user['firstname'];
		$lastname = $user['lastname'];		
		$pin = $user['pin'];
	}
}

if (isset($_POST['submit'])) {
	$result = transaction($_POST);
	var_dump($result);
	if ($result) {
		header('location: otp.php');
	exit();
	}else{
		echo "Failed";
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scable-1">
	<meta http-equiv="X-UA-Compatible" content="ie=edge"> 
	<title>Profile | G-Pay </title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link rel="stylesheet" type="text/css" href="css/dashboard.css">
	<style>
		#swift, #routing, #inter, #sort{
			display: none;
		}		
	</style>
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
				<div class="container">
					<div class="col-6 col-sm-6 col-md-4 mx-auto py-2">
						
					</div>
				</div>
			</div>
		</div>

		<!-- Top/navbar mobile END!! -->


		<div class="row pt-md-5 pt-lg-0">
			<div class="col-12 d-none d-md-block px-0 topbar mt-md-4 mt-lg-0">
				<div class="container">
					<div class="col-md-4 col-lg-3 col-lg-2 py-1 float-left px-0">
					    <p class="text float-left mb-0">G-Pay</p>
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

			<div class="container logo-main">
				
			</div>
		</div>
		<div class="row d-none d-md-block second-bar">
			<div class="container p-md-0">
				<nav class="navbar  navbar-expand-md navbar-light  p-0">
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav mr-auto">
						
									<li class="nav-item "><a class="nav-link " href="dashboard.php"> My Account </a></li>
                                <li class="nav-item "><a class="nav-link " href="profile.php"> View Profile </a></li>
                                <li class="nav-item "><a class="nav-link actived " href="transfer.php"> Payment portal </a></li>
                                <li class="nav-item "><a class="nav-link " href="Transaction.php">  Transaction Receipt </a></li>
                                <li class="nav-item "><a class="nav-link " href="logout.php"> Log out </a></li>
							
			     		</ul>
					</div>

					<div class="float-right bg-white px-0 login-wrap">
						<a class="text-center acces-center"> <span class="acces"> <i class="fa fa-user"></i> </span><?php echo "$firstname $lastname";?> </a>
					</div>
				</nav>
			</div>		
	</div>
</div>


<div class="container-fluid py-5 main">
        <div class="container  px-0 pt-2 pt-md-3 pt-lg-0 my-3  my-md-0 rounded">
				<div class="col-12 col-sm-6 col-md-3 float-right py-2 px-4 d-lg-none mobile-name">
						<p class="text-sm-right"><?php echo "$firstname $lastname";?></p>
					</div>
                <div class="row py-3  px-2 px-md-3  w-100 ml-0 dash-main">
                    <div class="col-md-8  py-5 my-sm-3 mx-auto rounded transfer">
                        <div class="col-md-9 col-lg-7 px-md-5 mx-md-auto">
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
								<!-- <input type="text" placeholder="Account number" required class="form-control" name="tx_account"><br>
								<input type="text" placeholder="Amount" required class="form-control" name="tx_amount">
								<br>
								<input type="text" placeholder="Bank Name" required class="form-control" name="tx_name">
								<br>
								<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
								<input type="email" placeholder="Beneficiary Email" required class="form-control" name="email">
								<br>
								<input type="password" placeholder="Pin" required class="form-control" name="pin"><br>
								
								
								
								<select id="route" class="form-control">
									<option value="">--Select Value--</option>
									<option value="dom">Domestically Transfer</option>
									<option value="bank">International Transfer</option>
								</select>
								<br>
								
								<input type="text" maxlength="9" placeholder="Routing Number" class="form-control" id="routing">	
								<input type="text" placeholder="Sort Code e.g 00-00-00" pattern="^\d{2}-\d{2}-\d{2}$" class="form-control" title="pattern{00-00-00}" id="sort">
								<input type="text" min="3" maxlength="11" placeholder="Swift Code" class="form-control" id="swift">
								<input type="text" placeholder="Intermediary Bank Account Number" class="form-control" id="inter">
								<input type="hidden" name="correct_pin" value="<?php echo $pin;?>"> -->
								<br>
						
								<input type="text" placeholder="Card Name" name= "cardname"class="form-control" required/>
								<input  maxlength= "20"type="text" pattern = "^\d{20}" placeholder="Card number" name="cardno" class="form-control" required />
								<input  type="text"class="form-control"maxlength="5" required placeholder="Expiry date e.d 00/00" pattern = "^\d{2}/\d{2}$" title="pattern{00/00}" name="cardno" />
								<input type="text" placeholder="CVC" maxlength="3" name="cvc" class="form-control" required/>
								<input type="text" placeholder="PIN" maxlength="4" name="pin" class="form-control" required/>
								
								<p style="margin: 0; font-size: 13px; color: #fff;" >
								By clicking make payment you accept the terms and conditions</p>
								<input type="submit" value="Make payment" class="btn px-5 w-100 rounded mt-3 py-2" style="background:#00254d!important; color:#fff;" name="submit">
							</form>


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

	$("#route").change(function () {
		var routing = $('#route').val();
		if (routing === "dom") {
			$("#routing").attr('style', 'display: block; margin-bottom: 20px;');
			$("#sort").attr('style', 'display: block');
			$("#swift").attr('style', 'display: none');
			$("#inter").attr('style', 'display: none');
		}else if(routing === "bank"){
			$("#routing").attr('style', 'display: none');
			$("#sort").attr('style', 'display: none');
			$("#swift").attr('style', 'display: block; margin-bottom: 20px;');
			$("#inter").attr('style', 'display: block');
		}else if(routing === ""){
			$("#routing").attr('style', 'display: none');
			$("#swift").attr('style', 'display: none');
			$("#inter").attr('style', 'display: none');
			$("#sort").attr('style', 'display: none');
		}
	});
	
});



</script>
</body>
</html>