<?php 
/*
Template Name: Login Page
*/
?>
<?php 
	$et_ptemplate_settings = array();
	$et_ptemplate_settings = maybe_unserialize( get_post_meta($post->ID,'et_ptemplate_settings',true) );
	
	$fullwidth = isset( $et_ptemplate_settings['et_fullwidthpage'] ) ? (bool) $et_ptemplate_settings['et_fullwidthpage'] : false;
?>

<?php get_header(); ?>

<div id="main_content" class="clearfix<?php if ( $fullwidth ) echo ' fullwidth'; ?>">
	<div id="left_area">
		<?php get_template_part('includes/breadcrumbs', 'page'); ?>
		
		<?php get_template_part('loop', 'page'); ?>
		
		<div id="et-login" class="responsive">
			<div class='et-protected'>
				<div class='et-protected-form'>
					<form action='<?php echo home_url(); ?>/wp-login.php' method='post'>
						<p><label><?php esc_html_e('Username','Trim'); ?>: <input type='text' name='log' id='log' value='<?php echo esc_attr($user_login); ?>' size='20' /></label></p>
						<p><label><?php esc_html_e('Password','Trim'); ?>: <input type='password' name='pwd' id='pwd' size='20' /></label></p>
						<input type='submit' name='submit' value='Login' class='etlogin-button' />
					</form> 
				</div> <!-- .et-protected-form -->
				<p class='et-registration'><?php esc_html_e('Not a member?','Trim'); ?> <a href='<?php echo site_url('wp-login.php?action=register', 'login_post'); ?>'><?php esc_html_e('Register today!','Trim'); ?></a></p>
			</div> <!-- .et-protected -->
		</div> <!-- end #et-login -->
		
		<div class="clear"></div>
		
		<?php if ( 'on' == get_option('trim_show_pagescomments') ) comments_template('', true); ?>
	</div> <!-- end #left_area -->
	
	<?php if ( ! $fullwidth ) get_sidebar(); ?>
</div> <!-- end #main_content -->

<?php get_footer(); ?>