<?php
include 'header.php';

$lobby_sql = "SELECT * FROM lobby ";
$get_lobby = $conn->query($lobby_sql);
$row_lobby = $get_lobby->fetch_assoc();

?>



<!-- <div class="youtube_video">
	<iframe width="100%" height="500" src="https://www.youtube.com/embed/ffKPUjGWyTk?autoplay=1" frameborder="0" allowfullscreen></iframe>
</div> -->

<div class="fullscreen_video">
	<!-- <video width="100%" height="500" controls autoplay> -->
     <iframe src="<?php if(isset($row_lobby['video_url'])){echo $row_lobby['video_url']; } ?>" width="100%" height="800" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
      <!-- <source src="<?php if(isset($row_lobby['video_url'])){echo $row_lobby['video_url']; } ?>" type="video/mp4"> -->

	</video>
</div>

<div class="back-icon-webinar back_icon_video_plenary">
    <span><img src="assets/images/icone_Retour.png"></span>
    <!-- <span><img src="assets/images/Icone_exit.png"></span> -->

    <div class="back-icon-webinar-btn">
        <a href="<?php echo $siteURL; ?>lobby">
            <img src="assets/images/icone_Retour.png">
            <!-- <img src="assets/images/Icone_exit.png"> -->
            <p>Go Back</p>
        </a>
    </div>
</div>

<!--<div class="back-icon-webinar back_icon_video_page">
    <span><img src="assets/images/Icone_exit.png"></span>

    <div class="back-icon-webinar-btn">
        <a href="lobby.html">
            <img src="assets/images/Icone_exit.png">
            <p>Go Back</p>
        </a>
    </div>
</div>-->


<?php
include 'footer.php';
?>
