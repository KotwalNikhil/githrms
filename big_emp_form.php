<?php include 'base_hr.php' ?>


  <div class="main-content" >
                <div class="section__content section__content--p30">
                    <div class="container-fluid" >

                       
                    
                       
   <div class="row">

                        	<div class="col-lg-12">
                                <div class="card">
                                 <form action="insert_sourcing.php" method="POST" enctype="multipart/form-data" class="form-horizontal" onsubmit="return Sourcing_done()">

                                    <div class="card-header">
                                        <strong>Sourcing details</strong>
                                    </div>
                                    <div class="card-body card-block">
                                    	 <div class="row form-group">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Candidate Profile No.</label>
                                                     <input name="profile_no" type="text" id="city" value="<?php echo htmlspecialchars( $id); ?> " class="form-control" readonly>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="postal-code" class=" form-control-label">Profile Creation date</label>
                                            <input name="profile_create_date" type="date" id="postal-code" 
    value="<?php if($result2['profile_date']==' ') echo date("Y-m-d"); else echo $result2['profile_date'] ?>" class="form-control" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Recruiter's Name</label>
                                            <input name="name" type="text" id="company" value="" class="form-control" >
                                        </div>
                                         <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="selectSm" class=" form-control-label">Source</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="source" id="SelectLm" class="form-control-sm form-control" onchange="change_source(this.value)" required>
                                                        <option selected hidden value="">Please select</option>
                                                  		<option value="1"> Consultant</option>
                                                        <option value="2">Campus</option>
                                                        <option value="3">Others</option>
                                                        
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
                                        <button type="submit" class="btn btn-info btn-sm" >
                                            <i class="fa fa-dot-circle-o"></i> update
                                        </button>
                                    </div>
                                </form>
                                </div>
                                
                            </div>
                        </div>
   
 </div>
                    </div>
                </div>
