<?php
session_start();
include 'db_connection.php';
include 'timezone.php';

$ydas = $_SESSION["offset"];
$time_zone_new = $_SESSION["time_zone"];
$timeZone = new TimeZone();
$crnt_time = new DateTime("now", new DateTimeZone($time_zone_new));
$crnt_time_new = $crnt_time->format('H:i');

$sql = "SELECT * FROM `agenda` WHERE schedule_start_time <= '". $crnt_time_new. "' AND schedule_end_time > '". $crnt_time_new. "' LIMIT 1
";
// echo $sql;
$result = $conn->query($sql);
if($result->num_rows!=0){
  while ($new = mysqli_fetch_assoc($result)) { 
         // echo "<pre>"; print_r($new['link_url']);
     echo json_encode(array('response'=>true,'link'=>$new['link_url'])); 
       exit();
  } 
}