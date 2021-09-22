
<?php
session_start();
require_once('sql.php');
$_SESSION['email'];

$eamil=$_SESSION['email'];
 
$result = mysqli_query($conn,"SELECT * FROM hire_req");


if (mysqli_num_rows($result) > 0) {
  $i=0;
  $row = mysqli_fetch_array($result);

  
  }
  else{
  echo "No result found";
  }


?>

<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i>Messages</h1>
     
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">Dashbord</li>
      <li class="breadcrumb-item active"><a href="#">Total Messages </a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <div class="table-responsive">
            <table border="1px" class="table table-hover table-bordered" id="sampleTable">
             
            <tr >
                 
                 <td><?php echo $row['name']; ?></td>
                 <td><?php echo $row['phone']; ?></td>
                 <td><?php echo $row['email']; ?></td>
                 <td><?php echo $row['message']; ?></td>
             
<td>

          <a href="approve_apointment.php ?id= <?php echo $row["email"]; ?>" class="btn btn-success">Click Me</a>
                
            

 

                <?php    
                $i=0;
                while($row = mysqli_fetch_assoc($result)) {

             
                ?>

 

       
                 
                  <button type="submit" name="delete" class="btn btn-danger">Decline</button>
                
                
                  </td>
                </tr>


            </table>


            <?php

$i++;



}


?>


 

          </div>
        </div>
      </div>
    </div>
  </div>
</main>

 
