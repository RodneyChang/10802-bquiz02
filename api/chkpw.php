<?php include_once "../base.php";

//接收前端傳送過來的帳號及密碼
$acc=$_POST['acc'];
$pw=$_POST['pw'];

//檢查資料庫中是否有這筆帳號資料
$chk=nums("user",["acc"=>$acc,"pw"=>$pw]);

////回傳檢查狀態
if($chk>0){
    echo 1;
}else{
    echo 0;
}


?>