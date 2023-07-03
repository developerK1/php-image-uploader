<?php
include_once "connection.php";

$content = '';

$db_req = "SELECT * FROM `gallery`";
$results = mysqli_query($conn,$db_req);
$rowCount = mysqli_num_rows($results);

if($rowCount > 0){
	
	while($row = mysqli_fetch_assoc($results)){
		$img = 'uploads/'.$row['image'];
		$content.= "<img src=".$img." />";
	}
}

?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="EI=egde">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TESTINGS.....</title>
	<style>
		body {
			width : 100%;
			height : 100vh;
			display : flex;
			flex-wrap : wrap;
		}
		img {
			width : 250px;
			height : 100%;
		}
	</style>
</head>
<body>

<form action="server.php" method="POST" enctype="multipart/form-data" >
	<input type="file" name="fileToUpload"/>
	<button name="register">UPLOAD</button>
</form>

<?php
 if(!$content){
	 echo "<h2>THERE IS NOTHING TO SHOW</h2>";
 }else {
	 echo $content;
 }
?>

</body>
</html>