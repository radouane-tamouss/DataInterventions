<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <title>
  <?php echo TITLE ?>
 </title>


 

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link
  href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
  rel="stylesheet"
/>

<!-- Icons. Uncomment required icon fonts -->
<link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

<!-- Core CSS -->
<link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
<link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
<link rel="stylesheet" href="../assets/css/demo.css" />

<!-- Vendors CSS -->
<link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

<link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />

<!-- Page CSS -->
<style>
  input[readonly] {background-color: white !important;}

</style>
<!-- Helpers -->
<script src="../assets/vendor/js/helpers.js"></script>

<!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
<script src="../assets/js/config.js"></script>

</head>

<body>
 <!-- Top Navbar -->


 <!-- Side Bar -->
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
          
          <li class="menu-item <?php if(PAGE == 'RequesterProfile') { echo 'active'; } ?>">
            <a href="RequesterProfile.php" class="menu-link ">
            <i class="menu-icon tf-icons bx bx-user"></i>
              <div data-i18n="Analytics">profile</div>
            </a>
          </li>
          <li class="menu-item <?php if(PAGE == 'SubmitRequest') { echo 'active'; } ?>">
              <a href="SubmitRequest.php" class="menu-link ">
              <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="Analytics">Envoyer la demande</div>
              </a>
          </li>
          <li class="menu-item <?php if(PAGE == 'CheckStatus') { echo 'active'; } ?>">
              <a href="CheckStatus.php" class="menu-link">
              <i class='menu-icon tf-icons bx bx-comment-check'></i>
               
                <div data-i18n="Analytics">service status</div>
              </a>
          </li>
          <li class="menu-item <?php if(PAGE == 'Requesterchangepass') { echo 'active'; } ?>">
              <a href="Requesterchangepass.php" class="menu-link">
              <i class='menu-icon tf-icons bx bx-key'></i>
                <div data-i18n="Analytics">changer mot de passe</div>
              </a>
          </li>
          
          <li class="menu-item">
              <a href="../logout.php" class="menu-link">
              <i class='menu-icon tf-icons bx bx-log-out' ></i>
                <div data-i18n="Analytics">logout</div>
              </a>
          </li>
        </ul>
      </aside>





