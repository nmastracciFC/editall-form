<?php
	require_once('phpscripts/config.php');
	$errors = array();
	//echo $ip;
	if(isset($_POST['submit'])){
		//echo "Works";
		$name = trim($_POST['name']);
		$phone = trim($_POST['phone']);
		$address = trim($_POST['address']);

		$required = array("name", "phone", "address");
		foreach($required as $require) {
			$value = trim($_POST[$require]);
			if(!has_value($value)) {
				$errors[$require] = $require." cannot be blank.";//if it does not have a value push it into the errors array
			}
		}
		
	}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Welcome to your admin panel login</title>
</head>
<body>
	<?php echo form_errors($errors); ?>
	
	<!-- to prevent attacks on site -->
	<?php  
	$no_attack = "&\'";//this will write on the page
	$attack = "\x8F!!!";//this will not hopefully
	// echo htmlspecialchars($no_attack)."<br>";
	// echo htmlspecialchars($attack, ENT_QUOTES, 'UTF-8');//wrapping anything with this will make sure there are no abilitiesto attack
	?>

	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
		<!-- posts the form on whatever page it's already on -->
		<label>Name:</label>
		<input type="text" name="name" value="">
		<br>
		<label>Phone: </label>
		<input type="text" name="phone" value="">
		<label>Address: </label>
		<input type="text" name="address" value="">
		<br><br>
		<input type="submit" name="submit" value="Show me the money">
	</form>

</body>
</html>