<?php include 'cand_base.php' ;

 

 ?>


 <div class="main-content p-t-30 m-t-70">
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



                        		<div class=" col-md-8">
                        		<h2 class="title-1 m-b-20">sign up candidate</h2>
                                <div class="card">
                                    <div class="card-header">First Make sure to choose a  valid Candidate who is selected in  interview.  </div>
                                    <div class="card-body card-block">
                                        <form action="do_cand_signup.php" method="post" class="">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">Candidate username</div>
                                                    <input type="text" id="" name="cand_name" class="form-control">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">Aadhar card no.</div>
                                                    <input type="text" id="" name="aadhar" class="form-control">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-envelope"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">Email ID</div>
                                                    <input type="text" id="" name="email" class="form-control">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-envelope"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-actions form-group">
                                                <button type="submit" name="submit1" class="btn btn-primary btn-sm">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        	</div>
                        </div>
                    </div>






                        <!---------------------->

                    </div>
                </div>
            
