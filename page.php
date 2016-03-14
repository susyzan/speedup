<?php
get_header();

if (is_front_page()):
?>
    <div class="row">
        <div class="col-8 header">
            <img src="<?= get_stylesheet_directory_uri () ?>/img/banner.jpg" alt="White and red race bike" style="max-width: 100%">    
        </div>
        <div class="col-8 tagline"><p>The coolest bikes on Earth</p></div>         
    </div>
<?php // If it’s anything else show more detail  
endif;
if (is_page()):
?>
    <div class="row main-container"> 
        <div class="col-6 section">        
            <div class="row " id="main">
            <?php
            if ( have_posts() ) : while ( have_posts() ) :
            the_post(); ?>
                <div class="row">
                    <div class="col-8 main-text">                         
                        <h1><a href="<?= get_permalink() ?>"> <?php the_title() ;?> </a></h1>
                        <?php the_content() ;?>
                        <div class="col-8 main-image">
                        <?php if (has_post_thumbnail()) {
        the_post_thumbnail('custom-thumb-about', array( 'class' => 'img-responsive' ));
    	}?>
                        </div> 
                    </div>
                </div>
            <?php endwhile; else: ?>
            <div class="row">
                    <p>Sorry, this page does not exist</p>
            </div>
<?php endif;
?>
        </div>
    </div>
<?php
endif;// If it’s anything else show more detail 
?>
                    
                
                        
                  
                
            

 <?php
  get_sidebar();
  get_footer();
  ?>