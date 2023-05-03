<?php
 session_start();
    include("admin/include/config.php");
 ?>
<?php 
$activesessionquery=mysqli_query($con,"SELECT * FROM `session` WHERE `status` ='Active'");
$resactivesessionquery=mysqli_fetch_assoc($activesessionquery);
$activesession_record_add=$resactivesessionquery['session_year'];
$activesession_record_add_full=$resactivesessionquery['fyear'];

$schoolquerycode=mysqli_query($con,"SELECT * FROM `school`");
$schoolquerycoderesult=mysqli_fetch_assoc($schoolquerycode);
$school_code=$schoolquerycoderesult['school_code'];
date_default_timezone_set('Asia/Kolkata');      
$date=date("d-m-Y h:i:sa");
$Currentdate=date("d-m-Y");
if(isset($_POST['TotalAmount']) && isset($_POST['student_name'])&& isset($_POST['student_id'])&& isset($_POST['student_email'])&& isset($_POST['student_number'])&& isset($_POST['student_whatsappnumber'])&& isset($_POST['student_gender'])&& isset($_POST['student_campus'])&& isset($_POST['student_course'])&& isset($_POST['student_semester'])&& isset($_POST['student_specilization'])&& isset($_POST['student_dob']))

{
    $feesessionyearrecord=$activesession_record_add;
    $inputStudentAmountPaid=$_POST['TotalAmount'];
    $StudentName=$_POST['student_name'];
    $StudentId=$_POST['student_id'];
    $studentEmail=$_POST['student_email'];
    $studentNumber=$_POST['student_number'];
    $studentwhatsappnumber=$_POST['student_whatsappnumber'];
    $studentGender=$_POST['student_gender'];
    $studentCampus=$_POST['student_campus'];
    $studentCourse=$_POST['student_course'];
    $studentSemester=$_POST['student_semester'];
    $studentSpecilization=$_POST['student_specilization'];
 $studentdob=$_POST['student_dob'];

 $dateyear=$activesession_record_add_full;
    $startno="00001";
    $feestatus ="Rejected";
    $studentstatus ="InActive";
$orderid=" ";
    $id1=$dateyear."".$school_code;
    

$rs1=mysqli_query($con,"SELECT * FROM `registration` WHERE LEFT(`receipt_number`,6) LIKE '%$id1%' ORDER BY `payment_id` DESC LIMIT 1");
 if (mysqli_num_rows($rs1)>0)
{
    if ($row=mysqli_fetch_row($rs1)) 
    {
        $uid = $row['1'];
       // $get_numbers = str_replace("SR","",$uid);
        $id_increase = $uid+1;
        //$id_increase = $get_numbers+1;
        $get_string = str_pad($id_increase,6,0,STR_PAD_LEFT);
        //$id = "SR".$get_string;
        $id = $get_string;

mysqli_query($con,"INSERT INTO `registration`(`receipt_number`, `student_id`, `student_name`, `student_gender`, `student_campus`, `student_course`, `student_specilization`, `student_semester`, `student_email`, `student_number`, `student_whatsappnumber`, `paid_amount`, `paid_date`, `paid_mode`, `order_id`, `fee_status`, `student_status`, `createdtime`, `session`) VALUES ('$id','$StudentId','$StudentName','$studentGender','$studentCampus','$studentCourse','$studentSpecilization','$studentSemester','$studentEmail','$studentNumber','$studentwhatsappnumber','$inputStudentAmountPaid','$Currentdate','Online','$orderid','$feestatus','$studentstatus','$date','$feesessionyearrecord')") or die(mysqli_error());
$_SESSION['OID']=mysqli_insert_id($con);

    exit();
    }
   
}  
else
{    
  
     echo $id=$dateyear."".$school_code."".$startno;
mysqli_query($con,"INSERT INTO `registration`(`receipt_number`, `student_id`, `student_name`, `student_gender`, `student_campus`, `student_course`, `student_specilization`, `student_semester`, `student_email`, `student_number`, `student_whatsappnumber`, `paid_amount`, `paid_date`, `paid_mode`, `order_id`, `fee_status`, `student_status`, `createdtime`, `session`) VALUES ('$id','$StudentId','$StudentName','$studentGender','$studentCampus','$studentCourse','$studentSpecilization','$studentSemester','$studentEmail','$studentNumber','$studentwhatsappnumber','$inputStudentAmountPaid','$Currentdate','Online','$orderid','$feestatus','$studentstatus','$date','$feesessionyearrecord')") or die(mysqli_error());
$_SESSION['OID']=mysqli_insert_id($con);

}


}
if(isset($_POST['invoice_number']) && isset($_SESSION['OID'])){
    $payment_id=$_POST['payment_id'];
    mysqli_query($con,"UPDATE `payment` SET `status`='Active',`order_id`='$invoice_number' where `payment_id`='".$_SESSION['OID']."'");

}
?>