<?php
define('TITLE', 'Add New Requester');
define('PAGE', 'requesters');
include('includes/header.php'); 
include('../dbConnection.php');
session_start();
 if(isset($_SESSION['is_adminlogin'])){
  $aEmail = $_SESSION['aEmail'];
 } else {
  echo "<script> location.href='login.php'; </script>";
 }
if(isset($_REQUEST['reqsubmit'])){
 // Checking for Empty Fields
 if(($_REQUEST['r_name'] == "") || ($_REQUEST['r_email'] == "") || ($_REQUEST['r_password'] == "")){
  // msg displayed if required field missing
  $msg = '<div class="alert alert-warning col-sm-12 mt-2" role="alert"> Fill All Fileds </div>';
 } else {
   // Assigning User Values to Variable
   $rname = $_REQUEST['r_name'];
   $rEmail = $_REQUEST['r_email'];
   $rPassword = $_REQUEST['r_password'];
   $sql = "INSERT INTO requesterlogin_tb (r_name, r_email, r_password) VALUES ('$rname', '$rEmail', '$rPassword')";
   if($conn->query($sql) == TRUE){
    // below msg display on form submit success
    $msg = '<div class="alert alert-success col-sm-12 mt-2" role="alert"> Added Successfully </div>';
   } else {
    // below msg display on form submit failed
    $msg = '<div class="alert alert-danger col-sm-12 mt-2" role="alert"> Unable to Add </div>';
   }
 }
 }
?>

<!-- ================================================================================================= -->


<div class="layout-page">


<div class="content-wrapper">

 <!-- Content -->

 <div class="container-xxl flex-grow-1 col-lg-8 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Vertical Layouts</h4>

      <!-- Basic Layout -->
      <div class="row">

      <div class="col-xl">
          <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h5 class="mb-0">Add New Requester</h5>
              <small class="text-muted float-end">Merged input group</small>
            </div>
            <div class="card-body">
              <form  class="mx-5" action="" method="POST">
               

                <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="r_name">Name</label>
                          <div class="col-sm-10">
                            <input
                            id="r_name"
                            class="form-control form-control-lg"
                            type="text"
                            name="r_name"
                           
                            />
                          </div>
                </div>
                

                <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="r_email">Email</label>
                          <div class="col-sm-10">
                            <input type="email" class="form-control" id="r_email"  name="r_email"  />
                          </div>
                </div>
                
               
                <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="r_password">Password</label>
                          <div class="col-sm-10">
                            <input type="password" class="form-control today" id="r_password"  name="r_password"/>
                          </div>
                </div>
                

                

                
              
               
                
                <button type="submit" class=" btn btn-primary me-2 my-2" id="reqsubmit" name="reqsubmit">Submit</button>
                <a href="requester.php" class="btn btn-secondary">close</a>

                <?php if(isset($msg)) {echo $msg; } ?>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>




<!-- ================================================================================================= -->


<?php
include('includes/footer.php'); 
?>