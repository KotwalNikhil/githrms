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

<script src="jquery-1.4.1.min.js"></script>
<script>
function add_more(){
    var box_count=jQuery("#box_count").val();
    box_count++;
    jQuery("#box_count").val(box_count);
    jQuery("#wrap").append('<div class="my_box" id="box_loop_'+box_count+'"><div class="field_box"><input type="textbox" name="name[]" id="name" required="true" class="form-control"></div><div class="button_box"><input type="button" name="submit" id="submit" value="Remove" onclick=remove_more("'+box_count+'") class="btn btn-success btn-sm"></div></div>');
}

function remove_more(box_count){
    jQuery("#box_loop_"+box_count).remove();
    var box_count=jQuery("#box_count").val();
    box_count--;
    jQuery("#box_count").val(box_count);
}



function add_more1(){
    var box_count1=jQuery("#box_count1").val();
    box_count1++;
    jQuery("#box_count1").val(box_count1);
    jQuery("#wrapp").append('<div class="my_box1" id="box_loop1_'+box_count1+'"><div class="field_box1"><div class="row form-group"> <div class="col-6"> <div class="form-group"> <label for="city" class=" form-control-label">Most Recent Employer Name</label> <input name="employer_name[]" type="text" id="city" class="form-control" > </div> </div> <div class="col-3"> <div class="form-group"> <label for="city" class=" form-control-label">From Date</label> <input name="from_date[]" type="date" id="city" class="form-control" > </div> </div> <div class="col-3"> <div class="form-group"> <label for="city" class=" form-control-label">To Date</label> <input name="to_date[]" type="date" id="city" class="form-control" > </div> </div> </div> <div class="row form-group"> <div class="col-12"> <div class="form-group"> <label for="city" class=" form-control-label">Company Address</label> <input name="company_address[]" type="text" id="city" class="form-control" > <small>Complete Address with Pin code</small> </div> </div> </div> <div class="row"> <div class="col-lg-12"> <h6>Supervisor / Reporting Manager Details</h6> </div> <div class="col-lg-3"> <div class="form-group"> <label for="city" class=" form-control-label">Supervisor Name </label> <input name="supervisor_name[]" type="text" id="city" class="form-control" required> </div> </div> <div class="col-lg-3"> <div class="form-group"> <label for="city" class=" form-control-label">Mobile/Phone </label> <input name="supervisor_phone[]" type="text" id="city" class="form-control" required> </div> </div> <div class="col-lg-3"> <div class="form-group"> <label for="city" class=" form-control-label">Official e-Mail</label> <input name="supervisor_email[]" type="text" id="city" class="form-control" required> </div> </div> </div> <div class="row"> <div class="col-lg-12"> <h6>HR Details</h6> </div> <div class="col-lg-3"> <div class="form-group"> <label for="city" class=" form-control-label">HR Name </label> <input name="hr_name[]" type="text" id="city" class="form-control" required> </div> </div> <div class="col-lg-3"> <div class="form-group"> <label for="city" class=" form-control-label">Mobile/Phone </label> <input name="hr_mobile[]" type="text" id="city" class="form-control" required> </div> </div> <div class="col-lg-3"> <div class="form-group"> <label for="city" class=" form-control-label">Official e-Mail</label> <input name="hr_email[]" type="text" id="city" class="form-control" required> </div> </div> </div> <div class="row"> <div class="col-lg-12"> <h6>Job title</h6> </div> <div class="col-lg-6"> <div class="form-group"> <label for="city" class=" form-control-label">Last CTC Drawn per Annum </label> <input name="last_ctc[]" type="text" id="city" class="form-control" required> </div> </div> <div class="col-lg-6"> <div class="form-group"> <label for="city" class=" form-control-label">Reason for Leaving: </label> <input name="reason_for_leaving[]" type="text" id="city" class="form-control" > </div> </div> </div></div><div class="button_box1"><input type="button" name="submit" id="submit" value="Remove" onclick=remove_more1("'+box_count1+'") class="btn btn-success btn-sm"></div></div>'); }

function remove_more1(box_count1){
    jQuery("#box_loop1_"+box_count1).remove();
    var box_count1=jQuery("#box_count1").val();
    box_count1--;
    jQuery("#box_count1").val(box_count1);
}
</script>

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

           	<h4 class ="text-center">APPLICATION FOR EMPLOYMENT</h4><br>
            <p><h5>Non-Discrimination Policy: Vidushi Infotech SSP Pvt. Ltd. (VIT)</h5> and Affiliates is committed to the principle of equal opportunity in employment.  We do not discriminate on the basis of sex, race, color, creed, national origin, age, religion, sexual orientation, gender identity, gender expression, veteran status, or disability. We offer employment purely on merit.<br><br>
<h5>General Instructions:</h5>
1.  All Fields are Mandatory. Use BLOCK LETTERS, wherever required.<br>
2.  Mention NA for NOT APPLICABLE fields.<br>
3.  Complete this form diligently without skipping any information. <br>
</p><br>
</div>
<div class="col-lg-12">

<div class="card " id="emp-info" >
   <form action="inserte.php" method="post" enctype="multipart/form-data" class="form-horizontal">
<div class="row form-group">
                                           
   <div class="col-6">
                                        <div class="form-group">
                                            <label for="campus" class=" form-control-label">Position(s) Applied For<br>1.  </label>
                                            <input name="pos1" type="text" id="Campus" value="<?php echo $e1['pos1']; ?>" placeholder="" class="form-control" required >
                                        </div>
                                        </div>
                                        <div class="col-6">
                                        <div class="form-group">
                                            <label for="campus" class=" form-control-label">Photograph  </label>
                                            <input name="photo" type="file" id="Campus" value="fileupload" placeholder="" class="form-control" required >
                                            <small class="form-text text-muted"> Passport Size Photo, Not Older than 3 months</small>

                                        </div>
                                        </div>
                                        
                                        
                                            <div class="col-6">
                                                <div class="form-group">
                                                  <label for="campus" class=" form-control-label">2.</label>

                                                    <input name="pos2" type="text" id="Others" value="<?php echo $e1['pos2']; ?>" placeholder="" class="form-control"  >
                                                </div>
                                            </div>
</div>
                                            <div class="row">
                                              <div class="col-lg-4">
                                                <div class="form-group">
                                                <label  class=" form-control-label">Have you ever filed an application here before?   </label>
                                              </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group m-t-10">
                                                  
         <input type="radio"  <?php if($e1['before_applied']=="yes")echo'checked="true"'; ?>  for="selectSm" id="before_applied" name="before_applied" class="form-control-label" value="yes" onclick="" ><label for="JD">Yes</label><br>

         <input type="radio"  <?php if($e1['before_applied']=="no")echo'checked="true"'; ?>  for="selectSm" id="before_applied" name="before_applied" class=" form-control-label" value="no" onclick="" ><label for="JD">No</label><br>

                                                </div>
                                              </div>
                                              <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Date (If Yes)</label>
                                                    <input name="date_on_applied" type="date" id="Others" value="<?php echo $e1['date_on_applied']; ?>" placeholder="" class="form-control"  >
                                                </div>
                                            </div>
                                            </div>
                                              <div class="row">
                                              <div class="col-lg-4">
                                                <div class="form-group">
                                                <label  class=" form-control-label">Have you ever been employed here before?</label>
                                              </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group m-t-10">
                                                  
         <input type="radio" <?php if($e1['before_employed']=="yes")echo'checked="true"'; ?>  for="selectSm" id="before_employed" name="before_employed" class="form-control-label" value="yes" onclick="" ><label for="JD">Yes</label><br>

         <input type="radio" <?php if($e1['before_employed']=="no")echo'checked="true"'; ?>  for="selectSm" id="before_employed" name="before_employed" class=" form-control-label" value="no" onclick="" ><label for="JD">No</label><br>

                                                </div>
                                              </div>
                                              <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Date (If Yes)</label>
                                                    <input name="date_on_employed" type="date" id="Others" value="<?php echo $e1['date_on_employed']; ?>" placeholder="" class="form-control"  >
                                                </div>
                                            </div>
                                            </div>
                                            <div class="row">

                                            <!-- 

                                             <div class="col-6 col-md-6">
                                              <div class="form-group">
                                              <p>How were you referred to us?</p>
                                                    <select name="how_referred" id="SelectLm" class="form-control-sm form-control" onchange="" required>
                    <option  hidden value="">Please select</option>
                    <option  value="Consultant">Consultant</option>
                            <option  value="Campus">Campus</option>
                            <option  value="Naukri.com">Naukri.com</option>
                            <option  value="Newspaper Ad">Newspaper Ad</option>
                             <option  value="Monster">Monster</option>
                             <option  value="Twitter">Twitter</option>
                             <option  value="Television">Television</option>
                              <option  value="E-mail campaign">E-mail campaign</option>
                              <option  value="VIT carrer website">VIT carrer website</option>
                             <option  value="Direct call from VIT">Direct call from VIT</option>

                            <option  value="Times Jobs">Times Jobs</option>
                            <option  value="Indeed">Indeed</option>
                            <option  value="LinkedIn">LinkedIn</option>
                         <option  value="Facebook">Facebook</option>
                         <option  value="Google">Google</option>
                         <option  value="Employee referral">Employee referral</option>
                         <option  value="Walk in">Walk in</option>
                          <option  value="Campus recruitment">Campus recruitment</option>
                                                      <option  value="Others">Others</option>


                        
                                                    </select>
                                                  </div>
                                                </div> -->

<div class="col-12">
  <p>How were you referred to us?</p><br>
</div>
 <div class="col-3 col-md-3">
  
                                              <div class="form-group">
                                                <input name="how_referred" <?php if($e1['how_referred']=="Consultant")echo'checked="true"'; ?> type="radio" id="city" value="Consultant"class="form-control-checkbox">
                                   <label for="how_referred" class=" form-control-label">Consultant
 </label>
<br>
                         <input name="how_referred" <?php if($e1['how_referred']=="Campus")echo'checked="true"'; ?> type="radio" id="city" value="Campus"class="form-control-checkbox">
                         <label for="how_referred" class=" form-control-label">Campus
                         </label>

<br>

<input name="how_referred" <?php if($e1['how_referred']=="Naukri.com")echo'checked="true"'; ?> type="radio" id="city" value="Naukri.com"class="form-control-checkbox">
                         <label for="how_referred" class=" form-control-label">Naukri.com
                         </label>
<br>

 <input name="how_referred" <?php if($e1['how_referred']=="Newspaper")echo'checked="true"'; ?> type="radio" id="city" value="Newspaper"class="form-control-checkbox">
                         <label for="how_referred" class=" form-control-label">Newspaper Ad
                        </label>
<br>

<input name="how_referred" <?php if($e1['how_referred']=="Monster")echo'checked="true"'; ?> type="radio" id="city" value="Monster"class="form-control-checkbox">

                         <label for="how_referred" class=" form-control-label">Monster
                         </label>

                            
                                              </div>
                                            </div>

                                            <div class="col-3 col-md-3">
                                              <div class="form-group">

                                                <input name="how_referred" <?php if($e1['how_referred']=="Twitter")echo'checked="true"'; ?> type="radio" id="city" value="Twitter"class="form-control-checkbox">
                                                <label for="how_referred" class=" form-control-label">Twitter
                         </label>
<br>

<input name="how_referred" <?php if($e1['how_referred']=="Television")echo'checked="true"'; ?> type="radio" id="city" value="Television" class="form-control-checkbox">
                         <label for="how_referred" class=" form-control-label">Television
                         </label>
<br>


<input name="how_referred" <?php if($e1['how_referred']=="E-mail")echo'checked="true"'; ?> type="radio" id="city" value="E-mail"class="form-control-checkbox">
                         <label for="how_referred" class=" form-control-label">E-mail campaign
                         </label>
<br>

 <input name="how_referred" <?php if($e1['how_referred']=="VIT_carrer_website")echo'checked="true"'; ?> type="radio" id="city" value="VIT_carrer_website"class="form-control-checkbox">
                         <label for="how_referred" class=" form-control-label">VIT carrer website
                        </label>

<br>

<input name="how_referred" <?php if($e1['how_referred']=="Direct")echo'checked="true"'; ?> type="radio" id="city" value="Direct"class="form-control-checkbox">
                         <label for="how_referred" class=" form-control-label">Direct call from VIT
                         </label>

                         
                                              </div>
                                            </div>

<div class="col-3 col-md-3">
                                              <div class="form-group">

                                                <input name="how_referred" <?php if($e1['how_referred']=="Times")echo'checked="true"'; ?> type="radio" id="city" value="Times"class="form-control-checkbox">
                                                <label for="how_referred" class=" form-control-label">Times Jobs
                         </label>
<br>

<input name="how_referred" <?php if($e1['how_referred']=="Indeed")echo'checked="true"'; ?> type="radio" id="city" value="Indeed"class="form-control-checkbox">
                         <label for="how_referred" class=" form-control-label">Indeed
                         </label>
<br>

<input name="how_referred" <?php if($e1['how_referred']=="LinkedIn")echo'checked="true"'; ?> type="radio" id="city" value="LinkedIn" class="form-control-checkbox">
                         <label for="how_referred" class=" form-control-label">LinkedIn
                         </label>

<br>

<input name="how_referred" <?php if($e1['how_referred']=="Facebook")echo'checked="true"'; ?> type="radio" id="city" value="Facebook" class="form-control-checkbox">
                         <label for="how_referred" class=" form-control-label">Facebook
                         </label>
<br>

<input name="how_referred" <?php if($e1['how_referred']=="Google")echo'checked="true"'; ?> type="radio" id="city" value="Google"class="form-control-checkbox">
                         <label for="how_referred" class=" form-control-label">Google
                         </label>

                         
                                              </div>
                                            </div>


<div class="col-3 col-md-3">
                                              <div class="form-group">

                                                <input name="how_referred" <?php if($e1['how_referred']=="Campus")echo'checked="true"'; ?> type="radio" id="city" value="Campus"class="form-control-checkbox">
                                               <label for="how_referred" class=" form-control-label">Campus recruitment
                         </label>
<br>

<input name="how_referred" <?php if($e1['how_referred']=="Walk_in")echo'checked="true"'; ?> type="radio" id="city" value="Walk_in"class="form-control-checkbox">
                         <label for="how_referred" class=" form-control-label">Walk in
                         </label>
<br>

<input name="how_referred" <?php if($e1['how_referred']=="Employee_referral")echo'checked="true"'; ?> type="radio" id="city" value="Employee_referral"class="form-control-radio">
                         <label for="how_referred" class=" form-control-label">Employee referral
                         </label>
                                              </div>
                                            </div>

                                              </div>
                                            </div>
                                          </div>

                                          <div class="col-lg-12">
                                <div class="card " id="emp-info" >
                                   <div class="card-header">
                                        <strong>GENERAL INFORMATION</strong> 
                                    </div>
                                    <div class="card-body card-block">
                                       
                                           
                                            <div class="row form-group">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Full Name</label>
                                            <input name="full_name" type="text" id="city" value="<?php echo $e1['full_name']; ?>"class="form-control" required>
                                                </div>
                                            </div>
                                           
                                        </div>
                                          <div class="row">
                                               <div class="col-4">
                                         <div class="form-group m-t-10">
                                 <label for="selectSm" class=" form-control-label">Gender </label>

                     <select name="gender" id="shortlisted" class="form-control-sm form-control" onchange="active_radio_button(this.value)"  >
                    <option hidden id="default2" value="no">select option </option>
                            <option <?php if($e1['gender']=="MALE")echo'selected="true"'; ?> value="MALE">MALE</option>
                             <option <?php if($e1['gender']=="FEMALE")echo'selected="true"'; ?> value="FEMALE">FEMALE</option>
                             <option <?php if($e1['gender']=="Transgender")echo'selected="true"'; ?> value="Transgender">Transgender</option>

                                               
                                            </select>
                                    </div>
                                </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Date Of birth
                                                    </label>
                                                    <input name="dob" type="date" id="Others" value="<?php echo $e1['dob']; ?>" placeholder="" class="form-control"  >
                                                </div>
                                              </div>
                                              <div class="col-4">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Age</label>
                                            <input name="age" type="number" id="city" min="19" value="<?php echo $e1['age']; ?>"class="form-control" required>
                                            <small>should be greater then 18 yrs</small>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="row">
                                               <div class="col-4">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Nationality</label>
                                            <input name="nationality" type="text" id="city" value="<?php echo $e1['nationality']; ?>"class="form-control" required>
                                                </div>
                                        
                                </div>
                                            <div class="col-lg-4">
                                                 <div class="form-group m-t-10">
                                 <label for="selectSm" class=" form-control-label">Marital Status </label>

                     <select name="marital_status" id="shortlisted" class="form-control-sm form-control" onchange="active_radio_button(this.value)"  >
                    <option hidden id="default2" value="no">select option </option>
                            <option <?php if($e1['marital_status']=="Single")echo'selected="true"'; ?>  value="Single">Single</option>
                             <option <?php if($e1['marital_status']=="Married")echo'selected="true"'; ?> value="Married">Married</option>
                             

                                               
                                            </select>
                                    </div>
                                              </div>
                                              <div class="col-4">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Blood Group</label>
                                            <input name="bg" type="text" id="city" value="<?php echo $e1['bg']; ?>"class="form-control" required>
                                                </div>
                                            </div>
                                            </div>


                                            <div class="row">
                                               <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Adhar Card Number</label>
                                            <input name="aadhar" type="text" id="city" value="<?php echo $e1['aadhar']; ?>"class="form-control" required>
                                                </div>
                                              </div>
                                            <div class="col-lg-4">
                                                  <div class="form-group">
                                                    <label for="city" class=" form-control-label">Pan Card Number</label>
                                            <input name="pancard" type="text" id="city" value="<?php echo $e1['pancard']; ?>"class="form-control" required>
                                                </div>
                                              </div>
                                              <div class="col-4">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">*Passport Number</label>
                                            <input name="passport" type="text" id="city" value="<?php echo $e1['passport']; ?>"class="form-control" required>
                              <small class="form-text text-muted">*If Passport is not available, you are required to sign the passport undertaking separately.</small>

                                                </div>
                                            </div>
                                            </div>


                                            <div class="col-lg-12">
                                                  <div class="form-group text-right">
                                           <button type="submit" name="submite1" class="btn btn-success btn-sm" >
                                            <i class="fa fa-dot-circle-o"></i> Save
                                        </button>
                                                </div>
                                              </div>

                                      </form>
                                    </div>
                            <!-- general info card -->      </div>
           <!-- general info ended --> 	</div>



             <div class="col-lg-12">
                                <div class="card " id="emp-info" >
                                   <div class="card-header">
                                        <strong>Address Details </strong> 
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="inserte.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                           <div class="row form-group">
                                            <div class="col-6" style="border-right: 1px solid black;">
                                            <div class="col-12 m-b-65">
                                              <h6>Current Address</h6>
                                            </div>
                                            
                                           
                                            <div class="row form-group">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Landmark</label>
                                            <input name="c_landmark" type="text" id="" value="<?php echo $e2['c_landmark']; ?>"class="form-control" required>
                                                </div>
                                            </div>
                                            
                                           
                                           
                                        </div>
                                          <div class="row">
                                               <div class="col-6">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">City </label>
                                            <input name="c_city" type="text" id="" value="<?php echo $e2['c_city']; ?>"class="form-control" required>
                                                </div>
                                              </div>
                                            <div class="col-6">
                                                  <div class="form-group">
                                                    <label for="city" class=" form-control-label">Pin Code </label>
                                            <input name="c_pincode" type="text" id="" value="<?php echo $e2['c_pincode']; ?>"class="form-control" required>
                                                </div>
                                              </div>
                                                
                                           
                                            </div>
                                            <div class="row">
                                               <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">State</label>
                                            <input name="c_state" type="text" id="" value="<?php echo $e2['c_state']; ?>"class="form-control" required>
                                                </div>
                                              </div>
                                            
                                              
                                            </div>
                                            <div class="row">
                                               <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Primary Mobile No.</label>
                                            <input name="c_mobile" type="text" id="" value="<?php echo $e2['c_mobile']; ?>" class="form-control" required>
                                                </div>
                                              </div>
                                            <div class="col-lg-12">
                                                  <div class="form-group">
                                                    <label for="city" class=" form-control-label">Landline No. for Pune: 020 </label>
                                            <input name="c_landline" type="text" id="" value="<?php echo $e2['c_landline']; ?>" class="form-control" >
                                                </div>
                                              </div>
                                              
                                            </div>
                                         
                                            <div class="row">
                                               
                                            <div class="col-lg-12">
                                                  <div class="form-group">
                                                    <label for="city" class=" form-control-label">Primary E-mail </label>
                                            <input name="c_email" type="text" id="" value="<?php echo $e2['c_email']; ?>"class="form-control" required>
                                                </div>
                                              </div>
                                              
                                            </div>
                                          </div>
                                         
                                          <div class="col-6">
                                            <div class="col-12">
                                              <h6>Permanent Address</h6>
         <input type="radio" <?php if($e2['same_address']=="yes")echo'checked="true"'; ?>  for="selectSm" id="same_address" name="same_address" class="form-control-label" value="yes" onclick="" ><label for="JD"> Same as current address</label><br>

         <input type="radio"  <?php if($e2['same_address']=="no")echo'checked="true"'; ?>  for="selectSm" id="same_address" name="same_address" class=" form-control-label" value="no" onclick="" ><label for="JD">Other (Please specify below).</label><br>
                                            </div>
                                            
                                           
                                            <div class="row form-group">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Landmark</label>
                                            <input name="p_landmark" type="text" id="" value="<?php echo $e2['p_landmark']; ?>"class="form-control" >
                                                </div>
                                            </div>
                                            
                                           
                                           
                                        </div>
                                          <div class="row">
                                               <div class="col-6">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">City </label>
                                            <input name="p_city" type="text" id="" value="<?php echo $e2['p_city']; ?>"class="form-control" >
                                                </div>
                                              </div>
                                            <div class="col-6">
                                                  <div class="form-group">
                                                    <label for="city" class=" form-control-label">Pin Code </label>
                                            <input name="p_pincode" type="text" id="" value="<?php echo $e2['p_pincode']; ?>"class="form-control" >
                                                </div>
                                              </div>
                                                
                                           
                                            </div>
                                            <div class="row">
                                               <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">State</label>
                                            <input name="p_state" type="text" id="" value="<?php echo $e2['p_state']; ?>"class="form-control" >
                                                </div>
                                              </div>
                                            
                                              
                                            </div>
                                            <div class="row">
                                               <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Primary Mobile No.</label>
                                            <input name="p_mobile" type="text" id="" value="<?php echo $e2['p_mobile']; ?>"class="form-control" >
                                                </div>
                                              </div>
                                            <div class="col-lg-12">
                                                  <div class="form-group">
                                                    <label for="city" class=" form-control-label">Landline No. for Pune: 020 </label>
                                            <input name="p_landline" type="text" id="" value="<?php echo $e2['p_landline']; ?>"class="form-control" >
                                                </div>
                                              </div>
                                              
                                            </div>
                                         
                                            <div class="row">
                                               
                                            <div class="col-lg-12">
                                                  <div class="form-group">
                                                    <label for="city" class=" form-control-label">Primary E-mail </label>
                                            <input name="p_email" type="text" id="" value="<?php echo $e2['p_email']; ?>"class="form-control" >
                                                </div>
                                              </div>
                                              
                                            </div>
                                          </div>
                                        </div>

                                            <div class="row">
                                              <div class="col-lg-12">
                                              <h5>Emergency Contact Details</h5>
                                            </div><br>

                                               <div class="col-lg-8">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Contact Person Name</label>
                                            <input name="emergency_person_name" type="text" id="" value="<?php echo $e2['emergency_person_name']; ?>"class="form-control" required>
                                                </div>
                                              </div>
                                            <div class="col-lg-8">
                                                  <div class="form-group">
                                                    <label for="city" class=" form-control-label">Relation with you </label>
                                            <input name="emergency_relation" type="text" id="" value="<?php echo $e2['emergency_relation']; ?>"class="form-control" required>
                                                </div>
                                              </div>
                                              <div class="col-lg-8">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Contact Number</label>
                                            <input name="emergency_num" type="text" id="" value="<?php echo $e2['emergency_num']; ?>"class="form-control" required>
                                                </div>
                                              </div>
                                            <div class="col-lg-12">
                                                  <div class="form-group">
                                                    <label for="city" class=" form-control-label">Address </label>
                                            <input name="emergency_address" type="text" id="" value="<?php echo $e2['emergency_address']; ?>"class="form-control" required>
                                                </div>
                                              </div>
                                              
                                            </div>
                                             <div class="col-lg-12">
                                                  <div class="form-group text-right">
                                           <button type="submit" name="submite2" class="btn btn-success btn-sm" >
                                            <i class="fa fa-dot-circle-o"></i> Save
                                        </button>
                                                </div>
                                              </div>
                                      </form>
                                    </div>
                                  </div>
          <!-- address details ended  --> </div>
           <div class="col-lg-12">
                                <div class="card " id="emp-info" >
                                   <div class="card-header">
                                        <strong>Family History </strong> 
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="inserte.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                           <div class="row form-group">
                                          <table class="table table-bordered">
                                                <thead>
                                           <tr>
        <th>S no.</th>
        <th>Name</th>
        <th>Age</th>
        <th>DOB</th> 
        <th>Relationship</th> 
        <th>Occupation</th>      
        
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td><input name="name1" type="text" id="city" value="<?php echo $e3['name1']; ?>"class="form-control"></td>
        <td><input name="age1" type="text" id="city" value="<?php echo $e3['age1']; ?>"class="form-control"></td>
        <td><input name="dob1" type="text" id="city" value="<?php echo $e3['dob1']; ?>"class="form-control"></td>
        <td><input name="relationship1" type="text" id="city" value="<?php echo $e3['relationship1']; ?>"class="form-control"></td>
        <td><input name="occupation1" type="text" id="city" value="<?php echo $e3['occupation1']; ?>"class="form-control"></td>

      </tr>
      
      <tr>
        <td>2</td>
        <td><input name="name2" type="text" id="city" value="<?php echo $e3['name2']; ?>"class="form-control"></td>
        <td><input name="age2" type="text" id="city" value="<?php echo $e3['age2']; ?>"class="form-control"></td>
        <td><input name="dob2" type="text" id="city" value="<?php echo $e3['dob2']; ?>"class="form-control"></td>
        <td><input name="relationship2" type="text" id="city" value="<?php echo $e3['relationship2']; ?>"class="form-control"></td>
        <td><input name="occupation2" type="text" id="city" value="<?php echo $e3['occupation2']; ?>"class="form-control"></td>

      </tr>
      <tr>
        <td>3</td>
        <td><input name="name3" type="text" id="city" value="<?php echo $e3['name3']; ?>"class="form-control"></td>
        <td><input name="age3" type="text" id="city" value="<?php echo $e3['age3']; ?>"class="form-control"></td>
        <td><input name="dob3" type="text" id="city" value="<?php echo $e3['dob3']; ?>"class="form-control"></td>
        <td><input name="relationship3" type="text" id="city" value="<?php echo $e3['relationship3']; ?>"class="form-control"></td>
        <td><input name="occupation3" type="text" id="city" value="<?php echo $e3['occupation3']; ?>"class="form-control"></td>

      </tr>
      <tr>
        <td>4</td>
        <td><input name="name4" type="text" id="city" value="<?php echo $e3['name4']; ?>"class="form-control"></td>
        <td><input name="age4" type="text" id="city" value="<?php echo $e3['age4']; ?>"class="form-control"></td>
        <td><input name="dob4" type="text" id="city" value="<?php echo $e3['dob4']; ?>"class="form-control"></td>
        <td><input name="relationship4" type="text" id="city" value="<?php echo $e3['relationship4']; ?>"class="form-control"></td>
        <td><input name="occupation4" type="text" id="city" value="<?php echo $e3['occupation4']; ?>"class="form-control"></td>

      </tr>
      <tr>
        <td>5</td>
        <td><input name="name5" type="text" id="city" value="<?php echo $e3['name5']; ?>"class="form-control"></td>
        <td><input name="age5" type="text" id="city" value="<?php echo $e3['age5']; ?>"class="form-control"></td>
        <td><input name="dob5" type="text" id="city" value="<?php echo $e3['dob5']; ?>"class="form-control"></td>
        <td><input name="relationship5" type="text" id="city" value="<?php echo $e3['relationship5']; ?>"class="form-control"></td>
        <td><input name="occupation5" type="text" id="city" value="<?php echo $e3['occupation5']; ?>"class="form-control"></td>

      </tr>
    </tbody>
  </table>
</div>
                                            <div class="col-lg-12">
                                                  <div class="form-group text-right">
                                           <button type="submit" name="submite3" class="btn btn-success btn-sm" >
                                            <i class="fa fa-dot-circle-o"></i> Save
                                        </button>
                                                </div>
                                              </div>
                                         </form>
                                       </div>
                                     </div>
 <!-- family details ended  -->         </div>
 <div class="col-lg-12">
                                <div class="card " id="emp-info" >
                                   <div class="card-header">
                                        <strong>Language for Proficiency  </strong> 
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="inserte.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                           <div class="row form-group">
                                          <table class="table table-bordered">
                                                <thead>
                                           <tr>
        <th>S no.</th>
        <th>Language</th>
        <th>Read</th>
        <th>Write</th> 
        <th>Speak</th> 
        
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td><input name="lang1" type="text" id="city" value="<?php echo $e4['lang1']; ?>"class="form-control"></td>
        <td><input name="read1" <?php if($e4['read1']=="yes")echo'checked="true"'; ?> type="checkbox" id="city" value="yes"class="form-control"></td>
        <td><input name="write1" <?php if($e4['write1']=="yes")echo'checked="true"'; ?> type="checkbox" id="city" value="yes"class="form-control"></td>
        <td><input name="speak1" <?php if($e4['speak1']=="yes")echo'checked="true"'; ?> type="checkbox" id="city" value="yes"class="form-control"></td>
        
      </tr>
      
      <tr>
        <td>2</td>
        <td><input name="lang2" type="text" id="city" value="<?php echo $e4['lang2']; ?>"class="form-control"></td>
        <td><input name="read2" <?php if($e4['read2']=="yes")echo'checked="true"'; ?> type="checkbox" id="city" value="yes"class="form-control"></td>
        <td><input name="write2" <?php if($e4['write2']=="yes")echo'checked="true"'; ?> type="checkbox" id="city" value="yes"class="form-control"></td>
        <td><input name="speak2" <?php if($e4['speak2']=="yes")echo'checked="true"'; ?> type="checkbox" id="city" value="yes"class="form-control"></td>
        
      </tr>
       <tr>
        <td>3</td>
        <td><input name="lang3" type="text" id="city" value="<?php echo $e4['lang3']; ?>"class="form-control"></td>
        <td><input name="read3" <?php if($e4['read3']=="yes")echo'checked="true"'; ?> type="checkbox" id="city" value="yes"class="form-control"></td>
        <td><input name="write3" <?php if($e4['write3']=="yes")echo'checked="true"'; ?> type="checkbox" id="city" value="yes"class="form-control"></td>
        <td><input name="speak3" <?php if($e4['speak3']=="yes")echo'checked="true"'; ?> type="checkbox" id="city" value="yes"class="form-control"></td>
        
      </tr>
       <tr>
        <td>4</td>
        <td><input name="lang4" type="text" id="city" value="<?php echo $e4['lang4']; ?>"class="form-control"></td>
        <td><input name="read4" <?php if($e4['read4']=="yes")echo'checked="true"'; ?> type="checkbox" id="city" value="yes"class="form-control"></td>
        <td><input name="write4" <?php if($e4['write4']=="yes")echo'checked="true"'; ?> type="checkbox" id="city" value="yes"class="form-control"></td>
        <td><input name="speak4" <?php if($e4['speak4']=="yes")echo'checked="true"'; ?> type="checkbox" id="city" value="yes"class="form-control"></td>
        
      </tr>
     
    </tbody>
  </table>
</div>
                                            <div class="col-lg-12">
                                                  <div class="form-group text-right">
                                           <button type="submit" name="submite4" class="btn btn-success btn-sm" >
                                            <i class="fa fa-dot-circle-o"></i> Save
                                        </button>
                                                </div>
                                              </div>
                                         </form>
                                       </div>
                                     </div>
 <!-- Language for Proficiency  ended  -->         </div>
 <div class="col-lg-12">
                                <div class="card " id="emp-info" >
                                   <div class="card-header">
                                        <strong>Educational Qualifications (from Recent to Past {S.S.C.}) </strong> 
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="inserte.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                           <div class="row form-group">
                                          <table class="table table-bordered">
                                                <thead>
                                           <tr>
        <th>S no.</th>
        <th>School / College / University</th>
        <th>City Name</th>
        <th>From (year)</th> 
        <th>To (year)</th> 
        <th>Course / Degree</th>      
        <th>Division & %</th> 
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td><input name="institute_name1"  type="text" id="city" value="<?php echo $e5['institute_name1']; ?>"class="form-control"></td>
        <td><input name="city1" type="text" id="city" value="<?php echo $e5['city1']; ?>"class="form-control"></td>
        <td><input name="from1" type="text" id="city" value="<?php echo $e5['from1']; ?>"class="form-control"></td>
        <td><input name="to1" type="text" id="city" value="<?php echo $e5['to1']; ?>"class="form-control"></td>
        <td><input name="course1" type="text" id="city" value="<?php echo $e5['course1']; ?>"class="form-control"></td>
        <td><input name="grade1" type="text" id="city" value="<?php echo $e5['grade1']; ?>"class="form-control"></td>

      </tr>
      
      <tr>
        <td>2</td>
        <td><input name="institute_name2" type="text" id="city" value="<?php echo $e5['institute_name2']; ?>"class="form-control"></td>
        <td><input name="city2" type="text" id="city" value="<?php echo $e5['city2']; ?>"class="form-control"></td>
        <td><input name="from2" type="text" id="city" value="<?php echo $e5['from2']; ?>"class="form-control"></td>
        <td><input name="to2" type="text" id="city" value="<?php echo $e5['to2']; ?>"class="form-control"></td>
        <td><input name="course2" type="text" id="city" value="<?php echo $e5['course2']; ?>"class="form-control"></td>
        <td><input name="grade2" type="text" id="city" value="<?php echo $e5['grade2']; ?>"class="form-control"></td>

      </tr>
      <tr>
        <td>3</td>
        <td><input name="institute_name3" type="text" id="city" value="<?php echo $e5['institute_name3']; ?>"class="form-control"></td>
        <td><input name="city3" type="text" id="city" value="<?php echo $e5['city3']; ?>"class="form-control"></td>
        <td><input name="from3" type="text" id="city" value="<?php echo $e5['from3']; ?>"class="form-control"></td>
        <td><input name="to3" type="text" id="city" value="<?php echo $e5['to3']; ?>"class="form-control"></td>
        <td><input name="course3" type="text" id="city" value="<?php echo $e5['course3']; ?>"class="form-control"></td>
        <td><input name="grade3" type="text" id="city" value="<?php echo $e5['grade3']; ?>"class="form-control"></td>

      </tr>
      <tr>
        <td>4</td>
        <td><input name="institute_name4" type="text" id="city" value="<?php echo $e5['institute_name4']; ?>"class="form-control"></td>
        <td><input name="city4" type="text" id="city" value="<?php echo $e5['city4']; ?>"class="form-control"></td>
        <td><input name="from4" type="text" id="city" value="<?php echo $e5['from4']; ?>"class="form-control"></td>
        <td><input name="to4" type="text" id="city" value="<?php echo $e5['to4']; ?>"class="form-control"></td>
        <td><input name="course4" type="text" id="city" value="<?php echo $e5['course4']; ?>"class="form-control"></td>
        <td><input name="grade4" type="text" id="city" value="<?php echo $e5['grade4']; ?>"class="form-control"></td>

      </tr>
      <tr>
        <td>5</td>
        <td><input name="institute_name5" type="text" id="city" value="<?php echo $e5['institute_name5']; ?>"class="form-control"></td>
        <td><input name="city5" type="text" id="city" value="<?php echo $e5['city5']; ?>"class="form-control"></td>
        <td><input name="from5" type="text" id="city" value="<?php echo $e5['from5']; ?>"class="form-control"></td>
        <td><input name="to5" type="text" id="city" value="<?php echo $e5['to5']; ?>"class="form-control"></td>
        <td><input name="course5" type="text" id="city" value="<?php echo $e5['course5']; ?>"class="form-control"></td>
        <td><input name="grade5" type="text" id="city" value="<?php echo $e5['grade5']; ?>"class="form-control"></td>

      </tr>
     <tr>
        <td>6</td>
        <td><input name="institute_name6" type="text" id="city" value="<?php echo $e5['institute_name6']; ?>"class="form-control"></td>
        <td><input name="city6" type="text" id="city" value="<?php echo $e5['city6']; ?>"class="form-control"></td>
        <td><input name="from6" type="text" id="city" value="<?php echo $e5['from6']; ?>"class="form-control"></td>
        <td><input name="to6" type="text" id="city" value="<?php echo $e5['to6']; ?>"class="form-control"></td>
        <td><input name="course6" type="text" id="city" value="<?php echo $e5['course6']; ?>"class="form-control"></td>
        <td><input name="grade6" type="text" id="city" value="<?php echo $e5['grade6']; ?>"class="form-control"></td>

      </tr>
    </tbody>
  </table>
</div>
                                            <div class="col-lg-12">
                                                  <div class="form-group text-right">
                                           <button type="submit" name="submite5" class="btn btn-success btn-sm" >
                                            <i class="fa fa-dot-circle-o"></i> Save
                                        </button>
                                                </div>
                                              </div>
                                         </form>
                                       </div>
                                     </div>
 <!-- Educational Qualifications (from Recent to Past {S.S.C.}) ended  -->         </div>
  <div class="col-lg-12">

 <form action="inserte.php" method="post" enctype="multipart/form-data" class="form-horizontal">
   
   <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Describe Yourself</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea name="describe_yourself" type="text" required="true" value ="" id="textarea-input" rows="5" placeholder="Content..." class="form-control"><?php echo$e6['describe_yourself'];?></textarea>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Your Strengths & Weaknesses</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea name="strength" type="text" required="true" value ="" id="textarea-input" rows="5" placeholder="Content..." class="form-control"><?php echo$e6['strength'];?></textarea>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">List Your Professional Achievements, if any</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea name="Professional_achievement" type="text" required="true" value ="" id="textarea-input" rows="5" placeholder="Content..." class="form-control"><?php echo$e6['Professional_achievement'];?></textarea>
                                                </div>
                                            </div>

                                             <div class="col-lg-12">
                                                  <div class="form-group text-right">
                                           <button type="submit" name="submite6" class="btn btn-success btn-sm" >
                                            <i class="fa fa-dot-circle-o"></i> Save
                                        </button>
                                                </div>
                                              </div>
 </form>
</div>
  <div class="col-lg-12">
                                <div class="card " id="emp-info" >
                                   <div class="card-header">
                                        <strong>Please respond / select the appropriate: </strong> 
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="inserte.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                           <div class="row form-group">
                                            <div class="col-6">
                                            <label for="city" class=" form-control-label">Experience (In Years) </label>
                                            </div>
                                            <div class="col-3">
                                           <label for="city" class=" form-control-label">IT </label>
                                            <input name="it_exp" type="text" id="city" value="<?php echo $e7['it_exp']; ?>"class="form-control" required>

                                            </div>
                                            <div class="col-3">
                                                <label for="city" class=" form-control-label">Non-IT</label>
                                            <input name="non_it_exp" type="text" id="city" value="<?php echo $e7['non_it_exp']; ?>"class="form-control" required>
                                            </div>
                                           </div>
                                            <div class="row form-group">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Any political affiliations, if so, give a brief account.</label>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                            <input name="political" type="text" id="city" value="<?php echo $e7['political']; ?>"class="form-control" required>
                                            <small class="form-text text-muted">write NA if not applicable</small>
                                                </div>
                                            </div>
                                           
                                           
                                        </div>
                                         <div class="row form-group">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Any physical disability of permanent nature or chronic illness.           </label>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                            <input name="physical_disability" type="text" id="city" value="<?php echo $e7['physical_disability']; ?>"class="form-control" required>
                                            <small class="form-text text-muted">write NA if not applicable</small>
                                                </div>
                                            </div>
                                           
                                           
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label"> What motivates you most    
                                            <small class="form-text text-muted">Rank High:1 to Low:4</small>

                                                     </label>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <label for="city" class=" form-control-label">Money</label>
                                            <input name="money" type="text" id="city" value="<?php echo $e7['money']; ?>"class="form-control" >
                                            </div>
                                            <div class="col-2">
                                                <label for="city" class=" form-control-label">Recognition</label>
                                            <input name="recognition" type="text" id="city" value="<?php echo $e7['recognition']; ?>"class="form-control" >
                                            </div>
                                            <div class="col-2">
                                                <label for="city" class=" form-control-label">Team</label>
                                            <input name="team" type="text" id="city" value="<?php echo $e7['team']; ?>"class="form-control" >
                                            </div>
                                            <div class="col-2">
                                                <label for="city" class=" form-control-label">Pressure</label>
                                            <input name="pressure" type="text" id="city" value="<?php echo $e7['pressure']; ?>"class="form-control" >
                                            </div>
                                           
                                           
                                        </div>
                                          <div class="row">
                                               <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">In a Typical Week you can work?   </label>
                                                </div>
                                              </div>
                                            <div class="col-lg-2">
                                                  <div class="form-group">
                                                    <input name="work_in_week" <?php if($e7['work_in_week']=="40 Hrs")echo'checked="true"'; ?> type="radio" id="city" value="40 Hrs"class="form-control-radio" >
                                                    <label for="city" class=" form-control-label">40 Hrs </label>
                                            

                                                </div>
                                              </div>
                                                <div class="col-lg-2">
                                                <div class="form-group">
                                                  <input name="work_in_week" <?php if($e7['work_in_week']=="50 Hrs")echo'checked="true"'; ?> type="radio" id="city" value="50 Hrs"class="form-control-radio" >
                                                    <label for="city" class=" form-control-label">50 Hrs</label>
                                            
                                                </div>
                                              </div>
                                            <div class="col-lg-2">
                                                  <div class="form-group">
                                                    <input name="work_in_week" <?php if($e7['work_in_week']=="60 Hrs")echo'checked="true"'; ?>  type="radio" id="city" value="60 Hrs"class="form-control-radio" >
                                                    <label for="city" class=" form-control-label">60 Hrs </label>
                                            
                                                </div>
                                              </div>
                                            </div>

                                             <div class="row">
                                               <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Around a Deadline you can Work?</label>
                                                </div>
                                              </div>
                                            <div class="col-lg-2">
                                                  <div class="form-group">
                                                    <input name="deadline_time_in_week" <?php if($e7['deadline_time_in_week']=="40 Hrs")echo'checked="true"'; ?> type="radio" id="city" value="40 Hrs"class="form-control-radio" >
                                                    <label for="city" class=" form-control-label">40 Hrs </label>
                                            

                                                </div>
                                              </div>
                                                <div class="col-lg-2">
                                                <div class="form-group">
                                                  <input name="deadline_time_in_week" <?php if($e7['deadline_time_in_week']=="50 Hrs")echo'checked="true"'; ?> type="radio" id="city" value="50 Hrs"class="form-control-radio" >
                                                    <label for="city" class=" form-control-label">50 Hrs</label>
                                            
                                                </div>
                                              </div>
                                            <div class="col-lg-2">
                                                  <div class="form-group">
                                                     <input name="deadline_time_in_week" <?php if($e7['deadline_time_in_week']=="60 Hrs")echo'checked="true"'; ?> type="radio" id="city" value="60 Hrs"class="form-control-radio" >
                                                    <label for="city" class=" form-control-label">60 Hrs </label>
                                           
                                                </div>
                                              </div>
                                              <div class="col-lg-2">
                                                  <div class="form-group">
                                                    <input name="deadline_time_in_week" <?php if($e7['deadline_time_in_week']=="70 Hrs")echo'checked="true"'; ?> type="radio" id="city" value="70 Hrs"class="form-control-radio" >
                                                    <label for="city" class=" form-control-label">70 Hrs </label>
                                            
                                                </div>
                                              </div>
                                            </div>
                                            <div class="row">
                                               <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Do you like to learn new stuff ?</label>
                                                </div>
                                              </div>
                                            <div class="col-lg-2">
                                                  <div class="form-group">
                                                    <input name="new_stuff" <?php if($e7['new_stuff']=="Regularly")echo'checked="true"'; ?> type="radio" id="city" value="Regularly"class="form-control-radio" >
                                                    <label for="city" class=" form-control-label">Regularly </label>
                                            

                                                </div>
                                              </div>
                                                <div class="col-lg-2">
                                                <div class="form-group">
                                                  <input name="new_stuff"  <?php if($e7['new_stuff']=="Need Basis")echo'checked="true"'; ?> type="radio" id="city" value="Need Basis"class="form-control-radio" >
                                                    <label for="city" class=" form-control-label">Need Basis</label>
                                            
                                                </div>
                                              </div>
                                            <div class="col-lg-2">
                                                  <div class="form-group">
                                                    <input name="new_stuff" <?php if($e7['new_stuff']=="Not so often")echo'checked="true"'; ?> type="radio" id="city" value="Not so often"class="form-control-radio" >
                                                    <label for="city" class=" form-control-label">Not so often</label>
                                            
                                                </div>
                                              </div>
                                            </div>
                                            <div class="row">
                                               <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label"><h5>You prefer to be </h5></label><br>
                                                </div>
                                              </div>
                                              <br>
                                            </div>
                                            <div class="row">
                                            <div class="col-lg-2">
                                                  <div class="form-group">
                                                    <input name="you_prefer" <?php if($e7['you_prefer']=="Manager")echo'checked="true"'; ?> type="radio" id="city" value="Manager"class="form-control-radio" >
                                                    <label for="city" class=" form-control-label">Manager</label>
                                            

                                                </div>
                                              </div>
                                                <div class="col-lg-2">
                                                <div class="form-group">
                                                  <input name="you_prefer" <?php if($e7['you_prefer']=="Leader")echo'checked="true"'; ?> type="radio" id="city" value="Leader"class="form-control-radio" >
                                                    <label for="city" class=" form-control-label">Leader</label>
                                            
                                                </div>
                                              </div>
                                            <div class="col-lg-2">
                                                  <div class="form-group">
                                                    <input name="you_prefer" <?php if($e7['you_prefer']=="Designer")echo'checked="true"'; ?> type="radio" id="city" value="Designer"class="form-control-radio" >
                                                    <label for="city" class=" form-control-label">Designer</label>
                                            
                                                </div>
                                              </div>
                                                <div class="col-lg-2">
                                                  <div class="form-group">
                                                    <input name="you_prefer" <?php if($e7['you_prefer']=="Programmer")echo'checked="true"'; ?> type="radio" id="city" value="Programmer"class="form-control-radio" >
                                                    <label for="city" class=" form-control-label">Programmer</label>
                                            

                                                </div>
                                              </div>
                                                <div class="col-lg-2">
                                                  <div class="form-group">
                                                     <input name="you_prefer" <?php if($e7['you_prefer']=="Other")echo'checked="true"'; ?> type="radio" id="city" value="Other"class="form-control-radio" >
                                                    <label for="city" class=" form-control-label">Other</label>
                                           

                                                </div>
                                              </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                               <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Do you know What is Stock Option?</label>
                                                </div>
                                              </div>
                                            <div class="col-lg-3">
                                                  <div class="form-group">
                                                    <input name="stock_option" <?php if($e7['stock_option']=="yes")echo'checked="true"'; ?> type="radio" id="city" value="yes"class="form-control-radio" required>
                                                    <label for="city" class=" form-control-label">YES </label>
                                            
                                                </div>
                                              </div>
                                              <div class="col-lg-3">
                                                  <div class="form-group">
                                                    <input name="stock_option" <?php if($e7['stock_option']=="no")echo'checked="true"'; ?> type="radio" id="city" value="no"class="form-control-radio" required>
                                                    <label for="city" class=" form-control-label">NO</label>
                                            
                                                </div>
                                              </div>
                                              
                                            </div>
                                            <div class="row">
                                               <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">What is more important to an organization?</label>
                                                </div>
                                              </div>
                                            <div class="col-lg-3">
                                                  <div class="form-group">
                                                    <input name="imp_for_organization" <?php if($e7['imp_for_organization']=="Your Individual Performance")echo'checked="true"'; ?> type="radio" id="city" value="Your Individual Performance"class="form-control-radio" required>
                                                    <label for="city" class=" form-control-label">Your Individual Performance </label>
                                            
                                                </div>
                                              </div>
                                              <div class="col-lg-3">
                                                  <div class="form-group">
                                                    <input name="imp_for_organization" <?php if($e7['imp_for_organization']=="Your Team performance")echo'checked="true"'; ?> type="radio" id="city" value="Your Team performance" class="form-control-radio" required>
                                                    <label for="city" class=" form-control-label">Your Team performance</label>
                                            
                                                </div>
                                              </div>
                                              
                                            </div>
                                             <div class="row">
                                               <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Do you Like to Share Information?</label>
                                                </div>
                                              </div>
                                            <div class="col-lg-3">
                                                  <div class="form-group">
                                                    <input name="you_share_info" <?php if($e7['you_share_info']=="yes")echo'checked="true"'; ?> type="radio" id="city" value="yes"class="form-control-radio" required>
                                                    <label for="city" class=" form-control-label">Yes </label>
                                            
                                                </div>
                                              </div>
                                              <div class="col-lg-3">
                                                  <div class="form-group">
                                                    <input name="you_share_info" <?php if($e7['you_share_info']=="no")echo'checked="true"'; ?> type="radio" id="city" value="no"class="form-control-radio" required>
                                                    <label for="city" class=" form-control-label">No</label>
                                            
                                                </div>
                                              </div>
                                              
                                            </div>
                                             <div class="row">
                                               <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">How you identify yourself as?</label>
                                                </div>
                                              </div>
                                            <div class="col-lg-3">
                                                  <div class="form-group">
                                                     <input name="yourself" <?php if($e7['yourself']=="Team Player")echo'checked="true"'; ?> type="radio" id="city" value="Team Player"class="form-control-radio" required>
                                                    <label for="city" class=" form-control-label">Team Player</label>
                                           
                                                </div>
                                              </div>
                                              <div class="col-lg-3">
                                                  <div class="form-group">
                                                     <input name="yourself"<?php if($e7['yourself']=="Individual Contributor")echo'checked="true"'; ?> type="radio" id="city" value="Individual Contributor"class="form-control-radio" required>
                                                    <label for="city" class=" form-control-label">Individual Contributor</label>
                                           
                                                </div>
                                              </div>
                                              
                                            </div>
                                            <div class="row">
                                               <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Can you handle risk?</label>
                                                </div>
                                              </div>
                                            <div class="col-lg-3">
                                                  <div class="form-group">
                                                    <input name="handle_risk" <?php if($e7['handle_risk']=="Very Well")echo'checked="true"'; ?> type="radio" id="city" value="Very Well"class="form-control-radio" required>
                                                    <label for="city" class=" form-control-label">Very Well</label>
                                            
                                                </div>
                                              </div>
                                              <div class="col-lg-3">
                                                  <div class="form-group">

                                                    <input name="handle_risk" <?php if($e7['handle_risk']=="Not so well")echo'checked="true"'; ?> type="radio" id="city" value="Not so well"class="form-control-radio" required>
                                                    <label for="city" class=" form-control-label">Not so well</label>
                                            
                                                </div>
                                              </div>
                                              
                                            </div>
                                             <div class="row">
                                               <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Can you travel locally if a job requires it?  </label>
                                                </div>
                                              </div>
                                            <div class="col-lg-3">
                                                  <div class="form-group">

                                                    <input name="will_travel" <?php if($e7['will_travel']=="yes")echo'checked="true"'; ?> type="radio" id="city" value="yes" class="form-control-radio" required>
                                                    <label for="city" class=" form-control-label">Yes</label>
                                            
                                                </div>
                                              </div>
                                              <div class="col-lg-3">
                                                  <div class="form-group">
                                                    <input name="will_travel" <?php if($e7['will_travel']=="no")echo'checked="true"'; ?> type="radio" id="city" value="no" class="form-control-radio" required>
                                                    <label for="city" class=" form-control-label">No</label>
                                            
                                                </div>
                                              </div>
                                              
                                            </div>
                                           
                                            
                                           <div class="col-lg-12">
                                                  <div class="form-group text-right">
                                           <button type="submit" name="submite7" class="btn btn-success btn-sm" >
                                            <i class="fa fa-dot-circle-o"></i> Save
                                        </button>
                                                </div>
                                              </div>
                                         
                                      </form>
                                    </div>
                                  </div>
 <!-- Please respond / select the appropriate: ended  -->         </div>

 <div class="col-lg-12">
                                <div class="card " id="emp-info" >
                                   <div class="card-header">
                                        <strong>Provide Skill details and tick appropriate option from provided ratings </strong> 
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="inserte.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                           <div class="row form-group">
                                          <table class="table table-bordered">
                                                <thead>
                                           <tr>
        <th>S no.</th>
        <th>Subject</th>
        <th>Excellent</th>
        <th>Above Avg.</th>
        <th>Avg</th> 
        <th>Below Avg.</th> 
        <th>None</th>      
         
      </tr>
    </thead>
    <tbody>

      <tr>
        <td>1</td>
        <td><input name="subject1" type="text" id="city" value="<?php echo $e8['subject1']; ?>"class="form-control"></td>
        <td><input name="skill_grade1" <?php if($e8['skill_grade1']=="Excellent")echo'checked="true"'; ?> type="radio" id="city" value="Excellent"class="form-control"></td>
        <td><input name="skill_grade1"  <?php if($e8['skill_grade1']=="Above Avg")echo'checked="true"'; ?> type="radio" id="city" value="Above Avg"class="form-control"></td>
        <td><input name="skill_grade1"  <?php if($e8['skill_grade1']=="Avg")echo'checked="true"'; ?> type="radio" id="city" value="Avg"class="form-control"></td>
        <td><input name="skill_grade1"  <?php if($e8['skill_grade1']=="Below Avg")echo'checked="true"'; ?> type="radio" id="city" value="Below Avg"class="form-control"></td>
        <td><input name="skill_grade1"  <?php if($e8['skill_grade1']=="None")echo'checked="true"'; ?> type="radio" id="city" value="None"class="form-control"></td>

      </tr>
      <tr>
        <td>2</td>
        <td><input name="subject2" type="text" id="city" value="<?php echo $e8['subject2']; ?>"class="form-control"></td>
        <td><input name="skill_grade2" <?php if($e8['skill_grade2']=="Excellent")echo'checked="true"'; ?> type="radio" id="city" value="Excellent"class="form-control"></td>
        <td><input name="skill_grade2" <?php if($e8['skill_grade2']=="Above Avg")echo'checked="true"'; ?> type="radio" id="city" value="Above Avg"class="form-control"></td>
        <td><input name="skill_grade2" <?php if($e8['skill_grade2']=="Avg")echo'checked="true"'; ?> type="radio" id="city" value="Avg"class="form-control"></td>
        <td><input name="skill_grade2"<?php if($e8['skill_grade2']=="Below Avg")echo'checked="true"'; ?> type="radio" id="city" value="Below Avg"class="form-control"></td>
        <td><input name="skill_grade2" <?php if($e8['skill_grade2']=="None")echo'checked="true"'; ?> type="radio" id="city" value="None"class="form-control"></td>

      </tr><tr>
        <td>3</td>
        <td><input name="subject3" type="text" id="city" value="<?php echo $e8['subject3']; ?>"class="form-control"></td>
        <td><input name="skill_grade3" <?php if($e8['skill_grade3']=="Excellent")echo'checked="true"'; ?> type="radio" id="city" value="Excellent"class="form-control"></td>
        <td><input name="skill_grade3" <?php if($e8['skill_grade3']=="Above Avg")echo'checked="true"'; ?> type="radio" id="city" value="Above Avg"class="form-control"></td>
        <td><input name="skill_grade3" <?php if($e8['skill_grade3']=="Avg")echo'checked="true"'; ?> type="radio" id="city" value="Avg"class="form-control"></td>
        <td><input name="skill_grade3" <?php if($e8['skill_grade3']=="Below Avg")echo'checked="true"'; ?> type="radio" id="city" value="Below Avg"class="form-control"></td>
        <td><input name="skill_grade3" <?php if($e8['skill_grade3']=="None")echo'checked="true"'; ?> type="radio" id="city" value="None"class="form-control"></td>

      </tr>
      <tr>
        <td>4</td>
        <td><input name="subject4" type="text" id="city" value="<?php echo $e8['subject4']; ?>"class="form-control"></td>
        <td><input name="skill_grade4" <?php if($e8['skill_grade4']=="Excellent")echo'checked="true"'; ?> type="radio" id="city" value="Excellent"class="form-control"></td>
        <td><input name="skill_grade4" <?php if($e8['skill_grade4']=="Above Avg")echo'checked="true"'; ?> type="radio" id="city" value="Above Avg"class="form-control"></td>
        <td><input name="skill_grade4" <?php if($e8['skill_grade4']=="Avg")echo'checked="true"'; ?> type="radio" id="city" value="Avg"class="form-control"></td>
        <td><input name="skill_grade4" <?php if($e8['skill_grade4']=="Below Avg")echo'checked="true"'; ?> type="radio" id="city" value="Below Avg"class="form-control"></td>
        <td><input name="skill_grade4" <?php if($e8['skill_grade4']=="None")echo'checked="true"'; ?> type="radio" id="city" value="None"class="form-control"></td>

      </tr>
      <tr>
        <td>5</td>
        <td><input name="subject5" type="text" id="city" value="<?php echo $e8['subject5']; ?>"class="form-control"></td>
        <td><input name="skill_grade5" <?php if($e8['skill_grade5']=="Excellent")echo'checked="true"'; ?> type="radio" id="city" value="Excellent"class="form-control"></td>
        <td><input name="skill_grade5" <?php if($e8['skill_grade5']=="Above Avg")echo'checked="true"'; ?> type="radio" id="city" value="Above Avg"class="form-control"></td>
        <td><input name="skill_grade5" <?php if($e8['skill_grade5']=="Avg")echo'checked="true"'; ?> type="radio" id="city" value="Avg"class="form-control"></td>
        <td><input name="skill_grade5" <?php if($e8['skill_grade5']=="Below Avg")echo'checked="true"'; ?> type="radio" id="city" value="Below Avg"class="form-control"></td>
        <td><input name="skill_grade5" <?php if($e8['skill_grade5']=="None")echo'checked="true"'; ?> type="radio" id="city" value="None"class="form-control"></td>

      </tr>
      <tr>
        <td>6</td>
        <td><input name="subject6" type="text" id="city" value="<?php echo $e8['subject6']; ?>"class="form-control"></td>
        <td><input name="skill_grade6"<?php if($e8['skill_grade6']=="Excellent")echo'checked="true"'; ?> type="radio" id="city" value="Excellent"class="form-control"></td>
        <td><input name="skill_grade6" <?php if($e8['skill_grade6']=="Above Avg")echo'checked="true"'; ?> type="radio" id="city" value="Above Avg"class="form-control"></td>
        <td><input name="skill_grade6" <?php if($e8['skill_grade6']=="Avg")echo'checked="true"'; ?> type="radio" id="city" value="Avg"class="form-control"></td>
        <td><input name="skill_grade6" <?php if($e8['skill_grade6']=="Below Avg")echo'checked="true"'; ?> type="radio" id="city" value="Below Avg"class="form-control"></td>
        <td><input name="skill_grade" <?php if($e8['skill_grade6']=="None")echo'checked="true"'; ?> type="radio" id="city" value="None"class="form-control"></td>

      </tr>
      
      
    </tbody>
  </table>
  
  <div class="row">
   
  <div class="col col-md-12 m-t-30">
                                                    <h6 >OTHER SPECIAL SKILLS</h6>
                                                    <small>Please list other special skills you may have, e.g., fluency in other languages, certification, etc.</small>
                                                </div>
                                                <div class="col-12 col-md-12">
                                                    <textarea name="other_special_skill" type="text"  value ="" id="textarea-input" rows="5" placeholder="" class="form-control"><?php echo $e8['other_special_skill']; ?></textarea>
                                                </div>
                                              </div>

                                           
<div class="col-lg-12">
                                                  <div class="form-group text-right">
                                           <button type="submit" name="submite8" class="btn btn-success btn-sm" >
                                            <i class="fa fa-dot-circle-o"></i> Save
                                        </button>
                                                </div>
                                              </div>

                                         </form>
                                       </div>
                                     </div>
 <!-- Skill  ended  -->         </div>
</div>


 <div class="col-lg-12">
                                <div class="card " id="emp-info" >
                                   <div class="card-header">
                                        <strong>WORK EXPERIENCE & REFERENCES </strong>
                                        <small>Please list your work experience of your most recent job. </small> 
                                    </div>
                                    <div class="card-body card-block">
<form action="inserte.php" method="post" >
    <div id="wrapp">
        <div class="my_box1">
            <div class="field_box1">

            <div class="row form-group">
                                            <div class="col-6">
                                               <div class="form-group">
                                                    <label for="city" class=" form-control-label">Most Recent Employer Name</label>
                                            <input name="employer_name[]" type="text" id="city" class="form-control" >
                                                </div>
                                            </div>
                                            <div class="col-3">
                                               <div class="form-group">
                                                    <label for="city" class=" form-control-label">From Date</label>
                                            <input name="from_date[]" type="date" id="city" class="form-control" >
                                                </div>
                                            </div>
                                            <div class="col-3">
                                               <div class="form-group">
                                                    <label for="city" class=" form-control-label">To Date</label>
                                            <input name="to_date[]" type="date" id="city" class="form-control" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Company Address</label>
                                            <input name="company_address[]" type="text" id="city" class="form-control" >
                                                <small>Complete Address with Pin code</small>
                                                </div>
                                            </div>
                                  
                                           
                                           
                                        </div>
                                          <div class="row">
                                            <div class="col-lg-12">
                                            <h6>Supervisor / Reporting Manager Details</h6>
                                          </div>
                                               <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Supervisor Name </label>
                                            <input name="supervisor_name[]" type="text" id="city" class="form-control" required>
                                                </div>
                                              </div>
                                            <div class="col-lg-3">
                                                  <div class="form-group">
                                                    <label for="city" class=" form-control-label">Mobile/Phone </label>
                                            <input name="supervisor_phone[]" type="text" id="city" class="form-control" required>
                                                </div>
                                              </div>
                                                <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Official e-Mail</label>
                                            <input name="supervisor_email[]" type="text" id="city" class="form-control" required>
                                                </div>
                                              </div>
                                            
                                            </div>
                                             <div class="row">
                                            <div class="col-lg-12">
                                            <h6>HR Details</h6>
                                          </div>
                                               <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">HR Name </label>
                                            <input name="hr_name[]" type="text" id="city"  class="form-control" required>
                                                </div>
                                              </div>
                                            <div class="col-lg-3">
                                                  <div class="form-group">
                                                    <label for="city" class=" form-control-label">Mobile/Phone </label>
                                            <input name="hr_mobile[]" type="text" id="city" class="form-control" required>
                                                </div>
                                              </div>
                                                <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Official e-Mail</label>
                                            <input name="hr_email[]" type="text" id="city" class="form-control" required>
                                                </div>
                                              </div>
                                            
                                            </div>
                                              <div class="row">
                                            <div class="col-lg-12">
                                            <h6>Job title</h6>
                                          </div>
                                               <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Last CTC Drawn per Annum </label>
                                            <input name="last_ctc[]" type="text" id="city" class="form-control" required>
                                                </div>
                                              </div>
                                            <div class="col-lg-6">
                                                  <div class="form-group">
                                                    <label for="city" class=" form-control-label">Reason for Leaving: </label>
                                            <input name="reason_for_leaving[]" type="text" id="city" class="form-control" >
                                                </div>
                                              </div>
            </div>
        </div>
            <div class="button_box1"><input type="button" name="add_btn" value="Add More" onclick="add_more1()" class="btn btn-success btn-sm"></div>
        </div>
    </div>
    
                                                  <div class="form-group text-right">
                                           <button type="submit" name="submite9" class="btn btn-success btn-sm" >
                                            <i class="fa fa-dot-circle-o"></i> Save
                                        </button>
                                        <input type="hidden" id="box_count1" value="1">
                                                </div>
                                              
    
</form>
<style>
#wrapp{width:100%;}
.my_box1{width:100%; padding-bottom:90px;}
.field_box1{float:left;width:100%;}
.button_box1{float:left;width:100%;}
</style>
                                        
                                               
                                            
                                        
                                  </div>

          <!-- work experience details ended  --> </div>
      </div>



          <div class="col-lg-12">
                                <div class="card " id="emp-info" >
                                   <div class="card-header">
                                        <strong>REFERENCES OF RELATIVES OR FRIENDS </strong><br>
                                        <small>Please list two references of relatives or friends.  Prior employers preferred </small> 
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="inserte.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                           <div class="row form-group">
                                            <div class="col-6" style="border-right: 1px solid black;">
                                              <div class="row">
                                               <div class="col-12">
                                               <div class="form-group">
                                                    <label for="city" class=" form-control-label">Name</label>
                                            <input name="ref_name1" type="text" id="city" value="<?php echo $e10['ref_name1']; ?>"class="form-control" required>
                                                </div>
                                            </div>
                                            
                                          </div>
                                           <div class="row">
                                               <div class="col-12">
                                               <div class="form-group">
                                                    <label for="city" class=" form-control-label">Relation</label>
                                            <input name="ref_relation1" type="text" id="city" value="<?php echo $e10['ref_relation1']; ?>"class="form-control" required>
                                                </div>
                                            </div>
                                            
                                          </div>
                                           <div class="row">
                                               <div class="col-12">
                                               <div class="form-group">
                                                    <label for="city" class=" form-control-label">Occupation</label>
                                            <input name="ref_occupation1" type="text" id="city" value="<?php echo $e10['ref_occupation1']; ?>"class="form-control" required>
                                                </div>
                                            </div>
                                            
                                          </div>
                                           <div class="row">
                                               <div class="col-12">
                                               <div class="form-group">
                                                    <label for="city" class=" form-control-label">Address</label>
                                            <input name="ref_address1" type="text" id="city" value="<?php echo $e10['ref_address1']; ?>"class="form-control" required>
                                                </div>
                                            </div>
                                            
                                          </div>
                                           <div class="row">
                                               <div class="col-12">
                                               <div class="form-group">
                                                    <label for="city" class=" form-control-label">Mobile</label>
                                            <input name="ref_mobile1" type="text" id="city" value="<?php echo $e10['ref_mobile1']; ?>"class="form-control" required>
                                                </div>
                                            </div>
                                            
                                          </div>
                                           <div class="row">
                                               <div class="col-12">
                                               <div class="form-group">
                                                    <label for="city" class=" form-control-label">Email</label>
                                            <input name="ref_email1" type="text" id="city" value="<?php echo $e10['ref_email1']; ?>"class="form-control" required>
                                                </div>
                                            </div>
                                            
                                          </div>

                                              
                                            </div>
                                             <div class="col-6" >
                                              <div class="row">
                                               <div class="col-12">
                                               <div class="form-group">
                                                    <label for="city" class=" form-control-label">Name</label>
                                            <input name="ref_name2" type="text" id="city" value="<?php echo $e10['ref_name2']; ?>"class="form-control" required>
                                                </div>
                                            </div>
                                            
                                          </div>
                                           <div class="row">
                                               <div class="col-12">
                                               <div class="form-group">
                                                    <label for="city" class=" form-control-label">Relation</label>
                                            <input name="ref_relation2" type="text" id="city" value="<?php echo $e10['ref_relation2']; ?>"class="form-control" required>
                                                </div>
                                            </div>
                                            
                                          </div>
                                           <div class="row">
                                               <div class="col-12">
                                               <div class="form-group">
                                                    <label for="city" class=" form-control-label">Occupation</label>
                                            <input name="ref_occupation2" type="text" id="city" value="<?php echo $e10['ref_occupation2']; ?>"class="form-control" required>
                                                </div>
                                            </div>
                                            
                                          </div>
                                           <div class="row">
                                               <div class="col-12">
                                               <div class="form-group">
                                                    <label for="city" class=" form-control-label">Address</label>
                                            <input name="ref_address2" type="text" id="city" value="<?php echo $e10['ref_address2']; ?>"class="form-control" required>
                                                </div>
                                            </div>
                                            
                                          </div>
                                           <div class="row">
                                               <div class="col-12">
                                               <div class="form-group">
                                                    <label for="city" class=" form-control-label">Mobile</label>
                                            <input name="ref_mobile2" type="text" id="city" value="<?php echo $e10['ref_mobile2']; ?>"class="form-control" required>
                                                </div>
                                            </div>
                                            
                                          </div>
                                           <div class="row">
                                               <div class="col-12">
                                               <div class="form-group">
                                                    <label for="city" class=" form-control-label">Email</label>
                                            <input name="ref_email2" type="text" id="city" value="<?php echo $e10['ref_email2']; ?>"class="form-control" required>
                                                </div>
                                            </div>
                                            
                                          </div>

                                              
                                            </div>
                                            
                                           </div>
                                            
                                       
                                           
                                            
                                            
                                      
                                    </div>
                                  </div>
          <!-- REFERENCES OF RELATIVES OR FRIENDS ended  --> </div>

          <div class="col-lg-12">
                                <div class="card " id="emp-info" >
                                   <div class="card-header">
                                        <strong>WAIVERS AND DISCLOSURES</strong><br>
                                        <small>Please read each section carefully and upload thesign where required</small> 
                                    </div>
                                    <div class="card-body card-block">
                                        
                                           <div class="row form-group">
                                           
                                            <div class="col-12">
                                               <div class="form-group text-center">
                                                    <h6>AT-WILL EMPLOYMENT</h6>
                                                    <p>It is my understanding that this employment application, or the granting of an oral interview, does not represent a contract of employment or a promise of future benefits by this organization.  I understand and agree that, <strong>If I am employed, I will abide</strong> by NDA, MOU, rules and regulations of the company <strong> and if at a future date it is found that any of the information furnished herein is false or incorrect in any material aspects, the company will have the right to </strong> terminate my service with or without cause, at any time.  </p>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                               <div class="form-group text-center">
                                                    <h6>CERTIFICATION OF TRUTH AND ACCURACY</h6>
                                                    <p>I certify that the information in this application is true, complete and correct. I understand that false answers, statements, or significant omissions made by me on this form shall be sufficient cause for denial of employment or termination of services post hiring. </p>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                               <div class="form-group text-center">
                                                    <h6>NOTIFICATION AND UNDERTAKING REQUIRE FOR MEDICAL SCREENING</h6>
                                                    <p>I hereby certify that, if hired, I will disclose any limitations I have that may impact my ability to do the essential functions of the job.  I further understand, continuation in employment post selection is also dependent on physical and mental health fitness to be decided by the company’s medical officer appointed by the company. I undertake that, I will undergo medical screening as and when required and produce necessary fitness certificates required for employment continuity with HR Department.  </p>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                               <div class="form-group text-center">
                                                    <h6>NOTIFICATION AND AUTHORIZATION TO CONDUCT BACKGROUND INVESTIGATION</h6>
                                                    <p>I understand that I may be subject to a background check, and hereby authorize Vidushi Infotech SSP Pvt. Ltd and its authorized representatives, to investigate my background. I release employers and persons named in my application from all liability for any damages on account of his/her furnishing said information.<br>

Additionally, I hereby also authorize Vidushi Infotech SSP Pvt. Ltd and its authorized representatives to make any investigation of my personal history, educational background, police record, motor vehicle records and criminal records through an investigative or credit agency or bureau of your choice.  I authorize the release of this information by the appropriate agencies to the investigating service. This authorization, in original or copy form, shall be valid for this and for any future reports and updates that may be required.  <br>

I understand that passing the background check is a condition of employment. A negative background check can be grounds for dismissal without any notice, even if an offer has been made to me and I have been hired or joined the company.<br>
 </p>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                               <div class="form-group">
                                                    <label for="city" class=" form-control-label">Signature</label>
                                            <input name="signature" type="file" id="city" value="fileupload" class="form-control" required>
                                            <small style="color:red">This signature should match with the signature in the pan card </small>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                               <div class="form-group">
                                                    <label for="city" class=" form-control-label">date</label>
                                            <input name="sig_date" type="date" id="city" value="<?php echo $e10['sig_date']; ?>"class="form-control" required>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                               <div class="form-group">
                                                <h6>The following person has been designated to handle inquiries regarding Vidushi Infotech SSP Pvt. Ltd.’s employment norms: Head of Human Resources, Cerebrum IT Park, B-3 Building, 2nd Floor, Office 3-A, Kalyani Nagar, Pune 411014</h6>
                                                       </div>
                                            </div>

                                            


                                           </div>
                                            
                                       
                                           <div class="col-lg-12">
                                                  <div class="form-group text-right">
                                           <button type="submit" name="submite10" class="btn btn-success btn-sm" >
                                            <i class="fa fa-dot-circle-o"></i> Save
                                        </button>
                                                </div>
                                              </div>
                                            
                                            
                                      </form>
                                    </div>
                                  </div>
          <!-- WAIVERS AND DISCLOSURES ended  --> </div>

          <div class="col-12">
                                               <div class="card-footer text-center" >
                                                <h5 style="color: green">Thank you for applying to Vidushi Infotech SSP Pvt. Ltd.</h5>
                                                       </div>
                                            </div>

          <!-- main row ended  -->  </div>


           <!-- END PAGE CONTAINER-->
        </div>

    </div>
  </div>

    