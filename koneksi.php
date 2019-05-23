<?php
$host = 'localhost';
$user = 'root';
$password = '';
$db_name = 'uas_android';


$conn = mysqli_connect($host, $user, $password, $db_name); if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL:" . mysqli_connect_error();
}
?>
