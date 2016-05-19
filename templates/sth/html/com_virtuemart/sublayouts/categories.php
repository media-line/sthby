<?php
/**
*
* Shows the products/categories of a category
*
* @package	VirtueMart
* @subpackage
* @author Max Milbers
* @link http://www.virtuemart.net
* @copyright Copyright (c) 2004 - 2014 VirtueMart Team. All rights reserved.
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
* VirtueMart is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
 * @version $Id: default.php 6104 2012-06-13 14:15:29Z alatak $
*/

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');

//числа с которыми идет сравнение для подсчета кол-ва товаров (плюшка 'Более 100')
$twoDigit = 10;
$threeDigit = 100;
$fourDigit = 1000;

$categories = $viewData['categories'];
$categories_per_row = VmConfig::get ( 'categories_per_row', 3 );

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


if ($categories) {

// Category and Columns Counter
$iCol = 1;
$iCategory = 1;

// Calculating Categories Per Row
$category_cellwidth = ' width'.floor ( 100 / $categories_per_row );

// Separator
$verticalseparator = " vertical-separator";
?>

<div class="category-view">

<?php 

// Start the Output
    foreach ( $categories as $category ) {
	
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

	    // Show the horizontal seperator
	   // вывод по строкам и горизонтальный сепаратор
		/*if ($iCol == 1 && $iCategory > $categories_per_row) { ?>
	    <div class="horizontal-separator"></div>
	    <?php }*/

	    // this is an indicator wether a row needs to be opened or not
	    if ($iCol == 1) { ?>
	<div class="uk-list-category uk-grid">
        <?php }

        // Show the vertical separator
        if ($iCategory == $categories_per_row or $iCategory % $categories_per_row == 0) {
          $show_vertical_separator = ' ';
        } else {
          $show_vertical_separator = $verticalseparator;
        }

        // Category Link
        $caturl = JRoute::_ ( 'index.php?option=com_virtuemart&view=category&virtuemart_category_id=' . $category->virtuemart_category_id , FALSE);

          // Show Category ?>
    <div class="uk-width-1-<?php echo $categories_per_row; ?> uk-text-center">
		<a href="<?php echo $caturl ?>" title="<?php echo vmText::_($category->category_name) ?>" class="uk-category-teaser uk-inline-block">
			<div class="uk-category-teaser-img uk-inline-block">
				<?php // if ($category->ids) {
					echo $category->images[0]->displayMediaThumb("",false);
				//} ?>
			</div>
			<div>
				<div class="uk-category-teaser-name uk-h4 uk-text-bold uk-title-bordered uk-position-relative uk-text-center">
					<?php echo vmText::_($category->category_name) ?>
					<?php if ($countStr != ''):?>
						<div class="uk-category-teaser-count uk-position-absolute uk-text-contrast"><?php echo $countStr; ?></div>
					<?php endif; ?>
				</div>
			</div>
		</a>
    </div>
	    <?php
	    $iCategory ++;

	    // Do we need to close the current row now?
        if ($iCol == $categories_per_row) { ?>
    <div class="clear"></div>
	</div>
		    <?php
		    $iCol = 1;
	    } else {
		    $iCol ++;
	    }
    }
	// Do we need a final closing row tag?
	if ($iCol != 1) { ?>
		<div class="clear"></div>
	</div>
	<?php
	}
	?></div><?php 
 } ?>
