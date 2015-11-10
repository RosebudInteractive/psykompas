<?php $post_type = get_post_type( $post_id ) ;?> 
 <? if ($post_type == 'trening') { 
 if(is_tag($tag)):
include (TEMPLATEPATH . '/tag-trening.php');
 endif; 
  } 
 elseif ($post_type == 'statiyi') { 
 if(is_category($category)):
include (TEMPLATEPATH . '/tag-trening.php');
 endif; 
 
 }

 else { include (TEMPLATEPATH . '/news.php'); }
 ?>