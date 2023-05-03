<?php
include("include/header.php");
require("permission_check.php");
?>

  <div id="layoutSidenav_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                
                                <div class="card shadow-lg border-0 rounded-lg mt-1">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-1">Registration Status Change</h3>
                                    </div>
                                    <div class="card-body">
                                         <?php 
if(isset($ModuleUserPermissionAdd))
{
	date_default_timezone_set('Asia/Kolkata');      
$date=date("d-m-Y h:i:sa");
   foreach ($_POST['ModuleUserPermission'] as $key => $value)
    {
      # code...
     $userpermission=$_POST['ModuleUserPermission'][$key];
    

    $query="UPDATE `student_list` SET  `student_status`='$inputUserStatusType',`statusactivereason`='$userApproveReason',`statusactiveby`='$log',`statusactivetime`='$date' WHERE `id` ='$userpermission'";   
mysqli_query($con,$query);

 
     
    
   
   }
echo "<script language='javascript'>alert('Student $inputUserStatusType Successfully');window.location='$Currentwebsiteurl'</script>";
}
                                      ?>
                                         <form action="" method="POST"  name="ModuleUserPermissionAdd">
                                           <div class='container'>
                                      <div class="row">
                                         <div class="col-sm-6">
                                          <div class="card">
      <div class="card-body">
                            <div class="form-floating mb-3 mb-md-0">            
  <h2>User Name</h2>
  <input type='checkbox' id='checkallusers'  value=''> Select All<br/>
  <select id='ModuleUserPermission'name='ModuleUserPermission[]' required size="15" multiple>
    <?php
$rscourse=mysqli_query($con,"SELECT * FROM `student_list`  WHERE `status` = 'Active' AND `student_status`='Pending' AND `session`='$activesession_record' ");
      while($rowcourse=mysqli_fetch_array($rscourse))
{
?>
<option value='<?php echo $rowcourse[0]; ?>'><?php echo $rowcourse[1]."| ".$rowcourse[2]." ".$rowcourse[3]." ".$rowcourse[4];?></;?></option>

<?php
}
?>
  </select>
   

</div>
</div>
</div>
</div>

<div class="col-sm-6">
    <div class="card">
      <div class="card-body">
      	<div class="row mb-3">
         <div class="col-md-5">
<div class="form-floating mb-3 mb-md-0">
     <select class="form-select" name="inputUserStatusType" id="inputUserStatusType" required="inputUserStatusType">
                                          <option selected="selected" value="" disabled selected>-- Select an option --</option>
                                          
                                        <option  value="Approve">Approve</option>
                                       <option  value="Rejected">Rejected</option>
                                                          
                                                    
                                                            
                                                </select>
                                                <label for="inputUserStatusType">User Status</label>
</div>
</div>   
      <div class="col-md-7">
<div class="form-floating mb-3 mb-md-0">
      <input class="form-control" id="userApproveReason" name="userApproveReason" type="text" placeholder="Enter your User Delete Reason" required="userApproveReason" />
                                                        <label for="userApproveReason">User Approve Reason</label>
    </div>
</div>
  </div>

      </div>
      </div>
    </div>
</div>

</div>         

                        <div class="mt-4 mb-0" align="center" >
                             <input class="btn btn-success " type="submit" name="ModuleUserPermissionAdd"  id="ModuleUserPermissionAdd" value=" Submit" >                                  
                        </div>

                </form>
                                    </div>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </main>




<?php
include("include/footer.php");
    ?>
<script type='text/javascript'>
 $(document).ready(function(){
   $("#checkallusers").change(function(){
     var checked = $(this).is(':checked'); // Checkbox state

     // Select all
     if(checked){
       $('#ModuleUserPermission option').each(function() {
          $(this).prop('selected',true);
       });
     }else{
       // Deselect All
       $('#ModuleUserPermission option').each(function() {
         $(this).prop('selected',false);
       });
     }
 
  });
 
  // Changing state of Checkbox
  $("#ModuleUserPermission").change(function(){
 
    // When total options equals to total selected option
    if($("#ModuleUserPermission option").length == $("#ModuleUserPermission option:selected").length) {
       $("#checkallusers").prop("checked", true);
    } else {
       $("#checkallusers").prop("checked", false);
    }
   });
 });
 </script>