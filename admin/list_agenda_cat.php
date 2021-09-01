<?php
error_reporting(1);
include '../db_connection.php';
 include 'header.php';



// $agenda_sql = "SELECT * FROM agenda where customerID ='".$_SESSION["userID"]."' ";
// $get_agenda = $conn->query($agenda_sql);
// $row_agenda = $get_agenda->fetch_row();
// print_r($row_agenda);

// $sql = "SELECT * FROM agenda where customerID ='".$_SESSION["userID"]."' ";
// $result = $conn->query($sql); 
// while ($row = mysqli_fetch_assoc($result)) {
//     echo $row["customerID"];
// }

if(isset($_POST['delete_agenda_cat_btn']))
{
  $id=base64_decode(urldecode($_POST['agenda_cat_id']));
  $sql = "DELETE FROM agenda_cat WHERE agenda_cat_id=$id";
if (mysqli_query($conn, $sql)) {
  $msg = "Record deleted successfully";
} else {
  $error = "Error deleting record: " . mysqli_error($conn);
}

}


?>

<div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">all Agenda category</h6>
            </div>
            <div class="card-body">
              <div class="control-group row">
                <label class="col-md-4 col-form-label text-md-right"  for="msg"></label>
                <div class="col-md-6">
                  <span id="msg" style="color: green;"><?php if(!empty($msg)){echo $msg; } ?></span>
                  <span id="error" style="color: red;"><?php if(!empty($error)){echo $error; } ?></span> 
                </div>
              </div> 
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Agenda category Name</th>
                      <th>Agenda category color</th>
                      <th>action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Agenda category Name</th>
                      <th>Agenda category color</th>
                      <th>action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php $sql = "SELECT * FROM agenda_cat  ";
                  $result = $conn->query($sql); 
                  while ($row = mysqli_fetch_assoc($result)) {
                  ?>
                    <tr>
                      <td><?php echo $row["agenda_cat_name"];?></td>
                      <td><?php echo $row["category_color_code"];?></td>
                      <td>
                        
                        <ul class="list-inline m-0">                
                            <li class="list-inline-item" style="width: 30%">
                                <button  type="button" data-toggle="tooltip" data-placement="top" title="Edit" style="border: none;background: transparent;"><a href="<?php echo $adminURL;?>edit_agenda_cat.php?agenda_cat_id=<?php echo urlencode(base64_encode($row["agenda_cat_id"])); ?>"><i class="fa fa-edit"></i></a></button>
                            </li>
                            <li class="list-inline-item">
                              <form method="POST" action="">
                                <input type="hidden" name="agenda_cat_id" value="<?php echo urlencode(base64_encode($row["agenda_cat_id"])); ?>">
                                <button type="submit" name="delete_agenda_cat_btn"  data-toggle="tooltip" data-placement="top" title="Delete" style="border: none;background: transparent;"><i class="fa fa-trash"></i></button>
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