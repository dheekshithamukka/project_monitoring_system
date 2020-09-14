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
if(isset($_POST['btn-upload']))
{    
     
 $file = rand(1000,100000)."-".$_FILES['file']['name'];
 $file_loc = $_FILES['file']['tmp_name'];
 $file_size = $_FILES['file']['size'];
 $file_type = $_FILES['file']['type'];
 $folder="uploads/";
 
 move_uploaded_file($file_loc,$folder.$file);
 $sql="INSERT INTO files(file,type,size) VALUES('$file','$file_type','$file_size')";
 if(mysqli_query($conn,$sql)){
 	echo "Inserted";
 }
 else{
 	echo "Not inserted";
 }
}
?>