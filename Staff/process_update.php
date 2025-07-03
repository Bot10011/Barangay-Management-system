<?php 
	include '../config.php';



  	// UPDATE RESIDENT - RESIDENT_UPDATE.PHP
	if(isset($_POST['update_resident'])) {

		$residenceId 	  = $_POST['residenceId'];
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
		$years_of_stay    = mysqli_real_escape_string($conn, $_POST['years_of_stay']);
		$file             = basename($_FILES["fileToUpload"]["name"]);
		$signature		  = basename($_FILES["signature"]["name"]);

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

		if(!empty($file) && empty($signature)) {

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
				header('Location: resident_update.php?residenceId='.$residenceId.'');
		    	$uploadOk = 0;
		    } 

			// Check file size // 500KB max size
			elseif ($_FILES["fileToUpload"]["size"] > 500000) {
			  	$_SESSION['message']  = "Resident file must be up to 500KB in size.";
			    $_SESSION['text'] = "Please try again.";
			    $_SESSION['status'] = "error";
				header('Location: resident_update.php?residenceId='.$residenceId.'');
		    	$uploadOk = 0;
			}
	  
	        // Allow certain file formats
	        elseif($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
	        $_SESSION['message']  = "Only JPG, JPEG, PNG & GIF files are allowed.";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header('Location: resident_update.php?residenceId='.$residenceId.'');     
	        $uploadOk = 0;
	        }

	        // Check if $uploadOk is set to 0 by an error
	        elseif ($uploadOk == 0) {
	        $_SESSION['message']  = "Your file was not uploaded.";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header('Location: resident_update.php?residenceId='.$residenceId.'');     

	        // if everything is ok, try to upload file
	        } else {

	            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	              	$save = mysqli_query($conn, "UPDATE residence SET firstname='$firstname', middlename='$middlename', lastname='$lastname', suffix='$suffix', dob='$dob', age='$age', ageClassification='$ageClassification', birthplace='$birthplace', gender='$gender', civilstatus = '$civilstatus', citizenship = '$citizenship', occupation = '$occupation', religion='$religion', contact='$contact', house_no = '$house_no', street_name = '$street_name', purok = '$purok', zone = '$zone', barangay = '$barangay', municipality = '$municipality', province = '$province', region = '$region', familyIndicator='$familyIndicator', headName='$headName', familyRole='$familyRole', sector = '$sector', resident_status = '$resident_status', voter_status = '$voter_status', ID_status = '$ID_status', QR_status = '$QR_status', years_of_stay = '$years_of_stay', image='$file' WHERE residenceId='$residenceId'");
					        if($save) {
				                $_SESSION['message']  = "Residents information has been updated!";
					            $_SESSION['text'] = "Updated successfully!";
						        $_SESSION['status'] = "success";
								header('Location: resident_update.php?residenceId='.$residenceId.'');                          
					        } else {
				                $_SESSION['message'] = "Something went wrong while updating the information.";
					            $_SESSION['text'] = "Please try again.";
						        $_SESSION['status'] = "error";
								header('Location: resident_update.php?residenceId='.$residenceId.'');     
					        }
	            } else {
	                  $_SESSION['message'] = "There was an error uploading your picture.";
		              $_SESSION['text'] = "Please try again.";
		              $_SESSION['status'] = "error";
					  header('Location: resident_update.php?residenceId='.$residenceId.'');     
	            }

			}

		} elseif(!empty($signature) && empty($file)) {

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
				header('Location: resident_update.php?residenceId='.$residenceId.'');
		    	$uploadOk = 0;
		    } 

			// Check file size // 500KB max size
			elseif ($_FILES["signature"]["size"] > 500000) {
			  	$_SESSION['message']  = "Digital signature must be up to 500KB in size.";
			    $_SESSION['text'] = "Please try again.";
			    $_SESSION['status'] = "error";
				header('Location: resident_update.php?residenceId='.$residenceId.'');
		    	$uploadOk = 0;
			}

		    // Allow certain file formats
		    elseif($sign_imageFileType != "jpg" && $sign_imageFileType != "png" && $sign_imageFileType != "jpeg" && $sign_imageFileType != "gif" ) {
			    $_SESSION['message'] = "Only JPG, JPEG, PNG & GIF files are allowed.";
			    $_SESSION['text'] = "Please try again.";
			    $_SESSION['status'] = "error";
				header('Location: resident_update.php?residenceId='.$residenceId.'');     
		   	    $sign_uploadOk = 0;
		    }

		    // Check if $sign_uploadOk is set to 0 by an error
		    elseif ($sign_uploadOk == 0) {
			    $_SESSION['message'] = "Your file was not uploaded.";
			    $_SESSION['text'] = "Please try again.";
			    $_SESSION['status'] = "error";
				header('Location: resident_update.php?residenceId='.$residenceId.'');     

		    // if everything is ok, try to upload file
		    } else {

		        if (move_uploaded_file($_FILES["signature"]["tmp_name"], $sign_target_file)) {
		          	$save2 = mysqli_query($conn, "UPDATE residence SET firstname='$firstname', middlename='$middlename', lastname='$lastname', suffix='$suffix', dob='$dob', age='$age', ageClassification='$ageClassification', birthplace='$birthplace', gender='$gender', civilstatus = '$civilstatus', citizenship = '$citizenship', occupation = '$occupation', religion='$religion', contact='$contact', house_no = '$house_no', street_name = '$street_name', purok = '$purok', zone = '$zone', barangay = '$barangay', municipality = '$municipality', province = '$province', region = '$region', familyIndicator='$familyIndicator', headName='$headName', familyRole='$familyRole', sector = '$sector', resident_status = '$resident_status', voter_status = '$voter_status', ID_status = '$ID_status', QR_status = '$QR_status', years_of_stay = '$years_of_stay', digital_signature='$signature' WHERE residenceId='$residenceId'");
				        if($save2) {
				              $_SESSION['message']  = "Residents information has been updated!";
			            	  $_SESSION['text'] = "Updated successfully!";
				              $_SESSION['status'] = "success";
							  header('Location: resident_update.php?residenceId='.$residenceId.'');                          
				        } else {
				              $_SESSION['message'] = "Something went wrong while updating the information.";
			            	  $_SESSION['text'] = "Please try again.";
					          $_SESSION['status'] = "error";
							  header('Location: resident_update.php?residenceId='.$residenceId.'');     
				        }
		        } else {
		              $_SESSION['message'] = "There was an error uploading your picture.";
	            	  $_SESSION['text'] = "Please try again.";
			          $_SESSION['status'] = "error";
					  header('Location: resident_update.php?residenceId='.$residenceId.'');     
		        }

			}

		} elseif(!empty($file) && !empty($signature)) {

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
				header('Location: resident_update.php?residenceId='.$residenceId.'');
		    	$uploadOk = 0;
		    } 

			// Check file size // 500KB max size
			elseif ($_FILES["fileToUpload"]["size"] > 500000) {
			  	$_SESSION['message']  = "Resident file must be up to 500KB in size.";
			    $_SESSION['text'] = "Please try again.";
			    $_SESSION['status'] = "error";
				header('Location: resident_update.php?residenceId='.$residenceId.'');
		    	$uploadOk = 0;
			}

		    // Allow certain file formats
		    elseif($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
			    $_SESSION['message'] = "Only JPG, JPEG, PNG & GIF files are allowed.";
			    $_SESSION['text'] = "Please try again.";
			    $_SESSION['status'] = "error";
				header('Location: resident_update.php?residenceId='.$residenceId.'');     
		    	$uploadOk = 0;
		    }

		    // Check if $uploadOk is set to 0 by an error
		    elseif ($uploadOk == 0) {
			    $_SESSION['message'] = "Your file was not uploaded.";
			    $_SESSION['text'] = "Please try again.";
			    $_SESSION['status'] = "error";
				header('Location: resident_update.php?residenceId='.$residenceId.'');     

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
						header('Location: resident_update.php?residenceId='.$residenceId.'');
				    	$uploadOk = 0;
				    } 

					// Check file size // 500KB max size
					elseif ($_FILES["signature"]["size"] > 500000) {
					  	$_SESSION['message']  = "Digital signature must be up to 500KB in size.";
					    $_SESSION['text'] = "Please try again.";
					    $_SESSION['status'] = "error";
						header('Location: resident_update.php?residenceId='.$residenceId.'');
				    	$uploadOk = 0;
					}

				    // Allow certain file formats
				    elseif($sign_imageFileType != "jpg" && $sign_imageFileType != "png" && $sign_imageFileType != "jpeg" && $sign_imageFileType != "gif" ) {
					    $_SESSION['message'] = "Only JPG, JPEG, PNG & GIF files are allowed.";
					    $_SESSION['text'] = "Please try again.";
					    $_SESSION['status'] = "error";
						header('Location: resident_update.php?residenceId='.$residenceId.'');     
				    	$sign_uploadOk = 0;
				    }

				    // Check if $sign_uploadOk is set to 0 by an error
				    elseif ($sign_uploadOk == 0) {
					    $_SESSION['message'] = "Your file was not uploaded.";
					    $_SESSION['text'] = "Please try again.";
					    $_SESSION['status'] = "error";
						header('Location: resident_update.php?residenceId='.$residenceId.'');     

				    // if everything is ok, try to upload file
				    } else {

				    		if (move_uploaded_file($_FILES["signature"]["tmp_name"], $sign_target_file)) {

				    				$save3 = mysqli_query($conn, "UPDATE residence SET firstname='$firstname', middlename='$middlename', lastname='$lastname', suffix='$suffix', dob='$dob', age='$age', ageClassification='$ageClassification', birthplace='$birthplace', gender='$gender', civilstatus = '$civilstatus', citizenship = '$citizenship', occupation = '$occupation', religion='$religion', contact='$contact', house_no = '$house_no', street_name = '$street_name', purok = '$purok', zone = '$zone', barangay = '$barangay', municipality = '$municipality', province = '$province', region = '$region', familyIndicator='$familyIndicator', headName='$headName', familyRole='$familyRole', sector = '$sector', resident_status = '$resident_status', voter_status = '$voter_status', ID_status = '$ID_status', QR_status = '$QR_status', years_of_stay = '$years_of_stay', image='$file', digital_signature='$signature' WHERE residenceId='$residenceId'");
							      if($save3) {
							            $_SESSION['message']  = "Residents information has been updated!";
							            $_SESSION['text'] = "Updated successfully!";
								        $_SESSION['status'] = "success";
										header('Location: resident_update.php?residenceId='.$residenceId.'');                          
							      } else {
							            $_SESSION['message'] = "Something went wrong while updating the information.";
							            $_SESSION['text'] = "Please try again.";
								        $_SESSION['status'] = "error";
										header('Location: resident_update.php?residenceId='.$residenceId.'');     
							      }

				    		} else {
			    				$_SESSION['message'] = "There was an error uploading your digital signature.";
			           		    $_SESSION['text'] = "Please try again.";
						        $_SESSION['status'] = "error";
								header('Location: resident_update.php?residenceId='.$residenceId.'');     
				    		}
				    }
		       			
		        } else {
		        	$_SESSION['message'] = "There was an error uploading your profile picture.";
		            $_SESSION['text'] = "Please try again.";
			        $_SESSION['status'] = "error";
					header('Location: resident_update.php?residenceId='.$residenceId.'');     
		        }
			  }

		} else {

		    $save4 = mysqli_query($conn, "UPDATE residence SET firstname='$firstname', middlename='$middlename', lastname='$lastname', suffix='$suffix', dob='$dob', age='$age', ageClassification='$ageClassification', birthplace='$birthplace', gender='$gender', civilstatus = '$civilstatus', citizenship = '$citizenship', occupation = '$occupation', religion='$religion', contact='$contact', house_no = '$house_no', street_name = '$street_name', purok = '$purok', zone = '$zone', barangay = '$barangay', municipality = '$municipality', province = '$province', region = '$region', familyIndicator='$familyIndicator', headName='$headName', familyRole='$familyRole', sector = '$sector', resident_status = '$resident_status', voter_status = '$voter_status', ID_status = '$ID_status', QR_status = '$QR_status', years_of_stay = '$years_of_stay' WHERE residenceId='$residenceId'");
	        if($save4) {
	          	$_SESSION['message']  = "Residents information has been updated!";
	            $_SESSION['text'] = "Updated successfully!";
		        $_SESSION['status'] = "success";
				header('Location: resident_update.php?residenceId='.$residenceId.'');                          
	        } else {
	            $_SESSION['message'] = "Something went wrong while updating the information.";
	            $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
				header('Location: resident_update.php?residenceId='.$residenceId.'');     
	        }

		}
	
	}




	// UPDATE RESIDENT DOCUMENTS - RESIDENT_DOCUMENT.PHP
	if(isset($_POST['updateDocument'])) {

		$residenceId  = $_POST['residenceId'];
		$certificate  = basename($_FILES["certificate"]["name"]);

		  // Check if image file is a actual image or fake image
		    $target_dir = "../images-certificates/";
		    $target_file = $target_dir . basename($_FILES["certificate"]["name"]);
		    $uploadOk = 1;
		    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		    $check = getimagesize($_FILES["certificate"]["tmp_name"]);
			if($check == false) {
			    $_SESSION['message']  = "Selected file is not an image.";
			    $_SESSION['text'] = "Please try again.";
			    $_SESSION['status'] = "error";
				header("Location: resident_document.php?residenceId=".$residenceId);
		    	$uploadOk = 0;
		    } 

			// Check file size // 500KB max size
			elseif ($_FILES["certificate"]["size"] > 500000) {
			  	$_SESSION['message']  = "File must be up to 500KB in size.";
			    $_SESSION['text'] = "Please try again.";
			    $_SESSION['status'] = "error";
				header("Location: resident_document.php?residenceId=".$residenceId);
		    	$uploadOk = 0;
			}

		    // Allow certain file formats
		    elseif($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
			    $_SESSION['message']  = "Only JPG, JPEG, PNG & GIF files are allowed.";
			    $_SESSION['text'] = "Please try again.";
			    $_SESSION['status'] = "error";
				header("Location: resident_document.php?residenceId=".$residenceId);
		    	$uploadOk = 0;
		    }

		    // Check if $uploadOk is set to 0 by an error
		    elseif ($uploadOk == 0) {
			    $_SESSION['message']  = "Your file was not uploaded.";
			    $_SESSION['text'] = "Please try again.";
			    $_SESSION['status'] = "error";
				header("Location: resident_document.php?residenceId=".$residenceId);

		    // if everything is ok, try to upload file
		    } else {

		        if (move_uploaded_file($_FILES["certificate"]["tmp_name"], $target_file)) {
		          	$save = mysqli_query($conn, "UPDATE residence SET personalDocuments	='$certificate' WHERE residenceId='$residenceId'");
		     
		            if($save) {
		            	$_SESSION['message'] = "Document has been updated!";
			            $_SESSION['text'] = "Updated successfully!";
				        $_SESSION['status'] = "success";
						header("Location: resident_document.php?residenceId=".$residenceId);
		            } else {
			            $_SESSION['message'] = "Something went wrong while updating the information.";
			            $_SESSION['text'] = "Please try again.";
				        $_SESSION['status'] = "error";
						header("Location: resident_document.php?residenceId=".$residenceId);
		            }
		        } else {
		            $_SESSION['message'] = "There was an error uploading your file.";
		            $_SESSION['text'] = "Please try again.";
			        $_SESSION['status'] = "error";
					header("Location: resident_document.php?residenceId=".$residenceId);
		        }

			}
	}


	


	// UPDATE ADMIN INFORMATION - PROFILE.PHP
	if(isset($_POST['update_profile'])) {

		$user_Id    = $_POST['user_Id'];
		$username   = mysqli_real_escape_string($conn, $_POST['username']);
		$firstname  = mysqli_real_escape_string($conn, $_POST['firstname']);
		$middlename = mysqli_real_escape_string($conn, $_POST['middlename']);
		$lastname   = mysqli_real_escape_string($conn, $_POST['lastname']);
		$suffix     = mysqli_real_escape_string($conn, $_POST['suffix']);
		$contact    = mysqli_real_escape_string($conn, $_POST['contact']);
		$email      = mysqli_real_escape_string($conn, $_POST['email']);

		$fetch        = mysqli_query($conn, "SELECT * FROM users WHERE user_Id='$user_Id' ");
		$row          = mysqli_fetch_array($fetch);
		$get_email    = $row['email'];
		$get_username = $row['username'];

		if($email == $get_email) {
			if($username == $get_username) {
				$save = mysqli_query($conn, "UPDATE users SET username='$username', firstname='$firstname', middlename='$middlename', lastname='$lastname', suffix='$suffix', email='$email', contact='$contact' WHERE user_Id='$user_Id'");
			    if($save) {
			          $_SESSION['message']  = "Your information has been updated!";
			          $_SESSION['text'] = "Updated successfully!";
			          $_SESSION['status'] = "success";
					  header("Location: profile.php");                          
			    } else {
		            $_SESSION['message'] = "Something went wrong while saving the information.";
		            $_SESSION['text'] = "Please try again.";
			        $_SESSION['status'] = "error";
					header("Location: profile.php");
			    }
			} else {
				$exist = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' ");
			  	if(mysqli_num_rows($exist) > 0) {
				  	$_SESSION['message'] = "Username already exists.";
					$_SESSION['text'] = "Please try again.";
					$_SESSION['status'] = "error";
					header("Location: profile.php");
			  	} else {
		  			$save = mysqli_query($conn, "UPDATE users SET username='$username', firstname='$firstname', middlename='$middlename', lastname='$lastname', suffix='$suffix', email='$email', contact='$contact' WHERE user_Id='$user_Id'");
				    if($save) {
				          $_SESSION['message']  = "Your information has been updated!";
				          $_SESSION['text'] = "Updated successfully!";
				          $_SESSION['status'] = "success";
						  header("Location: profile.php");                          
				    } else {
			            $_SESSION['message'] = "Something went wrong while saving the information.";
			            $_SESSION['text'] = "Please try again.";
				        $_SESSION['status'] = "error";
						header("Location: profile.php");
				    }
			  	}
			}
	  } else {
			$exist = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' ");
		  	if(mysqli_num_rows($exist) > 0) {
	  			$_SESSION['message'] = "Email already exists.";
		      	$_SESSION['text'] = "Please try again.";
	  			$_SESSION['status'] = "error";
				header("Location: profile.php");
		  	} else {
	  			if($username == $get_username) {
					$save = mysqli_query($conn, "UPDATE users SET username='$username', firstname='$firstname', middlename='$middlename', lastname='$lastname', suffix='$suffix', email='$email', contact='$contact' WHERE user_Id='$user_Id'");
				    if($save) {
				          $_SESSION['message']  = "Your information has been updated!";
				          $_SESSION['text'] = "Updated successfully!";
				          $_SESSION['status'] = "success";
						  header("Location: profile.php");                          
				    } else {
			            $_SESSION['message'] = "Something went wrong while saving the information.";
			            $_SESSION['text'] = "Please try again.";
				        $_SESSION['status'] = "error";
						header("Location: profile.php");
				    }
				} else {
					$exist = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' ");
				  	if(mysqli_num_rows($exist) > 0) {
			  			  $_SESSION['message'] = "Username already exists.";
					      $_SESSION['text'] = "Please try again.";
					      $_SESSION['status'] = "error";
						  header("Location: profile.php");
				  	} else {
			  			$save = mysqli_query($conn, "UPDATE users SET username='$username', firstname='$firstname', middlename='$middlename', lastname='$lastname', suffix='$suffix', email='$email', contact='$contact' WHERE user_Id='$user_Id'");
					    if($save) {
					          $_SESSION['message']  = "Your information has been updated!";
					          $_SESSION['text'] = "Updated successfully!";
					          $_SESSION['status'] = "success";
							  header("Location: profile.php");                          
					    } else {
				            $_SESSION['message'] = "Something went wrong while saving the information.";
				            $_SESSION['text'] = "Please try again.";
					        $_SESSION['status'] = "error";
							header("Location: profile.php");
					    }
				  	}
				}
		  	}
	  }

		
	}




	// CHANGE ADMIN PASSWORD - PROFILE.PHP
	if(isset($_POST['update_password_admin'])) {

    	$user_Id    = $_POST['user_Id'];
    	$OldPassword = md5($_POST['OldPassword']);
    	$password    = md5($_POST['password']);
    	$cpassword   = md5($_POST['cpassword']);

    	$check_old_password = mysqli_query($conn, "SELECT * FROM users WHERE password='$OldPassword' AND user_Id='$user_Id'");

    	// CHECK IF THERE IS MATCHED PASSWORD IN THE DATABASE COMPARED TO THE ENTERED OLD PASSWORD
    	if(mysqli_num_rows($check_old_password) === 1 ) {
			// COMPARE BOTH NEW AND CONFIRM PASSWORD
    		if($password != $cpassword) {
				$_SESSION['message']  = "Password does not matched. Please try again";
            	$_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
				header("Location: profile.php");
    		} else {
    			$update_password = mysqli_query($conn, "UPDATE users SET password='$password' WHERE user_Id='$user_Id' ");
    			if($update_password) {
                	$_SESSION['message'] = "Password has been changed.";
		            $_SESSION['text'] = "Updated successfully!";
			        $_SESSION['status'] = "success";
					header("Location: profile.php");
                } else {
                    $_SESSION['message'] = "Something went wrong while changing the password.";
		            $_SESSION['text'] = "Please try again.";
			        $_SESSION['status'] = "error";
					header("Location: profile.php");
                }
    		}
    	} else {
			$_SESSION['message']  = "Old password is incorrect.";
            $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: profile.php");
    	}

    }




  	// UPDATE ADMIN PROFILE - PROFILE.PHP
	if(isset($_POST['update_profile_admin'])) {

		$user_Id    = $_POST['user_Id'];
		$file       = basename($_FILES["fileToUpload"]["name"]);

		  // Check if image file is a actual image or fake image
	    $target_dir = "../images-users/";
	    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	    $uploadOk = 1;
	    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if($check == false) {
		    $_SESSION['message']  = "Selected file is not an image.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
			header("Location: profile.php");
	    	$uploadOk = 0;
	    } 

		// Check file size // 500KB max size
		elseif ($_FILES["fileToUpload"]["size"] > 500000) {
		  	$_SESSION['message']  = "File must be up to 500KB in size.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
			header("Location: profile.php");
	    	$uploadOk = 0;
		}

	    // Allow certain file formats
	    elseif($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
		    $_SESSION['message']  = "Only JPG, JPEG, PNG & GIF files are allowed.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
			header("Location: profile.php");
	    	$uploadOk = 0;
	    }

	    // Check if $uploadOk is set to 0 by an error
	    elseif ($uploadOk == 0) {
		    $_SESSION['message']  = "Your file was not uploaded.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
			header("Location: profile.php");

	    // if everything is ok, try to upload file
	    } else {

	        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	          	$save = mysqli_query($conn, "UPDATE users SET image='$file' WHERE user_Id='$user_Id'");
	     
	            if($save) {
	            	$_SESSION['message'] = "Profile picture has been updated!";
		            $_SESSION['text'] = "Updated successfully!";
			        $_SESSION['status'] = "success";
					header("Location: profile.php");
	            } else {
		            $_SESSION['message'] = "Something went wrong while updating the information.";
		            $_SESSION['text'] = "Please try again.";
			        $_SESSION['status'] = "error";
					header("Location: profile.php");
	            }
	        } else {
	            $_SESSION['message'] = "There was an error uploading your file.";
	            $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
				header("Location: profile.php");
	        }

		}
	}






	













?>
