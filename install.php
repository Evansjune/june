<?php
	include("server.php");
	// creating a database called pettycash
	$db_create =  "create database if not exists bootstrap";

	if($conn->query($db_create)==true){
		echo "create bootstrap database";
	}
	else{
		echo "bootstrap database not created";
	}

	if($conn->select_db("bootstrap")==true){
		// connection to the database 
		$conn = new mysqli(HOST, DBUSER, PASS, "bootstrap");

		$users = "CREATE TABLE if not exists users(
				  user_id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				  username VARCHAR(255) NOT NULL,
				  emailaddress VARCHAR(255) NOT NULL,
				  password VARCHAR(255) NOT NULL,
				  created_at TIMESTAMP NOT NULL DEFAULT current_timestamp,
				  UNIQUE(emailaddress)
				  
				)";
		if ($conn->query($users)=== TRUE){
   			echo " Table users created successfully";
		}else{
			echo " Table users could not be created.".$conn->error;
		}

		$project = "CREATE TABLE if not exists project(
						id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
						user_id INT(255) NOT NULL,
						project_name VARCHAR(255) NOT NULL,
						created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
						UNIQUE(project_name)
						)";

		if ($conn->query($project)=== TRUE){
   			echo " Table project created successfully";
		}else{
			echo " Table project could not be created.".$conn->error;
		}

  

		

	    // $admin = "INSERT INTO `users` (`user_id`, `fullname`, `emailaddress`, `department`, `role`, `password`, `created_at`) VALUES (NULL, 'admin', 'admin@joadahconsult.com', 'administration', 'admin', MD5('12345678'), CURRENT_TIMESTAMP)";

	    //  if ($conn->query($admin)===TRUE){
	    // 	echo "Admin created successfully";
	    // }

    }


		$conn->close();
		
		// header("Location: index.php");


	// }
	// else{
	// 	echo "No database called pettycash";
	// }

	
?>