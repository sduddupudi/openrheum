<?php
// include 'header.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Test</title>
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
    /* border-top:10px solid #bda869 !important; */
    background: #000000 !important;
}

.logonew {
    position: absolute;
    /* background: #fff; */
    /* width: 48px;
    height: 108px; */
    display: flex;
    bottom: 7%;
    /* top: 3%; */
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

/*.help-text i {
    height: 40px;
    width: 40px;
    border: 2px solid #bda869;
    border-radius: 40px;
    line-height: 40px;
    display: table;
    margin: 0 auto 5px;
}
*/
@media screen and (min-width: 1620px) {
    div.video_frame {
        width: 80%;
        height: 100%;
        position: fixed;
        top: 0;
        left: 0;
        /* background: url(https://alconnothingevent.com/images/stream.jpg) no-repeat center center; */
        /* border-top: 10px solid #bda869 !important;
        border-right: 1px solid #bda869 !important; */
        /* background-size: cover; */
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
        /* min-height: 560px;
        float: right; */
        overflow-y: hidden;
        position: absolute;
        right: 0%;
        /* top:5%; */
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
                <a href="/logout">
                    <img src="assets/images/Icone_exit.png">
                    <span id="email" hidden><?php echo $piwicid ?></span>
                    <p>Logout</p>
                </a>
            </div>
        </div>

        <div id="myBtn" class="video_frame">
            <div class="embed-container">
                <iframe
                    src="https://player.sparkup.live/?name=sparkup_live&key=dorier-test-2021-06-11&react=true&reactb=true&reactr=true"
                    frameborder="0" allow="autoplay" allowfullscreen></iframe>
            </div>

            <div id="Alcon_Logo" class="logonew">
                <div>
                    <img id="logolive" src="">
                </div>
            </div>
        </div>

        <div class="iframe_side_content">
            <iframe src="https://app.eu.sparkup.live/connect/LRBUS" frameBorder="0" class=""></iframe>
        </div>

        <a href="https://teams.microsoft.com/l/meetup-join/19%3ameeting_ZmQ3M2FiOGYtYmYzMi00OTFjLWE1ZDAtYzQ5YmU5MTEwOGQx%40thread.v2/0?context=%7b%22Tid%22%3a%22ac144e41-8001-48f0-9e1c-170716ed06b6%22%2c%22Oid%22%3a%223b875e76-643d-4743-a17b-0d5f1e6a138b%22%7d"
            target="_blank">
            <h4 class="text-center help-text d-sm-flex justify-content-sm-center align-items-sm-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40">
                    <g id="Group_2801" data-name="Group 2801" transform="translate(-645 -3316)">
                        <g id="Group_2800" data-name="Group 2800">
                            <g id="Ellipse_56" data-name="Ellipse 56" transform="translate(645 3316)" fill="none"
                                stroke="#FFFFFF" stroke-width="2">
                                <circle cx="20" cy="20" r="20" stroke="none" />
                                <circle cx="20" cy="20" r="19" fill="none" />
                            </g>
                            <path id="ellipsis-v-solid"
                                d="M26.553,14.24A2.553,2.553,0,1,1,24,16.793,2.551,2.551,0,0,1,26.553,14.24ZM24,10.553A2.553,2.553,0,1,0,26.553,8,2.551,2.551,0,0,0,24,10.553Zm0,12.481a2.553,2.553,0,1,0,2.553-2.553A2.551,2.551,0,0,0,24,23.033Z"
                                transform="translate(681.812 3309.466) rotate(90)" fill="#FFFFFF" />
                        </g>
                    </g>
                </svg>

                <span class="ml-sm-2 d-sm-block d-none">HELP</span>
            </h4>
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

</body>

</html>