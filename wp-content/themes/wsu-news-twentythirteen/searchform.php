<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text">Search for:</span>
		<input type="search" class="search-field" placeholder="Search WSU News &hellip;" value="<?php echo get_search_query(); ?>" name="s" title="Search for:" />
	</label>
	<input type="submit" class="search-submit" value="Search" />
</form>