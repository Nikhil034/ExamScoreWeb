<?php

session_start();

include 'connection.php';

$stpf=$_SESSION['AuthStudent'];

$query=mysqli_query($con,"select * from student_tbl where student_email='$stpf'");

$row=mysqli_fetch_array($query);

// print_r($row);
// die();

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

    <title>Profile of Student</title>
  </head>
  <body>
    <br><br>
    <div class="card">
      <br>
      <div class="card-body text-center">

        <?php 

        if($row[2]=='MALE')
        {

        ?>   

         <img src="boy.jpeg" style="height: auto;width: auto;">

         <br><br>

         <form method="post">

         <div class="row g-3">
               <div class="col">
                <label style="float:left;">Student PRN</label>
                 <input type="text" class="form-control"  value="<?php echo $row[0];?>" name="stprn" disabled>
               </div>
               <div class="col">
                <label  style="float:left;">Student Name</label>
                 <input type="email" class="form-control"value="<?php echo $row[1];?>" name="stnm">
               </div>
         </div>
         <br>

          <div class="row g-3">
               <div class="col">
                <label  style="float:left;">Student Email</label>
                 <input type="email" class="form-control" id="psw" value="<?php echo $row[3];?>" name="steml">
               </div>
                <div class="col">
                <label  style="float:left;">Student Status</label>
                 <input type="text" class="form-control"value="<?php if($row[9]=='1') echo "Status available!"; else echo "Not available"; ;?>" name="status" readonly>
               </div>
         </div>      
         <br>

         <div class="row g-3">
               <div class="col">
                <label style="float:left;">Student Stream</label>
                 <input type="text" class="form-control" value="<?php echo $row[5];?>" name="ststream">
               </div>
               <div class="col">
                <label style="float:left;">Student Year</label>
                 <input type="text" class="form-control" value="<?php echo $row[6];?>" name="styear">
               </div>
         </div>
         <br>


          <div class="row g-3">
               <div class="col">
                <label style="float:left;">Student Contact</label>
                 <input type="text" class="form-control" value="<?php echo $row[7];?>" name="stcon">
               </div>
               <div class="col">
                <label style="float:left;">Student Address</label>
                 <input type="text" class="form-control" value="<?php echo $row[8];?>" name="stadd">
               </div>
         </div>

         <br>
         <a href="dashboard.php" class="btn btn-danger">Exit</a>

       <?php } ?>
       
         <?php 

        if($row[2]=='FEMALE')
        {

        ?>   

         <img src="girl.jpeg" style="height: auto;width: auto;">

         <br><br>

         <form method="post">

         <div class="row g-3">
               <div class="col">
                <label style="float:left;">Student PRN</label>
                 <input type="text" class="form-control"  value="<?php echo $row[0];?>" name="stprn" >
               </div>
               <div class="col">
                <label  style="float:left;">Student Name</label>
                 <input type="email" class="form-control"value="<?php echo $row[1];?>" name="stnm">
               </div>
         </div>
         <br>

          <div class="row g-3">
               <div class="col">
                <label  style="float:left;">Student Email</label>
                 <input type="email" class="form-control" id="psw" value="<?php echo $row[3];?>" name="steml">
               </div>
                <div class="col">
                <label  style="float:left;">Student Status</label>
                 <input type="text" class="form-control" value="<?php if($row[9]=='1') echo "Status available!"; else echo "Not available"; ;?>" name="ststatus" readonly>
               </div>
         </div>      
         <br>

         <div class="row g-3">
               <div class="col">
                <label style="float:left;">Student Stream</label>
                 <input type="text" class="form-control" value="<?php echo $row[5];?>" name="ststream">
               </div>
               <div class="col">
                <label style="float:left;">Student Year</label>
                 <input type="text" class="form-control" value="<?php echo $row[6];?>" name="styear">
               </div>
         </div>
         <br>


          <div class="row g-3">
               <div class="col">
                <label style="float:left;">Student Contact</label>
                 <input type="text" class="form-control" value="<?php echo $row[7];?>" name="stcon">
               </div>
               <div class="col">
                <label style="float:left;">Student Address</label>
                 <input type="text" class="form-control" value="<?php echo $row[8];?>" name="stadd">
               </div>
         </div>

         <br>
         <a href="dashboard.php" class="btn btn-danger">Exit</a>

       <?php } ?>    


      </div>
      
    </div>
  </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  
  </body>
</html>



?>