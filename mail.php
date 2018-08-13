<?php
$mail = "beregsys@gmail.com";
$theme = "Новый заказ";
$name = $_REQUEST['name'];
$phone = $_REQUEST['phone'];
$client_email = $_REQUEST['email'];
$product_id = $_REQUEST['product_id'];
$product_sum = $_REQUEST['product_sum'];
$product_sum = explode(";", $product_sum);

$headers = "From: " . strip_tags($_POST['req-email']) . "\r\n";
$headers .= "Reply-To: ". strip_tags($_POST['req-email']) . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=utf-8\r\n";

$message = "<html><body>";
$message .= "<p>Имя - $name</p>";
$message .= "<p>Телефон клиента - $phone</p>";
$message .= "<p>Почта клиента - $client_email</p>";
$message .= "<p>Идентификатор товара - $product_id</p>";
$message .= "<p>Имя товара - $product_sum[0]</p>";
$message .= "<p>Бренд - $product_sum[1]</p>";
$message .= "<p>Артикул - $product_sum[2]</p>";
$message .= "<p>Цена - $product_sum[3]</p>";
$message .= "</body></html>";
echo (mail($mail, $theme, $message, $headers) ? "a letter was sent successfully" : "error");