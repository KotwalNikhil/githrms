
<?php 
include("session.php");

if(!isset($_SESSION['login_user'])){
    header("location:login.php");
}
else if ($_SESSION['type'] !=3){
   header("location:login.php");
}
else if ($_SESSION['type'] ==1){
   header("location: candidate_information.php");
}
else if ($_SESSION['type'] ==2){
  header("location: sourcing_form.php");

}

else{
  $myusername = $_SESSION['login_user'];
}


// for skip request
$skip_query =" SELECT * FROM hr_offer_letter_validation ";
      $ssql = mysqli_query($db,$skip_query) or die( mysqli_error($db));
            $skip_result = mysqli_fetch_array($ssql,MYSQLI_ASSOC);
     $skip_rnum = $ssql->num_rows;

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

    <!-- Title Page-->
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




</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="images/icon/vidushi_logo.png" alt="vidushi_logo" />
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
                            <a class="js-arrow" href="welcomehr.php">
                          <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                          
                        </li>
                          <li>
                            <a href="hr_validation_offer_letter.php">
                                <i class="fas fa-bell"></i>Offer letter validation request (<?php echo $skip_rnum; ?>)</a>
                        </li>
                        <li>
                            <a href="extra_details.php">
                                <i class="fas fa-address-card"></i>Extra details of Employees</a>
                        </li>
                        <li>
                            <a href="skip_request.php">
                                <i class="fas fa-code-branch"></i>skip requests</a>

                        </li>
                        </li>
                            <li>
                            <a href="hr_validation_cand_form.php">
                                <i class="fas fa-check"></i>candidate form validation request</a>
                        </li>
                         
                        <li>
                            <a href="#">
                                <i class="fa fa-area-chart"></i>Snapshot</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-table"></i>Org Chart</a>
                        </li>
                        
                        <li>
                            <a href="emp_database.php">
                                <i class="far fa-address-card"></i>Employee database</a>
                        </li>
                        <li>
                            <a href="add_emp.php">
                                <i class="fas fa-plus"></i>Add Recuriter</a>
                        </li>
                        <li>
                            <a href="add_tech_domain.php">
                                <i class="fas fa-table"></i>Add Tech. Domains</a>
                        </li>
                        <li>
                            <a href="head_count_report.php">
                                <i class="far fa-check-square"></i>Head Count Report</a>
                        </li>
                        <li>
                            <a href="calendar.html">
                                <i class="fas fa-calendar-alt"></i>Skill Matrix</a>
                        </li>
                        <li>
                            <a href="map.html">
                                <i class="fas fa-map-marker-alt"></i>Learning Calendar</a>
                        </li>
                        <li>
                            <a href="training_form.php">
                                <i class="fas fa-map-marker-alt"></i>Training Details</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa fa-angle-down"></i>Competency</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="login.html">Competency-Open Source</a>
                                </li>
                                <li>
                                    <a href="register.html">Competency-BE_.NET_E-fusion</a>
                                </li>
                                
                            </ul>
                        </li>
                        <li>
                            <a href="compensation_form.php">
                                <i class="fas fa-chart-bar"></i>Compensation</a>
                        </li>
                        <li>
                            <a href="confirmation_form.php">
                                <i class="fas fa-chart-bar"></i>Confirmations</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-chart-bar"></i>Absenteeism Rate</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-address-card"></i>Employee Request</a>
                        </li>
                         <li>
                            <a href="#">
                                <i class="fas fa-chart-bar"></i>Attrition - Organisational Level</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-chart-bar"></i>F & F Settlements</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-chart-bar"></i>Stautory & Legal</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-chart-bar"></i>Recruitments</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa fa-angle-down"></i>HR Master</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="button.html">HR Format Master</a>
                                </li>
                                <li>
                                    <a href="badge.html">HR  Policy Master</a>
                                </li>
                                <li>
                                    <a href="tab.html">HR Meetings</a>
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
                    <img src="images/icon/vidushi_logo1.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class=" has-sub">
                            <a class="js-arrow" href="welcomehr.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            
                        </li>
                          <li>
                            <a href="hr_validation_offer_letter.php">
                                <i  class="fas fa-bell"></i>Offer letter validation request (<?php echo $skip_rnum; ?>)</a>
                        </li>
                        <li>
                            <a href="extra_details.php">
                                <i class="fas fa-address-card"></i>Extra details of Employees</a>
                        </li>
                        <li>
                            <a href="skip_request.php">
                                <i class="fas fa-code-branch"></i>skip requests</a>

                        </li>
                        </li>
                            <li>
                            <a href="hr_validation_cand_form.php">
                                <i class="fas fa-check"></i>candidate form validation request</a>
                        </li>
                      
                        <li>
                            <a href="#">
                                <i class="fa fa-area-chart"></i>Snapshot</a>

                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-table"></i>Org Chart</a>
                        </li>
                        
                        <li>
                            <a href="emp_database.php">
                                <i class="far fa-address-card"></i>Employee database</a>
                        </li>
                        <li>
                            <a href="add_emp.php">
                                <i class="fas fa-plus"></i>Add recuriter</a>

                        </li>
                        <li>
                            <a href="add_tech_domain.php">
                                <i class="fas fa-table"></i>Add Tech. Domains</a>
                        </li>
                        <li>
                            <a href="head_count_report.php">
                                <i class="far fa-check-square"></i>Head Count Report</a>
                        </li>
                        <li>
                            <a href="calendar.html">
                                <i class="fas fa-calendar-alt"></i>Skill Matrix</a>
                        </li>
                        <li>
                            <a href="map.html">
                                <i class="fas fa-map-marker-alt"></i>Learning Calendar</a>
                        </li>
                        <li>
                            <a href="training_form.php">
                                <i class="fas fa-map-marker-alt"></i>Training Details</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa fa-angle-down"></i>Competency</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="login.html">Competency-Open Source</a>
                                </li>
                                <li>
                                    <a href="register.html">Competency-BE_.NET_E-fusion</a>
                                </li>
                                
                            </ul>
                        </li>
                        <li>
                            <a href="compensation_form.php">
                                <i class="fas fa-chart-bar"></i>Compensation</a>
                        </li>
                        <li>
                            <a href="confirmation_form.php">
                                <i class="fas fa-chart-bar"></i>Confirmations</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-chart-bar"></i>Absenteeism Rate</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-address-card"></i>Employee Request</a>
                        </li>
                         <li>
                            <a href="#">
                                <i class="fas fa-chart-bar"></i>Attrition - Organisational Level</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-chart-bar"></i>F & F Settlements</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-chart-bar"></i>Stautory & Legal</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-chart-bar"></i>Recruitments</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa fa-angle-down"></i>HR Master</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="button.html">HR Format Master</a>
                                </li>
                                <li>
                                    <a href="badge.html">HR  Policy Master</a>
                                </li>
                                <li>
                                    <a href="tab.html">HR Meetings</a>
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
                    <div class="container-fluid">
                        <div class="header-wrap_hr">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search by name or technology" />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button" style="float:right;right:0">
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
                                <div class="account-wrap " >
                                    <div class="account-item clearfix js-item-menu">
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
                                            <!-- <div class="account-dropdown__body">
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
                                            </div> -->
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
                      
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->

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
