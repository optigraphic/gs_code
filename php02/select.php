<?php
//1.  DB接続します
include "funcs.php";
$pdo = db_con();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("SQL_ERROR:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
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

        //  "<tr>".
        //      "<td>".$result["name"]."</td>".
        //      "<td>".$result["writer"]."</td>".
        //      "<td>".$result["url"]."</td>".
        //      "<td>".$result["comme"]."</td>".
        //      "<td>".$result["isbn"]."</td>".
        //      "<td>".$result["datetime"]."</td>"."</tr>";

  }
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
        <tr><td><input type="text" name="search" size="40" id="search"></textArea></td>
            <td><input type="submit" value="語句検索"></td>
            <td><a class="navbar-brand" href="index.php">書籍登録</a></td>
        </tr>
     </table>
     </form>
    <table border= "1px">
    <?=$view?>
    <!-- <tr>
        <td><div id="title">書籍名</div>
            <div id="writer">著者名</div>
            <div id="isbn">ISBN</div>
            <div id="datetime">登録日時</div>
        </td>
        <td>
            <div id="comme">詳細</div>
        </td>
        <td>
            <div id="link">LINK</div>
        </td>
    </tr> -->
    </table>
    </div>
</div>
<!-- Main[End] -->

</body>
</html>
