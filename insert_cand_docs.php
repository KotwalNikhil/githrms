<?php

include('session.php');


/////////////////////////////////////////////////
// for recuiriter mail

   $query =" SELECT * FROM candidate_table WHERE id ='$special_id' ";
      $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
       $r = mysqli_fetch_array($ssql,MYSQLI_ASSOC);
$r_id=$r['r_id'];

$query =" SELECT * FROM loginform WHERE id ='$r_id' ";
      $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
       $r = mysqli_fetch_array($ssql,MYSQLI_ASSOC);

// FOR EMPLOYMENT FORM CHECK  //
$query =" SELECT * FROM e1 WHERE fk ='$id' AND c_id='$special_id'";
      $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
   	 $rnume1 = $ssql->num_rows;
   	   $result1 = mysqli_fetch_array($ssql,MYSQLI_ASSOC);


$query =" SELECT * FROM e2 WHERE fk ='$id' AND c_id='$special_id'";
      $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
   	 $rnume2 = $ssql->num_rows;

   	 $query =" SELECT * FROM e3 WHERE fk ='$id' AND c_id='$special_id'";
      $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
   	 $rnume3 = $ssql->num_rows;

 $query =" SELECT * FROM e4 WHERE fk ='$id' AND c_id='$special_id'";
      $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
   	 $rnume4 = $ssql->num_rows;

   	 
   	 $query =" SELECT * FROM e5 WHERE fk ='$id' AND c_id='$special_id'";
      $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
   	 $rnume5 = $ssql->num_rows;

 $query =" SELECT * FROM e6 WHERE fk ='$id' AND c_id='$special_id'";
      $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
   	 $rnume6 = $ssql->num_rows;

   	  $query =" SELECT * FROM e7 WHERE fk ='$id' AND c_id='$special_id'";
      $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
   	 $rnume7 = $ssql->num_rows;

   	 $query =" SELECT * FROM e8 WHERE fk ='$id' AND c_id='$special_id'";
      $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
   	 $rnume8 = $ssql->num_rows;

   	  $query =" SELECT * FROM e9 WHERE fk ='$id' AND c_id='$special_id'";
      $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
   	 $rnume9 = $ssql->num_rows;

 $query =" SELECT * FROM e10 WHERE fk ='$id' AND c_id='$special_id'";
      $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
   	 $rnume10 = $ssql->num_rows;
   	  $result10 = mysqli_fetch_array($ssql,MYSQLI_ASSOC);



/////////////////////////////////////////////////

$query =" SELECT * FROM candidate_documents WHERE fk ='$id' ";
      $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
       $result = mysqli_fetch_array($ssql,MYSQLI_ASSOC);
		$rnum = $ssql->num_rows;


$query =" SELECT * FROM review_cand_docs WHERE c_id ='$special_id' ";
      $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
       $result_review = mysqli_fetch_array($ssql,MYSQLI_ASSOC);


if($result['lock_form']==1)
{
	$msg="Sorry form has been locked ,Wait for recuriter reviews. ";
							$type="fail";
		

		header("Location: candidate_form.php?msg=" .$msg. "&type=".$type);
			exit();
}

		//for sending the mail to the recuriter
		if(isset($_GET['send_mail']))
		{
			$resume = $result['resume'];
			$c_address = $result['c_address'];
			$p_address = $result['p_address'];
			$pancard = $result['pancard'];
			$edu_certificates = $result['edu_certificates'];
			$photo = $result['photo'];
			$payslip = $result['payslip'];
			$form16 = $result['form16'];
			$exp_certificates = $result['exp_certificates'];
			$others = $result['others'];
			if(!empty($resume) && !empty($c_address) && !empty($p_address) && !empty($edu_certificates) && !empty($photo) )
			{

				if($rnume1==1 and $rnume2==1 and $rnume3==1 and $rnume4==1 and $rnume5==1 and $rnume6==1 and $rnume7==1 and $rnume8>=1 and $rnume9>=1 and $rnume10==1  )
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
						$mail->addAddress($r['email']);     // Add a recipient
						            // Name is optional
						$mail->addReplyTo(EMAIL);
						$mail->Subject = 'Candidate'.$result1['full_name'].' submitted his Documents for review ';
						$mail->Body    = 'Candidate has given his uploaded documnents, kindly check on your portal and give him the feedback or send them for HR verification as applicable';
						


						// if(!empty($resume))$mail->addAttachment('cand_docs/resume/'.$resume);         // Add attachments
						// if(!empty($c_address))$mail->addAttachment('cand_docs/current_address/'.$c_address);        
						// if(!empty($p_address))$mail->addAttachment('cand_docs/permanent_address/'.$p_address);         
						// if(!empty($$pancard))$mail->addAttachment('cand_docs/pancards/'.$pancard);         // Add attachments
						// if(!empty($edu_certificates))$mail->addAttachment('cand_docs/edu_certificates/'.$edu_certificates);    
						// if(!empty($pro_certificates))$mail->addAttachment('cand_docs/pro_certificates/'.$pro_certificates);   
						// if(!empty($photo))$mail->addAttachment('cand_docs/photo/'.$photo);         // Add attachments
						// if(!empty($payslip))$mail->addAttachment('cand_docs/payslip/'.$payslip);         // Add attachments
						// if(!empty($form16))$mail->addAttachment('cand_docs/form16/'.$form16);         // Add attachments
						// if(!empty($exp_certificates))$mail->addAttachment('cand_docs/exp_certificates/'.$exp_certificates); 
						// if(!empty($others))$mail->addAttachment('cand_docs/others/'.$others); 

						//$mail->addAttachment('tmp/image.jpg', 'new.jpg');    // Optional name
						$mail->isHTML(true);                                  // Set email format to HTML

						
						$mail->send();
						// if($mail->send()) 
						// {
						// 	$msg="mail has been sent to the HR,kindly wait for the response. ";
						// 	$type="success";
						// } 
						// else
						// {
						// 	$msg="mail could not  be sent to the HR,kindly fill the documnets carefully. ";
						// 	$type="fail";
						// }

			
			$command = "UPDATE candidate_documents SET lock_form=1 WHERE fk = '$id' ";
      						$ssql = mysqli_query($db,$command) ;

      						$command = "UPDATE review_cand_docs SET  hr_review='' WHERE c_id = '$special_id' ";
      						$ssql = mysqli_query($db,$command) ;

							$msg="Form submitted successfully  .Wait for recuriter reviews ";
							$type="success";

				}
				else
				{
					$msg="Fill your employment form complete . ";
							$type="fail";
				}
			
		}
		else 
		{ 
			$msg="Fill your required documents . ";
							$type="fail";
		}

		header("Location: candidate_form.php?msg=" .$msg. "&type=".$type);
			exit();
	}

// for deleting the file
if(isset($_GET['delete1']))
		{	
						$resume = $result['resume'];
						if(!empty($resume))
						{
							unlink('cand_docs/resume/'.$result['resume']);
							$command = "UPDATE candidate_documents SET resume='' WHERE fk = '$id' ";
      						$ssql = mysqli_query($db,$command) ;
							$msg="Resume deleted successfully . ";
							$type="success";
						}
						else
						{
							$msg="No File Found . ";
							$type="fail";
						}
						header("Location: candidate_form.php?msg=" .$msg. "&type=".$type);
			exit();

		}
else if(isset($_GET['delete2']))
		{	
						if(!empty($result['c_address']))
						{
				unlink('cand_docs/current_address/'.$result['c_address']);
							$command = "UPDATE candidate_documents SET c_address='' WHERE fk = '$id' ";
      						$ssql = mysqli_query($db,$command) ;
							$msg="current address proof deleted successfully . ";
							$type="success";
						}
						else
						{
							$msg="No File Found . ";
							$type="fail";
						}
						header("Location: candidate_form.php?msg=" .$msg. "&type=".$type);
			exit();

		}
		else if(isset($_GET['delete3']))
		{	
						if(!empty($result['p_address']))
						{
								unlink('cand_docs/permanent_address/'.$result['p_address']);
							$command = "UPDATE candidate_documents SET p_address='' WHERE fk = '$id' ";
      						$ssql = mysqli_query($db,$command) ;
							$msg="permanent address proof deleted successfully . ";
							$type="success";
						}
						else
						{
							$msg="No File Found . ";
							$type="fail";
						}
						header("Location: candidate_form.php?msg=" .$msg. "&type=".$type);
			exit();

		}
		else if(isset($_GET['delete4']))
		{	
						if(!empty($result['pancard']))
						{
				unlink('cand_docs/pancards/'.$result['pancard']);
							$command = "UPDATE candidate_documents SET pancard='' WHERE fk = '$id' ";
      						$ssql = mysqli_query($db,$command) ;
							$msg="pancard proof deleted successfully . ";
							$type="success";
						}
						else
						{
							$msg="No File Found . ";
							$type="fail";
						}
						header("Location: candidate_form.php?msg=" .$msg. "&type=".$type);
			exit();

		}
		else if(isset($_GET['delete5']))
		{	
						if(!empty($result['edu_certificates']))
						{
				unlink('cand_docs/edu_certificates/'.$result['edu_certificates']);
							$command = "UPDATE candidate_documents SET edu_certificates='' WHERE fk = '$id' ";
      						$ssql = mysqli_query($db,$command) ;
							$msg="education certificates deleted successfully . ";
							$type="success";
						}
						else
						{
							$msg="No File Found . ";
							$type="fail";
						}
						header("Location: candidate_form.php?msg=" .$msg. "&type=".$type);
			exit();

		}
			else if(isset($_GET['delete6']))
		{	
						if(!empty($result['photo']))
						{
								unlink('cand_docs/photo/'.$result['photo']);
							$command = "UPDATE candidate_documents SET photo='' WHERE fk = '$id' ";
      						$ssql = mysqli_query($db,$command) ;
							$msg="pancard proof deleted successfully . ";
							$type="success";
						}
						else
						{
							$msg="No File Found . ";
							$type="fail";
						}
						header("Location: candidate_form.php?msg=" .$msg. "&type=".$type);
			exit();

		}
		else if(isset($_GET['delete7']))
		{	
						if(!empty($result['pro_certificates']))
						{
				unlink('cand_docs/pro_certificates/'.$result['pro_certificates']);
							$command = "UPDATE candidate_documents SET pro_certificates='' WHERE fk = '$id' ";
      						$ssql = mysqli_query($db,$command) ;
							$msg="pancard proof deleted successfully . ";
							$type="success";
						}
						else
						{
							$msg="No File Found . ";
							$type="fail";
						}
						header("Location: candidate_form.php?msg=" .$msg. "&type=".$type);
			exit();

		}
		else if(isset($_GET['delete8']))
		{	
						if(!empty($result['payslip']))
						{
		unlink('cand_docs/payslip/'.$result['payslip']);
							$command = "UPDATE candidate_documents SET payslip='' WHERE fk = '$id' ";
      						$ssql = mysqli_query($db,$command) ;
							$msg="payslip deleted successfully . ";
							$type="success";
						}
						else
						{
							$msg="No File Found . ";
							$type="fail";
						}
						header("Location: candidate_form.php?msg=" .$msg. "&type=".$type);
			exit();

		}
		else if(isset($_GET['delete9']))
		{	
						if(!empty($result['form16']))
						{
				unlink('cand_docs/form16/'.$result['form16']);
							$command = "UPDATE candidate_documents SET form16='' WHERE fk = '$id' ";
      						$ssql = mysqli_query($db,$command) ;
							$msg="form16 deleted successfully . ";
							$type="success";
						}
						else
						{
							$msg="No File Found . ";
							$type="fail";
						}
						header("Location: candidate_form.php?msg=" .$msg. "&type=".$type);
			exit();

		}
		else if(isset($_GET['delete10']))
		{	
						if(!empty($result['exp_certificates']))
						{
				unlink('cand_docs/exp_certificates/'.$result['exp_certificates']);
							$command = "UPDATE candidate_documents SET exp_certificates='' WHERE fk = '$id' ";
      						$ssql = mysqli_query($db,$command) ;
							$msg="experience certificates deleted successfully . ";
							$type="success";
						}
						else
						{
							$msg="No File Found . ";
							$type="fail";
						}
						header("Location: candidate_form.php?msg=" .$msg. "&type=".$type);
			exit();

		}
			else if(isset($_GET['delete11']))
		{	
						if(!empty($result['others']))
						{
				unlink('cand_docs/others/'.$result['others']);
							$command = "UPDATE candidate_documents SET others='' WHERE fk = '$id' ";
      						$ssql = mysqli_query($db,$command) ;
							$msg="other certificates deleted successfully . ";
							$type="success";
						}
						else
						{
							$msg="No File Found . ";
							$type="fail";
						}
						header("Location: candidate_form.php?msg=" .$msg. "&type=".$type);
			exit();

		}

 if (isset($_POST['submit1']))
 {
 	if($_FILES["resume"]["name"]=='')
				{
					$msg="choose a file first ";
			$type="fail";
			
			header("Location: candidate_form.php?msg=" .$msg. "&type=".$type);
			exit();
				}
 	 if ( $rnum==1 ) 
			{
				unlink('cand_docs/resume/'.$result['resume']);

				$pname = rand(1000,10000)."-".$_FILES["resume"]["name"];
		    $tname = $_FILES["resume"]["tmp_name"];
		    $file_size = $file ['size'];

		     $uploads_dir = 'cand_docs/resume/';

		    move_uploaded_file($tname, $uploads_dir.$pname);
				$update = "UPDATE candidate_documents SET resume='$pname' WHERE fk = '$id' ";

				$run = mysqli_query($db,$update);

				if($run)
					{
						$msg="resume uploaded successfully";
						$type="success";
					}
					else
					{
						$msg="resume could not be uploaded ";
					$type="fail";
					}
			header("Location: candidate_form.php?msg=" .$msg. "&type=".$type);
  			}
    else
		  {

		  	$pname = rand(1000,10000)."-".$_FILES["resume"]["name"];
		    $tname = $_FILES["resume"]["tmp_name"];
		    $file_size = $file ['size'];

		     $uploads_dir = 'cand_docs/resume/';

		    move_uploaded_file($tname, $uploads_dir.$pname);

		    $sql = "INSERT into candidate_documents (fk,c_id,resume) VALUES('$id','$special_id','$pname')";
			if(mysqli_query($db,$sql)){
		  	$msg="resume uploaded successfully";
			$type="success";}
			else
			{
				$msg="resume could not be uploaded ";
			$type="fail";
			}
			header("Location: candidate_form.php?msg=" .$msg. "&type=".$type);
		  }

 }
 else  if (isset($_POST['submit2']))
 {
 	if($_FILES["c_address"]["name"]=='')
				{
					$msg="choose a file first ";
			$type="fail";
			
			header("Location: candidate_form.php?msg=" .$msg. "&type=".$type);
			exit();
				}
 	 if ( $rnum==1 ) 
			{
				unlink('cand_docs/current_address/'.$result['c_address']);

				$pname = rand(1000,10000)."-".$_FILES["c_address"]["name"];
		    $tname = $_FILES["c_address"]["tmp_name"];
		    $file_size = $file ['size'];

		     $uploads_dir = 'cand_docs/current_address/';

		    move_uploaded_file($tname, $uploads_dir.$pname);
				$update = "UPDATE candidate_documents SET c_address='$pname' WHERE fk = '$id' ";

				$run = mysqli_query($db,$update);

				if($run)
					{
						$msg="current address proof uploaded successfully";
						$type="success";
					}
					else
					{
						$msg="current address proof could not be uploaded ";
					$type="fail";
					}
			header("Location: candidate_form.php?msg=" .$msg. "&type=".$type);
  			}
    else
		  {

		  	$pname = rand(1000,10000)."-".$_FILES["c_address"]["name"];
		    $tname = $_FILES["c_address"]["tmp_name"];
		    $file_size = $file ['size'];

		     $uploads_dir = 'cand_docs/current_address/';

		    move_uploaded_file($tname, $uploads_dir.$pname);

		    $sql = "INSERT into candidate_documents (fk,c_id,c_address) VALUES('$id','$special_id','$pname')";
			if(mysqli_query($db,$sql)){
		  	$msg="current address proof uploaded successfully";
			$type="success";}
			else
			{
				$msg="current address proof could not be uploaded ";
			$type="fail";
			}
			header("Location: candidate_form.php?msg=" .$msg. "&type=".$type);
		  }

 }
 else  if (isset($_POST['submit3']))
 {
 	if($_FILES["p_address"]["name"]=='')
				{
					$msg="choose a file first ";
			$type="fail";
			
			header("Location: candidate_form.php?msg=" .$msg. "&type=".$type);
			exit();
				}
 	 if ( $rnum==1 ) 
			{
								unlink('cand_docs/permanent_address/'.$result['p_address']);

				$pname = rand(1000,10000)."-".$_FILES["p_address"]["name"];
		    $tname = $_FILES["p_address"]["tmp_name"];
		    $file_size = $file ['size'];

		     $uploads_dir = 'cand_docs/permanent_address/';

		    move_uploaded_file($tname, $uploads_dir.$pname);
				$update = "UPDATE candidate_documents SET p_address='$pname' WHERE fk = '$id' ";

				$run = mysqli_query($db,$update);

				if($run)
					{
						$msg="permanent address proof uploaded successfully";
						$type="success";
					}
					else
					{
						$msg="permanent address proof could not be uploaded ";
					$type="fail";
					}
			header("Location: candidate_form.php?msg=" .$msg. "&type=".$type);
  			}
    else
		  {

		  	$pname = rand(1000,10000)."-".$_FILES["p_address"]["name"];
		    $tname = $_FILES["p_address"]["tmp_name"];
		    $file_size = $file ['size'];

		     $uploads_dir = 'cand_docs/permanent_address/';

		    move_uploaded_file($tname, $uploads_dir.$pname);

		    $sql = "INSERT into candidate_documents (fk,c_id,p_address) VALUES('$id','$special_id','$pname')";
			if(mysqli_query($db,$sql)){
		  	$msg="permanent address proof uploaded successfully";
			$type="success";}
			else
			{
				$msg="permanent address proof could not be uploaded ";
			$type="fail";
			}
			header("Location: candidate_form.php?msg=" .$msg. "&type=".$type);
		  }

 }
 else  if (isset($_POST['submit4']))
 {
 	if($_FILES["pancard"]["name"]=='')
				{
					$msg="choose a file first ";
			$type="fail";
			
			header("Location: candidate_form.php?msg=" .$msg. "&type=".$type);
			exit();
				}
 	 if ( $rnum==1 ) 
			{

				unlink('cand_docs/pancards/'.$result['pancard']);

				$pname = rand(1000,10000)."-".$_FILES["pancard"]["name"];
		    $tname = $_FILES["pancard"]["tmp_name"];
		    $file_size = $file ['size'];

		     $uploads_dir = 'cand_docs/pancards/';

		    move_uploaded_file($tname, $uploads_dir.$pname);
				$update = "UPDATE candidate_documents SET pancard='$pname' WHERE fk = '$id' ";

				$run = mysqli_query($db,$update);

				if($run)
					{
						$msg="pancard uploaded successfully";
						$type="success";
					}
					else
					{
						$msg="pancard could not be uploaded ";
					$type="fail";
					}
			header("Location: candidate_form.php?msg=" .$msg. "&type=".$type);
  			}
    else
		  {

		  	$pname = rand(1000,10000)."-".$_FILES["pancard"]["name"];
		    $tname = $_FILES["pancard"]["tmp_name"];
		    $file_size = $file ['size'];

		     $uploads_dir = 'cand_docs/pancards/';

		    move_uploaded_file($tname, $uploads_dir.$pname);

		    $sql = "INSERT into candidate_documents (fk,c_id,pancard) VALUES('$id','$special_id','$pname')";
			if(mysqli_query($db,$sql)){
		  	$msg="pancard uploaded successfully";
			$type="success";}
			else
			{
				$msg="pancard could not be uploaded ";
			$type="fail";
			}
			header("Location: candidate_form.php?msg=" .$msg. "&type=".$type);
		  }

 }
 else  if (isset($_POST['submit5']))
 {
 	if($_FILES["edu_certificates"]["name"]=='')
				{
					$msg="choose a file first ";
			$type="fail";
			
			header("Location: candidate_form.php?msg=" .$msg. "&type=".$type);
			exit();
				}
 	 if ( $rnum==1 ) 
			{
				unlink('cand_docs/edu_certificates/'.$result['edu_certificates']);

				$pname = rand(1000,10000)."-".$_FILES["edu_certificates"]["name"];
		    $tname = $_FILES["edu_certificates"]["tmp_name"];
		    $file_size = $file ['size'];

		     $uploads_dir = 'cand_docs/edu_certificates/';

		    move_uploaded_file($tname, $uploads_dir.$pname);
				$update = "UPDATE candidate_documents SET edu_certificates='$pname' WHERE fk = '$id' ";

				$run = mysqli_query($db,$update);

				if($run)
					{
						$msg="educational certificates uploaded successfully";
						$type="success";
					}
					else
					{
						$msg="educational certificates could not be uploaded ";
					$type="fail";
					}
			header("Location: candidate_form.php?msg=" .$msg. "&type=".$type);
  			}
    else
		  {

		  	$pname = rand(1000,10000)."-".$_FILES["edu_certificates"]["name"];
		    $tname = $_FILES["edu_certificates"]["tmp_name"];
		    $file_size = $file ['size'];

		     $uploads_dir = 'cand_docs/edu_certificates/';

		    move_uploaded_file($tname, $uploads_dir.$pname);

		    $sql = "INSERT into candidate_documents (fk,c_id,edu_certificates) VALUES('$id','$special_id','$pname')";
			if(mysqli_query($db,$sql)){
		  	$msg="educational certificates uploaded successfully";
			$type="success";}
			else
			{
				$msg="educational certificates could not be uploaded ";
			$type="fail";
			}
			header("Location: candidate_form.php?msg=" .$msg. "&type=".$type);
		  }

 }
else  if (isset($_POST['submit6']))
 {

 	if($_FILES["pro_certificates"]["name"]=='')
				{
					$msg="choose a file first ";
			$type="fail";
			
			header("Location: candidate_form.php?msg=" .$msg. "&type=".$type);
			exit();
				}

 	 if ( $rnum==1 ) 
			{
				unlink('cand_docs/pro_certificates/'.$result['pro_certificates']);

				$pname = rand(1000,10000)."-".$_FILES["pro_certificates"]["name"];
		    $tname = $_FILES["pro_certificates"]["tmp_name"];
		    $file_size = $file ['size'];

		     $uploads_dir = 'cand_docs/pro_certificates/';

		    move_uploaded_file($tname, $uploads_dir.$pname);
				$update = "UPDATE candidate_documents SET pro_certificates='$pname' WHERE fk = '$id' ";

				$run = mysqli_query($db,$update);

				if($run)
					{
						$msg="professional certificates certificates uploaded successfully";
						$type="success";
					}
					else
					{
						$msg="professional certificates certificates could not be uploaded ";
					$type="fail";
					}
			header("Location: candidate_form.php?msg=" .$msg. "&type=".$type);
  			}
    else
		  {

		  	$pname = rand(1000,10000)."-".$_FILES["pro_certificates"]["name"];
		    $tname = $_FILES["pro_certificates"]["tmp_name"];
		    $file_size = $file ['size'];

		     $uploads_dir = 'cand_docs/pro_certificates/';

		    move_uploaded_file($tname, $uploads_dir.$pname);

		    $sql = "INSERT into candidate_documents (fk,c_id,pro_certificates) VALUES('$id','$special_id','$pname')";
			if(mysqli_query($db,$sql)){
		  	$msg="professional certificates uploaded successfully";
			$type="success";}
			else
			{
				$msg="professional certificates could not be uploaded ";
			$type="fail";
			}
			header("Location: candidate_form.php?msg=" .$msg. "&type=".$type);
		  }

 }
else  if (isset($_POST['submit7']))
 {
 	if($_FILES["photo"]["name"]=='')
				{
					$msg="choose a file first ";
			$type="fail";
			
			header("Location: candidate_form.php?msg=" .$msg. "&type=".$type);
			exit();
				}
 	 if ( $rnum==1 ) 
			{
								unlink('cand_docs/photo/'.$result['photo']);

				$pname = rand(1000,10000)."-".$_FILES["photo"]["name"];
		    $tname = $_FILES["photo"]["tmp_name"];
		    $file_size = $file ['size'];

		     $uploads_dir = 'cand_docs/photo/';

		    move_uploaded_file($tname, $uploads_dir.$pname);
				$update = "UPDATE candidate_documents SET photo='$pname' WHERE fk = '$id' ";

				$run = mysqli_query($db,$update);

				if($run)
					{
						$msg="photo  uploaded successfully";
						$type="success";
					}
					else
					{
						$msg="photo could not be uploaded ";
					$type="fail";
					}
			header("Location: candidate_form.php?msg=" .$msg. "&type=".$type);
  			}
    else
		  {

		  	$pname = rand(1000,10000)."-".$_FILES["photo"]["name"];
		    $tname = $_FILES["photo"]["tmp_name"];
		    $file_size = $file ['size'];

		     $uploads_dir = 'cand_docs/photo/';

		    move_uploaded_file($tname, $uploads_dir.$pname);

		    $sql = "INSERT into candidate_documents (fk,c_id,photo) VALUES('$id','$special_id','$pname')";
			if(mysqli_query($db,$sql)){
		  	$msg="photo uploaded successfully";
			$type="success";}
			else
			{
				$msg="photo could not be uploaded ";
			$type="fail";
			}
			header("Location: candidate_form.php?msg=" .$msg. "&type=".$type);
		  }

 }
else  if (isset($_POST['submit8']))
 {

 	if($_FILES["payslip"]["name"]=='')
				{
					$msg="choose a file first ";
			$type="fail";
			
			header("Location: candidate_form.php?msg=" .$msg. "&type=".$type);
			exit();
				}

 	 if ( $rnum==1 ) 
			{
		unlink('cand_docs/payslip/'.$result['payslip']);

				$pname = rand(1000,10000)."-".$_FILES["payslip"]["name"];
		    $tname = $_FILES["payslip"]["tmp_name"];
		    $file_size = $file ['size'];

		     $uploads_dir = 'cand_docs/payslip/';

		    move_uploaded_file($tname, $uploads_dir.$pname);
				$update = "UPDATE candidate_documents SET payslip='$pname' WHERE fk = '$id' ";

				$run = mysqli_query($db,$update);

				if($run)
					{
						$msg="payslip  uploaded successfully";
						$type="success";
					}
					else
					{
						$msg="payslip could not be uploaded ";
					$type="fail";
					}
			header("Location: candidate_form.php?msg=" .$msg. "&type=".$type);
  			}
    else
		  {

		  	$pname = rand(1000,10000)."-".$_FILES["payslip"]["name"];
		    $tname = $_FILES["payslip"]["tmp_name"];
		    $file_size = $file ['size'];

		     $uploads_dir = 'cand_docs/payslip/';

		    move_uploaded_file($tname, $uploads_dir.$pname);

		    $sql = "INSERT into candidate_documents (fk,c_id,payslip) VALUES('$id','$special_id','$pname')";
			if(mysqli_query($db,$sql)){
		  	$msg="payslip uploaded successfully";
			$type="success";}
			else
			{
				$msg="payslip could not be uploaded ";
			$type="fail";
			}
			header("Location: candidate_form.php?msg=" .$msg. "&type=".$type);
		  }

 }
 else  if (isset($_POST['submit9']))
 {
 	if($_FILES["form16"]["name"]=='')
				{
					$msg="choose a file first ";
			$type="fail";
			
			header("Location: candidate_form.php?msg=" .$msg. "&type=".$type);
			exit();
				}

 	 if ( $rnum==1 ) 
			{
				unlink('cand_docs/form16/'.$result['form16']);
						    $file_size = $file["form16"] ['size'];

				$pname = rand(1000,10000)."-".$_FILES["form16"]["name"];
		    $tname = $_FILES["form16"]["tmp_name"];

		     $uploads_dir = 'cand_docs/form16/';

		    move_uploaded_file($tname, $uploads_dir.$pname);
				$update = "UPDATE candidate_documents SET form16='$pname' WHERE fk = '$id' ";

				$run = mysqli_query($db,$update);

				if($run)
					{
						$msg="form16  uploaded successfully";
						$type="success";
					}
					else
					{
						$msg="form16 could not be uploaded ";
					$type="fail";
					}
			header("Location: candidate_form.php?msg=" .$msg. "&type=".$type);
  			}
    else
		  {

		  	$pname = rand(1000,10000)."-".$_FILES["form16"]["name"];
		    $tname = $_FILES["form16"]["tmp_name"];
		    $file_size = $file ['size'];

		     $uploads_dir = 'cand_docs/form16/';

		    move_uploaded_file($tname, $uploads_dir.$pname);

		    $sql = "INSERT into candidate_documents (fk,c_id,form16) VALUES('$id','$special_id','$pname')";
			if(mysqli_query($db,$sql)){
		  	$msg="form16 uploaded successfully";
			$type="success";}
			else
			{
				$msg="form16 could not be uploaded ";
			$type="fail";
			}
			header("Location: candidate_form.php?msg=" .$msg. "&type=".$type);
		  }

 }
 else  if (isset($_POST['submit10']))
 {
 	if($_FILES["exp_certificates"]["name"]=='')
				{
					$msg="choose a file first ";
			$type="fail";
			
			header("Location: candidate_form.php?msg=" .$msg. "&type=".$type);
			exit();
				}

 	 if ( $rnum==1 ) 
			{
				unlink('cand_docs/exp_certificates/'.$result['exp_certificates']);
						    $file_size = $file["exp_certificates"] ['size'];

				$pname = rand(1000,10000)."-".$_FILES["exp_certificates"]["name"];
		    $tname = $_FILES["exp_certificates"]["tmp_name"];

		     $uploads_dir = 'cand_docs/exp_certificates/';

		    move_uploaded_file($tname, $uploads_dir.$pname);
				$update = "UPDATE candidate_documents SET exp_certificates='$pname' WHERE fk = '$id' ";

				$run = mysqli_query($db,$update);

				if($run)
					{
						$msg="experience certificates  uploaded successfully";
						$type="success";
					}
					else
					{
						$msg="experience certificates could not be uploaded ";
					$type="fail";
					}
			header("Location: candidate_form.php?msg=" .$msg. "&type=".$type);
  			}
    else
		  {

		  	$pname = rand(1000,10000)."-".$_FILES["exp_certificates"]["name"];
		    $tname = $_FILES["exp_certificates"]["tmp_name"];
		    $file_size = $file ['size'];

		     $uploads_dir = 'cand_docs/exp_certificates/';

		    move_uploaded_file($tname, $uploads_dir.$pname);

		    $sql = "INSERT into candidate_documents (fk,c_id,exp_certificates) VALUES('$id','$special_id','$pname')";
			if(mysqli_query($db,$sql)){
		  	$msg="experience uploaded successfully";
			$type="success";}
			else
			{
				$msg="experience could not be uploaded ";
			$type="fail";
			}
			header("Location: candidate_form.php?msg=" .$msg. "&type=".$type);
		  }

 }
 else  if (isset($_POST['submit11']))
 {
 	if($_FILES["others"]["name"]=='')
				{
					$msg="choose a file first ";
			$type="fail";
			
			header("Location: candidate_form.php?msg=" .$msg. "&type=".$type);
			exit();
				}

 	 if ( $rnum==1 ) 
			{
				unlink('cand_docs/others/'.$result['others']);
						    $file_size = $file["others"] ['size'];

				$pname = rand(1000,10000)."-".$_FILES["others"]["name"];
		    $tname = $_FILES["others"]["tmp_name"];

		     $uploads_dir = 'cand_docs/others/';

		    move_uploaded_file($tname, $uploads_dir.$pname);
				$update = "UPDATE candidate_documents SET others='$pname' WHERE fk = '$id' ";

				$run = mysqli_query($db,$update);

				if($run)
					{
						$msg="other documents  uploaded successfully";
						$type="success";
					}
					else
					{
						$msg="other documents could not be uploaded ";
					$type="fail";
					}
			header("Location: candidate_form.php?msg=" .$msg. "&type=".$type);
  			}
    else
		  {

		  	$pname = rand(1000,10000)."-".$_FILES["others"]["name"];
		    $tname = $_FILES["others"]["tmp_name"];
		    $file_size = $file ['size'];

		     $uploads_dir = 'cand_docs/others/';

		    move_uploaded_file($tname, $uploads_dir.$pname);

		    $sql = "INSERT into candidate_documents (fk,c_id,others) VALUES('$id','$special_id','$pname')";
			if(mysqli_query($db,$sql)){
		  	$msg="other documents uploaded successfully";
			$type="success";}
			else
			{
				$msg="other documents could not be uploaded ";
			$type="fail";
			}
			header("Location: candidate_form.php?msg=" .$msg. "&type=".$type);
		  }

 }
 else 
 {
 	$msg="choose a file first ";
			$type="fail";
			
			header("Location: candidate_form.php?msg=" .$msg. "&type=".$type);
 }
 


?>