 <?php
 get_header();
 ?> 
    <div class="row main-container">        
        <div class="col-6 section">        
            <div class="row " id="main">                
            <?php
                if ( have_posts() ) : while ( have_posts() ) : the_post();
            ?>
                <div class="row review">
                    <div class="col-3 image-review">
                    <?php 
                        if (has_post_thumbnail()) {
                        the_post_thumbnail('custom-thumb-raceBike', array( 'class' => 'img-responsive' ));
                        }
                    ?> 
                    </div> 
                    <div class="col-5 text-review">
                        <h2><a href="<?= get_permalink() ?>"> <?php the_title() ;?> </a></h2>
                        <p class="date"> <?php the_time('l jS F');?> </p>
                        <?php the_content(); ?> 
                        <h3 class="tags">Price: &nbsp; $<?php the_field('price');?> </h3>
                        <h4 class="tags">Product rating: &nbsp; <?php the_field('rating');?> </h4>
                        <div class="col-2 btn">
                        <a href="<?= get_permalink() ?>">view more</a>
                        </div>
                    </div>
                     
                </div>
                <?php endwhile; else: ?> 
                <div class="row review">
                    <p>Sorry, this page does not exist</p>
                </div>
                <?php endif; // If it’s anything else show more detail 
                ?>				
            </div>
        </div> <!--/main-container --> 
<?php
 get_sidebar();
 get_footer();
 ?>