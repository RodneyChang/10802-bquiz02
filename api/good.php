<?php
include_once "../base.php";

//取出文章的資料
$news=find("news",$_POST['id']);

//根據type的值來決定是要新增紀錄還是刪除紀錄
if($_POST['type']=='1'){

    //建立一個log陣列來儲存前端傳過來的資料
    $log['news']=$_POST['id'];
    $log['user']=$_POST['user'];

    //儲存log陣列的內容進log資料表
    save("log",$log);

    //將文章的good欄位資料+1
    $news['good']=$news['good']+1;

}else{

    //建立一個log陣列來儲存前傳過來的資料
    $log['news']=$_POST['id'];
    $log['user']=$_POST['user'];

    //在log資料表中刪除符合log陣列資料的紀錄
    del("log",$log);

    //判斷文章的good欄位是不是小於0，如果不是的話就-1，如果小於0的話就維持0
    $news['good']=($news['good']>0)?$news['good']-1:0;
}

//將更新過的文章資料存回news資料表
save("news",$news);

?>