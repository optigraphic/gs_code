<?php
//1. POSTデータ取得
//$name = filter_input( INPUT_GET, ","name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ
$name = $_POST["name"];
$writer = $_POST["writer"];
$url = $_POST["url"];
$comme = $_POST["comme"];
$isbn = $_POST["isbn"];



//2. DB接続します
// try {
//   $pdo = new PDO('mysql:dbname=データベース名; charset=utf8; host=ホスト名','ID','パスワード');
// } catch (PDOException $e) {
//   exit('エラー時のメッセージ:'.$e->getMessage());
// }

// function化させる
// try {
//   $pdo = new PDO('mysql:dbname=gs_db; charset=utf8; host=localhost','root','');
// } catch (PDOException $e) {
//   exit('DB_CONECTION_ERROR:'.$e->getMessage());
// }

include "funcs.php";
$pdo = db_con();


//３．データ登録SQL作成
// SQLを関数化
$sql = "INSERT INTO gs_bm_table(name,writer,url,comme,isbn,datetime)VALUES(:name,:writer,:url,:comme,:isbn,sysdate())";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':writer', $writer, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':url', $url, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':comme', $comme, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':isbn', $isbn, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  sqlError($stmt);
}else{
  //５．index.phpへリダイレクト
  header("Location: index.php");
  exit;

}
?>
