<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
?>
<?php
$conn = mysqli_connect('localhost','student','gnits','project_monitoring');
if(mysqli_connect_errno()){
  echo "Failed to connect ".mysqli_connect_error();
}
session_start();
?>
<?php

if (isset($_POST['approve'])) { // if save button on the form is clicked
    $s = "UPDATE prcreg SET approve=1";
    $ans = mysqli_query($conn,$s);
	if(mysqli_query($conn,$s)){
		echo ("<script LANGUAGE='JavaScript'>
		 window.alert('Approved successfully');
		window.location.href = 'prcprofile.php';
		</script>");
	}
	else{
		echo ("<script LANGUAGE='JavaScript'>
		 window.alert('Try again');
		window.location.href = 'prcprofile.php';
		</script>");
	}

}
?>