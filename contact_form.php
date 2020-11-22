<?php include 'cand_base.php' ;

 $query =" SELECT * FROM contact_table WHERE fk ='$id' AND c_id=".$_SESSION['c_id'];
       $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
      $result = mysqli_fetch_array($ssql,MYSQLI_ASSOC); 

$rnum = $ssql->num_rows;

      //for skipping the form
     $skipy =" SELECT * FROM skip_module WHERE r_id ='$id' AND form_number=3 AND c_id=".$_SESSION['c_id'] ;
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
    <form action="insert_contact.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
      <div class="modal-body">
        <input name="skip_comment" type="text"  value="<?php echo $skip_result['skip_comment']; ?>" class="form-control" required><br>
           <label for="status" class=" form-control-label">status : </label>
           <?php if($skip_rnum==1 and $skip_result['skip_status']==1) echo '<font color="green">Approved</font>'; else if($skip_rnum==1 and $skip_result['skip_status']==0)  echo '<font color="orange">Under Observation</font>';
           else if($skip_rnum==1 and $skip_result['skip_status']==2)  echo '<font color="red">Rejected</font>'; ?>
      </div>
      <div class="modal-footer">
<a href="insert_contact.php?delete_skip=true"> <button type="button" class="btn btn-secondary" data-dismiss="modal">Delete request</button></a>
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


<div class="row">
		<div class="col-lg-12">
                                <div class="card " id="Candidate-info" >
                                    <div class="card-header">
                                        <strong>Contact Details</strong> 
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="insert_contact.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                           
                                            <div class="row form-group">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label  class=" form-control-label">Mobile No.</label>
       <input name="mobile" maxlength="10"  pattern="[0-9]{10}"type="text" id="city" value="<?php echo $result['mobile']; ?>"class="form-control"  required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label  class=" form-control-label">Alternate Mobile No.</label>
                                           <input name="alter_mobile" maxlength="10"   type="text" id="postal-code" value="<?php echo $result['alter_mobile']  ?>" class="form-control" required >
                                               <small class="form-text text-muted">Write NA if not available</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Email</label>
                                                     <input name="email" type="email" id="city" value="<?php echo $result['email'] ?>" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="postal-code" class=" form-control-label">Alternate Email</label>
                                           <input name="alter_email" type="text" id="postal-code" value="<?php echo $result['alter_email'] ?>" class="form-control" required >
                                               <small class="form-text text-muted">Write NA if not available</small>
                                          
                                                </div>
                                            </div>
                                        
                                         
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="postal-code" class=" form-control-label">Skype</label>
                                           <input name="skype" type="text" id="postal-code" value="<?php echo $result['skype'] ?>" class="form-control" required >
                                               <small class="form-text text-muted">Write NA if not available</small>

                                               </div> 
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                        <button type="submit"  class="btn btn-success btn-sm" >
                                            <i class="fa fa-dot-circle-o"></i> Save
                                        </button>
                                        <?php if($rnum==1) echo ' <a href="insert_contact.php?move=true"><button type="submit" class="btn btn-info btn-sm" >
                                            <i class="fa fa-dot-circle-o"></i> Next
                                        </button></a> '; ?>
                                         <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-warning btn-sm" hidden >
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