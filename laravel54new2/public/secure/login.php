<?php

require 'connectdb.php';
$login_username = mysqli_real_escape_string($dbcon,$_POST['username']);//ใช้ func นี้เเพื่อกรองข้อมูลเพื่อความปลอดภัยของเว็บเรา
$login_password = mysqli_real_escape_string($dbcon,$_POST['password']);
        
//ตอนลงทะเบียนใช้ algoritm ไร ตอน login ต้องใช้ al เดียวกัน 
 $salt = 'thisisthpassofmeyounevergonnastop';
  $hash_login_password = hash_hmac('sha256', $login_password, $salt);
  
  $sql = "SELECT * FROM tblogin WHERE login_username=? AND login_password=?";//username เท่ากับ parameter ตัวแรก ,pass=ตัวสอง ?=มี่ส่งเข้ามา คือแทนด้วยค่าของ parameter
  //ที่ส่งมาอ่ะ username กับ pass ตรงกันไหม ข้างบนเช็ค ถ้าเท่ากัน 
  $stmt = mysqli_prepare($dbcon, $sql); //เอาค่าที่ส่งมา มาเทียบกับค่าในฐานข้อมูลนี้
  mysqli_stmt_bind_param($stmt, "ss", $login_username,$hash_login_password); //ส่งparameter
  mysqli_execute($stmt);
  $result_user = mysqli_stmt_get_result($stmt);
  if($result_user->num_rows==1){//ผลมีจำนวนแถว= 1
      session_start();//เวลา login เราใช้ได้หลาย page
      $row_user = mysqli_fetch_array($result_user,MYSQL_ASSOC);//ได้ login id เพื่อจะเอารหัสสมาชิก ไปใช้ในเพจอื่นด้วย
     $_SESSION['login_id'] = $row_user['login_id'];
            if($row_user['login_status']==500){
                $_SESSION['is_admin']=500;
              header("Location: main.php");//redirect
              }else{
                  $_SESSION['is_member']=0;
                  $_SESSION['login_username'] = $row_user['login_username'];
                  header("Location: ../index.php");
              }
  }else{
      echo 'ผู้ใช้หรือรหัสผ่านไม่ถูกต้อง';
  }