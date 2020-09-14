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
$roll=$_GET['roll'];
$s1 = "SELECT * FROM employee_table WHERE pname='$pname' AND int_guide='$ig' AND rollNo='$roll'";
$r1 = mysqli_query($con,$s1);
$row = mysqli_fetch_array($r1);
$n1 = mysqli_num_rows($r1);
if(isset($_POST['submit_marks_1'])){
	if($n1>0){
	$marks1=$_POST['marks1'];
	$avg = (float)($marks1 + $row['marks_prc2'] + $row['marks_prc3'])/3;
	$sql = "UPDATE employee_table SET marks_prc1='$marks1', average_marks='$avg' WHERE pname='$pname' AND int_guide='$ig' AND rollNo='$roll'";
	if(mysqli_query($con,$sql)){
		//echo "Updated successfully";
		//header('location:prcprodetails.php');
		echo ("<script LANGUAGE='JavaScript'>
         window.alert('Marks updated successfully.');
        window.location.href = 'prcprodetails.php?pn=$pname';
        </script>");
	}
	else{
		//echo "Try again";
		echo ("<script LANGUAGE='JavaScript'>
         window.alert('Try again.');
        window.location.href = 'prcprodetails.php?pn=$pname';
        </script>");
	}
}
else{
	$marks1=$_POST['marks1'];
	$sql = "INSERT INTO prc_comments(pname,ig_guide,comments,marks_prc1,marks_prc2,marks_prc3) VALUES('$pname','$ig','','$marks1','0','0')";
	if(mysqli_query($con,$sql)){
		//echo "Marks uploaded successfully";
		//header('location:prcprodetails.php');
		echo ("<script LANGUAGE='JavaScript'>
         window.alert('Marks uploaded successfully.');
        window.location.href = 'prcprodetails.php?pn=$pname';
        </script>");
	}
	else{
		//echo "Try again";
		echo ("<script LANGUAGE='JavaScript'>
         window.alert('Try again.');
        window.location.href = 'prcprodetails.php?pn=$pname';
        </script>");
	}
}
}

if(isset($_POST['submit_marks_2'])){
	$marks2=$_POST['marks2'];
	$avg = (float)($marks2 + $row['marks_prc1'] + $row['marks_prc3'])/3;
	$sql = "UPDATE employee_table SET marks_prc2='$marks2', average_marks='$avg' WHERE pname='$pname' AND int_guide='$ig' AND rollNo='$roll'";
	if(mysqli_query($con,$sql)){
		//echo "Updated successfully";
		//header('location:prcprodetails.php');
		echo ("<script LANGUAGE='JavaScript'>
         window.alert('Marks uploaded successfully.');
        window.location.href = 'prcprodetails.php?pn=$pname';
        </script>");
	}
	else{
		//echo "Try again";
		echo ("<script LANGUAGE='JavaScript'>
         window.alert('Try again.');
        window.location.href = 'prcprodetails.php?pn=$pname';
        </script>");
	}
}



if(isset($_POST['submit_marks_3'])){
	$marks3=$_POST['marks3'];
	$avg = (float)($marks3 + $row['marks_prc1'] + $row['marks_prc2'])/3;
	$sql = "UPDATE employee_table SET marks_prc3='$marks3', average_marks='$avg' WHERE pname='$pname' AND int_guide='$ig' AND rollNo='$roll'";
	if(mysqli_query($con,$sql)){
		echo ("<script LANGUAGE='JavaScript'>
         window.alert('Marks uploaded successfully.');
        window.location.href = 'prcprodetails.php?pn=$pname';
        </script>");
		//echo "Updated successfully";
		//header('location:prcprodetails.php');
	}
	else{
		//echo "Try again";
		echo ("<script LANGUAGE='JavaScript'>
         window.alert('Try again.');
        window.location.href = 'prcprodetails.php?pn=$pname';
        </script>");
	}
}

?>