<?php

include('session.php');

$c_id=$_SESSION['c_id'];







   if(isset($_GET['select']))
		{
			$_SESSION['c_id']=$_GET['c_id'];
			$msg="Candidate selected successfully. ";
					$type="success";
					
			header("Location: extra_details.php?msg=" .$msg. "&type=".$type);
			exit();
		}
if($c_id==0)
{
	$msg="Select a candidate  first";
			$type="fail";
			header("Location: extra_details.php?msg=" .$msg. "&type=".$type);
			exit();
}

$Grade = $_POST['Grade'];
$Class = $_POST['Class'];
$Department = $_POST['Department'];
$Appraisal_Due_Month = $_POST['Appraisal_Due_Month'];
$Loyalty_bonus = $_POST['Loyalty_bonus'];
$Function = $_POST['Function'];
$Business_Domain = $_POST['Business_Domain'];
$SBU = $_POST['SBU'];
$Business_Type = $_POST['Business_Type'];
$VIT_Experience = $_POST['VIT_Experience'];
$Total_Experience = $_POST['Total_Experience'];
$PF_number = $_POST['PF_number'];
$PF_UAN = $_POST['PF_UAN'];

$query =" SELECT * FROM extra_details WHERE c_id ='$c_id' ";
      $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
            $result2 = mysqli_fetch_array($ssql,MYSQLI_ASSOC);
   	 $rnum = $ssql->num_rows;


   	 

   	



 if(isset($_POST['save']))
 {

 	if ($rnum==1)
	 {
	 	$update = "UPDATE extra_details SET Grade='$Grade',Class ='$Class',Department='$Department',Appraisal_Due_Month='$Appraisal_Due_Month',Loyalty_bonus='$Loyalty_bonus',Function='$Function',Business_Domain='$Business_Domain',SBU='$SBU',Business_Type='$Business_Type',VIT_Experience='$VIT_Experience',Total_Experience='$Total_Experience',PF_number='$PF_number',PF_UAN='$PF_UAN' WHERE  c_id='$c_id'";
		$run = mysqli_query($db,$update);
	 }
	 else 
	 {
	 	$insert="INSERT into extra_details (
	 	c_id,Grade,Class,Department,Appraisal_Due_Month,Loyalty_bonus,Function,Business_Domain,SBU,Business_Type,VIT_Experience,Total_Experience,PF_number,PF_UAN) values ('$c_id','$Grade','$Class','$Department','$Appraisal_Due_Month','$Loyalty_bonus','$Function','$Business_Domain','$SBU','$Business_Type','$VIT_Experience','$Total_Experience','$PF_number','$PF_UAN') ";
	 	$run = mysqli_query($db,$insert);
	 }
	  if($run)
	      {
 			$msg= " Detail saved succesfully.";
	      	 $type="success";
	   	  }
	   else
		   {
		   	 $msg=" Error .Check again";
		      $type="fail";
		   }

      header("Location: extra_details.php?msg=" .$msg. "&type=".$type);
  }


?>