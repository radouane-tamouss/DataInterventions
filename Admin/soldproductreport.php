<?php
define('TITLE', 'Product Report');
define('PAGE', 'sellreport');
include('includes/header.php');
include('../dbConnection.php');
session_start();
 if(isset($_SESSION['is_adminlogin'])){
  $aEmail = $_SESSION['aEmail'];
 } else {
  echo "<script> location.href='login.php'; </script>";
 } 
?>


<!-- ============================================================================================== -->

<div class="layout-page">
  <!-- Navbar -->
  <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme no-printme"
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
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Rapport de Vente</h4>

      <!-- Basic Layout -->
      <div class="row ">
     
        <div class="col-xl">
          <div class="card mb-4">
           
            <div class="card-body no-printme">
              <form>
              <h5 for="form-row">Veuillez selectionner l'intervalle de date souhaiter :</h5>
                <div class="form-row">
                  
                  <span class="mt-3 font-weight-bold ml-1 mr-4" > De </span>
                  <div class="col m-2">
                    <input
                      type="date"
                      class="form-control"
                      id="startdate"
                      name="startdate"
                      
                     
                      
                      required
                    /> 
                  </div>
                    <span class="mt-3 font-weight-bold ml-4 mr-4" > Vers </span>
                  <div class="col m-2">
                   
                    <input
                      type="date"
                      class="form-control"
                      id="enddate"
                      name="enddate"

                      value="<?=date("Y-m-d");?>"
                      
                     
                      
                      required
                    /> 
                  </div>
                  
                  
                </div>
                
               
                <button type="submit" class="btn btn-primary mt-3" name="searchsubmit" >Chercher</button>
                
              </form>
</div>
</div>

          <div class="printme">

            
          <?php
 if(isset($_REQUEST['searchsubmit'])){
    $startdate = $_REQUEST['startdate'];
    $enddate = $_REQUEST['enddate'];
    // $sql = "SELECT * FROM customer_tb WHERE cpdate BETWEEN '2018-10-11' AND '2018-10-13'";
    $sql = "SELECT * FROM customer_tb WHERE cpdate BETWEEN '$startdate' AND '$enddate'";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
      echo'

      <h3 class="text-center mt-5">détails</h3>
      <div class="printableTable">
      
     
          <table class="table table-bordered">
              <thead>
              <tr>
                <th scope="col">Client ID</th>
                <th scope="col">Nom de Client</th>
                <th scope="col">Adresse </th>
                <th scope="col">Nom de produit</th>
                <th scope="col">QTE</th>
                <th scope="col">Prix individuel</th>
                <th scope="col"> Prix total</th>
                <th scope="col"> Date</th>
              </tr>
            </thead>
            <tbody>';
            while($row = $result->fetch_assoc()){
              echo '<tr>
                <th scope="row">'.$row["custid"].'</th>
                <td>'.$row["custname"].'</td>
                <td>'.$row["custadd"].'</td>
                <td>'.$row["cpname"].'</td>
                <td>'.$row["cpquantity"].'</td>
                <td>'.$row["cpeach"].'</td>
                <td>'.$row["cptotal"].'</td>
                <td>'.$row["cpdate"].'</td>
                </tr>';
              }
              ?>
             
              
        
            </tbody>
              </table><div class="text-center" style="padding:20px">
            <form class="d-print-none d-inline mr-3"><input class="btn btn-primary" type="submit" value="Print" onClick="window.print()"></form>
            
            

           
            
          </div>
<?php 
              
            } else {
              echo "<div class='alert alert-warning col-sm-12 mt-2' role='alert'> Aucun resultat trouver ! </div>";
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
    </div>
 </div>
     </div>
    <!-- / Content -->

   
    <div class="content-backdrop fade"></div>
    
  </div>
  
  <!-- Content wrapper -->
  
</div>

<!-- ============================================================================================== -->


<?php
include('includes/footer.php'); 
?>