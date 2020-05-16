<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scable-1">
	<meta http-equiv="X-UA-Compatible" content="ie=edge"> 
	<title>Contact | G-Pay</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link rel="stylesheet" type="text/css" href="css/dashboard.css">
</head>


<body>
<div class="row">
			<div class="col-12 d-none d-md-block px-0 topbar ">
				<div class="container">
					<div class="col-md-4 col-lg-3 col-lg-2 py-1 float-left px-0">
					    <p class="text float-left mb-0">G-Pay</p>
					</div>
					<nav class="navbar navbar-expand-md navbar-light bg-light float-right  p-0">
						<div class="collapse` navbar-collapse" id="navbarSupportedContent">
							<ul class="navbar-nav mr-auto">
                                <li class="nav-item active"><a class="nav-link" href="index.php">| Home |</a></li>
			     				 <li class="nav-item active"><a class="nav-link" href="about.php">| About Us |</a></li>
			     				 <li class="nav-item active"><a class="nav-link" href="contact.php">| Contact Us |</a></li>
			     			</ul>
						</div>
					</nav>
				</div>
			</div>
<div class="container p-main px-0 pt-5 pt-md-3 pt-lg-0 ">
		<div class="row py-3  px-2 px-md-5  w-100 ml-0">
			<div class="col-md-9 col-lg-7 float-left contact-main">
                
            
                 <p id="h1" class="h1 pt-3 pt-md-5">Contact Us<p>
                 <ul class="list-group">
                     <label>Full name</label>
                     <li class="list-group-item p-0 border-0"><input type="text" class="form-control"></li>
                     <label class="mt-2">Location</label>
                     <li class="list-group-item p-0 border-0"><input type="country" class="form-control"></li>
                     <label class="mt-2">Phone</label>
                     <li  class="list-group-item p-0 border-0"><input type="number" class="form-control"></li>
                     <label class="mt-2">Email</label>
                     <li  class="list-group-item p-0 border-0"><input type="email" class="form-control"></li>
                     <label class="mt-2">Message</label>
                     <li  class="list-group-item p-0 border-0"><textarea class="p-3" rows="5"></textarea></li>
                     <li  class="list-group-item p-0 border-0"><input id="submit" type="submit" value="Submit" class="btn btn-primary px-4 my-4"></li>
                     <p>Please remember for security purposes do not disclose any confidential or sensitive information (i.e. social security <br>numbers, account numbers, etc.).</p>
                 </ul>
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
});
</script>

</body>
</html>