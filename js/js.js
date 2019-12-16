// JavaScript Document
function lo(th,url)
{
	$.ajax(url,{cache:false,success: function(x){$(th).html(x)}})
}

/**
 * 
 * @param {id} 文章id 
 * @param {type} 1是按讚，其它是收回讚 
 * @param {user} 會員帳號
 */
function good(id,type,user)
{
	$.post("./api/good.php",{"id":id,"type":type,"user":user},function()
	{
		if(type=="1")
		{
			$("#vie"+id).text($("#vie"+id).text()*1+1)
			$("#good"+id).text("收回讚").attr("onclick","good('"+id+"','2','"+user+"')")
		}
		else
		{
			$("#vie"+id).text($("#vie"+id).text()*1-1)
			$("#good"+id).text("讚").attr("onclick","good('"+id+"','1','"+user+"')")
		}
	})
}