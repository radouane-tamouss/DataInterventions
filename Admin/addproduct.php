<?php
define('TITLE', 'Add New Product');
define('PAGE', 'assets');
include('includes/header.php'); 
include('../dbConnection.php');
session_start();
 if(isset($_SESSION['is_adminlogin'])){
  $aEmail = $_SESSION['aEmail'];
 } else {
  echo "<script> location.href='login.php'; </script>";
 }
if(isset($_REQUEST['psubmit'])){
 // Checking for Empty Fields
 if(($_REQUEST['pname'] == "") || ($_REQUEST['pdop'] == "") || ($_REQUEST['pava'] == "") || ($_REQUEST['ptotal'] == "") || ($_REQUEST['poriginalcost'] == "") || ($_REQUEST['psellingcost'] == "")){
  // msg displayed if required field missing
  $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
 } else {
  // Assigning User Values to Variable
  $pname = $_REQUEST['pname'];
  $pdop = $_REQUEST['pdop'];
  $pava = $_REQUEST['pava'];
  $ptotal = $_REQUEST['ptotal'];
  $poriginalcost = $_REQUEST['poriginalcost'];
  $psellingcost = $_REQUEST['psellingcost'];
  $profit = $psellingcost - $poriginalcost;
   $sql = "INSERT INTO assets_tb (pname, pdop, pava, ptotal, poriginalcost, psellingcost,profit) VALUES ('$pname', '$pdop','$pava', '$ptotal', '$poriginalcost', '$psellingcost','$profit')";
   if($conn->query($sql) == TRUE){
    // below msg display on form submit success
    $msg = '<div class="alert alert-success col-sm-12  mt-2" role="alert"> Added Successfully </div>';
   } else {
    // below msg display on form submit failed
    $msg = '<div class="alert alert-danger col-sm-12  mt-2" role="alert"> Unable to Add </div>';
   }
 }
 }
?>
<div class="layout-page">


<div class="content-wrapper">

 <!-- Content -->

 <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Vertical Layouts</h4>

      <!-- Basic Layout -->
      <div class="row">

      <div class="col-xl">
          <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h5 class="mb-0">Add New Product</h5>
              <small class="text-muted float-end">Merged input group</small>
            </div>
            <div class="card-body">
              <form  class="mx-5" action="" method="POST">
               

                <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="inputRequestInfo">Product Name</label>
                          <div class="col-sm-10">
                            <input
                            id="pname"
                            class="form-control form-control-lg"
                            type="text"
                            name="pname"
                            placeholder="product name"
                            />
                          </div>
                </div>

               
                <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="inputName">Date of Purchase</label>
                          <div class="col-sm-10">
                            <input type="date" class="form-control today" id="pdop" value="<?=date("Y-m-d");?>" name="pdop"/>
                          </div>
                </div>
                <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="inputEmail">Available</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="pava"onkeypress="isInputNumber(event)" name="pava"/>
                          </div>
                </div>
                <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="inputMobile">Total</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="ptotal"  name="ptotal"  onkeypress="isInputNumber(event)"/>
                          </div>
                </div>
                
                <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="inputAddress">Original Cost Each</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="poriginalcost"  name="poriginalcost"  onkeypress="isInputNumber(event)"/>
                          </div>
                </div>
                <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="inputAddress2">Selling Cost Each</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="psellingcost" placeholder="Address Line 2"  onkeypress="isInputNumber(event)" name="psellingcost"/>
                          </div>
                </div>
           

                
              
               
                
                <button type="submit" class=" btn btn-primary me-2 my-2" id="psubmit" name="psubmit">Submit</button>
                <a href="assets.php" class="btn btn-secondary">close</a>

                <?php if(isset($msg)) {echo $msg; } ?>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>



      <!-- =========================================================== -->


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