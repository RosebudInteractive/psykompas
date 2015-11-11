<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
	</div><!-- #main .wrapper -->

<div id="page" class="hfeed site">

<footer id="colophon" role="contentinfo">

 <div class="container">
  	 
 	    <div id="footer-in">
        <div class="Fel1 grid-2-1">
			<div class="logomini"></div>
 	    <p class="copyright"><?php bloginfo( 'name' ); ?> &copy; 2013 &mdash; <?=date('Y');?></p>
        </div>
        
        <div class="Fel2 grid-2 alpha omega">
        <div>
        <span> <?php echo  get_option('our_adress');  ?></span>
 		<span class="ssylka"><a href="mailto: <?php bloginfo('admin_email'); ?>" title="Написать нам" target="_blank"><?php bloginfo('admin_email'); ?></a></span>
        </div>
         
        </div>
        <div class="Fela2 grid-2-1">
         <div>
        <a href="/nashi-uslugi-na-raznyx-yazykax">Информация на английском и немецком языках</a>
        </div>
        </div>
        
       <div class="Fel3 grid-3">
       <div class="social">
		<span>Мы в социальных сетях</span>
    <div class="socialIcon">
    <a href="" title="Google+" class="sGo"><span></span></a> 
    <a href="https://vk.com/club49559745" title="vcontakte" class="sVc"><span></span></a> 
    <a href="https://www.facebook.com/Psykompas" title="facebook" class="sFb"><span></span></a> 
    <a href="" title="instagram" class="sIns"><span></span></a> 
    <a href="" title="twitter" class="sTw"><span></span></a> 
    </div>             
       </div>
        
        </div>
			
		</div>	
	
       <div class="counters" style="position: absolute;    top: 15px;    left: 241px;">

	<!--LiveInternet counter--><script type="text/javascript"><!--
document.write("<a href='http://www.liveinternet.ru/click' "+
"target=_blank><img src='//counter.yadro.ru/hit?t14.6;r"+
escape(document.referrer)+((typeof(screen)=="undefined")?"":
";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
";"+Math.random()+
"' alt='' title='LiveInternet: показано число просмотров за 24"+
" часа, посетителей за 24 часа и за сегодня' "+
"border='0' width='88' height='31'><\/a>")
//--></script><!--/LiveInternet-->
		
		<!-- Yandex.Metrika informer -->
<a href="http://metrika.yandex.ru/stat/?id=22124936&amp;from=informer"
target="_blank" rel="nofollow"><img src="//bs.yandex.ru/informer/22124936/3_1_FFFFFFFF_EFEFEFFF_0_pageviews"
style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)" onclick="try{Ya.Metrika.informer({i:this,id:22124936,lang:'ru'});return false}catch(e){}"/></a>
<!-- /Yandex.Metrika informer -->

<!-- Yandex.Metrika counter -->
<script type="text/javascript">
(function (d, w, c) {
    (w[c] = w[c] || []).push(function() {
        try {
            w.yaCounter22124936 = new Ya.Metrika({id:22124936,
                    webvisor:true,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    ut:"noindex"});
        } catch(e) { }
    });

    var n = d.getElementsByTagName("script")[0],
        s = d.createElement("script"),
        f = function () { n.parentNode.insertBefore(s, n); };
    s.type = "text/javascript";
    s.async = true;
    s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

    if (w.opera == "[object Opera]") {
        d.addEventListener("DOMContentLoaded", f, false);
    } else { f(); }
})(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="//mc.yandex.ru/watch/22124936?ut=noindex" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

</div> 

  	</div>


        	</footer><!-- #colophon -->
     
<?php wp_footer(); ?>
<div id="callWin" style="display:none;">
<div class="openwindowWrap callfon">
<div class="padWrap">
<div class="closeStyle">
<a href="#" onclick="return closeModal('#callWin');" class="closeIcon"></a>
    <a href="#" onclick="return closeModal('#callWin');"  class="closeTitle">Назад</a>
    </div>
            <span class="pop-title">Заказать звонок</span>
<div class="formZap">
      <?php echo do_shortcode( '[contact-form-7 id="128" title="Заказать звонок"]');?>
      </div>
      </div>
      </div>
</div>


 </div>

<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-43394074-1', 'psycompas.ru');
ga('send', 'pageview');

</script>
</body>
</html>