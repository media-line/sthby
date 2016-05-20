<?php
header("Content-Type: text/html; charset=utf-8");

$wsb_invoice_item_name = $_POST['wsb_invoice_item_name'];
$wsb_invoice_item_quantity = $_POST['wsb_invoice_item_quantity'];
$wsb_total = $_POST['wsb_total'];

$FIO = $_POST['inputFIO'];
$Phone = $_POST['inputPhone'];
$Email = $_POST['inputEmail'];
$Comment = $_POST['inputComment'];

// Сообщение
$message = "
Фамилия, Имя, Отчество - $FIO <br/>
Телефон - $Phone <br/>
Email - $Email <br/>
Наименование товара - $wsb_invoice_item_name <br/>
Количество товара - $wsb_invoice_item_quantity <br/>
Общая стоимость - $wsb_total <br/>
Комментарий - $Comment
";

$headers  = "Content-type: text/html; charset=utf-8 \r\n";

// Отправляем
mail('akravchenko@medialine.by', 'Письмо с сайта', $message, $headers);

header('Location: /korzina');