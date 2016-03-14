<div class="col-2 aside" >  
    <div class="side-menu-categories">
      <p>CATEGORIES</p>
    <ul>
       <?php		  
        $args=array(
         'taxonomy' => 'custom_cat',	// in this case use the custom-cat taxonomy as defined in function.php
         'title_li'	=>'',				// Set the title and style of the outer list item. Defaults to "Categories". If present but empty, the outer list item will not be displayed.
        );
         wp_list_categories( $args ); ?>
  </ul>
    </div>
    <div class="side-menu-categories">
      <p>TOP PRODUCTS</p>
    <ul>
    <?php
$args = array(
        'post_type' => 'reviews',			// my custom post type
        'orderby'   => 'meta_value_num',	// this allows the items returned to be ordered by the meta key as a numerical item
        'meta_key'  => 'rating',			// use post meta stored with this key i.e. the rating information
        'posts_per_page' =>'4',				// return only five posts
            );
            $my_query2 = new WP_Query( $args );?>
            <?php    while ($my_query2->have_posts()) : $my_query2->the_post(); ?>
            <li><a href="<?php echo get_permalink(); ?>" >
            <?php the_title(); ?>
            </a></li>
            <?php endwhile; 
 /* wp_reset_query() restores the $wp_query and global post data to the original main query.*/
        wp_reset_query(); ?>  
    </ul>
    </div>
  <?php 
	  
	  if ( is_active_sidebar( 'categories' ) ) :   // 'sidewidg1 is the widget area defined in funtions.php using register_sidebar()?>
      <?php dynamic_sidebar( 'categories' ); ?>
      <?php endif; ?>
</div> <!--/aside -->   