<?php
error_reporting(1);
include '../db_connection.php';
include 'header.php';

//session_start();
 ?>

<?php

$_SESSION["userID"];
if(isset($_POST['add_speaker_btn']))
{
    $customer_id = $_SESSION["userID"];
    $speaker_name = $_POST["speaker_name"];
    $designation = $_POST['designation'];
    $description = ltrim($_POST['speakers_description']);
    $linkdin = $_POST['linkdin'];
    $email = $_POST['email'];
    $date=date('Y-m-d');
    $time=date('H:i:s');
    $datetime=date('Y-m-d H:i:s');
    $speakers_order = $_POST['speakers_order'];
    $file_name='';
    if(isset($_FILES['profile_picture']))
      {
        $file_name = time().$_FILES['profile_picture']['name'];  
        $file_tmp =$_FILES['profile_picture']['tmp_name'];
        $target_dir = "../admin/uploads/speaker/";
        $target_file = $target_dir . basename($file_name);
        move_uploaded_file($file_tmp, $target_file);
      }
       $sql = "INSERT INTO speakers (`customer_id`,`speaker_name`,`designation`,`description`,`linkdin`,`email`,`profile`,`date`,`datetime`,`time`,`speakers_order`) VALUES ('$customer_id','$speaker_name','$designation','$description','$linkdin','$email','$file_name','$date','$datetime','$time','$speakers_order')"; 
        if ($conn->query($sql) === TRUE) {
              $msg = "Speaker insert successfully";
        } else {
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
              <h6 class="m-0 font-weight-bold text-primary">Add Speaker</h6>
              <a href="list_speakers.php" style="float:right;" class="btn btn-primary">Back</a>
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
                    <label class="col-md-4 col-form-label text-md-right"  for="speaker_name">Speaker Name</label>
                    <div class="col-md-6">
                      <input type="text" id="speaker_name" name="speaker_name" class="form-control" value="" required="">
                    </div>
                  </div>

                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="designation">Designation</label>
                    <div class="col-md-6">
                      <input type="text" id="designation" name="designation" class="form-control" value="" required="">
                    </div>
                  </div>

                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="linkdin">LinkdIn</label>
                    <div class="col-md-6">
                      <input type="text" id="linkdin" name="linkdin" class="form-control" value="" required="">
                    </div>
                  </div>

                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="email">Email </label>
                    <div class="col-md-6">
                      <input type="text" id="email" name="email" class="form-control" value="" required="">
                    </div>
                  </div> 

                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="speakers_order">Speaker Order(The value must be numeric) </label>
                    <div class="col-md-6">
                      <input type="text" id="speakers_order" name="speakers_order" class="form-control" value="" required="">
                    </div>
                  </div> 


                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="speakers_order">Description</label>
                    <div class="col-md-6">
                      <textarea id="speakers_description" class="form-control" name="speakers_description" rows="4" cols="50" value="" required=""></textarea>
                    </div>
                  </div> 






                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="profile_picture">Profile Picture </label>
                    <div class="col-md-6">
                      <input type="file" id="profile_picture" name="profile_picture" class="form-control" value="" required="">
                    </div>
                  </div>  
                  <div class="col-md-6 offset-md-4">
                      <button type="submit" name="add_speaker_btn" class="btn btn-primary">Submit </button>
                  </div>
                </fieldset>

              </form>

            
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->



<?php include 'footer.php'; ?>
