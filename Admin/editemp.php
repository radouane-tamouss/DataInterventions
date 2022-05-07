<?php    
define('TITLE', 'Update Technician');
define('PAGE', 'technician');
include('includes/header.php'); 
include('../dbConnection.php');
session_start();
 if(isset($_SESSION['is_adminlogin'])){
  $aEmail = $_SESSION['aEmail'];
 } else {
  echo "<script> location.href='login.php'; </script>";
 }
 // update
 if(isset($_REQUEST['empupdate'])){
  // Checking for Empty Fields
  if(($_REQUEST['empName'] == "") || ($_REQUEST['empCity'] == "") || ($_REQUEST['empMobile'] == "") || ($_REQUEST['empEmail'] == "")){
   // msg displayed if required field missing
   $msg = '<div class="alert alert-warning col-sm-12 mt-2" role="alert"> Fill All Fileds </div>';
  } else {
    // Assigning User Values to Variable
    $eId = $_REQUEST['empId'];
    $eName = $_REQUEST['empName'];
    $eCity = $_REQUEST['empCity'];
    $eMobile = $_REQUEST['empMobile'];
    $eEmail = $_REQUEST['empEmail'];
  $sql = "UPDATE technician_tb SET empName = '$eName', empCity = '$eCity', empMobile = '$eMobile', empEmail = '$eEmail' WHERE empid = '$eId'";
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

 <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Technician/</span> Update technician details</h4>

      <!-- Basic Layout -->
      <div class="row">

      <div class="col-xl">
          <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h5 class="mb-0">Add New Technician</h5>
              <small class="text-muted float-end">Merged input group</small>
            </div>
            <div class="card-body">
                            <?php
                if(isset($_REQUEST['view'])){
                  $sql = "SELECT * FROM technician_tb WHERE empid = {$_REQUEST['id']}";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                }
                ?>
              <form  class="mx-5" action="" method="POST">
               

                <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="empId">Emp ID</label>
                          <div class="col-sm-10">
                            <input
                            id="empId"
                            class="form-control form-control-lg"
                            type="text"
                            name="empId"
                            value="<?php if(isset($row['empid'])) {echo $row['empid']; }?>"
                            readonly
                            />
                          </div>
                </div>
                <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="empName">Name</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control today" id="empName" value="<?php if(isset($row['empName'])) {echo $row['empName']; }?>" name="empName"/>
                          </div>
                </div>
               
                <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="empCity">City</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control today" id="empCity" value="<?php if(isset($row['empCity'])) {echo $row['empCity']; }?>" name="empCity"/>
                          </div>
                </div>
                <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="empMobile">Mobile</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="empMobile" onkeypress="isInputNumber(event)" value="<?php if(isset($row['empMobile'])) {echo $row['empMobile']; }?>" name="empMobile"/>
                          </div>
                </div>

                
                <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="empEmail">Email</label>
                          <div class="col-sm-10">
                            <input type="email" class="form-control" id="empEmail" value="<?php if(isset($row['empEmail'])) {echo $row['empEmail']; }?>"  name="empEmail"  />
                          </div>
                </div>
                

                
              
               
                
                <button type="submit" class=" btn btn-primary me-2 my-2" id="empsubmit" name="empupdate">Update</button>
                <a href="technician.php" class="btn btn-secondary">close</a>

                <?php if(isset($msg)) {echo $msg; } ?>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>



<!-- ================================================================================================= -->

 
<!-- Only Number for input fields -->
<script>
  function isInputNumber(evt) {
    var ch = String.fromCharCode(evt.which);
    if (!(/[0-9]/.test(ch))) {
      evt.preventDefault();
    }
  }
</script>
<?php
include('includes/footer.php'); 
?>