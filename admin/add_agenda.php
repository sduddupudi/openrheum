<?php
error_reporting(1);
include '../db_connection.php';
include 'header.php';

//session_start();


 ?>

<?php
if(isset($_POST['add_agenda_btn']))
{
  
    //$customer_id = $_SESSION["userID"];
    $agenda_name = $_POST["agenda_name"];

    $schedule_date = $_POST['schedule_date'];
    $schedule_date_color = $_POST['schedule_date_color'];
    $schedule_start_time = $_POST['schedule_start_time'];
    $schedule_end_time = $_POST['schedule_end_time'];

    $link_title = $_POST['link_title'];
    $link_url = $_POST['link_url'];
    $link_color = $_POST['link_color'];

    $agenda_category = $_POST['agenda_category'];
    $agenda_category_2 = $_POST['agenda_category_2'];
    $agenda_category_3 = $_POST['agenda_category_3'];
    $type = $_POST['type'];
    
    // $sql = "INSERT INTO agenda ( agenda_name,schedule_date,schedule_date_color,schedule_start_time, schedule_end_time,link_title,link_url,link_color,agenda_category,agenda_category_2,agenda_category_3,type)
    // VALUES ( '".$agenda_name."','".$schedule_date."','".$schedule_date_color."','".$schedule_start_time."','".$schedule_end_time."','".$link_title."','".$link_url."','".$link_color."','".$agenda_category."','".$agenda_category_2."','".$agenda_category_3."','".$type."' )";
    
    // if ($conn->query($sql) === TRUE) {
    //       $msg = "Agenda insert successfully";
    // } else {
    //       $error = "Error: Failed!";
    // }


$stmt = $conn->prepare("INSERT INTO agenda (agenda_name,schedule_date,schedule_date_color,schedule_start_time, schedule_end_time,link_title,link_url,link_color,agenda_category,agenda_category_2,agenda_category_3,type) VALUES (?, ?,?,?, ?, ?,?,?, ?, ?,?,?)");
$stmt->bind_param("ssssssssssss", $agenda_name,$schedule_date,$schedule_date_color,$schedule_start_time,$schedule_end_time,$link_title,$link_url,$link_color,$agenda_category,$agenda_category_2,$agenda_category_3,$type);
// $stmt->execute();

if ($stmt->execute()) {
          $msg = "Agenda insert successfully";
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
              <h6 class="m-0 font-weight-bold text-primary">Add agenda</h6>
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

                  <!-- <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="Plenary">Go to Plenary</label>
                    <div class="col-md-6">
                      <input type="text" id="Plenary" name="Plenary" class="form-control" value="<?php if(isset($row_lobby['Plenary'])){echo $row_lobby['Plenary']; } ?>"  >
                    </div>
                  </div> -->

                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="agenda_name">Agenda Name</label>
                    <div class="col-md-6">
                      <input type="text" id="agenda_name" name="agenda_name" class="form-control" value="" >
                    </div>
                  </div>

                  

                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="schedule_date"> Schedule Date</label>
                    <div class="col-md-6">
                      <input type="text" id="schedule_date" name="schedule_date" class="form-control" value="">
                    </div>
                  </div>

                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="schedule_date_color"> Schedule Date Color Code</label>
                    <div class="col-md-6">
                      <input type="text" id="schedule_date_color" name="schedule_date_color" class="form-control" value="" placeholder="#FFFFFF">
                    </div>
                  </div>

                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="schedule_start_time"> Schedule Start Time</label>
                    <div class="col-md-6">
                      <input type="text" id="schedule_start_time" name="schedule_start_time" class="form-control" value="">
                    </div>
                  </div>

                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="schedule_end_time"> Schedule End Time</label>
                    <div class="col-md-6">
                      <input type="text" id="schedule_end_time" name="schedule_end_time" class="form-control" value="">
                    </div>
                  </div>

                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="link_title">Meeting Button  title </label>
                    <div class="col-md-6">
                      <input type="text" id="link_title" name="link_title" class="form-control" value="" placeholder="go to meeting" >
                    </div>
                  </div>

                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="link_url"> Meeting Button  url </label>
                    <div class="col-md-6">
                      <input type="text" id="link_url" name="link_url" class="form-control" value="">
                    </div>
                  </div> 

                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="link_color"> Meeting Button  Color Code </label>
                    <div class="col-md-6">
                      <input type="text" id="link_color" name="link_color" class="form-control" value="" placeholder="#FFFFFF">
                    </div>
                  </div>   

                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="agenda_category">agenda Category </label>
                    <div class="col-md-6">
                      <select id="agenda_category" name="agenda_category" class="form-control">
                        <option value="">select agenda category</option>
                        <?php $sql = "SELECT * FROM agenda_cat  ";
                        $result = $conn->query($sql); 
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<option value="'.$row["agenda_cat_id"].'">'.$row["agenda_cat_name"].'</option>';
                        }
                        ?>                        
                        
                      </select>
                    </div>
                  </div> 
          <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="agenda_category_2">agenda Category 2 </label>
                    <div class="col-md-6">
                      <select id="agenda_category_2" name="agenda_category_2" class="form-control">
                        <option value="">select agenda category</option>
                        <?php $sql = "SELECT * FROM agenda_cat  ";
                        $result = $conn->query($sql); 
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<option value="'.$row["agenda_cat_id"].'">'.$row["agenda_cat_name"].'</option>';
                        }
                        ?>                        
                        
                      </select>
                    </div>
                  </div> 
          <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="agenda_category_3">agenda Category 3</label>
                    <div class="col-md-6">
                      <select id="agenda_category_3" name="agenda_category_3" class="form-control">
                        <option value="">select agenda category</option>
                        <?php $sql = "SELECT * FROM agenda_cat   ";
                        $result = $conn->query($sql); 
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<option value="'.$row["agenda_cat_id"].'">'.$row["agenda_cat_name"].'</option>';
                        }
                        ?>                        
                        
                      </select>
                    </div>
                  </div> 

              <div class="control-group row">
                <label class="col-md-4 col-form-label text-md-right"  for="type">Type</label>
                <div class="col-md-6">
                  <select id="type" name="type" class="form-control" required="">
                    <option value="">Type</option>
                    <option value="event">Event</option>
                    <option value="break">Break</option>
                    
                  </select>
                </div>
              </div> 




                  <div class="col-md-6 offset-md-4">
                            <button type="submit" name="add_agenda_btn" class="btn btn-primary">
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

<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
         rel = "stylesheet">

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">

<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

      <!-- Javascript -->
<script>
        
  $("#schedule_date").datepicker({
    minDate: 0,
    dateFormat: "yy-mm-dd",
    onSelect: function(date, datepicker) {
      let dependent= $(this).data('dependent');
      let thisDate = $(this).val();
      $(dependent).datepicker("option", "minDate", thisDate);
      $(dependent).datepicker('refresh');
    }
  });






</script>
<script type="text/javascript">
  $('#schedule_start_time').timepicker({
    timeFormat: 'HH:mm',
    interval: 5,
    use24hours: true,
    scrollbar: true,
});

  $('#schedule_end_time').timepicker({
    timeFormat: 'HH:mm',
    interval: 5,
    use24hours: true,
    scrollbar: true,
});
</script>