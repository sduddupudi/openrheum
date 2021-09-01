<?php
error_reporting(1);
include '../db_connection.php';
include 'header.php';
if(isset($_POST['delete_user_btn']))
{
  $id=base64_decode(urldecode($_POST['userID']));
  $sql = "DELETE FROM `user` WHERE userID='$id'";
  if (mysqli_query($conn, $sql)) {
    $msg = "Record deleted successfully";
  } else {
    $error = "Error deleting record: " . mysqli_error($conn);
  }
}?>

<div class="container-fluid">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">All Users</h6>
              <a href="add_users.php" style="float:right;" class="btn btn-primary">Add</a>
            </div>
            <div class="card-body">
              <div class="control-group row">
                <label class="col-md-4 col-form-label text-md-right"  for="msg"></label>
                <div class="col-md-6">
                  <?php if(!empty($msg)){ echo "<div class='alert alert-success alert-dismissible'><a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Success!</strong> $msg </div>";} ?> 
                  <?php if(!empty($error)){ echo "<div class='alert alert-danger alert-dismissible'><a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Failed!</strong> $error </div>"; } ?></span>
                </div>
              </div>              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>User Name</th>
                      <th>UserType</th>
                      <th>action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                       <th>User Name</th>
                      <th>UserType</th>
                      <th>action</th>
                    </tr>
                  </tfoot>
                  <tbody>
<?php 
$cid=$_SESSION['userID'];
$sql = "SELECT * FROM user where del=0";
$result = $conn->query($sql); 
while ($row = mysqli_fetch_assoc($result)) {
?>
                    <tr>
                      <td><?php echo $row["userName"];?></td>
                      <td><?php echo $row["userType"];?></td>
                      
                      <td>
                        
                        <ul class="list-inline m-0">                
                            <li class="list-inline-item" style="width: 30%">
                                <button  type="button" data-toggle="tooltip" data-placement="top" title="Edit" style="border: none;background: transparent;"><a href="<?php echo $adminURL;?>edit_users.php?userID=<?php echo urlencode(base64_encode($row["userID"])); ?>"><i class="fa fa-edit"></i></a></button>
                            </li>
                            <li class="list-inline-item">
                              <form method="POST" action="">
                                <input type="hidden" name="userID" value="<?php echo urlencode(base64_encode($row["userID"])); ?>">
                                <button type="submit" name="delete_user_btn"  data-toggle="tooltip" data-placement="top" title="Delete" style="border: none;background: transparent;"><i class="fa fa-trash"></i></button>
                              </form>
                                
                            </li>
                        </ul>
                      </td>
                    </tr>
 <?php } ?>    
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>



<?php include 'footer.php'; ?>