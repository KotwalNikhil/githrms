<?php include 'cand_base.php' ;
$query =" SELECT * FROM offer_details WHERE fk ='$id' AND c_id=".$_SESSION['c_id'];
       $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
      $result = mysqli_fetch_array($ssql,MYSQLI_ASSOC);

  

 ?>


<script type="text/javascript">
    
function active(value){
    if(value== "yes"){
 $("#actualdoj").prop('readonly', false);        

    }
    else if(value== "no")
    {
        
 $("#actualdoj").prop('readonly', true);        
    }
}

    
</script>


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
                                        <strong>Offer Details</strong> 
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="insert_offerdetails.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                           
                                            <div class="row form-group">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label  class=" form-control-label">Offer Date</label>
       <input name="offer_date" type="date"  value="<?php  echo $result['offer_date'] ?>" id="city" class="form-control"  required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label  class=" form-control-label">CTC offered</label>
                                           <input name="ctc" type="text" value="<?php echo $result['ctc'] ?>" id="city" class="form-control" required >
                                               </div>
                                            </div>
                                        </div>

                                        
                                        <div class="row form-group">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">DOJ offered</label>
                  <input name="doj" type="date" value="<?php  echo $result['doj'] ?>" id="city" class="form-control"  required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                     <label for="selectSm" class=" form-control-label">Joined ?</label>

                     <select name="joined"  class="form-control-sm form-control" onchange="active(this.value)" >
                    <option hidden id="default2" value=" ">select option </option>
                            <option <?php if($result['joined']=="yes"){echo'selected="true"';} ?> value="yes">YES</option>
                             <option <?php if($result['joined']=="no"){echo'selected="true"';} ?> value="no">NO</option>

                                               
                                            </select>
                                          
                                                </div>
                                            </div>
                                        
                                           <div class="col-6">
                                                <div class="form-group">
                                                  <label for="city" class=" form-control-label">Reporting Time </label><br>
                                 <input type="time" id="city" name="reporting_time" value="" required>
                                               </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label  class=" form-control-label">Actual DOJ</label>
       <input name="actual_doj" type="date" value="<?php  echo $result['actual_doj'] ?>" id="actualdoj" class="form-control"   readonly="true">


                                               </div> 
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                            <label  class=" form-control-label">Technical Assessment Form / Feedback</label>
                                             <input type="file" name="pancard" value="fileupload" id="fileupload" >
                                               </div> 
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label  class=" form-control-label">HR Assessment form / Feedback</label>
                                             <input type="file" name="pancard" value="fileupload" id="fileupload" >
                                               </div> 
                                            </div>

                                        </div>
                                        <div class="card-footer">
                                        <button type="submit"  class="btn btn-success btn-sm" >
                                            <i class="fa fa-dot-circle-o"></i> Save
                                        </button>
                                        <a href="insert_offerdetails.php?move=true"><button class="btn btn-info btn-sm" >
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