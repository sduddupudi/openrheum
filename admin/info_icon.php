<?php
error_reporting(1);
include '../db_connection.php';
include 'header.php';

//session_start();
 ?>

<?php



if(isset($_POST['info_icon_btn']))
{
    $customer_id = $_SESSION["userID"];

    if(isset($_FILES['info_icon']))
      {
        $file_name = time().$_FILES['info_icon']['name'];  
        $file_tmp =$_FILES['info_icon']['tmp_name'];
        $target_dir = "../admin/uploads/info_icon/";
        $target_file = $target_dir . basename($file_name);
        move_uploaded_file($file_tmp, $target_file);

$info_icon_sql1 = "SELECT * FROM info_icon  ";
$get_info_icon1 = $conn->query($info_icon_sql1);
$row_info_icon1 = $get_info_icon1->fetch_assoc();


if(empty($row_info_icon1)){
        $sql = "INSERT INTO  info_icon (`customer_id`,`info_icon`) VALUES ('$customer_id','$file_name')"; 
        if ($conn->query($sql) === TRUE) {
              $msg = "Info icon insert successfully";
        } else {
              $error = "Error: Failed!";
        }
}else{
        $update_sql = "UPDATE info_icon SET info_icon='".$file_name."' WHERE info_icon_ID='".$row_info_icon1["info_icon_ID"]."'  ";

        if ($conn->query($update_sql) === TRUE) {
              $msg = "Info icon updated successfully";
        } else {
              $error = "Error updating record: " . $conn->error;
        }

}
        



      }
   
       
}

$info_icon_sql = "SELECT * FROM info_icon ";
$get_info_icon = $conn->query($info_icon_sql);
$row_info_icon = $get_info_icon->fetch_assoc();
//print_r($row_info_icon);
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
              <h6 class="m-0 font-weight-bold text-primary">Add Info Icon</h6>
              <!-- <a href="list_resource.php" style="float:right;" class="btn btn-primary">Back</a> -->
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
                    <label class="col-md-4 col-form-label text-md-right"  for="info_icon">info icon </label>
                    <div class="col-md-3">
                      <input type="file" id="info_icon" name="info_icon" class="form-control" value="" required="">
                    </div>
                    <div class="col-md-3">
                      <img src="../admin/uploads/info_icon/<?php echo $row_info_icon["info_icon"];?>" height="50px;" width="60px;"></img>
                    </div>
                  </div>  

                  <div class="col-md-6 offset-md-4">
                      <button type="submit" name="info_icon_btn" class="btn btn-primary">Submit </button>
                  </div>
                </fieldset>

              </form>

            
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->



<?php include 'footer.php'; ?>
