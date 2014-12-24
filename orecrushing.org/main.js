/**
 * @author wubiao
 */
// JavaScript Document
$(function() {

    //menu dropdown
    $('.sub-menu').parent().mouseenter(function() {

        /*  if (!$(this).siblings().children().is(':animated')) {

         $(this).children('.sub-menu').slideDown();
         }*/
        
        $(this).children('.sub-menu').slideDown();
    }).mouseleave(function() {
        $(this).children('.sub-menu').hide();
    });
 
    //slides photo 带响应式效果

    function slide() {
        var width;
        width = $('.slider').width();
        $('.slides img').css('width', width);
        //alert(width);

        setInterval(function() {
            width = $('.slider').width();
            $(".flex-viewport ul.slides").animate({
                'left' : '-=' + width + 'px'
            }, function() {
                $('.slides').children().first().appendTo('.slides');
                $('.slides ').css('left', '+=' + width + 'px');
            });
        }, 5000);
        $('.flex-next').click(function() {
            if ($(".slides").is(":animated")) {
                return;
            }
            width = $('.slider').width();
            $(".flex-viewport ul.slides").animate({
                'left' : '-=' + width + 'px'
            }, function() {
                $('.slides').children().first().appendTo('.slides');
                $('.slides ').css('left', '+=' + width + 'px');
            });
        });
        $('.flex-prev').click(function() {

            if ($(".slides").is(":animated")) {
                return;
            }
            width = $('.slider').width();
            $('.slides').children().last().prependTo('.slides');
            $('.slides ').css('left', '-=' + width + 'px');
            $(".flex-viewport ul.slides").animate({
                'left' : '+=' + width + 'px'
            });
        });

        $(window).resize(function() {
            var width = $('.slider').width();
            $('.slides img').css('width', width);
        });

    }

    slide();
    //select change
    $('select').change(function() {
        //alert('change');

        window.location.href = $('option:selected').val();

    });
	
	
  
	
});
