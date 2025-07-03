<?php
    include '../config.php';

	// if(isset($_POST['type']) && $_POST['type']=='ajax'){
	// 	if((time()-$_SESSION['LAST_ACTIVE_TIME'])>600){
	// 		echo "logout";
	// 	}
	// }else{
	// 	if(isset($_SESSION['LAST_ACTIVE_TIME'])){
	// 		if((time()-$_SESSION['LAST_ACTIVE_TIME'])>600){
	// 			header('location:../logout.php');	
	// 			die();
	// 		}
	// 	}
		$_SESSION['LAST_ACTIVE_TIME']=time();
		if(!isset($_SESSION['admin_Id'])){
			header('location:../logout.php');
			die();
		}
	// }
?>