# CkEditor自動整形抑止プラグイン

CkEditorがHTML5に対応しておらず、
aタグでブロック要素を挟むと、勝手にaタグの外に出してしまう仕様をckeditor.comfigにて解消します。
空要素の許可もできます。

## 仕様

### aタグ内に入れることを許可するブロック要素
Config/setting.php
$config['CkeditorConfig.dtd.a'] にて
```
'div','h1','h2','h3','h4','h5','dl','p',
```
を設定しています。
※足りない場合は setting_customize.php.default を setting_customize.php にリネームし、
必要なタグ名をすべて記載してください。

### 空を許可する要素

Config/setting.php
$config['CkeditorConfig.dtd.removeEmpty'] の配列内に記載してください。
(iタグとspanタグは元々baserCMSで許可済み)
setting_customize.php.default を setting_customize.php にリネームし、
必要なタグ名をすべて記載してください。

## 確認済バージョン

|baserCMS|Plugin|status|comment|
|:--|:--|:--|:--|
|4.6.1.1|1.0.0|未承認||
|4.6.1|1.0.0|未承認||
