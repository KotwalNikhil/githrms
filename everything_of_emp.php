<?php include 'base_hr.php';

$c_id=$_GET['c_id'];
$row_id=$_GET['row_id'];

$query =" SELECT * FROM e1 WHERE fk ='$row_id' AND c_id='$c_id'";
       $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
      $e1 = mysqli_fetch_array($ssql,MYSQLI_ASSOC);
             $rnum_e1 = $ssql->num_rows;

      $query =" SELECT * FROM e5 WHERE fk ='$row_id' AND c_id='$c_id'";
       $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
      $e5 = mysqli_fetch_array($ssql,MYSQLI_ASSOC);
      $rnum_e2 = $ssql->num_rows;

      $query =" SELECT * FROM e2 WHERE fk ='$row_id' AND c_id='$c_id'";
       $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
      $e2 = mysqli_fetch_array($ssql,MYSQLI_ASSOC);
      $rnum_e3 = $ssql->num_rows;

      

 ?>

  <div class="main-content m-t-70" >
                <div class="section__content section__content--p30">
                    <div class="container-fluid" >
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

                         if($rnum_e3 ==0 or $rnum_e2 ==0 or $rnum_e1 ==0 )
      {
        echo '<div class="alert alert-danger alert-dismissible" id="myalert">';
                                  echo '<span class="close " data-dismiss="alert">&times;</span>';
                                 echo  'His Employment form is incomplete.';
                                echo '</div>';
      }
?>


            <!-- MAIN CONTENT-->
            <div class="row">
              <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Employee database of <?php echo $e1["full_name"]; ?></strong>
                                        <small> </small>
                                    </div>
                                    <div class="card-body card-block">
                                    	 <div class="row form-group">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Emp ID</label>
                                            <input name="tot_exp" type="text" id="city" value="<?php echo $row_id ?>" disabled class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="postal-code" class=" form-control-label">Name</label>
                                           <input name="rel_exp" type="text" id="postal-code" value="<?php echo $e1['full_name']; ?>" disabled class="form-control" >
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="row form-group">
                                        	<div class="col-6">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Gender</label>
                                                    <input type="text" id="city" disabled placeholder="<?php echo $e1['gender']; ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">DOB</label>
                                                    <input type="text" id="city" disabled value="<?php echo $e1['dob']; ?>" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <br class="my-4">
                                         <div class="row form-group">                                       
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="postal-code" class=" form-control-label">AGE</label>
                                                    <input type="text" id="postal-code" disabled value="<?php echo $e1['age']; ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="postal-code" class=" form-control-label">Marital Status</label>
                                                    <input type="text" id="postal-code" value="<?php echo $e1['marital_status']; ?>" disabled class="form-control">
                                                </div>
                                            </div>
                                        
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Father/Husband name</label>
                                                    <input type="text" id="city" placeholder="" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row form-group">
                                        	<div class="col-6">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Designation</label>
                                                    <input type="text" id="city" placeholder="" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Grade</label>
                                                    <input type="text" id="city" placeholder="" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        
                                   
                            
                                           
                                            <div class="row form-group">
                                            <div class="col-6">
                                                <div class="form-group">
                                                  <label for="city" class=" form-control-label">Department</label>
                                            <input name="tot_exp" type="text" id="city" value="" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                 <label for="postal-code" class=" form-control-label">Reporting Manager</label>
                                           <input name="rel_exp" type="text" id="postal-code" value="" class="form-control" >
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                         <div class="row form-group">
                                            <div class="col-4">
                                                <div class="form-group">
                                                  <label for="city" class=" form-control-label">Highest Qualification</label>
                                            <input name="tot_exp" type="text" id="city" value="<?php echo $e5['course1']; ?>" class="form-control" disabled>
                                                </div>
                                            </div>
                                            
                                            <div class="col-4">
                                                <div class="form-group">
                                                 <label for="postal-code" class=" form-control-label">Date of Joining</label>
                                           <input name="rel_exp" type="text" id="postal-code" value="" class="form-control" >
                                                </div>
                                            </div>
                                        
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Joining Month</label>
                                                    <input type="text" id="city" placeholder="" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Joining Quarter</label>
                                                     <input name="curr_location" type="text" id="city" value="" class="form-control" >
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="postal-code" class=" form-control-label">Confirmation <br>Apparisal Due on</label>
                                           <input name="curr_company" type="text" id="postal-code" value="" class="form-control" >
                                          
                                                </div>
                                            </div>
                                        
                                         
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="postal-code" class=" form-control-label">Confirmed On</label>
                                           <input name="curr_ctc" type="text" id="postal-code" value="" class="form-control" >

                                               </div> 
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Appraisal Due Month</label>
                                                     <input name="curr_location" type="text" id="city" placeholder="8.33% of Basic" value="" class="form-control" >
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="postal-code" class=" form-control-label">Salary A/C No. (ICICI)</label>
                                           <input name="curr_company" type="text" id="postal-code" value="" class="form-control" >
                                          
                                                </div>
                                            </div>
                                        
                                         
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="postal-code" class=" form-control-label">Pan No.</label>
                                           <input name="curr_ctc" type="text" disabled id="postal-code" value="<?php echo $e1['pancard']; ?>" class="form-control" >

                                               </div> 
                                            </div>
                                        </div>

                                         <div class="row form-group">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Aadhaar Card</label>
                                                     <input name="curr_location"  disabled type="text" id="city" placeholder="" value="<?php echo $e1['aadhar']; ?>" class="form-control" >
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="postal-code" class=" form-control-label">Passport No.</label>
                                           <input name="curr_company" type="text"  disabled id="postal-code" value="<?php echo $e1['passport']; ?>" class="form-control" >
                                          
                                                </div>
                                            </div>
 										<br class="my-4">
                                        </div>
											<div class="row form-group">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Landline* (Res.)  Alternate Mobile</label>
                                                     <input name="curr_location" type="text" id="city" placeholder="" value="<?php echo $e2['c_landline']; ?>" disabled class="form-control" >
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="postal-code" class=" form-control-label">Mobile</label>
                                           <input name="curr_company" type="text" id="postal-code" value="<?php echo $e2['c_mobile']; ?>" disabled class="form-control" >
                                          
                                                </div>
                                            </div>
 
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Emergency Contact</label>
                                                     <input name="curr_location" type="text" id="city"  value="<?php echo $e2['emergency_num']; ?>" disabled class="form-control" >
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="postal-code" class=" form-control-label">Personal E-mail ID</label>
                                           <input name="curr_company" type="text" id="postal-code" value="<?php echo $e2['c_email']; ?>" disabled class="form-control" >
                                          
                                                </div>
                                            </div>
                                        
                                         
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="postal-code" class=" form-control-label">Permanent Address</label>
                                           <input name="curr_ctc" type="text" id="postal-code" value="<?php if($e2['same_address']=="yes"){ echo "  ".$e2['c_landmark']." , ".$e2['c_city']." , ".$e2['c_state']." , ".$e2['c_pincode']." ";}
                                           else { echo "  ".$e2['p_landmark']." , ".$e2['p_city']." , ".$e2['p_state']." , ".$e2['p_pincode']." "; } ?>" disabled  class="form-control" >

                                               </div> 
                                            </div>
                                        </div>

										<div class="row form-group">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Current Address</label>
                                                     <input name="curr_location" type="text" id="city" placeholder="" value="<?php echo "  ".$e2['c_landmark']." , ".$e2['c_city']." , ".$e2['c_state']." , ".$e2['c_pincode']." "; ?>" disabled class="form-control" >
                                                </div>
                                            </div>
                                        </div>
                                          <div class="row form-group">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Blood Group</label>
                                                     <input name="curr_location" type="text" id="city" disabled placeholder="" value="<?php echo $e1['bg']; ?>" class="form-control" >
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="postal-code" class=" form-control-label">Hiring Status</label>
                                           <input name="curr_company" type="text" id="postal-code" value="" class="form-control" >
                                          
                                                </div>
                                            </div>
                                        
                                         
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="postal-code" class=" form-control-label">Employee Status (Working,<br> Absconding,Terminated, Resigned)</label>
                                           <input name="curr_ctc" type="text" id="postal-code" value="" class="form-control" >

                                               </div> 
                                            </div>
                                        </div>
                                      
                                    
                                       
                                        </div>
                                </div>
                            </div>



                        </div>
            <!-- END MAIN CONTENT-->


</div>
</div>
</div>