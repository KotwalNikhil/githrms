<?php

include('session.php');

$c_id=$_SESSION['c_id'];

$fresher = $_POST['fresher'];

$tot_exp = $_POST['tot_exp'];
$rel_exp = $_POST['rel_exp'];
$country = $_POST['country'];
$state = $_POST['state'];
$city = $_POST['city'];
$curr_company = $_POST['curr_company'];
$curr_ctc = $_POST['curr_ctc'];
$exp_ctc = $_POST['exp_ctc'];
$ctc_neg = $_POST['ctc_neg'];
$neg_upto = $_POST['neg_upto'];
$notice_period = $_POST['notice_period'];

$joining_period = $_POST['joining_period'];

$reason_job_change = $_POST['reason_job_change'];

 $query =" SELECT * FROM employment_table WHERE fk ='$id' AND c_id=".$_SESSION['c_id'];
       $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
   	 $rnum = $ssql->num_rows;

   	 //for skipping the form
   	 $skip_query =" SELECT * FROM skip_module WHERE r_id ='$id' AND form_number=4 AND c_id=".$_SESSION['c_id'] ;
      $ssql = mysqli_query($db,$skip_query) or die( mysqli_error($db));
            $skip_result = mysqli_fetch_array($ssql,MYSQLI_ASSOC);
   	 $skip_rnum = $ssql->num_rows;

if (isset($_GET['move'])) 
 {
 	
	if ( $rnum==1 or $skip_result['skip_status']==1) 
			{
	
				header("Location:resume_form.php");
  			}
    else
		  {
		  	$msg="Complete the form first";
			$type="fail";
      header("Location: employment_form.php?msg=" .$msg. "&type=".$type);
		  }

 }
 else if(isset($_GET['delete_skip']))
 {
  $delete="DELETE from skip_module where r_id='$id' AND c_id='$c_id' AND  form_number=4 ";
    $run = mysqli_query($db,$delete);
   
    if($run)
        {
      $msg= " Your request has been deleted successfully .";
           $type="success";
        }
     else
       {
         $msg=" Error  .Check again";
          $type="fail";
       }

      header("Location: sourcing_form.php?msg=" .$msg. "&type=".$type);
 }
else if(isset($_POST['skip']))
 {
 	$comment=$_POST['skip_comment'];

 	if ($skip_rnum==1)
	 {
	 	$update = "UPDATE skip_module SET skip_comment='$comment', skip_status=0 WHERE r_id = '$id' AND form_number=4 AND c_id='$c_id'";
		$run = mysqli_query($db,$update);
	 }
	 else 
	 {
	 	$insert="INSERT into skip_module (r_id,c_id,form_number,skip_comment,skip_status) values ('$id','$c_id',4,'$comment',0) ";
	 	$run = mysqli_query($db,$insert);
	 }
	  if($run)
	      {
 			$msg= " Your request has been successfully processed.";
	      	 $type="success";
	   	  }
	   else
		   {
		   	 $msg=" Error  .Check again";
		      $type="fail";
		   }

      header("Location: employment_form.php?msg=" .$msg. "&type=".$type);
  }

 else if ($rnum==1)
 {
 	$update = "UPDATE employment_table SET fresher='$fresher',tot_exp= '$tot_exp',rel_exp='$rel_exp',curr_company='$curr_company', curr_ctc='$curr_ctc' ,exp_ctc='$exp_ctc', ctc_neg='$ctc_neg',neg_upto='$neg_upto',notice_period='$notice_period',joining_period='$joining_period',reason_job_change='$reason_job_change',country='$country',state='$state',city='$city' WHERE fk = '$id' AND c_id=".$_SESSION['c_id'];

	$run = mysqli_query($db,$update);
      if($run)
	      {
 			$msg= " Your record has been successfully edited and updated.";
	      	 $type="success";
	   	  }
	   else
		   {
		   	 $msg=" Error in updating .Check again";
		      $type="fail";
		   }

      header("Location: employment_form.php?msg=" .$msg. "&type=".$type);
}

 else
 {

		if (!empty($tot_exp) && !empty($rel_exp) && !empty($curr_location) && !empty($curr_company) && !empty($curr_ctc)  && !empty($exp_ctc)  && !empty($ctc_neg) && !empty($neg_upto) && !empty($notice_period) && !empty($joining_period) && !empty($reason_job_change)  ) 
		{

     $INSERT = "INSERT Into employment_table (fk,c_id,fresher,tot_exp,rel_exp, country,state,city, curr_company, curr_ctc ,exp_ctc,ctc_neg,neg_upto,notice_period,joining_period,reason_job_change) values(?,?, ?,?, ?,?,?, ?, ?, ? ,?,?,?,?,?,?)";

	  $stmt = $db->prepare($INSERT);
      $stmt->bind_param("iissssssssssssss",$id,$_SESSION['c_id'],$fresher,$tot_exp,$rel_exp,$country,$state,$city,$curr_company,$curr_ctc ,$exp_ctc,$ctc_neg, $neg_upto,$notice_period,$joining_period,$reason_job_change);
      $stmt->execute();

 			$msg= " Your record has been successfully updated.";
	      	 $type="success";

      header("Location: employment_form.php?msg=" .$msg. "&type=".$type);

	 $stmt->close();


	}
	else 
	{
		$msg= " Complete the  form first.";
	      	 $type="fail";

      header("Location: employment_form.php?msg=" .$msg. "&type=".$type);
	}

}


?>