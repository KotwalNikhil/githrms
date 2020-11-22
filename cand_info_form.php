<?php include 'cand_base.php' ;

$query =" SELECT * FROM Candidate_info WHERE fk ='$id'AND c_id=".$_SESSION['c_id'];
       $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
      $result3 = mysqli_fetch_array($ssql,MYSQLI_ASSOC);
$rnum = $ssql->num_rows;

      //for skipping the form
     $skipy =" SELECT * FROM skip_module WHERE r_id ='$id' AND form_number=2 AND c_id=".$_SESSION['c_id'] ;
      $ssql = mysqli_query($db,$skipy) or die( mysqli_error($db));
            $skip_result = mysqli_fetch_array($ssql,MYSQLI_ASSOC);
     $skip_rnum = $ssql->num_rows;

 ?>

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
    <form action="insert_details.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
      <div class="modal-body">
        <input name="skip_comment" type="text"  value="<?php echo $skip_result['skip_comment']; ?>" class="form-control" required><br>
           <label for="status" class=" form-control-label">status : </label>
           <?php if($skip_rnum==1 and $skip_result['skip_status']==1) echo '<font color="green">Approved</font>'; else if($skip_rnum==1 and $skip_result['skip_status']==0)  echo '<font color="orange">Under Observation</font>';
           else if($skip_rnum==1 and $skip_result['skip_status']==2)  echo '<font color="red">Rejected</font>'; ?>
      </div>
      <div class="modal-footer">
        <a href="insert_details.php?delete_skip=true"> <button type="button" class="btn btn-secondary" data-dismiss="modal">Delete request</button></a>
        <button type="submit"  name="skip" class="btn btn-primary">Send request to HR</button>
      </div>
  </form>
    </div>
  </div>
</div>

<!--------------------------close popup form --------------------->

<div class="main-content m-t-70">
                <div class="section__content section__content--p30">
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
<script type="text/javascript">
  function only(input) {
    var regex = /[a-zA-Z]{2}[0-9]/gi;
    input.value = input.value.replace(regex,"NA");
    
   var space= /\s/g;
    input.value = input.value.replace(space,"");
    
      }
</script>

  
<div class="row">
	       <div class="col-lg-12">
                                <div class="card " id="Candidate-info">
                                    <div class="card-header">
                                        <strong>Candidate Information</strong> 
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="insert_details.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                           
                                            <div class="row form-group">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Candidate First Name</label>
                                                     <input name="firstname" type="text" id="city" value="<?php echo $result3['first_name']  ?>" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="postal-code" class=" form-control-label">Last Name</label>
                                 <input name="lastname" type="text" id="postal-code" value="<?php echo $result3['last_name']  ?>" class="form-control" required >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Date of birth</label>
                                                     <input name="dob" type="date" id="city" value="<?php echo $result3['dob']  ?>" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="postal-code" class=" form-control-label">Gender</label>
                                           <input name="gender" type="text" id="postal-code" value="<?php echo $result3['gender']  ?>" class="form-control" required >
                                               <small class="form-text text-muted">Write M/F/Other</small>
                                          
                                                </div>
                                            </div>
                                              <div class="col-8">
                                                <div class="form-group">
                                     <label for="postal-code" class=" form-control-label">Aadhar Card</label>
                                    <input name="aadharcard" maxlength="12" onkeyup="only(this)" title="  E.g. 123412341234 or NA" type="text" id="postal-code" value="<?php echo $result3['adhar']?>" pattern="(^\d{12}$|NA)" placeholder="" class="form-control"  required>
                                     <small class="form-text text-muted">Write NA if not applicable</small>

                                          
                                                </div>
                                            </div>
                                              <div class="col-8">
                                                <div class="form-group">
                                                    <label for="postal-code" class=" form-control-label">Pan Card</label>
                                           <input name="pancard" maxlength="10" pattern="([a-zA-Z]{5}[0-9]{4}[a-zA-Z]{1}|NA)" type="text" id="postal-code" value="<?php echo $result3['pan']  ?>" title=" E.g. AAAAA9999A or NA" placeholder="" class="form-control"  required>
                                      <small class="form-text text-muted">Leave blank if not available</small>
                                         
                                                </div>
                                            </div>
                                        
                                              <div class="col-12 col-md-8">
                                             <div class=" form-group">    
                                                    <label for="postal-code" class=" form-control-label">Technology Domain</label>

                                                    <select name="tech-domain" id="SelectLm"  value="<?php echo $result3['technology']  ?>" class="form-control-sm form-control"  required>
                                <option <?php if($result3['technology']=="")echo'selected="true"'; ?> hidden value="">Please select</option>
                                <option <?php if($result3['technology']=="php developer")echo'selected="true"'; ?> value="php developer"> php developer</option>
                                <option <?php if($result3['technology']=="pyhthon developer")echo'selected="true"'; ?> value="pyhthon developer">pyhthon developer</option>
                                <option <?php if($result3['technology']=="Others")echo'selected="true"'; ?> value="Others">Others</option>
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                        <button type="submit" class="btn btn-success btn-sm" >
                                            <i class="fa fa-dot-circle-o"></i> Save
                                        </button>
                                        <?php if($rnum==1) echo '<a href="insert_details.php?move=true"><button  class="btn btn-info btn-sm" >
                                            <i class="fa fa-dot-circle-o"></i> Next
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
