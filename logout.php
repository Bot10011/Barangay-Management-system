<?php 
session_start();
session_unset();
session_destroy();
header('Location: login.php');

if(isset($_GET['page'])) {
	$page = $_GET['page'];
	if($page == 'exit') {
		session_start();
		session_unset();
		session_destroy();
		header('Location: scanQRCode.php');
	}
}
?>