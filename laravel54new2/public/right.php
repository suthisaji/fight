
<div class="uk-width-medium-1-4">
    <?php if(isset($_SESSION['is_member'])){
        ?>
    
    <div class="uk-panel">
        <h3 class="uk-panel-title">ข้อมูลสมาชิก</h3>
        <P>ยินดีต้อนรับคุณ <?php echo ' '.$_SESSION['login_username'];?> </P>
   
    </div>
         <?php } ?>
    <?php 
     $sql2="SELECT * FROM tbnewstype";
$res_newstype = mysqli_query($dbcon, $sql2);
    ?>
        
        
                       <div class="uk-panel">
                        <h3 class="uk-panel-title">ข่าวทั่วไป</h3>
                        <ul class="uk-list uk-list-line">
                       <?php      while($row_newstype = mysqli_fetch_array($res_newstype,MYSQLI_ASSOC)){ ?>
                            <li><a href="news.php?newstype_id=<?php echo $row_newstype['newstype_id'];?>"> <?php   echo $row_newstype['newstype_detail']; ?></a></li>
                                
                          <?php }?>
                        </ul>
                    </div>
                    
                    
                    
                </div>
