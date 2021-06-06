<?php if( $script = get_field('custom_js', 'options') ) : ?>
	<script type="text/javascript">
		(function($) {
			<?= $script; ?>
		})(jQuery);
	</script>
<?php endif; ?>