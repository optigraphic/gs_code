<head>
<meta charset="utf-8">
<title>File書き込み</title>
</head>
<body>
<center>
受け付けました。<br>
<?php
//文字作成
$dat = date("Y-m-d H:i:s");
$when = $_POST["when"];
$where = $_POST["where"];
$body = $_POST["body"];
$many = $_POST["many"];
$how = $_POST["how"];
$text = $_POST["text"];
$n = ",";
$str = $dat.$n.$when.$n.$where.$n.$body.$n.$many.$n.$how.$n.$text."\n";
//File書き込み
$file = fopen("data/mdata.cvs","a");	// ファイル読み込み
fwrite($file, $str); // "\n"は改行コード
fclose($file);
?>


<a href="index2.php">再入力</a><br>
<a href="read.php">入力結果</a>
</center>
</body>
</html>