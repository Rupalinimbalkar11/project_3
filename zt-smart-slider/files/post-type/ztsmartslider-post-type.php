<?php

	if( !defined( 'ABSPATH' ) ){
	    exit;
	}

	function ztsmartslider_post_register() {

		# Set UI labels for Custom Post Type
		$labels = array(
			'name'                => _x( 'ZT Smart Slider', 'Post Type General Name', 'ztsmart-slider' ),
			'singular_name'       => _x( 'ZT Smart Slider', 'Post Type Singular Name', 'ztsmart-slider' ),
			'menu_name'           => __( 'ZT Smart Slider ', 'ztsmart-slider' ),
			'parent_item_colon'   => __( 'Parent Slider ', 'ztsmart-slider' ),
			'all_items'           => __( 'All Slider ', 'ztsmart-slider' ),
			'view_item'           => __( 'View Slider ', 'ztsmart-slider' ),
			'add_new_item'        => __( 'Add Smart Slider', 'ztsmart-slider' ),
			'add_new'             => __( 'Add Smart Slider', 'ztsmart-slider' ),
			'edit_item'           => __( 'Edit Smart Slider ', 'ztsmart-slider' ),
			'update_item'         => __( 'Update Smart Slider ', 'ztsmart-slider' ),
			'search_items'        => __( 'Search Smart Slider ', 'ztsmart-slider' ),
			'not_found'           => __( 'Not Found', 'ztsmart-slider' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'ztsmart-slider' ),
		);

		# Set other options for Custom Post Type

		$args = array(
			'label'               => __( 'postsliders', 'ztsmart-slider' ),
			'description'         => __( 'Slider reviews', 'ztsmart-slider' ),
			'labels'              => $labels,
			'supports'            => array( 'title'),
			'taxonomies'          => array( 'genres' ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'page',
			'menu_icon'		      => 'dashicons-editor-table'
		);

		// Registering your Custom Post Type
		register_post_type( 'ztsmart', $args );

	}
	add_action( 'init', 'ztsmartslider_post_register', 0 );

	# Carousel Manage Shortcode Column 
	function ztsmartslider_register_column( $ztscolumns ) {
	 return array_merge( $ztscolumns,
	  array(
	  		'shortcode' 	=> __( 'Shortcode', 'ztsmart-slider' ),
	  		'doshortcode' 	=> __( 'Template Shortcode', 'ztsmart-slider' ))
	   );
	}
	add_filter( 'manage_ztsmart_posts_columns' , 'ztsmartslider_register_column' );


	function ztsmartslider_register_column_display( $ztsmartslider_column, $post_id ) {
		if ( $ztsmartslider_column == 'shortcode' ){
		  ?>
		  <input style="background:#ddd" type="text" onClick="this.select();" value="[ztsmart <?php echo 'id=&quot;'.$post_id.'&quot;';?>]" />
		  <?php
		}

		if ( $ztsmartslider_column == 'doshortcode' ){
			?>
			<textarea cols="40" rows="2" style="background:#ddd;" onClick="this.select();" ><?php echo '<?php echo do_shortcode("[ztsmart id='; echo "'".$post_id."']"; echo '"); ?>'; ?></textarea>
			<?php
		}
	}
	add_action( 'manage_ztsmart_posts_custom_column' , 'ztsmartslider_register_column_display', 10, 2 );