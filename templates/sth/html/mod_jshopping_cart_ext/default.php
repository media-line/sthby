<div class = "uk-mod-cart">
<?php /*
<table class = "module_cart_detail" width = "100%">
<?php 
  $countprod = 0;
  $array_products = array();
  foreach($cart->products as $value){
    $array_products [$countprod] = $value;
?> 
      <tr class="<?php  if ( ($countprod + 2) % 2 > 0) { print 'odd'; } else { print 'even'; }  ?>">
        <td class="name"><?php print $array_products [$countprod]["product_name"]; ?></td>
        <?php if ($show_count =='1') {?>
        <td class="qtty"><?php print $array_products [$countprod]["quantity"]; ?> x </td>
        <td class="summ"><?php print formatprice($array_products [$countprod]["price"]); ?></td>
        <?php }else {?>  
        <td class="qtty"> </td>
        <td class="summ"><?php print formatprice($array_products [$countprod]["price"] * $array_products [$countprod]["quantity"]); ?></td>        
        <?php }?>
      </tr>
    <?php $countprod++; ?>
<?php } ?>
</table>
*/?>
<div class="goto_cart">
	<a class="uk-cart-link uk-inline-block" href="<?php print SEFLink('index.php?option=com_jshopping&controller=cart&task=view', 1)?>">
		<div class="uk-cart-quantity icon-cart uk-position-relative uk-inline-block">
		  <span class="uk-position-absolute uk-text-center uk-text-large" id="jshop_quantity_products"><?php print $cart->count_product?></span>
		</div>
		<div class="uk-inline-block uk-text-bold">
			<div class="uk-cart-lable uk-h3"><?php echo JText::_("TPL_CART_LABLE"); ?></div>
			<div id = "jshop_summ_product"><?php print formatprice($cart->getSum(0,1))?></div>
		</div>
	</a>
</div>
</div>

