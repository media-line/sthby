<?php

defined('_JEXEC') or die;

?>


<div class="uk-md-textblock uk-md-textblock-<?php echo $moduleclass_sfx ?>" >
	<?php if ($title != ''): ?>
	<div class="uk-h4 uk-text-bold uk-title-bordered">
		<?php echo $title; ?>
	</div>
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
