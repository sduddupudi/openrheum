<?php
error_reporting(1);
include '../db_connection.php';
include 'header.php';

//session_start();
 ?>

<?php
if(isset($_POST['add_btn']))
{
  // echo "<pre>"; print_r($_POST);
    $name = $_POST["name"];
    $surname = $_POST['surname'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $datetime=date('Y-m-d H:i:s');
    $id=base64_decode(urldecode($_GET['Id']));
    $sql = "UPDATE user SET `name`='$name',`surname`='$surname',`userName`='$username',`Password`='$password',`createAT`='$datetime',`userType`='customer' WHERE userID='$id'";
        if ($conn->query($sql) === TRUE) {
              $msg = "Administrator Updated successfully";
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
              <h6 class="m-0 font-weight-bold text-primary">Update Administrator</h6>
              <a href="administration.php" style="float:right;" class="btn btn-primary">Back</a>
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
          $id=base64_decode(urldecode($_GET['Id']));
          $speaker_sql = "SELECT * FROM user where userID =$id and del=0";
          $get_speakers = $conn->query($speaker_sql);
          $row_data= $get_speakers->fetch_assoc(); { ?>
              <form class="form-horizontal" action='' method="POST"  enctype="multipart/form-data">
  <input type="hidden" name="Id" value="<?php echo $id;?>">
                <fieldset>
                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="speaker_name"> Name</label>
                    <div class="col-md-6">
                      <input type="text" id="name" name="name" class="form-control" value="<?php if(isset($row_data['name'])){echo $row_data['name']; } ?>" >
                    </div>
                  </div>

                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="designation">SurName</label>
                    <div class="col-md-6">
                      <input type="text" id="surname" name="surname" class="form-control" value="<?php if(isset($row_data['surname'])){echo $row_data['surname']; } ?>">
                    </div>
                  </div>

                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="linkdin">UserName</label>
                    <div class="col-md-6">
                      <input type="email" id="username" name="username" class="form-control" value="<?php if(isset($row_data['userName'])){echo $row_data['userName']; } ?>" >
                    </div>
                  </div>

                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="email">Password </label>
                    <div class="col-md-6">
                      <input type="password" id="password" name="password" class="form-control" value="">
                      <span>If you need to change password Please enter here</span>
                    </div>
                  </div>    

    <?php } ?>              
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
