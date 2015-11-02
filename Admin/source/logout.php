<?php
	session_start();
	session_unregister('admin');
	header('location: login.php');
?>