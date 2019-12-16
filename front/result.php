<style>
/*設定結果頁樣式*/
.result{
    list-style-type:none;
    padding:0;
}
.result li{
    margin:10px 0;
}
.opt,.line,.rate{
    display:inline-block;
    margin:0.5%;
}
.opt{
    width:40%;
}
.line{
    height:30px;
    background:#ccc;
    vertical-align:middle;
}
.rate{
    width:11%;
}
</style>
<fieldset>
<?php
    //接收題目的id
    $id=$_GET['id'];

    //取得題目的資料
    $subject=find("que",$id);

    //判斷題目的投票數是否為0
    $votes=($subject['count']>0)?$subject['count']:1;
?>
    <legend>目前位置：首頁 > 問卷調查 > <span><?=$subject['text'];?></span></legend>
    <h3><?=$subject['text'];?></h3>

    
    <ul class='result'>
    <?php

    //取得題目的所有選項
    $options=all("que",["parent"=>$id]);

    //列出所有選項
    foreach($options as $k => $opt){

        //計算此選項的票數佔比
        $rate=round(($opt['count']/$votes)*100)/100;
        echo "<li>";
        echo "<div class='opt'>".($k+1).".".$opt['text']."</div>";

        //以45%的長度來計算長條要呈現的真實長度
        echo "<div class='line' style='width:".(45*$rate)."%' ></div>";
        echo "<div class='rate'>".$opt['count']."票(".($rate*100)."%)</div>";
        echo "</li>";
    }
    ?>
    
    </ul>
                    <!--以內嵌js的方式來讓按鈕有導頁的效果-->
    <div class="ct"><button onclick="javascript:location.href='index.php?do=que'">返回</button></div>
    
</fieldset>