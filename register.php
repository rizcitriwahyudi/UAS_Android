<?php

include_once 'koneksi.php';

$response = array("error" => FALSE);

if (isset($_POST['namaDepan']) && isset($_POST['namaBelakang']) && isset($_POST['username']) && isset($_POST['password'])) {
 $namaD = htmlspecialchars($_POST['namaDepan']);
 $namaB = htmlspecialchars($_POST['namaBelakang']);
 $username = htmlspecialchars($_POST['username']);
 $password = htmlspecialchars($_POST['password']);

    $sql = $conn->query("SELECT username from users WHERE username = '$username'");

    if(mysqli_num_rows($sql) > 0) {
  $response["error"] = TRUE;
        $response["message"] = "User sudah ada";
        $response["success"] = 0;

        echo json_encode($response);
    }else{
     $sql = $conn->query("INSERT INTO users(namaDepan, namaBelakang, username, password, created_at) VALUES('$namaD', '$namaB', '$username', '$password', NOW())");

     if($sql) {
         $response["error"] = FALSE;
         $response["message"] = "Registrasi berhasil";
         $response["success"] = 1;

   echo json_encode($response);
     } else {
      $response["error"] = TRUE;
         $response["message"] = "Register gagal";
         $response["success"] = 0;

   echo json_encode($response);
     }

    }

}
?>
