<?php

include_once 'koneksi.php';

$response = array("error" => FALSE);

if (isset($_POST['username']) && isset($_POST['password'])) {

 $username = htmlspecialchars($_POST['username']);
 $password = htmlspecialchars($_POST['password']);


 $sql = $conn->query("SELECT * FROM users WHERE username='$username' AND password='$password'");

 if(mysqli_num_rows($sql) > 0){
  while($row = $sql->fetch_array()){
   $response["error"] = FALSE;
       $response["message"] = "Login Berhasil";
       $response["id"] = $row['id'];
       $response["namaDepan"] = $row['namaDepan'];
       $response["namaBelakang"] = $row['namaBelakang'];
       $response["username"] = $row['username'];
       $response["success"] = 1;

      }

  echo json_encode($response);
   }else{
    $response["error"] = TRUE;
     $response["message"] = "username atau password salah!!";
     $response["success"] = 0;

  echo json_encode($response);
   }
}

?>
