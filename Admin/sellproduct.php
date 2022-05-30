<?php    
define('TITLE', 'Sell Product');
define('PAGE', 'assets');
session_start();
include('includes/header.php'); 
include('../dbConnection.php');
 if(isset($_SESSION['is_adminlogin'])){
  $aEmail = $_SESSION['aEmail'];
 } else {
  echo "<script> location.href='login.php'; </script>";
 }
 if(isset($_REQUEST['psubmit'])){
  // Checking for Empty Fields
  if(($_REQUEST['cname'] == "") || ($_REQUEST['cadd'] == "") || ($_REQUEST['pname'] == "") || ($_REQUEST['pquantity'] == "") || ($_REQUEST['psellingcost'] == "") || ($_REQUEST['totalcost'] == "") || ($_REQUEST['selldate'] == "")){
   // msg displayed if required field missing
   $msg = '<div class="alert alert-warning col-sm-6 ml-12" role="alert"> Remplir tous les champs
   </div>';
  } else {
    // Assigning User Values to Variable for update
    $pid = $_REQUEST['pid'];
    $pava = ($_REQUEST['pava'] - $_REQUEST['pquantity']);

    // Assigning User Values to Variable for insert
    $custname = $_REQUEST['cname'];
    $custadd = $_REQUEST['cadd'];
    $cpname = $_REQUEST['pname'];
    $cpquantity = $_REQUEST['pquantity'];
    $cpeach = $_REQUEST['psellingcost'];
    $cptotal = $_REQUEST['totalcost'];
    $cpdate = $_REQUEST['selldate'];
    $sqlin = "INSERT INTO customer_tb(custname, custadd, cpname, cpquantity, cpeach, cptotal, cpdate) VALUES ('$custname','$custadd', '$cpname', '$cpquantity', '$cpeach', '$cptotal', '$cpdate')";
    if($conn->query($sqlin) == TRUE){
      // below function captures inserted id
      $genid = mysqli_insert_id($conn);
      session_start();
      $_SESSION['myid'] = $genid;
      echo "<script> location.href='productsellsuccess.php'; </script>";
    } 
    // Updating Assest data for available product after sell
    $sql = "UPDATE assets_tb SET pava = '$pava' WHERE pid = '$pid'";
    $conn->query($sql);
  }
}
 ?>
 <!-- ========================================================================================== -->

 <div class="layout-page">


 <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
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

 <!-- Content -->

 <div class="container-xxl flex-grow-1 container-p-y">

      <!-- Basic Layout -->
      <div class="row"> 

      <div class="col-xl">
          <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h5 class="mb-0">Ajouter une facture</h5>
            </div>
            <div class="card-body">
            <?php
            if(isset($_REQUEST['issue'])){
              $sql = "SELECT * FROM assets_tb WHERE pid = {$_REQUEST['id']}";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            }
            ?>
              <form  class="mx-5" action="" method="POST">
               

                <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="inputRequestInfo">Produit ID</label>
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
                          <label class="col-sm-2 col-form-label" for="inputName">Nom de client</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control today" id="cname" name="cname"/>
                          </div>
                </div>
                <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="inputEmail">Addresse de client</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="cadd" name="cadd"/>
                          </div>
                </div>
                <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="inputMobile">Nom de produit</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="pname"  name="pname" value="<?php if(isset($row['pname'])) {echo $row['pname']; }?>" />
                          </div>
                </div>
                
                <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="pava">QTE en stock</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="pava"  name="pava" value="<?php if(isset($row['pava'])) {echo $row['pava']; }?>"
        readonly onkeypress="isInputNumber(event)"/>
                          </div>
                </div>
                <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="pquantity">Quantity</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="pquantity"  onkeypress="isInputNumber(event)" name="pquantity"/>
                          </div>
                </div>
                <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="psellingcost">prix individuel
 </label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="psellingcost"  onkeypress="isInputNumber(event)" name="psellingcost" value="<?php if(isset($row['psellingcost'])) {echo $row['psellingcost']; }?>"/>
                          </div>
                </div>
                <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="totalcost">prix total</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="totalcost"  onkeypress="isInputNumber(event)" name="totalcost" />
                          </div>
                </div>
                <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="inputDate">Date</label>
                          <div class="col-sm-10">
                            <input type="date" class="form-control" id="inputDate"   value="<?=date("Y-m-d");?>" name="selldate" />
                          </div>
                </div>
           

                
              
               
                
                <button type="submit" class=" btn btn-primary me-2 my-2" id="psubmit" name="psubmit">soumettre</button>
                <a href="assets.php" class="btn btn-secondary">Fermer</a>

                <?php if(isset($msg)) {echo $msg; } ?>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>



 <!-- ================================================================================================== -->


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