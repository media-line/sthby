<?php

defined('_JEXEC') or die;

?>


<div class="uk-md-textblock uk-md-textblock-<?php echo $moduleclass_sfx ?> <?php if (($imageAlign == 'left') || ($imageAlign == 'right')) echo ' uk-grid uk-grid-collapse'; ?>" >
	<?php if (($image) && (($imageAlign == 'left') || ($imageAlign == 'top'))): ?>
	<div class="uk-textblock-img-wrapper uk-width-44">
		<img src="<?php echo $image; ?>" />
	</div>
	<?php endif;?>
	<div class="uk-textblock-text-wrapper<?php if (($imageAlign == 'left') || ($imageAlign == 'right')) echo ' uk-width-56'; ?>">
		<?php if ($title != ''): ?>
			<?php if ($enableTitleLink): ?>
				<div class="uk-md-textblock-title uk-text-bold">
					<a href="<?php echo $titleUrl; ?>"><?php echo $title; ?></a>
				</div>
			<?php else :?>
				<div class="uk-md-textblock-title uk-text-bold">
					<?php echo $title; ?>
				</div>
			<?php endif;?>
		<?php endif;?>
		
		<?php if ($text != ''): ?>
		<div class="uk-md-textblock-text">
			<?php echo $text; ?>
		</div>
		<?php endif;?>
		<?php if ($linkText != ''): ?>
		<a class="uk-button" href="<?php echo $url; ?>">
			<?php echo $linkText; ?>
		</a>
		<?php endif;?>
		<?php if ($linkText2 != ''): ?>
		<a class="uk-button" href="<?php echo $url2; ?>">
			<?php echo $linkText2; ?>
		</a>
		<?php endif;?>
	</div>
	<?php if (($image) && (($imageAlign == 'right') || ($imageAlign == 'bottom'))): ?>
	<div class="uk-textblock-img-wrapper uk-width-44">
		<img src="<?php echo $image; ?>" />
	</div>
	<?php endif;?>
</div>
