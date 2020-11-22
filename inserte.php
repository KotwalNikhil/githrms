<?php

include('session.php');

$query =" SELECT * FROM candidate_documents WHERE fk ='$id' ";
      $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
       $result = mysqli_fetch_array($ssql,MYSQLI_ASSOC);
		$rnum = $ssql->num_rows;



if($result['lock_form']==1)
{
	$msg="Sorry form has been locked ,Wait for recuriter reviews. ";
							$type="fail";
		

		header("Location: candidate_form.php?msg=" .$msg. "&type=".$type);
			exit();
}



$query =" SELECT * FROM e1 WHERE fk ='$id' AND c_id='$special_id'";
      $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
   	 $rnume1 = $ssql->num_rows;
   	   $result1 = mysqli_fetch_array($ssql,MYSQLI_ASSOC);


$query =" SELECT * FROM e2 WHERE fk ='$id' AND c_id='$special_id'";
      $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
   	 $rnume2 = $ssql->num_rows;

   	 $query =" SELECT * FROM e3 WHERE fk ='$id' AND c_id='$special_id'";
      $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
   	 $rnume3 = $ssql->num_rows;

 $query =" SELECT * FROM e4 WHERE fk ='$id' AND c_id='$special_id'";
      $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
   	 $rnume4 = $ssql->num_rows;

   	 
   	 $query =" SELECT * FROM e5 WHERE fk ='$id' AND c_id='$special_id'";
      $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
   	 $rnume5 = $ssql->num_rows;

 $query =" SELECT * FROM e6 WHERE fk ='$id' AND c_id='$special_id'";
      $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
   	 $rnume6 = $ssql->num_rows;

   	  $query =" SELECT * FROM e7 WHERE fk ='$id' AND c_id='$special_id'";
      $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
   	 $rnume7 = $ssql->num_rows;

   	 $query =" SELECT * FROM e8 WHERE fk ='$id' AND c_id='$special_id'";
      $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
   	 $rnume8 = $ssql->num_rows;

   	  $query =" SELECT * FROM e9 WHERE fk ='$id' AND c_id='$special_id'";
      $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
   	 $rnume9 = $ssql->num_rows;

 $query =" SELECT * FROM e10 WHERE fk ='$id' AND c_id='$special_id'";
      $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
   	 $rnume10 = $ssql->num_rows;
   	  $result10 = mysqli_fetch_array($ssql,MYSQLI_ASSOC);



  if(isset($_POST['submite1']))
 {
 	
 	$pos1 = $_POST['pos1'];
$pos2 = $_POST['pos2'];
$photo = $_POST['photo'];
$before_applied = $_POST['before_applied'];
$date_on_applied = date("Y-m-d", strtotime($_POST['date_on_applied']));
$before_employed = $_POST['before_employed'];
$date_on_employed = date("Y-m-d", strtotime($_POST['date_on_employed']));
$how_referred = $_POST['how_referred'];
$full_name = $_POST['full_name'];
$gender = $_POST['gender'];
$dob = date("Y-m-d", strtotime($_POST['dob']));
$age = $_POST['age'];
$nationality = $_POST['nationality'];
$marital_status = $_POST['marital_status'];
$bg = $_POST['bg'];
$aadhar = $_POST['aadhar'];
$pancard = $_POST['pancard'];
$passport = $_POST['passport'];

 	if ($rnume1==1)
	 	
	 {
		unlink('cand_docs/profile_pic/'.$result1['photo']);

				$pname = rand(1000,10000)."-".$_FILES["photo"]["name"];
		    $tname = $_FILES["photo"]["tmp_name"];
		    $file_size = $file ['size'];

		     $uploads_dir = 'cand_docs/profile_pic/';

		    move_uploaded_file($tname, $uploads_dir.$pname);

	 	$update = "UPDATE e1 SET pos1='$pos1',
	 	pos2='$pos2',photo='$pname',before_applied='$before_applied',date_on_applied='$date_on_applied',before_employed='$before_employed',date_on_employed='$date_on_employed',how_referred='$how_referred',full_name='$full_name',gender='$gender',dob='$dob',age='$age',nationality='$nationality',marital_status='$marital_status',bg='$bg',aadhar='$aadhar',pancard='$pancard',passport='$passport' WHERE fk = '$id' AND  c_id='$special_id'";
		$run = mysqli_query($db,$update);
	 }
	 else 
	 {
$pname = rand(1000,10000)."-".$_FILES["photo"]["name"];
		    $tname = $_FILES["photo"]["tmp_name"];
		    $file_size = $file ['size'];

		     $uploads_dir = 'cand_docs/profile_pic/';

		    move_uploaded_file($tname, $uploads_dir.$pname);


	 	$insert="INSERT into e1 (fk,c_id,pos1,pos2,photo,before_applied,date_on_applied,before_employed,date_on_employed,how_referred,full_name,gender,dob,age,nationality,marital_status,bg,aadhar,pancard,passport) values ('$id','$special_id','$pos1','$pos2','$pname','$before_applied','$date_on_applied','$before_employed','$date_on_employed','$how_referred','$full_name','$gender','$dob','$age','$nationality','$marital_status','$bg','$aadhar','$pancard','$passport') ";
	 	$run = mysqli_query($db,$insert);
	 }
	  if($run)
	      {
 			$msg= "  successfully saved";
	      	 $type="success";
	   	  }
	   else
		   {
		   	 $msg=" Error .Check again";
		      $type="fail";
		   }

      header("Location: cand_employment_form.php?msg=" .$msg. "&type=".$type);
  }

 else if(isset($_POST['submite2']))
 {
 	
 $c_landmark = $_POST['c_landmark'];
$c_city = $_POST['c_city'];
$c_pincode = $_POST['c_pincode'];
$c_state = $_POST['c_state'];
$c_mobile = $_POST['c_mobile'];
$c_landline = $_POST['c_landline'];
$c_email = $_POST['c_email'];
$same_address = $_POST['same_address'];

$p_landmark = $_POST['p_landmark'];
$p_city = $_POST['p_city'];
$p_pincode = $_POST['p_pincode'];
$p_state = $_POST['p_state'];
$p_mobile = $_POST['p_mobile'];
$p_landline = $_POST['p_landline'];
$p_email = $_POST['p_email'];

$emergency_person_name = $_POST['emergency_person_name'];
$emergency_relation = $_POST['emergency_relation'];
$emergency_num = $_POST['emergency_num'];
$emergency_address = $_POST['emergency_address'];


 	if ($rnume2==1)
	 {
	 $update = "UPDATE e2 SET c_landmark='$c_landmark',c_city='$c_city',c_pincode='$c_pincode',c_state='$c_state',c_mobile='$c_mobile',c_landline='$c_landline',c_email='$c_email',same_address='$same_address',p_landmark='$p_landmark',p_city='$p_city',p_pincode='$p_pincode',p_state='$p_state',p_mobile='$p_mobile',p_landline='$p_landline',p_email='$p_email',emergency_person_name='$emergency_person_name',emergency_relation='$emergency_relation',emergency_num='$emergency_num',emergency_address='$emergency_address' WHERE fk = '$id' AND  c_id='$special_id'";
		$run = mysqli_query($db,$update);
	 }
	 else 
	 {
	 	$insert="INSERT into e2 (fk,c_id,c_landmark,c_city,c_pincode,c_state,c_mobile,c_landline,c_email,same_address,p_landmark,p_city,p_pincode,p_state,p_mobile,p_landline,p_email,emergency_person_name,emergency_relation,emergency_num,emergency_address) values ('$id','$special_id','$c_landmark','$c_city','$c_pincode','$c_state','$c_mobile','$c_landline','$c_email','$same_address','$p_landmark','$p_city','$p_pincode','$p_state','$p_mobile','$p_landline','$p_email','$emergency_person_name','$emergency_relation','$emergency_num','$emergency_address') ";
	 	$run = mysqli_query($db,$insert);
	 }
	  if($run)
	      {
 			$msg= "  successfully saved";
	      	 $type="success";
	   	  }
	   else
		   {
		   	 $msg=" Error .Check again";
		      $type="fail";
		   }

      header("Location: cand_employment_form.php?msg=" .$msg. "&type=".$type);
  }
  else if(isset($_POST['submite3']))
 {
 	
 $name1 = $_POST['name1'];
$age1 = $_POST['age1'];
$dob1 = $_POST['dob1'];
$relationship1 = $_POST['relationship1'];
$occupation1 = $_POST['occupation1'];

$name2 = $_POST['name2'];
$age2= $_POST['age2'];
$dob2 = $_POST['dob2'];
$relationship2 = $_POST['relationship2'];
$occupation2 = $_POST['occupation2'];

$name3 = $_POST['name3'];
$age3 = $_POST['age3'];
$dob3 = $_POST['dob3'];
$relationship3 = $_POST['relationship3'];
$occupation3 = $_POST['occupation3'];

$name4 = $_POST['name4'];
$age4 = $_POST['age4'];
$dob4 = $_POST['dob4'];
$relationship4 = $_POST['relationship4'];
$occupation4 = $_POST['occupation4'];

$name5 = $_POST['name5'];
$age5 = $_POST['age5'];
$dob5 = $_POST['dob5'];
$relationship5 = $_POST['relationship5'];
$occupation5 = $_POST['occupation5'];


 	if ($rnume3==1)
	 {
	 	$update = "UPDATE e3 SET name1='$name1',age1='$age1',dob1='$dob1',relationship1='$relationship1',occupation1='$occupation1', name2='$name2',age2='$age2',dob2='$dob2',relationship2='$relationship2',occupation2='$occupation2', name3='$name3',age3='$age3',dob3='$dob3',relationship3='$relationship3',occupation3='$occupation3', name4='$name4',age4='$age4',dob4='$dob4',relationship4='$relationship4',occupation4='$occupation4', name5='$name5',age5='$age5',dob5='$dob5',relationship5='$relationship5',occupation5='$occupation5' WHERE fk = '$id' AND  c_id='$special_id'";
		$run = mysqli_query($db,$update);
	 }
	 else 
	 {
	 	$insert="INSERT into e3 (fk,c_id,name1,age1,dob1,relationship1,occupation1,name2,age2,dob2,relationship2,occupation2,name3,age3,dob3,relationship3,occupation3,name4,age4,dob4,relationship4,occupation4,name5,age5,dob5,relationship5,occupation5) values ('$id','$special_id','$name1','$age1','$dob1','$relationship1','$occupation1','$name2','$age2','$dob2','$relationship2','$occupation2','$name3','$age3','$dob3','$relationship3','$occupation3','$name4','$age4','$dob4','$relationship4','$occupation4','$name5','$age5','$dob5','$relationship5','$occupation5') ";
	 	$run = mysqli_query($db,$insert);
	 }
	  if($run)
	      {
 			$msg= "  successfully saved";
	      	 $type="success";
	   	  }
	   else
		   {
		   	 $msg=" Error .Check again";
		      $type="fail";
		   }

      header("Location: cand_employment_form.php?msg=" .$msg. "&type=".$type);
  }
  else if(isset($_POST['submite4']))
 {
 	
 $lang1 = $_POST['lang1'];
$read1 = $_POST['read1'];
$write1 = $_POST['write1'];
$speak1 = $_POST['speak1'];

$lang4 = $_POST['lang4'];
$read4 = $_POST['read4'];
$write4 = $_POST['write4'];
$speak4 = $_POST['speak4'];

$lang3 = $_POST['lang3'];
$read3 = $_POST['read3'];
$write3 = $_POST['write3'];
$speak3 = $_POST['speak3'];

$lang2 = $_POST['lang2'];
$read2 = $_POST['read2'];
$write2 = $_POST['write2'];
$speak2 = $_POST['speak2'];


 	if ($rnume4==1)
	 {
	 	$update = "UPDATE e4 SET lang1='$lang1',read1='$read1',write1='$write1',speak1='$speak1',lang2='$lang2',read2='$read2',write2='$write2',speak2='$speak2',lang3='$lang3',read3='$read3',write3='$write3',speak3='$speak3',lang4='$lang4',read4='$read4',write4='$write4',speak4='$speak4' WHERE fk = '$id' AND  c_id='$special_id'";
		$run = mysqli_query($db,$update);
	 }
	 else 
	 {
	 	$insert="INSERT into e4 (fk,c_id,lang1,read1,write1,speak1,lang2,read2,write2,speak2,lang3,read3,write3,speak3,lang4,read4,write4,speak4) values ('$id','$special_id','$lang1','$read1','$write1','$speak1','$lang2','$read2','$write2','$speak2','$lang3','$read3','$write3','$speak3','$lang4','$read4','$write4','$speak4') ";
	 	$run = mysqli_query($db,$insert);
	 }
	  if($run)
	      {
 			$msg= "  successfully saved";
	      	 $type="success";
	   	  }
	   else
		   {
		   	 $msg=" Error .Check again";
		      $type="fail";
		   }

      header("Location: cand_employment_form.php?msg=" .$msg. "&type=".$type);
  }
  else if(isset($_POST['submite5']))
 {
 	
 $institute_name1 = $_POST['institute_name1'];
$city1 = $_POST['city1'];
$from1 = $_POST['from1'];
$to1 = $_POST['to1'];
$course1 = $_POST['course1'];
$grade1 = $_POST['grade1'];

$institute_name2 = $_POST['institute_name2'];
$city2 = $_POST['city2'];
$from2 = $_POST['from2'];
$to2 = $_POST['to2'];
$course2 = $_POST['course2'];
$grade2 = $_POST['grade2'];

$institute_name3 = $_POST['institute_name3'];
$city3= $_POST['city3'];
$from3 = $_POST['from3'];
$to3 = $_POST['to3'];
$course3 = $_POST['course3'];
$grade3 = $_POST['grade3'];

$institute_name4 = $_POST['institute_name4'];
$city4 = $_POST['city4'];
$from4 = $_POST['from4'];
$to4 = $_POST['to4'];
$course4 = $_POST['course4'];
$grade4 = $_POST['grade4'];

$institute_name5 = $_POST['institute_name5'];
$city5 = $_POST['city5'];
$from5 = $_POST['from5'];
$to5 = $_POST['to5'];
$course5 = $_POST['course5'];
$grade5 = $_POST['grade5'];

$institute_name6 = $_POST['institute_name6'];
$city6 = $_POST['city6'];
$from6 = $_POST['from6'];
$to6 = $_POST['to6'];
$course6 = $_POST['course6'];
$grade6 = $_POST['grade6'];


 	if ($rnume5==1)
	 {
	 	$update = "UPDATE e5 SET institute_name1='$institute_name1',city1='$city1',from1='$from1',to1='$to1',course1='$course1',grade1='$grade1',institute_name2='$institute_name2',city2='$city2',from2='$from2',to2='$to2',course2='$course2',grade2='$grade2',institute_name3='$institute_name3',city3='$city3',from3='$from3',to3='$to3',course3='$course3',grade3='$grade3',institute_name4='$institute_name4',city4='$city4',from4='$from4',to4='$to4',course4='$course4',grade4='$grade4',institute_name5='$institute_name5',city5='$city5',from5='$from5',to5='$to5',course5='$course5',grade5='$grade5',institute_name6='$institute_name6',city6='$city6',from6='$from6',to6='$to6',course6='$course6',grade6='$grade6' WHERE fk = '$id' AND  c_id='$special_id'";
		$run = mysqli_query($db,$update);
	 }
	 else 
	 {
	 	$insert="INSERT into e5 (fk,c_id,institute_name1,city1,from1,to1,course1,grade1,institute_name2,city2,from2,to2,course2,grade2,institute_name3,city3,from3,to3,course3,grade3,institute_name4,city4,from4,to4,course4,grade4,institute_name5,city5,from5,to5,course5,grade5,institute_name6,city6,from6,to6,course6,grade6) values ('$id','$special_id','$institute_name1','$city1','$from1','$to1','$course1','$grade1','$institute_name2','$city2','$from2','$to2','$course2','$grade2','$institute_name3','$city3','$from3','$to3','$course3','$grade3','$institute_name4','$city4','$from4','$to4','$course4','$grade4','$institute_name5','$city5','$from5','$to5','$course5','$grade5','$institute_name6','$city6','$from6','$to6','$course6','$grade6') ";
	 	$run = mysqli_query($db,$insert);
	 }
	  if($run)
	      {
 			$msg= "  successfully saved";
	      	 $type="success";
	   	  }
	   else
		   {
		   	 $msg=" Error .Check again";
		      $type="fail";
		   }

      header("Location: cand_employment_form.php?msg=" .$msg. "&type=".$type);
  }
  else if(isset($_POST['submite6']))
 {
 	
$describe_yourself = $_POST['describe_yourself'];
$strength = $_POST['strength'];
$Professional_achievement = $_POST['Professional_achievement'];



 	if ($rnume6==1)
	 {
	 	$update = "UPDATE e6 SET describe_yourself='$describe_yourself',strength='$strength',Professional_achievement='$Professional_achievement' WHERE fk = '$id' AND  c_id='$special_id'";
		$run = mysqli_query($db,$update);
	 }
	 else 
	 {
	 	$insert="INSERT into e6 (fk,c_id,describe_yourself,strength,Professional_achievement) values ('$id','$special_id','$describe_yourself','$strength','$Professional_achievement') ";
	 	$run = mysqli_query($db,$insert);
	 }
	  if($run)
	      {
 			$msg= "  successfully saved";
	      	 $type="success";
	   	  }
	   else
		   {
		   	 $msg=" Error .Check again";
		      $type="fail";
		   }

      header("Location: cand_employment_form.php?msg=" .$msg. "&type=".$type);
  }
   else if(isset($_POST['submite7']))
 {
 	
 $it_exp = $_POST['it_exp'];
$non_it_exp = $_POST['non_it_exp'];
$political = $_POST['political'];
$physical_disability = $_POST['physical_disability'];

$work_in_week = $_POST['work_in_week'];
$deadline_time_in_week = $_POST['deadline_time_in_week'];
$new_stuff = $_POST['new_stuff'];
$you_prefer = $_POST['you_prefer'];

$stock_option = $_POST['stock_option'];
$imp_for_organization = $_POST['imp_for_organization'];
$you_share_info = $_POST['you_share_info'];
$yourself = $_POST['yourself'];

$handle_risk = $_POST['handle_risk'];
$will_travel = $_POST['will_travel'];
$money = $_POST['money'];
$recognition = $_POST['recognition'];
$team = $_POST['team'];
$pressure = $_POST['pressure'];


 	if ($rnume7==1)
	 {
	 	$update = "UPDATE e7 SET it_exp='$it_exp',non_it_exp='$non_it_exp',political='$political',physical_disability='$physical_disability',work_in_week='$work_in_week',deadline_time_in_week='$deadline_time_in_week',new_stuff='$new_stuff',you_prefer='$you_prefer',stock_option='$stock_option',imp_for_organization='$imp_for_organization',you_share_info='$you_share_info',yourself='$yourself',handle_risk='$handle_risk',will_travel='$will_travel',money='$money',recognition='$recognition',team='$team',pressure='$pressure' WHERE fk = '$id' AND  c_id='$special_id'";
		$run = mysqli_query($db,$update);
	 }
	 else 
	 {
	 	$insert="INSERT into e7 (fk,c_id,it_exp,non_it_exp,political,physical_disability,work_in_week,deadline_time_in_week,new_stuff,you_prefer,stock_option,imp_for_organization,you_share_info,yourself,handle_risk,will_travel,money,recognition,team,pressure) values ('$id','$special_id','$it_exp','$non_it_exp','$political','$physical_disability','$work_in_week','$deadline_time_in_week','$new_stuff','$you_prefer','$stock_option','$imp_for_organization','$you_share_info','$yourself','$handle_risk','$will_travel','$money','$recognition','$team','$pressure') ";
	 	$run = mysqli_query($db,$insert);
	 }
	  if($run)
	      {
 			$msg= "  successfully saved";
	      	 $type="success";
	   	  }
	   else
		   {
		   	 $msg=" Error .Check again";
		      $type="fail";
		   }

      header("Location: cand_employment_form.php?msg=" .$msg. "&type=".$type);
  }
  else if(isset($_POST['submite8']))
 {
 	
 $subject1 = $_POST['subject1'];
$skill_grade1 = $_POST['skill_grade1'];

 $subject2 = $_POST['subject2'];
$skill_grade2 = $_POST['skill_grade2'];

 $subject3 = $_POST['subject3'];
$skill_grade3 = $_POST['skill_grade3'];

 $subject4 = $_POST['subject4'];
$skill_grade4 = $_POST['skill_grade4'];

 $subject5 = $_POST['subject5'];
$skill_grade5 = $_POST['skill_grade5'];

 $subject6 = $_POST['subject6'];
$skill_grade6 = $_POST['skill_grade6'];


$other_special_skill = $_POST['other_special_skill'];



 	if ($rnume8==1)
	 {

	 	$update = "UPDATE e8 SET subject1='$subject1',skill_grade1='$skill_grade1',subject2='$subject2',skill_grade2='$skill_grade2',subject3='$subject3',skill_grade3='$skill_grade3',subject4='$subject4',skill_grade4='$skill_grade4',subject5='$subject5',skill_grade5='$skill_grade5',subject6='$subject6',skill_grade6='$skill_grade6',other_special_skill='$other_special_skill' WHERE fk = '$id' AND  c_id='$special_id'";
		$run = mysqli_query($db,$update);
	 }
	 else 
	 {


       
	 	$itemArr=$_POST['name'];
        
        if($itemArr!='' )
        {
	 	$delete = "DELETE FROM e8 WHERE fk ='$id'";
        $run = mysqli_query($db,$delete);
        }
	foreach($itemArr as $list){
		if($list!=''){
                

	 	$insert="INSERT into e8 (fk,c_id,subject1,skill_grade1,subject2,skill_grade2,subject3,skill_grade3,subject4,skill_grade4,subject5,skill_grade5,subject6,skill_grade6,other_special_skill, name) values ('$id','$special_id','$subject1','$skill_grade1','$subject2','$skill_grade2','$subject3','$skill_grade3','$subject4','$skill_grade4','$subject5','$skill_grade5','$subject6','$skill_grade6','$other_special_skill','$list') ";
	 	$run = mysqli_query($db,$insert);
          }
}
	 	
	 }
	  if($run)
	      {
 			$msg= "  successfully saved";
	      	 $type="success";
	   	  }
	   else
		   {
		   	 $msg=" Error .Check again";
		      $type="fail";
		   }

      header("Location: cand_employment_form.php?msg=" .$msg. "&type=".$type);
  }

  else if(isset($_POST['submite9']))
 {
 	
 $employer_name = $_POST['employer_name'];

$from_date = date("Y-m-d", strtotime($_POST['from_date']));

$to_date = date("Y-m-d", strtotime($_POST['to_date']));

$company_address = $_POST['company_address'];

$supervisor_name = $_POST['supervisor_name'];

$supervisor_phone = $_POST['supervisor_phone'];
$supervisor_email = $_POST['supervisor_email'];
$hr_name = $_POST['hr_name'];
$hr_mobile = $_POST['hr_mobile'];
$hr_email = $_POST['hr_email'];
$last_ctc = $_POST['last_ctc'];
$reason_for_leaving = $_POST['reason_for_leaving'];



 	if ($rnume9==1)
	 {
	 	for($i=0;$i<count($employer_name);$i++){
	 	if($employer_name[$i] != "" || $from_date[$i] != "" || $to_date[$i] != "" || $company_address[$i] != "" || $supervisor_name[$i] != "" || $supervisor_phone[$i] != "" || $supervisor_email[$i] != "" || $hr_name[$i] != "" || $hr_mobile[$i] != "" || $hr_email[$i] != "" || $last_ctc[$i] != "" || $reason_for_leaving[$i] != "" )
        {
	 	$delete = "DELETE FROM e9 WHERE fk ='$id'";
        $run = mysqli_query($db,$delete);
        }
        }
        for($i=0;$i<count($employer_name);$i++)
 {
  if($employer_name[$i] != "" || $from_date[$i] != "" || $to_date[$i] != "" || $company_address[$i] != "" || $supervisor_name[$i] != "" || $supervisor_phone[$i] != "" || $supervisor_email[$i] != "" || $hr_name[$i] != "" || $hr_mobile[$i] != "" || $hr_email[$i] != "" || $last_ctc[$i] != "" || $reason_for_leaving[$i] != "" )
  {
   $insert="INSERT into e9 (fk,c_id,employer_name,
	 	from_date,to_date,company_address,supervisor_name,supervisor_phone,supervisor_email,hr_name,hr_mobile,hr_email,last_ctc,reason_for_leaving) values ('$id','$special_id','$employer_name[$i]','$from_date[$i]','$to_date[$i]','$company_address[$i]','$supervisor_name[$i]','$supervisor_phone[$i]','$supervisor_email[$i]','$hr_name[$i]','$hr_mobile[$i]','$hr_email[$i]','$last_ctc[$i]','$reason_for_leaving[$i]') ";
	 	$run = mysqli_query($db,$insert); 
  }
}
	 }
	 else 
	 {
	 	for($i=0;$i<count($employer_name);$i++){
	 	if($employer_name[$i] != "" || $from_date[$i] != "" || $to_date[$i] != "" || $company_address[$i] != "" || $supervisor_name[$i] != "" || $supervisor_phone[$i] != "" || $supervisor_email[$i] != "" || $hr_name[$i] != "" || $hr_mobile[$i] != "" || $hr_email[$i] != "" || $last_ctc[$i] != "" || $reason_for_leaving[$i] != "" )
        {
	 	$delete = "DELETE FROM e9 WHERE fk ='$id'";
        $run = mysqli_query($db,$delete);
        }
        }
        for($i=0;$i<count($employer_name);$i++)
 {
if($employer_name[$i] != "" || $from_date[$i] != "" || $to_date[$i] != "" || $company_address[$i] != "" || $supervisor_name[$i] != "" || $supervisor_phone[$i] != "" || $supervisor_email[$i] != "" || $hr_name[$i] != "" || $hr_mobile[$i] != "" || $hr_email[$i] != "" || $last_ctc[$i] != "" || $reason_for_leaving[$i] != "" )  {
   $insert="INSERT into e9 (fk,c_id,employer_name,
	 	from_date,to_date,company_address,supervisor_name,supervisor_phone,supervisor_email,hr_name,hr_mobile,hr_email,last_ctc,reason_for_leaving) values ('$id','$special_id','$employer_name[$i]','$from_date[$i]','$to_date[$i]','$company_address[$i]','$supervisor_name[$i]','$supervisor_phone[$i]','$supervisor_email[$i]','$hr_name[$i]','$hr_mobile[$i]','$hr_email[$i]','$last_ctc[$i]','$reason_for_leaving[$i]') ";
	 	$run = mysqli_query($db,$insert); 
  }
 }

	 	
   }       

	  if($run)
	      {
 			$msg= "  successfully saved";
	      	 $type="success";
	   	  }
	   else
		   {
		   	 $msg=" Error .Check again";
		      $type="fail";
		   }

      header("Location: cand_employment_form.php?msg=" .$msg. "&type=".$type);
  }
 else if(isset($_POST['submite10']))
 {
 	if ($rnume1==1 and $rnume2==1 and $rnume3==1 and $rnume4==1 and $rnume5==1 and $rnume6==1 and $rnume7==1 and $rnume8==1 and $rnume9==1  )
	 {
 	
 $ref_name1 = $_POST['ref_name1'];
$ref_relation1 = $_POST['ref_relation1'];

 $ref_occupation1 = $_POST['ref_occupation1'];
$ref_address1= $_POST['ref_address1'];

 $ref_mobile1 = $_POST['ref_mobile1'];
$ref_email1 = $_POST['ref_email1'];

 $ref_name2 = $_POST['ref_name2'];
$ref_relation2 = $_POST['ref_relation2'];

 $ref_occupation2 = $_POST['ref_occupation2'];
$ref_address2= $_POST['ref_address2'];

 $ref_mobile2 = $_POST['ref_mobile2'];
$ref_email2 = $_POST['ref_email2'];

$signature = $_POST['signature'];
$sig_date = $_POST['sig_date'];



 	if ($rnume10==1)
	 {
unlink('cand_docs/signature/'.$result10['signature']);

				$pname = rand(1000,10000)."-".$_FILES["signature"]["name"];
		    $tname = $_FILES["signature"]["tmp_name"];
		    $file_size = $file ['size'];

		     $uploads_dir = 'cand_docs/signature/';

		    move_uploaded_file($tname, $uploads_dir.$pname);


	 	$update = "UPDATE e10 SET ref_name1='$ref_name1',ref_relation1='$ref_relation1',ref_occupation1='$ref_occupation1',ref_address1='$ref_address1',ref_mobile1='$ref_mobile1',ref_email1='$ref_email1',ref_name2='$ref_name2',ref_relation2='$ref_relation2',ref_occupation2='$ref_occupation2',ref_address2='$ref_address2',ref_mobile2='$ref_mobile2',ref_email2='$ref_email2',signature='$pname',sig_date='$sig_date' WHERE fk = '$id' AND  c_id='$special_id'";
		$run = mysqli_query($db,$update);
	 }
	 else 
	 {
	$pname = rand(1000,10000)."-".$_FILES["signature"]["name"];
		    $tname = $_FILES["signature"]["tmp_name"];
		    $file_size = $file ['size'];

		     $uploads_dir = 'cand_docs/signature/';

		    move_uploaded_file($tname, $uploads_dir.$pname);
	 	
	 	$insert="INSERT into e10 (fk,c_id,ref_name1,ref_relation1,ref_occupation1,ref_address1,ref_mobile1,ref_email1,ref_name2,ref_relation2,ref_occupation2,ref_address2,ref_mobile2,ref_email2,signature,sig_date) values ('$id','$special_id','$ref_name1','$ref_relation1','$ref_occupation1','$ref_address1','$ref_mobile1','$ref_email1','$ref_name2','$ref_relation2','$ref_occupation2','$ref_address2','$ref_mobile2','$ref_email2','$pname','$sig_date') ";
	 	$run = mysqli_query($db,$insert);
	 }
	  if($run)
	      {
 			$msg= "  successfully saved";
	      	 $type="success";
	   	  }
	   else
		   {
		   	 $msg=" Error .Check again";
		      $type="fail";
		   }

      header("Location: cand_employment_form.php?msg=" .$msg. "&type=".$type);
  }
else
{
	 $msg=" Complete the full form first";
		      $type="fail";
		   

      header("Location: cand_employment_form.php?msg=" .$msg. "&type=".$type);
}

}

?>