<?php
define('TITLE', 'Status');
define('PAGE', 'CheckStatus');
include('includes/header.php'); 
include('../dbConnection.php');
session_start();
if($_SESSION['is_login']){
 $rEmail = $_SESSION['rEmail'];
} else {
 echo "<script> location.href='RequesterLogin.php'; </script>";
}
?>


<div class="layout-page">
  <!-- Navbar -->

<style>

@media print {
	.no-printme  {
		display: none;
	}
	.printme  {
		display: block;
	}
}
</style>

  <!-- / Navbar -->

  <!-- Content wrapper -->
  <div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">vérifier l'état</h4>

      <!-- Basic Layout -->
      <div class="row ">
     
        <div class="col-xl">
          <div class="card mb-4">
           
            <div class="card-body no-printme">
              <form>
                <div class="mb-3">
                  <label class="form-label" for="basic-icon-default-fullname">Demande ID</label>
                  <div class="input-group input-group-merge">
                   
                    <input
                      type="text"
                      class="form-control"
                      id="basic-icon-default-fullname"
                      name="checkid"
                      placeholder="Saisir votre demande ID :"
                      aria-describedby="basic-icon-default-fullname2"
                      onkeypress="isInputNumber(event)"
                      required
                    />
                  </div>
                </div>
                
               
                <button type="submit" class="btn btn-primary" >Chercher</button>
                
              </form>
</div>
</div>

          <div class="printme">

            
              <?php
              if(isset($_REQUEST['checkid'])){
                $sql = "SELECT * FROM assignwork_tb WHERE request_id = {$_REQUEST['checkid']}";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                if(($row['request_id']) == $_REQUEST['checkid']){ ?>

      <h3 class="text-center mt-5">détails de la demande</h3>
      <div class="printableTable">
      
     
          <table class="table table-bordered">
            <tbody>
              <tr>
                <td>Demande ID</td>
                <td>
                  <?php if(isset($row['request_id'])) {echo $row['request_id']; } ?>
                </td>
              </tr>
              <tr>
                <td>Demande Info</td>
                <td>
                  <?php if(isset($row['request_info'])) {echo $row['request_info']; } ?>
                </td>
              </tr>
              <tr>
                <td>Demande Description</td>
                <td>
                  <?php if(isset($row['request_desc'])) {echo $row['request_desc']; } ?>
                </td>
              </tr>
              <tr>
                <td>Nom</td>
                <td>
                  <?php if(isset($row['requester_name'])) {echo $row['requester_name']; } ?>
                </td>
              </tr>
              <tr>
                <td>Addresse 1</td>
                <td>
                  <?php if(isset($row['requester_add1'])) {echo $row['requester_add1']; } ?>
                </td>
              </tr>
              <tr>
                <td>Addresse  2</td>
                <td>
                  <?php if(isset($row['requester_add2'])) {echo $row['requester_add2']; } ?>
                </td>
              </tr>
              <tr>
                <td>ville</td>
                <td>
                  <?php if(isset($row['requester_city'])) {echo $row['requester_city']; } ?>
                </td>
              </tr>
              <tr>
                <td>Province</td>
                <td>
                  <?php if(isset($row['requester_state'])) {echo $row['requester_state']; } ?>
                </td>
              </tr>
              <tr>
                <td>Code Postale</td>
                <td>
                  <?php if(isset($row['requester_zip'])) {echo $row['requester_zip']; } ?>
                </td>
              </tr>
              <tr>
                <td>Email</td>
                <td>
                  <?php if(isset($row['requester_email'])) {echo $row['requester_email']; } ?>
                </td>
              </tr>
              <tr>
                <td>Téléphone</td>
                <td>
                  <?php if(isset($row['requester_mobile'])) {echo $row['requester_mobile']; } ?>
                </td>
              </tr>
              <tr>
                <td>Date attribuée</td>
                <td>
                  <?php if(isset($row['assign_date'])) {echo $row['assign_date']; } ?>
                </td>
              </tr>
              <tr>
                <td>nom du technicien</td>
                <td>
                  <?php if(isset($row['assign_tech'])) {echo $row['assign_tech']; } ?>
                </td>
              </tr>
             
            </tbody>
          </table>
          </div>
          
          <div class="text-center" style="padding:20px">
            <form class="d-print-none d-inline mr-3"><input class="btn btn-primary" type="submit" value="Print" onClick="window.print()"></form>
            
            

            <form class="d-print-none d-inline" action="../admin/work.php"><input class="btn btn-secondary" type="submit" value="Close"></form>
            
          </div>
        

         
          <?php } else {
              echo '<div class="alert alert-dark mt-4" role="alert">
              Your Request is Still Pending </div>';
            }
        }
        ?>
        
        </div>

  
            </div>
          </div>
        </div>
      </div>
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
      </div> 
      
    </div>

    
    <!-- / Content -->

   
    <div class="content-backdrop fade"></div>
    
  </div>
  
  <!-- Content wrapper -->
  
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
?>