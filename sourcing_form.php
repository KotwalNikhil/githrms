<?php include 'cand_base.php' ;

 $query =" SELECT * FROM sourcing WHERE fk ='$id' AND c_id=".$_SESSION['c_id'];
       $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
      $result2 = mysqli_fetch_array($ssql,MYSQLI_ASSOC);
$rnum = $ssql->num_rows;


      //for skipping the form
     $skipy =" SELECT * FROM skip_module WHERE r_id ='$id' AND form_number=1 AND c_id=".$_SESSION['c_id'] ;
      $ssql = mysqli_query($db,$skipy) or die( mysqli_error($db));
            $skip_result = mysqli_fetch_array($ssql,MYSQLI_ASSOC);
     $skip_rnum = $ssql->num_rows;

 ?>



<script type="text/javascript">




function change_source(value) {
if(value== "Consultant")
	{
		 $("#Consultant").prop('readonly', false);
		 $("#Campus").prop('readonly', true);
		 $("#Others").prop('readonly', true);

		
		document.getElementById("Campus").value = " ";
		document.getElementById("Others").value = " ";
	}
else if(value== "Campus")
	{
				 $("#Consultant").prop('readonly', true);
				 $("#Campus").prop('readonly', false);
		 		 $("#Others").prop('readonly', true);

		
		document.getElementById("Consultant").value = " ";
		document.getElementById("Others").value = " ";


	}
else if(value== "Others")
	{
		$("#Consultant").prop('readonly', true);
		$("#Campus").prop('readonly', true);
		$("#Others").prop('readonly', false);

		document.getElementById("Consultant").value = " ";
		document.getElementById("Campus").value = " ";
	}
    else 
    {
        $("#Consultant").prop('readonly', true);
        $("#Campus").prop('readonly', true);
        $("#Others").prop('readonly', true);
        document.getElementById("Consultant").value = " ";
        document.getElementById("Campus").value = " ";
        document.getElementById("Others").value = " ";

    }
}





</script>

<section class="welcome2 p-t-30 p-b-10 m-t-45">
            <div class="container">
                
                <div class="row">
                    <div class="col-12">
                        <div class="welcome2-inner m-t-10">
                            <div class="welcome2-greeting">
                                <h1 class="title-6">
                                   Kindly fill the details below</h1>
                                <h4>False details may lead to the rejection of your candidature</h4>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>

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
    <form action="insert_sourcing.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
      <div class="modal-body">
        <input name="skip_comment" type="text"  value="<?php echo $skip_result['skip_comment']; ?>" class="form-control" required><br>
           <label for="status" class=" form-control-label">status : </label>
           <?php if($skip_rnum==1 and $skip_result['skip_status']==1) echo '<font color="green">Approved</font>'; else if($skip_rnum==1 and $skip_result['skip_status']==0)  echo '<font color="orange">Under Observation</font>';
           else if($skip_rnum==1 and $skip_result['skip_status']==2)  echo '<font color="red">Rejected</font>'; ?>
      </div>
      <div class="modal-footer">
       <a href="insert_sourcing.php?delete_skip=true"> <button type="button" class="btn btn-secondary" data-dismiss="modal">Delete request</button></a>
        <button type="submit"  name="skip" class="btn btn-primary">Send request to HR</button>
      </div>
  </form>
    </div>
  </div>
</div>

<!--------------------------close popup form --------------------->

<div class="main-content p-t-30">
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
                                <div class="card">
                               <form action="insert_sourcing.php" method="POST" enctype="multipart/form-data" class="form-horizontal">

                                    <div class="card-header">
                                        <strong>Sourcing details</strong>
                                    </div>
                                    <div class="card-body card-block">
                                    	 <div class="row form-group">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Candidate Profile No.</label>
                                                     <input name="profile_no" type="text" id="city" value="<?php echo $_SESSION['c_id']; ?> " class="form-control" readonly>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="postal-code" class=" form-control-label">Profile Creation date</label>
                                            <input name="profile_create_date" type="date" id="postal-code" 
    value="<?php if($result2['profile_date']=='') echo date("Y-m-d"); else echo $result2['profile_date'] ?>" class="form-control" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Recruiter's Name</label>
                                            <input name="name" type="text" id="company" value="<?php echo $login_session; ?>" class="form-control" readonly>
                                        </div>
                                         <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="selectSm" class=" form-control-label">Source</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="source" id="SelectLm" class="form-control-sm form-control" onchange="change_source(this.value)" required>
                    <option <?php if($result2['source']=="")echo'selected="true"'; ?> hidden value="">Please select</option>
                    <option <?php if($result2['source']=="Consultant")echo'selected="true"'; ?> value="Consultant">Consultant</option>
                            <option <?php if($result2['source']=="Campus")echo'selected="true"'; ?> value="Campus">Campus</option>
                            <option <?php if($result2['source']=="Others")echo'selected="true"'; ?> value="Others">Others</option>
                            <option <?php if($result2['source']=="Naukri")echo'selected="true"'; ?> value="Naukri">Naukri</option>
                             <option <?php if($result2['source']=="Moster")echo'selected="true"'; ?> value="Moster">Moster</option>

                            <option <?php if($result2['source']=="Times Jobs")echo'selected="true"'; ?> value="Times Jobs">Times Jobs</option>
                            <option <?php if($result2['source']=="Indeed")echo'selected="true"'; ?> value="Indeed">Indeed</option>
                            <option <?php if($result2['source']=="LinkedIn")echo'selected="true"'; ?> value="LinkedIn">LinkedIn</option>
                         <option <?php if($result2['source']=="Facebook")echo'selected="true"'; ?> value="Facebook">Facebook</option>
                         <option <?php if($result2['source']=="Google")echo'selected="true"'; ?> value="Google">Google</option>
                         <option <?php if($result2['source']=="Employee referral")echo'selected="true"'; ?> value="Employee referral">Employee referral</option>
                         <option <?php if($result2['source']=="Walk in")echo'selected="true"'; ?> value="Walk in">Walk in</option>
                          <option <?php if($result2['source']=="Campus recruitment")echo'selected="true"'; ?> value="Campus recruitment">Campus recruitment</option>
                        
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                            <div class="col-8">

                                        <div class="form-group">
                                            <label for="vat" class=" form-control-label">Consultant name</label>
                            <input name="consultant" type="text" id="Consultant" value="<?php echo $result2['consultant_source']; ?>" placeholder="" class="form-control" readonly="true" required>
                                        </div>
                                    		</div>

                                             <div class="col-8">
                                        <div class="form-group">
                                            <label for="street" class=" form-control-label">Campus name</label>
                                            <input name="campus" type="text" id="Campus" value="<?php echo $result2['campus_source']; ?>" placeholder="" class="form-control" readonly="true" required>
                                        </div>
                                    		</div>
                                        
                                            <div class="col-8">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Others</label>
                                                    <input name="others" type="text" id="Others" value="<?php echo $result2['other_source']; ?>" placeholder="" class="form-control" readonly="true" required>
                                                </div>
                                            </div>
                                          
                                        </div>
                                        
                                        
                                    </div>
                                     <div class="card-footer">
                                        <button type="submit" class="btn btn-success btn-sm" >
                                            <i class="fa fa-dot-circle-o"></i> Save
                                        </button>
                                        <?php if($rnum==1) echo '<a href="insert_sourcing.php?move=true"><button class="btn btn-info btn-sm" >
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
