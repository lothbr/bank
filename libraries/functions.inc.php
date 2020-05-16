<?php 
ob_start();
session_start();
require_once 'db_config.php';
require_once 'mail-function.inc.php';

// Define all helper functions

function sanitize($input){
	global $link;
	$input = htmlentities(strip_tags(trim($input)));
	$input = mysqli_real_escape_string($link, $input);
	return $input;
}

function sanitize_email($email){
	global $link;
	$email = filter_var($email, FILTER_VALIDATE_EMAIL);
	if ($email) {
		$email = mysqli_real_escape_string($link, $email);
		return $email;
	} return false;
}

// function upload_image($file, &$errors){
// 	$size = $file['size'];
// 	$type = $file['type'];
// 	$tmp_location = $file['tmp_name'];

// 	if ($size > 5120000) {
// 		$errors["file_size"] = "Profile picture is too large.";
// 		return false;
// 	}

// 	$allowed_extensions = array("jpg", 'jpeg', 'png', 'gif');
// 	$file_ext = explode('/', $type);
// 	$image_ext = strtolower(end($file_ext));
// 	if (!in_array($image_ext, $allowed_extensions)) {
// 		$errors["file_type"] = "File type not allowed";
// 		return false;
// 	}

// 	$upload_dir = "/../uploads";
// 	$image_name = hash("sha256", uniqid());
// 	$image_path = $upload_dir . $image_name . "." . $image_ext;

// 	if (move_uploaded_file($tmp_location, $image_path)) {
// 		return $image_path;
// 	}

// 	$errors["upload_failed"] = "Sorry, image upload failed!";
// 	return false;
// }

function check_duplicate($email){
	global $link;
	$sql = "SELECT email FROM users WHERE email = '$email'";
	$query = mysqli_query($link, $sql);
	if ($query) {
		if (mysqli_num_rows($query) > 0) {
			return true;
		} return false;
	} return false;
}

function format_post_date($date){
	$date = date("Y-m-d H:i:s", $date);
	return $date;
}


// Helper functions end here

function register_user($post){
	global $link;
	$errors = array();
	$err_flag = false;

	//firstname
	if (!empty($post['firstname'])) {
		$firstname = sanitize($post['firstname']);
	} else {
		$errors['firstname'] = "Enter your first name";
		$err_flag = true;
	}

	//surname
	if (!empty($post['lastname'])) {
		$lastname = sanitize($post['lastname']);
	} else {
		$errors['lastname'] = "Enter your lastname";
		$err_flag = true;
	}

	// matric number
	if (!empty($post['matricno'])) {
		$matricno = sanitize($post['matricno']);
	} else {
		$errors['matricno'] = "Enter your matric number";
		$err_flag = true;
	}

	// gender
	if (!empty($post['gender'])) {
		$gender = sanitize($post['gender']);
	} else {
		$errors['gender'] = "choose your  gender";
		$err_flag = true;
	}

	//level
	if (!empty($post['level'])) {
		$level = sanitize($post['level']);
	} else {
		$err_flag = true;
		$errors['level'] = "Please select your level";
	}


	//department
	if (!empty($post['department'])) {
		$department = sanitize($post['department']);
	} else {
		$err_flag = true;
		$errors['department'] = "Please select your department";
	}

	// college
	if(!empty($post['college'])){
		$college = sanitize($post['college']);
	} else {
		$err_flag = true;
		$errors['college']= "Please select your college";
	}

	// address
	if (!empty($post['address'])) {
		$address = sanitize($post['address']);
	} else {
		$err_flag = true;
		$errors['address'] = "Please select your block chain";
	}

	//country
	if (!empty($post['country'])) {
		$country = sanitize($post['country']);
	} else {
		$err_flag = true;
		$errors['country'] = "Please select your country";
	}


	//state
	if (!empty($post['state'])) {
		$state = sanitize($post['state']);
	} else {
		$err_flag = true;
		$errors['state'] = "Please enter your state of origin";
	}

	if (!empty($post['s_question'])) {
		$s_question = sanitize($post['s_question']);
	} else {
		$err_flag = true;
		$errors['s_question'] = "Please select your security question";
	}

	if (!empty($post['s_answer'])) {
		$s_answer = sanitize($post['s_answer']);
	} else {
		$err_flag = true;
		$errors['s_answer'] = "Please select your security answer";
	}
	

	//email
	if (!empty($post['email'])) {
		$email_tmp = sanitize($post['email']);
		if (!check_duplicate($email_tmp)) {
			$email = $email_tmp;
		} else {
			$err_flag = true;
			$errors['email'] = "This email has already been used!";
		}
	} else {
		$err_flag = true;
		$errors['email'] = "Enter your email";
	}

	if (!empty($post['c_email'])) {
		$c_email = sanitize($post['c_email']);
	} else {
		$err_flag = true;
		$errors['c_email'] = "Please select your confirm email";
	}

	if (isset($email) && isset($c_email)) {
		if ($email == $c_email) {
			$password = $email;
		} else {
			$errors['email'] = "Emails do not match";
			$err_flag = true;
		}
	}


	// //profile_pic
	// if (!empty($file)) {
	// 	$image_path = upload_image($file, $errors);
	// 	if (!$image_path) {
	// 	}
	// } else {
	// 	$errors['picture'] = "Please select a profile picture";
	// 	$err_flag = true;
	// }
	//password
	if (!empty($post['password1'])) {
		$password1 = sanitize($post['password1']);
	} else {
		$errors['password1'] = "Enter your password";
		$err_flag = true;
	}

	if (!empty($post['password2'])) {
		$password2 = sanitize($post['password2']);
	} else {
		$errors['password2'] = "Confirm your password";
		$err_flag = true;
	}

	if (isset($password1) && isset($password2)) {
		if ($password1 == $password2) {
			$password = password_hash($password2, PASSWORD_DEFAULT);
		} else {
			$errors['password'] = "Passwords do not match";
			$err_flag = true;
		}
	}

	$account = substr(str_shuffle("0123456789"), 0, 11);
	$pin = substr(str_shuffle("0123456789"), 0, 4);
	echo $pin;
	$recover_password = "MWB".substr(str_shuffle("0123456789"), 0, 10);
	


	if ($err_flag === false) {
		$sql = "INSERT INTO users(firstname, lastname, matricno, department, college, level, gender,address, password, country, state, s_question, s_answer, email, account, pin, recover_password) VALUES ('$firstname', '$lastname','$matricno','$department', '$college', '$level', '$gender','$address', '$password', '$country','$state','$s_question','$s_answer','$email', '$account', '$pin', '$recover_password')";
		$query = mysqli_query($link, $sql);

		
		//if query is successful
		if ($query) {
			$subject = "Welcome to G-Pay";
			$body = "Your Generated PIN is $pin \n Please use your email Address and pin to log in for transactions. \n 
			Thank you for opening an account with G-Pay. \n You are getting this mail because you registered with G-Pay.";
			$from = "Powered by G-Pay";
			$response =  send_mail($email, $subject, $body, $from);

			if ($response) {
					return true;
			} else {
				$errors[] = "Ooops!!! Something went wrong. (Email)";
				return $errors;
			}
		} else {
			$errors[] = "Could not insert into database " . mysqli_error($link);
			return $errors;
		}
	} return $errors;

}



// function get_register_template($file_path, $name, $account, $pin){
// 	// From URL to get webpage contents. 
// 	//$url = $_SERVER['SERVER_NAME'] . '/libraries/' . $file_path; 
// 	$url = "https://midwestbank.online" . '/libraries/' . $file_path; 

// 	// Initialize a CURL session. 
// 	$ch = curl_init();  

// 	// Return Page contents. 
// 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

// 	//grab URL and pass it to the variable. 
// 	curl_setopt($ch, CURLOPT_URL, $url); 

// 	$body = curl_exec($ch); 
  
// 	$body = str_replace('#firstname#', $name, $body);
// 	$body = str_replace('#account#', $account, $body);
// 	$body = str_replace('#pin#', $pin, $body);
// 		return $body;
// }

// function get_otp_template($file_path, $otp){
// 	// From URL to get webpage contents. 
// 	//$url = $_SERVER['SERVER_NAME'] . '/libraries/' . $file_path; 
// 	$url = "https://midwestbank.online" . '/libraries/' . $file_path; 

// 	// Initialize a CURL session. 
// 	$ch = curl_init();  

// 	// Return Page contents. 
// 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

// 	//grab URL and pass it to the variable. 
// 	curl_setopt($ch, CURLOPT_URL, $url); 

// 	$body = curl_exec($ch); 
  
// 	$body = str_replace('#otp#', $otp, $body);
// 		return $body;
// }


function login_user($post){
	global $link;
	$err_flag = false;
	$errors = [];

	if (!empty($post['email'])) {
		$tmp = sanitize_email($post['email']);
		if ($tmp) {
			$email = $tmp;
		} else {
			$err_flag = true;
			$errors[] = "Please enter a valid email address";
		}
	} else {
		$err_flag = true;
		$errors[] = "Please enter an email address";
	}

	if (!empty($post['pin'])) {
		$pin = sanitize($post['pin']);
	} else {
		$err_flag = true;
		$errors[] = "Please enter your pin number";
	}


	if ($err_flag === false) {

		$sql = "SELECT * FROM users WHERE email = '$email' AND pin = '$pin'";
		$query = mysqli_query($link, $sql);

			
					
		
			if (mysqli_num_rows($query) > 0) {
				$row = mysqli_fetch_array($query);				
					$user_id = $row['user_id'];
					$firstname = $row['firstname'];
					$lastname = $row['lastname'];
					
					
					$_SESSION['user_id'] = $user_id;
					$_SESSION['firstname'] = $firstname;
					$_SESSION['lastname'] = $lastname;

					
						$result = fetch_user_info($email);
							if ($result !== false) {
							$user = $result;
							$user_id = $user['user_id'];
						}
								
						$sql_login = "SELECT * FROM account WHERE user_id = '$user_id'";
						$query_login = mysqli_query($link, $sql_login);

						if (mysqli_num_rows($query_login) > 0) {
							return true;
						}else{
							$sql = "INSERT INTO account (user_id, acc_balance) VALUES ('$user_id','0')";
							$query = mysqli_query($link, $sql);
						}

			
					
			return true;
		}	else {
					$errors[] = "Invalid login details";
					return $errors;
				}
	} return $errors;
}


function fetch_user($user_id = null){
	global $link;
	if ($user_id != null) {
		$sql = "SELECT * FROM users INNER JOIN login ON users.user_id = login.user_id INNER JOIN account ON users.user_id = account.user_id WHERE login.user_id = '$user_id'";
		$query = mysqli_query($link, $sql);
		if (mysqli_num_rows($query) > 0) {
			$row = mysqli_fetch_array($query);
			return $row;
		} return false;
	} return false;
}

function fetch_user_info($email){
	global $link;
	if ($email != null) {
		$sql = "SELECT * FROM users WHERE email = '$email'";
		$query = mysqli_query($link, $sql);
		if (mysqli_num_rows($query) > 0) {
			$row = mysqli_fetch_array($query);
			return $row;
		} return false;
	} return false;
}

function transaction($post)
{
	global $link;
	$err_flag = false;
	$errors = [];

	if (!empty($post['tx_account'])) {
		$tx_account = sanitize($post['tx_account']);
	} else {
		$err_flag = true;
		$errors['tx_account'] = "Please enter your account number";
	}
	if (!empty($post['tx_amount'])) {
		$tx_amount = sanitize($post['tx_amount']);
	} else {
		$err_flag = true;
		$errors['tx_amount'] = "Please enter your amount number";
	}

	if (!empty($post['tx_name'])) {
		$tx_name = sanitize($post['tx_name']);
	} else {
		$err_flag = true;
		$errors['tx_name'] = "Please enter your transcation name";
	}

	if (!empty($post['email'])) {
		$tmp = sanitize_email($post['email']);
		if ($tmp) {
			$email = $tmp;
		} else {
			$err_flag = true;
			$errors['email'] = "Please enter a valid email address";
		}
	} else {
		$err_flag = true;
		$errors['email'] = "Please enter an email address";
	}

	$time = format_post_date(time() + 3600);


	if (!empty($post['pin'])) {
		$check_pin = sanitize($post['pin']);
	} else {
		$err_flag = true;
		$errors['check_pin'] = "Please enter your pin number";
	}

	if (isset($post['correct_pin'])) {
		$correct_pin = $post['correct_pin'];
	}

	if ($check_pin === $correct_pin) {
		$pin = $correct_pin;
	}else{
		$errors['pin'] = "Pin is incorrect";
		$err_flag = true;
	}

	$otp = substr(str_shuffle("0123456789"), 0, 4);

	if (isset($post['user_id'])) {
		$user_id = $post['user_id'];
	}

	if ($err_flag === false) {

		$acc_balance = get_balance($user_id);
		$new_balance = $acc_balance - $tx_amount;
		if ($new_balance >= 0) {
			$sql = "UPDATE account SET acc_balance = '$new_balance' WHERE user_id = '$user_id'";
			$query = mysqli_query($link, $sql);
			if ($query) {
				$sql = "INSERT INTO transaction(user_id, tx_account, tx_amount, tx_name, tx_email, otp, time) VALUES ('$user_id', '$tx_account', '$tx_amount', '$tx_name', '$email', '$otp', '$time')";
					$query = mysqli_query($link, $sql);
					if ($query) {
						$result = fetch_user($user_id);
							if ($result !== false) {
							$user = $result;
							$email = $user['email'];
						}
						$subject = "OTP from Midwest Bank";
						$body = get_otp_template("otp_temp.php", $otp);
						$response = send_mail($email, $otp, $subject, $body);
						return true;
						}else{
							return false;
							$errors['balance'] = "You cannot transfer more than your current account balance";
						}
					}else{
						$errors[] = "Transaction didn't work";
						return $errors;
					}
			}		
	}return $errors;

}

function verify_otp($post)
{
	global $link;
	$err_flag = false;
	$errors = [];

	if (!empty($post['otp'])) {
		$otp = sanitize($post['otp']);
	} else {
		$err_flag = true;
		$errors['otp'] = "Please enter your OTP CODE!";
	}
	if (isset($post['user_id'])) {
		$user_id = $post['user_id'];
	}

	if ($err_flag === false) {
		$sql = "SELECT * FROM transaction WHERE otp = '$otp'";
		$query = mysqli_query($link,$sql);

		if (mysqli_num_rows($query)> 0) {
			$sql_update = "UPDATE transaction SET status=2 WHERE otp = '$otp'";
			$query_update = mysqli_query($link,$sql_update);
			if ($query_update) {
				return true;
			}else{
				// $errors[] = "No such transaction exists!";
				// return $errors;
				return false;
			}
			
		}else {
			$errors[] = "Invalid OTP CODE!. Please check your OTP CODE correctly";
			return false;
		}
	}return $errors;
}

function fetch_transaction($user_id)
{
	global $link;
	if ($user_id != null) {
		$sql = "SELECT * FROM transaction WHERE user_id = '$user_id'";
		$query = mysqli_query($link, $sql);
		if (mysqli_num_rows($query) > 0) {
			while ($row = mysqli_fetch_assoc($query)) {
				$categories[] = $row;
			}return $categories;
		} return false;
	} return false;
}
function get_balance($user_id)
{
	global $link;
	$sql = "SELECT acc_balance FROM account WHERE user_id = '$user_id'";
			$query = mysqli_query($link, $sql);
			if (mysqli_num_rows($query) > 0) {
				while ($rows = mysqli_fetch_assoc($query)) {
					$acc_balance = $rows['acc_balance'];
				}return $acc_balance;
			}
}




