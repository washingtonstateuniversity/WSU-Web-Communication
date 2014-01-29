<?php
/**
 * The template for displaying Announcement Archive pages.
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<?php if ( have_posts() ) : ?>
			<header class="archive-header">
				<h1 class="archive-title"><?php post_type_archive_title(); ?></h1>
			</header><!-- .archive-header -->

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>

			<?php wsu_paging_nav( 'Previous Announcements', 'More Announcements' ); ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

	</div><!-- #primary -->
<?php get_footer(); ?>