<head>
<meta charset="utf-8">
<title>File書き込み</title>
</head>
<body>

<style>
    .time{
        font-size:65%;
    }
</style>

<h1>＜私の蚊刺記録帳＞</h1>
<table>
<!-- <tr>
<td><b>記入日時</b></td>
<td><b>いつ</b></td>
<td><b>どこで</b></td>
<td><b>どこを</b></td>
<td><b>どれだけ</b></td>
<td><b>かゆさレベル</b></td>
<td><b>蚊へ一言</b></td>
</tr> -->


<?php

// echo "<table border='1'>";
// cvsファイルを変数$dataに格納
$data = "data/mdata.cvs";

// $dataを読み込みモードで開く
$fp = fopen($data,"r");

// 配列の入れ物を用意（空の配列）
$t=[];
// $fpの最終行までループ処理
while(!feof($fp)){
    // 読み込んだ$fpの一行目を$txtに格納
    $txt = fgets($fp);
    // 一行目が格納された$txtを表示
    $e = explode(",",$txt);
    array_push($t,$e);
    // var_dump($t);
    // echo $e[0]."<br>";
};
fclose($fp);


for($i = 0; $i < count($t)-1; ++$i){
    $s =$t[$i];
    echo ("<tr>"."<td>"."私は".$s[1]."に"."</td>"."<td>".$s[2]."で"."</td>"."<td>".$s[3]."を"."</td>"."<td>".$s[4]."箇所刺されて"."</td>"."<td>".$s[5]."かゆかった。"."</td>"."<td>"."言ってみれば".$s[6]."。"."</td>"."<td class = 'time'>"."（".$s[0]."）"."</td>"."</tr>");
}
// echo "</table>";

?>

</table>
<p>
<!-- オールクリアボタン -->
<form action="clear.php" method="post">
<input type="submit" value ="オールクリア" name = "clear">
</form>
<a href="index2.php">再入力</a>
</p>



</body>
</html>