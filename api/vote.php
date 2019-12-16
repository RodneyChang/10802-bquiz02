<?php
include_once "../base.php";

//接受表單傳來的選項id
$optId=$_POST['opt'];

//取得該選項的資料
$opt=find("que",$optId);

//取得題目的id
$parent=$opt['parent'];

//取得題目的資料
$par=find("que",$parent);

//對選項及題目都做計數的更新
$opt['count']=$opt['count']+1;
$par['count']=$par['count']+1;

//存回資料表
save("que",$opt);
save("que",$par);

to("../index.php?do=result&id=$parent")
?>