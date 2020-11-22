<?php 
include 'cand_base.php' ;
$c_id=$_SESSION['c_id'];


 $query =" SELECT * FROM checklist_on_joining WHERE fk ='$id' ";
       $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
      $result = mysqli_fetch_array($ssql,MYSQLI_ASSOC);


       $query =" SELECT * FROM review_cand_docs WHERE c_id ='$c_id' ";
      $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
       $result_review = mysqli_fetch_array($ssql,MYSQLI_ASSOC);
       $rnum_review = $ssql->num_rows;


if(!isset($_SESSION['login_user'])){
    header("location:login.php");
}
else if ($_SESSION['type'] !=1){
   header("location:login.php");
}
else if ($_SESSION['type'] ==2){
   header("location: sourcing_form.php");

}
else if ($_SESSION['type'] ==3){
   header("location: welcomehr.php");
}

else{
  $myusername = $_SESSION['login_user'];
}

?>


            
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
           <div class="col-lg-12">

                                <div class="card " id="Candidate-info"  >
                                    <div class="card-header">
                                       <h3>
                            Check-list on Joining</h3>
                        <span class="red fullWidth" style="color: Red; font-size: 12px;">Only pdf/jpeg/jpg/png
                            format allowed.<br>Please rename the files before uploading. </span> 
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="insert_checklist_on_joining.php" method="post" enctype="multipart/form-data" class="form-horizontal"> <table class="table table-bordered">
                                                <thead>
      <tr>
        <th>S no.</th>
        <th>Document Name</th>
        <th>Upload Document</th>
        <th>Save</th>  
        <th>Clear</th>      
        <th>Current Document</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>Experience & Relieving certificate<br><small style=" color: blue;">from Last organization<br> Not applicable  for Freshers.</small></td>
        <td><input type="file" name="exp_and_rel_cert" value="fileupload" id="fileupload" ></td>
        <td><button type="submit" name="submit1" class="btn btn-primary btn-sm" >Save</button></td>
        <td><a href="insert_checklist_on_joining.php?delete1"><button   class="btn btn-danger btn-sm" >Clear</button></a></td>

        <?php 
        if($result['exp_and_rel_cert'])
             { echo "  <td> <a href='checklist/exp_and_rel_cert/".$result['exp_and_rel_cert']."'><p   style='font-size:30px;color:green;'>  
&#128065;</p></a> </td>";
             }
        else
             {
               echo ' <td><i class="fa fa-eye" style="font-size:24px"></i></td> ';
             }
        ?>
      </tr>
      <tr>
        <td>2</td>
        <td>Signed NDA<small style=" color: red">&#42;</small></td>
        <td><input type="file" name="signed_nda" value="fileupload" id="fileupload" ></td>
        <td><button type="submit" name="submit2" class="btn btn-primary btn-sm" >Save</button></td><td><a href="insert_checklist_on_joining.php?delete2"><button   class="btn btn-danger btn-sm" >Clear</button></a></td>        
        <?php 
        if($result['signed_nda'])
             { echo "  <td> <a href='checklist/signed_nda/".$result['signed_nda']."'><p   style='font-size:30px;color:green;'>  
&#128065;</p></a> </td>";
             }
        else
             {
               echo ' <td><i class="fa fa-eye" style="font-size:24px"></i></td> ';
             }
        ?>      </tr>
      <tr>
        <td>3</td>
        <td>Signed MOU.<br> <small style=" color: blue;">It is applicable only for Freshers.</small></td>
        <td><input type="file" name="signed_mou" value="fileupload" id="fileupload" ></td>
        <td><button type="submit" name ="submit3" class="btn btn-primary btn-sm" >Save</button></td><td><a href="insert_checklist_on_joining.php?delete3"><button   class="btn btn-danger btn-sm" >Clear</button></a></td>        
        <?php 
        if($result['signed_mou'])
             { echo "  <td> <a href='checklist/signed_mou/".$result['signed_mou']."'><p   style='font-size:30px;color:green;'>  
&#128065;</p></a> </td>";
             }
        else
             {
               echo ' <td><i class="fa fa-eye" style="font-size:24px"></i></td> ';
             }
        ?>        </tr>
      <tr>
        <td>4</td>
        <td>PF – Nomination form No. 2<small style=" color: red">&#42;</small></td>
        <td><input type="file" name="pf_nomination" value="fileupload" id="fileupload" ></td>
                <td><button type="submit" name ="submit4" class="btn btn-primary btn-sm" >Save</button></td><td><a href="insert_checklist_on_joining.php?delete4"><button   class="btn btn-danger btn-sm" >Clear</button></a></td>        
        <?php 
        if($result['pf_nomination'])
             { echo "  <td> <a href='checklist/pf_nomination/".$result['pf_nomination']."'><p   style='font-size:30px;color:green;'>  
&#128065;</p></a> </td>";
             }
        else
             {
               echo ' <td><i class="fa fa-eye" style="font-size:24px"></i></td> ';
             }
        ?>      </tr>
      <tr>
        <td>5</td>
        <td>PF – Declaration form No. 11<small style=" color: red">&#42;</small></td>
        <td><input type="file" name="declaration_form" value="fileupload" id="fileupload"></td>
                <td><button type="submit" name ="submit5" class="btn btn-primary btn-sm" >Save</button></td><td><a href="insert_checklist_on_joining.php?delete5"><button   class="btn btn-danger btn-sm" >Clear</button></a></td>        
        <?php 
        if($result['declaration_form'])
             { echo "  <td> <a href='checklist/declaration_form/".$result['declaration_form']."'><p   style='font-size:30px;color:green;'>  
&#128065;</p></a> </td>";
             }
        else
             {
               echo ' <td><i class="fa fa-eye" style="font-size:24px"></i></td> ';
             }
        ?>       </tr>
         <tr>
        <td>6</td>
        <td>Passport Submission undertaking.</td>
        <td><input type="file" name="passport_undertaking" value="fileupload" id="fileupload"  ></td>
                <td><button type="submit" name ="submit6" class="btn btn-primary btn-sm" >Save</button></td><td><a href="insert_checklist_on_joining.php?delete6"><button   class="btn btn-danger btn-sm" >Clear</button></a></td>        
        <?php 
        if($result['passport_undertaking'])
             { echo "  <td> <a href='checklist/passport_undertaking/".$result['passport_undertaking']."'><p   style='font-size:30px;color:green;'>  
&#128065;</p></a> </td>";
             }
        else
             {
               echo ' <td><i class="fa fa-eye" style="font-size:24px"></i></td> ';
             }
        ?>      </tr>
      <tr>
        <td>7</td>
        <td>Undertaking-Relieving Documents<br></td>
        <td><input type="file" name="undertaking_relieving" value="fileupload" id="fileupload" ></td>
                <td><button type="submit" name ="submit7" class="btn btn-primary btn-sm" >Save</button></td><td><a href="insert_checklist_on_joining.php?delete7"><button   class="btn btn-danger btn-sm" >Clear</button></a></td>        
        <?php 
        if($result['undertaking_relieving'])
             { echo "  <td> <a href='checklist/undertaking_relieving/".$result['undertaking_relieving']."'><p   style='font-size:30px;color:green;'>  
&#128065;</p></a> </td>";
             }
        else
             {
               echo ' <td><i class="fa fa-eye" style="font-size:24px"></i></td> ';
             }
        ?>       </tr>
     
     
        
        
        

    </tbody>
  </table>

<div class="card-footer">
                                        <a href="insert_checklist_on_joining.php?send_mail"><button  class="btn btn-success btn-sm" >
                                            <i class=""></i>Complete Onboarding 
                                        </button></a>
                                        <p style="color: red;">Please make sure you have filled the documents correctly.<br>HR will get notified as soon as you complete the onboarding</p>
                                    </div>
                                        </form>


<br>


                                           
            
                                        
                                        
                                    </div>

 

                                </div>
                            </div>
    </div>

    <!---- MAIN CONTENT---------->
            

           
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    