<?php
session_start();
    include("admin/include/config.php");
    error_reporting(1);
 date_default_timezone_set('Asia/Kolkata'); 
$tempactivesessionquery=mysqli_query($con,"SELECT * FROM `session` WHERE `status` ='Active'");
$tempresactivesessionquery=mysqli_fetch_assoc($tempactivesessionquery);
$temp_activesession_record=$tempresactivesessionquery['session_year'];

$id = $_GET["id"];
$Type= $_GET["Type"];
if($Type=="TeamNameCheck") {
$sql = "SELECT * FROM `registration` WHERE `team_name` = '$id' AND `session`='$temp_activesession_record' AND `student_status`='Active'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
  echo "<span style='color:red'>Name found in database</span>";
} else {
  echo "<span style='color:green'>Name not found in database</span>";
}
 }
 else if($Type=="StudentidCheck")
 {
  $sql = "SELECT * FROM `registration` WHERE `student_id` = '$id' AND `session`='$temp_activesession_record' AND `student_status`='Active'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
  echo "<span style='color:red'>Name found in database</span>";
} else {
   $sql1 = "SELECT * FROM `team_detail` WHERE `teammember_studentid` = '$id'AND `teammember_studentsession`='$temp_activesession_record' AND `teammember_studentstatus`!='InActive'";
$result1 = $con->query($sql1);

if ($result1->num_rows > 0) {
  echo "<span style='color:red'>Name found in database</span>";
} else {
  echo "<span style='color:green'>Name not found in database</span>";
}
}
 }
 else if($Type=="StudentEmailCheck")
 {
  $sql = "SELECT * FROM `registration` WHERE `student_email` = '$id' AND `session`='$temp_activesession_record' AND `student_status`='Active'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
  echo "<span style='color:red'>Name found in database</span>";
} else {
   $sql1 = "SELECT * FROM `team_detail` WHERE `teammember_studentemail` = '$id'AND `teammember_studentsession`='$temp_activesession_record' AND `teammember_studentstatus`!='InActive'";
$result1 = $con->query($sql1);

if ($result1->num_rows > 0) {
  echo "<span style='color:red'>Name found in database</span>";
} else {
  echo "<span style='color:green'>Name not found in database</span>";
}
}
 }

?>
