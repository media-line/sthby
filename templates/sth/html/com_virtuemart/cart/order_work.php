<?php
header("Content-Type: text/html; charset=utf-8");

/*статичные данные*/
$wsb_storeid = 389023436;
$wsb_store = 'ООО «Стандарт Гидравлика Бел»';
$wsb_order_num = time ();
$wsb_currency_id = 'BYR';
$wsb_version = 2;
$wsb_language_id = 'russian';
$wsb_seed = mt_rand(100000, 9999999999);
$wsb_SecretKey = '2?7CeW|u6ewj9uc';
$wsb_test = 1;

/*данные подтягиваемые из корзины*/
$wsb_invoice_item_name = $_POST['wsb_invoice_item_name'];
$wsb_invoice_item_quantity = $_POST['wsb_invoice_item_quantity'];
$wsb_invoice_item_price = $_POST['wsb_invoice_item_price'];

/*обсчитываемые данные*/
$wsb_total = $wsb_invoice_item_quantity * $wsb_invoice_item_price;
$wsb_signature = sha1($wsb_seed.$wsb_storeid.$wsb_order_num.$wsb_test.$wsb_currency_id.$wsb_total.
		$wsb_SecretKey);

/*выбор способа оплаты*/
$selectPay = $_POST['selectPayMethod'];

/*прием данных для отправки письма на почту*/
$FIO = $_POST['inputFIO'];
$Phone = $_POST['inputPhone'];
$Email = $_POST['inputEmail'];
$Comment = $_POST['inputComment'];

/*отправка письма на почту клиента - на данный момент не работает*/
function mailpay($FIO, $Phone, $Email, $wsb_invoice_item_name, $wsb_invoice_item_quantity, $wsb_total, $Comment){
		$to      = "akravchenko@medialine.by";
		$subject = "Письмо с заказом с сайта";

		$message = "
Фамилия, Имя, Отчество - $FIO <br/> 
Телефон - $Phone <br/>
Email - $Email <br/>
Наименование товара - $wsb_invoice_item_name <br/>
Количество товара - $wsb_invoice_item_quantity <br/>
Общая стоимость - $wsb_total<br/>
Комментарий - $Comment
";
		mail($to, $subject, $message);
}

/*проверка куда отправлять данные*/
function selection($selectPay, $FIO, $Phone, $Email, $wsb_invoice_item_name, $wsb_invoice_item_quantity, $wsb_total, $Comment) {
		if ($selectPay == 'WebPay') {
				echo 'https://securesandbox.webpay.by';
		} else {
				mailpay($FIO, $Phone, $Email, $wsb_invoice_item_name, $wsb_invoice_item_quantity, $wsb_total, $Comment);
		}
}
?>

<form name="paydate" method="post" action="<?php selection($selectPay) ?>">
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
		<!-- <input type='hidden' name='wsb_return_url'  value='http://yoursite.com/compete'>
		<input type='hidden' name='wsb_cancel_return_url'  value='http://yoursite.com/cancel'> -->
		<input type='hidden' name='wsb_test' value='<?php echo $wsb_test ?>'>
		<input type='hidden' name='wsb_invoice_item_name[0]'  value='<?php echo $wsb_invoice_item_name ?>'>
		<input type='hidden' name='wsb_invoice_item_quantity[0]' value='<?php echo $wsb_invoice_item_quantity?>'>
		<input type='hidden' name='wsb_invoice_item_price[0]'  value='<?php echo $wsb_invoice_item_price ?>'>
		<input type='hidden' name='wsb_total' value='<?php echo $wsb_total ?>'>
</form>

<script>document.paydate.submit();</script>
