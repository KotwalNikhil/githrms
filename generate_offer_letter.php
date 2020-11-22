<?php include 'cand_base.php' ;

$c_id=$_SESSION['c_id'];

 $query =" SELECT * FROM candidate_table WHERE r_id ='$id' AND id=".$_SESSION['c_id'];
       $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
      $result2 = mysqli_fetch_array($ssql,MYSQLI_ASSOC);

$query =" SELECT * FROM ctc_table WHERE c_id='$c_id'";
      $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
            $result = mysqli_fetch_array($ssql,MYSQLI_ASSOC);
     $rnum = $ssql->num_rows;

 $query =" SELECT * FROM employment_table WHERE fk ='$id' AND c_id='$c_id' ";
       $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
      $result_fresher = mysqli_fetch_array($ssql,MYSQLI_ASSOC);

      $query =" SELECT * FROM review_offer_letter WHERE c_id ='$c_id' ";
      $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
       $result_review = mysqli_fetch_array($ssql,MYSQLI_ASSOC);
    $rnum_review = $ssql->num_rows;

    $query =" SELECT * FROM offer_letter_fresh WHERE c_id ='$c_id' and fk='$id' ";
      $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
       $result_offer = mysqli_fetch_array($ssql,MYSQLI_ASSOC);

 ?>
<div class="main-content p-t-30 m-t-75">
                <div class="section__content section__content--p20">
                    <div class="container-fluid">
                        <?php if (isset($_GET['msg']))
                        {
                            $type=$_GET['type'];
                            if($type=="success")
                            {
                                echo '<div class="alert alert-success alert-dismissible" id="myalert">';
                                  echo '<span class="close " data-dismiss="alert">&times;</span>';
                                 echo  $_GET['msg'];
                                echo '</div>';
                                
                            }
                            else if($type=="fail")
                            {
                                echo '<div class="alert alert-danger alert-dismissible" id="myalert">';
                                  echo '<span class="close " data-dismiss="alert">&times;</span>';
                                 echo  $_GET['msg'];
                                echo '</div>';
                            }
                        

                         }
?>
<div class="container-fluid">
  <form action="action_offer_letter.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <div class="row">
                        	 <div class="card "  >
                        		<!--------- MAIN content ----------->



<div class="col-lg-12">
 
                               <div class="row">
           <div class="col-lg-12">
            

            <h4 class ="text-center">Selection Application</h4><br>
            <p>Dear <?php echo $result2["cand_name"]; ?> , <br>

This has reference to your application and subsequent interview you had with us. We are pleased to offer you an employment in Vidushi Infotech SSP Pvt. Ltd. – A CMMI Level 3 Company, as <input name="position" type="text" style="width:150px" value="<?php echo $result_offer["position"] ?>" placeholder="" class="form-control"  >in Grade<input name="grade" type="text" style="width:150px" value="<?php echo $result_offer["grade"] ?>" placeholder="" class="form-control"  >
 at a salary (CTC) of INR <input name="salary_inr" type="text" style="width:150px" value="<?php echo $result_offer["salary_inr"] ?>" placeholder="" class="form-control"  >
 per annum(Rupees  <input name="salary_rs" type="text" id="Campus" value="<?php echo $result_offer["salary_rs"] ?>
 " style="width:150px" placeholder="" class="form-control"  >
 only)<br> as discussed and agreed upon, subject to deduction of tax at source as per the provision of Income Tax Act of Government of India as may be amended from time to time.<br>

A detailed letter of employment containing the terms and conditions of the service and CTC structure would be issued to you on the date of your joining on completion of joining formalities.<br><br>

You are required to carry following original documents for cross verification on date of joining:<br>

<?php if($result_fresher["fresher"]=="yes") {echo "
1. Copies of educational certificates<br>
2. Copy of Current & Permanent Residential proof.<br>
3. Copy of Aadhaar Card, Passport and Pan card<br><br> ";}
else
{
  echo "
1. Copies of educational certificates.<br>
2. Copy of work experience certificates from all previous employer(s).<br>
3. Copy of Relieving letter from your previous employer(s), if applicable.<br>
4. Last 3-month salary slip of current .<br>
5. Copy of Current & Permanent Residential proof.<br>
6. Copy of Aadhaar Card, Passport and Pan card<br><br>
 ";
}

?>

At the time of joining, you are required to submit the following documents to complete joining formalities. Kindly carry original documents for cross verification:<br>

<?php if($result_fresher["fresher"]=="yes") {echo "
1.  4 Passport size color photos. <br>
2.  2 References of college professors.<br><br> ";}
else
{
  echo "

1.  Copy of work experience certificates from current employer.
2.  4 Passport size color photos. 
3.  Form No. 16 issued by current employer under Income Tax Rules
4.  References of all previous companies, including current. (HR and Reporting Manager)

 ";
}

?>



Joining Details:<br>
Please report for joining on or before <input name="joining_date" type="date" style="width:200px" value="<?php echo $result_offer["joining_date"] ?>" placeholder="" class="form-control"  >
, failing to which this offer will automatically get forfeited.<br>
• Office Address: Cerebrum IT Park, B-3 Building, 2nd Floor, Office 3-A, Kalyani Nagar, Pune 411014 <br>
• Reporting Time on Date of Joining:<input name="joining_time" type="time" id="" style="width:200px" value="<?php echo $result_offer["joining_time"] ?>" placeholder="" class="form-control"  >
sharp for Induction.<br><br>
HR POC for any assistance before joining Period and for completing Joining formalities: (Recruiter details)<br>

</p><br>




   

                                           
   <div class="col-6">
                                        <div class="form-group">
                                            <label for="campus" class=" form-control-label">HR Name  </label>
                                            <input name="hr_name" type="text" id="Campus" value="<?php echo $result_offer["hr_name"] ?>" placeholder="" class="form-control"  >
                                        </div>
                                        <div class="form-group">
                                            <label for="campus" class=" form-control-label">Email  </label>
                                            <input name="email" type="text" id="Campus" value="<?php echo $result_offer["email"] ?>" placeholder="" class="form-control"  >
                                        </div>
                                        <div class="form-group">
                                            <label for="campus" class=" form-control-label">Contact Number  </label>
                                            <input name="contact" type="text" id="Campus" value="<?php echo $result_offer["contact"] ?>" placeholder="" class="form-control"  >
                                        </div>
                                        

   
  </div>

<p>
This offer of employment is conditional on: -<br>
• Sharing your acceptance to the offer on or before<input name="reply_deadline" type="date" id="" style="width:200px" value="<?php echo $result_offer["reply_deadline"] ?>" placeholder="" class="form-control"  >by <input name="reply_by" type="text" id="" style="width:200px" value="<?php echo $result_offer["reply_by"] ?>" placeholder="" class="form-control"  >, failing to which this offer would stand revoke.<br>
<?php if($result_fresher["fresher"]=="no") { ?>
• Sharing resignation e-mail with current employer on or before <input name="resign_email_deadline" type="date" id="" style="width:200px" value="<?php echo $result_offer["resign_email_deadline"] ?>" placeholder="" class="form-control"  > by <strong>11:00am</strong>, failing to which this offer would stand revoke.<br>

<?php } ?>

• Submission of all documents listed above in stipulated time.<br>
• The report of references which is satisfactory to us.<br><br>

Please note that this offer is valid subject to your acceptance of the terms and conditions of employment with us and may be withdrawn/modified if any material information furnished by you is found to be incorrect or if any material information is detected by us to have been suppressed by you or any action on your part is found to be in contravention to the terms and conditions of employment or the company code of conduct.<br>

We are looking forward to a long lasting and mutually fruitful association with you.<br><br>

<h5>Please Note:</h5>  Your acceptance to the employment offer with Vidushi Infotech SSP Pvt. Ltd.  indicates your undertaking to join company on the mentioned date of joining in offer letter and you understand that the position offered to you with Vidushi Infotech SSP Pvt. Ltd. requires you to join company on the above-mentioned date and you completely understand that, failing to join company may damage company’s business which may result into financial and/or goodwill loss and you would be liable to pay any and all damages caused to the company and its business due to failure to join company for any reasons.<br><br>


Yours faithfully,<br><br>
  Sahil Survase | Head - HR Operations <br>
  Email: hr@vidushiinfotech.com <br>
  Website: <a href="www.vidushiinfotech.com">www.vidushiinfotech.com</a> <br>

  Address: Cerebrum IT Park, B-3 Building, 2nd Floor, Office 3-A, Kalyani Nagar, Pune 411014<br>
  Mobile: 9922972445 | Tel: (+91) 20 41315176 (Extn- 603) <br>
        



</p>


    </div>
  </div>
          <!-- address details ended  --> </div>


                        		<!--------- MAIN content ----------->

                        	
                        </div>
                          <!-----HR review section ----->
                                    <?php if($rnum_review==1 and ($result_review['hr_confirmed']==1 or $result_review['hr_confirmed']==0)){ echo'
  <div >
  <h4>Reviews from HR</h4>
  <ul class="list-group">';
if($result_review["hr_confirmed"]==1)
{
echo "Accepted by the HR";
}
else if($result_review["hr_confirmed"]==0)
{
  echo "Rejected by the HR,Please follow up on the review ";
}


  echo '<li class="list-group-item list-group-item-info"> '.$result_review["hr_review"] .'</li>';
}
?>

 <!-----HR review section ----->
                           <div class="card-footer">
                                            <div class="col-12">
                                                
                                            </div>
                                        <button type="submit" name="offer_save" class="btn btn-success btn-sm" >
                                            <i class="fa fa-dot-circle-o"></i> Save
                                        </button>
                                        <button type="submit" name="review_hr" class="btn btn-primary btn-sm" >
                                            <i class="fa fa-dot-circle-o"></i>  send for HR validation 
                                        </button>
                                        <?php if($rnum_review==1 and $result_review['hr_confirmed']==1 and $result_review['offer_letter']==2)
                                        {

                                          ?>
                                        <button type="submit" name="send_offer" class="btn btn-warning btn-sm" >
                                            <i class="fa fa-dot-circle-o"></i>  send the offer letter to candidate
                                        </button>

                                        <?php 
                                      }
                                      ?>
                                       <?php if($rnum_review==1 and $result_review['hr_confirmed']==1 and $result_review['offer_letter']==1)
                                        {

                                          ?>
                                        <button disabled title="Verify from HR before sending again"  class="btn btn-success btn-sm" >
                                            <i class="fa fa-dot-circle-o"></i> offer letter sent already
                                        </button>

                                        <?php 
                                      }
                                      ?>
                                        <p style="color:red;">Always save after making any changes.<br>Before sending offer letter again it should be verified by HR.</p>
                                        <br><br>
                                          <?php if($rnum_review==1 and $result_review['offer_letter']==1)
                                        {

                                          ?>
                                        <button type="submit" name="generate_profile" class="btn btn-info btn-sm" >
                                              Generate profile 
                                        </button>
                                         <button type="submit" name="blacklist" class="btn btn-danger btn-sm" >
                                              Blacklist Candidate 
                                        </button>

                                        <?php 
                                      }
                                      ?>
                                        
                                    </div>
                                  </form>
            </div>

<!--------------------------------------->


        </div>
    </div>
</div>
