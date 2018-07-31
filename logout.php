<?php 
	session_start();
	if( session_unset('email') == true	&& session_unset('user_id')==true)  {
	   header('Location:index.php?result=logout');
	   session_destroy();
	} else {
	   unset($_SESSION['email']);
	   unset($_SESSION['user_id']);
	   session_destroy();
	   header('Location:login.php?result=logout');
	}
?>