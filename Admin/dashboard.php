<?php
define('TITLE', 'Dashboard');
define('PAGE', 'dashboard');
include('includes/header.php'); 
include('../dbConnection.php');
session_start();
 if(isset($_SESSION['is_adminlogin'])){
  $aEmail = $_SESSION['aEmail'];
 } else {
  echo "<script> location.href='login.php'; </script>";
 }
 $sql = "SELECT count(*) FROM submitrequest_tb";
 $result = $conn->query($sql);
 $row = mysqli_fetch_row($result);
 $submitrequest = $row[0];

 $sql = "SELECT count(*) FROM submitrequest_tb where DATE(request_date) = DATE(NOW())";
 $result = $conn->query($sql);
 $row = mysqli_fetch_row($result);
 $submitrequesttoday = $row[0];

 $sql = "SELECT count(*) FROM customer_tb";
 $result = $conn->query($sql);
 $row = mysqli_fetch_row($result);
 $customers = $row[0];

 $sql = "SELECT count(*) FROM customer_tb where DATE(cpdate) = DATE(NOW())";
 $result = $conn->query($sql);
 $row = mysqli_fetch_row($result);
 $customerstoday = $row[0];

 $sql = "SELECT count(*)  FROM assignwork_tb";
 $result = $conn->query($sql);
 $row = mysqli_fetch_row($result);
 $assignwork = $row[0];

 $sql = "SELECT count(*)  FROM assignwork_tb  where DATE(assign_date) = DATE(NOW())";
 $result = $conn->query($sql);
 $row = mysqli_fetch_row($result);
 $assignworktoday = $row[0];


 $sql = "SELECT count(*)  FROM technician_tb  where DATE(date_tech) = DATE(NOW())";
 $result = $conn->query($sql);
 $row = mysqli_fetch_row($result);
 $techtoday = $row[0];


 $sql = "SELECT * FROM technician_tb";
 $result = $conn->query($sql);
 $totaltech = $result->num_rows;

 $sql = " SELECT sum(psellingcost)
 from assets_tb
 WHERE month(pdop)=MONTH(now())
 group by year(pdop),month(pdop)
 order by year(pdop),month(pdop);";
 $result = $conn->query($sql);
 $row = mysqli_fetch_row($result);
 $assets = $row[0];




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
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-lg-8 mb-4 order-0">
                  <div class="card">
                    <div class="d-flex align-items-end row">
                      <div class="col-sm-7">
                        <div class="card-body">
                          <h5 class="card-title text-primary">DataIntervention Espace Admin </h5>
                          <p class="mb-4">
                          Bienvenue dans votre espace administrateur.
Cet espace est réservé aux membres du Conseil d’Administration et aux gestionnaires du site.
                          </p>

                          <a href="request.php" class="btn btn-sm btn-outline-primary">voir les demandes</a>
                        </div>
                      </div>
                      <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                          <img
                            src="../assets/img/illustrations/man-with-laptop-light.png"
                            height="140"
                            alt="View Badge User"
                            data-app-dark-img="illustrations/man-with-laptop-dark.png"
                            data-app-light-img="illustrations/man-with-laptop-light.png"
                          />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 order-1">
                  <div class="row">
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img
                                src="../assets/img/icons/unicons/checklist.png"
                                alt="chart success"
                                class="rounded"
                              />
                            </div>
                            <div class="dropdown">
                              <button
                                class="btn p-0"
                                type="button"
                                id="cardOpt3"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                              >
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                <a class="dropdown-item" href="request.php">Voir plus</a>
                              </div>
                            </div>
                          </div>
                          <span class="fw-semibold d-block mb-1" style=" font-wieght:12px;">Interventions assignées</span>
                          <h3 class="card-title mb-2"> <?php echo $assignwork; ?></h3>
                          <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i>+ <?php echo $assignworktoday; ?> Aujourdhui</small>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img
                                src="../assets/img/icons/unicons/business-idea.png"
                                alt="chart success"
                                class="rounded"
                              />
                            </div>
                            <div class="dropdown">
                              <button
                                class="btn p-0"
                                type="button"
                                id="cardOpt3"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                              >
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                <a class="dropdown-item" href="request.php">Voir plus</a>
                    
                              </div>
                            </div>
                          </div>
                          <span class="fw-semibold d-block mb-1">Demandes d'interventions</span>
                          <h3 class="card-title mb-2"> <?php echo $submitrequest; ?></h3>
                          <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i>+ <?php echo $submitrequesttoday; ?> Aujourdhui</small>
                        </div>
                      </div>
                    </div>
                 
                  </div>
                </div>
                <!-- Total Revenue -->
                <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
                  <div class="card">
                    <div class="row row-bordered g-0">
                      <div class="col-md-12">
                        <h5 class="card-header m-0 me-2 pb-3">Demandes </h5>
                        <div id="totalRevenueChart" class="px-2"></div>
                      </div>
                     
                    </div>
                  </div>
                </div>
                <!--/ Total Revenue -->
                <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
                  <div class="row">
                    <div class="col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img src="../assets/img/icons/unicons/group.png" alt="Credit Card" class="rounded" />
                            </div>
                            <div class="dropdown">
                              <button
                                class="btn p-0"
                                type="button"
                                id="cardOpt4"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                              >
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                                <a class="dropdown-item" href="request.php">Voir plus</a>
                               
                              </div>
                            </div>
                          </div>
                          <span class="d-block mb-1">Clients</span>
                          <h3 class="card-title text-nowrap mb-2"><?php echo $customers ;?></h3>
                          <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> <?php echo $customerstoday;?> Aujourdhui</small>
                        </div>
                      </div>
                    </div>
                    <div class="col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img src="../assets/img/icons/unicons/technician.png" alt="Credit Card" class="rounded" />
                            </div>
                            <div class="dropdown">
                              <button
                                class="btn p-0"
                                type="button"
                                id="cardOpt1"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                              >
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu" aria-labelledby="cardOpt1">
                                <a class="dropdown-item" href="technician.php">Voir plus</a>
                                
                              </div>
                            </div>
                          </div>
                          <span class="fw-semibold d-block mb-1">Nb de technicien</span>
                          <h3 class="card-title mb-2">  <?php echo $totaltech; ?> </h3>
                          <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> <?php echo $techtoday;?> Aujourdhui</small>
                        </div>
                      </div>
                    </div>
                    <!-- </div>
    <div class="row"> -->
                    <div class="col-12 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                            <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                              <div class="card-title">
                                <h5 class="text-nowrap mb-2">Revenu</h5>
                                <span class="badge bg-label-warning rounded-pill">Cette Semaine</span>
                              </div>
                              <div class="mt-sm-auto">
                                <small class="text-success text-nowrap fw-semibold"
                                  ><i class="bx bx-chevron-up"></i> 68.2%</small
                                >
                                <h3 class="mb-0"><?php echo $assets ?> dh</h3>
                              </div>
                            </div>
                            <div id="profileReportChart"></div>
                          </div>
                        </div>
                      </div>
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
<?php
include('includes/footer.php'); 
?>