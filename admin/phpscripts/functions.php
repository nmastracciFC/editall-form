<?php
	
	function redirect_to($location) {
		if($location != NULL) {
			header("Location: {$location}");
			exit;
		}
	}
	function multiReturns($value) {
		$addPassed = $value;
		$newResult = 23 + $addPassed;//prime user
		$newResult2 = $value * 12; //regular user that is returned as two different results
		return array($newResult, $newResult2);
	}
	
?>