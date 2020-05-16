<?php
require_once 'libraries/functions.inc.php';
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}

	if (isset($_POST['submit'])) {
   $response = login_user($_POST);
   var_dump($response);

   if ($response === true) {
		header("Location: dashboard.php");
        exit();   
   } else {
        $errors = $response;
   }
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scable-1">
	<meta http-equiv="X-UA-Compatible" content="ie=edge"> 
	<link rel="shortcut icon" href="images/logo.svg">
	<title>About | Midwest Bank</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link rel="stylesheet" type="text/css" href="css/personal.css">
</head>


<body>
	<div class="outer-wrap " id="top-bar">
			<nav class="mobile-nav w-100">
				<ul class="">
                        <li class="mobile-list"><a class="mobile-link" href="personal.php"> Personal </a></li>
                        <li class="mobile-list"><a class="mobile-link" href="business.php"> Business </a></li>
                        <li class="mobile-list"><a class="mobile-link" href="insurance.php"> Insurance </a></li>
                        <li class="mobile-list"><a class="mobile-link" href="management.php"> Midwest Wealth Management </a></li>
                        <li class="mobile-list"><a class="mobile-link" href="resources.php"> Other Resources </a></li>
                        <li class="mobile-list"><a class="mobile-link" href="about.php"> About Us </a></li>
                        <li class="mobile-list"><a class="mobile-link" href="contact.php"> Contact Us </a></li>
                        <li class="mobile-list"><a class="mobile-link" href="career.php"> Careers </a></li>
                        <li class="mobile-list"><a class="mobile-link" href="news.php"> News </a></li>
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
						<a href="index.php"><img class="img-responsive w-100 h-100" src="images/logo-mo.png"></a>
					</div>
				</div>
			</div>
		</div>

		<!-- Top/navbar mobile end -->


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
        <nav class="navbar  navbar-expand-md navbar-light  p-0">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                        <li class="nav-item active"><a class="nav-link" href="personal.php"> Personal </a></li>
                        <li class="nav-item active"><a class="nav-link" href="business.php"> Business </a></li>
                        <li class="nav-item active"><a class="nav-link" href="insurance.php"> Insurance </a></li>
                        <li class="nav-item active"><a class="nav-link" href="management.php"> Midwest Wealth Management </a></li>
                        <li class="nav-item active"><a class="nav-link" href="resources.php"> Other Resources </a></li>
                </ul>
            </div>

            <div class="float-right bg-white px-0 login-wrap">
                <a class="text-center acces-center"> <span class="acces"><img src="images/lock.png"></span>Access Your Account <i class="fa fa-caret-down"></i></a>
                <div class="login m-0 bg-white">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" >
                        <label><input type="radio" name="AccountType" id="personalradio" value="personal" checked="checked" />&nbsp;Personal</label> &nbsp; &nbsp;
                        <label><input type="radio" name="AccountType" id="businessradio" value="business" />&nbsp;Business</label> 
                        <div class="form-group">
                            <label class="mb-3">Email:</label>
                            <input class="w-100 mt-1" type="text" name="email" required>
                        </div>
                        <div class="form-group">
                            <label>Pin:</label>
                            <input  class="mt-1 w-100" type="password" name="pin" required>
                        </div> 
                        <input type="submit" class="btn" name="submit" value="Log In"/>
                        
                            <div class="col-12 px-0">
                            <ul class="onlineBanking-links px-0 w-100">
                                <li><a href="forget.php">Forgot your Password?</a></li>
                                <li><a href="account.php">Need a User ID? Enroll today</a></li>
                            </ul>
                        </div>
                    </form>

                    <div class="clear"></div>