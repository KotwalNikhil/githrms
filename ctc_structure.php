<?php include 'cand_base.php' ;

$c_id=$_SESSION['c_id'];

$query =" SELECT * FROM ctc_table WHERE c_id='$c_id'";
      $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
            $result = mysqli_fetch_array($ssql,MYSQLI_ASSOC);
     $rnum = $ssql->num_rows;

 ?>

<style type="text/css">
    
input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    margin: 0; 
}
    
   input[type=number]
    {
          border: 1px solid black;

    }
</style>

<script type="text/javascript">

function fun1(id,id1,id2) {
            var num1 = document.getElementById(id1).value;
            var num2 = document.getElementById(id2).value;
            var result = num1-num2;
            
            document.getElementById(id).value=result;
        }

function fun2(id,id1,x) {
    var num1 = document.getElementById(id1).value;
    num1=parseInt(num1);
    var result;
    if(num1<=21000){result=x*num1;}
    else result=0;
    result=parseInt(result);
    
    
    document.getElementById(id).value=result;
}

function fun2_2(id,id1,x) {
    var num1 = document.getElementById(id1).value;
    num1=parseInt(num1);
    var result;
    if(num1*x<1800){result=x*num1;}
    else result=1800;
    result=parseInt(result);
    
    
    document.getElementById(id).value=result;
}

function fun3(id,id1) {
    var num1 = document.getElementById(id).value;
    var num2 = document.getElementById("m_total_a").value;
    // num1=parseInt(num1);
    // num1=parseInt(num2);
    var result=(num1*num2)/100;
    
    result=parseInt(result);
    
    
    document.getElementById(id1).value=result;
}

function fun4(id,id1,x) {
    var num1 = document.getElementById(id).value;
    
    var result=(num1*x);
    
    result=parseInt(result);
    
    
    document.getElementById(id1).value=result;
}

function fun5(id) {
    var num1 = document.getElementById("m_basicpay").value;
    var num2 = document.getElementById("m_houserent").value;
    var num3 = document.getElementById("m_medallowance").value;
    var num4 = document.getElementById("m_conveyanceallowance").value;
    var num5 = document.getElementById("m_ltabasic").value;
    var num6 = document.getElementById("m_total_a").value;

    num1=parseInt(num1);
    num2=parseInt(num2);
    num3=parseInt(num3);
    num4=parseInt(num4);
    num5=parseInt(num5);
    num6=parseInt(num6);


    
    var result=num6-(num1+num2+num3+num4+num5);
    
    //result=parseInt(result);
    
    
    document.getElementById(id).value=result;
}

function a_count(id1,id2) {
            var num1 = document.getElementById(id1).value;
            //var num2 = document.getElementById('num2').value;
            var result = parseInt(num1) *12;
            if (!isNaN(result)) {
               document.getElementById(id2).value=result;
            }
            document.getElementById(id2).value=result;
        }


function copy(id1,id2) {
            var num1 = document.getElementById(id1).value;
            
            document.getElementById(id2).value=num1;
        }

function add_few(id,id1,id2,id3=0) {
            var num1 = document.getElementById(id1).value;
            var num2 = document.getElementById(id2).value;
            var result = parseInt(num1) +parseInt(num2);
            if(id3!=0)
            {
                var num3 = document.getElementById(id3).value;
                result+=num3;
            }
            
            document.getElementById(id).value=result;
        }

function calculate_gratituity(basic_id,id) {
         var num1 = document.getElementById(basic_id).value;
         var result=((num1/26)*15)/12;
         result=Math.ceil(result);

            document.getElementById(id).value=result;
        }

function calculate_profession_tax(id1,id) {
         var num1 = document.getElementById(id1).value;
         var result;
         if(num1<=7000)result=0;
         else if(num1<=10000)result=175;
         else if(num1>=10001)result=200;
         

            document.getElementById(id).value=result;
        }

// for total sum of the class
function total_count(class_name,id_name) {
            var sum = 0;
    $("."+class_name).each(function(){
        sum += +$(this).val();
    });
            document.getElementById(id_name).value=sum;
        }

// for total A
// $(document).on("change", ".m_qty1", function() {
//     var sum = 0;
//     $(".m_qty1").each(function(){
//         sum += +$(this).val();
//     });
//     $(".m_total1").val(sum);
// });

// $(document).on("change", ".a_qty1", function() {
//     var sum = 0;
//     $(".a_qty1").each(function(){
//         sum += +$(this).val();
//     });
//     $(".a_total1").val(sum);
// });

// for total monthly E
$(document).on("change", ".m_qty4", function() {
    var sum = 0;
    $(".m_qty4").each(function(){
        sum += +$(this).val();
    });
    $(".m_total5").val(sum);
});

//for total C
$(document).on("change", ".m_qty3", function() {
    var sum = 0;
    $(".m_qty3").each(function(){
        sum += +$(this).val();
    });
    $(".m_total4").val(sum);
});

$(document).on("change", ".a_qty3", function() {
    var sum = 0;
    $(".a_qty3").each(function(){
        sum += +$(this).val();
    });
    $(".a_total4").val(sum);
});

// for total B 
$(document).on("change", ".m_qty2", function() {
    var sum = 0;
    $(".m_qty2").each(function(){
        sum += +$(this).val();
    });
    $(".m_total2").val(sum);
});

$(document).on("change", ".a_qty2", function() {
    var sum = 0;

    $(".a_qty2").each(function(){
        sum += +$(this).val();
    });
    $(".a_total2").val(sum);
});


// for monthly Gross Earnings [A+B]

// $(document).on("change", ".m_qty1 ,.m_qty2", function() {
//     var sum = 0;

//     $(".m_qty1").each(function(){
//         sum += +$(this).val();
//     });
//      $(".m_qty2").each(function(){
//         sum += +$(this).val();
//     });
//     $(".m_total3").val(sum);
// });

// for annual Gross Earnings [A+B]
$(document).on("change", ".a_qty1 ,.a_qty2", function() {
    var sum = 0;

    $(".a_qty1").each(function(){
        sum += +$(this).val();
    });
     $(".a_qty2").each(function(){
        sum += +$(this).val();
    });
    $(".a_total3").val(sum);
});


</script>

<div class="main-content p-t-30 m-t-75">
                <div class="section__content section__content--p20">
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
?>
<div class="container-fluid">
                        <div class="row">
                        	<div class="col-lg-12">
                        		<div class="card " id="Candidate-info"  >
                                    <div class="card-header">
                                        <h4>
                            Fill the details carefully</h4>
                        <span class="red fullWidth" style="color: green; font-size: 12px;">	* HRA is 40% for Cities other than Delhi, Mumbai, Calcutta, Chennai<br>
* Loyalty bonus will be credited in the salary after 14th Month<br>
* Gratuity paid as per Payment of Gratuity Act<br>
* TDS deduction as per Income Tax rules.<br>
* KPO Incentives are variables and payable for per working day in a month, while working on KPO Project.<br>
*Medi-Claim and GPA eligibility is as per Company Policy.<br>
Note: Salary is confidential. Kindly maintain the confidentiality.<br> </span> 
                                    </div>
                                    <div class="card-body card-block" style="overflow: scroll;">
                                         <form action="insert_ctc.php" method="post" enctype="multipart/form-data" class="form-horizontal">

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
        <td > <input type="number"  title="Enter the percentage ,enter 12 only if it is 12%" class="percen"  id="percen" name="percen" style="width:50px;" min="0" value="<?php echo $result['percen'] ?>" />
         <input type="number" style="text-align: right;"  class="m_qty1"  id="m_basicpay" style="width:100px;" name="m_basic_pay" min="0" onclick='fun3("percen","m_basicpay")' value="<?php echo $result['m_basic_pay'] ?>"></td>
        <td ><input type="number" style="text-align: right;" class="a_qty1" id="a_basicpay" style="width:150px;"  name="a_basic_pay" min="0" onclick='a_count("m_basicpay","a_basicpay");' value="<?php echo $result['a_basic_pay'] ?>"></td>    
    </tr>
    <tr>
        <td >House Rent Allowance</td>
        <td ><input type="number" style="text-align: right;" class="m_qty1" id="m_houserent" name="m_house_rent" min="0" onclick='fun4("m_basicpay","m_houserent",0.4)' value="<?php echo $result['m_house_rent'] ?>"></td>
        <td ><input type="number" style="text-align: right;" class="a_qty1"id="a_houserent" name="a_house_rent" min="0" onclick='a_count("m_houserent","a_houserent");' value="<?php echo $result['a_house_rent'] ?>"></td>
    </tr>
    <tr>
        <td >Medical Allowance</td>
        <td ><input type="number" style="text-align: right;" class="m_qty1" id="m_medallowance" name="m_med_allowance" min="0" value="<?php echo $result['m_med_allowance'] ?>"></td>
        <td ><input type="number" style="text-align: right;" class="a_qty1" id="a_medallowance" name="a_med_allowance" min="0" onclick='a_count("m_medallowance","a_medallowance");' value="<?php echo $result['a_med_allowance'] ?>"></td>
    </tr>
      <tr>
        
        <td >Conveyance Allowance</td>
        <td ><input type="number" style="text-align: right;" class="m_qty1" id="m_conveyanceallowance" name="m_conveyance_allowance" min="0" value="<?php echo $result['m_conveyance_allowance'] ?>"></td>
        <td ><input type="number" style="text-align: right;" class="a_qty1" id="a_conveyanceallowance" name="a_conveyance_allowance" min="0" onclick='a_count("m_conveyanceallowance","a_conveyanceallowance");' value="<?php echo $result['a_conveyance_allowance'] ?>"></td>
    </tr>
     <tr>
  		<td >LTA 8.33% of Basic </td>
        <td ><input type="number" style="text-align: right;" class="m_qty1" id="m_ltabasic" name="m_lta_basic" min="0" onclick='fun4("m_basicpay","m_ltabasic",0.0833)' value="<?php echo $result['m_lta_basic'] ?>"></td>
        <td ><input type="number" style="text-align: right;" class="a_qty1" id="a_ltabasic" name="a_lta_basic" min="0" onclick='a_count("m_ltabasic","a_ltabasic");' value="<?php echo $result['a_lta_basic'] ?>"></td>
    </tr>
     <tr>
        <td >Miscellaneous Allowance (Bal.Fig)  </td>
        <td ><input type="number" style="text-align: right;" class="m_qty1" id="m_miscallowance" name="m_misc_allowance" min="0" onclick='fun5("m_miscallowance")' value="<?php echo $result['m_misc_allowance'] ?>"></td>
        <td ><input type="number" style="text-align: right;" class="a_qty1" id="a_miscallowance" name="a_misc_allowance" min="0"  onclick='a_count("m_miscallowance","a_miscallowance");'value="<?php echo $result['a_misc_allowance'] ?>"></td>
    </tr>
    <tr>
        <th >
			Total of A
			    </th>
        <td ><input type="number" style="text-align: right;" class="m_total1" id="m_total_a" name="m_total_a" min="0" value="<?php echo $result['m_total_a'] ?>"></td>
        <td ><input type="number" style="text-align: right;" class="a_total1" id="a_total_a" name="a_total_a" min="0" onclick='total_count("a_qty1","a_total_a");' value="<?php echo $result['a_total_a'] ?>"></td>

 
    </tr>
    <tr>
        <th id="par" class="text-center"  scope="colgroup">
            Variable Component [B]
        </th>
    </tr>
    <tr>
        <td >Performance Variables*</td>
        <td ><input type="number" style="text-align: right;" class="m_qty2" id="m_performance" name="m_performance" min="0" value="<?php echo $result['m_performance'] ?>"></td>
        <td ><input type="number" style="text-align: right;" class="a_qty2" id="a_performance" name="a_performance" min="0" onclick='a_count("m_performance","a_performance");' value="<?php echo $result['a_performance'] ?>"></td>    
    </tr>
    <tr>
        <td >Night Shift Allowance</td>
        <td ><input type="number" style="text-align: right;" class="m_qty2" id="m_night_shift" name="m_night_shift" min="0" value="<?php echo $result['m_night_shift'] ?>"></td>
        <td ><input type="number" style="text-align: right;" class="a_qty2" id="a_night_shift" name="a_night_shift" min="0" onclick='a_count("m_night_shift","a_night_shift");' value="<?php echo $result['a_night_shift'] ?>"></td>
    </tr>
    <tr>
        <th >
			Total of B
			    </th>
        <td ><input type="number" style="text-align: right;" class="m_total2" id="m_total_b" name="m_total_b" min="0" value="<?php echo $result['m_total_b'] ?>"></td>
        <td ><input type="number" style="text-align: right;" class="a_total2" id="a_total_b" name="a_total_b" min="0" onclick='total_count("a_qty2","a_total_b");' value="<?php echo $result['a_total_b'] ?>"></td>

 
    </tr>
     <tr>
        <th >
			Gross Earnings [A+B]
			    </th>
        <td ><input type="number" style="text-align: right;" class="m_total3" id="m_total_ab" name="m_total_ab" min="0" onclick='add_few("m_total_ab","m_total_a","m_total_b");' value="<?php echo $result['m_total_ab'] ?>"></td>
        <td ><input type="number" style="text-align: right;" class="a_total3" id="a_total_ab" name="a_total_ab" min="0" onclick='add_few("a_total_ab","a_total_b","a_total_a");'  value="<?php echo $result['a_total_ab'] ?>"></td>

 
    </tr>
    <tr>
        <th id="par" class="text-center"  scope="colgroup">
            Company Contribution [C]
        </th>
    </tr>
    <tr>
        <td >ESIC Contribution by Employer</td>
        <td ><input type="number" style="text-align: right;" class="m_qty3" id="m_esic" onclick='fun2("m_esic","m_total_ab",0.0325);' name="m_esic" min="0"   value="<?php echo $result['m_esic'] ?>"></td>
        <td ><input type="number" style="text-align: right;" class="a_qty3" id="a_esic" name="a_esic" min="0" onclick='a_count("m_esic","a_esic");' value="<?php echo $result['a_esic'] ?>"></td>    
    </tr>
    <tr>
        <td >PF Contribution by Employer</td>
        <td ><input type="number" style="text-align: right;" class="m_qty3" id="m_pf_contri" onclick='fun2_2("m_pf_contri","m_basicpay",0.12);' name="m_pf_contri" min="0" value="<?php echo $result['m_pf_contri'] ?>"></td>
        <td ><input type="number" style="text-align: right;" class="a_qty3" id="a_pf_contri" name="a_pf_contri" min="0" onclick='a_count("m_pf_contri","a_pf_contri");' value="<?php echo $result['a_pf_contri'] ?>"></td>
    </tr>
    <tr>
        <td >Gratuity*</td>
        <td ><input type="number" style="text-align: right;" class="m_qty3" id="m_gratuity_c" name="m_gratuity_c" onclick='calculate_gratituity("m_basicpay","m_gratuity_c")' min="0" value="<?php echo $result['m_gratuity_c'] ?>"></td>
        <td ><input type="number" style="text-align: right;"  class="a_qty3"id="a_gratuity_c" name="a_gratuity_c" min="0" onclick='a_count("m_gratuity_c","a_gratuity_c");' value="<?php echo $result['a_gratuity_c'] ?>"></td>
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
        <td ><input type="number" style="text-align: right;" class="a_qty3" id="a_medi_claim_c" name="a_medi_claim_c" min="0" onclick='a_count("m_medi_claim_c","a_medi_claim_c");' value="<?php echo $result['a_medi_claim_c'] ?>"></td>
    </tr>

     
    <tr>
        <th >
			Total of C
			    </th>
        <td ><input type="number" style="text-align: right;" class="m_total4" id="m_total_c" name="m_total_c" min="0" value="<?php echo $result['m_total_c'] ?>"></td>
        <td ><input type="number" style="text-align: right;"  class="a_total4" id="a_total_c" name="a_total_c" min="0" onclick='total_count("a_qty3","a_total_c");' value="<?php echo $result['a_total_c'] ?>"></td>

 
    </tr>
     <tr>
        <th >
			Total CTC [A+B+C] = D
			    </th>
        <td ><input type="number" style="text-align: right;" id="m_total_abc" name="m_total_abc" min="0" onclick='add_few("m_total_abc","m_total_ab","m_total_c");' value="<?php echo $result['m_total_abc'] ?>"></td>
        <td ><input type="number" style="text-align: right;" id="a_total_abc" name="a_total_abc" min="0" onclick='add_few("a_total_abc","a_total_ab","a_total_c");' value="<?php echo $result['a_total_abc'] ?>"></td>

 
    </tr>
    <tr>
        <th id="par" class="text-center"  scope="colgroup">
            Deduction [E]
        </th>
    </tr>
    <tr>
        <td >Professions Tax</td>
        <td ><input type="number" style="text-align: right;" class="m_qty4" id="m_pro_tex" name="m_pro_tax" onclick='calculate_profession_tax("m_total_ab","m_pro_tex")' min="0" value="<?php echo $result['m_pro_tax'] ?>"></td>
        <td ><input type="number" style="text-align: right;" class="a_qty4" id="a_pro_tex" name="a_pro_tax" min="0"  value="<?php echo $result['a_pro_tax'] ?>"></td>    
    </tr>
    <tr>
        <td >PF Contribution by Employer</td>
        <td ><input type="number" style="text-align: right;" class="m_qty4" id="m_pf_contri_employer" onclick='copy("m_pf_contri","m_pf_contri_employer");' name="m_pf_contri_employer" min="0" value="<?php echo $result['m_pf_contri_employer'] ?>"></td>
        <td ><input type="number" style="text-align: right;" class="a_qty4" id="a_pf_contri_employer" name="a_pf_contri_employer" min="0" onclick='a_count("m_pf_contri_employer","a_pf_contri_employer");' value="<?php echo $result['a_pf_contri_employer'] ?>"></td>
    </tr>
    <tr>
        <td >PF Contribution by Employee</td>
        <td ><input type="number" style="text-align: right;" class="m_qty4" id="m_pf_contri_employee" onclick='copy("m_pf_contri_employer","m_pf_contri_employee");' name="m_pf_contri_employee" min="0" value="<?php echo $result['m_pf_contri_employee'] ?>"></td>
        <td ><input type="number" style="text-align: right;" class="a_qty4" id="a_pf_contri_employee" name="a_pf_contri_employee" min="0" onclick='a_count("m_pf_contri_employee","a_pf_contri_employee");' value="<?php echo $result['a_pf_contri_employee'] ?>"></td>
    </tr>
      <tr>
        
        <td >ESIC Contribution by Employer</td>
        <td ><input type="number" style="text-align: right;" class="m_qty4" id="m_esic_contri_employer" name="m_esic_contri_employer" onclick='copy("m_esic","m_esic_contri_employer");' min="0" value="<?php echo $result['m_esic_contri_employer'] ?>"></td>
        <td ><input type="number" style="text-align: right;" class="a_qty4" id="a_esic_contri_employer" name="a_esic_contri_employer" min="0" onclick='a_count("m_esic_contri_employer","a_esic_contri_employer");' value="<?php echo $result['a_esic_contri_employer'] ?>"></td>
    </tr>
     <tr>
  		<td >ESI Contribution by Employee</td>
        <td ><input type="number" style="text-align: right;" class="m_qty4" id="m_esi_contri_employee" onclick='fun2("m_esi_contri_employee","m_total_ab",0.0075);' name="m_esic_contri_employee" min="0" value="<?php echo $result['m_esic_contri_employee'] ?>"></td>
        <td ><input type="number" style="text-align: right;" class="a_qty4" id="a_esi_contri_employee" name="a_esic_contri_employee" min="0" onclick='a_count("m_esi_contri_employee","a_esi_contri_employee");' value="<?php echo $result['a_esic_contri_employee'] ?>"></td>
    </tr>
     <tr>
        <td >Gratuity  </td>
        <td ><input type="number" style="text-align: right;" class="m_qty4" id="m_gratuity_e" onclick='copy("m_gratuity_c","m_gratuity_e");' name="m_gratuity_e" min="0" value="<?php echo $result['m_gratuity_e'] ?>"></td>
        <td ><input type="number" style="text-align: right;" class="a_qty4" id="a_gratuity_e" name="a_gratuity_e" min="0" onclick='a_count("m_gratuity_e","a_gratuity_e");' value="<?php echo $result['m_gratuity_e'] ?>"></td>
 </tr>
    <tr>
        <td >Medi Claim  </td>
        <td ><input type="number" style="text-align: right;" class="m_qty4" id="m_medi_claim_e" onclick='copy("m_medi_claim_c","m_medi_claim_e");' name="m_medi_claim_e" min="0" value="<?php echo $result['m_medi_claim_e'] ?>"></td>
        <td ><input type="number" style="text-align: right;" class="a_qty4" id="a_medi_claim_e" name="a_medi_claim_e" min="0" onclick='a_count("m_medi_claim_e","a_medi_claim_e");' value="<?php echo $result['a_medi_claim_e'] ?>"></td>
    </tr>
    <tr>
        <th >
			Total of E
			    </th>
        <td ><input type="number" style="text-align: right;"  class="m_total5" id="m_total_e" name="m_total_e" min="0" value="<?php echo $result['m_total_e'] ?>"></td>
        <td ><input type="number" style="text-align: right;"  class="a_total5" id="a_total_e" name="a_total_e" min="0" onclick='total_count("a_qty4","a_total_e");' value="<?php echo $result['a_total_e'] ?>"></td>

 
    </tr>
    <tr>
        <th >
			Net Take Home before TDS** [D-E]
			    </th>
        <td ><input type="number" style="text-align: right;" id="m_net_take_home" name="m_net_take_home" min="0" onclick='fun1("m_net_take_home","m_total_abc","m_total_e");' value="<?php echo $result['m_net_take_home'] ?>"></td>
        <td ><input type="number" style="text-align: right;" id="a_net_take_home" name="a_net_take_home" min="0" onclick='fun1("a_net_take_home","a_total_abc","a_total_e");' value="<?php echo $result['a_net_take_home'] ?>"></td>

 
    </tr>
</tbody>

</table>
<div class="card-footer">
<button type="submit"  class="btn btn-primary btn-sm" >
                                            <i class="fa fa-dot-circle-o"></i> Save
                                        </button>
                                        <a href="generate_offer_letter.php?move=true"> <button  class="btn btn-info btn-sm" >
                                            <i class="fa fa-dot-circle-o"></i> Generate Offer Letter
                                        </button></a>
                                    </div>

                                    </form>
                        </div>
                    </div>
                </div>
            </div>
        
    </div>



                        <!----------------->
                    </div>
                </div>
            </div>