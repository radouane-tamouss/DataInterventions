<?php
define('TITLE', 'Requesters');
define('PAGE', 'requesters');
include('includes/header.php'); 
include('../dbConnection.php');
session_start();
 if(isset($_SESSION['is_adminlogin'])){
  $aEmail = $_SESSION['aEmail'];
 } else {
  echo "<script> location.href='login.php'; </script>";
 }
?>
<!-- ====================================================================================================== -->

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" rel="stylesheet">
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
<div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4  m-2" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="content-wrapper">

             <!-- Content -->
             <div class="container-xxl flex-grow-1 container-p-y">
              <!-- Basic Bootstrap Table -->
              <div class="card">
                <h5 class="card-header">Demendeurs details</h5>
                <div class="table-responsive text-nowrap">

                <?php
                  $sql = "SELECT * FROM requesterlogin_tb";
                  $result = $conn->query($sql);
                  if($result->num_rows > 0){
                echo '
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Demandeur ID</th>
                      <th scope="col">Nom</th>
                      <th scope="col">Email</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody class="table-border-bottom-0">';
                  while($row = $result->fetch_assoc()){
                  echo '<tr>';
                  echo '<th scope="row">'.$row["r_login_id"].'</th>';
                  echo '<td>'. $row["r_name"].'</td>';
                  echo '<td>'.$row["r_email"].'</td>';
                   
                   echo' <td>
                    <form action="editreq.php" method="POST" class="d-inline"> <input type="hidden" name="id" value='. $row["r_login_id"] .'><button type="submit" class="btn btn-primary  py-0 px-1" name="view" value="Voir"><i class="bi bi-pencil-square"></i></button></form>  
                    <form action="" method="POST" class="d-inline"><input type="hidden" name="id" value='. $row["r_login_id"] .'><button type="submit" class="btn btn-danger  py-0 px-1" name="delete" value="Supprimer"><i class="bi bi-trash-fill"></i></button></form>
                  </td>
                  </tr>';
                
                }
                    echo '</tbody>
                  </table>';
                } else {
                  echo "0 Result";
                }
                if(isset($_REQUEST['delete'])){
                  $sql = "DELETE FROM requesterlogin_tb WHERE r_login_id = {$_REQUEST['id']}";
                  if($conn->query($sql) === TRUE){
                    // echo "Record Deleted Successfully";
                    // below code will refresh the page after deleting the record
                    echo '<meta http-equiv="refresh" content= "0;URL=?deleted" />';
                    } else {
                      echo "Unable to Delete Data";
                    }
                  }
                  ?>
        </div>
        </div>
        <a class="btn btn-dark box mt-3" href="insertreq.php"><i class="bi bi-plus-square"></i></a>
</div>

   <!-- Footer -->
   <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ??
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





<!-- ======================================================================================================= -->

</div>
<?php
include('includes/footer.php'); 
?>