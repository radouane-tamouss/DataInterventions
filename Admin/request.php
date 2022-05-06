<?php
define('TITLE', 'Requests');
define('PAGE', 'request');
include('includes/header.php'); 
include('../dbConnection.php');
session_start();
 if(isset($_SESSION['is_adminlogin'])){
  $aEmail = $_SESSION['aEmail'];
 } else {
  echo "<script> location.href='login.php'; </script>";
 }
?>
 
 <div class="layout-page">
    <div class="content-wrapper">

    <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-2 mb-2"><span class="text-muted fw-light">UI Elements /</span> Cards Basic</h4>
              <div class="row mb-2">
              <?php 
              $sql = "SELECT request_id, request_info, request_desc, request_date FROM submitrequest_tb";
              $result = $conn->query($sql);
              if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
               echo '<div class="col-md-6 col-lg-4 mb-2">';
                 echo' <div class="card">';
                   echo' <div class="card-header">'; echo'Request ID :'. $row['request_id']; echo'</div>';
                   echo' <div class="card-body">';
                   echo'   <h5 class="card-title"> Request Info: '. $row['request_info'] . '</h5>';
                     echo'<p class="card-text">'. $row['request_desc']. '</p>';

                        echo '<form action="" method="POST"> <input type="hidden"  name="id"  value='. $row["request_id"] .'><input type="submit" class="btn btn-primary mr-3" name="view"  value="View"><input type="submit" class="btn btn-secondary" name="close" value="Close"></form>';

                     
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