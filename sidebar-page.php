<?php if ( is_active_sidebar( 'page-content' ) ) : ?>
	<div id = "widget-area">
		<?php dynamic_sidebar( 'page-content' ); ?>
	</div>
<?php endif; ?>