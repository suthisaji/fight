<?php include 'session.php'; 
 require 'connectdb.php';
//ต้อง require ต่อเพราะใน session มันปิด connection ละ
$sql="SELECT * FROM tbnews INNER JOIN tbnewstype ON tbnews.newstype_id=tbnewstype.newstype_id ORDER BY news_id DESC";
$res_new = mysqli_query($dbcon, $sql);


?>

<html>
    
    <head>
        <meta charset="UTF-8">
        <title>main</title>
        <script src="../js/jquery-3.1.1.min.js"></script>
        <script src="../lightbox2-master/dist/js/lightbox.min.js"></script>
        <link href="../lightbox2-master/dist/css/lightbox.min.css" rel="stylesheet">
        <script>
    lightbox.option({
      'resizeDuration': 100,
      'wrapAround': true
    })
</script>
    </head>
    <body>
        <h2>ยินดีต้อนรับ</h2>
        <p><?php echo 'คุณ '.$s_login_username;?> อีเมล <?php echo   $s_login_email ;?></p>
        <h1>เมนูหลัก</h1>
        <p>
            <a href="frm_news.php">เพิ่มข่าว</a>
        </p>
        <br>
        <table border="1px">
        <tr>
            <td>รหัสข่าว</td>
            <td>หัวข้อข่าว</td>
             <td>สถานะ</td>
            <td>วันที่ประกาศ</td>
            <td>ไฟล์แนบ</td>
            <td>ประเภทข่าว</td>
            <td>แก้ไขข่าว</td>
              <td>ลบข่าว</td>
    </tr>
    <?php while($row_news = mysqli_fetch_array($res_new,MYSQLI_ASSOC)){
    ?>
    <tr>
            <td><?php   echo $row_news['news_id']; ?></td>
            <td><?php   echo $row_news['news_topic']; ?></td>
             <td><?php 
                        if($row_news['news_status']==0){
                                echo 'ข่าวทั่วไป'; 
                            }else{    
                                echo 'ข่าวเด่น';
                                
                   }?>
             </td>
             
            <td><?php   echo $row_news['news_date']; ?></td>
            
            <td>
                <a data-lightbox="<?php echo $row_news['news_filename']; ?>" data-title="<?php echo $row_news['news_filename']; ?>"  href="../news_image/<?php echo $row_news['news_filename']; ?>" target="_blank"><?php   echo $row_news['news_filename'];?>
                </td>
            
            <td><?php   echo $row_news['newstype_detail']; ?></td>
            <td><a href="frm_update_news.php?id=<?= $row_news['news_id']; ?>">แก้ไขข่าว</a></td>
            <td><a href="delete_news.php?id=<?= $row_news['news_id']; ?>">ลบข่าว</a></td>
    </tr>
    <?php }?>   
        </table>
        
        <hr>
         
        
        <a href="logout.php">ออกจากระบบ</a>
    
    
    </body>
</html>
