<?php
	//числа с которыми идет сравнение для подсчета кол-ва товаров (плюшка 'Более 100')
	$twoDigit = 10;
	$threeDigit = 100;
	$fourDigit = 1000;
?>
<div class="uk-home-categories">
	<div class="uk-grid">
	<?php
	if ($limit != 0){
		$count = 0;
		foreach($categories_arr as $curr){
			$category = JTable::getInstance('category', 'jshop');        
			$category->load($curr->category_id);
			$childCategories = $category->getChildCategories();
			$productsCount = $category->getCountProducts();
			foreach ($childCategories as $subCategory){
				$category->load($subCategory->category_id);
				$productsCount +=$category->getCountProducts();
			}
			$str = $productsCount.'';
			$countStr = '';
			if (($productsCount > $twoDigit) && ($productsCount < $threeDigit)){
				$countStr = JText::_("TPL_SITE_CATALOG_MORE_TEXT").$str[0].'0';
			}
			if (($productsCount > $threeDigit) && ($productsCount < $fourDigit)){
				$countStr = JText::_("TPL_SITE_CATALOG_MORE_TEXT").$str[0].$str[1].'0';
			}
			if ($productsCount > $fourDigit){
				$countStr = JText::_("TPL_SITE_CATALOG_MORE_TEXT").$str[0].$str[1].'00';
			}
			
			$class = "jshop_menu_level_".$curr->level;
			if ($categories_id[$curr->level]==$curr->category_id) $class = $class."_a";      
			?>
			<div class="<?php print $class?> uk-width-1-3">
				<div class="uk-text-center">
					<a class="uk-category-teaser uk-inline-block uk-text-left" href="<?php print $curr->category_link?>">
						<?php if ($show_image && $curr->category_image){?>
							<div class="uk-category-teaser-img">
								<img align = "absmiddle" src = "<?php print $jshopConfig->image_category_live_path."/".$curr->category_image?>" alt = "<?php print $curr->name?>" />
							</div>
						<?php } ?>
						<div class="uk-text-center">
							<div class="uk-category-teaser-name uk-h4 uk-text-bold uk-title-bordered uk-position-relative">
								<?php print $curr->name?>
								<?php if ($countStr != ''):?>
									<div class="uk-category-teaser-count uk-position-absolute uk-text-contrast"><?php echo $countStr?></div>
								<?php endif; ?>
							</div>
						</div>
					</a>
				</div>
			</div>
	<?php
			$count++;
			if ($limit == $count){
				break;
			}
		}
	}	
	?>
	</div>
</div>