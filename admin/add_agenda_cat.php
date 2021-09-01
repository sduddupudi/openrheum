<?php
error_reporting(1);
include '../db_connection.php';
include 'header.php';
//session_start();


 ?>

<?php

$_SESSION["userID"];

if(isset($_POST['add_agenda_cat_btn']))
{
    $customer_id = $_SESSION["userID"];
    $agenda_cat_name = $_POST["agenda_cat_name"];
    $agenda_cat_color = $_POST["agenda_cat_color"];


    $sql = "INSERT INTO agenda_cat (customer_id, agenda_cat_name,category_color_code)
    VALUES ('".$customer_id."', '".$agenda_cat_name."', '".$agenda_cat_color."' )";
    
    if ($conn->query($sql) === TRUE) {
          $msg = "Agenda category insert successfully";
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
              <h6 class="m-0 font-weight-bold text-primary">Add agenda category</h6>
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
                      <input type="text" id="agenda_cat_name" name="agenda_cat_name" class="form-control" value="" >
                    </div>
                  </div>

                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="agenda_cat_color">category color</label>
                    <div class="col-md-6">
                      <input type="text" id="agenda_cat_color" name="agenda_cat_color" class="form-control" value="" >
                    </div>
                  </div>
    

                <!--   <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="agenda_category">agenda Category </label>
                    <div class="col-md-6">
                      <select id="agenda_category" name="agenda_category" class="form-control">
                        <option value="">select agenda category</option>
                        <option value="all">All</option>
                        <option value="regional_marketers">Regional Marketers</option>
                        <option value="gms_trainer_acq_and_ve">GMS, TRAINER, ACQ AND VE</option>
                      </select>
                    </div>
                  </div>  -->   



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
