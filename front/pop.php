<?php

//建立一個分類文字陣列做為彈出視窗之用
$type=[1=>"健康新知",2=>"菸害防制",3=>"癌症防治",4=>"慢性病防治"];

//建立分頁需要的相關變數及語法
$total=nums("news",["sh"=>1]);
$div=5;
$pages=ceil($total/$div);
$now=(!empty($_GET['p']))?$_GET['p']:1;
$start=($now-1)*$div;
$rows=all("news",["sh"=>1]," order by good desc limit $start,$div");

?>
<div>目前位置：首頁 > 人氣文章區</div>
<table>
    <tr>
        <td width="25%">標題</td>
        <td width="50%">內容</td>
        <td>人氣</td>
    </tr>
  <?php

  //用迴圈印出每一篇文章內容
    foreach($rows as $r){
  ?>
    <tr>
        <td class="clo title"  style="color:blue;cursor:pointer"><?=$r['title'];?></td>
        <td class="content">
        <!--利用隱藏的區塊來放置完整的文章內容，滑鼠滑入時才顯示-->
        <div class="alert">
              <?php
                echo "<div class='poptitle'>".$type[$r['type']]."</div>";
                echo nl2br($r['text']);
              ?>
            </div>
            
            <!--只顯示單行內容-->
            <div class="line"><?=mb_substr($r['text'],0,20,"utf8");?>...</div>

        </td>
        <td>
        <!--印出按讚的人數，加入js需要的id值-->
        <span id="vie<?=$r['id'];?>"><?=$r['good'];?></span>個人說<img src="./icon/02B03.jpg" style="width:15px">
        <?php

            //依據session來決定要顯示讚或是收回讚
            if(!empty($_SESSION['user'])){
            
              //檢查log資料表中是否有會員對此篇文章的按讚紀錄
              $chk=nums("log",["news"=>$r['id'],"user"=>$_SESSION['user']]);

              if($chk>0){  //有按讚紀錄時顯示收回讚的文字及相關的屬性內容
            ?>
              <a id="good<?=$r['id'];?>" onclick="good('<?=$r['id'];?>','2','<?=$_SESSION['user'];?>')">收回讚</a>
            <?php
              }else{  //沒有按讚紀錄時顯示讚的文字及相關的屬性內容
            ?>
              <a id="good<?=$r['id'];?>" onclick="good('<?=$r['id'];?>','1','<?=$_SESSION['user'];?>')">讚</a>
            <?php
              }
            }
            ?>  
        </td>
    </tr>
  <?php
    }
  ?>
</table>
<div>
<?php
//建立分頁的相關連結
if(($now-1)>0){
    echo "<a href='index.php?do=pop&p=".($now-1)."'> < </a>";
}

for($i=1;$i<=$pages;$i++){
    $fontSize=($i==$now)?"24px":"16px";
    echo "<a href='index.php?do=pop&p=$i' style='font-size:$fontSize'> $i </a>";
}

if(($now+1)<=$pages){
    echo "<a href='index.php?do=pop&p=".($now+1)."'> > </a>";
}

?>
</div>


<script>

//標題區的滑鼠滑入事件
$(".title").hover(
  function(){
    $(this).next("td").children(".alert").toggle();
  },
  function(){
    $(this).next("td").children(".alert").toggle();
  }
)

//內容區的滑鼠滑入事件
$(".content").hover(
  function(){
    $(this).children(".alert").toggle();
  },
  function(){
    $(this).children(".alert").toggle();
  }
)

</script>