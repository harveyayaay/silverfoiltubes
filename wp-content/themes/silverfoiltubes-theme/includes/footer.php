<footer id="footer">
	<div class="custom-width-footer">
		<div class="content">
			<?php if( $copyRight = get_field('copyright', 'options') ) : ?>
				<div class="copyright"><?= $copyRight; ?></div>
			<?php else : ?>
				<div class="copyright">Copyright © <?= date('Y'); ?>. All right reserved</div>
			<?php endif; ?>
			<?php
				$privacyPolicy = get_field('privacy_policy', 'options');
				$termsCondition = get_field('terms_condition', 'options');
			?>
			<div class="powered-by">
				<a href="<?= $privacyPolicy ? get_permalink($privacyPolicy) : '#'; ?>">
					<?= $privacyPolicy ? get_the_title($privacyPolicy) : 'Privacy Policy'; ?>
				</a>
				<a href="<?= $termsCondition ? get_permalink($termsCondition) : '#'; ?>">
					<?= $termsCondition ? get_the_title($termsCondition) : 'Terms & Condition'; ?>
				</a>
			</div>
		</div>
	</div>
</footer>