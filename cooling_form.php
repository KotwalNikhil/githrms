<?php include 'cand_base.php' ;

 $query =" SELECT * FROM cooling_details WHERE fk ='$id' AND c_id=".$_SESSION['c_id'];
       $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
      $result = mysqli_fetch_array($ssql,MYSQLI_ASSOC);

 ?>



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
                                <div class="card " id="Candidate-info" >
                                    <div class="card-header">
                                        <strong>Cooling Period</strong> 
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="insert_cooling.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                          <div class="row form-group">
                                                <div class="col-6 ">
                                                <div class="form-group">
  

                                     <label for="postal-code" class=" form-control-label">Start Date:</label>
                                         <input name="start_date" type="date" id="datepicker1" value="<?php echo $result['start_date'] ?>"  class="form-control" required>
                                                </div>
                                            </div>
                                                <div class="col-6">
                                                <div class="form-group">
                                                    <label for="postal-code" class=" form-control-label">End Date:</label>
                                         <input name="end_date" type="date" id="datepicker2"  value="<?php echo $result['end_date'] ?>"  class="form-control" readonly>
                                          <small class="form-text text-muted">automatically +90 days from start date</small>

                                               </div>  
                                            </div>
                                            </div>
                                             <div class="card-footer">
                                           <button type="submit" name="submit" class="btn btn-success btn-sm" >
                                            <i class="fa fa-dot-circle-o"></i> Submit
                                        </button>
                                        <a href="insert_cooling.php?move=true"><button  name="submit" class="btn btn-primary btn-sm" >
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

