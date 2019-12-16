<fieldset>
    <legend>帳號管理</legend>
    <form action="./api/usermanage.php" method="post">
    <table class="ct" style="width:60%;margin:auto">
        <tr>
            <td>帳號</td>
            <td>密碼</td>
            <td>刪除</td>
        </tr>
        <?php

            //取出全部的會員帳號資料
            $user=all("user");

            //以迴圈方式逐一列出所有會員
            foreach($user as $u){

                //排除管理者帳號不能被顯示及刪除
                if($u['acc']!="admin"){
        ?>
        <tr>
            <td><?=$u['acc'];?></td>
            <!--使用字元重覆函式來顯示密碼-->
            <td><?=str_repeat("*",strlen($u['pw']));?></td>
            <td><input type="checkbox" name="del[]" value="<?=$u['id'];?>"></td>
        </tr>
        <?php
                }
            }
        ?>
    </table>
    <div class="ct"><input type="submit" value="確定刪除"><input type="reset" value="清空選取"></div>
</form>

<!--將註冊會員的頁面html碼及javascript放到這裏-->
<h1>新增會員</h1>
<form>
    <table>
        <tr>
            <td colspan="2" style="color:red">*請設定您要註冊的帳號及密碼(最長12個字元)</td>
        </tr>
        <tr>
            <td>Step1:登入帳號</td>
            <td><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td>Step2:登入密碼</td>
            <td><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td>Step3:再次確認密碼</td>
            <td><input type="password" name="pw2" id="pw2"></td>
        </tr>
        <tr>
            <td>Step4:信箱(忘記密碼時使用)</td>
            <td><input type="text" name="email" id="email"></td>
        </tr>
        <tr>
            <td colspan="2">
            <input type="button" value="註冊" id="reg"><input type="reset" value="清除">
            </td>
        </tr>
    </table>
    </form>
</fieldset>

<script>
$("#reg").on("click",function(){

    //取得輸入欄位的資料
    let acc=$("#acc").val()
    let pw=$("#pw").val()
    let pw2=$("#pw2").val()
    let email=$("#email").val()

    //依序判斷是否有欄位空白及密碼欄位不相等，彈出相應的訊息
    if(acc=="" || pw=="" || pw2=="" || email==""){

        alert("不可空白")

    }else{

        if(pw!=pw2){

            alert("密碼錯誤")

        }else{

            //傳送帳號訊息進行檢查
            $.post("./api/chkacc.php",{acc},function(status){
                if(status==='1'){

                    alert("帳號重覆")

                }else{

                    //傳送完整資料進行註冊
                    $.post("./api/reg.php",{acc,pw,email},function(res){

                        if(res==='1'){
                            location.reload();
                            alert("新增完成，歡迎加入")
                        }
                    })
                }
            })
        }
    }
})
</script>