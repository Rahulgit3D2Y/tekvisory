<?php include("include/header.php"); ?>
<script type="text/javascript">
          let _validFileExtensions = [".jpg",".jpeg",".pdf"];    
function ValidateinputProjectSubmissionFileUploadInput(oInput) {
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
      let fi = document.getElementById('inputProjectSubmissionFileUpload');
        // Check if any file is selected.
        if (fi.files.length > 0) {
            for (let i = 0; i <= fi.files.length - 1; i++) {
  
                let fsize = fi.files.item(i).size;
                let file = Math.round((fsize / 1024));
                // The size of the file.
                if (file >= 1048) {
                    alert(
                      "File too Big, please select a file less than 1mb");
                   document.getElementById("inputProjectSubmissionFileUpload").value=null; 
                     //return false;
                } 
            }
        }
    return true;
}
      </script> 
       <script src="../admin/ckeditor/fullpackage/ckeditor.js"></script>
<script src="../admin/ckfinder/ckfinder.js"></script>
<?php 
 
extract($_POST);
extract($_GET);
date_default_timezone_set('Asia/Kolkata');      
$date=date("Y-m-d h:i:s a");
$status = "Active";
if(isset($ProjectSubmit))
{
	$profilephotouploadname="projectfile_".date('dmY')."".time(); 
    $extension  = pathinfo( $_FILES["inputProjectSubmissionFileUpload"]["name"], PATHINFO_EXTENSION );
    $studentphotoupload = $_FILES['inputProjectSubmissionFileUpload']['name'];
    $tmpphotoname = $_FILES['inputProjectSubmissionFileUpload']['tmp_name'];
    $basename   = $profilephotouploadname . "." . $extension;
    $uploadfolder = '../admin/upload/projectfile/';
    move_uploaded_file($tmpphotoname, $uploadfolder.$basename);

mysqli_query($con,"INSERT INTO `projectsubmission`(`projectsubmission_teamid`, `projectsubmission_categoryid`, `projectsubmission_projectcontentid`, `projectsubmission_projectabstract`, `projectsubmission_projectfile`, `projectsubmission_status`, `projectsubmission_createdby`, `projectsubmission_createddatetime`) VALUES 
 ('$log','$InputProjectCategory','$InputProjectTitle','$InputProjectAbstract','$basename','$status','$log','$date')") or die(mysqli_error());

echo "<script language='javascript'>alert('Project Added Sucessfully')</script>"; 
    echo "<script>window.location=' $Currentwebsiteurl '</script>";

}

?>
<?php  
 $ProjectCheckqueryforcondition=mysqli_query($con,"SELECT * FROM `projectsubmission` WHERE `projectsubmission_teamid`='$log' AND `projectsubmission_status`='Active'");
if (mysqli_num_rows($ProjectCheckqueryforcondition)>0)
{
    $projectuploadstatus="True";
}

?>

<?php if($projectuploadstatus=="True") { ?>
	<div id="layoutSidenav_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="card shadow-lg border-0 rounded-lg mt-0">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-0">Project Detail</h3></div>
                                    <div class="card-body">
                                     <h2 style="color: red;"> You Have Already Submitted Your Project Details</h2> 
<?php 
 $ProjectCheckqueryforresult=mysqli_query($con,"SELECT * FROM `projectsubmission` WHERE `projectsubmission_teamid`='$log' AND `projectsubmission_status`='Active'");
                                $ProjectCheckqueryforresultrow1=mysqli_fetch_array($ProjectCheckqueryforresult);
                               $categoryidforresult=$ProjectCheckqueryforresultrow1['projectsubmission_categoryid'];
                               $projecttitleidforresult=$ProjectCheckqueryforresultrow1['projectsubmission_projectcontentid'];
                      $categoryidforresult123=mysqli_query($con,"SELECT * FROM `category` WHERE `category_id`='$categoryidforresult'");
                                $categoryidforrow12=mysqli_fetch_array($categoryidforresult123);
                                $categoryidresultname=$categoryidforrow12['category_name'];
                                $projecttitleidforresultresult12=mysqli_query($con,"SELECT * FROM `projectcontent` WHERE `projectcontent_id`='$projecttitleidforresult'");
                                $projecttitleidforresultrow1=mysqli_fetch_array($projecttitleidforresultresult12);
                                $projecttitleidforresulttitle=$projecttitleidforresultrow1['projectcontent_name'];


?>
                                     <table class="table">

  <tbody>
    <tr>
      <th scope="row">Category</th>
      <td><?php echo $categoryidresultname; ?></td>
      
    </tr>
    <tr>
      <th scope="row">Project Title</th>
      <td><?php echo $projecttitleidforresulttitle; ?></td>
   
    </tr>
    <tr>
      <th scope="row">Project Abstract</th>
      <td ><?php echo $ProjectCheckqueryforresultrow1['projectsubmission_projectabstract'];?></td>
      
    </tr>
    <tr>
      <th scope="row">Project File</th>
      <td ><a href="../admin/upload/projectfile/<?php echo $ProjectCheckqueryforresultrow1['projectsubmission_projectfile'];?>" download="<?php echo $loginsession."_".$categoryidresultname; ?> "><?php echo $loginsession."_".$categoryidresultname; ?></td>
      
    </tr>
  </tbody>
</table> 
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                       
                </main>
   <?php } else {   ?>
   	<div id="layoutSidenav_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="card shadow-lg border-0 rounded-lg mt-0">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-0">Project Submission</h3></div>
                                    <div class="card-body">
                                        <form action="<?php echo $Currentwebsiteurl;?>" method="POST" onsubmit="return check();" enctype="multipart/form-data">
                                            <div class="row mb-3">
                                            
                                                <div class="col-md-6">
                                                	<?php
        $selectcontentquery="SELECT * FROM `category` WHERE `category_status`='Active'";
$selectcontentquerystmt=$con->prepare($selectcontentquery);
$selectcontentquerystmt->execute();
$arrselectcontentquery=$selectcontentquerystmt->get_result();
?>
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <select class="form-select" id="InputProjectCategory" name="InputProjectCategory" required>
                                                        	<option selected="selected" value=""  disabled selected>-- Select an option --</option>
                                                        	  <?php
                            foreach($arrselectcontentquery as $selectedContentName){
                                ?>
                                <option value="<?php echo $selectedContentName['category_id']; ?>"><?php echo $selectedContentName['category_name']; ?></option>
                                <?php
                            }
                            ?>
                                                        </select>
                                                        
                                                        <label for="inputGrivenceSubject">Project Category</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                   <div class="form-floating mb-3 mb-md-0">
                                                         <select class="form-select" id="InputProjectTitle" name="InputProjectTitle" required>
                                                        	<option selected="selected"  disabled selected>-- Select an option --</option>
                                                        </select>
                                                        <label for="inputGrivenceDate">Project Title</label>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                           
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                	<label for="InputProjectAbstract">Project Abstract</label>
                                                   <div class="form-floating mb-3 mb-md-0">
                                                        <textarea class="form-control" id="InputProjectAbstract" name="InputProjectAbstract" placeholder="Enter your Subject" required="InputProjectAbstract" rows="20" cols="6" style="height: 130px;"></textarea>
                                                        
                                                    </div>
                                                </div>
                                                
                                                
                                            </div>
                                             <a href="https://tekvisory.geumca.in/upload/econtent_message_photo/files/Idea-Presentation-Format-IdeathonX.pptx"> Project Template File</a>  
                                            <div class="row mb-3">

                                                <div class="col-md-4">
                                                	<label for="inputProjectSubmissionFileUpload">Project File As per Template</label>
                                                   <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" type="file" name="inputProjectSubmissionFileUpload" id = "inputProjectSubmissionFileUpload" accept=".jpg,.jpeg,.pdf" onchange="ValidateinputProjectSubmissionFileUploadInput(this);">
                                                        
                                                    </div>
                                                </div>
                                                
                                            </div>

                                      
                                         	 <div class="mt-4 mb-0" align="center">
                                                 <input class="btn btn-success "type="submit" name="ProjectSubmit" id="ProjectSubmit" Value="Submit Project"/>                                            
                                             </div>
                                        
                                        </form>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                       
                </main>

 <?php } ?>
            

<?php include("include/footer.php"); ?>
<script type="text/javascript">
    var editor = CKEDITOR.replace('InputProjectAbstract');
    CKFinder.setupCKEditor(editor);
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script type="text/javascript">
    $(document).ready(function(){
           $("#InputProjectCategory").attr("required", "true");
           $("#InputProjectTitle").attr("required", "true");

        jQuery('#InputProjectCategory').change(function(){
            var id=jQuery(this).val();
            if(!id){
                jQuery('#InputProjectTitle').html('<option value="">-- Select an option --</option>');
            }else{
                $("#divLoading").addClass('show');
                jQuery('#InputProjectTitle').html('<option value="">-- Select an option --</option>');
                
                jQuery.ajax({
                    type:'post',
                    url:'../admin/get_data.php',
                    data:'id='+id+'&type=category',
                    success:function(result){
                        $("#divLoading").removeClass('show');
                        jQuery('#InputProjectTitle').append(result);
                    }
                });
            }
        });
    
    });
      </script>
