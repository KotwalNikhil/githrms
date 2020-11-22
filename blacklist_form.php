<?php include 'cand_base.php' ;

 $query =" SELECT * FROM blacklist WHERE fk ='$id' AND c_id=".$_SESSION['c_id'];
       $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
      $result = mysqli_fetch_array($ssql,MYSQLI_ASSOC);


 ?>

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


function change_source(value) {
if(value== "yes")
  {
     $("#blacklist_reason_input").prop('readonly', false);
     
    
    
  }
else if(value== "no")
  {
         $("#blacklist_reason_input").prop('readonly', true);
            document.getElementById("blacklist_reason_input").value = " ";

  }


}
</script>

<div class="row">
		<div class="col-lg-12">
                                <div class="card " id="Candidate-info" >
                                    <div class="card-header">
                                        <strong>Black-Listing</strong> 
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="insert_blacklist.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                           
                                            <div class="row form-group">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label  class=" form-control-label">Black List</label><br>
       <input onclick="change_source(this.value)" <?php if($result['yes_no']=="yes")echo'checked="checked"'; ?> type="radio" id="yes" name="yes_no" value="yes">
  <label for="yes">Yes</label><br>
  <input  onchange="change_source(this.value)" <?php if($result['yes_no']=="no")echo'checked="checked"'; ?>  type="radio" id="no" name="yes_no" value="no">
  <label for="no">No</label><br>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label  class=" form-control-label">Black-list Reason:</label>
                                           <textarea name="reason" readonly type="text" required="true" id="blacklist_reason_input" rows="3"  placeholder="Content..." class="form-control"><?php echo $result['reason'] ?></textarea>
                                               
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="postal-code" class=" form-control-label">Date of Blacklisting:</label>
     <input name="blacklist_date" type="date" id="postal-code" 
    value="<?php if($result['blacklist_date']=='') echo date("Y-m-d"); else echo $result['blacklist_date'] ?>" class="form-control" readonly >
                                          
                                                </div>
                                            </div>
                                                                            
                                            
                                                <div class="form-group">
                                                    <label for="company" class=" form-control-label">Recruiter's Name</label>
                                            <input name="rec_name" type="text" id="company" value="<?php echo $login_session; ?>" class="form-control" readonly>

                                               </div> 
                                            
                                        </div>
                                        <div class="card-footer">
                                        <button type="submit"  class="btn btn-success btn-sm" >
                                            <i class="fa fa-dot-circle-o"></i> Save
                                        </button>
                                        <a href="insert_blacklist.php?move=true"><button type="submit" class="btn btn-info btn-sm" >
                                            <i class="fa fa-dot-circle-o"></i> Next
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