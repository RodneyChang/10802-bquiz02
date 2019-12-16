<fieldset>
    <legend>新增問卷</legend>
    <form action="./api/createque.php" method="post">
        <table>
            <tr>
                <td width="40%">問卷名稱</td>
                <td><input type="text" name="subject"></td>
            </tr>
            <tr>
                <td colspan="2" id="options">
                 <div>
                    選項<input type="text" name="option[]">
                        <input type="button" value="更多" onclick="moreOpt()">
                 </div>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="新增">|<input type="reset" value="清空">
                </td>
            </tr>
        </table>
    </form>
</fieldset>
<script>
//建立更多選項函式
function moreOpt(){

    //建立選項字串
    let str=`<div>選項<input type="text" name="option[]"></div>`

    //以prepend的方式將字串插入到指定的位置去
    $("#options").prepend(str)
}
</script>