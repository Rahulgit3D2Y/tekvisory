<?php
include("include/config.php");
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="image/favicon.ico">
	<?php
	extract($_REQUEST);
 $Mailid=$_GET['mailcontent_id'];
 $mailsql=mysqli_query($con,"SELECT * FROM `mailcontent` WHERE `mailcontent_status`='Active' AND `mailcontent_id` = '$Mailid'");
 $mailresult=mysqli_fetch_assoc($mailsql);
  $mailSubject=$mailresult['mailcontent_subject'];
        
        $Mailbody=$mailresult['mailcontent_body']; 
	?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $mailSubject;?></title>
</head>
 <body  oncontextmenu="return false">
<?php echo $Mailbody;?>

</body>
</html>