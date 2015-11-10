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
        <span> +7 (499)755-85-49</span>
 		<span class="ssylka"><a href="mailto:info@psykompas.ru ">info@psykompas.ru</a></span>
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
	
       

  	</div>


        	</footer><!-- #colophon -->
      <!-- Yandex.Metrika counter -->
      
      <!-- /Yandex.Metrika counter -->
     
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

</body>
</html>