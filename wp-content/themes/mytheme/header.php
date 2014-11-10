<!DOCTYPE html>
<html>
	<head>
		<title><?php wp_title(' | ',true,'right' );?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href = "<?php bloginfo('stylesheet_url'); ?>"  rel = "stylesheet">
		<?php wp_head(); ?>
		
	</head>
	<body>
		
		<div class = "navbar navbar-inverse navbar-static-top">
			<div class = "container">
				
				<a href = "#" class = "navbar-brand">Tech Site</a>
				
				<button class = "navbar-toggle" data-toggle = "collapse" data-target = ".navHeaderCollapse">
					<span class = "icon-bar"></span>
					<span class = "icon-bar"></span>
					<span class = "icon-bar"></span>
				</button>
				
				<div class = "collapse navbar-collapse navHeaderCollapse">
				
			 <?php
            wp_nav_menu( array(
                'menu'              => 'primary',
                'theme_location'    => 'primary',
                'depth'             => 2,
                'menu_class'        => 'nav navbar-nav navbar-right',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker())
            );
        ?>
				
				</div>
				
			</div>
		</div>
		
		<div class = "container">