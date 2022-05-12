<?php
define('TITLE', 'Requester Profile');
define('PAGE', 'RequesterProfile');
session_start();
include('includes/header.php'); 
include('../dbConnection.php');
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


 if(isset($_REQUEST['nameupdate'])){
  if(($_REQUEST['rName'] == "")){
   // msg displayed if required field missing
   $passmsg = '<div class="alert alert-warning col-sm-12 mt-2" role="alert"> Remplir tous les champs </div>';
  } else {
   $rName = $_REQUEST["rName"];
   $sql = "UPDATE requesterlogin_tb SET r_name = '$rName' WHERE r_email = '$rEmail'";
   if($conn->query($sql) == TRUE){
   // below msg display on form submit success
   $passmsg = '<div class="alert alert-success col-sm-12 mt-2" role="alert">    Mis à jour avec succés </div>';
   } else {
   // below msg display on form submit failed
   $passmsg = '<div class="alert alert-danger col-sm-12 mt-2" role="alert">   Impossible de mettre à jour</div>';
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
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Profile/</span> mettre à jour les informations</h4>

      <!-- Basic Layout -->
      <div class="row">
     
        <div class="col-xl">
          <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h5 class="mb-0">mettre à jour le Nom d'utilisateur</h5>
            </div>
            <div class="card-body">
              <form>
                <div class="mb-3">
                  <label class="form-label" for="basic-icon-default-fullname">Nom d'utilisateur</label>
                  <div class="input-group input-group-merge">
                    <span id="basic-icon-default-fullname2" class="input-group-text"
                      ><i class="bx bx-user"></i
                    ></span>
                    <input
                    aria-describedby="basic-icon-default-fullname2"
                      type="text"
                      class="form-control"
                      id="basic-icon-default-fullname"
                    
                      
                      value="<?php echo $rName?>"
                        name="rName"
                     
                    />
                  </div>
                </div>
                
                
                <div class="mb-3">
                  <label class="form-label" for="basic-icon-default-email">Email</label>
                  <div class="input-group input-group-merge">
                    <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                    <input
                      type="text"
                      id="basic-icon-default-email"
                      class="form-control"
                      value=" <?php echo $rEmail ?>"
                      readonly
                     
                      
                    />
                    
                  </div>
                 
                </div>
                
               
                <button type="submit" class="btn btn-primary" name="nameupdate">
Mise à jour</button>
                <?php if(isset($passmsg)) {echo $passmsg; } ?>
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
                    href="https://github.com/radouane-tamouss"
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




<?php
include('includes/footer.php'); 
?>