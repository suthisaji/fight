<?php
 require 'connectdb.php';
 //ลบภาพ
 
 $news_id = $_GET['id']; //ที่ id นี้
 
 $sql_select = "SELECT news_filename FROM tbnews WHERE news_id='$news_id'";//หา
 $res_select = mysqli_query($dbcon, $sql_select);//เรียกแสดง(สั่งทำงาน)
 $news_image = mysqli_fetch_row($res_select);//ดึงมาจากฐานไหน
 $filename = $news_image[0];//ดึงมา index ที่0
 
  unlink('../news_image/'.$filename);//ลบ

$sql = "DELETE FROM tbnews WHERE  news_id= '$news_id'";
$result = mysqli_query($dbcon, $sql);
if($result){
  header("Location: main.php");
    
}else{
  echo 'เกิดข้อผิดพลาด '.  mysqli_error($dbcon);
}
mysqli_close($dbcon);