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


<?php if (count($list) > 0) : ?>
	<a class="uk-allnews-link uk-text-light uk-title-bordered uk-margin-large-left" href="<?php echo $list[0]->category_alias; ?>" ><?php echo JText::_('TPL_NEWS_ALLNEWS_TEXT'); ?></a>
	<ul class="uk-grid uk-news-block" data-uk-grid-match data-uk-grid-margin>
		<?php for ($i = 0, $count = count($list); $i < $count; $i ++) : ?>
		<?php $item = $list[$i]; ?>
		<li class="uk-width-medium-1-<?php echo $count ?>">
			<?php require JModuleHelper::getLayoutPath('mod_articles_news', '_item_news'); ?>
		</li>
		<?php endfor; ?>
	</ul>
<?php endif;