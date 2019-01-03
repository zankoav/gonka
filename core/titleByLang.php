<?php


add_filter('the_title', 'change_title',10 ,2);
function change_title($title, $id){
	if (is_admin()){
		return $title;
	}
	$prefix = 'gonka_';
	$current_lg = Lang::current();
	$post_meta = get_post_meta($id);

	if(isset($post_meta['title_'.$current_lg][0])){
		return $title;
	}
	$current_lang_title = $post_meta["ML_title_for_menu_".$current_lg][0];


	$title = $current_lang_title ;
	return $title;
}