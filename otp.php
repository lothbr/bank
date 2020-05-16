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
	}
}

if (isset($_POST['submit'])) {
	$response = verify_otp($_POST);
	var_dump($response);
	if ($response) {
		header("Location: transaction.php");
    exit();
	}else{
		echo 'Failed';
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scable-1">
	<meta http-equiv="X-UA-Compatible" content="ie=edge"> 
	<link rel="shortcut icon" href="images/logo.svg">
	<title>Midwest BankEnroll</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link rel="stylesheet" type="text/css" href="css/account.css">
</head>


<body>

<div id="main">	


	<div class="container-fluid">

		
		<div class="row d-lg-none">
			<div class="mobile-bar w-100 fixed-top">
				<div class="container">
					<div class="col-6 col-sm-6 col-md-4 mx-auto py-2">
						<a href="index.php"><img class="img-responsive w-100 h-100" src="images/logo-mo.png"></a>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12 d-none d-md-block px-0 topbar ">
				<div class="container">
					<div class="col-md-4 col-lg-3 col-lg-2 py-1 float-left px-0">
					    <p class="text float-left mb-0">Midwest company</p>
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
				<div class="col-md-4 col-lg-3 d-none d-md-block py-3 px-0">
					<a href="index.php"><img class="img-responsive w-100" src="images/logo.svg"></img></a>	
				</div>
			</div>
		</div>
		<div class="row d-none d-md-block second-bar">
			<div class="container p-md-0">
				<nav class="navbar  navbar-expand-md navbar-light  p-0 py-4">
					
				</nav>
			</div>		
	</div>
</div>


<div class="container-fluid py-5 main">
    <div class="container  px-0 pt-3 pt-md-3 pt-lg-0 my-5 rounded">
        
       <div class="row   account-main pt-4 pt-md-5 pb-5 px-2 px-md-5  w-100 ml-0 pro-main">
            <div class="col-12">

                <hr>
                <p class="text-center">Your <strong>OTP</strong> code has been sent to your <strong>   Email </strong> </p>
                <hr>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="mt-5">
                    

                    <input type="text" placeholder="OTP CODE" required class="form-control col-md-6 mx-auto" name="otp">
					<input type="hidden" name="user_id" value="<?php echo $user_id;?>">
                    <br>
                    <br>
                    <div class="col-12 col-md-4 col-lg-3 mx-auto">
                        <input type="submit" value="Send" class="btn btn-success my-3 begin col-12" name="submit">
                    </div>
                    
                    <div class="copy mt-4 ">
                        <p class="text-center text-md-right">OTP not recieved? <span class="span" >Send Again</span></p>
                    </div> 
                </form>
            </div>   
       </div>             
    </div>
</div>

<footer class="p-3 ">
	<p class="my-0">&copy;2019 All Right Reserved. Midwest Bank</p>
</footer>





<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script src="js/custom.js"></script>
<script src="js/acct.js"></script>

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