<?php

include('session.php');

$c_id=$_SESSION['c_id'];


$start_date = date("Y-m-d", strtotime($_POST['start_date']));
//$end_date = date("Y-m-d", strtotime($_POST['end_date']));

$date1=date_create($start_date);
$date2=date_create($start_date);
 // $interval = date_diff($date1,$date2);
 //  $interval =$interval->format('%a');
date_add($date2,date_interval_create_from_date_string("90 days"));
$date2=date_format($date2,"Y-m-d");

$query =" SELECT * FROM cooling_details WHERE fk ='$id' AND c_id=".$_SESSION['c_id'];
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
			header("Location: cooling_form.php?msg=" .$msg. "&type=".$type);
		  }

 }

 else if ($rnum==1)
 {
 	
  

  // if((int)$interval90)
  // {
  // 	$msg=" End date should be 90 days ahead of start date";
		//       $type="fail";
		
  //     header("Location: cooling_form.php?msg=" .$msg. "&type=".$type);
  //     exit();
  // }



 	$update = "UPDATE cooling_details SET start_date='$start_date', end_date='$date2' WHERE fk = '$id' AND c_id=".$_SESSION['c_id'];

	$run = mysqli_query($db,$update);
      if($run)
	      {
 			$msg= " Your record has been successfully  edited and updated.";
	      	 $type="success";
	   	  }
	   else
		   {
		   	 $msg=" Error in updating .Check again";
		      $type="fail";
		   }

      header("Location: cooling_form.php?msg=" .$msg. "&type=".$type);

}

 else
 {

 	if (!empty($start_date) || !empty($end_date)   ) 
		{

		//  if((int)$interval<90)
  // {
  // 	$msg=" End date should be 90 days ahead of start date";
		//       $type="fail";
		
  //     header("Location: cooling_form.php?msg=" .$msg. "&type=".$type);
  //     exit();
  // }

     $INSERT = "INSERT Into cooling_details (fk,c_id,start_date, end_date ) values(?,?,?, ? )";

	  $stmt = $db->prepare($INSERT);
      $stmt->bind_param("iiss",$id,$c_id,$start_date, $date2);
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

      header("Location: cooling_form.php?msg=" .$msg. "&type=".$type);


	 $stmt->close();
}

?>