<?php include 'cand_base.php' ;

        $query =" SELECT * FROM candidate_table WHERE r_id ='$id' ORDER BY id DESC ";
       $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
      //$result2 = mysqli_fetch_array($ssql,MYSQLI_ASSOC);

       
$c_id=$_SESSION['c_id'];

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
                       
            <!-- MAIN CONTENT-->

            <div class="row">
                            

                            <div class="col-12 col-md-8  ">
                                <h2 class="title-1 m-b-20">Add a candidate</h2>
                                <div class="card">
                                    <div class="card-body card-block">
                                        <form action="add_cand.php" method="post" class="">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">Candidate name</div>
                                                    <input type="text" id="" name="cand_name" class="form-control">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">Phone No.</div>
                                                    <input type="text" id="" name="phone" class="form-control">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-envelope"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">Technology domain</div>
                                                    <input type="text" id="" name="tech_domain" class="form-control">
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
<div class=" col-12 ">
                                <h2 class="title-1 m-b-25">Candidates  Till now</h2>
                                
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="table table-borderless table-striped table-earning emp_table">
                                        <thead>
                                            <tr>
                                                <th>Sr.No</th>
                                                <th>Name</th>
                                                <th>Phone no.</th>
                                                <th>Tech Domain</th>
                                                <th>Select</th>   
                                                                                              
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $i=1;
                                                while($row = mysqli_fetch_array($ssql)) {
                                                ?>
                                                <tr <?php if($c_id==$row['id'])echo 'style="background-color:lightgreen;" '; ?> >
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $row["cand_name"]; ?></td>
                                                    <td><?php echo $row["phone"]; ?></td>
                                                    <td><?php echo $row["tech_domain"]; ?></td>
<td><a href="<?php  echo 'add_cand.php?select=true&cid='.$row['id'] ; ?>"><button   class="btn btn-primary btn-sm" >Select</button></a></td>
<!-- <td><a href="<?php  echo 'add_cand.php?delete=true&cid='.$row['id'] ; ?>"><button   class="btn btn-danger btn-sm" >Delete</button></a></td> -->
                                                   
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