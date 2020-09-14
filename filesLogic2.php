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

//$f2 = 0;
//$_SESSION['fn2'] = $f2;

//$roll = $_SESSION['id'];

$pname = $_GET['pn3'];


    if(isset($_POST['but_upload'])){
       $maxsize = 5242880; // 5MB
 
       $name = $_FILES['file']['name'];
       //$target_dir = "videos/";
       $target_file = $_FILES["file"]["name"];

       // Select file type
       $videoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

       // Valid file extensions
       $extensions_arr = array("mp4","avi","3gp","mov","mpeg","gif");

       // Check extension
       if( in_array($videoFileType,$extensions_arr) ){
         
          // Check file size
          if(($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
            echo "File too large. File must be less than 5MB.";
          }else{
            // Upload
            if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
              // Insert record
              $query = "UPDATE file_upload SET videos='$name' WHERE pname='$pname'";

              if(mysqli_query($conn,$query)){
                //$f2 = 1;
                  //$_SESSION['fn2'] = $f2;
                echo "File uploaded successfully.";
                //header('location:prodetails.php');
              }
              else{
                echo "Not uploaded. Try again";
              }
            }
          }

       }else{
          echo "Invalid file extension.";
       }
 
     } 
     ?>