<?php

session_start();

include 'connection.php';

if(isset($_SESSION['AuthStudent']))
{
  $emlst=$_SESSION['AuthStudent'];
}
else if(isset($_SESSION['AuthProfessor']))
{
    $emlpf=$_SESSION['AuthProfessor'];
    
    $sc=$_GET['scode'];
    $st=$_GET['stream'];
    $year=$_GET['syear'];

    $query=mysqli_query($con,"select Subject_name from  exam_subject_tbl where Subject_code='$sc'");
    $sn=mysqli_fetch_array($query);
    $query2=mysqli_query($con,"select scode,Subject_examdate,Subject_professor from subject_tbl where scode='$sc'");
    $row=mysqli_fetch_array($query2);

    $query3=mysqli_query($con,"SELECT student_tbl.Student_prn,subject_tbl.scode,student_tbl.Student_name,student_tbl.Student_stream,student_tbl.Student_year,result_tbl.Subject_totalmarks,result_tbl.Subject_marksget,result_tbl.Result_status FROM student_tbl INNER JOIN result_tbl ON student_tbl.Student_prn=result_tbl.Student_prn AND student_tbl.Student_year=result_tbl.Student_year INNER JOIN subject_tbl ON result_tbl.Subject_id=subject_tbl.scode where result_tbl.Subject_id='$sc' AND subject_tbl.scode='$sc'");
  
    



    // $call=mysqli_fetch_array($query);
    // print_r($call[0]);
    // die();
    
}
else
{
    header("location:401.php");
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <title>View Result</title>
  </head>
  <body>
    <br><br>

  <div class="card">
  <div class="card-header">
     <b class="text-uppercase text-danger">Subject Name :- <?php echo $sn[0];?></b>
     |
     <b  class="text-uppercase text-danger">Subject Code :- <?php echo $row[0];?></b>
     |
     <b class="text-uppercase text-danger">Exam Date :- <?php echo $row[1];?></b>
     |
     <b class="text-uppercase text-danger">Subject Professor :- <?php echo $row[2];?></b>

    <a href="setresult.php" class="btn btn-danger" style="float: right;">Exit</a>
  </div>
  <div class="card-body text-center">

    <table class="table table-sm ">
  <thead class="table-info">
    <tr>
      <th scope="col">PRN</th>
      <th scope="col">Name</th>
      <th scope="col">STREAM</th>
      <th scope="col">Total</th>
      <th scope="col">OBTAIN</th>
      <th scope="col">STATUS</th>
    </tr>
  </thead>
  <tbody>
    <?php

     while($row=mysqli_fetch_array($query3))
     { 

    ?>  
    <tr>
      <td><?php echo $row['Student_prn'];?></td>
      <td><?php echo $row['Student_name'];?></td>
      <td><?php echo $row['Student_stream'];?>-<?php echo $row['Student_year'];?></td>
      <td><?php echo $row['Subject_totalmarks'];?></td>
      <td><?php echo $row['Subject_marksget'];?></td>
      <td><?php echo $row['Result_status'];?></td>
    </tr>

    <?php
     }
     ?>
  </tbody>
</table>
     

  </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  
  </body>
</html>

<?php


if(isset($_POST['sbtn']))
{
  $scd=$_POST['scode'];
  $etype=$_POST['sexam'];
  $ttlmr=$_POST['ttlmrk'];
  $edt=$_POST['edate'];


  $query=mysqli_query($con,"insert into subject_tbl(scode,Exam_type,Subject_totalmarks,Subject_professor,Subject_examdate)values('$scd','$etype','$ttlmr','$pf[0]','$edt')");

  

  if($query)
  {
    echo "<script>
          swal({
           title: 'Success!',
           text: 'Succesfully set exam!',
           icon: 'success',
            });
          </script>";
  }
  else
  {
    echo "<script>
          swal({
           title: 'Failure!',
           text: 'Something went wrong,try again!',
           icon: 'error',
            });
          </script>";

      echo "<pre>";
      print_r($query);    
  }
}



//this is query for display time table of exam related to be and mca student

// SELECT exam_subject_tbl.Subject_name, subject_tbl.Exam_type, subject_tbl.Subject_totalmarks, subject_tbl.Exam_type, exam_subject_tbl.Subject_code FROM exam_subject_tbl INNER JOIN subject_tbl ON exam_subject_tbl.Subject_code = subject_tbl.scode WHERE subject_tbl.scode LIKE 'BE%'

// SELECT exam_subject_tbl.Subject_name, subject_tbl.Exam_type, subject_tbl.Subject_totalmarks, subject_tbl.Exam_type, exam_subject_tbl.Subject_code FROM exam_subject_tbl INNER JOIN subject_tbl ON exam_subject_tbl.Subject_code = subject_tbl.scode WHERE subject_tbl.scode LIKE 'MCA%'

?>