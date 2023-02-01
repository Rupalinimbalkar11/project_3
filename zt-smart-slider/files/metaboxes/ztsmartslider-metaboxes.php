<?php

    if( !defined( 'ABSPATH' ) ){
        exit;
    }
    
    function ztsmartslider__register_meta_boxes() {
        $ztsmarts = array( 'ztsmart');
        add_meta_box(
            'ztsmartslider_box_set1',                               
            __( 'Post Slider Settings', 'post-sliders' ),          
            'ztsmartslider__type_function',                     
            $ztsmarts,                                          
            'normal'                                              
        );
    }
    add_action( 'add_meta_boxes', 'ztsmartslider__register_meta_boxes' );

# Call Back Function...
function ztsmartslider__type_function( $post, $args){

    #Call get post meta.
    $ztsmartslider_postoptions      = get_post_meta($post->ID, 'ztsmartslider_postoptions', true );
    if(!empty($ztsmartslider_postoptions['post_types'])){
        $post_types = $ztsmartslider_postoptions['post_types'];
    }
    else{
        $post_types = array();
    }

    if(!empty($ztsmartslider_postoptions['categories'])){
        $categories = $ztsmartslider_postoptions['categories'];
    }
    else{
        $categories = array();
    }


    $ztsmartslider_bg_color                 = get_post_meta($post->ID, 'ztsmartslider_bg_color', true);
    $ztsmartslider_titletext_color      = get_post_meta($post->ID, 'ztsmartslider_titletext_color', true);
    $ztsmartslider_titlefont_size           = get_post_meta($post->ID, 'ztsmartslider_titlefont_size', true);
    $ztsmartslider_content_layout       = get_post_meta($post->ID,'ztsmartslider_content_layout',true);
    $ztsmartslider_title_alignment      = get_post_meta($post->ID, 'ztsmartslider_title_alignment', true);  
    $ztsmartslider_author_size          = get_post_meta($post->ID, 'ztsmartslider_author_size', true);  
    $ztsmartslider_author_color         = get_post_meta($post->ID, 'ztsmartslider_author_color', true); 
    $ztsmartslider_cat_color                = get_post_meta($post->ID, 'ztsmartslider_cat_color', true);    
    $ztsmartslider_catbg_color          = get_post_meta($post->ID, 'ztsmartslider_catbg_color', true);  
    $ztsmartslider_date_size                = get_post_meta($post->ID, 'ztsmartslider_date_size', true);    
    $ztsmartslider_date_color               = get_post_meta($post->ID, 'ztsmartslider_date_color', true);
    $ztsmartslider_content_fontsize     = get_post_meta($post->ID, 'ztsmartslider_content_fontsize', true);
    $ztsmartslider_content_colors           = get_post_meta($post->ID, 'ztsmartslider_content_colors', true);
    
    $ztsmartslider_border_size          = get_post_meta($post->ID, 'ztsmartslider_border_size', true);
    $ztsmartslider_border_colors            = get_post_meta($post->ID, 'ztsmartslider_border_colors', true);
    $excerpt_lenght                         = get_post_meta($post->ID, 'excerpt_lenght', true);
    $ztsmartslider_excerpt_colors       = get_post_meta($post->ID, 'ztsmartslider_excerpt_colors', true);
    $ztsmartslider_excerpt_size             = get_post_meta($post->ID, 'ztsmartslider_excerpt_size', true);
    $ztsmartslider_read_alignment       = get_post_meta($post->ID, 'ztsmartslider_read_alignment', true);
    $ztsmartslider_excerpt_bgcolors     = get_post_meta($post->ID, 'ztsmartslider_excerpt_bgcolors', true);
    $ztsmartslider_styles               = get_post_meta($post->ID, 'ztsmartslider_styles', true);
    $ztsmartslider_ordercats                = get_post_meta($post->ID, 'ztsmartslider_ordercats', true);
    $ztsmartslider_orders               = get_post_meta($post->ID, 'ztsmartslider_orders', true);
    $btn_readmore                           = get_post_meta($post->ID, 'btn_readmore', true);
    $nav_value                              = get_post_meta($post->ID, 'nav_value', true);  

    
    #Call get post meta.
    $ztsmartslider_autoplay             = get_post_meta($post->ID, 'ztsmartslider_autoplay', true);
    $ztsmartsliderpr_stophover              = get_post_meta($post->ID, 'ztsmartsliderpr_stophover', true);
    $ztsmartslider_autoplaytimeout      = get_post_meta($post->ID, 'ztsmartslider_autoplaytimeout', true);
    $ztsmartsliderpr_items                  = get_post_meta($post->ID, 'ztsmartsliderpr_items', true);
    $ztsmartsliderpr_navigation                 = get_post_meta($post->ID, 'ztsmartsliderpr_navigation', true);
    $ztsmartsliderpr_navigation_position    = get_post_meta($post->ID, 'ztsmartsliderpr_navigation_position', true);
    $ztsmartsliderpr_navtextcolors          = get_post_meta($post->ID, 'ztsmartsliderpr_navtextcolors', true);      
    $ztsmartsliderpr_navbgcolors            = get_post_meta($post->ID, 'ztsmartsliderpr_navbgcolors', true);
    $ztsmartsliderpr_paginations            = get_post_meta($post->ID, 'ztsmartsliderpr_paginations', true);
    $ztsmartsliderpr_paginationsposition    = get_post_meta($post->ID, 'ztsmartsliderpr_paginationsposition', true);
    
?>


<div class="ztsmart-slider-settings post-grid-metabox">
    <!-- <div class="wrap"> -->
    <ul class="tab-nav"> 
        <li nav="1" class="nav1 <?php if($nav_value == 1){echo "active";}?>"><i class=" " aria-hidden="true" ></i> <?php _e('Shortcodes','post-sliders'); ?></li>
        <li nav="2" class="nav2 <?php if($nav_value == 2){echo "active";}?>"><i class=" " aria-hidden="true"></i><?php _e('Query Post ','post-sliders'); ?></li>
        <li nav="3" class="nav3 <?php if($nav_value == 3){echo "active";}?>"><i class=" " aria-hidden="true"></i><?php _e('Content Settings ','post-sliders'); ?></li>
        <li nav="4" class="nav4 <?php if($nav_value == 4){echo "active";}?>"><i class=" " aria-hidden="true"></i><?php _e('Slider Settings','post-sliders'); ?></li>
    </ul> <!-- tab-nav end -->
    <?php 
        $getNavValue = "";
        if(!empty($nav_value)){ $getNavValue = $nav_value; } else { $getNavValue = 1; }
    ?>
    <input type="hidden" name="nav_value" id="nav_value" value="<?php echo $getNavValue; ?>"> 

    <ul class="box">
        <!-- Tab 1  -->
        <li style="<?php if($nav_value == 1){echo "display: block;";} else{ echo "display: none;"; }?>" class="box1 tab-box <?php if($nav_value == 1){echo "active";}?>">
            <div class="option-box">
                <p class="option-title"><?php _e('Shortcode','post-sliders'); ?></p>
                <p class="option-info"><?php _e('Copy this shortcode and paste on page or post where you want to display Post Slider.','post-sliders'); ?></p>
                <textarea cols="50" rows="1" onClick="this.select();" >[ztsmart <?php echo 'id="'.$post->ID.'"';?>]</textarea>
                <br /><br />

                <p class="option-info"><?php _e('Use PHP code to your themes file to display Post Slider.','post-sliders'); ?></p>
                <textarea cols="50" rows="2" onClick="this.select();" ><?php echo '<?php echo do_shortcode("[ztsmart id='; echo "'".$post->ID."']"; echo '"); ?>'; ?></textarea>  
            </div>
        </li>
        
        <!-- Tab 2  -->
        <li style="<?php if($nav_value == 2){echo "display: block;";} else{ echo "display: none;"; }?>" class="box2 tab-box <?php if($nav_value == 2){echo "active";}?>">

            <div class="wrap">
                <div class="option-box">
                    <p class="option-title"><?php _e('Query Post','post-sliders'); ?></p>
                    <table class="form-table">
                        <tr valign="top">
                            <th scope="row">
                                <label for="post-type"><?php _e('Post Type', 'post-sliders')?></label>
                                <br />
                                <span class="postsliderhints"><?php _e('Select your post type (post) or any custom post types\'s. if not selected any post type it not showing any categories.','post-sliders'); ?></span>
                            </th>
                            <td style="vertical-align: middle;">
                                <select required name="ztsmartslider_postoptions[post_types][]" id="ztsmartslider_postoptions" class="timezone_string changer">
                                    <option value="">Select</option>    
                                    <?php 
                                    $args=array(
                                        'public'   => true,
                                        '_builtin' => false); 
                                      $output = 'names';
                                      $operator = 'or';
                                        foreach ( get_post_types( $args,$output,$operator ) as $post_type ) 
                                        {
                                            global $wp_post_types;
                                            
                                            if(in_array($post_type,$post_types))
                                            {
                                                $selected = "selected";
                                            }
                                            else
                                            {
                                                $selected = '';
                                            }                         
                                    ?>
                                    <option value="<?php echo $post_type; ?>" <?php echo $selected; ?>><?php _e($post_type, 'ztsmart')?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr><!-- End Post Type -->


						<tr valign="top">
							<th scope="row">
								<label for="ztsmartslider_styles"><?php _e('Slider Styles', 'post-sliders')?></label>
								<br />
								<span class="postsliderhints"><?php _e('Choose your post slider style. all style available only  version. ','post-sliders'); ?></span>
							</th>
							<td>
								<label>
									<input type="radio" name="ztsmartslider_styles" id="ztsmartslider_styles" value="1" <?php if(get_post_meta($post->ID, 'ztsmartslider_styles', true)=="1") {echo "checked";}?> ><?php _e('Post Slider Style 1', 'post-sliders')?>
									<img src= "<?php echo ZTSMARTSLIDER_PLUGIN_PATH. '\assets\images\single.png';?>"/>
								</label>
							</td>
                            <td> 
								<label>
									<input type="radio" name="ztsmartslider_styles" id="ztsmartslider_styles" value="2" <?php if(get_post_meta($post->ID, 'ztsmartslider_styles', true)=="2") {echo "checked";}?> ><?php _e('Post Slider Style 2', 'post-sliders')?>
									<img src= "<?php echo ZTSMARTSLIDER_PLUGIN_PATH. '\assets\images\multiple.png';?>"/>
								</label>
							</td>
						</tr>
						<tr valign="top">
							<th></th>
							<td>
								<label>
									<input type="radio" name="ztsmartslider_styles" id="ztsmartslider_styles" value="3" <?php if(get_post_meta($post->ID, 'ztsmartslider_styles', true)=="3") {echo "checked";}?>><?php _e('Post Slider Style 3', 'post-sliders')?>
									<img src= "<?php echo ZTSMARTSLIDER_PLUGIN_PATH. '\assets\images\centre.png';?>"/>
								</label>
							</td>
                            <td> 
								<label>
									<input type="radio" name="ztsmartslider_styles" id="ztsmartslider_styles" value="4" <?php if(get_post_meta($post->ID, 'ztsmartslider_styles', true)=="4") {echo "checked";}?>><?php _e('Post Slider Style 4', 'post-sliders')?>
									<img src= "<?php echo ZTSMARTSLIDER_PLUGIN_PATH. '\assets\images\fade.png';?>"/>
								</label>
							</td>
						</tr>
						<tr valign="top">
							<th></th>
							<td>
								<label>
									<input type="radio" name="ztsmartslider_styles" id="ztsmartslider_styles" value="5" <?php if(get_post_meta($post->ID, 'ztsmartslider_styles', true)=="5") {echo "checked";}?> ><?php _e('Post Slider Style 5', 'post-sliders')?>
									<img src= "<?php echo ZTSMARTSLIDER_PLUGIN_PATH. '\assets\images\adaptive.png';?>"/>
								</label>
							</td>
                            <td> 
								<label>
									<input type="radio" name="ztsmartslider_styles" id="ztsmartslider_styles" value="6" <?php if(get_post_meta($post->ID, 'ztsmartslider_styles', true)=="6") {echo "checked";}?>><?php _e('Post Slider Style 6', 'post-sliders')?>
									<img src= "<?php echo ZTSMARTSLIDER_PLUGIN_PATH. '\assets\images\responsive.png';?>"/>
								</label>
							</td>
						</tr><!-- End Slider Styles -->
						

                        <tr valign="top">
                            <th scope="row">
                                <label for="ztsmartslider_ordercats"><?php _e('Order By', 'post-sliders')?></label>
                                <br />
                                <span class="postsliderhints"><?php _e('Choose post Order By ( Author, Title, Date etc ). ','post-sliders'); ?></span>
                            </th>
                            <td style="vertical-align: middle;">
                                <select name="ztsmartslider_ordercats" id="ztsmartslider_ordercats" class="timezone_string">
                                    <option value="author" <?php if ( isset ( $ztsmartslider_ordercats ) ) selected( $ztsmartslider_ordercats, 'author' ); ?>><?php _e('Author', 'post-sliders')?></option>
                                    <option value="post_date" <?php if ( isset ( $ztsmartslider_ordercats ) ) selected( $ztsmartslider_ordercats, 'post_date' ); ?>><?php _e('date', 'post-sliders')?></option>
                                    <option value="title" <?php if ( isset ( $ztsmartslider_ordercats ) ) selected( $ztsmartslider_ordercats, 'title' ); ?>><?php _e('Title', 'post-sliders')?></option>
                                    <option value="modified" <?php if ( isset ( $ztsmartslider_ordercats ) ) selected( $ztsmartslider_ordercats, 'modified' ); ?>><?php _e('Modified', 'post-sliders')?></option>
                                    <option value="rand" <?php if ( isset ( $ztsmartslider_ordercats ) ) selected( $ztsmartslider_ordercats, 'rand' ); ?>><?php _e('Rand', 'post-sliders')?></option>
                                </select>
                            </td>
                        </tr><!-- End Order By -->

						<tr valign="top">
							<th scope="row">
								<label for="ztsmartslider_orders"><?php _e('Order', 'post-sliders')?></label>
								<br />
								<span class="postsliderhints"><?php _e('Choose post Order Option ( Ascending or Descending). ','post-sliders'); ?></span>
							</th>
							<td style="vertical-align: middle;">
								<select name="ztsmartslider_orders" id="ztsmartslider_orders" class="timezone_string">
									<option value="DESC" <?php if ( isset ( $ztsmartslider_orders ) ) selected( $ztsmartslider_orders, 'DESC' ); ?>><?php _e('Descending', 'post-sliders')?></option>
									<option value="ASC" <?php if ( isset ( $ztsmartslider_orders ) ) selected( $ztsmartslider_orders, 'ASC' ); ?>><?php _e('Ascending', 'post-sliders')?></option>
								</select>
							</td>
						</tr><!-- End Order -->
					</table>
				</div>
			</div>
		</li>
		
		<li style="<?php if($nav_value == 3){echo "display: block;";} else{ echo "display: none;"; }?>" class="box3 tab-box <?php if($nav_value == 3){echo "active";}?>"> 
			<div class="wrap">
				<div class="option-box">
					<p class="option-title"><?php _e('Content Settings','post-sliders'); ?></p>
					<table class="form-table">
					<!-- content layout setting -->
					<tr valign="top">
					<th scope="row">
						<label for ="ztsmartslider_content_layout"><?php _e('Content Layout', 'post-sliders')?></label>
					</th>
					<td>
					<ul id="sortlist">
					
					<li><input type="checkbox" name="ztsmartslider_content_layout[]" value="title_des" <?php if(in_array('title_des',$ztsmartslider_content_layout)){echo 'checked';}?>>
					<label for="postsliders">Title Description</label><br></li>

					<li><input type="checkbox"  name="ztsmartslider_content_layout[]" value="author_info" <?php if(in_array('author_info',$ztsmartslider_content_layout)){echo 'checked';}?> >
					<label for="postsliders">Author info</label><br></li>

					<li><input type="checkbox"  name="ztsmartslider_content_layout[]" value="cat" <?php if(in_array('cat',$ztsmartslider_content_layout)){echo 'checked';}?>>
					<label for="postsliders">Category</label><br></li>

					<li><input type="checkbox"  name="ztsmartslider_content_layout[]" value="date_time" <?php if(in_array('date_time',$ztsmartslider_content_layout)){echo 'checked';}?>>
					<label for="postsliders">Date Time</label><br></li>

					<li><input type="checkbox"  name="ztsmartslider_content_layout[]" value="read_more" <?php if(in_array('read_more',$ztsmartslider_content_layout)){echo 'checked';}?>>
					<label for="postsliders">Read More</label><br></li>

					<li><input type="checkbox"  name="ztsmartslider_content_layout[]" value="image" <?php if(in_array('image',$ztsmartslider_content_layout)){echo 'checked';}?>>
					<label for="postsliders">Featured Image</label><br></li>
					</ul>
					</td>
					</tr>
					<!-- end.... -->
						<tr valign="top">
							<th scope="row">
								<label for="ztsmartslider_titlefont_size"><?php _e('Title Font Size', 'post-sliders')?></label>
								<br />
								<span class="postsliderhints"><?php _e('Choose Post Slider Title Font Size. ','post-sliders'); ?></span>
							</th>
							<td style="vertical-align: middle;">
								<input type="number" name="ztsmartslider_titlefont_size" id="ztsmartslider_titlefont_size" min="10" max="45" class="timezone_string" required value="<?php  if($ztsmartslider_titlefont_size !=''){echo $ztsmartslider_titlefont_size; }else{ echo '16';} ?>">px
							</td>
						</tr><!-- End Title Font Size-->

                        <tr valign="top">
                            <th scope="row">
                                <label for="ztsmartslider_titletext_color"><?php _e('Title Text Color', 'post-sliders')?></label>
                                <br />
                                <span class="postsliderhints"><?php _e('Choose Post Slider Title Text Color. ','post-sliders'); ?></span>
                            </th>
                            <td style="vertical-align: middle;">
                                <input type="text" name="ztsmartslider_titletext_color" value="<?php if($ztsmartslider_titletext_color !=''){echo $ztsmartslider_titletext_color;} else{ echo "#333";} ?>" class="jscolor">
                            </td>
                        </tr><!-- End Title Text Color -->
                        <tr valign="top">
                            <th scope="row">
                                <label for="ztsmartslider_title_alignment"><?php _e('Title Text Alignment', 'post-sliders')?></label>
                                <br />
                                <span class="postsliderhints"><?php _e('Choose Post Slider Title Text Alignment. ','post-sliders'); ?></span>
                            </th>
                            <td style="vertical-align: middle;">
                                <select name="ztsmartslider_title_alignment" id="ztsmartslider_title_alignment" class="timezone_string">
                                    <option value="left" <?php if ( isset ( $ztsmartslider_title_alignment ) ) selected( $ztsmartslider_title_alignment, 'left' ); ?>><?php _e('Left', 'post-sliders')?></option>
                                    <option value="center" <?php if ( isset ( $ztsmartslider_title_alignment ) ) selected( $ztsmartslider_title_alignment, 'center' ); ?>><?php _e('Center', 'post-sliders')?></option>
                                    <option value="right" <?php if ( isset ( $ztsmartslider_title_alignment ) ) selected( $ztsmartslider_title_alignment, 'right' ); ?>><?php _e('Right', 'post-sliders')?></option>
                                </select>
                            </td>
                        </tr><!-- End Caption Text Alignment-->                 

                        <tr valign="top" id="bgcontroller">
                            <th scope="row">
                                <label for="ztsmartslider_bg_color"><?php _e('Background Color', 'post-sliders')?></label>
                                <br />
                                <span class="postsliderhints"><?php _e('Choose Post Slider Item Background Color. ','post-sliders'); ?></span>
                            </th>
                            <td style="vertical-align: middle;">
                                <input type="text" name="ztsmartslider_bg_color" value="<?php if($ztsmartslider_bg_color !=''){echo $ztsmartslider_bg_color;} else{ echo "#f1f1f1";} ?>" class="jscolor">
                            </td>
                        </tr><!-- End Background Color -->              
                        
    
                        
                        <tr valign="top">
                            <th scope="row">
                                <label for="ztsmartslider_cat_color"><?php _e('Category Color', 'post-sliders')?></label>
                                <br />
                                <span class="postsliderhints"><?php _e('Choose Post Slider Categories Text Color. ','post-sliders'); ?></span>
                            </th>
                            <td style="vertical-align: middle;">
                                <input type="text" name="ztsmartslider_cat_color" value="<?php if($ztsmartslider_cat_color !=''){echo $ztsmartslider_cat_color;} else{ echo "#333";} ?>" class="jscolor">
                            </td>
                        </tr><!-- End cat text Color -->
                        
                        <tr valign="top">
                            <th scope="row">
                                <label for="ztsmartslider_catbg_color"><?php _e('Category BG Color', 'post-sliders')?></label>
                                <br />
                                <span class="postsliderhints"><?php _e('Choose Post Slider Categories Background Color. ','post-sliders'); ?></span>
                            </th>
                            <td style="vertical-align: middle;">
                                <input type="text" name="ztsmartslider_catbg_color" value="<?php if($ztsmartslider_catbg_color !=''){echo $ztsmartslider_catbg_color;} else{ echo "#f1f1f1";} ?>" class="jscolor">
                            </td>
                        </tr><!-- End cat Background Color -->
                        

                        <tr valign="top">
                            <th scope="row">
                                <label for="ztsmartslider_author_size"><?php _e('Author Font Size', 'post-sliders')?></label>
                                <br />
                                <span class="postsliderhints"><?php _e('Choose Post Slider Author Font Size. ','post-sliders'); ?></span>
                            </th>
                            <td style="vertical-align: middle;">
                                <input type="number" name="ztsmartslider_author_size" id="ztsmartslider_author_size" min="10" max="45" class="timezone_string" required value="<?php  if($ztsmartslider_author_size !=''){echo $ztsmartslider_author_size; }else{ echo '12';} ?>">px
                            </td>
                        </tr><!-- End Author Font Size-->

                        <tr valign="top">
                            <th scope="row">
                                <label for="ztsmartslider_author_color"><?php _e('Author Text Color', 'post-sliders')?></label>
                                <br />
                                <span class="postsliderhints"><?php _e('Choose Post Slider Author Text Color. ','post-sliders'); ?></span>
                            </th>
                            <td style="vertical-align: middle;">
                                <input name="ztsmartslider_author_color" value="<?php if($ztsmartslider_author_color !=''){echo $ztsmartslider_author_color;} else{ echo "#333";} ?>" class="jscolor" />
                            </td>
                        </tr><!-- End Author Font Color -->
                        

                        <tr valign="top" id="datefsize">
                            <th scope="row">
                                <label for="ztsmartslider_date_size"><?php _e('Date Font Size', 'post-sliders')?></label>
                                <br />
                                <span class="postsliderhints"><?php _e('Choose Post Slider Date Font Size. ','post-sliders'); ?></span>
                            </th>
                            <td style="vertical-align: middle;">
                                <input type="number" name="ztsmartslider_date_size" id="ztsmartslider_date_size" min="10" max="45" class="timezone_string" required value="<?php  if($ztsmartslider_date_size !=''){echo $ztsmartslider_date_size; }else{ echo '12';} ?>">px
                            </td>
                        </tr><!-- End Content Font Size-->

                        <tr valign="top" id="datefcolors">
                            <th scope="row">
                                <label for="ztsmartslider_date_color"><?php _e('Date Text Color', 'post-sliders')?></label>
                                <br />
                                <span class="postsliderhints"><?php _e('Choose Post Slider Date Text Color. ','post-sliders'); ?></span>
                            </th>
                            <td style="vertical-align: middle;">
                                <input name="ztsmartslider_date_color" value="<?php if($ztsmartslider_date_color !=''){echo $ztsmartslider_date_color;} else{ echo "#333";} ?>" class="jscolor" />
                            </td>
                        </tr><!-- End Content Font Color -->


                        <tr valign="top" id="content_textsize">
                            <th scope="row">
                                <label for="ztsmartslider_content_fontsize"><?php _e('Content Font Size', 'post-sliders')?></label>
                                <br />
                                <span class="postsliderhints"><?php _e('Choose Post Slider Content Font Size. ','post-sliders'); ?></span>
                            </th>
                            <td style="vertical-align: middle;">
                                <input type="number" name="ztsmartslider_content_fontsize" id="ztsmartslider_content_fontsize" min="10" max="45" class="timezone_string" required value="<?php  if($ztsmartslider_content_fontsize !=''){echo $ztsmartslider_content_fontsize; }else{ echo '13';} ?>">px
                            </td>
                        </tr><!-- End Content Font Size-->

                        <tr valign="top" id="conhide">
                            <th scope="row">
                                <label for="ztsmartslider_content_colors"><?php _e('Content Text Color', 'post-sliders')?></label>
                                <br />
                                <span class="postsliderhints"><?php _e('Choose Post Slider Content Text Color. ','post-sliders'); ?></span>
                            </th>
                            <td style="vertical-align: middle;">
                                <input name="ztsmartslider_content_colors" value="<?php if($ztsmartslider_content_colors !=''){echo $ztsmartslider_content_colors;} else{ echo "#000";} ?>" class="jscolor" />
                            </td>
                        </tr><!-- End Content Font Color -->            

                        <tr valign="top">
                            <th scope="row">
                                <label for="ztsmartslider_border_size"><?php _e('Border', 'post-sliders')?></label>
                                <br />
                                <span class="postsliderhints"><?php _e('Choose Post Slider Item Border Size. ','post-sliders'); ?></span>
                            </th>
                            <td style="vertical-align: middle;">
                                <input type="number" name="ztsmartslider_border_size" id="ztsmartslider_border_size" min="0" max="45" class="timezone_string" required value="<?php  if($ztsmartslider_border_size !=''){echo $ztsmartslider_border_size; }else{ echo '1';} ?>">px
                            </td>
                        </tr><!-- End Border Size-->

                        <tr valign="top" id="hide4">
                            <th scope="row">
                                <label for="ztsmartslider_border_colors"><?php _e('Border Color', 'post-sliders')?></label>
                                <br />
                                <span class="postsliderhints"><?php _e('Choose Post Slider Item Border Color. ','post-sliders'); ?></span>
                            </th>
                            <td style="vertical-align: middle;">
                                <input name="ztsmartslider_border_colors" value="<?php if($ztsmartslider_border_colors !=''){echo $ztsmartslider_border_colors;} else{ echo "#ddd";} ?>" class="jscolor" />
                            </td>
                        </tr><!-- End Overlay Icons Color -->

                        <tr valign="top" id="cp_ex_length_area">
                            <th scope="row">
                                <label for="excerpt_lenght"><?php _e('Excerpt Length in Characters (Only )', 'cppostslider')?></label>
                                <br />
                                <span class="postsliderhints"><?php _e('Choose Post Slider Details Excerpt Lenght. ','post-sliders'); ?></span>
                            </th>
                            <td style="vertical-align: middle;">
                                <input type="number" name="excerpt_lenght"  id="excerpt_lenght" maxlength="3" class="timezone_string" value="<?php echo $excerpt_lenght; ?>" >

                                <input type="text" name="btn_readmore" id="btn_readmore" maxlength="20" class="timezone_string" value="<?php echo $btn_readmore; ?>" >
                            </td>
                        </tr><!-- End Excerpt Length -->
                        
                        <tr valign="top" id="datefsize">
                            <th scope="row">
                                <label for="ztsmartslider_excerpt_size"><?php _e('Read More Font Size', 'post-sliders')?></label>
                                <br />
                                <span class="postsliderhints"><?php _e('Choose Post Slider Read More Button Font Size. ','post-sliders'); ?></span>
                            </th>
                            <td style="vertical-align: middle;">
                                <input type="number" name="ztsmartslider_excerpt_size" id="ztsmartslider_excerpt_size" min="10" max="45" class="timezone_string" required value="<?php  if($ztsmartslider_excerpt_size !=''){echo $ztsmartslider_excerpt_size; }else{ echo '12';} ?>">px
                            </td>
                        </tr><!-- End Content Font Size-->
                        
                        <tr valign="top" id="conalign">
                            <th scope="row">
                                <label for="ztsmartslider_read_alignment"><?php _e('Read More Text Alignment', 'post-sliders')?></label>
                                <br />
                                <span class="postsliderhints"><?php _e('Choose Post Slider Read More Button Alignment. ','post-sliders'); ?></span>
                            </th>
                            <td style="vertical-align: middle;">
                                <select name="ztsmartslider_read_alignment" id="ztsmartslider_read_alignment" class="timezone_string">
                                    <option value="left" <?php if ( isset ( $ztsmartslider_read_alignment ) ) selected( $ztsmartslider_read_alignment, 'left' ); ?>><?php _e('Left', 'post-sliders')?></option>
                                    <option value="center" <?php if ( isset ( $ztsmartslider_read_alignment ) ) selected( $ztsmartslider_read_alignment, 'center' ); ?>><?php _e('Center', 'post-sliders')?></option>
                                    <option value="right" <?php if ( isset ( $ztsmartslider_read_alignment ) ) selected( $ztsmartslider_read_alignment, 'right' ); ?>><?php _e('Right', 'post-sliders')?></option>
                                </select>
                            </td>
                        </tr><!-- End Content Text Alignment-->

                        <tr valign="top" id="hide5">
                            <th scope="row">
                                <label for="ztsmartslider_excerpt_colors"><?php _e('Read More Color', 'post-sliders')?></label>
                                <br />
                                <span class="postsliderhints"><?php _e('Choose Post Slider Read More Text Color. ','post-sliders'); ?></span>
                            </th>
                            <td style="vertical-align: middle;">
                                <input name="ztsmartslider_excerpt_colors" value="<?php if($ztsmartslider_excerpt_colors !=''){echo $ztsmartslider_excerpt_colors;} else{ echo "#000";} ?>" class="jscolor" />
                            </td>
                        </tr><!-- End Excerpt Color -->

                        <tr valign="top" id="hide6">
                            <th scope="row">
                                <label for="ztsmartslider_excerpt_bgcolors"><?php _e('Read More Hover Color', 'post-sliders')?></label>
                                <br />
                                <span class="postsliderhints"><?php _e('Choose Post Slider Read More Hover Text Color. ','post-sliders'); ?></span>
                            </th>
                            <td style="vertical-align: middle;">
                                <input name="ztsmartslider_excerpt_bgcolors" value="<?php if($ztsmartslider_excerpt_bgcolors !=''){echo $ztsmartslider_excerpt_bgcolors;} else{ echo "#7862D4";} ?>" class="jscolor" />
                            </td>
                        </tr><!-- End Excerpt Color --> 

                    </table>
                </div>
            </div>
        </li>

        <li style="<?php if($nav_value == 4){echo "display: block;";} else{ echo "display: none;"; }?>" class="box4 tab-box <?php if($nav_value == 4){echo "active";}?>">
            <div class="wrap">
                <div class="option-box">
                    <p class="option-title"><?php _e('Slider Settings','post-sliders'); ?></p>
                    <table class="form-table">

                        <tr valign="top">
                            <th scope="row">
                                <label for="ztsmartslider_autoplay"><?php _e('Autoplay', 'post-sliders')?></label>
                                <br />
                                <span class="postsliderhints"><?php _e('Choose Post Slider Autoplay Option. ','post-sliders'); ?></span>
                            </th>
                            <td style="vertical-align: middle;">
                                <select name="ztsmartslider_autoplay" id="ztsmartslider_autoplay" class="timezone_string">
                                    <option value="true" <?php if ( isset ( $ztsmartslider_autoplay ) ) selected( $ztsmartslider_autoplay, 'true' ); ?>><?php _e('True', 'post-sliders')?></option>
                                    <option value="false" <?php if ( isset ( $ztsmartslider_autoplay ) ) selected( $ztsmartslider_autoplay, 'false' ); ?>><?php _e('False', 'post-sliders')?></option>
                                </select>
                            </td>
                        </tr>
                        
                        <!-- End Autoplay -->

                        <tr valign="top">
                            <th scope="row">
                                <label for="ztsmartsliderpr_stophover"><?php _e('Stop Hover', 'post-sliders')?></label>
                                <br />
                                <span class="postsliderhints"><?php _e('Choose Post Slider Stop Mouse Hover Option. ','post-sliders'); ?></span>
                            </th>
                            <td style="vertical-align: middle;">
                                <select name="ztsmartsliderpr_stophover" id="ztsmartsliderpr_stophover" class="timezone_string">
                                    <option value="true" <?php if ( isset ( $ztsmartsliderpr_stophover ) ) selected( $ztsmartsliderpr_stophover, 'true' ); ?>><?php _e('True', 'post-sliders')?></option>   
                                    <option value="false" <?php if ( isset ( $ztsmartsliderpr_stophover ) ) selected( $ztsmartsliderpr_stophover, 'false' ); ?>><?php _e('False', 'post-sliders')?></option>
                                </select>                           
                            </td>
                        </tr><!-- End Stop Hover -->

                        <tr valign="top">
                            <th scope="row">
                                <label for="ztsmartslider_autoplaytimeout"><?php _e('Autoplay Time Out (Sec)', 'post-sliders')?></label>
                                <br />
                                <span class="postsliderhints"><?php _e('Choose Post Slider Autoplay Time Out (Sec). ','post-sliders'); ?></span>
                            </th>
                            <td style="vertical-align: middle;">
                                <select name="ztsmartslider_autoplaytimeout" id="ztsmartslider_autoplaytimeout" class="timezone_string">
                                    <option value="1000" <?php if ( isset ( $ztsmartslider_autoplaytimeout ) ) selected( $ztsmartslider_autoplaytimeout, '1000' ); ?>><?php _e('1', 'post-sliders')?></option>
                                    <option value="2000" <?php if ( isset ( $ztsmartslider_autoplaytimeout ) ) selected( $ztsmartslider_autoplaytimeout, '2000' ); ?>><?php _e('2 ', 'post-sliders')?></option>
                                    <option value="3000" <?php if ( isset ( $ztsmartslider_autoplaytimeout ) ) selected( $ztsmartslider_autoplaytimeout, '3000' ); ?>><?php _e('3 ', 'post-sliders')?></option>
                                    <option value="4000" <?php if ( isset ( $ztsmartslider_autoplaytimeout ) ) selected( $ztsmartslider_autoplaytimeout, '4000' ); ?>><?php _e('4 ', 'post-sliders')?></option>
                                    <option value="5000" <?php if ( isset ( $ztsmartslider_autoplaytimeout ) ) selected( $ztsmartslider_autoplaytimeout, '5000' ); ?>><?php _e('5 ', 'post-sliders')?></option>
                                    <option value="6000" <?php if ( isset ( $ztsmartslider_autoplaytimeout ) ) selected( $ztsmartslider_autoplaytimeout, '6000' ); ?>><?php _e('6 ', 'post-sliders')?></option>
                                    <option value="7000" <?php if ( isset ( $ztsmartslider_autoplaytimeout ) ) selected( $ztsmartslider_autoplaytimeout, '7000' ); ?>><?php _e('7 ', 'post-sliders')?></option>
                                    <option value="8000" <?php if ( isset ( $ztsmartslider_autoplaytimeout ) ) selected( $ztsmartslider_autoplaytimeout, '8000' ); ?>><?php _e('8 ', 'post-sliders')?></option>
                                    <option value="9000" <?php if ( isset ( $ztsmartslider_autoplaytimeout ) ) selected( $ztsmartslider_autoplaytimeout, '9000' ); ?>><?php _e('9 ', 'post-sliders')?></option>
                                    <option value="10000" <?php if ( isset ( $ztsmartslider_autoplaytimeout ) ) selected( $ztsmartslider_autoplaytimeout, '10000' ); ?>><?php _e('10', 'post-sliders')?></option>
                                </select>                           
                            </td>
                        </tr><!-- End Autoplay Time Out -->

                        <tr valign="top">
                            <th scope="row">
                                <label for="ztsmartsliderpr_items"><?php _e('Items No', 'post-sliders')?></label>
                                <br />
                                <span class="postsliderhints"><?php _e('Choose Post Slider Display Items. ','post-sliders'); ?></span>
                            </th>   
                            <td style="vertical-align: middle;">
                                <select name="ztsmartsliderpr_items" id="ztsmartsliderpr_items" class="timezone_string">
                                    <option value="3" <?php if ( isset ( $ztsmartsliderpr_items ) )  selected( $ztsmartsliderpr_items, '3' ); ?>><?php _e('3', 'post-sliders')?></option>
                                    <option value="1" <?php if ( isset ( $ztsmartsliderpr_items ) )  selected( $ztsmartsliderpr_items, '1' ); ?>><?php _e('1', 'post-sliders')?></option>
                                    <option value="2" <?php if ( isset ( $ztsmartsliderpr_items ) )  selected( $ztsmartsliderpr_items, '2' ); ?>><?php _e('2', 'post-sliders')?></option>
                                    <option value="4" <?php if ( isset ( $ztsmartsliderpr_items ) )  selected( $ztsmartsliderpr_items, '4' ); ?>><?php _e('4', 'post-sliders')?></option>
                                    <option value="5" <?php if ( isset ( $ztsmartsliderpr_items ) )  selected( $ztsmartsliderpr_items, '5' ); ?>><?php _e('5', 'post-sliders')?></option>
                                    <option value="6" <?php if ( isset ( $ztsmartsliderpr_items ) )  selected( $ztsmartsliderpr_items, '6' ); ?>><?php _e('6', 'post-sliders')?></option>
                                    <option value="7" <?php if ( isset ( $ztsmartsliderpr_items ) )  selected( $ztsmartsliderpr_items, '7' ); ?>><?php _e('7', 'post-sliders')?></option>
                                    <option value="8" <?php if ( isset ( $ztsmartsliderpr_items ) )  selected( $ztsmartsliderpr_items, '8' ); ?>><?php _e('8', 'post-sliders')?></option>
                                    <option value="9" <?php if ( isset ( $ztsmartsliderpr_items ) )  selected( $ztsmartsliderpr_items, '9' ); ?>><?php _e('9', 'post-sliders')?></option>
                                    <option value="10" <?php if ( isset ( $ztsmartsliderpr_items ) ) selected( $ztsmartsliderpr_items, '10' ); ?>><?php _e('10', 'post-sliders')?></option>
                                </select>
                            </td>
                        </tr><!-- End Items No -->
                        <tr valign="top">
                            <th scope="row">
                                <label for="ztsmartsliderpr_navigation"><?php _e('Navigation', 'post-sliders')?></label>
                                <br />
                                <span class="postsliderhints"><?php _e('Show/Hide Post Slider Navigation Option. ','post-sliders'); ?></span>
                            </th>
                            <td style="vertical-align: middle;">
                                <select name="ztsmartsliderpr_navigation" id="ztsmartsliderpr_navigation" class="timezone_string">
                                    <option value="true" <?php if ( isset ( $ztsmartsliderpr_navigation ) ) selected( $ztsmartsliderpr_navigation, 'true' ); ?>><?php _e('True', 'post-sliders')?></option>
                                    <option value="false" <?php if ( isset ( $ztsmartsliderpr_navigation ) ) selected( $ztsmartsliderpr_navigation, 'false' ); ?>><?php _e('False', 'post-sliders')?></option>
                                </select>
                            </td>
                        </tr><!-- End Navigation -->

                        <tr valign="top">
                            <th scope="row">
                                <label for="ztsmartsliderpr_navigation_position"><?php _e('Navigation Position', 'post-sliders')?></label>
                                <br />
                                <span class="postsliderhints"><?php _e('Choose Post Slider Navigation Position Option. ','post-sliders'); ?></span>
                            </th>
                            <td style="vertical-align: middle;">
                                <select name="ztsmartsliderpr_navigation_position" id="ztsmartsliderpr_navigation_position" class="timezone_string">
                                    <option value="1" <?php if ( isset ( $ztsmartsliderpr_navigation_position ) ) selected( $ztsmartsliderpr_navigation_position, '1' ); ?>><?php _e('Top Right', 'post-sliders')?></option>
                                    <option value="2" <?php if ( isset ( $ztsmartsliderpr_navigation_position ) ) selected( $ztsmartsliderpr_navigation_position, '2' ); ?>><?php _e('Top Left ', 'post-sliders')?></option>
                                    <option value="3" <?php if ( isset ( $ztsmartsliderpr_navigation_position ) ) selected( $ztsmartsliderpr_navigation_position, '3' ); ?>><?php _e('Bottom Center', 'post-sliders')?></option>
                                    <option value="4" <?php if ( isset ( $ztsmartsliderpr_navigation_position ) ) selected( $ztsmartsliderpr_navigation_position, '4' ); ?>><?php _e('Bottom Left', 'post-sliders')?></option>
                                    <option value="5" <?php if ( isset ( $ztsmartsliderpr_navigation_position ) ) selected( $ztsmartsliderpr_navigation_position, '5' ); ?>><?php _e('Bottom Right', 'post-sliders')?></option>
                                    <option value="6" <?php if ( isset ( $ztsmartsliderpr_navigation_position ) ) selected( $ztsmartsliderpr_navigation_position, '6' ); ?>><?php _e('Centred', 'post-sliders')?></option>
                                </select>
                            </td>
                        </tr><!-- End Navigation Position -->

                        <tr valign="top">
                            <th scope="row">
                                <label for="ztsmartsliderpr_navtextcolors"><?php _e('Navigation Color', 'post-sliders')?></label>
                                <br />
                                <span class="postsliderhints"><?php _e('Show/Hide Post Slider Navigation Color Option. ','post-sliders'); ?></span>
                            </th>
                            <td style="vertical-align: middle;">
                                <input type="text" name="ztsmartsliderpr_navtextcolors" value="<?php if($ztsmartsliderpr_navtextcolors !=''){echo $ztsmartsliderpr_navtextcolors;} else{ echo "#A28352";} ?>" class="jscolor">
                            </td>
                        </tr><!-- End Navigation Color -->

                        <tr valign="top">
                            <th scope="row">
                                <label for="ztsmartsliderpr_navbgcolors"><?php _e('Navigation Background Color', 'post-sliders')?></label>
                                <br />
                                <span class="postsliderhints"><?php _e('Show/Hide Post Slider Navigation Background Color Option. ','post-sliders'); ?></span>
                            </th>
                            <td style="vertical-align: middle;">
                                <input type="text" name="ztsmartsliderpr_navbgcolors" value="<?php if($ztsmartsliderpr_navbgcolors !=''){echo $ztsmartsliderpr_navbgcolors;} else{ echo "#DBEAF7";} ?>" class="jscolor">
                            </td>
                        </tr><!-- End Navigation Background Color -->

                        <tr valign="top">
                            <th scope="row">
                                <label for="ztsmartsliderpr_paginations"><?php _e('Pagination', 'post-sliders')?></label>
                                <br />
                                <span class="postsliderhints"><?php _e('Show/Hide Post Slider Pagination Option. ','post-sliders'); ?></span>
                            </th>
                            <td style="vertical-align: middle;">
                                <select name="ztsmartsliderpr_paginations" id="ztsmartsliderpr_paginations" class="timezone_string">
                                    <option value="true" <?php if ( isset ( $ztsmartsliderpr_paginations ) ) selected( $ztsmartsliderpr_paginations, 'true' ); ?>><?php _e('True', 'post-sliders')?></option>
                                    <option value="false" <?php if ( isset ( $ztsmartsliderpr_paginations ) ) selected( $ztsmartsliderpr_paginations, 'false' ); ?>><?php _e('False', 'post-sliders')?></option>
                                </select>                           
                            </td>
                        </tr><!-- End Pagination -->

                        <tr valign="top">
                            <th scope="row">
                                <label for="ztsmartsliderpr_paginationsposition"><?php _e('Pagination Position', 'post-sliders')?></label>
                                <br />
                                <span class="postsliderhints"><?php _e('Choose Post Slider Pagination Position Option. ','post-sliders'); ?></span>
                            </th>
                            <td style="vertical-align: middle;">
                                <select name="ztsmartsliderpr_paginationsposition" id="ztsmartsliderpr_paginationsposition" class="timezone_string">
                                    <option value="center" <?php if ( isset ( $ztsmartsliderpr_paginationsposition ) ) selected( $ztsmartsliderpr_paginationsposition, 'center' ); ?>><?php _e('Center', 'post-sliders')?></option>
                                    <option value="left" <?php if ( isset ( $ztsmartsliderpr_paginationsposition ) ) selected( $ztsmartsliderpr_paginationsposition, 'left' ); ?>><?php _e('Left', 'post-sliders')?></option>
                                    <option value="right" <?php if ( isset ( $ztsmartsliderpr_paginationsposition ) ) selected( $ztsmartsliderpr_paginationsposition, 'right' ); ?>><?php _e('Right', 'post-sliders')?></option>
                                </select>
                            </td>
                        </tr><!-- End Pagination Position -->

                    </table>
                </div>
            </div>
        </li>
            
        
    </ul>
</div>
<?php }   //

    
# Data save in custom metabox field
function ztsmartsliderpr_meta_box_save_func($post_id){

    # Doing autosave then return.
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return;

    #Checks for input and saves if needed
    if( isset( $_POST[ 'ztsmartslider_postoptions' ] ) ) {
        update_post_meta( $post_id, 'ztsmartslider_postoptions', $_POST['ztsmartslider_postoptions'] );
    }

    

    #Checks for input and saves if needed
    if( isset( $_POST[ 'ztsmartslider_styles' ] ) ) {
        update_post_meta( $post_id, 'ztsmartslider_styles', $_POST['ztsmartslider_styles'] );
    }

    #Checks for input and saves if needed
    if( isset( $_POST[ 'ztsmartslider_ordercats' ] ) ) {
        update_post_meta( $post_id, 'ztsmartslider_ordercats', $_POST[ 'ztsmartslider_ordercats' ] );
    }

    #Checks for input and saves if needed
    if( isset( $_POST[ 'ztsmartslider_orders' ] ) ) {
        update_post_meta( $post_id, 'ztsmartslider_orders', $_POST[ 'ztsmartslider_orders' ] );
    }

    #Checks for input and saves if needed
    if( isset( $_POST[ 'ztsmartslider_bg_color' ] ) ) {
        update_post_meta( $post_id, 'ztsmartslider_bg_color', $_POST[ 'ztsmartslider_bg_color' ] );
    }
    
    #Checks for input and saves if needed
    if( isset( $_POST[ 'ztsmartslider_border_colors' ] ) ) {
        update_post_meta( $post_id, 'ztsmartslider_border_colors', $_POST[ 'ztsmartslider_border_colors' ] );
    }
    
    #Checks for input and saves if needed
    if( isset( $_POST[ 'ztsmartslider_border_size' ] ) ) {
        update_post_meta( $post_id, 'ztsmartslider_border_size', $_POST[ 'ztsmartslider_border_size' ] );
    }   

    
    #Checks for input and saves if needed
    if( isset( $_POST[ 'ztsmartslider_titletext_color' ] ) ) {
        update_post_meta( $post_id, 'ztsmartslider_titletext_color', $_POST[ 'ztsmartslider_titletext_color' ] );
    }
    
    #Checks for input and saves if needed
    if( isset( $_POST[ 'ztsmartslider_titlehover_color' ] ) ) {
        update_post_meta( $post_id, 'ztsmartslider_titlehover_color', $_POST[ 'ztsmartslider_titlehover_color' ] );
    }
    
    #Checks for input and saves if needed
    if( isset( $_POST[ 'ztsmartslider_content_colors' ] ) ) {
        update_post_meta( $post_id, 'ztsmartslider_content_colors', $_POST[ 'ztsmartslider_content_colors' ] );
    }
    
    
    
    
    #Checks for input and saves if needed
    if( isset( $_POST[ 'ztsmartslider_author_size' ] ) ) {
        update_post_meta( $post_id, 'ztsmartslider_author_size', $_POST[ 'ztsmartslider_author_size' ] );
    }
    
    #Checks for input and saves if needed
    if( isset( $_POST[ 'ztsmartslider_author_color' ] ) ) {
        update_post_meta( $post_id, 'ztsmartslider_author_color', $_POST[ 'ztsmartslider_author_color' ] );
    }
    
    #Checks for input and saves if needed
    if( isset( $_POST[ 'ztsmartslider_cat_color' ] ) ) {
        update_post_meta( $post_id, 'ztsmartslider_cat_color', $_POST[ 'ztsmartslider_cat_color' ] );
    }
    
    #Checks for input and saves if needed
    if( isset( $_POST[ 'ztsmartslider_catbg_color' ] ) ) {
        update_post_meta( $post_id, 'ztsmartslider_catbg_color', $_POST[ 'ztsmartslider_catbg_color' ] );
    }
    
    #Checks for input and saves if needed
    if( isset( $_POST[ 'ztsmartslider_date_color' ] ) ) {
        update_post_meta( $post_id, 'ztsmartslider_date_color', $_POST[ 'ztsmartslider_date_color' ] );
    }
    
    #Checks for input and saves if needed
    if( isset( $_POST[ 'ztsmartslider_date_size' ] ) ) {
        update_post_meta( $post_id, 'ztsmartslider_date_size', $_POST[ 'ztsmartslider_date_size' ] );
    }
    
    #Checks for input and saves if needed
    if( isset( $_POST[ 'ztsmartslider_content_alignment' ] ) ) {
        update_post_meta( $post_id, 'ztsmartslider_content_alignment', $_POST[ 'ztsmartslider_content_alignment' ] );
    }
    
    #Checks for input and saves if needed
    if( isset( $_POST[ 'ztsmartslider_content_fontsize' ] ) ) {
        update_post_meta( $post_id, 'ztsmartslider_content_fontsize', $_POST[ 'ztsmartslider_content_fontsize' ] );
    }
    
    #Checks for input and saves if needed
    if( isset( $_POST[ 'ztsmartslider_title_alignment' ] ) ) {
        update_post_meta( $post_id, 'ztsmartslider_title_alignment', $_POST[ 'ztsmartslider_title_alignment' ] );
    }
    
    #Checks for input and saves if needed
    if( isset( $_POST[ 'ztsmartslider_titlefont_size' ] ) ) {
        update_post_meta( $post_id, 'ztsmartslider_titlefont_size', $_POST[ 'ztsmartslider_titlefont_size' ] );
    }

    #save the value 
    if( isset( $_POST[ 'ztsmartslider_content_layout' ] ) ) {
        update_post_meta( $post_id, 'ztsmartslider_content_layout', $_POST[ 'ztsmartslider_content_layout' ] );
    }
    
    
    #Checks for input and sanitizes/saves if needed
    if( isset($_POST['excerpt_lenght']) && ($_POST['excerpt_lenght'] != '')  && ($_POST['excerpt_lenght'] != '0') && (strlen($_POST['excerpt_lenght']) <= 3)) {
        update_post_meta( $post_id, 'excerpt_lenght', esc_html($_POST['excerpt_lenght']) );
    } else{
        update_post_meta( $post_id, 'excerpt_lenght', 100 );
    }

    #Checks for input and sanitizes/saves if needed
    if( isset( $_POST['btn_readmore'] ) && ( $_POST['btn_readmore'] != '') && ( strlen($_POST['btn_readmore']) <= 20) ) {
        update_post_meta( $post_id, 'btn_readmore', esc_html($_POST['btn_readmore']) );
    } else{
        update_post_meta( $post_id, 'btn_readmore', 'Read More' );

    }
    
    #Checks for input and saves if needed
    if( isset( $_POST[ 'ztsmartslider_excerpt_colors' ] ) ) {
        update_post_meta( $post_id, 'ztsmartslider_excerpt_colors', $_POST[ 'ztsmartslider_excerpt_colors' ] );
    }
    
    #Checks for input and saves if needed
    if( isset( $_POST[ 'ztsmartslider_excerpt_size' ] ) ) {
        update_post_meta( $post_id, 'ztsmartslider_excerpt_size', $_POST[ 'ztsmartslider_excerpt_size' ] );
    }
    
    #Checks for input and saves if needed
    if( isset( $_POST[ 'ztsmartslider_read_alignment' ] ) ) {
        update_post_meta( $post_id, 'ztsmartslider_read_alignment', $_POST[ 'ztsmartslider_read_alignment' ] );
    }
    
    #Checks for input and saves if needed
    if( isset( $_POST[ 'ztsmartslider_excerpt_bgcolors' ] ) ) {
        update_post_meta( $post_id, 'ztsmartslider_excerpt_bgcolors', $_POST[ 'ztsmartslider_excerpt_bgcolors' ] );
    }


    // Carousal Settings

    #Checks for input and sanitizes/saves if needed
    if( isset($_POST['ztsmartsliderpr_items']) && ($_POST['ztsmartsliderpr_items'] != '') ) {
        update_post_meta( $post_id, 'ztsmartsliderpr_items', esc_html($_POST['ztsmartsliderpr_items']) );
    }


    #Checks for input and sanitizes/saves if needed    
    if( isset( $_POST['ztsmartsliderpr_margin'] ) ) {
        if(strlen($_POST['ztsmartsliderpr_margin']) > 2){     // input value length greate than 2 

        } else{
            if( $_POST['ztsmartsliderpr_margin'] == '' || $_POST['ztsmartsliderpr_margin'] == is_null($_POST['ztsmartsliderpr_margin']) ){

                update_post_meta( $post_id, 'ztsmartsliderpr_margin', 0 );

            }
            else
            {
                if (is_numeric($_POST['ztsmartsliderpr_margin'])) {

                    update_post_meta( $post_id, 'ztsmartsliderpr_margin', esc_html($_POST['ztsmartsliderpr_margin']) );

                }

            }
        }
    }
    
    
    #Value check and saves if needed
    if( isset( $_POST[ 'nav_value' ] ) ) {
        update_post_meta( $post_id, 'nav_value', $_POST['nav_value'] );
    } else {
        update_post_meta( $post_id, 'nav_value', 1 );
    }

    #Checks for input and sanitizes/saves if needed    
    if( isset($_POST['ztsmartsliderpr_navigation']) && ($_POST['ztsmartsliderpr_navigation'] != '') ) {
        update_post_meta( $post_id, 'ztsmartsliderpr_navigation', esc_html($_POST['ztsmartsliderpr_navigation']) );
    }
    
    #Checks for input and sanitizes/saves if needed    
    if( isset($_POST['ztsmartsliderpr_navigation_position']) && ($_POST['ztsmartsliderpr_navigation_position'] != '') ) {
        update_post_meta( $post_id, 'ztsmartsliderpr_navigation_position', esc_html($_POST['ztsmartsliderpr_navigation_position']) );
    }
    
    #Checks for input and sanitizes/saves if needed    
    if( isset($_POST['ztsmartsliderpr_paginationsposition']) && ($_POST['ztsmartsliderpr_paginationsposition'] != '') ) {
        update_post_meta( $post_id, 'ztsmartsliderpr_paginationsposition', esc_html($_POST['ztsmartsliderpr_paginationsposition']) );
    }

    #Checks for input and sanitizes/saves if needed    
    if( isset($_POST['ztsmartsliderpr_paginations']) && ($_POST['ztsmartsliderpr_paginations'] != '') ) {
        update_post_meta( $post_id, 'ztsmartsliderpr_paginations', esc_html($_POST['ztsmartsliderpr_paginations']) );
    }  

    #Checks for input and sanitizes/saves if needed    
    if( isset($_POST['ztsmartsliderpr_paginations_color']) && ($_POST['ztsmartsliderpr_paginations_color'] != '') ) {
        update_post_meta( $post_id, 'ztsmartsliderpr_paginations_color', esc_html($_POST['ztsmartsliderpr_paginations_color']) );
    }

    #Checks for input and sanitizes/saves if needed    
    if( isset($_POST['ztsmartsliderpr_paginations_bgcolor']) && ($_POST['ztsmartsliderpr_paginations_bgcolor'] != '') ) {
        update_post_meta( $post_id, 'ztsmartsliderpr_paginations_bgcolor', esc_html($_POST['ztsmartsliderpr_paginations_bgcolor']) );
    } 

      
    
    #Checks for input and sanitizes/saves if needed    
    if( isset($_POST['ztsmartslider_autoplay']) && ($_POST['ztsmartslider_autoplay'] != '') ) {
        update_post_meta( $post_id, 'ztsmartslider_autoplay', esc_html($_POST['ztsmartslider_autoplay']) );
    }

    #Checks for input and sanitizes/saves if needed    
    if( isset( $_POST['ztsmartslider_autoplay_speed'] ) ) {
        if(strlen($_POST['ztsmartslider_autoplay_speed']) > 4 ){

        } else{

            if($_POST['ztsmartslider_autoplay_speed'] == '' || is_null($_POST['ztsmartslider_autoplay_speed'])){

                update_post_meta( $post_id, 'ztsmartslider_autoplay_speed', 700 );
            }
            else{
                if (is_numeric($_POST['ztsmartsliderpr_margin']) && strlen($_POST['ztsmartslider_autoplay_speed']) <= 4) {

                    update_post_meta( $post_id, 'ztsmartslider_autoplay_speed', esc_html($_POST['ztsmartslider_autoplay_speed']) );

                }    

            }
        }
    }
	
    
    #Checks for input and sanitizes/saves if needed    
    if( isset($_POST['ztsmartslider_center_mode']) && ($_POST['ztsmartslider_center_mode'] != '') ) {
        update_post_meta( $post_id, 'ztsmartslider_center_mode', esc_html($_POST['ztsmartslider_center_mode']) );
    }

    #Checks for input and sanitizes/saves if needed    
    if( isset($_POST['ztsmartsliderpr_stophover']) && ($_POST['ztsmartsliderpr_stophover'] != '') ) {
        update_post_meta( $post_id, 'ztsmartsliderpr_stophover', esc_html($_POST['ztsmartsliderpr_stophover']) );
    }

     # 
    #Checks for input and sanitizes/saves if needed    
    if( isset($_POST['ztsmartslider_autoplaytimeout']) && ($_POST['ztsmartslider_autoplaytimeout'] != '') ) {
        update_post_meta( $post_id, 'ztsmartslider_autoplaytimeout', esc_html($_POST['ztsmartslider_autoplaytimeout']) );
    }

    #Checks for input and sanitizes/saves if needed    
    if( isset($_POST['ztsmartsliderpr_navtextcolors']) && ($_POST['ztsmartsliderpr_navtextcolors'] != '') ) {
        update_post_meta( $post_id, 'ztsmartsliderpr_navtextcolors', esc_html($_POST['ztsmartsliderpr_navtextcolors']) );
    }
    
    #Checks for input and sanitizes/saves if needed    
    if( isset($_POST['ztsmartsliderpr_navtextcolors_hover']) && ($_POST['ztsmartsliderpr_navtextcolors_hover'] != '') ) {
        update_post_meta( $post_id, 'ztsmartsliderpr_navtextcolors_hover', esc_html($_POST['ztsmartsliderpr_navtextcolors_hover']) );
    }

    #Checks for input and sanitizes/saves if needed    
    if( isset($_POST['ztsmartsliderpr_navbgcolors']) && ($_POST['ztsmartsliderpr_navbgcolors'] != '') ) {
        update_post_meta( $post_id, 'ztsmartsliderpr_navbgcolors', esc_html($_POST['ztsmartsliderpr_navbgcolors']) );
    }
    #Checks for input and sanitizes/saves if needed    
    if( isset($_POST['ztsmartsliderpr_navbghovercolors']) && ($_POST['ztsmartsliderpr_navbghovercolors'] != '') ) {
        update_post_meta( $post_id, 'ztsmartsliderpr_navbghovercolors', esc_html($_POST['ztsmartsliderpr_navbghovercolors']) );
    }

}
add_action( 'save_post', 'ztsmartsliderpr_meta_box_save_func' );
# Custom metabox field end






