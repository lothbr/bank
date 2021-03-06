<?php
require_once 'libraries/functions.inc.php';
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}

	if (isset($_POST['submit'])) {
   $response = login_user($_POST);
   var_dump($response);

   if ($response == true) {
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
	
	<title>G-Pay</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link rel="stylesheet" type="text/css" href="css/account.css">
</head>


<body>
	<div class="outer-wrap " id="top-bar">
			<nav class="mobile-nav w-100">
				<ul class="">
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
		<div class="row pt-md-5 pt-lg-0">
				<div class="col-12 d-none d-md-block px-0 mt-md-4 mt-lg-0 topbar ">
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
				<nav class="navbar  navbar-expand-md navbar-light  p-0 py-4">
					
				</nav>
			</div>		
	</div>
</div>


<div class="container-fluid py-5 main">
	
    <div class="container  px-0 pt-3 pt-md-3 pt-lg-0 my-5 rounded">
            <h1>Login</h1>
       <div class="row   account-main pt-4 pt-md-5 pb-5 px-2 px-md-5  w-100 ml-0 pro-main">
            <div class="col-12">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <label>Email:<span style="color: red !important; display: inline; float: none;">*</span></label>
                    <input type="text" required placeholder="Email Address" class="form-control col-md-6 float-md-right" name="email">
                    <br>
                    <br>
                    <label>Pin:<span style="color: red !important; display: inline; float: none;">*</span></label>
                    <input type="password" required placeholder="PIN" class="form-control col-md-6 float-md-right" name="pin">
                    <br>
                    <br>
                
                    
                    
                    <input type="submit" value="Log in" class="btn btn-success my-3 px-5 begin" name="submit">
                    <div class="copy">
                        <p class="text-right">Not yet enrolled? <span class="span"><a href="account.php" class="text-success" style="text-decoration: none;">Enroll now</a></span></p>
                    </div>
                </form>
                  <?php if (isset($errors)) {
                                     foreach ($errors as $error) {
                                    echo "<p class='text-danger'>".$error."</p>";
                                }
                                } ?>  
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
<script src="js/login.js"></script>

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
