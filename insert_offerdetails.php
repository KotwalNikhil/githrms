<?php

include('session.php');

$c_id=$_SESSION['c_id'];


$offer_date = date("Y-m-d", strtotime($_POST['offer_date']));
$ctc = $_POST['ctc'];
$doj = date("Y-m-d", strtotime($_POST['doj']));
$joined = $_POST['joined'];
$actual_doj = date("Y-m-d", strtotime($_POST['actual_doj']));


$query =" SELECT * FROM offer_details WHERE fk ='$id' AND c_id=".$_SESSION['c_id'];
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
			header("Location: offerdetail_form.php?msg=" .$msg. "&type=".$type);
		  }

 }

 else if ($rnum==1)
 {
 	$update = "UPDATE offer_details SET offer_date='$offer_date', ctc='$ctc',doj='$doj' ,joined='$joined', actual_doj='$actual_doj' WHERE fk = '$id' AND c_id=".$_SESSION['c_id'];

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

      header("Location: offerdetail_form.php?msg=" .$msg. "&type=".$type);

}

 else
 {

 	if (!empty($offer_date) || !empty($ctc) || !empty($doj) || !empty($joined)  ) 
		{

     $INSERT = "INSERT Into offer_details (fk,c_id,offer_date, ctc, doj, joined, actual_doj ) values(?,?,?, ?, ?, ?, ? )";

	  $stmt = $db->prepare($INSERT);
      $stmt->bind_param("iisssss",$id,$c_id,$offer_date, $ctc, $doj, $joined, $actual_doj);
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

      header("Location: offerdetail_form.php?msg=" .$msg. "&type=".$type);


	 $stmt->close();
}

?>