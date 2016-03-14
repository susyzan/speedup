<?php
get_header();

?>
    <div class="row">
        <div class="col-8 header">
            <img src="<?= get_stylesheet_directory_uri () ?>/img/banner.jpg" alt="White and red race bike" style="max-width: 100%">    
        </div>
        <div class="col-8 tagline"><p>The coolest bikes on Earth</p></div>         
    </div>

    <div class="row main-container"> 
        <div class="col-6 section">        
            <div class="row " id="main">
            <?php
            if ( have_posts() ) : while ( have_posts() ) :
            the_post(); ?>
                                        
                        <h1><a href="<?= get_permalink() ?>"> <?php the_title() ;?> </a></h1>
                        <?php the_content() ;?>                        
                  
              
            <?php endwhile;endif; ?>
                        </div>
         
               <div class="row reviews-container">             
                   <div class="col-8 reviews">
                      <?php
// a new query to display the latest 4 custom post ) 		  
$args = array(
	'post_type' => 'reviews',		// name of cutome post type
	'posts_per_page' =>'4',			// how many to display
);
	$latest_posts = new WP_Query($args);

   if($latest_posts->have_posts()) : 
      while($latest_posts->have_posts()) : 
         $latest_posts->the_post();
?> 
                       <div class="col-2 latest">
                            <?php if (has_post_thumbnail()) {
        the_post_thumbnail('custom-thumb-raceBike', array( 'class' => 'img-responsive' ));
    	}?>
                           <a href="<?php the_permalink(); ?>"><h2><?php the_title() ;?></h2></a>
                     <?php the_excerpt('');?>
                      <div class="btn">
                                <a href="<?php the_permalink(); ?>">read more</a>
                            </div>
                        </div>
                   
     
                <?php endwhile; 
	wp_reset_postdata();
	else: ?>
    <p>Sorry, no posts available</p>
    <?php 
endif; ?>
    </div>
       </div>
    </div>



         

 <?php
  get_sidebar();
  get_footer();
  ?>