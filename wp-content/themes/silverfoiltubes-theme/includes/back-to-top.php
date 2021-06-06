<?php if( get_field('backtotop_settings','options') ) : ?>
	<div id="backToTop">
		<?php if( get_field('backtotop_type','options') ) : ?>
			<?php if( $customToTop = get_field('custom_backtotop','options') ) : ?>
				<a href="javascript:void(0);" class="custom-backToTop">
					<img src="<?= $customToTop['url']; ?>" alt="<?= get_bloginfo('name'); ?>" class="img-fluid">
				</a>
			<?php else : ?>
				<a class="arrow-up">
				  <span class="left-arm"></span>
				  <span class="right-arm"></span>
				  <span class="arrow-slide"></span>
				</a>
			<?php endif; ?>
		<?php else : ?>
			<a class="arrow-up">
			  <span class="left-arm"></span>
			  <span class="right-arm"></span>
			  <span class="arrow-slide"></span>
			</a>
		<?php endif; ?>
	</div>
<?php endif; ?>