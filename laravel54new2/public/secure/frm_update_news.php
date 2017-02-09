<!DOCTYPE html>
<?php include 'connectdb.php';
     $news_id = $_GET['id'];
     
     $sql = "SELECT * FROM tbnews WHERE news_id = '$news_id'";
     $res_news = mysqli_query($dbcon, $sql);
     $row_news = mysqli_fetch_assoc($res_news);
     
     
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>แก้ไขข่าว</title>
          <style>
            label {
                display: block
            }
            
        </style>
        <script src="../ckeditor/ckeditor.js" ></script>
    </head>
    <body>
        <h1>แก้ไขรายละเอียดข่าว รหัส <?php echo $news_id;?></h1>
        <form id="form1"action="update_news.php" method="post" enctype="multipart/form-data">
            <label for="newstype">เลือกประเภทข่าว</label>
            
            <select name="newstype">
                
                <?php 
                $sqlnews_type = "SELECT * FROM tbnewstype";
                $res_newstype = mysqli_query($dbcon, $sqlnews_type);
                while($row_newstype = mysqli_fetch_array($res_newstype)){
                    if($row_newstype['newstype_id']==$row_news['newstype_id']){
                             echo '<option value="'.$row_newstype['newstype_id'].' selected">'.$row_newstype['newstype_detail'].'</option>';
                    }else{
                    echo '<option value="'.$row_newstype['newstype_id'].'">'.$row_newstype['newstype_detail'].'</option>';
                }
                }
                ?>
            </select>
            
                <br><br>
                
                <label for="news_topic">หัวข้อข่าว</label>
                <input type="text" name="news_topic" value="<?php echo $row_news['news_topic'];?>" size = "80px" required >
                
                  <label for="news_detail"  >เนื้อหาข่าว</label>
                  <textarea name="news_detail" id="news_detail" rows="10" cols="80" >
                      <?php echo $row_news['news_detail'];?>
                  </textarea>
                      <script>
                         CKEDITOR.replace( 'news_detail', {
                                language: 'th',
                                uiColor: '#8DAAB1',
                                width: 600
                                }); 
                  </script>
                  
                  <br>
                  
                  <label for="news_filename">ภาพประกอบข่าว</label>
                  <a href="../news_image/<?php echo $row_news['news_filename']; ?>" target="_blank"><?php echo $row_news['news_filename']; ?></a>
                  <br>
                  <img src="../news_image/<?php echo $row_news['news_filename']; ?>" height="85" width="85">
                  
                  <input type="file" name="news_filename" >
                
                  
                  <label for="news_status">สถานะข่าว</label>
                  <?php
                 
                 if($row_news['news_status']=='0'){?>
                     <input type="radio" value="0" checked name="news_status">ข่าวทั่วไป<br>
                     <input type="radio" value="1"    name="news_status"> ข่าวเด่น<br>
                 <?php  }else{?>
                <input type="radio" value="0" name="news_status">ข่าวทั่วไป<br>
                  <input type="radio" value="1"  checked  name="news_status"> ข่าวเด่น<br>
                   <?php }?>
                  <input type="submit" value="บันทึก">
               
                  <input type="hidden" name="news_id" value="<?php echo $row_news['news_id']; ?>"
          
            </select>
        </form>
    </body>
</html>
