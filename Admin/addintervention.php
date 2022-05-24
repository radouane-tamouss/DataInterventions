<?php
define('TITLE', 'addintervetion');
define('PAGE', 'work');
session_start();
include('includes/header.php'); 
include('../dbConnection.php');
 if(isset($_SESSION['is_adminlogin'])){
  $aEmail = $_SESSION['aEmail'];
 } else {
  echo "<script> location.href='login.php'; </script>";
 }

 //  Assign work Order Request Data going to submit and save on db assignwork_tb table
 if(isset($_REQUEST['assign'])){
    // Checking for Empty Fields
    if(($_REQUEST['request_id'] == "") || ($_REQUEST['request_info'] == "") || ($_REQUEST['requestdesc'] == "") || ($_REQUEST['requestername'] == "") || ($_REQUEST['address1'] == "") || ($_REQUEST['address2'] == "") || ($_REQUEST['requestercity'] == "") || ($_REQUEST['requesterstate'] == "") || ($_REQUEST['requesterzip'] == "") || ($_REQUEST['requesteremail'] == "") || ($_REQUEST['requestermobile'] == "") || ($_REQUEST['assigntech'] == "") || ($_REQUEST['inputdate'] == "")){
     // msg displayed if required field missing
     $msg = '<div class="alert alert-warning col-sm-12 mt-2" role="alert"> 
     Remplir tous les champs </div>';
    } else {
      // Assigning User Values to Variable
     $rid = $_REQUEST['request_id'];
      $rinfo = $_REQUEST['request_info'];
      $rdesc = $_REQUEST['requestdesc'];
      $rname = $_REQUEST['requestername'];
      $radd1 = $_REQUEST['address1'];
      $radd2 = $_REQUEST['address2'];
      $rcity = $_REQUEST['requestercity'];
      $rstate = $_REQUEST['requesterstate'];
      $rzip = $_REQUEST['requesterzip'];
      $remail = $_REQUEST['requesteremail'];
      $rmobile = $_REQUEST['requestermobile'];
      $rassigntech = $_REQUEST['assigntech'];
      $rdate = $_REQUEST['inputdate'];
      $sql = "INSERT INTO assignwork_tb ( request_id,request_info, request_desc, requester_name, requester_add1, requester_add2, requester_city, requester_state, requester_zip, requester_email, requester_mobile, assign_tech, assign_date) VALUES ('$rid','$rinfo','$rdesc', '$rname', '$radd1', '$radd2', '$rcity', '$rstate', '$rzip', '$remail', '$rmobile', '$rassigntech', '$rdate')";
      if($conn->query($sql) == TRUE){
       // below msg display on form submit success
       $msg = '<div class="alert alert-success col-sm-12 mt-2" role="alert"> Interventions attribué avec succès </div>';
      } else {
       // below msg display on form submit failed
       $msg = '<div class="alert alert-danger col-sm-12 mt-2" role="alert"> Impossible d\'attribuer l\'intervention </div>';
      }
    }
    }
   // Assign work Order Request Data going to submit and save on db assignwork_tb table [END]
  
?>
 
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
                <i class='bx bx-exit' style='color:#f70000'  ></i>

                      </a>
              </ul>
            </div>
          </nav>
    <div class="content-wrapper">

    <div class="container-xxl flex-grow-1 container-p-y">
             

    <div class="col-sm-12 mt-5 jumbotron">
  <!-- Main Content area Start Last -->
  <?php if(isset($msg)) {echo $msg; } ?>
  <form action="" method="POST">
    <h5 class="text-center">Ajouter une Intervention</h5>
    <div class="form-group">
      <label for="request_info">Demande ID</label>
      <input type="text" class="form-control" id="request_id" name="request_id" onkeypress="isInputNumber(event)" >
    </div>
    <div class="form-group">
      <label for="request_info">Demande Info</label>
      <input type="text" class="form-control" id="request_info" name="request_info" >
    </div>
    <div class="form-group">
      <label for="requestdesc">Description</label>
      <input type="text" class="form-control" id="requestdesc" name="requestdesc" >
    </div>
    <div class="form-group">
      <label for="requestername">Nom</label>
      <input type="text" class="form-control" id="requestername" name="requestername">
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="address1">Addresse 1</label>
        <input type="text" class="form-control" id="address1" name="address1" >
      </div>
      <div class="form-group col-md-6">
        <label for="address2">Addresse 2</label>
        <input type="text" class="form-control" id="address2" name="address2" >
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="requestercity">Ville</label>
        <!-- <input type="text" class="form-control" id="requestercity" name="requestercity" > -->
        <select  class="form-select" id="inputCity" name="requestercity" >
                              <?php
                                $json = file_get_contents('../ville.json');
                                $data = json_decode($json, true);
                                  foreach($data['villes'] as $entry) {
                                    echo "<option value=".$entry['ville']."select>".$entry['ville']."</option>";
                                  }
                                ?>
                            </select>
      </div>
      <div class="form-group col-md-4">
        <label for="requesterstate">Province</label>
        <!-- <input type="text" class="form-control" id="requesterstate" name="requesterstate" > -->
        <select  class="form-select" id="inputState" name="requesterstate" >
                              <?php
                                $json = file_get_contents('../region.json');
                                $data = json_decode($json, true);
                                  foreach($data['provinces'] as $entry) {
                                    echo "<option value=".$entry['region']."select>".$entry['region']."</option>";
                                  }
                                ?>
                            </select>
      </div>
      <div class="form-group col-md-4">
        <label for="requesterzip">Code Postale</label>
        <input type="text" class="form-control" id="requesterzip" name="requesterzip" 
          onkeypress="isInputNumber(event)">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-8">
        <label for="requesteremail">Email</label>
        <input type="email" class="form-control" id="requesteremail" name="requesteremail" >
      </div>
      <div class="form-group col-md-4">
        <label for="requestermobile">Telephone</label>
        <input type="text" class="form-control" id="requestermobile" name="requestermobile" 
          onkeypress="isInputNumber(event)">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="assigntech">Attribuer au technicien </label>
        <!-- <input type="text" class="form-control" id="assigntech" name="assigntech"> -->
        <select class="form-select " id="assigntech" name="assigntech">
        <?php
                $sql = "SELECT * FROM technician_tb";
                $result = $conn->query($sql);
                if($result->num_rows > 0){
                  while($row = $result->fetch_assoc()){
                    echo '<option>'. $row["empName"].'</option>';
                    ;}}
                  ?>
        </select>
      </div>
      <div class="form-group col-md-6">
        <label for="inputDate">Date</label>
        <input type="date" class="form-control" id="inputDate" name="inputdate" value="<?=date("Y-m-d");?>"> 
      </div>
    </div>
    <div class="float-right">
      <button type="submit" class="btn btn-success" name="assign">Attribuer</button>
      <button type="reset" class="btn btn-secondary">Réinitialiser</button>
    </div>
  </form>
  <!-- below msg display if required fill missing or form submitted success or failed -->
  
</div> <!-- Main Content area End Last -->
</div> <!-- End Row -->
</div> <!-- End Container -->
               

 

          

                
              </div>
              <!-- Examples -->
   
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
  $conn->close();
?>
