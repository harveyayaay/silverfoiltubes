<?php if( get_field('quick_links_option','options') ) : ?>
	<?php if( $quickLinks = get_field('quick_links','options') ) : ?>
		<?php
			$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
      $currentlink = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
  	?>
		<nav id="quickLinks" class="d-xl-none hidden-print">
			<ul class="menu">
				<?php foreach( $quickLinks as $quickLink ) : ?>
					<?php
						$active = $currentlink == $quickLink['link'] ? ' class="active"': '';
					?>
					<li<?= $active; ?>>
						<a href="<?= $quickLink['link'] ? $quickLink['link'] : '#'; ?>">
							<?php if( $asd = $quickLink['icon'] ) : ?>
								<div class="icon">
									<?= $asd; ?>
								</div>
							<?php endif; ?>
							<?php if( $label = $quickLink['label'] ) : ?>
								<div class="label">
									<?= $label; ?>
								</div>
							<?php endif; ?>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>
		</nav>
	<?php endif; ?>
<?php endif; ?>
