<?php

include_once "connection.php";


if(isset($_POST['register'])){
	$file = $_FILES['fileToUpload'];

	$fileName = $file['name'];
	$fileTmpName = $file['tmp_name'];
	$fileSize = $file['size'];
	$fileError = $file['error'];
	$fileType = $file['type'];

	$fileExt = explode('.' , $fileName);
	$fileActualExt = strtoLower(end($fileExt));


	echo "$fileError = the error</br>";
	echo "$fileSize.</br>";

	$allowed = array("jpg", "jpeg", "png");
	if(in_array($fileActualExt ,$allowed )){
		if($fileError === 0){
			if($fileSize < 3000000){
				$fileNameNew = uniqid('.', true).".".$fileActualExt;
				$fileDestination = 'uploads/'.$fileNameNew;
				$GLOBALS['imgName'] =  'uploads/'.$fileNameNew;

					if(!$conn){
						echo "no connection"."</br>";
					}else{
						$insert_sql = "INSERT INTO `gallery`(`image`) VALUES ('$fileNameNew')";
						mysqli_query($conn,$insert_sql);
						echo "data sent to db"."</br>";
					}

				move_uploaded_file($fileTmpName, $fileDestination);
				echo "file uploaded..."."</br>";

			}else {
				echo "file size is too big";
			}
		}


	}else {
		echo "the type of file is not allowed"."</br>";
	}


//echo "<script> window.location = 'index.php' </script>";

}






