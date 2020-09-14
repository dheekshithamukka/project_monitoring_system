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
<?php
$pname=$_GET['p'];
$ig=$_GET['i'];
$comments=$_POST['comments'];
if(isset($_POST['submit_comments'])){
//echo "Hi";
	$s1 = "SELECT * FROM ig WHERE pname='$pname' AND ig_name='$ig'";
	$ans = mysqli_query($con,$s1);
	$k = mysqli_num_rows($ans);
	if($k==0){
	$sql = "INSERT INTO ig(ig_name,pname,comments,appdisapp_abs,appdisapp_doc,appdisapp_vid) VALUES('$ig','$pname','$comments','0','0','0')";
	if(mysqli_query($con,$sql)){
		echo "Commented successfully";
		header("Location:igdetails.php?pn=$pname");
	}
	else{
		echo "Try again";
	}
}
else{
	$s = "UPDATE ig SET comments='$comments' WHERE pname='$pname' AND ig_name='$ig'";
	if(mysqli_query($con,$s)){
		echo "Commented successfully";
		header("Location:igdetails.php?pn=$pname");
	}
	else{
		echo "Try again";
	}	
}
}
else{
	echo "Try again";
}
?>