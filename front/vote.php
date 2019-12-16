<fieldset>
<?php
    //接收題目的id
    $id=$_GET['id'];

    //取得題目的資料
    $subject=find("que",$id);
?>
    <legend>目前位置：首頁 > 問卷調查 > <span><?=$subject['text'];?></span></legend>
    <h3><?=$subject['text'];?></h3>
    <form action="./api/vote.php" method="post">
    <ul style="list-style-type:none">
    <?php

    //取得題目的所有選項
    $options=all("que",["parent"=>$id]);

    //列出所有選項
    foreach($options as $opt){
        echo "<li>";
        echo "<input type='radio' name='opt' value='".$opt['id']."'>";
        echo $opt['text'];
        echo "</li>";
    }
    ?>
    
    </ul>
    <div class="ct"><input type="submit" value="我要投票"></div>
    </form>
</fieldset>