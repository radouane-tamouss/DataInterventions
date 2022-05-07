<?php

define('TITLE', 'Success');
define('PAGE', 'assets');

include('includes/header.php'); 
include('../dbConnection.php');
session_start();
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

<div class="content-wrapper">
    <div class="container-xxl col-lg-10 flex-grow-1 container-p-y">
      
      <!-- Bordered Table -->
          <?php echo "
          
          <div class='card'>
                <h5 class='card-header'>Customer Bill</h5>
                <div class='card-body'>
                  <div class='table-responsive text-nowrap'>
                    <table class='table table-striped'>
                    <tbody>
                    <tr>
                      <th>Customer ID</th>
                      <td>".$row['custid']."</td>
                    </tr>
                     <tr>
                       <th>Customer Name</th>
                       <td>".$row['custname']."</td>
                     </tr>
                     <tr>
                       <th>Address</th>
                       <td>".$row['custadd']."</td>
                     </tr>
                     <tr>
                     <th>Product</th>
                     <td>".$row['cpname']."</td>
                    </tr>
                     <tr>
                      <th>Quantity</th>
                      <td>".$row['cpquantity']."</td>
                     </tr>
                     <tr>
                      <th>Price Each</th>
                      <td>".$row['cpeach']."</td>
                     </tr>
                     <tr>
                      <th>Total Cost</th>
                      <td>".$row['cptotal']."</td>
                     </tr>
                     <tr>
                     <th>Date</th>
                     <td>".$row['cpdate']."</td>
                    </tr>
  
                    </tbody>
                    </table>
                    <div class='text-center mt-3'>
                    <form class='d-print-none d-inline mr-3'><input class='btn btn-primary' type='submit' value='Print' onClick='window.print()'></form>
                     <a href='assets.php' class='btn btn-secondary d-print-none'>Close</a>
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