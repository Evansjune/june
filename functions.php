<?php
	session_start();
    $myemail = $_SESSION['email'];
    $uid = $_SESSION['user_id'];
    
	include('dbcon.php');
	// register form
	if(isset($_POST['register'])){	
			$username = strip_tags($_POST['username']);
			$email = strip_tags($_POST['email']);
			$password = md5(strip_tags($_POST['password']));
			$password2 = md5(strip_tags($_POST['password2']));

			

			if($password===$password2){
				
				$insert = "insert into users(username, emailaddress, password) values('$username', '$email', '$password')";
				if($conn->query($insert)==true){
					header('Location:login.php?result=success');
				}
				else{
					header('Location:register.php?result=failure');
				}
			}
			else{
				header('Location:register.php?result=password_match');
			}
			
	}

	// login form
	if(isset($_POST['login_me'])){
			$email = strip_tags($_POST['email']);
			$password = md5(strip_tags($_POST['password']));

			$query = "SELECT user_id,emailaddress FROM users WHERE emailaddress = '$email' AND password = '$password' LIMIT 1";
			// var_dump($query);
			$output = $conn->query($query);
			var_dump($output);

			if(mysqli_num_rows($output) != 1){
				header('Location:login.php?result=failure');
			}
			else{
				$login_parameters = $output->fetch_assoc();
				$_SESSION['user_id'] = $login_parameters['user_id'];
				$_SESSION['email'] = $email;

				// $role = $login_parameters['role'];

				header('Location:index.php?result=success');
			}
	        
			
	}
	// project form
	if(isset($_POST['submit'])){
		$userid=strip_tags($_POST['user_id']);
		$project=strip_tags($_POST['project']);
		$insert = "insert into project(user_id,project_name)values('$uid','$project')";
		if($conn->query($insert)==true){
			header('Location:index.php?result=project');
		}
		else{
			var_dump($insert);
		}

	}
	$conn->close();
?>
		