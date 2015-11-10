/**	jQuery.browser
 *	@author	J.D. McKinstry (2014)
 *	@description	Made to replicate older jQuery.browser command in jQuery versions 1.9+
 *	@see http://jsfiddle.net/SpYk3/wsqfbe4s/
 *
 *	@extends	jQuery
 *	@namespace	jQuery.browser
 *	@example	jQuery.browser.browser == 'browserNameInLowerCase'
 *	@example	jQuery.browser.version
 *	@example	jQuery.browser.mobile	@returns	BOOLEAN
 *	@example	jQuery.browser['browserNameInLowerCase']
 *	@example	jQuery.browser.chrome	@returns	BOOLEAN
 *	@example	jQuery.browser.safari	@returns	BOOLEAN
 *	@example	jQuery.browser.opera	@returns	BOOLEAN
 *	@example	jQuery.browser.msie	@returns	BOOLEAN
 *	@example	jQuery.browser.mozilla	@returns	BOOLEAN
 *	@example	jQuery.browser.webkit	@returns	BOOLEAN
 *	@example	jQuery.browser.ua	@returns	navigator.userAgent String
 */
;;(function($){if(!jQuery.browser&&1.9<=parseFloat($.fn.jquery)){var a={browser:void 0,version:void 0,mobile:!1};navigator&&navigator.userAgent&&(a.ua=navigator.userAgent,a.webkit=/WebKit/i.test(a.ua),a.browserArray="MSIE Chrome Opera Kindle Silk BlackBerry PlayBook Android Safari Mozilla Nokia".split(" "),/Sony[^ ]*/i.test(a.ua)?a.mobile="Sony":/RIM Tablet/i.test(a.ua)?a.mobile="RIM Tablet":/BlackBerry/i.test(a.ua)?a.mobile="BlackBerry":/iPhone/i.test(a.ua)?a.mobile="iPhone":/iPad/i.test(a.ua)?a.mobile="iPad":/iPod/i.test(a.ua)?a.mobile="iPod":/Opera Mini/i.test(a.ua)?a.mobile="Opera Mini":/IEMobile/i.test(a.ua)?a.mobile="IEMobile":/BB[0-9]{1,}; Touch/i.test(a.ua)?a.mobile="BlackBerry":/Nokia/i.test(a.ua)?a.mobile="Nokia":/Android/i.test(a.ua)&&(a.mobile="Android"),/MSIE|Trident/i.test(a.ua)?(a.browser="MSIE",a.version=/MSIE/i.test(navigator.userAgent)&&0<parseFloat(a.ua.split("MSIE")[1].replace(/[^0-9\.]/g,""))?parseFloat(a.ua.split("MSIE")[1].replace(/[^0-9\.]/g,"")):"Edge",/Trident/i.test(a.ua)&&/rv:([0-9]{1,}[\.0-9]{0,})/.test(a.ua)&&(a.version=parseFloat(a.ua.match(/rv:([0-9]{1,}[\.0-9]{0,})/)[1].replace(/[^0-9\.]/g,"")))):/Chrome/.test(a.ua)?(a.browser="Chrome",a.version=parseFloat(a.ua.split("Chrome/")[1].split("Safari")[0].replace(/[^0-9\.]/g,""))):/Opera/.test(a.ua)?(a.browser="Opera",a.version=parseFloat(a.ua.split("Version/")[1].replace(/[^0-9\.]/g,""))):/Kindle|Silk|KFTT|KFOT|KFJWA|KFJWI|KFSOWI|KFTHWA|KFTHWI|KFAPWA|KFAPWI/i.test(a.ua)?(a.mobile="Kindle",/Silk/i.test(a.ua)?(a.browser="Silk",a.version=parseFloat(a.ua.split("Silk/")[1].split("Safari")[0].replace(/[^0-9\.]/g,""))):/Kindle/i.test(a.ua)&&/Version/i.test(a.ua)&&(a.browser="Kindle",a.version=parseFloat(a.ua.split("Version/")[1].split("Safari")[0].replace(/[^0-9\.]/g,"")))):/BlackBerry/.test(a.ua)?(a.browser="BlackBerry",a.version=parseFloat(a.ua.split("/")[1].replace(/[^0-9\.]/g,""))):/PlayBook/.test(a.ua)?(a.browser="PlayBook",a.version=parseFloat(a.ua.split("Version/")[1].split("Safari")[0].replace(/[^0-9\.]/g,""))):/BB[0-9]{1,}; Touch/.test(a.ua)?(a.browser="Blackberry",a.version=parseFloat(a.ua.split("Version/")[1].split("Safari")[0].replace(/[^0-9\.]/g,""))):/Android/.test(a.ua)?(a.browser="Android",a.version=parseFloat(a.ua.split("Version/")[1].split("Safari")[0].replace(/[^0-9\.]/g,""))):/Safari/.test(a.ua)?(a.browser="Safari",a.version=parseFloat(a.ua.split("Version/")[1].split("Safari")[0].replace(/[^0-9\.]/g,""))):/Firefox/.test(a.ua)?(a.browser="Mozilla",a.version=parseFloat(a.ua.split("Firefox/")[1].replace(/[^0-9\.]/g,""))):/Nokia/.test(a.ua)&&(a.browser="Nokia",a.version=parseFloat(a.ua.split("Browser")[1].replace(/[^0-9\.]/g,""))));if(a.browser)for(var b in a.browserArray)a[a.browserArray[b].toLowerCase()]=a.browser==a.browserArray[b];$.extend(!0,jQuery.browser={},a)}})(jQuery);
/* - - - - - - - - - - - - - - - - - - - */


jQuery(document).ready(function() {

	// Grayscale images on Safari and Opera browsers
	if(getBrowser()=='opera' || getBrowser()=='safari'){
		var $images = jQuery("body.single-individual div.imgTop img,div.other img,div.statStyle.single-trening div.imgTop img,div.WrapBlock .front-block img,body.single-trening div.imgTop img,div#wrapper.tren_cat div.psy-content_img")
		, imageCount = $images.length
		, counter = 0;

		// One instead of on, because it need only fire once per image
		$images.one("load",function(){
			// increment counter every time an image finishes loading
			counter++;
			if (counter == imageCount) {
				// do stuff when all have loaded
				grayscale(jQuery('body.single-individual div.imgTop img,div.other img,div.statStyle.single-trening div.imgTop img,div.WrapBlock .front-block img,body.single-trening div.imgTop img,div#wrapper.tren_cat div.psy-content_img'));
				jQuery("body.single-individual div.imgTop img,div.other img,div.statStyle.single-trening div.imgTop img,div.WrapBlock .front-block img,body.single-trening div.imgTop img,div#wrapper.tren_cat div.psy-content_img").hover(
					function () {
						grayscale.reset(jQuery(this));
					}, 
					function () {
						grayscale(jQuery(this));
					}
				);
			}
		}).each(function () {
		if (this.complete) {
			// manually trigger load event in
			// event of a cache pull
				jQuery(this).trigger("load");
			}
		});
	};
	
	
	// Grayscale images only on browsers IE10+ since they removed support for CSS grayscale filter
	if (getInternetExplorerVersion() >= 10){
		jQuery('body.single-individual div.imgTop img,div.other img,div.statStyle.single-trening div.imgTop img,div.WrapBlock .front-block img,body.single-trening div.imgTop img,div#wrapper.tren_cat div.psy-content_img').each(function(){
			var el = jQuery(this);
			el.css({"position":"absolute"}).wrap("<div class='img_wrapper' style='display: inline-block'>").clone().addClass('img_grayscale').css({"position":"absolute","z-index":"5","opacity":"0"}).insertBefore(el).queue(function(){
				var el = jQuery(this);
				el.parent().css({"width":this.width,"height":this.height});
				el.dequeue();
			});
			this.src = grayscaleIE10(this.src);
		});
		
		// Quick animation on IE10+ 
		jQuery('body.single-individual div.imgTop img,div.other img,div.statStyle.single-trening div.imgTop img,div.WrapBlock .front-block img,body.single-trening div.imgTop img,div#wrapper.tren_cat div.psy-content_img').hover(
			function () {
				jQuery(this).parent().find('img:first').stop().animate({opacity:1}, 200);
			}, 
			function () {
				jQuery('.img_grayscale').stop().animate({opacity:0}, 200);
			}
		);	
		
		function grayscaleIE10(src){
			var canvas = document.createElement('canvas');
			var ctx = canvas.getContext('2d');
			var imgObj = new Image();
			imgObj.src = src;
			canvas.width = imgObj.width;
			canvas.height = imgObj.height; 
			ctx.drawImage(imgObj, 0, 0); 
			var imgPixels = ctx.getImageData(0, 0, canvas.width, canvas.height);
			for(var y = 0; y < imgPixels.height; y++){
				for(var x = 0; x < imgPixels.width; x++){
					var i = (y * 4) * imgPixels.width + x * 4;
					var avg = (imgPixels.data[i] + imgPixels.data[i + 1] + imgPixels.data[i + 2]) / 3;
					imgPixels.data[i] = avg; 
					imgPixels.data[i + 1] = avg; 
					imgPixels.data[i + 2] = avg;
				}
			}
			ctx.putImageData(imgPixels, 0, 0, 0, 0, imgPixels.width, imgPixels.height);
			return canvas.toDataURL();
		};
	};
	
	// This block simply ads a corresponding class to the body tag so that we can target browsers with CSS classes
	if(getBrowser()=='mozilla'){
		// Mozilla
		jQuery('body').addClass('mozilla');
	}
	else if(getBrowser()=='ie'){
		// IE Favourite
		jQuery('body').addClass('ie');
	}
	else if(getBrowser()=='opera'){
		// Opera
		jQuery('body').addClass('opera');
	}           
	else if (getBrowser()=='safari'){ // safari
		// Safari
		jQuery('body').addClass('safari');
	}
	else if(getBrowser()=='chrome'){
		// Chrome
		jQuery('body').addClass('chrome');
	};
	if (getInternetExplorerVersion() >= 10){
		jQuery('body').addClass('ie11');
	};

	// Detection function to tell what kind of browser is used
	function getBrowser(){
		var userAgent = navigator.userAgent.toLowerCase();
		jQuery.browser.chrome = /chrome/.test(userAgent);
		jQuery.browser.safari= /webkit/.test(userAgent);
		jQuery.browser.opera=/opera/.test(userAgent);
		jQuery.browser.msie=/msie/.test( userAgent ) && !/opera/.test( userAgent );
		jQuery.browser.mozilla= /mozilla/.test( userAgent ) && !/(compatible|webkit)/.test( userAgent ) || /firefox/.test(userAgent);

		if(jQuery.browser.chrome) return "chrome";
		if(jQuery.browser.mozilla) return "mozilla";
		if(jQuery.browser.opera) return "opera";
		if(jQuery.browser.safari) return "safari";
		if(jQuery.browser.msie) return "ie";
	};
	
	// Since IE11 can not be detected like this because the new user agent on IE11 is trying to hide as Mozilla
	// we detect IE11 with this function
	function getInternetExplorerVersion(){
		var rv = -1;
		if (navigator.appName == 'Microsoft Internet Explorer'){
			var ua = navigator.userAgent;
			var re  = new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})");
			if (re.exec(ua) != null)
			rv = parseFloat( RegExp.$1 );
		}
		else if (navigator.appName == 'Netscape'){
			var ua = navigator.userAgent;
			var re  = new RegExp("Trident/.*rv:([0-9]{1,}[\.0-9]{0,})");
			if (re.exec(ua) != null)
			rv = parseFloat( RegExp.$1 );
		}
		return rv;
	};
});