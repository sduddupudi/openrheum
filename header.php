<?php
include 'db_connection.php';
session_start();


require_once(dirname( __FILE__ ) . "/ChatweeV2_SDK/Chatwee.php");

ChatweeV2_Configuration::setChatId('60f96c3ea471a961bf76e172');
ChatweeV2_Configuration::setClientKey('52ee020bd6cfd7144749e201');

try {
    ChatweeV2_Session::setSessionId($_SESSION["chatweesessionid"]);
    echo "The session ID has been set";
  } catch(Exception $exception) {
    echo "An error occured: " . $exception->getMessage();
  }

// echo $sessionId;
// die;


$usernams = $_SESSION["userName"];
$cid =  $_SESSION["userType"];

// date_default_timezone_set(Europe/Paris);
// echo "...".date("h:i:sa");
// echo "Current timezone"."\t" .$_SESSION["offset"];
$ydas = $_SESSION["offset"] . "hours";
// echo $ydas;
if (isset($_POST['logout_btn'])) {
    $logout = "UPDATE `loginout` SET `logout`=date('Y-m-d H:i:s') WHERE id='" . $_SESSION["logoutid"] . "'";
    $result_res_logout = $conn->query($logout);

    $conn->query("delete from user_token where userID = '" . $_SESSION["userID"] . "' ");

    session_unset();
}

if (empty($_SESSION["userID"])) {
    echo "<script>window.location = '" . $siteURL . "';</script>";
}

$site_sql_h = "SELECT site_logo,site_title FROM lobby ";
$get_site_logo_h = $conn->query($site_sql_h);
$row_site_logo_h = $get_site_logo_h->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $row_site_logo_h['site_title']; ?></title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/modal-video.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/responsive.css" rel="stylesheet">
    <script src="https://chatwee-api.com/v2/script/60f96c3ea471a961bf76e172.js"></script>
    <!-- lity -->
    <link href="assets/dist/lity.css" rel="stylesheet">
    <script src="assets/dist/jquery.js"></script>
    <script src="assets/dist/lity.js"></script>

    <!-- lity -->

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

<body>
    <div class="lds-dual-ring"></div>
    <div id="loader-wrappers">