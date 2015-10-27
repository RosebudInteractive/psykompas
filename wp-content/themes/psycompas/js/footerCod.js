// JavaScript Document
jQuery(document).ready(function($){

/*============== Footer Behaviors ====================*/

    // footer tabs behavior
    $('li.footer_banner_box:first-of-type').addClass('activeTab');
    $('#tab02_container').hide();
    $('#tab03_container').hide();
    $('li.footer_banner_box').click(function() {
        $(this).addClass('activeTab').siblings().removeClass('activeTab');
        $('#'+this.id.split('-')[1]+'_container').fadeIn('slow', 'easeInOutSine');
        $('#'+this.id.split('-')[1]+'_container').siblings().hide('slow', 'easeInOutSine');
    });

    // featured articles button behaviors
    $('a.faBtn.prev').click(function(){
        $('article.featured_article').stop(true, true).animate({ left: 0 }, 500);
        $(this).next().css('opacity', '1').prev().css('opacity', '0.3');
    });
    $('a.faBtn.next').click(function(){
        $('article.featured_article').stop(true, true).animate({ left: -690 }, 500);
        $(this).prev().css('opacity', '1').next().css('opacity', '0.3');
    });
    /*============== END Footer Behaviors ====================*/

});