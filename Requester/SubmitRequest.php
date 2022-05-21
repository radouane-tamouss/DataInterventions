<?php
define('TITLE', 'Submit Request');
define('PAGE', 'SubmitRequest');
include('includes/header.php'); 
include('../dbConnection.php');
session_start();
if($_SESSION['is_login']){
 $rEmail = $_SESSION['rEmail'];
} else {
 echo "<script> location.href='RequesterLogin.php'; </script>";
}

$sql = "SELECT * FROM requesterlogin_tb WHERE r_email='$rEmail'";
$result = $conn->query($sql);
if($result->num_rows == 1){
$row = $result->fetch_assoc();
$rName = $row["r_name"]; }

if(isset($_REQUEST['submitrequest'])){
 // Checking for Empty Fields
 if(($_REQUEST['requestinfo'] == "") || ($_REQUEST['requestdesc'] == "") || ($_REQUEST['requestername'] == "") || ($_REQUEST['requesteradd1'] == "") || ($_REQUEST['requesteradd2'] == "") || ($_REQUEST['requestercity'] == "") || ($_REQUEST['requesterstate'] == "") || ($_REQUEST['requesterzip'] == "") || ($_REQUEST['requesteremail'] == "") || ($_REQUEST['requestermobile'] == "") || ($_REQUEST['requestdate'] == "")){
  // msg displayed if required field missing
  $msg = '<div class="alert alert-warning col-sm-12 mt-2" role="alert">Remplir tous les champs</div>';
 } else {
   // Assigning User Values to Variable
   $rinfo = $_REQUEST['requestinfo'];
   $rdesc = $_REQUEST['requestdesc'];
   $rname = $_REQUEST['requestername'];
   $radd1 = $_REQUEST['requesteradd1'];
   $radd2 = $_REQUEST['requesteradd2'];
   $rcity = $_REQUEST['requestercity'];
   $rstate = $_REQUEST['requesterstate'];
   $rzip = $_REQUEST['requesterzip'];
   $remail = $_REQUEST['requesteremail'];
   $rmobile = $_REQUEST['requestermobile'];
   $rdate = $_REQUEST['requestdate'];
   $sql = "INSERT INTO submitrequest_tb(request_info, request_desc, requester_name, requester_add1, requester_add2, requester_city, requester_state, requester_zip, requester_email, requester_mobile, request_date) VALUES ('$rinfo','$rdesc', '$rname', '$radd1', '$radd2', '$rcity', '$rstate', '$rzip', '$remail', '$rmobile', '$rdate')";
   if($conn->query($sql) == TRUE){
    // below msg display on form submit success
    $genid = mysqli_insert_id($conn);
    $msg = '<div class="alert alert-success col-sm-12 mt-2" role="alert">Demande soumise avec succès Votre' . $genid .' </div>';
    session_start();
    $_SESSION['myid'] = $genid;
    echo "<script> location.href='submitrequestsuccess.php'; </script>";
    include('submitrequestsuccess.php');
   } else {
    // below msg display on form submit failed
    $msg = '<div class="alert alert-danger col-sm-12 ml-5 mt-2" role="alert"> Impossible de soumettre votre demande </div>';
   }
 }
}
?>

<div class="layout-page">
  <!-- Navbar -->

  

  <!-- / Navbar -->

  <!-- Content wrapper -->
  <div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Demandes /</span> Demender une intervention</h4>

      <!-- Basic Layout -->
      <div class="row">
     
        <div class="col-xl">
          <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h5 class="mb-0">Demander une interventions</h5>
            </div>
            <div class="card-body">
              <form  class="mx-5" action="" method="POST">
               

                <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="inputRequestInfo">infos du demande</label>
                          <div class="col-sm-10">
                            <input
                            id="inputRequestInfos"
                            class="form-control form-control-lg"
                            type="text"
                            name="requestinfo"
                            placeholder="infos du demande"
                            />
                          </div>
                </div>

                <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="inputRequestDescription">Description</label>
                          <div class="col-sm-10">
                            <!-- <input type="text" class="form-control" id="basic-default-name" placeholder="Write Description" name="requestdesc"/> -->
                            <textarea class="form-control" id="inputRequestDescription" rows="3" placeholder="Description de probleme" name="requestdesc"></textarea>

                          </div>
                </div>
                <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="inputName">Nom</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputName" value="<?php echo $rName?>" name="requestername"/>
                          </div>
                </div>
                <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="inputEmail">Email</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail" value="<?php echo $rEmail?>" name="requesteremail"/>
                          </div>
                </div>
                <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="inputMobile">Mobile</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputMobile" placeholder="0666661010" name="requestermobile"  onkeypress="isInputNumber(event)"/>
                          </div>
                </div>
                <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="inputDate">Date</label>
                          <div class="col-sm-10">
                          <input
                          class="form-control"
                          type="date"
                          value="<?=date("Y-m-d");?>"
                          id="inputDate"
                          name="requestdate"

                        />
                          </div>
                </div>
                <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="inputAddress">Addresse  1</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputAddress" placeholder="Addresse  1" name="requesteradd1"/>
                          </div>
                </div>
                <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="inputAddress2">Adresse  2</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputAddress2" placeholder="Addresse 2" name="requesteradd2"/>
                          </div>
                </div>
                <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="inputCity">ville</label>
                          <div class="col-sm-10">
                            <!-- <input type="text" class="form-control" id="inputCity" placeholder="City" name="requestercity"/> -->
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
                </div>
                <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="inputState">province</label>
                          <div class="col-sm-10">
                            <!-- <input type="text" class="form-control" id="inputState" placeholder="privince" name="requesterstate"/> -->
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
                </div>
                <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="inpotZip">Code Postale</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputZip" placeholder="Code Postale" name="requesterzip" onkeypress="isInputNumber(event)"/>
                          </div>
                </div>

                
              
               
                
                <button type="submit" class=" btn btn-primary me-2 my-2" name="submitrequest">Envoyer la demande</button>
                <button type="reset" class="btn btn-outline-secondary me-2 my-2">réinitialiser</button>

                <?php if(isset($msg)) {echo $msg; } ?>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / Content -->

     <!-- Footer -->
     <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  
                  <a href="https://github.com/radouane-tamouss" target="_blank" class="footer-link fw-bolder">Dataxpress</a>
                </div>
                <div>
                 

                 

                  <a
                    href="mailto:atamousse.red@email.com"
                    target="_blank"
                    class="footer-link me-4"
                    >Support</a
                  >
                </div>
              </div>
            </footer>
          <!-- / Footer -->

    <div class="content-backdrop fade"></div>
  </div>
  <!-- Content wrapper -->
</div>

</div>
</div>
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
$conn->close();
?>