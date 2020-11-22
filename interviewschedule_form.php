<?php include 'cand_base.php' ;

// fetch for 1st interview 
  $query =" SELECT * FROM 1interview_detail WHERE fk ='$id' AND c_id=".$_SESSION['c_id'];
       $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
      $i1 = mysqli_fetch_array($ssql,MYSQLI_ASSOC);

// fetch for 2nd interview 
       $query =" SELECT * FROM 2interview_detail WHERE fk ='$id' AND c_id=".$_SESSION['c_id'];
       $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
      $i2 = mysqli_fetch_array($ssql,MYSQLI_ASSOC);

     // fetch for 3rd interview 
       $query =" SELECT * FROM 3interview_detail WHERE fk ='$id' AND c_id=".$_SESSION['c_id'];
       $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
      $i3 = mysqli_fetch_array($ssql,MYSQLI_ASSOC); 

        // fetch for 4th interview 
       $query =" SELECT * FROM 4interview_detail WHERE fk ='$id' AND c_id=".$_SESSION['c_id'];
       $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
      $i4 = mysqli_fetch_array($ssql,MYSQLI_ASSOC);
?>


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
						?>

<script type="text/javascript">


//for 1st interview 
function give_venue_1(value) {
if(value=="Face 2 Face")
    {   
        document.getElementById("venue1").disabled = false;
    }

else 
{
            document.getElementById("selvenue1").selected = true;
            document.getElementById("venue1").disabled = true;
}
}

var radioState = false;
    function test(element){
        if(radioState == false) {
            check();
            radioState = true;
        }else{
            uncheck();
            radioState = false;
        }
    }
    function check() {
        document.getElementById("jd").checked = true;
       document.getElementById("selectjd").disabled = false;
              document.getElementById("call_letter").disabled = false;
         document.getElementById("jd").value = "yes";

    }
    function uncheck() {
                 document.getElementById("jd").value = "no";
        document.getElementById("jd").checked = false;
        document.getElementById("selectjd").disabled = true;
         document.getElementById("default").selected = true;
                  document.getElementById("default1").selected = true;


                document.getElementById("call_letter").disabled = true;
    }


function change_source(value) {
if(value== "yes")
    {
         $("#shortlisted").prop('disabled', false);
        document.getElementById("non_apperance_reason").disabled = true;
        document.getElementById("blacklist").checked = false;
        document.getElementById("default4").selected = true;


    }
else
    {

         $("#shortlisted").prop('disabled', true);
        document.getElementById("default3").selected = true;
        document.getElementById("default2").selected = true;
        document.getElementById("non_apperance_reason").disabled = false;

        document.getElementById("for_final").checked = false;
        document.getElementById("next_round").checked = false;

        document.getElementById("for_final").disabled = true;
        document.getElementById("next_round").disabled = true;

        document.getElementById("rejection_reason").disabled = true;
        document.getElementById("blacklist").disabled = false;


    }
}

function active_radio_button(value){
    if(value== "yes"){
        document.getElementById("for_final").disabled = false;
        document.getElementById("next_round").disabled = false;
        document.getElementById("rejection_reason").disabled = true;

        document.getElementById("cooling_period").checked = false;
         document.getElementById("cooling_period").disabled = true;

                 document.getElementById("blacklist").disabled = true;


    }
    else if(value== "no")
    {
        document.getElementById("for_final").checked = false;
        document.getElementById("next_round").checked = false;

        document.getElementById("for_final").disabled = true;
        document.getElementById("next_round").disabled = true;

        document.getElementById("rejection_reason").disabled = false;
         document.getElementById("cooling_period").disabled = false;

        document.getElementById("blacklist").disabled = false;


    }
    else
    {
                document.getElementById("rejection_reason").disabled = true;
               document.getElementById("default3").selected = true;

    }
}

var radioState1 = false;
    function test1(element){
        if(radioState1 == false) {
            check1();
            radioState1 = true;
        }else{
            uncheck1();
            radioState1 = false;
        }
    }
    function check1() {
        document.getElementById("for_final").checked = true;
         document.getElementById("for_final").value = "yes";

    }
    function uncheck1() {
                document.getElementById("for_final").checked = false;
        document.getElementById("for_final").value = "no";
}
var radioState2 = false;
    function test2(element){
        if(radioState2 == false) {
            check2();
            radioState2 = true;
        }else{
            uncheck2();
            radioState2 = false;
        }
    }
    function check2() {
        document.getElementById("next_round").checked = true;
        document.getElementById("next_round").value = "yes";

        document.getElementById("2nd_round").style.display = "block";

    }
    function uncheck2() {
        document.getElementById("next_round").checked = false;
        document.getElementById("next_round").value = "no";

        document.getElementById("2nd_round").style.display = "none";

}
var radioState3 = false;
    function test3(element){
        if(radioState3 == false) {
            check3();
            radioState3 = true;
        }else{
            uncheck3();
            radioState3 = false;
        }
    }
    function check3() {
        document.getElementById("cooling_period").checked = true;
        document.getElementById("cooling_period").value = "yes";

       
    }
    function uncheck3() {
        document.getElementById("cooling_period").checked = false;
        document.getElementById("cooling_period").value = "no";

}

var radioState4 = false;
    function test4(element){
        if(radioState4 == false) {
            check4();
            radioState4 = true;
        }else{
            uncheck4();
            radioState4 = false;
        }
    }
    function check4() {
        document.getElementById("blacklist").checked = true;
               document.getElementById("blacklist").value = "yes";

    }
    function uncheck4() {
        document.getElementById("blacklist").checked = false;
                document.getElementById("blacklist").value = "no";

}


// for 2nd interview 
function give_venue_2(value) {
if(value=="Face 2 Face")
    {   
        document.getElementById("venue2").disabled = false;
    }

else 
{
            document.getElementById("selvenue2").selected = true;
            document.getElementById("venue2").disabled = true;
}
}


var radioState_2 = false;
    function test_2(element){
        if(radioState_2 == false) {
            check_2();
            radioState_2 = true;
        }else{
            uncheck_2();
            radioState_2 = false;
        }
    }
    function check_2() {
        document.getElementById("jd_2").checked = true;
       document.getElementById("selectjd_2").disabled = false;
              document.getElementById("call_letter_2").disabled = false;
         document.getElementById("jd_2").value = "yes";

    }
    function uncheck_2() {
                 document.getElementById("jd_2").value = "no";
        document.getElementById("jd_2").checked = false;
        document.getElementById("selectjd_2").disabled = true;
         document.getElementById("default_2").selected = true;
                  document.getElementById("default1_2").selected = true;


                document.getElementById("call_letter_2").disabled = true;
    }


function change_source_2(value) {
if(value== "yes")
    {
         $("#shortlisted_2").prop('disabled', false);
        document.getElementById("non_apperance_reason_2").disabled = true;
        document.getElementById("default4_2").selected = true;


    }
else
    {

         $("#shortlisted_2").prop('disabled', true);
        document.getElementById("default3_2").selected = true;
        document.getElementById("default2_2").selected = true;
        document.getElementById("non_apperance_reason_2").disabled = false;

        document.getElementById("for_final_2").checked = false;
        document.getElementById("next_round_2").checked = false;

        document.getElementById("for_final_2").disabled = true;
        document.getElementById("next_round_2").disabled = true;

        document.getElementById("rejection_reason_2").disabled = true;
        document.getElementById("blacklist_2").disabled = false;


    }
}

function active_radio_button_2(value){
    if(value== "yes"){
        document.getElementById("for_final_2").disabled = false;
        document.getElementById("next_round_2").disabled = false;
        document.getElementById("rejection_reason_2").disabled = true;

        document.getElementById("cooling_period_2").checked = false;
         document.getElementById("cooling_period_2").disabled = true;

        document.getElementById("blacklist_2").disabled = true;

    }
    else if(value== "no")
    {
        document.getElementById("for_final_2").checked = false;
        document.getElementById("next_round_2").checked = false;

        document.getElementById("for_final_2").disabled = true;
        document.getElementById("next_round_2").disabled = true;

        document.getElementById("rejection_reason_2").disabled = false;
         document.getElementById("cooling_period_2").disabled = false;

        document.getElementById("blacklist_2").disabled = false;

    }
    else
    {
                document.getElementById("rejection_reason_2").disabled = true;
               document.getElementById("default3_2").selected = true;

    }
}

var radioState1_2 = false;
    function test1_2(element){
        if(radioState1_2 == false) {
            check1_2();
            radioState1_2 = true;
        }else{
            uncheck1_2();
            radioState1_2 = false;
        }
    }
    function check1_2() {
        document.getElementById("for_final_2").checked = true;
         document.getElementById("for_final_2").value = "yes";

    }
    function uncheck1_2() {
                document.getElementById("for_final_2").checked = false;
        document.getElementById("for_final_2").value = "no";
}
var radioState2_2 = false;
    function test2_2(element){
        if(radioState2_2 == false) {
            check2_2();
            radioState2_2 = true;
        }else{
            uncheck2_2();
            radioState2_2 = false;
        }
    }
    function check2_2() {
        document.getElementById("next_round_2").checked = true;
        document.getElementById("next_round_2").value = "yes";

        document.getElementById("3rd_round").style.display = "block";

    }
    function uncheck2_2() {
        document.getElementById("next_round_2").checked = false;
        document.getElementById("next_round_2").value = "no";

        document.getElementById("3rd_round").style.display = "none";

}
var radioState3_2 = false;
    function test3_2(element){
        if(radioState3_2 == false) {
            check3_2();
            radioState3_2 = true;
        }else{
            uncheck3_2();
            radioState3_2 = false;
        }
    }
    function check3_2() {
        document.getElementById("cooling_period_2").checked = true;
        document.getElementById("cooling_period_2").value = "yes";

       
    }
    function uncheck3_2() {
        document.getElementById("cooling_period_2").checked = false;
        document.getElementById("cooling_period_2").value = "no";

}

var radioState4_2 = false;
    function test4_2(element){
        if(radioState4_2 == false) {
            check4_2();
            radioState4_2 = true;
        }else{
            uncheck4_2();
            radioState4_2 = false;
        }
    }
    function check4_2() {
        document.getElementById("blacklist_2").checked = true;
               document.getElementById("blacklist_2").value = "yes";

    }
    function uncheck4() {
        document.getElementById("blacklist_2").checked = false;
                document.getElementById("blacklist_2").value = "no";

}

// for  3rd interview

function give_venue_3(value) {
if(value=="Face 2 Face")
    {   
        document.getElementById("venue3").disabled = false;
    }

else 
{
            document.getElementById("selvenue3").selected = true;
            document.getElementById("venue3").disabled = true;
}
}

var radioState_3 = false;
    function test_3(element){
        if(radioState_3 == false) {
            check_3();
            radioState_3 = true;
        }else{
            uncheck_3();
            radioState_3 = false;
        }
    }
    function check_3() {
        document.getElementById("jd_3").checked = true;
       document.getElementById("selectjd_3").disabled = false;
              document.getElementById("call_letter_3").disabled = false;
         document.getElementById("jd_3").value = "yes";

    }
    function uncheck_3() {
                 document.getElementById("jd_3").value = "no";
        document.getElementById("jd_3").checked = false;
        document.getElementById("selectjd_3").disabled = true;
         document.getElementById("default_3").selected = true;
                  document.getElementById("default1_3").selected = true;


                document.getElementById("call_letter_3").disabled = true;
    }


function change_source_3(value) {
if(value== "yes")
    {
         $("#shortlisted_3").prop('disabled', false);
        document.getElementById("non_apperance_reason_3").disabled = true;
        document.getElementById("blacklist_3").checked = false;
        document.getElementById("default4_3").selected = true;


    }
else
    {

         $("#shortlisted_3").prop('disabled', true);
        document.getElementById("default3_3").selected = true;
        document.getElementById("default2_3").selected = true;
        document.getElementById("non_apperance_reason_3").disabled = false;

        document.getElementById("for_final_3").checked = false;
        document.getElementById("next_round_3").checked = false;

        document.getElementById("for_final_3").disabled = true;
        document.getElementById("next_round_3").disabled = true;

        document.getElementById("rejection_reason_3").disabled = true;
        document.getElementById("blacklist_3").disabled = false;


    }
}

function active_radio_button_3(value){
    if(value== "yes"){
        document.getElementById("for_final_3").disabled = false;
        document.getElementById("next_round_3").disabled = false;
        document.getElementById("rejection_reason_3").disabled = true;

        document.getElementById("cooling_period_3").checked = false;
         document.getElementById("cooling_period_3").disabled = true;

        document.getElementById("blacklist_3").disabled = true;

    }
    else if(value== "no")
    {
        document.getElementById("for_final_3").checked = false;
        document.getElementById("next_round_3").checked = false;

        document.getElementById("for_final_3").disabled = true;
        document.getElementById("next_round_3").disabled = true;

        document.getElementById("rejection_reason_3").disabled = false;
         document.getElementById("cooling_period_3").disabled = false;

        document.getElementById("blacklist_3").disabled = false;


    }
    else
    {
                document.getElementById("rejection_reason_3").disabled = true;
               document.getElementById("default3_3").selected = true;

    }
}

var radioState1_3 = false;
    function test1_3(element){
        if(radioState1_3 == false) {
            check1_3();
            radioState1_3 = true;
        }else{
            uncheck1_3();
            radioState1_3 = false;
        }
    }
    function check1_3() {
        document.getElementById("for_final_3").checked = true;
         document.getElementById("for_final_3").value = "yes";

    }
    function uncheck1_3() {
                document.getElementById("for_final_3").checked = false;
        document.getElementById("for_final_3").value = "no";
}
var radioState2_3 = false; 

    function test2_3(element){
        if(radioState2_3 == false) {
            check2_3();
            radioState2_3 = true;
        }else{
            uncheck2_3();
            radioState2_3 = false;
        }
    }
    function check2_3() {
        document.getElementById("next_round_3").checked = true;
        document.getElementById("next_round_3").value = "yes";

        document.getElementById("3rd_round").style.display = "block";

    }
    function uncheck2_3() {
        document.getElementById("next_round_3").checked = false;
        document.getElementById("next_round_3").value = "no";

        document.getElementById("3rd_round").style.display = "none";

}
var radioState3_3 = false;
    function test3_3(element){
        if(radioState3_3 == false) {
            check3_3();
            radioState3_3 = true;
        }else{
            uncheck3_3();
            radioState3_3 = false;
        }
    }
    function check3_3() {
        document.getElementById("cooling_period_3").checked = true;
        document.getElementById("cooling_period_3").value = "yes";

       
    }
    function uncheck3_3() {
        document.getElementById("cooling_period_3").checked = false;
        document.getElementById("cooling_period_3").value = "no";

}

var radioState4_3 = false;
    function test4_3(element){
        if(radioState4_3 == false) {
            check4_3();
            radioState4_3 = true;
        }else{
            uncheck4_3();
            radioState4_3 = false;
        }
    }
    function check4_3() {
        document.getElementById("blacklist_3").checked = true;
               document.getElementById("blacklist_3").value = "yes";

    }
    function uncheck4() {
        document.getElementById("blacklist_3").checked = false;
                document.getElementById("blacklist_3").value = "no";

}


// for final i.e 4th interview

function give_venue_4(value) {
if(value=="Face 2 Face")
    {   
        document.getElementById("venue4").disabled = false;
    }

else 
{
            document.getElementById("selvenue4").selected = true;
            document.getElementById("venue4").disabled = true;
}
}

var radioState_4 = false;
    function test_4(element){
        if(radioState_4 == false) {
            check_4();
            radioState_4 = true;
        }else{
            uncheck_4();
            radioState_4 = false;
        }
    }
    function check_4() {
        document.getElementById("jd_4").checked = true;
       document.getElementById("selectjd_4").disabled = false;
              document.getElementById("call_letter_4").disabled = false;
         document.getElementById("jd_4").value = "yes";

    }
    function uncheck_4() {
                 document.getElementById("jd_4").value = "no";
        document.getElementById("jd_4").checked = false;
        document.getElementById("selectjd_4").disabled = true;
         document.getElementById("default_4").selected = true;
                  document.getElementById("default1_4").selected = true;


                document.getElementById("call_letter_4").disabled = true;
    }


function change_source_4(value) {
if(value== "yes")
    {
         $("#shortlisted_4").prop('disabled', false);
        document.getElementById("non_apperance_reason_4").disabled = true;
        document.getElementById("blacklist_4").checked = false;
        document.getElementById("default4_4").selected = true;


    }
else
    {

         $("#shortlisted_4").prop('disabled', true);
        document.getElementById("default3_4").selected = true;
        document.getElementById("default2_4").selected = true;
        document.getElementById("non_apperance_reason_4").disabled = false;

        document.getElementById("for_final_4").checked = false;
        document.getElementById("next_round_4").checked = false;

        document.getElementById("for_final_4").disabled = true;
        document.getElementById("next_round_4").disabled = true;

        document.getElementById("rejection_reason_4").disabled = true;
        document.getElementById("blacklist_4").disabled = false;


    }
}

function active_radio_button_4(value){
    if(value== "yes"){
        document.getElementById("for_final_4").disabled = false;
        document.getElementById("next_round_4").disabled = false;
        document.getElementById("rejection_reason_4").disabled = true;
        document.getElementById("blacklist_4").disabled = true;

        document.getElementById("cooling_period_4").checked = false;
         document.getElementById("cooling_period_4").disabled = true;

    }
    else if(value== "no")
    {
        document.getElementById("for_final_4").checked = false;
        document.getElementById("next_round_4").checked = false;

        document.getElementById("for_final_4").disabled = true;
        document.getElementById("next_round_4").disabled = true;
        document.getElementById("blacklist_4").disabled = false;

        document.getElementById("rejection_reason_4").disabled = false;
         document.getElementById("cooling_period_4").disabled = false;


    }
    else
    {
                document.getElementById("rejection_reason_4").disabled = true;
               document.getElementById("default3_4").selected = true;

    }
}

var radioState1_4 = false;
    function test1_4(element){
        if(radioState1_4 == false) {
            check1_4();
            radioState1_4 = true;
        }else{
            uncheck1_4();
            radioState1_4 = false;
        }
    }
    function check1_4() {
        document.getElementById("for_final_4").checked = true;
         document.getElementById("for_final_4").value = "yes";

    }
    function uncheck1_4() {
                document.getElementById("for_final_4").checked = false;
        document.getElementById("for_final_4").value = "no";
}
var radioState2_4 = false;
    function test2_4(element){
        if(radioState2_4 == false) {
            check2_4();
            radioState2_4 = true;
        }else{
            uncheck2_4();
            radioState2_4 = false;
        }
    }
    function check2_4() {
        document.getElementById("next_round_4").checked = true;
        document.getElementById("next_round_4").value = "yes";

        document.getElementById("3rd_round").style.display = "block";

    }
    function uncheck2_4() {
        document.getElementById("next_round_4").checked = false;
        document.getElementById("next_round_4").value = "no";

        document.getElementById("3rd_round").style.display = "none";

}
var radioState3_4 = false;
    function test3_4(element){
        if(radioState3_4 == false) {
            check3_4();
            radioState3_4 = true;
        }else{
            uncheck3_4();
            radioState3_4 = false;
        }
    }
    function check3_4() {
        document.getElementById("cooling_period_4").checked = true;
        document.getElementById("cooling_period_4").value = "yes";

       
    }
    function uncheck3_4() {
        document.getElementById("cooling_period_4").checked = false;
        document.getElementById("cooling_period_4").value = "no";

}

var radioState4_4 = false;
    function test4_4(element){
        if(radioState4_4 == false) {
            check4_4();
            radioState4_4 = true;
        }else{
            uncheck4_4();
            radioState4_4 = false;
        }
    }
    function check4_4() {
        document.getElementById("blacklist_4").checked = true;
               document.getElementById("blacklist_4").value = "yes";

    }
    function uncheck4() {
        document.getElementById("blacklist_4").checked = false;
                document.getElementById("blacklist_4").value = "no";

}


</script>
<div class="row">

    <!---------------   1st Interview form  --------------->

		<div class="col-lg-12">
                                <div class="card " id="1st_round" >
                                    <div class="card-header">
                                        <strong>1st Interview Schedule</strong> 
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="insert_interview1.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                           
                                            <div class="row form-group">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label  class=" form-control-label">1st Interview Schedule / Reschedule
</label>
       <input name="1date" type="date" value="<?php echo $i1['1date']; ?>" id="city" class="form-control"  required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                  <label for="city" class=" form-control-label">Time </label><br>
                                 <input type="time" id="city" name="1time" value="<?php echo $i1['1time']; ?>" required>
                                               </div>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label for="selectSm" class=" form-control-label">Type </label>
                                           <select name="1type_interview" id="SelectLm" class="form-control-sm form-control" onchange="give_venue_1(this.value)" required>
                    <option hidden value="">Type</option>
                    <option <?php if($i1['1type_interview']=="Face 2 Face")echo'selected="true"'; ?> value="Face 2 Face">Face 2 Face</option>
                     <option <?php if($i1['1type_interview']=="Telephonic")echo'selected="true"'; ?>value="Telephonic">Telephonic </option>
                            <option <?php if($i1['1type_interview']=="Skype Video Call")echo'selected="true"'; ?> value="Skype Video Call">Skype Video Call</option>
                            <option <?php if($i1['1type_interview']=="What's APP Video Call")echo'selected="true"'; ?> value="What's APP Video Call">What's APP Video Call</option>
                             <option <?php if($i1['1type_interview']=="Zoom Video Call")echo'selected="true"'; ?> value="Zoom Video Call">Zoom Video Call</option>
                               </select>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                            <label for="selectSm" class=" form-control-label">Select venue </label>

                                                 <select name="venue" id="venue1" class="form-control-sm form-control" onchange=""  disabled="disabled">
                    <option hidden id="selvenue1" value="">Select venue </option>
     <option <?php if($i1['venue']=="Banglore")echo'selected="true"';  ?> value="Banglore">Banglore</option>
      <option <?php if($i1['venue']=="Pune")echo'selected="true"';  ?> value="Pune">Pune</option>
      <option <?php if($i1['venue']=="USA")echo'selected="true"';  ?> value="USA">USA</option>

                                               
                                            </select>
                                               </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                  
         <input type="radio"  for="selectSm" name="1attach_jd" value="no" id="jd" class=" form-control-label" onclick="test(this)" ><label for="JD">Attach JD</label><br>

                                           <select name="1type_jd" id="selectjd" class="form-control-sm form-control" onchange=""  disabled="disabled">
                    <option hidden id="default" value="">Select JD </option>
     <option <?php if($i1['1type_jd']=="dot net JD")echo'selected="true"'; ?> value="dot net JD">dot net JD</option>
      <option <?php if($i1['1type_jd']=="php developer JD")echo'selected="true"'; ?> value="php developer JD">php developer JD</option>
      <option <?php if($i1['1type_jd']=="JSP and servlet JD")echo'selected="true"'; ?> value="JSP and servlet JD">JSP and servlet JD</option>

                                               
                                            </select>
                                             </div>
                                         </div>
                                            <div class="col-12">
                                         <div class="form-group m-t-10">

                                        <button id="call_letter" disabled="disabled" name="call_letter" title="Attach JD before sending call- letter" type="submit"  class="btn btn-primary btn-sm" >

                                            <i class="far fa-envelope"></i> Send interview call letter
                                        </button>
                                        <small class="form-text" style="color: green;"><?php if($i1['call_letter']=="yes"){ echo ' call letter has been sent successfully';} ?></small>

                                    </div>
                                </div>

                                 <div class="col-6">
                                         <div class="form-group m-t-10">
                                  <label for="selectSm" class=" form-control-label">Appeared For interview ?</label>
                                       
                                        <select title="send interview call letter first" name="1appeared_interview" id="appeared" class="form-control-sm form-control" onchange="change_source(this.value)"  <?php if($i1['call_letter']!="yes") echo 'disabled="disabled"'; ?> >
                    <option hidden id="default1" value="">select option </option>
                    <option <?php if($i1['1appeared_interview']=="yes")echo'selected="true"'; ?> value="yes">YES</option>
                     <option <?php if($i1['1appeared_interview']=="no")echo'selected="true"'; ?> value="no">NO</option>

                                               
                                            </select>
                                    </div>
                                </div>

                                <div class="col-6">
                                         <div class="form-group m-t-10">
                                 <label for="selectSm" class=" form-control-label">Shortlisted ?</label>

                     <select name="1shortlisted" id="shortlisted" class="form-control-sm form-control" onchange="active_radio_button(this.value)"  disabled="disabled">
                    <option hidden id="default2" value="no">select option </option>
                            <option <?php if($i1['1shortlisted']=="yes"){echo'selected="true"';} ?> value="yes">YES</option>
                             <option <?php if($i1['1shortlisted']=="no"){echo'selected="true"';} ?> value="no">NO</option>
                             <option <?php if($i1['1shortlisted']=="hold"){echo'selected="true"';} ?> value="hold">HOLD</option>

                                               
                                            </select>
                                    </div>
                                </div>

                                 <div class="col-6">
                                                <div class="form-group">
                                                    <label for="postal-code" class=" form-control-label">Interviwer Name</label>
                                           <input name="1interviwer_name" type="text" id="postal-code" value="<?php echo $i1['1interviwer_name']; ?>" class="form-control" required >
                                          
                                                </div>
                                            </div>
                                        </div>
                                            <div class="row">
                                            <div class="col-6">
                                                <div class="form-group m-t-10">
                                                  
         <input type="radio" <?php if($i1['1mark_final_round']=="yes")echo'checked="true"'; ?> disabled="disabled" for="selectSm" id="for_final" name="1mark_final_round" class="form-control-label" value="no" onclick="test1(this)" ><label for="JD">Mark as a final round</label><br>

         <input type="radio" <?php if($i1['1next_round']=="yes")echo'checked="true"'; ?> disabled="disabled" for="selectSm" id="next_round" name="1next_round" class=" form-control-label" value="no" onclick="test2(this)" ><label for="JD">Schedule Next Round</label><br>

                                                </div>
                                            </div>

                                             <div class="col-6">
                                         <div class="form-group ">
                                 <label for="selectSm" class=" form-control-label">Rejection reason ?</label>

                                        <select name="1rejection_reason" id="rejection_reason" class="form-control-sm form-control" onchange=" "  disabled="disabled" >
                    <option hidden id="default3" value="">select option </option>
                            <option <?php if($i1['1rejection_reason']=="HR Fittment (CTC)")echo'selected="true"'; ?> value="HR Fittment (CTC)">HR Fittment (CTC)</option>
                             <option <?php if($i1['1rejection_reason']=="Notice period")echo'selected="true"'; ?> value="Notice period">Notice period </option>
                             <option <?php if($i1['1rejection_reason']=="Technical rejection")echo'selected="true"'; ?> value="Technical rejection">Technical rejection</option>
                             <option <?php if($i1['1rejection_reason']=="Candidate not interested")echo'selected="true"'; ?> value="Candidate not interested">Candidate not interested</option>

                                               
                                            </select>
                                    </div>
                                </div>

                                  <div class="col-6">
                                                <div class="form-group m-t-10">
                                                  
                             <input type="radio" <?php if($i1['1cooling_period']=="yes")echo'checked="true"'; ?> disabled="disabled" for="selectSm" id="cooling_period" name="1cooling_period" class=" form-control-label"  value="no" onclick="test3(this)" ><label for="JD">Cooling period</label><br>

                             <input type="radio" <?php if($i1['1blacklist']=="yes")echo'checked="true"'; ?> disabled="disabled" for="selectSm" id="blacklist" name="1blacklist" class=" form-control-label" value=" " onclick="test4(this)" ><label for="JD">Blacklist</label><br>

                                                </div>
                                            </div>

                                 <div class="col-6">
                                         <div class="form-group ">
                                 <label for="selectSm" class=" form-control-label">Reason for Non-Appearance</label>

                                        <select name="1reason_non_appearance" id="non_apperance_reason" class="form-control-sm form-control" onchange=""  disabled="disabled">
                    <option hidden id="default4" value=" ">select option </option>
             <option <?php if($i1['1reason_non_appearance']=="no response")echo'selected="true"'; ?>  value="no response">No response</option>
            <option <?php if($i1['1reason_non_appearance']=="not interested")echo'selected="true"'; ?> value="not interested">Not interested </option>
            <option <?php if($i1['1reason_non_appearance']=="dropout")echo'selected="true"'; ?> value="dropout">DropOut</option>

                                               
                                            </select>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                        <button type="submit" class="btn btn-success btn-sm" >
                                            <i class="fa fa-dot-circle-o"></i> Save/Update
                                        </button>
                                        
                                    </div>



                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!--------- 2nd interview round--------------->
                            
                                                         <div class="col-lg-12">
                        <div class="card " id="2nd_round" style="<?php if($i1['1next_round']=='yes')echo'display:block';else echo 'display: none'; ?>" >
                                    <div class="card-header">
                                        <strong>2nd Interview </strong> 
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="insert_interview2.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                           
                                            <div class="row form-group">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label  class=" form-control-label">2nd Interview Schedule / Reschedule
</label>
       <input name="1date" type="date" value="<?php echo $i2['1date']; ?>" id="city_2" class="form-control"  required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                  <label for="city" class=" form-control-label">Time </label><br>
                                 <input type="time" id="city" name="1time" value="<?php echo $i2['1time']; ?>" required>
                                               </div>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label for="selectSm" class=" form-control-label">Type </label>
                                           <select name="1type_interview" id="SelectLm" class="form-control-sm form-control" onchange="give_venue_2(this.value)" required>
                    <option hidden value="">Type</option>
                    <option <?php if($i2['1type_interview']=="Face 2 Face")echo'selected="true"'; ?> value="Face 2 Face">Face 2 Face</option>
                     <option <?php if($i2['1type_interview']=="Telephonic")echo'selected="true"'; ?>value="Telephonic">Telephonic </option>
                            <option <?php if($i2['1type_interview']=="Skype Video Call")echo'selected="true"'; ?> value="Skype Video Call">Skype Video Call</option>
                            <option <?php if($i2['1type_interview']=="What's APP Video Call")echo'selected="true"'; ?> value="What's APP Video Call">What's APP Video Call</option>
                             <option <?php if($i2['1type_interview']=="Zoom Video Call")echo'selected="true"'; ?> value="Zoom Video Call">Zoom Video Call</option>
                               </select>
                                                </div>
                                            </div>
                                             <div class="col-3">
                                                <div class="form-group">
                            <label for="selectSm" class=" form-control-label">Select venue </label>

                                                 <select name="venue" id="venue2" class="form-control-sm form-control" onchange=""  disabled="disabled">
                    <option hidden id="selvenue2" value="">Select venue </option>
     <option <?php if($i2['venue']=="Banglore")echo'selected="true"';  ?> value="Banglore">Banglore</option>
      <option <?php if($i2['venue']=="Pune")echo'selected="true"';  ?> value="Pune">Pune</option>
      <option <?php if($i2['venue']=="USA")echo'selected="true"';  ?> value="USA">USA</option>

                                               
                                            </select>
                                               </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                  
         <input type="radio"  for="selectSm" name="1attach_jd" value="no" id="jd_2" class=" form-control-label" onclick="test_2(this)" ><label for="JD">Attach JD</label><br>

                                           <select name="1type_jd" id="selectjd_2" class="form-control-sm form-control" onchange=""  disabled="disabled">
                    <option hidden id="default_2" value="">Select JD </option>
     <option <?php if($i2['1type_jd']=="dot net JD")echo'selected="true"'; ?> value="dot net JD">dot net JD</option>
      <option <?php if($i2['1type_jd']=="php developer JD")echo'selected="true"'; ?> value="php developer JD">php developer JD</option>
      <option <?php if($i2['1type_jd']=="JSP and servlet JD")echo'selected="true"'; ?> value="JSP and servlet JD">JSP and servlet JD</option>

                                               
                                            </select>
                                             </div>
                                         </div>

                                            <div class="col-12">
                                         <div class="form-group m-t-10">
                                        <button id="call_letter_2" onclick="" disabled="disabled" name="call_letter" type="submit" title="Attach JD before sending call- letter"  class="btn btn-primary btn-sm" >
                                            <i class="far fa-envelope"></i> Send interview call letter
                                        </button>
                                        <small class="form-text" style="color: green;"><?php if($i2['call_letter']=="yes"){ echo ' call letter has been sent successfully';} ?></small>

                                    </div>
                                </div>

                                 <div class="col-6">
                                         <div class="form-group m-t-10">
                                  <label for="selectSm" class=" form-control-label">Appeared For interview ?</label>
                                       
                                        <select title="send interview call letter first" name="1appeared_interview" id="appeared_2" class="form-control-sm form-control" onchange="change_source_2(this.value)"  <?php if($i2['call_letter']!="yes") echo 'disabled="disabled"'; ?> >
                    <option hidden id="default1_2" value="">select option </option>
                    <option <?php if($i2['1appeared_interview']=="yes")echo'selected="true"'; ?> value="yes">YES</option>
                     <option <?php if($i2['1appeared_interview']=="no")echo'selected="true"'; ?> value="no">NO</option>

                                               
                                            </select>
                                    </div>
                                </div>

                                <div class="col-6">
                                         <div class="form-group m-t-10">
                                 <label for="selectSm" class=" form-control-label">Shortlisted ?</label>

                                        <select name="1shortlisted" id="shortlisted_2" class="form-control-sm form-control" onchange="active_radio_button_2(this.value)"  disabled="disabled">
                    <option hidden id="default2_2" value="no">select option </option>
                            <option <?php if($i2['1shortlisted']=="yes")echo'selected="true"'; ?> value="yes">YES</option>
                             <option <?php if($i2['1shortlisted']=="no")echo'selected="true"'; ?> value="no">NO</option>
                             <option <?php if($i2['1shortlisted']=="hold")echo'selected="true"'; ?> value="hold">HOLD</option>

                                               
                                            </select>
                                    </div>
                                </div>

                                 <div class="col-6">
                                                <div class="form-group">
                                                    <label for="postal-code" class=" form-control-label">Interviwer Name</label>
                                           <input name="1interviwer_name" type="text" id="postal-code" value="<?php echo $i2['1interviwer_name']; ?>" class="form-control" required >
                                          
                                                </div>
                                            </div>
                                        </div>
                                            <div class="row">
                                            <div class="col-6">
                                                <div class="form-group m-t-10">
                                                  
         <input type="radio" <?php if($i2['1mark_final_round']=="yes")echo'checked="true"'; ?> disabled="disabled" for="selectSm" id="for_final_2" name="1mark_final_round" class="form-control-label" value="no" onclick="test1_2(this)" ><label for="JD">Mark as a final round</label><br>

         <input type="radio" <?php if($i2['1next_round']=="yes")echo'checked="true"'; ?> disabled="disabled" for="selectSm" id="next_round_2" name="1next_round" class=" form-control-label" value="no" onclick="test2_2(this)" ><label for="JD">Schedule Next Round</label><br>

                                                </div>
                                            </div>

                                             <div class="col-6">
                                         <div class="form-group ">
                                 <label for="selectSm" class=" form-control-label">Rejection reason ?</label>

                                        <select name="1rejection_reason" id="rejection_reason_2" class="form-control-sm form-control" onchange=" "  disabled="disabled" >
                    <option hidden id="default3_2" value="">select option </option>
                            <option <?php if($i2['1rejection_reason']=="HR Fittment (CTC)")echo'selected="true"'; ?> value="HR Fittment (CTC)">HR Fittment (CTC)</option>
                             <option <?php if($i2['1rejection_reason']=="Notice period")echo'selected="true"'; ?> value="Notice period">Notice period </option>
                             <option <?php if($i2['1rejection_reason']=="Technical rejection")echo'selected="true"'; ?> value="Technical rejection">Technical rejection</option>
                             <option <?php if($i2['1rejection_reason']=="Candidate not interested")echo'selected="true"'; ?> value="Candidate not interested">Candidate not interested</option>

                                               
                                            </select>
                                    </div>
                                </div>

                                  <div class="col-6">
                                                <div class="form-group m-t-10">
                                                  
                             <input type="radio" <?php if($i2['1cooling_period']=="yes")echo'checked="true"'; ?> disabled="disabled" for="selectSm" id="cooling_period_2" name="1cooling_period" class=" form-control-label"  value="no" onclick="test3_2(this)" ><label for="JD">Cooling period</label><br>

                             <input type="radio" <?php if($i2['1blacklist']=="yes")echo'checked="true"'; ?> disabled="disabled" for="selectSm" id="blacklist_2" name="1blacklist" class=" form-control-label" value=" " onclick="test4_2(this)" ><label for="JD">Blacklist</label><br>

                                                </div>
                                            </div>

                                 <div class="col-6">
                                         <div class="form-group ">
                                 <label for="selectSm" class=" form-control-label">Reason for Non-Appearance</label>

                                        <select name="1reason_non_appearance" id="non_apperance_reason_2" class="form-control-sm form-control" onchange=""  disabled="disabled">
                    <option hidden id="default4_2" value=" ">select option </option>
             <option <?php if($i2['1reason_non_appearance']=="no response")echo'selected="true"'; ?>  value="no response">No response</option>
            <option <?php if($i2['1reason_non_appearance']=="not interested")echo'selected="true"'; ?> value="not interested">Not interested </option>
            <option <?php if($i2['1reason_non_appearance']=="dropout")echo'selected="true"'; ?> value="dropout">DropOut</option>

                                               
                                            </select>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                        <button type="submit" class="btn btn-success btn-sm" >
                                            <i class="fa fa-dot-circle-o"></i> Save/Update
                                        </button>
                                        
                                    </div>



                                        </form>
                                    </div>
                                </div>
                            </div>


                            <!---------- 3 interview round --------->
 <div class="col-lg-12">
                        <div class="card " id="3rd_round" style="<?php if($i2['1next_round']=='yes')echo'display:block';else echo 'display: none'; ?>" >
                                    <div class="card-header">
                                        <strong>3rd Interview </strong> 
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="insert_interview3.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                           
                                            <div class="row form-group">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label  class=" form-control-label">3rd Interview Schedule / Reschedule
</label>
       <input name="1date" type="date" value="<?php echo $i3['1date']; ?>" id="city_3" class="form-control"  required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                  <label for="city" class=" form-control-label">Time </label><br>
                                 <input type="time" id="city" name="1time" value="<?php echo $i3['1time']; ?>" required>
                                               </div>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label for="selectSm" class=" form-control-label">Type </label>
                                           <select name="1type_interview" id="SelectLm" class="form-control-sm form-control" onchange="give_venue_3(this.value)" required>
                    <option hidden value="">Type</option>
                    <option <?php if($i3['1type_interview']=="Face 2 Face")echo'selected="true"'; ?> value="Face 2 Face">Face 2 Face</option>
                     <option <?php if($i3['1type_interview']=="Telephonic")echo'selected="true"'; ?>value="Telephonic">Telephonic </option>
                            <option <?php if($i3['1type_interview']=="Skype Video Call")echo'selected="true"'; ?> value="Skype Video Call">Skype Video Call</option>
                            <option <?php if($i3['1type_interview']=="What's APP Video Call")echo'selected="true"'; ?> value="What's APP Video Call">What's APP Video Call</option>
                             <option <?php if($i3['1type_interview']=="Zoom Video Call")echo'selected="true"'; ?> value="Zoom Video Call">Zoom Video Call</option>
                               </select>
                                                </div>
                                            </div>
                                             <div class="col-3">
                                                <div class="form-group">
                            <label for="selectSm" class=" form-control-label">Select venue </label>

                                                 <select name="venue" id="venue3" class="form-control-sm form-control" onchange=""  disabled="disabled">
                    <option hidden id="selvenue3" value="">Select venue </option>
     <option <?php if($i3['venue']=="Banglore")echo'selected="true"';  ?> value="Banglore">Banglore</option>
      <option <?php if($i3['venue']=="Pune")echo'selected="true"';  ?> value="Pune">Pune</option>
      <option <?php if($i3['venue']=="USA")echo'selected="true"';  ?> value="USA">USA</option>

                                               
                                            </select>
                                               </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                  
         <input type="radio"  for="selectSm" name="1attach_jd" value="no" id="jd_3" class=" form-control-label" onclick="test_3(this)" ><label for="JD">Attach JD</label><br>

                                           <select name="1type_jd" id="selectjd_3" class="form-control-sm form-control" onchange=""  disabled="disabled">
                    <option hidden id="default_3" value="">Select JD </option>
     <option <?php if($i3['1type_jd']=="dot net JD")echo'selected="true"'; ?> value="dot net JD">dot net JD</option>
      <option <?php if($i3['1type_jd']=="php developer JD")echo'selected="true"'; ?> value="php developer JD">php developer JD</option>
      <option <?php if($i3['1type_jd']=="JSP and servlet JD")echo'selected="true"'; ?> value="JSP and servlet JD">JSP and servlet JD</option>

                                               
                                            </select>
                                             </div>
                                         </div>

                                            <div class="col-12">
                                         <div class="form-group m-t-10">
                                   <button id="call_letter_3"  disabled="disabled" name="call_letter" title="Attach JD before sending call- letter" type="submit" class="btn btn-primary btn-sm" >
                                            <i class="far fa-envelope"></i> Send interview call letter
                                        </button>
                                        <small class="form-text" style="color: green;"><?php if($i3['call_letter']=="yes"){ echo ' call letter has been sent successfully';} ?></small>

                                    </div>
                                </div>

                                 <div class="col-6">
                                         <div class="form-group m-t-10">
                                  <label for="selectSm" class=" form-control-label">Appeared For interview ?</label>
                                       
                                        <select title="send interview call letter first" name="1appeared_interview" id="appeared_3" class="form-control-sm form-control" onchange="change_source_3(this.value)"  <?php if($i3['call_letter']!="yes") echo 'disabled="disabled"'; ?> >
                    <option hidden id="default1_3" value="">select option </option>
                    <option <?php if($i3['1appeared_interview']=="yes")echo'selected="true"'; ?> value="yes">YES</option>
                     <option <?php if($i3['1appeared_interview']=="no")echo'selected="true"'; ?> value="no">NO</option>

                                               
                                            </select>
                                    </div>
                                </div>

                                <div class="col-6">
                                         <div class="form-group m-t-10">
                                 <label for="selectSm" class=" form-control-label">Shortlisted ?</label>

                                        <select name="1shortlisted" id="shortlisted_3" class="form-control-sm form-control" onchange="active_radio_button_3(this.value)"  disabled="disabled">
                    <option hidden id="default2_3" value="no">select option </option>
                            <option <?php if($i3['1shortlisted']=="yes")echo'selected="true"'; ?> value="yes">YES</option>
                             <option <?php if($i3['1shortlisted']=="no")echo'selected="true"'; ?> value="no">NO</option>
                             <option <?php if($i3['1shortlisted']=="hold")echo'selected="true"'; ?> value="hold">HOLD</option>

                                               
                                            </select>
                                    </div>
                                </div>

                                 <div class="col-6">
                                                <div class="form-group">
                                                    <label for="postal-code" class=" form-control-label">Interviwer Name</label>
                                           <input name="1interviwer_name" type="text" id="postal-code" value="<?php echo $i3['1interviwer_name']; ?>" class="form-control" required >
                                          
                                                </div>
                                            </div>
                                        </div>
                                            <div class="row">
                                            <div class="col-6">
                                                <div class="form-group m-t-10">
                                                  
         <input type="radio" <?php if($i3['1mark_final_round']=="yes")echo'checked="true"'; ?> disabled="disabled" for="selectSm" id="for_final_3" name="1mark_final_round" class="form-control-label" value="no" onclick="test1_3(this)" ><label for="JD">Mark as a final round</label><br>

         <input type="radio" <?php if($i3['1next_round']=="yes")echo'checked="true"'; ?> disabled="disabled" for="selectSm" id="next_round_3" name="1next_round" class=" form-control-label" value="no" onclick="test2_3(this)" ><label for="JD">Schedule Next Round</label><br>

                                                </div>
                                            </div>

                                             <div class="col-6">
                                         <div class="form-group ">
                                 <label for="selectSm" class=" form-control-label">Rejection reason ?</label>

                                        <select name="1rejection_reason" id="rejection_reason_3" class="form-control-sm form-control" onchange=" "  disabled="disabled" >
                    <option hidden id="default3_3" value="">select option </option>
                            <option <?php if($i3['1rejection_reason']=="HR Fittment (CTC)")echo'selected="true"'; ?> value="HR Fittment (CTC)">HR Fittment (CTC)</option>
                             <option <?php if($i3['1rejection_reason']=="Notice period")echo'selected="true"'; ?> value="Notice period">Notice period </option>
                             <option <?php if($i3['1rejection_reason']=="Technical rejection")echo'selected="true"'; ?> value="Technical rejection">Technical rejection</option>
                             <option <?php if($i3['1rejection_reason']=="Candidate not interested")echo'selected="true"'; ?> value="Candidate not interested">Candidate not interested</option>

                                               
                                            </select>
                                    </div>
                                </div>

                                  <div class="col-6">
                                                <div class="form-group m-t-10">
                                                  
                             <input type="radio" <?php if($i3['1cooling_period']=="yes")echo'checked="true"'; ?> disabled="disabled" for="selectSm" id="cooling_period_3" name="1cooling_period" class=" form-control-label"  value="no" onclick="test3_3(this)" ><label for="JD">Cooling period</label><br>

                             <input type="radio" <?php if($i3['1blacklist']=="yes")echo'checked="true"'; ?> disabled="disabled" for="selectSm" id="blacklist_3" name="1blacklist" class=" form-control-label" value=" " onclick="test4_3(this)" ><label for="JD">Blacklist</label><br>

                                                </div>
                                            </div>

                                 <div class="col-6">
                                         <div class="form-group ">
                                 <label for="selectSm" class=" form-control-label">Reason for Non-Appearance</label>

                                        <select name="1reason_non_appearance" id="non_apperance_reason_3" class="form-control-sm form-control" onchange=""  disabled="disabled">
                    <option hidden id="default4_3" value=" ">select option </option>
             <option <?php if($i3['1reason_non_appearance']=="no response")echo'selected="true"'; ?>  value="no response">No response</option>
            <option <?php if($i3['1reason_non_appearance']=="not interested")echo'selected="true"'; ?> value="not interested">Not interested </option>
            <option <?php if($i3['1reason_non_appearance']=="dropout")echo'selected="true"'; ?> value="dropout">DropOut</option>

                                               
                                            </select>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                        <button type="submit" class="btn btn-success btn-sm" >
                                            <i class="fa fa-dot-circle-o"></i> Save/Update
                                        </button>
                                        
                                    </div>



                                        </form>
                                    </div>
                                </div>
                            </div>



                                      <!---------- 4th i.e final interview round --------->



                                                        <div class="col-lg-12">
                        <div class="card " id="4th_round" style="<?php if($i3['1next_round']=='yes')echo'display:block';else echo 'display: none'; ?>" >
                                    <div class="card-header">
                                        <strong>Final Interview </strong> 
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="insert_interview4.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                           
                                            <div class="row form-group">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label  class=" form-control-label">Final Interview Schedule / Reschedule
</label>
       <input name="1date" type="date" value="<?php echo $i4['1date']; ?>" id="city_4" class="form-control"  required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                  <label for="city" class=" form-control-label">Time </label><br>
                                 <input type="time" id="city" name="1time" value="<?php echo $i4['1time']; ?>" required>
                                               </div>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label for="selectSm" class=" form-control-label">Type </label>
                                           <select name="1type_interview" id="SelectLm" class="form-control-sm form-control" onchange="give_venue_4(this.value)" required>
                    <option hidden value="">Type</option>
                    <option <?php if($i4['1type_interview']=="Face 2 Face")echo'selected="true"'; ?> value="Face 2 Face">Face 2 Face</option>
                     <option <?php if($i4['1type_interview']=="Telephonic")echo'selected="true"'; ?>value="Telephonic">Telephonic </option>
                            <option <?php if($i4['1type_interview']=="Skype Video Call")echo'selected="true"'; ?> value="Skype Video Call">Skype Video Call</option>
                            <option <?php if($i4['1type_interview']=="What's APP Video Call")echo'selected="true"'; ?> value="What's APP Video Call">What's APP Video Call</option>
                             <option <?php if($i4['1type_interview']=="Zoom Video Call")echo'selected="true"'; ?> value="Zoom Video Call">Zoom Video Call</option>
                               </select>
                                                </div>
                                            </div>
                                             <div class="col-3">
                                                <div class="form-group">
                            <label for="selectSm" class=" form-control-label">Select venue </label>

                                                 <select name="venue" id="venue4" class="form-control-sm form-control" onchange=""  disabled="disabled">
                    <option hidden id="selvenue4" value="">Select venue </option>
     <option <?php if($i4['venue']=="Banglore")echo'selected="true"';  ?> value="Banglore">Banglore</option>
      <option <?php if($i4['venue']=="Pune")echo'selected="true"';  ?> value="Pune">Pune</option>
      <option <?php if($i4['venue']=="USA")echo'selected="true"';  ?> value="USA">USA</option>

                                               
                                            </select>
                                               </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                  
         <input type="radio"  for="selectSm" name="1attach_jd" value="no" id="jd_4" class=" form-control-label" onclick="test_4(this)" ><label for="JD">Attach JD</label><br>

                                           <select name="1type_jd" id="selectjd_4" class="form-control-sm form-control" onchange=""  disabled="disabled">
                    <option hidden id="default_4" value="">Select JD </option>
     <option <?php if($i4['1type_jd']=="dot net JD")echo'selected="true"'; ?> value="dot net JD">dot net JD</option>
      <option <?php if($i4['1type_jd']=="php developer JD")echo'selected="true"'; ?> value="php developer JD">php developer JD</option>
      <option <?php if($i4['1type_jd']=="JSP and servlet JD")echo'selected="true"'; ?> value="JSP and servlet JD">JSP and servlet JD</option>

                                               
                                            </select>
                                             </div>
                                         </div>

                                            <div class="col-12">
                                         <div class="form-group m-t-10">
                                        <button id="call_letter_4" disabled="disabled" name="call_letter" title="Attach JD before sending call- letter" type="submit" class="btn btn-primary btn-sm" >
                                            <i class="far fa-envelope"></i> Send interview call letter
                                        </button>
                                        <small class="form-text" style="color: green;"><?php if($i4['call_letter']=="yes"){ echo ' call letter has been sent successfully';} ?></small>
                                    </div>
                                </div>

                                 <div class="col-6">
                                         <div class="form-group m-t-10">
                                  <label for="selectSm" class=" form-control-label">Appeared For interview ?</label>
                                       
                                        <select title="send interview call letter first" name="1appeared_interview" id="appeared_4" class="form-control-sm form-control" onchange="change_source_4(this.value)"  <?php if($i4['call_letter']!="yes") echo 'disabled="disabled"'; ?> >
                    <option hidden id="default1_4" value="">select option </option>
                    <option <?php if($i4['1appeared_interview']=="yes")echo'selected="true"'; ?> value="yes">YES</option>
                     <option <?php if($i4['1appeared_interview']=="no")echo'selected="true"'; ?> value="no">NO</option>

                                               
                                            </select>
                                    </div>
                                </div>

                                <div class="col-6">
                                         <div class="form-group m-t-10">
                                 <label for="selectSm" class=" form-control-label">Shortlisted ?</label>

                                        <select name="1shortlisted" id="shortlisted_4" class="form-control-sm form-control" onchange="active_radio_button_4(this.value)"  disabled="disabled">
                    <option hidden id="default2_4" value="no">select option </option>
                            <option <?php if($i4['1shortlisted']=="yes")echo'selected="true"'; ?> value="yes">YES</option>
                             <option <?php if($i4['1shortlisted']=="no")echo'selected="true"'; ?> value="no">NO</option>
                             <option <?php if($i4['1shortlisted']=="hold")echo'selected="true"'; ?> value="hold">HOLD</option>

                                               
                                            </select>
                                    </div>
                                </div>



                                 <div class="col-6">
                                                <div class="form-group">
                                                    <label for="postal-code" class=" form-control-label">Interviwer Name</label>
                                           <input name="1interviwer_name" type="text" id="postal-code" value="<?php echo $i4['1interviwer_name']; ?>" class="form-control" required >
                                          
                                                </div>
                                            </div>
                                        </div>
                                            <div class="row">
                                            <div class="col-6">
                                                <div class="form-group m-t-10">
                                                  
         <input type="radio" <?php if($i4['1mark_final_round']=="yes")echo'checked="true"'; ?> disabled="disabled" for="selectSm" id="for_final_4" name="1mark_final_round" class="form-control-label" value="no" onclick="test1_4(this)" ><label for="JD">Mark as a final round</label><br>

         <input type="radio" <?php if($i4['1next_round']=="yes")echo'checked="true"'; ?> disabled="disabled" for="selectSm" id="next_round_4" name="1next_round" class=" form-control-label" value="no" onclick="test2_4(this)" ><label for="JD">Schedule Next Round</label><br>

                                                </div>
                                            </div>

                                             <div class="col-6">
                                         <div class="form-group ">
                                 <label for="selectSm" class=" form-control-label">Rejection reason ?</label>

                                        <select name="1rejection_reason" id="rejection_reason_4" class="form-control-sm form-control" onchange=" "  disabled="disabled" >
                    <option hidden id="default3_4" value="">select option </option>
                            <option <?php if($i4['1rejection_reason']=="HR Fittment (CTC)")echo'selected="true"'; ?> value="HR Fittment (CTC)">HR Fittment (CTC)</option>
                             <option <?php if($i4['1rejection_reason']=="Notice period")echo'selected="true"'; ?> value="Notice period">Notice period </option>
                             <option <?php if($i4['1rejection_reason']=="Technical rejection")echo'selected="true"'; ?> value="Technical rejection">Technical rejection</option>
                             <option <?php if($i4['1rejection_reason']=="Candidate not interested")echo'selected="true"'; ?> value="Candidate not interested">Candidate not interested</option>

                                               
                                            </select>
                                    </div>
                                </div>

                                  <div class="col-6">
                                                <div class="form-group m-t-10">
                                                  
                             <input type="radio" <?php if($i4['1cooling_period']=="yes")echo'checked="true"'; ?> disabled="disabled" for="selectSm" id="cooling_period_4" name="1cooling_period" class=" form-control-label"  value="no" onclick="test3_4(this)" ><label for="JD">Cooling period</label><br>

                             <input type="radio" <?php if($i4['1blacklist']=="yes")echo'checked="true"'; ?> disabled="disabled" for="selectSm" id="blacklist_4" name="1blacklist" class=" form-control-label" value=" " onclick="test4_4(this)" ><label for="JD">Blacklist</label><br>

                                                </div>
                                            </div>

                                 <div class="col-6">
                                         <div class="form-group ">
                                 <label for="selectSm" class=" form-control-label">Reason for Non-Appearance</label>

                                        <select name="1reason_non_appearance" id="non_apperance_reason_4" class="form-control-sm form-control" onchange=""  disabled="disabled">
                    <option hidden id="default4_4" value=" ">select option </option>
             <option <?php if($i4['1reason_non_appearance']=="no response")echo'selected="true"'; ?>  value="no response">No response</option>
            <option <?php if($i4['1reason_non_appearance']=="not interested")echo'selected="true"'; ?> value="not interested">Not interested </option>
            <option <?php if($i4['1reason_non_appearance']=="dropout")echo'selected="true"'; ?> value="dropout">DropOut</option>

                                               
                                            </select>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                        <button type="submit" class="btn btn-success btn-sm" >
                                            <i class="fa fa-dot-circle-o"></i> Save/Update
                                        </button>
                                        
                                    </div>



                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-------end of final interview ------->


                             <div class="col-12 text-center">
                                    <a href='insert_interview4.php?move=true'><button class="btn btn-info btn-sm" >
                                            <i class="fa fa-dot-circle-o"></i> Next
                                        </button></a>
                                        
                                    </div>

</div>
</div>
</div>
</div>