
<fieldset>
    <legend>目前位置：首頁 > 問卷調查</legend>

    <table>
        <tr>
            <td width="10%">編號</td>
            <td>問卷題目</td>
            <td width="10%">投票總數</td>
            <td width="10%">結果</td>
            <td width="10%">狀態</td>
        </tr>
        <?php
        $que=all("que",["parent"=>0]);
        foreach($que as $k => $q){
        ?>
        <tr>
            <td><?=$k+1;?>.</td>
            <td><?=$q['text'];?></td>
            <td><?=$q['count'];?></td>
            <td><a href="index.php?do=result&id=<?=$q['id'];?>">結果</a></td>
            <td>
            <?php
            if(!empty($_SESSION['user'])){
                echo "<a href='index.php?do=vote&id=".$q['id']."'>我要投票</a>";
            }else{
                echo "請先登入";
            }

            ?>
            </td>
        </tr>
        <?php
        }
        ?>
    </table>

</fieldset>