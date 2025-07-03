	<?php
	include '../config.php';

	// GET RESIDENT ID AUTOMATICALLY ONCHANGE - CERT_BRGYINDIGENCY.PHP
	if (isset($_POST['residenceId'])) {
		$residenceId = $_POST['residenceId'];
		$query = mysqli_query($conn, "SELECT * FROM residence");			
		if (mysqli_num_rows($query) > 0 ) {
			echo '<option>Select section</option>'; //can be deleted
			while ($row = $query->fetch_assoc()) {
			 	echo '<option value="'.$row['section_Id'].'">  '.$row['section'].'  </option>';
			}
		} else {
			echo '<option selected disabled>No section found</option>';	
		 }
	}



 
?>