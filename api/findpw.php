<?php include_once "../base.php";

//取得前端傳送過來的email資料
$email=$_POST['email'];

//從資料表中取得符合的資料
$user=find("user",["email"=>$email]);

//根據資料的有無來回傳訊息字串
if(!empty($user)){

    echo "您的密碼為：".$user['pw'];
}else{
    echo "查無此資料";
}


?>