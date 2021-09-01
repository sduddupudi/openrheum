<?php
error_reporting(1);
include '../db_connection.php';
include 'header.php';

//session_start();
 ?>

<?php
if(isset($_POST['add_resource_btn']))
{
    $customer_id = $_SESSION["userID"];
    $resource_name = $_POST["resource_name"];
    $date=date('Y-m-d');
    $time=date('H:i:s');
    $datetime=date('Y-m-d H:i:s');
    if(isset($_FILES['resource_picture']))
      {
        $file_name = time().$_FILES['resource_picture']['name'];  
        $file_tmp =$_FILES['resource_picture']['tmp_name'];
        $target_dir = "../admin/uploads/resource/";
        $target_file = $target_dir . basename($file_name);
        move_uploaded_file($file_tmp, $target_file);
      }
    if(isset($_FILES['resource_pdf']))
      {
        $file_name1 = time().$_FILES['resource_pdf']['name'];  
        $file_tmp1 =$_FILES['resource_pdf']['tmp_name'];
        $target_dir1 = "../admin/uploads/resource/";
        $target_file1 = $target_dir . basename($file_name1);
        move_uploaded_file($file_tmp1, $target_file1);
      }
       $sql = "INSERT INTO resource (`customer_id`,`resource_name`,`resource_picture`,`resource_pdf`,`date`,`datetime`,`time`) VALUES ('$customer_id','$resource_name','$file_name','$file_name1','$date','$datetime','$time')"; 
        if ($conn->query($sql) === TRUE) {
              $msg = "Resource insert successfully";
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
              <h6 class="m-0 font-weight-bold text-primary">Add Resource</h6>
              <a href="list_resource.php" style="float:right;" class="btn btn-primary">Back</a>
            </div>
            <div class="card-body">
              
              <div class="control-group row">
                <label class="col-md-4 col-form-label text-md-right"  for="msg"></label>
                <div class="col-md-12">
                  <?php if(!empty($msg)){ echo "<div class='alert alert-success alert-dismissible'><a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Success!</strong> $msg </div>";} ?> 
                  <?php if(!empty($error)){ echo "<div class='alert alert-danger alert-dismissible'><a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Failed!</strong> $error </div>"; } ?></span> 
                </div>
              </div>

              <form class="form-horizontal" action='' method="POST"  enctype="multipart/form-data">

                <fieldset>
                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="resource_name">Resource Name</label>
                    <div class="col-md-6">
                      <input type="text" id="resource_name" name="resource_name" class="form-control" value="" required="">
                    </div>
                  </div>
                  
                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="resource_picture">Resource Picture </label>
                    <div class="col-md-6">
                      <input type="file" id="resource_picture" name="resource_picture" class="form-control" value="" required="">
                    </div>
                  </div>  

                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="resource_pdf">Resource </label>
                    <div class="col-md-6">
                      <input type="file" id="resource_pdf" name="resource_pdf" class="form-control" value="" required="">
                    </div>
                  </div>  

                  <div class="col-md-6 offset-md-4">
                      <button type="submit" name="add_resource_btn" class="btn btn-primary">Submit </button>
                  </div>
                </fieldset>

              </form>

            
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->



<?php include 'footer.php'; ?>
