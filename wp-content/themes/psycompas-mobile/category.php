<?php $post_type = get_post_type( $post_id ) ;?> 
 <? if ($post_type == 'trening') { 
  if(is_tax('rubrika')):
include (TEMPLATEPATH . '/poles.php');

 endif; 
  } 
 elseif ($post_type == 'statiyi') { 
  if(is_tax('rubrika1')):
include (TEMPLATEPATH . '/poles1.php');
 endif; 
 
 }
elseif ($post_type == 'vopros') { 
   if (is_category()):

	include (TEMPLATEPATH . '/polesQA.php');
  endif; 
 }

elseif ($post_type == 'individual') { 
  if(is_tax('rubrika4')):

include (TEMPLATEPATH . '/poles4.php');
  endif; 
 }

 else { 
  if(is_category()):
 include (TEMPLATEPATH . '/category-all.php');
   endif; 
  }

 ?>
