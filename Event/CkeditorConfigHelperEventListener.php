<?php
class CkeditorConfigHelperEventListener extends BcHelperEventListener {
    public $events = array(
		'BcFormTable.before',
    );

	/**
	 * フォーム閉じタグ取得後イベント
	 *
	 * ブログ及び固定ページで
	 * ckEditorで<i></i>を勝手に消してしまう困った仕様を解決
	 * ckEditorで<a></a>の外にブロック要素を勝手に出してしまう困った仕様を解決
	 * @param CakeEvent $event
	 * @return string
	 */
	public function bcFormTableBefore(CakeEvent $event) {
		$View = $event->subject();
		$controller = $View->request->params['controller'];
		 // 該当タグリストの読み込み
		$ckeditorConfig = Configure::read('CkeditorConfig');
		$dtd = $ckeditorConfig['dtd'];
		if (BcUtil::isAdminSystem()) {
			if (!isset($ckeditorConfig['controller']) || empty($ckeditorConfig['controller']) ||in_array($controller, $ckeditorConfig['controller'])) {
				echo '<script>';
				echo 'CKEDITOR.config.basicEntities = false;';
				echo 'CKEDITOR.config.entities = false;';
				if (!empty($dtd['removeEmpty'])) { // 空を許可する要素を出力
					foreach ($dtd['removeEmpty'] as $removeEmpty) {
						echo 'CKEDITOR.dtd.$removeEmpty["'.$removeEmpty .'"] = false;';
					}
				}
				if (!empty($dtd['a'])) { // aタグ内に入れることを許可するブロック要素を出力
					foreach ($dtd['a'] as $a) {
						echo 'CKEDITOR.dtd.a.'. $a.' = 1;';
					}
				}
				echo '</script>';
			}
		}
	}

}
