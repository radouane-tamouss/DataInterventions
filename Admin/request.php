<?php
define('TITLE', 'Requests');
define('PAGE', 'request');
session_start();
include('includes/header.php'); 
include('../dbConnection.php');
 if(isset($_SESSION['is_adminlogin'])){
  $aEmail = $_SESSION['aEmail'];
 } else {
  echo "<script> location.href='login.php'; </script>";
 }
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
              <h4 class="fw-bold py-2 mb-2"><span class="text-muted fw-light">Demandes /</span> Tickets</h4>
              <div class="row mb-2">
              <?php 
              $sql = "SELECT request_id, request_info, request_desc, request_date FROM submitrequest_tb";
              $result = $conn->query($sql);
              if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
               echo '<div class="col-md-6 col-lg-4 mb-2">';
                 echo' <div class="card">';
                   echo' <div class="card-header">'; echo'Demande ID :'. $row['request_id']; echo'</div>';
                   echo' <div class="card-body">';
                   echo'   <h5 class="card-title"> Demande Info: '. $row['request_info'] . '</h5>';
                     echo'<p class="card-text">'. $row['request_desc']. '</p>';

                        echo '<form action="" method="POST"> <input type="hidden"  name="id"  value='. $row["request_id"] .'><input type="submit" class="btn btn-primary mr-3" name="view"  value="Voir" ><input type="submit" class="btn btn-secondary" name="close" value="Fermer"></form>';

                     
                   echo'</div>';
                 
                echo'  </div>';
               echo' </div>';

               

              
  }
} else {
 echo '  <div class="col-md-6 col-xl-12 mt-5">
 <div class="card bg-success text-white mb-3">
   <div class="card-header">Header</div>
   <div class="card-body">
     <h5 class="card-title text-white">Success card title</h5>
     <p class="card-text">Some quick example text to build on the card title and make up.</p>
   </div>
 </div>
</div>';
}

          


// after assigning work we will delete data from submitrequesttable by pressing close button
if(isset($_REQUEST['close'])){
  $sql = "DELETE FROM submitrequest_tb WHERE request_id = {$_REQUEST['id']}";
  if($conn->query($sql) === TRUE){
    // echo "Record Deleted Successfully";
    // below code will refresh the page after deleting the record
    echo '<meta http-equiv="refresh" content= "0;URL=?closed" />';
    } else {
      echo "Unable to Delete Data";
    }
  }
 ?>
                
              </div>
              <!-- Examples -->
   


<?php 



  include('assignworkform.php');
  include('includes/footer.php'); 
  $conn->close();
?>
