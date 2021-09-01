<?php
error_reporting(1);
include '../db_connection.php';
include 'header.php';
if(isset($_POST['delete_btn']))
{
  $id=base64_decode(urldecode($_POST['ID']));
  $sql = "UPDATE user SET `del`=1 WHERE userID='$id'";
  if (mysqli_query($conn, $sql)) {
    $msg = "Record deleted successfully";
  } else {
    $error = "Error deleting record: " . mysqli_error($conn);
  }
}?>

<div class="container-fluid">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">All Administrators</h6>
              <a href="add_administrator.php" style="float:right;" class="btn btn-primary">Add</a>
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
                      <th>#</th>
                      <th>Name</th>
                      <th>Surname</th>
                      <th>Username</th>
                      <th>Added Date</th>
                      <th>action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
          <th>#</th>
                      <th>Name</th>
                      <th>Surname</th>
                      <th>Username</th>
                      <th>Added Date</th>
                      <th>action</th>
                    </tr>
                  </tfoot>
                  <tbody>
              <?php 
              $sql = "SELECT * FROM user where userType='customer' and del=0";
              $result = $conn->query($sql); 
              $i=0;
              while ($row = mysqli_fetch_assoc($result)) {
                $i++;
              ?>
                    <tr>
                      <td><?php echo $i;?></td>
                      <td><?php echo $row["name"];?></td>
                      <td><?php echo $row["surname"];?></td>
                      <td><?php echo $row["userName"];?></td>
                      <td><?php echo $row["createAT"];?></td>
                      <td>
                        <ul class="list-inline m-0">                
                            <li class="list-inline-item" style="width: 30%">
                                <button  type="button" data-toggle="tooltip" data-placement="top" title="Edit" style="border: none;background: transparent;"><a href="<?php echo $adminURL;?>edit_administrator.php?Id=<?php echo urlencode(base64_encode($row["userID"])); ?>"><i class="fa fa-edit"></i></a></button>
                            </li>
                            <li class="list-inline-item">
                              <form method="POST" action="">
                                <input type="hidden" name="ID" value="<?php echo urlencode(base64_encode($row["userID"])); ?>">
                                <button type="submit" name="delete_btn"  data-toggle="tooltip" data-placement="top" title="Delete" style="border: none;background: transparent;"><i class="fa fa-trash"></i></button>
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