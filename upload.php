<?php

include('session.php');

$c_id=$_SESSION['c_id'];



$query =" SELECT * FROM fileupload WHERE fk ='$id' AND c_id=".$_SESSION['c_id'];
      $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
     $rnum = $ssql->num_rows;

      //for skipping the form
     $skipy =" SELECT * FROM skip_module WHERE r_id ='$id' AND form_number=5 AND c_id=".$_SESSION['c_id'] ;
      $ssql = mysqli_query($db,$skipy) or die( mysqli_error($db));
            $skip_result = mysqli_fetch_array($ssql,MYSQLI_ASSOC);
     $skip_rnum = $ssql->num_rows;

if (isset($_GET['move'])) 
 {
     
    if ( $rnum==1 or $skip_result['skip_status']==1) 
            {
                
            // $msg="You have Successfully completed your form. To edit, submit again the particular form  ";
            // $type="success";
            header("Location: interviewschedule_form.php");            }
    else
          {
            $msg="You have not submitted the resume yet.";
            $type="fail";
            header("Location: resume_form.php?msg=" .$msg. "&type=".$type);
          }

 }
 else if(isset($_GET['delete_skip']))
 {
  $delete="DELETE from skip_module where r_id='$id' AND c_id='$c_id' AND  form_number=5 ";
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
    $update = "UPDATE skip_module SET skip_comment='$comment', skip_status=0 WHERE r_id = '$id' AND form_number=5 AND c_id='$c_id'";
    $run = mysqli_query($db,$update);
   }
   else 
   {
    $insert="INSERT into skip_module (r_id,c_id,form_number,skip_comment,skip_status) values ('$id','$c_id',5,'$comment',0) ";
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

      header("Location: resume_form.php?msg=" .$msg. "&type=".$type);
  }
 else if ($rnum==1)
 {
 	$pname = rand(1000,10000)."-".$_FILES["file"]["name"];
 	$tname = $_FILES["file"]["tmp_name"];
    

     $uploads_dir = 'resume/';

    move_uploaded_file($tname, $uploads_dir.$pname);
 	$upload_date = date("Y-m-d", strtotime($_POST["upload_date"]));
    $update = "UPDATE fileupload SET pdf_file='$pname', upload_date= '$upload_date' WHERE fk = '$id' AND c_id=".$_SESSION['c_id'];

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

      header("Location: resume_form.php?msg=" .$msg. "&type=".$type);

}
else if (isset($_POST["submit"]))
 {
 	$pname = rand(1000,10000)."-".$_FILES["file"]["name"];
    $tname = $_FILES["file"]["tmp_name"];
    

     $uploads_dir = 'resume/';

    move_uploaded_file($tname, $uploads_dir.$pname);
    $c_id=$_SESSION['c_id'];
    $upload_date = date("Y-m-d", strtotime($_POST["upload_date"]));
    $sql = "INSERT into fileupload (fk,c_id,pdf_file,upload_date) VALUES('$id','$c_id','$pname','$upload_date')";


    if(mysqli_query($db,$sql)){

    $msg= " Your record successfully updated.";
             $type="success";
    }
    else{
        $msg= "Error in uploading";
        $type="fail";
    }

          header("Location: resume_form.php?msg=" .$msg. "&type=".$type);

}



?>