<?php
session_start();
error_reporting(1);
include("../admin/include/config.php");

$IP = $_SERVER['REMOTE_ADDR'];
$systemconfigration=php_uname(); 
$utype="User";
date_default_timezone_set('Asia/Kolkata');      
$datetime=date("Y-m-d h:i:sa");
$datetimeexpire=date("d-m-Y");
$SuccessATTEMPT="Success";
$FailedATTEMPT="Failed";
extract($_POST);
extract($_GET);
extract($_REQUEST);

if(isset($submit))
{
$loginid=mysqli_real_escape_string($con,$_POST['loginid']);
$pass1=mysqli_real_escape_string($con,$_POST['pass']);
$pass2=SHA1($pass1);
//$cookie_name = "Loginid";
//$cookie_value = $loginid;
//setcookie($cookie_name, $cookie_value, "/");
//$cookie_name = "Password";
//$cookie_value = $pass;
//setcookie($cookie_name, $cookie_value,  "/");

    if($ShowCaptchaValue!=$InputCaptchaValue)
    {
      echo ("<script language='javascript'>alert('Captcha does not match Try Again');window.location='index.php'</script>");
    exit();  
    }
$logincheckuserid=mysqli_query($con,"SELECT * FROM `registration` WHERE `login`='$loginid'");
$logincheckuseridresultrs2=mysqli_fetch_assoc($logincheckuserid)or die("<script language='javascript'>alert('User Id is incorrect');window.location='index.php'</script>");
    $rs2=mysqli_query($con,"SELECT `fee_status`,`wrong_pass_count` FROM `registration` WHERE `login`='$loginid'");
$resultrs2=mysqli_fetch_assoc($rs2);
$resultrs2count1=$resultrs2['wrong_pass_count'];
$resultrs2status=$resultrs2['fee_status'];

$tcountwrongatt='2';
$totalcountwrongatt = $tcountwrongatt-$resultrs2count1;

$tempactivesessionquery=mysqli_query($con,"SELECT * FROM `session` WHERE `status` ='Active'");
$tempresactivesessionquery=mysqli_fetch_assoc($tempactivesessionquery);
$temp_activesession_record=$tempresactivesessionquery['session_year'];
    if($resultrs2count1 >= "3")
    {
    echo ("<script language='javascript'>alert('Id is de-Actived Due to Wrong Password Many Time Please Contact to Adminstartor');window.location='index.php'</script>");
    exit();
    }
    if($resultrs2status=="InActive")
     {
    echo ("<script language='javascript'>alert('User Id Not Found');window.location='index.php'</script>");
    exit();
     }
 if($resultrs2status=="Rejected")
     {
    echo ("<script language='javascript'>alert('User Id Not Found');window.location='index.php'</script>");
    exit();
     }

  $rs=mysqli_query($con,"SELECT * FROM `registration` WHERE `login`='$loginid' AND `password`='$pass2' AND `fee_status` = \"Active\" OR `login`='$loginid' AND `hash_password`='$pass2'  AND `fee_status` = \"Active\"");
     if(mysqli_num_rows($rs)<1)
  {
     
    $rs1=mysqli_query($con,"SELECT `wrong_pass_count` FROM `registration` WHERE `login`='$loginid'");
 if (mysqli_num_rows($rs1)>0)
{
    if ($row=mysqli_fetch_row($rs1)) 
    {
        $uid = $row['0'];
        $id_increase = $uid+1;
        $get_string = str_pad($id_increase,1,0,STR_PAD_LEFT);
        $id = $get_string;
        $updatewrongquery= "UPDATE `registration` SET `wrong_pass_count`='$id',`wrong_pass_time`='$datetimeexpire' WHERE `login`='$loginid'";
        mysqli_query($con,$updatewrongquery);

        mysqli_query($con,"INSERT INTO `logindetail`(`logintype`, `loginid`, `password`, `loginattempt`, `ipaddress`, `session_key`, `login_datetime`) VALUES ('$utype','$loginid','$pass1','$FailedATTEMPT','$IP','".session_id()."','$datetime')") or die(mysqli_error());
    }
}
$rs23=mysqli_query($con,"SELECT `fee_status`,`wrong_pass_count` FROM `registration` WHERE `login`='$loginid'");
$resultrs23=mysqli_fetch_assoc($rs23);
$resultrs2count=$resultrs23['wrong_pass_count'];
    if($resultrs2count >= "3")
    {
    echo ("<script language='javascript'>alert('Id is de-Actived Due to Wrong Password Many Time Please Contact to Adminstartor');window.location='index.php'</script>");
    exit();
    }

 echo ("<script language='javascript'>alert('$resultrs2count attempt Invalid Username or Password $totalcountwrongatt attempt left');window.location='index.php'</script>"); 

  }

  elseif($loginid == $pass1)
  {
     mysqli_query($con,"INSERT INTO `logindetail`(`logintype`, `loginid`, `password`, `loginattempt`, `ipaddress`, `session_key`, `login_datetime`) VALUES ('$utype','$loginid','$pass1','$SuccessATTEMPT','$IP','".session_id()."','$datetime')") or die(mysqli_error());
    $updatewrongquery1= "UPDATE `registration` SET `wrong_pass_count`='0' WHERE `login`='$loginid'";
        mysqli_query($con,$updatewrongquery1);
  $updateusersession= "UPDATE `registration` SET `current_session`='$temp_activesession_record' WHERE `login`='$loginid'";
        mysqli_query($con,$updateusersession);
   echo "<script>window.location='changepassword.php'</script>";
           
       $_SESSION['userlogin']=$loginid;
       $_SESSION['userpass']=$pass1;
       $_SESSION['userdatetime']=$datetime;
  }
else
{
      mysqli_query($con,"INSERT INTO `logindetail`(`logintype`, `loginid`, `password`, `loginattempt`, `ipaddress`, `session_key`, `login_datetime`) VALUES ('$utype','$loginid','$pass1','$SuccessATTEMPT','$IP','".session_id()."','$datetime')") or die(mysqli_error());
    $updatewrongquery1= "UPDATE `registration` SET `wrong_pass_count`='0' WHERE `login`='$loginid'";
        mysqli_query($con,$updatewrongquery1);
        $updateusersession= "UPDATE `registration` SET `current_session`='$temp_activesession_record' WHERE `login`='$loginid'";
        mysqli_query($con,$updateusersession);
echo "<script>window.location='dashboard.php'</script>";
       $_SESSION['userlogin']=$loginid;
       $_SESSION['userpass']=$pass1;
       $_SESSION['userdatetime']=$datetime;
}

    

}
     
 if(!isset($_SESSION['userlogin']))
{
    echo "<script>window.location='index.php'</script>";
        exit();
}
?>
     
<?php
include("include/header.php");
?>




          <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <marquee behavior="alternate">
                        <h6 style="font-size: 16px; color: red">
                            <b>We're at your service, please send your grievances at paritoshbisht05@gmail.com 24X7</b>
                        </h6>
                    </marquee>
                        <h1 class="mt-1" style="text-transform:capitalize;"><?php 
$schoolfullname=mysqli_query($con,"SELECT * FROM `school` WHERE `status` = \"Active\"");
$schoolfullnameresult=mysqli_fetch_assoc($schoolfullname); 
                        echo $schoolfullnameresult['school_name']; ?></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                          
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                 <a href="#" style=" color: white; text-decoration:none ">    <div class="card-body"></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                     
                                          
                                        <!--<a class="small text-white stretched-link" href="#">View Details</a>-->
                                        <div class="small text-white"><!--<i class="fas fa-angle-right"></i>--></div>
                                    </div></a>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                  <a href="#" style=" color: white; text-decoration:none">   <div class="card-body"></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                          
                                        
                                        <!--<a class="small text-white stretched-link" href="#">View Details</a>-->
                                        <div class="small text-white"><!--<i class="fas fa-angle-right"></i>--></div>
                                    </div></a>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-secondary text-white mb-4">
                                   <a href="#" style=" color: white; text-decoration:none">  <div class="card-body"></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                      
                                      
                                      
                                        <!--<a class="small text-white stretched-link" href="#">View Details</a>-->
                                        <div class="small text-white"><!--<i class="fas fa-angle-right"></i>--></div>
                                    </div></a>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                  <a href="#" style=" color: white; text-decoration:none">  <div class="card-body"></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                         
                                    <!--    <a class="small text-white stretched-link" href="#">View Details</a>-->
                                        <div class="small text-white"><!--<i class="fas fa-angle-right"></i>--></div>
                                    </div></a>
                                </div>
                            </div>
                        </div>
                       



                    <div class="modal fade" id="DateOFbirthdaymodalpopup" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Wishing Happy Birthday</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="" style="font-size:medium; font-family:Calibri; color:deepskyblue;">Wishing you a birthday filled with sweet moments and wonderful memories to cherish always! Happy Birthday Dear <?php echo $res['first_name'] ." ".$res['middle_name']  ." ". $res['last_name']; ?></div>
        
        <br>
         <div class="" style="font-size:medium; color:#289fc6; font-family:Calibri;">Greating From <?php echo $schoolfullnameresult['school_name']; ?> 
     </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>      



<!-- fILE UPLOAD MODULE -->

<div class="modal fade" id="userfileuploadmodalpopup" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"  data-bs-backdrop="static" data-bs-keyboard="false" >
    <script src="../admin/js/fileupload.js"></script>
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <?php if(isset($photoupload))
        {
           $studentphotoupload = $_FILES['inputStudentPhoto']['name'];
    $tmpphotoname = $_FILES['inputStudentPhoto']['tmp_name'];
    $uploadfolder = 'upload/user_photo/';
    move_uploaded_file($tmpphotoname, $uploadfolder.$studentphotoupload);

$studentPhotoupdatequery="UPDATE `user` SET `photo` = '$studentphotoupload' WHERE `id` = '$log'";
mysqli_query($con,$studentPhotoupdatequery);
echo "<script language='javascript'>alert('Photo Upload Successfully');window.location='dashboard.php'</script>";

        } 
       
      
        ?>
        <h5 class="modal-title" id="myModalLabel">Pending Document Upload</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <span style="color: red;"> Please Upload Your Pending Document*</span>
       <?php if($fileuploaduserqueryresultrsphoto) { } else { ?>
        <form action="" method="POST" name="photoupload" onSubmit="return check();" enctype="multipart/form-data">
              <div class="mb-3">
            <label for="DiscountRemark" class="col-form-label">Photo Upload</label>
            <input type="file" class="form-control" id="inputStudentPhoto" name="inputStudentPhoto"  onchange="ValidateinputStudentPhotoInput(this);" accept=".jpg,.jpeg" required>
          </div>
           <div class="mt-4 mb-0" align="center">
            <input class="btn btn-success" type="submit" name="photoupload" id="photoupload" value="Upload" >
          </div>
      </form>
<?php } ?>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div> 


                           
                </main>
                 <?php
include("include/footer.php");
    ?>

