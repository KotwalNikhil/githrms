<?php

include('session.php');


if(isset($_POST['submit1']))
{

		$cand_name = $_POST['cand_name'];
		$phone = $_POST['phone'];
		$tech_domain = $_POST['tech_domain'];

		$query =" SELECT * FROM candidate_table WHERE phone='$phone'  ";
		      $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
		   	 $rnum = $ssql->num_rows;

		   	 if ($rnum>=1)
			 {


					   	 $msg=" phone already taken";
					      $type="fail";
					   

			      header("Location: show_select_cand.php?msg=" .$msg. "&type=".$type);
			 }
			 else
			 {
			 		$query="INSERT into candidate_table  (r_id,cand_name,phone,tech_domain)  values ('$id','$cand_name','$phone','$tech_domain')";
					$run = mysqli_query($db,$query);
		    		  if($run)
			      {
		 			$msg= " Your record has been successfully  updated.";
			      	 $type="success";
			   	  }
			   else
				   {
				   	 $msg=" Error in updating .Check again";
				      $type="fail";
				   }

		      header("Location: show_select_cand.php?msg=" .$msg. "&type=".$type);
			 }

}
else if(isset($_GET['select']))
{
					$_SESSION['c_id']=$_GET['cid'];

						$msg=" Candidate has been selected successfully";
				      $type="success";
				   

		      header("Location: sourcing_form.php?msg=" .$msg. "&type=".$type);
}
else if(isset($_GET['delete']))
{
					$c_id=$_GET['cid'];


					

					$query="DELETE from  sourcing  WHERE fk ='$id' AND c_id='$c_id'";
					$run = mysqli_query($db,$query);

					$query="DELETE from  candidate_info  WHERE fk ='$id' AND c_id='$c_id'";
					$run = mysqli_query($db,$query);

					$query="DELETE from  contact_table  WHERE fk ='$id' AND c_id='$c_id'";
					$run = mysqli_query($db,$query);

					$query="DELETE from  employment_table  WHERE fk ='$id' AND c_id='$c_id'";
					$run = mysqli_query($db,$query);

					$query="DELETE from  fileupload  WHERE fk ='$id' AND c_id='$c_id'";
					$run = mysqli_query($db,$query);

					$query="DELETE from  1interview_detail  WHERE fk ='$id' AND c_id='$c_id'";
					$run = mysqli_query($db,$query);

					$query="DELETE from  2interview_detail  WHERE fk ='$id' AND c_id='$c_id'";
					$run = mysqli_query($db,$query);

					$query="DELETE from  3interview_detail  WHERE fk ='$id' AND c_id='$c_id'";
					$run = mysqli_query($db,$query);

					$query="DELETE from  4interview_detail  WHERE fk ='$id' AND c_id='$c_id'";
					$run = mysqli_query($db,$query);

					$query="DELETE from  offer_details  WHERE fk ='$id' AND c_id='$c_id'";
					$run = mysqli_query($db,$query);

					$query="DELETE from  cooling_details  WHERE fk ='$id' AND c_id='$c_id'";
					$run = mysqli_query($db,$query);

					$query="DELETE from  blacklist  WHERE fk ='$id' AND c_id='$c_id'";
					$run = mysqli_query($db,$query);

					$query="DELETE from  candidate_table  WHERE r_id ='$id' AND id='$c_id'";
					$run = mysqli_query($db,$query);

					
		    		  



						$msg=" The candidate has been deleted successfully";
				      	$type="success";
				   

		      header("Location: sourcing_form.php?msg=" .$msg. "&type=".$type);
}


