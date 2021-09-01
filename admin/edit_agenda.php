<?php
error_reporting(1);
include '../db_connection.php';
include 'header.php';

//session_start();

 ?>

<?php

if(isset($_POST['add_agenda_btn']))
{

   $decoded_id = base64_decode(urldecode($_GET["agendaID"]));
    //$customer_id = $_SESSION["userID"];
    $agenda_name = $_POST["agenda_name"];
    $speaker_name = $_POST["speaker_name"];
    // new code// 
    $speaker_name2 = $_POST["speaker_name2"];
    $speaker_name3 = $_POST["speaker_name3"];
    $speaker_name4 = $_POST["speaker_name4"];

    //
    
    $schedule_date = $_POST['schedule_date'];
    $schedule_date_color = $_POST['schedule_date_color'];
    $schedule_start_time = $_POST['schedule_start_time'];
    $schedule_end_time = $_POST['schedule_end_time'];

    $link_title = $_POST['link_title'];
    $link_url = $_POST['link_url'];
    $link_color = $_POST['link_color'];

    $agenda_category = $_POST['agenda_category'];
    $agenda_category2 = $_POST['agenda_category2'];
    $agenda_category3 = $_POST['agenda_category3'];
    $type = $_POST['type'];

  /*  $update_sql = "UPDATE agenda SET agenda_name='".$agenda_name."',speaker_name='".$speaker_name."',speaker_name2='".$speaker_name2."',speaker_name3='".$speaker_name3."',speaker_name4='".$speaker_name4."',schedule_date='".$schedule_date."',schedule_date_color='".$schedule_date_color."',schedule_start_time='".$schedule_start_time."' ,schedule_end_time='".$schedule_end_time."' ,link_title='".$link_title."' ,link_url='".$link_url."' ,link_color='".$link_color."',agenda_category='".$agenda_category."',agenda_category_2='".$agenda_category2."',agenda_category_3='".$agenda_category3."',type='".$type."' WHERE agendaID='".$_GET["agendaID"]."'  ";

   
        if ($conn->query($update_sql) === TRUE) {
              $msg = "Record updated successfully";
        } else {
              $error = "Error updating record: " . $conn->error;
        } 
*/


$sql = "UPDATE agenda SET agenda_name=?, speaker_name=?, speaker_name2=? , speaker_name3=?, speaker_name4=? , schedule_date=?, schedule_date_color=? , schedule_start_time=?, schedule_end_time=? , link_title=?, link_url=?, link_color=?, agenda_category=?, agenda_category_2=?, agenda_category_3=?,type=? WHERE agendaID=?";
$stmt= $conn->prepare($sql);

$stmt->bind_param("ssssssssssssssssi", $agenda_name,$speaker_name,$speaker_name2,$speaker_name3,$speaker_name4,$schedule_date,$schedule_date_color,$schedule_start_time,$schedule_end_time,$link_title,$link_url,$link_color,$agenda_category,$agenda_category_2,$agenda_category_3,$type,$decoded_id);

if ($stmt->execute()) {
          $msg = "Record updated successfully";
    } else {
          $error = "Error: Failed!";
    }
}

$decoded_id = base64_decode(urldecode($_GET["agendaID"]));
$agenda_sql = "SELECT * FROM agenda where agendaID ='".$decoded_id."' ";
$get_agenda = $conn->query($agenda_sql);
$row_agenda = $get_agenda->fetch_assoc();

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
              <h6 class="m-0 font-weight-bold text-primary">Edit agenda</h6>
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
                      <input type="text" id="Plenary" name="Plenary" class="form-control" value="<?php if(isset($row_agenda['Plenary'])){echo $row_agenda['Plenary']; } ?>"  >
                    </div>
                  </div> -->

                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="agenda_name">Agenda Name</label>
                    <div class="col-md-6">
                      <input type="text" id="agenda_name" name="agenda_name" class="form-control" value="<?php if(isset($row_agenda['agenda_name'])){echo $row_agenda['agenda_name']; } ?>" >
                    </div>
                  </div>

                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="agenda_name">Speaker Name</label>
                    <div class="col-md-6">
                      <input type="text" id="speaker_name" name="speaker_name" class="form-control" value="<?php if(isset($row_agenda['speaker_name'])){echo $row_agenda['speaker_name']; } ?>" >
                    </div>
                  </div>

                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="agenda_name">Speaker Name</label>
                    <div class="col-md-6">
                      <input type="text" id="speaker_name2" name="speaker_name2" class="form-control" value="<?php if(isset($row_agenda['speaker_name2'])){echo $row_agenda['speaker_name2']; } ?>" >
                    </div>
                  </div>

                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="agenda_name">Speaker Name</label>
                    <div class="col-md-6">
                      <input type="text" id="speaker_name3" name="speaker_name3" class="form-control" value="<?php if(isset($row_agenda['speaker_name3'])){echo $row_agenda['speaker_name3']; } ?>" >
                    </div>
                  </div>

                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="agenda_name">Speaker Name</label>
                    <div class="col-md-6">
                      <input type="text" id="speaker_name4" name="speaker_name4" class="form-control" value="<?php if(isset($row_agenda['speaker_name4'])){echo $row_agenda['speaker_name4']; } ?>" >
                    </div>
                  </div>

                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="schedule_date"> Schedule Date</label>
                    <div class="col-md-6">
                      <input type="text" id="schedule_date" name="schedule_date" class="form-control" value="<?php if(isset($row_agenda['schedule_date'])){echo $row_agenda['schedule_date']; } ?>">
                    </div>
                  </div>

                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="schedule_date_color"> Schedule Date Color Code</label>
                    <div class="col-md-6">
                      <input type="text" id="schedule_date_color" name="schedule_date_color" class="form-control" value="<?php if(isset($row_agenda['schedule_date_color'])){echo $row_agenda['schedule_date_color']; } ?>">
                    </div>
                  </div>

                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="schedule_start_time"> Schedule Start Time</label>
                    <div class="col-md-6">
                      <input type="text" id="schedule_start_time" name="schedule_start_time" class="form-control" value="<?php if(isset($row_agenda['schedule_start_time'])){echo $row_agenda['schedule_start_time']; } ?>">
                    </div>
                  </div>

                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="schedule_end_time"> Schedule End Time</label>
                    <div class="col-md-6">
                      <input type="text" id="schedule_end_time" name="schedule_end_time" class="form-control" value="<?php if(isset($row_agenda['schedule_end_time'])){echo $row_agenda['schedule_end_time']; } ?>">
                    </div>
                  </div>

                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="link_title">Meeting Button  title  </label>
                    <div class="col-md-6">
                      <input type="text" id="link_title" name="link_title" class="form-control" value="<?php if(isset($row_agenda['link_title'])){echo $row_agenda['link_title']; } ?>" >
                    </div>
                  </div>

                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="link_url"> Meeting Button  url </label>
                    <div class="col-md-6">
                      <input type="text" id="link_url" name="link_url" class="form-control" value="<?php if(isset($row_agenda['link_url'])){echo $row_agenda['link_url']; } ?>">
                    </div>
                  </div>

                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="link_color"> Meeting Button  Color Code </label>
                    <div class="col-md-6">
                      <input type="text" id="link_color" name="link_color" class="form-control" value="<?php if(isset($row_agenda['link_color'])){echo $row_agenda['link_color']; } ?>">
                    </div>
                  </div>    

                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="agenda_category">agenda Category 1</label>
                    <div class="col-md-6">
                      <select id="agenda_category" name="agenda_category" class="form-control">
                        <option value="">select agenda category 1</option>
<?php $sql = "SELECT * FROM agenda_cat  ";
$result = $conn->query($sql); 
while ($row = mysqli_fetch_assoc($result)) {
?>            <option value="<?php echo $row["agenda_cat_id"]; ?>" <?php if($row_agenda['agenda_category']==$row["agenda_cat_id"]){echo 'selected'; } ?> ><?php echo $row["agenda_cat_name"];?></option>

<?php } ?>                        
                        
                      </select>
                    </div>
                  </div>    

        <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="agenda_category">agenda Category 2</label>
                    <div class="col-md-6">
                      <select id="agenda_category2" name="agenda_category2" class="form-control">
                        <option value="">select agenda category 2</option>
                        <?php $sql = "SELECT * FROM agenda_cat  ";
                        $result = $conn->query($sql); 
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>            <option value="<?php echo $row["agenda_cat_id"]; ?>" <?php if($row_agenda['agenda_category_2']==$row["agenda_cat_id"]){echo 'selected'; } ?> ><?php echo $row["agenda_cat_name"];?></option>

                        <?php } ?>                        
                        
                      </select>
                    </div>
                  </div>
      
                <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="agenda_category">agenda Category 3</label>
                    <div class="col-md-6">
                      <select id="agenda_category3" name="agenda_category3" class="form-control">
                        <option value="">select agenda category 3</option>
                        <?php $sql = "SELECT * FROM agenda_cat   ";
                        $result = $conn->query($sql); 
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?><option value="<?php echo $row["agenda_cat_id"]; ?>" <?php if($row_agenda['agenda_category_3']==$row["agenda_cat_id"]){echo 'selected'; } ?> ><?php echo $row["agenda_cat_name"];?></option>

                        <?php } ?>                        
                        
                      </select>
                    </div>
                  </div>

                <div class="control-group row">
                <label class="col-md-4 col-form-label text-md-right"  for="type">Type</label>
                <div class="col-md-6">
                  <select id="type" name="type" class="form-control" required="">
                    <option value="">Type</option>
                    <option value="event" <?php if($row_agenda['type']=='event'){echo 'selected'; } ?>>Event</option>
                    <option value="break" <?php if($row_agenda['type']=='break'){echo 'selected'; } ?>>Break</option>
                    
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