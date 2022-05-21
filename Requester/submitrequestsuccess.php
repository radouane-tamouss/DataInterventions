<?php
define('TITLE', 'Success');
session_start();
include('includes/header.php'); 
include('../dbConnection.php');
if($_SESSION['is_login']){
 $rEmail = $_SESSION['rEmail'];
} else {
 echo "<script> location.href='RequesterLogin.php'; </script>";
}
$sql = "SELECT * FROM submitrequest_tb WHERE request_id = {$_SESSION['myid']}";
$result = $conn->query($sql);
if($result->num_rows == 1){
 $row = $result->fetch_assoc();
 echo "
  <div class='layout-page'>
 <div class='content-wrapper'>
  <div class='container-xxl flex-grow-1 container-p-y'>
 <div class='ml-5 mt-5'>
 <table class='table'>
  <tbody>
   <tr>
     <th>Demande ID</th>
     <td>".$row['request_id']."</td>
   </tr>
   <tr>
     <th>Nom</th>
     <td>".$row['requester_name']."</td>
   </tr>
   <tr>
   <th>Email</th>
   <td>".$row['requester_email']."</td>
  </tr>
   <tr>
    <th>Demande Info</th>
    <td>".$row['request_info']."</td>
   </tr>
   <tr>
    <th>Discription de la Demande</th>
    <td>".$row['request_desc']."</td>
   </tr>

  </tbody>
 </table> </div>
 
  <div class='text-center' style='padding:20px'>
            <form class='d-print-none d-inline mr-3'><input class='btn btn-primary' type='submit' value='Print' onClick='window.print()'></form>
            
            

            <form class='d-print-none d-inline' action='../admin/work.php'><input class='btn btn-secondary' type='submit' value='Close'></form>
            
          </div>
 ";


} else {
  echo "Failed";
}
?>
</div>
</div>

<?php
include('includes/footer.php'); 
$conn->close();
?>