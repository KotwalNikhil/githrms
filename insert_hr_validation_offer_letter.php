<?php 
include('session.php');

    $c_id=$_SESSION['c_id'];

$query =" SELECT * FROM e1 WHERE  c_id='$c_id'";
      $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
   	 $rnume1 = $ssql->num_rows;
   	   $result1 = mysqli_fetch_array($ssql,MYSQLI_ASSOC);

   $query =" SELECT * FROM hr_cand_form_validation WHERE c_id ='$c_id' ";
      $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
       $ro = mysqli_fetch_array($ssql,MYSQLI_ASSOC);

       $r_id=$ro['r_id'];

$query =" SELECT * FROM loginform WHERE id ='$r_id' ";
      $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
       $r = mysqli_fetch_array($ssql,MYSQLI_ASSOC);









       if(isset($_GET['select']))
		{
			$_SESSION['c_id']=$_GET['c_id'];
			$msg="Candidate selected successfully,Please validate his documents below ";
					$type="success";
					
			header("Location: hr_validation_offer_letter.php?msg=" .$msg. "&type=".$type);
			exit();
		}

if (isset($_POST['confirmed_hr']))
 {
 	$review =$_POST['hr_review'];
						if($review=="")
						{
							$msg="Give a review first. ";
							$type="fail";
						}
						else
						{
							/////////////// email from hr to recuriter ////////////////
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
						$mail->addAddress($r["email"]);     // Add a recipient
						            // Name is optional
						$mail->addReplyTo(EMAIL);


						
						 $mail->isHTML(true);                                  // Set email format to HTML

						$mail->Subject = 'HR Reviews for'.$result1['full_name'].'  offer letter you generated ';
						$mail->Body    = 'The offer letter have been approved from HR, Kindly go through the reviews in portal.';
						$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

						$mail->send();

/////////////////////////////

							$command = "DELETE from hr_offer_letter_validation  WHERE c_id = '$c_id'  ";
      						$ssql = mysqli_query($db,$command) ;

      						$command = "UPDATE review_offer_letter SET hr_confirmed=1,hr_review='$review' WHERE c_id = '$c_id'  ";
      						$ssql = mysqli_query($db,$command) ;

							$msg=" Reviewed successfully . ";
							$type="success";

							$_SESSION['c_id']=0;
						}
						header("Location: hr_validation_offer_letter.php?msg=" .$msg. "&type=".$type);
		

 }

 if (isset($_POST['rejected_hr']))
 {
 	$review =$_POST['hr_review'];
						if($review=="")
						{
							$msg="Give a review first. ";
							$type="fail";
						}
						else
						{
			/////////////// email from hr to recuriter ////////////////
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


						
						 $mail->isHTML(true);                                  // Set email format to HTML

						$mail->Subject = 'HR Reviews for'.$result1['full_name'].'  offer letter you generated ';
						$mail->Body    = 'The offer letter have been Rejected from HR, Kindly go through the reviews in portal.';
						$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

						$mail->send();

/////////////////////////////

							$command = "DELETE from hr_offer_letter_validation  WHERE c_id = '$c_id'  ";
      						$ssql = mysqli_query($db,$command) ;

      						$command = "UPDATE review_offer_letter SET hr_confirmed=0 ,hr_review='$review' WHERE c_id = '$c_id'  ";
      						$ssql = mysqli_query($db,$command) ;

							$msg=" Reviewed successfully . ";
							$type="success";

							$_SESSION['c_id']=0;
						}
						header("Location: hr_validation_offer_letter.php?msg=" .$msg. "&type=".$type);
			exit();

 }

?>