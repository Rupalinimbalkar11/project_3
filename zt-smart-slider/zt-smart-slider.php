<?php
	/*
	Plugin Name: ZT SMART SLIDER
	Version: 1.0
	TextDomain: ztsmart-slider
	*/
	
	if( !defined( 'ABSPATH' ) ){
	    exit;
	}

	define('ZTSMARTSLIDER_PLUGIN_PATH', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );
	define('ztsmartslider_plugin_dir', plugin_dir_path(__FILE__) );
	add_filter('widget_text', 'do_shortcode');

	function ztsmartslider_init(){

		wp_enqueue_script( 'jquery' );
		wp_enqueue_style( 'ztsmartslider-owl-min-css', ZTSMARTSLIDER_PLUGIN_PATH.'assets/css/owl.carousel.min.css' );
		wp_enqueue_style( 'ztsmartslider-owl-theme-css', ZTSMARTSLIDER_PLUGIN_PATH.'assets/css/owl.theme.default.css' );
		wp_enqueue_style( 'ztsmartslider-style-css', ZTSMARTSLIDER_PLUGIN_PATH.'assets/css/style.css' );
		wp_enqueue_style( 'ztsmartslider-slick-css', ZTSMARTSLIDER_PLUGIN_PATH.'assets/css/slick.css' );
		wp_enqueue_style( 'ztsmartslider-slick-theme-css', ZTSMARTSLIDER_PLUGIN_PATH.'assets/css/slick-theme.css' );

	
		wp_enqueue_script( 'ztsmartslider_slider_js', plugins_url( '/assets/js/owl.carousel.js' , __FILE__ ) , array( 'jquery' ) );
		wp_enqueue_script( 'ztsmartslider_sliderslick_js', plugins_url( '/assets/js/slick.js' , __FILE__ ) , array( 'jquery' ),true );
		wp_enqueue_script( 'ztsmartslider_sliderslickmin_js', plugins_url( '/assets/js/slick.min.js' , __FILE__ ) , array( 'jquery' ),true );
		wp_enqueue_script( 'ztsmartslider_colorpicker_js', plugins_url( '/assets/js/jscolor.js' , __FILE__ ) , array( 'jquery' ) ,true);
		

	}
	add_action( 'init', 'ztsmartslider_init' );
	

	function ztsmartsliderslider_admin_scripts() {
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'wp-color-picker-alpha', plugins_url( '/assets/js/wp-color-picker-alpha.js', __FILE__ ), array( 'wp-color-picker' ));
	}
	add_action('admin_enqueue_scripts', 'ztsmartsliderslider_admin_scripts');
	
	
	# load plugin admin style & scripts
	function ztsmartslider_loaded_admin_scripts(){
		global $typenow;

		if(($typenow == 'ztsmart')){
			wp_enqueue_style('ztsmart_loaded_admin-style',ZTSMARTSLIDER_PLUGIN_PATH.'admin/css/ztsmart-slider-admin.css');
			wp_enqueue_script('ztsmart_loaded_admin-scripts',ZTSMARTSLIDER_PLUGIN_PATH.'admin/js/ztsmart-slider-admin.js', array('jquery'), '1.3.3', true );
		}
	}
	add_action('admin_enqueue_scripts', 'ztsmartslider_loaded_admin_scripts');


	# Post Type
	require_once( 'files/post-type/ztsmartslider-post-type.php' );

	# Metabox
	require_once( 'files/metaboxes/ztsmartslider-metaboxes.php' );

	# Core
	require_once( 'files/core/ztsmartslider-post-core.php' );

	#Shortcode
	require_once( 'files/shortcodes/ztsmartslider-shortcode.php' );


function ztsmarslider_slider_register_shortcode($atts, $content = null){
	extract(shortcode_atts( array(  
		'post_styles' => 'style1',
		'category' => '-1',
		'show_items' => '4',
		'order_by' => 'date',
		'order' => 'DESC',
		'number' => '-1',
		'show_pagination' => 'true',
		'author_info'=>'true',
		'auto_play' => 'true',

	), $atts));
	global $post;
	$psrndn = rand(1,1000);
	// 	query posts
	
	$args =	array ( 'post_type' => 'post',
					'posts_per_page' => $number,
					'orderby' => $order_by,
					'order' => $order );
	
	if($category > -1) {
		$args['tax_query'] = array(array('taxonomy' => 'category',
		'field' => 'id',
		'terms' => $category ));
	}
	
	$ztsmarsliderslider_query = new WP_Query( $args );			
		$result='';
		if($post_styles=="style1"){
			$result .= '
			<script type="text/javascript">
				jQuery(document).ready(function($) {

					$("#ztsmarslider-main-slider-'.$psrndn.'").owlCarousel({
						autoplay:'.$auto_play.',
						loop:false,
						margin:10,
						nav:false,
						autoplayHoverPause: true,
						dots: true,
						responsive:{
							0:{
								items:1
							},
							600:{
								items:3
							},
							1000:{
								items:'.$show_items.'
							}
						}
					});
				});	
			</script>';
			$result.='
			<style type="text/css">
				.zts_single_slider_items-'.$psrndn.' {
					border-bottom: medium none;
					box-shadow: none;
					margin: 0 10px;
					transition: all 0.4s ease-in-out 0s;
				}
				.zts_single_slider_items-'.$psrndn.' .zts_single_slider_items_post_images-'.$psrndn.'{
					position: relative;
					overflow: hidden;
				}
				.zts_single_slider_items-'.$psrndn.' .zts_single_slider_items_post_images-'.$psrndn.':before{
					content: "";
					width: 100%;
					height: 100%;
					position: absolute;
					top: 0;
					left: 0;
					background: rgba(0, 0, 0, 0);
					transition: all 0.4s linear 0s;
				}
				.zts_single_slider_items-'.$psrndn.':hover .zts_single_slider_items_post_images-'.$psrndn.':before{
					background: rgba(0, 0, 0, 0.6);
				}
				.zts_single_slider_items-'.$psrndn.' .zts_single_slider_items_post_images-'.$psrndn.' img{
					width: 100%;
					height: auto;
				}
				.zts_single_slider_items-'.$psrndn.' img {
				  border-radius: 0;
				  box-shadow: none;
				}
				.zts_single_slider_items-'.$psrndn.' .zts_single_slider_items_category-'.$psrndn.' {
					width: 100%;
					font-size: 16px;
					color: #fff;
					line-height: 11px;
					text-align: center;
					text-transform: capitalize;
					padding: 11px 0;
					background: #ff9412;
					position: absolute;
					bottom: 0;
					left: -100%;
					transition: all 0.5s ease-in-out 0s;
				}
				.zts_single_slider_items-'.$psrndn.':hover .zts_single_slider_items_category-'.$psrndn.'{
					left: 0;
				}
				.zts_single_slider_items-'.$psrndn.' .zts_single_slider_item_reviews-'.$psrndn.'{
					padding: 20px 20px;
					background: #fff;
					position: relative;
				}
				.zts_single_slider_items-'.$psrndn.' .zts_single_slider_item_post_title-'.$psrndn.'{
					margin: 0;
				}
				.zts_single_slider_item_reviews-'.$psrndn.' h3.zts_single_slider_item_post_title-'.$psrndn.' {
				  font-size: 15px;
				}
				.zts_single_slider_items-'.$psrndn.' .zts_single_slider_item_post_title-'.$psrndn.' a{
					border-bottom: medium none;
					color: #ff9412;
					display: inline-block;
					font-size: 15px;
					font-weight: normal;
					letter-spacing: 2px;
					margin-bottom: 25px;
					text-decoration: none;
					transition: all 0.3s linear 0s;
					box-shadow: none;
				}
				.zts_single_slider_items-'.$psrndn.' .zts_single_slider_item_post_title-'.$psrndn.' a:hover{
					text-decoration: none;
					color: #555;
				}
				.zts_single_slider_items-'.$psrndn.' .zts_single_slider_item_description-'.$psrndn.'{
					font-size: 15px;
					color: #555;
					line-height: 26px;
				}
				.zts_single_slider_items-'.$psrndn.' .zts_single_slider_items_category-'.$psrndn.' > a {
				  border: medium none;
				  box-shadow: none;
				  color: #000;
				  margin-right: 8px;
				  text-decoration: none;
				}
				.zts_single_slider_items-'.$psrndn.' .zts_single_slider_items_category-'.$psrndn.' > a:hover {
				  color: #fff;
				}
				.zts_single_slider_item_reviews-'.$psrndn.' .zts_single_slider_admin_description-'.$psrndn.'{
					margin-top: 20px;
				}
				.zts_single_slider_admin_description-'.$psrndn.' span{
					display: inline-block;
					font-size: 14px;
				}
				.zts_single_slider_admin_description-'.$psrndn.' span i{
					margin-right: 5px;
					color: #999;
				}
				.zts_single_slider_admin_description-'.$psrndn.' span a{
					color: #999;
					text-transform: uppercase;
				}
				.zts_single_slider_admin_description-'.$psrndn.' span a:hover{
					text-decoration: none;
					color: #ff9412;
				}
				.zts_single_slider_admin_description-'.$psrndn.' span.comments{
					float: right;
				}
				@media only screen and (max-width: 359px) {
					.zts_single_slider_items-'.$psrndn.' .zts_single_slider_items_category-'.$psrndn.'{ font-size: 13px; }
				}
			</style>';
			$result.='<div class="ztsmarslider-slider-area'.$psrndn.'">';
			$result.='<div id="ztsmarslider-main-slider-'.$psrndn.'" class="owl-carousel">';
			// Creating a new side loop
			while ( $ztsmarsliderslider_query->have_posts() ) : $ztsmarsliderslider_query->the_post();
				
				$catid = get_the_ID();
				$cats = get_the_category($catid);
				
				setup_postdata( $post );
				$excerpt = get_the_excerpt();

				$result.='
				<div class="zts_single_slider_items-'.$psrndn.'">
					<div class="zts_single_slider_items_post_images-'.$psrndn.'">';
						if ( has_post_thumbnail() ) {
							$result .= '<div class="zts-slider-thumb">';
							$result .= '<a href="'.esc_url(get_the_permalink()).'">'.get_the_post_thumbnail( $post->ID, 'post-slider-thumb', array( 'class' => "img-responsive" ) ).'</a>';
							$result .= '</div>';
						}
						$result.='<div class="zts_single_slider_items_category-'.$psrndn.'">';
						foreach ( $cats as $cat ){
							$result.='<a href="'.get_category_link($cat->cat_ID).'">'.$cat->name.'</a>';
							
						}
						
						$result.='</div>';
					$result.='</div>
					<div class="zts_single_slider_item_reviews-'.$psrndn.'">
						<h3 class="zts_single_slider_item_post_title-'.$psrndn.'"><a href="'.esc_url(get_the_permalink()).'">'.esc_attr(get_the_title()).'</a></h3>
						<div class="zts_single_slider_item_description-'.$psrndn.'">'.wpautop($excerpt).'
						</div>
						<div class="zts_single_slider_admin_description-'.$psrndn.'">
							<span><a href="'.get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ).'">'.get_the_author().'</a></span>
						</div>
					</div>
				</div>
				';
					
			endwhile;
			wp_reset_postdata();
						
			$result .='</div><div class="clearfix"></div>';
	
			return $result; 
		}
		if($post_styles=="style2")
			{
			$result .= '
			<script type="text/javascript">
				jQuery(document).ready(function($) {
					$("#ztsmarslider-main-slider-'.$psrndn.'").owlCarousel({
					autoPlay: '.$auto_play.',
					stopOnHover: true,
					items : '.$show_items.',
					itemsDesktop : [1199,3],
					itemsDesktopSmall : [979,3],
					navigation : false,
					navigationText : ["�","�"],
					paginationNumbers: false,
					pagination: '.$show_pagination.',
					});
				});
			</script>';
			$result.='
			<style type="text/css">
				.post_slider_'.$psrndn.'_style_two{
					padding: 0 15px;
				}
				.post_slider_'.$psrndn.'_style_two .post_slider_'.$psrndn.'_style_img{
					position: relative;
				}
				.post_slider_'.$psrndn.'_style_two .post_slider_'.$psrndn.'_style_img > a{
					display:block;
				}
				.post_slider_'.$psrndn.'_style_two .post_slider_'.$psrndn.'_style_img img{
					border-radius: 0;
					box-shadow: none;
					height: auto;
					width: 100%;
				}
				.post_slider_'.$psrndn.'_style_two .post_slider_'.$psrndn.'_style_img:hover:before{
					content: "";
					position: absolute;
					width: 100%;
					height:100%;
					background-color: rgba(220, 0, 90, 0.6);
				}
				.post_slider_'.$psrndn.'_style_two .post_slider_'.$psrndn.'_style_img:hover:after{
					opacity: 1;
					transform: scale(1);
				}
				.post_slider_'.$psrndn.'_style_two .post_slider_'.$psrndn.'_style_title{
					margin-bottom: 10px;
					margin-top: 10px;
				}
				.post_slider_'.$psrndn.'_style_two .post_slider_'.$psrndn.'_style_title > a{
					color:#222;
					display: block;
					font-size: 17px;
					font-weight: 600;
					text-transform: uppercase;
					text-decoration:none;
					border-bottom:none;
					box-shadow: none;
				}
				.post_slider_'.$psrndn.'_style_two .post_slider_'.$psrndn.'_style_title > a:hover{
					text-decoration: none;
					color:#dc005a;
				}
				.post_slider_'.$psrndn.'_style_two .post_slider_'.$psrndn.'_style_bar{
					padding: 0;
					list-style: none;
				}
				.post_slider_'.$psrndn.'_style_two .post_slider_'.$psrndn.'_style_bar > li{
					display: inline-block;
					margin: 0 15px 0 0;
				}
				.post_slider_'.$psrndn.'_style_two .post_slider_'.$psrndn.'_style_post_date,
				.post_slider_'.$psrndn.'_style_two .post_slider_'.$psrndn.'_style_post_author,
				.post_slider_'.$psrndn.'_style_two .post_slider_'.$psrndn.'_style_post_author > a{
					color:#8f8f8f;
					font-size: 12px;
					margin-right: 16px;
					text-transform: uppercase;
					font-style: italic;
					text-decoration:none;
				}
				.post_slider_'.$psrndn.'_style_two .post_slider_'.$psrndn.'_style_post_date > i,
				.post_slider_'.$psrndn.'_style_two .post_slider_'.$psrndn.'_style_post_author > i{
					margin-right: 5px;
				}
				.post_slider_'.$psrndn.'_style_two .post_slider_'.$psrndn.'_style_post_author > a:hover{
					color:#dc005a;
				}
				.post_slider_'.$psrndn.'_style_two .post_slider_'.$psrndn.'_style_post_description{
					color:#8f8f8f;
					font-size: 14px;
					line-height: 24px;
					padding-top: 5px;
				}
				.post_slider_'.$psrndn.'_style_two .post_slider_'.$psrndn.'_style_post_description:before{
					content: "";
					display: block;
					border-top: 4px solid #dc005a;
					padding-bottom: 12px;
					width: 50px;
				}
			</style>';
			$result.='<div class="ztsmarslider-slider-area'.$psrndn.'">';
			$result.='<div id="ztsmarslider-main-slider-'.$psrndn.'" class="owl-carousel">';
			// Creating a new side loop
			while ( $ztsmarsliderslider_query->have_posts() ) : $ztsmarsliderslider_query->the_post();
				
				$catid = get_the_ID();
				$cats = get_the_category($catid);
				
				setup_postdata( $post );
				$excerpt = get_the_excerpt();

				$result.='
				<div class="post_slider_'.$psrndn.'_style_two">
						<div class="post_slider_'.$psrndn.'_style_img">';
						if ( has_post_thumbnail() ) {
							$result .= '<div class="zts-slider-thumb-style2">';
							$result .= '<a href="'.esc_url(get_the_permalink()).'">'.get_the_post_thumbnail( $post->ID, 'post-slider-thumb', array( 'class' => "img-responsive" ) ).'</a>';
							$result .= '</div>';
						}
						$result.='</div>
					<h5 class="post_slider_'.$psrndn.'_style_title">
						<a href="'.esc_url(get_the_permalink()).'">'.esc_attr(get_the_title()).'</a>
					</h5>
					<ul class="post_slider_'.$psrndn.'_style_bar">
						<li class="post_slider_'.$psrndn.'_style_post_date">
						 '.get_the_date('Y-m-d').'</li>
						<li class="post_slider_'.$psrndn.'_style_post_author">
						<a href="'.get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ).'">'.get_the_author().'</a></li>
					</ul>'.wpautop($excerpt).'
				</div>';
					
			endwhile;
			wp_reset_postdata();
						
			$result .='</div></div><div class="clearfix"></div>';
	
			return $result; 
			}
		if($post_styles=="style3"){
			$result .= '
			<script type="text/javascript">
				jQuery(document).ready(function($) {
					$("#ztsmarslider-main-slider-'.$psrndn.'").owlCarousel({
					autoPlay: '.$auto_play.',
					stopOnHover: true,
					items : '.$show_items.',
					itemsDesktop : [1199,3],
					itemsDesktopSmall : [979,3],
					navigation : false,
					navigationText : ["�","�"],
					paginationNumbers: false,
					pagination: '.$show_pagination.',
					});
				});
			</script>';
			$result.='
			<style type="text/css">
				.post_slider_'.$psrndn.'_style3{
					border: 1px solid #eee;
					padding: 20px;
					margin: 0 15px;
					position: relative;
				}
				.post_slider_'.$psrndn.'_style3:before{
					content: "";
					border-top:1px solid transparent;
					position: absolute;
					top:0;
					left:0;
					width: 100%;
					transition:all 0.3s ease-in-out 0s;
				}
				.post_slider_'.$psrndn.'_style3:hover:before{
					border-top: 1px solid #3398db;
				}
				.post_slider_'.$psrndn.'_style3:hover{
					border-top: 1px solid #3398db;
				}
				.post_slider_'.$psrndn.'_style3 .post_slider_'.$psrndn.'_style3_img > img{
					width: 100%;
					height:auto;
				}
				.post_slider_'.$psrndn.'_style3 .post_slider_'.$psrndn.'_style3_title > a{
					font-size: 20px;
					text-transform: capitalize;
					color:#333;
					transition:all 0.3s ease-in-out 0s;
					text-decoration:none;
					border-bottom:none;
					box-shadow: none;
				}
				.post_slider_'.$psrndn.'_style3 .post_slider_'.$psrndn.'_style3_title > a:hover{
					text-decoration: none;
					color:#3398db;
					text-decoration:none;
					
				}
				.zts-slider-thumb-style3 a img {
				  border-radius: 0;
				  box-shadow: none;
				}
				.post_slider_'.$psrndn.'_style3 .post_slider_'.$psrndn.'_style3_bars{
					padding: 0;
					list-style: none;
					overflow: hidden;
				}
				.post_slider_'.$psrndn.'_style3 .post_slider_'.$psrndn.'_style3_bars > li{
					border-right: 1px solid #999;
					display: inline-block;
					float: left;
					margin: 0;
					padding: 0 10px;
				}
				.post_slider_'.$psrndn.'_style3 .post_slider_'.$psrndn.'_style3_bars > li:first-child{
					padding: 0 10px 0 0;
				}
				.post_slider_'.$psrndn.'_style3 .post_slider_'.$psrndn.'_style3_bars > li:last-child{
					border: 0px none;
				}
				.post_slider_'.$psrndn.'_style3 .post_slider_'.$psrndn.'_style3_dates,
				.post_slider_'.$psrndn.'_style3 .post_slider_'.$psrndn.'_style3_autors,
				.post_slider_'.$psrndn.'_style3 .comment{
					color:#3398db;
					text-transform: uppercase;
					font-size: 11px;
				}
				.post_slider_'.$psrndn.'_style3 .post_slider_'.$psrndn.'_style3_autors > a,
				.post_slider_'.$psrndn.'_style3 .comment > a,
				.post_slider_'.$psrndn.'_style3 .comment > i{
					color:#999;
					transition:all 0.3s ease-in-out 0s;
				}
				.post_slider_'.$psrndn.'_style3 .post_slider_'.$psrndn.'_style3_autors > a:hover,
				.post_slider_'.$psrndn.'_style3 .comment > a:hover{
					text-decoration: none;
					color:#333;
				}
				.post_slider_'.$psrndn.'_style3 .comment > i{
					margin-right: 8px;
					font-size: 15px;
				}
				.post_slider_'.$psrndn.'_style3 .post_slider_'.$psrndn.'_style3_p_description{
					line-height: 1.7;
					color:#666;
					font-size: 13px;
					margin-bottom: 20px;
				}
				.post_slider_'.$psrndn.'_style3 .post_slider_'.$psrndn.'_style3_p_readmores{
					display: inline-block;
					padding: 10px 35px;
					background: #3398db;
					color: #ffffff;
					border-radius: 5px;
					font-size: 15px;
					font-weight: 900;
					letter-spacing: 1px;
					line-height: 20px;
					margin-bottom: 5px;
					text-transform: uppercase;
					transition:all 0.3s ease-in-out 0s;
					text-decoration:none;
				}
				.post_slider_'.$psrndn.'_style3 .post_slider_'.$psrndn.'_style3_p_readmores:hover{
					text-decoration: none;
					color:#fff;
					background: #333;
				}
				@media only screen and (max-width: 360px) {
					.post_slider_'.$psrndn.'_style3_bars > li:last-child{
						margin-top: 8px;
						padding: 0;
					}
				}
			</style>';
			$result.='<div class="ztsmarslider-slider-area'.$psrndn.'">';
			$result.='<div id="ztsmarslider-main-slider-'.$psrndn.'" class="owl-carousel">';
			// Creating a new side loop
			while ( $ztsmarsliderslider_query->have_posts() ) : $ztsmarsliderslider_query->the_post();
				
				$catid = get_the_ID();
				$cats = get_the_category($catid);
				
				setup_postdata( $post );
				$excerpt = get_the_excerpt();

			$result.='
			<div class="post_slider_'.$psrndn.'_style3">
				<div class="post_slider_'.$psrndn.'_style3_img">';
					if ( has_post_thumbnail() ) {
						$result .= '<div class="zts-slider-thumb-style3">';
						$result .= '<a href="'.esc_url(get_the_permalink()).'">'.get_the_post_thumbnail( $post->ID, 'post-slider-thumb', array( 'class' => "img-responsive" ) ).'</a>';
						$result .= '</div>';
					}
				$result.='</div>
				<h5 class="post_slider_'.$psrndn.'_style3_title"><a href="'.esc_url(get_the_permalink()).'">'.esc_attr(get_the_title()).'</a></h5>
				<ul class="post_slider_'.$psrndn.'_style3_bars">
					<li class="post_slider_'.$psrndn.'_style3_dates">'.get_the_date('Y-m-d').'</li>
					<li class="post_slider_'.$psrndn.'_style3_autors"><a href="'.get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ).'">'.get_the_author().'</a></li>
				</ul>'.wpautop($excerpt).'
				<a href="'.esc_url(get_the_permalink()).'" class="post_slider_'.$psrndn.'_style3_p_readmores">more</a>
			</div>';

			endwhile;
			wp_reset_postdata();
						
			$result .='</div></div><div class="clearfix"></div>';
	
		return $result; 
	}
	else{
		echo 'Nothing Found !!';	
	}
}
add_shortcode('ztsmarsliderslider', 'ztsmarslider_slider_register_shortcode');