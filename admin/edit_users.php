<?php
error_reporting(1);
include '../db_connection.php';
include 'header.php';

//session_start();
 ?>

<?php
if(isset($_POST['add_user_btn']))
{
    $userid=base64_decode(urldecode($_GET['userID']));
    $username=$_POST['user_name'];
    $password = $_SESSION["password"];
    $encript_password = md5($password);
    $userType = $_POST["userType"];
   
    $date=date('Y-m-d');
    $time=date('H:i:s');
    $datetime=date('Y-m-d H:i:s');
    $file_name='';
    if(isset($_FILES['profile_picture']) and $_FILES['profile_picture']!='')
      {
        $file_name = time().$_FILES['profile_picture']['name'];  
        $file_tmp =$_FILES['profile_picture']['tmp_name'];
        $target_dir = "../admin/uploads/speaker/";
        $target_file = $target_dir . basename($file_name);
        $moveres=move_uploaded_file($file_tmp, $target_file);
      }
   /*if($moveres!=0)
      {
        $sql = "UPDATE user SET `userName`='$username',`Password`='$encript_password',`userType`='$userType' WHERE userId='".$_GET['userID']."'";
      }
      else
      {
        $sql = "UPDATE user SET `userName`='$username',`Password`='$encript_password',`userType`='$userType' WHERE userId='".$_GET['userID']."'";
      }
        if ($conn->query($sql) === TRUE) {
              $msg = "User Updated successfully";
        } else {
              $error = "Error: Failed!";
        } */

        if($moveres!=0)
        {
          $sql = "UPDATE user SET userName=?, Password=?, userType=? WHERE userId=?";
          $stmt= $conn->prepare($sql);
          $stmt->bind_param("sssi", $username,$encript_password,$userType,$userid);
        }
        else
        { 
          $sql = "UPDATE user SET userName=?, Password=?, userType=? WHERE userId=?";
          $stmt= $conn->prepare($sql);
          $stmt->bind_param("sssi", $username,$encript_password,$userType,$userid);
        }

      if ($stmt->execute()) {
            $msg = "User Updated successfully";
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
              <h6 class="m-0 font-weight-bold text-primary">Update Users</h6>
              <a href="list_users.php" style="float:right;" class="btn btn-primary">Back</a>
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
$userid=base64_decode(urldecode($_GET['userID']));
$user_sql = "SELECT * FROM user where userID =$userid and del=0";
$get_user= $conn->query($user_sql);
$row_user= $get_user->fetch_assoc();?>
              <form class="form-horizontal" action='' method="POST"  enctype="multipart/form-data">

                <fieldset>
                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="speaker_name">User Name</label>
                    <div class="col-md-6">
                      <input type="text" id="speaker_name" name="user_name" class="form-control" value="<?php if(isset($row_user['userName'])){echo $row_user['userName']; } ?>" >
                    </div>
                  </div>

                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="designation">Password</label>
                    <div class="col-md-6">
                      <input type="password" id="password" name="password" class="form-control" value="<?php if(isset($row_user['password'])){echo $row_user['password']; } ?>">
                    </div>
                  </div>

                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="linkdin">Type</label>
                    <div class="col-md-6">
                      <input type="text" id="userType" name="userType" class="form-control" value="<?php if(isset($row_user['userType'])){echo $row_user['userType']; } ?>" >
                    </div>
                  </div>

                 
                  <div class="col-md-6 offset-md-4">
                      <button type="submit" name="add_user_btn" class="btn btn-primary">Submit </button>
                  </div>
                </fieldset>

              </form>

            
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->



<?php include 'footer.php'; ?>
