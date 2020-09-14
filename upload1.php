<html>
<body>

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
//echo "Hi";
$pname = $_GET['pn1'];
//echo $pname;
$ig = $_SESSION['ig'];
//echo $ig;
if(isset($_POST['submit']))
{    
//echo "Hi";

 $file = rand(1000,100000)."-".$_FILES['file']['name'];
 $extension = pathinfo($file, PATHINFO_EXTENSION);
 $file_loc = $_FILES['file']['tmp_name'];
 $file_size = $_FILES['file']['size'];
 $file_type = $_FILES['file']['type'];
 $folder="uploads/";
 //echo "Hi";
 $d=NULL;
 $v=NULL;
 //echo "HI";
 if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
        //echo "Your file extension must be .zip, .pdf or .docx";
    echo ("<script LANGUAGE='JavaScript'>
         window.alert('Your file extension must be .zip, .pdf or .docx');
        window.location.href = 'prodetails.php?pn=$pname';
        </script>");
    } 
    elseif ($_FILES['file']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
        //echo "File too large!";
    echo ("<script LANGUAGE='JavaScript'>
         window.alert('File too large!');
        window.location.href = 'prodetails.php?pn=$pname';
        </script>");
    }
    else{
 if(move_uploaded_file($file_loc,$folder.$file)){
 	        $s = "SELECT * FROM file_upload_1 WHERE pname='$pname'";
            $re = mysqli_query($conn,$s);
            $num = mysqli_num_rows($re);
            if($num==0){
 				$sql="INSERT INTO file_upload_1(pname,int_guide,file1_abstract,type1,size1,file2_documents,type2,size2,file3_videos,type3,size3) VALUES('$pname','$ig','$file','$file_type','$file_size','$d',0,0,'$v',0,0)";
 				if(mysqli_query($conn,$sql)){
 				//echo "File uploaded successfully.";
                    echo ("<script LANGUAGE='JavaScript'>
         window.alert('File uploaded successfully');
        window.location.href = 'prodetails.php?pn=$pname';
        </script>");
 }
 else{
    echo ("<script LANGUAGE='JavaScript'>
         window.alert('File not uploaded. Try again.');
        window.location.href = 'prodetails.php?pn=$pname';
        </script>");
 	//echo "File not uploaded. Try again.";
 }
}
else{
	$s1="UPDATE file_upload_1 SET file1_abstract='$file',type1='$file_type',size1='$file_size' WHERE pname='$pname'";
    if(mysqli_query($conn,$s1)){
                    //echo "File updated successfully";
        echo ("<script LANGUAGE='JavaScript'>
         window.alert('File updated successfully');
        window.location.href = 'prodetails.php?pn=$pname';
        </script>");
                }
                else{
                    //echo "Not updated. Try again";
                    echo ("<script LANGUAGE='JavaScript'>
         window.alert('Not updated. Try again.');
        window.location.href = 'prodetails.php?pn=$pname';
        </script>");
                }
}
}
else{
	//echo "Try again";
    echo ("<script LANGUAGE='JavaScript'>
         window.alert('Try again.');
        window.location.href = 'prodetails.php?pn=$pname';
        </script>");
}
}
}



else{
	echo "Try again";
}
?>




<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>