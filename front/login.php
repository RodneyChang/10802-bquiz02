<fieldset>
    <legend>會員登入</legend>
    <form>
    <table>
        <tr>
            <td>帳號</td>
            <td><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td>密碼</td>
            <td><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td><input type="button" value="登入" id="login"><input type="reset" value="清除"></td>
            <td>
            <a href="?do=findpw">忘記密碼</a>｜<a href="?do=reg">尚未註冊</a>
            </td>
        </tr>
    </table>
    </form>
</fieldset>
<script>
$("#login").on("click",function(){
    let acc=$("#acc").val();
    let pw=$("#pw").val();

    $.post("./api/chkacc.php",{acc},function(status){
        if(status==='1'){
            //有此帳號
            $.post("./api/chkpw.php",{acc,pw},function(status){
                if(status==='1'){
                    //登入成功
                    if(acc=='admin'){
                        location.href="admin.php"
                    }else{
                        location.href="index.php"
                    }
                }else{
                    //登入失敗
                    alert("密碼錯誤")
                    $("#acc,#pw").val("")
                }
            })
        }else{
            //無此帳號
            alert("查無帳號")
            $("#acc,#pw").val("")
        }
    })
})


</script>