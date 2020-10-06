
<html>
<head>
<link rel="stylesheet" href="tableprcpro.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://kit.fontawesome.com/3203fd57e4.js" crossorigin="anonymous"></script>
</head>

<body>
<div class="dropdown" style="background: linear-gradient(120deg,#a8c0ff, #eaafc8);">
  <button class="dropbtn" style="background: linear-gradient(120deg,#a8c0ff, #eaafc8);"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRVIcj4yYNjZ5iI4dAjusUE0OwK6jzd8EBON2aNJ4AejGNGYZch&usqp=CAU" style="width: 30px; height: 30px"/></button>
  <div class="dropdown-content">
    <a href="prcProfile.php">My profile</a>
    <a href="prclogin.php">Logout</a>
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
$query = "SELECT * FROM prcreg WHERE prcRollNo='$r'";
$res = mysqli_query($con,$query);
echo "<table border='3'>
";
$row = mysqli_fetch_array($res);
$name = $row['prcName'];
$roll = $row['prcRollNo'];
$branch = $row['prcBranch'];
$_SESSION['n'] = $name;
$_SESSION['r'] = $roll;
$_SESSION['b'] = $branch;
echo "<tr>";
echo "<td>PRC Name</td>";
echo "<td>".$row['prcName']."</td>";
echo "</tr>";
echo "<tr>";
echo "<td>PRC Roll No</td>";
echo "<td>".$row['prcRollNo']."</td>";
echo "</tr>";
echo "<tr>";
echo "<td>PRC Email</td>";
echo "<td>".$row['prcEmail']."</td>";
echo "</tr>";
echo "<tr>";
echo "<td>PRC Phone number</td>";
echo "<td>".$row['prcPhone']."</td>";
echo "</tr>";
echo "<tr>";
echo "<td>PRC Branch</td>";
echo "<td>".$row['prcBranch']."</td>";
echo "</tr>";
echo "</table>";
?>



<?php
    require_once "db.php";
    $sql = "SELECT prcId FROM prcreg WHERE prcRollNo='$r'";
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
		<div class="image"><img src="imageView1.php?image_id=<?php echo $row["prcId"]; ?>"  width="175" height="200"  /></div>
	
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
$query1 = "SELECT distinct pname FROM ig WHERE appdisapp_abs=1 OR appdisapp_doc=1 OR appdisapp_vid=1";
$res1 = mysqli_query($con,$query1);
?>

<br>
<center>
<h1>List of projects:</h1></center>
<center><address>Note: Click on project names to know more details about it.</address></center><br><br>
<?php
$i=1;
$_SESSION['u'] = '$i';
$j=1;
$array=[];
while($row1 = mysqli_fetch_array($res1)) {
        $array[$j]=$row1['pname'];
        $j++;
        $entry = $row1["pname"]; 
             
        ?>
        <div class="container">
        <div class="pro">
          <center>
          <div class="row">
            <div class="col-sm-6 col-md-4">
                <div class="column">
            <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">
            <a href="prcprodetails.php?pn=<?php echo $entry ?>" style="text-decoration: none; color: black;">
            <?php echo $i.". ". $entry ; 
        
        ?></a>
        
</h5>
      
      </center></div>
        <?php
        echo "<br>";
        echo "<br>";
        $i++;
    }


                    ?>

                        </table>
                        <form method="post" action="export.php" align="center">  
  <input type="submit" name="export" value="Download" class="btn btn-success" 
  style="background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;"/>   

  <!-- <button class="btn"><i class="fa fa-download"></i> Download</button> -->

</form> 
                        </BODY>
</HTML>