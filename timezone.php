<?php
class TimeZone {
  
  function starttime( $starttim, $offsetval) {

  $zone = array("-12"=>"12:00","-11"=>"11:00","-10"=>"10:00","-9.5"=>"9:30","-9"=>"9:00","-8"=> "8:00","-7"=>"7:00","-6"=>"6:00","-5"=>"5:00","-4.5"=>"4:30","-4.0"=>"4:00","-3.5"=>"3:30","-3"=>"3:00","-2"=>"2:00","-1"=>"1:00","0"=>"0","1"=>"1:00","2"=>"2:00","3"=>"3:00","3.5"=>"3:30","4"=>"4:00","+4.5"=>"4:30","5"=>"5:00","5.5"=>"5:30","5.75"=>"5:45","6"=>"6:00","6.5"=>"6:30","7"=>"7:00","8"=>"8:00","8.75"=>"8:45","9"=>"9:00","9.5"=>"9:30","10"=>"10:00","10.5"=>"10:30","11"=>"11:00","11.5"=>"11:30","12"=>"12:00","12.75"=>"12:45","13"=>"13:00","14"=>"14:00");

    foreach($zone as $key => $row)
    {
       if ($key == $offsetval)
        $x = $row;
    }

    $n1 = strtotime($starttim);
    $n2 = strtotime($x);
    if($offsetval > 0)
    {
      $localtime =$n1 + $n2; 
    }else{
       $localtime =$n1 - $n2; 
    }
    $local_time1 = date("H:i", $localtime);
     echo $local_time1;

    }
  }

?>