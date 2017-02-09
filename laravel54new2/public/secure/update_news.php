<?php
include 'connectdb.php';
$news_id = $_POST['news_id'];
$newstype_id = $_POST['newstype'];
$news_topic = $_POST['news_topic'];
$news_detail = $_POST['news_detail'];
$news_status = $_POST['news_status'];


if (is_uploaded_file($_FILES['news_filename']['tmp_name'])) {
    //delete old image
    $sql_select = "SELECT news_filename FROM tbnews WHERE news_id='$news_id'";
    $res_image = mysqli_query($dbcon, $sql_select);
    $row_image = mysqli_fetch_assoc($res_image);
    $image_old = $row_image['news_filename'];
    unlink("../news_image/".$image_old);
    
    
        //upload image 
$image_ext = pathinfo(basename($_FILES['news_filename']['name']),PATHINFO_EXTENSION);//ดึงนามสกุล =PATHINFO_EXTENSION ดึงไฟล์ชื่อนี้มา= basename
$new_image_name = 'news_'.uniqid().'.'.$image_ext;//ต่อกับค่าสุ่ม
$image_path ="../news_image/";
$upload_path = $image_path.$new_image_name;//ทำpathต่อด้วยชื่อไฟล์ใหม่ 
//uploading
$success =move_uploaded_file($_FILES['news_filename']['tmp_name'], $upload_path);
$sql_image = "UPDATE tbnews SET news_filename='$new_image_name' WHERE news_id = '$news_id'";
mysqli_query($dbcon, $sql_image);

//สั่ง upload มาใส่ใน upload path folder เรา
if($success ==FALSE){
    echo 'ไม่สามารถ upload รูปภาพได้';
    exit();
}
 
}
   
//update

$sql = "UPDATE  tbnews SET news_topic='$news_topic',news_detail='$news_detail',news_status='$news_status',news_date=NOW(),newstype_id='$newstype_id' WHERE news_id=$news_id";
      ;
$result = mysqli_query($dbcon, $sql);
if($result){
    //echo 'บันทึกข้อมูลเรียบร้อย';
    header("Location: main.php");
}else{
    echo 'เกิดข้อผิดพลาดที่ '.  mysqli_error($dbcon);
}