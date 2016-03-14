    </div> <!--/main container -->
        <div class="row">
            <div class="col-8 footer">
                <div class="row">
                    <nav id="footer-nav">
                        <?php 
                                $defaults = array( 
                                'theme_location' => 'Footer Menu', 
                                'container' => 'nav', 
                                'container_class' => 'footer-nav',
                                'menu_class' => 'footer-menu-item',
                                'echo'=>true
                                ); 
                                wp_nav_menu( $defaults ); 
                                ?>   

                    </nav>
                </div>
                <hr class="footer-line">
                <div class="row">
                        <p><b>Contacts:</b><br> 
                        Speedup Bikes - Carillon Avenue - Newton - NSW <br>Ph: 0477 056 687 - Email: susanna.zanatta@gmail.com</p>
                        <p>&copy;Speedup 2015</p>
                </div>
            </div>  
        </div>     
</div> <!--/end grid-container -->
<?php wp_footer(); ?>
</body>
</html>
