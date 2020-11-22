<?php

include('session.php');

$c_id=$_SESSION['c_id'];

$profile_no = $_POST['profile_no'];
$profile_create_date = date("Y-m-d", strtotime($_POST['profile_create_date']));
$name = $_POST['name'];
$source = $_POST['source'];
$consultant = $_POST['consultant'];
$campus = $_POST['campus'];
$others = $_POST['others'];

$query =" SELECT * FROM sourcing WHERE fk ='$id' AND c_id=".$_SESSION['c_id'];
      $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
            $result2 = mysqli_fetch_array($ssql,MYSQLI_ASSOC);
   	 $rnum = $ssql->num_rows;


   	 //for skipping the form
   	 $skip_query =" SELECT * FROM skip_module WHERE r_id ='$id' AND form_number=1 AND c_id=".$_SESSION['c_id'] ;
      $ssql = mysqli_query($db,$skip_query) or die( mysqli_error($db));
            $skip_result = mysqli_fetch_array($ssql,MYSQLI_ASSOC);
   	 $skip_rnum = $ssql->num_rows;

   	



if($c_id==0)
{
	$msg="Select a candidate  first";
			$type="fail";
			header("Location: sourcing_form.php?msg=" .$msg. "&type=".$type);
			exit();
}

 if (isset($_GET['move']) ) 
 {
 	 if ( $rnum==1 or $skip_result['skip_status']==1 ) 
			{
				header("Location:cand_info_form.php");
  			}
    else
		  {
		  	$msg="Complete the form first";
			$type="fail";
			header("Location: sourcing_form.php?msg=" .$msg. "&type=".$type);
		  }

 }
 else if(isset($_GET['delete_skip']))
 {
 	$delete="DELETE from skip_module where r_id='$id' AND c_id='$c_id' AND  form_number=1 ";
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
	 	$update = "UPDATE skip_module SET skip_comment='$comment', skip_status=0 WHERE r_id = '$id' AND form_number=1 AND c_id='$c_id'";
		$run = mysqli_query($db,$update);
	 }
	 else 
	 {
	 	$insert="INSERT into skip_module (r_id,c_id,form_number,skip_comment,skip_status) values ('$id','$c_id',1,'$comment',0) ";
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

      header("Location: sourcing_form.php?msg=" .$msg. "&type=".$type);
  }

 else if ($rnum==1)
 {
 	$update = "UPDATE sourcing SET name='$name', source='$source', consultant_source='$consultant' ,campus_source='$campus', other_source='$others' WHERE fk = '$id' AND c_id=".$_SESSION['c_id'];

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

      header("Location: sourcing_form.php?msg=" .$msg. "&type=".$type);

}

 else
 {

 	if (!empty($profile_no) and !empty($profile_create_date) and !empty($name) and !empty($source)  ) 
		{

     $INSERT = "INSERT Into sourcing (fk,c_id,profile_number, profile_date, name, source, consultant_source ,campus_source, other_source) values(?,?,?, ?, ?, ?, ?, ? ,?)";

	  $stmt = $db->prepare($INSERT);
      $stmt->bind_param("iiissssss",$id,$_SESSION['c_id'],$_SESSION['c_id'], $profile_create_date, $name, $source, $consultant, $campus ,$others);
      $stmt->execute();
      if($stmt)
	      {
 			$msg= " Your record has been successfully updated.";
	      	 $type="success";
	   	  }
	   else
		   {
		   	 $msg=" Error in updating .Check again";
		      $type="fail";
		   }

		}
		else
		{
			$msg=" Complete the full form first";
		      $type="fail";
		}

      header("Location: sourcing_form.php?msg=" .$msg. "&type=".$type);


	 $stmt->close();
}

?>