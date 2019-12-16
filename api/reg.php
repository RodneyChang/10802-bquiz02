<?php include_once "../base.php";

//取得前端傳過來的資料,並用陣列來儲存
$data['acc']=$_POST['acc'];
$data['pw']=$_POST['pw'];
$data['email']=$_POST['email'];

//將資料寫入資料庫並回傳狀態
echo save("user",$data);

?>