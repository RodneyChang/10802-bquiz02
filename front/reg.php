<fieldset>
    <legend>會員註冊</legend>
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
                            alert("註冊完成，歡迎加入")
                        }
                    })
                }
            })

        }

    }


})


</script>