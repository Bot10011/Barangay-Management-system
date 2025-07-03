<?php 
	include '../config.php';


	// DELETE USER - RESIDENT_DELETE.PHP
	if(isset($_POST['delete_resident'])) {
		$residenceId = $_POST['residenceId'];

		$delete = mysqli_query($conn, "DELETE FROM residence WHERE residenceId='$residenceId'");
		 if($delete) {
	      	$_SESSION['message'] = "Resident information has been deleted!";
	        $_SESSION['text'] = "Deleted successfully!";
	        $_SESSION['status'] = "success";
			header("Location: resident.php");
	      } else {
	        $_SESSION['message'] = "Something went wrong while deleting the record";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: resident.php");
	      }
	}







?>




