function shortenUrl(o){$.ajax({type:"POST",url:"http://akii.tk/api.php",data:{key:"{{env('USER_KEY')}}",link:o},success:function(o){null!=o?(flag=!1,result=JSON.parse(o),$("#originLink").val(result.message),$("#originLink").on("keydown",function(){$("#shorten").text("SHORTEN")}),$("#shorten").text("Copy"),$("#shorten").on("click",function(){""!==$("#originLink").val()&&"Copy"==$("#shorten").text()&&($("#originLink").val(),$("#originLink").select(),document.execCommand("Copy"),$.bootstrapGrowl("<strong>Copied!</strong>",{ele:"body",type:"success",width:"auto",delay:2e3,allow_dismiss:!1}))})):($("#originLink").val(""),$("#shorten").text("Shorten"),$.bootstrapGrowl("<strong>Error: Invalid Url !</strong>",{ele:"body",type:"error",width:"auto",delay:2e3,allow_dismiss:!1}))}})}$("#shorten").on("click",function(){""!==$("#originLink").val()&&"SHORTEN"==$("#shorten").text()&&($("#shorten").text("Loading..."),shortenUrl($("#originLink").val()))});