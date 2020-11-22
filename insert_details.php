<?php

include('session.php');

$c_id=$_SESSION['c_id'];



$first_name = $_POST['firstname'];
$last_name = $_POST['lastname'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$adhar = isset( $_POST['aadharcard']) ?$_POST['aadharcard'] :"NA" ;
$pan = $_POST['pancard'];
$technology = $_POST['tech-domain'];

$query =" SELECT * FROM Candidate_info WHERE fk ='$id' AND c_id=".$_SESSION['c_id'];
       $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
   	 $rnum = $ssql->num_rows;

//for skipping the form
     $skip_query =" SELECT * FROM skip_module WHERE r_id ='$id' AND form_number=2 AND c_id=".$_SESSION['c_id'] ;
      $ssql = mysqli_query($db,$skip_query) or die( mysqli_error($db));
            $skip_result = mysqli_fetch_array($ssql,MYSQLI_ASSOC);
     $skip_rnum = $ssql->num_rows;

   	 
if (isset($_GET['move'])) 
 {
 	 

	if ( $rnum==1 or $skip_result['skip_status']==1 ) 
			{
	
				header("Location:contact_form.php");
  			}
    else
		  {
		  	$msg="Complete the form first";
			$type="fail";
			header("Location: cand_info_form.php?msg=" .$msg. "&type=".$type);
		  }

 }
 else if(isset($_GET['delete_skip']))
 {
  $delete="DELETE from skip_module where r_id='$id' AND c_id='$c_id' AND  form_number=2 ";
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
        $update = "UPDATE skip_module SET skip_comment='$comment', skip_status=0 WHERE r_id = '$id' AND form_number=2 AND c_id='$c_id'";
        $run = mysqli_query($db,$update);
     }
     else 
     {
        $insert="INSERT into skip_module (r_id,c_id,form_number,skip_comment,skip_status) values ('$id','$c_id',2,'$comment',0) ";
        $run = mysqli_query($db,$insert);
     }
      if($run)
          {
            $msg= " Your request has been successfully processed.";
             $type="success";
          }
       else
           {
             $msg=" Error  398465.Check again";
              $type="fail";
           }

      header("Location: cand_info_form.php?msg=" .$msg. "&type=".$type);
  }

 else if ($rnum==1)
 {

 	$SELECT = "SELECT adhar From candidate_info Where adhar = ? and fk!='$id'";  
    $SELECT_PAN = "SELECT pan From candidate_info Where pan = ? and fk!='$id'";  

///////////////duplicacy of adhar///////////
	 $stmt = $db->prepare($SELECT);
     $stmt->bind_param("s", $adhar);
     $stmt->execute();
     $stmt->bind_result($adhar);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
    ///////////////duplicacy of pancard///////////
    $stmt = $db->prepare($SELECT_PAN);
     $stmt->bind_param("s", $pan);
     $stmt->execute();
     $stmt->bind_result($pan);
     $stmt->store_result();
     $rnum_pan = $stmt->num_rows;

if($rnum!=0 and  $adhar!=""){
        
        $msg=" Someone already register using this adharcard ";
         $type="fail";
     }
     else if($rnum_pan!=0 and  $pan!=""){
       
        $msg=" Someone already register using this Pan card ";
         $type="fail";
     }
else 
{
 	$update = "UPDATE candidate_info SET first_name='$first_name', last_name='$last_name', dob='$dob' ,gender='$gender', adhar='$adhar', pan= '$pan', technology='$technology' WHERE fk = '$id' AND c_id=".$_SESSION['c_id'];

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
}


      header("Location: cand_info_form.php?msg=" .$msg. "&type=".$type);

}

 else
 {


		if (!empty($first_name) || !empty($last_name) || !empty($dob) || !empty($gender)  || !empty($technology) ) 
		{




			$SELECT = "SELECT adhar From candidate_info Where adhar = ? Limit 1";
    $SELECT_PAN = "SELECT pan From candidate_info Where pan = ? Limit 1";

///////////////duplicacy of adhar///////////
	 $stmt = $db->prepare($SELECT);
     $stmt->bind_param("s", $adhar);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
    ///////////////duplicacy of pancard///////////
    $stmt = $db->prepare($SELECT_PAN);
     $stmt->bind_param("s", $pan);
     $stmt->execute();
     $stmt->bind_result($pan);
     $stmt->store_result();
     $rnum_pan = $stmt->num_rows;

if($rnum!=0 and  $adhar!=""){
        
        $msg=" Someone already register using this adharcard ";
         $type="fail";
     }
     else if($rnum_pan!=0 and  $pan!=""){
       
        $msg=" Someone already register using this Pan card ";
         $type="fail";
     }
else 
{

		$INSERT = "INSERT Into candidate_info (fk,c_id, first_name,  last_name, dob, gender,  adhar, pan, technology) values(?,?, ?, ?,?, ?, ?,?,?)";

	 $stmt = $db->prepare($INSERT);
      $stmt->bind_param("iisssssss",$id,$_SESSION['c_id'],$first_name, $last_name, $dob, $gender,  $adhar, $pan, $technology);
      $stmt->execute();
    		$msg= " Your record has been successfully updated.";
	      	 $type="success";
     	 header("Location: cand_info_form.php?msg=" .$msg. "&type=".$type);
        $stmt->close();

		}
		
 }
		else
		{
			$msg= " Fill the complete form please.";
	      	 $type="fail";
		}

		     	 header("Location: cand_info_form.php?msg=" .$msg. "&type=".$type);


}

?> 