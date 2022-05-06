<?php
define('TITLE', 'Requests');
define('PAGE', 'request');
include('includes/header.php'); 
include('../dbConnection.php');
session_start();
 if(isset($_SESSION['is_adminlogin'])){
  $aEmail = $_SESSION['aEmail'];
 } else {
  echo "<script> location.href='login.php'; </script>";
 }
?>
 
 <div class="layout-page">
    <div class="content-wrapper">

    <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">UI Elements /</span> Cards Basic</h4>
              <div class="row mb-5">
               
                <div class="col-md-6 col-lg-4 mb-3">
                  <div class="card text-center">
                    <div class="card-header">Featured</div>
                    <div class="card-body">
                      <h5 class="card-title">Special title treatment</h5>
                      <p class="card-text">With supporting text below as a natural.</p>
                      <a href="javascript:void(0)" class="btn btn-primary m-2">Go somewhere</a>
                      <a href="javascript:void(0)" class="btn btn-secondary mx-2">Go somewhere</a>
                    </div>
                    <div class="card-footer text-muted">2 days ago</div>
                  </div>
                </div>

                <div class="col-md-6 col-lg-4 mb-3">
                  <div class="card text-center">
                    <div class="card-header">Featured</div>
                    <div class="card-body">
                      <h5 class="card-title">Special title treatment</h5>
                      <p class="card-text">With supporting text below as a natural.</p>
                      <a href="javascript:void(0)" class="btn btn-primary m-2">Go somewhere</a>
                      <a href="javascript:void(0)" class="btn btn-secondary mx-2">Go somewhere</a>
                    </div>
                    <div class="card-footer text-muted">2 days ago</div>
                  </div>
                </div>

                <div class="col-md-6 col-lg-4 mb-3">
                  <div class="card text-center">
                    <div class="card-header">Featured</div>
                    <div class="card-body">
                      <h5 class="card-title">Special title treatment</h5>
                      <p class="card-text">With supporting text below as a natural.</p>
                      <a href="javascript:void(0)" class="btn btn-primary m-2">Go somewhere</a>
                      <a href="javascript:void(0)" class="btn btn-secondary mx-2">Go somewhere</a>
                    </div>
                    <div class="card-footer text-muted">2 days ago</div>
                  </div>
                </div>

                <div class="col-md-6 col-lg-4 mb-3">
                  <div class="card text-center">
                    <div class="card-header">Featured</div>
                    <div class="card-body">
                      <h5 class="card-title">Special title treatment</h5>
                      <p class="card-text">With supporting text below as a natural.</p>
                      <a href="javascript:void(0)" class="btn btn-primary m-2">Go somewhere</a>
                      <a href="javascript:void(0)" class="btn btn-secondary mx-2">Go somewhere</a>
                    </div>
                    <div class="card-footer text-muted">2 days ago</div>
                  </div>
                </div>

                <div class="col-md-6 col-lg-4 mb-3">
                  <div class="card text-center">
                    <div class="card-header">Featured</div>
                    <div class="card-body">
                      <h5 class="card-title">Special title treatment</h5>
                      <p class="card-text">With supporting text below as a natural.</p>
                      <a href="javascript:void(0)" class="btn btn-primary m-2">Go somewhere</a>
                      <a href="javascript:void(0)" class="btn btn-secondary mx-2">Go somewhere</a>
                    </div>
                    <div class="card-footer text-muted">2 days ago</div>
                  </div>
                </div>

                
              </div>
              <!-- Examples -->
            

<?php 
  include('assignworkform.php');
  include('includes/footer.php'); 
  $conn->close();
?>