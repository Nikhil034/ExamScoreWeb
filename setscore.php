<?php

include 'connection.php';


$stream=$_GET['stream'];
$syear=$_GET['syear'];
$query=mysqli_query($con,"select Student_prn,Student_name,Student_year from student_tbl where Student_stream='$stream'");

$scode=$_GET['scode'];
$query2=mysqli_query($con,"select scode,Subject_totalmarks,Subject_examdate from subject_tbl where scode='$scode'");
$row=mysqli_fetch_array($query2);

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

    <title>Set Result</title>
  </head>
  <body>

    <br>
  	<div class="card">
  	<form method="post">
  <div class="card-header">
    <b>Subject code :-<?php echo $row['scode'];?></b><input type="hidden" name="sub_code" value="<?php echo $row['scode'];?>">
    | 
    <b>Exam Date :-<?php echo $row['Subject_examdate'];?></b> 
    |
    <b>Total Mark :- <?php echo $row['Subject_totalmarks'];?></b><input type="hidden" name="total_mrk" value="<?php echo $row['Subject_totalmarks'];?>">
    |
    <b>Year :- <?php echo $syear;?><input type="hidden" name="sub_year" value="<?php echo $syear;?>">  


  </div>
  <div class="card-body">

   
   <table class="table table-bordered border-warning">
  <thead>
    <tr>
      <th scope="col">PRN</th>
      <th scope="col">NAME</th>
      <th scope="col">OBTAIN MARK</th>
      <th scope="col">STATUS</th>
    </tr>
  </thead>
  <tbody>
  	<?php 
  	 while($row=mysqli_fetch_array($query))
  	 {

     
  	 ?>
    <tr>
      <td><input type="number" class="form-control form-control-sm" id="" name="sprn[]" value="<?php echo $row['Student_prn'];?>" aria-describedby="" readonly></td>
      <td><input type="text" class="form-control form-control-sm" id="" name="sname[]" value="<?php echo $row['Student_name'];?>" aria-describedby="" readonly></td>
      <td>
          <input type="number" class="form-control form-control-sm markset"  name="obtain_mrk[]" aria-describedby="">
      </td>
      <td>
      	<input type="text" class="form-control form-control-sm status"  name="status_exam[]" readonly=""  >
      </td>
    </tr>

<script type="text/javascript">
  document.addEventListener("DOMContentLoaded", function() {
    const marks = document.querySelectorAll('.markset');
    const statuses = document.querySelectorAll('.status');
    
    marks.forEach((mark, index) => {
      mark.addEventListener('blur', function() {
        if (mark.value > 15 && mark.value<=30) {
          statuses[index].value = "PASS";
        }
        else if(mark.value<0 || mark.value>30){
        	alert('Invalid marks');
        } 
        else {
          statuses[index].value = "FAIL";
        }
      });
    });
  });
</script>

    <?php
     }
     ?>
 </tbody>
</table>
  <button type="submit" name="otherbtn" class="btn btn-primary" style="float: center;">Click to Save</button>
</form>

  </div>
</div>
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  
  </body>
</html>

<?php

if(isset($_POST['otherbtn']))
{
    // Make sure you have a valid database connection ($con) established before this point.

    $stud_prn = $_POST['sprn'];
    $name = $_POST['sname']; 
    $obt_mrk = $_POST['obtain_mrk'];
    $res_status = $_POST['status_exam'];
    $total = $_POST['total_mrk'];
    $sid = $_POST['sub_code'];
    $flag = true; // Change to boolean for better clarity

     $querycheck=mysqli_query($con,"select Subject_id from result_tbl where Subject_id='$sid'");
     $IsAlreadydone=mysqli_num_rows($querycheck);

     if($IsAlreadydone>0)
     {

     	 echo "<script>
          swal({
           title: 'Info!',
           text: 'Already result is done!',
           icon: 'info',
            });
          </script>";
     }
     else
     {

    foreach($stud_prn as $key => $n)
    {
        $student_prn = mysqli_real_escape_string($con, $n);
        $subject_id = mysqli_real_escape_string($con, $sid);
        $subject_total = mysqli_real_escape_string($con, $total);
        $marks_obtained = mysqli_real_escape_string($con, $obt_mrk[$key]);  //for prevent sql injection 
        $status = mysqli_real_escape_string($con, $res_status[$key]);

       

        $query = "INSERT INTO result_tbl(Student_prn,Student_year,Subject_id, Subject_totalmarks, Subject_marksget, Result_status) VALUES ('$student_prn','$syear', '$subject_id', '$subject_total', '$marks_obtained', '$status')";

        $isFire = mysqli_query($con, $query);

        if(!$isFire) {
            $flag = false;
            break; // Exit the loop on the first failure
        }
    }



    if($flag)
   {
     echo "<script>
          swal({
           title: 'Success!',
           text: 'Exam result succesfully saved!',
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
  }
  }

 

}

?>

