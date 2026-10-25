<?php
require_once 'ShopOrder.php';
require_once 'AdminOrder.php';

$shopOrder = new \App\Shop\Order();
$adminOrder = new \App\Admin\Order();

echo $shopOrder->getTotal() . PHP_EOL;
echo $adminOrder->getHistory() . PHP_EOL;
