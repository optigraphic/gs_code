<?php
include "funcs.php";
$pdo = db_con();

$search = $_POST["search"];

// print($sql);

try{
	// データベースへの接続を表すPDOインスタンスを生成
	// $pdo = new PDO($name,$writer,$url,$comme,$isbn,sysdate());

	//  SQL文
	$sql = "SELECT * FROM gs_bm_table WHERE CONCAT(name,writer,comme,isbn) LIKE '%".$search."%' ";

	// プリペアドステートメントを作成
	$stmt = $pdo->prepare($sql);

	// プレースホルダと変数をバインド
	$stmt -> bindParam(":comme",$comme);
	$stmt -> execute(); //実行

    // 1行ずつ取得
    $view="";
	while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){ 
        $view .= "<tr>".
                 "<td id='titleout'>"."<div id='title'>".$result["name"]."</div>".
                        "<div id='writer'>".$result["writer"]."</div>".
                        "<div id='isbn'>"."ISBN：".$result["isbn"]."</div>".
                        "<div id='datetime'>"."登録日：".$result["datetime"]."</div>".
                 "</td>".
                 "<td>".
                     "<div id='comme'>".$result["comme"]."</div>".
                 "</td>".
                 "<td>".
                     "<div id='link'>"."<a href =".$result["url"]." target=_blank>"."★"."</a></div>".
                 "</td>".
                 "</tr>";
    
      }
	// 接続を閉じる
	$pdo = null;
}catch (PDOException $e) {
	// UTF8に文字エンコーディングを変換します
	echo mb_convert_encoding($e->getMessage(),'UTF-8','SJIS-win');
	die();
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>本棚</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
<style>
  #title{font-size: 16px; font-weight: bold; padding: 0;}
  #writer{font-size: 14px; padding: 0;}
  #isbn{font-size: 8px; padding: 0;}
  #comme{font-size: 12px; padding: 0 5px;}
  #datetime{font-size: 6px; padding: 0;}
  #titleout{padding: 5px; width:25%;}
</style>
</head>
<body id="main">


<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <p class="navbar-brand">MY 本棚</p>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="container jumbotron">
    <form method="post" action="search.php">
      <table>
        <tr><td><input type="text" name="search" size="40" id="search" value="<?=$search?>"></textArea></td>
            <td><input type="submit" value="語句検索"></td>
            <td><a class="navbar-brand" href="index.php">書籍登録</a></td>
            <td><a class="navbar-brand" href="select.php">書籍全表示</a></td>
        </tr>
     </table>
     </form>
    <table border= "1px">
        <?=$view?>
    </table>
    </div>
</div>
<!-- Main[End] -->

</body>
</html>
