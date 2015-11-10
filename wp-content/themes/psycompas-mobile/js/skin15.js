if(!Date.prototype.toISOString)
{
    Date.prototype.toISOString = function()
    {
        function pad(n) {return n < 10 ? '0' + n : n}
        return this.getUTCFullYear() + '-'
            + pad(this.getUTCMonth() + 1) + '-'
            + pad(this.getUTCDate()) + 'T'
            + pad(this.getUTCHours()) + ':'
            + pad(this.getUTCMinutes()) + ':'
            + pad(this.getUTCSeconds()) + 'Z';
    };
}
function getRandom(min,max)
{
    return((Math.floor(Math.random()*(max-min)))+min);
}
function onAfterSlide(prevSlide, currentSlide)
{
    var expando = $(this).get(0)[jQuery.expando];
    $("#slider_navigation_" + expando + " .slider_control").addClass("inactive");
    $("#" + $(currentSlide).attr("id") + "_content").fadeIn(200, function(){
        $("#slider_navigation_" + expando + " .slider_control").removeClass("inactive");
    });
}


// set width of logo image to 100% if larger than parent container dimension on window resize
function setLogoWidth() {
	
    var img_element = $(".header_left a img");
    var parentLogoContainer = $('.header_left');

    $(img_element).removeClass('logoWidth');

    if( $(img_element).width() > $(parentLogoContainer).width() )  {
        $(img_element).addClass('logoWidth');
    }
}


jQuery(document).ready(function($){

    jQuery("#page_logo").bind( "load", function($){
        jQuery('.header_left').css('visibility', 'visible');
    });

    jQuery('.header_left').css('visibility', 'visible');
    setLogoWidth();
    //mobile menu
    $(".mobile_menu select").change(function(){
        window.location.href = $(this).val();
        return;
    });

    $("#custom_content_menu").find("a").each( function() {
        var a = document.createElement("a");
        a.href = $(this).attr("href");

        if( a.pathname ==  $(location).attr( "pathname") )
        {
            $(this).parent().addClass( "selected" );
            $(this).parent().parents().each( function() {

                if( $(this).attr( "id" ) == 'custom_content_menu' )
                {
                    return false;
                }

                if( $(this).prop("tagName").toLowerCase() == 'li' )
                {
                    $(this).addClass( "selected" );
                }
            })
            return false;
        }
    })

    //image controls
    var currentControls;
    $(".gallery_box").hover(function(){
        var width = $(this).find("img").first().width();
        var height = $(this).find("img").first().height();
        currentControls = $(this).find(".controls");
        var currentControlsWidth = currentControls.outerWidth();
        var currentControlsHeight = currentControls.outerHeight();
        currentControls.stop();
        currentControls.css({
            "display": "block",
            "margin-left": (width/2-currentControlsWidth/2) + "px",
            "top": (height) + "px"
        });
        currentControls.animate({"top": (height/2-currentControlsHeight/2) + "px"},250,'easeInOutCubic');
    },function(){
        currentControls.stop();
        currentControls.css("display", "block");
        var height = $(this).find("img").first().height();
        currentControls.animate({"top": (height) + "px"},250,'easeInOutCubic', function(){
            $(this).css("display","none");
        });
    });

    //browser history
    $(".tabs .ui-tabs-nav a").click(function(){
        if($(this).attr("href").substr(0,4)!="http")
            $.bbq.pushState($(this).attr("href"));
        else
            window.location.href = $(this).attr("href");
    });
    $(".ui-accordion .ui-accordion-header").click(function(){
        $.bbq.pushState("#" + $(this).attr("id").replace("accordion-", ""));
    });

    //tabs box navigation
    $(".tabs_box_navigation").mouseover(function(){
        $(this).find("ul").removeClass("tabs_box_navigation_hidden");
    });
    $(".tabs_box_navigation a").click(function(){
        $(".tabs_box_navigation_selected .selected").removeClass("selected");
        $(this).parent().addClass("selected");
        $(this).parent().parent().parent().children('span').text($(this).text());
        $(this).parent().parent().addClass("tabs_box_navigation_hidden");
    });
    $(".contact_form .tabs_box_navigation a").click(function(event){
        event.preventDefault();
        $(this).parent().parent().parent().children("[type='hidden']").first().val($.trim($(this).text()));
    });

    //hashchange
    $(window).bind("hashchange", function(event){
        var hashSplit = $.param.fragment().split("-");
        var hashString = "";
        for(var i=0; i<hashSplit.length-1; i++)
            hashString = hashString + hashSplit[i] + (i+1<hashSplit.length-1 ? "-" : "");
        if(hashSplit[0].substr(0,7)!="filter=")
        {
            $('.ui-accordion .ui-accordion-header#accordion-' + decodeURIComponent($.param.fragment())).trigger("change");
            $(".tabs_box_navigation a[href='#" + decodeURIComponent($.param.fragment()) + "']").trigger("click");
            $('.ui-accordion .ui-accordion-header#accordion-' + decodeURIComponent(hashString)).trigger("change");
        }
        $('.tabs .ui-tabs-nav [href="#' + decodeURIComponent(hashString) + '"]').trigger("change");
        $('.tabs .ui-tabs-nav [href="#' + decodeURIComponent($.param.fragment()) + '"]').trigger("change");
        if(hashSplit[0].substr(0,7)!="filter=")
            $('.tabs .ui-accordion .ui-accordion-header#accordion-' + decodeURIComponent($.param.fragment())).trigger("change");
        $(".testimonials, .scrolling_list").trigger("updateSizesCustom");

        // get options object from hash
        var hashOptions = $.deparam.fragment();

        if(typeof(hashOptions.filter)!="undefined")
        {
            // apply options from hash
            $(".isotope_filters a").removeClass("selected");
            if($('.isotope_filters a[href="#filter='+hashOptions.filter+'"]').length)
                $('.isotope_filters a[href="#filter='+hashOptions.filter+'"]').addClass("selected");
            else
                $(".isotope_filters li:first a").addClass("selected");
            $(".gallery:not('.horizontal_carousel')").isotope(hashOptions);
        }

        //open gallery details
        if(location.hash.substr(1,21)=="gallery-details-close" || typeof(hashOptions.filter)!="undefined")
        {
            $(".gallery_item_details_list").animate({height:'0'},{duration:200,easing:'easeOutQuint', complete:function() {
                $(this).css("display", "none")
                $(".gallery_item_details_list .gallery_item_details").css("display", "none");
            }
            });
        }
        else if(location.hash.substr(1,15)=="gallery-details")
        {
            var detailsBlock = $(location.hash);
            $(".gallery_item_details_list .gallery_item_details").css("display", "none");
            detailsBlock.css("display", "block");
            var galleryItem = $("#gallery-item-" + location.hash.substr(17));
            detailsBlock.find(".prev").attr("href", (galleryItem.prevAll(":not('.isotope-hidden')").first().length ? galleryItem.prevAll(":not('.isotope-hidden')").first().find(".open_details").attr("href") : $(".gallery:not('.horizontal_carousel')").children(":not('.isotope-hidden')").last().find(".open_details").attr("href")));
            detailsBlock.find(".next").attr("href", (galleryItem.nextAll(":not('.isotope-hidden')").first().length ? galleryItem.nextAll(":not('.isotope-hidden')").first().find(".open_details").attr("href") : $(".gallery:not('.horizontal_carousel')").children(":not('.isotope-hidden')").first().find(".open_details").attr("href")));
            var visible=parseInt($(".gallery_item_details_list").css("height"))==0 ? false : true;
            var galleryItemDetailsOffset;
            if(!visible)
            {
                $(".gallery_item_details_list").css("display", "block").animate({height:detailsBlock.height()}, 500, 'easeOutQuint', function(){
                    $(this).css("height", "100%");
                    $(location.hash + " .image_carousel").trigger("updateSizesCustom");
                });
                galleryItemDetailsOffset = $(".gallery_item_details_list").offset();
                $("html, body").animate({scrollTop: galleryItemDetailsOffset.top-10}, 400);
            }
            else
            {
                galleryItemDetailsOffset = $(".gallery_item_details_list").offset();
                $("html, body").animate({scrollTop: galleryItemDetailsOffset.top-10}, 400);
                $(location.hash + " .image_carousel").trigger("updateSizesCustom");
            }
        }
    }).trigger("hashchange");

    /*================= START Window Resize Function ==========================*/

    $(window).resize(function(){
        $(".training_classes").accordion("resize");

        if($(".gallery:not('.horizontal_carousel')").length)
        {
            $(".gallery:not('.horizontal_carousel')").isotope({
                masonry: {
                    //columnWidth: 225,
                    gutterWidth: ($(".gallery:not('.horizontal_carousel')").width()>462 ? 30 : 12)
                }
            });
        }

        // adjust height of home boxes on window resize
        $('.home_box').css('height', 'auto');
        setBoxHeight();

        // set logo width on window resize
        setLogoWidth();
    });

    /*================= END Window Resize Function ==========================*/



    /*======================== START Fancybox sets ===============================*/

    // set width of fancybox based on dimensions of window
    function fancyboxDimensions(dimension) {

        var fancyWidth =  $(window).width()*0.75;
        var fancyHeight =  $(window).height()*0.75;

        if( $(window).width() > 500 ) {
            fancyWidth =  $(window).width()/4;
            fancyHeight =  $(window).height()/4;
        }

        if( dimension == 'width' ) {
            return fancyWidth;
        } else {
            return fancyHeight;
        }

    }

    $('li[onclick="location.href = \'?request_appointment=1\';"]').each( function(){

        $(this).attr("onclick", "");

        $(this).fancybox({
            'speedIn': 600,
            'speedOut': 200,
            'transitionIn': 'elastic',
            'width' : fancyboxDimensions('width'),
            'height' : fancyboxDimensions('height'),
            'autoScale' : false,
            'titleShow': false,
            'type' : 'iframe',
            'href': '?request_appointment=1'
        });

    });

    //fancybox
    $(".fancybox").fancybox({
        'speedIn': 600,
        'speedOut': 200,
        'transitionIn': 'elastic',
        'cyclic': 'true'
    });
    $(".fancybox-video").bind('click',function()
    {
        $.fancybox(
            {
                'autoScale':false,
                'speedIn': 600,
                'speedOut': 200,
                'transitionIn': 'elastic',
                'width':(this.href.indexOf("vimeo")!=-1 ? 600 : 680),
                'height':(this.href.indexOf("vimeo")!=-1 ? 338 : 495),
                'href':(this.href.indexOf("vimeo")!=-1 ? this.href : this.href.replace(new RegExp("watch\\?v=", "i"), 'embed/')),
                'type':'iframe',
                'swf':
                {
                    'wmode':'transparent',
                    'allowfullscreen':'true'
                }
            });
        return false;
    });
    /* -- Make Appointment Popup -- */
    $(".fancybox-appointment-iframe").fancybox({
        'speedIn': 600,
        'speedOut': 200,
        'transitionIn': 'elastic',
        'width' : fancyboxDimensions('width'),
        'height' : fancyboxDimensions('height'),
        'autoScale' : false,
        'titleShow': false,
        'type' : 'iframe'
    });

    /* -- Email Us Popup -- */
    $(".fancybox-emailus-iframe").fancybox({
        'speedIn': 600,
        'speedOut': 200,
        'transitionIn': 'elastic',
        'width' : fancyboxDimensions('width'),
        'height' : fancyboxDimensions('height'),
        'autoScale' : false,
        'titleShow': false,
        'type' : 'iframe'
    });

    /*======================== END Fancybox sets ===============================*/

    //contact form
    if($(".contact_form").length)
        $(".contact_form")[0].reset();
    $(".contact_form").submit(function(event){
        event.preventDefault();
        var data = $(this).serializeArray();
        $("#contact_form .block").block({
            message: false,
            overlayCSS: {
                opacity:'0.3',
                "backgroundColor": "#FFF"
            }
        });
        $.ajax({
            url: $(".contact_form").attr("action"),
            data: data,
            type: "post",
            dataType: "json",
            success: function(json){
                $("#contact_form [name='submit'], #contact_form [name='first_name'], #contact_form [name='last_name'], #contact_form [name='email'], #contact_form [name='message']").qtip('destroy');
                if(typeof(json.isOk)!="undefined" && json.isOk)
                {
                    if(typeof(json.submit_message)!="undefined" && json.submit_message!="")
                    {
                        $("#contact_form [name='submit']").qtip(
                            {
                                style: {
                                    classes: 'ui-tooltip-success'
                                },
                                content: {
                                    text: json.submit_message
                                },
                                position: {
                                    my: "right center",
                                    at: "left center"
                                }
                            }).qtip('show');
                        $(".contact_form")[0].reset();
                        $(".contact_form [name='department']").val("");
                        $(".contact_form .tabs_box_navigation_selected>span").text("Select department");
                    }
                }
                else
                {
                    if(typeof(json.submit_message)!="undefined" && json.submit_message!="")
                    {
                        $("#contact_form [name='submit']").qtip(
                            {
                                style: {
                                    classes: 'ui-tooltip-error'
                                },
                                content: {
                                    text: json.submit_message
                                },
                                position: {
                                    my: "right center",
                                    at: "left center"
                                }
                            }).qtip('show');
                    }
                    if(typeof(json.error_first_name)!="undefined" && json.error_first_name!="")
                    {
                        $("#contact_form [name='first_name']").qtip(
                            {
                                style: {
                                    classes: 'ui-tooltip-error'
                                },
                                content: {
                                    text: json.error_first_name
                                },
                                position: {
                                    my: "bottom center",
                                    at: "top center"
                                }
                            }).qtip('show');
                    }
                    if(typeof(json.error_last_name)!="undefined" && json.error_last_name!="")
                    {
                        $("#contact_form [name='last_name']").qtip(
                            {
                                style: {
                                    classes: 'ui-tooltip-error'
                                },
                                content: {
                                    text: json.error_last_name
                                },
                                position: {
                                    my: "bottom center",
                                    at: "top center"
                                }
                            }).qtip('show');
                    }
                    if(typeof(json.error_email)!="undefined" && json.error_email!="")
                    {
                        $("#contact_form [name='email']").qtip(
                            {
                                style: {
                                    classes: 'ui-tooltip-error'
                                },
                                content: {
                                    text: json.error_email
                                },
                                position: {
                                    my: "bottom center",
                                    at: "top center"
                                }
                            }).qtip('show');
                    }
                    if(typeof(json.error_message)!="undefined" && json.error_message!="")
                    {
                        $("#contact_form [name='message']").qtip(
                            {
                                style: {
                                    classes: 'ui-tooltip-error'
                                },
                                content: {
                                    text: json.error_message
                                },
                                position: {
                                    my: "bottom center",
                                    at: "top center"
                                }
                            }).qtip('show');
                    }
                }
                $("#contact_form").unblock();
            }
        });
    });

    $(".contact_form [name='date_of_birth']").datepicker({
        dateFormat: "mm-dd-yy"
    });
    $(".closing_in").each(function(){
        var self = $(this);
        var time = parseInt(self.children(".seconds").text());
        var id = setInterval(function(){
            time--;
            self.children(".seconds").text(time);
            if(time==0)
            {
                self.parent().prev(".notification_box").fadeOut(500, function(){
                    $(this).remove();
                });
                self.remove();
                clearInterval(id);
            }
        }, 1000);
    });

    //grab the height of the largest box and set all three to the same height
    function setBoxHeight() {
        var maxHeight = -1;

        $('.home_box').each(function() {
            maxHeight = maxHeight > $(this).height() ? maxHeight : $(this).height();
        });
        $('.home_box').each(function() {
            $(this).height(maxHeight);
        });
    }
    setBoxHeight();

    /*=============  Community/Member Content Accordion ===================*/

    $('div.sidebar_box p.toggle_skin10_menu').click(function() {

        if ($(this).hasClass('expanded')) {
            $(this).removeClass('expanded');
            $(this).next().slideUp('fast');
        } else {
            $(this).addClass('expanded');
            $(this).next().slideDown('slow');
        }

    });

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
