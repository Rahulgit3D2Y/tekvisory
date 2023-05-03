<?php 

   session_start();
    include("admin/include/config.php");
 $tempactivesessionquery=mysqli_query($con,"SELECT * FROM `session` WHERE `status` ='Active'");
$tempresactivesessionquery=mysqli_fetch_assoc($tempactivesessionquery);
$temp_activesession_record=$tempresactivesessionquery['session_year'];
$EventnameQuery =mysqli_query($con,"SELECT *  FROM `course_fee`  WHERE `status`='Active' and `session`='$temp_activesession_record'"); 
$resultEventnameQuery=mysqli_fetch_assoc($EventnameQuery);
$eventamount=$resultEventnameQuery['course_fee'];
 echo $amountset="5000";
 echo "<br>";
 echo $eventamount*100;



 ?>