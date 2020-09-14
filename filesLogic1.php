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
// connect to the database
// Uploads files
//$f1 = 0;
//$_SESSION['fn1'] = $f1;

$pname = $_GET['pn2'];


if (isset($_POST['save1'])) { // if save button on the form is clicked
    // name of the uploaded file
    //$roll = $_SESSION['id'];
    $filename = $_FILES['myfile']['name'];

    // destination of the file on the server
    $destination = $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['zip', 'pdf', 'docx', 'pptx'])) {
        echo "You file extension must be .zip, .pdf or .docx";
    } elseif ($_FILES['myfile']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $sql = "UPDATE file_upload SET documents='$file' WHERE pname='$pname'";
            if (mysqli_query($conn, $sql)) {
                //$f1 = 1;
                    //$_SESSION['fn1'] = $f1;
                    echo "File uploaded successfully";
                    //header('location:projectprofile.php');
            }
            else{
                echo "Not uploaded. Try again";
            }
        }
         else {
            echo "Failed to upload file.";
        }
    }
}
?>
