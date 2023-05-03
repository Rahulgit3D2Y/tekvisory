<?php include("include/header.php"); 
    include("../admin/include/config.php");
    require '../admin/phpmailer/PHPMailerAutoload.php';
    ?>
<script type="text/javascript">
          let _validFileExtensions = [".pdf"];    
function ValidateInputMemberIdcardFileUploadInput(oInput) {
    if (oInput.type == "file") {
        let sFileName = oInput.value;
         if (sFileName.length > 0) {
            let blnValid = false;
            for (let j = 0; j < _validFileExtensions.length; j++) {
                let sCurExtension = _validFileExtensions[j];
                if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                    blnValid = true;
                    break;
                }
            }
             
            if (!blnValid) {
                alert("Sorry, " + sFileName + " is invalid extensions, allowed extensions are: " + _validFileExtensions.join(", "));
                oInput.value = "";
                return false;
            }
        }
    }
      let fi = document.getElementById('InputMemberIdcardFileUpload');
        // Check if any file is selected.
        if (fi.files.length > 0) {
            for (let i = 0; i <= fi.files.length - 1; i++) {
  
                let fsize = fi.files.item(i).size;
                let file = Math.round((fsize / 1024));
                // The size of the file.
                if (file >= 1048) {
                    alert(
                      "File too Big, please select a file less than 1mb");
                   document.getElementById("InputMemberIdcardFileUpload").value=null; 
                     //return false;
                } 
            }
        }
    return true;
}
      </script> 

      <!---------------------  ADD Sub Content  Modal ---------------------------->
<div class="modal fade" id="AddStudentMemberModel" tabindex="-1" aria-labelledby="AddStudentMemberModelLabel" aria-hidden="true"  data-bs-backdrop="static" data-bs-keyboard="false" >
    <?php 
          $activesessionquery=mysqli_query($con,"SELECT * FROM `session` WHERE `status` ='Active'");
$resactivesessionquery=mysqli_fetch_assoc($activesessionquery);
$activesession_record_add=$resactivesessionquery['session_year'];
$activesession_record_add_full=$resactivesessionquery['fyear'];

extract($_POST);
extract($_GET);
    $contentnamestatus = "Active";
date_default_timezone_set('Asia/Kolkata');      
$date=date("Y-m-d h:i:sa");
$startno="00001";
$monthyear=date("my");
$id1=$dateyear."".$school_code;
 $feesessionyearrecord=$activesession_record_add;
    if(isset($AddMember))
{
    $profilephotouploadname="userfile_".date('dmY')."".time(); 
    $extension  = pathinfo( $_FILES["InputMemberIdcardFileUpload"]["name"], PATHINFO_EXTENSION );
    $studentphotoupload = $_FILES['InputMemberIdcardFileUpload']['name'];
    $tmpphotoname = $_FILES['InputMemberIdcardFileUpload']['tmp_name'];
    $basename   = $profilephotouploadname . "." . $extension;
    $uploadfolder = '../admin/upload/userfile/';
    move_uploaded_file($tmpphotoname, $uploadfolder.$basename);

    $teamidgen=mysqli_query($con,"SELECT * FROM `team_detail` WHERE LEFT(`teammember_number`,6) LIKE '%$teamidgenid1%' ORDER BY `teammember_id` DESC LIMIT 1");
 if (mysqli_num_rows($teamidgen)>0)
{
    if ($teamidgenrow=mysqli_fetch_row($teamidgen)) 
    {
        $teamidgenuid = $teamidgenrow['1'];
       // $teamidgenget_numbers = str_replace("ID","",$teamidgenuid);
        $teamidgenid_increase = $teamidgenuid+1;
        //$teamidgenid_increase = $teamidgenget_numbers+1;
        $teamidgenget_string = str_pad($teamidgenid_increase,6,0,STR_PAD_LEFT);
        //$teamidgenid = "SR".$teamidgenget_string;
        $teamidgenid = $teamidgenget_string;

 mysqli_query($con,"INSERT INTO `team_detail`(`teammember_number`,`team_id`, `teammember_studentid`,`teammember_studentname`,`teammember_studentgender`,`teammember_studentcampus`, `teammember_studentcourse`, `teammember_studentspecilization`,`teammember_studentsemester`, `teammember_studentemail`, `teammember_studentnumber`,`teammember_studentdob`, `teammember_studentsession`, `teammember_studentstatus`,`teammember_studentcreatedtime`, `teammember_leader`,`teammember_studentphoto`)  VALUES ('$teamidgenid','$log','$InputMemberStudentID','$InputMemberName','$InputMemberGender','$InputMemberCampus','$InputMemberCourse','$InputMemberCourseSpecialization','$InputMemberSemester','$InputMemberEmailId','$InputMemberNumber','$InputMemberDob','$feesessionyearrecord','Pending','$date','No','$basename')") or die(mysqli_error());

    }
   
}  
else
{    
  
     $teamidgenid=$dateyear."".$monthyear."".$startno;


mysqli_query($con,"INSERT INTO `team_detail`(`teammember_number`,`team_id`, `teammember_studentid`,`teammember_studentname`,`teammember_studentgender`,`teammember_studentcampus`, `teammember_studentcourse`, `teammember_studentspecilization`,`teammember_studentsemester`, `teammember_studentemail`, `teammember_studentnumber`,`teammember_studentdob`, `teammember_studentsession`, `teammember_studentstatus`,`teammember_studentcreatedtime`, `teammember_leader`,`teammember_studentphoto`)  VALUES ('$teamidgenid','$log','$InputMemberStudentID','$StudentName','$studentGender','$studentCampus','$studentCourse','$studentSpecilization','$studentSemester','$studentEmail','$studentNumber','$studentdob','$feesessionyearrecord','Pending','$date','No','$basename')") or die(mysqli_error());

}


echo "<script language='javascript'>alert('Record Added Successfully');window.location='$Currentwebsiteurl'</script>";

}
?>
     <script src="ckeditor/fullpackage/ckeditor.js"></script>
<script src="ckfinder/ckfinder.js"></script>
  <div class="modal-dialog modal-xl">
   
    <div class="modal-content">
      <div class="modal-header">

        <h5 class="modal-title" id="addcontentmodelnameLabel">Add Member Detail</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
     
          <?php 
          $countquerycheckformember=mysqli_query($con,"SELECT COUNT(`teammember_id`) AS `count_number` FROM `team_detail` WHERE `team_id`='$log' AND `teammember_studentstatus`!='InActive'");
 $countquerycheckformemberresult=mysqli_fetch_assoc($countquerycheckformember);
        $countforcheck=$countquerycheckformemberresult['count_number'];
        ?>          
      
        <?php  if($countforcheck<6) { ?>
             <div class="alert alert-danger" role="alert">
   <h4 align="left" style="font-family:'type'; color:#f7260f"><b>Note:</b>
       
        <br>&emsp;&emsp;*There Should be max 6 members in Team.
        <br>&emsp;&emsp;*Alteast One Female Candidate Should be there in Team.
        <br>&emsp;&emsp;*After Ferizing Then only Your Team Will Active.
        <br>&emsp;&emsp;*Incase You Don't Have Id Card Then Submit Admit Card.
        <br>&emsp;&emsp;*Change In Any Detail Then Contact to 7302020015.

  
</h4>
</div>
<div class="modal-body">
       <form action="<?php echo $Currentwebsiteurl;?>" method="POST" onsubmit="return check();" name="form" enctype="multipart/form-data">
                                            <div class="row mb-3">
                                            <div class="col-md-3">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="InputMemberStudentID" name="InputMemberStudentID" type="text" placeholder="Please Enter Name" 
                                                        required="InputMemberStudentID" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"   onkeyup="functionStudentIDCheck()" />
                                                        <label for="InputMemberStudentID">Student ID</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                         <input class="form-control" id="InputMemberName" name="InputMemberName" type="text" placeholder="Please Enter Name" 
                                                        required="InputMemberName"  />
                                                       
                                                        <label for="InputMemberName">Name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="InputMemberEmailId" name="InputMemberEmailId" type="email" placeholder="Please Enter Name" 
                                                        required="InputMemberEmailId" onkeyup="functionStudentEmailCheck()" />
                                                        <label for="InputMemberEmailId">Email</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="InputMemberNumber" name="InputMemberNumber" type="text"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" max="10" pattern="[6-9]{1}[0-9]{9}" maxlength="10"  placeholder="Please Enter Name" 
                                                        required="InputMemberNumber"  />
                                                        <label for="InputMemberNumber">Number</label>
                                                    </div>
                                                </div>
                                                

                                            </div>
                                           
                                            <div class="row mb-3">
                                                <div class="col-md-3">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                         <select class="form-select" name="InputMemberGender" id="InputMemberGender" required="InputMemberGender">
          <option selected="selected" value=""disabled selected>-- Select an option --</option>
           <option  value="Male">Male</option>
           <option  value="Female">Female</option>
           <option  value="Other">Other</option>
                                                        </select>
                                                        <label for="InputMemberGender">Gender</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                   <div class="form-floating mb-3 mb-md-0">
                                        <select class="form-select" name="InputMemberCampus" id="InputMemberCampus"  required="InputMemberCampus">
         <option selected="selected" value=""disabled selected>-- Select an option --</option>
<?php
$rscourse=mysqli_query($con,"SELECT * FROM `campus` WHERE `status`=\"Active\"");
      while($rowcourse=mysqli_fetch_array($rscourse))
{

echo "<option value='$rowcourse[0]'>$rowcourse[1]</option>";

}
?>
      </select>
                                                        <label for="InputMemberCampus">Member Campus</label>
                                                    </div>
                                                </div>
                                                     <div class="col-md-3">
                                                   <div class="form-floating mb-3 mb-md-0">
                                        <select  class="form-select" required name="InputMemberCourse" id="InputMemberCourse"  onchange="CourseChangeFunction()">
                                <option value="" disabled selected>Select</option>
                               <?php
$courseselect=mysqli_query($con,"SELECT * FROM `course_detail` WHERE  `status`='Active'");
      while($resultcourseselect=mysqli_fetch_array($courseselect))
{

echo "<option value='$resultcourseselect[1]'>$resultcourseselect[2]</option>";

}
?>
                            </select>
                                                        <label for="InputMemberCourse">Member Course</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                   <div class="form-floating mb-3 mb-md-0">
                                        <select  class="form-select" required name="InputMemberCourseSpecialization" id="InputMemberCourseSpecialization">
                                <option value="" disabled selected>Select</option>
                       <?php
$courseselect=mysqli_query($con,"SELECT * FROM `specilization` WHERE  `status`='Active'");
      while($resultcourseselect=mysqli_fetch_array($courseselect))
{

echo "<option value='$resultcourseselect[0]'>$resultcourseselect[1]</option>";

}
?>
                            </select>
                                                        <label for="InputMemberCourseSpecialization">Member Specialization(Only For B.Tech Student)</label>
                                                    </div>
                                                </div>
                                                  </div>

                                                <div class="row mb-3">
                                                  <div class="col-md-3">
                                                   <div class="form-floating mb-3 mb-md-0">
                                        <select  class="form-select" required name="InputMemberSemester" id="InputMemberSemester">
                                <option value="" disabled selected>Select</option>
                                <option value="2">2</option>
                                <option value="4">4</option>
                                <option value="6">6</option>
                                <option value="8">8</option>
                            </select>
                                                        <label for="InputMemberSemester">Member Semester</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                   <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" type="date" name="InputMemberDob" id = "InputMemberDob"  >
                                                        <label for="InputMemberDob">Member Date of birth</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                   <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" type="file" name="InputMemberIdcardFileUpload" id = "InputMemberIdcardFileUpload" accept=".pdf" onchange="ValidateInputMemberIdcardFileUploadInput(this);">
                                                        <label for="InputMemberIdcardFileUpload">Id Card</label>
                                                    </div>
                                                </div>
                                                
                                          
                                          </div>
                                            <div class="mt-4 mb-0" align="center">
                                                 <input class="btn btn-success "type="submit" name="AddMember" id="AddMember" Value="Register"/>                                            </div>
                                        </form>
                                          </div>
                                    <?php }  else { ?>

                                      
<div class="modal-body">
  <div class="alert alert-danger" role="alert">
   <h4 align="left" style="font-family:'type'; color:#f7260f"><b>Note:</b>
       
        <br>&emsp;&emsp;*You Have Added Six Members.
        <br>&emsp;&emsp;*Change In Any Detail Then Contact to 7302020015.

  
</h4>
</div>

</div> 
 <?php } ?>
    
      <div class="modal-footer">
      
         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
      
    </div>
  </div>


</div>

<!---------------------------------------------- end ADD Sub Content modal ------------------------------------------>

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                      
                        <div class="card mb-4">
                            <div class="card-body">
                                &nbsp;<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddStudentMemberModel"> <span class="fas fa-plus-circle"></span> Add Member Detail</button>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Member Detail
                            </div>
                            <div class="card-body">
                                 <div style="overflow-x:auto;">
                                <table id="datatablesSimpl">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Team Name</th>
                                            <th>Head Name</th>
                                             <th>Member Name</th>
                                            <th>Member Student Id</th>
                                            <th>Member Email</th>
                                            <th>Member Mobile Number</th>
                                            <th>Member Dob</th>
                                            <th>Member Gender</th>
                                            <th>Member Gender</th>
                                            <th>Member Campus</th>
                                            <th>Member Course</th>
                                            <th>Member Specilization</th>
                                            <th>Member Semester</th>
                                            <th>Member Id Card</th>
                                            <th>Delete</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                       
                                        $count = 0;
                                        $sql=mysqli_query($con,"SELECT * FROM `team_detail` WHERE `team_id`='$log' AND `teammember_studentstatus`!='InActive'");
                                        while($result=mysqli_fetch_assoc($sql))
    {
        $count+=1;
   $id=$result['teammember_id'];
   $teamid=$result['team_id']; 
   $collegeid=$result['teammember_studentcampus'];
 $courseid=$result['teammember_studentcourse'];
$specilizationid=$result['teammember_studentspecilization'];    



        $result123=mysqli_query($con,"SELECT * FROM `registration` WHERE `payment_id`=' $teamid'");
        $row12=mysqli_fetch_array($result123);
        $TeamHeadName=$row12['student_name'];
        $TeamName=$row12['team_name'];
         $MemberFreezeRecord=$row12['memberfreezerecord'];
        
         /* Query For Content*/
         $contentnamequery=mysqli_query($con,"SELECT * FROM `category` WHERE `category_id`='$subcontentid'");
        $resultcontentnamequery=mysqli_fetch_array($contentnamequery);
         $ContentName=$resultcontentnamequery['category_name'];

 $campusname=mysqli_query($con,"SELECT * FROM `campus` WHERE `campus_id`='$collegeid'");
                $campusnameresult=mysqli_fetch_array($campusname);
                $college_name=$campusnameresult['campus_acroym'];
$coursequery=mysqli_query($con,"SELECT * FROM `course_detail` WHERE `course_id2`='$courseid'");
                    $resultcoursequery=mysqli_fetch_array($coursequery);
                        $course_name=$resultcoursequery['course_acroym'];
$specilizationquery=mysqli_query($con,"SELECT * FROM `specilization` WHERE `specilization_id`='$specilizationid'");
    $resultspecilizationquery=mysqli_fetch_array($specilizationquery);
         $specilizationname=$resultspecilizationquery['specilization_name'];




                                        ?>

                                        <tr>        
                                            <td><?php echo $count; ?></td>
                                            <td><?php echo $TeamName; ?></td>
                                            <td><?php echo $TeamHeadName; ?></td>
                                            <td><?php echo $result['teammember_studentid']; ?></td>
                                            <td><?php echo $result['teammember_studentname']; ?></td>
                                            <td><?php echo $result['teammember_studentemail']; ?></td>
                                            <td><?php echo $result['teammember_studentnumber']; ?></td>
                                            <td><?php echo $result['teammember_studentdob']; ?></td>
                                            <td><?php echo $result['teammember_studentdob']; ?></td>
                                            <td><?php echo $result['teammember_studentgender']; ?></td>
                                            <td><?php echo $college_name; ?></td>
                                            <td><?php echo $course_name; ?></td>
                                            <td><?php echo $specilizationname; ?></td>
                                            <td><?php echo $result['teammember_studentsemester']; ?></td>
                                            <?php if($result['teammember_studentphoto']) { ?>
                                            <td><a href="../admin/upload/userfile/<?php echo $result['teammember_studentphoto']; ?>" download="<?php echo $result['teammember_studentid']."_".$result['teammember_studentname']; ?>"><?php echo $result['teammember_studentid']."_".$result['teammember_studentname']; ?></a></td>
                                              <?php } else  { ?>
                                            <td>Id Card Not Uploaded Yet</td>

                                              <?php } ?> 
                                           <?php if($MemberFreezeRecord=="No") { ?>
                                          <?php if($result['teammember_leader']=="No") { ?>
                                    <td><a href="MemberDetail.php?id=<?php echo $id;?>&action=Delete"onclick="return confirm('Do you really want to Delete <?php echo $result['teammember_studentname'] ?>?');"><span class='fas fa-trash'></span></a></td> 
                                            
                                             <?php } else { ?>
                                                     <td><a href="#"onclick="return confirm('Group Leader can not be Delete');"><span class='fas fa-trash'></span></a></td>
                                               <?php }  } else {?> 
<td><a href="#"onclick="return confirm('Record Are Freeze you can not delete it');"><span class='fas fa-trash'></span></a></td>
                                               <?php } ?>
                                            
                                        </tr>
                                       
                                        <?php
                                    }
                                        ?>
                                       
                                       
                                    </tbody>
                                </table>

                            </div>
                            <form action="#" method="POST" name="FREEZERECORD">
                                <?php if($MemberFreezeRecord=="No") { ?>
                            <div class="mt-4 mb-0" align="center">
                                                 <input class="btn btn-success "type="submit" name="FreezeRecordAbove" id="FreezeRecordAbove" onclick="return confirm('Are You Sure Do You Want to Freeze the Team if Yes Then Please Wait For The process Email Will Be Send To all The Members?');" Value="Freeze Record"/>                                    
                          </div>

<?php } else { ?>
    <div class="mt-4 mb-0" align="center">
<h3 style="color:red;">You Have Freezed Your Records</h3>
</div>
     <?php } ?>
</form>
                            </div>
                        </div>
                    </div>
                </main>
                <?php 
                

?>
           
<?php 
if (isset($FreezeRecordAbove)) {
  $FreezeRecordstatus="Active";
  $registrationFreezeRecordstatus="Yes";
   date_default_timezone_set('Asia/Kolkata');      
$date=date("Y-m-d h:i:sa");
$currentdateonly=date("Y-m-d");
$timeonly=date("h:i:sa");
   $team_detailstudentupdatequery="UPDATE `team_detail` SET `teammember_studentstatus`='$FreezeRecordstatus' WHERE `team_id` = '$log' AND `teammember_studentstatus`='Pending'";
mysqli_query($con,$team_detailstudentupdatequery);

$registrationstudentupdatequery="UPDATE `registration` SET `memberfreezerecord`='$registrationFreezeRecordstatus' WHERE `payment_id` = '$log'";
mysqli_query($con,$registrationstudentupdatequery);
  $EventnameQuery =mysqli_query($con,"SELECT *  FROM `course_fee`  WHERE `status`='Active' and `session`='$current_activesession_record' AND `event_status`='Active'"); 
$resultEventnameQuery=mysqli_fetch_assoc($EventnameQuery);
$eventname = $resultEventnameQuery['event_name'];

$EmailQuerySql=mysqli_query($con,"SELECT * FROM `email_config` WHERE `id`='1'");
$EmailQuerySqlResult=mysqli_fetch_assoc($EmailQuerySql)or die();
$mailsql=mysqli_query($con,"SELECT * FROM `mailcontent` WHERE `mailcontent_status`='Active' AND `mailcontent_session` = '$current_activesession_record'");
 $mailresult=mysqli_fetch_assoc($mailsql);
        $mailidname=$mailresult['mailcontent_mailidname'];

$TeamMemberActiveRecordquery=mysqli_query($con,"SELECT * FROM `team_detail` WHERE `team_id` = '$log' AND `teammember_studentstatus`='Active' AND `teammember_leader` = 'No'");
                                        while($TeamMemberActiveRecordqueryresult=mysqli_fetch_assoc($TeamMemberActiveRecordquery))
                                                {
                    $TeamMemberActiveRecordqueryresultEmailid=$TeamMemberActiveRecordqueryresult['teammember_studentemail'];
                     $TeamMemberActiveRecordqueryresultName=$TeamMemberActiveRecordqueryresult['teammember_studentname'];
                     $TeamMemberActiveRecordqueryresultTeamid=$TeamMemberActiveRecordqueryresult['teammember_id'];
                      

$Mailbody="Dear $TeamMemberActiveRecordqueryresultName,
<br> 
You Have Join Team $TeamName in $eventname as a Member
<br>
Thanking You
<br>
Regards
<br>
Team Tekvisory
";
$mailSubject="Registration As a Member in $eventname";
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

$mail->addAddress("$TeamMemberActiveRecordqueryresultEmailid", "$TeamMemberActiveRecordqueryresultName");     // Add a recipient




$mail->Subject = "$mailSubject";
$mail->Body    = "$Mailbody";

$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';


if(!$mail->send())
 {
   $errormsg=$mail->ErrorInfo;
  

   $teammembermailfailquery="UPDATE `team_detail` SET `mailstatus`='Failed',`mailsenddate`='$currentdateonly',`mailsendtime`='$timeonly',`mailsenddatetime`='$date',`mailfailreason`='$errormsg' WHERE `teammember_id`='$TeamMemberActiveRecordqueryresultTeamid' ";
   mysqli_query($con,$teammembermailfailquery);


}
 else
 {
   
$teammembermailquery="UPDATE `team_detail` SET `mailstatus`='Success',`mailsenddate`='$currentdateonly',`mailsendtime`='$timeonly',`mailsenddatetime`='$date',`mailfailreason`='' WHERE `teammember_id`='$TeamMemberActiveRecordqueryresultTeamid'";
   mysqli_query($con,$teammembermailquery);
}

   
                                                }
        echo "<script language='javascript'>alert('Team Freeze Sucessfully')</script>"; 
    echo "<script>window.location=' $Currentwebsiteurl '</script>";

}


?>


<?php include("include/footer.php"); ?>

<script type="text/javascript">
   
var alerted1 = false;
function functionStudentIDCheck() {
  var name = document.getElementById("InputMemberStudentID").value;
 
var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      if (this.responseText.indexOf("Name found in database") !== -1) {
        if (!alerted1) {
          alert("Student Id already exists");
          document.getElementById("InputMemberStudentID").value="";
          alerted1 = false;
        }
      } else {
        alerted1 = false;
      }
    }
  };
 xhttp.open("GET", "../checkname.php?id="+name+"&Type="+"StudentidCheck", true);
  xhttp.send();
}
var emailalerted = false;
function functionStudentEmailCheck() {
  var name = document.getElementById("InputMemberEmailId").value;
 
var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      if (this.responseText.indexOf("Name found in database") !== -1) {
        if (!emailalerted) {
          alert("Student Email already exists");
          document.getElementById("InputMemberEmailId").value="";
          emailalerted = false;
        }
      } else {
        emailalerted = false;
      }
    }
  };
 xhttp.open("GET", "../checkname.php?id="+name+"&Type="+"StudentEmailCheck", true);
  xhttp.send();
}
</script>
<script type="text/javascript">
     function CourseChangeFunction() {
        selectElement_fee = document.querySelector('#InputMemberCourse');
        selectElement_fee_output = selectElement_fee.value;
        if(selectElement_fee_output == "123")
        {
       document.getElementById("InputMemberCourseSpecialization").readOnly = false;
       document.getElementById("InputMemberCourseSpecialization").disabled = false;
       //document.getElementById("InputMemberCourseSpecialization").value=" ";
       document.getElementById("InputMemberCourseSpecialization").required = true;
      // document.getElementById("Specialization").style.display = "flex";
      // document.getElementById("Showonly").style.display = "none";
       // document.getElementById("Othercoure").style.display = "none";
       document.getElementById("OtherCourseName").readOnly = true;
       document.getElementById("OtherCourseName").disabled = true;
       document.getElementById("OtherCourseName").value="";
            document.getElementById("OtherCourseName").required = false;
         }
         else if (selectElement_fee_output == "527") 
         {
             document.getElementById("OtherCourseName").readOnly = false;
       document.getElementById("OtherCourseName").disabled = false;
            document.getElementById("OtherCourseName").required = true;

            document.getElementById("InputMemberCourseSpecialization").readOnly = true;
       document.getElementById("InputMemberCourseSpecialization").disabled = true;
       document.getElementById("InputMemberCourseSpecialization").value="none";
       document.getElementById("InputMemberCourseSpecialization").required = false;
         
           // document.getElementById("Othercoure").style.display = "flex";
            //document.getElementById("Specialization").style.display = "none";
      // document.getElementById("Showonly").style.display = "none";

         }
         else 
         {
              document.getElementById("InputMemberCourseSpecialization").readOnly = true;
       document.getElementById("InputMemberCourseSpecialization").disabled = true;
       document.getElementById("InputMemberCourseSpecialization").value="none";
       document.getElementById("InputMemberCourseSpecialization").required = false;
      // document.getElementById("Showonly").style.display = "flex";
      //  document.getElementById("Othercoure").style.display = "none";
//document.getElementById("Specialization").style.display = "none";
       document.getElementById("OtherCourseName").readOnly = true;
       document.getElementById("OtherCourseName").disabled = true;
       document.getElementById("OtherCourseName").value="";
            document.getElementById("OtherCourseName").required = false;

         }
     }
    
  
    function check()
    {  
var string=document.form.InputMemberEmailId.value;  
 var emailcontent =  string.split('@')[1];
 var mailname =  string.split('@')[0];
  var emailcontentafter=emailcontent.toLowerCase();
  var mailnameafter=mailname.toLowerCase();
if(emailcontentafter=="gmail.com"||emailcontentafter=="geu.ac.in"||emailcontentafter=="yahoo.in"||emailcontentafter=="gehu.ac.in"||emailcontentafter=="duck.com"||emailcontentafter=="outlook.com"||emailcontentafter=="outlook.in"||emailcontentafter=="mailinator.com")
{  
  
}
else
{
    alert("Please Enter Valid Mail Id");  
  return false;  
}
if(hasSpace(mailnameafter))
{
 alert("Please Remove Space or Enter your Email");
 return false;     
}

}  
</script>
<?php
if($_GET['action']=='Delete')
{    
    date_default_timezone_set('Asia/Kolkata');      
   $date=date("d-m-Y h:i:sa");
$pid=intval($_GET['id']);    
$query=mysqli_query($con, "UPDATE `team_detail` SET `teammember_studentstatus`='InActive' WHERE `teammember_id`='$pid'");
echo '<script>alert("Student Detail Deleted Succesfully")</script>';
  echo "<script>window.location.href='MemberDetail.php?id=Member%20Details||mid%20id=19||MemberDetails'</script>";
}

?>