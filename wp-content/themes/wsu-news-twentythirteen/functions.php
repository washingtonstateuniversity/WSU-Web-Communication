<?php
/**
 * Various functionality required in our child theme of Twentythirteen.
 *
 * Class WSU_News_Twentythirteen
 */
class WSU_News_Twentythirteen {

	/**
	 * Hook in where needed when the theme is loaded.
	 */
	public function __construct() {
		add_action( 'after_setup_theme',  array( $this, 'setup_child_theme' ), 11 );
		add_action( 'wp_enqueue_scripts', array( $this, 'setup_header'      ),  9 );
		add_action( 'wp_enqueue_scripts', array( $this, 'modify_header'     ), 21 );

		add_filter( 'the_content_more_link', array( $this, 'the_content_more_link' ), 10, 2 );
	}

	/**
	 * Add a featured menu for the navigation.
	 */
	public function setup_child_theme() {
		remove_editor_styles();
		add_editor_style( get_stylesheet_directory_uri() . '/editor-style.css' );
		register_nav_menu( 'featured', 'Featured Menu' );
	}

	/**
	 * Enqueue the WSU common scripts and parent theme scripts.
	 *
	 * These should be added before the child theme style, which is done automatically
	 * in the parent theme.
	 */
	public function setup_header() {
		wp_enqueue_style( 'wsu-style-common', 'http://designer.wsu.edu/template/css2.aspx?key=0eab28zs011' );
		wp_enqueue_style( 'wsu-news-parent-style', get_template_directory_uri() . '/style.css' );
	}

	/**
	 * Modify the enqueue of Google fonts.
	 *
	 * TwentyThirteen loads Source Sans Pro and Bitter by default, but we use
	 * Open Sans Condensed for quite a bit. There are a few things that still
	 * use Source Sans Pro, so we should continue to include that.
	 *
	 * @todo revisit use of Bitter.
	 */
	public function modify_header() {
		wp_dequeue_style( 'twentythirteen-fonts' );
		wp_enqueue_style( 'wsu-news-fonts', 'http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic|Bitter:400,700|Open+Sans+Condensed:300,700,300italic', array(), null );
	}

	/**
	 * Display the entry meta that belongs above content for each item.
	 */
	public function head_entry_meta() {
		global $wsu_news_announcements;

		if ( ! has_post_format( 'link' ) && 'post' == get_post_type() )
			twentythirteen_entry_date();

		if ( isset( $wsu_news_announcements->post_type ) && $wsu_news_announcements->post_type == get_post_type() )
			twentythirteen_entry_date();

		// Post author
		if ( 'post' == get_post_type() ) {
			printf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				esc_attr( sprintf( __( 'View all posts by %s', 'twentythirteen' ), get_the_author() ) ),
				get_the_author()
			);
		}
	}

	/**
	 * Display the entry meta that belongs below content for each item.
	 */
	public function foot_entry_meta() {
		global $wsu_news_announcements;

		// Don't display any category or tag information for the WSU Announcements post type.
		if ( isset( $wsu_news_announcements->post_type ) && $wsu_news_announcements->post_type == get_post_type() )
			return;

		// Translators: used between list items, there is a space after the comma.
		$categories_list = get_the_category_list( __( ', ', 'twentythirteen' ) );
		if ( $categories_list ) {
			echo '<span class="categories-links">' . $categories_list . '</span>';
		}

		// Translators: used between list items, there is a space after the comma.
		$tag_list = get_the_tag_list( '', __( ', ', 'twentythirteen' ) );
		if ( $tag_list ) {
			echo '<span class="tags-links">' . $tag_list . '</span>';
		}
	}

	/**
	 * Display the paging navigation when more items exist.
	 *
	 * @param string $previous_text Text that should display for previous items. Prefixed with left arrow.
	 * @param string $next_text     Text that should display for more items. Prefixed with right arrow.
	 */
	public function paging_nav( $previous_text = '', $next_text = '' ) {
		global $wp_query;

		// Don't print empty markup if there's only one page.
		if ( $wp_query->max_num_pages < 2 )
			return;
		?>
		<nav class="navigation paging-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'twentythirteen' ); ?></h1>
			<div class="nav-links">

				<?php if ( get_next_posts_link() ) : ?>
					<div class="nav-previous"><?php next_posts_link( '<span class="meta-nav">&larr;</span> ' . $previous_text ); ?></div>
				<?php endif; ?>

				<?php if ( get_previous_posts_link() ) : ?>
					<div class="nav-next"><?php previous_posts_link( '<span class="meta-nav">&rarr;</span> '  . $next_text ); ?></div>
				<?php endif; ?>

			</div><!-- .nav-links -->
		</nav><!-- .navigation -->
		<?php
	}

	/**
	 * Remove the default #more-{post-id} that causes the position of the post to be off slightly.
	 *
	 * @param string $link           Unused. Original link text for the more link.
	 * @param string $more_link_text The text to be wrapped by the more link.
	 *
	 * @return string The link text for the more link.
	 */
	public function the_content_more_link( $link, $more_link_text ) {
		return '<a href="' . get_permalink() . '" class="more-link">' . $more_link_text . '</a>';
	}
}
$wsu_news_twentythirteen = new WSU_News_Twentythirteen();

function wsu_head_entry_meta() {
	global $wsu_news_twentythirteen;
	$wsu_news_twentythirteen->head_entry_meta();
}

function wsu_foot_entry_meta() {
	global $wsu_news_twentythirteen;
	$wsu_news_twentythirteen->foot_entry_meta();
}

function wsu_paging_nav( $previous_text = 'Older Posts', $next_text = 'Newer Posts' ) {
	global $wsu_news_twentythirteen;
	$wsu_news_twentythirteen->paging_nav( $previous_text, $next_text );
}
