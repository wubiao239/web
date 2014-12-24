// JavaScript Document
$(document).ready(function() {
	$("#pull").click(function(){
		$(".nav > ul").slideToggle();
		})
	$('.banner').carousel({
	  interval:3000
	})
	
	jQuery('.online').click(function(event){
		event.preventDefault();
		window.open('http://pkt.zoosnet.net/LR/Chatpre.aspx?id=PKT21646611&lng=en')
		
		
	});
	
	$(".drop").click(function(){
		$(this).addClass("active").next().slideToggle().parent().siblings().children(".left_sidebar ul").slideUp().prev().removeClass("active");
		return false;
	})
	$(".left_pull").click(function(){
		$(".left_sidebar > ul").slideToggle();
		})
	
	function hide(){
		if($('body').width()>680){
	 $('.sub-menu').parent().mouseenter(function() {
        
        $(this).children('.sub-menu').show();
    }).mouseleave(function() {
        $(this).children('.sub-menu').hide();
    });
	}
	if($('body').width()<=680){
		$('.sub-menu').parent().unbind('mouseenter');
	}
	}
	hide();
	
	$(window).resize(function(e) {
       hide();
	
    });
	
	
	


});