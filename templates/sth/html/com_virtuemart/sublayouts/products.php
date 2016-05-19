<?php
/**
 * sublayout products
 *
 * @package	VirtueMart
 * @author Max Milbers
 * @link http://www.virtuemart.net
 * @copyright Copyright (c) 2014 VirtueMart Team. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL2, see LICENSE.php
 * @version $Id: cart.php 7682 2014-02-26 17:07:20Z Milbo $
 */

defined('_JEXEC') or die('Restricted access');
$products_per_row = $viewData['products_per_row'];
$currency = $viewData['currency'];
$showRating = $viewData['showRating'];
$verticalseparator = " vertical-separator";
echo shopFunctionsF::renderVmSubLayout('askrecomjs');

$ItemidStr = '';
$Itemid = shopFunctionsF::getLastVisitedItemId();
if(!empty($Itemid)){
	$ItemidStr = '&Itemid='.$Itemid;
}

foreach ($viewData['products'] as $type => $products ) {

	$rowsHeight = shopFunctionsF::calculateProductRowsHeights($products,$currency,$products_per_row);

	if(!empty($type) and count($products)>0){
		$productTitle = vmText::_('COM_VIRTUEMART_'.strtoupper($type).'_PRODUCT'); ?>
<div class="<?php echo $type ?>-view">
  <h4><?php echo $productTitle ?></h4>
		<?php // Start the Output
    }

	// Calculating Products Per Row
	$cellwidth = ' width'.floor ( 100 / $products_per_row );

	$BrowseTotalProducts = count($products);

	$col = 1;
	$nb = 1;
	$row = 1; ?>
	<div class="uk-grid">
		<?php foreach ( $products as $product ) {
		// Show Products ?>
		<div class="uk-width-1-<?php echo $products_per_row; ?>">
			<div class="uk-product-teaser-block uk-position-relative">
				<div class="uk-product-teaser uk-position-absolute uk-text-center">
					<div class="image">
						<div class="uk-product-teaser-image uk-inline-block">
							<a title="<?php echo $product->product_name ?>" href="<?php echo $product->link.$ItemidStr; ?>">
								<img src="<?php echo $product->file_url; ?>" alt="">
							</a>
						</div>
					</div>

					<div class="vm-product-rating-container">
						<?php echo shopFunctionsF::renderVmSubLayout('rating',array('showRating'=>$showRating, 'product'=>$product));
						if ( VmConfig::get ('display_stock', 1)) { ?>
							<span class="vmicon vm2-<?php echo $product->stock->stock_level ?>" title="<?php echo $product->stock->stock_tip ?>"></span>
						<?php }
						echo shopFunctionsF::renderVmSubLayout('stockhandle',array('product'=>$product));
						?>
					</div>

					<div class="uk-product-teaser-name-wrapper uk-inline-block">
						<div class="uk-product-teaser-name uk-inline-block">
							<a title="<?php echo $product->product_name ?>" href="<?php echo $product->link.$ItemidStr; ?>"><?php echo $product->product_name; ?> <?php echo $product->product_s_desc; ?></a>
						</div>
					</div>

					<div class="uk-product-teaser-info uk-inline-block">	
						<div class="uk-product-teaser-price uk-text-large"> <?php
							echo shopFunctionsF::renderVmSubLayout('prices',array('product'=>$product,'currency'=>$currency)); ?>
						</div>
						
						<div class="buttons">
							<a class="uk-button uk-button-small uk-margin-large-top" title="<?php echo $product->product_name ?>" href="<?php echo $product->link.$ItemidStr; ?>"><?php echo JText::_('COM_VIRTUEMART_READMORE'); ?></a>
						</div>						
					</div>
					
				</div>	
			</div>
		</div>

		<?php } ?>
	</div>
      <?php if(!empty($type)and count($products)>0){
        // Do we need a final closing row tag?
        //if ($col != 1) {
      ?>
    <div class="clear"></div>
  </div>
    <?php
    // }
    }
  }
