<?php
$wsb_storeid = 389023436;
$wsb_store = 'ООО «Стандарт Гидравлика Бел»';
$wsb_order_num = 123456789; /*должен браться из VM, 123456789 - это тестовое значение*/
$wsb_currency_id = 'BYR';
$wsb_version = 2;
$wsb_language_id = 'russian';
$wsb_seed = mt_rand(100000, 9999999999);
$wsb_SecretKey = '2?7CeW|u6ewj9uc';
$wsb_test = 1;

/*передача из VM названия товара (The transfer of the goods name)*/
foreach ($this->cart->products as $pkey => $prow) {
	$wsb_invoice_item_name = $prow->product_name;
}

/*передача из VM количества товара (Transfer the amount of goods)*/
foreach ($this->cart->products as $pkey => $prow) {
	$wsb_invoice_item_quantity = $prow->quantity;
}

/*передача из VM стоимости товара (The transfer value of the goods)*/

	$wsb_invoice_item_price = vmText::_($description); /*должен браться из VM, 10000 - это тестовое значение*/

$wsb_total = $wsb_invoice_item_quantity * $wsb_invoice_item_price;
$wsb_signature = sha1($wsb_seed.$wsb_storeid.$wsb_order_num.$wsb_test.$wsb_currency_id.$wsb_total.
		$wsb_SecretKey);

?>

<h2 class="form-cart">Оформление заказа</h2>
<!-- <form id="cart-form" class="form-horizontal" role="form" action="<?php /*тут будет код выбора в зависимости от того, что выбрано в селекте */?>"> -->
		<form id="cart-form" class="form-horizontal" role="form" method="post" action="https://securesandbox.webpay.by">
		<div class="form-group form-cart">
				<label for="inputFIO" class="col-sm-2 control-label cart-lable">ФИО</label>
				<div class="col-sm-10">
						<input type="text" class="form-control form-cart" id="inputFIO" required autocomplete>
				</div>
		</div>
		<div class="form-group form-cart">
				<label for="inputPhone" class="col-sm-2 control-label cart-lable">Телефон</label>
				<div class="col-sm-10">
						<input type="tel" class="form-control form-cart" id="inputPhone" required autocomplete>
				</div>
		</div>
		<div class="form-group form-cart">
				<label for="inputEmail" class="col-sm-2 control-label cart-lable">Email</label>
				<div class="col-sm-10">
						<input type="email" class="form-control form-cart" id="inputEmail" required autocomplete>
				</div>
		</div>
		<div class="form-group form-cart">
				<label for="inputPayMethod" class="col-sm-2 control-label cart-lable">Способ оплаты</label>
				<div class="col-sm-10">
						<select class="form-control form-cart" id="inputPayMethod">
								<option>Самовывоз</option>
								<option>Оплата кредитной картой</option>
						</select>
				</div>
		</div>
		<div class="form-group form-cart">
				<label for="inputComment" class="col-sm-2 control-label cart-lable">Комментарий</label>
				<div class="col-sm-10">
						<textarea class="form-control form-cart" rows="6" id="inputComment"></textarea>
				</div>
		</div>
		<div class="form-group form-cart-btn">
				<div class="col-sm-offset-2 col-sm-10">
						<button id="send" type="submit" class="btn btn-default btn-lg">Оформить</button>
				</div>
		</div>

		<!-- Поля для платежной системы (Fields for WebPay) -->
		<input type='hidden' name='*scart'>
		<input type='hidden' name='wsb_storeid'  value='<?php echo $wsb_storeid ?>'>
		<input type='hidden' name='wsb_store'  value='<?php echo $wsb_store ?>'>
		<input type='hidden' name='wsb_order_num'  value='<?php echo $wsb_order_num ?>'>
		<input type='hidden' name='wsb_currency_id'  value='<?php echo $wsb_currency_id ?>'>
		<input type='hidden' name='wsb_version'  value='<?php echo $wsb_version ?>'>
		<input type='hidden' name='wsb_language_id'  value='<?php echo $wsb_language_id ?>'>
		<input type='hidden' name='wsb_seed'  value='<?php echo $wsb_seed ?>'>
		<input type='hidden' name='wsb_signature'  value='<?php echo $wsb_signature ?>'>
		<input type='hidden' name='wsb_return_url'  value='http://yoursite.com/compete'>
		<input type='hidden' name='wsb_cancel_return_url'  value='http://yoursite.com/cancel'>
		<input type='hidden' name='wsb_test' value='<?php echo $wsb_test ?>'>
		<input type='hidden' name='wsb_invoice_item_name[0]'  value='<?php echo $wsb_invoice_item_name ?>'>
		<input type='hidden' name='wsb_invoice_item_quantity[0]' value='<?php echo $wsb_invoice_item_quantity?>'>
		<input type='hidden' name='wsb_invoice_item_price[0]'  value='<?php echo $wsb_invoice_item_price ?>'> <!-- не готово -->
		<input type='hidden' name='wsb_total' value='<?php echo $wsb_total ?>'>
</form>