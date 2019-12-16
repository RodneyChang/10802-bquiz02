<?php
include "../base.php";

//判斷是否有題目送出，如果題目是空的則不做任何處理，直接導回問卷管理
if(!empty($_POST['subject'])){

    //設定好題目所需的欄位資料並存入$subject陣列中
    $subject['text']=$_POST['subject'];
    $subjet['parent']=0;
    $subject['count']=0;

    //儲存題目
    save("que",$subject);

    //取出que資料表中的最大id值，理論上會是剛才存入的題目id
    $parent=q("select max(`id`) from que")[0][0];

    //以迴圈對選項進行處理
    foreach($_POST['option'] as $key => $opt){

        //設定好題目所需的欄位資料並存入$option陣列中
        $option['text']=$opt;

        //設定此選項所屬的題目id
        $option['parent']=$parent;
        $option['count']=0;

        //儲存選項
        save("que",$option);
    }
}

to("../admin.php?do=que");

?>