<head>
<script src='jquery-3.2.1.min.js'></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src='http://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.js'></script>
<link rel="stylesheet" type="text/css" href="proreg1.css" />
</head>
<body>
   <div class="container">
<fieldset>
<p>
<center><h1>New project registration</h1></center>
   <label><strong>No of Candidates</strong></label>
   <label><input name="cand_no" type="text" placeholder="Type Your Number of Candidates"  /></label>
<div class="clear"></div>
</p>
 <form method="post">
<div class="cand_fields">
   <table id="studentTable" width="630" border="0">
      <tr> 
         <td >Name</td>
         <td >Roll No</td>
         <td >Branch</td>
      </tr>
      <tr>
      </tr>
   </table>
</div>
</form>
</div>
</fieldset>
<div class="template" style="display: none">
    <table>
    <tr >
         <td><input name="name[]" type="text" placeholder="Name" required="required" /></td>
         <td><input name="age[]" type="text" placeholder="Roll No" required="required" /></td>
         <td><input name="job[]" type="text" placeholder="Branch" required="required" /></td>

      </tr>
  </table>
</div>

</body>
<script type="text/javascript">
$('[name="cand_no"]').on('change', function() {
    // Not checking for Invalid input
    if (this.value != '') {
        var val = parseInt(this.value, 10);
        
        for (var i = 1; i < val; i++) {
            // Clone the Template
            var $cloned = $('.template tbody').clone();
            // For each Candidate append the template row
            $('#studentTable tbody').append($cloned.html());
        }
        var $c = $('.p').clone();
            // For each Candidate append the template row
            $('#studentTable tbody').append($c.html());
    }
});
</script>
<div class="p" style="display: none">
<div>
               <center> <input type="text" placeholder="Enter project name" name="pname" required/></center>
            </div>
<div>
                <center><input type="text" placeholder="Enter project domain" name="pdomain" required/></center>
            </div>
            <div>
                <center><input type="text" placeholder="Enter internal guide Id" name="int_guide" required/></center>
            </div><br>

            <!--<div>
                <center><input type="text" placeholder="Type of project" name="ptype" required/></center>
            </div>-->
            <div>
    Type of project: <select name="ptype">
    <option>Select</option>
    <option value="mini">Mini project</option>
    <option value="major">Major project</option>
    </select>
            </div><br>
  <div>
<p>Description:</p><textarea name="description" rows="5" cols="50"></textarea>
  </div><br>
  <div>
<p>Problem statement:</p><textarea name="ps" rows="5" cols="50"></textarea>
  </div><br>

<div>
<p>Solution:</p><textarea name="sol" rows="5" cols="50"></textarea>
  </div><br>
<div>
                <center><input type="password" placeholder="Enter password" name="pw" required/></center>
            </div>
            <div>
  <input type="submit" name="submit_row" value="Register"/>
  <a href="index.php"><input type="submit1" value="Cancel"/></a>
            </div>
</div> 

<?php
if(isset($_POST['submit_row']))
{
 $connect=mysqli_connect('localhost','student','gnits','project_monitoring');
 // $db=mysql_select_db($connect, $databasename);  
 if (!$connect) {
  die("Connection failed: " . mysqli_connect_error());
}
session_start();
?>

 <?php 
 $name=$_POST['name'];
 $age=$_POST['age'];
 $job=$_POST['job'];
 $pname=$_POST['pname'];
 $pdomain=$_POST['pdomain'];
 $int_guide=$_POST['int_guide'];
 $ptype=$_POST['ptype'];
 $description=($_POST['description']); 
 $ps=($_POST['ps']); 
 $sol=$_POST['sol'];
 $pw=$_POST['pw'];

$name1 = $_SESSION['n'];
$roll1 = $_SESSION['r'];
$branch1 = $_SESSION['b'];

//echo $pname;
$s = "SELECT * FROM employee_table WHERE pname='$pname'";
$rs = mysqli_query($connect, $s);
$r = mysqli_num_rows($rs);
//echo $r;
if(mysqli_num_rows($rs)>0){
  //echo "Hello";
  echo ("<script LANGUAGE='JavaScript'>
         window.alert('Project name already exists. Please try again.');
        window.location.href = 'proreg.php';
        </script>");
}
else{

//echo "Hi";

 $qu = "SELECT ig_name FROM igreg WHERE ig_id='$int_guide'";
 $res = mysqli_query($connect,$qu);
 $rsm = mysqli_fetch_array($res);
 $int_name = $rsm['ig_name'];

 for($i=0;$i<count($name);$i++)
 {
  if($name[$i]!="" && $age[$i]!="" && $job[$i]!="" && $pname!="" && $pdomain!="" && $pw!="" && $description!="" && $ps!="" && $sol!="")
  {
    $query = "INSERT INTO employee_table(name,rollNo,branch,pname,pdomain,int_guide,intName,ptype,description,ps,sol,password,marks_prc1,marks_prc2,marks_prc3,average_marks) VALUES('$name1','$roll1','$branch1','$pname','$pdomain','$int_guide','$int_name','$ptype','$description','$ps','$sol','$pw',0,0,0,0)";
    mysqli_query($connect,$query);
    $q = "INSERT INTO employee_table(name, rollNo, branch, pname, pdomain,int_guide, intName, ptype, description, ps, sol, password,marks_prc1,marks_prc2,marks_prc3,average_marks) VALUES('$name[$i]', '$age[$i]', '$job[$i]', '$pname','$pdomain','$int_guide','$int_name', '$ptype','$description','$ps', '$sol', '$pw',0,0,0,0)";
    mysqli_query($connect,$q);
    // echo "Hi";
  }
 }
}
}
?>

<br>

<center><a href="stdprofile.php"><img src="https://i2.wp.com/www.matuloo.com/wp-content/uploads/2017/02/backbutton.png?fit=800%2C400" style="width: 50px; height: 30px;">
</center>
