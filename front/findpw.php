<fieldset>
    <legend>忘記密碼</legend>
    <div>請輸入信箱以查詢密碼</div>
    <div><input type="text" name="email" id="email"></div>
    <div id="result"></div>
    <div><button id="find">尋找</button></div>
</fieldset>
<script>
$("#find").on("click",function(){

 //取得email欄位的資料   
 let email=$("#email").val()

 //使用ajax將email資料傳送出去
 $.post("./api/findpw.php",{email},function(res){

     //將回傳的內容寫入到隱藏的div中
     $("#result").html(res)
 })
})
</script>