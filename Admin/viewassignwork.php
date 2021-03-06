<?php
define('TITLE', 'Work Order');
define('PAGE', 'work');
session_start();
include('includes/header.php'); 
include('../dbConnection.php');
 if(isset($_SESSION['is_adminlogin'])){
  $aEmail = $_SESSION['aEmail'];
 } else {
  echo "<script> location.href='login.php'; </script>";
 }
?>

<!-- ==================================================================== -->
<div class="layout-page">
  
<style>

@media print {
	.no-printme  {
		display: none;
	}
	.printme  {
		display: block;
	}
}
</style>
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme no-printme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="m-1 my-4">
             <img src="../images/data.png" alt="">
            </div>


            <div class="navbar-nav-right d-flex align-items-center" sid="navbar-collape">
             

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
               

                <a href="../logout.php">
               <i class='bx bx-exit bx-sm' style='color:#10a5c6'  ></i>
                      </a>
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl col-lg-10 flex-grow-1 container-p-y">

              <!-- Bordered Table -->
              <div class="card">
                <h5 class="card-header text-center">Détails de l'Interventions</h5>
                <div class="card-body">
                  <div class="table-responsive text-nowrap">
                    <?php
                    if(isset($_REQUEST['view'])){
                    $sql = "SELECT * FROM assignwork_tb WHERE request_id = {$_REQUEST['id']}";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    }
                    ?>
                    <table class="table table-striped">
                      <tbody>
                                            <tr>
                            <td>Demande ID</td>
                            <td>
                            <?php if(isset($row['request_id'])) {echo $row['request_id']; }?>
                            </td>
                        </tr>
                        <tr>
                            <td>Demande Info</td>
                            <td>
                            <?php if(isset($row['request_info'])) {echo $row['request_info']; }?>
                            </td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td>
                            <?php if(isset($row['request_desc'])) {echo $row['request_desc']; }?>
                            </td>
                        </tr>
                        <tr>
                            <td>Nom</td>
                            <td>
                            <?php if(isset($row['requester_name'])) {echo $row['requester_name']; }?>
                            </td>
                        </tr>
                        <tr>
                            <td>Addresse 1</td>
                            <td>
                            <?php if(isset($row['requester_add1'])) {echo $row['requester_add1']; }?>
                            </td>
                        </tr>
                        <tr>
                            <td>Addresse 2</td>
                            <td>
                            <?php if(isset($row['requester_add2'])) {echo $row['requester_add2']; }?>
                            </td>
                        </tr>
                        <tr>
                            <td>Ville</td>
                            <td>
                            <?php if(isset($row['requester_city'])) {echo $row['requester_city']; }?>
                            </td>
                        </tr>
                        <tr>
                            <td>Province</td>
                            <td>
                            <?php if(isset($row['requester_state'])) {echo $row['requester_state']; }?>
                            </td>
                        </tr>
                        <tr>
                            <td>Code Postale</td>
                            <td>
                            <?php if(isset($row['requester_zip'])) {echo $row['requester_zip']; }?>
                            </td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>
                            <?php if(isset($row['requester_email'])) {echo $row['requester_email']; }?>
                            </td>
                        </tr>
                        <tr>
                            <td>Telephone</td>
                            <td>
                            <?php if(isset($row['requester_mobile'])) {echo $row['requester_mobile']; }?>
                            </td>
                        </tr>
                        <tr>
                            <td>Date d'attribution</td>
                            <td>
                            <?php if(isset($row['assign_date'])) {echo $row['assign_date']; }?>
                            </td>
                        </tr>
                        <tr>
                            <td>Nom de technicien</td>
                            <td>
                            <?php if(isset($row['assign_tech'])) {echo $row['assign_tech']; }?>
                            </td>
                        </tr>
                        
                      </tbody>
                    </table>
                    
                  </div>
               
                </div>
              
              </div>
              <!--/ Bordered Table -->
              
              </div>

              <div class="text-center">
                    <form class='d-print-none d-inline mr-3'><input class='btn btn-primary' type='submit' value='Print' onClick='window.print()'></form>
                    <form class='d-print-none d-inline' action="work.php"><input class='btn btn-secondary' type='submit' value='Close'></form>
                </div>
            <!-- / Content -->

             <!-- Footer -->
             <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  
                  <a href="https://github.com/radouane-tamouss" target="_blank" class="footer-link fw-bolder">Dataxpress</a>
                </div>
                <div>
                 

                 

                  <a
                    href="mailto:atamousse.red@email.com"
                    target="_blank"
                    class="footer-link me-4"
                    >Support</a
                  >
                </div>
              </div>
            </footer>
            <!-- / Footer -->


            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>


<?php
include('includes/footer.php'); 
?>