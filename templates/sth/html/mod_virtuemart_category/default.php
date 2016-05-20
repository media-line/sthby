<?php // no direct access
defined('_JEXEC') or die('Restricted access');
//JHTML::stylesheet ( 'menucss.css', 'modules/mod_virtuemart_category/css/', false );

/* ID for jQuery dropdown */
$ID = str_replace('.', '_', substr(microtime(true), -8, 8));
$js="
//<![CDATA[
jQuery(document).ready(function() {
		jQuery('#VMmenu".$ID." li.VmClose ul').hide();
		jQuery('#VMmenu".$ID." li .VmArrowdown').click(
		function() {

			if (jQuery(this).parent().next('ul').is(':hidden')) {
				jQuery('#VMmenu".$ID." ul:visible').delay(500).slideUp(500,'linear').parents('li').addClass('VmClose').removeClass('VmOpen');
				jQuery(this).parent().next('ul').slideDown(500,'linear');
				jQuery(this).parents('li').addClass('VmOpen').removeClass('VmClose');
			}
		});
	});
//]]>
" ;

		$document = JFactory::getDocument();
		$document->addScriptDeclaration($js);
		
		
//числа с которыми идет сравнение дл€ подсчета кол-ва товаров (плюшка 'Ѕолее 100')
$twoDigit = 10;
$threeDigit = 100;
$fourDigit = 1000;

function countProductsByCategoryRecursive ($categoryId = 0) {
 
    $categoryModel = VmModel::getModel ('category');
    $childrenCategories = $categoryModel->getChildCategoryList(null, $categoryId);
 
    $product_count = 0;
 
    if( ! $childrenCategories){
        $product_count += $categoryModel->countProducts ($categoryId);
    }else{
        foreach($childrenCategories as $value){
            $product_count += countProductsByCategoryRecursive($value->virtuemart_category_id);
        }
    }
 
    return $product_count;
}

function getCategoryImage ($categoryId) {
    $mediaModel = VmModel::getModel ('media');
    $mediaCategory = $mediaModel->getFiles(false, false, null, $categoryId);
	$categoryImage = $mediaCategory[0]->file_url;
	
    return $categoryImage;
}
?>

		
		
<div class="uk-home-categories" id="<?php echo "VMmenu".$ID ?>" >
	<div class="uk-grid">
		<?php $count = 1; ?>
		<?php foreach ($categories as $category) { 
			if ($count <= 6) { 
				$productsCount = countProductsByCategoryRecursive($category->virtuemart_category_id);
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
				
				$categoryImage = getCategoryImage($category->virtuemart_category_id); 

				 $active_menu = 'class="VmClose"';
				$caturl = JRoute::_('index.php?option=com_virtuemart&view=category&virtuemart_category_id='.$category->virtuemart_category_id);
				$cattext = $category->category_name;
				//if ($active_category_id == $category->virtuemart_category_id) $active_menu = 'class="active"';
				if (in_array( $category->virtuemart_category_id, $parentCategories)) $active_menu = 'class="VmOpen"';

				?>

				<div class="uk-width-1-3">
					<div class="uk-text-center">
						<a href="<?php echo $caturl; ?>" class="uk-category-teaser uk-inline-block uk-text-left">
							<div class="uk-category-teaser-img">
								<img align="absmiddle" src="<?php echo $categoryImage; ?>" alt="">
							</div>
							<div class="uk-text-center">
								<div class="uk-category-teaser-name uk-h4 uk-text-bold uk-title-bordered uk-position-relative">
									<?php echo $cattext; ?>
									<div class="uk-category-teaser-count uk-position-absolute uk-text-contrast">
										<?php echo $countStr; ?>
									</div>
								</div>
							</div>
						</a>
					</div>
				</div>
			<?php } ?>
			<?php $count++; ?>
		<?php } ?>
	</div>
</div>
