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
            <h1>Заказать звонок</h1>
<div class="formZap">
      <?php echo do_shortcode( '[contact-form-7 id="128" title="Заказать звонок"]');?>
      </div>
      </div>
      </div>
</div>

<div id="questionWin" style="display: none;">

<div class="openwindowWrap  zadatVopros">
<div class="padWrap">

<div class="closeStyle">
<a href="#"  onclick="return closeModal('#questionWin');" class="closeIcon"> </a><a href="#"  onclick="return closeModal('#questionWin');" class="closeTitle">Назад</a>
</div>
     <h1>Задать вопрос</h1>
<div class="openWblock1 partLeft">
       	<section class="demo">

						<div class="content">
      <?php echo do_shortcode( '[contact-form-7 id="170" title="Задать вопрос"]');?>
</div>
						<!-- .content -->

		</section>
</div>      
<div class="openWblock1 partRight">
<span class="aNonimtext">Напишите то, которое сохранит Вашу конфиденциальность (без фамилии, можно псевдоним).</span>
<span class="aboutProbText">Постарайтесь максимально точно описать Вашу ситуацию, причины возникновения, укажите ваш возраст, род занятий и т.д. От полноты Вашего вопроса будет зависеть эффективность нашего ответа.</span>
<div>
<span class="redAlert">(!)</span> 
<span>Обращаем Ваше внимание на то, что бесплатная консультация предполагает<strong> публикацию Вашего вопроса и ответа на него на нашем сайте</strong> в разделе «Вопрос-ответ». Эта информация будет доступна всем нашим посетителям.</span>

       <span class="razT">Также, необходимо учитывать, что мы не обладаем полной информацией о Вас и ситуации, в которой Вы находитесь, поэтому мы можем оказать лишь ограниченную помощь и не несем ответственность за Ваше состояние. Просим Вас быть внимательными к себе и в случае экстренной необходимости не откладывать личный визит к специалисту.</span></div>

</div>

      </div>
      </div><!--zadatvopros-->

</div><!--questionWin-->

 </div>
<?php
if (SAVEQUERIES) {
echo "<!--\n";
print_r($wpdb->queries);
echo "\n-->\n";
}
?>
</body>
</html>