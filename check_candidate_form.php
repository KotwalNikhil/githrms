<?php 
include 'cand_base.php' ;

$c_id=$_SESSION['c_id'];

 $query =" SELECT * FROM candidate_documents WHERE c_id ='$c_id' ";
       $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
      $result = mysqli_fetch_array($ssql,MYSQLI_ASSOC);
        $rnum = $ssql->num_rows;

        $query =" SELECT * FROM review_cand_docs WHERE c_id ='$c_id' ";
      $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
       $result_review = mysqli_fetch_array($ssql,MYSQLI_ASSOC);
       

$query =" SELECT * FROM e1 WHERE  c_id='$c_id'";
       $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
      $e1 = mysqli_fetch_array($ssql,MYSQLI_ASSOC);

$query =" SELECT * FROM e2 WHERE  c_id='$c_id'";
       $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
      $e2 = mysqli_fetch_array($ssql,MYSQLI_ASSOC);

$query =" SELECT * FROM e3 WHERE  c_id='$c_id'";
       $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
      $e3 = mysqli_fetch_array($ssql,MYSQLI_ASSOC);

$query =" SELECT * FROM e4 WHERE  c_id='$c_id'";
       $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
      $e4 = mysqli_fetch_array($ssql,MYSQLI_ASSOC);

$query =" SELECT * FROM e5 WHERE  c_id='$c_id'";
       $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
      $e5 = mysqli_fetch_array($ssql,MYSQLI_ASSOC);

$query =" SELECT * FROM e6 WHERE  c_id='$c_id'";
       $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
      $e6 = mysqli_fetch_array($ssql,MYSQLI_ASSOC);

$query =" SELECT * FROM e7 WHERE  c_id='$c_id'";
       $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
      $e7 = mysqli_fetch_array($ssql,MYSQLI_ASSOC);

$query =" SELECT * FROM e8 WHERE  c_id='$c_id'";
       $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
      $e8 = mysqli_fetch_array($ssql,MYSQLI_ASSOC);

$query =" SELECT * FROM e9 WHERE  c_id='$c_id'";
       $ssql_work_experience = mysqli_query($db,$query) or die( mysqli_error($db));
     // $e9 = mysqli_fetch_array($ssql,MYSQLI_ASSOC);

$query =" SELECT * FROM e10 WHERE  c_id='$c_id'";
       $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
      $e10 = mysqli_fetch_array($ssql,MYSQLI_ASSOC);



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
                                 echo  'Please select a candidate first';
                                echo '</div>';
                            }
                            if($c_id!=0 and $rnum==0)
                            {
                                echo '<div class="alert alert-danger alert-dismissible" id="myalert">';
                                  echo '<span class="close " data-dismiss="alert">&times;</span>';
                                 echo  'This candidate is not selected';
                                echo '</div>';
                            }
                        ?>


            <!-- MAIN CONTENT-->
            <div class="row">
           <div class="col-lg-12">



                                <div class="card " id="Candidate-info"  >
                                    <div class="card-header">
                                       <h3>
                           Documents uploaded by candidate</h3>
                        <span class="red fullWidth" style="color: green; font-size: 12px;">Please select the remark before rejecting.<br>Please save the form to enable the candidate to fill again the required documents. </span> 
                                    </div>
                                    <div class="card-body card-block">

                                       <!-----HR review section ----->
                                    <?php if($result_review["hr_review"]!=""){ echo'
  <div >
  <h4>Reviews from HR</h4>
  <ul class="list-group">';
if($result_review["hr_confirmed"]==1)
{
echo "Accepted by the HR";
}
else 
{
  echo "Rejected by the HR,Please follow up on the review ";
}


  echo '<li class="list-group-item list-group-item-info"> '.$result_review["hr_review"] .'</li>';
}
?>

 <!-----HR review section ----->
 <br>
 <br>
                                        <form action="review_cand_docs.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            <table class="table table-bordered">
    <thead>
      <tr>
        <th>S no.</th>
        <th>Document Name</th>    
        <th>Preview</th>
        <th>Approve</th>
        <th>Rejection Remark <br><small>if not approved</small></th>
        <th>Reject</th>  
        <th>status</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>Resume<small style=" color: red">&#42;</small></td>
        <?php 
        if($result['resume'])
             { echo "  <td> <a href='cand_docs/resume/".$result['resume']."'><p   style='font-size:30px;color:green;'>  
&#128065;</p></a> </td>";
             }
        else
             {
               echo ' <td><i class="fa fa-eye" style="font-size:24px"></i></td> ';
             }
        ?>
        <td><button type="submit" name="approve1" class="btn btn-success btn-sm" >Approve</button></td>
         <td>
        <select name="reason1" id="venue1" class="form-control-sm form-control" onchange=""  >
                    <option hidden id="selvenue1" value="">select remark </option>
     <option <?php if($result_review['resume']=="Bad Quality")echo'selected="true"';  ?> value="Bad Quality">Bad Quality</option>
      <option <?php if($result_review['resume']=="Improper Alignment of Document")echo'selected="true"';  ?> value="Improper Alignment of Document"> Alignment of Document</option>
      <option <?php if($result_review['resume']=="Not readable")echo'selected="true"';  ?> value="Not readable">Readability</option>
       <option <?php if($result_review['resume']=="Wrong Document")echo'selected="true"';  ?> value="Wrong Document"> Wrong Document</option>
      <option <?php if($result_review['resume']=="other")echo'selected="true"';  ?> value="other">Other</option>
     </select></td>
    <td><button  type="submit" name="reject1" class="btn btn-danger btn-sm" >Reject</button></a></td>
<td><?php if($result_review['resume']=="1")echo 'Approved'; else if($result_review['resume']=="") echo'Not seen'; else echo'Rejected';?></td>
      </tr>
      <tr>



        <td>2</td>
        <td>Current Address Proof<small style=" color: red">&#42;</small></td>
        <?php 
        if($result['c_address'])
             { echo "  <td> <a href='cand_docs/current_address/".$result['c_address']."'><p   style='font-size:30px;color:green;'>  
&#128065;</p></a> </td>";
             }
        else
             {
               echo ' <td><i class="fa fa-eye" style="font-size:24px"></i></td> ';
             }
        ?>  
        <td><button type="submit" name="approve2" class="btn btn-success btn-sm" >Approve</button></td>
        <td>
        <select name="reason2" id="venue1" class="form-control-sm form-control" onchange=""  >
                    <option hidden id="selvenue1" value="">select remark </option>
     <option <?php if($result_review['c_address']=="Bad Quality")echo'selected="true"';  ?> value="Bad Quality">Bad Quality</option>
      <option <?php if($result_review['c_address']=="Improper Alignment of Document")echo'selected="true"';  ?> value="Improper Alignment of Document"> Alignment of Document</option>
      <option <?php if($result_review['c_address']=="Not readable")echo'selected="true"';  ?> value="Not readable">Readability</option>
       <option <?php if($result_review['c_address']=="Wrong Document")echo'selected="true"';  ?> value="Wrong Document"> Wrong Document</option>
      <option <?php if($result_review['c_address']=="other")echo'selected="true"';  ?> value="other">Other</option>
     </select></td>
    <td><button  type="submit" name="reject2" class="btn btn-danger btn-sm" >Reject</button> </td>
    <td><?php if($result_review['c_address']=="1")echo 'Approved'; else if($result_review['c_address']=="") echo'Not seen'; else echo'Rejected';?></td>

            </tr>
      <tr>
        <td>3</td>
        <td>Permanent address proof<small style=" color: red">&#42;</small></td>
         <?php 
        if($result['p_address'])
             { echo "  <td> <a href='cand_docs/permanent_address/".$result['p_address']."'><p   style='font-size:30px;color:green;'>  
&#128065;</p></a> </td>";
             }
        else
             {
               echo ' <td><i class="fa fa-eye" style="font-size:24px"></i></td> ';
             }
        ?> 
        <td><button type="submit" name="approve3" class="btn btn-success btn-sm" >Approve</button></td>
        <td>
        <select name="reason3" id="venue1" class="form-control-sm form-control" onchange=""  >
                    <option hidden id="selvenue1" value="">select remark </option>
     <option <?php if($result_review['p_address']=="Bad Quality")echo'selected="true"';  ?> value="Bad Quality">Bad Quality</option>
      <option <?php if($result_review['p_address']=="Improper Alignment of Document")echo'selected="true"';  ?> value="Improper Alignment of Document"> Alignment of Document</option>
      <option <?php if($result_review['p_address']=="Not readable")echo'selected="true"';  ?> value="Not readable">Readability</option>
       <option <?php if($result_review['p_address']=="Wrong Document")echo'selected="true"';  ?> value="Wrong Document"> Wrong Document</option>
      <option <?php if($result_review['p_address']=="other")echo'selected="true"';  ?> value="other">Other</option>
     </select></td>
    <td><button  type="submit" name="reject3" class="btn btn-danger btn-sm" >Reject</button> </td>
        <td><?php if($result_review['p_address']=="1")echo 'Approved'; else if($result_review['p_address']=="") echo'Not seen'; else echo'Rejected';?></td>        
              </tr>
      <tr>
        <td>4</td>
        <td>Pan Card Copy<small style=" color: red">&#42;</small></td>
        <?php 
        if($result['pancard'])
             { echo "  <td> <a href='cand_docs/pancards/".$result['pancard']."'><p   style='font-size:30px;color:green;'>  
&#128065;</p></a> </td>";
             }
        else
             {
               echo ' <td><i class="fa fa-eye" style="font-size:24px"></i></td> ';
             }
        ?>
        <td><button type="submit" name="approve4" class="btn btn-success btn-sm" >Approve</button></td>
        <td>
        <select name="reason4" id="venue1" class="form-control-sm form-control" onchange=""  >
                    <option hidden id="selvenue1" value="">select remark </option>
     <option <?php if($result_review['pancard']=="Bad Quality")echo'selected="true"';  ?> value="Bad Quality">Bad Quality</option>
      <option <?php if($result_review['pancard']=="Improper Alignment of Document")echo'selected="true"';  ?> value="Improper Alignment of Document"> Alignment of Document</option>
      <option <?php if($result_review['pancard']=="Not readable")echo'selected="true"';  ?> value="Not readable">Readability</option>
       <option <?php if($result_review['pancard']=="Wrong Document")echo'selected="true"';  ?> value="Wrong Document"> Wrong Document</option>
      <option <?php if($result_review['pancard']=="other")echo'selected="true"';  ?> value="other">Other</option>
     </select></td>
    <td><button  type="submit" name="reject4" class="btn btn-danger btn-sm" >Reject</button> </td>
        <td><?php if($result_review['pancard']=="1")echo 'Approved'; else if($result_review['pancard']=="") echo'Not seen'; else echo'Rejected';?></td>
              </tr>




      <tr>
        <td>5</td>
        <td>Educational certificates<small style=" color: red">&#42;</small><br> (10th/ 12th/ Diploma/Degree/ PG/Masters) <br><small>combined in one pdf</small></td>
         <?php 
        if($result['edu_certificates'])
             { echo "  <td> <a href='cand_docs/edu_certificates/".$result['edu_certificates']."'><p   style='font-size:30px;color:green;'>  
&#128065;</p></a> </td>";
             }
        else
             {
               echo ' <td><i class="fa fa-eye" style="font-size:24px"></i></td> ';
             }
        ?> 
        <td><button type="submit" name="approve5" class="btn btn-success btn-sm" >Approve</button></td>
    <td>
        <select name="reason5" id="venue1" class="form-control-sm form-control" onchange=""  >
                    <option hidden id="selvenue1" value="">select remark </option>
     <option <?php if($result_review['edu_certificates']=="Bad Quality")echo'selected="true"';  ?> value="Bad Quality">Bad Quality</option>
      <option <?php if($result_review['edu_certificates']=="Improper Alignment of Document")echo'selected="true"';  ?> value="Improper Alignment of Document"> Alignment of Document</option>
      <option <?php if($result_review['edu_certificates']=="Not readable")echo'selected="true"';  ?> value="Not readable">Readability</option>
       <option <?php if($result_review['edu_certificates']=="Wrong Document")echo'selected="true"';  ?> value="Wrong Document"> Wrong Document</option>
      <option <?php if($result_review['edu_certificates']=="other")echo'selected="true"';  ?> value="other">Other</option>
     </select></td>
    <td><button  type="submit" name="reject5" class="btn btn-danger btn-sm" >Reject</button> </td>
        <td><?php if($result_review['edu_certificates']=="1")echo 'Approved'; else if($result_review['edu_certificates']=="") echo'Not seen'; else echo'Rejected';?></td>      
             </tr>
         <tr>
        <td>6</td>
        <td>Photograph<small style=" color: red">&#42;</small></td>
        <?php 
        if($result['photo'])
             { echo "  <td> <a href='cand_docs/photo/".$result['photo']."'><p   style='font-size:30px;color:green;'>  
&#128065;</p></a> </td>";
             }
        else
             {
               echo ' <td><i class="fa fa-eye" style="font-size:24px"></i></td> ';
             }
        ?>    
       <td><button type="submit" name="approve6" class="btn btn-success btn-sm" >Approve</button></td>
    <td>
        <select name="reason6" id="venue1" class="form-control-sm form-control" onchange=""  >
                    <option hidden id="selvenue1" value="">select remark </option>
     <option <?php if($result_review['photo']=="Bad Quality")echo'selected="true"';  ?> value="Bad Quality">Bad Quality</option>
      <option <?php if($result_review['photo']=="Improper Alignment of Document")echo'selected="true"';  ?> value="Improper Alignment of Document"> Alignment of Document</option>
      <option <?php if($result_review['photo']=="Not readable")echo'selected="true"';  ?> value="Not readable">Readability</option>
       <option <?php if($result_review['photo']=="Wrong Document")echo'selected="true"';  ?> value="Wrong Document"> Wrong Document</option>
      <option <?php if($result_review['photo']=="other")echo'selected="true"';  ?> value="other">Other</option>
     </select></td>
    <td><button  type="submit" name="reject6" class="btn btn-danger btn-sm" >Reject</button> </td>
        <td><?php if($result_review['photo']=="1")echo 'Approved'; else if($result_review['photo']=="") echo'Not seen'; else echo'Rejected';?></td> 
          </tr>





      <tr>
        <td>7</td>
        <td>Professional Certificates<br><small>combined in one pdf</small></td>
        <?php 
        if($result['pro_certificates'])
             { echo "  <td> <a href='cand_docs/pro_certificates/".$result['pro_certificates']."'><p   style='font-size:30px;color:green;'>  
&#128065;</p></a> </td>";
             }
        else
             {
               echo ' <td><i class="fa fa-eye" style="font-size:24px"></i></td> ';
             }
        ?>   
         <td><button type="submit" name="approve7" class="btn btn-success btn-sm" >Approve</button></td>
    <td>
        <select name="reason7" id="venue1" class="form-control-sm form-control" onchange=""  >
                    <option hidden id="selvenue1" value="">select remark </option>
     <option <?php if($result_review['pro_certificates']=="Bad Quality")echo'selected="true"';  ?> value="Bad Quality">Bad Quality</option>
      <option <?php if($result_review['pro_certificates']=="Improper Alignment of Document")echo'selected="true"';  ?> value="Improper Alignment of Document"> Alignment of Document</option>
      <option <?php if($result_review['pro_certificates']=="Not readable")echo'selected="true"';  ?> value="Not readable">Readability</option>
       <option <?php if($result_review['pro_certificates']=="Wrong Document")echo'selected="true"';  ?> value="Wrong Document"> Wrong Document</option>
      <option <?php if($result_review['pro_certificates']=="other")echo'selected="true"';  ?> value="other">Other</option>
     </select></td>
    <td><button  type="submit" name="reject7" class="btn btn-danger btn-sm" >Reject</button> </td>
        <td><?php if($result_review['pro_certificates']=="1")echo 'Approved'; else if($result_review['pro_certificates']=="") echo'Not seen'; else echo'Rejected';?></td>         
            </tr>
     
      <tr>
        <td>8</td>
        <td>Pay slip / Salary Certificate (Last Employment)<small style=" color: red">&#42;</small> <br><small>Not applicable for freshers</small></td>
        <?php 
        if($result['payslip'])
             { echo "  <td> <a href='cand_docs/payslip/".$result['payslip']."'><p   style='font-size:30px;color:green;'>  
&#128065;</p></a> </td>";
             }
        else
             {
               echo ' <td><i class="fa fa-eye" style="font-size:24px"></i></td> ';
             }
        ?>  
        <td><button type="submit" name="approve8" class="btn btn-success btn-sm" >Approve</button></td>
    <td>
        <select name="reason8" id="venue1" class="form-control-sm form-control" onchange=""  >
                    <option hidden id="selvenue1" value="">select remark </option>
     <option <?php if($result_review['payslip']=="Bad Quality")echo'selected="true"';  ?> value="Bad Quality">Bad Quality</option>
      <option <?php if($result_review['payslip']=="Improper Alignment of Document")echo'selected="true"';  ?> value="Improper Alignment of Document"> Alignment of Document</option>
      <option <?php if($result_review['payslip']=="Not readable")echo'selected="true"';  ?> value="Not readable">Readability</option>
       <option <?php if($result_review['payslip']=="Wrong Document")echo'selected="true"';  ?> value="Wrong Document"> Wrong Document</option>
      <option <?php if($result_review['payslip']=="other")echo'selected="true"';  ?> value="other">Other</option>
     </select></td>
    <td><button  type="submit" name="reject8" class="btn btn-danger btn-sm" >Reject</button> </td>
        <td><?php if($result_review['payslip']=="1")echo 'Approved'; else if($result_review['payslip']=="") echo'Not seen'; else echo'Rejected';?></td>           
             </tr>
      <tr>




        <td>9</td>
        <td>Form No. 16 from Previous Employer<small style=" color: red">&#42;</small><br> <small>Not applicable for freshers</small></td>
        <?php 
        if($result['form16'])
             { echo "  <td> <a href='cand_docs/form16/".$result['form16']."'><p   style='font-size:30px;color:green;'>  
&#128065;</p></a> </td>";
             }
        else
             {
               echo ' <td><i class="fa fa-eye" style="font-size:24px"></i></td> ';
             }
        ?> 
          <td><button type="submit" name="approve9" class="btn btn-success btn-sm" >Approve</button></td>
    <td>
        <select name="reason9" id="venue1" class="form-control-sm form-control" onchange=""  >
                    <option hidden id="selvenue1" value="">select remark </option>
     <option <?php if($result_review['form16']=="Bad Quality")echo'selected="true"';  ?> value="Bad Quality">Bad Quality</option>
      <option <?php if($result_review['form16']=="Improper Alignment of Document")echo'selected="true"';  ?> value="Improper Alignment of Document"> Alignment of Document</option>
      <option <?php if($result_review['form16']=="Not readable")echo'selected="true"';  ?> value="Not readable">Readability</option>
       <option <?php if($result_review['form16']=="Wrong Document")echo'selected="true"';  ?> value="Wrong Document"> Wrong Document</option>
      <option <?php if($result_review['form16']=="other")echo'selected="true"';  ?> value="other">Other</option>
     </select></td>
    <td><button  type="submit" name="reject9" class="btn btn-danger btn-sm" >Reject</button> </td>
        <td><?php if($result_review['form16']=="1")echo 'Approved'; else if($result_review['form16']=="") echo'Not seen'; else echo'Rejected';?></td>      
       </tr>




      <tr>
        <td>10</td>
        <td>Experience/Relieving certificate from all previous organizations<small style=" color: red">&#42;</small><br><small> Not applicable for freshers</small></td>
        <?php       
            if($result['exp_certificates'])
                         { echo "  <td> <a href='cand_docs/exp_certificates/".$result['exp_certificates']."'><p   style='font-size:30px;color:green;'>  
            &#128065;</p></a> </td>";
                         }
                    else
                         {
                           echo ' <td><i class="fa fa-eye" style="font-size:24px"></i></td> ';
                         }
        ?>  
        
       <td><button type="submit" name="approve10" class="btn btn-success btn-sm" >Approve</button></td>
    <td>
        <select name="reason10" id="venue1" class="form-control-sm form-control" onchange=""  >
                    <option hidden id="selvenue1" value="">select remark </option>
     <option <?php if($result_review['exp_certificates']=="Bad Quality")echo'selected="true"';  ?> value="Bad Quality">Bad Quality</option>
      <option <?php if($result_review['exp_certificates']=="Improper Alignment of Document")echo'selected="true"';  ?> value="Improper Alignment of Document"> Alignment of Document</option>
      <option <?php if($result_review['exp_certificates']=="Not readable")echo'selected="true"';  ?> value="Not readable">Readability</option>
       <option <?php if($result_review['exp_certificates']=="Wrong Document")echo'selected="true"';  ?> value="Wrong Document"> Wrong Document</option>
      <option <?php if($result_review['exp_certificates']=="other")echo'selected="true"';  ?> value="other">Other</option>
     </select></td>
    <td><button  type="submit" name="reject10" class="btn btn-danger btn-sm" >Reject</button> </td>
        <td><?php if($result_review['exp_certificates']=="1")echo 'Approved'; else if($result_review['exp_certificates']=="") echo'Not seen'; else echo'Rejected';?></td>  </tr>



      <tr>
        <td>11</td>
        <td>Others</td>
        <?php       
            if($result['others'])
                         { echo "  <td> <a href='cand_docs/others/".$result['others']."'><p   style='font-size:30px;color:green;'>  
            &#128065;</p></a> </td>";
                         }
                    else
                         {
                           echo ' <td><i class="fa fa-eye" style="font-size:24px"></i></td> ';
                         }
        ?>   
        <td><button type="submit" name="approve11" class="btn btn-success btn-sm" >Approve</button></td>
    <td>
        <select name="reason11" id="venue1" class="form-control-sm form-control" onchange=""  >
                    <option hidden id="selvenue1" value="">select remark </option>
     <option <?php if($result_review['others']=="Bad Quality")echo'selected="true"';  ?> value="Bad Quality">Bad Quality</option>
      <option <?php if($result_review['others']=="Improper Alignment of Document")echo'selected="true"';  ?> value="Improper Alignment of Document"> Alignment of Document</option>
      <option <?php if($result_review['others']=="Not readable")echo'selected="true"';  ?> value="Not readable">Readability</option>
       <option <?php if($result_review['others']=="Wrong Document")echo'selected="true"';  ?> value="Wrong Document"> Wrong Document</option>
      <option <?php if($result_review['others']=="other")echo'selected="true"';  ?> value="other">Other</option>
     </select></td>
    <td><button  type="submit" name="reject11" class="btn btn-danger btn-sm" >Reject</button></td>
        <td><?php if($result_review['others']=="1")echo 'Approved'; else if($result_review['others']=="") echo'Not seen'; else echo'Rejected';?></td>      
   </tr>

    </tbody>
  </table>
 <br>

 <br>

 <div class="row">
           <div class="col-lg-12">

            <h4 class ="text-center">APPLICATION FOR EMPLOYMENT</h4><br>
            <br>
</div>
<div class="col-lg-12">

<div class="card " id="emp-info" >
<div class="row form-group">
                                           
   <div class="col-6">
                                        <div class="form-group">
                                            <label for="campus" class=" form-control-label">Position(s) Applied For<br>1.  </label>
                                            <input name="pos1" type="text" id="Campus" value="<?php echo $e1['pos1']; ?>" placeholder="" class="form-control"  >
                                        </div>
                                        </div>
                                        <div class="col-6">
                                        <div class="form-group">
                                            <label for="campus" class=" form-control-label">Photograph  </label>
                                            <?php 
        if($e1['photo'])
             { echo "  <td> <a href='cand_docs/profile_pic/".$e1['photo']."'><p   style='font-size:30px;color:green;'>  
&#128065;</p></a> </td>";
             }
        else
             {
               echo ' <td><i class="fa fa-eye" style="font-size:24px"></i></td> ';
             }
        ?> 
                                            <small class="form-text text-muted"> Passport Size Photo, Not Older than 3 months</small>

                                        </div>
                                        </div>
                                        
                                        
                                            <div class="col-6">
                                                <div class="form-group">
                                                  <label for="campus" class=" form-control-label">2.</label>

                                                    <input name="pos2" type="text" id="Others" value="<?php echo $e1['pos2']; ?>" placeholder="" class="form-control"  >
                                                </div>
                                            </div>
</div>
                                            <div class="row">
                                              <div class="col-lg-4">
                                                <div class="form-group">
                                                <label  class=" form-control-label">Have you ever filed an application here before?   </label>
                                              </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group m-t-10">
                                                  
         <input type="radio"  <?php if($e1['before_applied']=="yes")echo'checked="true"'; ?>  for="selectSm" id="before_applied" name="before_applied" class="form-control-label" value="yes" onclick="" ><label for="JD">Yes</label><br>

         <input type="radio"  <?php if($e1['before_applied']=="no")echo'checked="true"'; ?>  for="selectSm" id="before_applied" name="before_applied" class=" form-control-label" value="no" onclick="" ><label for="JD">No</label><br>

                                                </div>
                                              </div>
                                              <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Date (If Yes)</label>
                                                    <input name="date_on_applied" type="date" id="Others" value="<?php echo $e1['date_on_applied']; ?>" placeholder="" class="form-control"  >
                                                </div>
                                            </div>
                                            </div>
                                              <div class="row">
                                              <div class="col-lg-4">
                                                <div class="form-group">
                                                <label  class=" form-control-label">Have you ever been employed here before?</label>
                                              </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group m-t-10">
                                                  
         <input type="radio" <?php if($e1['before_employed']=="yes")echo'checked="true"'; ?>  for="selectSm" id="before_employed" name="before_employed" class="form-control-label" value="yes" onclick="" ><label for="JD">Yes</label><br>

         <input type="radio" <?php if($e1['before_employed']=="no")echo'checked="true"'; ?>  for="selectSm" id="before_employed" name="before_employed" class=" form-control-label" value="no" onclick="" ><label for="JD">No</label><br>

                                                </div>
                                              </div>
                                              <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Date (If Yes)</label>
                                                    <input name="date_on_employed" type="date" id="Others" value="<?php echo $e1['date_on_employed']; ?>" placeholder="" class="form-control"  >
                                                </div>
                                            </div>
                                            </div>
                                            <div class="row">

                                            <!-- 

                                             <div class="col-6 col-md-6">
                                              <div class="form-group">
                                              <p>How were you referred to us?</p>
                                                    <select name="how_referred" id="SelectLm" class="form-control-sm form-control" onchange="" required>
                    <option  hidden value="">Please select</option>
                    <option  value="Consultant">Consultant</option>
                            <option  value="Campus">Campus</option>
                            <option  value="Naukri.com">Naukri.com</option>
                            <option  value="Newspaper Ad">Newspaper Ad</option>
                             <option  value="Monster">Monster</option>
                             <option  value="Twitter">Twitter</option>
                             <option  value="Television">Television</option>
                              <option  value="E-mail campaign">E-mail campaign</option>
                              <option  value="VIT carrer website">VIT carrer website</option>
                             <option  value="Direct call from VIT">Direct call from VIT</option>

                            <option  value="Times Jobs">Times Jobs</option>
                            <option  value="Indeed">Indeed</option>
                            <option  value="LinkedIn">LinkedIn</option>
                         <option  value="Facebook">Facebook</option>
                         <option  value="Google">Google</option>
                         <option  value="Employee referral">Employee referral</option>
                         <option  value="Walk in">Walk in</option>
                          <option  value="Campus recruitment">Campus recruitment</option>
                                                      <option  value="Others">Others</option>


                        
                                                    </select>
                                                  </div>
                                                </div> -->

<div class="col-12">
  <p>How were you referred to us?</p><br>
</div>
 <div class="col-3 col-md-3">
  
                                              <div class="form-group">
                                                <input name="how_referred" <?php if($e1['how_referred']=="Consultant")echo'checked="true"'; ?> type="radio" id="city" value="Consultant"class="form-control-checkbox">
                                   <label for="how_referred" class=" form-control-label">Consultant
 </label>
<br>
                         <input name="how_referred" <?php if($e1['how_referred']=="Campus")echo'checked="true"'; ?> type="radio" id="city" value="Campus"class="form-control-checkbox">
                         <label for="how_referred" class=" form-control-label">Campus
                         </label>

<br>

<input name="how_referred" <?php if($e1['how_referred']=="Naukri.com")echo'checked="true"'; ?> type="radio" id="city" value="Naukri.com"class="form-control-checkbox">
                         <label for="how_referred" class=" form-control-label">Naukri.com
                         </label>
<br>

 <input name="how_referred" <?php if($e1['how_referred']=="Newspaper")echo'checked="true"'; ?> type="radio" id="city" value="Newspaper"class="form-control-checkbox">
                         <label for="how_referred" class=" form-control-label">Newspaper Ad
                        </label>
<br>

<input name="how_referred" <?php if($e1['how_referred']=="Monster")echo'checked="true"'; ?> type="radio" id="city" value="Monster"class="form-control-checkbox">

                         <label for="how_referred" class=" form-control-label">Monster
                         </label>

                            
                                              </div>
                                            </div>

                                            <div class="col-3 col-md-3">
                                              <div class="form-group">

                                                <input name="how_referred" <?php if($e1['how_referred']=="Twitter")echo'checked="true"'; ?> type="radio" id="city" value="Twitter"class="form-control-checkbox">
                                                <label for="how_referred" class=" form-control-label">Twitter
                         </label>
<br>

<input name="how_referred" <?php if($e1['how_referred']=="Television")echo'checked="true"'; ?> type="radio" id="city" value="Television" class="form-control-checkbox">
                         <label for="how_referred" class=" form-control-label">Television
                         </label>
<br>


<input name="how_referred" <?php if($e1['how_referred']=="E-mail")echo'checked="true"'; ?> type="radio" id="city" value="E-mail"class="form-control-checkbox">
                         <label for="how_referred" class=" form-control-label">E-mail campaign
                         </label>
<br>

 <input name="how_referred" <?php if($e1['how_referred']=="VIT_carrer_website")echo'checked="true"'; ?> type="radio" id="city" value="VIT_carrer_website"class="form-control-checkbox">
                         <label for="how_referred" class=" form-control-label">VIT carrer website
                        </label>

<br>

<input name="how_referred" <?php if($e1['how_referred']=="Direct")echo'checked="true"'; ?> type="radio" id="city" value="Direct"class="form-control-checkbox">
                         <label for="how_referred" class=" form-control-label">Direct call from VIT
                         </label>

                         
                                              </div>
                                            </div>

<div class="col-3 col-md-3">
                                              <div class="form-group">

                                                <input name="how_referred" <?php if($e1['how_referred']=="Times")echo'checked="true"'; ?> type="radio" id="city" value="Times"class="form-control-checkbox">
                                                <label for="how_referred" class=" form-control-label">Times Jobs
                         </label>
<br>

<input name="how_referred" <?php if($e1['how_referred']=="Indeed")echo'checked="true"'; ?> type="radio" id="city" value="Indeed"class="form-control-checkbox">
                         <label for="how_referred" class=" form-control-label">Indeed
                         </label>
<br>

<input name="how_referred" <?php if($e1['how_referred']=="LinkedIn")echo'checked="true"'; ?> type="radio" id="city" value="LinkedIn" class="form-control-checkbox">
                         <label for="how_referred" class=" form-control-label">LinkedIn
                         </label>

<br>

<input name="how_referred" <?php if($e1['how_referred']=="Facebook")echo'checked="true"'; ?> type="radio" id="city" value="Facebook" class="form-control-checkbox">
                         <label for="how_referred" class=" form-control-label">Facebook
                         </label>
<br>

<input name="how_referred" <?php if($e1['how_referred']=="Google")echo'checked="true"'; ?> type="radio" id="city" value="Google"class="form-control-checkbox">
                         <label for="how_referred" class=" form-control-label">Google
                         </label>

                         
                                              </div>
                                            </div>


<div class="col-3 col-md-3">
                                              <div class="form-group">

                                                <input name="how_referred" <?php if($e1['how_referred']=="Campus")echo'checked="true"'; ?> type="radio" id="city" value="Campus"class="form-control-checkbox">
                                               <label for="how_referred" class=" form-control-label">Campus recruitment
                         </label>
<br>

<input name="how_referred" <?php if($e1['how_referred']=="Walk_in")echo'checked="true"'; ?> type="radio" id="city" value="Walk_in"class="form-control-checkbox">
                         <label for="how_referred" class=" form-control-label">Walk in
                         </label>
<br>

<input name="how_referred" <?php if($e1['how_referred']=="Employee_referral")echo'checked="true"'; ?> type="radio" id="city" value="Employee_referral"class="form-control-radio">
                         <label for="how_referred" class=" form-control-label">Employee referral
                         </label>
                                              </div>
                                            </div>

                                              </div>
                                            </div>
                                          </div>

                                          <div class="col-lg-12">
                                <div class="card " id="emp-info" >
                                   <div class="card-header">
                                        <strong>GENERAL INFORMATION</strong> 
                                    </div>
                                    <div class="card-body card-block">
                                       
                                           
                                            <div class="row form-group">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Full Name</label>
                                            <input name="full_name" type="text" id="city" value="<?php echo $e1['full_name']; ?>"class="form-control" >
                                                </div>
                                            </div>
                                           
                                        </div>
                                          <div class="row">
                                               <div class="col-4">
                                         <div class="form-group m-t-10">
                                 <label for="selectSm" class=" form-control-label">Gender </label>

                     <select name="gender" id="shortlisted" class="form-control-sm form-control" onchange="active_radio_button(this.value)"  >
                    <option hidden id="default2" value="no">select option </option>
                            <option <?php if($e1['gender']=="MALE")echo'selected="true"'; ?> value="MALE">MALE</option>
                             <option <?php if($e1['gender']=="FEMALE")echo'selected="true"'; ?> value="FEMALE">FEMALE</option>
                             <option <?php if($e1['gender']=="Transgender")echo'selected="true"'; ?> value="Transgender">Transgender</option>

                                               
                                            </select>
                                    </div>
                                </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Date Of birth
                                                    </label>
                                                    <input name="dob" type="date" id="Others" value="<?php echo $e1['dob']; ?>" placeholder="" class="form-control"  >
                                                </div>
                                              </div>
                                              <div class="col-4">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Age</label>
                                            <input name="age" type="number" id="city" min="19" value="<?php echo $e1['age']; ?>"class="form-control" >
                                            <small>should be greater then 18 yrs</small>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="row">
                                               <div class="col-4">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Nationality</label>
                                            <input name="nationality" type="text" id="city" value="<?php echo $e1['nationality']; ?>"class="form-control" >
                                                </div>
                                        
                                </div>
                                            <div class="col-lg-4">
                                                 <div class="form-group m-t-10">
                                 <label for="selectSm" class=" form-control-label">Marital Status </label>

                     <select name="marital_status" id="shortlisted" class="form-control-sm form-control" onchange="active_radio_button(this.value)"  >
                    <option hidden id="default2" value="no">select option </option>
                            <option <?php if($e1['marital_status']=="Single")echo'selected="true"'; ?>  value="Single">Single</option>
                             <option <?php if($e1['marital_status']=="Married")echo'selected="true"'; ?> value="Married">Married</option>
                             

                                               
                                            </select>
                                    </div>
                                              </div>
                                              <div class="col-4">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Blood Group</label>
                                            <input name="bg" type="text" id="city" value="<?php echo $e1['bg']; ?>"class="form-control" >
                                                </div>
                                            </div>
                                            </div>


                                            <div class="row">
                                               <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Adhar Card Number</label>
                                            <input name="aadhar" type="text" id="city" value="<?php echo $e1['aadhar']; ?>"class="form-control" >
                                                </div>
                                              </div>
                                            <div class="col-lg-4">
                                                  <div class="form-group">
                                                    <label for="city" class=" form-control-label">Pan Card Number</label>
                                            <input name="pancard" type="text" id="city" value="<?php echo $e1['pancard']; ?>"class="form-control" >
                                                </div>
                                              </div>
                                              <div class="col-4">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">*Passport Number</label>
                                            <input name="passport" type="text" id="city" value="<?php echo $e1['passport']; ?>"class="form-control" >
                              <small class="form-text text-muted">*If Passport is not available, you are  to sign the passport undertaking separately.</small>

                                                </div>
                                            </div>
                                            </div>


                                           
                                    </div>
                            <!-- general info card -->      </div>
           <!-- general info ended -->  </div>



             <div class="col-lg-12">
                                <div class="card " id="emp-info" >
                                   <div class="card-header">
                                        <strong>Address Details </strong> 
                                    </div>
                                    <div class="card-body card-block">
                                        
                                           <div class="row form-group">
                                            <div class="col-6" style="border-right: 1px solid black;">
                                            <div class="col-12 m-b-65">
                                              <h6>Current Address</h6>
                                            </div>
                                            
                                           
                                            <div class="row form-group">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Landmark</label>
                                            <input name="c_landmark" type="text" id="" value="<?php echo $e2['c_landmark']; ?>"class="form-control" >
                                                </div>
                                            </div>
                                            
                                           
                                           
                                        </div>
                                          <div class="row">
                                               <div class="col-6">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">City </label>
                                            <input name="c_city" type="text" id="" value="<?php echo $e2['c_city']; ?>"class="form-control" >
                                                </div>
                                              </div>
                                            <div class="col-6">
                                                  <div class="form-group">
                                                    <label for="city" class=" form-control-label">Pin Code </label>
                                            <input name="c_pincode" type="text" id="" value="<?php echo $e2['c_pincode']; ?>"class="form-control" >
                                                </div>
                                              </div>
                                                
                                           
                                            </div>
                                            <div class="row">
                                               <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">State</label>
                                            <input name="c_state" type="text" id="" value="<?php echo $e2['c_state']; ?>"class="form-control" >
                                                </div>
                                              </div>
                                            
                                              
                                            </div>
                                            <div class="row">
                                               <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Primary Mobile No.</label>
                                            <input name="c_mobile" type="text" id="" value="<?php echo $e2['c_mobile']; ?>" class="form-control" >
                                                </div>
                                              </div>
                                            <div class="col-lg-12">
                                                  <div class="form-group">
                                                    <label for="city" class=" form-control-label">Landline No. for Pune: 020 </label>
                                            <input name="c_landline" type="text" id="" value="<?php echo $e2['c_landline']; ?>" class="form-control" >
                                                </div>
                                              </div>
                                              
                                            </div>
                                         
                                            <div class="row">
                                               
                                            <div class="col-lg-12">
                                                  <div class="form-group">
                                                    <label for="city" class=" form-control-label">Primary E-mail </label>
                                            <input name="c_email" type="text" id="" value="<?php echo $e2['c_email']; ?>"class="form-control" >
                                                </div>
                                              </div>
                                              
                                            </div>
                                          </div>
                                         
                                          <div class="col-6">
                                            <div class="col-12">
                                              <h6>Permanent Address</h6>
         <input type="radio" <?php if($e2['same_address']=="yes")echo'checked="true"'; ?>  for="selectSm" id="same_address" name="same_address" class="form-control-label" value="yes" onclick="" ><label for="JD"> Same as current address</label><br>

         <input type="radio"  <?php if($e2['same_address']=="no")echo'checked="true"'; ?>  for="selectSm" id="same_address" name="same_address" class=" form-control-label" value="no" onclick="" ><label for="JD">Other (Please specify below).</label><br>
                                            </div>
                                            
                                           
                                            <div class="row form-group">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Landmark</label>
                                            <input name="p_landmark" type="text" id="" value="<?php echo $e2['p_landmark']; ?>"class="form-control" >
                                                </div>
                                            </div>
                                            
                                           
                                           
                                        </div>
                                          <div class="row">
                                               <div class="col-6">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">City </label>
                                            <input name="p_city" type="text" id="" value="<?php echo $e2['p_city']; ?>"class="form-control" >
                                                </div>
                                              </div>
                                            <div class="col-6">
                                                  <div class="form-group">
                                                    <label for="city" class=" form-control-label">Pin Code </label>
                                            <input name="p_pincode" type="text" id="" value="<?php echo $e2['p_pincode']; ?>"class="form-control" >
                                                </div>
                                              </div>
                                                
                                           
                                            </div>
                                            <div class="row">
                                               <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">State</label>
                                            <input name="p_state" type="text" id="" value="<?php echo $e2['p_state']; ?>"class="form-control" >
                                                </div>
                                              </div>
                                            
                                              
                                            </div>
                                            <div class="row">
                                               <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Primary Mobile No.</label>
                                            <input name="p_mobile" type="text" id="" value="<?php echo $e2['p_mobile']; ?>"class="form-control" >
                                                </div>
                                              </div>
                                            <div class="col-lg-12">
                                                  <div class="form-group">
                                                    <label for="city" class=" form-control-label">Landline No. for Pune: 020 </label>
                                            <input name="p_landline" type="text" id="" value="<?php echo $e2['p_landline']; ?>"class="form-control" >
                                                </div>
                                              </div>
                                              
                                            </div>
                                         
                                            <div class="row">
                                               
                                            <div class="col-lg-12">
                                                  <div class="form-group">
                                                    <label for="city" class=" form-control-label">Primary E-mail </label>
                                            <input name="p_email" type="text" id="" value="<?php echo $e2['p_email']; ?>"class="form-control" >
                                                </div>
                                              </div>
                                              
                                            </div>
                                          </div>
                                        </div>

                                            <div class="row">
                                              <div class="col-lg-12">
                                              <h5>Emergency Contact Details</h5>
                                            </div><br>

                                               <div class="col-lg-8">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Contact Person Name</label>
                                            <input name="emergency_person_name" type="text" id="" value="<?php echo $e2['emergency_person_name']; ?>"class="form-control" >
                                                </div>
                                              </div>
                                            <div class="col-lg-8">
                                                  <div class="form-group">
                                                    <label for="city" class=" form-control-label">Relation with you </label>
                                            <input name="emergency_relation" type="text" id="" value="<?php echo $e2['emergency_relation']; ?>"class="form-control" >
                                                </div>
                                              </div>
                                              <div class="col-lg-8">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Contact Number</label>
                                            <input name="emergency_num" type="text" id="" value="<?php echo $e2['emergency_num']; ?>"class="form-control" >
                                                </div>
                                              </div>
                                            <div class="col-lg-12">
                                                  <div class="form-group">
                                                    <label for="city" class=" form-control-label">Address </label>
                                            <input name="emergency_address" type="text" id="" value="<?php echo $e2['emergency_address']; ?>"class="form-control" >
                                                </div>
                                              </div>
                                              
                                            </div>
                                             
                                    </div>
                                  </div>
          <!-- address details ended  --> </div>
           <div class="col-lg-12">
                                <div class="card " id="emp-info" >
                                   <div class="card-header">
                                        <strong>Family History </strong> 
                                    </div>
                                    <div class="card-body card-block">
                                       
                                           <div class="row form-group">
                                          <table class="table table-bordered">
                                                <thead>
                                           <tr>
        <th>S no.</th>
        <th>Name</th>
        <th>Age</th>
        <th>DOB</th> 
        <th>Relationship</th> 
        <th>Occupation</th>      
        
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td><input name="name1" type="text" id="city" value="<?php echo $e3['name1']; ?>"class="form-control"></td>
        <td><input name="age1" type="text" id="city" value="<?php echo $e3['age1']; ?>"class="form-control"></td>
        <td><input name="dob1" type="text" id="city" value="<?php echo $e3['dob1']; ?>"class="form-control"></td>
        <td><input name="relationship1" type="text" id="city" value="<?php echo $e3['relationship1']; ?>"class="form-control"></td>
        <td><input name="occupation1" type="text" id="city" value="<?php echo $e3['occupation1']; ?>"class="form-control"></td>

      </tr>
      
      <tr>
        <td>2</td>
        <td><input name="name2" type="text" id="city" value="<?php echo $e3['name2']; ?>"class="form-control"></td>
        <td><input name="age2" type="text" id="city" value="<?php echo $e3['age2']; ?>"class="form-control"></td>
        <td><input name="dob2" type="text" id="city" value="<?php echo $e3['dob2']; ?>"class="form-control"></td>
        <td><input name="relationship2" type="text" id="city" value="<?php echo $e3['relationship2']; ?>"class="form-control"></td>
        <td><input name="occupation2" type="text" id="city" value="<?php echo $e3['occupation2']; ?>"class="form-control"></td>

      </tr>
      <tr>
        <td>3</td>
        <td><input name="name3" type="text" id="city" value="<?php echo $e3['name3']; ?>"class="form-control"></td>
        <td><input name="age3" type="text" id="city" value="<?php echo $e3['age3']; ?>"class="form-control"></td>
        <td><input name="dob3" type="text" id="city" value="<?php echo $e3['dob3']; ?>"class="form-control"></td>
        <td><input name="relationship3" type="text" id="city" value="<?php echo $e3['relationship3']; ?>"class="form-control"></td>
        <td><input name="occupation3" type="text" id="city" value="<?php echo $e3['occupation3']; ?>"class="form-control"></td>

      </tr>
      <tr>
        <td>4</td>
        <td><input name="name4" type="text" id="city" value="<?php echo $e3['name4']; ?>"class="form-control"></td>
        <td><input name="age4" type="text" id="city" value="<?php echo $e3['age4']; ?>"class="form-control"></td>
        <td><input name="dob4" type="text" id="city" value="<?php echo $e3['dob4']; ?>"class="form-control"></td>
        <td><input name="relationship4" type="text" id="city" value="<?php echo $e3['relationship4']; ?>"class="form-control"></td>
        <td><input name="occupation4" type="text" id="city" value="<?php echo $e3['occupation4']; ?>"class="form-control"></td>

      </tr>
      <tr>
        <td>5</td>
        <td><input name="name5" type="text" id="city" value="<?php echo $e3['name5']; ?>"class="form-control"></td>
        <td><input name="age5" type="text" id="city" value="<?php echo $e3['age5']; ?>"class="form-control"></td>
        <td><input name="dob5" type="text" id="city" value="<?php echo $e3['dob5']; ?>"class="form-control"></td>
        <td><input name="relationship5" type="text" id="city" value="<?php echo $e3['relationship5']; ?>"class="form-control"></td>
        <td><input name="occupation5" type="text" id="city" value="<?php echo $e3['occupation5']; ?>"class="form-control"></td>

      </tr>
    </tbody>
  </table>
</div>
                                            
                                       </div>
                                     </div>
 <!-- family details ended  -->         </div>
 <div class="col-lg-12">
                                <div class="card " id="emp-info" >
                                   <div class="card-header">
                                        <strong>Language for Proficiency  </strong> 
                                    </div>
                                    <div class="card-body card-block">
                                        
                                           <div class="row form-group">
                                          <table class="table table-bordered">
                                                <thead>
                                           <tr>
        <th>S no.</th>
        <th>Language</th>
        <th>Read</th>
        <th>Write</th> 
        <th>Speak</th> 
        
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td><input name="lang1" type="text" id="city" value="<?php echo $e4['lang1']; ?>"class="form-control"></td>
        <td><input name="read1" <?php if($e4['read1']=="yes")echo'checked="true"'; ?> type="checkbox" id="city" value="yes"class="form-control"></td>
        <td><input name="write1" <?php if($e4['write1']=="yes")echo'checked="true"'; ?> type="checkbox" id="city" value="yes"class="form-control"></td>
        <td><input name="speak1" <?php if($e4['speak1']=="yes")echo'checked="true"'; ?> type="checkbox" id="city" value="yes"class="form-control"></td>
        
      </tr>
      
      <tr>
        <td>2</td>
        <td><input name="lang2" type="text" id="city" value="<?php echo $e4['lang2']; ?>"class="form-control"></td>
        <td><input name="read2" <?php if($e4['read2']=="yes")echo'checked="true"'; ?> type="checkbox" id="city" value="yes"class="form-control"></td>
        <td><input name="write2" <?php if($e4['write2']=="yes")echo'checked="true"'; ?> type="checkbox" id="city" value="yes"class="form-control"></td>
        <td><input name="speak2" <?php if($e4['speak2']=="yes")echo'checked="true"'; ?> type="checkbox" id="city" value="yes"class="form-control"></td>
        
      </tr>
       <tr>
        <td>3</td>
        <td><input name="lang3" type="text" id="city" value="<?php echo $e4['lang3']; ?>"class="form-control"></td>
        <td><input name="read3" <?php if($e4['read3']=="yes")echo'checked="true"'; ?> type="checkbox" id="city" value="yes"class="form-control"></td>
        <td><input name="write3" <?php if($e4['write3']=="yes")echo'checked="true"'; ?> type="checkbox" id="city" value="yes"class="form-control"></td>
        <td><input name="speak3" <?php if($e4['speak3']=="yes")echo'checked="true"'; ?> type="checkbox" id="city" value="yes"class="form-control"></td>
        
      </tr>
       <tr>
        <td>4</td>
        <td><input name="lang4" type="text" id="city" value="<?php echo $e4['lang4']; ?>"class="form-control"></td>
        <td><input name="read4" <?php if($e4['read4']=="yes")echo'checked="true"'; ?> type="checkbox" id="city" value="yes"class="form-control"></td>
        <td><input name="write4" <?php if($e4['write4']=="yes")echo'checked="true"'; ?> type="checkbox" id="city" value="yes"class="form-control"></td>
        <td><input name="speak4" <?php if($e4['speak4']=="yes")echo'checked="true"'; ?> type="checkbox" id="city" value="yes"class="form-control"></td>
        
      </tr>
     
    </tbody>
  </table>
</div>
                                           
                                       </div>
                                     </div>
 <!-- Language for Proficiency  ended  -->         </div>
 <div class="col-lg-12">
                                <div class="card " id="emp-info" >
                                   <div class="card-header">
                                        <strong>Educational Qualifications (from Recent to Past {S.S.C.}) </strong> 
                                    </div>
                                    <div class="card-body card-block">
                                       
                                           <div class="row form-group">
                                          <table class="table table-bordered">
                                                <thead>
                                           <tr>
        <th>S no.</th>
        <th>School / College / University</th>
        <th>City Name</th>
        <th>From (year)</th> 
        <th>To (year)</th> 
        <th>Course / Degree</th>      
        <th>Division & %</th> 
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td><input name="institute_name1"  type="text" id="city" value="<?php echo $e5['institute_name1']; ?>"class="form-control"></td>
        <td><input name="city1" type="text" id="city" value="<?php echo $e5['city1']; ?>"class="form-control"></td>
        <td><input name="from1" type="text" id="city" value="<?php echo $e5['from1']; ?>"class="form-control"></td>
        <td><input name="to1" type="text" id="city" value="<?php echo $e5['to1']; ?>"class="form-control"></td>
        <td><input name="course1" type="text" id="city" value="<?php echo $e5['course1']; ?>"class="form-control"></td>
        <td><input name="grade1" type="text" id="city" value="<?php echo $e5['grade1']; ?>"class="form-control"></td>

      </tr>
      
      <tr>
        <td>2</td>
        <td><input name="institute_name2" type="text" id="city" value="<?php echo $e5['institute_name2']; ?>"class="form-control"></td>
        <td><input name="city2" type="text" id="city" value="<?php echo $e5['city2']; ?>"class="form-control"></td>
        <td><input name="from2" type="text" id="city" value="<?php echo $e5['from2']; ?>"class="form-control"></td>
        <td><input name="to2" type="text" id="city" value="<?php echo $e5['to2']; ?>"class="form-control"></td>
        <td><input name="course2" type="text" id="city" value="<?php echo $e5['course2']; ?>"class="form-control"></td>
        <td><input name="grade2" type="text" id="city" value="<?php echo $e5['grade2']; ?>"class="form-control"></td>

      </tr>
      <tr>
        <td>3</td>
        <td><input name="institute_name3" type="text" id="city" value="<?php echo $e5['institute_name3']; ?>"class="form-control"></td>
        <td><input name="city3" type="text" id="city" value="<?php echo $e5['city3']; ?>"class="form-control"></td>
        <td><input name="from3" type="text" id="city" value="<?php echo $e5['from3']; ?>"class="form-control"></td>
        <td><input name="to3" type="text" id="city" value="<?php echo $e5['to3']; ?>"class="form-control"></td>
        <td><input name="course3" type="text" id="city" value="<?php echo $e5['course3']; ?>"class="form-control"></td>
        <td><input name="grade3" type="text" id="city" value="<?php echo $e5['grade3']; ?>"class="form-control"></td>

      </tr>
      <tr>
        <td>4</td>
        <td><input name="institute_name4" type="text" id="city" value="<?php echo $e5['institute_name4']; ?>"class="form-control"></td>
        <td><input name="city4" type="text" id="city" value="<?php echo $e5['city4']; ?>"class="form-control"></td>
        <td><input name="from4" type="text" id="city" value="<?php echo $e5['from4']; ?>"class="form-control"></td>
        <td><input name="to4" type="text" id="city" value="<?php echo $e5['to4']; ?>"class="form-control"></td>
        <td><input name="course4" type="text" id="city" value="<?php echo $e5['course4']; ?>"class="form-control"></td>
        <td><input name="grade4" type="text" id="city" value="<?php echo $e5['grade4']; ?>"class="form-control"></td>

      </tr>
      <tr>
        <td>5</td>
        <td><input name="institute_name5" type="text" id="city" value="<?php echo $e5['institute_name5']; ?>"class="form-control"></td>
        <td><input name="city5" type="text" id="city" value="<?php echo $e5['city5']; ?>"class="form-control"></td>
        <td><input name="from5" type="text" id="city" value="<?php echo $e5['from5']; ?>"class="form-control"></td>
        <td><input name="to5" type="text" id="city" value="<?php echo $e5['to5']; ?>"class="form-control"></td>
        <td><input name="course5" type="text" id="city" value="<?php echo $e5['course5']; ?>"class="form-control"></td>
        <td><input name="grade5" type="text" id="city" value="<?php echo $e5['grade5']; ?>"class="form-control"></td>

      </tr>
     <tr>
        <td>6</td>
        <td><input name="institute_name6" type="text" id="city" value="<?php echo $e5['institute_name6']; ?>"class="form-control"></td>
        <td><input name="city6" type="text" id="city" value="<?php echo $e5['city6']; ?>"class="form-control"></td>
        <td><input name="from6" type="text" id="city" value="<?php echo $e5['from6']; ?>"class="form-control"></td>
        <td><input name="to6" type="text" id="city" value="<?php echo $e5['to6']; ?>"class="form-control"></td>
        <td><input name="course6" type="text" id="city" value="<?php echo $e5['course6']; ?>"class="form-control"></td>
        <td><input name="grade6" type="text" id="city" value="<?php echo $e5['grade6']; ?>"class="form-control"></td>

      </tr>
    </tbody>
  </table>
</div>
                                            
                                       </div>
                                     </div>
 <!-- Educational Qualifications (from Recent to Past {S.S.C.}) ended  -->         </div>
  <div class="col-lg-12">

   
   <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Describe Yourself</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea name="describe_yourself" type="text" value ="" id="textarea-input" rows="5" placeholder="Content..." class="form-control"><?php echo$e6['describe_yourself'];?></textarea>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Your Strengths & Weaknesses</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea name="strength" type="text" value ="" id="textarea-input" rows="5" placeholder="Content..." class="form-control"><?php echo$e6['strength'];?></textarea>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">List Your Professional Achievements, if any</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea name="Professional_achievement" type="text"  value ="" id="textarea-input" rows="5" placeholder="Content..." class="form-control"><?php echo$e6['Professional_achievement'];?></textarea>
                                                </div>
                                            </div>

                                            
</div>
  <div class="col-lg-12">
                                <div class="card " id="emp-info" >
                                   <div class="card-header">
                                        <strong>Please respond / select the appropriate: </strong> 
                                    </div>
                                    <div class="card-body card-block">
                                        
                                           <div class="row form-group">
                                            <div class="col-6">
                                            <label for="city" class=" form-control-label">Experience (In Years) </label>
                                            </div>
                                            <div class="col-3">
                                           <label for="city" class=" form-control-label">IT </label>
                                            <input name="it_exp" type="text" id="city" value="<?php echo $e7['it_exp']; ?>"class="form-control" >

                                            </div>
                                            <div class="col-3">
                                                <label for="city" class=" form-control-label">Non-IT</label>
                                            <input name="non_it_exp" type="text" id="city" value="<?php echo $e7['non_it_exp']; ?>"class="form-control" >
                                            </div>
                                           </div>
                                            <div class="row form-group">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Any political affiliations, if so, give a brief account.</label>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                            <input name="political" type="text" id="city" value="<?php echo $e7['political']; ?>"class="form-control" >
                                            <small class="form-text text-muted">write NA if not applicable</small>
                                                </div>
                                            </div>
                                           
                                           
                                        </div>
                                         <div class="row form-group">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Any physical disability of permanent nature or chronic illness.           </label>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                            <input name="physical_disability" type="text" id="city" value="<?php echo $e7['physical_disability']; ?>"class="form-control" >
                                            <small class="form-text text-muted">write NA if not applicable</small>
                                                </div>
                                            </div>
                                           
                                           
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label"> What motivates you most    
                                            <small class="form-text text-muted">Rank High:1 to Low:4</small>

                                                     </label>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <label for="city" class=" form-control-label">Money</label>
                                            <input name="money" type="text" id="city" value="<?php echo $e7['money']; ?>"class="form-control" >
                                            </div>
                                            <div class="col-2">
                                                <label for="city" class=" form-control-label">Recognition</label>
                                            <input name="recognition" type="text" id="city" value="<?php echo $e7['recognition']; ?>"class="form-control" >
                                            </div>
                                            <div class="col-2">
                                                <label for="city" class=" form-control-label">Team</label>
                                            <input name="team" type="text" id="city" value="<?php echo $e7['team']; ?>"class="form-control" >
                                            </div>
                                            <div class="col-2">
                                                <label for="city" class=" form-control-label">Pressure</label>
                                            <input name="pressure" type="text" id="city" value="<?php echo $e7['pressure']; ?>"class="form-control" >
                                            </div>
                                           
                                           
                                        </div>
                                          <div class="row">
                                               <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">In a Typical Week you can work?   </label>
                                                </div>
                                              </div>
                                            <div class="col-lg-2">
                                                  <div class="form-group">
                                                    <input name="work_in_week" <?php if($e7['work_in_week']=="40 Hrs")echo'checked="true"'; ?> type="radio" id="city" value="40 Hrs"class="form-control-radio" >
                                                    <label for="city" class=" form-control-label">40 Hrs </label>
                                            

                                                </div>
                                              </div>
                                                <div class="col-lg-2">
                                                <div class="form-group">
                                                  <input name="work_in_week" <?php if($e7['work_in_week']=="50 Hrs")echo'checked="true"'; ?> type="radio" id="city" value="50 Hrs"class="form-control-radio" >
                                                    <label for="city" class=" form-control-label">50 Hrs</label>
                                            
                                                </div>
                                              </div>
                                            <div class="col-lg-2">
                                                  <div class="form-group">
                                                    <input name="work_in_week" <?php if($e7['work_in_week']=="60 Hrs")echo'checked="true"'; ?>  type="radio" id="city" value="60 Hrs"class="form-control-radio" >
                                                    <label for="city" class=" form-control-label">60 Hrs </label>
                                            
                                                </div>
                                              </div>
                                            </div>

                                             <div class="row">
                                               <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Around a Deadline you can Work?</label>
                                                </div>
                                              </div>
                                            <div class="col-lg-2">
                                                  <div class="form-group">
                                                    <input name="deadline_time_in_week" <?php if($e7['deadline_time_in_week']=="40 Hrs")echo'checked="true"'; ?> type="radio" id="city" value="40 Hrs"class="form-control-radio" >
                                                    <label for="city" class=" form-control-label">40 Hrs </label>
                                            

                                                </div>
                                              </div>
                                                <div class="col-lg-2">
                                                <div class="form-group">
                                                  <input name="deadline_time_in_week" <?php if($e7['deadline_time_in_week']=="50 Hrs")echo'checked="true"'; ?> type="radio" id="city" value="50 Hrs"class="form-control-radio" >
                                                    <label for="city" class=" form-control-label">50 Hrs</label>
                                            
                                                </div>
                                              </div>
                                            <div class="col-lg-2">
                                                  <div class="form-group">
                                                     <input name="deadline_time_in_week" <?php if($e7['deadline_time_in_week']=="60 Hrs")echo'checked="true"'; ?> type="radio" id="city" value="60 Hrs"class="form-control-radio" >
                                                    <label for="city" class=" form-control-label">60 Hrs </label>
                                           
                                                </div>
                                              </div>
                                              <div class="col-lg-2">
                                                  <div class="form-group">
                                                    <input name="deadline_time_in_week" <?php if($e7['deadline_time_in_week']=="70 Hrs")echo'checked="true"'; ?> type="radio" id="city" value="70 Hrs"class="form-control-radio" >
                                                    <label for="city" class=" form-control-label">70 Hrs </label>
                                            
                                                </div>
                                              </div>
                                            </div>
                                            <div class="row">
                                               <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Do you like to learn new stuff ?</label>
                                                </div>
                                              </div>
                                            <div class="col-lg-2">
                                                  <div class="form-group">
                                                    <input name="new_stuff" <?php if($e7['new_stuff']=="Regularly")echo'checked="true"'; ?> type="radio" id="city" value="Regularly"class="form-control-radio" >
                                                    <label for="city" class=" form-control-label">Regularly </label>
                                            

                                                </div>
                                              </div>
                                                <div class="col-lg-2">
                                                <div class="form-group">
                                                  <input name="new_stuff"  <?php if($e7['new_stuff']=="Need Basis")echo'checked="true"'; ?> type="radio" id="city" value="Need Basis"class="form-control-radio" >
                                                    <label for="city" class=" form-control-label">Need Basis</label>
                                            
                                                </div>
                                              </div>
                                            <div class="col-lg-2">
                                                  <div class="form-group">
                                                    <input name="new_stuff" <?php if($e7['new_stuff']=="Not so often")echo'checked="true"'; ?> type="radio" id="city" value="Not so often"class="form-control-radio" >
                                                    <label for="city" class=" form-control-label">Not so often</label>
                                            
                                                </div>
                                              </div>
                                            </div>
                                            <div class="row">
                                               <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label"><h5>You prefer to be </h5></label><br>
                                                </div>
                                              </div>
                                              <br>
                                            </div>
                                            <div class="row">
                                            <div class="col-lg-2">
                                                  <div class="form-group">
                                                    <input name="you_prefer" <?php if($e7['you_prefer']=="Manager")echo'checked="true"'; ?> type="radio" id="city" value="Manager"class="form-control-radio" >
                                                    <label for="city" class=" form-control-label">Manager</label>
                                            

                                                </div>
                                              </div>
                                                <div class="col-lg-2">
                                                <div class="form-group">
                                                  <input name="you_prefer" <?php if($e7['you_prefer']=="Leader")echo'checked="true"'; ?> type="radio" id="city" value="Leader"class="form-control-radio" >
                                                    <label for="city" class=" form-control-label">Leader</label>
                                            
                                                </div>
                                              </div>
                                            <div class="col-lg-2">
                                                  <div class="form-group">
                                                    <input name="you_prefer" <?php if($e7['you_prefer']=="Designer")echo'checked="true"'; ?> type="radio" id="city" value="Designer"class="form-control-radio" >
                                                    <label for="city" class=" form-control-label">Designer</label>
                                            
                                                </div>
                                              </div>
                                                <div class="col-lg-2">
                                                  <div class="form-group">
                                                    <input name="you_prefer" <?php if($e7['you_prefer']=="Programmer")echo'checked="true"'; ?> type="radio" id="city" value="Programmer"class="form-control-radio" >
                                                    <label for="city" class=" form-control-label">Programmer</label>
                                            

                                                </div>
                                              </div>
                                                <div class="col-lg-2">
                                                  <div class="form-group">
                                                     <input name="you_prefer" <?php if($e7['you_prefer']=="Other")echo'checked="true"'; ?> type="radio" id="city" value="Other"class="form-control-radio" >
                                                    <label for="city" class=" form-control-label">Other</label>
                                           

                                                </div>
                                              </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                               <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Do you know What is Stock Option?</label>
                                                </div>
                                              </div>
                                            <div class="col-lg-3">
                                                  <div class="form-group">
                                                    <input name="stock_option" <?php if($e7['stock_option']=="yes")echo'checked="true"'; ?> type="radio" id="city" value="yes"class="form-control-radio" >
                                                    <label for="city" class=" form-control-label">YES </label>
                                            
                                                </div>
                                              </div>
                                              <div class="col-lg-3">
                                                  <div class="form-group">
                                                    <input name="stock_option" <?php if($e7['stock_option']=="no")echo'checked="true"'; ?> type="radio" id="city" value="no"class="form-control-radio" >
                                                    <label for="city" class=" form-control-label">NO</label>
                                            
                                                </div>
                                              </div>
                                              
                                            </div>
                                            <div class="row">
                                               <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">What is more important to an organization?</label>
                                                </div>
                                              </div>
                                            <div class="col-lg-3">
                                                  <div class="form-group">
                                                    <input name="imp_for_organization" <?php if($e7['imp_for_organization']=="Your Individual Performance")echo'checked="true"'; ?> type="radio" id="city" value="Your Individual Performance"class="form-control-radio" >
                                                    <label for="city" class=" form-control-label">Your Individual Performance </label>
                                            
                                                </div>
                                              </div>
                                              <div class="col-lg-3">
                                                  <div class="form-group">
                                                    <input name="imp_for_organization" <?php if($e7['imp_for_organization']=="Your Team performance")echo'checked="true"'; ?> type="radio" id="city" value="Your Team performance" class="form-control-radio" >
                                                    <label for="city" class=" form-control-label">Your Team performance</label>
                                            
                                                </div>
                                              </div>
                                              
                                            </div>
                                             <div class="row">
                                               <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Do you Like to Share Information?</label>
                                                </div>
                                              </div>
                                            <div class="col-lg-3">
                                                  <div class="form-group">
                                                    <input name="you_share_info" <?php if($e7['you_share_info']=="yes")echo'checked="true"'; ?> type="radio" id="city" value="yes"class="form-control-radio" >
                                                    <label for="city" class=" form-control-label">Yes </label>
                                            
                                                </div>
                                              </div>
                                              <div class="col-lg-3">
                                                  <div class="form-group">
                                                    <input name="you_share_info" <?php if($e7['you_share_info']=="no")echo'checked="true"'; ?> type="radio" id="city" value="no"class="form-control-radio" >
                                                    <label for="city" class=" form-control-label">No</label>
                                            
                                                </div>
                                              </div>
                                              
                                            </div>
                                             <div class="row">
                                               <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">How you identify yourself as?</label>
                                                </div>
                                              </div>
                                            <div class="col-lg-3">
                                                  <div class="form-group">
                                                     <input name="yourself" <?php if($e7['yourself']=="Team Player")echo'checked="true"'; ?> type="radio" id="city" value="Team Player"class="form-control-radio" >
                                                    <label for="city" class=" form-control-label">Team Player</label>
                                           
                                                </div>
                                              </div>
                                              <div class="col-lg-3">
                                                  <div class="form-group">
                                                     <input name="yourself"<?php if($e7['yourself']=="Individual Contributor")echo'checked="true"'; ?> type="radio" id="city" value="Individual Contributor"class="form-control-radio" >
                                                    <label for="city" class=" form-control-label">Individual Contributor</label>
                                           
                                                </div>
                                              </div>
                                              
                                            </div>
                                            <div class="row">
                                               <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Can you handle risk?</label>
                                                </div>
                                              </div>
                                            <div class="col-lg-3">
                                                  <div class="form-group">
                                                    <input name="handle_risk" <?php if($e7['handle_risk']=="Very Well")echo'checked="true"'; ?> type="radio" id="city" value="Very Well"class="form-control-radio" >
                                                    <label for="city" class=" form-control-label">Very Well</label>
                                            
                                                </div>
                                              </div>
                                              <div class="col-lg-3">
                                                  <div class="form-group">

                                                    <input name="handle_risk" <?php if($e7['handle_risk']=="Not so well")echo'checked="true"'; ?> type="radio" id="city" value="Not so well"class="form-control-radio" >
                                                    <label for="city" class=" form-control-label">Not so well</label>
                                            
                                                </div>
                                              </div>
                                              
                                            </div>
                                             <div class="row">
                                               <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Can you travel locally if a job requires it?  </label>
                                                </div>
                                              </div>
                                            <div class="col-lg-3">
                                                  <div class="form-group">

                                                    <input name="will_travel" <?php if($e7['will_travel']=="yes")echo'checked="true"'; ?> type="radio" id="city" value="yes" class="form-control-radio" >
                                                    <label for="city" class=" form-control-label">Yes</label>
                                            
                                                </div>
                                              </div>
                                              <div class="col-lg-3">
                                                  <div class="form-group">
                                                    <input name="will_travel" <?php if($e7['will_travel']=="no")echo'checked="true"'; ?> type="radio" id="city" value="no" class="form-control-radio" >
                                                    <label for="city" class=" form-control-label">No</label>
                                            
                                                </div>
                                              </div>
                                              
                                            </div>
                                       
                                         
                                    </div>
                                  </div>
 <!-- Please respond / select the appropriate: ended  -->         </div>

 <div class="col-lg-12">
                                <div class="card " id="emp-info" >
                                   <div class="card-header">
                                        <strong>Provide Skill details and tick appropriate option from provided ratings </strong> 
                                    </div>
                                    <div class="card-body card-block">
                                        
                                           <div class="row form-group">
                                          <table class="table table-bordered">
                                                <thead>
                                           <tr>
        <th>S no.</th>
        <th>Subject</th>
        <th>Excellent</th>
        <th>Above Avg.</th>
        <th>Avg</th> 
        <th>Below Avg.</th> 
        <th>None</th>      
         
      </tr>
    </thead>
    <tbody>

      <tr>
        <td>1</td>
        <td><input name="subject1" type="text" id="city" value="<?php echo $e8['subject1']; ?>"class="form-control"></td>
        <td><input name="skill_grade1" <?php if($e8['skill_grade1']=="Excellent")echo'checked="true"'; ?> type="radio" id="city" value="Excellent"class="form-control"></td>
        <td><input name="skill_grade1"  <?php if($e8['skill_grade1']=="Above Avg")echo'checked="true"'; ?> type="radio" id="city" value="Above Avg"class="form-control"></td>
        <td><input name="skill_grade1"  <?php if($e8['skill_grade1']=="Avg")echo'checked="true"'; ?> type="radio" id="city" value="Avg"class="form-control"></td>
        <td><input name="skill_grade1"  <?php if($e8['skill_grade1']=="Below Avg")echo'checked="true"'; ?> type="radio" id="city" value="Below Avg"class="form-control"></td>
        <td><input name="skill_grade1"  <?php if($e8['skill_grade1']=="None")echo'checked="true"'; ?> type="radio" id="city" value="None"class="form-control"></td>

      </tr>
      <tr>
        <td>2</td>
        <td><input name="subject2" type="text" id="city" value="<?php echo $e8['subject2']; ?>"class="form-control"></td>
        <td><input name="skill_grade2" <?php if($e8['skill_grade2']=="Excellent")echo'checked="true"'; ?> type="radio" id="city" value="Excellent"class="form-control"></td>
        <td><input name="skill_grade2" <?php if($e8['skill_grade2']=="Above Avg")echo'checked="true"'; ?> type="radio" id="city" value="Above Avg"class="form-control"></td>
        <td><input name="skill_grade2" <?php if($e8['skill_grade2']=="Avg")echo'checked="true"'; ?> type="radio" id="city" value="Avg"class="form-control"></td>
        <td><input name="skill_grade2"<?php if($e8['skill_grade2']=="Below Avg")echo'checked="true"'; ?> type="radio" id="city" value="Below Avg"class="form-control"></td>
        <td><input name="skill_grade2" <?php if($e8['skill_grade2']=="None")echo'checked="true"'; ?> type="radio" id="city" value="None"class="form-control"></td>

      </tr><tr>
        <td>3</td>
        <td><input name="subject3" type="text" id="city" value="<?php echo $e8['subject3']; ?>"class="form-control"></td>
        <td><input name="skill_grade3" <?php if($e8['skill_grade3']=="Excellent")echo'checked="true"'; ?> type="radio" id="city" value="Excellent"class="form-control"></td>
        <td><input name="skill_grade3" <?php if($e8['skill_grade3']=="Above Avg")echo'checked="true"'; ?> type="radio" id="city" value="Above Avg"class="form-control"></td>
        <td><input name="skill_grade3" <?php if($e8['skill_grade3']=="Avg")echo'checked="true"'; ?> type="radio" id="city" value="Avg"class="form-control"></td>
        <td><input name="skill_grade3" <?php if($e8['skill_grade3']=="Below Avg")echo'checked="true"'; ?> type="radio" id="city" value="Below Avg"class="form-control"></td>
        <td><input name="skill_grade3" <?php if($e8['skill_grade3']=="None")echo'checked="true"'; ?> type="radio" id="city" value="None"class="form-control"></td>

      </tr>
      <tr>
        <td>4</td>
        <td><input name="subject4" type="text" id="city" value="<?php echo $e8['subject4']; ?>"class="form-control"></td>
        <td><input name="skill_grade4" <?php if($e8['skill_grade4']=="Excellent")echo'checked="true"'; ?> type="radio" id="city" value="Excellent"class="form-control"></td>
        <td><input name="skill_grade4" <?php if($e8['skill_grade4']=="Above Avg")echo'checked="true"'; ?> type="radio" id="city" value="Above Avg"class="form-control"></td>
        <td><input name="skill_grade4" <?php if($e8['skill_grade4']=="Avg")echo'checked="true"'; ?> type="radio" id="city" value="Avg"class="form-control"></td>
        <td><input name="skill_grade4" <?php if($e8['skill_grade4']=="Below Avg")echo'checked="true"'; ?> type="radio" id="city" value="Below Avg"class="form-control"></td>
        <td><input name="skill_grade4" <?php if($e8['skill_grade4']=="None")echo'checked="true"'; ?> type="radio" id="city" value="None"class="form-control"></td>

      </tr>
      <tr>
        <td>5</td>
        <td><input name="subject5" type="text" id="city" value="<?php echo $e8['subject5']; ?>"class="form-control"></td>
        <td><input name="skill_grade5" <?php if($e8['skill_grade5']=="Excellent")echo'checked="true"'; ?> type="radio" id="city" value="Excellent"class="form-control"></td>
        <td><input name="skill_grade5" <?php if($e8['skill_grade5']=="Above Avg")echo'checked="true"'; ?> type="radio" id="city" value="Above Avg"class="form-control"></td>
        <td><input name="skill_grade5" <?php if($e8['skill_grade5']=="Avg")echo'checked="true"'; ?> type="radio" id="city" value="Avg"class="form-control"></td>
        <td><input name="skill_grade5" <?php if($e8['skill_grade5']=="Below Avg")echo'checked="true"'; ?> type="radio" id="city" value="Below Avg"class="form-control"></td>
        <td><input name="skill_grade5" <?php if($e8['skill_grade5']=="None")echo'checked="true"'; ?> type="radio" id="city" value="None"class="form-control"></td>

      </tr>
      <tr>
        <td>6</td>
        <td><input name="subject6" type="text" id="city" value="<?php echo $e8['subject6']; ?>"class="form-control"></td>
        <td><input name="skill_grade6"<?php if($e8['skill_grade6']=="Excellent")echo'checked="true"'; ?> type="radio" id="city" value="Excellent"class="form-control"></td>
        <td><input name="skill_grade6" <?php if($e8['skill_grade6']=="Above Avg")echo'checked="true"'; ?> type="radio" id="city" value="Above Avg"class="form-control"></td>
        <td><input name="skill_grade6" <?php if($e8['skill_grade6']=="Avg")echo'checked="true"'; ?> type="radio" id="city" value="Avg"class="form-control"></td>
        <td><input name="skill_grade6" <?php if($e8['skill_grade6']=="Below Avg")echo'checked="true"'; ?> type="radio" id="city" value="Below Avg"class="form-control"></td>
        <td><input name="skill_grade" <?php if($e8['skill_grade6']=="None")echo'checked="true"'; ?> type="radio" id="city" value="None"class="form-control"></td>

      </tr>
      
      
    </tbody>
  </table>
  
  <div class="row">
    <!--  <div class="col col-md-12 m-t-30">
    <h6 >Add More Fields Dynamically</h6>
                                                <small>Please enlist more programmiing skills with fluency in it.</small>
                                                    <br>
                                                    <small>Eg: C++(Expert)</small>
                                                </div>

    <div class="col col-md-12 m-t-30">
        
    <div id="wrap">
        <div class="my_box">
            <div class="field_box"><input type="textbox" name="name[]" id="name"  class="form-control"></div>
            <div class="button_box"><input type="button" name="add_btn1" value="Add More" onclick="add_more()" class="btn btn-success btn-sm"></div>
        </div>
    </div>
    <input type="hidden" id="box_count" value="1">
<style>
#wrap{width:100%;}
.my_box{width:100%; padding-bottom:90px;}
.field_box{float:left;width:100%;}
.button_box{float:left;width:100%;}
</style>
</div> -->
  <div class="col col-md-12 m-t-30">
                                                    <h6 >OTHER SPECIAL SKILLS</h6>
                                                    <small>Please list other special skills you may have, e.g., fluency in other languages, certification, etc.</small>
                                                </div>
                                                <div class="col-12 col-md-12">
                                                    <textarea name="other_special_skill" type="text"  value ="" id="textarea-input" rows="5" placeholder="" class="form-control"><?php echo $e8['other_special_skill']; ?></textarea>
                                                </div>
                                              </div>

                                           

                                       </div>
                                     </div>
 <!-- Skill  ended  -->         </div>
</div>


 <div class="col-lg-12">

 
                                <div class="card " id="emp-info" >
                                   <div class="card-header">
                                        <strong>WORK EXPERIENCE & REFERENCES </strong>
                                        <small>Please list your work experience of your most recent job. </small> 
                                    </div>

                                    <?php
                                                
                                                while($row = mysqli_fetch_array($ssql_work_experience)) {
                                                  echo "=====================================";
                                                ?>
                                    <div class="card-body card-block">
    <div id="wrapp">
        <div class="my_box1">
            <div class="field_box1">


            <div class="row form-group">
                                            <div class="col-6">
                                               <div class="form-group">
                                                    <label for="city" class=" form-control-label">Most Recent Employer Name</label>
                                            <input name="employer_name[]" type="text" id="city" value="<?php echo $row['employer_name']; ?>" class="form-control" >
                                                </div>
                                            </div>
                                            <div class="col-3">
                                               <div class="form-group">
                                                    <label for="city" class=" form-control-label">From Date</label>
                                            <input name="from_date[]" type="date" id="city" value="<?php echo $row['from_date']; ?>" class="form-control" >
                                                </div>
                                            </div>
                                            <div class="col-3">
                                               <div class="form-group">
                                                    <label for="city" class=" form-control-label">To Date</label>
                                            <input name="to_date[]" type="date" id="city"  value="<?php echo $row['to_date']; ?>" class="form-control" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Company Address</label>
                                            <input name="company_address[]" type="text" id="city" value="<?php echo $row['company_address']; ?>" class="form-control" >
                                                <small>Complete Address with Pin code</small>
                                                </div>
                                            </div>
                                  
                                           
                                           
                                        </div>
                                          <div class="row">
                                            <div class="col-lg-12">
                                            <h6>Supervisor / Reporting Manager Details</h6>
                                          </div>
                                               <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Supervisor Name </label>
                                            <input name="supervisor_name[]" type="text" id="city" value="<?php echo $row['supervisor_name']; ?>" class="form-control" >
                                                </div>
                                              </div>
                                            <div class="col-lg-3">
                                                  <div class="form-group">
                                                    <label for="city" class=" form-control-label">Mobile/Phone </label>
                                            <input name="supervisor_phone[]" type="text" id="city" value="<?php echo $row['supervisor_phone']; ?>" class="form-control" >
                                                </div>
                                              </div>
                                                <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Official e-Mail</label>
                                            <input name="supervisor_email[]" type="text" id="city" value="<?php echo $row['supervisor_email']; ?>" class="form-control" >
                                                </div>
                                              </div>
                                            
                                            </div>
                                             <div class="row">
                                            <div class="col-lg-12">
                                            <h6>HR Details</h6>
                                          </div>
                                               <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">HR Name </label>
                                            <input name="hr_name[]" type="text" id="city" value="<?php echo $row['hr_name']; ?>" class="form-control" >
                                                </div>
                                              </div>
                                            <div class="col-lg-3">
                                                  <div class="form-group">
                                                    <label for="city" class=" form-control-label">Mobile/Phone </label>
                                            <input name="hr_mobile[]" type="text" id="city" value="<?php echo $row['hr_mobile']; ?>" class="form-control" >
                                                </div>
                                              </div>
                                                <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Official e-Mail</label>
                                            <input name="hr_email[]" type="text" id="city" value="<?php echo $row['hr_email']; ?> "class="form-control" >
                                                </div>
                                              </div>
                                            
                                            </div>
                                              <div class="row">
                                            <div class="col-lg-12">
                                            <h6>Job title</h6>
                                          </div>
                                               <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Last CTC Drawn per Annum </label>
                                            <input name="last_ctc[]" type="text" id="city" value="<?php echo $row['last_ctc']; ?>" class="form-control" >
                                                </div>
                                              </div>
                                            <div class="col-lg-6">
                                                  <div class="form-group">
                                                    <label for="city" class=" form-control-label">Reason for Leaving: </label>
                                            <input name="reason_for_leaving[]" type="text" value="<?php echo $row['reason_for_leaving']; ?>" id="city" class="form-control" >
                                                </div>
                                              </div>
            </div>
        </div>
            
        </div>
    </div>
    
                                                 

                                        
                                               
                                            
                                        
                                  </div>

                                <?php  } ?>


          <!-- work experience details ended  --> </div>
      </div>



          <div class="col-lg-12">
                                <div class="card " id="emp-info" >
                                   <div class="card-header">
                                        <strong>REFERENCES OF RELATIVES OR FRIENDS </strong><br>
                                        <small>Please list two references of relatives or friends.  Prior employers preferred </small> 
                                    </div>
                                    <div class="card-body card-block">
                                        
                                           <div class="row form-group">
                                            <div class="col-6" style="border-right: 1px solid black;">
                                              <div class="row">
                                               <div class="col-12">
                                               <div class="form-group">
                                                    <label for="city" class=" form-control-label">Name</label>
                                            <input name="ref_name1" type="text" id="city" value="<?php echo $e10['ref_name1']; ?>"class="form-control" >
                                                </div>
                                            </div>
                                            
                                          </div>
                                           <div class="row">
                                               <div class="col-12">
                                               <div class="form-group">
                                                    <label for="city" class=" form-control-label">Relation</label>
                                            <input name="ref_relation1" type="text" id="city" value="<?php echo $e10['ref_relation1']; ?>"class="form-control" >
                                                </div>
                                            </div>
                                            
                                          </div>
                                           <div class="row">
                                               <div class="col-12">
                                               <div class="form-group">
                                                    <label for="city" class=" form-control-label">Occupation</label>
                                            <input name="ref_occupation1" type="text" id="city" value="<?php echo $e10['ref_occupation1']; ?>"class="form-control" >
                                                </div>
                                            </div>
                                            
                                          </div>
                                           <div class="row">
                                               <div class="col-12">
                                               <div class="form-group">
                                                    <label for="city" class=" form-control-label">Address</label>
                                            <input name="ref_address1" type="text" id="city" value="<?php echo $e10['ref_address1']; ?>"class="form-control" >
                                                </div>
                                            </div>
                                            
                                          </div>
                                           <div class="row">
                                               <div class="col-12">
                                               <div class="form-group">
                                                    <label for="city" class=" form-control-label">Mobile</label>
                                            <input name="ref_mobile1" type="text" id="city" value="<?php echo $e10['ref_mobile1']; ?>"class="form-control" >
                                                </div>
                                            </div>
                                            
                                          </div>
                                           <div class="row">
                                               <div class="col-12">
                                               <div class="form-group">
                                                    <label for="city" class=" form-control-label">Email</label>
                                            <input name="ref_email1" type="text" id="city" value="<?php echo $e10['ref_email1']; ?>"class="form-control" >
                                                </div>
                                            </div>
                                            
                                          </div>

                                              
                                            </div>
                                             <div class="col-6" >
                                              <div class="row">
                                               <div class="col-12">
                                               <div class="form-group">
                                                    <label for="city" class=" form-control-label">Name</label>
                                            <input name="ref_name2" type="text" id="city" value="<?php echo $e10['ref_name2']; ?>"class="form-control" >
                                                </div>
                                            </div>
                                            
                                          </div>
                                           <div class="row">
                                               <div class="col-12">
                                               <div class="form-group">
                                                    <label for="city" class=" form-control-label">Relation</label>
                                            <input name="ref_relation2" type="text" id="city" value="<?php echo $e10['ref_relation2']; ?>"class="form-control" >
                                                </div>
                                            </div>
                                            
                                          </div>
                                           <div class="row">
                                               <div class="col-12">
                                               <div class="form-group">
                                                    <label for="city" class=" form-control-label">Occupation</label>
                                            <input name="ref_occupation2" type="text" id="city" value="<?php echo $e10['ref_occupation2']; ?>"class="form-control" >
                                                </div>
                                            </div>
                                            
                                          </div>
                                           <div class="row">
                                               <div class="col-12">
                                               <div class="form-group">
                                                    <label for="city" class=" form-control-label">Address</label>
                                            <input name="ref_address2" type="text" id="city" value="<?php echo $e10['ref_address2']; ?>"class="form-control" >
                                                </div>
                                            </div>
                                            
                                          </div>
                                           <div class="row">
                                               <div class="col-12">
                                               <div class="form-group">
                                                    <label for="city" class=" form-control-label">Mobile</label>
                                            <input name="ref_mobile2" type="text" id="city" value="<?php echo $e10['ref_mobile2']; ?>"class="form-control" >
                                                </div>
                                            </div>
                                            
                                          </div>
                                           <div class="row">
                                               <div class="col-12">
                                               <div class="form-group">
                                                    <label for="city" class=" form-control-label">Email</label>
                                            <input name="ref_email2" type="text" id="city" value="<?php echo $e10['ref_email2']; ?>"class="form-control" >
                                                </div>
                                            </div>
                                            
                                          </div>

                                              
                                            </div>
                                            
                                           </div>
                                            
                                       
                                           
                                            
                                            
                                      
                                    </div>
                                  </div>
          <!-- REFERENCES OF RELATIVES OR FRIENDS ended  --> </div>

          <div class="col-lg-12">
                                <div class="card " id="emp-info" >
                                   
                                    <div class="card-body card-block">
                                        
                                           <div class="row form-group">
                                           
                                            
                                           
                                            

                                            <div class="col-6">
                                               <div class="form-group">
                                                    <label for="city" class=" form-control-label">Signature</label>
                                              <?php 
        if($e10['signature'])
             { echo "  <td> <a href='cand_docs/signature/".$e10['signature']."'><p   style='font-size:30px;color:green;'>  
&#128065;</p></a> </td>";
             }
        else
             {
               echo ' <td><i class="fa fa-eye" style="font-size:24px"></i></td> ';
             }
        ?> 
        <br>
                                            <small style="color:red">This signature should match with the signature in the pan card </small>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                               <div class="form-group">
                                                    <label for="city" class=" form-control-label">date</label>
                                            <input name="sig_date" type="date" id="city" value="<?php echo $e10['sig_date']; ?>"class="form-control" >
                                                </div>
                                            </div>

                                            <div class="col-12">
                                               <div class="form-group">
                                                <h6>The following person has been designated to handle inquiries regarding Vidushi Infotech SSP Pvt. Ltd.’s employment norms: Head of Human Resources, Cerebrum IT Park, B-3 Building, 2nd Floor, Office 3-A, Kalyani Nagar, Pune 411014</h6>
                                                       </div>
                                            </div>

                                            


                                           </div>
                                            
                                       
                                           
                                            
                                            
                                    </div>
                                  </div>
          <!-- WAIVERS AND DISCLOSURES ended  --> </div>

          

          <!-- main row ended  -->  </div>


                                            
            
                                        
                                        <div class="card-footer">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label  class=" form-control-label">Review for the candidate</label>
                              <textarea name="review"  type="text" id="blacklist_reason_input" rows="3"  placeholder="Content..." class="form-control"><?php echo $result_review['review'] ?></textarea>
                                               
                                                </div>
                                            </div>
                                        <button type="submit" name="review_save" class="btn btn-success btn-sm" >
                                            <i class="fa fa-dot-circle-o"></i> Send review to candidate
                                        </button>
                                        <button type="submit" name="review_hr" class="btn btn-primary btn-sm" >
                                            <i class="fa fa-dot-circle-o"></i> Confirm and send for HR validation 
                                        </button>
                                        <p style="color:red;">If the documents are okay ,only then confirm and send</p>
                                        
                                    </div>
                                        </form>
                                    </div>


                                  


                                </div>
                            </div>
    </div>

    <!---- MAIN CONTENT---------->
            

<!---------------------------------->
           
            <!-- END PAGE CONTAINER-->
        </div>

    </div>
</div>


    