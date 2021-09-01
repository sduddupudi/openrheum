<?php
include 'db_connection.php';
include 'timezone.php';
session_start();
$timeZone = new TimeZone();
$ydas = $_SESSION["offset"];
$img_gif = "/livenow.gif";

if ($_POST['action'] == 'call_agenda') {
  if (isset($_POST["agenda_category"])) {
    $agenda_category = $_POST["agenda_category"];
  }
  $cat_id = '';
  if (!empty($agenda_category)) {
    foreach ($agenda_category as $value) {
      $cat_id .= "'" . $value . "',";
    }
  }
  $cat_id_f = rtrim($cat_id, ",");

  if (!empty($agenda_category)) {
    $cat_sql = "SELECT * FROM agenda_cat where agenda_cat_id IN ($cat_id_f) ORDER BY sort ASC";
  } else {
    $cat_sql = "SELECT * FROM agenda_cat ORDER BY sort ASC";
  }


  $cat_result = $conn->query($cat_sql);
  while ($cat_row = mysqli_fetch_assoc($cat_result)) {


    $sql = "SELECT * FROM agenda where agenda_category ='" . $cat_row["agenda_cat_id"] . "'
    OR agenda_category_2 ='" . $cat_row["agenda_cat_id"] . "' OR agenda_category_3 ='" . $cat_row["agenda_cat_id"] . "' ORDER BY agenda_category, schedule_start_time ASC";

    $result = $conn->query($sql);
    $get_row3 = $conn->query($sql);

?>

<div class="col-lg-6">
    <h5 class="day_heading text-center mb-3"><?php echo $cat_row['agenda_cat_name'] ?></h5>
    <?php
      while ($new = mysqli_fetch_assoc($get_row3)) {
        if ($new["type"] == 'break') {  ?>
    <div class="break_box mb-3">
        <hr>
        <div class="break_text_box">
            <h6 class="break_time">
                <?php echo $timeZone->starttime($new["schedule_start_time"],$ydas); ?> - 
                <?php echo $timeZone->starttime($new["schedule_end_time"],$ydas); ?>
            </h6>
            <h6 class="break_title mb-0"><?php echo $new["agenda_name"]; ?></h6>
        </div>
    </div>
    <?php } else { ?>
    <div class="meeting_text_box mb-3">
        <div class="time_box" style="background-color:<?php echo $new["schedule_date_color"]; ?>">
            <div class="time">
                <span class="start_time">
                    <?php echo $timeZone->starttime($new["schedule_start_time"],$ydas); ?> - 
                    <?php echo $timeZone->starttime($new["schedule_end_time"],$ydas); ?>
                    </span>
            </div>
        </div>

    <div class="metting_title_box"
        style="border: 1px solid <?php echo $new["schedule_date_color"]; ?>">
        <div class="live_btn">
            <h6 class="metting_title mb-0">
                <?php echo $new["agenda_name"]; ?>
            </h6>

        </div>
        <div class="btn_box"> 
            <div class="row">
                <div class="col-md-2">
                 <?php if (strtotime($new["schedule_start_time"]) <= strtotime($crnt_time_new)  || strtotime($crnt_time_new) >= strtotime($new["schedule_end_time"])) {
                         echo '<img class="img_gif" src = "' . $img_gif . '">';
                            } ?>
                                
                 </div>
                <div class="col-md-10 alighn" >

                <?php if ($new["link_title"] != '') { ?>
                <!-- <a href="<?php echo $new["link_url"] ?> "
                class="btn customMeeting_btn btn-sm"
                style="
                background-color:<?php echo $new["schedule_date_color"]; ?>"><?php echo $new["link_title"]; ?></a> -->
                <a href="<?php echo $new["link_url"] ?> "
                    class="btn customMeeting_btn btn-sm" style="
                background-color:<?php echo $new["schedule_date_color"]; ?>"><?php echo $new["link_title"]; ?></a>
                <?php  } else { ?>
                <?php if ($new["link_url"] != '') { ?>
                <a href="#" class="btn customMeeting_btn btn-sm js-modal-btn"
                    data-video-id="<?php echo $new["link_url"] ?>" style="
                background-color:<?php echo $new["schedule_date_color"]; ?>">Watch Teaser</a>
                <?php } ?>
                <a href="<?php echo $new["link_url"] ?>"
                    class="btn customMeeting_btn btn-sm" style="
                background-color:<?php echo $new["schedule_date_color"]; ?>">Go To Meeting</a>

                <?php } ?>

</div>
            </div>
        </div>
    </div>



        

        </div>

    <?php }
      } ?>

</div>


<?php  }
} ?>

<script type="text/javascript">
$(".js-modal-btn").modalVideo({
channel: 'vimeo'
});
</script>