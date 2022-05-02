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

  <nav
    class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
    id="layout-navbar"
  >
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
      <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
        <i class="bx bx-menu bx-sm"></i>
      </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
      <!-- Search -->
      <div class="navbar-nav align-items-center">
        <div class="nav-item d-flex align-items-center">
          Dashboard

        </div>
      </div>
      <!-- /Search -->

      <ul class="navbar-nav flex-row align-items-center ms-auto">
        <!-- Place this tag where you want the button to render. -->
        <li class="nav-item lh-1 me-3">
          <a
            class="github-button"
            href="https://github.com/themeselection/sneat-html-admin-template-free"
            data-icon="octicon-star"
            data-size="large"
            data-show-count="true"
            aria-label="Star themeselection/sneat-html-admin-template-free on GitHub"
            >Star</a
          >
        </li>

        <!-- User -->
        <li class="nav-item navbar-dropdown dropdown-user dropdown">
          <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
            <div class="avatar avatar-online">
              <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
            </div>
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li>
              <a class="dropdown-item" href="#">
                <div class="d-flex">
                  <div class="flex-shrink-0 me-3">
                    <div class="avatar avatar-online">
                      <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </div>
                  <div class="flex-grow-1">
                    <span class="fw-semibold d-block"><?php echo $rName?></span>
                    <small class="text-muted">Admin</small>
                  </div>
                </div>
              </a>
            </li>
            <li>
              <div class="dropdown-divider"></div>
            </li>
            <li>
              <a class="dropdown-item" href="#">
                <i class="bx bx-user me-2"></i>
                <span class="align-middle">My Profile</span>
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="#">
                <i class="bx bx-cog me-2"></i>
                <span class="align-middle">Settings</span>
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="#">
                <span class="d-flex align-items-center align-middle">
                  <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                  <span class="flex-grow-1 align-middle">Billing</span>
                  <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                </span>
              </a>
            </li>
            <li>
              <div class="dropdown-divider"></div>
            </li>
            <li>
              <a class="dropdown-item" href="auth-login-basic.html">
                <i class="bx bx-power-off me-2"></i>
                <span class="align-middle">Log Out</span>
              </a>
            </li>
          </ul>
        </li>
        <!--/ User -->
      </ul>
    </div>
  </nav>

  <!-- / Navbar -->

  <!-- Content wrapper -->
  <div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Vertical Layouts</h4>

      <!-- Basic Layout -->
      <div class="row">
     
        <div class="col-xl">
          <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h5 class="mb-0">Basic with Icons</h5>
              <small class="text-muted float-end">Merged input group</small>
            </div>
            <div class="card-body">
              <form>
                <div class="mb-3">
                  <label class="form-label" for="basic-icon-default-fullname">Request ID</label>
                  <div class="input-group input-group-merge">
                   
                    <input
                      type="text"
                      class="form-control"
                      id="basic-icon-default-fullname"
                      name="checkid"
                      placeholder="Enter Request ID :"
                      aria-describedby="basic-icon-default-fullname2"
                      onkeypress="isInputNumber(event)"
                    />
                  </div>
                </div>
                
               
                <button type="submit" class="btn btn-primary" >Search</button>
                
              </form>

               
              <?php
              if(isset($_REQUEST['checkid'])){
                $sql = "SELECT * FROM assignwork_tb WHERE request_id = {$_REQUEST['checkid']}";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                if(($row['request_id']) == $_REQUEST['checkid']){ ?>

      <h3 class="text-center mt-5">Assigned Work Details</h3>
      <div class="printableTable">
      
     
          <table class="table table-bordered">
            <tbody>
              <tr>
                <td>Request ID</td>
                <td>
                  <?php if(isset($row['request_id'])) {echo $row['request_id']; } ?>
                </td>
              </tr>
              <tr>
                <td>Request Info</td>
                <td>
                  <?php if(isset($row['request_info'])) {echo $row['request_info']; } ?>
                </td>
              </tr>
              <tr>
                <td>Request Description</td>
                <td>
                  <?php if(isset($row['request_desc'])) {echo $row['request_desc']; } ?>
                </td>
              </tr>
              <tr>
                <td>Name</td>
                <td>
                  <?php if(isset($row['requester_name'])) {echo $row['requester_name']; } ?>
                </td>
              </tr>
              <tr>
                <td>Address Line 1</td>
                <td>
                  <?php if(isset($row['requester_add1'])) {echo $row['requester_add1']; } ?>
                </td>
              </tr>
              <tr>
                <td>Address Line 2</td>
                <td>
                  <?php if(isset($row['requester_add2'])) {echo $row['requester_add2']; } ?>
                </td>
              </tr>
              <tr>
                <td>City</td>
                <td>
                  <?php if(isset($row['requester_city'])) {echo $row['requester_city']; } ?>
                </td>
              </tr>
              <tr>
                <td>State</td>
                <td>
                  <?php if(isset($row['requester_state'])) {echo $row['requester_state']; } ?>
                </td>
              </tr>
              <tr>
                <td>Pin Code</td>
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
                <td>Mobile</td>
                <td>
                  <?php if(isset($row['requester_mobile'])) {echo $row['requester_mobile']; } ?>
                </td>
              </tr>
              <tr>
                <td>Assigned Date</td>
                <td>
                  <?php if(isset($row['assign_date'])) {echo $row['assign_date']; } ?>
                </td>
              </tr>
              <tr>
                <td>Technician Name</td>
                <td>Zahir Khan</td>
              </tr>
              <tr>
                <td>Customer Sign</td>
                <td></td>
              </tr>
              <tr>
                <td>Technician Sign</td>
                <td></td>
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