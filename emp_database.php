<?php include 'base_hr.php';

$big_query =" SELECT * FROM sourcing inner join candidate_info on sourcing.fk=candidate_info.fk ";
      $ssql = mysqli_query($db,$big_query) or die( mysqli_error($db));
            //$result = mysqli_fetch_array($ssql,MYSQLI_ASSOC);
     $rnum = $ssql->num_rows;

     $query =" SELECT * FROM loginform WHERE authority=1 ORDER BY id DESC ";
       $ssql_emp = mysqli_query($db,$query) or die( mysqli_error($db));

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

	.fixedcol
	{
		position: -webkit-sticky; /* for Safari */
  position: sticky;
  left: 0;
  background-color: #f5f5f5;

  
	}

	.fixedcol2
	{
		position: -webkit-sticky; /* for Safari */
  position: sticky;
  left:137px;
   background-color: #f5f5f5;

	}
</style>

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

							


<!-- Editable table -->
<div class="row">

<!--
<div class=" col-12 ">
                                <h2 class="title-1 m-b-25">Employees Database</h2>
                                <div class="table-responsive  m-b-40">
                                    <table class=" table table-striped table-earning ">
                                        <thead>
                                            <tr>
                                                
                                                <th class="fixedcol">Employee ID</th>
                                                <th class="fixedcol2">Name</th>
                                                <th>Gender</th>
                                                <th>DOB</th>
                                                <th>Age</th>
                                                <th>Marital Status</th>
                                                <th>Father/Husband name</th>
                                                <th>Designation</th>
                                                <th>Grade  </th>
                                                <th>class</th>
                                                <th>Department</th>
                                                <th>Reporting Manager</th>
                                                <th>Highest Qualification </th>
                                                <th>Date of Joining</th>
                                                <th>Joining Month</th>
                                                <th>Joining Year</th>
                                                <th>Joining Quarter </th>
                                                <th>Confirmation <br>Apparisal Due on</th>
                                                <th>Confirmed On</th>
                                                <th>Appraisal Due Month</th>
                                                <th>Salary A/C No. (ICICI) </th>
                                                <th>Pan No.</th>
                                                <th>Aadhaar Card</th>
                                                <th>Passport No.</th>
                                                <th>Landline* (Res.) /<br> Alternate Mobile </th>
                                                <th>Mobile</th>
                                                <th>Emergency Contact</th>
                                                <th>Personal E-mail ID</th>
                                                <th>Permanent Address </th>
                                                <th>Current Address</th>
                                                <th>Blood Group</th>
                                                <th>Hiring Status</th>
                                                <th>Employee Status (Working,<br> Absconding,Terminated, Resigned)</th>


                                               
                                            </tr>
                                        </thead>
                                        
<tbody>
                                            <?php
                                                $i=1;
                                                while($row = mysqli_fetch_array($ssql)) {
                                                ?>
                                                <tr >
                                                    <td class="fixedcol" scope="row"><?php echo $i; ?></td>
                                                    <td class="fixedcol2"><?php echo $row["first_name"]; ?></td>
                                                    <td><?php echo $row["adhar"]; ?></td>
                                                   
                                                </tr>
                                                <?php
                                                $i++;
                                                }
                                            ?>
                                            
                                        </tbody>
                                           
                                        
                                    </table>
                                </div>
                            </div>  --->
                            <div class=" col-12 ">
                                <h2 class="title-1 m-b-25">Employees Database</h2>
                                <small>Click row to explore more about the employee.</small>
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="table table-borderless table-striped table-earning emp_table">
                                        <thead>
                                            <tr>
                                                <th>S no.</th>
                                                <th>Date of joining</th>
                                                <th>Employee ID</th>
                                                <th>Name</th>
                                               <th>Technology domain</th>
                                            </tr>
                                        </thead>
                                            <tbody>
                                            <?php
                                                $i=1;
                                                while($row = mysqli_fetch_array($ssql_emp)) {
                                                    $c_id=$row['special_id'];
                                                    $row_id=$row["id"];
                                                ?>
                                                <tr  data-href=" <?php  echo "everything_of_emp.php?c_id=$c_id&row_id=$row_id"; ?> ">
                                                    <td><?php echo $i; ?></td>
                                                    <td>2020-08-28 </td>
                                                    <td><?php echo $row["id"]; ?></td>
                                                    <td><?php echo $row["username"]; ?></td>
                                                    <td><?php
                                                    
                                                     $big_query =" SELECT * FROM candidate_table where id=$c_id ";
      $ssql = mysqli_query($db,$big_query) or die( mysqli_error($db));
            $result = mysqli_fetch_array($ssql,MYSQLI_ASSOC);
                                                     echo $result["tech_domain"]; ?></td>
                                                   
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
<!-- Editable table -->

             <!-- END MAIN CONTENT-->


</div>
</div>
</div>