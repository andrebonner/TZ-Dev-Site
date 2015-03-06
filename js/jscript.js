$(function(){
	$("#order_file").hide();
	$("a[href='client_area.html']").click(function(e){
		var page = $(this).attr('href');
		
		$.ajax({
			type: 'Get',
			url: 'client_login.php', // go to client_login.php
			dataType: 'HTML',
			success: function(data)
			{
				if(data!=''){
					alert(data); // check if client is already login
					location.href='client_area.php';
				}
				else{
					$("body").prepend('<div id="login_box"></div><span id="close">X</span>');
					$("body").prepend('<div id="lean_overlay"></div>');
					
					$("#close").bind('click', function(e){
						$("#login_box").fadeOut('fast',function(){ 
							$("#login_box").remove();
						});
						$("#lean_overlay").fadeOut('slow',function(){ 
							$("#lean_overlay").remove();
						}); 
						$("#close").remove();
						//alert("Test");
						e.preventDefault();
					});
					
					$("#lean_overlay").fadeIn(300);
					$("#login_box").load(page);		
				}
			}
			
		// return result
		});
		
		

		e.preventDefault();
	});
	

	
	$("#order_browse").click(function(e){
		$("#order_file").click();		
	});
	
	$("a[class='popup']").click(function(e){
		// show popup
		var title = $(this).attr('title');
		var str1 = "div[id='";
		var str2 = "']";
		var obj1 = str1.concat(title, str2);
		$(obj1).show();
		
		e.preventDefault();
	});
	$("div[class='popupbox']").click(function(e){
		$(this).hide();
	});
});