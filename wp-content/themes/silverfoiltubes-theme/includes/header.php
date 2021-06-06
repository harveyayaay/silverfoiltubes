<header id="header">
	<div class="custom-width-header">
		<div class="container-fluid">
			<div class="row">
				<div class="col-1 header-logo"> 
					<?php if( $logo = get_field('logo', 'options') ) : ?>
						<div class="logo">
							<a href="<?= get_bloginfo('url'); ?>">
								<img src="<?= $logo['url']; ?>" alt="<?= get_bloginfo('name'); ?>">
							</a>
						</div>
					<?php endif; ?>
				</div>
				<div class="col-11 header-navigation"> 
					<nav class="header-nav">
						<?php
							$menu = array(
								'theme_location' => 'primary',
								'container' => false,
								'menu_class' => 'menu d-none d-xl-inline-flex',
								'depth' => 4
							);
							wp_nav_menu( $menu );
						?>
					</nav>
				</div>
			</div>
		</div>
	</div>
</header>