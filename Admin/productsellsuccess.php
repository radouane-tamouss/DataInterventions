<?php

define('TITLE', 'Success');
define('PAGE', 'assets');

session_start();
include('includes/header.php'); 
include('../dbConnection.php');
 if(isset($_SESSION['is_adminlogin'])){
  $aEmail = $_SESSION['aEmail'];
 } else {
  echo "<script> location.href='login.php'; </script>";
 }

$sql = "SELECT * FROM customer_tb WHERE custid = {$_SESSION['myid']}";
$result = $conn->query($sql);
if($result->num_rows == 1){
 $row = $result->fetch_assoc();
 ?>

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

<div class="content-wrapper">
    <div class="container-xxl col-lg-10 flex-grow-1 container-p-y">
      
      <!-- Bordered Table -->
          <?php echo "
          
          <div class='card'>
                <h5 class='card-header text-center'>facture</h5>
                <div class='card-body'>
                  <div class='table-responsive text-nowrap'>
                    <table class='table table-striped'>
                    <tbody>
                    <tr>
                      <th>Clilent ID</th>
                      <td>".$row['custid']."</td>
                    </tr>
                     <tr>
                       <th>Nom de client</th>
                       <td>".$row['custname']."</td>
                     </tr>
                     <tr>
                       <th>Addresse</th>
                       <td>".$row['custadd']."</td>
                     </tr>
                     <tr>
                     <th>Produit</th>
                     <td>".$row['cpname']."</td>
                    </tr>
                     <tr>
                      <th>Quantity</th>
                      <td>".$row['cpquantity']."</td>
                     </tr>
                     <tr>
                      <th>prix individuel</th>
                      <td>".$row['cpeach']."</td>
                     </tr>
                     <tr>
                      <th>Totale</th>
                      <td>".$row['cptotal']."</td>
                     </tr>
                     <tr>
                     <th>Date</th>
                     <td>".$row['cpdate']."</td>
                    </tr>
  
                    </tbody>
                    </table>
                    <div class='text-center mt-3'>
                    <form class='d-print-none d-inline mr-3'><input class='btn btn-primary' type='submit' value='Imprimer' onClick='window.print()'></form>
                     <a href='assets.php' class='btn btn-secondary d-print-none'>Fermer</a>
                     </div>
                  </div>";
               
} else {
  echo "Failed";
}
?>
                </div>
              
              </div>
<!-- ======================================================================= -->


<?php
include('includes/footer.php'); 
$conn->close();
?>