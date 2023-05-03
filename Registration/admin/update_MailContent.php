<?php
include("include/header.php");
require("permission_check.php");
?>
  <!-- main content -->
  <?php
  date_default_timezone_set('Asia/Kolkata');      
$date=date("Y-m-d h:i:sa");
extract($_REQUEST);
 $Mailid=$_GET['mailcontent_id'];
 $mailsql=mysqli_query($con,"SELECT * FROM `mailcontent` WHERE `mailcontent_status`='Active' AND `mailcontent_id` = '$Mailid'");
 $mailresult=mysqli_fetch_assoc($mailsql);
  $mailidname=$mailresult['mailcontent_mailidname'];
  $mailSubject=$mailresult['mailcontent_subject'];
        
        $Mailbody=$mailresult['mailcontent_body'];
      //  $Mailid=$mailresult['mailcontent_id'];
$status="Active";

  if(isset($submit))
{
    if($mailidname!=$inputMailName) {
      $mailcontent_mailidnamers=mysqli_query($con,"SELECT * FROM `mailcontent` WHERE `mailcontent_mailidname`='$inputMailName'");
    
if (mysqli_num_rows($mailcontent_mailidnamers)>0)
{
    echo "<script language='javascript'>alert('Mail Id Name Already Exits');window.location='$Currentwebsiteurl'</script>";
exit();
} 
}
 if($mailSubject!=$inputMailSubject) {
  $mailcontent_subjectrs=mysqli_query($con,"SELECT * FROM `mailcontent` WHERE `mailcontent_subject`='$inputMailSubject'");
if (mysqli_num_rows($mailcontent_subjectrs)>0)
{
    echo "<script language='javascript'>alert('Mail Subject Already Exits');window.location='$Currentwebsiteurl'</script>";
exit();
} 
}
$Mailupdatequery="UPDATE `mailcontent` SET `mailcontent_mailidname`='$inputMailName',`mailcontent_subject`='$inputMailSubject',`mailcontent_body`='$inputMailMessageBody',`mailcontent_updatedby`='$log',`mailcontent_updatedatetime`='$date' WHERE `mailcontent_id` = '$Mailid' AND `mailcontent_status`='Active'";
mysqli_query($con,$Mailupdatequery);

echo "<script language='javascript'>alert('Mail Content Update Successfully')</script>"; 
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
if($rowsession[1]==$mailresult['mailcontent_session'])
{?>
<option value='<?php echo $rowsession[3];?>' selected><?php echo $rowsession[1];?></option>
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
                                                      
                                                        <input class="form-control" id="inputMailName" name="inputMailName" type="text" value="<?php echo  $mailidname;?>" required/>
                                                        <label for="inputMailName">Mail ID Name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                        
                                                   <div class="form-floating mb-3 mb-md-0">
                                                      
                                                        <input class="form-control" id="inputMailSubject" name="inputMailSubject" type="text" value="<?php echo  $mailSubject;?>" required/>
                                                        <label for="inputMailSubject">Subject</label>
                                                    </div>
                                                </div>
                                                
                               <div class="row mb-3">
                                                <div class="col-md-12">
                                                   <div class="form-floating mb-3 mb-md-0">
                                                    <h6>Message</h6>
                                                    <textarea  class="form-control" name="inputMailMessageBody" id="inputMailMessageBody" cols="120" rows="6" style="width: 100%; height: 150px;"><?php echo  $Mailbody;?></textarea>
                                                <!--<label for="inputNoticeMessage">Message</label>-->

                                                    </div>
                                                </div>
                                            </div>
                                           
                                            <div class="mt-4 mb-0" align="center">
                                                 <input class="btn btn-success "type="submit" name="submit" id="submist" Value="Update"  />                                            </div>
                                        </form>
                                    </div>
                                   
                                </div>
                                
    
                            </div>
                           
                        
                        <br>
                    
                    

                    </div>
                </main>
 <?php
include("include/footer.php");
    ?>
      <script type="text/javascript">
    var editor = CKEDITOR.replace('inputMailMessageBody');
    CKFinder.setupCKEditor(editor);
    


 

</script>