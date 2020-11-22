
<?php 
include('session.php');

if (isset($_GET['select'])) 
 {
 	$row_id=$_GET['row_id'];
 	
	 	$update=" UPDATE skip_module set skip_status=1 WHERE  id='$row_id' ";
	 	$run = mysqli_query($db,$update);
	 
	  if($run)
	      {
 			$msg= " Request accepted.";
	      	 $type="success";
	   	  }
	   else
		   {
		   	 $msg=" ERROR ,CHECK AGAIN";
		      $type="fail";
		   }

      header("Location: skip_request.php?msg=" .$msg. "&type=".$type);
      exit();
      
 }
 else if (isset($_GET['delete'])) 
 {
 	$row_id=$_GET['row_id'];
 	
	 	$update=" UPDATE skip_module set skip_status=2 WHERE  id='$row_id' ";
	 	$run = mysqli_query($db,$update);
	 
	  if($run)
	      {
 			$msg= " request rejected.";
	      	 $type="success";
	   	  }
	   else
		   {
		   	 $msg=" ERROR ,CHECK AGAIN";
		      $type="fail";
		   }

      header("Location: skip_request.php?msg=" .$msg. "&type=".$type);

 }

 ?>

