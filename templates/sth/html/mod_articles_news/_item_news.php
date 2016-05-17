<?php
/**
* @package   Warp Theme Framework
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

// no direct access
defined('_JEXEC') or die;

?>

<div class="uk-grid uk-grid-collapse">
	<div class="uk-width-1-4 uk-text-right">
		<div class="uk-news-date uk-text-small uk-text-contrast uk-position-relative">
			<?php echo JHTML::date($item->publish_up, "M'y") ?> 
		</div>
	</div>
	<div class="uk-width-3-4 uk-news-content">
		<?php if ($params->get('item_title')) : ?>
		<div class="uk-text-bold uk-margin-large-bottom">
			<?php if ($params->get('link_titles') && $item->link != '') : ?>
				<a href="<?php echo $item->link; ?>"><?php echo $item->title;?></a>
			<?php else : ?>
				<?php echo $item->title; ?>
			<?php endif; ?>
		</div>
		<?php endif; ?>


		<?php if (!$params->get('intro_only')) echo $item->afterDisplayTitle; ?>
		<div class="uk-news-text">
			<?php echo $item->beforeDisplayContent; ?>

			<?php //echo $item->introtext; ?>
			<?php 
				$stringLimit = 85;
				$symbolsPattern = array('.',',','!','?',':',';','/');
				$flag = false;
				$originalString = strip_tags($item->introtext);
				$originalLength = strlen($item->introtext);
				if ($originalLength > $stringLimit) {
					$processedString = mb_substr($originalString, 0, $stringLimit, 'UTF-8'); 
					$numb = mb_strrpos($processedString, ' ', 'UTF-8');
					$resultString = mb_substr($processedString, 0, $numb, 'UTF-8');
					$resultLength = strlen($resultString);
					if (in_array($resultString[$resultLength-1], $symbolsPattern)) {
						$resultString[$resultLength-1] = '.';
						$resultString .= '..';
					} else $resultString .= '...';
				}
			?> 
			<?php echo $resultString; ?>

			<?php if (isset($item->link) && $item->readmore && $params->get('readmore')) :
				echo '<a class="uk-readmore" href="'.$item->link.'">'.JText::_('TPL_READMORE_TEXT').'</a>';
			endif;?>
		</div>
	</div>
</div>
