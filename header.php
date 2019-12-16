<?php

//判斷session的有無來決定如何取得瀏灠人次
if (empty($_SESSION['total'])) {

    //檢查是否當日日期的資料存在
    $chkdate = nums("total", ["date" => date("Y-m-d")]);
    if ($chkdate > 0) {

        //取出當日的瀏灠人次資料
        $total = find("total", ["date" => date("Y-m-d")]);

        //瀏灠人次資料加1，並建立session紀錄人次
        $_SESSION["total"] = $total['total'] + 1;

        //瀏灠人次資料加1後，更新回瀏灠人次資料並存回資料表
        $total['total'] = $total['total'] + 1;
        save("total", $total);
    } else {

        //若無當日資料，則建立當日資料，並將瀏灠人次設為1
        $total = ["date" => date("Y-m-d"), "total" => 1];
        $_SESSION["total"] = 1;
        save("total", $total);
    }
}

//建立計算總人次的語法並取得資料
$sum = q("select sum(`total`) from `total`");

?>
<div id="title">
    <!--以date()函式顯示當日的日期-->
    <!--以session來秀出當日瀏灠人次-->
    <!--取出總人次資料-->
    <?=date("m 月 d 號 l");?> | 今日瀏覽: <?=$_SESSION['total'];?> | 累積瀏覽: <?=$sum[0][0];?>
<a href="index.php" style="display:inline-block;float:right">回首頁</a>
</div>
<div id="title2">
    <img src="./icon/02B01.jpg" style="width:100%">
</div>