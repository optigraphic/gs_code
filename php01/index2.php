<html>
<head>
<meta charset="utf-8">
<title>かゆいのキライ</title>
</head>
<body>

<style>
    table{
        margin:auto;
    }
    h1{
        text-align:center;
        padding:50px 0 0;
    }
</style>

<form action="write.php" method="post">
<h1>忘れない。あのかゆさを。</h1>
<table>
    <tr><td>いつ？</td><td><input type="text" name="when"></td></tr>
    <tr><td>どこで？</td><td><input type="text" name="where"></td></tr>
    <tr><td>どこを？</td><td><select name="body">
                                <option value="">選択してください</option>
                                <option value="頭">頭</option>
                                <option value="胸">胸</option>
                                <option value="右腕">右腕</option>
                                <option value="左腕">左腕</option>
                                <option value="腰">腰</option>
                                <option value="右足">右足</option>
                                <option value="左足">左足</option>
                            </select></td></tr>
    <tr><td>どれだけ？</td><td><input type="number" name="many" >箇所</td></tr>
    <tr><td>どうだ？</td><td><select name="how">
                                <option value="">かゆさレベル</option>
                                <option value="史上最高に">★★★★★（最大）</option>
                                <option value="結構">★★★★</option>
                                <option value="普通に">★★★</option>
                                <option value="まあまあ">★★</option>
                                <option value="少しだけ">★（最小）</option>
                            </select></td></tr>
    <tr><td>ひとこと:</td><td><input type="text" name="text"></td></tr>
    <tr><td></td><td><input type="submit" value="送信"></td></tr>
</table>
   
</form>

</body>
</html>