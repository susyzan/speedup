<?php 
/** * Enqueue scripts and styles. */ 

add_action( 'wp_enqueue_scripts','speedup_scripts' ); 

function speedup_scripts() 
{ 
    wp_enqueue_style( 'style', get_stylesheet_uri() );
    wp_enqueue_script( 'jquery');
 } 
 
register_nav_menu('Primary Menu', 'primary menu horizontal' ); 
register_nav_menu('Footer Menu', 'footer'); 

add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size(287, 192, true); 
add_image_size( 'custom-thumb-raceBike', 800, 533, true );
add_image_size( 'custom-thumb-about', 1000, 478, true );

/****widgets*****/
add_action( 'widgets_init','speedup_widgets_init' ); 
function speedup_widgets_init() {
     register_sidebar( array(			
			'name' => __( 'Categories', 'theme_text_domain' ), 
			'id' => 'categories', 
			'description' => '', 
			'class' => 'side-menu-categories', 
			'before_widget' => '<div id="%1$s" class="side-menu-categories">',
			'after_widget' => '</div>', 
			'before_title' => '<h2 class="widgettitle">', 
			'after_title' => '</h2>' )); 
}

//***custom post types***//
add_action( 'after_switch_theme', 'speedup_flush_rewrite_rules' );

// Flush your rewrite rules
function speedup_flush_rewrite_rules() {
	flush_rewrite_rules();
}

// let's create the function for the custom type
function speedup_review() { 
	// creating (registering) the custom type 
	register_post_type( 'reviews', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this post type
		array( 'labels' => array(
			'name' => __( 'Reviews', 'speedup' ), /* This is the Title of the Group */
			'singular_name' => __( 'Review', 'speedup' ), /* This is the individual type */
			'all_items' => __( 'All Reviews', 'speedup' ), /* the all items menu item */
			'add_new' => __( 'Add New Review', 'speedup' ), /* The add new menu item */
			'add_new_item' => __( 'Add New Review', 'speedup' ), /* Add New Display Title */
			'edit' => __( 'Edit', 'speedup' ), /* Edit Dialog */
			'edit_item' => __( 'Edit', 'speedup' ), /* Edit Display Title */
			'new_item' => __( 'New Review', 'speedup' ), /* New Display Title */
			'view_item' => __( 'View Review', 'speedup' ), /* View Display Title */
			'search_items' => __( 'Search Reviews', 'speedup' ), /* Search Custom Type Title */ 
			'not_found' =>  __( 'Oops, nothing to see here...', 'speedup' ), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __( 'No reviews in the trash bin.', 'speedup' ), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'This is a review cutom post', 'speedup' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => 'dashicons-heart', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'review', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'review', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
		) /* end of options */
	); /* end of register post type */
	
	/* this adds your post categories to your custom post type */
	register_taxonomy_for_object_type( 'custom_cat', 'reviews' );
	/* this adds your post tags to your custom post type */
	register_taxonomy_for_object_type( 'custom_tag', 'reviews' );
	
}

	// adding the function to the Wordpress init
	add_action( 'init', 'speedup_review');
	
	/*
	for more information on taxonomies, go here:
	http://codex.wordpress.org/Function_Reference/register_taxonomy
	*/
	
	// now let's add custom categories (these act like categories)
	register_taxonomy( 'custom_cat', 
		array('reviews'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
		array('hierarchical' => true,     /* if this is true, it acts like categories */
			'labels' => array(
				'name' => __( 'Review Categories', 'speedup' ), /* name of the custom taxonomy */
				'singular_name' => __( 'Review Category', 'speedup' ), /* single taxonomy name */
				'search_items' =>  __( 'Search Review Categories', 'speedup' ), /* search title for taxomony */
				'all_items' => __( 'All Review Categories', 'speedup' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent Review Category', 'speedup' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent Review Category:', 'speedup' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit Review Category', 'speedup' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update Review Category', 'speedup' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add New Review Category', 'speedup' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New Review Category Name', 'speedup' ) /* name title for taxonomy */
			),
			'show_admin_column' => true, 
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'custom-slug' ),
		)
	);
	
	// now let's add custom tags (these act like categories)
	register_taxonomy( 'custom_tag', 
		array('reviews'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
		array('hierarchical' => false,    /* if this is false, it acts like tags */
			'labels' => array(
				'name' => __( 'Review Tags', 'speedup' ), /* name of the custom taxonomy */
				'singular_name' => __( 'Review Tag', 'speedup' ), /* single taxonomy name */
				'search_items' =>  __( 'Search Review Tags', 'speedup' ), /* search title for taxomony */
				'all_items' => __( 'All Review Tags', 'speedup' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent Review Tag', 'speedup' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent Review Tag:', 'speedup' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit Review Tag', 'speedup' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update Review Tag', 'speedup' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add New Review Tag', 'speedup' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New Review Tag Name', 'speedup' ) /* name title for taxonomy */
			),
			'show_admin_column' => true,
			'show_ui' => true,
			'query_var' => true,
		)
	);
        
        
 ?>
