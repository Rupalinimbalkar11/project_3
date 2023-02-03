<?php

if( !defined( 'ABSPATH' ) ){
    exit;
}

function ztslider_get_taxonomy_categories($postid){
	if( current_user_can('manage_options') ){
		if( isset($_POST['post_types']) ){
			$post_types = stripslashes_deep( $_POST['post_types'] );
			$postid = sanitize_text_field( $_POST['postid'] );		
			$ztsmartslider_postoptions = get_post_meta( $postid, 'ztsmartslider_postoptions', true );
			
			if(!empty( $ztsmartslider_postoptions['categories']) ){
				$categories = $ztsmartslider_postoptions['categories'];
			}
			else{
				$categories = array();
			}
		}
		else{
			$ztsmartslider_postoptions = get_post_meta( $postid, 'ztsmartslider_postoptions', true );
			
			if(	!empty($ztsmartslider_postoptions['post_types']) ){
				$post_types = $ztsmartslider_postoptions['post_types'];
			}
			else{
				$post_types = array();
			}
			if( !empty($ztsmartslider_postoptions['categories']) ){
				$categories = $ztsmartslider_postoptions['categories'];
			}
			else{
				$categories = array();
			}
		}

		if(isset($_POST['postid'])){
			$postid = sanitize_text_field($_POST['postid']);
		}

		$taxonomies = get_object_taxonomies( $post_types );

		if(!empty($taxonomies)){
			echo '<select required style="min-width:162px !important"  class="timezone_string" name="ztsmartslider_postoptions[categories][]" multiple="multiple" size="10">';

			foreach ( $taxonomies as $taxonomy ){
				$the_taxonomy = get_taxonomy( $taxonomy );
				
				$args = array(
				  'orderby' => 'name',
				  'order' => 'ASC',
				  'taxonomy' => $taxonomy,
				  'hide_empty' => false,
				  );
				
				$categories_all = get_categories( $args );
				
				if( !empty( $categories_all ) ){
					foreach( $categories_all as $category_info ){
						if(in_array($taxonomy.','.$category_info->cat_ID, $categories)){
							$selected = 'selected';
						}
						else{
							$selected = '';
						}
					?>
					<option <?php echo $selected; ?> value="<?php echo $taxonomy.','.$category_info->cat_ID; ?>" ><?php echo $category_info->cat_name; ?></option>
					<?php
					}
				}
			}
			echo '</select>';
		}
		else{ 
			echo 'No categories found.';
		}
	}
	if(isset($_POST['post_types'])){
		die();
	}
}
add_action('wp_ajax_ztslider_get_taxonomy_categories', 'ztslider_get_taxonomy_categories');