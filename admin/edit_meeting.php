<?php
error_reporting(1);
include '../db_connection.php';
include 'header.php';

//session_start();
 ?>

<?php
if(isset($_POST['add_meeting_btn']))
{
    $meetingid=$_GET['meetingId'];
    $customer_id = $_SESSION["userID"];
    $meeting_name = $_POST["meeting_name"];
    $watch_link = $_POST["watch_link"];
    $date=date('Y-m-d');
    $time=date('H:i:s');
    $datetime=date('Y-m-d H:i:s');
    $file_name='';
    if(isset($_FILES['meeting_picture']) and $_FILES['meeting_picture']!='')
    {
      $file_name = time().$_FILES['meeting_picture']['name'];  
      $file_tmp =$_FILES['meeting_picture']['tmp_name'];
      $target_dir = "../admin/uploads/meeting/";
      $target_file = $target_dir . basename($file_name);
      $rspicres=move_uploaded_file($file_tmp, $target_file);
    }
    if($rspicres!=0)
    {
      $sql = "UPDATE meeting SET `customer_id`='$customer_id',`meeting_name`='$meeting_name',`watch_link`='$watch_link',`meeting_picture`='$file_name',`updated_date`='$date',`updated_datetime`='$datetime',`updated_time`='$time' WHERE meetingId='$meetingid'";;
    } 
    else
    {
      $sql = "UPDATE meeting SET `customer_id`='$customer_id',`meeting_name`='$meeting_name',`watch_link`='$watch_link',`updated_date`='$date',`updated_datetime`='$datetime',`updated_time`='$time' WHERE meetingId='$meetingid'";;
    }
    if ($conn->query($sql) === TRUE) {
        $msg = "Meeting Updated successfully";
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
              <h6 class="m-0 font-weight-bold text-primary">Update Meeting</h6>
              <a href="list_meeting.php" style="float:right;" class="btn btn-primary">Back</a>
            </div>
            <div class="card-body">
              
              <div class="control-group row">
                <label class="col-md-4 col-form-label text-md-right"  for="msg"></label>
                <div class="col-md-12">

                  <?php if(!empty($msg)){ echo "<div class='alert alert-success alert-dismissible'><a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Success!</strong> $msg </div>";} ?> 
                  <?php if(!empty($error)){ echo "<div class='alert alert-danger alert-dismissible'><a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Failed!</strong> $error </div>"; } ?></span> 
                </div>
              </div>
<?php 
$meetingid=$_GET['meetingId'];
$meeting_sql = "SELECT * FROM meeting where meetingID =$meetingid and del=0";
$get_meetings = $conn->query($meeting_sql);
$row_meetings= $get_meetings->fetch_assoc();?>
              <form class="form-horizontal" action='' method="POST"  enctype="multipart/form-data">

                <fieldset>
                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="meeting_name">Meeting Name</label>
                    <div class="col-md-6">
                      <input type="text" id="meeting_name" name="meeting_name" class="form-control" value="<?php if(isset($row_meetings['meeting_name'])){echo $row_meetings['meeting_name']; } ?>" >
                    </div>
                  </div>

                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="meeting_picture">Meeting Picture </label>
                    <div class="col-md-3">
                      <input type="file" id="meeting_picture" name="meeting_picture" class="form-control" value="">
                    </div>
                    <div class="col-md-3">
                      <img src="../admin/uploads/meeting/<?php echo $row_meetings["meeting_picture"];?>" height="50px;" width="60px;"></img>
                    </div>
                  </div>

                   <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="watch_link">Watch Link</label>
                    <div class="col-md-6">
                      <input type="text" id="watch_link" name="watch_link" class="form-control" value="<?php if(isset($row_meetings['watch_link'])){echo $row_meetings['watch_link']; } ?>">
                    </div>
                  </div>  

                  <div class="col-md-6 offset-md-4">
                      <button type="submit" name="add_meeting_btn" class="btn btn-primary">Submit </button>
                  </div>
                </fieldset>

              </form>

            
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->



<?php include 'footer.php'; ?>
