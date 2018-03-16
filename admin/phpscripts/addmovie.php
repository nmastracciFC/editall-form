<?php
	
	function addMovie($cover, $title, $year, $run, $story, $trailer, $release, $genre) {
		include('connect.php');

		if($cover['type'] == "image/jpg" || $cover['type'] == "image/jpeg" || $cover['type'] == "image/png"){
			$targetpath = "../images/{$cover['name']}";

			if(move_uploaded_file($cover['tmp_name'], $targetpath)){
				//echo "File transfer complete";
				$th_copy = "../images/TH_{$cover['name']}";
					if(!copy($targetpath, $th_copy)){
						$message = "Whoops, that didn't work.";
						return $message;
					}

				//Add to database
				$qstring = "INSERT INTO tbl_movies VALUES(NULL, '{$th_copy}', '{$title}', '{$year}', '{$run}', '{$story}', '{$trailer}', '{$release}')";
				// echo $qstring;
				// die;
				$result = mysqli_query($link, $qstring);
				// var_dump($result); die;
			//make sure the stuff was actually added!
				if($result) {
					// var_dump($result); die;
					$qstring2 = "SELECT * FROM tbl_movies ORDER BY movies_id DESC LIMIT 1";
					
					$result2 = mysqli_query($link, $qstring2); //now we have access to the last id that was input

					$row = mysqli_fetch_array($result2); //break apart the object
					$lastID = $row['movies_id'];
					// echo $lastID;
					// die;
					$qstring3 = "INSERT INTO tbl_mov_genre VALUES(NULL, '{$lastID}', '{$genre}') ";
					$result3 = mysqli_query($link, $qstring3);
				}
				redirect_to("admin_index.php");

			}

			//$size = getimagesize($targetpath);
			//echo $size[2];


		}else{
			echo "No F'n GIF's";
		}

		mysqli_close($link);
	}





?>