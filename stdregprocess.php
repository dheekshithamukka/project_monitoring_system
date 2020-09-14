<?php
$name = $_POST["name"];
$roll = $_POST["roll"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$password = $_POST["password"];
$branch = $_POST["branch"];
$host='localhost';
$dbname='project_monitoring';
$dbuser='student';
$dbpass='gnits';
$dbConnect=new PDO('mysql:host='.$host.';dbname='.$dbname,$dbuser,$dbpass);
$dbConnect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$queryOne = $dbConnect->prepare("SELECT * FROM stdreg WHERE stdPhone = ? OR stdEmail = ? OR stdRollNo = ?");
$queryOne->bindValue(1,$phone);
$queryOne->bindValue(2,$email);
$queryOne->bindValue(3,$roll);
try{
$queryOne->execute();
$result = $queryOne->rowCount();
if($result == 0){
$query = $dbConnect->prepare("INSERT INTO stdreg(stdName, stdRollNo, stdEmail, stdPhone, stdBranch, stdPassword) VALUES(?,?,?,?,?,?)");
$query->bindValue(1,$name);
$query->bindValue(2,$roll);
$query->bindValue(3,$email);
$query->bindValue(4,$phone);
$query->bindValue(5,$branch);
$query->bindValue(6,$password);
try{
$result = $query->execute();
if($result == true){
echo "Your details are successfully registered";
?>
<a href="stdProfile.php"></a>
<?php
}
else{
echo "failed";
}
}
catch(PDOException $e){
die($e->getMessage());
}
}
else{
echo "Mobile number or email or Roll No. already exists";
}
}
catch(PDOException $e){
die($e->getMessage());
}
?>