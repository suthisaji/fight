<?php
session_start();
if(!isset($_SESSION['is_admin'])){//กันเข้าได้ผ่าน url เลยต้อง check  ถ้า login_id ไม่มีอยู่จริงแสดงว่ายังไม่ได้ล๊อคอิน(ถ้าไ่ได้ set ตัวแปรนี้ในsessionนี้)
    header("Location: index.php");
}
require 'connectdb.php';
$session_login_id = $_SESSION['login_id'];

$qry_user = "SELECT * FROM tblogin WHERE login_id='$session_login_id'";
$result_user = mysqli_query($dbcon, $qry_user);
if($result_user){
    $row_user = mysqli_fetch_array($result_user,MYSQLI_ASSOC);
    $s_login_username = $row_user['login_username'];
    $s_login_email =$row_user['login_email'];
    mysqli_free_result($result_user);
    mysqli_close($dbcon);
    
}
    