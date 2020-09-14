<?php  
 if(isset($_POST["export"]))  
 {  
      $connect = mysqli_connect('localhost','student','gnits','project_monitoring');  
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=data.csv');  
      $output = fopen("php://output", "w");  
      fputcsv($output, array('Name', 'Roll No', 'Branch', 'Project Name', 'Project Domain','Internal Guide Id', 'Internal Guide Name','Project Type','Description','Problem Statement','Solution','PRC1','PRC2','PRC3','Average marks'));  
      $query = "SELECT name,rollNo,branch,pname,pdomain,int_guide,intName, ptype,description,ps,sol,marks_prc1,marks_prc2,marks_prc3,average_marks from employee_table WHERE ptype='mini'";  
      $result = mysqli_query($connect, $query);  
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  

      $sum = 0;
      $avg = 0;
      fputcsv($output, array('Average marks for the whole section'));  
      $query1 = "SELECT * FROM employee_table WHERE ptype='mini'";  
      $result1 = mysqli_query($connect, $query1);  
      $num = mysqli_num_rows($result1);
      while($row1 = mysqli_fetch_assoc($result1))  
      {  
           $sum = $sum + $row1['average_marks'];
      }  
      $avg = (float)$sum/$num;
      echo $avg;
      fputcsv($output, $avg);  
      fclose($output);  
 
 }  
 ?>  