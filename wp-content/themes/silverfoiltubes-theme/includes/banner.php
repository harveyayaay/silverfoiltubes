<?php if( get_field('banner_option') == true ) : ?>
	<?php
		if( get_field('banner_type') == false ) :
			if( $banner = get_field('banner_image') ) :
				$styling = ' style="background-image:url('.$banner['url'].')"';
			else :
				$styling = ' style="background-image:url('.placeholder().')"';
			endif;
		endif;
		if( get_field('banner_title_option') == true ) :
			$title = get_field('banner_custom_title');
		else :
			$title = get_the_title();
		endif;
		if( get_field('banner_title_type') == true ) :
			$heading = '<div class="heading">'.$title.'</div>';
		else :
			$heading = '<h1 class="heading">'.$title.'</h1>';
		endif;
	?>
	<section class="banner<?= ( get_field('banner_size') == true ) ? ' full-page' : ''; ?>"<?= $styling; ?>>
		<?php if( get_field('banner_type') == false ) : ?>
			<div class="banner-wrap">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<?= $heading; ?>
							<?php if( get_field('banner_breadcrumbs') == true ) : ?>
								<div class="bread-crumbs">
									<?php
										if ( function_exists('yoast_breadcrumb') ) {
									  	yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
										}
									?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		<?php else : ?>
			<?php // Video ?>
			<div class="title">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<?= $heading; ?>
							<?php if( get_field('banner_breadcrumbs') == true ) : ?>
								<div class="bread-crumbs">
									<?php
										if ( function_exists('yoast_breadcrumb') ) {
									  	yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
										}
									?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
			<?php if( get_field('banner_video_option') == true ) : ?>
				<div class="video">
					<iframe src="https://www.youtube.com/embed/<?= ( get_field('banner_youtube_link') ) ? get_youtube_id_from_url(get_field('banner_youtube_link')) : get_youtube_id_from_url('https://www.youtube.com/watch?v=yAoLSRbwxL8'); ?>?autoplay=1&mute=1controls=0&loop=1&rel=0&enablejsapi=1&"></iframe>
				</div>
			<?php else : ?>
				<div class="video">
					<?php if( $video = get_field('banner_video') ) : ?>
						<video controls="false" autoplay="true">
							<source src="<?= $video['url'] ?>" type="<?= $video['mime_type']; ?>">
						</video>
					<?php else : ?>
						<iframe src="https://www.youtube.com/embed/<?= get_youtube_id_from_url('https://www.youtube.com/watch?v=yAoLSRbwxL8'); ?>?autoplay=1&mute=1controls=0&loop=1&rel=0&enablejsapi=1&"></iframe>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		<?php endif; ?>
	</section>
<?php endif; ?>