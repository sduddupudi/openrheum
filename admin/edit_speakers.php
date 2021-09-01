<?php
error_reporting(1);
include '../db_connection.php';
include 'header.php';

//session_start();
 ?>

<?php
if(isset($_POST['add_speaker_btn']))
{
    $speakerid=base64_decode(urldecode($_GET['speakerID']));
    $customer_id = $_SESSION["userID"];
    $speaker_name = $_POST["speaker_name"];
    $designation = ltrim($_POST['designation']);
    $description = $_POST['speakers_description'];
    $linkdin = $_POST['linkdin'];
    $email = $_POST['email'];
    $date=date('Y-m-d');
    $time=date('H:i:s');
    $datetime=date('Y-m-d H:i:s');
    $speakers_order = $_POST['speakers_order'];
    $file_name='';
    if(isset($_FILES['profile_picture']) and $_FILES['profile_picture']!='')
      {
        $file_name = time().$_FILES['profile_picture']['name'];  
        $file_tmp =$_FILES['profile_picture']['tmp_name'];
        $target_dir = "../admin/uploads/speaker/";
        $target_file = $target_dir . basename($file_name);
        $moveres=move_uploaded_file($file_tmp, $target_file);
      }
    /*  if($moveres!=0)
      {
        $sql = "UPDATE speakers SET `customer_id`='$customer_id',`speaker_name`='$speaker_name',`designation`='$designation',`description`='$description',`linkdin`='$linkdin',`email`='$email',`profile`='$file_name',`updated_date`='$date',`updated_datetime`='$datetime',`updated_time`='$time',`speakers_order`='$speakers_order' WHERE SpeakerId='$speakerid'";
      }
      else
      {
        $sql = "UPDATE speakers SET `customer_id`='$customer_id',`speaker_name`='$speaker_name',`designation`='$designation',`description`='$description',`linkdin`='$linkdin',`email`='$email',`updated_date`='$date',`updated_datetime`='$datetime',`updated_time`='$time',`speakers_order`='$speakers_order' WHERE SpeakerId='$speakerid'";
      }
        if ($conn->query($sql) === TRUE) {
              $msg = "Speaker Updated successfully";
        } else {
              $error = "Error: Failed!";
        }*/

        if($moveres!=0)
        {
          $sql = "UPDATE speakers SET customer_id=?, speaker_name=?, designation=? , description=?, linkdin=? , email=?, profile=? , updated_date=?, updated_datetime=? , updated_time=?, speakers_order=? WHERE SpeakerId=?";
          $stmt= $conn->prepare($sql);

          $stmt->bind_param("sssssssssssi", $customer_id,$speaker_name,$designation,$description,$linkdin,$email,$file_name,$updated_date,$updated_datetime,$updated_time,$speakers_order,$speakerid);
        }
        else
        { 

         $sql = "UPDATE speakers SET customer_id=?, speaker_name=?, designation=? , description=?, linkdin=? , email=?, updated_date=?, updated_datetime=? , updated_time=?, speakers_order=? WHERE SpeakerId=?";
          $stmt= $conn->prepare($sql);

          $stmt->bind_param("ssssssssssi", $customer_id,$speaker_name,$designation,$description,$linkdin,$email,$updated_date,$updated_datetime,$updated_time,$speakers_order,$speakerid);
        }

      if ($stmt->execute()) {
            $msg = "Speaker updated successfully";
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
              <h6 class="m-0 font-weight-bold text-primary">Update Speaker</h6>
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
<?php 
$speakerid=base64_decode(urldecode($_GET['speakerID']));
$speaker_sql = "SELECT * FROM speakers where speakerID =$speakerid and del=0";
$get_speakers = $conn->query($speaker_sql);
$row_speakers= $get_speakers->fetch_assoc();?>
              <form class="form-horizontal" action='' method="POST"  enctype="multipart/form-data">

                <fieldset>
                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="speaker_name">Speaker Name</label>
                    <div class="col-md-6">
                      <input type="text" id="speaker_name" name="speaker_name" class="form-control" value="<?php if(isset($row_speakers['speaker_name'])){echo $row_speakers['speaker_name']; } ?>" >
                    </div>
                  </div>

                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="designation">Designation</label>
                    <div class="col-md-6">
                      <input type="text" id="designation" name="designation" class="form-control" value="<?php if(isset($row_speakers['designation'])){echo $row_speakers['designation']; } ?>">
                    </div>
                  </div>

                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="linkdin">LinkdIn</label>
                    <div class="col-md-6">
                      <input type="text" id="linkdin" name="linkdin" class="form-control" value="<?php if(isset($row_speakers['linkdin'])){echo $row_speakers['linkdin']; } ?>" >
                    </div>
                  </div>

                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="email">Email </label>
                    <div class="col-md-6">
                      <input type="text" id="email" name="email" class="form-control" value="<?php if(isset($row_speakers['email'])){echo $row_speakers['email']; } ?>">
                    </div>
                  </div> 

                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="speakers_order">Speaker Order(The value must be numeric) </label>
                    <div class="col-md-6">
                      <input type="text" id="speakers_order" name="speakers_order" class="form-control" value="<?php if(isset($row_speakers['speakers_order'])){echo $row_speakers['speakers_order']; } ?>" required="">
                    </div>
                  </div>   

                   <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="speakers_order">Description</label>
                    <div class="col-md-6">
                      <textarea id="speakers_description" class="form-control" name="speakers_description" rows="4" cols="50" value="" required=""><?php if(isset($row_speakers['description'])){echo $row_speakers['description']; } ?>
                      </textarea>
                    </div>
                  </div> 


                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="profile_picture">Profile Picture </label>
                    <div class="col-md-3">
                      <input type="file" id="profile_picture" name="profile_picture" class="form-control" value="">
                    </div>
                    <div class="col-md-3">
                      <img src="../admin/uploads/speaker/<?php echo $row_speakers["profile"];?>" height="50px;" width="60px;"></img>
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
