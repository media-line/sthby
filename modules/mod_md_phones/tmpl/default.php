<?php

defined('_JEXEC') or die;
?>


<div class="uk-md-phones uk-md-phones-<?php echo $moduleclass_sfx ?>" >
	<?php if ($textBefore != ''): ?>
	<div class="uk-mb-phones-before uk-text-large uk-text-muted uk-margin-bottom uk-text-right">
		<?php echo $textBefore; ?>
	</div>
	<?php endif;?>
		<?php for ($i = 0; $i < $phoneCount; $i++):?>
			<a class="uk-md-phone-row" href="tel:<?php echo $phoneList->country_code[$i].$phoneList->operator_code[$i].$phoneList->phone_number[$i];?>">
				<span class="uk-phone-icon">
					<?php if ($phoneList->phone_icon[$i] != ''): ?>
						<img src="<?php echo $phoneList->phone_icon[$i];?>" />
					<?php endif;?>
				</span>
				<span class="uk-country-code uk-text-light"><?php echo $phoneList->country_code[$i];?></span>
				<span class="uk-operator-code uk-text-light"><?php echo $phoneList->operator_code[$i];?></span>
				<span class="uk-phone-number uk-text-bold"><?php echo $phoneList->phone_number[$i];?></span>
				<span class="uk-note uk-text-large uk-text-light"><?php echo $phoneList->note[$i];?></span>
			</a>
		<?php endfor;?>
	<?php if ($textAfter != ''): ?>
	<div class="uk-mb-phones-before uk-text-large uk-text-muted uk-margin-top uk-text-right">
		<?php echo $textAfter; ?>
	</div>
	<?php endif;?>
</div>
