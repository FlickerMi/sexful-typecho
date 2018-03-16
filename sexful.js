/*文章目录锚*/
function genAnchorContent(){
    var index=0;
    $("#AnchorContent").empty();
    $(".post-content").find("h2,h3,h4,h5,h6").each(function(i,item){
        var tag = $(item).get(0).localName;
        if(tag=="h2")index++;
        $(item).attr("id","wow"+i);
        $("#AnchorContent").append('<li><a class="new'+tag+' anchor-link" onclick="return false;" href="#" link="#wow'+i+'">'+(tag=="h2"?index:"")+" · "+$(this).text()+'</a></li>');
        $(".newh2").css("margin-left",0);
        $(".newh3").css("margin-left",20);
        $(".newh4").css("margin-left",40);
        $(".newh5").css("margin-left",60);
        $(".newh6").css("margin-left",80);
    });
    $(".anchor-link").click(function(){
        $("html,body").animate({scrollTop: $($(this).attr("link")).offset().top}, 1000);
    });
    //如果有分级，修改样式，显示目录
    if(index>0){
        var blogAnchor=document.getElementById("BlogAnchor");
        blogAnchor.style.display="flex";
    }
    //归档
    //$('.car-collapse').find('.car-monthlisting').hide();
    $('.car-collapse').find('.car-monthlisting:first').show();
    $('.car-collapse').find('.car-yearmonth').click(function() {
        $(this).next('ul').slideToggle('fast');
    });
    $('.car-collapse').find('.car-toggler').click(function() {
        if ( '展开全部[+]' == $(this).text() ) {
            $(this).parent('.car-container').find('.car-monthlisting').show();
            $(this).text('折叠全部[+]');
        }
        else {
            $(this).parent('.car-container').find('.car-monthlisting').hide();
            $(this).text('展开全部[+]');
        }
        return false;
    });
    var pre = document.getElementsByTagName('pre');for(i=0,l=pre.length;i<l;i++) pre[i].className += " prettyprint linenums";prettyPrint();
    
    $('.post-content a[href$="http://notemi.cn"]').each(function(){
        $(this).attr('target', '_blank');
    });
        
    $("#navcontrol").click(function(){          
        $("#content").toggleClass("allwidth");
        $("#container").toggleClass("minContainer");
        $("#secondary").toggleClass("hidden");  
    }); 
}
jQuery(document).ready(function(){
	var $=jQuery; 	
	//genAnchorContent();
	InstantClick.on('change', function(isInitialLoad) {
		if (isInitialLoad === false) {
			if (typeof cnzz_protocol !== 'undefined') {
				_czc.push([ "_trackPageview",location.pathname + location.search]);
			}
		}
		$('#scrollUp').click(function (e) {
			$('html,body').animate({ scrollTop:0});
		});
		genAnchorContent();
		$(window).scroll(function(){   
			var h_num=$(window).scrollTop();
			h_num > 500 ? $("#scrollUp").fadeIn(200).css("display","block") : $("#scrollUp").fadeOut(200);
			if($(".widget-comment").length>0){
				var top = $(".widget-comment").position().top;		
				if(h_num>top+180){   
					$('.fixedDiv').addClass('fixer');       
				}else{   
					$('.fixedDiv').removeClass('fixer');            
				}  
			}		
		});
	});
	InstantClick.init();	 
});