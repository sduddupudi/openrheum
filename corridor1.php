<?php
include 'header.php';
// echo $cid;
$lobby_sql = "SELECT * FROM lobby ";
$get_lobby = $conn->query($lobby_sql);
$row_lobby = $get_lobby->fetch_assoc();
// print_r($row_lobby);

$setting_sql = "SELECT * FROM settings ";
$get_setting = $conn->query($setting_sql);
$row_setting = $get_setting->fetch_assoc();

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

    <div id="corridor1" class="right_content" style="background-image: url(assets/images/Coridor_1.jpg);">

        <?php if ($cid == 'AbbVie') { ?>
        <div class="go-breakout1">
            <span><img src="admin/uploads/image/16236804551620284334workshop-20.png"></span>
            <div class="go-breakout1-btn">
                <a href="<?php echo $siteURL; ?>breakout1.php">
                    <img src="admin/uploads/image/16236804551620284334workshop-20.png">
                    <p><?php if (isset($row_setting['cr_gp1_btn_text'])) {
                                echo $row_setting['cr_gp1_btn_text'];
                            } ?></p>
                </a>
            </div>
        </div>
        <?php }
        if ($row_setting['breakout_2_appears'] == 'yes') { ?>
        <div class="go-breakout2">
            <span><img src="admin/uploads/image/16236804551620284334workshop-20.png"></span>
            <div class="go-breakout2-btn">
                <a href="<?php echo $siteURL; ?>breakout2.php">
                    <img src="admin/uploads/image/16236804551620284334workshop-20.png">
                    <p><?php if (isset($row_setting['cr_gp2_btn_text'])) {
                                echo $row_setting['cr_gp2_btn_text'];
                            } ?></p>
                </a>
            </div>
        </div>
        <?php }
        if ($row_setting['breakout_3_appears'] == 'yes') { ?>
        <div class="go-breakout3">
            <span><img src="assets/images/Icone_arrow-right.png"></span>
            <div class="go-breakout3-btn">
                <a href="<?php echo $siteURL; ?>breakout3.php">
                    <img src="assets/images/Icone_arrow-right.png">
                    <p><?php if (isset($row_setting['cr_respiratory_btn_text'])) {
                                echo $row_setting['cr_respiratory_btn_text'];
                            } ?>
                    </p>
                </a>
            </div>
        </div>
        <?php }
        if ($row_setting['breakout_4_appears'] == 'yes') { ?>
        <div class="go-breakout4">
            <span><img src="assets/images/Icone_arrow-right.png"></span>
            <div class="go-breakout4-btn">
                <a href="<?php echo $siteURL; ?>breakout4.php">
                    <img src="assets/images/Icone_arrow-right.png">
                    <p><?php if (isset($row_setting['cr_cardio_metabolic_btn_text'])) {
                                echo $row_setting['cr_cardio_metabolic_btn_text'];
                            } ?>
                    </p>
                </a>
            </div>
        </div>
        <?php }
        if ($row_setting['breakout_5_appears'] == 'yes') { ?>
        <div class="go-breakout5">
            <span><img src="assets/images/Icone_arrow-right.png"></span>
            <div class="go-breakout5-btn">
                <a href="<?php echo $siteURL; ?>breakout5.php">
                    <img src="assets/images/Icone_arrow-right.png">
                    <p><?php if (isset($row_setting['cr_ihd_cosentyx_pso_btn_text'])) {
                                echo $row_setting['cr_ihd_cosentyx_pso_btn_text'];
                            } ?>
                    </p>
                </a>
            </div>
        </div>
        <?php } ?>
        <div class="back-icon corr-left">
            <span><img src="assets/images/Icone_exit.png"></span>

            <div class="back-icon-btn">
                <a href="<?php //echo $siteURL; 
                            ?>lobby">
                    <img src="assets/images/Icone_exit.png">
                    <p>Back In The Lobby</p>
                </a>
            </div>
        </div>

        <!-- <div class="green-display-content">
                <p>Display the content of your choice</p>
            </div>
            
            
            <div class="green-link-download">
                <p>Link to download any type of document</p>
            </div> -->

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
            <a href="pleniere">
                <img src="assets/images/plenary_icon.png">
            </a>
        </li>
        <li>
            <a href="breakout1">
                <img src="assets/images/break1_icon.jpg">
            </a>
        </li>
        <li>
            <a href="breakout2">
                <img src="assets/images/break2_icon.jpg">
            </a>
        </li>
        <li>
            <a href="breakout3">
                <img src="assets/images/break3_icon.jpg">
            </a>
        </li>
        <li>
            <a href="breakout4">
                <img src="assets/images/break4_icon.jpg">
            </a>
        </li>
        <li>
            <a href="breakout5">
                <img src="assets/images/break5_icon.jpg">
            </a>
        </li>
        <li>
            <a href="breakout6">
                <img src="assets/images/break6_icon.jpg">
            </a>
        </li>
        <li>
            <a href="breakout7">
                <img src="assets/images/break7_icon.jpg">
            </a>
        </li>
        <li>
            <a href="breakout8">
                <img src="assets/images/break8_icon.jpg">
            </a>
        </li>
        <li>
            <a href="breakout9">
                <img src="assets/images/break9_icon.jpg">
            </a>
        </li>
    </ul>
</div>

<div class="helpdesk-girl-icon">
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
</div>
<?php
include 'footer.php';
?>