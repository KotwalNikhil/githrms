<?php

include('session.php');

$c_id=$_SESSION['c_id'];


$yes_no = $_POST['yes_no'];
$blacklist_date = date("Y-m-d", strtotime($_POST['blacklist_date']));
$reason = $_POST['reason'];
$rec_name = $_POST['rec_name'];


$query =" SELECT * FROM blacklist WHERE fk ='$id' AND c_id=".$_SESSION['c_id'];
      $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
   	 $rnum = $ssql->num_rows;

 if (isset($_GET['move'])) 
 {
 	 if ( $rnum==1 ) 
			{
				$msg="You have completed the form, you can edit the  forms if required  ";
				$type="success";
				header("Location:sourcing_form.php?msg=" .$msg. "&type=".$type);
  			}
    else
		  {
		  	$msg="Complete the form first";
			$type="fail";
			header("Location: blacklist_form.php?msg=" .$msg. "&type=".$type);
		  }

 }

 else if ($rnum==1)
 {
 	$update = "UPDATE blacklist SET yes_no='$yes_no', reason='$reason', blacklist_date='$blacklist_date' ,rec_name='$rec_name' WHERE fk = '$id' AND c_id=".$_SESSION['c_id'];

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

      header("Location: blacklist_form.php?msg=" .$msg. "&type=".$type);

}

 else
 {

 	if (!empty($yes_no) || !empty($reason) || !empty($blacklist_date) || !empty($rec_name)  ) 
		{

     $INSERT = "INSERT Into blacklist (fk,c_id,yes_no,reason,blacklist_date,rec_name ) values(?,?,?, ?, ?, ? )";

	  $stmt = $db->prepare($INSERT);
      $stmt->bind_param("iissss",$id,$c_id,$yes_no, $reason, $blacklist_date, $rec_name);
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

      header("Location: blacklist_form.php?msg=" .$msg. "&type=".$type);


	 $stmt->close();
}

?>