<?php

session_start();

include 'connection.php';

if(isset($_SESSION['AuthStudent']))
{
  $emlst=$_SESSION['AuthStudent'];
  $query0=mysqli_query($con,"select Student_prn,Student_name from student_tbl where Student_email='$emlst'");
  $stream=mysqli_fetch_array($query0);
  $query1=mysqli_query($con,"SELECT result_tbl.Student_prn,result_tbl.Subject_id,result_tbl.Subject_totalmarks,result_tbl.Subject_marksget,result_tbl.Result_status,subject_tbl.Subject_examdate,result_tbl.Lastupdate FROM result_tbl INNER JOIN subject_tbl ON result_tbl.Subject_id=subject_tbl.scode AND result_tbl.Student_prn='$stream[0]'");


  // $row=mysqli_fetch_array($query1);
  // print_r($row);
  // die();

  // $row1=mysqli_fetch_array($query1);
  // print_r($row1);
  // die();
}
else if(isset($_SESSION['AuthProfessor']))
{
    $emlpf=$_SESSION['AuthProfessor'];
    $query=mysqli_query($con,"select subject_tbl.scode,exam_subject_tbl.Subject_name,subject_tbl.Subject_totalmarks,subject_tbl.Subject_examdate from subject_tbl inner join exam_subject_tbl on subject_tbl.scode=exam_subject_tbl.Subject_code");




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
    <b>List of result:- <?php echo $stream[1];?> with register PRN is :- <?php echo $stream[0];?></b>
    <a href="dashboard.php" class="btn btn-danger" style="float: right;">Exit</a>
  </div>
  <div class="card-body text-center">

    <table class="table table-sm ">
  <thead class="table-info">
    <tr>
      <th scope="col">CODE</th>
      <th scope="col">TOTAL</th>
      <th scope="col">OBTAIN</th>
      <th scope="col">STATUS</th>
      <th scope="col">EXAM DATE</th>

    </tr>
  </thead>
  <tbody>
    <?php

     while($row=mysqli_fetch_array($query1))
     { 

    ?>  
    <tr>
      <td><?php echo $row['Subject_id'];?></td>
      <td><?php echo $row['Subject_totalmarks'];?></td>
      <td><?php echo $row['Subject_marksget'];?></td>
      <td>
        <?php 
        if($row['Result_status']=='FAIL')
        {

        ?>
        <b class="text-danger">FAIL</b>
      <?php } ?>

       <?php 
        if($row['Result_status']=='PASS')
        {

        ?>
        <b class="text-success">PASS</b>
      <?php } ?>

        </td>
      <td><?php echo $row['Subject_examdate'];?></td>

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

