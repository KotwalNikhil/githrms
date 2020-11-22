<?php

include('session.php');
$c_id=$_SESSION['c_id'];


$query =" SELECT * FROM e1 WHERE  c_id='$c_id'";
      $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
   	 $rnume1 = $ssql->num_rows;
   	   $result1 = mysqli_fetch_array($ssql,MYSQLI_ASSOC);

$query =" SELECT * FROM review_cand_docs WHERE c_id ='$c_id' ";
      $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
       $result_review = mysqli_fetch_array($ssql,MYSQLI_ASSOC);
		$rnum = $ssql->num_rows;

$query =" SELECT * FROM hr_cand_form_validation WHERE c_id ='$c_id' and r_id='$id' ";
      $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
       $result1 = mysqli_fetch_array($ssql,MYSQLI_ASSOC);
		$num = $ssql->num_rows;

$query =" SELECT * FROM contact_table WHERE fk ='$id' AND c_id ='$c_id'  ";
       $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
      $result_email = mysqli_fetch_array($ssql,MYSQLI_ASSOC);



// $resume = $result['resume'];
// 			$c_address = $result['c_address'];
// 			$p_address = $result['p_address'];
// 			$pancard = $result['pancard'];
// 			$edu_certificates = $result['edu_certificates'];
// 			$photo = $result['photo'];
// 			$payslip = $result['payslip'];
// 			$form16 = $result['form16'];
// 			$exp_certificates = $result['exp_certificates'];
// 			$others = $result['others'];


if (isset($_POST['review_hr']))
 {
 	if($num==1)
 	{
 		$msg="Already given for approval ";
					$type="fail";
					
			header("Location: check_candidate_form.php?msg=" .$msg. "&type=".$type);
 	}
 	else
 	{

			///////////////////////////////
						require 'PHPMailerAutoload.php';
						require 'credential.php';

						$mail = new PHPMailer;

						$mail->SMTPDebug = 0;                               // Enable verbose debug output

						$mail->isSMTP();                                      // Set mailer to use SMTP
						$mail->Host = 'smtp.gmail.com;';  // Specify main and backup SMTP servers
						$mail->SMTPAuth = true;                               // Enable SMTP authentication
						$mail->Username = EMAIL;                 // SMTP username
						$mail->Password = PASS;                           // SMTP password
						$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
						$mail->Port = 587;                                    // TCP port to connect to

						$mail->setFrom(EMAIL );
						$mail->addAddress($result_email['email']);     // Add a recipient
						            // Name is optional
						$mail->addReplyTo(EMAIL);


						// if(!empty($resume))$mail->addAttachment('cand_docs/resume/'.$resume);         // Add attachments
						// if(!empty($c_address))$mail->addAttachment('cand_docs/current_address/'.$c_address);        
						// if(!empty($p_address))$mail->addAttachment('cand_docs/permanent_address/'.$p_address);         
						;    // Optional name
						 $mail->isHTML(true);                                  // Set email format to HTML

						$mail->Subject = 'Documents sent for HR validation ';
						$mail->Body    = 'Your uploaded documnents have been approved from recuriter and sent for HR validation.';
						$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

						$mail->send();

/////////////////////////////
						//////////////////// email to HR ///////////
						// require 'PHPMailerAutoload.php';
						// require 'credential.php';

						$mail = new PHPMailer;

						$mail->SMTPDebug = 0;                               // Enable verbose debug output

						$mail->isSMTP();                                      // Set mailer to use SMTP
						$mail->Host = 'smtp.gmail.com;';  // Specify main and backup SMTP servers
						$mail->SMTPAuth = true;                               // Enable SMTP authentication
						$mail->Username = EMAIL;                 // SMTP username
						$mail->Password = PASS;                           // SMTP password
						$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
						$mail->Port = 587;                                    // TCP port to connect to

						$mail->setFrom(EMAIL );
						$mail->addAddress($result_email['nikhilkotwalcse@gmail.com']);     // Add a recipient
						            // Name is optional
						$mail->addReplyTo(EMAIL);


						// if(!empty($resume))$mail->addAttachment('cand_docs/resume/'.$resume);         // Add attachments
						// if(!empty($c_address))$mail->addAttachment('cand_docs/current_address/'.$c_address);        
						// if(!empty($p_address))$mail->addAttachment('cand_docs/permanent_address/'.$p_address);         
						;    // Optional name
						 $mail->isHTML(true);                                  // Set email format to HTML

						$mail->Subject = 'Candidate'.$result1['full_name'].'  Documents and Employment form validation ';
						$mail->Body    = 'Recuriter has verified the candidate documents and employment form and has sent for HR validation.';
						$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

						$mail->send();

/////////////////////////////

 		$sql = "INSERT into hr_cand_form_validation (r_id,c_id) VALUES('$id','$c_id')";
			if(mysqli_query($db,$sql)){

				$command = "UPDATE candidate_documents SET lock_form=1 WHERE  c_id = '$c_id' ";
      						$ssql = mysqli_query($db,$command) ;
		  	$msg="Sent for HR validation";
			$type="success";}
			else

			{
				$msg="Error in Sending, check again ";
			$type="fail";
			}
			header("Location: check_candidate_form.php?msg=" .$msg. "&type=".$type);
 	}
 	exit();

 }

if (isset($_POST['approve1']))
 {
 	
 	 if ( $rnum==1 ) 
			{
				
				$update = "UPDATE review_cand_docs SET resume='1' WHERE c_id = '$c_id' ";

				$run = mysqli_query($db,$update);

				if($run)
					{
						$msg="resume Approved successfully";
						$type="success";
					}
					else
					{
						$msg="Error in approving ";
					$type="fail";
					}
			header("Location: check_candidate_form.php?msg=" .$msg. "&type=".$type);
  			}
    else
		  {

		  	

		    $sql = "INSERT into review_cand_docs (c_id,resume) VALUES('$c_id','1')";
			if(mysqli_query($db,$sql)){
		  	$msg="resume  Approved successfully";
			$type="success";}
			else
			{
				$msg="Error in approving ";
			$type="fail";
			}
			header("Location: check_candidate_form.php?msg=" .$msg. "&type=".$type);
		  }

 }
 if(isset($_POST['reject1']))
		{	
						$reason1 =$_POST['reason1'];
						if($reason1=="")
						{
							$msg="Select a reason first. ";
							$type="fail";
						}
						else
						{
							$command = "UPDATE review_cand_docs SET resume='$reason1' WHERE c_id = '$c_id' ";
      						$ssql = mysqli_query($db,$command) ;

							$msg="resume rejected successfully . ";
							$type="success";
						}
						header("Location: check_candidate_form.php?msg=" .$msg. "&type=".$type);
			exit();

		}



if (isset($_POST['approve2']))
 {
 	
 	 if ( $rnum==1 ) 
			{
				
				$update = "UPDATE review_cand_docs SET c_address='1' WHERE c_id = '$c_id' ";

				$run = mysqli_query($db,$update);

				if($run)
					{
						$msg=" Approved successfully";
						$type="success";
					}
					else
					{
						$msg="Error in approving ";
					$type="fail";
					}
			header("Location: check_candidate_form.php?msg=" .$msg. "&type=".$type);
  			}
    else
		  {

		  	

		    $sql = "INSERT into review_cand_docs (c_id,c_address) VALUES('$c_id','1')";
			if(mysqli_query($db,$sql)){
		  	$msg="  Approved successfully";
			$type="success";}
			else
			{
				$msg="Error in approving ";
			$type="fail";
			}
			header("Location: check_candidate_form.php?msg=" .$msg. "&type=".$type);
		  }

 }
 if(isset($_POST['reject2']))
		{	
						$reason1 =$_POST['reason2'];
						if($reason1=="")
						{
							$msg="Select a reason first. ";
							$type="fail";
						}
						else
						{
							$command = "UPDATE review_cand_docs SET c_address='$reason1' WHERE c_id = '$c_id' ";
      						$ssql = mysqli_query($db,$command) ;

							$msg=" rejected successfully . ";
							$type="success";
						}
						header("Location: check_candidate_form.php?msg=" .$msg. "&type=".$type);
			exit();

		}



if (isset($_POST['approve3']))
 {
 	
 	 if ( $rnum==1 ) 
			{
				
				$update = "UPDATE review_cand_docs SET p_address='1' WHERE c_id = '$c_id' ";

				$run = mysqli_query($db,$update);

				if($run)
					{
						$msg=" Approved successfully";
						$type="success";
					}
					else
					{
						$msg="Error in approving ";
					$type="fail";
					}
			header("Location: check_candidate_form.php?msg=" .$msg. "&type=".$type);
  			}
    else
		  {

		  	

		    $sql = "INSERT into review_cand_docs (c_id,p_address) VALUES('$c_id','1')";
			if(mysqli_query($db,$sql)){
		  	$msg="  Approved successfully";
			$type="success";}
			else
			{
				$msg="Error in approving ";
			$type="fail";
			}
			header("Location: check_candidate_form.php?msg=" .$msg. "&type=".$type);
		  }

 }
 if(isset($_POST['reject3']))
		{	
						$reason1 =$_POST['reason3'];
						if($reason1=="")
						{
							$msg="Select a reason first. ";
							$type="fail";
						}
						else
						{
							$command = "UPDATE review_cand_docs SET p_address='$reason1' WHERE c_id = '$c_id' ";
      						$ssql = mysqli_query($db,$command) ;

							$msg=" rejected successfully . ";
							$type="success";
						}
						header("Location: check_candidate_form.php?msg=" .$msg. "&type=".$type);
			exit();

		}


if (isset($_POST['approve4']))
 {
 	
 	 if ( $rnum==1 ) 
			{
				
				$update = "UPDATE review_cand_docs SET pancard='1' WHERE c_id = '$c_id' ";

				$run = mysqli_query($db,$update);

				if($run)
					{
						$msg=" Approved successfully";
						$type="success";
					}
					else
					{
						$msg="Error in approving ";
					$type="fail";
					}
			header("Location: check_candidate_form.php?msg=" .$msg. "&type=".$type);
  			}
    else
		  {

		  	

		    $sql = "INSERT into review_cand_docs (c_id,pancard) VALUES('$c_id','1')";
			if(mysqli_query($db,$sql)){
		  	$msg="  Approved successfully";
			$type="success";}
			else
			{
				$msg="Error in approving ";
			$type="fail";
			}
			header("Location: check_candidate_form.php?msg=" .$msg. "&type=".$type);
		  }

 }
 if(isset($_POST['reject4']))
		{	
						$reason1 =$_POST['reason4'];
						if($reason1=="")
						{
							$msg="Select a reason first. ";
							$type="fail";
						}
						else
						{
							$command = "UPDATE review_cand_docs SET pancard='$reason1' WHERE c_id = '$c_id' ";
      						$ssql = mysqli_query($db,$command) ;

							$msg=" rejected successfully . ";
							$type="success";
						}
						header("Location: check_candidate_form.php?msg=" .$msg. "&type=".$type);
			exit();

		}


if (isset($_POST['approve5']))
 {
 	
 	 if ( $rnum==1 ) 
			{
				
				$update = "UPDATE review_cand_docs SET edu_certificates='1' WHERE c_id = '$c_id' ";

				$run = mysqli_query($db,$update);

				if($run)
					{
						$msg=" Approved successfully";
						$type="success";
					}
					else
					{
						$msg="Error in approving ";
					$type="fail";
					}
			header("Location: check_candidate_form.php?msg=" .$msg. "&type=".$type);
  			}
    else
		  {

		  	

		    $sql = "INSERT into review_cand_docs (c_id,edu_certificates) VALUES('$c_id','1')";
			if(mysqli_query($db,$sql)){
		  	$msg="  Approved successfully";
			$type="success";}
			else
			{
				$msg="Error in approving ";
			$type="fail";
			}
			header("Location: check_candidate_form.php?msg=" .$msg. "&type=".$type);
		  }

 }
 if(isset($_POST['reject5']))
		{	
						$reason1 =$_POST['reason5'];
						if($reason1=="")
						{
							$msg="Select a reason first. ";
							$type="fail";
						}
						else
						{
							$command = "UPDATE review_cand_docs SET edu_certificates='$reason1' WHERE c_id = '$c_id' ";
      						$ssql = mysqli_query($db,$command) ;

							$msg=" rejected successfully . ";
							$type="success";
						}
						header("Location: check_candidate_form.php?msg=" .$msg. "&type=".$type);
			exit();

		}


if (isset($_POST['approve6']))
 {
 	
 	 if ( $rnum==1 ) 
			{
				
				$update = "UPDATE review_cand_docs SET photo='1' WHERE c_id = '$c_id' ";

				$run = mysqli_query($db,$update);

				if($run)
					{
						$msg=" Approved successfully";
						$type="success";
					}
					else
					{
						$msg="Error in approving ";
					$type="fail";
					}
			header("Location: check_candidate_form.php?msg=" .$msg. "&type=".$type);
  			}
    else
		  {

		  	

		    $sql = "INSERT into review_cand_docs (c_id,photo) VALUES('$c_id','1')";
			if(mysqli_query($db,$sql)){
		  	$msg="  Approved successfully";
			$type="success";}
			else
			{
				$msg="Error in approving ";
			$type="fail";
			}
			header("Location: check_candidate_form.php?msg=" .$msg. "&type=".$type);
		  }

 }
 if(isset($_POST['reject6']))
		{	
						$reason1 =$_POST['reason6'];
						if($reason1=="")
						{
							$msg="Select a reason first. ";
							$type="fail";
						}
						else
						{
							$command = "UPDATE review_cand_docs SET photo='$reason1' WHERE c_id = '$c_id' ";
      						$ssql = mysqli_query($db,$command) ;

							$msg=" rejected successfully . ";
							$type="success";
						}
						header("Location: check_candidate_form.php?msg=" .$msg. "&type=".$type);
			exit();

		}


if (isset($_POST['approve7']))
 {
 	
 	 if ( $rnum==1 ) 
			{
				
				$update = "UPDATE review_cand_docs SET pro_certificates='1' WHERE c_id = '$c_id' ";

				$run = mysqli_query($db,$update);

				if($run)
					{
						$msg=" Approved successfully";
						$type="success";
					}
					else
					{
						$msg="Error in approving ";
					$type="fail";
					}
			header("Location: check_candidate_form.php?msg=" .$msg. "&type=".$type);
  			}
    else
		  {

		  	

		    $sql = "INSERT into review_cand_docs (c_id,pro_certificates) VALUES('$c_id','1')";
			if(mysqli_query($db,$sql)){
		  	$msg="  Approved successfully";
			$type="success";}
			else
			{
				$msg="Error in approving ";
			$type="fail";
			}
			header("Location: check_candidate_form.php?msg=" .$msg. "&type=".$type);
		  }

 }
 if(isset($_POST['reject7']))
		{	
						$reason1 =$_POST['reason7'];
						if($reason1=="")
						{
							$msg="Select a reason first. ";
							$type="fail";
						}
						else
						{
							$command = "UPDATE review_cand_docs SET pro_certificates='$reason1' WHERE c_id = '$c_id' ";
      						$ssql = mysqli_query($db,$command) ;

							$msg=" rejected successfully . ";
							$type="success";
						}
						header("Location: check_candidate_form.php?msg=" .$msg. "&type=".$type);
			exit();

		}




if (isset($_POST['approve8']))
 {
 	
 	 if ( $rnum==1 ) 
			{
				
				$update = "UPDATE review_cand_docs SET payslip='1' WHERE c_id = '$c_id' ";

				$run = mysqli_query($db,$update);

				if($run)
					{
						$msg=" Approved successfully";
						$type="success";
					}
					else
					{
						$msg="Error in approving ";
					$type="fail";
					}
			header("Location: check_candidate_form.php?msg=" .$msg. "&type=".$type);
  			}
    else
		  {

		  	

		    $sql = "INSERT into review_cand_docs (c_id,payslip) VALUES('$c_id','1')";
			if(mysqli_query($db,$sql)){
		  	$msg="  Approved successfully";
			$type="success";}
			else
			{
				$msg="Error in approving ";
			$type="fail";
			}
			header("Location: check_candidate_form.php?msg=" .$msg. "&type=".$type);
		  }

 }
 if(isset($_POST['reject8']))
		{	
						$reason1 =$_POST['reason8'];
						if($reason1=="")
						{
							$msg="Select a reason first. ";
							$type="fail";
						}
						else
						{
							$command = "UPDATE review_cand_docs SET payslip='$reason1' WHERE c_id = '$c_id' ";
      						$ssql = mysqli_query($db,$command) ;

							$msg=" rejected successfully . ";
							$type="success";
						}
						header("Location: check_candidate_form.php?msg=" .$msg. "&type=".$type);
			exit();

		}



if (isset($_POST['approve9']))
 {
 	
 	 if ( $rnum==1 ) 
			{
				
				$update = "UPDATE review_cand_docs SET form16='1' WHERE c_id = '$c_id' ";

				$run = mysqli_query($db,$update);

				if($run)
					{
						$msg=" Approved successfully";
						$type="success";
					}
					else
					{
						$msg="Error in approving ";
					$type="fail";
					}
			header("Location: check_candidate_form.php?msg=" .$msg. "&type=".$type);
  			}
    else
		  {

		  	

		    $sql = "INSERT into review_cand_docs (c_id,form16) VALUES('$c_id','1')";
			if(mysqli_query($db,$sql)){
		  	$msg="  Approved successfully";
			$type="success";}
			else
			{
				$msg="Error in approving ";
			$type="fail";
			}
			header("Location: check_candidate_form.php?msg=" .$msg. "&type=".$type);
		  }

 }
 if(isset($_POST['reject9']))
		{	
						$reason1 =$_POST['reason9'];
						if($reason1=="")
						{
							$msg="Select a reason first. ";
							$type="fail";
						}
						else
						{
							$command = "UPDATE review_cand_docs SET form16='$reason1' WHERE c_id = '$c_id' ";
      						$ssql = mysqli_query($db,$command) ;

							$msg=" rejected successfully . ";
							$type="success";
						}
						header("Location: check_candidate_form.php?msg=" .$msg. "&type=".$type);
			exit();

		}


if (isset($_POST['approve10']))
 {
 	
 	 if ( $rnum==1 ) 
			{
				
				$update = "UPDATE review_cand_docs SET exp_certificates='1' WHERE c_id = '$c_id' ";

				$run = mysqli_query($db,$update);

				if($run)
					{
						$msg=" Approved successfully";
						$type="success";
					}
					else
					{
						$msg="Error in approving ";
					$type="fail";
					}
			header("Location: check_candidate_form.php?msg=" .$msg. "&type=".$type);
  			}
    else
		  {

		  	

		    $sql = "INSERT into review_cand_docs (c_id,exp_certificates) VALUES('$c_id','1')";
			if(mysqli_query($db,$sql)){
		  	$msg="  Approved successfully";
			$type="success";}
			else
			{
				$msg="Error in approving ";
			$type="fail";
			}
			header("Location: check_candidate_form.php?msg=" .$msg. "&type=".$type);
		  }

 }
 if(isset($_POST['reject10']))
		{	
						$reason1 =$_POST['reason10'];
						if($reason1=="")
						{
							$msg="Select a reason first. ";
							$type="fail";
						}
						else
						{
							$command = "UPDATE review_cand_docs SET exp_certificates='$reason1' WHERE c_id = '$c_id' ";
      						$ssql = mysqli_query($db,$command) ;

							$msg=" rejected successfully . ";
							$type="success";
						}
						header("Location: check_candidate_form.php?msg=" .$msg. "&type=".$type);
			exit();

		}



if (isset($_POST['approve11']))
 {
 	
 	 if ( $rnum==1 ) 
			{
				
				$update = "UPDATE review_cand_docs SET others='1' WHERE c_id = '$c_id' ";

				$run = mysqli_query($db,$update);

				if($run)
					{
						$msg=" Approved successfully";
						$type="success";
					}
					else
					{
						$msg="Error in approving ";
					$type="fail";
					}
			header("Location: check_candidate_form.php?msg=" .$msg. "&type=".$type);
  			}
    else
		  {

		  	

		    $sql = "INSERT into review_cand_docs (c_id,others) VALUES('$c_id','1')";
			if(mysqli_query($db,$sql)){
		  	$msg="  Approved successfully";
			$type="success";}
			else
			{
				$msg="Error in approving ";
			$type="fail";
			}
			header("Location: check_candidate_form.php?msg=" .$msg. "&type=".$type);
		  }

 }
 if(isset($_POST['reject11']))
		{	
						$reason1 =$_POST['reason11'];
						if($reason1=="")
						{
							$msg="Select a reason first. ";
							$type="fail";
						}
						else
						{
							$command = "UPDATE review_cand_docs SET others='$reason1' WHERE c_id = '$c_id' ";
      						$ssql = mysqli_query($db,$command) ;

							$msg=" rejected successfully . ";
							$type="success";
						}
						header("Location: check_candidate_form.php?msg=" .$msg. "&type=".$type);
			exit();

		}


		if(isset($_POST['review_save']))
		{	

			///////////////////////////////
						require 'PHPMailerAutoload.php';
						require 'credential.php';

						$mail = new PHPMailer;

						$mail->SMTPDebug = 0;                               // Enable verbose debug output

						$mail->isSMTP();                                      // Set mailer to use SMTP
						$mail->Host = 'smtp.gmail.com;';  // Specify main and backup SMTP servers
						$mail->SMTPAuth = true;                               // Enable SMTP authentication
						$mail->Username = EMAIL;                 // SMTP username
						$mail->Password = PASS;                           // SMTP password
						$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
						$mail->Port = 587;                                    // TCP port to connect to

						$mail->setFrom(EMAIL );
						$mail->addAddress($result_email['email']);     // Add a recipient
						            // Name is optional
						$mail->addReplyTo(EMAIL);


						// if(!empty($resume))$mail->addAttachment('cand_docs/resume/'.$resume);         // Add attachments
						// if(!empty($c_address))$mail->addAttachment('cand_docs/current_address/'.$c_address);        
						// if(!empty($p_address))$mail->addAttachment('cand_docs/permanent_address/'.$p_address);         
						;    // Optional name
						 $mail->isHTML(true);                                  // Set email format to HTML

						$mail->Subject = 'Reviews for your Documents ';
						$mail->Body    = 'Recuriter has given some reviews for your uploaded documnents, kindly check on your portal';
						$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

						$mail->send();

						$review =$_POST['review'];
						if($rnum!=1)
						{
							$sql = "INSERT into review_cand_docs (c_id,review) VALUES('$c_id','$review')";
							$run=mysqli_query($db,$sql);
							$msg="review updated successfully ";
							$type="successfully";
						}
						else
						{
							$command = "UPDATE review_cand_docs SET review='$review' WHERE c_id = '$c_id' ";
      						$ssql = mysqli_query($db,$command) ;

      						//for unlocking the form for the candidate
      						$command = "UPDATE candidate_documents SET lock_form=0 WHERE  c_id = '$c_id' ";
      						$ssql = mysqli_query($db,$command) ;

      						//for unlocking the form for the candidate
      						$command = "UPDATE candidate_documents SET lock_form=0 WHERE  c_id = '$c_id' ";
      						$ssql = mysqli_query($db,$command) ;

							$msg=" review added successfully . ";
							$type="success";
						}
						header("Location: check_candidate_form.php?msg=" .$msg. "&type=".$type);
			exit();

		}

?>