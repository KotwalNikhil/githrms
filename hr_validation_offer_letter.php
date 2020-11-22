<?php 
include 'base_hr.php' ;

$c_id=$_SESSION['c_id'];

$query =" SELECT * FROM ctc_table WHERE c_id='$c_id'";
      $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
            $result = mysqli_fetch_array($ssql,MYSQLI_ASSOC);


$query =" SELECT * FROM review_offer_letter WHERE c_id ='$c_id' ";
      $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
       $result_review = mysqli_fetch_array($ssql,MYSQLI_ASSOC);
		$rnum_review = $ssql->num_rows;

$query =" SELECT * FROM hr_offer_letter_validation  ";
      $ssql_hr_validation = mysqli_query($db,$query) or die( mysqli_error($db));
      


  $query =" SELECT * FROM offer_letter_fresh WHERE c_id ='$c_id'  ";
      $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
       $result_offer = mysqli_fetch_array($ssql,MYSQLI_ASSOC);

       $query =" SELECT * FROM candidate_table WHERE  id='$c_id' ";
       $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
      $result2 = mysqli_fetch_array($ssql,MYSQLI_ASSOC);

      $query =" SELECT * FROM employment_table WHERE  c_id='$c_id' ";
       $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
      $result_fresher = mysqli_fetch_array($ssql,MYSQLI_ASSOC);

?>


<style type="text/css">
    
input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    margin: 0; 
}
    
  
</style>


            
<div class="main-content m-t-70">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
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


                           if($c_id==0)
                            {
                                echo '<div class="alert alert-danger alert-dismissible" id="myalert">';
                                  echo '<span class="close " data-dismiss="alert">&times;</span>';
                                 echo  'Please choose a candidate from below table';
                                echo '</div>';
                            }
                          
                        ?>


<div class="row">
              <div class=" col-12 ">
                                <h3 class="title-1 m-b-25">validation requests from recuriters </h3>
                                
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="table table-borderless table-striped table-earning emp_table">
                                        <thead>
                                            <tr>
                                                <th>Sr.No</th>
                                                <th>Name of recuriter</th>
                                                <th>Candidate ID</th>
                                                <th>Candidate name</th>
                                                <th>select</th>
                                                                                            
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $i=1;
                                                while($row = mysqli_fetch_array($ssql_hr_validation)) {
                                                  //if($row['review']!="" or $row['response']==1)continue;
                                                ?>
                                                <tr <?php if($c_id==$row['c_id'])echo 'style="background-color:lightgreen;" '; ?> >
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php
                                                    $r_id=$row['r_id'];
                          $query = " SELECT * from loginform where id='$r_id'";
                          $run = mysqli_query($db,$query);
                            $rec_name=mysqli_fetch_array($run,MYSQLI_ASSOC);
                                                     echo $rec_name['username'];
                                                      ?></td>

                                                      <td><?php echo $row['c_id']; ?></td>
                                                      <td><?php
                                                    $c_id=$row['c_id'];
                          $query = " SELECT * from loginform where special_id='$c_id'";
                          $run = mysqli_query($db,$query);
                            $rec_name=mysqli_fetch_array($run,MYSQLI_ASSOC);
                                                     echo $rec_name['username'];
                                                      ?></td>
                                                      
                                                      
<td><a href="<?php  echo 'insert_hr_validation_offer_letter.php?select=true&c_id='.$row['c_id'] ; ?>"><button   class="btn btn-primary btn-sm" >Choose</button></a></td>

                                                   
                                                </tr>
                                                <?php
                                                $i++;
                                                }
                                            ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
            </div>


            <!-- MAIN CONTENT-->
<div class="row">
                          <div class="col-lg-12">
                            <div class="card " id="Candidate-info"  >
                                    <div class="card-header">
                                      
                        <span class="red fullWidth" style="color: green; font-size: 12px;"> * HRA is 40% for Cities other than Delhi, Mumbai, Calcutta, Chennai<br>
* Loyalty bonus will be credited in the salary after 14th Month<br>
* Gratuity paid as per Payment of Gratuity Act<br>
* TDS deduction as per Income Tax rules.<br>
* KPO Incentives are variables and payable for per working day in a month, while working on KPO Project.<br>
*Medi-Claim and GPA eligibility is as per Company Policy.<br>
Note: Salary is confidential. Kindly maintain the confidentiality.<br> </span> 
                                    </div>
                                    <div class="card-body card-block" style="overflow: scroll;">
                                       

                          <table class="table table-bordered " >

<thead>
    <tr>
       <th>Heads</th>
        <th>Monthly</th>
        <th>Annual</th>
    </tr>
</thead>
<tbody>
    <tr>
        <th id="par" class="text-center"  scope="colgroup">
            Fixed Component[A]
        </th>
    </tr>
    <tr>
        <td >Basic Pay</td>
        <td > <input type="number" title="Enter the percentage ,enter 12 only if it is 12%" class="percen"  id="percen" name="percen" style="width:50px;" min="0" value="<?php echo $result['percen'] ?>" />
         <input type="number"  class="m_qty1"  id="m_basicpay" style="width:150px;" name="m_basic_pay" min="0" onclick='fun3("percen","m_basicpay")' value="<?php echo $result['m_basic_pay'] ?>"></td>
        <td ><input type="number" class="a_qty1" id="a_basicpay"  name="a_basic_pay" min="0" onclick='a_count("m_basicpay","a_basicpay");' value="<?php echo $result['a_basic_pay'] ?>"></td>    
    </tr>
    <tr>
        <td >House Rent Allowance</td>
        <td ><input type="number" class="m_qty1" id="m_houserent" name="m_house_rent" min="0" onclick='fun4("m_basicpay","m_houserent",0.4)' value="<?php echo $result['m_house_rent'] ?>"></td>
        <td ><input type="number"  class="a_qty1"id="a_houserent" name="a_house_rent" min="0" onclick='a_count("m_houserent","a_houserent");' value="<?php echo $result['a_house_rent'] ?>"></td>
    </tr>
    <tr>
        <td >Medical Allowance</td>
        <td ><input type="number" class="m_qty1" id="m_medallowance" name="m_med_allowance" min="0" value="<?php echo $result['m_med_allowance'] ?>"></td>
        <td ><input type="number" class="a_qty1" id="a_medallowance" name="a_med_allowance" min="0" onclick='a_count("m_medallowance","a_medallowance");' value="<?php echo $result['a_med_allowance'] ?>"></td>
    </tr>
      <tr>
        
        <td >Conveyance Allowance</td>
        <td ><input type="number" class="m_qty1" id="m_conveyanceallowance" name="m_conveyance_allowance" min="0" value="<?php echo $result['m_conveyance_allowance'] ?>"></td>
        <td ><input type="number" class="a_qty1" id="a_conveyanceallowance" name="a_conveyance_allowance" min="0" onclick='a_count("m_conveyanceallowance","a_conveyanceallowance");' value="<?php echo $result['a_conveyance_allowance'] ?>"></td>
    </tr>
     <tr>
      <td >LTA 8.33% of Basic </td>
        <td ><input type="number" class="m_qty1" id="m_ltabasic" name="m_lta_basic" min="0" onclick='fun4("m_basicpay","m_ltabasic",0.0833)' value="<?php echo $result['m_lta_basic'] ?>"></td>
        <td ><input type="number" class="a_qty1" id="a_ltabasic" name="a_lta_basic" min="0" onclick='a_count("m_ltabasic","a_ltabasic");' value="<?php echo $result['a_lta_basic'] ?>"></td>
    </tr>
     <tr>
        <td >Miscellaneous Allowance (Bal.Fig)  </td>
        <td ><input type="number" class="m_qty1" id="m_miscallowance" name="m_misc_allowance" min="0" onclick='fun5("m_miscallowance")' value="<?php echo $result['m_misc_allowance'] ?>"></td>
        <td ><input type="number" class="a_qty1" id="a_miscallowance" name="a_misc_allowance" min="0"  onclick='a_count("m_miscallowance","a_miscallowance");'value="<?php echo $result['a_misc_allowance'] ?>"></td>
    </tr>
    <tr>
        <th >
      Total of A
          </th>
        <td ><input type="number" class="m_total1" id="m_total_a" name="m_total_a" min="0" value="<?php echo $result['m_total_a'] ?>"></td>
        <td ><input type="number" class="a_total1" id="a_total_a" name="a_total_a" min="0" onclick='total_count("a_qty1","a_total_a");' value="<?php echo $result['a_total_a'] ?>"></td>

 
    </tr>
    <tr>
        <th id="par" class="text-center"  scope="colgroup">
            Variable Component [B]
        </th>
    </tr>
    <tr>
        <td >Performance Variables*</td>
        <td ><input type="number" class="m_qty2" id="m_performance" name="m_performance" min="0" value="<?php echo $result['m_performance'] ?>"></td>
        <td ><input type="number" class="a_qty2" id="a_performance" name="a_performance" min="0" onclick='a_count("m_performance","a_performance");' value="<?php echo $result['a_performance'] ?>"></td>    
    </tr>
    <tr>
        <td >Night Shift Allowance</td>
        <td ><input type="number" class="m_qty2" id="m_night_shift" name="m_night_shift" min="0" value="<?php echo $result['m_night_shift'] ?>"></td>
        <td ><input type="number" class="a_qty2" id="a_night_shift" name="a_night_shift" min="0" onclick='a_count("m_night_shift","a_night_shift");' value="<?php echo $result['a_night_shift'] ?>"></td>
    </tr>
    <tr>
        <th >
      Total of B
          </th>
        <td ><input type="number" class="m_total2" id="m_total_b" name="m_total_b" min="0" value="<?php echo $result['m_total_b'] ?>"></td>
        <td ><input type="number" class="a_total2" id="a_total_b" name="a_total_b" min="0" onclick='total_count("a_qty2","a_total_b");' value="<?php echo $result['a_total_b'] ?>"></td>

 
    </tr>
     <tr>
        <th >
      Gross Earnings [A+B]
          </th>
        <td ><input type="number" class="m_total3" id="m_total_ab" name="m_total_ab" min="0" onclick='add_few("m_total_ab","m_total_a","m_total_b");' value="<?php echo $result['m_total_ab'] ?>"></td>
        <td ><input type="number" class="a_total3" id="a_total_ab" name="a_total_ab" min="0" onclick='add_few("a_total_ab","a_total_b","a_total_a");'  value="<?php echo $result['a_total_ab'] ?>"></td>

 
    </tr>
    <tr>
        <th id="par" class="text-center"  scope="colgroup">
            Company Contribution [C]
        </th>
    </tr>
    <tr>
        <td >ESIC Contribution by Employer</td>
        <td ><input type="number" class="m_qty3" id="m_esic" onclick='fun2("m_esic","m_total_ab",0.0325);' name="m_esic" min="0"   value="<?php echo $result['m_esic'] ?>"></td>
        <td ><input type="number" class="a_qty3" id="a_esic" name="a_esic" min="0" onclick='a_count("m_esic","a_esic");' value="<?php echo $result['a_esic'] ?>"></td>    
    </tr>
    <tr>
        <td >PF Contribution by Employer</td>
        <td ><input type="number" class="m_qty3" id="m_pf_contri" onclick='fun2_2("m_pf_contri","m_basicpay",0.12);' name="m_pf_contri" min="0" value="<?php echo $result['m_pf_contri'] ?>"></td>
        <td ><input type="number" class="a_qty3" id="a_pf_contri" name="a_pf_contri" min="0" onclick='a_count("m_pf_contri","a_pf_contri");' value="<?php echo $result['a_pf_contri'] ?>"></td>
    </tr>
    <tr>
        <td >Gratuity*</td>
        <td ><input type="number" class="m_qty3" id="m_gratuity_c" name="m_gratuity_c" onclick='calculate_gratituity("m_basicpay","m_gratuity_c")' min="0" value="<?php echo $result['m_gratuity_c'] ?>"></td>
        <td ><input type="number"  class="a_qty3"id="a_gratuity_c" name="a_gratuity_c" min="0" onclick='a_count("m_gratuity_c","a_gratuity_c");' value="<?php echo $result['a_gratuity_c'] ?>"></td>
    </tr>
      <tr>
        
        <td >Medi Claim</td>
       <td> <select  id="m_medi_claim_c" class="m_qty3" name="m_medi_claim_c" >
                    <option  hidden value="0">Please select </option>
                    <option <?php if($result['m_medi_claim_c']=="160")echo'selected="true"'; ?> value="160">160</option>
                            <option <?php if($result['m_medi_claim_c']=="200")echo'selected="true"'; ?> value="200">200</option>
                            <option <?php if($result['m_medi_claim_c']=="250")echo'selected="true"'; ?> value="250">250</option>
                        </select>
                    </td>
        <td ><input type="number" class="a_qty3" id="a_medi_claim_c" name="a_medi_claim_c" min="0" onclick='a_count("m_medi_claim_c","a_medi_claim_c");' value="<?php echo $result['a_medi_claim_c'] ?>"></td>
    </tr>

     
    <tr>
        <th >
      Total of C
          </th>
        <td ><input type="number" class="m_total4" id="m_total_c" name="m_total_c" min="0" value="<?php echo $result['m_total_c'] ?>"></td>
        <td ><input type="number"  class="a_total4" id="a_total_c" name="a_total_c" min="0" onclick='total_count("a_qty3","a_total_c");' value="<?php echo $result['a_total_c'] ?>"></td>

 
    </tr>
     <tr>
        <th >
      Total CTC [A+B+C] = D
          </th>
        <td ><input type="number" id="m_total_abc" name="m_total_abc" min="0" onclick='add_few("m_total_abc","m_total_ab","m_total_c");' value="<?php echo $result['m_total_abc'] ?>"></td>
        <td ><input type="number" id="a_total_abc" name="a_total_abc" min="0" onclick='add_few("a_total_abc","a_total_ab","a_total_c");' value="<?php echo $result['a_total_abc'] ?>"></td>

 
    </tr>
    <tr>
        <th id="par" class="text-center"  scope="colgroup">
            Deduction [E]
        </th>
    </tr>
    <tr>
        <td >Professions Tax</td>
        <td ><input type="number" class="m_qty4" id="m_pro_tex" name="m_pro_tax" onclick='calculate_profession_tax("m_total_ab","m_pro_tex")' min="0" value="<?php echo $result['m_pro_tax'] ?>"></td>
        <td ><input type="number" class="a_qty4" id="a_pro_tex" name="a_pro_tax" min="0"  value="<?php echo $result['a_pro_tax'] ?>"></td>    
    </tr>
    <tr>
        <td >PF Contribution by Employer</td>
        <td ><input type="number" class="m_qty4" id="m_pf_contri_employer" onclick='copy("m_pf_contri","m_pf_contri_employer");' name="m_pf_contri_employer" min="0" value="<?php echo $result['m_pf_contri_employer'] ?>"></td>
        <td ><input type="number" class="a_qty4" id="a_pf_contri_employer" name="a_pf_contri_employer" min="0" onclick='a_count("m_pf_contri_employer","a_pf_contri_employer");' value="<?php echo $result['a_pf_contri_employer'] ?>"></td>
    </tr>
    <tr>
        <td >PF Contribution by Employee</td>
        <td ><input type="number" class="m_qty4" id="m_pf_contri_employee" onclick='copy("m_pf_contri_employer","m_pf_contri_employee");' name="m_pf_contri_employee" min="0" value="<?php echo $result['m_pf_contri_employee'] ?>"></td>
        <td ><input type="number" class="a_qty4" id="a_pf_contri_employee" name="a_pf_contri_employee" min="0" onclick='a_count("m_pf_contri_employee","a_pf_contri_employee");' value="<?php echo $result['a_pf_contri_employee'] ?>"></td>
    </tr>
      <tr>
        
        <td >ESIC Contribution by Employer</td>
        <td ><input type="number" class="m_qty4" id="m_esic_contri_employer" name="m_esic_contri_employer" onclick='copy("m_esic","m_esic_contri_employer");' min="0" value="<?php echo $result['m_esic_contri_employer'] ?>"></td>
        <td ><input type="number" class="a_qty4" id="a_esic_contri_employer" name="a_esic_contri_employer" min="0" onclick='a_count("m_esic_contri_employer","a_esic_contri_employer");' value="<?php echo $result['a_esic_contri_employer'] ?>"></td>
    </tr>
     <tr>
      <td >ESI Contribution by Employee</td>
        <td ><input type="number" class="m_qty4" id="m_esi_contri_employee" onclick='fun2("m_esi_contri_employee","m_total_ab",0.0075);' name="m_esic_contri_employee" min="0" value="<?php echo $result['m_esic_contri_employee'] ?>"></td>
        <td ><input type="number" class="a_qty4" id="a_esi_contri_employee" name="a_esic_contri_employee" min="0" onclick='a_count("m_esi_contri_employee","a_esi_contri_employee");' value="<?php echo $result['a_esic_contri_employee'] ?>"></td>
    </tr>
     <tr>
        <td >Gratuity  </td>
        <td ><input type="number" class="m_qty4" id="m_gratuity_e" onclick='copy("m_gratuity_c","m_gratuity_e");' name="m_gratuity_e" min="0" value="<?php echo $result['m_gratuity_e'] ?>"></td>
        <td ><input type="number" class="a_qty4" id="a_gratuity_e" name="a_gratuity_e" min="0" onclick='a_count("m_gratuity_e","a_gratuity_e");' value="<?php echo $result['m_gratuity_e'] ?>"></td>
 </tr>
    <tr>
        <td >Medi Claim  </td>
        <td ><input type="number" class="m_qty4" id="m_medi_claim_e" onclick='copy("m_medi_claim_c","m_medi_claim_e");' name="m_medi_claim_e" min="0" value="<?php echo $result['m_medi_claim_e'] ?>"></td>
        <td ><input type="number" class="a_qty4" id="a_medi_claim_e" name="a_medi_claim_e" min="0" onclick='a_count("m_medi_claim_e","a_medi_claim_e");' value="<?php echo $result['a_medi_claim_e'] ?>"></td>
    </tr>
    <tr>
        <th >
      Total of E
          </th>
        <td ><input type="number"  class="m_total5" id="m_total_e" name="m_total_e" min="0" value="<?php echo $result['m_total_e'] ?>"></td>
        <td ><input type="number"  class="a_total5" id="a_total_e" name="a_total_e" min="0" onclick='total_count("a_qty4","a_total_e");' value="<?php echo $result['a_total_e'] ?>"></td>

 
    </tr>
    <tr>
        <th >
      Net Take Home before TDS** [D-E]
          </th>
        <td ><input type="number" id="m_net_take_home" name="m_net_take_home" min="0" onclick='fun1("m_net_take_home","m_total_abc","m_total_e");' value="<?php echo $result['m_net_take_home'] ?>"></td>
        <td ><input type="number" id="a_net_take_home" name="a_net_take_home" min="0" onclick='fun1("a_net_take_home","a_total_abc","a_total_e");' value="<?php echo $result['a_net_take_home'] ?>"></td>

 
    </tr>
</tbody>

</table>


                                   
                        </div>
                    </div>
                </div>
            </div>
        
  <div class="card "  >

<div class="col-lg-12">
                                    
                                      <div class="row">
           <div class="col-lg-12">
            

            <h4 class ="text-center">Selection Application</h4><br>
            <p>Dear <?php echo $result2["cand_name"]; ?> , <br>

This has reference to your application and subsequent interview you had with us. We are pleased to offer you an employment in Vidushi Infotech SSP Pvt. Ltd. – A CMMI Level 3 Company, as <input name="position" type="text" style="width:150px" value="<?php echo $result_offer["position"] ?>" placeholder="" class="form-control"  >in Grade<input name="grade" type="text" style="width:150px" value="<?php echo $result_offer["grade"] ?>" placeholder="" class="form-control"  >
 at a salary (CTC) of INR <input name="salary_inr" type="text" style="width:150px" value="<?php echo $result_offer["salary_inr"] ?>" placeholder="" class="form-control"  >
 per annum(Rupees  <input name="salary_rs" type="text" id="Campus" value="<?php echo $result_offer["salary_rs"] ?>
 " style="width:150px" placeholder="" class="form-control"  >
 only)<br> as discussed and agreed upon, subject to deduction of tax at source as per the provision of Income Tax Act of Government of India as may be amended from time to time.<br>

A detailed letter of employment containing the terms and conditions of the service and CTC structure would be issued to you on the date of your joining on completion of joining formalities.<br><br>

You are required to carry following original documents for cross verification on date of joining:<br>


<?php if($result_fresher["fresher"]=="yes") {echo "
1. Copies of educational certificates<br>
2. Copy of Current & Permanent Residential proof.<br>
3. Copy of Aadhaar Card, Passport and Pan card<br><br> ";}
else
{
  echo "
1. Copies of educational certificates.<br>
2. Copy of work experience certificates from all previous employer(s).<br>
3. Copy of Relieving letter from your previous employer(s), if applicable.<br>
4. Last 3-month salary slip of current .<br>
5. Copy of Current & Permanent Residential proof.<br>
6. Copy of Aadhaar Card, Passport and Pan card<br><br>
 ";
}

?>

At the time of joining, you are required to submit the following documents to complete joining formalities. Kindly carry original documents for cross verification:<br>

<?php if($result_fresher["fresher"]=="yes") {echo "
1.  4 Passport size color photos. <br>
2.  2 References of college professors.<br><br> ";}
else
{
  echo "

1.  Copy of work experience certificates from current employer.
2.  4 Passport size color photos. 
3.  Form No. 16 issued by current employer under Income Tax Rules
4.  References of all previous companies, including current. (HR and Reporting Manager)

 ";
}

?>

Joining Details:<br>
Please report for joining on or before <input name="joining_date" type="date" style="width:200px" value="<?php echo $result_offer["joining_date"] ?>" placeholder="" class="form-control"  >
, failing to which this offer will automatically get forfeited.<br>
• Office Address: Cerebrum IT Park, B-3 Building, 2nd Floor, Office 3-A, Kalyani Nagar, Pune 411014 <br>
• Reporting Time on Date of Joining:<input name="joining_time" type="time" id="" style="width:200px" value="<?php echo $result_offer["joining_time"] ?>" placeholder="" class="form-control"  >
sharp for Induction.<br>
HR POC for any assistance before joining Period and for completing Joining formalities: (Recruiter details)<br></h5>

</p><br>




   

                                           
   <div class="col-6">
                                        <div class="form-group">
                                            <label for="campus" class=" form-control-label">HR Name  </label>
                                            <input name="hr_name" type="text" id="Campus" value="<?php echo $result_offer["hr_name"] ?>" placeholder="" class="form-control"  >
                                        </div>
                                        <div class="form-group">
                                            <label for="campus" class=" form-control-label">Email  </label>
                                            <input name="email" type="text" id="Campus" value="<?php echo $result_offer["email"] ?>" placeholder="" class="form-control"  >
                                        </div>
                                        <div class="form-group">
                                            <label for="campus" class=" form-control-label">Contact Number  </label>
                                            <input name="contact" type="text" id="Campus" value="<?php echo $result_offer["contact"] ?>" placeholder="" class="form-control"  >
                                        </div>
                                        

   
  </div>

<p>
This offer of employment is conditional on: -<br>
• Sharing your acceptance to the offer on or before<input name="reply_deadline" type="date" id="" style="width:200px" value="<?php echo $result_offer["reply_deadline"] ?>" placeholder="" class="form-control"  >by <input name="reply_by" type="text" id="" style="width:200px" value="<?php echo $result_offer["reply_by"] ?>" placeholder="" class="form-control"  >, failing to which this offer would stand revoke.<br>
<?php if($result_fresher["fresher"]=="no") { ?>
• Sharing resignation e-mail with current employer on or before <input name="resign_email_deadline" type="date" id="" style="width:200px" value="<?php echo $result_offer["resign_email_deadline"] ?>" placeholder="" class="form-control"  > by <strong>11:00am</strong>, failing to which this offer would stand revoke.<br>

<?php } ?>
• Submission of all documents listed above in stipulated time.<br>
• The report of references which is satisfactory to us.<br>

Please note that this offer is valid subject to your acceptance of the terms and conditions of employment with us and may be withdrawn/modified if any material information furnished by you is found to be incorrect or if any material information is detected by us to have been suppressed by you or any action on your part is found to be in contravention to the terms and conditions of employment or the company code of conduct.<br>

We are looking forward to a long lasting and mutually fruitful association with you.<br><br>

Please Note:  Your acceptance to the employment offer with Vidushi Infotech SSP Pvt. Ltd.  indicates your undertaking to join company on the mentioned date of joining in offer letter and you understand that the position offered to you with Vidushi Infotech SSP Pvt. Ltd. requires you to join company on the above-mentioned date and you completely understand that, failing to join company may damage company’s business which may result into financial and/or goodwill loss and you would be liable to pay any and all damages caused to the company and its business due to failure to join company for any reasons.<br><br>


Yours faithfully,<br><br>
  Sahil Survase | Head - HR Operations <br>
  Email: hr@vidushiinfotech.com   Website: www.vidushiinfotech.com <br>

  Address: Cerebrum IT Park, B-3 Building, 2nd Floor, Office 3-A, Kalyani Nagar, Pune 411014<br>
  Mobile: 9922972445 | Tel: (+91) 20 41315176 (Extn- 603) <br>
        



</p>


    </div>
  </div>       
</div>
                                    </div>
                                  </div>
          <!-- address details ended  --> </div>

          <form action="insert_hr_validation_offer_letter.php" method="post" enctype="multipart/form-data" class="form-horizontal">
          <div class="card-footer">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label  class=" form-control-label">Review for the Recuriter</label>
                              <textarea name="hr_review"  type="text" id="blacklist_reason_input" rows="3"  placeholder="Content..." class="form-control"></textarea>
                                               
                                                </div>
                                            </div>
                                        <button type="submit" name="confirmed_hr" class="btn btn-success btn-sm" >
                                            <i class="fa fa-dot-circle-o"></i> Confirm 
                                        </button>
                                        <button type="submit" name="rejected_hr" class="btn btn-danger btn-sm" >
                                            <i class="fa fa-dot-circle-o"></i> Reject 
                                        </button>
                                        
                                    </div>
                                </form>


            <!----MAIN CONTENT --->

        </div>
    </div>
</div>
