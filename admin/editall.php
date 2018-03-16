<?php
	require_once('phpscripts/config.php');
	$result = multiReturns(17); //go to functions.php with this method
	list($add, $multiply) = multiReturns(245);//this does the same thing but is more semantic for other developers
	
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>THE ONLY EDIT FORM</title>
</head>
<body>
	<?php
	//now you can just pass info into these variables and you will get the edit form dynamically created!
		$tbl = "tbl_movies";
		$col = "movies_id";
		$id = 1; //this is hardcoded but you use get to pass in id otherwise
		echo single_edit($tbl, $col, $id);

	?>

</body>
</html>