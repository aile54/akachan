<?php

// jCart v1.3
// http://conceptlogic.com/jcart/

// By default, this file returns the $config array for use with PHP scripts
// If requested via Ajax, the array is encoded as JSON and echoed out to the browser

// Don't edit here, edit config.php
include_once('config.php');

// Use default values for any settings that have been left empty
if (!$config['currencyCode']) $config['currencyCode']                     = 'VND';
if (!$config['text']['cartTitle']) $config['text']['cartTitle']           = 'Tổng số hàng';
if (!$config['text']['singleItem']) $config['text']['singleItem']         = 'Món';
if (!$config['text']['multipleItems']) $config['text']['multipleItems']   = 'Món';
if (!$config['text']['subtotal']) $config['text']['subtotal']             = 'Tổng cộng';
if (!$config['text']['update']) $config['text']['update']                 = 'Cập nhật';
if (!$config['text']['checkout']) $config['text']['checkout']             = 'checkout';
if (!$config['text']['checkoutPaypal']) $config['text']['checkoutPaypal'] = 'Checkout with PayPal';
if (!$config['text']['removeLink']) $config['text']['removeLink']         = 'Xoá';
if (!$config['text']['emptyButton']) $config['text']['emptyButton']       = 'Trống';
if (!$config['text']['emptyMessage']) $config['text']['emptyMessage']     = 'Chưa có đơn hàng';
if (!$config['text']['itemAdded']) $config['text']['itemAdded']           = 'Item added!';
if (!$config['text']['priceError']) $config['text']['priceError']         = 'Invalid price format!';
if (!$config['text']['quantityError']) $config['text']['quantityError']   = 'Số lượng phải là số';
if (!$config['text']['checkoutError']) $config['text']['checkoutError']   = 'Đơn hàng của bạn có vấn đề';

if (isset($_GET['ajax']) && $_GET['ajax'] === 'true') {
	header('Content-type: application/json; charset=utf-8');
	echo json_encode($config);
}
?>