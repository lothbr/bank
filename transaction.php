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
		$matric = $user['matricno'];
		$depart = $user['department'];
		$level = $user['level'];
		$college = $user['college'];	
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scable-1">
	<meta http-equiv="X-UA-Compatible" content="ie=edge"> 
	
	<title>History | G-pay</title>
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
									<li class="nav-item "><a class="nav-link " href="dashboard.php"> My Account </a></li>
                                <li class="nav-item "><a class="nav-link " href="profile.php"> View Profile </a></li>
                                <li class="nav-item "><a class="nav-link  " href="transfer.php"> Payment Portal</a></li>
                                <li class="nav-item "><a class="nav-link actived" href="Transaction.php">  Transaction Receipt</a></li>
                                <li class="nav-item "><a class="nav-link " href="logout.php"> Log out </a></li>
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
					
				</div>
			</div>
		</div>
		
		<!-- Top/navbar mobile END!! -->


		<div class="row pt-md-5 pt-lg-0">
			<div class="col-12 d-none d-md-block px-0 mt-md-4 mt-lg-0 topbar ">
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

			<div class="container logo-main">
				
			</div>
		</div>

		


		<div class="row d-none d-md-block second-bar">
			<div class="container p-md-0">
				<nav class="navbar  navbar-expand-md navbar-light  p-0">
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav mr-auto">
                                <li class="nav-item "><a class="nav-link" href="dashboard.php"> My Account </a></li>
                                <li class="nav-item "><a class="nav-link" href="profile.php"> View Profile </a></li>
                                <li class="nav-item "><a class="nav-link" href="transfer.php">  Make Transfer </a></li>
                                <li class="nav-item "><a class="nav-link actived" href="Transaction.php">  Transaction Receipt </a></li>
                                <li class="nav-item "><a class="nav-link" href="logout.php"> Log out </a></li>
			     		</ul>
					</div>

					<div class="float-right bg-white px-0 login-wrap">
						<a class="text-center acces-center"> <span class="acces"> <i class="fa fa-user"></i> </span><?php echo "$firstname $lastname"; ?> </a>
					</div>
				</nav>
			</div>		
	</div>
</div>


<div class="container-fluid py-5 main">
    <div class="container dash px-0 pt-5 pt-md-3 pt-lg-0 my-5 my-md-0 rounded">
				<div class="col-12 col-sm-6 col-md-3 float-right py-2 px-4 d-lg-none mobile-name">
					<p class="text-sm-right"><?php echo "$firstname $lastname"; ?></p>
				</div>
				
				<div>
				<h1 style="float :center; display:inline-block; position: relative;margin-left:10px; ">
					RECEIPT </h1>
					<br>
					<br>

					<label style= "font-size:20px; float:left; display:inline-block; postion:relative;margin-left:20px;"> Session : </h2>
					<label style= "margin-left:30px;"> 2019/2020 </label> 
					<br/>
					<br/>
					<div id ="cont" style= "float:left; margin-left:30px;">
						<p>Full Name :</P>
						<p>Matric Number :</p>
						<p>Level:</p>
						<p>Department :</p>
						<p>College :</p>
						<p>Semester :</p>
					</div>
					<div  id = "content" style= "float: left; margin-left:50px;">
						
							<p style=><?php echo "$firstname $lastname";?></p>
							<p><?php echo $matric;?></p>
							<p ><?php echo $level;?></p>
							<p ><?php echo $depart;?></p>
							<p> <?php echo $college;?></p>

       					</div>
				</div>
       <div class="row  pt-0 pt-md-5 pb-5 px-2 px-md-5  w-100 ml-0 pro-main">
            <div class="col-12">
                <table class="table table-bordered table-responsive-lg">
                    <thead>
                        <tr>
                            <th scope="col">S/N</th>
                            <th scope="col">Name</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>

					
					<?php
						$response = fetch_transaction($user_id);
						$i = 1;
						//var_dump($response);
						if ($response) {
							$rows = $response;

							foreach ($rows as $row) {
								$tx_account = $row['tx_account'];
								$tx_name = $row['tx_name'];
								$tx_amount = $row['tx_amount'];
								$tx_email = $row['tx_email'];
								$status = $row['status'];								
					?>
                        <tr>
                            <th scope="row"><?php echo $i++; ?></th>
                            <td><?php echo $tx_account;?></td>
                            <td><?php echo $tx_name;?></td>
                            <td><?php echo $tx_email;?></td>
                            <td><?php echo $tx_amount;?></td>
                            
							<?php
								if($status === "2"){
									echo '<td style="color: green"><i class="fa fa-check-square"></i></td>';
								}else{
									echo '<td style="color: red"><i class="fa fa-close (alias)"></i></td>';
								}
							?>
        
                        </tr>

						 <?php } } ?>
                       
                    </tbody>
                </table>
            </div>
       </div>             
    </div>
</div>

<footer class="p-3 ">
	<?php require 'inc\footer.inc.php'?>
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