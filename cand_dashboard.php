<?php 
include 'index2_base.php' ;

$query =" SELECT * FROM e1 WHERE fk ='$id' AND c_id='$special_id'";
      $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
     $rnume1 = $ssql->num_rows;
       $result1 = mysqli_fetch_array($ssql,MYSQLI_ASSOC);

       $query =" SELECT * FROM e6 WHERE fk ='$id' AND c_id='$special_id'";
      $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
     $rnume1 = $ssql->num_rows;
       $result6 = mysqli_fetch_array($ssql,MYSQLI_ASSOC);

       $query =" SELECT * FROM e8 WHERE fk ='$id' AND c_id='$special_id'";
      $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
     $rnume1 = $ssql->num_rows;
       $result8 = mysqli_fetch_array($ssql,MYSQLI_ASSOC);

       $query =" SELECT * FROM e10 WHERE fk ='$id' AND c_id='$special_id'";
      $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
     $rnume10 = $ssql->num_rows;

       $query =" SELECT * FROM review_cand_docs WHERE c_id ='$special_id' ";
      $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
       $result_review = mysqli_fetch_array($ssql,MYSQLI_ASSOC);
       $rnum_review = $ssql->num_rows;

?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

<style type="text/css">

#profile-image1 {
    cursor: pointer;
  
     width: 200px;
    height: 200px;
  border:2px solid #03b1ce ;}
  .tital{ font-size:16px; font-weight:500;}
   .bot-border{ border-bottom:1px #f8f8f8 solid;  margin:5px 0  5px 0}  
</style>



            
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
           

            <div class="container ">
  <div class="row">
        
        
       <div class="col-md-12 ">

<div class="panel panel-default">
  <div class="panel-heading">  <h4 >User Profile</h4></div>
   <div class="panel-body">
       
    <div class="box box-info">
        
            <div class="box-body">
                     <div class="col-sm-6">
                     <div  align="center">  <?php 
        if($result1['photo'])
             { echo "<img src='cand_docs/profile_pic/".$result1['photo'] ."' id='profile-image1' />";
             }
        else
             {
               echo ' <img src="images/default_dp.jpg" id="profile-image1" alt="<?php echo $login_session; ?>" /> ';
             }
        ?>
                
              
                     </div>
              <br>
    
              <!-- /input-group -->
            </div>
            <div class="col-sm-6">
            <h3 style="color:#00b1b1;"><?php echo $login_session; ?> </h3></span>
              <span><p>Profile Completed</p></span> 
                <div class="progress">
                  <?php if($rnume10==1 and $result_review['hr_confirmed']==1) echo ' 
  <div class="progress-bar" role="progressbar" aria-valuenow="80"
  aria-valuemin="0" aria-valuemax="100" style="width:100%">
    100%
  </div> ';
  else if(($rnume10==0 and $result_review['hr_confirmed']==1)or($rnume10==1 and $result_review['hr_confirmed']==0)) 
  echo '<div class="progress-bar" role="progressbar" aria-valuenow="80"
  aria-valuemin="0" aria-valuemax="100" style="width:50%">
    50%
  </div> ';
    else  echo '
  <div class="progress-bar" role="progressbar" aria-valuenow="80"
  aria-valuemin="0" aria-valuemax="100" style="width:0%">
    0%
  </div> ';
   ?>

</div>           
            </div>
            <div class="clearfix"></div>
            <hr style="margin:5px 0 5px 0;">
    
              
<div class="col-sm-5 col-xs-6 tital " >Full Name:</div><div class="col-sm-7 col-xs-6 "><?php echo $result1['full_name']; ?></div>
     <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Date Of birth:</div><div class="col-sm-7"><?php echo $result1['dob']; ?></div>
  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Age:</div><div class="col-sm-7"><?php echo $result1['age']; ?></div>
  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Nationality:</div><div class="col-sm-7"><?php echo $result1['nationality']; ?></div>

  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Marital Status:</div><div class="col-sm-7"><?php echo $result1['marital_status']; ?></div>

  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Blood Group:</div><div class="col-sm-7"><?php echo $result1['bg']; ?></div>

 <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >About me:</div><div class="col-sm-7"><?php echo $result6['describe_yourself']; ?></div>

 <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Skills:</div><div class="col-sm-7"><?php echo "  ".$result8['subject1']." , ".$result8['subject2']." , ".$result8['subject3']." , ".$result8['subject4']." "; ?></div>


            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
       
            
    </div> 
    </div>
</div>  
    <script>
              $(function() {
    $('#profile-image1').on('click', function() {
        $('#profile-image-upload').click();
    });
});       
              </script> 
       
       
       
       
       
       
       
       
       
   </div>
</div>



