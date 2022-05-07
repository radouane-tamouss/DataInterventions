<?php    
define('TITLE', 'Update Requester');
define('PAGE', 'requesters');
include('includes/header.php'); 
include('../dbConnection.php');
session_start();
 if(isset($_SESSION['is_adminlogin'])){
  $aEmail = $_SESSION['aEmail'];
 } else {
  echo "<script> location.href='login.php'; </script>";
 }
 // update
 if(isset($_REQUEST['requpdate'])){
  // Checking for Empty Fields
  if(($_REQUEST['r_login_id'] == "") || ($_REQUEST['r_name'] == "") || ($_REQUEST['r_email'] == "")){
   // msg displayed if required field missing
   $msg = '<div class="alert alert-warning col-sm-12 mt-2" role="alert"> Fill All Fileds </div>';
  } else {
    // Assigning User Values to Variable
    $rid = $_REQUEST['r_login_id'];
    $rname = $_REQUEST['r_name'];
    $remail = $_REQUEST['r_email'];

  $sql = "UPDATE requesterlogin_tb SET r_login_id = '$rid', r_name = '$rname', r_email = '$remail' WHERE r_login_id = '$rid'";
    if($conn->query($sql) == TRUE){
     // below msg display on form submit success
     $msg = '<div class="alert alert-success col-sm-12 mt-2" role="alert"> Updated Successfully </div>';
    } else {
     // below msg display on form submit failed
     $msg = '<div class="alert alert-danger col-sm-12 mt-2" role="alert"> Unable to Update </div>';
    }
  }
  }
 ?>
<!-- ================================================================================================= -->


<div class="layout-page">


<div class="content-wrapper">

 <!-- Content -->

 <div class="container-xxl flex-grow-1  container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Technician/</span> Update technician details</h4>

      <!-- Basic Layout -->
      <div class="row">

      <div class="col-xl">
          <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h5 class="mb-0">Update Requester Details</h5>
              <small class="text-muted float-end">Merged input group</small>
            </div>
            <div class="card-body">
                              <?php
                  if(isset($_REQUEST['view'])){
                    $sql = "SELECT * FROM requesterlogin_tb WHERE r_login_id = {$_REQUEST['id']}";
                  $result = $conn->query($sql);
                  $row = $result->fetch_assoc();
                  }
                  ?>
              <form  class="mx-5" action="" method="POST">
               

                <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="r_login_id">Requester ID</label>
                          <div class="col-sm-10">
                            <input
                            id="r_login_id"
                            class="form-control form-control-lg"
                            type="text"
                            name="r_login_id"
                            value="<?php if(isset($row['r_login_id'])) {echo $row['r_login_id']; }?>"
                            readonly
                            />
                          </div>
                </div>
                <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="r_name">Name</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control today" id="r_name" value="<?php if(isset($row['r_name'])) {echo $row['r_name']; }?>" name="r_name"/>
                          </div>
                </div>
             

                
                <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="r_email">Email</label>
                          <div class="col-sm-10">
                            <input type="email" class="form-control" id="r_email" value="<?php if(isset($row['r_email'])) {echo $row['r_email']; }?>"  name="r_email"  />
                          </div>
                </div>
                

                
              
               
                
                <button type="submit" class=" btn btn-primary me-2 my-2" id="requpdate" name="requpdate">Update</button>
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