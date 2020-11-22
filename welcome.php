<?php
   include('session.php');


   $query =" SELECT * FROM contact_table WHERE fk ='$id' ";
       $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
      $result = mysqli_fetch_array($ssql,MYSQLI_ASSOC);    

   

    $query =" SELECT * FROM employment_table WHERE fk ='$id' ";
       $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
      $result1 = mysqli_fetch_array($ssql,MYSQLI_ASSOC);

      $query =" SELECT * FROM sourcing WHERE fk ='$id' ";
       $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
      $result2 = mysqli_fetch_array($ssql,MYSQLI_ASSOC);

      $query =" SELECT * FROM Candidate_info WHERE fk ='$id' ";
       $ssql = mysqli_query($db,$query) or die( mysqli_error($db));
      $result3 = mysqli_fetch_array($ssql,MYSQLI_ASSOC);





?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">


<script type="text/javascript">
	


function change_source(value) {
if(value== 1)
	{
		 $("#Consultant").prop('readonly', false);
		 $("#Campus").prop('readonly', true);
		 $("#Others").prop('readonly', true);

		
		document.getElementById("Campus").value = " ";
		document.getElementById("Others").value = " ";
	}
if(value== 2)
	{
				 $("#Consultant").prop('readonly', true);
				 $("#Campus").prop('readonly', false);
		 		 $("#Others").prop('readonly', true);

		
		document.getElementById("Consultant").value = " ";
		document.getElementById("Others").value = " ";


	}
if(value== 3)
	{
		$("#Consultant").prop('readonly', true);
		$("#Campus").prop('readonly', true);
		$("#Others").prop('readonly', false);

		document.getElementById("Consultant").value = " ";
		document.getElementById("Campus").value = " ";
	}
}





</script>



</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="images/icon/vidushi_logo.png" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="welcome.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                          
                        </li>
                         <li>
                            <a href="chart.html">
                                <i class="fas fa-chart-bar"></i>Charts</a>
                        </li>
                        <li>
                            <a href="table.html">
                                <i class="fas fa-table"></i>Tables</a>
                        </li>
                        <li>
                            <a href="form.html">
                                <i class="far fa-check-square"></i>Forms</a>
                        </li>
                        <li>
                            <a href="calendar.html">
                                <i class="fas fa-calendar-alt"></i>Calendar</a>
                        </li>
                        <li>
                            <a href="map.html">
                                <i class="fas fa-map-marker-alt"></i>Maps</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Pages</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="login.html">Login</a>
                                </li>
                                <li>
                                    <a href="register.html">Register</a>
                                </li>
                                <li>
                                    <a href="forget-pass.html">Forget Password</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-desktop"></i>UI Elements</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="button.html">Button</a>
                                </li>
                                <li>
                                    <a href="badge.html">Badges</a>
                                </li>
                                <li>
                                    <a href="tab.html">Tabs</a>
                                </li>
                                <li>
                                    <a href="card.html">Cards</a>
                                </li>
                                <li>
                                    <a href="alert.html">Alerts</a>
                                </li>
                                <li>
                                    <a href="progress-bar.html">Progress Bars</a>
                                </li>
                                <li>
                                    <a href="modal.html">Modals</a>
                                </li>
                                <li>
                                    <a href="switch.html">Switchs</a>
                                </li>
                                <li>
                                    <a href="grid.html">Grids</a>
                                </li>
                                <li>
                                    <a href="fontawesome.html">Fontawesome Icon</a>
                                </li>
                                <li>
                                    <a href="typo.html">Typography</a>
                                </li>
                            </ul>
                        </li> 
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="images/icon/vidushi_logo.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            
                        </li>
                        <li>
                            <a href="chart.html">
                                <i class="fas fa-chart-bar"></i>Charts</a>
                        </li>
                        <li>
                            <a href="table.html">
                                <i class="fas fa-table"></i>Tables</a>
                        </li>
                        <li>
                            <a href="form.html">
                                <i class="far fa-check-square"></i>Forms</a>
                        </li>
                        <li>
                            <a href="calendar.html">
                                <i class="fas fa-calendar-alt"></i>Calendar</a>
                        </li>
                        <li>
                            <a href="map.html">
                                <i class="fas fa-map-marker-alt"></i>Maps</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Pages</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="login.html">Login</a>
                                </li>
                                <li>
                                    <a href="register.html">Register</a>
                                </li>
                                <li>
                                    <a href="forget-pass.html">Forget Password</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-desktop"></i>UI Elements</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="button.html">Button</a>
                                </li>
                                <li>
                                    <a href="badge.html">Badges</a>
                                </li>
                                <li>
                                    <a href="tab.html">Tabs</a>
                                </li>
                                <li>
                                    <a href="card.html">Cards</a>
                                </li>
                                <li>
                                    <a href="alert.html">Alerts</a>
                                </li>
                                <li>
                                    <a href="progress-bar.html">Progress Bars</a>
                                </li>
                                <li>
                                    <a href="modal.html">Modals</a>
                                </li>
                                <li>
                                    <a href="switch.html">Switchs</a>
                                </li>
                                <li>
                                    <a href="grid.html">Grids</a>
                                </li>
                                <li>
                                    <a href="fontawesome.html">Fontawesome Icon</a>
                                </li>
                                <li>
                                    <a href="typo.html">Typography</a>
                                </li>
                            </ul>
                        </li> 
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid" style="align-items: right;">
                        <div class="header-wrap" style="align-items: right;">
                           <!--  <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form> -->
                            <div class="header-button">
                                <!-- <div class="noti-wrap">
                                    
                                   
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-notifications"></i>
                                        <span class="quantity">3</span>
                                        <div class="notifi-dropdown js-dropdown">
                                            <div class="notifi__title">
                                                <p>You have 3 Notifications</p>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c1 img-cir img-40">
                                                    <i class="zmdi zmdi-email-open"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a email notification</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c2 img-cir img-40">
                                                    <i class="zmdi zmdi-account-box"></i>
                                                </div>
                                                <div class="content">
                                                    <p>Your account has been blocked</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c3 img-cir img-40">
                                                    <i class="zmdi zmdi-file-text"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a new file</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__footer">
                                                <a href="#">All notifications</a>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="account-wrap ">
                                    <div class="account-item  js-item-menu">
                                        <!-- <div class="image">
                                            <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                        </div> -->
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><?php echo $login_session; ?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <!-- <div class="image">
                                                    <a href="#">
                                                        <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                                    </a>
                                                </div> -->
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"><?php echo $login_session; ?></a>
                                                    </h5>
                                                    <span class="email">johndoe@example.com</span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-settings"></i>Setting</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-money-box"></i>Billing</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="logout.php">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
<section class="welcome2 p-t-30 p-b-10">
            <div class="container">
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="welcome2-inner m-t-60">
                            <div class="welcome2-greeting">
                                <h1 class="title-6">
                                   Congratulations for your selection , Kindly fill your details below</h1>
                                False details may lead to the rejection of your candidature
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>



            <div class="main-content">
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
                        <div class="row">

                        	<div class="col-lg-12">
                                <div class="card">
                                 <form action="insert_sourcing.php" method="POST" enctype="multipart/form-data" class="form-horizontal" onsubmit="return Sourcing_done()">

                                    <div class="card-header">
                                        <strong>Sourcing details</strong>
                                    </div>
                                    <div class="card-body card-block">
                                    	 <div class="row form-group">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Candidate Profile No.</label>
                                                     <input name="profile_no" type="text" id="city" value="<?php echo htmlspecialchars( $id); ?> " class="form-control" readonly>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="postal-code" class=" form-control-label">Profile Creation date</label>
                                            <input name="profile_create_date" type="date" id="postal-code" 
    value="<?php if($result2['profile_date']==' ') echo date("Y-m-d"); else echo $result2['profile_date'] ?>" class="form-control" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Recruiter's Name</label>
                                            <input name="name" type="text" id="company" value="" class="form-control" >
                                        </div>
                                         <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="selectSm" class=" form-control-label">Source</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="source" id="SelectLm" class="form-control-sm form-control" onchange="change_source(this.value)" required>
                                                        <option selected hidden value="">Please select</option>
                                                  		<option value="1"> Consultant</option>
                                                        <option value="2">Campus</option>
                                                        <option value="3">Others</option>
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                            <div class="col-8">

                                        <div class="form-group">
                                            <label for="vat" class=" form-control-label">Consultant name</label>
                            <input name="consultant" type="text" id="Consultant" value="<?php echo $result2['consultant_source']; ?>" placeholder="" class="form-control" readonly="true" required>
                                        </div>
                                    		</div>

                                             <div class="col-8">
                                        <div class="form-group">
                                            <label for="street" class=" form-control-label">Campus name</label>
                                            <input name="campus" type="text" id="Campus" value="<?php echo $result2['campus_source']; ?>" placeholder="" class="form-control" readonly="true" required>
                                        </div>
                                    		</div>
                                        
                                            <div class="col-8">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Others</label>
                                                    <input name="others" type="text" id="Others" value="<?php echo $result2['other_source']; ?>" placeholder="" class="form-control" readonly="true" required>
                                                </div>
                                            </div>
                                          
                                        </div>
                                        
                                    </div>
                                     <div class="card-footer">
                                        <button type="submit" class="btn btn-success btn-sm" >
                                            <i class="fa fa-dot-circle-o"></i> Save
                                        </button>
                                        <button type="submit" class="btn btn-info btn-sm" >
                                            <i class="fa fa-dot-circle-o"></i> update
                                        </button>
                                    </div>
                                </form>
                                </div>
                                
                            </div>


<!---------personel form--------------->


                            <div class="col-lg-12">
                                <div class="card " id="Candidate-info"  >
                                    <div class="card-header">
                                        <strong>Candidate Information</strong> 
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="insert_details.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                           
                                            <div class="row form-group">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Candidate First Name</label>
                                                     <input name="firstname" type="text" id="city" value="<?php echo $result3['first_name']  ?>" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="postal-code" class=" form-control-label">Last Name</label>
                                 <input name="lastname" type="text" id="postal-code" value="<?php echo $result3['last_name']  ?>" class="form-control" required >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Date of birth</label>
                                                     <input name="dob" type="date" id="city" value="<?php echo $result3['dob']  ?>" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="postal-code" class=" form-control-label">Gender</label>
                                           <input name="gender" type="text" id="postal-code" value="<?php echo $result3['gender']  ?>" class="form-control" required >
                                               <small class="form-text text-muted">Write M/F/Other</small>
                                          
                                                </div>
                                            </div>
                                              <div class="col-8">
                                                <div class="form-group">
                                     <label for="postal-code" class=" form-control-label">Aadhar Card</label>
                                    <input name="aadharcard" maxlength="12" pattern="[0-9]{12}" title="  E.g. 123412341234" type="text" id="postal-code" value="<?php echo $result3['adhar']  ?>" placeholder="123412341234" class="form-control" required >

                                          
                                                </div>
                                            </div>
                                              <div class="col-8">
                                                <div class="form-group">
                                                    <label for="postal-code" class=" form-control-label">Pan Card</label>
                                           <input name="pancard" maxlength="10" pattern="[a-zA-Z]{5}[0-9]{4}[a-zA-Z]{1}" type="text" id="postal-code" value="<?php echo $result3['pan']  ?>" title=" E.g. AAAAA9999A" placeholder="AAAAA9999A" class="form-control" required >
                                          
                                                </div>
                                            </div>
                                        
                                              <div class="col-12 col-md-8">
                                             <div class=" form-group">    
                                                    <label for="postal-code" class=" form-control-label">Technology Domain</label>

                                                    <select name="tech-domain" id="SelectLm"  value="<?php echo $result3['technology']  ?>" class="form-control-sm form-control"  required>
                                                        <option selected hidden value="">Please select</option>
                                                        <option value="1"> php developer</option>
                                                        <option value="2">these values will come from database table </option>
                                                        <option value="3">Others</option>
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                        <button type="submit" class="btn btn-success btn-sm" >
                                            <i class="fa fa-dot-circle-o"></i> Save
                                        </button>
                                        <button type="submit" class="btn btn-info btn-sm" >
                                            <i class="fa fa-dot-circle-o"></i> update
                                        </button>
                                    </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
<!----------contact form----------->

 							<div class="col-lg-12">
                                <div class="card " id="Candidate-info" >
                                    <div class="card-header">
                                        <strong>Contact Details</strong> 
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="insert_contact.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                           
                                            <div class="row form-group">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Mobile No.</label>
                                                <input name="mobile" type="text" id="city" value=" <?php echo $result['mobile']; ?> 
                                                     " class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="postal-code" class=" form-control-label">Alternate Mobile No.</label>
                                           <input name="alter_mobile" type="text" id="postal-code" value="<?php echo $result['alter_mobile']  ?>" class="form-control" required >
                                               <small class="form-text text-muted">Write NA if not available</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Email</label>
                                                     <input name="email" type="email" id="city" value="<?php echo $result['email'] ?>" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="postal-code" class=" form-control-label">Alternate Email</label>
                                           <input name="alter_email" type="text" id="postal-code" value="<?php echo $result['alter_email'] ?>" class="form-control" required >
                                               <small class="form-text text-muted">Write NA if not available</small>
                                          
                                                </div>
                                            </div>
                                        
                                         
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="postal-code" class=" form-control-label">Skype</label>
                                           <input name="skype" type="text" id="postal-code" value="<?php echo $result['skype'] ?>" class="form-control" required >
                                               <small class="form-text text-muted">Write NA if not available</small>

                                               </div> 
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                        <button type="submit" onclick="Sourcing_done()" class="btn btn-success btn-sm" >
                                            <i class="fa fa-dot-circle-o"></i> Save
                                        </button>
                                        <button type="submit" class="btn btn-info btn-sm" >
                                            <i class="fa fa-dot-circle-o"></i> update
                                        </button>
                                    </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

<!----------contact form----------->


<!----------employment form----------->
<div class="col-lg-12">
                                <div class="card " id="emp-info"  >
                                    <div class="card-header">
                                        <strong>Employment Details</strong> 
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="insert_employment.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                           
                                            <div class="row form-group">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Total Experience</label>
                                            <input name="tot_exp" type="text" id="city" value="<?php echo $result1['tot_exp'] ?>" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="postal-code" class=" form-control-label">Relevant Experience</label>
                                           <input name="rel_exp" type="text" id="postal-code" value="<?php echo $result1['rel_exp'] ?>" class="form-control" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Current Location</label>
                                                     <input name="curr_location" type="text" id="city" value="<?php echo $result1['curr_location'] ?>" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="postal-code" class=" form-control-label">Current company</label>
                                           <input name="curr_company" type="text" id="postal-code" value="<?php echo $result1['curr_company'] ?>" class="form-control" >
                                          
                                                </div>
                                            </div>
                                        
                                         
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="postal-code" class=" form-control-label">Current CTC</label>
                                           <input name="curr_ctc" type="text" id="postal-code" value="<?php echo $result1['curr_ctc'] ?>" class="form-control" >

                                               </div> 
                                            </div>
                                             <div class="col-6">
                                                <div class="form-group">
                                                    <label for="postal-code" class=" form-control-label">Expected CTC</label>
                                           <input name="exp_ctc" type="text" id="postal-code" value="<?php echo $result1['exp_ctc'] ?>" class="form-control" >

                                               </div> 
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="postal-code" class=" form-control-label">CTC Negoatiable </label>
                                           <input name="ctc_neg" type="text" id="postal-code" value="<?php echo $result1['ctc_neg'] ?>" class="form-control" >
                                               <small class="form-text text-muted">yes or no</small>

                                              </div> 
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="postal-code" class=" form-control-label">Negoatiable Upto</label>
                                           <input name="neg_upto" type="text" id="postal-code" value="<?php echo $result1['neg_upto'] ?>" class="form-control" >
                                               <small class="form-text text-muted">If yes else NA</small>

                                               </div> 
                                            </div>
                                             <div class="col-6">
                                                <div class="form-group">
                                                    <label for="postal-code" class=" form-control-label">Notice Period</label>
                                           <input name="notice_period" type="text" id="postal-code" value="<?php echo $result1['notice_period'] ?>" class="form-control" >

                                               </div> 
                                            </div>
                                             <div class="col-6">
                                                <div class="form-group">
                                                    <label for="postal-code" class=" form-control-label">Joining Period</label>
                                           <input name="joining_period" type="text" id="postal-code" value="<?php echo $result1['joining_period'] ?>" class="form-control" >

                                               </div> 
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Reason for Job Change</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea name="reason_job_change" type="text" value ="<?php echo $result1['reason_job_change'] ?>" id="textarea-input" rows="5" placeholder="Content..." class="form-control"><?php echo $result1['reason_job_change'] ?></textarea>
                                                </div>
                                            </div>
                                        <div class="card-footer">
                                        <button type="submit" class="btn btn-success btn-sm" >
                                            <i class="fa fa-dot-circle-o"></i> Save
                                        </button>
                                        <button type="submit" class="btn btn-info btn-sm" >
                                            <i class="fa fa-dot-circle-o"></i> update
                                        </button>
                                    </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

<!----------employment form----------->

              <!-------resume field-------------->

								<div class="col-lg-12">
                                <div class="card " id="Candidate-info" >
                                    <div class="card-header">
                                        <strong>Upload resume</strong> 
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="upload.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                          <div class="row form-group">
                                                <div class="col-6 ">
                                         		<div class="form-group">

                                                    <input type="file" name="file" class="form-control-file" accept="application/pdf" >
                                                </div>
                                            </div>
                                                <div class="col-6">
                                                <div class="form-group">
                                                    <label for="postal-code" class=" form-control-label">Upload date</label>
                                         <input name="profile_create_date" type="text" id="postal-code" value="<?php echo date("Y-m-d");?>" class="form-control" readonly>

                                               </div>  
                                            </div>
                                            </div>
                                             <div class="card-footer">
                                           <button type="submit" name="submit" class="btn btn-success btn-sm" >
                                            <i class="fa fa-dot-circle-o"></i> Submit
                                        </button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                         
              <!-------resume field-------------->

               
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->
