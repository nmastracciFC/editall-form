<?php
	require_once('phpscripts/config.php');
	$result = multiReturns(17); //go to functions.php with this method
	list($add, $multiply) = multiReturns(245);//this does the same thing but is more semantic for other developers
	
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Welcome to your admin panel login</title>
</head>
<body>
	<?php
	echo "Result 1: {$result[0]}<br>";
	echo "Result 2: {$result[1]}<br><br>";

	echo "Result 1 from list: {$add}<br>";
	echo "Result 2: {$multiply}";


	?>

</body>
</html>