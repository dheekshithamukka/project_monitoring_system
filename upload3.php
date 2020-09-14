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
$pname = $_GET['pn3'];
//echo $pname;
if(isset($_POST['submit']))
{    
//echo "Hi";
 $file = rand(1000,100000)."-".$_FILES['file']['name'];
 $extension = pathinfo($file, PATHINFO_EXTENSION);
 $file_loc = $_FILES['file']['tmp_name'];
 $file_size = $_FILES['file']['size'];
 $file_type = $_FILES['file']['type'];
 $folder="uploads/";
 //echo "HI";
 if (!in_array($extension, ["mp4","avi","3gp","mov","mpeg","gif"])) {
        //echo "You file extension must be .mp4, .avi, .3gp, .mov, .mpeg, .gif";
 	echo ("<script LANGUAGE='JavaScript'>
		 window.alert('Your file extension must be .zip, .pdf or .docx');
		window.location.href = 'prodetails.php?pn=$pname';
		</script>");
    } elseif ($_FILES['file']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
        //echo "File too large!";
    echo ("<script LANGUAGE='JavaScript'>
		 window.alert('File too large!');
		window.location.href = 'prodetails.php?pn=$pname';
		</script>");
    } 
    else{
 if(move_uploaded_file($file_loc,$folder.$file)){
 $sql="UPDATE file_upload_1 SET file3_videos='$file',type3='$file_type',size3='$file_size' WHERE pname='$pname'";
 if(mysqli_query($conn,$sql)){
 	//echo "Videos uploaded successfully.";
 	echo ("<script LANGUAGE='JavaScript'>
		 window.alert('Videos uploaded successfully');
		window.location.href = 'prodetails.php?pn=$pname';
		</script>");
 }
 else{
 	//echo "Video not uploaded. Try again.";
 	echo ("<script LANGUAGE='JavaScript'>
		 window.alert('Videos not uploaded. Try again.');
		window.location.href = 'prodetails.php?pn=$pname';
		</script>");
 }
}
}
}
else{
	echo ("<script LANGUAGE='JavaScript'>
		 window.alert('Try again.');
		window.location.href = 'prodetails.php?pn=$pname';
		</script>");
	//echo "Try again";
}
?>