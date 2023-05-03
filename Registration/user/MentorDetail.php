<?php include("include/header.php"); ?>


 <!---------------------  ADD Sub Content  Modal ---------------------------->
<div class="modal fade" id="AddStudentMentorModel" tabindex="-1" aria-labelledby="AddStudentMentorModelLabel" aria-hidden="true"  data-bs-backdrop="static" data-bs-keyboard="false" >
   <?php 
 
extract($_POST);
extract($_GET);
date_default_timezone_set('Asia/Kolkata');      
$date=date("Y-m-d h:i:s a");
$status = "Active";
if(isset($AddMentor))
{
mysqli_query($con,"INSERT INTO `mentordetail`(`mentordetail_teamid`, `mentordetail_mentorcampus`, `mentordetail_mentortitle`, `mentordetail_mentorname`, `mentordetail_mentoremail`, `mentordetail_mentornumber`, `mentordetail_mentorstatus`, `mentordetail_mentorcreatedby`, `mentordetail_mentorcreateddatetime`) VALUES ('$log','$InputMentorCampus','$InputMentorFacultyTitle','$InputMentorName','$InputMentorEmail','$InputMentorMobilenumber','$status','$log','$date')") or die(mysqli_error());

echo "<script language='javascript'>alert('$InputMentorFacultyTitle $InputMentorName Add Sucessfully')</script>"; 
    echo "<script>window.location=' $Currentwebsiteurl '</script>";

}

?>
     <script src="ckeditor/fullpackage/ckeditor.js"></script>
<script src="ckfinder/ckfinder.js"></script>
  <div class="modal-dialog modal-xl">
   
    <div class="modal-content">
      <div class="modal-header">

        <h5 class="modal-title" id="addcontentmodelnameLabel">Add Mentor Detail</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
     
          <?php 
          $countquerycheckformember=mysqli_query($con,"SELECT COUNT(`mentordetail_id`) AS `count_number` FROM `mentordetail` WHERE `mentordetail_teamid`='$log' AND `mentordetail_mentorstatus`!='InActive'");
 $countquerycheckformemberresult=mysqli_fetch_assoc($countquerycheckformember);
        $countforcheck=$countquerycheckformemberresult['count_number'];
        ?>          
      
        <?php  if($countforcheck<1) { ?>
             <div class="alert alert-danger" role="alert">
   <h4 align="left" style="font-family:'type'; color:#f7260f"><b>Note:</b>
       
        <br>&emsp;&emsp;*There Should be max 1 mentor in Team.
        <br>&emsp;&emsp;*Change In Any Detail Then Contact to 7302020015.

  
</h4>
</div>
<div class="modal-body">
        <form action="<?php echo $Currentwebsiteurl;?>" method="POST" name="form" onsubmit="return check();" enctype="multipart/form-data">
                                            <div class="row mb-3">
                                            
                                                <div class="col-md-3">
                                                    <div class="form-floating mb-3 mb-md-0">
                                            <select class="form-select" name="InputMentorCampus" id="InputMentorCampus" required  >
                                             <option selected="selected" value="" disabled >-- Select an option --</option>
                                                         <?php
$campusselect=mysqli_query($con,"SELECT * FROM `campus` WHERE  `status`='Active'");
      while($resultcampusselect=mysqli_fetch_array($campusselect))
{

echo "<option value='$resultcampusselect[0]'>$resultcampusselect[1]</option>";

}
?>
</select>
                                                      
                                                        <label for="InputMentorCampus">Mentor Campus</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <select class="form-select" id="InputMentorFacultyTitle" name="InputMentorFacultyTitle"  required>
                <option selected="selected" value=""disabled selected>-- Select  --</option>
                 <option value="Prof." >Prof.</option>
                 <option value="Dr." >Dr.</option>
                 <option value="Mr." >Mr.</option>
                 <option value="Mr.s." >Mr.s.</option>
                 <option value="Miss." >Miss.</option>
                 
             </select>
                                                        <label for="InputMentorFacultyTitle">Mentor Title</label>
                                                    </div>
                                                </div>

                                              <div class="col-md-2">
                                                  <div class="form-floating mb-3 mb-md-0">
                                                       
                                    <input type="text" class="form-control" id="InputMentorName" name="InputMentorName" placeholder="Please Enter Mentor Name"  required>
                                                        <label for="InputMentorName">Mentor Name</label>
                                                    </div>
                                                </div>
                                            <div class="col-md-3">
                                                  <div class="form-floating mb-3 mb-md-0">
                                                       
                                    <input type="email" class="form-control" id="InputMentorEmail" name="InputMentorEmail"  placeholder="Please Enter Mentor Email" required>
                                                        <label for="InputMentorEmail">Mentor Email</label>
                                                    </div>
                                                </div>
                                                 <div class="col-md-2">
                                                  <div class="form-floating mb-3 mb-md-0">
                                                       
                                    <input type="text" class="form-control" id="InputMentorMobilenumber" name="InputMentorMobilenumber"  placeholder="Please Enter Mentor Email" required>
                                                        <label for="InputMentorMobilenumber">Mentor Mobile No.</label>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                           
                                   
                                          
                                            <div class="mt-4 mb-0" align="center">
                                                 <input class="btn btn-success "type="submit" name="AddMentor" id="AddMentor" Value="Add Mentor"/>                                            </div>
                                        </form>
                                          </div>
                                    <?php }  else { ?>

                                      
<div class="modal-body">
  <div class="alert alert-danger" role="alert">
   <h4 align="left" style="font-family:'type'; color:#f7260f"><b>Note:</b>
       
        <br>&emsp;&emsp;*You Have Added Mentor.
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
                                &nbsp;<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddStudentMentorModel"> <span class="fas fa-plus-circle"></span> Add Mentor Detail</button>
                            </div>
                        </div>
                        <div class="card mb-4">
                            
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               Mentor Detail
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimpl">
                                    <thead>
                                        <tr>
                                           <th>S.No</th>
                                           <th>Team Name</th>
                                           <th>Mentor Campus</th>
                                            <th>Mentor Name</th>
                                             <th>Mentor Email</th>
                                             <th>Mentor Number</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                        <?php

                                        $count = 0;
                                        $noticequery=mysqli_query($con,"SELECT * FROM `mentordetail` WHERE `mentordetail_teamid`='$log' AND  `mentordetail_mentorstatus`='Active' ");
                                        while($noticequeryresult=mysqli_fetch_assoc($noticequery))
    {
        $count+=1;
$id=$noticequeryresult['mentordetail_id'];
$teamid=$noticequeryresult['mentordetail_teamid'];
$mentorcampus=$noticequeryresult['mentordetail_mentorcampus'];


                                 $result123=mysqli_query($con,"SELECT * FROM `registration` WHERE `payment_id`='$teamid'");
                                    $row12=mysqli_fetch_array($result123);
                                    $TeamName=$row12['team_name'];
                                    $result12=mysqli_query($con,"SELECT * FROM `campus` WHERE `campus_id`='$mentorcampus'");
                                    $row1=mysqli_fetch_array($result12);
                                    $campusname=$row1['campus_acroym'];

                                        ?>
                                        <tr>        
                                            <td><?php echo $count; ?></td>
                                            <td><?php echo $TeamName; ?></td>
                                            <td><?php echo $campusname; ?></td>
                                            <td><?php echo $noticequeryresult['mentordetail_mentortitle']." ".$noticequeryresult['mentordetail_mentorname']; ?></td>
                                            <td><?php echo $noticequeryresult['mentordetail_mentoremail']; ?></td>
                                            <td><?php echo $noticequeryresult['mentordetail_mentornumber']; ?></td>
                                            
                                            
                                         
                                          
                                        </tr>
                                        <?php
if((isset($_GET['activesession'])) && $_GET['activesession']=="$id")
   {

    
   date_default_timezone_set('Asia/Kolkata');      
   $date=date("d-m-Y h:i:sa");
   $inactivequery="UPDATE `session` SET `status`='InActive'";
   mysqli_query($con,$inactivequery);
    $query="UPDATE `session` SET `status`='Active',`updateby`='$log',`updatetime`='$date' WHERE `id` ='$id'";   
mysqli_query($con,$query);
  echo "<script language='javascript'>alert('Session Active');window.location='session.php'</script>";
  }
?>
                                       
                                        <?php
                                    }
                                        ?>

                                       
                                    </tbody>
                                </table>
                            </div>
    
                                </div>
                </main>


<?php include("include/footer.php"); ?>
<script type="text/javascript">
     
    function check()
    {  
var string=document.form.InputMentorEmail.value;  
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