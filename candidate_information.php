<?php include 'index2.php' ;



$query =" SELECT * FROM employment_table WHERE fk ='$id' ";
       $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
      $result1 = mysqli_fetch_array($ssql,MYSQLI_ASSOC);


 ?>

 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
 <script src="//geodata.solutions/includes/countrystatecity.js"></script>


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
                                        <a href="insert_employment.php?move=true"><button type="submit" class="btn btn-info btn-sm" >
                                            <i class="fa fa-dot-circle-o"></i>Next
                                        </button></a>
                                    </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
