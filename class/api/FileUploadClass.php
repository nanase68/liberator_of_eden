<?php
/**
 * [API]fileのアップロード関連をまとめたクラス
 *
 * クラスの詳細
 * POSTされてきた$_FILESを処理するクラス。
 * ファイルアップロードからそのファイル情報の変更まで扱う。
 * Exceptionなぞない、全ては使用者の善意により成り立つ…
 *
 * @access public
 * @author HiroakiTatsumi <hatuusa@gmail.com>
 * @copyright HiroakiTatsumi All Rights Reserved
 * @category カテゴリー（処理系）
 * @package Model
 */
class FileUploadClass{
	
	
	////////// Constructor //////////
	/**
	 *  [Constructor]Constructor
	 *
	 *  関数の詳細
	 *  各疑似変数の初期化を行うコンストラクタ
	 *
	 *
	 * @access public
	 * @param String _moveDirPath: ファイルの移動先ディレクトリパス
	 * @param String _tmpDirPath: tmpディレクトリのパス
	 */
	
	function __construct(){

		//Default directory
		$this -> _moveDirPath = "./files/";

		//Default "tmp" directory
		$this -> _tmpDirPath = "./tmp/";

	}
	
	
	////////// Setter //////////
	
	//Set file parameter
	public function setFileParam($fileParam){
	
		$this -> _fileName = $fileParam["name"];
		
		$this -> _fileTempName = $fileParam["tmp_name"];
		
		$this -> _fileSize = $fileParam["size"];
		
		$this -> _fileMIME = @exif_imagetype($fileParam['tmp_name']);
	
	}
	
	//Set move file path
	public function setDirPath($moveDirPath){
		$this -> _moveDirPath = $moveDirPath;
	}
	
	//Set file name
	public function setFileName($fileName){
		$this -> _fileName = $fileName.".".$this -> getFileMimeName();
	}
	
	
	////////// Getter //////////
	/**
	 *  [Getter]
	 *
	 *  関数の詳細
	 *  ファイルを移動し、成功可否を返す
	 *
	 * @access public
	 * @return boolean
	 */
	//Move files
	public function getFile(){
		return $this -> fileMove();
	}
	
	
	/**
	 *  [Getter]
	 *
	 *  関数の詳細
	 *  ファイルのMIME Typeを取得するメソッド
	 *
	 * @access public
	 * @return String MIMETYPE
	 */
	
	//return file mime
	public function getFileMimeName(){

		return end(explode(".", $this -> _fileName));
		//return "jpg";

	}
	/**
	 *  [Getter]
	 *
	 *  関数の詳細
	 *  移動先パスを返す
	 *
	 * @access public
	 * @return String 移動先パス
	 */
	//return move directory"Path"
	public function getMovePath(){
		
		return $this -> _moveDirPath . $this -> _fileName;
		
	}
	
	/**
	 *  [Getter]
	 *
	 *  関数の詳細
	 *  ファイルのMIMETYPEを返す
	 *
	 * @access public
	 * @return int
	 */
	public function getFileMIME(){
		return $this -> _fileMIME;
	}
	
	/**
	 *  [Getter]
	 *
	 *  関数の詳細
	 *  ファイルのサイズを返す
	 *
	 * @access public
	 * @return String
	 */
	
	public function getFileSize(){
		return $this -> calcSize();
	}
	
	
	/**
	 *  [Getter]
	 *
	 *  関数の詳細
	 *  セットされたファイルが画像ファイルかを調べるメソッド
	 *
	 * @access public
	 * @return boolean
	 */
	
	//image -> true
	public function isImage(){
		
		//$_FILES['name']['mime']の値は偽造可能なのでMIMEタイプをチェックする
		
		$type = @exif_imagetype($this -> _moveDirPath . $this -> _fileName);
		
		if (in_array($type, [IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG], true)) {
			
			return true;
			
		}else{
			
			return false;
			
		}
	}
	
	////////// Logic //////////
	
	
	/**
	 *  [Logic]
	 *
	 *  関数の詳細
	 *  セットされたファイルを指定パスに移動するメソッド
	 *  ファイルが画像であった場合のみ動作する(予定今は善意の呼び出しを乞う)
	 *  指定された移動先ディレクトリが存在しない場合はmkdir()でディレクトリを作成し、読み取り専用とする(今後Setterで指定できるようにしたい)
	 *  移動成功時true 失敗時falseを返す
	 *
	 * @access private
	 * @param String $type ファイルのMIMETYPE
	 * @return bool 移動可否
	 * @see in_array()
	 * @see move_uploaded_file()
	 * @see file_exists()
	 * @see mkdir()
	 * @see chmod()
	 * @throws なもんない
	 * @todo タイプ判別はいずれ$this -> isImage()に任せる
	 */
	private function fileMove(){
		
		//いずれ消す↓
		$type = @exif_imagetype($this -> _fileTempName);
		if (!in_array($type, [IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG], true)) {
		}
		//いずれ消す↑
		
		
		//ファイルをtmpから指定ディレクトリに移動するmove_uploaded_file(移動元パス, 移動先パス)
		
		//ディレクトリがなかった場合作成する
		if(!file_exists($this -> _moveDirPath)){
			mkdir($this -> _moveDirPath, 0777);
		}
		
		if(move_uploaded_file($this -> _fileTempName, $this -> _moveDirPath.$this -> _fileName)) {
			//パーミッションを読み取り専用に変更する
			chmod($this -> _moveDirPath . $this -> _fileName, 0644);
			
			//成功時true
			return true;
		}else{
			//失敗時false
			return false;
		}
	}
	
	
	
	/**
	 *  [Logic]
	 *
	 *  関数の詳細
	 *  ファイルサイズを見やすくするメソッド
	 *
	 * @access private
	 * @param String $fileSize ファイルのバイト数
	 * @return String fileSize ファイルサイズ
	 * @see isset()
	 * @see to(int)
	 * @see round()
	 * @throws ファイルがセットされていない場合0Bを返す.
	 */
	private function calcSize(){
		
		$fileSize = 0;
		
		//ファイルがセットされていない場合0Bを返す
		if(isset($this -> _fileSize)){
			$fileSize = (int)($this -> _fileSize);
			//KB
			if($fileSize > 1024){
				return round($fileSize / 1024)."KB";
			
			//MB
			}else if($fileSize > 1048576){
				return round($fileSize / 1048576)."MB";
			
			//GB
			}else if($fileSize > 1073741824){
				return round($fileSize /1073741824)."GB";
			//B
			}else{
				return $this -> $fileSize."B";
			}
		}else{
			return $fileSize."B";
		}
	}
}
?>