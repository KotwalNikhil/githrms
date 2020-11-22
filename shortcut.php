
<?php 
include('session.php');

$query =" SELECT * FROM sourcing WHERE fk ='$id' AND c_id=".$_SESSION['c_id'];
      $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
   	 $r1 = $ssql->num_rows;


//for skipping the form
     $skip_query =" SELECT * FROM skip_module WHERE r_id ='$id' AND form_number=1 AND c_id=".$_SESSION['c_id'] ;
      $ssql = mysqli_query($db,$skip_query) or die( mysqli_error($db));
        $skip_result1 = mysqli_fetch_array($ssql,MYSQLI_ASSOC);


$query =" SELECT * FROM Candidate_info WHERE fk ='$id' AND c_id=".$_SESSION['c_id'];
       $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
   	 $r2 = $ssql->num_rows;

   	 //for skipping the form
     $skip_query =" SELECT * FROM skip_module WHERE r_id ='$id' AND form_number=2 AND c_id=".$_SESSION['c_id'] ;
      $ssql = mysqli_query($db,$skip_query) or die( mysqli_error($db));
        $skip_result2 = mysqli_fetch_array($ssql,MYSQLI_ASSOC);

$query =" SELECT * FROM contact_table WHERE fk ='$id' AND c_id=".$_SESSION['c_id'];
      $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
     $r3 = $ssql->num_rows;

      //for skipping the form
     $skip_query =" SELECT * FROM skip_module WHERE r_id ='$id' AND form_number=3 AND c_id=".$_SESSION['c_id'] ;
      $ssql = mysqli_query($db,$skip_query) or die( mysqli_error($db));
        $skip_result3 = mysqli_fetch_array($ssql,MYSQLI_ASSOC);

      $query =" SELECT * FROM employment_table WHERE fk ='$id' AND c_id=".$_SESSION['c_id'];
       $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
   	 $r4 = $ssql->num_rows;

   	  //for skipping the form
     $skip_query =" SELECT * FROM skip_module WHERE r_id ='$id' AND form_number=4 AND c_id=".$_SESSION['c_id'] ;
      $ssql = mysqli_query($db,$skip_query) or die( mysqli_error($db));
        $skip_result4 = mysqli_fetch_array($ssql,MYSQLI_ASSOC);

   	 $query =" SELECT * FROM fileupload WHERE fk ='$id' AND c_id=".$_SESSION['c_id'];
      $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
     $r5 = $ssql->num_rows;

      //for skipping the form
     $skip_query =" SELECT * FROM skip_module WHERE r_id ='$id' AND form_number=5 AND c_id=".$_SESSION['c_id'] ;
      $ssql = mysqli_query($db,$skip_query) or die( mysqli_error($db));
        $skip_result5 = mysqli_fetch_array($ssql,MYSQLI_ASSOC);


$query =" SELECT * FROM 1interview_detail WHERE fk ='$id' AND c_id=".$_SESSION['c_id'];
      $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
   	 $r6 = $ssql->num_rows;

if ($_GET['move']=='2') 
 {
 	
	if ( $r1!=1 and  $skip_result1['skip_status']!=1) 
			{
				$msg="Complete the form first";
			$type="fail";
      		header("Location: sourcing_form.php?msg=" .$msg. "&type=".$type);
      		exit();
  			}
    else 
		  {
		  	
      header("Location: cand_info_form.php");
      exit();
		  }

 }
 else if ($_GET['move']=='3') 
 {
 	
	if ( $r1!=1 and  $skip_result1['skip_status']!=1) 
			{
				$msg="Complete the form first";
			$type="fail";
      		header("Location:sourcing_form.php?msg=" .$msg. "&type=".$type);
  			}
    else if($r2!=1 and  $skip_result2['skip_status']!=1)
		  {
		  	$msg="Complete the form first";
			$type="fail";
      		header("Location: cand_info_form.php?msg=" .$msg. "&type=".$type);
		  }
	else if ( $r1==1) 
	{
		header("Location: contact_form.php");
      exit();
	}

 }
 else if ($_GET['move']=='4') 
 {
 	
	if ( $r1!=1 and  $skip_result1['skip_status']!=1) 
			{
				$msg="Complete the form first";
			$type="fail";
      		header("Location:sourcing_form.php?msg=" .$msg. "&type=".$type);
  			}
    else if($r2!=1 and  $skip_result2['skip_status']!=1)
		  {
		  	$msg="Complete the form first";
			$type="fail";
      		header("Location: cand_info_form.php?msg=" .$msg. "&type=".$type);
		  }
	else if($r3!=1 and  $skip_result3['skip_status']!=1)
		  {
		  	$msg="Complete the form first";
			$type="fail";
      		header("Location: contact_form.php?msg=" .$msg. "&type=".$type);
		  }
	else 
	{
		header("Location: employment_form.php");
      exit();
	}

 }
 else if ($_GET['move']=='5') 
 {
 	
	if ( $r1!=1 and  $skip_result1['skip_status']!=1) 
			{
				$msg="Complete the form first";
			$type="fail";
      		header("Location:sourcing_form.php?msg=" .$msg. "&type=".$type);
  			}
    else if($r2!=1 and  $skip_result2['skip_status']!=1)
		  {
		  	$msg="Complete the form first";
			$type="fail";
      		header("Location: cand_info_form.php?msg=" .$msg. "&type=".$type);
		  }
	else if($r3!=1 and  $skip_result3['skip_status']!=1)
		  {
		  	$msg="Complete the form first";
			$type="fail";
      		header("Location: contact_formphp?msg=" .$msg. "&type=".$type);
		  }
	else if($r4!=1 and  $skip_result4['skip_status']!=1)
		  {
		  	$msg="Complete the form first";
			$type="fail";
      		header("Location: employment_form.php?msg=" .$msg. "&type=".$type);
		  }
	else 
	{
		header("Location: resume_form.php");
      exit();
	}

 }
else if ($_GET['move']=='6') 
 {
 	
	if ( $r1!=1 and  $skip_result1['skip_status']!=1 ) 
			{
				$msg="Complete the form first";
			$type="fail";
      		header("Location:sourcing_form.php?msg=" .$msg. "&type=".$type);
  			}
    else if($r2!=1 and  $skip_result2['skip_status']!=1)
		  {
		  	$msg="Complete the form first";
			$type="fail";
      		header("Location: cand_info_form.php?msg=" .$msg. "&type=".$type);
		  }
	else if($r3!=1 and  $skip_result3['skip_status']!=1)
		  {
		  	$msg="Complete the form first";
			$type="fail";
      		header("Location: contact_formphp?msg=" .$msg. "&type=".$type);
		  }
	else if($r4!=1 and  $skip_result4['skip_status']!=1)
		  {
		  	$msg="Complete the form first";
			$type="fail";
      		header("Location: employment_form.php?msg=" .$msg. "&type=".$type);
		  }
	else if($r5!=1 and  $skip_result5['skip_status']!=1)
		  {
		  	$msg="Complete the form first";
			$type="fail";
      		header("Location: resume_form.php?msg=" .$msg. "&type=".$type);
		  }
	else 
	{
		header("Location: interviewschedule_form.php");
      exit();
	}

 }






   	 ?>