

<script type="text/javascript">
			(function($) {
    $.fn.autoClear = function () {
        // сохраняем во внутреннюю переменную текущее значение
        $(this).each(function() {
            $(this).data("autoclear", $(this).attr("value"));
        });
        $(this)
            .bind('focus', function() {   // обработка фокуса
                if ($(this).attr("value") == $(this).data("autoclear")) {
                    $(this).attr("value", "").addClass('autoclear-normalcolor');
                }
            })
            .bind('blur', function() {    // обработка потери фокуса
                if ($(this).attr("value") == "") {
                    $(this).attr("value", $(this).data("autoclear")).removeClass('autoclear-normalcolor');
                }
            });
        return $(this);
    }
})(jQuery)
 
$(function(){
    // привязываем плагин ко всем элементам с классом "autoclear"   
    $('.autoclear').autoClear();
});
</script>
<?php
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die();

        if (!empty($post->post_password)) {
            if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {
				?>
				
				<p class="nocomments">Эта запись защищена паролем.<p>
				
				<?php
				return;
            }
        }

		$oddcomment = 'alt';
?>





    <div class="top_19"><h3 class="up">Оставить свой отзыв</h3></div><br><br>
	<a name="commentform"></a>
<form id="commentform" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">




<label for="author"><span>ФИО*</span></label><br/>
<input type="text" name="author"  id="author" value="" class="autoclear" size="52" tabindex="1" /><br/>
<div class="comment">
<label for="comment">Ваш отзыв*</label><br/>
<textarea name="comment" id="comment" class="input1" value="Ваше сообщение" cols="45" rows="10" tabindex="4" ></textarea><br/><br/>
</div>
<input name="submit" type="submit" id="submit" class="button" tabindex="5" value="Отправить " style="margin: 0px 0 0 398px;"/>
<input id="changeName" type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
<br/><br/>
<?php do_action('comment_form', $post->ID); ?>

</form>






<div id="commentlist">
	<?php if ($comments) : ?>
	<?php foreach ($comments as $comment) : ?>
<div class="commentlist">
		<div class="<?php echo $oddcomment; ?> comment" id="comment-<?php comment_ID() ?>">
		
		
			<?php if ($comment->comment_approved == '0') : ?>
			<em>Ваш комментарий ожидает модерации.</em>
			<?php endif; ?>
		

		

		

		</div>
		</div>

	<?php
		if ('alt' == $oddcomment) $oddcomment = '';
		else $oddcomment = 'alt';
	?>

	<?php endforeach; /* end for each comment */ ?>

	</div>


<?php else : ?>
<?php if ('open' == $post->comment_status) : ?>

<div id="hidelist" style="display:none"></div>
</div>

<?php else : ?>

<div style="display:none"></div>
</div>



<?php endif; ?>
<?php endif; ?>
