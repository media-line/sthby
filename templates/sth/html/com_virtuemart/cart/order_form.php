<?php
?>

<h2 class="form-cart">Оформление заказа</h2>
<form id="cart-form" class="form-horizontal" role="form" action="<?php /*тут будет код выбора в зависимости от того, что выбрано в селекте */?>">
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
</form>