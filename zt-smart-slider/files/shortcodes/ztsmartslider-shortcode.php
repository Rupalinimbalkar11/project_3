<?php 

if ( ! defined( 'ABSPATH' ) )
	exit; # Exit if accessed directly

# shortocde
function ztsmartslider_post_query($atts, $content = null){
	$atts = shortcode_atts(
		array(
			'id' => "",
			), $atts);
	global $post;
	
	$postid = $atts['id'];

	$ztsmartslider_postoptions = get_post_meta( $postid, 'ztsmartslider_postoptions', true );

	if(!empty($ztsmartslider_postoptions['post_types'])){
		$post_types = $ztsmartslider_postoptions['post_types'];
	}
	else{
		$post_types = array('post');
	}

	if(!empty($ztsmartslider_postoptions['categories'])){
		$categories = $ztsmartslider_postoptions['categories'];
	}
	else{
		$categories = array();
	}

	$ztsmartslider_ordercats  		= get_post_meta($postid, 'ztsmartslider_ordercats', true);
	$ztsmartslider_orders    			= get_post_meta($postid, 'ztsmartslider_orders', true);
	$ztsmartslider_styles   			= get_post_meta($postid, 'ztsmartslider_styles', true);
	$excerpt_lenght      				= get_post_meta($postid, 'excerpt_lenght', true);
	$btn_readmore 		 				= get_post_meta($postid, 'btn_readmore', true);
	$ztsmartslider_hidecats 			= get_post_meta($postid, 'ztsmartslider_hidecats', true);
	$ztsmartslider_hideauthors 		= get_post_meta($postid, 'ztsmartslider_hideauthors', true);
	$ztsmartslider_author_size 		= get_post_meta($postid, 'ztsmartslider_author_size', true);
	$ztsmartslider_author_color 		= get_post_meta($postid, 'ztsmartslider_author_color', true);
	$ztsmartslider_titlehover_color 	= get_post_meta($postid, 'ztsmartslider_titlehover_color', true);
	$ztsmartslider_read_alignment 	= get_post_meta($postid, 'ztsmartslider_read_alignment', true);

	foreach($categories as $category){
		$tax_cat = explode(',',$category);
		$tax_terms[$tax_cat[0]][] = $tax_cat[1];
	}

	if(empty($tax_terms)){
		$tax_terms = array(); 
	}

	foreach($tax_terms as $taxonomy=>$terms){
		$tax_query[] = array(
		'taxonomy' => $taxonomy,
		'field'    => 'term_id',
		'terms'    => $terms
		);
	}

	if(empty($tax_query)){
		$tax_query = array();
	}

	$args = array (
		'post_type' 	 => $post_types,
		'post_status' 	 => 'publish',
		'tax_query' 	 => $tax_query,
		'posts_per_page' => -1,
		'orderby'	   	 =>$ztsmartslider_ordercats,
		'order'			 => $ztsmartslider_orders,
	);

	$query = new WP_Query($args);

	$html='';
	switch ($ztsmartslider_styles) {
	    case '1':
			include ztsmartslider_plugin_dir.'themes/theme-1.php';
	    break;
	    case '2':
	        include ztsmartslider_plugin_dir.'themes/theme-2.php';
	    break;
		case '3':
	        include ztsmartslider_plugin_dir.'themes/theme-3.php';
	    break;
		case '4':
	        include ztsmartslider_plugin_dir.'themes/theme-4.php';
	    break;
		case '5':
	        include ztsmartslider_plugin_dir.'themes/theme-5.php';
	    break;
		case '6':
	        include ztsmartslider_plugin_dir.'themes/theme-6.php';
	    break;
	}
	return $html;
}
add_shortcode('ztsmart', 'ztsmartslider_post_query');