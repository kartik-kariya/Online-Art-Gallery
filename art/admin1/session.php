<?php
	session_start();
	
	
	if($_SESSION['admin'])
	{
		$user = $_SESSION['admin'];
	}
	else
	{
		header("location:../User/login.php");
	}
?>