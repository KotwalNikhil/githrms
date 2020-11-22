<?php 

include 'index2_base.php' ;
 $query =" SELECT * FROM candidate_documents WHERE fk ='$id' ";
       $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
      $result = mysqli_fetch_array($ssql,MYSQLI_ASSOC);



if(!isset($_SESSION['login_user'])){
    header("location:login.php");
}
else if ($_SESSION['type'] !=1){
   header("location:login.php");
   s
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
                            Upload Scanned Document</h3>
                        <span class="red fullWidth" style="color: Red; font-size: 12px;">Only pdf/jpeg/jpg/png
                            format allowed.<br>Please rename the files before uploading. </span> 
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="insert_cand_docs.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            <table class="table table-bordered">
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
        <td>Resume<small style=" color: red">&#42;</small></td>
        <td><input type="file" name="resume" value="fileupload" id="fileupload" ></td>
        <td><button type="submit" name="submit1" class="btn btn-primary btn-sm" >Save</button></td>
        <td><a href="insert_cand_docs.php?delete1"><button   class="btn btn-danger btn-sm" >Clear</button></a></td>

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
      </tr>
      <tr>
        <td>2</td>
        <td>Current Address Proof<small style=" color: red">&#42;</small></td>
        <td><input type="file" name="c_address" value="fileupload" id="fileupload" ></td>
        <td><button type="submit" name="submit2" class="btn btn-primary btn-sm" >Save</button></td><td><a href="insert_cand_docs.php?delete2"><button   class="btn btn-danger btn-sm" >Clear</button></a></td>        
        <?php 
        if($result['c_address'])
             { echo "  <td> <a href='cand_docs/current_address/".$result['c_address']."'><p   style='font-size:30px;color:green;'>  
&#128065;</p></a> </td>";
             }
        else
             {
               echo ' <td><i class="fa fa-eye" style="font-size:24px"></i></td> ';
             }
        ?>      </tr>
      <tr>
        <td>3</td>
        <td>Permanent address proof<small style=" color: red">&#42;</small></td>
        <td><input type="file" name="p_address" value="fileupload" id="fileupload" ></td>
        <td><button type="submit" name ="submit3" class="btn btn-primary btn-sm" >Save</button></td><td><a href="insert_cand_docs.php?delete3"><button   class="btn btn-danger btn-sm" >Clear</button></a></td>        
        <?php 
        if($result['p_address'])
             { echo "  <td> <a href='cand_docs/permanent_address/".$result['p_address']."'><p   style='font-size:30px;color:green;'>  
&#128065;</p></a> </td>";
             }
        else
             {
               echo ' <td><i class="fa fa-eye" style="font-size:24px"></i></td> ';
             }
        ?>        </tr>
      <tr>
        <td>4</td>
        <td>Pan Card Copy<small style=" color: red">&#42;</small></td>
        <td><input type="file" name="pancard" value="fileupload" id="fileupload" ></td>
                <td><button type="submit" name ="submit4" class="btn btn-primary btn-sm" >Save</button></td><td><a href="insert_cand_docs.php?delete4"><button   class="btn btn-danger btn-sm" >Clear</button></a></td>        
        <?php 
        if($result['pancard'])
             { echo "  <td> <a href='cand_docs/pancards/".$result['pancard']."'><p   style='font-size:30px;color:green;'>  
&#128065;</p></a> </td>";
             }
        else
             {
               echo ' <td><i class="fa fa-eye" style="font-size:24px"></i></td> ';
             }
        ?>      </tr>
      <tr>
        <td>5</td>
        <td>Educational certificates<small style=" color: red">&#42;</small><br> (10th/ 12th/ Diploma/Degree/ PG/Masters) <br><small>combined in one pdf</small></td>
        <td><input type="file" name="edu_certificates" value="fileupload" id="fileupload"></td>
                <td><button type="submit" name ="submit5" class="btn btn-primary btn-sm" >Save</button></td><td><a href="insert_cand_docs.php?delete5"><button   class="btn btn-danger btn-sm" >Clear</button></a></td>        
        <?php 
        if($result['edu_certificates'])
             { echo "  <td> <a href='cand_docs/edu_certificates/".$result['edu_certificates']."'><p   style='font-size:30px;color:green;'>  
&#128065;</p></a> </td>";
             }
        else
             {
               echo ' <td><i class="fa fa-eye" style="font-size:24px"></i></td> ';
             }
        ?>       </tr>
         <tr>
        <td>6</td>
        <td>Photograph<small style=" color: red">&#42;</small></td>
        <td><input type="file" name="photo" value="fileupload" id="fileupload"  ></td>
                <td><button type="submit" name ="submit7" class="btn btn-primary btn-sm" >Save</button></td><td><a href="insert_cand_docs.php?delete6"><button   class="btn btn-danger btn-sm" >Clear</button></a></td>        
        <?php 
        if($result['photo'])
             { echo "  <td> <a href='cand_docs/photo/".$result['photo']."'><p   style='font-size:30px;color:green;'>  
&#128065;</p></a> </td>";
             }
        else
             {
               echo ' <td><i class="fa fa-eye" style="font-size:24px"></i></td> ';
             }
        ?>      </tr>
      <tr>
        <td>7</td>
        <td>Professional Certificates<br><small>combined in one pdf</small></td><
        <td><input type="file" name="pro_certificates" value="fileupload" id="fileupload" ></td>
                <td><button type="submit" name ="submit6" class="btn btn-primary btn-sm" >Save</button></td><td><a href="insert_cand_docs.php?delete7"><button   class="btn btn-danger btn-sm" >Clear</button></a></td>        
        <?php 
        if($result['pro_certificates'])
             { echo "  <td> <a href='cand_docs/pro_certificates/".$result['pro_certificates']."'><p   style='font-size:30px;color:green;'>  
&#128065;</p></a> </td>";
             }
        else
             {
               echo ' <td><i class="fa fa-eye" style="font-size:24px"></i></td> ';
             }
        ?>       </tr>
     
      <tr>
        <td>8</td>
        <td>Pay slip / Salary Certificate (Last Employment)<small style=" color: red">&#42;</small> <br><small>Not applicable for freshers</small></td>
        <td><input type="file" name="payslip" value="fileupload" id="fileupload"></td>
                <td><button type="submit" name="submit8" class="btn btn-primary btn-sm" >Save</button></td><td><a href="insert_cand_docs.php?delete8"><button   class="btn btn-danger btn-sm" >Clear</button></a></td>        
        <?php 
        if($result['payslip'])
             { echo "  <td> <a href='cand_docs/payslip/".$result['payslip']."'><p   style='font-size:30px;color:green;'>  
&#128065;</p></a> </td>";
             }
        else
             {
               echo ' <td><i class="fa fa-eye" style="font-size:24px"></i></td> ';
             }
        ?>       </tr>
      <tr>
        <td>9</td>
        <td>Form No. 16 from Previous Employer<small style=" color: red">&#42;</small><br> <small>Not applicable for freshers</small></td>
        <td><input type="file" name="form16" value="fileupload" id="fileupload"></td>
               <td><button type="submit" name="submit9" class="btn btn-primary btn-sm" >Save</button></td><td><a href="insert_cand_docs.php?delete9"><button   class="btn btn-danger btn-sm" >Clear</button></a></td>        
<?php 
        if($result['form16'])
             { echo "  <td> <a href='cand_docs/form16/".$result['form16']."'><p   style='font-size:30px;color:green;'>  
&#128065;</p></a> </td>";
             }
        else
             {
               echo ' <td><i class="fa fa-eye" style="font-size:24px"></i></td> ';
             }
        ?>        </tr>
      <tr>
        <td>10</td>
        <td>Experience/Relieving certificate from all previous organizations<small style=" color: red">&#42;</small><br><small> Not applicable for freshers</small></td>
        <td><input type="file" name="exp_certificates" value="fileupload" id="fileupload"></td>
                <td><button type="submit" name="submit10" class="btn btn-primary btn-sm" >Save</button></td><td><a href="insert_cand_docs.php?delete10"><button   class="btn btn-danger btn-sm" >Clear</button></a></td> 
             <?php       
            if($result['exp_certificates'])
                         { echo "  <td> <a href='cand_docs/exp_certificates/".$result['exp_certificates']."'><p   style='font-size:30px;color:green;'>  
            &#128065;</p></a> </td>";
                         }
                    else
                         {
                           echo ' <td><i class="fa fa-eye" style="font-size:24px"></i></td> ';
                         }
        ?>        </tr>
      <tr>
        <td>11</td>
        <td>Others</td>
        <td><input type="file" name="others" value="fileupload" id="fileupload"></td>
               <td><button type="submit" name="submit11" class="btn btn-primary btn-sm" >Save</button></td><td><a href="insert_cand_docs.php?delete11"><button   class="btn btn-danger btn-sm" >Clear</button></a></td>        
<?php       
            if($result['others'])
                         { echo "  <td> <a href='cand_docs/others/".$result['others']."'><p   style='font-size:30px;color:green;'>  
            &#128065;</p></a> </td>";
                         }
                    else
                         {
                           echo ' <td><i class="fa fa-eye" style="font-size:24px"></i></td> ';
                         }
        ?>      </tr>

    </tbody>
  </table>
                                           
            
                                        
                                        <div class="card-footer">
                                        <a href="insert_cand_docs.php?send_mail"><button  class="btn btn-success btn-sm" >
                                            <i class="fa fa-dot-circle-o"></i> Send 
                                        </button></a>
                                        
                                    </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
    </div>

    <!---- MAIN CONTENT---------->
            

           
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    