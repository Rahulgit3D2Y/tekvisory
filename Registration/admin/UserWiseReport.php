<?php
include("include/header.php");
require("permission_check.php");
?>


                     
           <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                      
                        <div class="card mb-4">
                            
                        </div>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                User wise Cash PAID Collection Report
                            </div>
                            <div class="card-body">
                                <div style="overflow-x:auto;">
                                <table id="datatablesSimpl">
                                    <thead>
                                        <tr>
                                           <th>S.No</th>
                                            <th>User Name</th>
                                            <th>Total Count</th>
                                          
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                       <?php
                                     
                                       $count = 0;
                                        $sql=mysqli_query($con,"SELECT `feeupdateby`,COUNT(`feeupdateby`) FROM `registration` WHERE `paid_mode`='Cash' AND `fee_status`='Active'AND `session`='$activesession_record' GROUP by `feeupdateby` ORDER BY `COUNT(``feeupdateby``)` ASC ");
                                        while($result=mysqli_fetch_assoc($sql))
    {
        $count+=1;
$created_user_id=$result['feeupdateby'];
$updated_user_id=$result['updateby'];
$courseid=$result['course_id2'];

                                     
                                                         $result123=mysqli_query($con,"SELECT * FROM `user` WHERE `id`=\"$created_user_id\"");
                                                          $row12=mysqli_fetch_array($result123);
                                                          $user_login_name=$row12['first_name']." ".$row12['middle_name']." ".$row12['last_name'];


                                        ?>

                                        <tr>        
                                            <td><?php echo $count; ?></td>
                                            <td><?php echo $user_login_name; ?></td>
                                            <td><?php echo $result['COUNT(`feeupdateby`)']; ?></td>
                                            
                                            
                                           

                                           
                                            
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
<!--- New Code --->
<div class="container-fluid px-4">
                      
                        <div class="card mb-4">
                            
                        </div>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                User wise Online PAID Collection Report
                            </div>
                            <div class="card-body">
                                <div style="overflow-x:auto;">
                                <table id="NewRecordTabl">
                                    <thead>
                                        <tr>
                                           <th>S.No</th>
                                            <th>User Name</th>
                                            <th>Total Count</th>
                                          
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                       <?php
                                     
                                       $count = 0;
                                        $sql=mysqli_query($con,"SELECT `feeupdateby`,COUNT(`feeupdateby`) FROM `registration` WHERE `paid_mode`='Online' AND `fee_status`='Active' AND `session`='$activesession_record' GROUP by `feeupdateby` ORDER BY `COUNT(``feeupdateby``)` ASC ");
                                        while($result=mysqli_fetch_assoc($sql))
    {
        $count+=1;
$created_user_id=$result['feeupdateby'];
$updated_user_id=$result['updateby'];
$courseid=$result['course_id2'];

                                     
        $result123=mysqli_query($con,"SELECT * FROM `user` WHERE `id`=\"$created_user_id\"");
         $row12=mysqli_fetch_array($result123);
         $user_login_name=$row12['first_name']." ".$row12['middle_name']." ".$row12['last_name'];


                                        ?>

                                        <tr>        
                                            <td><?php echo $count; ?></td>
                                            <td><?php if($created_user_id) { echo $user_login_name; } else { echo "Auto Generated"; } ?></td>
                                            <td><?php echo $result['COUNT(`feeupdateby`)']; ?></td>
                                            
                                            
                                           

                                           
                                            
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
          include("include/footer.php");  
      ?>
      

                                              
                                           