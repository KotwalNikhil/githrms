<?php
   include('config.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($db,"select username from loginform where username = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['username'];

   $ses_sql = mysqli_query($db,"select id from loginform where username = '$user_check' ");
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

   $id = $row['id'];

   $ses_sql = mysqli_query($db,"select special_id from loginform where username = '$user_check' ");
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   $special_id=$row['special_id'];
   if(!isset($_SESSION['c_id']))$_SESSION['c_id']=0;
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
      die();
   }
?>