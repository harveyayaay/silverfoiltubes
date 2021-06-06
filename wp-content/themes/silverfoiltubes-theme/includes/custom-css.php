<?php if( $css = get_field('custom_css','options') ) : ?>
	<style>
		<?= $css; ?>
	</style>
<?php endif; ?>