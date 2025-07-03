<?php 
	session_start();
	$conn = mysqli_connect("localhost","root","","brgy_mgmt");
	if(!$conn) {
		exit();
	}
?>