<?php
include 'timezone.php';
$cid = $_SESSION["userID"];
$ydas = $_SESSION["offset"];
$time_zone_new = $_SESSION["time_zone"];
$timeZone = new TimeZone();

$crnt_time = new DateTime("now", new DateTimeZone($time_zone_new));
// $crnt_time_new = $crnt_time->format('Y-m-d H:i');
$crnt_time_new = $crnt_time->format('H:i');

?>
<?php
$img_gif = "/livenow.gif";
$site_sql = "SELECT site_logo FROM lobby";
$get_site_logo = $conn->query($site_sql);
$row_site_logo = $get_site_logo->fetch_assoc();

$setting_menu_sql = "SELECT * FROM settings";
$get_menu_setting = $conn->query($setting_menu_sql);
$row_menu_setting = $get_menu_setting->fetch_assoc();
?>


<style>
.img_gif {
max-width: 6vh;
}

.agenda_list_grid>h3,
p {
padding-bottom: 0px !important;

}

.slick-list {
overflow-y: auto !important;
height: 474px;
}

.slick-track {

margin-left: unset !important;
}


.speaker_slider.slick-list.draggable {

overflow-y: hidden !important;
}

.speaker_prof_bio h4 {
font-size: 13px
}

#resources .resources_slider {
overflow-y: auto;
height: 400px;
}

#meeting-replay .slick-track {
width: 1224px !important;
}

#meeting-replay .slick-slide {
width: 306px !important;
}
</style>
<style>
.col-md-10.alighn {
direction: rtl;
}

.pagination {
/* display: inline-block; */
/* bottom: 0; */
/*top: 90vh;*/
/*position: fixed;*/
}

.pagination a {
/*font-weight:bold;   */
font-size: 18px;
color: #000;
float: left;
padding: 8px 16px;
text-decoration: none;
border: 1px solid #006CDD;
}

.pagination a.active {
background-color: #006CDD;
}

.pagination a:hover:not(.active) {
background-color: skyblue;
}

.speaker_inner.col-lg-4.col-md-4 {
display: inline-block;
}

.modal-content {
/*border-radius: 2.3rem;*/
}

.modal-content {
background-color: #EFEFEF;
}

.modal-dialog {
max-width: 700px;
}

.prof_download_link,
.prof_watch_link {
margin-top: unset !important;
}
</style>


<style>
section.agenda_section {
height: calc(70vh - 10px);
overflow-y: scroll;
overflow-x: hidden;
margin-top: 24px;
text-transform: capitalize;
scrollbar-width: thin !important;
}

div.meeting_text_box {
background-color: #9E249C;
margin-right: 17px;
}

div.meeting_text_box div.time_box {
/* background-color: #9E249C; */
min-height: 30px;
padding: 10px 15px;
position: relative;
}

div.meeting_text_box div.time_box div.time {
position: absolute;
top: 49%;
left: 50%;
-webkit-transform: translate(-50%, -51%);
-moz-transform: translate(-50%, -51%);
-ms-transform: translate(-50%, -51%);
-o-transform: translate(-50%, -51%);
transform: translate(-50%, -51%);
}

div.meeting_text_box div.time_box div.time span {
color: #ffffff;
font-size: 14px;
text-align: center;
line-height: 15px;
}

div.meeting_text_box div.time_box div.time span.dash {
margin-top: -3px;
}

div.meeting_text_box div.metting_title_box {
background-color: #ffffff;
/* border: 1px solid #9E249C; */
width: 100%;
min-height: 66px;
padding: 8px 16px;
}

div.meeting_text_box div.metting_title_box h6.metting_title {
overflow: hidden;
white-space: nowrap;
text-overflow: ellipsis;
width: 270px;
}

div.meeting_text_box div.metting_title_box div.btn_box {
/* display: flex;
justify-content: flex-end;
align-items: center; */
}

div.meeting_text_box div.metting_title_box div.btn_box {
margin-top: 8px;
}

div.meeting_text_box div.metting_title_box div.btn_box a.customMeeting_btn {
/* background-color: #9E249C; */
border: 1px solid #9E249C;
color: #ffffff;
font-size: 11px;
text-transform: uppercase;
padding: 1px 8px;
-webkit-transition: all .2s ease-in-out;
-moz-transition: all .2s ease-in-out;
-ms-transition: all .2s ease-in-out;
-o-transition: all .2s ease-in-out;
transition: all .2s ease-in-out;
}

div.meeting_text_box div.metting_title_box div.btn_box a.customMeeting_btn:hover {
background-color: #ffffff;
border: 1px solid #9E249C;
color: black;
-webkit-transition: all .2s ease-in-out;
-moz-transition: all .2s ease-in-out;
-ms-transition: all .2s ease-in-out;
-o-transition: all .2s ease-in-out;
transition: all .2s ease-in-out;
}

div.meeting_text_box div.metting_title_box div.btn_box a.customMeeting_btn:nth-child(2) {
margin-left: 8px;
}

div.break_box {
height: 62px;
position: relative;
}

div.break_box hr {
border-color: #9E249C;
width: 100%;
position: absolute;
top: 50%;
left: 0;
-webkit-transform: translate(0, -50%);
-moz-transform: translate(0, -50%);
-ms-transform: translate(0, -50%);
-o-transform: translate(0, -50%);
transform: translate(0, -50%);
margin: 0;
}

div.break_box div.break_text_box {
background-color: #ffffff;
position: absolute;
top: 0;
left: 50%;
-webkit-transform: translate(-50%, 0);
-moz-transform: translate(-50%, 0);
-ms-transform: translate(-50%, 0);
-o-transform: translate(-50%, 0);
transform: translate(-50%, 0);
padding: 8px 16px;
}

div.break_box div.break_text_box h6.break_time,
div.break_box div.break_text_box h6.break_title {
color: #9E249C;
text-align: center;
}

div.break_box div.break_text_box h6.break_title {
overflow: hidden;
white-space: nowrap;
text-overflow: ellipsis;
width: 200px;
}

div.filter_box {
height: 374px;
}

@media screen and (min-width: 767px) {
div.meeting_text_box {
display: flex;
justify-content: center;
align-items: center;
}

div.meeting_text_box div.time_box {
min-width: 65px;
min-height: 66px;
}

div.meeting_text_box div.time_box div.time {
display: flex;
flex-direction: column;
justify-content: space-between;
}
}


@media screen and (max-width: 767px) {
div.filter_agenda {
margin-bottom: 16px !important;
}

div.filter_box {
height: auto !important;
}

div.popup_content {
padding-right: 70px !important;
}
}
</style>


<!-- notification popup -->
<div class="toast" role="alert" aria-live="assertive" aria-atomic="true"
style="position: absolute;right: 10px; bottom: 10px;">
<div class="toast-header">
<strong class="mr-auto">Notification</strong>
<small class="text-muted"> </small>
</div>
<div class="toast-body">
Hello, You are redirecting in one minute.
</div>
</div>
<!-- end notification popup -->



<!-- Start popup -->
<div class="custom_popup">
<div class="custom_popup_inner">
<div class="popup_header d-flex justify-content-between align-items-center">
<div class="popup_logo">
<a href="<?php echo $siteURL; ?>"><img src="<?php echo $row_lobby['site_logo']; ?>"></a>
</div>
<div class="popup_close">
<img src="assets/images/close.png">
</div>
</div>
<div class="popup_body">
<div class="popup_tabs_bar d-flex justify-content-between align-items-center">
<ul class="d-flex p_tab_ul">
<li>
<a href="https://digispace.site/" class="d-block d-md-none w-100 h-100">
    <img src="<?php echo $row_lobby['site_logo']; ?>" class="img-fluid mb-0"
        style="width: 100px; height: 100px; max-height: 100px; margin-left: 41px;">
</a>
<div class="popup_close d-none ml-auto mr-3">
    <img src="assets/images/close.png">
</div>
</li>
<?php if ($row_menu_setting['plan_menu'] == 'yes') { ?>
<li class="active_tab view_map_li d-none d-md-block">
<a href="javascript:void(0)" data-id="view-map">
    <?php if ($row_menu_setting['plan_menu_mobile_appears'] == 'yes') { ?>
    <img class="mob_icon_img d-none" src="assets/images/icone-map.png">
    <img class="mob_icon_active_img d-none" src="assets/images/icone-map.png">
    <?php } ?>
    <span class="mob_txt_hide"><?php if (isset($row_menu_setting['plan_menu_text'])) {
echo $row_menu_setting['plan_menu_text'];
} ?>
    </span>

</a>
</li>
<?php }
if ($row_menu_setting['program_menu'] == 'yes') { ?>
<li class="view_agenda_li d-none d-md-block">
<a href="javascript:void(0)" data-id="view-agenda">
    <?php if ($row_menu_setting['program_menu_mobile_appears'] == 'yes') { ?>
    <img class="mob_icon_img d-none" src="assets/images/agenda_icon.png">
    <img class="mob_icon_active_img d-none" src="assets/images/agenda_icon_active.png">
    <?php } ?>
    <span class="mob_txt_hide"><?php if (isset($row_menu_setting['program_menu_text'])) {
echo $row_menu_setting['program_menu_text'];
} ?>
    </span>
</a>
</li>
<?php } ?>
</ul>



<!-- ================================================== -->
<!-- ================= NEW CODE START ================= -->
<!-- ================================================== -->
<div class="mobile_view_sidemenu w-100 d-block d-md-none">
<img src="admin/uploads/image/Demo.jpg" class="img-fluid w-100 mb-3 px-3"
style="margin-top: -25px;">
<div class="row mx-0">
<div class="col-6">
    <a href="agenda.php" class="d-block text-center py-4 px-3 mb-3">
        <i class="fa fa-calendar" aria-hidden="true"></i>
        <span class="d-block mt-2">Agenda</span>
    </a>
</div>
<div class="col-6">

</div>
<div class="col-6">
    <button type="button" class="btn btn-primary">
        Notifications <span class="badge badge-light">4</span>
    </button>
</div>

<div class="col-6">
    <a href="#" class="d-block text-center py-4 px-3 mb-3">
        <i class="fa fa-rocket" aria-hidden="true"></i>
        <span class="d-block mt-2">Form Evaluation (0)</span>
    </a>
</div>
<div class="col-6">
    <a href="resources.php" class="d-block text-center py-4 px-3 mb-3">
        <i class="fa fa-rocket" aria-hidden="true"></i>
        <span class="d-block mt-2">Resources</span>
    </a>
</div>
<div class="col-6">
    <a href="map.php" class="d-block text-center py-4 px-3 mb-3">
        <i class="fa fa-map-o" aria-hidden="true"></i>
        <span class="d-block mt-2">Map</span>
    </a>
</div>
</div>
</div>
<!-- ================================================== -->
<!-- ================= NEW CODE END =================== -->
<!-- ================================================== -->


<ul class="d-flex p_link_ul">

<!-- web Form Evaluation  -->

<li class="d-none d-md-block">
<a href="javascript:void(0)" data-id="Form_Evaluation">
    <span class="mob_txt_hide">Form Evaluation(0)</span>
</a>
</li>

<!-- End web form evaluation -->

<?php if ($row_menu_setting['speaker_menu'] == 'yes') { ?>
<li class="d-none d-md-block">
<a href="javascript:void(0)" data-id="speakers">
    <?php if ($row_menu_setting['speaker_menu_mobile_appears'] == 'yes') { ?>
    <img class="mob_icon_img d-none" src="assets/images/speakers_icon.png">
    <img class="mob_icon_active_img d-none" src="assets/images/speakers_icon_active.png">
    <?php } ?>
    <span class="mob_txt_hide"><?php if (isset($row_menu_setting['speaker_menu_text'])) {
echo $row_menu_setting['speaker_menu_text'];
} ?>
    </span>

</a>
</li>
<?php }
if ($row_menu_setting['resource_menu'] == 'yes') { ?>
<li class="d-none d-md-block">
<!-- <a href="pdf.php"> -->
<a href="javascript:void(0)" data-id="resources">
    <?php if ($row_menu_setting['resource_menu_mobile_appears'] == 'yes') { ?>
    <img class="mob_icon_img d-none" src="assets/images/ressources_icon.png">
    <img class="mob_icon_active_img d-none" src="assets/images/ressources_icon_active.png">
    <?php } ?>
    <span class="mob_txt_hide"><?php if (isset($row_menu_setting['resource_menu_text'])) {
echo $row_menu_setting['resource_menu_text'];
} ?>
    </span>
</a>
</li>

<?php }
if ($row_menu_setting['meeting_reply_menu'] == 'yes') { ?>

<?php } ?>
<li class="logout_tab">
<!-- <a href="index.html" >
<img class="mob_icon_img d-none" src="assets/images/logout_icon.png">
Log out
</a> -->
<form action="" method="POST">
    <button type="submit" name="logout_btn" id="logout_btn" class="">
        <img class="mob_icon_img d-none" src="assets/images/logout_icon.png">
        Logout </button>
</form>
</li>

</ul>
</div>
<div class="popup_content">
<?php if ($row_menu_setting['plan_menu'] == 'yes') { ?>
<div class="view_map" id="view-map">
<div class="row">
<div class="col-md-3">
    <div class="view_map_grid">
        <a href="<?php echo $siteURL; ?>lobby.php">
            <img src="assets/images/menu_lobby.jpg">
            <p>Lobby</p>
        </a>
    </div>
</div>
<?php //if($_SESSION['userType']=='customer' || $_SESSION['userType']=='subscriber') { 
?>
<div class="col-md-3">
    <div class="view_map_grid">
        <a href="<?php echo $siteURL; ?>pleniere">
            <img src="assets/images/menu_planery.jpg">
            <p>Plenary</p>
        </a>
    </div>
</div>
<div class="col-md-3">
    <div class="view_map_grid">
        <a href="<?php echo $siteURL; ?>corridor1">
            <img src="assets/images/Coridor_1.png">
            <p>Workshop rooms</p>
        </a>
    </div>
</div>
<div class="col-md-3">
    <div class="view_map_grid">
        <a href="<?php echo $siteURL; ?>meet-the-experts">
            <img src="assets/images/cb.png">
            <p>Meet the experts</p>
        </a>
    </div>
</div>
<?php //} 
?>
<?php if ($_SESSION['userType'] != 'customer' && $_SESSION['userType'] != 'subscriber') { ?>

<?php } ?>

</div>
</div>
<?php } ?>


<div id="Form_Evaluation" class="view_speakers hide_div">
<div class="row">
<h5>Form Evaluation Notification</h5>

<p> <a href="https://staging.openrheum.com/review/review-form.php" data-lity
        data-lity-target="https://staging.openrheum.com/review/review-form.php">
        <p>Form Evaluation</p>
    </a>
</p>

</div>
</div>


<div id="view-agenda" class="view_agenda">
<div class="row">
<div class="col-lg-2 col-md-2">
    <div class="filter_agenda">
        <h2>Select Date</h2>
        <div class="filter_box">
            <?php $cat_sql = "SELECT * FROM agenda_cat ORDER BY sort ASC";
$cat_result = $conn->query($cat_sql);
while ($cat_row = mysqli_fetch_assoc($cat_result)) {
?>



            <div class="form-check mb-3">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input"
                        id="agenda_cat_<?php echo $cat_row["agenda_cat_id"]; ?>"
                        name="agenda_cat[]" value="<?php echo $cat_row["agenda_cat_id"]; ?>"
                        onclick="getAgenda('<?php echo $cat_row["agenda_cat_id"]; ?>');">
                    <span class="small"> <?php echo $cat_row["agenda_cat_name"]; ?></span>
                </label>
            </div>
            <?php } ?>

        </div>

    </div>
</div>

<div class="col-lg-9 col-md-10">

    <!-- ================================================== -->
    <!-- ================= NEW CODE START ================= -->
    <!-- ================================================== -->

    <!-- ================================================== -->
    <!-- ================= NEW CODE START ================= -->
    <!-- ================================================== -->

    <section class="agenda_section">
        <div class="schedule_box">
            <div class="row" id="agendaList">
                <?php

$cat_sql = "SELECT * FROM agenda_cat ORDER BY sort ASC";
$cat_result = $conn->query($cat_sql);
while ($cat_row = mysqli_fetch_assoc($cat_result)) {

$sql = "SELECT * FROM agenda where agenda_category ='" . $cat_row["agenda_cat_id"] . "'
OR agenda_category_2 ='" . $cat_row["agenda_cat_id"] . "' OR agenda_category_3 ='" . $cat_row["agenda_cat_id"] . "' ORDER BY agenda_category, schedule_start_time ASC";


// echo $sql;
$result = $conn->query($sql);
$get_row3 = $conn->query($sql);
?>


                <div class="col-lg-6">
                    <h5 class="day_heading text-center mb-3">
                        <?php echo $cat_row['agenda_cat_name'] ?></h5>
                    <?php
while ($new = mysqli_fetch_assoc($get_row3)) {
if($new["type"] == 'break') {  ?>
                    <div class="break_box mb-3">
                        <hr>
                        <div class="break_text_box">
                            <h6 class="break_time">
                                <?php echo $timeZone->starttime($new["schedule_start_time"], $ydas); ?>
                                -
                                <?php echo $timeZone->starttime($new["schedule_end_time"], $ydas); ?>
                            </h6>
                            <h6 class="break_title mb-0"><?php echo $new["agenda_name"]; ?>
                            </h6>
                        </div>
                    </div>
                    <?php } else { ?>
                    <div class="meeting_text_box mb-3">
                        <div class="time_box"
                            style="background-color:<?php echo $new["schedule_date_color"]; ?>">
                            <div class="time">
                                <span class="start_time">
                                    <?php echo $timeZone->starttime($new["schedule_start_time"], $ydas); ?>
                                    -
                                    <?php echo $timeZone->starttime($new["schedule_end_time"], $ydas); ?>

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
                                         } 
                                        ?>
                                    </div>
                                    <div class="col-md-10 alighn">

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
                                        <a href="#"
                                            class="btn customMeeting_btn btn-sm js-modal-btn"
                                            data-video-id="<?php echo $new["link_url"] ?>"
                                            style="
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


                <?php } ?>
            </div>
        </div>
    </section>

    <!-- ================================================== -->
    <!-- ================= NEW CODE END =================== -->
    <!-- ================================================== -->


    <?php /*
<section class="agenda_section">
<div class="row">
<div class="col-lg-6">
<div class="schedule_box" id="agendaList">
<!-- <h5 class="day_heading text-center mb-3">Sunday 26<sup>th</sup> November</h5> -->
<?php 

$sql = "SELECT * FROM agenda ORDER BY agenda_category, schedule_start_time ASC ";
// $sql = "SELECT * FROM agenda ORDER BY schedule_date ASC , schedule_start_time ASC";

$result = $conn->query($sql); 

$num_rows_agenda =  mysqli_num_rows($result);
$a_i = 1;
$x = 0;
while ($row = mysqli_fetch_assoc($result)) {
$x++;
$agenda_cat_sql = "SELECT * FROM agenda_cat where agenda_cat_id ='".$row["agenda_category"]."' ";
$get_agenda_cat = $conn->query($agenda_cat_sql);
$row_agenda_cat = $get_agenda_cat->fetch_assoc();

$agenda_cat_sql2 = "SELECT * FROM agenda_cat where agenda_cat_id ='".$row["agenda_category_2"]."' ";
$get_agenda_cat2 = $conn->query($agenda_cat_sql2);
$row_agenda_cat2 = $get_agenda_cat2->fetch_assoc();

$agenda_cat_sql3 = "SELECT * FROM agenda_cat where agenda_cat_id ='".$row["agenda_category_3"]."' ";
$get_agenda_cat3 = $conn->query($agenda_cat_sql3);
$row_agenda_cat3 = $get_agenda_cat3->fetch_assoc();                                  

?>
    <?php if($x==1) {?>
    <h5 class="day_heading text-center mb-3">
        <?php echo $row_agenda_cat["agenda_cat_name"];?></h5>
    <?php }  ?>

    <?php
if($row["type"]=='break'){ ?>

    <div class="break_box mb-3">
        <hr>
        <div class="break_text_box">
            <h6 class="break_time"><?php echo $row["schedule_start_time"];?> -
                <?php echo $row["schedule_end_time"];?></h6>
            <h6 class="break_title mb-0"><?php echo $row["agenda_name"];?></h6>
        </div>
    </div>



    <?php }else{ ?>



    <div class="meeting_text_box mb-3">
        <div class="time_box">
            <div class="time">
                <span class="start_time"><?php echo $row["schedule_start_time"];?> -
                    <?php echo $row["schedule_end_time"];?></span>
            </div>
        </div>
        <div class="metting_title_box">
            <h6 class="metting_title mb-0"><?php echo $row["agenda_name"];?></h6>
            <div class="btn_box">
                <a href="<?php echo $siteURL; ?>" class="btn customMeeting_btn btn-sm">Go To
                    Meeting</a>
                <a href="#"
                    class="btn customMeeting_btn btn-sm"><?php echo $row_agenda_cat["agenda_cat_name"];?></a>
            </div>
        </div>
    </div>

    <?php } } ?>
</div>
</div>
</div>
</section> */ ?>
<!-- ================================================== -->
<!-- ================= NEW CODE END =================== -->
<!-- ================================================== -->
</div>
</div>
</div>

<div id="speakers" class="view_speakers hide_div">
<div class="row">
<div class="col-lg-12 col-md-12">
<div class="speaker_slider_12 row" id="speaker_append">
<!-- <div class="speaker_inner"> -->
<?php
// $sql_speakers = "SELECT * FROM speakers where  del=0";
$per_page_record = 9;  // Number of entries to show in a page.   
// Look for a GET variable page if not found default is 1.        
if (isset($_GET["page"])) {
$page  = $_GET["page"];
} else {
$page = 1;
}

$start_from = ($page - 1) * $per_page_record;


$query = "SELECT COUNT(*) FROM speakers";
$rs_result = mysqli_query($conn, $query);
$row = mysqli_fetch_row($rs_result);
$total_records = $row[0];

// Number of pages required.   
$total_pages = ceil($total_records / $per_page_record);
$pagLink = "";

?>

<nav aria-label="Page navigation example" style="width: 100%">
<!-- pagination sm -->
<ul class="pagination pagination-sm" style="float: right;">
    <!-- pagination sm -->
    <li class="page-item">
        <?php if ($page >= 2) { ?>
        <a class="page-link" href="javascript:void(0)"
            onclick="getSpeakerPagination(<?php echo $page - 1; ?>);" aria-label="Previous">
            <span>&lsaquo;&lsaquo;</span>
            <span class="sr-only">Previous</span>
        </a>
        <?php } else { ?>
        <a class="page-link" href="javascript:void(0)" aria-label="Previous">
            <span>&lsaquo;&lsaquo;</span>
            <span class="sr-only">Previous</span>
        </a>
        <?php } ?>
    </li>


    <?php for ($i = 1; $i <= $total_pages; $i++) {
if ($i == $page) {
$pagLink .= "<li class='page-item active'><a class = 'page-link' href='javascript:void(0)'>" . $i . " </a></li>";
} else {
$pagLink .= "<li class='page-item'><a class = 'page-link' href='javascript:void(0)'  onclick='getSpeakerPagination(" . $i . ");' >  " . $i . " </a></li>";
}
};
echo $pagLink; ?>

    <li class="page-item">
        <?php if ($page < $total_pages) { ?>
        <a class="page-link" href="javascript:void(0)"
            onclick="getSpeakerPagination(<?php echo $page + 1; ?>);" aria-label="Next">
            <span>&rsaquo;&rsaquo;</span>
            <span class="sr-only">Next</span>
        </a>
        <?php } else { ?>
        <a class="page-link" href="javascript:void(0)" aria-label="Next">
            <span>&rsaquo;&rsaquo;</span>
            <span class="sr-only">Next</span>
        </a>
        <?php } ?>
    </li>

</ul>
</nav>

<?php
$sql_speakers = "SELECT * FROM speakers where  del=0  
ORDER BY `speakers`.`customer_id` ASC LIMIT $start_from, $per_page_record";

$result_speakers = $conn->query($sql_speakers);

$num_rows_speakes =  mysqli_num_rows($result_speakers);
$s_i = 1;

while ($row_speaker = mysqli_fetch_assoc($result_speakers)) {


/*if($s_i == 1 || $s_i == $s_j){
echo '<div class="speaker_inner col-lg-4 col-md-4">';
}*/
if ($row_speaker["description"] != '') {
$des = $row_speaker["description"];
} else {
$des = 'Description not found yet..';
}

?>

<div class="speakers_col d-flex col-lg-4 col-md-4">
<div class="speaker_prof_img">
    <p style="cursor: pointer;" href="#" class="" data-toggle="modal" data-target="#myModal"
        data-images='<?php echo "admin/uploads/speaker/" . $row_speaker["profile"] ?>'
        data-description="<?php echo $des; ?>">
        <?php if ($row_speaker["profile"] != '') { ?>
        <img src="admin/uploads/speaker/<?php echo $row_speaker["profile"]; ?>" />
        <?php } else { ?>
        <img src="admin/uploads/speaker/demo.jpg" />

        <?php } ?>

    </p>

    <!-- <img src="admin/uploads/speaker/<?php echo $row_speaker["profile"]; ?>"> -->
</div>
<div class="speaker_prof_bio">
    <h4 style="cursor: pointer;" href="#" class="" data-toggle="modal" data-target="#myModal"
        data-images='<?php echo "admin/uploads/speaker/" . $row_speaker["profile"] ?>'
        data-description="description coming here">
        <?php echo $row_speaker["speaker_name"]; ?></h4>
    <!-- <h4><?php echo $row_speaker["speaker_name"]; ?> <strong><?php echo $row_speaker["speaker_name2"]; ?></strong></h4> -->
    <p><?php echo $row_speaker["designation"]; ?></p>

</div>
</div>
<?php

$s_i++;
} ?>

</div>
</div>
</div>
</div>




<div id="resources" class="view_resources hide_div">
<div class="row">
<div class="col-lg-12 col-md-12 ">
<div class="resources_slider_12 row" id="resources_append">
<!-- <div class="speaker_inner">  -->
<?php
$per_page_record_r = 9;  // Number of entries to show in a page.   
// Look for a GET variable page if not found default is 1.        
if (isset($_GET["page_r"])) {
$page_r  = $_GET["page_r"];
} else {
$page_r = 1;
}

$start_from_r = ($page_r - 1) * $per_page_record_r;
?>
<?php
$query_r = "SELECT COUNT(*) FROM resource where  del=0";
$rs_result_r = mysqli_query($conn, $query_r);
$row_r = mysqli_fetch_row($rs_result_r);
$total_records_r = $row_r[0];
// Number of pages required.   
$total_pages_r = ceil($total_records_r / $per_page_record_r);
$pagLink_r = "";

?>

<nav aria-label="Page navigation example" style="width: 100%">
<ul class="pagination pagination-sm" style="float: right;">
    <li class="page-item">
        <?php if ($page_r >= 2) { ?>
        <a class="page-link" href="javascript:void(0)"
            onclick="getResourcePagination(<?php echo $page_r - 1; ?>);" aria-label="Previous">
            <span>&lsaquo;&lsaquo;</span>
            <span class="sr-only">Previous</span>
        </a>
        <?php } else { ?>
        <a class="page-link" href="javascript:void(0)" aria-label="Previous">
            <span>&lsaquo;&lsaquo;</span>
            <span class="sr-only">Previous</span>
        </a>
        <?php } ?>
    </li>


    <?php for ($i = 1; $i <= $total_pages_r; $i++) {
if ($i == $page_r) {
$pagLink_r .= "<li class='page-item active'><a class = 'page-link' href='javascript:void(0)'>" . $i . " </a></li>";
} else {
$pagLink_r .= "<li class='page-item'><a class = 'page-link' href='javascript:void(0)'  onclick='getResourcePagination(" . $i . ");' >  " . $i . " </a></li>";
}
};
echo $pagLink_r; ?>

    <li class="page-item">
        <?php if ($page_r < $total_pages_r) { ?>
        <a class="page-link" href="javascript:void(0)"
            onclick="getResourcePagination(<?php echo $page_r + 1; ?>);" aria-label="Next">
            <span>&rsaquo;&rsaquo;</span>
            <span class="sr-only">Next</span>
        </a>
        <?php } else { ?>
        <a class="page-link" href="javascript:void(0)" aria-label="Next">
            <span>&rsaquo;&rsaquo;</span>
            <span class="sr-only">Next</span>
        </a>
        <?php } ?>
    </li>

</ul>
</nav>




<?php
$sql_resources = "SELECT * FROM resource where del=0 LIMIT $start_from_r, $per_page_record_r";
$result_resources = $conn->query($sql_resources);

$num_rows_resources =  mysqli_num_rows($result_resources);
$r_i = 1;

while ($row_resources = mysqli_fetch_assoc($result_resources)) {

/*if($r_i == 1 || $r_i == $r_j){
echo '<div class="speaker_inner col-lg-4 col-md-4">';
}*/

?>
<div class="speakers_col d-flex col-lg-4 col-md-4">
<div class="speaker_prof_img">
    <img src="admin/uploads/resource/<?php echo $row_resources["resource_picture"]; ?>">
</div>
<div class="speaker_prof_bio">
    <h4><?php echo $row_resources["resource_name"]; ?></h4>
    <a href="admin/uploads/resource/<?php echo $row_resources["resource_pdf"]; ?> "
        target="_blank" class="prof_download_link">Regardez</a>
</div>
</div>


<?php
} ?>


</div>
</div>
</div>
</div>

<div id="meeting-replay" class="view_meeting_replay hide_div">
<div class="row">
<div class="col-lg-12 col-md-12 ">
<div class="meeting_slider_12 row" id="meeting_append">
<?php
$per_page_record_m = 9;  // Number of entries to show in a page.   
// Look for a GET variable page if not found default is 1.        
if (isset($_GET["page_m"])) {
$page_m  = $_GET["page_m"];
} else {
$page_m = 1;
}

$start_from_m = ($page_m - 1) * $per_page_record_m;


$query_m = "SELECT COUNT(*) FROM meeting where  del=0";
$rs_result_m = mysqli_query($conn, $query_m);
$row_m = mysqli_fetch_row($rs_result_m);
$total_records_m = $row_m[0];

// Number of pages required.   
$total_pages_m = ceil($total_records_m / $per_page_record_m);
$pagLink_m = "";

?>

<nav aria-label="Page navigation example" style="width: 100%">
<ul class="pagination pagination-sm" style="float: right;">
    <li class="page-item">
        <?php if ($page_m >= 2) { ?>
        <a class="page-link" href="javascript:void(0)"
            onclick="getMeetingPagination(<?php echo $page_m - 1; ?>);" aria-label="Previous">
            <span>&lsaquo;&lsaquo;</span>
            <span class="sr-only">Previous</span>
        </a>
        <?php } else { ?>
        <a class="page-link" href="javascript:void(0)" aria-label="Previous">
            <span>&lsaquo;&lsaquo;</span>
            <span class="sr-only">Previous</span>
        </a>
        <?php } ?>
    </li>


    <?php for ($i = 1; $i <= $total_pages_m; $i++) {
if ($i == $page_m) {
$pagLink_m .= "<li class='page-item active'><a class = 'page-link' href='javascript:void(0)'>" . $i . " </a></li>";
} else {
$pagLink_m .= "<li class='page-item'><a class = 'page-link' href='javascript:void(0)'  onclick='getMeetingPagination(" . $i . ");' >  " . $i . " </a></li>";
}
};
echo $pagLink_m; ?>

    <li class="page-item">
        <?php if ($page_m < $total_pages_m) { ?>
        <a class="page-link" href="javascript:void(0)"
            onclick="getMeetingPagination(<?php echo $page_m + 1; ?>);" aria-label="Next">
            <span>&rsaquo;&rsaquo;</span>
            <span class="sr-only">Next</span>
        </a>
        <?php } else { ?>
        <a class="page-link" href="javascript:void(0)" aria-label="Next">
            <span>&rsaquo;&rsaquo;</span>
            <span class="sr-only">Next</span>
        </a>
        <?php } ?>
    </li>

</ul>
</nav>

<?php
$sql_meeting = "SELECT * FROM meeting where  del=0 LIMIT $start_from_m, $per_page_record_m";
$result_meeting = $conn->query($sql_meeting);

$num_rows_meeting =  mysqli_num_rows($result_meeting);
$m_i = 1;

while ($row_meeting = mysqli_fetch_assoc($result_meeting)) {

/*if($m_i == 1 || $m_i == $m_j){
echo '<div class="speaker_inner col-lg-4 col-md-4">';
}*/
?>
<div class="speakers_col d-flex col-lg-4 col-md-4">
<div class="speaker_prof_img">
    <img src="admin/uploads/meeting/<?php echo $row_meeting["meeting_picture"]; ?>">
</div>
<div class="speaker_prof_bio">
    <h4><?php echo $row_meeting["meeting_name"]; ?></h4>
    <p><?php echo $row_meeting["date"]; ?></p>
    <a target="_blank" href="<?php echo $row_meeting["watch_link"]; ?>"
        class="prof_watch_link">Watch</a>
</div>
</div>
<?php


} ?>

</div>
</div>
</div>
</div>


</div>
</div>
</div>
</div>
<!-- End popup -->
<div class="modal" id="myModal">
<div class="modal-dialog modal-dialog-scrollable">
<div class="modal-content">

<!-- Modal Header -->
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">×</button>
</div>

<!-- Modal body -->
<div class="modal-body">
<!-- <p style="text-align: center;"><img src="Picture1.png" alt="" width="188" height="188"></p><br> -->
<div class="row">
<div class="col-lg-4 col-md-3">
<div class="modalbioimage">
    <p style="text-align: center;" id="image-desc"></p>
</div>

</div>
<div class="col-lg-8 col-md-9">
<p id="speaker-desc"></p>

</div>
</div>

</div>

<!-- Modal footer -->
<div class="modal-footer">
<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>

</div>
</div>
</div>

<script src="https://code.jquery.com/jquery-2.2.4.min.js"
integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="assets/js/jquery-modal-video.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="https://unpkg.com/@popperjs/core@2"></script>
<script src="https://unpkg.com/tippy.js@6"></script>
<script src="assets/js/Rpr5Znc6Zob8.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://chatwee-api.com/v2/script/60f96c3ea471a961bf76e172.js"></script>
0<script type="text/javascript">
$(".js-modal-btn").modalVideo({
channel: 'vimeo'
});
$(document).ready(function() {
$(".sidebar-map-main a").click(function() {
$(".popup_tabs_bar > ul > li.view_map_li > a").click();
$(".custom_popup").addClass("custom_popup_open");
});

$(".sidebar-toggle-main a").click(function() {
$(".popup_tabs_bar > ul > li.view_agenda_li > a").click();
$(".custom_popup").addClass("custom_popup_open");
$('.agenda_slider').not('.slick-initialized').slick({
dots: false,
infinite: false,
speed: 300,
slidesToShow: 2,
slidesToScroll: 1,
responsive: [{
breakpoint: 767,
settings: {
slidesToShow: 1,
slidesToScroll: 1,
rows: 3
}
},

]
});

});

$(".go-ressources-btn a").click(function() {
$(".p_link_ul >   li:nth-child(2) > a").click();
$(".custom_popup").addClass("custom_popup_open");
});

$(".agenda_btn a").click(function() {
$(".view_agenda_li > a:nth-child(1)").click();
$(".custom_popup").addClass("custom_popup_open");
});
$(".fbios_btn a").click(function() {
$("li.d-none:nth-child(1) > a:nth-child(1)").click();
$(".custom_popup").addClass("custom_popup_open");
});

$(".popup_close").click(function() {
$(".custom_popup").removeClass("custom_popup_open");
});
$(".popup_tabs_bar > ul > li > a").on("click", function() {
$(".popup_tabs_bar > ul > li").removeClass("active_tab");
$(this).parent().addClass("active_tab");
// console.log("click here to popup_tabs_bar");
var getDataId = $(this).attr("data-id");
// console.log("Get Data ID ", getDataId);
$(".popup_content > div").hide();
$("#" + getDataId).show();
setTimeout(function() {
// alert();
$('.agenda_slider').not('.slick-initialized').slick({
dots: false,
infinite: false,
speed: 300,
slidesToShow: 2,
slidesToScroll: 1,
responsive: [{
breakpoint: 767,
settings: {
slidesToShow: 1,
slidesToScroll: 1,
rows: 3
}
}, ]
});
}, 2000);
});
})
</script>
<script type="text/javascript">
function remv() {
alert("Page is loaded");
document.getElementById('slick-list').style.overflowY = "hidden;"
}

function catCheck(agenda_category) {
var val = [];
$(':checkbox:checked').each(function(i) {
val[i] = $(this).val();
});
alert(val);
}

function getAgenda(agenda_category) {
$('.agenda_slider').slick('unslick');
var val = [];
$(':checkbox:checked').each(function(i) {
val[i] = $(this).val();
});
// console.log(val);
$.ajax({
type: "POST",
url: '<?php echo $siteURL; ?>/ajaxnew.php',
data: {
action: 'call_agenda',
agenda_category: val
},
success: function(data) {
$('#agendaList').html('');
$('#agendaList').html(data);

$('.agenda_slider').slick({
dots: false,
infinite: false,
speed: 300,
slidesToShow: 2,
slidesToScroll: 1,
responsive: [{
breakpoint: 767,
settings: {
    slidesToShow: 1,
    slidesToScroll: 1,
    rows: 3
}
},

]
});

}
});
}

function slickreset() {
setTimeout(function() {}, 1000);
}
$('#myModal').on('show.bs.modal', function(event) {
// debugger;
var button = $(event.relatedTarget) // Button that triggered the modal
var recipient = button.data('description') // Extract info from data-* attributes
var recipient2 = button.data('images')
// If necessary, we could initiate an AJAX request here (and then do the updating in a callback).
// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
var modal = $(this)
// var img = '<img src="'+recipient+'">'
modal.find('#speaker-desc').html(recipient)
modal.find('#image-desc').html('<img src="' + recipient2 + '" style="width:100%">')
})

function getSpeakerPagination(page) {

$.ajax({
type: "POST",
url: '<?php echo $siteURL; ?>/ajax.php',
data: {
action: 'callSpeakerPagination',
page: page
},
success: function(data) {
$('#speaker_append').html(data);

}
});
}


function getMeetingPagination(page_m) {

$.ajax({
type: "POST",
url: '<?php echo $siteURL; ?>/ajax.php',
data: {
action: 'callMeetingPagination',
page_m: page_m
},
success: function(data) {
$('#meeting_append').html(data);

}
});
}

function getResourcePagination(page_r) {

$.ajax({
type: "POST",
url: '<?php echo $siteURL; ?>/ajax.php',
data: {
action: 'callResourcePagination',
page_r: page_r
},
success: function(data) {
$('#resources_append').html(data);

}
});
}
</script>

<script type="text/javascript">
<?php if($_SESSION['userType']!="AbbVie"){ ?>
$('document').ready(function() {
$.ajax({
type: "POST",
url: '<?php echo $siteURL; ?>/current_time_zone.php',
dataType: 'json',
success: function(data) {
if (data.response == true) {
$('.toast').css("display", "block");
setTimeout(function() {
window.location.href = data.link;
}, 10000);
}
}
});
})
<?php } ?>
<?php if($_SESSION['userType']!="AbbVie"){ ?>
setInterval(function() {
$.ajax({
type: "POST",
url: '<?php echo $siteURL; ?>/current_time_zone.php',
dataType: 'json',
success: function(data) {
if (data.response == true) {
$('.toast').css("display", "block");
setTimeout(function() {
window.location.href = data.link;
}, 10000);
}
}
});
}, 10000); //time in milliseconds 
<?php } ?>
</script>

</body>

</html>