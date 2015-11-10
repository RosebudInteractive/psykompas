<?php
if ( is_tax('rubrika') ) {
 
 include (TEMPLATEPATH . '/poles.php');

}
 elseif(is_tax('rubrika4')){
	 include (TEMPLATEPATH . '/poles4.php');
	 }
elseif(is_tax('rubrika1')){
	 include (TEMPLATEPATH . '/poles1.php');
	 } 
	 elseif(is_tax('rubrika2')){
	 include (TEMPLATEPATH . '/polesQA.php');
	 } 
	 else{
		  include (TEMPLATEPATH . '/page.php');
		 }
	 
?>