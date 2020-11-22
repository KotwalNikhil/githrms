<?php

include('session.php');

$c_id=$_SESSION['c_id'];

$percen = $_POST['percen'];

$m_basic_pay = $_POST['m_basic_pay'];
$a_basic_pay = $_POST['a_basic_pay'];

$m_house_rent = $_POST['m_house_rent'];
$a_house_rent= $_POST['a_house_rent'];

$m_med_allowance = $_POST['m_med_allowance'];
$a_med_allowance = $_POST['a_med_allowance']; 

$m_conveyance_allowance = $_POST['m_conveyance_allowance'];
$a_conveyance_allowance = $_POST['a_conveyance_allowance'];

$m_lta_basic = $_POST['m_lta_basic'];
$a_lta_basic = $_POST['a_lta_basic'];

$m_misc_allowance = $_POST['m_misc_allowance'];
$a_misc_allowance = $_POST['a_misc_allowance']; 

$m_total_a = $_POST['m_total_a'];
$a_total_a = $_POST['a_total_a'];

$m_performance = $_POST['m_performance'];
$a_performance = $_POST['a_performance'];

$m_night_shift = $_POST['m_night_shift'];
$a_night_shift = $_POST['a_night_shift']; 

$m_total_b = $_POST['m_total_b'];
$a_total_b = $_POST['a_total_b'];

$m_total_ab = $_POST['m_total_ab'];
$a_total_ab = $_POST['a_total_ab'];

$m_esic = $_POST['m_esic'];
$a_esic = $_POST['a_esic']; 

$m_pf_contri = $_POST['m_pf_contri'];
$a_pf_contri = $_POST['a_pf_contri'];

$m_gratuity_c = $_POST['m_gratuity_c'];
$a_gratuity_c = $_POST['a_gratuity_c']; 

$m_medi_claim_c = $_POST['m_medi_claim_c'];
$a_medi_claim_c = $_POST['a_medi_claim_c'];

$m_total_c = $_POST['m_total_c'];
$a_total_ct = $_POST['a_total_c'];

$m_total_abc = $_POST['m_total_abc'];
$a_total_abc = $_POST['a_total_abc']; 

$m_pro_tax = $_POST['m_pro_tax'];
$a_pro_tax = $_POST['a_pro_tax']; 

$m_pf_contri_employer = $_POST['m_pf_contri_employer'];
$a_pf_contri_employer = $_POST['a_pf_contri_employer'];

$m_pf_contri_employee = $_POST['m_pf_contri_employee'];
$a_pf_contri_employee = $_POST['a_pf_contri_employee'];

$m_esic_contri_employer = $_POST['m_esic_contri_employer'];
$a_esic_contri_employer = $_POST['a_esic_contri_employer']; 

$m_esic_contri_employee = $_POST['m_esic_contri_employee'];
$a_esic_contri_employee = $_POST['a_esic_contri_employee'];

$m_gratuity_e = $_POST['m_gratuity_e'];
$a_gratuity_e = $_POST['a_gratuity_e'];

$m_medi_claim_e = $_POST['m_medi_claim_e'];
$a_medi_claim_e = $_POST['a_medi_claim_e'];

$m_total_e = $_POST['m_total_e'];
$a_total_e = $_POST['a_total_e'];

$m_net_take_home = $_POST['m_net_take_home'];
$a_net_take_home = $_POST['a_net_take_home'];

$query =" SELECT * FROM ctc_table WHERE c_id='$c_id'";
      $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
            $result2 = mysqli_fetch_array($ssql,MYSQLI_ASSOC);
   	 $rnum = $ssql->num_rows;

   	  //for checkking a valid candidate
   	 $skip_query =" SELECT * FROM loginform WHERE special_id ='$c_id' AND authority=1" ;
      $ssql = mysqli_query($db,$skip_query) or die( mysqli_error($db));
            $skip_result = mysqli_fetch_array($ssql,MYSQLI_ASSOC);
   	 $skip_rnum = $ssql->num_rows;

   	  if($skip_rnum==0)
		   {
		   	  $msg=" Error  Select a valid candidate";
		      $type="fail";
		      header("Location: ctc_structure.php?msg=" .$msg. "&type=".$type);
		      exit();
		   }

	if($rnum==1)
	{
		$update = "UPDATE ctc_table SET 

		percen='$percen',

		m_basic_pay= '$m_basic_pay',
		a_basic_pay='$a_basic_pay',

		m_house_rent='$m_house_rent',
		 a_house_rent='$a_house_rent' ,

		 m_med_allowance='$m_med_allowance',
		  a_med_allowance='$a_med_allowance',

		  m_conveyance_allowance='$m_conveyance_allowance',
		  a_conveyance_allowance='$a_conveyance_allowance',

		  m_lta_basic='$m_lta_basic',
		  a_lta_basic='$a_lta_basic',

		 m_misc_allowance='$m_misc_allowance',
		  a_misc_allowance='$a_misc_allowance',

		m_total_a='$m_total_a',
		 a_total_a='$a_total_a' ,

		 m_performance='$m_performance',
		  a_performance='$a_performance',

		  m_night_shift='$m_night_shift',
		  a_night_shift='$a_night_shift',

		  m_total_b='$m_total_b',
		  a_total_b='$a_total_b',

		  m_total_ab='$m_total_ab',
		 a_total_ab='$a_total_ab' ,

		 m_esic='$m_esic',
		  a_esic='$a_esic',

		  m_pf_contri='$m_pf_contri',
		  a_pf_contri='$a_pf_contri',

		  m_gratuity_c='$m_gratuity_c',
		  a_gratuity_c='$a_gratuity_c',

		  m_medi_claim_c='$m_medi_claim_c',
		  a_medi_claim_c='$a_medi_claim_c',

		  m_total_c='$m_total_c',
		  a_total_c='$a_total_c',

		  m_total_abc='$m_total_abc',
		  a_total_abc='$a_total_abc',

		 m_pro_tax='$m_pro_tax',
		 a_pro_tax='$a_pro_tax',

		 m_pf_contri_employer='$m_pf_contri_employer',
		 a_pf_contri_employer='$a_pf_contri_employer',

		  m_pf_contri_employee='$m_pf_contri_employee',
		  a_pf_contri_employee='$a_pf_contri_employee',

		   m_esic_contri_employer='$m_esic_contri_employer',
		  a_esic_contri_employer='$a_esic_contri_employer',

		  m_esic_contri_employee='$m_esic_contri_employee',
		  a_esic_contri_employee='$a_esic_contri_employee',

		  m_gratuity_e='$m_gratuity_e',
		  a_gratuity_e='$a_gratuity_e',

		  m_medi_claim_e='$m_medi_claim_e',
		  a_medi_claim_e='$a_medi_claim_e',

		  m_total_e='$m_total_e',
		  a_total_e='$a_total_e',

		 m_net_take_home='$m_net_take_home',
		 a_net_take_home='$a_net_take_home'
		   WHERE c_id='$c_id'";

			$run = mysqli_query($db,$update)  or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($db), E_USER_ERROR);
		      if($run)
			      {
		 			$msg= " Your record has been successfully edited and updated ";
			      	 $type= "success";
			   	  }
			   else
				   {
				   	 $msg=" Error in updating .Check again";
				      $type="fail";
				   }

		      header("Location: ctc_structure.php?msg=" .$msg. "&type=".$type);
		      exit();
	}
	else
	{
		$run="INSERT Into ctc_table (c_id,
		percen,
		m_basic_pay,
		a_basic_pay,
		m_house_rent,
		a_house_rent,
		m_med_allowance,
		a_med_allowance,
		m_conveyance_allowance,
		a_conveyance_allowance,
		m_lta_basic,
		a_lta_basic,
		m_misc_allowance,
		a_misc_allowance,
		m_total_a,
		a_total_a,
		m_performance,
		a_performance,
		m_night_shift,
		a_night_shift,
		m_total_b,
		a_total_b,
		m_total_ab,
		a_total_ab,
		m_esic,
		a_esic,
		m_pf_contri,
		a_pf_contri,
		m_gratuity_c,
		a_gratuity_c,
		m_medi_claim_c,
		a_medi_claim_c,
		m_total_c,
		a_total_c,
		m_total_abc,
		a_total_abc,
		m_pro_tax,
		a_pro_tax,
		m_pf_contri_employer,
		a_pf_contri_employer,
		m_pf_contri_employee,
		a_pf_contri_employee,
		m_esic_contri_employer,
		a_esic_contri_employer,
		m_esic_contri_employee,
		a_esic_contri_employee,
		m_gratuity_e,
		a_gratuity_e,
		m_medi_claim_e,
		a_medi_claim_e,
		m_total_e,
		a_total_e,
		m_net_take_home,
		a_net_take_home) values('$c_id','$percen',$m_basic_pay',
		'$a_basic_pay',
		'$m_house_rent',
		'$a_house_rent',
		'$m_med_allowance',
		'$a_med_allowance',
		'$m_conveyance_allowance','$a_conveyance_allowance',
		'$m_lta_basic','$a_lta_basic',
		'$m_misc_allowance','$a_misc_allowance',
		'$m_total_a','$a_total_a',
		'$m_performance','$a_performance',
		'$m_night_shift','$a_night_shift',
		'$m_total_b','$a_total_b',
		'$m_total_ab','$a_total_ab',
		'$m_esic','$a_esic',
		'$m_pf_contri','$a_pf_contri',
		'$m_gratuity_c','$a_gratuity_c',
		'$m_medi_claim_c','$a_medi_claim_c',
		'$m_total_c','$a_total_c',
		'$m_total_abc','$a_total_abc',
		'$m_pro_tax','$a_pro_tax',
		'$m_pf_contri_employer','$a_pf_contri_employer',
		'$m_pf_contri_employee','$a_pf_contri_employee',
		'$m_esic_contri_employer','$a_esic_contri_employer',
		'$m_esic_contri_employee','$a_esic_contri_employee',
		'$m_gratuity_e','$a_gratuity_e',
		'$m_medi_claim_e','$a_medi_claim_e',
		'$m_total_e','$a_total_e',
		'$m_net_take_home','$a_net_take_home' )";
						 	
					$result=mysqli_query($db,$run);

					if($result)
					{
						$msg=" inserted";
				      $type="success";
				  }
				  else 
				  {

				   	 $msg=" Error in inserting .Check again";
				      $type="fail";

				  }
		      header("Location: ctc_structure.php?msg=" .$msg. "&type=".$type);
	}

      