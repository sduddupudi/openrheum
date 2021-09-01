<?php
error_reporting(0);
include '../db_connection.php';
include 'header.php';
//session_start();

 ?>

<?php


if(isset($_POST['add_lobby_btn']))
{
   // $customer_id = $_SESSION["userID"];

$lobby_id =$_POST['lobbyid'];
$help_desk =$_POST['help_desk'];
$our_website =$_POST['our_website'] ;
$our_website_appears =$_POST['our_website_appears'];
$qa_link = $_POST['qa_link'];
$qa_link_appears=$_POST['qa_link_appears'];
$video_in_fullscreen = $_POST['lobbyid'];
$german_webnar_video = $_POST['german_webnar_video'];
$french_webnar_video = $_POST['french_webnar_video'];
$gp1_de_btn_text = $_POST['gp1_de_btn_text'];
$breakout1_join_video_conference = $_POST['breakout1_join_video_conference'];
$gp1_fr_btn_text = $_POST['gp1_fr_btn_text'];
$gp1_fr = $_POST['gp1_fr'];
$gp2_btn_text = $_POST['gp2_btn_text'];
$breakout2_join_video_conference = $_POST['breakout2_join_video_conference'];
$respiratory_btn_text = $_POST['respiratory_btn_text'];
$breakout3_join_video_conference = $_POST['breakout3_join_video_conference'];
$cardio_metabolic_btn_text = $_POST['cardio_metabolic_btn_text'];
$breakout4_join_video_conference = $_POST['breakout4_join_video_conference'];
$ihd_cosentyx_pso_btn_text = $_POST['ihd_cosentyx_pso_btn_text'];
$breakout5_join_video_conference = $_POST['breakout5_join_video_conference'];
$ihd_cosentyx_spa_btn_text = $_POST['ihd_cosentyx_spa_btn_text'];
$breakout6_join_video_conference = $_POST['breakout6_join_video_conference'];
$ophtha_beovu_btn_text = $_POST['ophtha_beovu_btn_text'];
$breakout7_join_video_conference = $_POST['breakout7_join_video_conference'];
$ophtha_lucentis_btn_text = $_POST['ophtha_lucentis_btn_text'];
$breakout8_join_video_conference = $_POST['breakout8_join_video_conference'];
$neuroscience_ms_btn_text = $_POST['neuroscience_ms_btn_text'];
$breakout9_join_video_conference = $_POST['breakout9_join_video_conference'];

$coffee_break_btn_text = $_POST['coffee_break_btn_text'];
$coffee_break_join_video_conference = $_POST['coffee_break_join_video_conference'];

$Download_Pdf = $_POST['Download_Pdf'];
$stream_video = $_POST['stream_video'];
$atelier_stream_video = $_POST['atelier_stream_video'];
$help_link = $_POST['help_link'];
//$information_link = $_POST['information_link'];
$information_text = $_POST['information_text'];

$pleanry_1_de_appears = $_POST['pleanry_1_de_appears'];
$pleanry_2_fr_appears = $_POST['pleanry_2_fr_appears'];
$breakout_1_de_appears = $_POST['breakout_1_de_appears'];
$breakout_1_fr_appears = $_POST['breakout_1_fr_appears'];
$breakout_2_appears = $_POST['breakout_2_appears'];
$breakout_3_appears = $_POST['breakout_3_appears'];
$breakout_4_appears = $_POST['breakout_4_appears'];
$breakout_5_appears = $_POST['breakout_5_appears'];
$breakout_6_appears = $_POST['breakout_6_appears'];
$breakout_7_appears = $_POST['breakout_7_appears'];
$breakout_8_appears = $_POST['breakout_8_appears'];
$breakout_9_appears = $_POST['breakout_9_appears'];
$video_url = $_POST['video_url'];
$help_desk_appears = $_POST['help_desk_appears'];
$stream_video_appears = $_POST['stream_video_appears'];
$atelier_stream_video_appears = $_POST['atelier_stream_video_appears'];
$resources_icon_appears = $_POST['resources_icon_appears'];
$information_text_appears = $_POST['information_text_appears'];
$site_title = $_POST['site_title'];

$coffee_break_appears = $_POST['coffee_break_appears'];
$footer_hyperlink_text = $_POST['footer_hyperlink_text'];
$footer_hyperlink_text_appears = $_POST['footer_hyperlink_text_appears'];
$footer_hyperlink = $_POST['footer_hyperlink'];

$help_desk_text = $_POST['help_desk_text'];
$pleanry_text = $_POST['pleanry_text'];
$atelier_text = $_POST['atelier_text'];
$resources_text = $_POST['resources_text'];

  $get_sql = "SELECT customerID,information_video,site_logo,help_desk_icon,pleanry_icon,atelier_icon,resources_icon,information_icon,background_img FROM lobby where lobbyID ='".$lobby_id."' ";
    $result = $conn->query($get_sql);
    $row = $result->fetch_assoc();

$file_name='';
if(isset($_FILES['information_video']) and $_FILES['information_video']!='')
      {
        
        $file_name = time().$_FILES['information_video']['name'];  
        $file_tmp =$_FILES['information_video']['tmp_name'];
        $target_dir = "../admin/uploads/video/";
        $target_file = $target_dir . basename($file_name);
        $moveres=move_uploaded_file($file_tmp, $target_file);
      }
      if($moveres!=0)
      {
        $information_video = "admin/uploads/video/".$file_name;
      }else{
        $information_video = $row['information_video'];
      }

$file_name1='';
if(isset($_FILES['site_logo']) and $_FILES['site_logo']!='')
      {
        
        $file_name1 = time().$_FILES['site_logo']['name'];  
        $file_tmp1 =$_FILES['site_logo']['tmp_name'];
        $target_dir1 = "../admin/uploads/site_logo/";
        $target_file1 = $target_dir1 . basename($file_name1);
        $moveres1=move_uploaded_file($file_tmp1, $target_file1);
      }
      if($moveres1!=0)
      {
        $site_logo = "admin/uploads/site_logo/".$file_name1;
      }else{
        $site_logo = $row['site_logo'];
      }

$file_name2='';
if(isset($_FILES['help_desk_icon']) and $_FILES['help_desk_icon']!='')
      {
        
        $file_name2 = time().$_FILES['help_desk_icon']['name'];  
        $file_tmp2 =$_FILES['help_desk_icon']['tmp_name'];
        $target_dir2 = "../admin/uploads/image/";
        $target_file2 = $target_dir2 . basename($file_name2);
        $moveres2 = move_uploaded_file($file_tmp2, $target_file2);
      }
      if($moveres2!=0)
      {
        $help_desk_icon = "admin/uploads/image/".$file_name2;
      }else{
        $help_desk_icon = $row['help_desk_icon'];
      }

$file_name3='';
if(isset($_FILES['pleanry_icon']) and $_FILES['pleanry_icon']!='')
      {
        
        $file_name3 = time().$_FILES['pleanry_icon']['name'];  
        $file_tmp3 =$_FILES['pleanry_icon']['tmp_name'];
        $target_dir3 = "../admin/uploads/image/";
        $target_file3 = $target_dir3 . basename($file_name3);
        $moveres3 = move_uploaded_file($file_tmp3, $target_file3);
      }
      if($moveres3!=0)
      {
        $pleanry_icon = "admin/uploads/image/".$file_name3;
      }else{
        $pleanry_icon = $row['pleanry_icon'];
      }

$file_name4='';
if(isset($_FILES['atelier_icon']) and $_FILES['atelier_icon']!='')
      {
        
        $file_name4 = time().$_FILES['atelier_icon']['name'];  
        $file_tmp4 =$_FILES['atelier_icon']['tmp_name'];
        $target_dir4 = "../admin/uploads/image/";
        $target_file4 = $target_dir4 . basename($file_name4);
        $moveres4 = move_uploaded_file($file_tmp4, $target_file4);
      }
      if($moveres4!=0)
      {
        $atelier_icon = "admin/uploads/image/".$file_name4;
      }else{
        $atelier_icon = $row['atelier_icon'];
      }

$file_name5='';
if(isset($_FILES['resources_icon']) and $_FILES['resources_icon']!='')
      {
        
        $file_name5 = time().$_FILES['resources_icon']['name'];  
        $file_tmp5 =$_FILES['resources_icon']['tmp_name'];
        $target_dir5 = "../admin/uploads/image/";
        $target_file5 = $target_dir5 . basename($file_name5);
        $moveres5 = move_uploaded_file($file_tmp5, $target_file5);
      }
      if($moveres5!=0)
      {
        $resources_icon = "admin/uploads/image/".$file_name5;
      }else{
        $resources_icon = $row['resources_icon'];
      }

$file_name6='';
if(isset($_FILES['information_icon']) and $_FILES['information_icon']!='')
      {
        
        $file_name6 = time().$_FILES['information_icon']['name'];  
        $file_tmp6 =$_FILES['information_icon']['tmp_name'];
        $target_dir6 = "../admin/uploads/image/";
        $target_file6 = $target_dir6 . basename($file_name6);
        $moveres6 = move_uploaded_file($file_tmp6, $target_file6);
      }
      if($moveres6!=0)
      {
        $information_icon = "admin/uploads/image/".$file_name6;
      }else{
        $information_icon = $row['information_icon'];
      }


$file_name7='';
if(isset($_FILES['background_img']) and $_FILES['background_img']!='')
      {
        
        $file_name7 = time().$_FILES['background_img']['name'];  
        $file_tmp7 =$_FILES['background_img']['tmp_name'];
        $target_dir7 = "../admin/uploads/image/";
        $target_file7 = $target_dir7 . basename($file_name7);
        $moveres7 = move_uploaded_file($file_tmp7, $target_file7);
      }
      if($moveres7!=0)
      {
        $background_img = "admin/uploads/image/".$file_name7;
      }else{
        $background_img = $row['background_img'];
      }


    
    if(empty($row)){
    

     $sql = "INSERT INTO lobby (help_desk, our_website,our_website_appears,qa_link,qa_link_appears,video_in_fullscreen,gp1_de_btn_text,breakout1_join_video_conference,gp1_fr_btn_text,gp1_fr,gp2_btn_text,breakout2_join_video_conference,respiratory_btn_text,breakout3_join_video_conference,cardio_metabolic_btn_text,breakout4_join_video_conference,ihd_cosentyx_pso_btn_text,breakout5_join_video_conference,ihd_cosentyx_spa_btn_text,breakout6_join_video_conference,ophtha_beovu_btn_text,breakout7_join_video_conference,ophtha_lucentis_btn_text,breakout8_join_video_conference,neuroscience_ms_btn_text,breakout9_join_video_conference,coffee_break_btn_text,coffee_break_join_video_conference,Download_Pdf,stream_video,atelier_stream_video,help_link,german_webnar_video,french_webnar_video,information_text,information_video,site_title,site_logo,pleanry_1_de_appears,pleanry_2_fr_appears,breakout_1_de_appears,breakout_1_fr_appears,breakout_2_appears,breakout_3_appears,breakout_4_appears,breakout_5_appears,breakout_6_appears,breakout_7_appears,breakout_8_appears,breakout_9_appears,coffee_break_appears,video_url,help_desk_appears,stream_video_appears,atelier_stream_video_appears,resources_icon_appears,information_text_appears,footer_hyperlink_text,footer_hyperlink_text_appears,footer_hyperlink,help_desk_text,help_desk_icon,pleanry_text,pleanry_icon,atelier_text,atelier_icon,resources_text,resources_icon,,background_img)
    VALUES ( '".$help_desk."','".$our_website."','".$our_website_appears."','".$qa_link."','".$qa_link_appears."','".$video_in_fullscreen."','".$gp1_de_btn_text."','".$breakout1_join_video_conference."','".$gp1_fr_btn_text."','".$gp1_fr."','".$gp2_btn_text."','".$breakout2_join_video_conference."','".$respiratory_btn_text."','".$breakout3_join_video_conference."','".$cardio_metabolic_btn_text."','".$breakout4_join_video_conference."','".$ihd_cosentyx_pso_btn_text."','".$breakout5_join_video_conference."','".$ihd_cosentyx_spa_btn_text."','".$breakout6_join_video_conference."','".$ophtha_beovu_btn_text."','".$breakout7_join_video_conference."','".$ophtha_lucentis_btn_text."','".$breakout8_join_video_conference."','".$neuroscience_ms_btn_text."','".$breakout9_join_video_conference."','".$coffee_break_btn_text."','".$coffee_break_join_video_conference."','".$Download_Pdf."','".$stream_video."','".$atelier_stream_video."','".$help_link."' ,'".$german_webnar_video."' ,'".$french_webnar_video."','".$information_text."' ,'".$information_video."','".$site_title."','".$site_logo."','".$pleanry_1_de_appears."','".$pleanry_2_fr_appears."','".$breakout_1_de_appears."','".$breakout_1_fr_appears."','".$breakout_2_appears."','".$breakout_3_appears."','".$breakout_4_appears."','".$breakout_5_appears."','".$breakout_6_appears."','".$breakout_7_appears."','".$breakout_8_appears."','".$breakout_9_appears."','".$coffee_break_appears."','".$video_url."','".$help_desk_appears."','".$stream_video_appears."','".$atelier_stream_video_appears."','".$resources_icon_appears."','".$information_text_appears."','".$footer_hyperlink_text."' ,'".$footer_hyperlink_text_appears."','".$footer_hyperlink."','".$help_desk_text."','".$help_desk_icon."','".$pleanry_text."','".$pleanry_icon."','".$atelier_text."','".$atelier_icon."','".$resources_text."','".$resources_icon."','".$information_icon."' ,'".$background_img."' )"; 
    
    if ($conn->query($sql) === TRUE) {
          $msg = "Lobby insert successfully";
    } else {
          $error = $sign_up_error = "Error: Failed!";
    }
    
    }else{
        $update_sql = "UPDATE lobby SET help_desk='".$help_desk."' ,our_website='".$our_website."',our_website_appears='".$our_website_appears."',qa_link='".$qa_link."',qa_link_appears='".$qa_link_appears."' ,video_in_fullscreen='".$video_in_fullscreen."' 
,german_webnar_video='".$german_webnar_video."'
,french_webnar_video='".$french_webnar_video."'
,gp1_de_btn_text='".$gp1_de_btn_text."'
,breakout1_join_video_conference='".$breakout1_join_video_conference."' 
,gp1_fr_btn_text='".$gp1_fr_btn_text."'
,gp1_fr='".$gp1_fr."'
,gp2_btn_text='".$gp2_btn_text."'
,breakout2_join_video_conference='".$breakout2_join_video_conference."'
,respiratory_btn_text='".$respiratory_btn_text."'
,breakout3_join_video_conference='".$breakout3_join_video_conference."'
,cardio_metabolic_btn_text='".$cardio_metabolic_btn_text."'
,breakout4_join_video_conference='".$breakout4_join_video_conference."'
,ihd_cosentyx_pso_btn_text='".$ihd_cosentyx_pso_btn_text."'
,breakout5_join_video_conference='".$breakout5_join_video_conference."'
,ihd_cosentyx_spa_btn_text='".$ihd_cosentyx_spa_btn_text."'
,breakout6_join_video_conference='".$breakout6_join_video_conference."'
,ophtha_beovu_btn_text='".$ophtha_beovu_btn_text."'
,breakout7_join_video_conference='".$breakout7_join_video_conference."'
,ophtha_lucentis_btn_text='".$ophtha_lucentis_btn_text."'
,breakout8_join_video_conference='".$breakout8_join_video_conference."'
,neuroscience_ms_btn_text='".$neuroscience_ms_btn_text."'
,breakout9_join_video_conference='".$breakout9_join_video_conference."'
,coffee_break_btn_text='".$coffee_break_btn_text."'
,coffee_break_join_video_conference='".$coffee_break_join_video_conference."'
,Download_Pdf='".$Download_Pdf."',stream_video='".$stream_video."',atelier_stream_video='".$atelier_stream_video."' ,help_link='".$help_link."' ,information_text='".$information_text."',information_video='".$information_video."'
 ,site_title='".$site_title."'
 ,site_logo='".$site_logo."' 
,pleanry_1_de_appears='".$pleanry_1_de_appears."'
,pleanry_2_fr_appears='".$pleanry_2_fr_appears."'
,breakout_1_de_appears='".$breakout_1_de_appears."'
,breakout_1_fr_appears='".$breakout_1_fr_appears."'
,breakout_2_appears='".$breakout_2_appears."'
,breakout_3_appears='".$breakout_3_appears."'
,breakout_4_appears='".$breakout_4_appears."'
,breakout_5_appears='".$breakout_5_appears."'
,breakout_6_appears='".$breakout_6_appears."'
,breakout_7_appears='".$breakout_7_appears."'
,breakout_8_appears='".$breakout_8_appears."'
,breakout_9_appears='".$breakout_9_appears."'
,coffee_break_appears='".$coffee_break_appears."'
,video_url='".$video_url."'
,help_desk_appears='".$help_desk_appears."'
,stream_video_appears='".$stream_video_appears."'
,atelier_stream_video_appears='".$atelier_stream_video_appears."'
,resources_icon_appears='".$resources_icon_appears."'
,information_text_appears='".$information_text_appears."'
,footer_hyperlink_text='".$footer_hyperlink_text."'
,footer_hyperlink_text_appears='".$footer_hyperlink_text_appears."'
,footer_hyperlink='".$footer_hyperlink."'
,help_desk_text='".$help_desk_text."'
,help_desk_icon='".$help_desk_icon."'
,pleanry_text='".$pleanry_text."'
,pleanry_icon='".$pleanry_icon."'
,atelier_text='".$atelier_text."'
,atelier_icon='".$atelier_icon."'
,resources_text='".$resources_text."'
,resources_icon='".$resources_icon."'
,information_icon='".$information_icon."'
,background_img='".$background_img."'
WHERE lobbyID='".$lobby_id."'  ";

        if ($conn->query($update_sql) === TRUE) {
              $msg = "Record updated successfully";
        } else {
              $error = "Error updating record: " . $conn->error;
        }  
    }





}



    $lobby_sql = "SELECT * FROM lobby";
    $get_lobby = $conn->query($lobby_sql);
    $row_lobby = $get_lobby->fetch_assoc();
    //print_r($row_lobby);

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
              <h6 class="m-0 font-weight-bold text-primary">Add Lobby</h6>
            </div>
            <div class="card-body">
              <span style="color: green;"><?php if(!empty($msg)){echo $msg; } ?></span>
              <form class="form-horizontal" action='' method="POST" enctype="multipart/form-data">
            <input type="hidden"  name="lobbyid" class="form-control" value="<?php if(isset($row_lobby['lobbyID'])){echo $row_lobby['lobbyID']; } ?>"  >
                <fieldset>

                  <!-- <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="Plenary">Go to Plenary</label>
                    <div class="col-md-6">
                      <input type="text" id="Plenary" name="Plenary" class="form-control" value="<?php if(isset($row_lobby['Plenary'])){echo $row_lobby['Plenary']; } ?>"  >
                    </div>
                  </div> -->



                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="help_desk">Lobby Helpdesk URL</label>
                    <div class="col-md-6">
                      <input type="text" id="help_desk" name="help_desk" class="form-control" value="<?php if(isset($row_lobby['help_desk'])){echo $row_lobby['help_desk']; } ?>" >
                    </div>
                    <div class="col-md-2">
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="help_desk_appears" name="help_desk_appears" value="yes" <?php if($row_lobby['help_desk_appears'] == 'yes'){echo 'checked'; } ?> >
                      <label class="form-check-label" for="help_desk_appears">Pleasse Check if need to appears</label>
                    </div>
                    </div>
                  </div>

                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="help_desk_text">Lobby Helpdesk Button Text</label>
                    <div class="col-md-6">
                      <input type="text" id="help_desk_text" name="help_desk_text" class="form-control" value="<?php if(isset($row_lobby['help_desk_text'])){echo $row_lobby['help_desk_text']; } ?>" >
                    </div>
                  </div>

                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="help_desk_icon">Lobby Helpdesk Icon</label>
                    <div class="col-md-3">
                      <input type="file" id="help_desk_icon" name="help_desk_icon" class="form-control" value="">
                    </div>
                    <div class="col-md-3">
                        <?php if($row_lobby["help_desk_icon"]){?>
                      <img src="../<?php echo $row_lobby["help_desk_icon"];?>" width="50" height="50">
                  <?php } ?>
                    </div>
                  </div>

                 <!-- <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="our_website">Please Visit our website</label>
                    <div class="col-md-6">
                      <input type="text" id="our_website" name="our_website" class="form-control" value="<?php if(isset($row_lobby['our_website'])){echo $row_lobby['our_website']; } ?>">
                    </div>
                    <div class="col-md-2">
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="our_website_appears" name="our_website_appears" value="yes" <?php if($row_lobby['our_website_appears'] == 'yes'){echo 'checked'; } ?> >
                      <label class="form-check-label" for="our_website_appears">Pleasse Check if need to appears</label>
                    </div>
                    </div>
                  </div> -->

                 <!--  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="qa_link">QA Link</label>
                    <div class="col-md-6">
                      <input type="text" id="qa_link" name="qa_link" class="form-control" value="<?php if(isset($row_lobby['qa_link'])){echo $row_lobby['qa_link']; } ?>">
                    </div>
                    <div class="col-md-2">
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="qa_link_appears" name="qa_link_appears" value="yes" <?php if($row_lobby['qa_link_appears'] == 'yes'){echo 'checked'; } ?> >
                      <label class="form-check-label" for="qa_link_appears">Pleasse Check if need to appears</label>
                    </div>
                    </div>
                  </div> -->

                  <!-- <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="video_in_fullscreen">Watch the video in fullscreen </label>
                    <div class="col-md-6">
                      <input type="text" id="video_in_fullscreen" name="video_in_fullscreen" class="form-control" value="<?php if(isset($row_lobby['video_in_fullscreen'])){echo $row_lobby['video_in_fullscreen']; } ?>" >
                    </div>
                  </div> -->

                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="stream_video">Pleanry stream video URL</label>
                    <div class="col-md-6">
                      <input type="text" id="stream_video" name="stream_video" class="form-control" value="<?php if(isset($row_lobby['stream_video'])){echo $row_lobby['stream_video']; } ?>"  >
                    </div>
                     <div class="col-md-2">
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="stream_video_appears" name="stream_video_appears" value="yes" <?php if($row_lobby['stream_video_appears'] == 'yes'){echo 'checked'; } ?> >
                      <label class="form-check-label" for="stream_video_appears">Pleasse Check if need to appears</label>
                    </div>
                    </div>
                  </div>

                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="pleanry_text">Pleanry Text</label>
                    <div class="col-md-6">
                      <input type="text" id="pleanry_text" name="pleanry_text" class="form-control" value="<?php if(isset($row_lobby['pleanry_text'])){echo $row_lobby['pleanry_text']; } ?>" >
                    </div>
                  </div>

                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="pleanry_icon">Pleanry Icon</label>
                    <div class="col-md-3">
                      <input type="file" id="pleanry_icon" name="pleanry_icon" class="form-control" value="">
                    </div>
                    <div class="col-md-3">
                        <?php if($row_lobby["pleanry_icon"]){?>
                      <img src="../<?php echo $row_lobby["pleanry_icon"];?>" width="50" height="50">
                  <?php } ?>
                    </div>
                  </div>

                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="atelier_stream_video">Atelier stream video URL</label>
                    <div class="col-md-6">
                      <input type="text" id="atelier_stream_video" name="atelier_stream_video" class="form-control" value="<?php if(isset($row_lobby['atelier_stream_video'])){echo $row_lobby['atelier_stream_video']; } ?>"  >
                    </div>
                     <div class="col-md-2">
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="atelier_stream_video_appears" name="atelier_stream_video_appears" value="yes" <?php if($row_lobby['atelier_stream_video_appears'] == 'yes'){echo 'checked'; } ?> >
                      <label class="form-check-label" for="atelier_stream_video_appears">Pleasse Check if need to appears</label>
                    </div>
                    </div>
                  </div>

                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="atelier_text">Atelier Text</label>
                    <div class="col-md-6">
                      <input type="text" id="atelier_text" name="atelier_text" class="form-control" value="<?php if(isset($row_lobby['atelier_text'])){echo $row_lobby['atelier_text']; } ?>" >
                    </div>
                  </div>

                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="atelier_icon">Atelier Icon</label>
                    <div class="col-md-3">
                      <input type="file" id="atelier_icon" name="atelier_icon" class="form-control" value="">
                    </div>
                    <div class="col-md-3">
                        <?php if($row_lobby["atelier_icon"]){?>
                      <img src="../<?php echo $row_lobby["atelier_icon"];?>" width="50" height="50">
                  <?php } ?>
                    </div>
                  </div>

                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="resources_text">Resources Text</label>
                    <div class="col-md-6">
                      <input type="text" id="resources_text" name="resources_text" class="form-control" value="<?php if(isset($row_lobby['resources_text'])){echo $row_lobby['resources_text']; } ?>"  >
                    </div>
                     <div class="col-md-2">
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="resources_icon_appears" name="resources_icon_appears" value="yes" <?php if($row_lobby['resources_icon_appears'] == 'yes'){echo 'checked'; } ?> >
                      <label class="form-check-label" for="resources_icon_appears">Pleasse Check if need to appears</label>
                    </div>
                    </div>
                  </div>

                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="resources_icon">Resources Icon</label>
                    <div class="col-md-3">
                      <input type="file" id="resources_icon" name="resources_icon" class="form-control" value="">
                    </div>
                    <div class="col-md-3">
                        <?php if($row_lobby["resources_icon"]){?>
                      <img src="../<?php echo $row_lobby["resources_icon"];?>" width="50" height="50">
                  <?php } ?>
                    </div>
                  </div>


                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="information_text">Information Text </label>
                    <div class="col-md-6">
                      <input type="text" id="information_text" name="information_text" class="form-control" value="<?php if(isset($row_lobby['information_text'])){echo $row_lobby['information_text']; } ?>"  >
                    </div>
                    <div class="col-md-2">
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="information_text_appears" name="information_text_appears" value="yes" <?php if($row_lobby['information_text_appears'] == 'yes'){echo 'checked'; } ?> >
                      <label class="form-check-label" for="information_text_appears">Pleasse Check if need to appears</label>
                    </div>
                    </div>
                  </div>

                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="information_icon">Information Icon</label>
                    <div class="col-md-3">
                      <input type="file" id="information_icon" name="information_icon" class="form-control" value="">
                    </div>
                    <div class="col-md-3">
                        <?php if($row_lobby["information_icon"]){?>
                      <img src="../<?php echo $row_lobby["information_icon"];?>" width="50" height="50">
                  <?php } ?>
                    </div>
                  </div>
          
          <!-- <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="video_in_fullscreen">Pleanry 1 DE </label>
                    <div class="col-md-6">
                      <input type="text" id="video_in_fullscreen" name="german_webnar_video" class="form-control" value="<?php if(isset($row_lobby['german_webnar_video'])){echo $row_lobby['german_webnar_video']; } ?>" >
                    </div>
                    <div class="col-md-2">
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="pleanry_1_de_appears" name="pleanry_1_de_appears" value="yes" <?php if($row_lobby['pleanry_1_de_appears'] == 'yes'){echo 'checked'; } ?> >
                      <label class="form-check-label" for="pleanry_1_de_appears">Pleasse Check if need to appears</label>
                    </div>
                    </div>
                  </div> -->
        
         <!--  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="video_in_fullscreen">Pleanry 2 FR </label>
                    <div class="col-md-6">
                      <input type="text" id="video_in_fullscreen" name="french_webnar_video" class="form-control" value="<?php if(isset($row_lobby['french_webnar_video'])){echo $row_lobby['french_webnar_video']; } ?>" >
                    </div>
                    <div class="col-md-2">
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="pleanry_2_fr_appears" name="pleanry_2_fr_appears" value="yes" <?php if($row_lobby['pleanry_2_fr_appears'] == 'yes'){echo 'checked'; } ?> >
                      <label class="form-check-label" for="pleanry_2_fr_appears">Pleasse Check if need to appears</label>
                    </div>
                    </div>
                  </div> -->

                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="gp1_de_btn_text">Breakout 1 – Button Text </label>
                    <div class="col-md-6">
                      <input type="text" id="gp1_de_btn_text" name="gp1_de_btn_text" class="form-control" value="<?php if(isset($row_lobby['gp1_de_btn_text'])){echo $row_lobby['gp1_de_btn_text']; } ?>">
                    </div>
                    <div class="col-md-2">
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="breakout_1_de_appears" name="breakout_1_de_appears" value="yes" <?php if($row_lobby['breakout_1_de_appears'] == 'yes'){echo 'checked'; } ?> >
                      <label class="form-check-label" for="breakout_1_de_appears">Pleasse Check if need to appears</label>
                    </div>
                    </div>
                  </div> 

                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="breakout1_join_video_conference">Breakout 1 – Franchise Meeting </label>
                    <div class="col-md-6">
                      <input type="text" id="breakout1_join_video_conference" name="breakout1_join_video_conference" class="form-control" value="<?php if(isset($row_lobby['breakout1_join_video_conference'])){echo $row_lobby['breakout1_join_video_conference']; } ?>">
                    </div>
                  </div> 

                 <!--  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="gp1_fr_btn_text">Breakout 1 FR – Button Text </label>
                    <div class="col-md-6">
                      <input type="text" id="gp1_fr_btn_text" name="gp1_fr_btn_text" class="form-control" value="<?php if(isset($row_lobby['gp1_fr_btn_text'])){echo $row_lobby['gp1_fr_btn_text']; } ?>">
                    </div>
                    <div class="col-md-2">
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="breakout_1_fr_appears" name="breakout_1_fr_appears" value="yes" <?php if($row_lobby['breakout_1_fr_appears'] == 'yes'){echo 'checked'; } ?> >
                      <label class="form-check-label" for="breakout_1_fr_appears">Pleasse Check if need to appears</label>
                    </div>
                    </div>
                  </div>

                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="gp1_fr">Breakout 1 FR – Franchise Meeting </label>
                    <div class="col-md-6">
                      <input type="text" id="gp1_fr" name="gp1_fr" class="form-control" value="<?php if(isset($row_lobby['gp1_fr'])){echo $row_lobby['gp1_fr']; } ?>">
                    </div>
                  </div> -->

                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="gp2_btn_text">Breakout 2 – Button Text </label>
                    <div class="col-md-6">
                      <input type="text" id="gp2_btn_text" name="gp2_btn_text" class="form-control" value="<?php if(isset($row_lobby['gp2_btn_text'])){echo $row_lobby['gp2_btn_text']; } ?>" >
                    </div>
                    <div class="col-md-2">
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="breakout_2_appears" name="breakout_2_appears" value="yes" <?php if($row_lobby['breakout_2_appears'] == 'yes'){echo 'checked'; } ?> >
                      <label class="form-check-label" for="breakout_2_appears">Pleasse Check if need to appears</label>
                    </div>
                    </div>
                  </div> 

                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="breakout2_join_video_conference">Breakout 2 – Franchise Meeting </label>
                    <div class="col-md-6">
                      <input type="text" id="breakout2_join_video_conference" name="breakout2_join_video_conference" class="form-control" value="<?php if(isset($row_lobby['breakout2_join_video_conference'])){echo $row_lobby['breakout2_join_video_conference']; } ?>" >
                    </div>
                  </div>

                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="respiratory_btn_text">Breakout 3 – Button Text</label>
                    <div class="col-md-6">
                      <input type="text" id="respiratory_btn_text" name="respiratory_btn_text" class="form-control" value="<?php if(isset($row_lobby['respiratory_btn_text'])){echo $row_lobby['respiratory_btn_text']; } ?>" >
                    </div>
                    <div class="col-md-2">
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="breakout_3_appears" name="breakout_3_appears" value="yes" <?php if($row_lobby['breakout_3_appears'] == 'yes'){echo 'checked'; } ?> >
                      <label class="form-check-label" for="breakout_3_appears">Pleasse Check if need to appears</label>
                    </div>
                    </div>
                  </div> 
          
                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="breakout3_join_video_conference">Breakout 3 – Franchise Meeting</label>
                    <div class="col-md-6">
                      <input type="text" id="breakout3_join_video_conference" name="breakout3_join_video_conference" class="form-control" value="<?php if(isset($row_lobby['breakout3_join_video_conference'])){echo $row_lobby['breakout3_join_video_conference']; } ?>" >
                    </div>
                  </div>

                  <!-- <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="cardio_metabolic_btn_text">Breakout 4 – Button Text </label>
                    <div class="col-md-6">
                      <input type="text" id="cardio_metabolic_btn_text" name="cardio_metabolic_btn_text" class="form-control" value="<?php if(isset($row_lobby['cardio_metabolic_btn_text'])){echo $row_lobby['cardio_metabolic_btn_text']; } ?>" >
                    </div>
                    <div class="col-md-2">
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="breakout_4_appears" name="breakout_4_appears" value="yes" <?php if($row_lobby['breakout_4_appears'] == 'yes'){echo 'checked'; } ?> >
                      <label class="form-check-label" for="breakout_4_appears">Pleasse Check if need to appears</label>
                    </div>
                    </div>
                  </div>
        
                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="breakout4_join_video_conference">Breakout 4 – Franchise Meeting </label>
                    <div class="col-md-6">
                      <input type="text" id="breakout4_join_video_conference" name="breakout4_join_video_conference" class="form-control" value="<?php if(isset($row_lobby['breakout4_join_video_conference'])){echo $row_lobby['breakout4_join_video_conference']; } ?>" >
                    </div>
                  </div>

                <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="ihd_cosentyx_pso_btn_text">Breakout 5 – Button Text </label>
                    <div class="col-md-6">
                      <input type="text" id="ihd_cosentyx_pso_btn_text" name="ihd_cosentyx_pso_btn_text" class="form-control" value="<?php if(isset($row_lobby['ihd_cosentyx_pso_btn_text'])){echo $row_lobby['ihd_cosentyx_pso_btn_text']; } ?>" >
                    </div>
                    <div class="col-md-2">
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="breakout_5_appears" name="breakout_5_appears" value="yes" <?php if($row_lobby['breakout_5_appears'] == 'yes'){echo 'checked'; } ?> >
                      <label class="form-check-label" for="breakout_5_appears">Pleasse Check if need to appears</label>
                    </div>
                    </div>
                  </div>
          
                <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="breakout5_join_video_conference">Breakout 5 – Franchise Meeting </label>
                    <div class="col-md-6">
                      <input type="text" id="breakout5_join_video_conference" name="breakout5_join_video_conference" class="form-control" value="<?php if(isset($row_lobby['breakout5_join_video_conference'])){echo $row_lobby['breakout5_join_video_conference']; } ?>" >
                    </div>
                  </div>

                <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="ihd_cosentyx_spa_btn_text">Breakout 6 – Button Text </label>
                    <div class="col-md-6">
                      <input type="text" id="ihd_cosentyx_spa_btn_text" name="ihd_cosentyx_spa_btn_text" class="form-control" value="<?php if(isset($row_lobby['ihd_cosentyx_spa_btn_text'])){echo $row_lobby['ihd_cosentyx_spa_btn_text']; } ?>" >
                    </div>
                    <div class="col-md-2">
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="breakout_6_appears" name="breakout_6_appears" value="yes" <?php if($row_lobby['breakout_6_appears'] == 'yes'){echo 'checked'; } ?> >
                      <label class="form-check-label" for="breakout_6_appears">Pleasse Check if need to appears</label>
                    </div>
                    </div>
                  </div>
        
                <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="breakout6_join_video_conference">Breakout 6 – Franchise Meeting </label>
                    <div class="col-md-6">
                      <input type="text" id="breakout6_join_video_conference" name="breakout6_join_video_conference" class="form-control" value="<?php if(isset($row_lobby['breakout6_join_video_conference'])){echo $row_lobby['breakout6_join_video_conference']; } ?>" >
                    </div>
                  </div>

                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="ophtha_beovu_btn_text">Breakout 7 – Button Text </label>
                    <div class="col-md-6">
                      <input type="text" id="ophtha_beovu_btn_text" name="ophtha_beovu_btn_text" class="form-control" value="<?php if(isset($row_lobby['ophtha_beovu_btn_text'])){echo $row_lobby['ophtha_beovu_btn_text']; } ?>" >
                    </div>
                    <div class="col-md-2">
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="breakout_7_appears" name="breakout_7_appears" value="yes" <?php if($row_lobby['breakout_7_appears'] == 'yes'){echo 'checked'; } ?> >
                      <label class="form-check-label" for="breakout_7_appears">Pleasse Check if need to appears</label>
                    </div>
                    </div>
                  </div>
          
                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="breakout7_join_video_conference">Breakout 7 – Franchise Meeting </label>
                    <div class="col-md-6">
                      <input type="text" id="breakout7_join_video_conference" name="breakout7_join_video_conference" class="form-control" value="<?php if(isset($row_lobby['breakout7_join_video_conference'])){echo $row_lobby['breakout7_join_video_conference']; } ?>" >
                    </div>
                  </div>

                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="ophtha_lucentis_btn_text">Breakout 8 – Button Text </label>
                    <div class="col-md-6">
                      <input type="text" id="ophtha_lucentis_btn_text" name="ophtha_lucentis_btn_text" class="form-control" value="<?php if(isset($row_lobby['ophtha_lucentis_btn_text'])){echo $row_lobby['ophtha_lucentis_btn_text']; } ?>" >
                    </div>
                    <div class="col-md-2">
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="breakout_8_appears" name="breakout_8_appears" value="yes" <?php if($row_lobby['breakout_8_appears'] == 'yes'){echo 'checked'; } ?> >
                      <label class="form-check-label" for="breakout_8_appears">Pleasse Check if need to appears</label>
                    </div>
                    </div>
                  </div>
          
                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="breakout8_join_video_conference">Breakout 8 – Franchise Meeting </label>
                    <div class="col-md-6">
                      <input type="text" id="breakout8_join_video_conference" name="breakout8_join_video_conference" class="form-control" value="<?php if(isset($row_lobby['breakout8_join_video_conference'])){echo $row_lobby['breakout8_join_video_conference']; } ?>" >
                    </div>
                  </div>

                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="neuroscience_ms_btn_text">Breakout 9 – Button Text </label>
                    <div class="col-md-6">
                      <input type="text" id="neuroscience_ms_btn_text" name="neuroscience_ms_btn_text" class="form-control" value="<?php if(isset($row_lobby['neuroscience_ms_btn_text'])){echo $row_lobby['neuroscience_ms_btn_text']; } ?>" >
                    </div>
                    <div class="col-md-2">
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="breakout_9_appears" name="breakout_9_appears" value="yes" <?php if($row_lobby['breakout_9_appears'] == 'yes'){echo 'checked'; } ?> >
                      <label class="form-check-label" for="breakout_9_appears">Pleasse Check if need to appears</label>
                    </div>
                    </div>
                  </div>
          
                <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="breakout9_join_video_conference">Breakout 9 – Franchise Meeting </label>
                    <div class="col-md-6">
                      <input type="text" id="breakout9_join_video_conference" name="breakout9_join_video_conference" class="form-control" value="<?php if(isset($row_lobby['breakout9_join_video_conference'])){echo $row_lobby['breakout9_join_video_conference']; } ?>" >
                    </div>
                  </div> -->

                <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="coffee_break_btn_text">Coffee Break – Button Text </label>
                    <div class="col-md-6">
                      <input type="text" id="coffee_break_btn_text" name="coffee_break_btn_text" class="form-control" value="<?php if(isset($row_lobby['coffee_break_btn_text'])){echo $row_lobby['coffee_break_btn_text']; } ?>" >
                    </div>
                    <div class="col-md-2">
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="coffee_break_appears" name="coffee_break_appears" value="yes" <?php if($row_lobby['coffee_break_appears'] == 'yes'){echo 'checked'; } ?> >
                      <label class="form-check-label" for="coffee_break_appears">Pleasse Check if need to appears</label>
                    </div>
                    </div>
                  </div>
          
                <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="coffee_break_join_video_conference">Coffee Break – Franchise Meeting </label>
                    <div class="col-md-6">
                      <input type="text" id="coffee_break_join_video_conference" name="coffee_break_join_video_conference" class="form-control" value="<?php if(isset($row_lobby['coffee_break_join_video_conference'])){echo $row_lobby['coffee_break_join_video_conference']; } ?>" >
                    </div>
                  </div>

               <!--     <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="Download_Pdf">Download Pdf </label>
                    <div class="col-md-6">
                      <input type="text" id="Download_Pdf" name="Download_Pdf" class="form-control" value="<?php if(isset($row_lobby['Download_Pdf'])){echo $row_lobby['Download_Pdf']; } ?>">
                    </div>
                  </div> 

                 <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="brandvideo">Watch our brandvideo </label>
                    <div class="col-md-6">
                      <input type="text" id="brandvideo" name="brandvideo" class="form-control" value="<?php if(isset($row_lobby['brandvideo'])){echo $row_lobby['brandvideo']; } ?>" >
                    </div>
                  </div>  -->

                   

                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="help_link">Help Link </label>
                    <div class="col-md-6">
                      <input type="text" id="help_link" name="help_link" class="form-control" value="<?php if(isset($row_lobby['help_link'])){echo $row_lobby['help_link']; } ?>"  >
                    </div>
                  </div> 
          
                  <!-- <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="information_link">Information Link </label>
                    <div class="col-md-6">
                      <input type="text" id="information_link" name="information_link" class="form-control" value="<?php if(isset($row_lobby['information_link'])){echo $row_lobby['information_link']; } ?>"  >
                    </div>
                  </div> -->

                  

                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="video_url">Video URL </label>
                    <div class="col-md-6">
                      <input type="text" id="video_url" name="video_url" class="form-control" value="<?php if(isset($row_lobby['video_url'])){echo $row_lobby['video_url']; } ?>"  >
                    </div>
                  </div> 

                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="information_video">Information Video </label>
                    <div class="col-md-3">
                      <input type="file" id="information_video" name="information_video" class="form-control" value="">
                    </div>
                    <div class="col-md-3">
                        <a target="_blank" href="<?php echo $row_lobby["information_video"];?>">uploaded video</a>
                      
                    </div>
                  </div>

                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="site_title">Site Title </label>
                    <div class="col-md-6">
                      <input type="text" id="site_title" name="site_title" class="form-control" value="<?php if(isset($row_lobby['site_title'])){echo $row_lobby['site_title']; } ?>"  >
                    </div>
                  </div>

                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="site_logo">Site Logo </label>
                    <div class="col-md-3">
                      <input type="file" id="site_logo" name="site_logo" class="form-control" value="">
                    </div>
                    <div class="col-md-3">
                        <?php if($row_lobby["site_logo"]){?>
                      <img src="../<?php echo $row_lobby["site_logo"];?>" width="100" height="30">
                  <?php } ?>
                    </div>
                  </div>


                  <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="footer_hyperlink_text">Footer Hyperlink Text </label>
                    <div class="col-md-6">
                      <input type="text" id="footer_hyperlink_text" name="footer_hyperlink_text" class="form-control" value="<?php if(isset($row_lobby['footer_hyperlink_text'])){echo $row_lobby['footer_hyperlink_text']; } ?>"  >
                    </div>
                    <div class="col-md-2">
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="footer_hyperlink_text_appears" name="footer_hyperlink_text_appears" value="yes" <?php if($row_lobby['footer_hyperlink_text_appears'] == 'yes'){echo 'checked'; } ?> >
                      <label class="form-check-label" for="footer_hyperlink_text_appears">Pleasse Check if need to appears</label>
                    </div>
                    </div>
                  </div>

                   <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="footer_hyperlink">Footer Hyperlink </label>
                    <div class="col-md-6">
                      <input type="text" id="footer_hyperlink" name="footer_hyperlink" class="form-control" value="<?php if(isset($row_lobby['footer_hyperlink'])){echo $row_lobby['footer_hyperlink']; } ?>"  >
                    </div>
                  </div>

                 <div class="control-group row">
                    <label class="col-md-4 col-form-label text-md-right"  for="background_img">Lobby Background image</label>
                    <div class="col-md-3">
                      <input type="file" id="background_img" name="background_img" class="form-control" value="">
                    </div>
                    <div class="col-md-3">
                        <?php if($row_lobby["background_img"]){?>
                      <img src="../<?php echo $row_lobby["background_img"];?>" width="50" height="50">
                  <?php } ?>
                    </div>
                  </div>

                  <div class="col-md-6 offset-md-4">
                            <button type="submit" name="add_lobby_btn" class="btn btn-primary">
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
