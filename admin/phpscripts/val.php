<?php
function form_errors($errors=array()){
	$op = "";
	if(!empty($errors)) {
		$op .= "Your Attention Required";
		$op .= "<ul>";
		foreach($errors as $key =>$error) {
			$op .= "<li>{$error}</li>";
		}
		$op .= "</ul>";
	}
	return $op;


}

function has_value($value) {
	return isset($value) && $value !== "";
	//this guards against if someone has a space in the form
}

function max_length($max_lengths) {
	global $errors;
	// echo $errors;die;
	foreach($max_lengths as $value => $max) {
		$value = trim($_POST[$value]);
		// echo $value; die;
		if(!has_proper_length($value, $max)){
			$errors[$value] = ucfirst($value)." is too long.";
			//report back to errors array if its too long
		}
	}
}

function has_proper_length($value, $max) {
	return strlen($value) <= $max;
}




?>