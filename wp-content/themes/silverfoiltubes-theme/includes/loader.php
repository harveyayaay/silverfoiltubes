<?php if( get_field('loader_settings', 'options') ) : ?>
	<div id="loader-overlay">
		<div class="loader">
			<?php if( get_field('loader_type', 'options') ) : ?>
				<?php if( $customLoader = get_field('custom_loader', 'options') ) : ?>
					<div class="custom-loader">
						<img src="<?= $customLoader['url']; ?>" alt="Loader">
					</div>
				<?php else : ?>
					<span class="loader-wrapper">
						<span class="loader-inner"></span>
					</span>
				<?php endif; ?>
			<?php else : ?>
				<span class="loader-wrapper">
					<span class="loader-inner"></span>
				</span>
			<?php endif; ?>
		</div>
	</div>
<?php endif; ?>