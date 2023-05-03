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
                                User wise Balance Collection Report
                            </div>
                            <div class="card-body">
                                <div style="overflow-x:auto;">
                                <table id="datatablesSimpl">
                                    <thead>
                                        <tr>
                                           <th>S.No</th>
                                            <th>User Name</th>
                                            <th>Total Count</th>
                                            <th>Total Amount</th>
                                            <th>Paid Amount</th>
                                            <th>Balance Amount</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                       <?php
                                     
                                       $count = 0;
                                        $sql=mysqli_query($con,"SELECT `student_fee_update_by`,COUNT(`student_fee_update_by`) FROM `student_list` WHERE `student_fee_status`='PAID' AND `status`='Active'AND `session`='$activesession_record' GROUP by `student_fee_update_by` ORDER BY `COUNT(``student_fee_update_by``)` ASC ");
                                        while($result=mysqli_fetch_assoc($sql))
    {
        $count+=1;
$created_user_id=$result['student_fee_update_by'];
$updated_user_id=$result['updateby'];
$courseid=$result['course_id2'];

                                     
                $result123=mysqli_query($con,"SELECT * FROM `user` WHERE `id`=\"$created_user_id\"");
                $row12=mysqli_fetch_array($result123);
                $user_login_name=$row12['first_name']." ".$row12['middle_name']." ".$row12['last_name'];

                $usercount=mysqli_query($con,"SELECT `user_id`,SUM(`amount`) FROM `feerecord` WHERE `user_id`='$created_user_id' AND `status`='Active'AND `session`='$activesession_record' GROUP by `user_id` ORDER BY `SUM(``amount``)`");
                $usercountrow12=mysqli_fetch_array($usercount);
                //$useramount=$usercountrow12['first_name']." ".$usercountrow12['middle_name']." ".$usercountrow12['last_name'];


                                        ?>

                                        <tr>        
                                            <td><?php echo $count; ?></td>
                                            <td><?php echo $user_login_name; ?></td>
                                            <td><?php echo $result['COUNT(`student_fee_update_by`)']; ?></td>
                                            
                                            
                                            <td><?php echo $result['COUNT(`student_fee_update_by`)']*$currentyearfee; ?></td>
                                            <td><?php  if($usercountrow12['SUM(`amount`)']){echo $usercountrow12['SUM(`amount`)'];}else{echo '0';} ?></td>
                                            <td><?php echo $result['COUNT(`student_fee_update_by`)']*$currentyearfee-$usercountrow12['SUM(`amount`)']; ?></td>

                                           
                                            
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
      

                                              
                                           