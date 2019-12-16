<?php include_once "../base.php";

//取得前台傳來的分類
$type=$_GET['type'];

//取得所有該分類的文章
$news=all("news",["type"=>$type]);

//建立一個list陣列來存放列表需要的內容，我們只需要id,和title兩個欄位就夠了
foreach($news as $n){
    $list[]=["id"=>$n["id"],"title"=>$n["title"]];
}

//使用json格式來回傳list陣列的內容
echo json_encode($list);

?>