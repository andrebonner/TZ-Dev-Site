<?php
/*
login.php
*/
require 'functions.php';

sec_session_start(); // Our custom secure way of starting a php session. 
 
if(isset($_REQUEST['error'])) { 
	echo 'Error : '.$_REQUEST['error']['id'].'<br/>';
	echo get_error_info().'<br/>';
}else if(isset($_REQUEST['user'])){
	echo 'User '.$_REQUEST['user'].'<br/>';
}
?>