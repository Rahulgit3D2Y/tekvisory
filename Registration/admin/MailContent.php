<?php
include("include/header.php");
require("permission_check.php");
?>
  <!-- main content -->
  <?php
  date_default_timezone_set('Asia/Kolkata');      
$date=date("Y-m-d h:i:sa");

// $mailsql=mysqli_query($con,"SELECT * FROM `mailcontent` WHERE `mailcontent_status`='Active' AND `mailcontent_id` = '1'");
  // $mailresult=mysqli_fetch_assoc($mailsql);
   //  $mailSubject=$mailresult['mailcontent_subject'];
        
     //    $Mailbody=$mailresult['mailcontent_body'];
      //    $Mailid=$mailresult['mailcontent_id'];
$status="Active";

  if(isset($submit))
{
    $dateyear=$_POST['inputsessionyear']; 
 $studentsessionquery=mysqli_query($con,"SELECT * FROM `session`  WHERE `fyear`='$dateyear'");
            $studentsessionqueryrow1=mysqli_fetch_array($studentsessionquery);
            $studentsessionyearrecord = $studentsessionqueryrow1['session_year'];


        $mailcontent_sessionrs=mysqli_query($con,"SELECT * FROM `mailcontent` WHERE `mailcontent_session`='$studentsessionyearrecord'");
if (mysqli_num_rows($mailcontent_sessionrs)>0)
{
    echo "<script language='javascript'>alert('Mail Content Allready Exits for  $studentsessionyearrecord session');window.location='$Currentwebsiteurl'</script>";
exit();
} 
$mailcontent_mailidnamers=mysqli_query($con,"SELECT * FROM `mailcontent` WHERE `mailcontent_mailidname`='$inputMailName'");
if (mysqli_num_rows($mailcontent_mailidnamers)>0)
{
    echo "<script language='javascript'>alert('Mail Id Name Already Exits');window.location='$Currentwebsiteurl'</script>";
exit();
} 
  $mailcontent_subjectrs=mysqli_query($con,"SELECT * FROM `mailcontent` WHERE `mailcontent_subject`='$inputMailSubject'");
if (mysqli_num_rows($mailcontent_subjectrs)>0)
{
    echo "<script language='javascript'>alert('Mail Subject Already Exits');window.location='$Currentwebsiteurl'</script>";
exit();
} 
mysqli_query($con,"INSERT INTO `mailcontent`(`mailcontent_session`,`mailcontent_mailidname`, `mailcontent_subject`, `mailcontent_body`,`mailcontent_status`,  `mailcontent_createdby`, `mailcontent_createddatetime`) VALUES ('$studentsessionyearrecord','$inputMailName','$inputMailSubject','$inputMailMessageBody','$status','$log','$date')") or die(mysqli_error());

echo "<script language='javascript'>alert('Mail Content Added Successfully')</script>"; 
    echo "<script>window.location=' $Currentwebsiteurl '</script>";
}


  ?>
  
   <script type="text/javascript">
          var _validFileExtensions = [".jpg", ".jpeg", ".pdf"];    
function ValidateSingleInput(oInput) {
    if (oInput.type == "file") {
        var sFileName = oInput.value;
         if (sFileName.length > 0) {
            var blnValid = false;
            for (var j = 0; j < _validFileExtensions.length; j++) {
                var sCurExtension = _validFileExtensions[j];
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
    const fi = document.getElementById('inputNoticeFileUpload');
        // Check if any file is selected.
        if (fi.files.length > 0) {
            for (const i = 0; i <= fi.files.length - 1; i++) {
  
                const fsize = fi.files.item(i).size;
                const file = Math.round((fsize / 1024));
                // The size of the file.
                if (file >= 1048) {
                    alert(
                      "File too Big, please select a file less than 1mb");
                   document.getElementById("inputNoticeFileUpload").value=null; 
                     //return false;
                } 
            }
        }
    return true;
}
       </script>
 <script src="ckeditor/fullpackage/ckeditor.js"></script>
<script src="ckfinder/ckfinder.js"></script>
         <?php 
 $mailsqlbodyquery=mysqli_query($con,"SELECT * FROM `mailcontent` ORDER BY `mailcontent_id` DESC LIMIT 1;");
 $mailsqlbodyqueryresult=mysqli_fetch_assoc($mailsqlbodyquery);
         ?>      
 
            <div id="layoutSidenav_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="card shadow-lg border-0 rounded-lg mt-1">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-0">Mail Content</h3></div>
                                    <div class="card-body">
                                        <form action="<?php echo $Currentwebsiteurl; ?>" method="POST"  onSubmit="return check();" enctype="multipart/form-data">
                                           
                                           
                                            <div class="row mb-3">
                                                <div class="col-md-2">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <select class="form-select" name="inputsessionyear" id="inputsessionyear"  required="inputsessionyear" onselect="document.getElementById('$inputsessionyear');">
          <option selected="selected" value=""disabled selected>-- Select an option --</option>
<?php
$rssession=mysqli_query($con,"SELECT * FROM `session`  ORDER BY `session`.`session_year` DESC");
      while($rowsession=mysqli_fetch_array($rssession))
{
if($rowsession[0])
{?>
<option value='<?php echo $rowsession[3];?>'<?php if($activesession_record==$rowsession[1])
{
    echo"selected";
} ?>><?php echo $rowsession[1];?></option>
<?php
}
}
?>
      </select>
                                                        <label for="inputsessionyear"> Select Session</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                        
                                                   <div class="form-floating mb-3 mb-md-0">
                                                      
                                                        <input class="form-control" id="inputMailName" name="inputMailName" type="text" value="" required/>
                                                        <label for="inputMailName">Mail ID Name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                        
                                                   <div class="form-floating mb-3 mb-md-0">
                                                      
                                                        <input class="form-control" id="inputMailSubject" name="inputMailSubject" type="text" value="" required/>
                                                        <label for="inputMailSubject">Subject</label>
                                                    </div>
                                                </div>
                                                
                               <div class="row mb-3">
                                                <div class="col-md-12">
                                                   <div class="form-floating mb-3 mb-md-0">
                                                    <h6>Message</h6>
                                                    <textarea  class="form-control" name="inputMailMessageBody" id="inputMailMessageBody" style="width: 100%; height: 150px;"><?php echo $mailsqlbodyqueryresult['mailcontent_body'];?></textarea>
                                                <!--<label for="inputNoticeMessage">Message</label>-->

                                                    </div>
                                                </div>
                                            </div>
                                           
                                            <div class="mt-4 mb-0" align="center">
                                                 <input class="btn btn-success "type="submit" name="submit" id="submist" Value="ADD" />                                            </div>
                                        </form>
                                    </div>
                                   
                                </div>
                                
    
                            </div>
                           
                        
                        <br>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               Mail Content
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimpl">
                                    <thead>
                                        <tr>
                                           <th>S.No</th>
                                           <th>View</th>
                                           <th>Session</th>
                                           <th>Mail ID Name</th>
                                           <th>Subject</th>
                                           <th>Body</th>
                                           <th>Created By</th>
                                           <th>Update By</th>
                                           <th>Update</th>
                                         
                                           
                                        </tr>
                                    </thead>
                                  
                                    <tbody>
                                        <?php

                                        $count = 0;
                                        $noticequery=mysqli_query($con,"SELECT * FROM `mailcontent` WHERE `mailcontent_status`=\"Active\"  ORDER BY `mailcontent`.`mailcontent_id` DESC");
                                        while($noticequeryresult=mysqli_fetch_assoc($noticequery))
    {
        $count+=1;
$id=$noticequeryresult['mailcontent_id'];
$created_user_id=$noticequeryresult['mailcontent_createdby'];
$updated_user_id=$noticequeryresult['mailcontent_updatedby'];

                                              
                                                     $result123=mysqli_query($con,"SELECT * FROM `user` WHERE `id`=\"$created_user_id\"");
                                                          $row12=mysqli_fetch_array($result123);
                                                          $user_login_name=$row12['first_name']." ".$row12['middle_name']." ".$row12['last_name'];
                                                          $result12=mysqli_query($con,"SELECT * FROM `user` WHERE `id`=\"$updated_user_id\"");
                                                          $row1=mysqli_fetch_array($result12);
                                                          $upadted_user_login_name=$row1['first_name']." ".$row1['middle_name']." ".$row1['last_name'];
                                        ?>
                                        <tr>        
                                            <td><?php echo $count; ?></td>
                                            <td><a href="#"  onclick="window.open('View_MailContent.php?mailcontent_id=<?php echo $id?>','name','width=1500,height=900')"><span class='fas fa-paperclip'></span></a></td>
                                            <td><?php echo $noticequeryresult['mailcontent_session']; ?></td>
                                        <td><?php echo $noticequeryresult['mailcontent_mailidname']; ?></td>
                                            <td><?php echo $noticequeryresult['mailcontent_subject']; ?></td>
                                             <td><?php echo substr($noticequeryresult['mailcontent_body'],0,200); echo "...."; ?></td>
                                            <td><?php echo $user_login_name; ?></td>
                                            <td><?php echo $upadted_user_login_name; ?></td>
                                             <td><a href="update_MailContent.php?mailcontent_id=<?php echo $id;?>"><span class='fas fa-edit'></span></a></td>
                                           
                                            
                                        </tr>
                                       
                                        <?php
                                    }
                                        ?>

                                       
                                    </tbody>
                                </table>
                            </div>
                                </div>
                    

                    </div>
                </main>
 <?php
include("include/footer.php");
    ?>
    <script type="text/javascript">
    var editor = CKEDITOR.replace('inputMailMessageBody');
    CKFinder.setupCKEditor(editor);
    


 

</script>
