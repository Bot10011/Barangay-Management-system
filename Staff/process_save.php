<?php 
	include '../config.php';
	include('../phpqrcode/qrlib.php');
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require '../vendor/PHPMailer/src/Exception.php';
	require '../vendor/PHPMailer/src/PHPMailer.php';
	require '../vendor/PHPMailer/src/SMTP.php';
	date_default_timezone_set('Asia/Manila');


	// SAVE RESIDENT - RESIDENT_ADD.PHP
	if(isset($_POST['create_resident'])) {
		$firstname        = mysqli_real_escape_string($conn, $_POST['firstname']);
		$middlename       = mysqli_real_escape_string($conn, $_POST['middlename']);
		$lastname         = mysqli_real_escape_string($conn, $_POST['lastname']);
		$suffix           = mysqli_real_escape_string($conn, $_POST['suffix']);
		$dob              = mysqli_real_escape_string($conn, $_POST['dob']);
		$age              = mysqli_real_escape_string($conn, $_POST['age']);
		$birthplace       = mysqli_real_escape_string($conn, $_POST['birthplace']);
		$gender           = mysqli_real_escape_string($conn, $_POST['gender']);
		$civilstatus      = mysqli_real_escape_string($conn, $_POST['civilstatus']);
		$citizenship      = mysqli_real_escape_string($conn, $_POST['citizenship']);
		$occupation       = mysqli_real_escape_string($conn, $_POST['occupation']);
		$religion		  = mysqli_real_escape_string($conn, $_POST['religion']);
		$contact	      = mysqli_real_escape_string($conn, $_POST['contact']);
		$house_no         = mysqli_real_escape_string($conn, $_POST['house_no']);
		$street_name      = mysqli_real_escape_string($conn, $_POST['street_name']);
		$purok            = mysqli_real_escape_string($conn, $_POST['purok']);
		$zone             = mysqli_real_escape_string($conn, $_POST['zone']);
		$barangay         = mysqli_real_escape_string($conn, $_POST['barangay']);
		$municipality     = mysqli_real_escape_string($conn, $_POST['municipality']);
		$province         = mysqli_real_escape_string($conn, $_POST['province']);
		$region           = mysqli_real_escape_string($conn, $_POST['region']);
		$familyIndicator  = mysqli_real_escape_string($conn, $_POST['familyIndicator']);
		$headName 	      = mysqli_real_escape_string($conn, $_POST['headName']);
		$familyRole       = mysqli_real_escape_string($conn, $_POST['familyRole']);
		$sector           = mysqli_real_escape_string($conn, $_POST['sector']);
		$resident_status  = mysqli_real_escape_string($conn, $_POST['resident_status']);
		$voter_status     = mysqli_real_escape_string($conn, $_POST['voter_status']);
		$ID_status        = mysqli_real_escape_string($conn, $_POST['ID_status']);
		$QR_status        = mysqli_real_escape_string($conn, $_POST['QR_status']);
		$months_of_stay   = mysqli_real_escape_string($conn, $_POST['months_of_stay']);
		$years_of_stay    = mysqli_real_escape_string($conn, $_POST['years_of_stay']);
		$added_By		  = mysqli_real_escape_string($conn, $_POST['added_By']);	  
		$date_registered  = date('Y-m-d');
		$file             = basename($_FILES["fileToUpload"]["name"]);
		$signature		  = basename($_FILES["signature"]["name"]);
		$certificate      = basename($_FILES["certificate"]["name"]);


		// SAVING QR CODES**********************************************************************
		$bms = 'BMS-';
    	$residentCode = $bms.uniqid();

    	// $residentCode = $firstname. ' ' .$middlename. ' ' .$lastname. ' ' .$suffix;

	    $path = '../images-qr-codes/';
	    $qr_image = $path.uniqid().".png";

	    $ecc = 'L';
	    $pixel_Size = 10;
	    $frame_Size = 10;
	    QRcode::png($residentCode,$qr_image,$ecc,$pixel_Size,$frame_Size);
	    // *************************************************************************************

	

		$ageClassification = "";
		if (
			$age == "1 day old" ||
			$age == "2 days old" ||
			$age == "3 days old" ||
			$age == "4 days old" ||
			$age == "5 days old" ||
			$age == "6 days old" ||
			$age == "1 day old" ||
			$age == "1 week old" ||
			$age == "2 weeks old" ||
			$age == "3 weeks old" ||
			$age == "4 weeks old" ||
			$age == "1 month old" ||
			$age == "2 months old" ||
			$age == "3 months old" ||
			$age == "4 months old" ||
			$age == "5 months old" ||
			$age == "6 months old" ||
			$age == "7 months old" ||
			$age == "8 months old" ||
			$age == "9 months old" ||
			$age == "10 months old" ||
			$age == "11 months old" ||
			$age == "1 year old" ||
			$age == "2 years old" ||
			$age == "3 years old" ||
			$age == "4 years old"
		) { echo $ageClassification = "Toddler"; }

		elseif(
			$age == "5 years old" ||
			$age == "6 years old" ||
			$age == "7 years old" ||
			$age == "8 years old" ||
			$age == "9 years old" ||
			$age == "10 years old" ||
			$age == "11 years old" 
			
		) { echo $ageClassification = "Child"; } 

		elseif(
			$age == "12 years old" ||
			$age == "13 years old" ||
			$age == "14 years old" ||
			$age == "15 years old" ||
			$age == "16 years old" ||
			$age == "17 years old"
		) { echo $ageClassification = "Teen";; } 

		elseif(
			$age == "18 years old" ||
			$age == "19 years old" ||
			$age == "20 years old" ||
			$age == "21 years old" ||
			$age == "22 years old" ||
			$age == "23 years old" ||
			$age == "24 years old" 

		) { echo $ageClassification = "Young"; } 

		elseif(
			$age == "25 years old" ||
			$age == "26 years old" ||
			$age == "27 years old" ||
			$age == "28 years old" ||
			$age == "29 years old" ||
			$age == "30 years old" ||
			$age == "31 years old" ||
			$age == "32 years old" ||
			$age == "33 years old" ||
			$age == "34 years old" ||
			$age == "35 years old" ||
			$age == "36 years old" ||
			$age == "37 years old" ||
			$age == "38 years old" ||
			$age == "29 years old" ||
			$age == "40 years old" ||
			$age == "41 years old" ||
			$age == "42 years old" ||
			$age == "43 years old" ||
			$age == "44 years old" ||
			$age == "45 years old" ||
			$age == "46 years old" ||
			$age == "47 years old" ||
			$age == "48 years old" ||
			$age == "49 years old" ||
			$age == "50 years old" ||
			$age == "51 years old" ||
			$age == "52 years old" ||
			$age == "53 years old" ||
			$age == "54 years old" ||
			$age == "55 years old" ||
			$age == "56 years old" ||
			$age == "57 years old" ||
			$age == "58 years old" ||
			$age == "59 years old"
		) { echo $ageClassification = "Adult"; } 

		else { echo $ageClassification = "Senior"; }



		if(empty($certificate)) {
			$check_email = mysqli_query($conn, "SELECT * FROM residence WHERE firstname='$firstname' AND middlename='$middlename' AND lastname='$lastname' AND suffix='$suffix' AND dob='$dob' AND age='$age'");
			if(mysqli_num_rows($check_email)>0) {
			      $_SESSION['message'] = "This resident already exists.";
			      $_SESSION['text'] = "Please try again.";
			      $_SESSION['status'] = "error";
				  header("Location: resident_add.php");
			} else {

				// Check if image file is a actual image or fake image
			    $target_dir = "../images-residence/";
			    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			    $uploadOk = 1;
			    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


			    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
				if($check == false) {
				    $_SESSION['message']  = "Resident file is not an image.";
				    $_SESSION['text'] = "Please try again.";
				    $_SESSION['status'] = "error";
					header("Location: resident_add.php");
			    	$uploadOk = 0;
			    } 

				// Check file size // 500KB max size
				elseif ($_FILES["fileToUpload"]["size"] > 500000) {
				  	$_SESSION['message']  = "Resident file must be up to 500KB in size.";
				    $_SESSION['text'] = "Please try again.";
				    $_SESSION['status'] = "error";
					header("Location: resident_add.php");
			    	$uploadOk = 0;
				}

			    // Allow certain file formats
			    elseif($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
				    $_SESSION['message'] = "Only JPG, JPEG, PNG & GIF files are allowed.";
				    $_SESSION['text'] = "Please try again.";
				    $_SESSION['status'] = "error";
					header("Location: resident_add.php");
				    $uploadOk = 0;
			    }

			    // Check if $uploadOk is set to 0 by an error
			    elseif ($uploadOk == 0) {
				    $_SESSION['message'] = "Your file was not uploaded.";
				    $_SESSION['text'] = "Please try again.";
				    $_SESSION['status'] = "error";
					header("Location: resident_add.php");

			    // if everything is ok, try to upload file
			    } else {

		        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

	        		// Check if image file is a actual image or fake image
				    $sign_target_dir = "../images-signature/";
				    $sign_target_file = $sign_target_dir . basename($_FILES["signature"]["name"]);
				    $sign_uploadOk = 1;
				    $sign_imageFileType = strtolower(pathinfo($sign_target_file,PATHINFO_EXTENSION));

				    $check = getimagesize($_FILES["signature"]["tmp_name"]);
					if($check == false) {
					    $_SESSION['message']  = "Digital signature is not an image.";
					    $_SESSION['text'] = "Please try again.";
					    $_SESSION['status'] = "error";
						header("Location: resident_add.php");
				    	$uploadOk = 0;
				    } 

					// Check file size // 500KB max size
					elseif ($_FILES["signature"]["size"] > 500000) {
					  	$_SESSION['message']  = "Digital signature file must be up to 500KB in size.";
					    $_SESSION['text'] = "Please try again.";
					    $_SESSION['status'] = "error";
						header("Location: resident_add.php");
				    	$uploadOk = 0;
					}

				    // Allow certain file formats
				    elseif($sign_imageFileType != "jpg" && $sign_imageFileType != "png" && $sign_imageFileType != "jpeg" && $sign_imageFileType != "gif" ) {
					    $_SESSION['message'] = "Only JPG, JPEG, PNG & GIF files are allowed.";
					    $_SESSION['text'] = "Please try again.";
					    $_SESSION['status'] = "error";
						header("Location: resident_add.php");
					    $sign_uploadOk = 0;
				    }

				    // Check if $sign_uploadOk is set to 0 by an error
				    elseif ($sign_uploadOk == 0) {
					    $_SESSION['message'] = "Your file was not uploaded.";
					    $_SESSION['text'] = "Please try again.";
					    $_SESSION['status'] = "error";
						header("Location: resident_add.php");

				    // if everything is ok, try to upload file
				    } else {

			    		if (move_uploaded_file($_FILES["signature"]["tmp_name"], $sign_target_file)) {

		    				 $save = mysqli_query($conn, "INSERT INTO residence (firstname, middlename, lastname, suffix, dob, age, ageClassification, birthplace, gender, civilstatus, citizenship, occupation, religion, contact, house_no, street_name, purok, zone, barangay, municipality, province, region, familyIndicator, headName, familyRole, sector, resident_status, voter_status, ID_status, QR_status, months_of_stay, years_of_stay, image, digital_signature, qrCode, residentCode, added_By, date_registered) VALUES ('$firstname', '$middlename', '$lastname', '$suffix', '$dob', '$age', '$ageClassification', '$birthplace',  '$gender', '$civilstatus', '$citizenship', '$occupation', '$religion', '$contact', '$house_no', '$street_name', '$purok', '$zone', '$barangay', '$municipality', '$province', '$region', '$familyIndicator', '$headName', '$familyRole', '$sector', '$resident_status', '$voter_status', '$ID_status', '$QR_status', '$months_of_stay', '$years_of_stay', '$file', '$signature', '$qr_image', '$residentCode', '$added_By', '$date_registered')");

		              	  if($save) {
				          	$_SESSION['message'] = "Resident information has been saved!";
				            $_SESSION['text'] = "Saved successfully!";
					        $_SESSION['status'] = "success";
							header("Location: resident_add.php");
				          } else {
				            $_SESSION['message'] = "Something went wrong while saving the information.";
				            $_SESSION['text'] = "Please try again.";
					        $_SESSION['status'] = "error";
							header("Location: resident_add.php");
				          }   

			    		} else {
		    				$_SESSION['message'] = "There was an error uploading your digital signature.";
			            	$_SESSION['text'] = "Please try again.";
					        $_SESSION['status'] = "error";
							header("Location: resident_add.php");
			    		}
				    }
		       			
		        } else {
		        	$_SESSION['message'] = "There was an error uploading your profile picture.";
		            $_SESSION['text'] = "Please try again.";
			        $_SESSION['status'] = "error";
					header("Location: resident_add.php");
		        }
			  }
			}
		} else { // IF CERTIFICATE IS NOT EMPTY
			$check_email = mysqli_query($conn, "SELECT * FROM residence WHERE firstname='$firstname' AND middlename='$middlename' AND lastname='$lastname' AND suffix='$suffix' AND dob='$dob' AND age='$age'");
			if(mysqli_num_rows($check_email)>0) {
			      $_SESSION['message'] = "This resident already exists.";
			      $_SESSION['text'] = "Please try again.";
			      $_SESSION['status'] = "error";
				  header("Location: resident_add.php");
			} else {

				// Check if image file is a actual image or fake image
			    $target_dir = "../images-residence/";
			    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			    $uploadOk = 1;
			    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


			    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
				if($check == false) {
				    $_SESSION['message']  = "Resident file is not an image.";
				    $_SESSION['text'] = "Please try again.";
				    $_SESSION['status'] = "error";
					header("Location: resident_add.php");
			    	$uploadOk = 0;
			    } 

				// Check file size // 500KB max size
				elseif ($_FILES["fileToUpload"]["size"] > 500000) {
				  	$_SESSION['message']  = "Resident file must be up to 500KB in size.";
				    $_SESSION['text'] = "Please try again.";
				    $_SESSION['status'] = "error";
					header("Location: resident_add.php");
			    	$uploadOk = 0;
				}

			    // Allow certain file formats
			    elseif($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
				    $_SESSION['message'] = "Only JPG, JPEG, PNG & GIF files are allowed.";
				    $_SESSION['text'] = "Please try again.";
				    $_SESSION['status'] = "error";
					header("Location: resident_add.php");
				    $uploadOk = 0;
			    }

			    // Check if $uploadOk is set to 0 by an error
			    elseif ($uploadOk == 0) {
				    $_SESSION['message'] = "Your file was not uploaded.";
				    $_SESSION['text'] = "Please try again.";
				    $_SESSION['status'] = "error";
					header("Location: resident_add.php");

			    // if everything is ok, try to upload file
			    } else {

		        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

	        		// Check if image file is a actual image or fake image
				    $sign_target_dir = "../images-signature/";
				    $sign_target_file = $sign_target_dir . basename($_FILES["signature"]["name"]);
				    $sign_uploadOk = 1;
				    $sign_imageFileType = strtolower(pathinfo($sign_target_file,PATHINFO_EXTENSION));

				    $check = getimagesize($_FILES["signature"]["tmp_name"]);
					if($check == false) {
					    $_SESSION['message']  = "Digital signature is not an image.";
					    $_SESSION['text'] = "Please try again.";
					    $_SESSION['status'] = "error";
						header("Location: resident_add.php");
				    	$uploadOk = 0;
				    } 

					// Check file size // 500KB max size
					elseif ($_FILES["signature"]["size"] > 500000) {
					  	$_SESSION['message']  = "Digital signature file must be up to 500KB in size.";
					    $_SESSION['text'] = "Please try again.";
					    $_SESSION['status'] = "error";
						header("Location: resident_add.php");
				    	$uploadOk = 0;
					}

				    // Allow certain file formats
				    elseif($sign_imageFileType != "jpg" && $sign_imageFileType != "png" && $sign_imageFileType != "jpeg" && $sign_imageFileType != "gif" ) {
					    $_SESSION['message'] = "Only JPG, JPEG, PNG & GIF files are allowed.";
					    $_SESSION['text'] = "Please try again.";
					    $_SESSION['status'] = "error";
						header("Location: resident_add.php");
					    $sign_uploadOk = 0;
				    }

				    // Check if $sign_uploadOk is set to 0 by an error
				    elseif ($sign_uploadOk == 0) {
					    $_SESSION['message'] = "Your file was not uploaded.";
					    $_SESSION['text'] = "Please try again.";
					    $_SESSION['status'] = "error";
						header("Location: resident_add.php");

				    // if everything is ok, try to upload file
				    } else {

			    		if (move_uploaded_file($_FILES["signature"]["tmp_name"], $sign_target_file)) {

		    				    // Check if image file is a actual image or fake image
							    $sign_target_dir = "../images-certificates/";
							    $sign_target_file = $sign_target_dir . basename($_FILES["certificate"]["name"]);
							    $sign_uploadOk = 1;
							    $sign_imageFileType = strtolower(pathinfo($sign_target_file,PATHINFO_EXTENSION));

							    $check = getimagesize($_FILES["certificate"]["tmp_name"]);
								if($check == false) {
								    $_SESSION['message']  = "Personal document is not an image.";
								    $_SESSION['text'] = "Please try again.";
								    $_SESSION['status'] = "error";
									header("Location: resident_add.php");
							    	$uploadOk = 0;
							    } 

								// Check file size // 500KB max size
								elseif ($_FILES["certificate"]["size"] > 500000) {
								  	$_SESSION['message']  = "Personal document file must be up to 500KB in size.";
								    $_SESSION['text'] = "Please try again.";
								    $_SESSION['status'] = "error";
									header("Location: resident_add.php");
							    	$uploadOk = 0;
								}

							    // Allow certain file formats
							    elseif($sign_imageFileType != "jpg" && $sign_imageFileType != "png" && $sign_imageFileType != "jpeg" && $sign_imageFileType != "gif" ) {
								    $_SESSION['message'] = "Only JPG, JPEG, PNG & GIF files are allowed.";
								    $_SESSION['text'] = "Please try again.";
								    $_SESSION['status'] = "error";
									header("Location: resident_add.php");
								    $sign_uploadOk = 0;
							    }

							    // Check if $sign_uploadOk is set to 0 by an error
							    elseif ($sign_uploadOk == 0) {
								    $_SESSION['message'] = "Your file was not uploaded.";
								    $_SESSION['text'] = "Please try again.";
								    $_SESSION['status'] = "error";
									header("Location: resident_add.php");

							    // if everything is ok, try to upload file
							    } else {

						    		if (move_uploaded_file($_FILES["certificate"]["tmp_name"], $sign_target_file)) {

					    				  $save = mysqli_query($conn, "INSERT INTO residence (firstname, middlename, lastname, suffix, dob, age, ageClassification, birthplace, gender, civilstatus, citizenship, occupation, religion, contact, house_no, street_name, purok, zone, barangay, municipality, province, region, familyIndicator, headName, familyRole, sector, resident_status, voter_status, ID_status, QR_status, months_of_stay, years_of_stay, image, digital_signature, personalDocuments, qrCode, residentCode, added_By, date_registered) VALUES ('$firstname', '$middlename', '$lastname', '$suffix', '$dob', '$age', '$ageClassification', '$birthplace',  '$gender', '$civilstatus', '$citizenship', '$occupation', '$religion', '$contact', '$house_no', '$street_name', '$purok', '$zone', '$barangay', '$municipality', '$province', '$region', '$familyIndicator', '$headName', '$familyRole', '$sector', '$resident_status', '$voter_status', '$ID_status', '$QR_status', '$months_of_stay', '$years_of_stay', '$file', '$signature', '$certificate', '$qr_image', '$residentCode', '$added_By', '$date_registered')");

						              	  if($save) {
								          	$_SESSION['message'] = "Resident information has been saved!";
								            $_SESSION['text'] = "Saved successfully!";
									        $_SESSION['status'] = "success";
											header("Location: resident_add.php");
								          } else {
								            $_SESSION['message'] = "Something went wrong while saving the information.";
								            $_SESSION['text'] = "Please try again.";
									        $_SESSION['status'] = "error";
											header("Location: resident_add.php");
								          }

						    		} else {
					    				$_SESSION['message'] = "There was an error uploading your certificate.";
						            	$_SESSION['text'] = "Please try again.";
								        $_SESSION['status'] = "error";
										header("Location: resident_add.php");
						    		}
							    }

			    		} else {
		    				$_SESSION['message'] = "There was an error uploading your digital signature.";
			            	$_SESSION['text'] = "Please try again.";
					        $_SESSION['status'] = "error";
							header("Location: resident_add.php");
			    		}
				    }
		       			
		        } else {
		        	$_SESSION['message'] = "There was an error uploading your profile picture.";
		            $_SESSION['text'] = "Please try again.";
			        $_SESSION['status'] = "error";
					header("Location: resident_add.php");
		        }
			  }
			}
		}
	}





	// ACQUIRE INDIGENCY - DOCUMENT_REQUIREMENTS.PHP
	if(isset($_POST['acquire_Indigency'])) {

		$adminId	   = mysqli_real_escape_string($conn, $_POST['adminId']);
		$type          = 'Barangay Indigency';
		$residenceId   = mysqli_real_escape_string($conn, $_POST['residenceId']);
		$purpose       = mysqli_real_escape_string($conn, $_POST['purpose']);
		$paidAmount    = mysqli_real_escape_string($conn, $_POST['paidAmount']);
		$date_acquired = date('Y-m-d');

		$fetch = mysqli_query($conn, "SELECT * FROM residence WHERE residenceId='$residenceId'");
		$row = mysqli_fetch_array($fetch);
		$name = $row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'];

		$save = mysqli_query($conn, "INSERT INTO documents (doc_type, doc_residenceId, doc_purpose, doc_paidAmount, date_acquired) VALUES ('$type', '$residenceId', '$purpose', '$paidAmount', '$date_acquired')");

		  if($save) {

			  $save2 = mysqli_query($conn, "INSERT INTO income (paid_by, paymentFor, paymentDesc, paymentAmount, date_paid, added_by, date_added) VALUES ('$name', '$type', '$purpose', '$paidAmount', '$date_acquired', '$adminId', '$date_acquired') ");
		  	  if($save2) {
				header('Location: cert_brgyIndigency.php?residenceId='.$residenceId.'&&purpose='.$purpose.'&&date='.$date_acquired.'');
			  } else {
			    $_SESSION['message'] = "Something went wrong while saving the information.";
			    $_SESSION['text'] = "Please try again.";
			    $_SESSION['status'] = "error";
				header("Location: documents_requirements.php?page=indigency");
			  }  
		  } else {
		    $_SESSION['message'] = "Something went wrong while saving the information.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
			header("Location: documents_requirements.php?page=indigency");
		  } 

		// ORIGINAL CODE WHEN *INCOME TABLE* HAS NOT BEEN CREATED YET
		// $type          = 'Barangay Indigency';
		// $residenceId   = $_POST['residenceId'];
		// $purpose       = $_POST['purpose'];
		// $paidAmount    = $_POST['paidAmount'];
		// $date_acquired = date('Y-m-d');
		// $save = mysqli_query($conn, "INSERT INTO documents (doc_type, doc_residenceId, doc_purpose, doc_paidAmount, date_acquired) VALUES ('$type', '$residenceId', '$purpose', '$paidAmount', '$date_acquired')");

		//   if($save) {
		// 	header('Location: cert_brgyIndigency.php?residenceId='.$residenceId.'&&purpose='.$purpose.'&&date='.$date_acquired.'');
		//   } else {
		//     $_SESSION['message'] = "Something went wrong while saving the information.";
		//     $_SESSION['text'] = "Please try again.";
		//     $_SESSION['status'] = "error";
		// 	header("Location: documents_requirements.php?page=indigency");
		//   }   
		// ORIGINAL CODE WHEN *INCOME TABLE* HAS NOT BEEN CREATED YET
	}



	// ACQUIRE RESIDENCY - DOCUMENT_REQUIREMENTS.PHP
	if(isset($_POST['acquire_Residency'])) {

		$adminId	   = mysqli_real_escape_string($conn, $_POST['adminId']);
		$type          = 'Barangay Residency';
		$residenceId   = mysqli_real_escape_string($conn, $_POST['residenceId']);
		$purpose       = mysqli_real_escape_string($conn, $_POST['purpose']);
		$paidAmount    = mysqli_real_escape_string($conn, $_POST['paidAmount']);
		$date_acquired = date('Y-m-d');

		$fetch = mysqli_query($conn, "SELECT * FROM residence WHERE residenceId='$residenceId'");
		$row = mysqli_fetch_array($fetch);
		$name = $row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'];

		$save = mysqli_query($conn, "INSERT INTO documents (doc_type, doc_residenceId, doc_purpose, doc_paidAmount, date_acquired) VALUES ('$type', '$residenceId', '$purpose', '$paidAmount', '$date_acquired')");

		  if($save) {
		  	  $save2 = mysqli_query($conn, "INSERT INTO income (paid_by, paymentFor, paymentDesc, paymentAmount, date_paid, added_by, date_added) VALUES ('$name', '$type', '$purpose', '$paidAmount', '$date_acquired', '$adminId', '$date_acquired') ");
		  	  if($save2) {
				header('Location: cert_brgyResidency.php?residenceId='.$residenceId.'&&purpose='.$purpose.'&&date='.$date_acquired.'');
			  } else {
			    $_SESSION['message'] = "Something went wrong while saving the information.";
			    $_SESSION['text'] = "Please try again.";
			    $_SESSION['status'] = "error";
				header("Location: documents_requirements.php?page=Residency");
			  } 
			
		  } else {
		    $_SESSION['message'] = "Something went wrong while saving the information.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
			header("Location: documents_requirements.php?page=Residency");
		  } 

		// ORIGINAL CODE WHEN *INCOME TABLE* HAS NOT BEEN CREATED YET
	    // $type          = 'Barangay Residency';
		// $residenceId   = $_POST['residenceId'];
		// $purpose       = $_POST['purpose'];
		// $paidAmount    = $_POST['paidAmount'];
		// $date_acquired = date('Y-m-d');
		// $save = mysqli_query($conn, "INSERT INTO documents (doc_type, doc_residenceId, doc_purpose, doc_paidAmount, date_acquired) VALUES ('$type', '$residenceId', '$purpose', '$paidAmount', '$date_acquired')");

		//   if($save) {
		// 	header('Location: cert_brgyResidency.php?residenceId='.$residenceId.'&&purpose='.$purpose.'&&date='.$date_acquired.'');
		//   } else {
		//     $_SESSION['message'] = "Something went wrong while saving the information.";
		//     $_SESSION['text'] = "Please try again.";
		//     $_SESSION['status'] = "error";
		// 	header("Location: documents_requirements.php?page=Residency");
		//   }  
		// ORIGINAL CODE WHEN *INCOME TABLE* HAS NOT BEEN CREATED YET
	}



	// ACQUIRE JOB SEEKER CERT. - DOCUMENT_REQUIREMENTS.PHP
	if(isset($_POST['acquire_Job'])) {

		$adminId	   = mysqli_real_escape_string($conn, $_POST['adminId']);
		$type          = 'First Time Job Seeker';
		$residenceId   = mysqli_real_escape_string($conn, $_POST['residenceId']);
		$purpose       = 'Get First Time Job Seeker Certificate';
		$paidAmount    = mysqli_real_escape_string($conn, $_POST['paidAmount']);
		$date_acquired = date('Y-m-d');

		$fetch = mysqli_query($conn, "SELECT * FROM residence WHERE residenceId='$residenceId'");
		$row = mysqli_fetch_array($fetch);
		$name = $row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'];

		$save = mysqli_query($conn, "INSERT INTO documents (doc_type, doc_residenceId, doc_purpose, doc_paidAmount, date_acquired) VALUES ('$type', '$residenceId', '$purpose', '$paidAmount', '$date_acquired')");

		  if($save) {
	  		  $save2 = mysqli_query($conn, "INSERT INTO income (paid_by, paymentFor, paymentDesc, paymentAmount, date_paid, added_by, date_added) VALUES ('$name', '$type', '$purpose', '$paidAmount', '$date_acquired', '$adminId', '$date_acquired') ");
		  	  if($save2) {
				header('Location: cert_brgyJobseeker.php?residenceId='.$residenceId.'&&purpose='.$purpose.'&&date='.$date_acquired.'');
			  } else {
			    $_SESSION['message'] = "Something went wrong while saving the information.";
			    $_SESSION['text'] = "Please try again.";
			    $_SESSION['status'] = "error";
				header("Location: documents_requirements.php?page=JobSeeker");
			  } 
			
		  } else {
		    $_SESSION['message'] = "Something went wrong while saving the information.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
			header("Location: documents_requirements.php?page=JobSeeker");
		  }  
		// ORIGINAL CODE WHEN *INCOME TABLE* HAS NOT BEEN CREATED YET
		// $type          = 'First Time Job Seeker';
		// $residenceId   = $_POST['residenceId'];
		// $purpose       = 'Get First Time Job Seeker Certificate';
		// $paidAmount    = $_POST['paidAmount'];
		// $date_acquired = date('Y-m-d');
		// $save = mysqli_query($conn, "INSERT INTO documents (doc_type, doc_residenceId, doc_purpose, doc_paidAmount, date_acquired) VALUES ('$type', '$residenceId', '$purpose', '$paidAmount', '$date_acquired')");

		//   if($save) {
		// 	header('Location: cert_brgyJobseeker.php?residenceId='.$residenceId.'&&purpose='.$purpose.'&&date='.$date_acquired.'');
		//   } else {
		//     $_SESSION['message'] = "Something went wrong while saving the information.";
		//     $_SESSION['text'] = "Please try again.";
		//     $_SESSION['status'] = "error";
		// 	header("Location: documents_requirements.php?page=JobSeeker");
		//   } 
		// ORIGINAL CODE WHEN *INCOME TABLE* HAS NOT BEEN CREATED YET
	}



	// ACQUIRE NON-RESIDENCY CERT. - DOCUMENT_REQUIREMENTS.PHP
	if(isset($_POST['acquire_NonResident'])) {

		$adminId	     = mysqli_real_escape_string($conn, $_POST['adminId']);
		$type            = 'Brgy. Non-Residency';
		$nonresidentname = mysqli_real_escape_string($conn, $_POST['nonresidentname']);
		$address    	 = mysqli_real_escape_string($conn, $_POST['address']);
		$purpose         = 'Get Brgy. Non-Residency';
		$paidAmount      = mysqli_real_escape_string($conn, $_POST['paidAmount']);
		$date_acquired   = date('Y-m-d');
	

		$save = mysqli_query($conn, "INSERT INTO documents (doc_type, NonResident, NonResident__Address, doc_purpose, doc_paidAmount, date_acquired) VALUES ('$type', '$nonresidentname', '$address', '$purpose', '$paidAmount', '$date_acquired')");

		  if($save) {
		  	$save2 = mysqli_query($conn, "INSERT INTO income (paid_by, paymentFor, paymentDesc, paymentAmount, date_paid, added_by, date_added) VALUES ('$nonresidentname', '$type', '$purpose', '$paidAmount', '$date_acquired', '$adminId', '$date_acquired') ");
		  	  if($save2) {
				header('Location: cert_brgyNon-Residency.php?nonresidentname='.$nonresidentname.'&&purpose='.$purpose.'&&date='.$date_acquired.'&&address='.$address.'');
			  } else {
			    $_SESSION['message'] = "Something went wrong while saving the information.";
			    $_SESSION['text'] = "Please try again.";
			    $_SESSION['status'] = "error";
				header("Location: documents_requirements.php?page=NonResidency");
			  } 
			
		  } else {
		    $_SESSION['message'] = "Something went wrong while saving the information.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
			header("Location: documents_requirements.php?page=NonResidency");
		  }  

		// ORIGINAL CODE WHEN *INCOME TABLE* HAS NOT BEEN CREATED YET
	    // $type            = 'Brgy. Non-Residency';
		// $nonresidentname = $_POST['nonresidentname'];
		// $address    	 = $_POST['address'];
		// $purpose         = 'Get Brgy. Non-Residency';
		// $paidAmount      = $_POST['paidAmount'];
		// $date_acquired   = date('Y-m-d');
		// $save = mysqli_query($conn, "INSERT INTO documents (doc_type, NonResident, NonResident__Address, doc_purpose, doc_paidAmount, date_acquired) VALUES ('$type', '$nonresidentname', '$address', '$purpose', '$paidAmount', '$date_acquired')");

		//   if($save) {
		// 	header('Location: cert_brgyNon-Residency.php?nonresidentname='.$nonresidentname.'&&purpose='.$purpose.'&&date='.$date_acquired.'&&address='.$address.'');
		//   } else {
		//     $_SESSION['message'] = "Something went wrong while saving the information.";
		//     $_SESSION['text'] = "Please try again.";
		//     $_SESSION['status'] = "error";
		// 	header("Location: documents_requirements.php?page=NonResidency");
		//   } 
		// ORIGINAL CODE WHEN *INCOME TABLE* HAS NOT BEEN CREATED YET
	}



	// ACQUIRE BRGY. CLEARANCE - DOCUMENT_REQUIREMENTS.PHP
	if(isset($_POST['acquire_BrgyClearance'])) {

		$adminId	   = mysqli_real_escape_string($conn, $_POST['adminId']);
		$type          = 'Barangay Clearance';
		$residenceId   = mysqli_real_escape_string($conn, $_POST['residenceId']);
		$purpose       = mysqli_real_escape_string($conn, $_POST['purpose']);
		$paidAmount    = mysqli_real_escape_string($conn, $_POST['paidAmount']);
		$date_acquired = date('Y-m-d');

		$fetch = mysqli_query($conn, "SELECT * FROM residence WHERE residenceId='$residenceId'");
		$row = mysqli_fetch_array($fetch);
		$name = $row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'];

		$save = mysqli_query($conn, "INSERT INTO documents (doc_type, doc_residenceId, doc_purpose, doc_paidAmount, date_acquired) VALUES ('$type', '$residenceId', '$purpose', '$paidAmount', '$date_acquired')");

		  if($save) {
		  	$save2 = mysqli_query($conn, "INSERT INTO income (paid_by, paymentFor, paymentDesc, paymentAmount, date_paid, added_by, date_added) VALUES ('$name', '$type', '$purpose', '$paidAmount', '$date_acquired', '$adminId', '$date_acquired') ");
		  	  if($save2) {
				header('Location: cert_brgyClearance.php?residenceId='.$residenceId.'&&purpose='.$purpose.'&&date='.$date_acquired.'');
			  } else {
			    $_SESSION['message'] = "Something went wrong while saving the information.";
			    $_SESSION['text'] = "Please try again.";
			    $_SESSION['status'] = "error";
				header("Location: documents_requirements.php?page=BarangayClearance");
			  } 
			
		  } else {
		    $_SESSION['message'] = "Something went wrong while saving the information.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
			header("Location: documents_requirements.php?page=BarangayClearance");
		  } 

		// ORIGINAL CODE WHEN *INCOME TABLE* HAS NOT BEEN CREATED YET
		// $type            = 'Barangay Clearance';
		// $residenceId     = $_POST['residenceId'];
		// $purpose         = 'Get Barangay Clearance';
		// $paidAmount      = $_POST['paidAmount'];
		// $date_acquired   = date('Y-m-d');
		// $save = mysqli_query($conn, "INSERT INTO documents (doc_type, doc_residenceId, doc_purpose, doc_paidAmount, date_acquired) VALUES ('$type', '$residenceId', '$purpose', '$paidAmount', '$date_acquired')");

		//   if($save) {
		// 	header('Location: cert_brgyClearance.php?residenceId='.$residenceId.'&&purpose='.$purpose.'&&date='.$date_acquired.'');
		//   } else {
		//     $_SESSION['message'] = "Something went wrong while saving the information.";
		//     $_SESSION['text'] = "Please try again.";
		//     $_SESSION['status'] = "error";
		// 	header("Location: documents_requirements.php?page=BarangayClearance");
		//   }  
		// ORIGINAL CODE WHEN *INCOME TABLE* HAS NOT BEEN CREATED YET
	}





	// ACQUIRE BRGY. OWNERSHIP - DOCUMENT_REQUIREMENTS.PHP
	if(isset($_POST['acquire_BrgyOwnership'])) {

		$adminId	   = mysqli_real_escape_string($conn, $_POST['adminId']);
		$type          = 'Barangay Ownership';
		$residenceId   = mysqli_real_escape_string($conn, $_POST['residenceId']);
		$purpose       = 'Get Brgy. Ownership Certificate';
		$paidAmount    = mysqli_real_escape_string($conn, $_POST['paidAmount']);
		$date_acquired = date('Y-m-d');

		$fetch = mysqli_query($conn, "SELECT * FROM residence WHERE residenceId='$residenceId'");
		$row = mysqli_fetch_array($fetch);
		$name = $row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'];

		$save = mysqli_query($conn, "INSERT INTO documents (doc_type, doc_residenceId, doc_purpose, doc_paidAmount, date_acquired) VALUES ('$type', '$residenceId', '$purpose', '$paidAmount', '$date_acquired')");

		  if($save) {
		  	$save2 = mysqli_query($conn, "INSERT INTO income (paid_by, paymentFor, paymentDesc, paymentAmount, date_paid, added_by, date_added) VALUES ('$name', '$type', '$purpose', '$paidAmount', '$date_acquired', '$adminId', '$date_acquired') ");
		  	  if($save2) {
				header('Location: cert_brgyOwnership.php?residenceId='.$residenceId.'&&purpose='.$purpose.'&&date='.$date_acquired.'');
			  } else {
			    $_SESSION['message'] = "Something went wrong while saving the information.";
			    $_SESSION['text'] = "Please try again.";
			    $_SESSION['status'] = "error";
				header("Location: documents_requirements.php?page=BarangayOwnership");
			  } 
			
		  } else {
		    $_SESSION['message'] = "Something went wrong while saving the information.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
			header("Location: documents_requirements.php?page=BarangayOwnership");
		  } 
	}





	// ACQUIRE BRGY. PLATE - DOCUMENT_REQUIREMENTS.PHP
	if(isset($_POST['acquire_BrgyPlate'])) {

		$adminId	   = mysqli_real_escape_string($conn, $_POST['adminId']);
		$type          = 'Barangay Plate';
		$residenceId   = mysqli_real_escape_string($conn, $_POST['residenceId']);
		$purpose       = 'Get Brgy. Plate Certificate';
		$paidAmount    = mysqli_real_escape_string($conn, $_POST['paidAmount']);
		$date_acquired = date('Y-m-d');

		$fetch = mysqli_query($conn, "SELECT * FROM residence WHERE residenceId='$residenceId'");
		$row = mysqli_fetch_array($fetch);
		$name = $row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'];

		$save = mysqli_query($conn, "INSERT INTO documents (doc_type, doc_residenceId, doc_purpose, doc_paidAmount, date_acquired) VALUES ('$type', '$residenceId', '$purpose', '$paidAmount', '$date_acquired')");

		  if($save) {
		  	$save2 = mysqli_query($conn, "INSERT INTO income (paid_by, paymentFor, paymentDesc, paymentAmount, date_paid, added_by, date_added) VALUES ('$name', '$type', '$purpose', '$paidAmount', '$date_acquired', '$adminId', '$date_acquired') ");
		  	  if($save2) {
				header('Location: cert_brgyPlate.php?residenceId='.$residenceId.'&&purpose='.$purpose.'&&date='.$date_acquired.'');
			  } else {
			    $_SESSION['message'] = "Something went wrong while saving the information.";
			    $_SESSION['text'] = "Please try again.";
			    $_SESSION['status'] = "error";
				header("Location: documents_requirements.php?page=BarangayPlate");
			  } 
			
		  } else {
		    $_SESSION['message'] = "Something went wrong while saving the information.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
			header("Location: documents_requirements.php?page=BarangayPlate");
		  } 
	}





	// ACQUIRE BRGY. ID - DOCUMENT_REQUIREMENTS.PHP
	if(isset($_POST['acquire_BrgyID'])) {

		$adminId	   = mysqli_real_escape_string($conn, $_POST['adminId']);
		$type          = 'Barangay ID Card';
		$residenceId   = mysqli_real_escape_string($conn, $_POST['residenceId']);
		$purpose       = 'Get Brgy. ID Card';
		$IDNumber	   = mysqli_real_escape_string($conn, $_POST['IDNumber']);
		$paidAmount    = mysqli_real_escape_string($conn, $_POST['paidAmount']);
		$date_acquired = date('Y-m-d');

		$fetch = mysqli_query($conn, "SELECT * FROM residence WHERE residenceId='$residenceId'");
		$row = mysqli_fetch_array($fetch);
		$name = $row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'];

		$save = mysqli_query($conn, "INSERT INTO documents (doc_type, doc_residenceId, doc_purpose, brgyIDnumber, doc_paidAmount, date_acquired) VALUES ('$type', '$residenceId', '$purpose', '$IDNumber', '$paidAmount', '$date_acquired')");

		  if($save) {
		  	$save2 = mysqli_query($conn, "INSERT INTO income (paid_by, paymentFor, paymentDesc, paymentAmount, date_paid, added_by, date_added) VALUES ('$name', '$type', '$purpose', '$paidAmount', '$date_acquired', '$adminId', '$date_acquired') ");
		  	  if($save2) {
				header('Location: cert_brgyID.php?residenceId='.$residenceId.'&&purpose='.$purpose.'&&IDNumber='.$IDNumber.'&&date='.$date_acquired.'');
			  } else {
			    $_SESSION['message'] = "Something went wrong while saving the information.";
			    $_SESSION['text'] = "Please try again.";
			    $_SESSION['status'] = "error";
				header("Location: documents_requirements.php?page=BarangayID");
			  } 
			
		  } else {
		    $_SESSION['message'] = "Something went wrong while saving the information.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
			header("Location: documents_requirements.php?page=BarangayID");
		  } 
	}



	// ACQUIRE BRGY. BUSINESS CLEARANCE PERMIT - DOCUMENT_REQUIREMENTS.PHP
	if(isset($_POST['acquire_BrgyPermit'])) {

		$adminId	   = mysqli_real_escape_string($conn, $_POST['adminId']);
		$type          = 'Barangay Permit';
		$residenceId   = mysqli_real_escape_string($conn, $_POST['residenceId']);
		$purpose       = 'Get Brgy. Business Clearance Permit';
		$tradeName     = mysqli_real_escape_string($conn, $_POST['tradeName']);
		$scopeBusiness = mysqli_real_escape_string($conn, $_POST['scopeBusiness']);
		$controlNumber = mysqli_real_escape_string($conn, $_POST['controlNumber']);
		$ORNumber      = mysqli_real_escape_string($conn, $_POST['ORNumber']);
		$paidAmount    = mysqli_real_escape_string($conn, $_POST['paidAmount']);
		$date_acquired = date('Y-m-d');

		$fetch = mysqli_query($conn, "SELECT * FROM residence WHERE residenceId='$residenceId'");
		$row = mysqli_fetch_array($fetch);
		$name = $row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'];

		  $save = mysqli_query($conn, "INSERT INTO documents (doc_type, doc_residenceId, doc_purpose, tradeName, businessNature, controlNumber, ORNumber, doc_paidAmount, date_acquired) VALUES ('$type', '$residenceId', '$purpose', '$tradeName', '$scopeBusiness', '$controlNumber', '$ORNumber', '$paidAmount', '$date_acquired')");

		  if($save) {
		  	$save2 = mysqli_query($conn, "INSERT INTO income (paid_by, paymentFor, paymentDesc, paymentAmount, date_paid, added_by, date_added) VALUES ('$name', '$type', '$purpose', '$paidAmount', '$date_acquired', '$adminId', '$date_acquired') ");
		  	  if($save2) {
				header('Location: cert_brgyPermit.php?residenceId='.$residenceId.'&&purpose='.$purpose.'&&date='.$date_acquired.'&&ORNumber='.$ORNumber.'');
			  } else {
			    $_SESSION['message'] = "Something went wrong while saving the information.";
			    $_SESSION['text'] = "Please try again.";
			    $_SESSION['status'] = "error";
				header("Location: documents_requirements.php?page=permit");
			  } 
			
		  } else {
		    $_SESSION['message'] = "Something went wrong while saving the information.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
			header("Location: documents_requirements.php?page=permit");
		  }
	}






	// ACQUIRE BRGY. CONSTRUCTION CLEARANCE - DOCUMENT_REQUIREMENTS.PHP
	if(isset($_POST['acquire_BrgyConstruction'])) {

		$adminId	   = mysqli_real_escape_string($conn, $_POST['adminId']);
		$type          = 'Barangay Construction';
		$residenceId   = mysqli_real_escape_string($conn, $_POST['residenceId']);
		$purpose       = 'Get Barangay Construction Certificate';
		$paidAmount    = mysqli_real_escape_string($conn, $_POST['paidAmount']);
		$date_acquired = date('Y-m-d');

		$fetch = mysqli_query($conn, "SELECT * FROM residence WHERE residenceId='$residenceId'");
		$row = mysqli_fetch_array($fetch);
		$name = $row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'];

		$save = mysqli_query($conn, "INSERT INTO documents (doc_type, doc_residenceId, doc_purpose, doc_paidAmount, date_acquired) VALUES ('$type', '$residenceId', '$purpose', '$paidAmount', '$date_acquired')");

		  if($save) {
		  	$save2 = mysqli_query($conn, "INSERT INTO income (paid_by, paymentFor, paymentDesc, paymentAmount, date_paid, added_by, date_added) VALUES ('$name', '$type', '$purpose', '$paidAmount', '$date_acquired', '$adminId', '$date_acquired') ");
		  	  if($save2) {
				header('Location: cert_brgyConstruction.php?residenceId='.$residenceId.'&&purpose='.$purpose.'&&date='.$date_acquired.'');
			  } else {
			    $_SESSION['message'] = "Something went wrong while saving the information.";
			    $_SESSION['text'] = "Please try again.";
			    $_SESSION['status'] = "error";
				header("Location: documents_requirements.php?page=BarangayConstruction");
			  } 
			
		  } else {
		    $_SESSION['message'] = "Something went wrong while saving the information.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
			header("Location: documents_requirements.php?page=BarangayConstruction");
		  } 
	}












	// CONTACT EMAIL MESSAGING - CONTACT-US.PHP
	if(isset($_POST['sendEmail'])) {

		$name    = mysqli_real_escape_string($conn, $_POST['name']);
		$email	 = mysqli_real_escape_string($conn, $_POST['email']);
		$subject = mysqli_real_escape_string($conn, $_POST['subject']);
		$msg     = mysqli_real_escape_string($conn, $_POST['message']);

	    $message = '<h3>'.$subject.'</h3>
					<p>
						Good day!<br>
						'.$msg.'
					</p>
					<p>
						Name of Sender: '.$name.'<br>
						Email: '.$email.'
					</p>
					<p><b>Note:</b> This is a system generated email please do not reply.</p>';
					//Load composer's autoloader

			    $mail = new PHPMailer(true);                            
			    try {
			        //Server settings
			        $mail->isSMTP();                                     
			        $mail->Host = 'smtp.gmail.com';                      
			        $mail->SMTPAuth = true;                             
			        $mail->Username = 'goodsamaritan2k20@gmail.com';     
	        		$mail->Password = 'duxkxivrezeuguqe';                
			        $mail->SMTPOptions = array(
			            'ssl' => array(
			            'verify_peer' => false,
			            'verify_peer_name' => false,
			            'allow_self_signed' => true
			            )
			        );                         
			        $mail->SMTPSecure = 'ssl';                           
			        $mail->Port = 465;                                   

			        //Send Email
			        $mail->setFrom('goodsamaritan2k20@gmail.com');
			        
			        //Recipients
			        $mail->addAddress('goodsamaritan2k20@gmail.com');              
			        $mail->addReplyTo('goodsamaritan2k20@gmail.com');
			        
			        //Content
			        $mail->isHTML(true);                                  
			        $mail->Subject = $subject;
			        $mail->Body    = $message;

			        $mail->send();
					$_SESSION['success'] = "Email sent successfully!";
					header("Location: contact-us.php");

			    } catch (Exception $e) {
			    	$_SESSION['success'] = "Message could not be sent. Mailer Error: ".$mail->ErrorInfo;
					header("Location: contact-us.php");
			    }
	 }







	// $output = '';
	//  if(isset($_POST['export_excel_btn'])) {
	//  	$select = mysqli_query($conn, "SELECT * FROM residence");
	//  	if(mysqli_num_rows($select) > 0) {
	//  		$output .= '
	//  			<table class="table" bordered="1">
	//                   <tr> 
	//                     <th>NAME</th>
	//                     <th>GENDER</th>
	//                     <th>SECTOR</th>
	//                     <th>CITIZENSHIP</th>
	//                     <th>RESIDENT STATUS</th>
	//                   </tr>
	//  		';
	//  		while ($row = mysqli_fetch_array($select)) {
	//  				$output .= '
	//  					<tr>
	// 	                    <td>'.$row["firstname"].'</td>
	// 	                    <td>'.$row["gender"].'</td>
	// 	                    <td>'.$row["sector"].'</td>
	// 	                    <td>'.$row["citizenship"].'</td>
	// 	                    <td>'.$row["resident_status"].'</td>
	//                     </tr>
	//  				';
	//  		}
	//  		$output .= '</table>';
	//  		header("Content-Type: application/xls");
	//  		header("Content-Disposition:attachment; filename=download.csv");
	//  		echo $output;
	//  	}
	//  }
		

?>



