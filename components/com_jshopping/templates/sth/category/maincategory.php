<?php 
/**
* @version      4.10.5 13.08.2013
* @author       MAXXmarketing GmbH
* @package      Jshopping
* @copyright    Copyright (C) 2010 webdesigner-profi.de. All rights reserved.
* @license      GNU/GPL
*/
defined('_JEXEC') or die('Restricted access');

print $this->_tmp_maincategory_html_start;
$pageTitle = $this->params->get('page_title');

//числа с которыми идет сравнение для подсчета кол-ва товаров (плюшка 'Более 100')
$twoDigit = 10;
$threeDigit = 100;
$fourDigit = 1000;

?>

<?php if ($this->params->get('show_page_heading') && $this->params->get('page_heading',$pageTitle)){?>
<div class="shophead<?php print $this->params->get('pageclass_sfx');?>">
    <h1 class="uk-text-bold"><?php print $this->params->get('page_heading',$pageTitle)?></h1>
</div>
<?php }?>

<div class="jshop" id="comjshop">
    <div class="category_description">
        <?php print $this->category->description?>
    </div>

    <div class="jshop_list_category uk-list-category uk-grid">
    <?php if (count($this->categories)) : ?>
    
        <?php foreach ($this->categories as $k => $category) : ?>
            <?php/* if ($k % $this->count_category_to_row == 0) : ?>
                <div class = "row-fluid">
			<?php	endif; */?>
			<?php	
			$currentCategory = JTable::getInstance('category', 'jshop');        
			$currentCategory->load($category->category_id);
			$childCategories = $currentCategory->getChildCategories();
			$productsCount = $currentCategory->getCountProducts();
			foreach ($childCategories as $subCategory){
				$currentCategory->load($subCategory->category_id);
				$productsCount +=$currentCategory->getCountProducts();
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
			
			
			?>
        
            <div class = "uk-width-1-<?php echo $this->count_category_to_row;?> uk-text-center">
				<a class="uk-category-teaser uk-inline-block" href = "<?php print $category->category_link;?>">
					<div class="uk-category-teaser-img uk-inline-block">
                        <img class = "jshop_img" src = "<?php print $this->image_category_path;?>/<?php if ($category->category_image) print $category->category_image; else print $this->noimage;?>" alt="<?php print htmlspecialchars($category->name);?>" title="<?php print htmlspecialchars($category->name);?>" />
					</div>
					<div>
						<div class="uk-category-teaser-name uk-h4 uk-text-bold uk-title-bordered uk-position-relative uk-text-center">
							<?php print $category->name?>
							<?php if ($countStr != ''):?>
								<div class="uk-category-teaser-count uk-position-absolute uk-text-contrast"><?php echo $countStr?></div>
							<?php endif; ?>
						</div>
					</div>
					<p class = "category_short_description">
						<?php print $category->short_description?>
					</p>
				 </a>
            </div>
            
            <?php/* if ($k % $this->count_category_to_row == $this->count_category_to_row - 1) : ?>
                <div class = "clearfix"></div>
                </div>
            <?php endif; */?>
        <?php endforeach;?>
        
        <?php/* if ($k % $this->count_category_to_row != $this->count_category_to_row - 1) : ?>
            <div class = "clearfix"></div>
            </div>
        <?php endif;*/ ?>
        
    <?php endif; ?>
    </div>
    
    <?php print $this->_tmp_maincategory_html_end;?>
</div>