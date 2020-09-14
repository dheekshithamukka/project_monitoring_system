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
$pname = $_GET['pn1'];
$ig = $_SESSION['ig'];
//echo $pname;
$d = NULL;
$v = NULL;
// Uploads files
if (isset($_POST['submit'])) { // if save button on the form is clicked
    // name of the uploaded file
    //echo "Hi";
    $filename = $_FILES['myfile']['name'];

    // destination of the file on the server
    $destination = $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];
    //echo "Hi";

    if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
        //echo "hi";
        echo "Your file extension must be .zip, .pdf or .docx";
    } 
    /*elseif ($_FILES['myfile']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    }*/
    else {
        //echo "Hi";
        if (move_uploaded_file($file, $destination)) {
            $s = "SELECT * FROM file_upload WHERE pname='$pname'";
            $re = mysqli_query($conn,$s);
            $num = mysqli_num_rows($re);
            //echo $num;
            if($num==0){
                $sql = "INSERT INTO file_upload (pname, abstract, documents, videos, int_guide) VALUES ('$pname', '$file', '$d', '$v', '$ig')";
                if (mysqli_query($conn, $sql)) {
                    echo "File uploaded successfully";
                }
                else{
                    echo "Not uploaded. Try again";
                }
            }
            else{
                $s1="UPDATE file_upload SET abstract='$file' WHERE pname='$pname'";
                if(mysqli_query($conn,$s1)){
                    echo "File updated successfully";
                }
                else{
                    echo "Not updated. Try again";
                }
            }
        } 
        else {
            echo "Failed to upload file.";
        }
    }
}
else{
    echo "Not";
}
?>