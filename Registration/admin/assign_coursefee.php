<?php
include("include/header.php");
require("permission_check.php");
?>
<?php
date_default_timezone_set('Asia/Kolkata');      
$date=date("d-m-Y h:i:sa");
$status = "Active";
$q=mysqli_query($con,"SELECT * FROM `school` WHERE `status` = \"Active\"");
$res=mysqli_fetch_assoc($q);

$inputSchoolName=$res['school_id'];
if(isset($submit))
{

$dateyear=$_POST['inputsessionyear']; 
 $studentsessionquery=mysqli_query($con,"SELECT * FROM `session`  WHERE `fyear`='$dateyear'");
            $studentsessionqueryrow1=mysqli_fetch_array($studentsessionquery);
            $studentsessionyearrecord = $studentsessionqueryrow1['session_year'];

           

        $rs=mysqli_query($con,"SELECT * FROM `course_fee` WHERE `session`='$studentsessionyearrecord' AND`event_name`='$inputEventName' AND `status`='Active' ");
if (mysqli_num_rows($rs)>0)
{
    echo "<script language='javascript'>alert('Event Name Already Exits for  $studentsessionyearrecord session');window.location='$Currentwebsiteurl'</script>";
        //echo "<br><H3><div class=head1><a href=login.php>ADMIN HOME</a></H3></div>";
exit;
} 

mysqli_query($con,"INSERT INTO `course_fee`(`session`, `event_name`,`course_fee`, `event_status`,`status`,`farewell_date`,  `createdby`, `createdtime`) VALUES ('$studentsessionyearrecord','$inputEventName','$inputcoursefee','$status','$status','$inputFarewellFeeDate','$log','$date')") or die(mysqli_error());
echo "<script language='javascript'>alert('₹ $inputcoursefee Fee Add SuccessFully  for  $studentsessionyearrecord session');window.location='$Currentwebsiteurl'</script>";

}
?>

                     
           <!-- main content -->
            <div id="layoutSidenav_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="card shadow-lg border-0 rounded-lg mt-1">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-1">Add  Fee</h3></div>
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
                                                <div class="col-md-3">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputEventName" name="inputEventName" type="text" placeholder="Enter your Course Id" required="inputEventName"   title="Enter The Event Name" />
                                                        <label for="inputEventName">Event Name</label>
                                                    </div>
                                                </div>
                                                 
                                                <div class="col-md-2">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputcoursefee" name="inputcoursefee" type="text" placeholder="Enter your Course Id" required="inputcoursefee" minlength="6" maxlength="6" max="6" min="6"oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  title="Enter The Number" />
                                                        <label for="inputcoursefee">Event Fee</label>
                                                    </div>
                                                </div>
                                                 <div class="col-md-2">
                                                    <div class="form-floating mb-3 mb-md-0">

                                                        <input class="form-control" id="inputFarewellFeeDate" name="inputFarewellFeeDate" type="date" placeholder="Enter your student Id" required value="<?php echo date('Y-m-d');?>" <?php if($login_user_type=="superuser") 
{?>
 
<?php }
else
{ ?>
  min="<?php echo date('Y-m-d');?>"
<?php } ?> />
                                                        <label for="inputFarewellFeeDate">Event Date </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                 <input class="btn btn-success "type="submit" name="submit" id="submit" Value="Add"/>
                                                 </div>
                                                                                             </div>
                                                
                                            </div>
                                           
                                         

                                            
                                        </form>
                                    </div>
                                  
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Fee Detail
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimpl">
                                    <thead>
                                        <tr>
                                           <th>S.No</th>
                                           <th>Session</th>
                                           <th>Event Name</th>
                                           <th>Event Fee</th>
                                           <th>Event Date</th>
                                           <th>Created By</th>
                                           <th>Update By</th>
                                           <th>Update</th>
                                         
                                           
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                        <?php

                                        $count = 0;
                                        $noticequery=mysqli_query($con,"SELECT * FROM `course_fee` WHERE `status`=\"Active\" AND `session`='$activesession_record' ORDER BY `fee_id` DESC");
                                        while($noticequeryresult=mysqli_fetch_assoc($noticequery))
    {
        $count+=1;
$id=$noticequeryresult['fee_id'];
$course_id=$noticequeryresult['course_id'];
$created_user_id=$noticequeryresult['createdby'];
$updated_user_id=$noticequeryresult['updateby'];

                                              $result123coursename=mysqli_query($con,"SELECT * FROM `course_detail` WHERE `course_id2`=\"$course_id\"");
                                            $result123coursename123=mysqli_fetch_array($result123coursename);
                                                        $course_name=$result123coursename123['course_name'];
                                                     $result123=mysqli_query($con,"SELECT * FROM `user` WHERE `id`=\"$created_user_id\"");
                                                          $row12=mysqli_fetch_array($result123);
                                                          $user_login_name=$row12['first_name']." ".$row12['middle_name']." ".$row12['last_name'];
                                                          $result12=mysqli_query($con,"SELECT * FROM `user` WHERE `id`=\"$updated_user_id\"");
                                                          $row1=mysqli_fetch_array($result12);
                                                          $upadted_user_login_name=$row1['first_name']." ".$row1['middle_name']." ".$row1['last_name'];
                                        ?>
                                        <tr>        
                                            <td><?php echo $count; ?></td>
                                            <td><?php echo $noticequeryresult['session']; ?></td>
                                        <td><?php echo $noticequeryresult['event_name']; ?></td>
                                            <td><?php echo $noticequeryresult['course_fee']; ?></td>
                                            <td><?php echo date("d-m-Y", strtotime($noticequeryresult['farewell_date']));  ?></td>
                                            <td><?php echo $user_login_name; ?></td>
                                            <td><?php echo $upadted_user_login_name; ?></td>
                                             <td><a href="update_assignfee.php?fee_id=<?php echo $id;?>"><span class='fas fa-edit'></span></a></td>
                                           
                                            
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