<!-- html/Logout.php -->
<?php
	
	session_start();
	unset($_SESSION['logueado']);
	header("Location: login");

