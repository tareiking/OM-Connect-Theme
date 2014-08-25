<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ) ; ?>">
	<span class="row collapse">
		<label for="s" class="screen-reader-text"><?php _e( 'Search', 'om-connect' ); ?></label>
		<span class="small-9 columns">
			<input type="text" class="field" name="s" id="s" placeholder="<?php esc_attr_e( 'Search', 'om-connect' ); ?>" />
		</span>
		<span class="small-3 columns">
			<input type="submit" class="submit button" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Go', 'om-connect' ); ?>" />
		</span>
	</span>
</form>