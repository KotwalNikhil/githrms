<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      $hashp=hash('sha512',$mypassword);
      
      $sql = "SELECT * FROM loginform WHERE username = '$myusername' and password = '$hashp'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);
      
      $type = $row['authority'];

     // $exist = "SELECT * FROM loginform WHERE username = '$myusername' and password = '$mypassword'";
     // $check = mysqli_num_rows($db,$exist);

      // If result matched $myusername and $mypassword, table row must be 1 row
      
      if($count == 1) {
      	 
      	 $_SESSION['type'] = $row['authority'];
         $_SESSION['login_user'] = $myusername;
         

        
         if($type==2)
         {
         	
         header("location: sourcing_form.php");

         }
         else if($type == 3)
         {
         	
         header("location: welcomehr.php");
          
         }
         else if($type==1)
         {

         	
         header("location: cand_dashboard.php");
          
         }
      }else {
         $msg = "Your Login Name or Password is invalid";
         $type= "fail";
         header("location: login.php?msg=".$msg."&type=".$type);
      }
   }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>orange hrm</title>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>

<style type="text/css">
.panel
{
  overflow: hidden;

}
.body
{
  overflow: hidden;
}

.fa {
  padding: 5px;
  font-size: 15px;
  width: 25px;
  text-align: center;
  text-decoration: none;
  margin: 1px 1px;
  border-radius: 30%;
}
.fa-linkedin {
  background: #007bb5;
  color: white;
}

.fa-youtube {
  background: #bb0000;
  color: white;
}
.fa-facebook {
  background: #3B5998;
  color: white;
}

.fa-twitter {
  background: #55ACEE;
  color: white;
}


 .stack
 {
position: relative;
overflow: hidden;
 }
 
  .stack img
  {
    
    position: absolute;
   /* border-radius: 80%;
    border: 15px solid #CC9900 ;*/
    z-index: 1;
    left: -100px;
    bottom:0px;
  }


  
  @media screen and ( min-width: 300px ) {
img.side-image { width: 240px;height: 240px; left: -50px;}
.stack{width: 500px;}

}
@media screen and  ( min-width: 568px ){
img.side-image { width: 280px;height: 280px;left: -70px;}
.stack {width: 1000px;}
}
@media screen and  ( min-width: 992px ) {
img.side-image { width: 280px;height: 280px;left: -80px;}
.stack{width: 1000px;}

}
@media screen  and ( min-width: 1280px ) {
img.side-image { width: 280px;height: 280px;left: -100px;}
.stack{width: 1000px;}
}


</style>

<body>

<br>

<div class="container text-center above"  >
          <img  style="margin-top:20px ! important;height: 100px;" src="images/icon/vidushi_logo1.png">
          
        </div>  
        <br>
        
 

    <div class="container-fluid stack" > 
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
        <div id="loginbox" style="margin-top:110px ! important;margin-bottom:30px;background-color: #F8F6F3;" class="mainbox col-md-6 col-md-offset-4 col-sm-8 col-sm-offset-2">          

                
          <img  class="side-image" src="images/icon/logo-vidushi.png">
        
            <div class="panel  " >
                    <div class="panel-heading " style="background-color: #049AD1 ;">
                        <div class="panel-title text-center " style="color: black;">LOGIN pannel</div>
                    </div>     

                    <div style="padding-top:20px ! important;"  class="pannel-body row" >

                            
                        <form  class="form-horizontal row"  method="post">
                                    
                            <div style="margin-bottom: 20px ! important"  class="input-group  col-xs-6 col-xs-offset-5 col-xl-6 col-xl-offset-5">
                                        
                                        <input id="login-username" type="text"  class="form-control" name="username" value="" placeholder="username or email" >    
                                        <span class="input-group-addon "><i class="glyphicon glyphicon-user" ></i></span>                                    
                                    </div>
                                
                            <div style="margin-bottom: 20px ! important" class="input-group  col-xs-6 col-xs-offset-5 col-xl-6 col-xl-offset-5">
                                        <input id="login-password" type="password" class="form-control" name="password" placeholder="password" >
                                       <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>

                                    </div>
                                  

                                    <!-- Button -->
                                    <div class="col-md-6 col-md-offset-5 col-xs-6 col-xs-offset-5"  >
                                      <button id="btn-login" type="submit" class="btn btn-warning "  > Login  </button>
                                      <a href="#"><p>forgot your password?</p></a>
                                    </div>
                                    


                                 
                            </form>     



                        </div>                     
                    </div>  
        </div>
        
    </div>


    

<br>



   


<br><br>
    <footer class="footer" style="margin-top: 50px;">
        <div class="row align-items-center justify-content-xl-between">
    <div class="container text-center">
    VidushiInfotec 4.3.5<br>
© 2005 - 2020 <a href="https://www.vidushiinfotech.com/" target="_blank">VidushiInfotec, Inc</a>. All rights reserved.
    </div>
    <div class="container text-center">
          <a href="#"><i class="fa fa-linkedin"></i></a>
          <a href="#"><i class="fa fa-facebook"></i></a>
          <a href="#"><i class="fa fa-twitter"></i></a>
          <a href="#"><i class="fa fa-youtube"></i></a>

  </div>
</div>
</footer>

</body>
</html>