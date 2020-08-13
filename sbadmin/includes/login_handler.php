<?php  

if(isset($_POST['login_button'])) {

	$email = filter_var($_POST['log_email'], FILTER_SANITIZE_EMAIL); //sanitize email

	$_SESSION['log_email'] = $email; //Store email into session variable 
	$password = md5($_POST['log_password']); //Get password

	$check_database_query = mysqli_query($con, "SELECT * FROM users WHERE email='$email' AND password='$password'");
	$check_login_query = mysqli_num_rows($check_database_query);

	$user_total = $_POST['random'];
	$total = $_SESSION['number'];

	if($check_login_query == 1) {
		$row = mysqli_fetch_array($check_database_query);
		$username = $row['username'];


		if($user_total == $total){
		$_SESSION['username'] = $username;
		  header("Location: index.php");
		exit();
	}	else {
		//	array_push($error_array, "Email or password was incorrect<br>");
			$message = "Captha Wrong.\\nTry again.";
			echo "<script type='text/javascript'>alert('$message');</script>";  
		}
		
	}
	else {
		//	array_push($error_array, "Email or password was incorrect<br>");
			$message = "Username and/or Password incorrect.\\nTry again.";
			echo "<script type='text/javascript'>alert('$message');</script>";  
		}
}

	if(isset($_SESSION['username'])){
		//Clear session variables 
		
		$_SESSION['log_email'] = "";
		$_SESSION['number'] = "";

	}



?>