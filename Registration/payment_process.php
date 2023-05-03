<?php 

   session_start();
    include("admin/include/config.php");
    require 'admin/phpmailer/PHPMailerAutoload.php';

require 'admin/razorpay/Razorpay.php';
include('admin/razorpay/src/Api.php');
use Razorpay\Api\Api;

 $tempactivesessionquery=mysqli_query($con,"SELECT * FROM `session` WHERE `status` ='Active'");
$tempresactivesessionquery=mysqli_fetch_assoc($tempactivesessionquery);
$temp_activesession_record=$tempresactivesessionquery['session_year'];
$EventnameQuery =mysqli_query($con,"SELECT *  FROM `course_fee`  WHERE `status`='Active' and `session`='$temp_activesession_record' AND `event_status`='Active'"); 
$resultEventnameQuery=mysqli_fetch_assoc($EventnameQuery);
$eventamount=$resultEventnameQuery['course_fee'];
 
$amountset=$eventamount*100;
$key="rzp_test_5J6dsIZe19EHmm";
$secret="t6iXROmFaiXkfZjYb45kUWU2";

$api = new Api($key, $secret);

$mailsql=mysqli_query($con,"SELECT * FROM `mailcontent` WHERE `mailcontent_status`='Active' AND `mailcontent_session` = '$temp_activesession_record'");
 $mailresult=mysqli_fetch_assoc($mailsql);
        $mailSubject=$mailresult['mailcontent_subject'];
        $mailidname=$mailresult['mailcontent_mailidname'];
        $Mailbody=$mailresult['mailcontent_body']; 
   ?>

 <?php
 extract($_POST);
 $finalstatus="Active";
 //echo $_SESSION['receiptnumber'];
 //echo $_SESSION['messgae'];
 date_default_timezone_set('Asia/Kolkata');      
$date=date("Y-m-d h:i:sa");
$currentdateonly=date("Y-m-d");
$timeonly=date("h:i:sa");

 if(isset($_POST['TotalAmount']) && isset($_POST['student_id'])&& isset($_POST['cdate'])&& isset($_POST['receiptnumber']))
{
 $StudentId=$_POST['student_id'];
 $inputStudentAmountPaid=$_POST['TotalAmount'];
  $inputStudentFeeDate=$_POST['cdate'];
  $inputStudentReceipt=$_POST['receiptnumber'];

  $studentupdatequery="UPDATE `registration` SET `cpaid_date`='$inputStudentFeeDate',`feeupdatetime`='$date' WHERE `receipt_number` = '$inputStudentReceipt'";
mysqli_query($con,$studentupdatequery);
$_SESSION['receiptnumber']=$inputStudentReceipt;
}

//Update Fee 

if( isset($_POST['invoice_number']) && isset($_SESSION['receiptnumber']))
{
    $invoice_number=$_POST['invoice_number'];
    
  // $_SESSION['message']="1";

   $updatedata=mysqli_query($con,"SELECT * FROM `registration` WHERE `receipt_number`='".$_SESSION['receiptnumber']."'");
$UPdateresult=mysqli_fetch_assoc($updatedata)or die();
$studentname=$UPdateresult['student_name'];
$studentemail=$UPdateresult['student_email'];
$studentid=$UPdateresult['student_id'];
$ReceiptNumberid=$UPdateresult['receipt_number'];
$teamidaddrecord=$UPdateresult['payment_id'];
$EmailQuerySql=mysqli_query($con,"SELECT * FROM `email_config` WHERE `id`='1'");
$EmailQuerySqlResult=mysqli_fetch_assoc($EmailQuerySql)or die();
  
$mail = new PHPMailer;

$mail->isSMTP();  

$mail->Host = $EmailQuerySqlResult['smtp_server'];   // Specify main and backup SMTP servers
$mail->SMTPSecure = $EmailQuerySqlResult['ssl_tls'];              // Enable TLS encryption, `ssl` also accepted
$mail->Port = $EmailQuerySqlResult['smtp_port'];  
$mailusergmail=$EmailQuerySqlResult['smtp_username'];
$mailusergmailpassword=$EmailQuerySqlResult['smtp_password'];


$mailusername=$mailidname;
$mail->SMTPAuth = true;   
$mail->isHTML(true);                             // Enable SMTP authentication
$mail->Username = "$mailusergmail";                 // SMTP username
$mail->Password = "$mailusergmailpassword";                           // SMTP password
                                 // TCP port to connect to
$mail->setFrom("$mailusergmail", "$mailusername");
$mail->addReplyTo("$mailusergmail", "$mailusername");

$mail->addAddress("$studentemail", "$studentname");     // Add a recipient



                                 // Set email format to HTML
$Mailbody=str_replace('{{Student_Name}}', $studentname, $Mailbody);
$Mailbody=str_replace('{{Student_Email}}', $studentemail, $Mailbody);
$Mailbody=str_replace('{{Student_id}}', $studentid, $Mailbody);
$Mailbody=str_replace('{{Login_ID}}', $ReceiptNumberid, $Mailbody);

$mail->Subject = "$mailSubject";
$mail->Body    = "$Mailbody";

$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';


if(!$mail->send())
 {
   $errormsg=$mail->ErrorInfo;
   $mailfailquery="UPDATE `registration` SET `mailstatus`='Failed',`mailsenddate`='$currentdateonly',`mailsendtime`='$timeonly',`mailsenddatetime`='$date',`mailfailreason`='$errormsg' WHERE `receipt_number`='".$_SESSION['receiptnumber']."' ";
   mysqli_query($con,$mailfailquery);

    $teammembermailfailquery="UPDATE `team_detail` SET `mailstatus`='Failed',`mailsenddate`='$currentdateonly',`mailsendtime`='$timeonly',`mailsenddatetime`='$date',`mailfailreason`='$errormsg' WHERE `team_id`='$teamidaddrecord' ";
   mysqli_query($con,$teammembermailfailquery);


}
 else
 {
    $mailquery="UPDATE `registration` SET `mailstatus`='Success',`mailsenddate`='$currentdateonly',`mailsendtime`='$timeonly',`mailsenddatetime`='$date',`mailfailreason`='' WHERE `receipt_number`='".$_SESSION['receiptnumber']."'";
   mysqli_query($con,$mailquery);

   $teammembermailquery="UPDATE `team_detail` SET `mailstatus`='Success',`mailsenddate`='$currentdateonly',`mailsendtime`='$timeonly',`mailsenddatetime`='$date',`mailfailreason`='' WHERE `team_id`='$teamidaddrecord'";
   mysqli_query($con,$teammembermailquery);
}

mysqli_query($con,"UPDATE `registration` SET `fee_status`='$finalstatus',`student_status`='$finalstatus',`order_id`='$invoice_number' where `receipt_number`='".$_SESSION['receiptnumber']."'");



$api->payment->fetch($invoice_number)->capture(array('amount'=>$amountset,'currency' => 'INR'));

}


?>