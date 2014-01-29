<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
			<!--
			<header class="page-header">
				<h1 class="page-title"><?php _e( 'Not found', 'twentythirteen' ); ?></h1>
			</header>
			-->

			<div class="page-wrapper">
				<div class="page-content">
					<p><strong>404 Error</strong></p>
					<h2><?php _e( 'Sorry for the inconvenience. <br />WSU News is under reconstruction.', 'twentythirteen' ); ?></h2>
					<p><?php _e( 'Due to recent technical issues, WSU News is relocating and rebuilding its website. As a result, the article you are looking for is temporarily unavailable. We apologize for the inconvenience and are working to correct the issue, migrate past articles and restore search capability. Most of the <a href="http://news.wsu.edu">website</a> is operational, with the vast majority of current and archived articles available, and with additional functions being added regularly. We believe the new website will be easier to navigate and will provide more desired functions. Thanks in advance for your patience and understanding. <br /><br />

						<a href="http://news.wsu.edu">WSU News</a> ', 'twentythirteen' ); ?></p>

					<?php get_search_form(); ?>
				</div><!-- .page-content -->
			</div><!-- .page-wrapper -->

	</div><!-- #primary -->

<?php get_footer(); ?>