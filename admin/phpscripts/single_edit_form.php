<?php
function single_edit($tbl, $col, $id) {
	$result = getSingle($tbl, $col, $id);
	$getResult = mysqli_fetch_array($result);

	echo "<form action=\"phpscripts/edit.php\" method=\"post\">"; 

	echo "<input hidden name=\"tbl\" value=\"{$tbl}\"> ";
	echo "<input hidden name=\"col\" value=\"{$col}\"> ";
	echo "<input hidden name=\"id\" value=\"{$id}\"> ";

	// echo mysqli_num_fields($result);//how many columns are in this table
	for($i = 0; $i<mysqli_num_fields($result); $i++){
		$dataType = mysqli_fetch_field_direct($result, $i);//go through all results and figure out what is what
		// var_dump($dataType); die;
		$fieldName = $dataType->name;
		$fieldType = $dataType->type;
		//varchar = 253
		//text = 252
		//int = 1 value

		//tells you the field names and types for every column
		// echo $fieldName."<br>";
		// echo $fieldType."<br>";

			if($fieldName != $col) {
				//do not allow them access to the id column
				echo "<label>{$fieldName}</label><br>";
				if($fieldType !="252") {
					//if field type is not equal to 252
					echo "<input type=\"text\" name=\"{$fieldName}\" value=\"{$getResult[$i]}\"><br> ";
				} else {
					echo "<textarea name=\"{$fieldName}\">{$getResult[$i]}</textarea><br> ";
				}
			}
	}
	echo "<input type=\"submit\" name=\"submit\"  value=\"Save Content\"><br> ";
	echo "</form>";
}





?>