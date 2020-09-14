<?php  
 if(isset($_POST["export"]))  
 {  
      $connect = mysqli_connect('localhost','student','gnits','project_monitoring');  
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=data.csv');  
      $output = fopen("php://output", "w");  
      fputcsv($output, array('Name', 'Roll No', 'Branch', 'Project Name', 'Project Domain','Internal Guide','Project Type','Description','Problem Statement','Solution','PRC1','PRC2','PRC3'));  
      $query = "SELECT name,rollNo,branch,pname,pdomain,int_guide,ptype,description,ps,sol,marks_prc1,marks_prc2,marks_prc3 from employee_table WHERE ptype='mini'";  
      $result = mysqli_query($connect, $query);  
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  

      fputcsv($output, array('Internal Guide Name'));  
      $query1 = "SELECT ig_name from igreg";  
      $result1 = mysqli_query($connect, $query1);  
      while($row1 = mysqli_fetch_assoc($result1))  
      {  
           fputcsv($output, $row1);  
      }  
      fclose($output);  
 }  
 ?>  