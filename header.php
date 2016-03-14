<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="bikes, vintge, bicycle, bike accessories">
    <meta name="description" content="Cool vintage bikes">
    <!--[if IE]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js">
    </script>
    <![endif]-->
    <!--[if lt IE 9]>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
    <title>Speedup - Vintage bikes</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">  
	<?php
		wp_head();
	?>
</head>

<body>
<div class="grid-container outline"> 
    <div class="row wrapper">
        <div class="row">
            <div class="col-1 logo"><img src="<?= get_stylesheet_directory_uri () ?>/img/logo-white.png" alt="Speedup logo" style="width: 100%; margin: 0; paddng: 0;"></div> 
            <div class="navigation col-7 dropdown">      
            <input type="checkbox" id="button">
            <label for="button" onclick></label>
            <?php 
                $defaults = array( 
                'theme_location' => 'Primary Menu', 
                'container' => 'nav', 
                'container_class' => 'main-menu',
                'menu_class' => 'menu',
                'echo'=>true
                ); 
                wp_nav_menu( $defaults ); 
            ?>   	
            </div>
        </div>
    </div>
