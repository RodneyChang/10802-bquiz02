<?php
include_once "../base.php";

//先判斷是否有del這個陣列傳送過來
if(!empty($_POST['del'])){

    //以迴圈的方式取出del陣列中的id值
    foreach($_POST['del'] as $id){

        //刪除該筆資料
        del("user",$id);
    }
}

//回到帳號管理
to("../admin.php?do=user");

?>