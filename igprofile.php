<html>
<head>
<link rel="stylesheet" href="tableig2.css">
</head>
<body>
<div class="dropdown">
  <button class="dropbtn"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRVIcj4yYNjZ5iI4dAjusUE0OwK6jzd8EBON2aNJ4AejGNGYZch&usqp=CAU" style="width: 30px; height: 30px"/></button>
  <div class="dropdown-content">
    <a href="igprofile.php">My profile</a>
    <a href="iglogin.php">Logout</a>
    <!--<a href="proreg.php">New project registration</a>-->
  </div>
</div>
</body>


</html>
<?php
$con = mysqli_connect('localhost','student','gnits','project_monitoring');
if(mysqli_connect_errno()){
	echo "Failed to connect ".mysqli_connect_error();
}
session_start();
?>
<?php
$intid = $GET['intid'];
$r = $_SESSION['id'];
$pwd = $_SESSION['p'];
$query = "SELECT * FROM igreg WHERE ig_id='$r'";
$res = mysqli_query($con,$query);
echo "<table border='1'>
<tr>
<th></th>
<th></th>
</tr>";
$row = mysqli_fetch_array($res);
$name = $row['ig_name'];
$roll = $row['ig_id'];
$branch = $row['ig_branch'];
$_SESSION['n'] = $name;
$_SESSION['r'] = $roll;
$_SESSION['b'] = $branch;
//echo $_SESSION['branch'];
echo "<tr>";
echo "<td>Guide Name</td>";
echo "<td>".$row['ig_name']."</td>";
echo "</tr>";
echo "<tr>";
echo "<td> Id</td>";
echo "<td>".$row['ig_id']."</td>";
echo "</tr>";
echo "<tr>";
echo "<td> Email</td>";
echo "<td>".$row['ig_email']."</td>";
echo "</tr>";
echo "<tr>";
echo "<td> Phone number</td>";
echo "<td>".$row['ig_phone']."</td>";
echo "</tr>";
echo "<tr>";
echo "<td> Branch</td>";
echo "<td>".$row['ig_branch']."</td>";
echo "</tr>";
echo "</table>";
?>



<?php
    require_once "db.php";
    $sql = "SELECT ig_id FROM igreg WHERE ig_id='$r'";
    $result = mysqli_query($conn, $sql);
	if($result===false)
	{
		echo " error";
	}
?>


<HTML>
<HEAD>
<link href="imageStyles.css" rel="stylesheet" type="text/css" />
</HEAD>
<BODY>
<?php
//echo "hii";
	while($row1 = mysqli_fetch_array($result)) {
		//echo"hi";
	?>
		<div class="image"><img src="imageView3.php?image_id=<?php echo $row1["ig_id"]; ?>"  width="175" height="200"  /></div>
	
<?php		
	}
    mysqli_close($conn);
?>


<?php
$con = mysqli_connect('localhost','student','gnits','project_monitoring');
if(mysqli_connect_errno()){
	echo "Failed to connect ".mysqli_connect_error();
}
//session_start();
?>
<?php
$r = $_SESSION['id'];
$pwd = $_SESSION['p'];
$query = "SELECT distinct pname FROM employee_table WHERE int_guide='$r'";
$res = mysqli_query($con,$query);
//$n = mysqli_num_rows($res);
echo $n;
?>
<br>
<center>
<h1>List of projects registered:</h1><br>
</center>

<center><address>Note: Click on project names to know more details about it.</address></center><br><br>

<?php
$i=1;
$_SESSION['u'] = '$i';
$j=1;
$array=[];
while($row = mysqli_fetch_array($res)) { 
        $array[$j]=$row['pname'];
        $j++;
        $entry = $row["pname"]; 
        //echo $entry; 
        //$_SESSION['pname']=$entry;
        //echo $_SESSION['pname'];        
        ?>
        <div class="pro"><center><a href="igdetails.php?pn=<?php echo $entry?>&guide=<?php echo $r?>" style="text-decoration: none; color: black;"><?php echo $i.". ". $entry ; 
        //$_SESSION['pname']=$entry;
        //echo $_SESSION['pname'];
        //echo $i;
        ?></a></center></div>
        <?php
        echo "<br>";
        echo "<br>";
        $i++;
    }
/*foreach($array as $value){
            echo $value . "<br>";
        }*/

                    ?>

                        </table>

<form method="post" action="export.php" align="center">  
  <input type="submit" name="export" value="Download" class="btn btn-success" />  
</form> 
                        </BODY>
</HTML>