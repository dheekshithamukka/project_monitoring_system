<?php
$con = mysqli_connect('localhost','student','gnits','project_monitoring');
if(mysqli_connect_errno()){
	echo "Failed to connect ".mysqli_connect_error();
}
session_start();
?>
<?php
if(count($_FILES) > 0) {
if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {
    	require_once "db.php";
	$imgData =addslashes(file_get_contents($_FILES['userImage']['tmp_name']));
	$imageProperties = getimageSize($_FILES['userImage']['tmp_name']);
	$roll = mysqli_real_escape_string($conn, $_REQUEST['roll']);
	//$roll=$_SESSION['roll'];
	$sql = "INSERT INTO image_upload(imageType,imageData,imageRoll)
	VALUES('{$imageProperties['mime']}', '{$imgData}', '$roll')";
	$current_id = mysqli_query($conn, $sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($conn));
	if(isset($current_id)) {
		header("Location: stdlogin.php");
	}
}
}
?>


<HTML>
<HEAD>
<TITLE>Upload Image to MySQL BLOB</TITLE>
<link href="imageStyles.css" rel="stylesheet" type="text/css" />
</HEAD>
<BODY>
<form name="frmImage" enctype="multipart/form-data" action="" method="post" class="frmImageUpload">
<!--<input name="roll" type="text" required placeholder="Enter your roll no" /></br></br>-->
<label>Upload Image File:</label><br/>
<input name="userImage" type="file" class="inputFile" />
<input type="submit" value="Submit" class="btnSubmit"/>
</form>
</div>
</BODY>
</HTML>