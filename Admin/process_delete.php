<?php 
	include '../config.php';

	// DELETE USER - USERS_UPDATE_DELETE.PHP
	if(isset($_POST['delete_system_user'])) {
		$user_Id = $_POST['user_Id'];

		$delete = mysqli_query($conn, "DELETE FROM users WHERE user_Id='$user_Id'");
		if($delete) {
	      	$_SESSION['message'] = "System User has been deleted!";
	        $_SESSION['text'] = "Deleted successfully!";
	        $_SESSION['status'] = "success";
			header("Location: users.php");
	      } else {
	        $_SESSION['message'] = "Something went wrong while deleting the record";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: users.php");
	      }
	}


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



	// DELETE OFFICIAL - OFFICIAL_UPDATE_DELETE.PHP
	if(isset($_POST['delete_official'])) {
		$officialID = $_POST['officialID'];

		$delete = mysqli_query($conn, "DELETE FROM officials WHERE officialID='$officialID'");
		 if($delete) {
	      	$_SESSION['message'] = "Barangay Official has been deleted!";
	        $_SESSION['text'] = "Deleted successfully!";
	        $_SESSION['status'] = "success";
			header("Location: officials.php");
	      } else {
	        $_SESSION['message'] = "Something went wrong while deleting the record";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: officials.php");
	      }
	}



	// DELETE CUSTOMIZATION - CUSTOMIZE_UPDATE_DELETE.PHP
	if(isset($_POST['delete_customization'])) {
		$customID = $_POST['customID'];

		$delete = mysqli_query($conn, "DELETE FROM customization WHERE customID='$customID'");
		 if($delete) {
	      	$_SESSION['message'] = "Cutomization image has been deleted!";
	        $_SESSION['text'] = "Deleted successfully!";
	        $_SESSION['status'] = "success";
			header("Location: customize.php");
	      } else {
	        $_SESSION['message'] = "Something went wrong while deleting the record";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: customize.php");
	      }
	}



	// DELETE ACTIVITY - ACTIVITY_UPDATE_DELETE.PHP
	if(isset($_POST['delete_activity'])) {
		$actId = $_POST['actId'];

		$delete = mysqli_query($conn, "DELETE FROM activity WHERE actId='$actId'");
		 if($delete) {
	      	$_SESSION['message'] = "Activity has been deleted!";
	        $_SESSION['text'] = "Deleted successfully!";
	        $_SESSION['status'] = "success";
			header("Location: dashboard.php?#activity");
	      } else {
	        $_SESSION['message'] = "Something went wrong while deleting the record";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: dashboard.php?#activity");
	      }
	}



?>




