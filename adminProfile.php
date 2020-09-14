<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php
$con = mysqli_connect('localhost','student','gnits','project_monitoring');
if(mysqli_connect_errno()){
	echo "Failed to connect ".mysqli_connect_error();
}
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<h1></h1>

<form action="" method="post">
  <label for="birthday">Abstract:</label>
  <input type="date" id="abstract" name="abstract">
  <input type="submit" name="abstract_submit">
  <br />
  <br />
  <label for="birthday">Documents:</label>
  <input type="date" id="birthday" name="documents">
  <input type="submit" name="documents_submit">
  <br />
  <br />
  <label for="birthday">Videos:</label>
  <input type="date" id="videos" name="videos">
  <input type="submit" name="videos_submit">
</form>





<?php
if(isset($_POST['abstract_submit'])){
    $abstract = $_POST['abstract']; 
	$q = "SELECT * FROM deadlines";
	$result = mysqli_query($con,$q);
	$num = mysqli_num_rows($result);
	if($num==0){
        $s = "INSERT INTO deadlines(abstract,documents,videos) VALUES($abstract,0,0)";
        if(mysqli_query($con,$s)){
        echo ("<script LANGUAGE='JavaScript'>
		 window.alert('Wrong pwd');
		window.location.href = 'adminlogin.php';
		</script>");
    }
    else{
        echo "error";
    }
}
	else{
	header('location:adminProfile.php');

	}
}
?>




</body>
</html>
