<!DOCTYPE html>
<?php include 'connectdb.php';
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>เพิ่มข่าว</title>
          <style>
            label {
                display: block
            }
            
        </style>
        <script src="../ckeditor/ckeditor.js" ></script>
    </head>
    <body>
        <h1>เพิ่มข่าว</h1>
        <form id="form1"action="insert_news.php" method="post" enctype="multipart/form-data">
            <label for="newstype">เลือกประเภทข่าว</label>
            <select name="newstype">
                <option value="">--กรุณาเลือกประเภทข่าว--</option>
                <?php 
                $sqlnews_type = "SELECT * FROM tbnewstype";
                $res_newstype = mysqli_query($dbcon, $sqlnews_type);
                while($row_newstype = mysqli_fetch_array($res_newstype)){
                    echo '<option value="'.$row_newstype['newstype_id'].'">'.$row_newstype['newstype_detail'].'</option>';
                }
                ?>
            </select>
                <br><br>
                
                <label for="news_topic">หัวข้อข่าว</label>
                <input type="text" name="news_topic" required>
                
                  <label for="news_detail">เนื้อหาข่าว</label>
                  <textarea name="news_detail" id="news_detail" rows="10" cols="80"></textarea>
                      <script>
                         CKEDITOR.replace( 'news_detail', {
                                language: 'th',
                                uiColor: '#8DAAB1',
                                width: 600
                                }); 
                  </script>
                  
                  
                  <label for="news_filename">ภาพประกอบข่าว</label>
                  <input type="file" name="news_filename">
                  <label for="news_status">สถานะข่าว</label>
                  
                  <input type="radio" value="0" checked name="news_status">ข่าวทั่วไป<br>
                  <input type="radio" value="1" name="news_status"> ข่าวเด่น<br>
                  <input type="submit" value="บันทึก">
                 
                  
          
            </select>
        </form>
    </body>
</html>
