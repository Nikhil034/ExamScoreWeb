<?php

session_start();

include 'connection.php';

if(isset($_SESSION['AuthStudent']))
{
  $emlst=$_SESSION['AuthStudent'];
  $query0=mysqli_query($con,"select Student_stream from student_tbl where Student_email='$emlst'");
  $stream=mysqli_fetch_array($query0);
  $query1=mysqli_query($con,"select subject_tbl.scode,exam_subject_tbl.Subject_name,subject_tbl.Subject_totalmarks,subject_tbl.Subject_examdate from subject_tbl inner join exam_subject_tbl on subject_tbl.scode=exam_subject_tbl.Subject_code where subject_tbl.scode LIKE '$stream[0]%'");

  $row1=mysqli_fetch_array($query1);
  print_r($row1);
  die();
}
else if(isset($_SESSION['AuthProfessor']))
{
    $emlpf=$_SESSION['AuthProfessor'];
    $query=mysqli_query($con,"select subject_tbl.scode,exam_subject_tbl.Subject_name,subject_tbl.Subject_totalmarks,subject_tbl.Subject_examdate from subject_tbl inner join exam_subject_tbl on subject_tbl.scode=exam_subject_tbl.Subject_code");




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

    <title>View Exam</title>
  </head>
  <body>
    <br><br>

  <div class="card">
  <div class="card-header">
    Time Table of Both MCA and BE
    <a href="setexam.php" class="btn btn-danger" style="float: right;">Exit</a>
  </div>
  <div class="card-body text-center">

    <table class="table table-sm ">
  <thead class="table-warning">
    <tr>
      <th scope="col">#code</th>
      <th scope="col">Subject Name</th>
      <th scope="col">Mark</th>
      <th scope="col">Date</th>
      <th scope="col">X</th>
    </tr>
  </thead>
  <tbody>
    <?php

     while($row=mysqli_fetch_array($query))
     { 

    ?>  
    <tr>
      <td><?php echo $row['scode'];?></td>
      <td><?php echo $row['Subject_name'];?></td>
      <td><?php echo $row['Subject_totalmarks'];?></td>
      <td><?php echo $row['Subject_examdate'];?></td>
      <td><a href="deletesubject.php?id=<?php echo $row['scode'];?>" class="btn btn-warning"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z"/></svg></a></td>
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