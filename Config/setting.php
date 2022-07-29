<?php
/*
 * 設定
 */
$config['CkeditorConfig.dtd'] = [
	/* aタグ内に入れることを許可するブロック要素のタグ名リスト */
	'a' => [
		'div',
		'h1',
		'h2',
		'h3',
		'h4',
		'h5',
		'dl',
		'p',
	],
	/* 空を許可する要素名リスト */
	'removeEmpty' => [
	// 'i', baserCMS側で許可済み
	// 'span', baserCMS側で許可済み
	]
];
// 対象コントローラを絞れるようにした（空ならすべてが対象）
$config['CkeditorConfig.controller'] = [];

// カスタマイズ設定読み込み
if (file_exists(__DIR__ . DS . 'setting_customize.php')) {
	include __DIR__ . DS . 'setting_customize.php';
	$config = Hash::merge($config, $customize_config);
}
