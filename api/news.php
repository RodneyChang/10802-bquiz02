<?php
include_once "../base.php";

//以迴圈的方式來檢查表單送過來的每一筆資料
foreach($_POST['id'] as $id){

  if(!empty($_POST['del']) && in_array($id,$_POST['del'])){

      //刪除資料
      del("news",$id);
  }else{

      //設定是否顯示
      $data=find("news",$id);
      $data['sh']=(in_array($id,$_POST['sh']))?1:0;
      save("news",$data);
  }
}

to("../admin.php?do=news");
?>