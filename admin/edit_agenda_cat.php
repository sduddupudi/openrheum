<?php
error_reporting(1);
include '../db_connection.php';
include 'header.php';

//session_start();


 ?>

<?php



if(isset($_POST['add_agenda_cat_btn']))
{
    $customer_id = $_SESSION["userID"];
    $agenda_cat_name = $_POST["agenda_cat_name"];
    $agenda_cat_color = $_POST["agenda_cat_color"];
    $id = base64_decode(urldecode($_GET["agenda_cat_id"]));

    $update_sql = "UPDATE agenda_cat SET agenda_cat_name='".$agenda_cat_name."',category_color_code='".$agenda_cat_color."'  WHERE agenda_cat_id='".$id."'  ";

        if ($conn->query($update_sql) === TRUE) {
              $msg = "Record updated successfully";
        } else {
              $error = "Error updating record: " . $conn->error;
        } 
  



}

$agenda_cat_sql = "SELECT * FROM agenda_cat where agenda_cat_id ='".base64_decode(urldecode($_GET["agenda_cat_id"]))."' ";
$get_agenda_cat = $conn->query($agenda_cat_sql);
$row_agenda_cat = $get_agenda_cat->fetch_assoc();


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
              <h6 class="m-0 font-weight-bold text-primary">Edit agenda category</h6>
            </div>
            <div class="card-body">
              
              <div class="control-group row">
                <label class="col-md-4 col-form-label text-md-right"  for="msg"></label>
                <div class="col-md-6">
                  <span id="msg" style="color: green;"><?php if(!empty($msg)){echo $msg; } ?></span>
                  <span id="error" style="color: red;"><?php if(!empty($error)){echo $error; } ?></span> 
                </div>
              </div>

              <form class="form-horizontal" action='' method="POST">

                <fieldset>

                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="agenda_cat_name">category Name</label>
                    <div class="col-md-6">
                      <input type="text" id="agenda_cat_name" name="agenda_cat_name" class="form-control" value="<?php if(isset($row_agenda_cat['agenda_cat_name'])){echo $row_agenda_cat['agenda_cat_name']; } ?>" >
                    </div>
                  </div>

                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="agenda_cat_color">category color</label>
                    <div class="col-md-6">
                      <input type="text" id="agenda_cat_color" name="agenda_cat_color" class="form-control" value="<?php if(isset($row_agenda_cat['category_color_code'])){echo $row_agenda_cat['category_color_code']; } ?>" >
                    </div>
                  </div>

                  <div class="col-md-6 offset-md-4">
                            <button type="submit" name="add_agenda_cat_btn" class="btn btn-primary">
                            Submit
                            </button>
                        </div>
                </fieldset>

              </form>

            
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->



<?php include 'footer.php'; ?>
