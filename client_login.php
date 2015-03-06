<?php 
/*
client_login.php
*/
require 'db_connect.php';
require 'functions.php';
sec_session_start(); // Our custom secure way of starting a php session. 
 

if(isset($_REQUEST['login']) && !login_check($mysqli)){
	if(isset($_REQUEST['username']) && isset($_REQUEST['password'])) { 
	   $username = sanitize_text($_REQUEST['username']);
	   $password = sanitize_text($_REQUEST['password']); // The hashed password.
	   if(login($username, $password, $mysqli) == true) {
		  // Login success
		  echo 'Success: You have been logged in!';
	   } else {
			if($_SESSION['error']['id']=='3'){
				// Login failed
				header('Location: ./login.php?error='.$_SESSION['error']['id']);
			}
			else{
				echo 'Error : '.$_SESSION['error']['id'];
				echo get_error_info();
			}
	   }
	} else { 
	   // The correct REQUEST variables were not sent to this page.
	   echo 'Error: Invalid Request';
	}
}else if(isset($_REQUEST['forgot_password'])){
	if(isset($_REQUEST['username']))
		header('Location: ./login.php?user='.$_REQUEST['username']);
	else
		echo 'Message: Enter username';
}
else{
	// either already logged in or navigated here
	if(login_check($mysqli)){
		echo 'Message: Already login!';
	}
}
/* USE WHEN SALT VALUE IS UPDATED
echo 'Password: '.hash('sha512', 'pass'.time());
echo '<br/>';
echo 'Salt: '. time();
*/
?>