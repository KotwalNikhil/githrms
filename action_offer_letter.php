<?php

include('session.php');
$c_id=$_SESSION['c_id'];

  $query =" SELECT * FROM candidate_table WHERE  id='$c_id' ";
       $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
      $result2 = mysqli_fetch_array($ssql,MYSQLI_ASSOC);

      $query =" SELECT * FROM employment_table WHERE  c_id='$c_id' ";
       $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
      $result_fresher = mysqli_fetch_array($ssql,MYSQLI_ASSOC);


$query =" SELECT * FROM e1 WHERE  c_id='$c_id'";
      $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
   	 $rnume1 = $ssql->num_rows;
   	   $e1 = mysqli_fetch_array($ssql,MYSQLI_ASSOC);

$query =" SELECT * FROM review_offer_letter WHERE c_id ='$c_id' ";
      $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
       $result_review = mysqli_fetch_array($ssql,MYSQLI_ASSOC);
		$rnum_review = $ssql->num_rows;

$query =" SELECT * FROM hr_offer_letter_validation WHERE c_id ='$c_id' and r_id='$id' ";
      $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
       $result1 = mysqli_fetch_array($ssql,MYSQLI_ASSOC);
		$num = $ssql->num_rows;

$query =" SELECT * FROM contact_table WHERE fk ='$id' AND c_id ='$c_id'  ";
       $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
      $result_email = mysqli_fetch_array($ssql,MYSQLI_ASSOC);

$query =" SELECT * FROM offer_letter_fresh WHERE c_id ='$c_id' and fk='$id' ";
      $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
       $result_offer = mysqli_fetch_array($ssql,MYSQLI_ASSOC);

//========================  mail content -=============================================



$mail_content= '
            Dear ' .$result2["cand_name"].'  , <br>
This has reference to your application and subsequent interview you had with us. We are pleased to offer you an employment in Vidushi Infotech SSP Pvt. Ltd. – A CMMI Level 3 Company, as '.$result_offer["position"].' in grade '.$result_offer["grade"].' at a salary (CTC) of INR '.$result_offer["salary_inr"]. ' per annum.(Rupees '.$result_offer["salary_rs"].' 
 only) as discussed and agreed upon, subject to deduction of tax at source as per the provision of Income Tax Act of Government of India as may be amended from time to time.<br><br>

A detailed letter of employment containing the terms and conditions of the service and CTC structure would be issued to you on the date of your joining on completion of joining formalities.<br><br>

You are required to carry following original documents for cross verification on date of joining:<br>';

 if($result_fresher["fresher"]=="yes"){  $mail_content.="
1. Copies of educational certificates<br>
2. Copy of Current & Permanent Residential proof.<br>
3. Copy of Aadhaar Card, Passport and Pan card<br><br> ";
}
else
{
   $mail_content.= "
1. Copies of educational certificates.<br>
2. Copy of work experience certificates from all previous employer(s).<br>
3. Copy of Relieving letter from your previous employer(s), if applicable.<br>
4. Last 3-month salary slip of current .<br>
5. Copy of Current & Permanent Residential proof.<br>
6. Copy of Aadhaar Card, Passport and Pan card<br><br>
 ";
}




 $mail_content.="At the time of joining, you are required to submit the following documents to complete joining formalities. Kindly carry original documents for cross verification:<br>";

 if($result_fresher["fresher"]=="yes") { $mail_content.= "
1.  4 Passport size color photos. <br>
2.  2 References of college professors.<br><br> ";}
else
{
   $mail_content.="

1.  Copy of work experience certificates from current employer.<br>
2.  4 Passport size color photos. <br>
3.  Form No. 16 issued by current employer under Income Tax Rules.<br>
4.  References of all previous companies, including current. (HR and Reporting Manager)<br><br>";
}

$mail_content.='Joining Details:<br>
Please report for joining on or before '.$result_offer["joining_date"] .'
, failing to which this offer will automatically get forfeited.<br>
• Office Address: Cerebrum IT Park, B-3 Building, 2nd Floor, Office 3-A, Kalyani Nagar, Pune 411014 <br>
• Reporting Time on Date of Joining: '.$result_offer["joining_time"].' sharp for Induction.<br><br>
HR POC for any assistance before joining Period and for completing Joining formalities: (Recruiter details)<br>
HR Name: '.$result_offer["hr_name"] .'<br>Email: '.$result_offer["email"] .'<br>Contact: '.$result_offer["contact"] .'

<br><br>This offer of employment is conditional on: -<br>
• Sharing your acceptance to the offer on or before '.$result_offer["reply_deadline"].' by '.$result_offer["reply_by"].', failing to which this offer would stand revoke.<br>';

if($result_fresher["fresher"]=="no") {
  $mail_content.='• Sharing resignation e-mail with current employer on or before '.$result_offer["resign_email_deadline"] .' by <strong>11:00am</strong>, failing to which this offer would stand revoke.<br>';
}

$mail_content.='• Submission of all documents listed above in stipulated time.<br>
• The report of references which is satisfactory to us.<br><br>

Please note that this offer is valid subject to your acceptance of the terms and conditions of employment with us and may be withdrawn/modified if any material information furnished by you is found to be incorrect or if any material information is detected by us to have been suppressed by you or any action on your part is found to be in contravention to the terms and conditions of employment or the company code of conduct.<br><br>

We are looking forward to a long lasting and mutually fruitful association with you.<br><br>

<h5>Please Note:</h5>  Your acceptance to the employment offer with Vidushi Infotech SSP Pvt. Ltd.  indicates your undertaking to join company on the mentioned date of joining in offer letter and you understand that the position offered to you with Vidushi Infotech SSP Pvt. Ltd. requires you to join company on the above-mentioned date and you completely understand that, failing to join company may damage company’s business which may result into financial and/or goodwill loss and you would be liable to pay any and all damages caused to the company and its business due to failure to join company for any reasons.<br><br>


Yours faithfully,<br><br>
  Sahil Survase | Head - HR Operations <br>
  Email: hr@vidushiinfotech.com <br>
  Website: <a href="www.vidushiinfotech.com">www.vidushiinfotech.com</a> <br>

  Address: Cerebrum IT Park, B-3 Building, 2nd Floor, Office 3-A, Kalyani Nagar, Pune 411014<br>
  Mobile: 9922972445 | Tel: (+91) 20 41315176 (Extn- 603) <br>';

//==================================================


      if (isset($_POST['offer_save']))
 {
      $position = $_POST['position'];
      $salary_inr = $_POST['salary_inr'];
    $salary_rs = $_POST['salary_rs'];
    $grade = $_POST['grade'];

    $joining_date = date("Y-m-d", strtotime($_POST['joining_date']));
        $reply_deadline = date("Y-m-d", strtotime($_POST['reply_deadline']));
        $resign_email_deadline = date("Y-m-d", strtotime($_POST['resign_email_deadline']));

    
    $hr_name = $_POST['hr_name'];
    $joining_time = $_POST['joining_time'];

    $contact = $_POST['contact'];
     $email = $_POST['email'];
    $reply_by = $_POST['reply_by'];


    $query =" SELECT * FROM offer_letter_fresh WHERE c_id ='$c_id' and fk='$id' ";
      $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
    $offer_letter_fresh_num = $ssql->num_rows;

    if ($offer_letter_fresh_num==1)
       {
          $update = "UPDATE offer_letter_fresh SET position='$position',grade='$grade', salary_inr='$salary_inr',salary_rs='$salary_rs',joining_date='$joining_date',hr_name='$hr_name',email='$email',reply_by='$reply_by',reply_deadline='$reply_deadline',joining_time='$joining_time',contact='$contact',resign_email_deadline='$resign_email_deadline' WHERE c_id ='$c_id' and fk='$id' ";
          $run = mysqli_query($db,$update);

          if($run)
          {
           $msg=" offer letter updated successfully";
              $type="success";
          }
          else
          {
             $msg=" could not update offer letter";
              $type="fail";
          }
       }
       else 
       {
          $insert="INSERT into offer_letter_fresh (fk,c_id,position,grade,salary_inr,salary_rs,joining_date,joining_time,hr_name,email,contact,reply_deadline,reply_by,resign_email_deadline) values ('$id','$c_id','$position','grade',$salary_inr','$salary_rs','$joining_date','$joining_time','$hr_name','$email','$contact','$reply_deadline','$reply_by','$resign_email_deadline') ";
          $run = mysqli_query($db,$insert);

          if($run)
          {
           $msg=" offer letter updated successfully";
              $type="success";
          }
          else
          {
             $msg=" could not update offer letter";
              $type="fail";
          }
       }

        header("Location: generate_offer_letter.php?msg=" .$msg. "&type=".$type);
      exit();
 }

 else   if (isset($_POST['review_hr']))
 {

   if ( $rnum_review=='1' ) 
      {
        
        $update = "UPDATE review_offer_letter SET hr_confirmed=2,offer_letter=2 WHERE c_id = '$c_id' and r_id='$id' ";

        $run = mysqli_query($db,$update);

        

        
      }
      else
      {
          $insert = "INSERT into review_offer_letter (r_id,c_id) values ('$id','$c_id') ";

              $run = mysqli_query($db,$insert);
      }

if($num=='0')
        {
        $insert = "INSERT into hr_offer_letter_validation (r_id,c_id) values ('$id','$c_id') ";

        $run = mysqli_query($db,$insert);
      }

        if($run)
          {

/////////////////////Email to hr//////////
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

            $mail->Subject = 'Candidate '.$e1['full_name'].' Offer letter validation';
            $mail->Body    = 'Recuriter has uploaded the ctc structure and offer letter  for HR validation. Please provide him the reviews from the portal.';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();

/////////////////////////////


            $msg=" Sent for HR validation";
            $type="success";
          }
          else
          {
            $msg="Error in sending ";
          $type="fail";
          }
      header("Location: generate_offer_letter.php?msg=" .$msg. "&type=".$type);
      exit();
 }


 else   if (isset($_POST['send_offer']))
 { 


    /////////////////////Email to cand//////////
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
            $mail->addAddress($result_email["email"]);     //  candidate email id
                        // Name is optional
            $mail->addReplyTo(EMAIL);


            
             $mail->isHTML(true);                                  // Set email format to HTML

            $mail->Subject = 'Hello '.$e1['full_name'].' check your Offer letter ';
            $mail->Body    = $mail_content;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $run=$mail->send();

/////////////////////////////
            if($run)
          {
            $update = "UPDATE review_offer_letter SET offer_letter=1 WHERE c_id = '$c_id' and r_id='$id' ";

             $run = mysqli_query($db,$update);

            $msg=" offer letter sent successfully";
            $type="success";
          }
          else
          {
            $msg="Error in sending,Check Internet connection or verify the candidate email id from contact table. ";
          $type="fail";
          }
      header("Location: generate_offer_letter.php?msg=" .$msg. "&type=".$type);

 }

 else if (isset($_POST['blacklist']))
 { 
 $msg="Complete the blacklist form ";
          $type="success";
          
      header("Location: blacklist_form.php?msg=" .$msg. "&type=".$type);
 }

 else if (isset($_POST['generate_profile']))
 { 
          
      

          /////////////////////Email to hr//////////
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

            $mail->Subject = 'Candidate '.$e1['full_name'].' profile generated';
            $mail->Body    = 'Recuriter has generated the profile successfully kindly do the other steps from the portal.';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

           $run=$mail->send();

/////////////////////////////

             if($run)
          {
            $update = "UPDATE loginform SET authority=4 WHERE special_id = '$c_id'  ";

             $run = mysqli_query($db,$update);

             $msg="Profile has been generated successfully and HR has also been informed ";
          $type="success";
          }
          else
          {
            $msg="Error in Generating, Check Internet connection or try again. ";
          $type="fail";
          }

          
      header("Location: generate_offer_letter.php?msg=" .$msg. "&type=".$type);
 }

  

?>