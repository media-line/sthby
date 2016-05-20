<?php
/**
 *
 * Show the product details page
 *
 * @package	VirtueMart
 * @subpackage
 * @author Max Milbers, Eugen Stranz, Max Galt
 * @link http://www.virtuemart.net
 * @copyright Copyright (c) 2004 - 2014 VirtueMart Team. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 * VirtueMart is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * @version $Id: default.php 9185 2016-02-25 13:51:01Z Milbo $
 */
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');

/* Let's see if we found the product */
if (empty($this->product)) {
	echo vmText::_('COM_VIRTUEMART_PRODUCT_NOT_FOUND');
	echo '<br /><br />  ' . $this->continue_link_html;
	return;
}

echo shopFunctionsF::renderVmSubLayout('askrecomjs',array('product'=>$this->product));



if(vRequest::getInt('print',false)){ ?>
<body onload="javascript:print();">
<?php } ?>

<div class="productdetails-view productdetails" >

    <?php/*
    // Product Navigation
    if (VmConfig::get('product_navigation', 1)) {
	?>
        <div class="product-neighbours">
	    <?php
	    if (!empty($this->product->neighbours ['previous'][0])) {
		$prev_link = JRoute::_('index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id=' . $this->product->neighbours ['previous'][0] ['virtuemart_product_id'] . '&virtuemart_category_id=' . $this->product->virtuemart_category_id, FALSE);
		echo JHtml::_('link', $prev_link, $this->product->neighbours ['previous'][0]
			['product_name'], array('rel'=>'prev', 'class' => 'previous-page','data-dynamic-update' => '1'));
	    }
	    if (!empty($this->product->neighbours ['next'][0])) {
		$next_link = JRoute::_('index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id=' . $this->product->neighbours ['next'][0] ['virtuemart_product_id'] . '&virtuemart_category_id=' . $this->product->virtuemart_category_id, FALSE);
		echo JHtml::_('link', $next_link, $this->product->neighbours ['next'][0] ['product_name'], array('rel'=>'next','class' => 'next-page','data-dynamic-update' => '1'));
	    }
	    ?>
    	<div class="clear"></div>
        </div>
    <?php } // Product Navigation END*/
    ?>

	<?php // Back To Category Button
	if ($this->product->virtuemart_category_id) {
		$catURL =  JRoute::_('index.php?option=com_virtuemart&view=category&virtuemart_category_id='.$this->product->virtuemart_category_id, FALSE);
		$categoryName = vmText::_($this->product->category_name) ;
	} else {
		$catURL =  JRoute::_('index.php?option=com_virtuemart');
		$categoryName = vmText::_('COM_VIRTUEMART_SHOP_HOME') ;
	}
	?>
	<!--<div class="back-to-category">
    	<a href="<?php echo $catURL ?>" class="product-details" title="<?php echo $categoryName ?>"><?php echo vmText::sprintf('COM_VIRTUEMART_CATEGORY_BACK_TO',$categoryName) ?></a>
	</div>-->
	<div class="uk-grid">
		<div class="uk-width-2-3">
			<?php // Product Title   ?>
			<h1 itemprop="name" class="uk-text-bold uk-product-full-title uk-margin-small-top uk-margin-bottom-remove"><?php echo $this->product->product_name ?></h1>
			<?php // Product Title END   ?>

			<?php // afterDisplayTitle Event
			echo $this->product->event->afterDisplayTitle ?>

			<?php
			// Product Edit Link
			echo $this->edit_link;
			// Product Edit Link END
			?>

			<?php
			// PDF - Print - Email Icon
			if (VmConfig::get('show_emailfriend') || VmConfig::get('show_printicon') || VmConfig::get('pdf_icon')) {
			?>
				<div class="icons">
				<?php

				$link = 'index.php?tmpl=component&option=com_virtuemart&view=productdetails&virtuemart_product_id=' . $this->product->virtuemart_product_id;

				echo $this->linkIcon($link . '&format=pdf', 'COM_VIRTUEMART_PDF', 'pdf_button', 'pdf_icon', false);
				//echo $this->linkIcon($link . '&print=1', 'COM_VIRTUEMART_PRINT', 'printButton', 'show_printicon');
				echo $this->linkIcon($link . '&print=1', 'COM_VIRTUEMART_PRINT', 'printButton', 'show_printicon',false,true,false,'class="printModal"');
				$MailLink = 'index.php?option=com_virtuemart&view=productdetails&task=recommend&virtuemart_product_id=' . $this->product->virtuemart_product_id . '&virtuemart_category_id=' . $this->product->virtuemart_category_id . '&tmpl=component';
				echo $this->linkIcon($MailLink, 'COM_VIRTUEMART_EMAIL', 'emailButton', 'show_emailfriend', false,true,false,'class="recommened-to-friend"');
				?>
				<div class="clear"></div>
				</div>
			<?php } // PDF - Print - Email Icon END
			?>

			<?php
			// Product Short Description
			if (!empty($this->product->product_s_desc)) {
			?>
				<div class="uk-product-full-shortdesc">
				<?php
				/** @todo Test if content plugins modify the product description */
				echo nl2br($this->product->product_s_desc);
				?>
				</div>
			<?php
			} // Product Short Description END

			echo shopFunctionsF::renderVmSubLayout('customfields',array('product'=>$this->product,'position'=>'ontop'));
			?>
		</div>
		<div class="uk-width-1-3 uk-text-right">
			<?php if ($this->product->intnotes) { ?>
				<a class="uk-button uk-button-small uk-read-about uk-position-relative" href="<?php echo $this->product->intnotes; ?>">
					<span><?php echo JText::_('COM_VIRTUEMART_READ_ABOUT_PRODUCT'); ?></span>
				</a>
			<?php } ?>
		</div>
	</div>

	<div class="uk-grid uk-grid-collapse">
			<div class="uk-width-1-4 uk-product-full-image-block">
				<?php
				echo $this->loadTemplate('images');
				$count_images = count ($this->product->images);
				if ($count_images > 1) {
					echo $this->loadTemplate('images_additional');
				}
				?>
			</div>

			<div class="uk-width-3-4">
				<div class="uk-product-full-description-block">
					<div class="uk-product-full-description">
						<?php if (!empty($this->product->product_desc)) { ?>
							<?php echo $this->product->product_desc; ?>
						<?php } ?>
					</div>
				</div>
			</div>
	</div>

	<div class="uk-child-fields">
		<table>
			<?php $productModel = VmModel::getModel ('product'); ?>
			<?php $customFields = $this->product->customfieldsSorted['normal'];
			$currency = $this->currency;
			foreach ($customFields as $customField) {
				if ($customField->virtuemart_custom_id == 4) {
					$productsChildId = $customField->options; 
					$count=0;
					foreach ($productsChildId as $productChildId => $productChildName) {
						if ($productChildId != $this->product->virtuemart_product_id) {
							$productChild = $productModel->getProduct($productChildId); 
							$customFieldsChild = $productChild->customfields; ?>
							<?php if ($count == 0) { ?>
								<tr class="uk-child-products">	
									<td><?php echo JText::_('COM_VIRTUEMART_PRODUCT_NAME'); ?></td>
									<td><?php echo JText::_('COM_VIRTUEMART_PRODUCT_PRICE'); ?></td>
									<?php foreach ($customFieldsChild as $customFieldChild) {
										if ($customFieldChild->virtuemart_custom_id != 4) { ?>
											<td><?php echo $customFieldChild->custom_title; ?></td>
										<?php }
									} ?>
									<td></td>
								</tr>
							<?php } ?>
							<?php if (count($customFieldsChild)) { ?>
								<tr class="uk-child-products">
									<td><?php echo $productChild->product_name; ?></td>
									<td><?php echo $currency->createPriceDiv ('salesPrice', '', $productChild->prices['salesPrice']); ?></td>
										
									<?php foreach ($customFieldsChild as $customFieldChild) {
										if ($customFieldChild->virtuemart_custom_id != 4) { ?>
											<td><?php echo $customFieldChild->customfield_value; ?></td>
										<?php }
									} ?>
										
									<td><label class="select_child"><input type="radio" name="select_child" value="<?php echo $productChildId; ?>"></label></td>
								</tr>
							<?php } ?>
						<?php $count++;
						} 
					} ?>
				<?php }
			} ?>
		</table>
	</div>
	
	<div class="uk-grid uk-price">

				<?php
				// TODO in Multi-Vendor not needed at the moment and just would lead to confusion
				/* $link = JRoute::_('index2.php?option=com_virtuemart&view=virtuemart&task=vendorinfo&virtuemart_vendor_id='.$this->product->virtuemart_vendor_id);
				  $text = vmText::_('COM_VIRTUEMART_VENDOR_FORM_INFO_LBL');
				  echo '<span class="bold">'. vmText::_('COM_VIRTUEMART_PRODUCT_DETAILS_VENDOR_LBL'). '</span>'; ?><a class="modal" href="<?php echo $link ?>"><?php echo $text ?></a><br />
				 */
				?>

				<?php
				echo shopFunctionsF::renderVmSubLayout('rating',array('showRating'=>$this->showRating,'product'=>$this->product));

				if (is_array($this->productDisplayShipments)) {
					foreach ($this->productDisplayShipments as $productDisplayShipment) {
					echo $productDisplayShipment . '<br />';
					}
				}
				if (is_array($this->productDisplayPayments)) {
					foreach ($this->productDisplayPayments as $productDisplayPayment) {
					echo $productDisplayPayment . '<br />';
					}
				} ?>

				<div class="uk-width-1-3">
					<div class="uk-product-full-price">
						<div id="block_price" class="uk-h3 uk-text-bold uk-margin-top">
							<?php 
							//In case you are not happy using everywhere the same price display fromat, just create your own layout
							//in override /html/fields and use as first parameter the name of your file				
							echo shopFunctionsF::renderVmSubLayout('prices',array('product'=>$this->product,'currency'=>$this->currency));
							?> 
						</div>
					</div>
				</div>
				
				<div class="prod_buttons uk-width-2-3 uk-text-right">
					<?php
					echo shopFunctionsF::renderVmSubLayout('addtocart',array('product'=>$this->product));
					?>
				</div>

				<?php echo shopFunctionsF::renderVmSubLayout('stockhandle',array('product'=>$this->product));

				// Ask a question about this product
				if (VmConfig::get('ask_question', 0) == 1) {
					$askquestion_url = JRoute::_('index.php?option=com_virtuemart&view=productdetails&task=askquestion&virtuemart_product_id=' . $this->product->virtuemart_product_id . '&virtuemart_category_id=' . $this->product->virtuemart_category_id . '&tmpl=component', FALSE);
					?>
					<div class="ask-a-question">
						<a class="ask-a-question" href="<?php echo $askquestion_url ?>" rel="nofollow" ><?php echo vmText::_('COM_VIRTUEMART_PRODUCT_ENQUIRY_LBL') ?></a>
					</div>
				<?php
				}
				?>

				<?php
				// Manufacturer of the Product
				if (VmConfig::get('show_manufacturers', 1) && !empty($this->product->virtuemart_manufacturer_id)) {
					echo $this->loadTemplate('manufacturer');
				}
				?>

	</div>	
	
<?php

	// event onContentBeforeDisplay
	echo $this->product->event->beforeDisplayContent; ?>

	<?php
	
	/*echo shopFunctionsF::renderVmSubLayout('customfields',array('product'=>$this->product,'position'=>'normal'));*/

    // Product Packaging
    $product_packaging = '';
    if ($this->product->product_box) {
	?>
        <div class="product-box">
	    <?php
	        echo vmText::_('COM_VIRTUEMART_PRODUCT_UNITS_IN_BOX') .$this->product->product_box;
	    ?>
        </div>
    <?php } // Product Packaging END ?>

    <?php 
	echo shopFunctionsF::renderVmSubLayout('customfields',array('product'=>$this->product,'position'=>'onbot'));

  echo shopFunctionsF::renderVmSubLayout('customfields',array('product'=>$this->product,'position'=>'related_products','class'=> 'product-related-products','customTitle' => true ));

	echo shopFunctionsF::renderVmSubLayout('customfields',array('product'=>$this->product,'position'=>'related_categories','class'=> 'product-related-categories'));

	?>

<?php // onContentAfterDisplay event
echo $this->product->event->afterDisplayContent;

echo $this->loadTemplate('reviews');

// Show child categories
if (VmConfig::get('showCategory', 1)) {
	echo $this->loadTemplate('showcategory');
}

$j = 'jQuery(document).ready(function($) {
	Virtuemart.product(jQuery("form.product"));

	$("form.js-recalculate").each(function(){
		if ($(this).find(".product-fields").length && !$(this).find(".no-vm-bind").length) {
			var id= $(this).find(\'input[name="virtuemart_product_id[]"]\').val();
			Virtuemart.setproducttype($(this),id);

		}
	});
});';
//vmJsApi::addJScript('recalcReady',$j);

/** GALT
 * Notice for Template Developers!
 * Templates must set a Virtuemart.container variable as it takes part in
 * dynamic content update.
 * This variable points to a topmost element that holds other content.
 */
$j = "Virtuemart.container = jQuery('.productdetails-view');
Virtuemart.containerSelector = '.productdetails-view';";

vmJsApi::addJScript('ajaxContent',$j);

if(VmConfig::get ('jdynupdate', TRUE)){
	$j = "jQuery(document).ready(function($) {
	Virtuemart.stopVmLoading();
	var msg = '';
	jQuery('a[data-dynamic-update=\"1\"]').off('click', Virtuemart.startVmLoading).on('click', {msg:msg}, Virtuemart.startVmLoading);
	jQuery('[data-dynamic-update=\"1\"]').off('change', Virtuemart.startVmLoading).on('change', {msg:msg}, Virtuemart.startVmLoading);
});";

	vmJsApi::addJScript('vmPreloader',$j);
}

echo vmJsApi::writeJS();

if ($this->product->prices['salesPrice'] > 0) {
  echo shopFunctionsF::renderVmSubLayout('snippets',array('product'=>$this->product, 'currency'=>$this->currency, 'showRating'=>$this->showRating));
}

?>
</div>

