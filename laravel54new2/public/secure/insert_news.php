<?php
include 'connectdb.php';

$newstype_id = $_POST['newstype'];
$news_topic = $_POST['news_topic'];
$news_detail = $_POST['news_detail'];
$news_status = $_POST['news_status'];

    //upload image 
$image_ext = pathinfo(basename($_FILES['news_filename']['name']),PATHINFO_EXTENSION);//ดึงนามสกุล =PATHINFO_EXTENSION ดึงไฟล์ชื่อนี้มา= basename
$new_image_name = 'news_'.uniqid().'.'.$image_ext;//ต่อกับค่าสุ่ม
$image_path ="../news_image/";
$upload_path = $image_path.$new_image_name;//ทำpathต่อด้วยชื่อไฟล์ใหม่ 
//uploading
$success =move_uploaded_file($_FILES['news_filename']['tmp_name'], $upload_path);

//สั่ง upload มาใส่ใน upload path folder เรา
if($success ==FALSE){
    echo 'ไม่สามารถ upload รูปภาพได้';
    exit();
}
//insert

$sql = "INSERT INTO tbnews (news_topic,news_detail,news_filename,news_status,news_date,newstype_id) "
        . "VALUES ('$news_topic','$news_detail','$new_image_name','$news_status',NOW(),'$newstype_id')";
$result = mysqli_query($dbcon, $sql);
if($result){
    //echo 'บันทึกข้อมูลเรียบร้อย';
    header("Location: main.php");
}else{
    echo 'เกิดข้อผิดพลาดที่ '.  mysqli_error($dbcon);
}