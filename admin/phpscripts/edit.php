<?php
include('connect.php');
	//number of columns will not be constant

	$tbl = $_POST['tbl'];
	$col = $_POST['col'];
	$id = $_POST['id'];


	//remove from array
	unset($_POST['tbl']);
	unset($_POST['col']);
	unset($_POST['id']);
	unset($_POST['submit']);

	
	//counts the number of columns returned
	$num = count($_POST);
	// var_dump($num); 
	// die;
	$count = 0;


	$qstring = "UPDATE {$tbl} SET ";

	//label of the post array is the $key
	foreach($_POST as $key => $value){
		$count++;
		if($count == $num){
			$qstring .= $key." = '".htmlspecialchars($value, ENT_QUOTES)."' ";
			//checks for the quotes and changes it to &quote so that it wont be weird or break stuff
		} else {
			$qstring .= $key." = '".htmlspecialchars($value, ENT_QUOTES)."', ";
		}
		

	}

	$qstring .= "WHERE {$col}={$id}";
	// echo $qstring;
	$updatequery = mysqli_query($link, $qstring);

	if($updatequery){
		header("location: ../../index.php");

	}else{
		echo "there was a problem changing this content. Contact your web admin.";
	}



mysqli_close($link);


?>