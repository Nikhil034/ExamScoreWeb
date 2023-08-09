<?php

session_start();

include 'connection.php';

if(isset($_SESSION['AuthStudent']))
{
  $emlst=$_SESSION['AuthStudent'];
}
else if(isset($_SESSION['AuthProfessor']))
{
  
    $query=mysqli_query($con,"select * from student_tbl where Student_stream='BE'");
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

    <title>View of BE class</title>
  </head>
  <body>
    <br><br>

  <div class="card">
  <div class="card-header">
    List of Student in BE 
    <a href="dashboard.php" class="btn btn-danger" style="float: right;">Exit</a>
  </div>
  <div class="card-body text-center">

    <table class="table table-sm ">
  <thead class="table-warning">
    <tr>
      <th scope="col">#PRN</th>
      <th scope="col">EMAIL</th>
      <th scope="col">YEAR</th>
      <th scope="col">VIEW</th>
    </tr>
  </thead>
  <?php
      
      while($row=mysqli_fetch_array($query))
      {
  ?>      

  <tbody>  
    <tr>
      <td><?php echo $row['Student_prn'];?></td>
      <td><?php echo $row['Student_email'];?></td>
      <td><?php echo $row['Student_year'];?></td>
      <td><!-- <a href="viewmcaprofile.php?id=<?php echo $row['Student_prn'];?>" class="btn btn-warning">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
       </svg></a> -->

     <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal<?php echo $row['Student_prn'] ?>">View</button> -->

     <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $row['Student_prn'];?>">View</button>
   <!--   
    <div id="myModal<?php echo $row['Student_prn'] ?>" class="modal fade" role="dialog">
      <div class="modal-dialog">
          <div class="modal-content">
          <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Details</h4>
            </div>
            <div class="modal-body">
             <h3>Email : <?php echo $row['Student_email']; ?></h3>
             <h3>Mobile : <?php echo $row['Student_prn']; ?></h3>
             <h3>Email : <?php echo $row['Student_year']; ?></h3>
            </div>
        </div>
      </div>
    </div> -->


    <div class="modal fade" id="exampleModal<?php echo $row['Student_prn'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Full view of student</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <?php

        if($row['Student_gender']=='MALE')
        {
           
        ?>
           <img src="boy.jpeg" style="height: auto;width: auto;">
           
           <div class="alert alert-info" role="alert">
            PRN :- <?php echo $row['Student_prn'];?>
           </div>
           <br>
           <div class="alert alert-info" role="alert">
            NAME :- <?php echo $row['Student_name'];?>
           </div>
           <br>
           <div class="alert alert-info" role="alert">
            STREAM :- <?php echo $row['Student_stream'];?>
           </div>
           <br>
           <div class="alert alert-info" role="alert">
            CONTACT :- <?php echo $row['Student_contact'];?>
           </div>
           <br>
           <div class="alert alert-info" role="alert">
            GENDER :- <?php echo $row['Student_gender'];?>
           </div>
           <br>

            <div class="alert alert-info" role="alert">
            ADDRESS :- <?php echo $row['Student_address'];?>
           </div>
           <br>

           
            <?php
             
              if($row['Isthere']==1)
              {
                
            ?>

            <div class="alert alert-success" role="alert">
              STATUS :- Student is enrolled !.
            </div>  

            <?php
             }
             ?>

              <?php
             
              if($row['Isthere']==0)
              {
                
             ?>

             <div class="alert alert-danger" role="alert">
              STATUS :- Student is not enrolled !.
            </div>  

            <?php
             }
             ?>




           </div>

        <?php
        
         }

         ?> 

          <?php

        if($row['Student_gender']=='FEMALE')
        {

        ?>
           <img src="girl.jpeg" style="height: auto;width: auto;">
           
           <div class="alert alert-info" role="alert">
            PRN :- <?php echo $row['Student_prn'];?>
           </div>
           <br>
           <div class="alert alert-info" role="alert">
            NAME :- <?php echo $row['Student_name'];?>
           </div>
           <br>
           <div class="alert alert-info" role="alert">
            STREAM :- <?php echo $row['Student_stream'];?>
           </div>
           <br>
           <div class="alert alert-info" role="alert">
            CONTACT :- <?php echo $row['Student_contact'];?>
           </div>
           <br>
           <div class="alert alert-info" role="alert">
            STREAM :- <?php echo $row['Student_stream'];?>
           </div>
           <br>

            <div class="alert alert-info" role="alert">
            ADDRESS :- <?php echo $row['Student_address'];?>
           </div>
           <br>

           
            <?php
             
              if($row['Isthere']==1)
              {
                
            ?>

            <div class="alert alert-info" role="alert">
              STATUS :- Student is enrolled !.
            </div>  

            <?php
             }
             ?>

              <?php
             
              if($row['Isthere']==0)
              {
                
             ?>

             <div class="alert alert-danger" role="alert">
              STATUS :- Student is not enrolled !.
            </div>  

            <?php
             }
             ?>

           </div>

        <?php
              
         }

         ?> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

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

