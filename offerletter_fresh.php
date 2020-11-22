<?php include 'index2_base.php' ;

$query =" SELECT * FROM e1 WHERE fk ='$id' AND c_id='$special_id'";
       $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
      $e1 = mysqli_fetch_array($ssql,MYSQLI_ASSOC);

$query =" SELECT * FROM e2 WHERE fk ='$id' AND c_id='$special_id'";
       $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
      $e2 = mysqli_fetch_array($ssql,MYSQLI_ASSOC);

$query =" SELECT * FROM e3 WHERE fk ='$id' AND c_id='$special_id'";
       $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
      $e3 = mysqli_fetch_array($ssql,MYSQLI_ASSOC);

$query =" SELECT * FROM e4 WHERE fk ='$id' AND c_id='$special_id'";
       $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
      $e4 = mysqli_fetch_array($ssql,MYSQLI_ASSOC);

$query =" SELECT * FROM e5 WHERE fk ='$id' AND c_id='$special_id'";
       $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
      $e5 = mysqli_fetch_array($ssql,MYSQLI_ASSOC);

$query =" SELECT * FROM e6 WHERE fk ='$id' AND c_id='$special_id'";
       $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
      $e6 = mysqli_fetch_array($ssql,MYSQLI_ASSOC);

$query =" SELECT * FROM e7 WHERE fk ='$id' AND c_id='$special_id'";
       $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
      $e7 = mysqli_fetch_array($ssql,MYSQLI_ASSOC);

$query =" SELECT * FROM e8 WHERE fk ='$id' AND c_id='$special_id'";
       $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
      $e8 = mysqli_fetch_array($ssql,MYSQLI_ASSOC);

$query =" SELECT * FROM e9 WHERE fk ='$id' AND c_id='$special_id'";
       $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
      $e9 = mysqli_fetch_array($ssql,MYSQLI_ASSOC);

$query =" SELECT * FROM e10 WHERE fk ='$id' AND c_id='$special_id'";
       $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
      $e10 = mysqli_fetch_array($ssql,MYSQLI_ASSOC);





?>



<div class="main-content ">
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
            <!-- MAIN CONTENT-->
            <div class="row">
           <div class="col-lg-12">

           	<h4 class ="text-center">Selection Application</h4><br>
            <p><h5>Dear XYZ, <br>

This has reference to your application and subsequent interview you had with us. We are pleased to offer you an employment in Vidushi Infotech SSP Pvt. Ltd. – A CMMI Level 3 Company, as   __________ at a salary (CTC) of INR ________/- per annum (Rupees______ only) as discussed and agreed upon, subject to deduction of tax at source as per the provision of Income Tax Act of Government of India as may be amended from time to time.<br>

A detailed letter of employment containing the terms and conditions of the service and CTC structure would be issued to you on the date of your joining on completion of joining formalities.<br>

You are required to carry following original documents for cross verification on date of joining:<br><br>

1.  Copies of educational certificates<br>
2.  Copy of Current & Permanent Residential proof.<br>
3.  Copy of Aadhaar Card, Passport and Pan card<br>

At the time of joining, you are required to submit the following documents to complete joining formalities. Kindly carry original documents for cross verification:<br>

1.  4 Passport size color photos. <br>
2.  2 References of college professors.<br>

Joining Details:<br>
Please report for joining on or before _________, failing to which this offer will automatically get forfeited.<br>
• Office Address: Cerebrum IT Park, B-3 Building, 2nd Floor, Office 3-A, Kalyani Nagar, Pune 411014 <br>
• Reporting Time on Date of Joining: ___ sharp for Induction.<br>
HR POC for any assistance before joining Period and for completing Joining formalities: (Recruiter details)<br></h5>

</p><br>
</div>
<div class="col-lg-12">

<div class="card " id="emp-info" >
   
<div class="row form-group">
                                           
   <div class="col-6">
                                        <div class="form-group">
                                            <label for="campus" class=" form-control-label">HR Name  </label>
                                            <input name="pos1" type="text" id="Campus" value="<?php echo $e1['pos1']; ?>" placeholder="" class="form-control"  >
                                        </div>
                                        <div class="form-group">
                                            <label for="campus" class=" form-control-label">Email  </label>
                                            <input name="pos1" type="text" id="Campus" value="<?php echo $e1['pos1']; ?>" placeholder="" class="form-control"  >
                                        </div>
                                        <div class="form-group">
                                            <label for="campus" class=" form-control-label">Contact Number  </label>
                                            <input name="pos1" type="text" id="Campus" value="<?php echo $e1['pos1']; ?>" placeholder="" class="form-control"  >
                                        </div>
                                        

    </div>
  </div>
</div>
<p><h5>
This offer of employment is conditional on: -<br>
• Sharing your acceptance to the offer on or before ___day, ______ 2019 by ____, failing to which this offer would stand revoke.<br>
• Submission of all documents listed above in stipulated time.<br>
• The report of references which is satisfactory to us.<br>

Please note that this offer is valid subject to your acceptance of the terms and conditions of employment with us and may be withdrawn/modified if any material information furnished by you is found to be incorrect or if any material information is detected by us to have been suppressed by you or any action on your part is found to be in contravention to the terms and conditions of employment or the company code of conduct.<br>

We are looking forward to a long lasting and mutually fruitful association with you.<br><br>

Please Note:  Your acceptance to the employment offer with Vidushi Infotech SSP Pvt. Ltd.  indicates your undertaking to join company on the mentioned date of joining in offer letter and you understand that the position offered to you with Vidushi Infotech SSP Pvt. Ltd. requires you to join company on the above-mentioned date and you completely understand that, failing to join company may damage company’s business which may result into financial and/or goodwill loss and you would be liable to pay any and all damages caused to the company and its business due to failure to join company for any reasons.<br><br>


Yours faithfully,<br><br>
  Sahil Survase | Head - HR Operations <br>
  Email: hr@vidushiinfotech.com   Website: www.vidushiinfotech.com <br>

  Address: Cerebrum IT Park, B-3 Building, 2nd Floor, Office 3-A, Kalyani Nagar, Pune 411014<br>
  Mobile: 9922972445 | Tel: (+91) 20 41315176 (Extn- 603) <br>
        


</h5>
</p>
</div>

    </div>