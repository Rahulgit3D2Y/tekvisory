  <?php include("include/config.php"); ?>
  <?php
  $startno="001";
$teamidgenid1="IDH-";
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
        echo $teamidgenid = "IDH-".$teamidgenget_string;
        //$teamidgenid = $teamidgenget_string;



    }
   
}  
else
{    
  
    echo  $teamidgenid="IDH-"."".$startno;




}
?>