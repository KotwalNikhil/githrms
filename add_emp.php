<?php include 'base_hr.php';

$query =" SELECT * FROM loginform WHERE authority =2 ORDER BY id DESC ";
       $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
 ?>

<script type="text/javascript">
  document.addEventListener("DOMContentLoaded",()=>
  {
    const rows=document.querySelectorAll("tr[data-href]");
    console.log(rows);
    rows.forEach(row =>
    {
      row.addEventListener("click",()=>
      {
        window.location.href = row.dataset.href;
      });
    });
  });



  
</script>

<style type="text/css">
	.emp_table tr:hover td {background:#87CEEB}

</style>

  <div class="main-content p-t-30 m-t-70" >
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
                            

                            <div class="col-12 col-md-8  ">
                                <h2 class="title-1 m-b-20">Register a Recuriter</h2>
                                <div class="card">
                                    <div class="card-header">Make sure to enter the valid email address </div>
                                    <div class="card-body card-block">
                                        <form action="do_cand_signup.php" method="post" class="">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">Username</div>
                                                    <input type="text" id="username3" name="username3" class="form-control">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">Email</div>
                                                    <input type="email" id="email3" name="email3" class="form-control">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-envelope"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">Password</div>
                                                    <input type="password" id="password3" name="password3" class="form-control">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-asterisk"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions form-group">
                                                <button type="submit" name="recuriter_signup" class="btn btn-primary btn-sm">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
<div class=" col-12 ">
                                <h2 class="title-1 m-b-25">Recuriters   Till now</h2>
                                
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="table table-borderless table-striped table-earning emp_table">
                                        <thead>
                                            <tr>
                                                <th>Sr.No</th>
                                                <th>Name</th>
                                                <th>Rec. Id</th>
                                                <th>Email</th>
                                                   
                                                                                              
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $i=1;
                                                while($row = mysqli_fetch_array($ssql)) {
                                                ?>
                                                <tr  >
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $row["username"]; ?></td>
                                                    <td><?php echo $row["id"]; ?></td>
                                                    <td><?php echo $row["email"]; ?></td>

                                                   
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