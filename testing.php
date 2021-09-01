<?php
// session_start();
// echo "<pre>"; print_r($_SESSION);
	echo $x =strtotime('2021-08-27 11:30');
	echo"<br>";
	$new["schedule_date"] = '2021-08-27';
	$new["schedule_date1"] = '2021-08-27';
	$new["schedule_end_time"] = '11:00'; 
	$new["schedule_start_time"] = '12:55';
	echo $y = strtotime($new["schedule_date"] . $new["schedule_start_time"]);
	echo"<br>";
	echo $z = strtotime($new["schedule_date1"] . $new["schedule_end_time"]);
?>

 <h6 class="metting_title mb-0">
        <?php if (($x <= $y) && ($z >= $x)){
              echo '<img class="img_gif" src="/livenow.gif">';
		}?>
    </h6>



