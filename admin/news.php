<fieldset>
  <legend>最新文章管理</legend>
  <form action="./api/news.php" method="post">
    <table class="ct" style="width:80%;margin:10px auto;">
      <tr>
        <td width="10%">編號</td>
        <td>標題</td>
        <td width="10%">顯示</td>
        <td width="10%">刪除</td>
      </tr>
      <?php
      //建立分頁所需要的各項變數
      $total=nums("news");
      $div=3;
      $pages=ceil($total/$div);
      $now=(!empty($_GET['p']))?$_GET['p']:1;
      $start=($now-1)*$div;

      $news=all("news",[]," limit $start,$div");
      foreach($news as $key => $n){
      ?>
      <tr>
        <!--利用$start及迴圈的索引值$key來計算每一頁的編號值-->
        <td><?=$start+1+$key;?>.</td>
        <td><?=$n['title'];?></td>
        <td><input type="checkbox" name="sh[]" value="<?=$n['id'];?>" <?=($n['sh']==1)?"checked":"";?>></td>
        <td><input type="checkbox" name="del[]" value="<?=$n['id'];?>"></td>
        <input type="hidden" name="id[]" value="<?=$n['id'];?>">
      </tr>
      <?php
      }
      ?>
    </table>
  <div class="ct">
  
  <?php

  //分頁連結
  if(($now-1)>0){
    echo "<a href='admin.php?do=news&p=".($now-1)."'> < </a>";
  }

  for($i=1;$i<=$pages;$i++){
      $fontSize=($now==$i)?"24px":"18px";
    echo "<a href='admin.php?do=news&p=$i'> $i </a>";

  }

  if(($now+1)<=$pages){
    echo "<a href='admin.php?do=news&p=".($now+1)."'> > </a>";
  }

  ?>
  
  
  </div>
  <div class="ct"><input type="submit" value="確定修改"></div>
  </form>
</fieldset>