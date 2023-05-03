<?php
 require("../admin/include/config.php"); 
 ?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="images/favicon.ico">
    <title>Tech Wizard 2.0</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript">
        function CourseChangeFunction() {
        selectElement_fee = document.querySelector('#course');
        selectElement_fee_output = selectElement_fee.value;
        if(selectElement_fee_output == "211")
        {
       document.getElementById("Section").readOnly = true;
       document.getElementById("Section").disabled = true;
       document.getElementById("Section").value=" ";
       document.getElementById("Section").required = false;
        
         }
         else if(selectElement_fee_output == "221")
         {
           document.getElementById("Section").readOnly = true;
           document.getElementById("Section").disabled = true;
           document.getElementById("Section").value=" ";
            document.getElementById("Section").required = false;
         }
         else if(selectElement_fee_output == "189")
         {
            document.getElementById("Section").readOnly = true; 
            document.getElementById("Section").disabled = true;
            document.getElementById("Section").value=" ";
           document.getElementById("Section").required = false;
         }
         else
         {
            document.getElementById("Section").disabled = false;
          document.getElementById("Section").required = true;  
         }
    
    }
    </script>
</head>




<body>


<?php 
$tempactivesessionquery=mysqli_query($con,"SELECT * FROM `session` WHERE `status` ='Active'");
$tempresactivesessionquery=mysqli_fetch_assoc($tempactivesessionquery);
$temp_activesession_record=$tempresactivesessionquery['session_year'];
date_default_timezone_set('Asia/Kolkata');      
$date=date("d-m-Y h:i:sa");
$status="Active";
    $user_status="Pending";
extract($_POST);
extract($_GET);
if(isset($submit))
{
    
     $rs=mysqli_query($con,"SELECT * FROM `student_list` WHERE `student_id`='$Studentid' AND `student_number`='$contactnumber' AND `student_email` = '$email'  AND `student_course`='$course'");
if (mysqli_num_rows($rs)>0)
{
    echo "<script language='javascript'>alert('Student Record already Exist');window.location='index.php'</script>";
       
exit();
}   
else
{

    
    mysqli_query($con,"INSERT INTO `student_list`(`student_id`,`first_name`,`middle_name`, `last_name`,`student_number`,`student_telegramnumber`,`student_email`, `student_gender`,`student_college`,`student_course`, `student_semester`, `student_section`,`student_dob`,`classroll`,`hobbies`,`volexperience`,`helpus`, `status`,`student_status`,`session`,`createdtime`) VALUES ('$Studentid','$firstname','$middlename','$lastname','$contactnumber','$telegramnumber','$email','$Gender','$university','$course','$Semester','$Section','$birth_date','$classrollnumber','$studenthobbies','$experience','$helpus','$status','$user_status','$temp_activesession_record','$date')") or die(mysqli_error());
    echo "<script language='javascript'>alert('$Studentid Added Successfully! ');window.location='index.php'</script>"; 
}
}
?>
    <div class="main">
        <div class="container">
            <div class="signup-content">
                <div class="signup-form">
                    <?php 
$studentsendmessagesetting =mysqli_query($con,"SELECT `popupstatus` FROM `advancesetting`  WHERE `popupname`='Volunteers Registration'"); 
$studentsendmessagesettingres=mysqli_fetch_assoc($studentsendmessagesetting);
$studentsendmessagesettingstatus = $studentsendmessagesettingres['popupstatus'];

if($studentsendmessagesettingstatus == "Active") {
?>
                    <form method="POST" action="" class="register-form" id="register-form">
                        <h2>Volunteers registration form <?php //echo $temp_activesession_record; ?></h2>
                        <input type="hidden" name="cdate" id="cdate" value="<?php echo date('Y-m-d'); ?>"/>
                        <input class="form-control text-right" data-val="true" data-val-number="The field TotalAmount must be a number."  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  title="Enter Amount in Number"  id="TotalAmount" name="TotalAmount" value="50"  type="hidden"  />
                        <div class="form-row">
                            <div class="form-group">
                                <label for="firstname">First Name :</label>
                                <input type="text" name="firstname" id="firstname" required/>
                            </div>
                            <div class="form-group">
                                <label for="middlename">Middle Name :</label>
                                <input type="text" name="middlename" id="middlename" />
                            </div>
                            <div class="form-group">
                                <label for="lastname">Last Name :</label>
                                <input type="text" name="lastname" id="lastname" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Studentid">Student Id :</label>
                            <input type="text" name="Studentid" id="Studentid" placeholder="Example:- 21391043" required  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />
                        </div>
                        <div class="form-row">
                        <div class="form-group">
                                <label for="Gender">Gender :</label>
                                <div class="form-select">
                                    <select name="Gender" id="Gender" required>
                                        <option selected="selected" value=""disabled selected>-- Select an option --</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select>
                                    <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
                                </div>
                            </div>
                            <div class="form-group">
                            <label for="birth_date">DOB :</label>
                            <input type="date" name="birth_date" id="birth_date" required>
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="university">Campus :</label>
                                <div class="form-select">
                                    <select name="university" id="university" required>
                                        <option selected="selected" value=""disabled selected>-- Select an option --</option>
                                        <option value="1">Graphic Era (Deemed To be) University</option>
                                     <!--   <option value="2">Graphic Era Hill University (Dehradun)</option>
                                        <option value="3">Graphic Era Hill University (Bhimtal)</option>
                                        <option value="4">Graphic Era Hill University (Haldwani)</option>-->
                                    </select>
                                    <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
                                </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                               <label for="course">Course :</label>
                                <div class="form-select">
                                    <select name="course" id="course" required onchange="CourseChangeFunction()">
                                        <option selected="selected" value=""disabled selected>-- Select an option --</option>
                                         <?php
$rscourse=mysqli_query($con,"SELECT course_detail.`course_id`,course_detail.`course_id2`,course_detail.`course_name`,course_detail.`course_acroym` FROM `course_detail`    WHERE `status` = \"Active\" ");
      while($rowcourse=mysqli_fetch_array($rscourse))
{
if($rowcourse[1])
{
    ?>
    <option value='<?php echo $rowcourse[1]; ?>'><?php echo $rowcourse[3]; ?></option>
<?php
}

}
?>
                                    </select>
                                    <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
                                </div> 
                            </div>
                            <div class="form-group">
                                <label for="Semester">Semester :</label>
                                <div class="form-select">
                                    <select name="Semester" id="Semester" required>
                                        <option selected="selected" value=""disabled selected>-- Select an option --</option>
                                        <?php for($i=1; $i<=8; $i++) { ?>
  <option  value="<?php echo $i; ?>"><?php echo $i; ?></option>
 
        <?php } ?>
                                    </select>
                                    <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
                                </div>
                            </div>
                        </div>
                            <div class="form-row">
                            <div class="form-group">
                                <label for="Section">Section :</label>
                                <div class="form-select">
                                    <select name="Section" id="Section" required>
                                        <option selected="selected" value="" disabled selected>-- Select an option --</option>
                                        <?php for($i='A'; $i<'Z'; $i++) { ?>
  <option  value="<?php echo $i; ?>"><?php echo $i; ?></option>
 
        <?php } ?>
                                    </select>
                                    <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="classrollnumber">Class RollNumber :</label>
                                
                                    <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="10" name="classrollnumber" id="classrollnumber" required />
                               
                            </div>

                        </div>
                        
                        <div class="form-row">
                        <div class="form-group">

                            <label for="contactnumber">Contact Number :</label>
                            <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="10" name="contactnumber" id="contactnumber" required/>
                        </div>
                        <div class="form-group">
                            <label for="telegramnumber">WhatsApp Number :</label>
                            <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="10" name="telegramnumber" id="telegramnumber" required />
                        </div>

                    </div>
                        <div class="form-group">
                            <label for="email">Email ID :</label>
                            <input type="email" name="email" id="email" required />
                        </div>
                        <div class="form-group">
                            <label for="hobbies">Hobbies/Skills:</label>
                             <input type="text" name="studenthobbies" id="studenthobbies" required />
                           
                        </div>
                        <div class="form-group">
                            <label for="experience">Any prior experience in volunteering</label>
                            <div class="form-select">
                                    <select name="experience" id="experience" required>
                                        <option selected="selected" value=""disabled selected>-- Select an option --</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    
                                    </select>
                                    <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="hobbies">How can you help us?:</label>
                            <input type="text" name="helpus" id="helpus" required />
                           
                        </div>
                        <div class="form-group">
                            <label for="hobbies">
                                <input type="checkbox" name="terms" id="terms" required >  I Agree <a href="termsandcondition.html"> Terms & Coditions</a></label>
                           
                           
                        </div>
                            
                          
                           
                        
                        <div class="form-submit">
                            <input type="reset" value="Reset All" class="submit" name="reset" id="reset" />
                            <input type="submit" value="Submit Form" class="submit" name="submit" id="submit"  />
                        </div>
                    </form>
                   
                <?php }  else {?>
                
<h1> <span style="font-family:'type'; color:red;"><?php echo "Registartion are closed!";?>
<br>
<?php echo "Mail :- graphiceraitquiz@gmail.com";?>
<br>
<?php echo "Contact Number :- 7302020015";?></span></h1>
<h4> <span style="font-family:'type'; color:red;"></span></h4>


                <?php } ?>
                 </div>
                <div class="signup-form">
<?php  $searchstudentid=""; ?>
                    <form method="POST"  action="" class="register-search" id="register-search">
                        <h2>Volunteers registration Status Search</h2>
                        <div class="form-row">
                        <div class="form-group">
                            <label for="searchstudentid">Student ID :</label>
                            <input type="text" name="searchstudentid" id="searchstudentid" required value="<?php echo $searchstudentid; ?>" placeholder="Example:- 21391043" required  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"/>

                        </div>
                        <div class="form-submit">
                            <input type="submit" value="Search" class="submit" name="search" id="search"  />
                        </div>
                    </div>
                    </form>

                    <?php 
extract($_POST);
extract($_GET);
if(isset($search))
{
  
    $rstudent=mysqli_query($con,"SELECT * FROM `student_list` WHERE `student_id`='$searchstudentid'");
if (mysqli_num_rows($rstudent)<1)
{
     $studenterrormsg="You are not registered yet";

} 
 else
 { 
$result12=mysqli_query($con,"SELECT * FROM `student_list` WHERE `student_id`='$searchstudentid'");

            $row1=mysqli_fetch_array($result12);
            $studentsearchstatus=$row1['student_status'];
            $studenterrormsg="";
        }

    ?>
    <?php if($studenterrormsg) { ?>

<h1> <span style="font-family:'type'; color:red;"><?php echo $studenterrormsg;?></span></h1>

     <?php } elseif($studentsearchstatus=="Approve") { ?>
                    <h1> <span style="font-family:'type'; color:green;"><?php echo "Congratulation you are selected";?></span></h1>
                <?php } elseif ($studentsearchstatus=="Rejected") { ?>
                    <h1> <span style="font-family:'type'; color:red;"><?php echo "Sorry you are not selected";?></span></h1>
               <?php  } elseif($studentsearchstatus=="Pending") { ?>
                <h1> <span style="font-family:'type'; color:green;"><?php echo "You Have To Wait for process";?></span></h1>

            <?php } } ?>
                </div>
            </div>
        </div>

 <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>