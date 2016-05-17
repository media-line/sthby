<?php 
	/*if (!$is_blog) {
		$doc = JFactory::getDocument();
		$doc->addScript('/templates/sth/warp/vendor/uikit/js/lightbox.js');
	}*/
	
?>
<article class="uk-article<?php if ($is_blog) echo ' uk-article-blog';?>" <?php if ($permalink) echo 'data-permalink="'.$permalink.'"'; ?>>
<div class="uk-clearfix">
	<?php/* if ($image && $image_alignment == 'none') : ?>
		<?php if ($url) : ?>
			<a href="<?php echo $url; ?>" title="<?php echo $image_caption; ?>"><img src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>"></a>
		<?php else : ?>
			<img src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>">
		<?php endif; ?>
	<?php endif; */?>

	<?php if ($title) : ?>
		<?php if (!$is_blog): ?>
		<div class="uk-margin-large-bottom">
		<h1 class="uk-article-title">
			<?php if ($url && $title_link) : ?>
				<a href="<?php echo $url; ?>" title="<?php echo $title; ?>"><?php echo $title; ?></a>
			<?php else : ?>
				<?php echo $title; ?>
			<?php endif; ?>
		</h1>
		<?php endif; ?>
	<?php endif; ?>
	
	<?php if ($date_published || $date_modified || $hits) : ?>
		<?php if (!$is_blog): ?>
			<?php
				$date_published = ($date_published) ? JHtml::_('date', $date_published, JText::_("M'y")) : '';
				$date_modified = ($date_modified) ? JHtml::_('date', $date_modified, JText::_('DATE_FORMAT_LC3')) : '';
			?>
			
			<?php if ($date_published) : ?>
				<span class="uk-news-date uk-fullarticle-date uk-text-small uk-text-contrast uk-position-relative uk-margin-remove uk-text-right"><?php echo $date_published; ?></span>
			<?php endif; ?>
			<?php if ($date_modified || $hits) : ?>
				<ul class="uk-list">
					<?php if ($date_modified) : ?>
						<li><?php printf(JText::_('COM_CONTENT_LAST_UPDATED'), $date_modified); ?></li>
					<?php endif; ?>

					<?php if ($hits) : ?>
						<li><?php printf(JText::_('COM_CONTENT_ARTICLE_HITS'), $hits); ?></li>
					<?php endif; ?>
				</ul>
			<?php endif; ?>	
		<?php endif; ?>	
	<?php endif; ?>

	<?php if ($title) : ?>
		<?php if (!$is_blog): ?>
		</div>
		<?php endif; ?>	
	<?php endif; ?>
	<?php echo $hook_aftertitle; ?>

	<?php if ($author || $date || $category) : ?>
	<p class="uk-article-meta">

		<?php

			$author   = ($author && $author_url) ? '<a href="'.$author_url.'">'.$author.'</a>' : $author;
			$date     = ($date) ? ($datetime ? '<time datetime="'.$datetime.'">'.JHtml::_('date', $date, JText::_('DATE_FORMAT_LC3')).'</time>' : JHtml::_('date', $date, JText::_('DATE_FORMAT_LC3'))) : '';
			$category = ($category && $category_url) ? '<a href="'.$category_url.'">'.$category.'</a>' : $category;

			if($author && $date) {
				printf(JText::_('TPL_WARP_META_AUTHOR_DATE'), $author, $date);
			} elseif ($author) {
				printf(JText::_('TPL_WARP_META_AUTHOR'), $author);
			} elseif ($date) {
				printf(JText::_('TPL_WARP_META_DATE'), $date);
			}

			if ($category) {
				echo ' ';
				printf(JText::_('TPL_WARP_META_CATEGORY'), $category);
			}

		?>

	</p>
	<?php endif; ?>

	<?php if ($is_blog) : ?>
		<?php if ($image && $image_alignment != 'none') : ?>
			<?php if ($url) : ?>
				<a class="uk-article-image" href="<?php echo $url; ?>" title="<?php echo $image_caption; ?>"><img src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>"></a>
			<?php else : ?>
				<div class="uk-article-image">
					<img class="uk-article-image" src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>">
				</div>
			<?php endif; ?>
		<?php endif; ?>
	<?php else : ?>
		<?php if ($image && $image_alignment != 'none') : ?>
			<?php if ($url) : ?>
				<a class="uk-article-image uk-align-left" href="<?php echo $url; ?>" title="<?php echo $image_caption; ?>"><img src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>"></a>
			<?php else : ?>
				<a class="uk-article-image uk-align-left" href="<?php echo $image; ?>" data-uk-lightbox>
					<img class="" src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>">
				</a>
			<?php endif; ?>
		<?php endif; ?>
	<?php endif; ?>
	<?php if ($is_blog) echo '<div class="uk-width-1-1 uk-grid uk-grid-collapse uk-article-content-margin">'; ?>
	<?php if ($date_published || $date_modified || $hits) : ?>
		<?php if ($is_blog): ?>
			<?php
				$date_published = ($date_published) ? JHtml::_('date', $date_published, JText::_("M'y")) : '';
				$date_modified = ($date_modified) ? JHtml::_('date', $date_modified, JText::_('DATE_FORMAT_LC3')) : '';
			?>
			<div class="uk-width-1-4">
				<ul class="uk-list">
					<?php if ($date_published) : ?>
						<li class="uk-news-date uk-text-small uk-text-contrast uk-position-relative uk-text-right"><?php echo $date_published; ?></li>
					<?php endif; ?>

					<?php if ($date_modified) : ?>
						<li><?php printf(JText::_('COM_CONTENT_LAST_UPDATED'), $date_modified); ?></li>
					<?php endif; ?>

					<?php if ($hits) : ?>
						<li><?php printf(JText::_('COM_CONTENT_ARTICLE_HITS'), $hits); ?></li>
					<?php endif; ?>
				</ul>
			</div>
		<?php endif; ?>
	<?php endif; ?>
	
	<div class="uk-article-content <?php if (($date_published || $date_modified || $hits)&&($is_blog)) echo 'uk-width-3-4'; else echo 'uk-width-1-1'; ?>">
		<?php if ($title) : ?>
			<?php if ($is_blog): ?>
			<div class="uk-article-teaser-title uk-text-bold">
				<?php if ($url && $title_link) : ?>
					<a href="<?php echo $url; ?>" title="<?php echo $title; ?>"><?php echo $title; ?></a>
				<?php else : ?>
					<?php echo $title; ?>
				<?php endif; ?>
			</div>
			<?php endif; ?>
		<?php endif; ?>
		
		<?php echo $hook_beforearticle; ?>

		<?php if ($article) : ?>
			<?php echo $article; ?>
		<?php endif; ?>

		<?php if ($tags) : ?>
		<p><?php echo JText::_('TPL_WARP_TAGS').': '.$tags; ?></p>
		<?php endif; ?>

		<?php if ($more) : ?>
		<p>
			<a class="uk-readmore" href="<?php echo $url; ?>" title="<?php echo $title; ?>"><?php echo JText::_("TPL_READMORE_TEXT"); ?></a>
		</p>
		<?php endif; ?>

		<?php if ($edit) : ?>
		<p><?php echo $edit; ?></p>
		<?php endif; ?>
	</div>
	
	<?php if ($is_blog) echo '</div>'; ?>
</div>
	<?php if ($previous || $next) : ?>
	<ul class="uk-pagination uk-margin-large-top">
		<?php if ($previous) : ?>
		<li class="uk-pagination-previous">
			<a href="<?php echo $previous; ?>"><?php echo JText::_('TPL_NEWS_PREVIOUS'); ?></a>
		</li>
		<?php endif; ?>

		<?php if ($next) : ?>
		<li class="uk-pagination-next">
			<a href="<?php echo $next; ?>"><?php echo JText::_('TPL_NEWS_NEXT'); ?></a>
		</li>
		<?php endif; ?>
	</ul>
	<?php endif; ?>

	<?php echo $hook_afterarticle; ?>

</article>
