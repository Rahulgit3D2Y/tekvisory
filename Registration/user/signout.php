<?php
session_start();
include("../admin/include/config.php");
 @$_SESSION['userlogin']; 
  error_reporting(1);
?>
<!DOCTYPE html>
<html>
<head>
  <title>User-Logout</title>
  <link rel="stylesheet"  type="text/css" href="../admin/css/all.css"/>
  <link rel="shortcut icon" href="../admin/image/favicon.ico">
  </head>
<body>

<?php
date_default_timezone_set('Asia/Kolkata'); 
$date=date("Y-m-d h:i:sa");
$datetime=$_SESSION['userdatetime'];
$loginid=$_SESSION['userlogin'];

if($loginid)
{
  // remove all session variables
session_unset();

// destroy the session
session_destroy();
mysqli_query($con,"UPDATE `logindetail` SET `logout_datetime` = '$date' WHERE `loginid` = '$loginid' AND `login_datetime` = '$datetime'")or die(mysqli_error()); 
echo "<script>window.location='index.php'</script>";
}
else
{
  // remove all session variables
session_unset();

// destroy the session
session_destroy();
// Redirect
echo "<script>window.location='index.php'</script>";
}

?>

</body>
</html>
