<?php
// include 'header.php';

?>

<?php
date_default_timezone_set('Europe/London');
$current_date = date("Y-m-d");
$current_time = date("H:i");
$custom_date = '18:11:01';
$current_date_time = date("Y-m-d H:i:s");
$end_date_time = '2021-08-19 09:28:00';
$date1 = strtotime($current_date_time);
$date2 = strtotime($end_date_time);
$custom_diff = strtotime($custom_date) - strtotime($current_time);
$end_date = date('2021-08-19');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Stream</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/responsive.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" />

    <style type="text/css">
    @media (max-width: 767px) {
        .icon-help {
            display: none;
        }
    }

    button#logout_btn {
        background: transparent;
        color: black;
        border: none;
    }
    </style>
    <link rel="stylesheet" type="text/css" href="assets/css/style2.css">
</head>
<style>
body {
    background: #000000 !important;
}

.logonew {
    position: absolute;
    display: flex;
    bottom: 7%;
    cursor: pointer;
    width: 10%;
    left: 2%;

}

img#logolive {
    width: 150%;
    height: auto;
}

html {
    overflow: hidden
}

#logoutbtn {
    position: absolute;
    right: 6%;
    top: 20px;
}

img.imglgt {
    width: 60px;
    height: auto;
}

.logonew {
    position: absolute;
    display: flex;
    top: 3%;
    cursor: pointer;
    left: 1%;
    height: auto;
}

.back-icon-webinar.back_icon_video_plenary {
    position: absolute !important;
    top: -1%;
    right: 15px;
    z-index: 1;
    display: none;
}

.help-text {
    color: #fff;
    font-size: 15px;
    position: absolute;
    top: 18px;
    left: 67.5%;
    z-index: 1;
}

@media screen and (min-width: 1620px) {
    div.video_frame {
        width: 80%;
        height: 100%;
        position: fixed;
        top: 0;
        left: 0;
    }

    div.video_frame iframe {
        width: 98%;
        height: 89%;
        position: absolute;
        top: 10%;
        bottom: 10%;
        left: 10px;
        right: 10px;
    }

    div.iframe_side_content {
        width: 20%;
        min-height: 560px;
        float: right;
        overflow-y: hidden;
    }

    div.iframe_side_content iframe {
        width: 100%;
    }
}

@media screen and (max-width: 1600px) {
    div.video_frame {
        width: 75%;
        height: 100%;
        position: fixed;
        top: 0;
        left: 0;
    }

    div.video_frame iframe {
        width: 98%;
        height: 89%;
        position: absolute;
        top: 10%;
        bottom: 10%;
        left: 10px;
        right: 10px;
    }

    div.iframe_side_content {
        width: 25%;
        overflow-y: hidden;
        position: absolute;
        right: 0%;
    }

    div.iframe_side_content iframe {
        width: 100%;
    }

    .iframe_side_content iframe {
        height: 100vh !important;
    }
}

@media screen and (max-width: 1119px) {
    div.video_frame {
        width: calc(100% - 280px);
        height: 100%;
        position: fixed;
        top: 0;
        left: 0;

    }

    div.video_frame iframe {
        width: 98%;
        height: 80%;
        position: absolute;
        top: 10%;
        bottom: 10%;
        left: 5px;
        right: 5px;
    }

    div.iframe_side_content {
        width: 280px;
        min-height: 560px;
        float: right;
        overflow-y: hidden;
    }

    div.iframe_side_content iframe {
        width: 100%;
    }

    .help-text {
        position: absolute;
        top: 22px;
        left: calc(100% - 378px);
    }
}

@media screen and (max-width: 600px) {
    .text-center {
        display: none;

    }

    div.video_frame {
        width: 100%;
        height: 30%;
    }

    div.video_frame iframe {
        width: calc(100% + 1px);
        height: 100%;
        position: absolute;
        top: -10px;
        bottom: 0;
        left: 0;
        right: 0;
    }

    div.iframe_side_content {
        position: absolute;
        top: 28%;
        width: 100%;
        height: 72%;
        min-height: 0;
        float: none;
        overflow-y: scroll;
    }

    div.iframe_side_content iframe {
        width: 100%;
        height: 100%;
    }

    .back-icon-webinar.back_icon_video_plenary {
        position: absolute !important;
        top: -1%;
        right: 5px;
        z-index: 1;
        display: block;
    }

    .logonew {
        display: none;
    }

    .help-text {
        position: absolute;
        top: 1%;
        left: 15px;
    }
}
</style>

<body>
    <div class="fullscreen_video">
        <div class="back-icon-webinar back_icon_video_plenary">
            <span><img src="assets/images/Icone_exit.png"></span>
            <div class="back-icon-webinar-btn">
                <a href="/lobby">
                    <img src="assets/images/Icone_exit.png">
                    <span id="email" hidden><?php echo $piwicid ?></span>
                    <p>Logout</p>
                </a>
            </div>
        </div>
        <div id="myBtn" class="video_frame">
            <div class="embed-container">
                <div style="color:red;" id="seconds-counter"></div>
                <iframe
                    src="https://player.sparkup.live/?name=sparkup_live&key=dorier-test-2021-06-11&react=true&reactb=true&reactr=true"
                    frameborder="0" allow="autoplay" allowfullscreen></iframe>
            </div>
            <div id="" class="logonew">
                <div>
                    <img id="" src="">
                </div>
            </div>
        </div>
        <div class="iframe_side_content">
            <iframe src="https://app.eu.sparkup.live/connect/LRBUS" frameBorder="0" class=""></iframe>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js">
    </script>

    <script type="text/javascript">
    var myusrelement = document.querySelector("#email");

    if (my_userid_element) {
        var _paq = window._paq || [];
        var userid_for_piwikpro = my_userid_element.textContent.trim();
        if (userid_for_piwikpro.length > 0) {
            _paq.push(['setUserId', userid_for_piwikpro]);
            _paq.push([function() {
                this.trackRequest('ping=1')
            }]);
        };
    };
    </script>


    <script>
    seconds = "<?php echo $custom_diff ?>";
    var el = document.getElementById('seconds-counter');

    function counter_time() {

        seconds -= 1;
        el.innerText = "You will be redirected to breakout " + seconds + " seconds.";
        if (seconds == 0) {
            window.location.replace("https://staging.openrheum.com/breakout1.php");
        }
    }
    var cancel = setInterval(counter_time, 1000);
    </script>
</body>

</html>