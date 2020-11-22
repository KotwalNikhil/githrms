
<?php include 'cand_base.php' ;



$query =" SELECT * FROM employment_table WHERE fk ='$id' AND c_id=".$_SESSION['c_id'];
       $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
      $result1 = mysqli_fetch_array($ssql,MYSQLI_ASSOC);
$rnum = $ssql->num_rows;


 //for skipping the form
     $skipy =" SELECT * FROM skip_module WHERE r_id ='$id' AND form_number=4 AND c_id=".$_SESSION['c_id'] ;
      $ssql = mysqli_query($db,$skipy) or die( mysqli_error($db));
            $skip_result = mysqli_fetch_array($ssql,MYSQLI_ASSOC);
     $skip_rnum = $ssql->num_rows;

 ?>

 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
 <script src="//geodata.solutions/includes/countrystatecity.js"></script>

 <!--------------- pop up form---------------->
                                        <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add a reason to skip the form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form action="insert_employment.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
      <div class="modal-body">
        <input name="skip_comment" type="text"  value="<?php echo $skip_result['skip_comment']; ?>" class="form-control" required><br>
           <label for="status" class=" form-control-label">status : </label>
           <?php if($skip_rnum==1 and $skip_result['skip_status']==1) echo '<font color="green">Approved</font>'; else if($skip_rnum==1 and $skip_result['skip_status']==0)  echo '<font color="orange">Under Observation</font>';
           else if($skip_rnum==1 and $skip_result['skip_status']==2)  echo '<font color="red">Rejected</font>'; ?>
      </div>
      <div class="modal-footer">
        <a href="insert_employment.php?delete_skip=true"> <button type="button" class="btn btn-secondary" data-dismiss="modal">Delete request</button></a>
        <button type="submit"  name="skip" class="btn btn-primary">Send request to HR</button>
      </div>
  </form>
    </div>
  </div>
</div>

<!--------------------------close popup form --------------------->

<div class="main-content p-t-80">
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
                        <div class="row">
                        	<div class="col-lg-12">
                                <div class="card " id="emp-info" >
                                    <div class="card-header">
                                        <strong>Employment Details</strong> 
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="insert_employment.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                           
                                            <div class="row form-group">
                                               
                                              <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Fresher </label>
                                                </div>
                                              </div>
                                            <div class="col-lg-3">
                                                  <div class="form-group">
                                                    <input name="fresher" <?php if($result1['fresher']=="yes")echo'checked="true"'; ?> type="radio" id="fresheryes" value="yes"class="form-control-radio" required>
                                                    <label for="city" class=" form-control-label">YES </label>
                                            
                                                </div>
                                              </div>
                                              <div class="col-lg-3">
                                                  <div class="form-group">
                                                    <input name="fresher" <?php if($result1['fresher']=="no")echo'checked="true"'; ?> type="radio" id="fresher" value="no"class="form-control-radio" required>
                                                    <label for="city" class=" form-control-label">NO</label>
                                            
                                                </div>
                                              </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Total Experience</label>
                                            <input name="tot_exp" type="text" id="city" value="<?php echo $result1['tot_exp'] ?>" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="postal-code" class=" form-control-label">Relevant Experience</label>
                                           <input name="rel_exp" type="text" id="postal-code" value="<?php echo $result1['rel_exp'] ?>" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Current Location</label>
                                                     
                                                       <p style="color:black;font-style: italic;">selected country- <?php echo $result1['country'] ?></p>

                                                     <select name="country" class="countries" id="countryId">

                                                      <option value="<?php echo $result1['country'] ?>"><?php echo $result1['country'] ?></option>
                                                  </select>
                                                  <br><br>
                                                   <p style="color:black;font-style: italic;">selected state- <?php echo $result1['state'] ?></p>
                                                  <select name="state" class="states" id="stateId">
                                                   
                                                      <option value="<?php echo $result1['state'] ?>">Select State</option>
                                                  </select>
                                                  <br><br>
                                                  <p style="color:black;font-style: italic;">selected city- <?php echo $result1['city'] ?></p>
                                                  <select name="city" class="cities" id="cityId">
                                                      <option value="<?php echo $result1['city'] ?>">Select City</option>
                                                  </select>
                                              </div>
                                            </div>
                                                 <div class="col-6">
                                                <div class="form-group">
                                                    <label for="postal-code" class=" form-control-label">Current company</label>
                                           <input name="curr_company" type="text" id="postal-code" value="<?php echo $result1['curr_company'] ?>" class="form-control" required >
                                          
                                                </div>
                                            </div>
                                        
                                         
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="postal-code" class=" form-control-label">Current CTC</label>
                                           <input name="curr_ctc" type="text" id="postal-code" value="<?php echo $result1['curr_ctc'] ?>" class="form-control" required>

                                               </div> 
                                            </div>
                                             <div class="col-6">
                                                <div class="form-group">
                                                    <label for="postal-code" class=" form-control-label">Expected CTC</label>
                                           <input name="exp_ctc" type="text" id="postal-code" value="<?php echo $result1['exp_ctc'] ?>" class="form-control"required >

                                               </div> 
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="postal-code" class=" form-control-label">CTC Negoatiable </label>
                                           <input name="ctc_neg" type="text" id="postal-code"  pattern="[a-zA-Z][a-zA-Z ]+" value="<?php echo $result1['ctc_neg'] ?>" class="form-control" required >
                                               <small class="form-text text-muted">yes or no</small>

                                              </div> 
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="postal-code" class=" form-control-label">Negoatiable Upto</label>
                                           <input name="neg_upto" type="text" id="postal-code"  value="<?php echo $result1['neg_upto'] ?>" class="form-control" required >
                                               <small class="form-text text-muted">If yes else NA</small>

                                               </div> 
                                            </div>
                                             <div class="col-6">
                                                <div class="form-group">
                                                    <label for="postal-code" class=" form-control-label">Notice Period</label>
                                           <input name="notice_period" type="text" id="postal-code" value="<?php echo $result1['notice_period'] ?>" class="form-control" required>

                                               </div> 
                                            </div>
                                             <div class="col-6">
                                                <div class="form-group">
                                                    <label for="postal-code" class=" form-control-label">Joining Period</label>
                                           <input name="joining_period" type="text" id="postal-code" value="<?php echo $result1['joining_period'] ?>" class="form-control" required >

                                               </div> 
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Reason for Job Change</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea name="reason_job_change" type="text" required="true" value ="<?php echo $result1['reason_job_change'] ?>" id="textarea-input" rows="5" placeholder="Content..." class="form-control"><?php echo $result1['reason_job_change'] ?></textarea>
                                                </div>
                                            </div>
                                        <div class="card-footer">
                                        <button type="submit" class="btn btn-success btn-sm" >
                                            <i class="fa fa-dot-circle-o"></i> Save
                                        </button>
                                        <?php if($rnum==1) echo ' <a href="insert_employment.php?move=true"><button type="submit" class="btn btn-info btn-sm" >
                                            <i class="fa fa-dot-circle-o"></i>Next
                                        </button></a> '; ?>
                                        <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-warning btn-sm" hidden>
                                            <i class="fa fa-dot-circle-o"></i> Skip
                                        </button>
                                    </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
