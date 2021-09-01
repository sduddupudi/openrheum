<?php
include 'header.php';

$lobby_sql = "SELECT * FROM lobby  ";
$get_lobby = $conn->query($lobby_sql);
$row_lobby = $get_lobby->fetch_assoc();



/*$qa_sql = "SELECT * FROM qalinks where customer_id ='".$customerID."' ";
$get_qa = $conn->query($qa_sql);
$row_qa = $get_qa->fetch_assoc();*/
 //print_r($row_qa);

$setting_sql = "SELECT * FROM settings ";
$get_setting = $conn->query($setting_sql);
$row_setting = $get_setting->fetch_assoc();
?>

<div id="main-wrapper">
    <div class="sidebar-main">
        <div class="logo-main">
            <a href="<?php echo $siteURL;?>"><img src="<?php echo $row_lobby['site_logo']; ?>"></a>
        </div>

        <div class="sidebar-toggle-main">
            <a href="javascript:void(0)"><img src="assets/images/logo_menu.png"></img></a>
        </div>

        <div class="sidebar-map-main">
            <a href="javascript:void(0)"><i class="fa fa-map-marker"></i></a>
        </div>
        <?php if($row_lobby['footer_hyperlink_text_appears'] == 'yes'){ ?>
        <div class="mentionlégales">
            <a href="<?php if(isset($row_lobby['footer_hyperlink'])){echo $row_lobby['footer_hyperlink']; } ?>"
                target=”_blank” style="color:#ED1C24; font-size:10px">
                <p><?php if(isset($row_lobby['footer_hyperlink_text'])){echo $row_lobby['footer_hyperlink_text']; } ?>
                </p>
            </a>
        </div>
        <?php } ?>
    </div>


    <div id="plentry" class="right_content" style="background-image: url(assets/images/Pleniere.jpg);">

        <div class="video-play">
            <span><img src="assets/images/icone_Rejoindre_Pleniere.png"></span>

            <div class="video-play-btn">
                <a href="<?php  echo $siteURL; ?>Plenary_Stream" target="_blank">
                    <!-- <a href="<?php if(isset($row_lobby['stream_video'])){ echo $row_lobby['stream_video']; } ?>" target="_blank"> -->
                    <img src="assets/images/icone_Rejoindre_Pleniere.png">
                    <p><span class="mob_txt_hide">Follow the Stream</span><span class="d-none">Join the webinar</span>
                    </p>
                </a>
            </div>
        </div>
        <?php if($row_lobby['qa_link_appears'] == 'yes'){ ?>
        <div class="Qa_link">
            <span><img src="assets/images/Q&A-44.png"></span>

            <div class="qa-link-btn">
                <a href="<?php echo $row_lobby['qa_link'];?>" target="_blank">
                    <img src="assets/images/Q&A-44.png">
                    <p>Follow The Q&A</p>
                </a>
            </div>
        </div>
        <?php } ?>
        <!--  <?php if($row_lobby['pleanry_1_de_appears'] == 'yes') {?>
            <div class="Germanflag">
                <span><img src="assets/images/Germanflag.png"></span>                
                <div class="Germanflag-btn">
                    <a href="pleniere_de.php" target="_blank">
                        <img src="assets/images/Germanflag.png">
                        <p><?php if(isset($row_setting['pleniere_de_btn_text'])){echo $row_setting['pleniere_de_btn_text']; } ?></p>
                    </a>
                </div>
            </div>
        <?php } if($row_lobby['pleanry_2_fr_appears'] == 'yes') {?>
            <div class="Frenchflag">
                <span><img src="assets/images/Frenchflag.png"></span>                
                <div class="Frenchflag-btn">
                    <a href="pleniere_fr.php" target="_blank">
                        <img src="assets/images/Frenchflag.png">
                        <p><?php if(isset($row_setting['pleniere_fr_btn_text'])){echo $row_setting['pleniere_fr_btn_text']; } ?></p>
                    </a>
                </div>
            </div>
        <?php } ?> -->

        <div class="back-icon">
            <span><img src="assets/images/icone_Retour.png"></span>
            <div class="back-icon-btn">
                <a href="<?php echo $siteURL; ?>lobby">
                    <img src="assets/images/icone_Retour.png">
                    <p>Back to lobby</p>
                </a>
            </div>
        </div>

    </div>

</div>


<div class="mobile_footer d-none">
    <ul class="d-flex">
        <li>
            <a href="lobby">
                <img src="assets/images/lobby_icon_active.png">
            </a>
        </li>
        <li>
            <a href="pleniere.php">
                <img src="assets/images/plenary_icon.png">
            </a>
        </li>
        <li>
            <a href="breakout1.php">
                <img src="assets/images/break1_icon.jpg">
            </a>
        </li>
        <li>
            <a href="breakout2.php">
                <img src="assets/images/break2_icon.jpg">
            </a>
        </li>
        <li>
            <a href="breakout3.php">
                <img src="assets/images/break3_icon.jpg">
            </a>
        </li>
        <li>
            <a href="breakout4.php">
                <img src="assets/images/break4_icon.jpg">
            </a>
        </li>
        <li>
            <a href="breakout5.php">
                <img src="assets/images/break5_icon.jpg">
            </a>
        </li>
        <li>
            <a href="breakout6.php">
                <img src="assets/images/break6_icon.jpg">
            </a>
        </li>
        <li>
            <a href="breakout7.php">
                <img src="assets/images/break7_icon.jpg">
            </a>
        </li>
        <li>
            <a href="breakout8.php">
                <img src="assets/images/break8_icon.jpg">
            </a>
        </li>
        <li>
            <a href="breakout9.php">
                <img src="assets/images/break9_icon.jpg">
            </a>
        </li>
    </ul>
</div>


<div class="icon-help">
    <a href="<?php if(isset($row_lobby['help_link'])){echo $row_lobby['help_link']; } ?>" target="_blank"><img
            src="assets/images/icone_chatbot.png"></a>
</div>



<?php
include 'footer.php';
?>