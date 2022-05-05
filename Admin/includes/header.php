<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <title>
  <?php echo TITLE ?>
 </title>
 <!-- Bootstrap CSS -->
 <link rel="stylesheet" href="../css/bootstrap.min.css">
<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link
  href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
  rel="stylesheet"
/>
  
<!-- Core CSS -->
<link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
<link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
<link rel="stylesheet" href="../assets/css/demo.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">


<!-- Vendors CSS -->
<link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
<link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

<link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />

<!-- Page CSS -->
<style>
  input[readonly] {background-color: white !important;}

</style>
<!-- Helpers -->
<script src="../assets/vendor/js/helpers.js"></script>
<script src="../assets/js/config.js"></script>
</head>

<body>
<div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
  <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        
            <div class="m-2">
             <img src="../images/data.png" alt="">
            </div>

        <div class="menu-inner-shadow"></div>
       
        <ul class="menu-inner py-1">
          <!-- Dashboard -->
          
          <li class="menu-item <?php if(PAGE == 'dashboard') { echo 'active'; } ?>">
            <a href="dashboard.php" class="menu-link ">
            <i class="menu-icon tf-icons bx bx-user"></i>
              <div data-i18n="Analytics">Dashboard</div>
            </a>
          </li>
          <li class="menu-item <?php if(PAGE == 'work') { echo 'active'; } ?>">
              <a href="work.php" class="menu-link ">
              <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="Analytics">work order</div>
              </a>
          </li>
          <li class="menu-item <?php if(PAGE == 'request') { echo 'active'; } ?>">
              <a href="request.php" class="menu-link">
              <i class='menu-icon tf-icons bx bx-comment-check'></i>
               
                <div data-i18n="Analytics">Requests</div>
              </a>
          </li>
          <li class="menu-item <?php if(PAGE == 'assets') { echo 'active'; } ?>">
              <a href="assets.php" class="menu-link">
              <i class='menu-icon tf-icons bx bx-key'></i>
                <div data-i18n="Analytics">assets</div>
              </a>
          </li>
          <li class="menu-item <?php if(PAGE == 'technician') { echo 'active'; } ?>">
              <a href="technician.php" class="menu-link">
              <i class='menu-icon tf-icons bx bx-link'></i>
                <div data-i18n="Analytics">technician</div>
              </a>
          </li>
          <li class="menu-item <?php if(PAGE == 'requesters') { echo 'active'; } ?>">
              <a href="requester.php" class="menu-link">
              <i class='menu-icon tf-icons bx bx-key'></i>
                <div data-i18n="Analytics">requester</div>
              </a>
          </li>
          <li class="menu-item <?php if(PAGE == 'workreport') { echo 'active'; } ?>">
              <a href="workreport.php" class="menu-link">
              <i class='menu-icon tf-icons bx bx-key'></i>
                <div data-i18n="Analytics">Work Report</div>
              </a>
          </li>
          <li class="menu-item <?php if(PAGE == 'sellreport') { echo 'active'; } ?>">
              <a href="soldproductreport.php" class="menu-link">
              <i class='menu-icon tf-icons bx bx-key'></i>
                <div data-i18n="Analytics">sellreport</div>
              </a>
          </li>
        
        </ul>
      </aside>



