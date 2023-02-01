<?php

    if( !defined( 'ABSPATH' ) ){
        exit;
    }
    
	$html = '';
    $html .='<div class="content_area-'.$postid.'">';
	$ztsmartslider_content_layout       = get_post_meta($postid,'ztsmartslider_content_layout',true);
    $ztsmartsliderpr_items   				= get_post_meta($postid, 'ztsmartsliderpr_items', true);
    $ztsmartslider_center_mode           	= get_post_meta($postid, 'ztsmartslider_center_mode', true);
    $ztsmartsliderpr_margin   				= get_post_meta($postid, 'ztsmartsliderpr_margin', true);
    $ztsmartslider_autoplay         		= get_post_meta($postid, 'ztsmartslider_autoplay', true);
    $ztsmartslider_autoplay_speed  	 	= get_post_meta($postid, 'ztsmartslider_autoplay_speed', true);
    $ztsmartslider_autoplaytimeout  		= get_post_meta($postid, 'ztsmartslider_autoplaytimeout', true);
    $ztsmartsliderpr_navigation         		= get_post_meta($postid, 'ztsmartsliderpr_navigation', true);
    $ztsmartsliderpr_navigation_position  	= get_post_meta($postid, 'ztsmartsliderpr_navigation_position', true);
    $ztsmartsliderpr_paginations          	= get_post_meta($postid, 'ztsmartsliderpr_paginations', true);
    $ztsmartsliderpr_paginationsposition   	= get_post_meta($postid, 'ztsmartsliderpr_paginationsposition', true);
    $ztsmartsliderpr_stophover            	= get_post_meta($postid, 'ztsmartsliderpr_stophover', true);
    $ztsmartsliderpr_navtextcolors        	= get_post_meta($postid, 'ztsmartsliderpr_navtextcolors', true);
    $ztsmartsliderpr_navtextcolors_hover   	= get_post_meta($postid, 'ztsmartsliderpr_navtextcolors_hover', true);
    $ztsmartsliderpr_navbgcolors        		= get_post_meta($postid, 'ztsmartsliderpr_navbgcolors', true);
    $ztsmartsliderpr_navbghovercolors     	= get_post_meta($postid, 'ztsmartsliderpr_navbghovercolors', true);
    $ztsmartsliderpr_paginations_color     	= get_post_meta($postid, 'ztsmartsliderpr_paginations_color', true);
    $ztsmartsliderpr_paginations_bgcolor   	= get_post_meta($postid, 'ztsmartsliderpr_paginations_bgcolor', true);
	
	# Excerpt color 
    $ztsmartslider_excerpt_size 			= get_post_meta($postid, 'ztsmartslider_excerpt_size', true);
    $ztsmartslider_excerpt_colors 		= get_post_meta($postid, 'ztsmartslider_excerpt_colors', true);
    $ztsmartslider_excerpt_bgcolors 		= get_post_meta($postid, 'ztsmartslider_excerpt_bgcolors', true);
	
	# Content
	$ztsmartslider_content_colors 		= get_post_meta($postid, 'ztsmartslider_content_colors', true);
	$ztsmartslider_content_alignment 		= get_post_meta($postid, 'ztsmartslider_content_alignment', true);
	$ztsmartslider_content_fontsize 		= get_post_meta($postid, 'ztsmartslider_content_fontsize', true);
	
	# bg color 
	$ztsmartslider_bg_color 				= get_post_meta($postid, 'ztsmartslider_bg_color', true);
	$ztsmartslider_border_size 			= get_post_meta($postid, 'ztsmartslider_border_size', true);
	$ztsmartslider_border_colors 			= get_post_meta($postid, 'ztsmartslider_border_colors', true);

	# Date & Time
	$ztsmartslider_date_size 				= get_post_meta($postid, 'ztsmartslider_date_size', true);
	$ztsmartslider_date_color 			= get_post_meta($postid, 'ztsmartslider_date_color', true);

	# Caption color settings
	$ztsmartslider_titletext_color 		= get_post_meta($postid, 'ztsmartslider_titletext_color', true);
    $ztsmartslider_titlefont_size 		= get_post_meta($postid, 'ztsmartslider_titlefont_size', true);
    $ztsmartslider_title_alignment 		= get_post_meta($postid, 'ztsmartslider_title_alignment', true);
    $ztsmartslider_catbg_color 			= get_post_meta($postid, 'ztsmartslider_catbg_color', true);
    $ztsmartslider_cat_color 				= get_post_meta($postid, 'ztsmartslider_cat_color', true);

    
	$html .='<script>
            jQuery(document).ready(function($) {
              $("#ztcarousel-'.$postid.'").owlCarousel({
                autoplay: '.$ztsmartslider_autoplay.',
                autoplayHoverPause: '.$ztsmartsliderpr_stophover.',
                nav : '.$ztsmartsliderpr_navigation.',
                navText:["<",">"],
                dots: '.$ztsmartsliderpr_paginations.',
				margin: 10,
                smartSpeed: 450,
                clone:false,
                responsive:{
                    0:{
                      items:1,
                    },
                    678:{
                      items:3,
                    },
                    980:{
                      items:3,
                    },
                    1199:{
                      items:'.$ztsmartsliderpr_items.',
                    }
                }
              });
            });
          </script>';
    $html .='<style>';
	
	# navigation & pagination style
	if($ztsmartsliderpr_navigation_position == 1){
		$html .='
		#ztcarousel-'.$postid.' .owl-nav{
			margin-right: 0;
			margin-top: 0;
			position: absolute;
			right: 0;
			top: -50px;
		}';
	}
	$html .='
		#ztcarousel-'.$postid.' .owl-nav .owl-prev{
			background: #'.$ztsmartsliderpr_navbgcolors.';
			border-radius: 0;
			color: #'.$ztsmartsliderpr_navtextcolors.';
			cursor: pointer;
			display: inline-block;
			font-size: 14px;
			margin: 0 4px 0 0;
			border-radius:50px;
			width: 29px;
		}';
	$html .='
		#ztscarousel-'.$postid.' .owl-nav .owl-next{
			background: #'.$ztsmartsliderpr_navbgcolors.';
			border-radius: 0;
			color: #'.$ztsmartsliderpr_navtextcolors.';
			cursor: pointer;
			display: inline-block;
			font-size: 14px;
			margin: 0;
			border-radius:50px;
			width: 29px;
		}';


	$html .='	
		#ztcarousel-'.$postid.' .owl-nav .owl-next:hover, #ztcarousel-'.$postid.' .owl-nav .owl-prev:hover {
		  background: #'.$ztsmartsliderpr_navbghovercolors.';
		  color: #'.$ztsmartsliderpr_navtextcolors_hover.';
		}';
	$html .='	
		#ztcarousel-'.$postid.'.owl-theme .owl-dots {
		  text-align: '.$ztsmartsliderpr_paginationsposition.';
		  margin-top: 10px;
		}';
	

	$html .='
		#ztcarousel-'.$postid.'.owl-theme .owl-dots .owl-dot.active span, .owl-theme .owl-dots .owl-dot:hover span {
		  background: #'.$ztsmartsliderpr_paginations_color.';
		}';
		
	$html.='

	#ztcarousel-'.$postid.' .zts_single_slider_items {
		border: '.$ztsmartslider_border_size.'px solid #'.$ztsmartslider_border_colors.';
	}
	#ztcarousel-'.$postid.' .zts_single_slider_items .zts_single_slider_item_reviews{
		background: #'.$ztsmartslider_bg_color.';
	}
	#ztcarousel-'.$postid.' .zts_single_slider_items .zts_single_slider_item_post_title{
		text-align: '.$ztsmartslider_title_alignment.';
	}
	#ztcarousel-'.$postid.' .zts_single_slider_items .zts_single_slider_item_post_title a {
		font-size: '.$ztsmartslider_titlefont_size.'px;
		color: #'.$ztsmartslider_titletext_color.';
		line-height:28px;
	}
	#ztcarousel-'.$postid.' .zts_single_slider_items .zts_single_slider_item_post_title a:hover {
		color: #'.$ztsmartslider_titlehover_color.';
	}
	#ztcarousel-'.$postid.' .zts_single_slider_items .zts_single_items_meta_info .zts_single_slider_item_author a{
		color: #'.$ztsmartslider_author_color.';
		font-size: '.$ztsmartslider_author_size.'px;
		float:left;
	}
	#ztcarousel-'.$postid.' .zts_single_slider_items .zts_single_items_meta_info .zts_single_slider_item_author a i.fa{
		margin-right:5px;
	}
	#ztcarousel-'.$postid.' .zts_single_slider_items .zts_single_slider_item_reviews .zts_single_slider_item_date{
		color: #'.$ztsmartslider_date_color.';
		font-size: '.$ztsmartslider_date_size.'px;
		float:right;
	}
	#ztcarousel-'.$postid.' .zts_single_slider_items .zts_single_slider_item_description, .zts_single_excerpt_area {
		color: #'.$ztsmartslider_content_colors.';
		font-size: '.$ztsmartslider_content_fontsize.'px;
		text-align:left;
	}
	#ztcarousel-'.$postid.' .zts_single_slider_items .zts_single_excerpt_area{
		text-align: left;
	}
	#ztcarousel-'.$postid.' .zts_single_slider_items .zts_single_excerpt_area > a {
		color: #'.$ztsmartslider_excerpt_colors.';
		font-size: '.$ztsmartslider_excerpt_size.'px;
	}
	#ztcarousel-'.$postid.' .zts_single_slider_items .zts_single_excerpt_area > a:hover {
		color: #'.$ztsmartslider_excerpt_bgcolors.';
	}
	#ztcarousel-'.$postid.' .zts_single_slider_items_category {
		background: #'.$ztsmartslider_catbg_color.';
		font-size: small;
	}
	#ztcarousel-'.$postid.' .zts_single_slider_items_category a {
		color: #'.$ztsmartslider_cat_color.';
	}
';
	$html .='</style>';

    require_once('excerpt.php');

    $html .= '<div id="ztcarousel-'.$postid.'" class="owl-carousel owl-theme">';
    while ($query->have_posts()) : $query->the_post();
	$post_thumb 	= wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
	$catid 			= get_the_ID();
	$cats 			= get_the_category($catid);
    
	$html.='
		<div class="zts_single_slider_items">
			<div class="shadow-effect">
				<div class="zts_single_slider_items_post_images">';
				if(in_array('image',$ztsmartslider_content_layout)){
					$html.='<div class="zts-slider-thumb">';
						if ( has_post_thumbnail() ) {
							$html.='<img src="'.$post_thumb.'" alt="'.esc_attr(get_the_title()).'" />';
						}
					$html.='</div>';
				}
				
				if(in_array('cat',$ztsmartslider_content_layout)){
					$html.='<div class="zts_single_slider_items_category">';
						foreach ( $cats as $cat ){
							$html.='<a href="'.get_category_link($cat->cat_ID).'">'.$cat->name.'</a>';
						}
					$html.='</div>';
				}
				$html.='
				</div>';

				$html.='
				<div class="zts_single_slider_item_reviews">';
					$html.='<div class="zts_single_items_meta_info">';
					if(in_array('author_info',$ztsmartslider_content_layout)){
						$html.='<div class="zts_single_slider_item_author">
							<a href="'.get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ).'">'.get_the_author().'</a>
								</div>';
					}

					if(in_array('date_time',$ztsmartslider_content_layout)){
					$html.='<div class="zts_single_slider_item_date">'.get_the_date('d,M,y').'</div>';
					$html.='</div>';
					}

					if(in_array('title_des',$ztsmartslider_content_layout)){
					$html.='
					<div class="zts_single_slider_item_post_title"><a href="'.esc_url(get_the_permalink()).'">'.esc_attr(get_the_title()).'</a></div>
					<div class="zts_single_slider_item_description">'.ztslider_get_excerpt($excerpt_lenght).'</div>';
					$html.='</div>';
					}

					if(in_array('read_more',$ztsmartslider_content_layout)){
					$html.=
					'<div class="zts_single_excerpt_area">
						<a href="'.esc_url(get_the_permalink()).'">Read More</a>
					</div>
					
				</div>
			</div>
		</div>
	';
}
    endwhile;
    $html .='</div>';
    $html .='</div>';