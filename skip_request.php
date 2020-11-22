<?php include 'base_hr.php';

// for skip request
$skip_query =" SELECT * FROM skip_module " ;
      $ssql = mysqli_query($db,$skip_query) or die( mysqli_error($db));
     //        $skip_result = mysqli_fetch_array($ssql,MYSQLI_ASSOC);
     // $skip_rnum = $ssql->num_rows;

	// $query = " SELECT username from loginform where id=$skip_result['r_id'] ";
	// 	$run = mysqli_query($db,$update);
 //     $rec_name=mysqli_fetch_array($ssql,MYSQLI_ASSOC);




 ?>


  <div class="main-content m-t-70" >
                <div class="section__content section__content--p30">
                    <div class="container-fluid" >
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

            <!-- MAIN CONTENT-->

            <div class="row">
            	<div class=" col-12 ">
                                <h3 class="title-1 m-b-25">Skip requests from recuriters </h3>
                                
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="table table-borderless table-striped table-earning emp_table">
                                        <thead>
                                            <tr>
                                                <th>Sr.No</th>
                                                <th>Name of recuriter</th>
                                                <th>Candidate ID</th>
                                                <th>Form name</th>
                                                <th>Reason</th>
                                                <th>Approve</th>   
                                                <th>Reject</th>                                              
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $i=1;
                                                while($row = mysqli_fetch_array($ssql)) {
                                                  if($row['skip_status']==2 or $row['skip_status']==1)continue;
                                                ?>
                                                <tr >
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php
                                                    $r_id=$row['r_id'];
													$query = " SELECT * from loginform where id='$r_id'";
												 	$run = mysqli_query($db,$query);
											 	    $rec_name=mysqli_fetch_array($run,MYSQLI_ASSOC);
                                                     echo $rec_name['username'];
                                                      ?></td>
                                                      <td><?php echo $row['c_id']; ?></td>
                                                      <td><?php
                                                      	$form_no=$row['form_number'];
                                                      	 if($form_no==1) echo 'sourcing form';
                                                      	 if($form_no==2) echo 'Candidate information';
                                                      	 if($form_no==3) echo 'contact details';
                                                      	 if($form_no==4) echo 'Employment form';
                                                      	 if($form_no==5) echo 'Upload Resume form';
                                                      	?></td>
                                                    <td><?php echo $row["skip_comment"]; ?></td>
<td><a href="<?php  echo 'select_reject_skip_request.php?select=true&row_id='.$row['id'] ; ?>"><button   class="btn btn-success btn-sm" >Approve</button></a></td>
<td><a href="<?php  echo 'select_reject_skip_request.php?delete=true&row_id='.$row['id'] ; ?>"><button   class="btn btn-danger btn-sm" >Reject</button></a></td>
                                                   
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
            <!-- END MAIN CONTENT-->


</div>
</div>
</div>