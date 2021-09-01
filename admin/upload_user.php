<?php
error_reporting(1);
include '../db_connection.php';
include 'header.php';

//session_start();
 ?>

<?php

$_SESSION["userID"];
if(isset($_POST['add_btn']))
{
   // $user_file = $_POST["user_file"];

 if(!empty($_FILES['user_file']['name']) ){
        
        // If the file is uploaded
        if(is_uploaded_file($_FILES['user_file']['tmp_name'])){
            
            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['user_file']['tmp_name'], 'r');
            
            // Skip the first line
            fgetcsv($csvFile);
            
            // Parse data from CSV file line by line
            $total_insert_user = 0;
            while(($line = fgetcsv($csvFile)) !== FALSE){
                // Get row data
                $email   = $line[0];
                $password  = md5($line[1]);
                $type=$line[2];
                $datetime=date('Y-m-d H:i:s');

                //$encript_password = md5($sign_in_password);
                $get_sql = "SELECT * FROM user where userName ='".$email ."'  ";
                $result = $conn->query($get_sql);
                $row = $result->fetch_assoc();
                if (empty($row)) {
                    $sql = "INSERT INTO user (`name`,`surname`,`userName`,`Password`,`userType`,`verifyStatus`,`createAT`) VALUES ('','','$email','$password','$type','1','$datetime')"; 
                    $insert = $conn->query($sql);

                    $total_insert_user++;
                }

            }
            // Close opened CSV file
            fclose($csvFile);
            
            $msg = $total_insert_user." User Upload successfully";
        }else{
            $error = "Error: Failed!";
        }
    }else{
        $error = "Error: Failed!";
    }   

}
?>

<style type="text/css">
  .control-group.row {
    margin-bottom: 1rem;
}
</style>

       <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Upload User</h6>
              <!-- <a href="administration.php" style="float:right;" class="btn btn-primary">Back</a> -->
            </div>
            <div class="card-body">
              
              <div class="control-group row">
                <label class="col-md-4 col-form-label text-md-right"  for="msg"></label>
                <div class="col-md-6">
                  <?php if(!empty($msg)){ echo "<div class='alert alert-success alert-dismissible'><a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Success!</strong> $msg </div>";} ?> 
                  <?php if(!empty($error)){ echo "<div class='alert alert-danger alert-dismissible'><a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Failed!</strong> $error </div>"; } ?></span> 
                </div>
              </div>

              <form class="form-horizontal" action='' method="POST"  enctype="multipart/form-data">

                <fieldset>
                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="user_file"> Upload User</label>
                    <div class="col-md-4">
                      <input type="file" id="user_file" name="user_file" class="form-control" value="" required="" accept=".csv">
                    </div>
                    <div class="col-md-4">
                     <a href="/assets/upload_format.csv" download> SAMPLE CSV </a>
                    </div>
                      
                  </div>
 
                  <div class="col-md-6 offset-md-4">
                      <button type="submit" name="add_btn" class="btn btn-primary">Submit </button>
                  </div>
                </fieldset>

              </form>

            
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->



<?php include 'footer.php'; ?>
