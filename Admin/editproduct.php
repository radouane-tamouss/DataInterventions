<?php    
define('TITLE', 'Update Product');
define('PAGE', 'assets');
include('includes/header.php'); 
include('../dbConnection.php');
session_start();
 if(isset($_SESSION['is_adminlogin'])){
  $aEmail = $_SESSION['aEmail'];
 } else {
  echo "<script> location.href='login.php'; </script>";
 }
 // update
 if(isset($_REQUEST['pupdate'])){
  // Checking for Empty Fields
  if(($_REQUEST['pname'] == "") || ($_REQUEST['pdop'] == "") || ($_REQUEST['pava'] == "") || ($_REQUEST['ptotal'] == "") || ($_REQUEST['poriginalcost'] == "") || ($_REQUEST['psellingcost'] == "")){
   // msg displayed if required field missing
   $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
  } else {
    // Assigning User Values to Variable
    $pid = $_REQUEST['pid'];
    $pname = $_REQUEST['pname'];
    $pdop = $_REQUEST['pdop'];
    $pava = $_REQUEST['pava'];
    $ptotal = $_REQUEST['ptotal'];
    $poriginalcost = $_REQUEST['poriginalcost'];
    $psellingcost = $_REQUEST['psellingcost'];
   
  $sql = "UPDATE assets_tb SET pname = '$pname', pdop = '$pdop', pava = '$pava', ptotal = '$ptotal', poriginalcost = '$poriginalcost', psellingcost = '$psellingcost' WHERE pid = '$pid'";
    if($conn->query($sql) == TRUE){
     // below msg display on form submit success
     $msg = '<div class="alert alert-success col-sm-12 mt-2" role="alert"> Updated Successfully </div>';
    } else {
     // below msg display on form submit failed
     $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Update </div>';
    }
  }
  }
 ?>

 <!-- ========================================================================================== -->

 <div class="layout-page">


<div class="content-wrapper">

 <!-- Content -->

 <div class="container-xxl flex-grow-1 container-p-y">

 <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Assets /</span> Update Product Details</h4>

<!-- Basic Layout -->
<div class="row"> 

<div class="col-xl">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Update Product Details</h5>
        <small class="text-muted float-end">Merged input group</small>
      </div>
      <div class="card-body">
      <?php
 if(isset($_REQUEST['view'])){
  $sql = "SELECT * FROM assets_tb WHERE pid = {$_REQUEST['id']}";
 $result = $conn->query($sql);
 $row = $result->fetch_assoc();
 }
 ?>
        <form  class="mx-5" action="" method="POST">
         

          <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="pid">Product ID</label>
                    <div class="col-sm-10">
                      <input
                      id="pid"
                      class="form-control form-control-lg"
                      type="text"
                      name="pid"
                      value="<?php if(isset($row['pid'])) {echo $row['pid']; }?>"
                      readonly
                      />
                    </div>
          </div>

         
          <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="pname">Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control today" id="pname" name="pname"  value="<?php if(isset($row['pname'])) {echo $row['pname']; }?>"/>
                    </div>
          </div>
          <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="pdop">DOP</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="pdop" name="pdop"  value="<?php if(isset($row['pdop'])) {echo $row['pdop']; }?>"/>
                    </div>
          </div>
          <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="pava">Available</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="pava"  name="pava" value="<?php if(isset($row['pava'])) {echo $row['pava']; }?>" />
                    </div>
          </div>
          
          <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="ptotal">total</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="ptotal"  name="ptotal" value="<?php if(isset($row['ptotal'])) {echo $row['ptotal']; }?>"
  readonly onkeypress="isInputNumber(event)"/>
                    </div>
          </div>
          <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="poriginalcost">Original Cost Each</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="poriginalcost"  onkeypress="isInputNumber(event)" name="poriginalcost" value="<?php if(isset($row['poriginalcost'])) {echo $row['poriginalcost']; }?>"/>
                    </div>
          </div>
          <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="psellingcost">Selling Price Each</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="psellingcost"  onkeypress="isInputNumber(event)" name="psellingcost" value="<?php if(isset($row['psellingcost'])) {echo $row['psellingcost']; }?>"/>
                    </div>
          </div>
         
         
     

          
        
         
          
          <button type="submit" class=" btn btn-primary me-2 my-2" id="pupdate" name="pupdate">Update</button>
          <a href="assets.php" class="btn btn-secondary">close</a>

          <?php if(isset($msg)) {echo $msg; } ?>
        </form>
      </div>
    </div>
  </div>
</div>
</div>



 <!-- ========================================================================================== -->

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