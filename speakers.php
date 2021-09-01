<?php
include 'header.php';
// include 'db_connection.php';
// session_start();
?>
<body>

<!-- <div id="container">
    
<div class="preloader loading">
  <span class="slice"></span>
  <span class="slice"></span>
  <span class="slice"></span>
  <span class="slice"></span>
  <span class="slice"></span>
  <span class="slice"></span>
</div>
</div>

<div id="loader"> -->
    <div class="speakers_container">
    <div class="title_box mb-3">
      <a href="<?php echo $siteURL; ?>" class="text-decoration-none"><i class="fa fa-reply-all text-white mt-1" style="float: left; font-size: 20px;"></i></a>
        <h4 class="text-white text-center mb-0">Speakers</h4>
    </div>
    <div class="row mx-0">

<?php
// =========================================
// $link = $_SERVER['PHP_SELF'];
// $link_array = explode('/',$link);
// echo $page = end($link_array);
// ==========================================
$sql_speakers = "SELECT * FROM speakers where  del=0";
$result_speakers = $conn->query($sql_speakers); 
$num_rows_speakers =  mysqli_num_rows($result_speakers);
if ($num_rows_speakers > 0) {
while ($row = mysqli_fetch_assoc($result_speakers)) {

    if($row["description"] !=''){
         $des = $row["description"];
     }else{
        $des = 'Description not found yet..';
     }



?>
        

        <div class="col-lg-3 col-md-6">
            <div class="media mb-3">
                <div class="img_box"  href="#" class="" data-toggle="modal" data-target="#myModalnew" data-images='<?php echo "admin/uploads/speaker/".$row["profile"] ?>' data-description="<?php echo $des; ?>">
                    <img src="admin/uploads/speaker/<?php echo  $row["profile"]; ?>" class="rounded-circle border">
                </div>
                <div class="media-body">
                    <h6><?php echo  $row["speaker_name"]; ?></h6>
                    <span class="small"><?php echo  $row["designation"]; ?></span>
                </div>
            </div>
        </div>     

      <?php }  }else{ ?>

        <div class="col-lg-3 col-md-6">
            <div class="media mb-3">
                <div class="media-body">
                      <h6>No speaker till now</h6>
                   
                </div>
            </div>
        </div>   

      <?php } ?>

    </div>
</div>


    


<style>
.agenda_list_grid > h3,p{
    padding-bottom: 0px !important;

}
.slick-list{
    overflow-y:auto !important;
    height:474px;
    }
.slick-track{

    margin-left:unset !important;
}    


    .speaker_slider.slick-list.draggable {
    
    overflow-y: hidden !important;
}
.speaker_prof_bio h4{
    font-size:13px
}

#resources .resources_slider {
    overflow-y: auto;
    height: 400px;
}

#meeting-replay .slick-track {
    width: 1224px !important;
}
#meeting-replay  .slick-slide {
    width: 306px !important;
}
</style>
<style>   
    .pagination {
    /* display: inline-block; */
    /* bottom: 0; */
    /*top: 90vh;*/
    /*position: fixed;*/
}   
    .pagination a {   
        /*font-weight:bold;   */
        font-size:18px;   
        color: #000;   
        float: left;   
        padding: 8px 16px;   
        text-decoration: none;   
        border:1px solid #006CDD;   
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
.prof_download_link, .prof_watch_link {
    margin-top: unset !important;
}
</style>
    <!-- Start popup -->
    <div class="custom_popup">
        <div class="custom_popup_inner">
            <div class="popup_header d-flex justify-content-between align-items-center">
                <div class="popup_logo">
                 <a href="https://prod1.digispace.site/"><img src="/admin/uploads/site_logo/1618332757logo.png"></a>
                </div>
                <div class="popup_close">
                    <img src="assets/images/close.png">
                </div>
            </div>
            <div class="popup_body">
                <div class="popup_tabs_bar d-flex justify-content-between align-items-center">
                    <ul class="d-flex p_tab_ul">
                        <li>
                            <a href="https://prod1.digispace.site/" class="d-block d-md-none w-100 h-100">
                                <img src="/admin/uploads/site_logo/1618332757logo.png" class="img-fluid mb-0" style="width: 100px; height: 100px; max-height: 100px; margin-left: 41px;">
                            </a>
                            <div class="popup_close d-none ml-auto mr-3">
                                <img src="assets/images/close.png">
                            </div>
                        </li>
                                            <li class="active_tab view_map_li d-none d-md-block">
                            <a href="javascript:void(0)" data-id="view-map">
                                                            <span class="mob_txt_hide">VIEW THE MAP </span>
                                
                            </a>
                        </li>
                                            <li class="view_agenda_li d-none d-md-block">
                            <a href="javascript:void(0)" data-id="view-agenda" >
                                                            <img class="mob_icon_img d-none" src="assets/images/agenda_icon.png">
                                <img class="mob_icon_active_img d-none" src="assets/images/agenda_icon_active.png">
                                                        <span class="mob_txt_hide">VIEW THE PROGRAM </span>
                            </a>
                        </li>
                                        </ul>



                    <ul class="d-flex p_link_ul">

                        <li class="d-none d-md-block">
                        <a href="javascript:void(0)" data-id="speakers" >
                        <span class="mob_txt_hide">SPEAKERS </span>

                        </a>
                        </li>
                        <li class="d-none d-md-block">
                        <a href="javascript:void(0)" data-id="resources" >
                        <span class="mob_txt_hide">resourceS </span>
                        </a>
                        </li>

                        <li class="d-none d-md-block">
                        <a href="javascript:void(0)" data-id="meeting-replay">
                        <span class="mob_txt_hide">Replay </span>
                        </a>
                        </li>
                          <li class="logout_tab">
                            <!-- <a href="index.html">
                                <img class="mob_icon_img d-none" src="assets/images/logout_icon.png">
                                Log out
                            </a> -->
                            <form action="" method="POST">
                            <button type="submit" name="logout_btn" id="logout_btn" class="">
                              <img class="mob_icon_img d-none" src="assets/images/logout_icon.png">
                              Logout </button>
                            </form>
                        </li>
                        <li class="d-none">
                            <div class="icon-help">
                                <a href="#"><img src="assets/images/icone_chatbot.png"></a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="popup_content">
                                        <div class="view_map" id="view-map">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="view_map_grid">
                                    <a href="https://prod1.digispace.site/lobby.php">
                                        <img src="assets/images/menu_lobby.jpg">
                                        <p>Lobby</p>
                                    </a>
                                </div>
                            </div>
                                <div class="col-md-3">
                                <div class="view_map_grid">
                                    <a href="https://prod1.digispace.site/pleniere.php">
                                        <img src="assets/images/menu_planery.jpg">
                                        <p>plénière</p>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                    

                    <div id="view-agenda" class="view_agenda ">
                        <div class="row">
                            <div class="col-lg-2 col-md-2">
                                <div class="filter_agenda">
                                    <h2>Filter</h2>
                                    <ul class="filter_ul">
                                                                             
                                         <!-- onclick="getAgenda('')" -->

                                        <li><a href="javascript:void(0);"  class="" style="background: #2E59D9; " >
                                            <input type="checkbox" id="agenda_cat_1" name="agenda_cat[]" value="1" onclick="getAgenda('1');" >
                                            February 22</a>
                                            
                                        </li>
                                        
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-10">
                                <div class="agenda_slider" id="agendaList" >

                                        <div class="speaker_inner">                                       
                                        <div class="agenda_list_grid">
                                            <h3>Ausblick und Closing</h3>
                                            <p>08:00 - 09:30</p>
                                            <ul class="d-flex">
                                                <li><a href="https://digispace.site" class="bluebutton"></a></li>
                                        <li><a href="#" style="background: #2E59D9!important; border-bottom-right-radius: 8px; padding: 3px 10px; color: #fff; text-transform: uppercase; font-size: 13px; display: block;" class="">February 22</a></li>
                                        <li><a href="#" style="background: !important; border-bottom-right-radius: 8px; padding: 3px 10px; color: #fff; text-transform: uppercase; font-size: 13px; display: block;" class=""></a></li>
                                        <li><a href="#" style="background: !important; border-bottom-right-radius: 8px; padding: 3px 10px; color: #fff; text-transform: uppercase; font-size: 13px; display: block;" class=""></a></li>
                                            </ul>
                                        </div>
                                    
                                       
                                        <div class="agenda_list_grid">
                                            <h3>ASCVD Unmet need" Launch Pad (Im Einklang mit dem Trainingsinhalt)</h3>
                                            <p>00:05 - 10:35</p>
                                            <ul class="d-flex">
                                                <li><a href="" class="bluebutton"></a></li>
                                                <li><a href="#" style="background: #2E59D9!important; border-bottom-right-radius: 8px; padding: 3px 10px; color: #fff; text-transform: uppercase; font-size: 13px; display: block;" class="">February 22</a></li>
<li><a href="#" style="background: !important; border-bottom-right-radius: 8px; padding: 3px 10px; color: #fff; text-transform: uppercase; font-size: 13px; display: block;" class=""></a></li>
<li><a href="#" style="background: !important; border-bottom-right-radius: 8px; padding: 3px 10px; color: #fff; text-transform: uppercase; font-size: 13px; display: block;" class=""></a></li>
                                            </ul>
                                        </div>
                                    
</div>                                      
                                    
                                  
                                </div>
                            </div>
                        </div>
                    </div> 




                                    <div id="speakers" class="view_speakers hide_div">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12" >
                                                <div class="speaker_slider_12 row" id="speaker_append">
                                                    <!-- <div class="speaker_inner"> -->

                                    <nav aria-label="Page navigation example" style="width: 100%">
                                    <!-- pagination sm -->
                                    <ul class="pagination pagination-sm" style="float: right;">
                                    <!-- pagination sm -->
                                    <li class="page-item">
                                    <a class="page-link" href="javascript:void(0)"  aria-label="Previous">
                                    <span >&lsaquo;&lsaquo;</span>
                                    <span class="sr-only">Previous</span>
                                    </a>
                                    </li>


                                    <li class='page-item active'><a class = 'page-link' href='javascript:void(0)'>1 </a></li>
                                    <li class="page-item">
                                    <a class="page-link" href="javascript:void(0)"  aria-label="Next">
                                    <span >&rsaquo;&rsaquo;</span>
                                    <span class="sr-only">Next</span>
                                    </a>
                                    </li>

                                    </ul>
                                    </nav>


                                        <div class="speakers_col d-flex col-lg-4 col-md-4">
                                            <div class="speaker_prof_img">
                                                 <p style="cursor: pointer;" href="#" class="" data-toggle="modal" data-target="#myModal" data-images='admin/uploads/speaker/1614334679Photo Manuela Buxo.jpg' data-description="description coming here"><img src="admin/uploads/speaker/1614334679Photo Manuela Buxo.jpg"></p> 
                                                <!-- <img src="admin/uploads/speaker/1614334679Photo Manuela Buxo.jpg"> -->
                                            </div>
                                            <div class="speaker_prof_bio">
                                                <h4 style="cursor: pointer;" href="#" class="" data-toggle="modal" data-target="#myModal" data-images='admin/uploads/speaker/1614334679Photo Manuela Buxo.jpg' data-description="description coming here"> Photo Manuela Buxo</h4>
                                                <!-- <h4>Photo Manuela Buxo <strong></strong></h4> -->
                                                <p>Doctor</p>
                                                <ul class="d-flex profile_social">
                                                <li><a target="_blank" href="-"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                                <li><a target="_blank" href="mailto:-"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
 
                                        <div class="speakers_col d-flex col-lg-4 col-md-4">
                                            <div class="speaker_prof_img">
                                                 <p style="cursor: pointer;" href="#" class="" data-toggle="modal" data-target="#myModal" data-images='admin/uploads/speaker/1614334713Anita-Simmonds_1000x1000.png' data-description="description coming here"><img src="admin/uploads/speaker/1614334713Anita-Simmonds_1000x1000.png"></p> 
                                                <!-- <img src="admin/uploads/speaker/1614334713Anita-Simmonds_1000x1000.png"> -->
                                            </div>
                                            <div class="speaker_prof_bio">
                                                <h4 style="cursor: pointer;" href="#" class="" data-toggle="modal" data-target="#myModal" data-images='admin/uploads/speaker/1614334713Anita-Simmonds_1000x1000.png' data-description="description coming here"> Anita Simonds</h4>
                                                <!-- <h4>Anita Simonds <strong></strong></h4> -->
                                                <p>President of Novartis Oncology</p>
                                                <ul class="d-flex profile_social">
                                                <li><a target="_blank" href="-"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                                <li><a target="_blank" href="mailto:-"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
 
                                        <div class="speakers_col d-flex col-lg-4 col-md-4">
                                            <div class="speaker_prof_img">
                                                 <p style="cursor: pointer;" href="#" class="" data-toggle="modal" data-target="#myModal" data-images='admin/uploads/speaker/1614334733Stephen Holgate_ 003.jpg' data-description="description coming here"><img src="admin/uploads/speaker/1614334733Stephen Holgate_ 003.jpg"></p> 
                                                <!-- <img src="admin/uploads/speaker/1614334733Stephen Holgate_ 003.jpg"> -->
                                            </div>
                                            <div class="speaker_prof_bio">
                                                <h4 style="cursor: pointer;" href="#" class="" data-toggle="modal" data-target="#myModal" data-images='admin/uploads/speaker/1614334733Stephen Holgate_ 003.jpg' data-description="description coming here"> Chris Brightling</h4>
                                                <!-- <h4>Chris Brightling <strong></strong></h4> -->
                                                <p>-</p>
                                                <ul class="d-flex profile_social">
                                                <li><a target="_blank" href="-"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                                <li><a target="_blank" href="mailto:-"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
 
                                        <div class="speakers_col d-flex col-lg-4 col-md-4">
                                            <div class="speaker_prof_img">
                                                 <p style="cursor: pointer;" href="#" class="" data-toggle="modal" data-target="#myModal" data-images='admin/uploads/speaker/1614334746Christopher Brightling.jpg' data-description="description coming here"><img src="admin/uploads/speaker/1614334746Christopher Brightling.jpg"></p> 
                                                <!-- <img src="admin/uploads/speaker/1614334746Christopher Brightling.jpg"> -->
                                            </div>
                                            <div class="speaker_prof_bio">
                                                <h4 style="cursor: pointer;" href="#" class="" data-toggle="modal" data-target="#myModal" data-images='admin/uploads/speaker/1614334746Christopher Brightling.jpg' data-description="description coming here"> Menelas Pangalos</h4>
                                                <!-- <h4>Menelas Pangalos <strong></strong></h4> -->
                                                <p>-</p>
                                                <ul class="d-flex profile_social">
                                                <li><a target="_blank" href="-"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                                <li><a target="_blank" href="mailto:-"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                                                        

                                </div>    
                            </div>

                        </div>
                    </div>




            <div id="resources" class="view_resources hide_div">
            <div class="row">
            <div class="col-lg-12 col-md-12 ">
                <div class="resources_slider_12 row" id="resources_append">
                 <!-- <div class="speaker_inner">  -->

            <nav aria-label="Page navigation example" style="width: 100%">
            <ul class="pagination pagination-sm" style="float: right;">
            <li class="page-item">
            <a class="page-link" href="javascript:void(0)"  aria-label="Previous">
            <span >&lsaquo;&lsaquo;</span>
            <span class="sr-only">Previous</span>
            </a>
            </li>



            <li class="page-item">
            <a class="page-link" href="javascript:void(0)"  aria-label="Next">
            <span >&rsaquo;&rsaquo;</span>
            <span class="sr-only">Next</span>
            </a>
            </li>

            </ul>
            </nav>





                  
                </div>
            </div>
            </div>
            </div> 

<div id="meeting-replay" class="view_meeting_replay hide_div">
<div class="row">
<div class="col-lg-12 col-md-12 ">
    <div class="meeting_slider_12 row" id="meeting_append">

<nav aria-label="Page navigation example" style="width: 100%">
<ul class="pagination pagination-sm" style="float: right;">
<li class="page-item">
<a class="page-link" href="javascript:void(0)"  aria-label="Previous">
<span >&lsaquo;&lsaquo;</span>
<span class="sr-only">Previous</span>
</a>
</li>



<li class="page-item">
<a class="page-link" href="javascript:void(0)"  aria-label="Next">
<span >&rsaquo;&rsaquo;</span>
<span class="sr-only">Next</span>
</a>
</li>

</ul>
</nav>



<!-- <div class="pagination col-md-12">    

</div> -->                                  
    </div>
</div>
</div>
</div>


                </div>
            </div>
        </div>
    </div>
    <!-- End popup -->
<div class="modal" id="myModalnew">
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
            <div class="modalbioimage"><p style="text-align: center;" id="image-desc" ></p></div>

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

      <!-- End popup -->
    <div class="modal" id="myModalnew">
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
            <div class="modalbioimage"><p style="text-align: center;" id="image-desc" ></p></div>

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

<script type="text/javascript">

    $('#myModalnew').on('show.bs.modal', function (event) {
        // debugger;
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('description') // Extract info from data-* attributes
    var recipient2 = button.data('images')
    // If necessary, we could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    // var img = '<img src="'+recipient+'">'
    modal.find('#speaker-desc').html(recipient)
    modal.find('#image-desc').html('<img src="'+recipient2+'" style="width:100%">')
    })
    
</script>

<?php
include 'footer.php';
?>

