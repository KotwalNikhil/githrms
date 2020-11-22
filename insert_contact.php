<?php

include('session.php');

$c_id=$_SESSION['c_id'];


$mobile = $_POST['mobile'];
$alter_mobile = $_POST['alter_mobile'];
$email = $_POST['email'];
$alter_email = $_POST['alter_email'];
$skype = $_POST['skype'];

$query =" SELECT * FROM contact_table WHERE fk ='$id' AND c_id=".$_SESSION['c_id'];
      $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
     $rnum = $ssql->num_rows;

     //for skipping the form
     $skip_query =" SELECT * FROM skip_module WHERE r_id ='$id' AND form_number=3 AND c_id=".$_SESSION['c_id'] ;
      $ssql = mysqli_query($db,$skip_query) or die( mysqli_error($db));
            $skip_result = mysqli_fetch_array($ssql,MYSQLI_ASSOC);
     $skip_rnum = $ssql->num_rows;


if (isset($_GET['move'])) 
 {
     

    if ( $rnum==1 or $skip_result['skip_status']==1  ) 
            {
    
                header("Location:employment_form.php");
            }
    else
          {
            $msg="Complete the form first";
            $type="fail";
            header("Location: contact_form.php?msg=" .$msg. "&type=".$type);
          }

 }
 else if(isset($_GET['delete_skip']))
 {
  $delete="DELETE from skip_module where r_id='$id' AND c_id='$c_id' AND  form_number=3 ";
    $run = mysqli_query($db,$delete);
   
    if($run)
        {
      $msg= " Your request has been deleted successfully .";
           $type="success";
        }
     else
       {
         $msg=" Error  .Check again";
          $type="fail";
       }

      header("Location: sourcing_form.php?msg=" .$msg. "&type=".$type);
 }
 else if(isset($_POST['skip']))
 {
  $comment=$_POST['skip_comment'];

  if ($skip_rnum==1)
   {
    $update = "UPDATE skip_module SET skip_comment='$comment', skip_status=0 WHERE r_id = '$id' AND form_number=3 AND c_id='$c_id'";
    $run = mysqli_query($db,$update);
   }
   else 
   {
    $insert="INSERT into skip_module (r_id,c_id,form_number,skip_comment,skip_status) values ('$id','$c_id',3,'$comment',0) ";
    $run = mysqli_query($db,$insert);
   }
    if($run)
        {
      $msg= " Your request has been successfully processed.";
           $type="success";
        }
     else
       {
         $msg=" Error  .Check again";
          $type="fail";
       }

      header("Location: contact_form.php?msg=" .$msg. "&type=".$type);
  }
 else if ($rnum==1)
 {

   $SELECT = "SELECT email From contact_table Where email = ? and fk!=$id Limit 1";
    $SELECT_MOBILE = "SELECT mobile From contact_table Where mobile = ? and fk!=$id Limit 1";

 $stmt = $db->prepare($SELECT);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
    ///////////////duplicacy of mobile///////////
    $stmt = $db->prepare($SELECT_MOBILE);
     $stmt->bind_param("s", $mobile);
     $stmt->execute();
     $stmt->bind_result($mobile);
     $stmt->store_result();
     $rnum_mobile = $stmt->num_rows;

if ($rnum==0 and $rnum_mobile==0) 
{
  $update = "UPDATE contact_table SET mobile='$mobile' ,alter_mobile='$alter_mobile' ,email='$email' ,alter_email='$alter_email' ,skype='$skype' WHERE fk = '$id' AND c_id=".$_SESSION['c_id'];
  $run = mysqli_query($db,$update);
      if($run)
        {
      $msg= " Your record has been successfully edited and updated.";
           $type="success";
        }
     else
       {
         $msg=" Error in updating .Check again";
          $type="fail";
       }
}else if($rnum!=0){
        
        $msg=" Someone already register using this email ";
         $type="fail";
     }
     else {
       
        $msg=" Someone already register using this Mobile ";
         $type="fail";
     }

      header("Location: contact_form.php?msg=" .$msg. "&type=".$type);

}
 else
 {


    if (!empty($mobile) || !empty($alter_mobile) || !empty($email) || !empty($alter_email) || !empty($skype) ) {


     $SELECT = "SELECT email From contact_table Where email = ? Limit 1";
    $SELECT_MOBILE = "SELECT mobile From contact_table Where mobile = ? Limit 1";

	$INSERT = "INSERT Into contact_table (fk,c_id,mobile,alter_mobile,email,alter_email,skype) values(?,?,?, ?, ?, ?, ?)";

     ///////////////duplicacy of email///////////
	 $stmt = $db->prepare($SELECT);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
    ///////////////duplicacy of mobile///////////
    $stmt = $db->prepare($SELECT_MOBILE);
     $stmt->bind_param("s", $mobile);
     $stmt->execute();
     $stmt->bind_result($mobile);
     $stmt->store_result();
     $rnum_mobile = $stmt->num_rows;

     if ($rnum==0 and $rnum_mobile==0) {
      $stmt->close();
      $stmt = $db->prepare($INSERT);
      $stmt->bind_param("iiiisss", $id,$_SESSION['c_id'],$mobile, $alter_mobile, $email, $alter_email, $skype);
      $stmt->execute();
        
        $msg= " Your record has been successfully updated.";
       $type="success";
        
     } else if($rnum!=0){
        
        $msg=" Someone already register using this email ";
         $type="fail";
     }
     else if($rnum_mobile!=0){
       
        $msg=" Someone already register using this Mobile ";
         $type="fail";
     }
     $stmt->close();

    }
    else {
     
            $msg=" All field are required.";
             $type="fail";
     die();
    }

    
        header("Location: contact_form.php?msg=" .$msg. "&type=".$type);

}


?>