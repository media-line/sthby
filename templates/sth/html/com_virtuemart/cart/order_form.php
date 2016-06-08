<?php
/*передача из VM названия товара (The transfer of the goods name)*/
foreach ($this->cart->products as $pkey => $prow) {
	$wsb_invoice_item_name = $prow->product_name;
}

/*передача из VM количества товара (Transfer the amount of goods)*/
foreach ($this->cart->products as $pkey => $prow) {
	$wsb_invoice_item_quantity = $prow->quantity;
}

/*передача из VM стоимости товара (The transfer value of the goods)*/
foreach ($this->cart->products as $pkey => $prow) {
$wsb_invoice_item_price = $prow->allPrices[0]['product_price'];
}

$revers = $_SERVER['HTTP_REFERER'];
if ($revers == 'http://sthby:8080/templates/sth/html/com_virtuemart/cart/order_work.php') {
		echo 'ntcn';
}

?>


<h2 class="form-cart">Оформление заказа</h2>
		<form id="cart-form" class="form-horizontal" role="form" method="post" action="/templates/sth/html/com_virtuemart/cart/order_work.php">
		<div class="form-group form-cart">
				<label for="inputFIO" class="col-sm-2 control-label cart-lable">ФИО</label>
				<div class="col-sm-10">
						<input type="text" class="form-control form-cart" name="inputFIO" required autocomplete>
				</div>
		</div>
		<div class="form-group form-cart">
				<label for="inputPhone" class="col-sm-2 control-label cart-lable">Телефон</label>
				<div class="col-sm-10">
						<input type="tel" class="form-control form-cart" name="inputPhone" required autocomplete>
				</div>
		</div>
		<div class="form-group form-cart">
				<label for="inputEmail" class="col-sm-2 control-label cart-lable">Email</label>
				<div class="col-sm-10">
						<input type="email" class="form-control form-cart" name="inputEmail" required autocomplete>
				</div>
		</div>
		<div class="form-group form-cart">
				<label for="inputPayMethod" class="col-sm-2 control-label cart-lable">Способ оплаты</label>
				<div class="col-sm-10">
						<select class="form-control form-cart" id="inputPayMethod" name="selectPayMethod">
								<option value="sam">Самовывоз</option>
								<option value="WebPay">Оплата кредитной картой</option>
						</select>
				</div>
		</div>
		<div class="form-group form-cart">
				<label for="inputComment" class="col-sm-2 control-label cart-lable">Комментарий</label>
				<div class="col-sm-10">
						<textarea class="form-control form-cart" rows="6" name="inputComment"></textarea>
				</div>
		</div>
		<div class="form-group form-cart-btn">
				<div class="col-sm-offset-2 col-sm-10">
						<button id="send" type="submit" class="btn btn-default btn-lg">Оформить</button>
				</div>
		</div>

		<!-- данные о товарах -->
				<input type="hidden" name="wsb_invoice_item_name" value="<?php echo $wsb_invoice_item_name ?>">
				<input type="hidden" name="wsb_invoice_item_quantity" value="<?php echo $wsb_invoice_item_quantity ?>">
				<input type="hidden" name="wsb_invoice_item_price" value="<?php echo $wsb_invoice_item_price ?>">
</form>