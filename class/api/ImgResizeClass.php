<?php
/**
*@hiroaki 20150218
*@画像サイズのセッター
*public setImageParth(INT)		:input(INT) +
*@画像パスのセッター
*public setUri(STRING, STRING)	:input(STRING, STRING)
*@画像の最大横幅のセッター
*public setMaxWidth(INT)		:input(INT)
*@画像の最大縦幅のセッター
*public setMaxHeight(INT)		:input(INT)
*@画像の保存と保存可否のゲッター、exportImage()を呼ぶ
*public getImage()				:return(BOOLEAN)
*
*@画像の縦横幅計算関数の引数(横,縦)
*private calculationAspect(INT, INT)	:input(INT, INT)
*@画像の縦横幅計算関数の戻値(Array(縦,横))
*private calculationAspect(INT, INT)	:return (Array(INT, INT))
*@画像の保存と保存可否を返す: 保存成功=true :保存失敗=false
*private exportImage()					:return(BOOLEAN)
*
**/

/**
 * [API]画像リサイズ関連をまとめたクラス
 *
 * クラスの詳細
 * セットされた画像をリサイズする
 *
 * @access public
 * @author HiroakiTatsumi <hatuusa@gmail.com>
 * @copyright HiroakiTatsumi All Rights Reserved
 * @category カテゴリー（処理系）
 * @package Model
 */

class ImgResizeClass {
	
	////////// Constructor //////////
	/**
	 *  [Constructor]Constructor
	 *
	 *  関数の詳細
	 *  各疑似変数の初期化を行うコンストラクタ
	 *
	 *
	 * @access public
	 * @param String _expansion 画像の拡大比率
	 * @param Integer _maxWidth 画像の最大横幅
	 * @param Integer _maxHeight 画像の最大縦幅
	 */
	function __construct() {
		$this -> _expansion = 1;

		$this -> _maxWidth = 350;

		$this -> _maxHeight = 200;
	}
	
	
	
	////////// Setter //////////
	/**
	 *  [Setter]
	 *
	 *  関数の詳細
	 *  画像の拡大比率をセットする
	 *
	 * @access public
	 */
	public function setImageParth($expansion){
		$this -> _expansion = $expansion;
	}
	
	/**
	 *  [Setter]
	 *
	 *  関数の詳細
	 *  画像のパスをセットする
	 *  第二引数を指定しないと上書き
	 *
	 * @access public
	 */
	public function setUri($uri, $minUri = false){
		
		$this -> _uri = $uri;
		
		if($minUri === false){
			$this -> _minUri = $uri;
		}else{
			$this -> _minUri = $minUri;
		}
		
		list($width, $height) = getimagesize($this -> _uri);
		
		$this -> _width = $width;
		$this -> _height = $height;
	}
	
	/**
	 *  [Setter]
	 *
	 *  関数の詳細
	 *  画像の最大横幅をセットする
	 *
	 * @access public
	 */
	public function setMaxWidth($maxWidth){
		$this -> _maxWidth = $maxWidth;
	}
	
	/**
	 *  [Setter]
	 *
	 *  関数の詳細
	 *  画像の最大縦幅をセットする
	 *
	 * @access public
	 */
	public function setMaxHeight($maxHeight){
		$this -> _maxHeight = $maxHeight;
	}
	
	
	
	////////// Getter //////////
	/**
	 *  [Getter]
	 *
	 *  関数の詳細
	 *  ファイルをリサイズし、成功可否を返す
	 *
	 * @access public
	 * @return boolean
	 */
	public function getImage(){
		return $this -> exportImage();
	}

	/**
	 *  [Getter]
	 *
	 *  関数の詳細
	 *  画像の横幅を返す
	 *
	 * @access public
	 * @return boolean
	 */
	public function getImageWidth(){
		return $this -> _width;
	}
	
	/**
	 *  [Getter]
	 *
	 *  関数の詳細
	 *  画像の縦幅を返す
	 *
	 * @access public
	 * @return boolean
	 */
	public function getImageHeight(){
		return $this -> _height;
	}
	
	
	////////// Logic //////////
	
	/**
	 *  [Logic]
	 *
	 *  関数の詳細
	 *  アスペクト比を維持したリサイズ用縦横幅を返すメソッド
	 *  ファイルが画像であった場合のみ動作する(予定今は善意の呼び出しを乞う)
	 *  指定された移動先ディレクトリが存在しない場合はmkdir()でディレクトリを作成し、読み取り専用とする(今後Setterで指定できるようにしたい)
	 *  移動成功時true 失敗時falseを返す
	 *
	 * @access private
	 * @param Int $aspect アスペクト比
	 * @param Int $width 最大横幅
	 * @param Int $height 最大縦幅
	 * @param 型 パラメーター名（物理名） パラメーター型名（論理名）
	 * @return 型 戻り値（物理名） 戻り値（論理名）
	 * @see round()
	 * @throws なもんない
	 */
	
	private function calculationAspect($width, $height){
		
		$aspect = $this -> _expansion;
		
		//パーセント指定の縦横
		$width = ($this -> _width * $this -> _expansion);
		$height = ($this -> _height * $this -> _expansion);
		echo $width .":" .$height;
		//MAXサイズ指定の縦横
		if(0 != $this -> _maxWidth){
			if($this -> _maxWidth < $width){
				$aspect = (($this -> _maxWidth / $width));
				$aspect = $aspect;
				$width = $this -> _maxWidth;
				$height = round($aspect * $height);
			}
		}
		if(0 != $this -> _maxHeight){
			if($this -> _maxHeight < $height){
				$aspect = (($this -> _maxHeight / $height));
				$aspect = $aspect;
				$width = round($aspect * $width);
				$height = $this -> _maxHeight;
			}
		}
		return array($width, $height);
	}
	
	
	
	/**
	 *  [Logic]
	 *
	 *  関数の詳細
	 *  画像をリサイズし、その可否を返すメソッド
	 *  移動成功時true 失敗時falseを返す
	 *
	 * @access private
	 * @param bool $flg 可否のフラグ
	 * @param Int $width 最大横幅
	 * @param Int $height 最大縦幅
	 * @param String $image 画像自体を保持
	 * @param Int $canvas 画像を上書きするキャンバス
	 * 
	 * @return bool リサイズ可否
	 * @see $this -> calculationAspect()
	 * @see ImageCreateFromJPEG()
	 * @see ImageCreateFromString()
	 * @see ImageCreateTrueColor()
	 * @see ImageCopyResampled()
	 * @see ImageJPEG()
	 * @see ImageDestroy()
	 * @throws なもんない
	 */
	
	private function exportImage(){
		$flg = true;
		//call to calculationAspect
		list($width, $height) = $this -> calculationAspect($this -> _width, $this -> _height);
		
//		$image = ImageCreateFromJPEG($this -> _uri);
		$image = ImageCreateFromString(file_get_contents($this -> _uri));
		$canvas = ImageCreateTrueColor($width, $height);
		
		if(!ImageCopyResampled($canvas, $image, 0, 0, 0, 0, $width, $height, $this -> _width, $this -> _height)){
			$flg = false;
		}
		if(!ImageJPEG($canvas, $this -> _minUri, 100)){
			$flg = false;
		}
		//memory destroy
		ImageDestroy($canvas);
		ImageDestroy($image);
		
		return $flg;
	}
}
/*
//つかいかた
$ImgResizeClass = new ImgResizeClass();
$expansion = 0.5;
$uri = "./img/04.jpg";
$minUri = "./img/04min.jpg";

$maxWidth = 300;
$maxHeight = 100;


$ImgResizeClass -> setImageParth($expansion);
$ImgResizeClass -> setUri($uri, $minUri);
$ImgResizeClass -> setMaxWidth($maxWidth);
$ImgResizeClass -> setMaxHeight($maxHeight);

$ImgResizeClass -> getImage();
*/
?>