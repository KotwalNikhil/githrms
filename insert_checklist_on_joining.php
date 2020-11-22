<?php

include('session.php');
$c_id=$_SESSION['c_id'];


/////////////////////////////////////////////////

$query =" SELECT * FROM checklist_on_joining WHERE fk ='$id' and c_id='$c_id' ";
      $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
       $result = mysqli_fetch_array($ssql,MYSQLI_ASSOC);
		$rnum = $ssql->num_rows;

// for recuiriter mail

   $query =" SELECT * FROM candidate_table WHERE id ='$c_id' ";
      $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
       $r = mysqli_fetch_array($ssql,MYSQLI_ASSOC);
$r_id=$r['r_id'];

$query =" SELECT * FROM e1 WHERE  c_id='$c_id'";
      $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
   	 $rnume1 = $ssql->num_rows;
   	   $e1 = mysqli_fetch_array($ssql,MYSQLI_ASSOC);

$query =" SELECT * FROM loginform WHERE id ='$r_id' ";
      $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
       $r = mysqli_fetch_array($ssql,MYSQLI_ASSOC);

/////////////////////////////////////////////////


		//for sending the mail to the hr
		if(isset($_GET['send_mail']))
		{
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

            $mail->setFrom(EMAIL);
            $mail->addAddress('nikhilkotwalcse@gmail.com');     //  HR email id
                        // Name is optional
            $mail->addReplyTo(EMAIL);


            
             $mail->isHTML(true);                                  // Set email format to HTML

            $mail->Subject = 'Candidate '.$e1['full_name'].' Onboarding Completed';
            $mail->Body    = 'Recuriter has uploaded all the documents of candidate on joining and completed his onboarding .';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();

            $msg="Onboarding completed.HR has been informed";
							$type="Success";
						
						header("Location: checklist_on_joining.php?msg=" .$msg. "&type=".$type);
			exit();
		}
		

// for deleting the file
if(isset($_GET['delete1']))
		{	
						$resume = $result['exp_and_rel_cert'];
						if(!empty($resume))
						{
							unlink('checklist/exp_and_rel_cert/'.$result['exp_and_rel_cert']);
							$command = "UPDATE checklist_on_joining SET exp_and_rel_cert='' WHERE fk = '$id' and c_id='$c_id' ";
      						$ssql = mysqli_query($db,$command) ;
							$msg="Experience & Relieving certificate deleted successfully . ";
							$type="success";
						}
						else
						{
							$msg="No File Found . ";
							$type="fail";
						}
						header("Location: checklist_on_joining.php?msg=" .$msg. "&type=".$type);
			exit();

		}
else if(isset($_GET['delete2']))
		{	
						if(!empty($result['signed_nda']))
						{
				unlink('checklist/signed_nda/'.$result['signed_nda']);
							$command = "UPDATE checklist_on_joining SET signed_nda='' WHERE fk = '$id' and c_id='$c_id' ";
      						$ssql = mysqli_query($db,$command) ;
							$msg="Signed NDA proof deleted successfully . ";
							$type="success";
						}
						else
						{
							$msg="No File Found . ";
							$type="fail";
						}
						header("Location: checklist_on_joining.php?msg=" .$msg. "&type=".$type);
			exit();

		}
		else if(isset($_GET['delete3']))
		{	
						if(!empty($result['signed_mou']))
						{
								unlink('checklist/signed_mou/'.$result['signed_mou']);
							$command = "UPDATE checklist_on_joining SET signed_mou='' WHERE fk = '$id' and c_id='$c_id' ";
      						$ssql = mysqli_query($db,$command) ;
							$msg="Signed MOU deleted successfully . ";
							$type="success";
						}
						else
						{
							$msg="No File Found . ";
							$type="fail";
						}
						header("Location: checklist_on_joining.php?msg=" .$msg. "&type=".$type);
			exit();

		}
		else if(isset($_GET['delete4']))
		{	
						if(!empty($result['pf_nomination']))
						{
				unlink('checklist/pf_nomination/'.$result['pf_nomination']);
							$command = "UPDATE checklist_on_joining SET pf_nomination='' WHERE fk = '$id' and c_id='$c_id' ";
      						$ssql = mysqli_query($db,$command) ;
							$msg="PF – Nomination form No. 2 deleted successfully . ";
							$type="success";
						}
						else
						{
							$msg="No File Found . ";
							$type="fail";
						}
						header("Location: checklist_on_joining.php?msg=" .$msg. "&type=".$type);
			exit();

		}
		else if(isset($_GET['delete5']))
		{	
						if(!empty($result['declaration_form']))
						{
				unlink('checklist/declaration_form/'.$result['declaration_form']);
							$command = "UPDATE checklist_on_joining SET declaration_form='' WHERE fk = '$id' and c_id='$c_id' ";
      						$ssql = mysqli_query($db,$command) ;
							$msg="PF – Declaration form No. 11 deleted successfully . ";
							$type="success";
						}
						else
						{
							$msg="No File Found . ";
							$type="fail";
						}
						header("Location: checklist_on_joining.php?msg=" .$msg. "&type=".$type);
			exit();

		}
			else if(isset($_GET['delete6']))
		{	
						if(!empty($result['passport_undertaking']))
						{
								unlink('checklist/passport_undertaking/'.$result['passport_undertaking']);
							$command = "UPDATE checklist_on_joining SET passport_undertaking='' WHERE fk = '$id' and c_id='$c_id' ";
      						$ssql = mysqli_query($db,$command) ;
							$msg="Passport Submission undertaking deleted successfully . ";
							$type="success";
						}
						else
						{
							$msg="No File Found . ";
							$type="fail";
						}
						header("Location: checklist_on_joining.php?msg=" .$msg. "&type=".$type);
			exit();

		}
		else if(isset($_GET['delete7']))
		{	
						if(!empty($result['undertaking_relieving']))
						{
				unlink('checklist/undertaking_relieving/'.$result['undertaking_relieving']);
							$command = "UPDATE checklist_on_joining SET undertaking_relieving='' WHERE fk = '$id' and c_id='$c_id' ";
      						$ssql = mysqli_query($db,$command) ;
							$msg="Undertaking-Relieving Document deleted successfully . ";
							$type="success";
						}
						else
						{
							$msg="No File Found . ";
							$type="fail";
						}
						header("Location: checklist_on_joining.php?msg=" .$msg. "&type=".$type);
			exit();

		}
		
		
		

 if (isset($_POST['submit1']))
 {
 	if($_FILES["exp_and_rel_cert"]["name"]=='')
				{
					$msg="choose a file first ";
			$type="fail";
			
			header("Location: checklist_on_joining.php?msg=" .$msg. "&type=".$type);
			exit();
				}
 	 if ( $rnum==1 ) 
			{
				unlink('checklist/exp_and_rel_cert/'.$result['exp_and_rel_cert']);

				$pname = rand(1000,10000)."-".$_FILES["exp_and_rel_cert"]["name"];
		    $tname = $_FILES["exp_and_rel_cert"]["tmp_name"];
		    $file_size = $file ['size'];

		     $uploads_dir = 'checklist/exp_and_rel_cert/';

		    move_uploaded_file($tname, $uploads_dir.$pname);
				$update = "UPDATE checklist_on_joining SET exp_and_rel_cert='$pname' WHERE fk = '$id' and c_id='$c_id' ";

				$run = mysqli_query($db,$update);

				if($run)
					{
						$msg="Experience and Relieving certificate uploaded successfully";
						$type="success";
					}
					else
					{
						$msg="Experience & Relieving certificate could not be uploaded ";
					$type="fail";
					}
			header("Location: checklist_on_joining.php?msg=" .$msg. "&type=".$type);
  			}
    else
		  {

		  	$pname = rand(1000,10000)."-".$_FILES["exp_and_rel_cert"]["name"];
		    $tname = $_FILES["exp_and_rel_cert"]["tmp_name"];
		    $file_size = $file ['size'];

		     $uploads_dir = 'checklist/exp_and_rel_cert/';

		    move_uploaded_file($tname, $uploads_dir.$pname);

		    $sql = "INSERT into checklist_on_joining (fk,c_id,exp_and_rel_cert) VALUES('$id','$c_id','$pname')";
			if(mysqli_query($db,$sql)){
		  	$msg="Experience and  Relieving certificate uploaded successfully";
			$type="success";}
			else
			{
				$msg="Experience and Relieving certificate could not be uploaded ";
			$type="fail";
			}
			header("Location: checklist_on_joining.php?msg=" .$msg. "&type=".$type);
		  }

 }
 else  if (isset($_POST['submit2']))
 {
 	if($_FILES["signed_nda"]["name"]=='')
				{
					$msg="choose a file first ";
			$type="fail";
			
			header("Location: checklist_on_joining.php?msg=" .$msg. "&type=".$type);
			exit();
				}
 	 if ( $rnum==1 ) 
			{
				unlink('checklist/current_address/'.$result['signed_nda']);

				$pname = rand(1000,10000)."-".$_FILES["signed_nda"]["name"];
		    $tname = $_FILES["signed_nda"]["tmp_name"];
		    $file_size = $file ['size'];

		     $uploads_dir = 'checklist/signed_nda/';

		    move_uploaded_file($tname, $uploads_dir.$pname);
				$update = "UPDATE checklist_on_joining SET signed_nda='$pname' WHERE fk = '$id' and c_id='$c_id' ";

				$run = mysqli_query($db,$update);

				if($run)
					{
						$msg="Signed NDA uploaded successfully";
						$type="success";
					}
					else
					{
						$msg="Signed NDA could not be uploaded ";
					$type="fail";
					}
			header("Location: checklist_on_joining.php?msg=" .$msg. "&type=".$type);
  			}
    else
		  {

		  	$pname = rand(1000,10000)."-".$_FILES["signed_nda"]["name"];
		    $tname = $_FILES["signed_nda"]["tmp_name"];
		    $file_size = $file ['size'];

		     $uploads_dir = 'checklist/signed_nda/';

		    move_uploaded_file($tname, $uploads_dir.$pname);

		    $sql = "INSERT into checklist_on_joining (fk,c_id,signed_nda) VALUES('$id','$c_id','$pname')";
			if(mysqli_query($db,$sql)){
		  	$msg="Signed NDAuploaded successfully";
			$type="success";}
			else
			{
				$msg="Signed NDA could not be uploaded ";
			$type="fail";
			}
			header("Location: checklist_on_joining.php?msg=" .$msg. "&type=".$type);
		  }

 }
 else  if (isset($_POST['submit3']))
 {
 	if($_FILES["signed_mou"]["name"]=='')
				{
					$msg="choose a file first ";
			$type="fail";
			
			header("Location: checklist_on_joining.php?msg=" .$msg. "&type=".$type);
			exit();
				}
 	 if ( $rnum==1 ) 
			{
								unlink('checklist/signed_mou/'.$result['signed_mou']);

				$pname = rand(1000,10000)."-".$_FILES["signed_mou"]["name"];
		    $tname = $_FILES["signed_mou"]["tmp_name"];
		    $file_size = $file ['size'];

		     $uploads_dir = 'checklist/signed_mou/';

		    move_uploaded_file($tname, $uploads_dir.$pname);
				$update = "UPDATE checklist_on_joining SET signed_mou='$pname' WHERE fk = '$id' and c_id='$c_id' ";

				$run = mysqli_query($db,$update);

				if($run)
					{
						$msg="Signed MOU uploaded successfully";
						$type="success";
					}
					else
					{
						$msg="Signed MOU could not be uploaded ";
					$type="fail";
					}
			header("Location: checklist_on_joining.php?msg=" .$msg. "&type=".$type);
  			}
    else
		  {

		  	$pname = rand(1000,10000)."-".$_FILES["signed_mou"]["name"];
		    $tname = $_FILES["signed_mou"]["tmp_name"];
		    $file_size = $file ['size'];

		     $uploads_dir = 'checklist/signed_mou/';

		    move_uploaded_file($tname, $uploads_dir.$pname);

		    $sql = "INSERT into checklist_on_joining (fk,c_id,signed_mou) VALUES('$id','$c_id','$pname')";
			if(mysqli_query($db,$sql)){
		  	$msg="Signed MOU uploaded successfully";
			$type="success";}
			else
			{
				$msg="Signed MOU could not be uploaded ";
			$type="fail";
			}
			header("Location: checklist_on_joining.php?msg=" .$msg. "&type=".$type);
		  }

 }
 else  if (isset($_POST['submit4']))
 {
 	if($_FILES["pf_nomination"]["name"]=='')
				{
					$msg="choose a file first ";
			$type="fail";
			
			header("Location: checklist_on_joining.php?msg=" .$msg. "&type=".$type);
			exit();
				}
 	 if ( $rnum==1 ) 
			{

				unlink('checklist/pf_nomination/'.$result['pf_nomination']);

				$pname = rand(1000,10000)."-".$_FILES["pf_nomination"]["name"];
		    $tname = $_FILES["pf_nomination"]["tmp_name"];
		    $file_size = $file ['size'];

		     $uploads_dir = 'checklist/pf_nomination/';

		    move_uploaded_file($tname, $uploads_dir.$pname);
				$update = "UPDATE checklist_on_joining SET pf_nomination='$pname' WHERE fk = '$id' and c_id='$c_id' and c_id='$c_id' ";

				$run = mysqli_query($db,$update);

				if($run)
					{
						$msg="PF – Nomination form No. 2 uploaded successfully";
						$type="success";
					}
					else
					{
						$msg="PF – Nomination form No. 2 could not be uploaded ";
					$type="fail";
					}
			header("Location: checklist_on_joining.php?msg=" .$msg. "&type=".$type);
  			}
    else
		  {

		  	$pname = rand(1000,10000)."-".$_FILES["pf_nomination"]["name"];
		    $tname = $_FILES["pf_nomination"]["tmp_name"];
		    $file_size = $file ['size'];

		     $uploads_dir = 'checklist/pf_nomination/';

		    move_uploaded_file($tname, $uploads_dir.$pname);

		    $sql = "INSERT into checklist_on_joining (fk,c_id,pf_nomination) VALUES('$id','$c_id','$pname')";
			if(mysqli_query($db,$sql)){
		  	$msg="PF – Nomination form No. 2 uploaded successfully";
			$type="success";}
			else
			{
				$msg="PF – Nomination form No. 2 could not be uploaded ";
			$type="fail";
			}
			header("Location: checklist_on_joining.php?msg=" .$msg. "&type=".$type);
		  }

 }
 else  if (isset($_POST['submit5']))
 {
 	if($_FILES["declaration_form"]["name"]=='')
				{
					$msg="choose a file first ";
			$type="fail";
			
			header("Location: checklist_on_joining.php?msg=" .$msg. "&type=".$type);
			exit();
				}
 	 if ( $rnum==1 ) 
			{
				unlink('checklist/declaration_form/'.$result['declaration_form']);

				$pname = rand(1000,10000)."-".$_FILES["declaration_form"]["name"];
		    $tname = $_FILES["declaration_form"]["tmp_name"];
		    $file_size = $file ['size'];

		     $uploads_dir = 'checklist/declaration_form/';

		    move_uploaded_file($tname, $uploads_dir.$pname);
				$update = "UPDATE checklist_on_joining SET declaration_form='$pname' WHERE fk = '$id' and c_id='$c_id' ";

				$run = mysqli_query($db,$update);

				if($run)
					{
						$msg="PF – Declaration form No. 11 uploaded successfully";
						$type="success";
					}
					else
					{
						$msg="PF – Declaration form No. 11 could not be uploaded ";
					$type="fail";
					}
			header("Location: checklist_on_joining.php?msg=" .$msg. "&type=".$type);
  			}
    else
		  {

		  	$pname = rand(1000,10000)."-".$_FILES["declaration_form"]["name"];
		    $tname = $_FILES["declaration_form"]["tmp_name"];
		    $file_size = $file ['size'];

		     $uploads_dir = 'checklist/declaration_form/';

		    move_uploaded_file($tname, $uploads_dir.$pname);

		    $sql = "INSERT into checklist_on_joining (fk,c_id,declaration_form) VALUES('$id','$c_id','$pname')";
			if(mysqli_query($db,$sql)){
		  	$msg="PF – Declaration form No. 11 uploaded successfully";
			$type="success";}
			else
			{
				$msg="PF – Declaration form No. 11 could not be uploaded ";
			$type="fail";
			}
			header("Location: checklist_on_joining.php?msg=" .$msg. "&type=".$type);
		  }

 }
else  if (isset($_POST['submit6']))
 {

 	if($_FILES["passport_undertaking"]["name"]=='')
				{
					$msg="choose a file first ";
			$type="fail";
			
			header("Location: checklist_on_joining.php?msg=" .$msg. "&type=".$type);
			exit();
				}

 	 if ( $rnum==1 ) 
			{
				unlink('checklist/passport_undertaking/'.$result['passport_undertaking']);

				$pname = rand(1000,10000)."-".$_FILES["passport_undertaking"]["name"];
		    $tname = $_FILES["passport_undertaking"]["tmp_name"];
		    $file_size = $file ['size'];

		     $uploads_dir = 'checklist/passport_undertaking/';

		    move_uploaded_file($tname, $uploads_dir.$pname);
				$update = "UPDATE checklist_on_joining SET passport_undertaking='$pname' WHERE fk = '$id' and c_id='$c_id' ";

				$run = mysqli_query($db,$update);

				if($run)
					{
						$msg="Passport Submission undertaking uploaded successfully";
						$type="success";
					}
					else
					{
						$msg="Passport Submission undertaking could not be uploaded ";
					$type="fail";
					}
			header("Location: checklist_on_joining.php?msg=" .$msg. "&type=".$type);
  			}
    else
		  {

		  	$pname = rand(1000,10000)."-".$_FILES["passport_undertaking"]["name"];
		    $tname = $_FILES["passport_undertaking"]["tmp_name"];
		    $file_size = $file ['size'];

		     $uploads_dir = 'checklist/passport_undertaking/';

		    move_uploaded_file($tname, $uploads_dir.$pname);

		    $sql = "INSERT into checklist_on_joining (fk,c_id,passport_undertaking) VALUES('$id','$c_id','$pname')";
			if(mysqli_query($db,$sql)){
		  	$msg="Passport Submission undertaking uploaded successfully";
			$type="success";}
			else
			{
				$msg="Passport Submission undertaking could not be uploaded ";
			$type="fail";
			}
			header("Location: checklist_on_joining.php?msg=" .$msg. "&type=".$type);
		  }

 }
else  if (isset($_POST['submit7']))
 {
 	if($_FILES["undertaking_relieving"]["name"]=='')
				{
					$msg="choose a file first ";
			$type="fail";
			
			header("Location: checklist_on_joining.php?msg=" .$msg. "&type=".$type);
			exit();
				}
 	 if ( $rnum==1 ) 
			{
								unlink('checklist/undertaking_relieving/'.$result['undertaking_relieving']);

				$pname = rand(1000,10000)."-".$_FILES["undertaking_relieving"]["name"];
		    $tname = $_FILES["undertaking_relieving"]["tmp_name"];
		    $file_size = $file ['size'];

		     $uploads_dir = 'checklist/undertaking_relieving/';

		    move_uploaded_file($tname, $uploads_dir.$pname);
				$update = "UPDATE checklist_on_joining SET undertaking_relieving='$pname' WHERE fk = '$id' and c_id='$c_id' ";

				$run = mysqli_query($db,$update);

				if($run)
					{
						$msg="Undertaking-Relieving Documents  uploaded successfully";
						$type="success";
					}
					else
					{
						$msg="Undertaking-Relieving Documents could not be uploaded ";
					$type="fail";
					}
			header("Location: checklist_on_joining.php?msg=" .$msg. "&type=".$type);
  			}
    else
		  {

		  	$pname = rand(1000,10000)."-".$_FILES["undertaking_relieving"]["name"];
		    $tname = $_FILES["undertaking_relievingphoto"]["tmp_name"];
		    $file_size = $file ['size'];

		     $uploads_dir = 'checklist/undertaking_relieving/';

		    move_uploaded_file($tname, $uploads_dir.$pname);

		    $sql = "INSERT into checklist_on_joining (fk,c_id,undertaking_relieving) VALUES('$id','$c_id','$pname')";
			if(mysqli_query($db,$sql)){
		  	$msg="Undertaking-Relieving Documents uploaded successfully";
			$type="success";}
			else
			{
				$msg="Undertaking-Relieving Documents could not be uploaded ";
			$type="fail";
			}
			header("Location: checklist_on_joining.php?msg=" .$msg. "&type=".$type);
		  }

 }

 


?>