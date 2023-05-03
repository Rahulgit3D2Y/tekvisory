<?php
session_start();
 include("../admin/include/config.php");
$inputid=$_POST['id'];
$type=$_POST['type'];

if($type="category")
{

	$sql="SELECT * FROM `projectcontent` WHERE `projectcontent_status`='Active' AND `projectcontent_contentid`='$inputid'";
$stmt=$con->prepare($sql);
$stmt->execute();
$arr=$stmt->get_result();
$html='';
foreach($arr as $list)
{
	$html.='<option value='.$list['projectcontent_id'].'>'.$list['projectcontent_name'].'</option>';
}

}
else
{
	header("location:index.php");
}
echo $html;	


?>