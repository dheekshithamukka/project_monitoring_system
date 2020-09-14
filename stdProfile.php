<html>
<head>
<link rel="stylesheet" href="stdProfile.css">
</head>
<body>
<div class="dropdown">
  <button class="dropbtn"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRVIcj4yYNjZ5iI4dAjusUE0OwK6jzd8EBON2aNJ4AejGNGYZch&usqp=CAU" style="width: 30px; height: 30px"/></button>
  <div class="dropdown-content">
    <a href="stdProfile.php">My profile</a>
    <a href="stdlogin.php">Logout</a>
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
$r = $_SESSION['id'];
$pwd = $_SESSION['p'];
$query = "SELECT * FROM stdreg WHERE stdRollNo='$r'";
$res = mysqli_query($con,$query);
echo "<table border='1'>
<tr>
<th></th>
<th></th>
</tr>";
$row = mysqli_fetch_array($res);
$name = $row['stdName'];
$roll = $row['stdRollNo'];
$branch = $row['stdBranch'];
$_SESSION['n'] = $name;
$_SESSION['r'] = $roll;
$_SESSION['b'] = $branch;
//echo $_SESSION['branch'];
echo "<tr>";
echo "<td>Student Name</td>";
echo "<td>".$row['stdName']."</td>";
echo "</tr>";
echo "<tr>";
echo "<td>Student Roll No</td>";
echo "<td>".$row['stdRollNo']."</td>";
echo "</tr>";
echo "<tr>";
echo "<td>Student Email</td>";
echo "<td>".$row['stdEmail']."</td>";
echo "</tr>";
echo "<tr>";
echo "<td>Student Phone number</td>";
echo "<td>".$row['stdPhone']."</td>";
echo "</tr>";
echo "<tr>";
echo "<td>Student Branch</td>";
echo "<td>".$row['stdBranch']."</td>";
echo "</tr>";
echo "</table>";
?>
<br>
       <center><a href="proreg.php">New project registration?</a></center><br>


<?php
    require_once "db.php";
    $sql = "SELECT stId FROM stdreg WHERE stdRollNo='$r'";
    $result = mysqli_query($conn, $sql);
?>


<HTML>
<HEAD>
<link href="imageStyles.css" rel="stylesheet" type="text/css" />
</HEAD>
<BODY>
<?php
	while($row = mysqli_fetch_array($result)) {
	?>
		<div class="image"><img src="imageView.php?image_id=<?php echo $row["stId"]; ?>"  width="175" height="200"  /></div>
	
<?php		
	}
    mysqli_close($conn);
?>


<?php
$con = mysqli_connect('localhost','student','gnits','project_monitoring');
if(mysqli_connect_errno()){
	echo "Failed to connect ".mysqli_connect_error();
}
session_start();
?>
<?php
$r = $_SESSION['id'];
$pwd = $_SESSION['p'];
$query = "SELECT pname FROM employee_table WHERE rollNo='$r'";
$res = mysqli_query($con,$query);
?>
<br>
<center>
    <br><br>
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
        <div class="pro"><center><a href="prodetails.php?pn=<?php echo $entry ?>" style="text-decoration: none; color: black;"><?php echo $i.". ". $entry ; 
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

                        </BODY>
</HTML>