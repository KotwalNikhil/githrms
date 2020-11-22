<?php include 'base_hr.php';

$c_id=$_SESSION['c_id'];
              

$query =" SELECT * FROM loginform WHERE authority=4  ";
     $ssql_generated_profile = mysqli_query($db,$query) or die( mysqli_error($db));

$query =" SELECT * FROM extra_details WHERE c_id ='$c_id' ";
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


                           if($c_id==0)
                            {
                                echo '<div class="alert alert-danger alert-dismissible" id="myalert">';
                                  echo '<span class="close " data-dismiss="alert">&times;</span>';
                                 echo  'Please choose a candidate from below table';
                                echo '</div>';
                            }
                          
                        ?>

<div class="row">
              <div class=" col-12 ">
                                <h3 class="title-1 m-b-25">Candidates with generated profile </h3>
                                
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="table table-borderless table-striped table-earning emp_table">
                                        <thead>
                                            <tr>
                                                <th>Sr.No</th>
                                                
                                                <th>Candidate ID</th>
                                                <th>Candidate name</th>
                                                <th>Candidate Email</th>
                                                <th>select</th>
                                                                                            
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $i=1;
                                                while($row = mysqli_fetch_array($ssql_generated_profile)) {
                                                  //if($row['review']!="" or $row['response']==1)continue;
                                                ?>
                                                <tr <?php if($c_id==$row['special_id'])echo 'style="background-color:lightgreen;" '; ?>  >
                                                    <td><?php echo $i; ?></td>
                                                     <td><?php echo $row["special_id"] ?></td>
                                                  <td><?php echo $row["username"] ?></td>
                                                  <td><?php echo $row["email"] ?></td>
                                                   

                                                     
                                                      
<td><a href="<?php  echo 'insert_extra_details.php?select=true&c_id='.$row['special_id'] ; ?>"><button   class="btn btn-primary btn-sm" >Choose</button></a></td>

                                                   
                                                </tr>
                                                <?php
                                                $i++;
                                                }
                                            ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
            </div>
            <!-- MAIN CONTENT-->
            <div class="row">
              <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Employee Extra details</strong>
                                    </div>
                                    <div class="card-body card-block">
                                         <form action="insert_extra_details.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                         <div class="row form-group">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Grade</label>
                                            <input name="Grade" type="text" id="city" value='<?php echo $result["Grade"]; ?>' class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="postal-code" class=" form-control-label">Class</label>
                                           <input name="Class" type="text" id="postal-code" value='<?php echo $result["Class"]; ?>'class="form-control" required >
                                                </div>
                                            </div>
                                           <div class="col-4">
                                            <div class="form-group">
                                                    <label for="city" class=" form-control-label">Department</label>
                                                    <input name="Department" type="text" id="datepicker1" value='<?php echo $result["Department"]; ?>' class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                    	 <div class="row form-group">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Appraisal Due Month</label>
                                            <input name="Appraisal_Due_Month" type="text" id="city" value='<?php echo $result["Appraisal_Due_Month"]; ?>' class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="postal-code" class=" form-control-label">Loyalty bonus amount due</label>
                                           <input name="Loyalty_bonus" type="text" id="postal-code" value='<?php echo $result["Loyalty_bonus"]; ?>' class="form-control" >
                                                </div>
                                            </div>
                                           <div class="col-4">
                                            <div class="form-group">
                                                    <label for="city" class=" form-control-label">Function</label>
                                                    <input name="Function" type="text" id="datepicker1" value='<?php echo $result["Function"]; ?>' class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="row form-group">
                                        	
                                            
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="postal-code" class=" form-control-label">Business Domain</label>
                                                    <input type="text" name="Business_Domain" value='<?php echo $result["Business_Domain"]; ?>' id="postal-code" placeholder="" class="form-control">
                                                </div>
                                            </div>
                                              <div class="col-4">
                                                <div class="form-group">
                                                    <label for="postal-code" class=" form-control-label">SBU</label>
                                                    <input type="text" name="SBU" value='<?php echo $result["SBU"]; ?>' id="postal-code" placeholder="" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Business Type</label>
                                                    <input type="text" name="Business_Type" value='<?php echo $result["Business_Type"]; ?>' id="city" placeholder="" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <br class="my-4">
                                         <div class="row form-group">                                       
                                           
                                          
                                        
                                            
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">VIT Experience</label>
                                                    <input type="text" name="VIT_Experience" value='<?php echo $result["VIT_Experience"]; ?>' id="city" placeholder="" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="postal-code" class=" form-control-label">Total Experience</label>
                                                    <input type="text" name="Total_Experience" value='<?php echo $result["Total_Experience"]; ?>' id="postal-code" placeholder="" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-group">                                       
                                           
                                            
                                        
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">PF number</label>
                                                    <input type="text" name="PF_number" value='<?php echo $result["PF_number"]; ?>' id="city" placeholder="" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">PF-UAN</label>
                                                    <input type="text" name="PF_UAN" value='<?php echo $result["PF_UAN"]; ?>' id="city" placeholder="" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                           <button type="submit" name="save" class="btn btn-success btn-sm" >
                                            <i class="fa fa-dot-circle-o"></i> Save
                                        </button>
                                        
                                    </div>


                            <!--- =======================  -->
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

                                        