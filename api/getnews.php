<?php include_once "../base.php";

//取得前台傳遞過來的文章id
$id=$_GET["newsid"];

//從資料表中取得文章資料
$news=find("news",$id);

//印出文章內容，使用nl2br()函式來將斷行符號轉換成網頁用的斷行標籤<br>
echo nl2br($news["text"]);

?>