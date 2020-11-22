<?php

include('session.php');

$c_id=$_SESSION['c_id'];


$query =" SELECT * FROM 3interview_detail WHERE fk ='$id' AND c_id=".$_SESSION['c_id'];
      $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
   	 $rnum = $ssql->num_rows;


if (isset($_POST['call_letter'])) 
 {

//for fetching the recieptient mail
 	 $query =" SELECT * FROM contact_table WHERE fk ='$id' AND c_id=".$_SESSION['c_id'];
       $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
      $i4 = mysqli_fetch_array($ssql,MYSQLI_ASSOC);

// fetching the mail data
      	$date1 = date("Y-m-d", strtotime($_POST['1date']));
							$time1 = $_POST['1time'];
							$type_interview1 = $_POST['1type_interview'];
							$attach_jd1 =isset( $_POST['1attach_jd']) ?$_POST['1attach_jd'] : 'no' ;
							$type_jd1 = $_POST['1type_jd'];
							$interviwer_name1 = $_POST['1interviwer_name'];
							$venue=$_POST['venue'];

      //for sending mail
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

		$mail->setFrom(EMAIL, 'Vidushi Infotech Pvt ltd. ');
		$mail->addAddress($i4['email']);     // Add a recipient
		            // Name is optional
		$mail->addReplyTo(EMAIL);


		$mail->addAttachment('images/icon/logo-blue.png');         // Add attachments
		//$mail->addAttachment('tmp/image.jpg', 'new.jpg');    // Optional name
		$mail->isHTML(true);                                  // Set email format to HTML

		$mail->Subject = 'Interview call letter ';
		$mail->Body    = 'date on <b>'. $date1 .'</b> at <b>' .$time1. '</b> for a ' .$type_interview1.' interview ';
		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
		
		if($mail->send())
		 {
			$msg="Call Letter has been sent successfully";
					$type="success";
		  
							if($rnum==1)$run = "UPDATE 3interview_detail SET 1date='$date1', 1time='$time1', 1type_interview='$type_interview1' ,1attach_jd='$attach_jd1', 1type_jd='$type_jd1', 1interviwer_name='$interviwer_name1', call_letter='yes',venue='$venue' WHERE fk = '$id' AND c_id=".$_SESSION['c_id'];
						 else
						 {
						 $run="INSERT Into 3interview_detail (fk,c_id,1date,1time,1type_interview,1attach_jd,1type_jd,call_letter,1interviwer_name,venue) values('$id','$c_id','$date1','$time1','$type_interview1','$attach_jd1','$type_jd1','yes','$interviwer_name1','$venue' )";
						 	}

					$result=mysqli_query($db,$run);
		} 
		else
		 {
				
 					$msg="Call Letter could not be  sent ";
					$type="fail";

						  if($rnum==1)$run = "UPDATE 3interview_detail SET 1date='$date1', 1time='$time1', 1type_interview='$type_interview1' ,1attach_jd='$attach_jd1', 1type_jd='$type_jd1', 1interviwer_name='$interviwer_name1', call_letter='no',venue='$venue' WHERE fk = '$id' AND c_id=".$_SESSION['c_id'];
						 else
						 {
						 	$run="INSERT Into 3interview_detail (fk,c_id,1date,1time,1type_interview,1attach_jd,1type_jd,call_letter,1interviwer_name,venue) values('$id','$c_id','$date1','$time1','$type_interview1','$attach_jd1','$type_jd1','no','$interviwer_name1','$venue' )";
						 	}
			 $result=mysqli_query($db,$run);

		}
		//}


echo "<script>window.location.assign('interviewschedule_form.php?msg=$msg &type=$type')</script>";
exit();

 }
$date1 = date("Y-m-d", strtotime($_POST['1date']));
$time1 = $_POST['1time'];
$type_interview1 = $_POST['1type_interview'];
$venue=$_POST['venue'];

$attach_jd1 =isset( $_POST['1attach_jd']) ?$_POST['1attach_jd'] : 'no' ;
$type_jd1 = $_POST['1type_jd'];
$appeared_interview1 =isset( $_POST['1appeared_interview']) ?$_POST['1appeared_interview'] : ' ' ;
$shortlisted1 = isset( $_POST['1shortlisted']) ?$_POST['1shortlisted'] : ' ' ;
$interviwer_name1 = $_POST['1interviwer_name'];
$mark_final_round1 = isset( $_POST['1mark_final_round']) ?$_POST['1mark_final_round'] : 'no' ;
$next_round1 = isset( $_POST['1next_round']) ?$_POST['1next_round'] : 'no' ;
$rejection_reason1 = isset( $_POST['1rejection_reason']) ?$_POST['1rejection_reason'] : ' ' ;
$cooling_period1 = isset( $_POST['1cooling_period']) ?$_POST['1cooling_period'] : 'no' ;
$blacklist1 = isset( $_POST['1blacklist']) ?$_POST['1blacklist'] : 'no' ;
$reason_non_appearance1 = isset($_POST['1reason_non_appearance']) ? $_POST['1reason_non_appearance'] : ' ';




 
 if ($rnum==1)
 {
 	$update = "UPDATE 3interview_detail SET 1date='$date1', 1time='$time1', 1type_interview='$type_interview1' ,1attach_jd='$attach_jd1', 1type_jd='$type_jd1', 1appeared_interview='$appeared_interview1', 1shortlisted='$shortlisted1', 1interviwer_name='$interviwer_name1', 1mark_final_round='$mark_final_round1', 1next_round='$next_round1', 1rejection_reason='$rejection_reason1', 1cooling_period='$cooling_period1', 1blacklist='$blacklist1', 1reason_non_appearance='$reason_non_appearance1',venue='$venue' WHERE fk = '$id' AND c_id=".$_SESSION['c_id'];

	$run = mysqli_query($db,$update);
      if($run)
	      {
 			$msg= " Your record has been successfully edited and updated.";
	      	 $type="success";
	   	  }
	   else
		   {
		   	 $msg=" Error in updating  interview 2 details .Check again";
		      $type="fail";
		   }

      header("Location: interviewschedule_form.php?msg=" .$msg. "&type=".$type);

}

 else
 {

 	

      $INSERT = "INSERT Into 3interview_detail (fk,c_id,1date, 1time,1type_interview,venue,1attach_jd, 1type_jd ,1appeared_interview, 1shortlisted,1interviwer_name,1mark_final_round,1next_round,1rejection_reason,1cooling_period,1blacklist,1reason_non_appearance) values(?,?,?, ?, ?, ?, ?, ?,? ,?,?, ?, ?, ?, ? ,?,?)";

	  $stmt = $db->prepare($INSERT);
      $stmt->bind_param("iisssssssssssssss",$id,$c_id,$date1,$time1,$type_interview1,$venue,$attach_jd1,$type_jd1,$appeared_interview1,$shortlisted1,$interviwer_name1,$mark_final_round1,$next_round1,$rejection_reason1,$cooling_period1,$blacklist,$reason_non_appearance1);
      $stmt->execute();
      if($stmt)
	      {
 			$msg= " Your record for 3rd interview has been successfully updated.";
	      	 $type="success";
	   	  }
	   else
		   {
		   	 $msg=" Error in updating in 2nd interview .Check again";
		      $type="fail";
		   }

		

      header("Location: interviewschedule_form.php?msg=" .$msg. "&type=".$type);


	 $stmt->close();
}

?>