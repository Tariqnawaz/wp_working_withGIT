<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
<label>
		<span class="screen-reader-text"><?php _e( 'Search for:', 'minnak' ); ?></span>
	</label>
	<div class="search-form-in-page">
		<input type="search" class="search-field" placeholder="<?php esc_attr_e( 'Search...', 'minnak' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php esc_attr_e( 'Search for:', 'minnak' ); ?>" />
		<button type="submit" class="search-submit">
			<svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path fill-rule="evenodd" clip-rule="evenodd" d="M21.6464 21.6464C21.8417 21.4512 22.1583 21.4512 22.3536 21.6464L25.8536 25.1464C26.0488 25.3417 26.0488 25.6583 25.8536 25.8536C25.6583 26.0488 25.3417 26.0488 25.1464 25.8536L21.6464 22.3536C21.4512 22.1583 21.4512 21.8417 21.6464 21.6464Z" fill="#FFF"/>
				<path fill-rule="evenodd" clip-rule="evenodd" d="M17 23C20.3137 23 23 20.3137 23 17C23 13.6863 20.3137 11 17 11C13.6863 11 11 13.6863 11 17C11 20.3137 13.6863 23 17 23ZM17 24C20.866 24 24 20.866 24 17C24 13.134 20.866 10 17 10C13.134 10 10 13.134 10 17C10 20.866 13.134 24 17 24Z" fill="#FFF"/>
			</svg>
		</button>
	</div>
</form>
