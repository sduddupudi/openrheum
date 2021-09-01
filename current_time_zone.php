<?php
session_start();
include 'db_connection.php';
include 'timezone.php';
$_SESSION["Redirection_url"] = 0;
$ydas = $_SESSION["offset"];
$time_zone_new = $_SESSION["time_zone"];
$timeZone = new TimeZone();

$crnt_time = new DateTime("now", new DateTimeZone($time_zone_new));
// $crnt_time_new = $crnt_time->format('Y-m-d H:i');
$crnt_time_new = $crnt_time->format('H:i');

$cat_sql = "SELECT * FROM agenda_cat ORDER BY sort ASC";
$cat_result = $conn->query($cat_sql);

 $x =strtotime('2021-08-30 11:30');
 $y =strtotime('2021-08-30 11:30');
 $z =strtotime('2021-08-30 12:55');

 $created_at = date("Y-m-d h:m:i");

while ($cat_row = mysqli_fetch_assoc($cat_result)) {

$sql = "SELECT * FROM agenda where agenda_category ='" . $cat_row["agenda_cat_id"] . "'
OR agenda_category_2 ='" . $cat_row["agenda_cat_id"] . "' OR agenda_category_3 ='" . $cat_row["agenda_cat_id"] . "' ORDER BY agenda_category, schedule_start_time ASC";
$result = $conn->query($sql);
$get_row3 = $conn->query($sql);

while ($new = mysqli_fetch_assoc($get_row3)) {

 if (strtotime($new["schedule_start_time"]) <= strtotime($crnt_time_new) && strtotime($crnt_time_new) >= strtotime($new["schedule_end_time"])) {

 	// if($y<=$x || $z > $x){

 	$get_sql = "SELECT * FROM redirection_management where agendaID ='" .$new['agendaID'] . "' ";
    $result = $conn->query($get_sql);
    $row = $result->fetch_assoc();
	// echo "<pre>"; print_r($row); // echo "<pre>"; print_r(count($row)); 
	if(count($row)==0){
		$re = $new['link_url'];
		$redirection = "INSERT INTO `redirection_management`(`agendaID`,`customerID`,`status`,`created_at`) VALUES ('" . $new['agendaID'] . "','" . $_SESSION['userID'] . "',1,'".$created_at."')";
		$result_res = $conn->query($redirection);
		 echo json_encode(array('response'=>true,'link'=>$re));	
		  exit();
	}

  }

 }

}