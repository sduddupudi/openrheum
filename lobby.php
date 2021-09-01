<?php
include 'header.php';
// $crnt_time =  date("H:i:s");
$lobby_sql = "SELECT * FROM lobby";
$get_lobby = $conn->query($lobby_sql);
$row_lobby = $get_lobby->fetch_assoc();

$info_icon_sql = "SELECT * FROM info_icon ";
$get_info_icon = $conn->query($info_icon_sql);
$row_info_icon = $get_info_icon->fetch_assoc();
?>

<style>
body {
    overflow: hidden;
}

.wlcome {
    position: absolute;
    left: 50%;
    top: 10%;
    transform: translate(-50%, -50%);
}

.alert-success {
    color: #fff;
    background-color: #9E249C;
    border-color: #9E249C;
}
</style>
<!-- Sanjay -->

<div id="main-wrapper">
    <div class="sidebar-main">
        <div class="logo-main">
            <a href="<?php echo $siteURL; ?>"><img src="<?php echo $row_lobby['site_logo']; ?>"></a>
        </div>
        <div class="sidebar-toggle-main">
            <a href="javascript:void(0)"><img src="assets/images/logo_menu.png"></img></a>
            <!-- <a href="javascript:void(0)"><i class="fa fa-bars"></i></a> -->
        </div>
        <div class="sidebar-map-main">
            <a href="javascript:void(0)"><i class="fa fa-map-marker"></i></a>

        </div>
        <?php if ($row_lobby['footer_hyperlink_text_appears'] == 'yes') { ?>

        <div class="mentionlegal d-none">
            <a href="<?php if (isset($row_lobby['footer_hyperlink'])) {
                                echo $row_lobby['footer_hyperlink'];
                            } ?>" target=”_blank” style="color:#1272DE; font-size:10px">
                <p><?php if (isset($row_lobby['footer_hyperlink_text'])) {
                            echo $row_lobby['footer_hyperlink_text'];
                        } ?>
                </p>
            </a>

        </div>
        <?php } ?>
    </div>

    <?php if (!empty($row_lobby['background_img'])) { ?>
    <div id="lobby" class="right_content" style="background-image: url(<?php echo $row_lobby['background_img'] ?>);">
        <?php } else { ?>
        <div id="lobby" class="right_content"
            style="background-image: url(https://digiplace.s3.eu-west-3.amazonaws.com/Lobby.png);">
            <?php } ?>
            <?php if ($row_lobby['stream_video_appears'] == 'yes') { ?>

            <div class="go-plenary">
                <span><img src="<?php echo $row_lobby["pleanry_icon"]; ?>"></span>
                <div class="go-plenary-btn">
                    <a href="<?php echo $siteURL; ?>meet-the-experts">
                        <img src="<?php echo $row_lobby["pleanry_icon"]; ?>">
                        <p><?php if (isset($row_lobby['pleanry_text'])) {
                                    echo $row_lobby['pleanry_text'];
                                } ?></p>
                    </a>
                </div>
            </div>
            <?php  } ?>

            <?php if ($row_lobby['information_text_appears'] == 'yes') { ?>
            <div class="info-icon">
                <span><img src="<?php echo $row_lobby["information_icon"]; ?>"></span>
                <div class="go-atelier-btn ">
                    <a href="<?php echo $siteURL; ?>pleniere">
                        <img src="<?php echo $row_lobby["information_icon"]; ?>">
                        <p><?php if (isset($row_lobby['atelier_text'])) {
                                    echo $row_lobby['atelier_text'];
                                } ?></p>
                    </a>
                </div>

            </div>
            <?php } ?>



            <?php if ($row_lobby['help_desk_appears'] == 'yes') { ?>
            <!-- <div class="helpdesk-girl-icon">
                <a href="<?php if (isset($row_lobby['help_desk'])) {
                                echo $row_lobby['help_desk'];
                            } ?>" target="_blank">
                    <div class="helpdesk-girl-icon1">
                        <img src="<?php echo $row_lobby["help_desk_icon"]; ?>">
                    </div>
                    <div class="helpdesk-girl-icon2">
                        <img src="<?php echo $row_lobby["help_desk_icon"]; ?>">
                    </div>

                    <p><?php if (isset($row_lobby['help_desk_text'])) {
                            echo $row_lobby['help_desk_text'];
                        } ?> </p>
                </a>
            </div> -->
            <?php } ?>

            <div class="ihelpdesk-girl-icon">
                <a href="" target="_blank">
                    <div class="ihelpdesk-girl-icon1">
                        <img src="assets/images/Icone-10.png">
                    </div>
                    <div class="ihelpdesk-girl-icon2">
                        <img src="assets/images/Icone-10.png">
                    </div>

                    <p><?php if (isset($row_lobby['help_desk_text'])) {
                            echo $row_lobby['help_desk_text'];
                        } ?> </p>
                </a>
            </div>


            <?php if ($row_lobby['atelier_stream_video_appears'] == 'yes') { ?>
            <div class="go-atelier">
                <span><img src="<?php echo $row_lobby["atelier_icon"]; ?>"></span>
                <div class="go-atelier-btn">
                    <a href="<?php echo $siteURL; ?>pleniere.php">
                        <img src="<?php echo $row_lobby["atelier_icon"]; ?>">
                        <p><?php if (isset($row_lobby['atelier_text'])) {
                                    echo $row_lobby['atelier_text'];
                                } ?></p>
                    </a>
                </div>
            </div>
            <?php  } ?>

            <div class=" go-agenda go-atelier">
                <span><img src="admin/uploads/image/162584130916236804391620284334workshop-20.png"></span>
                <div class="go-atelier-btn">
                    <a id="GoTOLive" href="">
                        <img src="admin/uploads/image/162584130916236804391620284334workshop-20.png">
                        <p>Go to live</p>
                    </a>
                </div>
            </div>

            <div class="iframe Accreditation go-atelier">
                <span><img src="assets/images/icone_fullscreen.png"></span>
                <div class="go-atelier-btn">
                    <a href="assets/pdfs/test.pdf" target="_blank">
                        <img src="assets/images/icone_fullscreen.png">
                        <p>Accreditation</p>
                    </a>
                </div>
            </div>

            <div class="fbios go-atelier">
                <span><img src="assets/images/icone_fullscreen.png"></span>
                <div class="go-atelier-btn fbios_btn">
                    <a href="javascript:void(0)">
                        <img src="assets/images/icone_fullscreen.png">
                        <p>Faculity Bios</p>
                    </a>
                </div>
            </div>


            <?php if ($row_lobby['resources_icon_appears'] == 'yes') { ?>
            <div class="go-ressources">
                <span><img src="<?php echo $row_lobby["resources_icon"]; ?>"></span>
                <div class="go-ressources-btn">
                    <a href="javascript:void(0)">
                        <img src="<?php echo $row_lobby["resources_icon"]; ?>">
                        <p><?php if (isset($row_lobby['resources_text'])) {
                                    echo $row_lobby['resources_text'];
                                } ?></p>
                    </a>

                </div>
            </div>
            <?php } ?>

            <?php if ($row_lobby['our_website_appears'] == 'yes') { ?>
            <div class="visit-website">
                <span><img src="assets/images/icone_web.png"></span>
                <div class="visit-website-btn">
                    <a href="<?php if (isset($row_lobby['our_website'])) {
                                        echo $row_lobby['our_website'];
                                    } ?>" target="_blank">
                        <img src="assets/images/icone_web.png">
                        <p><span class="mob_txt_hide">Please</span> Visit our website</p>
                    </a>
                </div>
            </div>

            <?php } ?>

            <div class="watch-video-full">
                <span><img src="assets/images/icone_fullscreen.png"></span>
                <div class="watch-video-full-btn">
                    <a href="https://leaderboard.openrheum.com" data-lity
                        data-lity-target="https://leaderboard.openrheum.com">
                        <img src="assets/images/icone_fullscreen.png">
                        <p>Leader board</p>
                    </a>
                </div>
            </div>


            <div class="Qr6Zbo0 js-modal-btn" data-video-id="582121680">
                <img src="assets/images/av1.png" alt="1">
                <img src="assets/images/av2.png" class="img-top" alt="2">
            </div>

            <?php if ($row_lobby['resources_icon_appears'] == 'no') { ?>
            <div class="go-ressources">
                <span><img src="<?php echo $row_lobby["resources_icon"]; ?>"></span>
                <div class="go-ressources-btn">
                    <a href="javascript:void(0)">
                        <img src="<?php echo $row_lobby["resources_icon"]; ?>">
                        <p><?php if (isset($row_lobby['resources_text'])) {
                                    echo $row_lobby['resources_text'];
                                } ?></p>
                    </a>

                </div>
            </div>
            <?php } ?>


            <div class="go-corridor1">
                <span><img src="assets/images/Icone_arrow-right.png"></span>
                <div class="go-corridor1-btn">
                    <a href="<?php echo $siteURL; ?>corridor1.php">
                        <img src="assets/images/Icone_arrow-right.png">
                        <p>Workshop rooms</p>
                    </a>
                </div>
            </div>


            <!-- FOR SMALL DEVICES -->
            <div class="container d-flex justify-content-center align-items-center h-100">
                <div class="row" style="margin-top: 180px;">

                    <?php if ($row_lobby['stream_video_appears'] == 'yes') { ?>
                    <div class="col-md-6">
                        <a href="<?php echo $siteURL; ?>pleniere" class="btn lobby_btn btn-block mb-3">
                            <img src="admin/uploads/image/right-arrow.png" class="mr-3" width="24">
                            <span><?php if (isset($row_lobby['pleanry_text'])) {
                                            echo $row_lobby['pleanry_text'];
                                        } ?></span>
                        </a>
                    </div>
                    <?php } ?>


                    <?php if ($row_lobby['information_text_appears'] == 'yes') { ?>

                    <div class="col-md-6">
                        <a href="<?php echo $siteURL; ?>pleniere" class="btn lobby_btn btn-block mb-3">
                            <img src="admin/uploads/image/right-arrow.png" class="mr-3" width="24">
                            <span><?php if (isset($row_lobby['atelier_text'])) {
                                            echo $row_lobby['atelier_text'];
                                        } ?></span>
                        </a>
                    </div>
                    <?php } ?>



                    <?php if ($row_lobby['our_website_appears'] == 'yes') { ?>

                    <div class="col-md-6">
                        <a href="<?php if (isset($row_lobby['our_website'])) {
                                            echo $row_lobby['our_website'];
                                        } ?>" target="_blank" class="btn lobby_btn btn-block mb-3">
                            <img src="admin/uploads/image/right-arrow.png" class="mr-3" width="24">
                            <span>Please Visit our website</span>
                        </a>
                    </div>
                    <?php } ?>


                    <?php if ($row_lobby['resources_icon_appears'] == 'yes') { ?>

                    <div class="col-md-6">
                        <a href="#" class="btn lobby_btn btn-block mb-3">
                            <img src="admin/uploads/image/right-arrow.png" class="mr-3" width="24">
                            <span><?php if (isset($row_lobby['resources_text'])) {
                                            echo $row_lobby['resources_text'];
                                        } ?></span>
                        </a>
                    </div>
                    <?php } ?>


                    <div class="col-md-6">
                        <a href="<?php echo $siteURL; ?>corridor1.php" class="btn lobby_btn btn-block mb-3">
                            <img src="admin/uploads/image/right-arrow.png" class="mr-3" width="24">
                            <span>Go To Corridor 2</span>
                        </a>
                    </div>

                    <div class="col-md-6">
                        <a href="<?php echo $siteURL; ?>fullscreen_video.php" target="_blank"
                            class="btn lobby_btn btn-block mb-3">
                            <img src="admin/uploads/image/right-arrow.png" class="mr-3" width="24">
                            <p>Watch the video in fullscreen</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="wlcome alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Hello user!</strong> Weclome <?php echo $_SESSION['userName'] ?> .
        <button type="button" class="close btn" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>



    <?php include 'footer.php';   ?>

<script type="text/javascript">
    $('document').ready(function() {
        $.ajax({
            type: "POST",
            url: '<?php echo $siteURL; ?>/gotoliveAjax.php',
            dataType: 'json',
            success: function(data) {
                if (data.response == true) {
                    $("#GoTOLive").attr("href", data.link);
                    // console.log(data.link);
                   
                }
            } 
        });
    })
    
     setInterval(function()
    {
      $.ajax({
        type: "POST",
        url: '<?php echo $siteURL; ?>/gotoliveAjax.php',
        dataType: 'json',
        success: function(data) {
            if (data.response == true) {
            $("#GoTOLive").attr("href", data.link);
            // console.log(data.link);

            }
        }
    });
    }, 10000); //time in milliseconds 




  </script>