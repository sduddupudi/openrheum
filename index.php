<?php
include 'db_connection.php';
session_start();
error_reporting(0);
if (!empty($_SESSION["userID"])) {
    echo "<script>window.location = '" . $siteURL . "lobby';</script>";
}
function getRealIpAddr()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        // Check IP from internet.
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        // Check IP is passed from proxy.
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        // Get IP address from remote address.
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

// IP LOCATION START
$ips = getRealIpAddr();
$apiKey = "2794eab40bf344cc9c5a78b1f61bf12c"; // Replace API 
$ip = $ips;
$location = get_geolocation($apiKey, $ip);
$decodedLocation = json_decode($location, true);

// echo "<pre>";
// print_r($decodedLocation);
// echo "</pre>";

$countryname = $decodedLocation["country_name"];
$city =  $decodedLocation["city"];
$state =  $decodedLocation["state_prov"];
$ipadd =  $decodedLocation["ip"];
$time_zonenew  = json_decode($location, true);
// echo"<pre>" ;print_r($time_zonenew);
foreach ($decodedLocation as  $value) {
    $offset = $value["offset"];
    $time_zone = $value["name"];
}
// echo $newzone;
$usrlocation = "$countryname / $state / $city / $ipadd ";


// echo $usrlocation;

function get_geolocation($apiKey, $ip, $lang = "en", $fields = "*", $excludes = "")
{
    $url = "https://api.ipgeolocation.io/ipgeo?apiKey=" . $apiKey . "&ip=" . $ip . "&lang=" . $lang . "&fields=" . $fields . "&excludes=" . $excludes;
    $cURL = curl_init();
    curl_setopt($cURL, CURLOPT_URL, $url);
    curl_setopt($cURL, CURLOPT_HTTPGET, true);
    curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($cURL, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Accept: application/json'
    ));

    return curl_exec($cURL);
}

// IP LOCATION END 

if (isset($_POST['sign_in__button'])) {
    $sign_in_email = $_POST['sign_in_email'];
    $sign_in_password = $_POST['sign_in_password'];
    $encript_password = md5($sign_in_password);
    $get_sql = "SELECT * FROM user where userName ='" . $sign_in_email . "' AND Password ='" . $encript_password . "'  ";
    $result = $conn->query($get_sql);
    $row = $result->fetch_assoc();
    $loginout = "INSERT INTO `loginout`(`user_id`, `username`,`logout`) VALUES ('" . $row['userID'] . "','" . $row['userName'] . "','')";
    $result_res = $conn->query($loginout);
    $last_id = $conn->insert_id;
    $_SESSION["logoutid"] = $last_id;

    if (!empty($row)) {
        $_SESSION["userID"] = $row['userID'];
        $_SESSION["userName"] = $row['userName'];
        $_SESSION["userType"] = $row['userType'];
      // ======= new code =======//
        $sql_update = "UPDATE user SET `current_time_zone`='".$time_zone."' WHERE userID='" .$row['userID']."' ";
        if ($conn->query($sql_update) === TRUE) {
            $_SESSION["offset"] = $offset;
            $_SESSION["time_zone"] = $time_zone;
       }
       // ======= new code =======//
        //$_SESSION["token"] = $token;
        if ($row['userType'] == "customer") {
         
            echo "<script>window.location = '" . $siteURL . "admin';</script>";
            
        } else {
            echo "<script>window.location = '" . $siteURL . "lobby';</script>";
        }
    } else {
        $sign_in_error = "Error: Incorrect username and password Please try again!";
    }
}


?>

<?php
$site_sql = "SELECT site_logo,help_link,site_title FROM lobby  ";
$get_site_logo = $conn->query($site_sql);
$row_site_logo = $get_site_logo->fetch_assoc();

$ips_sql = "SELECT * FROM index_page_settings";
$get_ips = $conn->query($ips_sql);
$row_ips = $get_ips->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="">
    <title>Openrheum</title>
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="main">
        <div class="container">
            <div class="row ">
                <div class="wrap col-md-3 order-1">
                    <form class="login-form" method="POST">
                        <img src="img/logo.png" alt="">
                        <h2>Sign In</h2>
                        <div class="input-container">
                            <i class="fa fa-envelope icon"></i>
                            <label>Username</label>
                            <input class="input-field" type="text" placeholder="Email" name="sign_in_email">
                        </div>
                        <div class="input-container">
                            <i class="fa fa-key icon"></i>
                            <label>Password</label>
                            <input class="input-field" type="password" placeholder="Password" name="sign_in_password">
                        </div>
                        <a hidden class="forgot-password" href="">Forgot Password ?</a>
                        <p>Your personal data is processed to allow you to connect to the Dorier platform. For more
                            information on the processing of your personal data.<a class="click" href="">CLICK HERE</a>
                        </p>
                        <p>
                            <input type="checkbox" id="policy" name="policy" value="Bike"> I have read the personal data
                            protection policy.
                        </p>
                        <button type="submit" name="sign_in__button" class="btn_s">SIGN IN</button>
                    </form>
                </div>
                <div class="col-md-9 ">
                    <div class="logo">
                        <a href=""><img src="img/Abbvie_Landing__Header.png" alt=""></a>
                    </div>
                    <div class="event">
                        <h2>A highly interactive and innovative educational event</h2>
                        <div class="date-sec">
                            <a class="date" href="">SEPTEMBER 24th + 25th 2021</a>
                        </div>
                        <p>Dear Delegate,<br>
                            Innovation is a word on everybody’s lips, but what does it mean in Rheumatology? How are we
                            transforming standards of care? On behalf of the Faculty,
                            I would like to invite you to explore innovation with us by attending Open Rheum, a virtual
                            educational event that will bring rheumatologists together from
                            across the globe.<br>
                            Our unique plenaries and workshops will allow you to personalize your educational experience
                            according to your preferences; as a sampling of this year’s
                            program, explore how to optimize treatment strategies, unravel challenging clinical cases,
                            and share the impact of COVID-19 on your practice. Recent
                            changes in clinical practice will guide our vision for the future.<br>
                            “Be the change you wish to see in the world.” <br>
                            Ghandi.
                        </p>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="row profile-info">
                                    <div class="col-md-5">
                                        <a class="profile" href=""><img src="img/profile.png" alt=""></a>
                                    </div>
                                    <div class="col-md-7">
                                        <img class="sign" src="img/sign.png" alt="">
                                        <h4>Professor Iain B. McInnes</h4>
                                        <h5>FRCP PhD FRSE FMedSci</h5>
                                        <p>Vice Principal and Head of CollegeCollege of Medical, Veterinary & Life
                                            SciencesUniversity of Glasgow, UK</p>
                                    </div>
                                </div>
                                <a class="button_s" href="/assets/pdfs/or_agenda.pdf" target="_blank">EVENT AGENDA</a>
                            </div>
                            <div class="col-md-4">
                                <img class="middle-sec" src="img/Together_picture.png" alt="">
                            </div>
                            <div class="col-md-4">
                                <a class="register"
                                    href="https://www.abbviemeetings.com/d/1mqjqn?ct=6bebeb06-81c6-4536-8cd2-c7ece55bed03"
                                    target="_blank"><img src="img/register.png" alt=""></a>
                                <h4>Join us on September 24th and 25th to experience this innovative virtual meeting
                                </h4>
                                <a class="register"
                                    href="https://www.abbviemeetings.com/d/1mqjqn?ct=6bebeb06-81c6-4536-8cd2-c7ece55bed03"
                                    target="_blank"><img src="assets/images/watch_video.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="event-agenda">
                        <div class="row">
                            <div class="col-md-6">
                                <a href="https://hc3.ca/ics/2021%20Open%20Rheum%20Virtual%20Event%20-%20DAY%201.ics">
                                    <img class="days" src="img/day1.png" alt=""></a>
                                <a class="download-calendar"
                                    href="https://hc3.ca/ics/2021%20Open%20Rheum%20Virtual%20Event%20-%20DAY%201.ics"><img
                                        src="img/download-calendar.png" alt=""></a>
                            </div>
                            <div class="col-md-6">
                                <a href="https://hc3.ca/ics/2021%20Open%20Rheum%20Virtual%20Event%20-%20DAY%202.ics">
                                    <img class="days" src="img/day2.png" alt=""></a>
                                <a class="download-calendar"
                                    href="https://hc3.ca/ics/2021%20Open%20Rheum%20Virtual%20Event%20-%20DAY%202.ics"><img
                                        src="img/download-calendar.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="map-footer">
                        <a class="button_s" href="">OPEN RHEUM 2021 FACULTY</a>
                        <p>28 rheumatology experts and other specialists from around the world will gather to present
                            this cutting-edge, scientic program.</p>
                        <!-- <img src="img/map-footer.png" alt=""> -->
                        <img src="img/footer.png" alt="">
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>

</html>