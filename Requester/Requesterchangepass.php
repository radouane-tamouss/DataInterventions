<?php
define('TITLE', 'Change Password');
define('PAGE', 'Requesterchangepass');
session_start();
include('includes/header.php');
include('../dbConnection.php');
if($_SESSION['is_login']){
 $rEmail = $_SESSION['rEmail'];
} else {
 echo "<script> location.href='RequesterLogin.php'; </script>";
}

 $rEmail = $_SESSION['rEmail'];
 if(isset($_REQUEST['passupdate'])){
  if(($_REQUEST['rPassword'] == "")){
   // msg displayed if required field missing
   $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
  } else {
    $sql = "SELECT * FROM requesterlogin_tb WHERE r_email='$rEmail'";
    $result = $conn->query($sql);
    if($result->num_rows == 1){
     $rPass = $_REQUEST['rPassword'];
     $sql = "UPDATE requesterlogin_tb SET r_password = '$rPass' WHERE r_email = '$rEmail'";
      if($conn->query($sql) == TRUE){
       // below msg display on form submit success
       $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Updated Successfully </div>';
      } else {
       // below msg display on form submit failed
       $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Update </div>';
      }
    }
   }
}

?>
<!-- ----------------------------------------------------------------------------------------------------------------------------- -->

<div class="layout-page">
  <!-- Navbar -->

 

  <!-- / Navbar -->

  <!-- Content wrapper -->
  <div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Changer le mot de passe</span></h4>

      <!-- Basic Layout -->
      <div class="row">
     
        <div class="col-xl">
          <div class="card mb-4">
            
            <div class="card-body">
              <form method="POST">
                <div class="mb-3">
                  <label class="form-label" for="inputEmail">Email</label>
                  <div class="input-group input-group-merge">
                    <span id="basic-icon-default-fullname2" class="input-group-text"
                      ><i class="bx bx-user"></i
                    ></span>
                    <input
                      type="email"
                      class="form-control"
                      id="inputEmail"
                      value="<?php echo $rEmail?>"
                      aria-describedby="basic-icon-default-fullname2"
                      readonly
                    />
                  </div>
                </div>
                
                
                <div class="mb-3">
                  <label class="form-label" for="inputnewpassword">nouveau mot de passe</label>
                  <div class="input-group input-group-merge">
                    <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                    <input
                      type="password"
                      id="inputnewpassword"
                      class="form-control"
                      name="rPassword"
                      placeholder="nouveau mot de passe"
                     
                      
                    />
                    
                  </div>
                 
                </div>
                
                
               
                <button type="submit" class="btn btn-primary" name="passupdate">mettre à jour</button>
                <button type="reset" class="btn btn-secondary" >réinitialiser</button>
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


<!-- ----------------------------------------------------------------------------------------------------------------------------- -->

</div>
</div>

<?php
include('includes/footer.php'); 
?>