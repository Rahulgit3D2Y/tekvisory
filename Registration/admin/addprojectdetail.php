<?php
include("include/header.php");
require("permission_check.php");
?>
<!---------------------  ADD Sub Content  Modal ---------------------------->
<div class="modal fade" id="addcontentmodelname" tabindex="-1" aria-labelledby="addcontentmodelnameLabel" aria-hidden="true"  data-bs-backdrop="static" data-bs-keyboard="false" >
    <?php 
 
extract($_POST);
extract($_GET);
    $contentnamestatus = "Active";
    $startno="001";
date_default_timezone_set('Asia/Kolkata');      
$date=date("Y-m-d h:i:sa");
$teamidgenid1="IDH-";
    if(isset($AddSubContent))
{
     $rs=mysqli_query($con,"SELECT * FROM `projectcontent` WHERE `projectcontent_name`='$contentname'");
if (mysqli_num_rows($rs)>0)
{
    //$msgq="Data Already exits";
    echo "<script language='javascript'>alert('Data allready in Exist');window.location='$Currentwebsiteurl'</script>";
exit();
} 
else
{

     $teamidgen=mysqli_query($con,"SELECT * FROM `projectcontent` WHERE LEFT(`projectcontent_titleid`,4) LIKE '%$teamidgenid1%' ORDER BY `projectcontent_id` DESC LIMIT 1");
 if (mysqli_num_rows($teamidgen)>0)
{
    if ($teamidgenrow=mysqli_fetch_row($teamidgen)) 
    {
        $teamidgenuid = $teamidgenrow['1'];
       $teamidgenget_numbers = str_replace("IDH-","",$teamidgenuid);
        //$teamidgenid_increase = $teamidgenuid+1;
        $teamidgenid_increase = $teamidgenget_numbers+1;
        $teamidgenget_string = str_pad($teamidgenid_increase,3,0,STR_PAD_LEFT);
        $teamidgenid = "IDH-".$teamidgenget_string;
        //$teamidgenid = $teamidgenget_string;

mysqli_query($con,"INSERT INTO `projectcontent`(`projectcontent_titleid`,`projectcontent_contentid`,`projectcontent_name`,`projectcontent_description`,`projectcontent_status`, `projectcontent_createdby`, `projectcontent_createdtime`, `projectcontent_session`) VALUES ('$teamidgenid','$inputcontentid','$subcontentname','$InputProjectdescription','$contentnamestatus','$log','$date','$activesession_record')");

    }
   
}  
else
{    
  
     $teamidgenid="IDH-"."".$startno;


mysqli_query($con,"INSERT INTO `projectcontent`(`projectcontent_titleid`,`projectcontent_contentid`,`projectcontent_name`,`projectcontent_description`,`projectcontent_status`, `projectcontent_createdby`, `projectcontent_createdtime`, `projectcontent_session`) VALUES ('$teamidgenid','$inputcontentid','$subcontentname','$InputProjectdescription','$contentnamestatus','$log','$date','$activesession_record')");

}

    
        

echo "<script language='javascript'>alert('$subcontentname Project Title Add succesfully');window.location='$Currentwebsiteurl'</script>";
//echo "<script language='javascript'>location.reload();</script>";
}
}
?>
     <script src="ckeditor/fullpackage/ckeditor.js"></script>
<script src="ckfinder/ckfinder.js"></script>
  <div class="modal-dialog modal-xl">
    <form action="" method="POST">
    <div class="modal-content">
      <div class="modal-header">

        <h5 class="modal-title" id="addcontentmodelnameLabel">Add Project Detail</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
   
                    
      <div class="modal-body">
        <div class="row mb-3">
             <div class="col-md-4">
             <label for="addnotesremark" class="col-form-label">Cateory Name<span style="color: red">*</span> </label>
             <select class="form-select" id="inputcontentid" name="inputcontentid" required >
                 <option selected="selected" value=""disabled selected>-- Select an option --</option>
<?php
$inputcontentquery=mysqli_query($con,"SELECT * FROM `category` WHERE `category_status`='Active'");
      while($inputcontentqueryresult=mysqli_fetch_array($inputcontentquery))
{
if($inputcontentqueryresult[1])
{
    ?>
    <option value='<?php echo $inputcontentqueryresult[0]; ?>'
   
><?php echo $inputcontentqueryresult[1]; ?></option>
<?php
}

}
?>
             </select>
          </div> 
           
          <div class="col-md-6">
             <label for="addnotesremark" class="col-form-label">Project Title<span style="color: red">*</span> </label>
            <input type="text" class="form-control" id="subcontentname" name="subcontentname" required>
          </div>

        </div>
        <div class="row mb-3">
             <div class="col-md-12">
                 <label for="addnotesremark" class="col-form-label">Project Description<span style="color: red">*</span> </label>
            <textarea class="form-control" id="InputProjectdescription" name="InputProjectdescription" placeholder="Enter your Subject" required="InputProjectdescription" rows="20" cols="6" style="height: 130px;"></textarea>
             </div>

            </div>
      </div>
      <div class="modal-footer">
      
       <input class="btn btn-success" type="submit" name="AddSubContent" id="AddSubContent" value="Add" >
    
         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
      
    </div>
  </div>
</form>

</div>

<!---------------------------------------------- end ADD Sub Content modal ------------------------------------------>
 <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                      
                        <div class="card mb-4">
                              <div class="card-body">
                                &nbsp;<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addcontentmodelname"> <span class="fas fa-plus-circle"></span> Add Project Detail</button>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Menu
                            </div>
                            <div class="card-body">
                                 <div style="overflow-x:auto;">
                                <table id="datatablesSimpl">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Cateory Name</th>
                                            <th>Project Title</th>
                                             <th>Project Description</th>
                                            <th>Add By</th>
                                            <th>Update By</th>
                                            <th>Update</th>
                                            <th>Delete</th>
                                            
                                        </tr>
                                    </thead>

                                    
                                     <tbody>
                                        <?php
                                       
                                        $count = 0;
                                        $sql=mysqli_query($con,"SELECT * FROM `projectcontent` WHERE `projectcontent_status`='Active' AND `projectcontent_session`='$activesession_record'");
                                        while($result=mysqli_fetch_assoc($sql))
    {
        $count+=1;
   $id=$result['projectcontent_id'];
   $subcontentid=$result['projectcontent_contentid'];     
$created_user_id=$result['projectcontent_createdby'];
$updated_user_id=$result['projectcontent_updateby'];


        $result123=mysqli_query($con,"SELECT * FROM `user` WHERE `id`=\"$created_user_id\"");
        $row12=mysqli_fetch_array($result123);
        $user_login_name=$row12['first_name']." ".$row12['middle_name']." ".$row12['last_name'];
        $result12=mysqli_query($con,"SELECT * FROM `user` WHERE `id`=\"$updated_user_id\"");
        $row1=mysqli_fetch_array($result12);
         $upadted_user_login_name=$row1['first_name']." ".$row1['middle_name']." ".$row1['last_name'];
         /* Query For Content*/
         $contentnamequery=mysqli_query($con,"SELECT * FROM `category` WHERE `category_id`='$subcontentid'");
        $resultcontentnamequery=mysqli_fetch_array($contentnamequery);
         $ContentName=$resultcontentnamequery['category_name'];


                                        ?>

                                        <tr>        
                                            <td><?php echo $count; ?></td>
                                            <td><?php echo $ContentName; ?></td>
                                            <td><?php echo $result['projectcontent_name']; ?></td>
                                            <td><?php echo $result['projectcontent_description']; ?></td>
                                             <td><?php echo $user_login_name; ?></td>
                                              <td><?php echo $upadted_user_login_name; ?></td>
                                               
                                           
                                            <td><a href="menu_update.php?menu_id=<?php echo $id;?>" onclick="return confirm('Do you really want to Update <?php echo $result['subcontent_name'] ?>?');"><span class='fas fa-edit'></span></a></td>
                                    <td><a href="menu_delete.php?menu_id=<?php echo $id;?>"onclick="return confirm('Do you really want to Delete <?php echo $result['subcontent_name'] ?>?');"><span class='fas fa-trash'></span></a></td> 
                                            
                                              
                                            
                                        </tr>
                                       
                                        <?php
                                    }
                                        ?>
                                       
                                       
                                    </tbody>

                                  
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>

<?php
if($_GET['action']=='Enable')
{    
    date_default_timezone_set('Asia/Kolkata');      
   $date=date("d-m-Y h:i:sa");
$pid=intval($_GET['popupid']);    
$query=mysqli_query($con, "UPDATE `advancesetting` SET `popupstatus`='Active',`popupupdatedatetime`='$date',`popupupdateby`='$log' WHERE `popupid`='$pid'");
echo '<script>alert("Module Enable Succesfully")</script>';
  echo "<script>window.location.href='advance_setting.php'</script>";
}

?>
<?php
if($_GET['action']=='Disable')
{    
    date_default_timezone_set('Asia/Kolkata');      
   $date=date("d-m-Y h:i:sa");
$pid=intval($_GET['popupid']);    
$query=mysqli_query($con, "UPDATE `advancesetting` SET `popupstatus`='InActive',`popdisabletime`='$date',`popdisableby`='$log' WHERE `popupid`='$pid'");
echo '<script>alert("Module Disable Succesfully")</script>';
  echo "<script>window.location.href='advance_setting.php'</script>";
}

?>




<?php
include("include/footer.php");
?>

<script type="text/javascript">
    var editor = CKEDITOR.replace('InputProjectdescription');
    CKFinder.setupCKEditor(editor);
</script>