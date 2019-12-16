<style>
/*建立分類網誌頁面需要的css內容 */
fieldset{
    list-style-type:none;
    display:inline-block;
    vertical-align:top;
    padding:15px;
    margin-top:15px;
}
fieldset li{
    margin:10px 0;
    padding:5px;
    color:blue;
}
fieldset li:hover{
    background:skyblue;
    cursor:pointer;
}
.typelist{
    width:15%;
}
.newslist{
    width:70%;
}
.list div{
    margin:5px 0;
    cursor:pointer;
    color:blue;

}
</style>
<!--建立前端需要的HTML內容，我們使用fieldset來整合區塊內容，並建立需要的各個區塊-->
<div>目前位置：首頁 > 分類網誌 > <span class="type"></span></div>
<fieldset class="typelist">
    <legend>分類網誌</legend>
    <li data-type="1">健康新知</li>
    <li data-type="2">菸害防制</li>
    <li data-type="3">癌症防治</li>
    <li data-type="4">慢性病防治</li>
</fieldset>
<fieldset class="newslist">
    <legend>文章列表</legend>
    <div class="list"></div>
    <div class="post"></div>
</fieldset>

<script>
//建立分類被點擊時的事件
$("li").on("click",function(){

    //取得分類的識別碼
    let type=$(this).data("type")

    //取得分類的文字
    let nav=$(this).html()

    //將分類文字寫入到導覽列的區塊中
    $(".type").html(nav)

    //更新文章列表區塊的標題文字
    $(".newslist legend").html("文章列表")

    //清空文章內容區塊的內容
    $(".post").html("")

    //執行自訂函式getList() 並將文章分類帶入參數
    getList(type)

})

//頁面載入完成後先執行一次getList()來取得分類1的文章列表
getList(1)

//建立一個函式來取得列表及文章內容
function getList(type){
  //向getlist.php 發出取得某分類文章列表的請求，並送出分類的識別碼
  $.get("./api/getlist.php",{type},function(list){

  //先清空列表區塊的內容
  $(".list").html("")

  //解析回傳的json內容
  list=JSON.parse(list)

  //把list的內容逐一加到列表區塊中
  list.forEach(function(post){

      //使用data-news的屬性來寫入文章id，供後續取得文章內容使用
      $(".list").append(`<div data-news="${post.id}">${post.title}</div>`)
  })

  //文章列表加入頁面後，需要再註冊列表區塊內容的點擊事件，之後才能觸發取得文章的行為
  $(".list div").on("click",function(){

  //取得文章id
  let newsid=$(this).data("news")

  //取得文章標題
  let title=$(this).html();

  //向getnews.php 發出取得某篇文章內容的請求，並送出文章的id
  $.get("./api/getnews.php",{newsid},function(news){

      //將標題文字寫入列表區塊的標題區
      $(".newslist legend").html(title)

      //清空列表區塊
      $(".list").html("")

      //在文章內容區塊中寫入回傳的文章內容
      $(".post").html(news)
  })
  })    
  })
}
</script>