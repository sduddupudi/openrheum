<?php
include 'header.php';
$lobby_sql = "SELECT * FROM lobby ";
$get_lobby = $conn->query($lobby_sql);
$row_lobby = $get_lobby->fetch_assoc();
$info_icon_sql = "SELECT * FROM info_icon ";
$get_info_icon = $conn->query($info_icon_sql);
$row_info_icon = $get_info_icon->fetch_assoc();

?>
<style type="text/css">
    div#enter {
    width: 100%;
}
</style>
   <div id="main-wrapper">
        <div id="enter" class="right_content" style="background-image: url(assets/images/Enter.png);">
                       
            <div class="go-lobby">
                <span><img src="assets/images/icone_Entrer.png"></span>
                <div class="go-lobby-btn">
                    <a href="<?php echo $siteURL; ?>lobby.php">
                        <img src="assets/images/icone_Entrer.png">
                        <p>Go to lobby</p>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="icon-help">
        <a href="<?php if(isset($row_lobby['help_link'])){echo $row_lobby['help_link']; } ?>" target="_blank"><img src="assets/images/icone_chatbot.png"></a>
    </div>
<?php
include 'footer.php';
?>

    
