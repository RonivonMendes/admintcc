<?php
	session_start();

	session_destroy();

	header('location: /admintcc/login.php');
?>