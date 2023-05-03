<?php
include("include/header.php");
require("permission_check.php");
?>
<?php
date_default_timezone_set('Asia/Kolkata');      
$date=date("d-m-Y h:i:sa");
extract($_REQUEST);
 $id=$_GET['fee_id'];
$searchassignfeequery=mysqli_query($con,"SELECT * FROM `course_fee` WHERE `fee_id`='$id' AND `status` = \"Active\"");
$searchassignfeequeryresult=mysqli_fetch_assoc($searchassignfeequery) OR die("<script language='javascript'>alert('Error Please Contact To Administrator');window.location='assign_coursefee.php'</script>");
$inputeventnamechecker=$searchassignfeequeryresult['event_name'];
if(isset($submit))
{

       
$dateyear=$_POST['inputsessionyear']; 
 $studentsessionquery=mysqli_query($con,"SELECT * FROM `session`  WHERE `fyear`='$dateyear'");
            $studentsessionqueryrow1=mysqli_fetch_array($studentsessionquery);
            $studentsessionyearrecord = $studentsessionqueryrow1['session_year'];
if($inputeventnamechecker==$inputEventName)
  {
$studentupdatequery="UPDATE `course_fee` SET `event_name`='$inputEventName',`course_fee`='$inputcoursefee',`farewell_date`='$inputFarewellFeeDate',`updateby`='$log',`updatetime`='$date' WHERE `fee_id` = '$id' AND `status`=\"Active\"";
mysqli_query($con,$studentupdatequery);


echo "<script language='javascript'>alert('Detail Update Successfully');window.location='$Currentwebsiteurl'</script>";

  }
  else  
{
    $rs=mysqli_query($con,"SELECT * FROM `course_fee` WHERE `session`='$studentsessionyearrecord' AND`event_name`='$inputEventName' AND `status`='Active' ");
if (mysqli_num_rows($rs)>0)
{
    echo "<script language='javascript'>alert('Event Name Already Exits for  $studentsessionyearrecord session');window.location='$Currentwebsiteurl'</script>";
        //echo "<br><H3><div class=head1><a href=login.php>ADMIN HOME</a></H3></div>";
exit;
}      

$studentupdatequery="UPDATE `course_fee` SET `event_name`='$inputEventName',`course_fee`='$inputcoursefee',`farewell_date`='$inputFarewellFeeDate',`updateby`='$log',`updatetime`='$date' WHERE `fee_id` = '$id' AND `status`=\"Active\"";
mysqli_query($con,$studentupdatequery);


echo "<script language='javascript'>alert('Detail Update Successfully');window.location='$Currentwebsiteurl'</script>";


}


       

}
?>

                     
           <!-- main content -->
            <div id="layoutSidenav_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="card shadow-lg border-0 rounded-lg mt-1">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-1">Add Event Detail & Fee</h3></div>
                                    <div class="card-body">
                                         <form action="" method="post">
                                            <div class="row mb-3">
                                             <!--   <div class="col-md-3">
                                                   <div class="form-floating mb-3 mb-md-0">
                                                        <select class="form-control" name="inputSchoolName" id="inputSchoolName"  required="inputSchoolName">
         <option selected="selected" value=""disabled selected>-- Select an option --</option>
<?php
$rscourse=mysqli_query($con,"Select * from school  where status = \"Active\"");
      while($rowcourse=mysqli_fetch_array($rscourse))
{

echo "<option value='$rowcourse[0]'>$rowcourse[1]</option>";

}
?>
      </select>
                                                        <label for="inputSchoolName">School</label>
                                                    </div>
                                                </div>-->
                                                <div class="col-md-3">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <select class="form-select" name="inputsessionyear" id="inputsessionyear"  required="inputsessionyear" onselect="document.getElementById('$inputsessionyear');">
          <option selected="selected" value=""disabled selected>-- Select an option --</option>
<?php
$rssession=mysqli_query($con,"SELECT * FROM `session`  ORDER BY `session`.`session_year` DESC");
      while($rowsession=mysqli_fetch_array($rssession))
{
if($rowsession[1]==$searchassignfeequeryresult['session'])
{?>
<option value='<?php echo $rowsession[3];?>'<?php if($searchassignfeequeryresult['session']==$rowsession[1])
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
                                                <div class="col-md-3">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputEventName" name="inputEventName" type="text" placeholder="Enter your Course Id" value="<?php echo $searchassignfeequeryresult['event_name'];?>" required="inputEventName"   title="Enter The Event Name" />
                                                        <label for="inputEventName">Event Name</label>
                                                    </div>
                                                </div>
                                                 
                                                <div class="col-md-2">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputcoursefee" name="inputcoursefee" type="text" placeholder="Enter your Course Id" required="inputcoursefee" minlength="6" maxlength="6" max="6" min="6"oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $searchassignfeequeryresult['course_fee'];?>" title="Enter The Number" />
                                                        <label for="inputcoursefee">Farewell Fee</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-floating mb-3 mb-md-0">

                                                        <input class="form-control" id="inputFarewellFeeDate" name="inputFarewellFeeDate" type="date" placeholder="Enter your student Id" required value="<?php echo $searchassignfeequeryresult['farewell_date'];?>" <?php if($login_user_type=="superuser") 
{?>
 
<?php }
else
{ ?>
  min="<?php echo date('Y-m-d');?>"
<?php } ?> />
                                                        <label for="inputFarewellFeeDate">Farewell Date </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                 <input class="btn btn-success "type="submit" name="submit" id="submit" Value="Update"/>
                                                 </div>
                                                                                             </div>
                                                
                                            </div>
                                           
                                         

                                            
                                        </form>
                                    </div>
                                  
                                </div>
                            </div>
                        </div>
                       

                </main>

<?php
          include("include/footer.php");  
      ?>