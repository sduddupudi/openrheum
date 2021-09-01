<?php
include 'header.php';

$lobby_sql = "SELECT * FROM lobby ";
$get_lobby = $conn->query($lobby_sql);
$row_lobby = $get_lobby->fetch_assoc();
// print_r($row_lobby);
?>
<div id="main-wrapper">
    <div class="sidebar-main">
        <div class="logo-main">
            <a href="<?php echo $siteURL; ?>"><img src="<?php echo $row_lobby['site_logo']; ?>"></a>
        </div>

        <div class="sidebar-toggle-main">
            <a href="javascript:void(0)"><img src="assets/images/logo_menu.png"></img></a>
        </div>

        <div class="sidebar-map-main">
            <a href="javascript:void(0)"><i class="fa fa-map-marker"></i></a>
        </div>
        <?php if ($row_lobby['footer_hyperlink_text_appears'] == 'yes') { ?>
        <div class="mentionlégales">
            <a href="<?php if (isset($row_lobby['footer_hyperlink'])) {
                                echo $row_lobby['footer_hyperlink'];
                            } ?>" target=”_blank” style="color:#ED1C24; font-size:10px">
                <p><?php if (isset($row_lobby['footer_hyperlink_text'])) {
                            echo $row_lobby['footer_hyperlink_text'];
                        } ?>
                </p>
            </a>
        </div>
        <?php } ?>
    </div>

    <div id="coffee_break" class="right_content" style="background-image: url(assets/images/Coffee_Break.png);">

        <?php if ($row_lobby['coffee_break_appears'] == 'yes') { ?>

        <?php } ?>
        <div class="icon_div coffee_break_video_confrence btn_1">
            <span><img class="img_1" src="assets/images/1.png"></span>
            </a>
        </div>
    </div>
    <div class="icon_div coffee_break_video_confrence btn_2">
        <span><img class="img_1" src="assets/images/2.png"></span>
    </div>
    <div class="icon_div coffee_break_video_confrence btn_3">
        <span><img class="img_1" src="assets/images/3.png"></span>
    </div>
    <div class="icon_div coffee_break_video_confrence btn_4">
        <span><img class="img_1" src="assets/images/4.png"></span>
    </div>
    <div class="icon_div coffee_break_video_confrence btn_6">
        <span><img class="img_1" src="assets/images/11.png"></span>
    </div>
    <div class="icon_div coffee_break_video_confrence btn_7">
        <span><img class="img_1" src="assets/images/22.png"></span>
    </div>
    <div class="icon_div coffee_break_video_confrence btn_8">
        <span><img class="img_1" src="assets/images/33.png"></span>
    </div>
    <div class="icon_div coffee_break_video_confrence btn_10">
        <span><img class="img_1" src="assets/images/44.png"></span>
    </div>
    <div class="back-icon">
        <span><img src="assets/images/Icone_exit.png"></span>
        <div class="back-icon-btn">
            <a href="<?php echo $siteURL; ?>lobby.php">
                <img src="assets/images/Icone_exit.png">
                <p>back to lobby</p>
            </a>
        </div>
    </div>

</div>

</div>




<div class="icon-help">
    <a href="<?php if (isset($row_lobby['help_link'])) {
                    echo $row_lobby['help_link'];
                } ?>" target="_blank"><img src="assets/images/icone_chatbot.png"></a>
</div>


<?php
include 'footer.php';
?>