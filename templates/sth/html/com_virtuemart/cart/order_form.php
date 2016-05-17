<?php
?>
<form class="form-horizontal" role="form">
		<div class="form-group form-cart">
				<label for="inputFIO" class="col-sm-2 control-label">ФИО</label>
				<div class="col-sm-10">
						<input type="text" class="form-control" id="inputFIO">
				</div>
		</div>
		<div class="form-group form-cart">
				<label for="inputPhone" class="col-sm-2 control-label">Телефон</label>
				<div class="col-sm-10">
						<input type="tel" class="form-control" id="inputPhone">
				</div>
		</div>
		<div class="form-group form-cart">
				<label for="inputEmail" class="col-sm-2 control-label">Email</label>
				<div class="col-sm-10">
						<input type="email" class="form-control" id="inputEmail">
				</div>
		</div>
		<div class="form-group form-cart">
				<label for="inputPayMethod" class="col-sm-2 control-label">Способ оплаты</label>
				<div class="col-sm-10">
						<select class="form-control" id="inputPayMethod">
								<option>Самовывоз</option>
								<option>Оплата кредитной картой</option>
						</select>
				</div>
		</div>
		<div class="form-group form-cart">
				<label for="inputComment" class="col-sm-2 control-label">Комментарий</label>
				<div class="col-sm-10">
						<textarea class="form-control" rows="6" id="inputComment"></textarea>
				</div>
		</div>
		<div class="form-group form-cart">
				<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-default">Оформить</button>
				</div>
		</div>
</form>
