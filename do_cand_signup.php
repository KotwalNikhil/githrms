<?php

include('session.php');

$c_id=$_SESSION['c_id'];


if(isset($_POST['submit1']))
{

		$cand_name = $_POST['cand_name'];
		$aadhar = $_POST['aadhar'];
		$email = $_POST['email'];

		$query =" SELECT * FROM candidate_table WHERE aadhar='$aadhar' and r_id='$id' ";
		      $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
		      $result = mysqli_fetch_array($ssql,MYSQLI_ASSOC);
		   	 $rnum = $ssql->num_rows;

		   	 if ($rnum==0)
			 {


					   	 $msg=" No such candidate found";
					      $type="fail";
					   

			      header("Location: selected_cand_signup.php?msg=" .$msg. "&type=".$type);
			 }
			 else if($result['id']!=$c_id)
			 {
			 	$msg="Please enter  exact adhar card number of the choosed student ";
							$type="fail";
							header("Location: selected_cand_signup.php?msg=" .$msg. "&type=".$type);
			 }
			 else 
			 {
							 	$query =" SELECT * FROM 1interview_detail WHERE fk ='$id' AND c_id=".$_SESSION['c_id'];
				       $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
				      $i1 = mysqli_fetch_array($ssql,MYSQLI_ASSOC);

				// fetch for 2nd interview 
				       $query =" SELECT * FROM 2interview_detail WHERE fk ='$id' AND c_id=".$_SESSION['c_id'];
				       $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
				      $i2 = mysqli_fetch_array($ssql,MYSQLI_ASSOC);

				     // fetch for 3rd interview 
				       $query =" SELECT * FROM 3interview_detail WHERE fk ='$id' AND c_id=".$_SESSION['c_id'];
				       $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
				      $i3 = mysqli_fetch_array($ssql,MYSQLI_ASSOC); 

				        // fetch for 4th interview 
				       $query =" SELECT * FROM 4interview_detail WHERE fk ='$id' AND c_id=".$_SESSION['c_id'];
				       $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
				      $i4 = mysqli_fetch_array($ssql,MYSQLI_ASSOC);

				      //to check weather account has been already created
				      	$query =" SELECT * FROM loginform WHERE special_id='$c_id' ";
				      	$ssql = mysqli_query($db,$query) or die( mysqli_error($db));
		   	 			$num = $ssql->num_rows;

				      if( ($i1['1mark_final_round']=="yes" and $i1['1shortlisted']=="yes")or($i2['1mark_final_round']=="yes" and $i2['1shortlisted']=="yes") or ($i3['1mark_final_round']=="yes" and $i3['1shortlisted']=="yes") or ($i4['1shortlisted']=="yes") )
				      {
				      		if($num>=1)
				      		{
				      			$msg="Account has been already created before";
							$type="fail";
							header("Location: selected_cand_signup.php?msg=" .$msg. "&type=".$type);
							exit();
				      		}


				      		$hashp=hash('sha512','cand1234');
				      		//inserting value in the login form 
				      		$insert="INSERT into loginform (id,username,password,authority,special_id) values (NULL,'$cand_name','$hashp',1,'$c_id') ";
						 	$run = mysqli_query($db,$insert);
						 		if($run){
							      		$msg="Account created successfully";
										$type="success";
									}
							else 
									{
										$msg="Error ";
									$type="fail";
									}
							header("Location: selected_cand_signup.php?msg=" .$msg. "&type=".$type);
				      }
				      else
				      {
				      		$msg="Student found but not selected in an interview";
							$type="fail";
							header("Location: selected_cand_signup.php?msg=" .$msg. "&type=".$type);

				      }
			 }

}

else if(isset($_POST['recuriter_signup']))
{
		$username = $_POST['username3'];
		$mypassword = $_POST['password3'];
		$email = $_POST['email3'];
		$hashp=hash('sha512',$mypassword);


	$query =" SELECT * FROM loginform WHERE  email='$email'";
      $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
   	 $rnum = $ssql->num_rows;
		if($rnum>=1)
		{
									$msg="Email already taken ";
									$type="fail";
									
							header("Location: add_emp.php?msg=" .$msg. "&type=".$type);
							
		}
		else
		{

		$insert="INSERT into loginform (username,password,email,authority,special_id) values ('$username','$hashp','$email',2,0) ";
						 	$run = mysqli_query($db,$insert);
						 		if($run){
							      		$msg="Account created successfully";
										$type="success";
									}
							else 
									{
										$msg="Error ";
									$type="fail";
									}
							header("Location: add_emp.php?msg=" .$msg. "&type=".$type);

		}
				      
}