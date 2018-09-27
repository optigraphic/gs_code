<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
  <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><p class="navbar-brand">書籍登録</p></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="insert.php">
  <div class="jumbotron">
   <fieldset>
    <legend>BOOKS DATE BASE</legend>
    <table>
     <tr><td>書籍名</td><td><input type="text" name="name" size="40" id="name"></td></tr>
     <tr><td>著者</td><td><input type="text" name="writer" size="40" id="writer"></td></tr>
     <tr><td>URL</td><td><input type="text" name="url" size="40" value="http://" id="url"></td></tr>
     <tr><td>一言</td><td><textArea name="comme" rows="4" cols="40" id="comme"></textArea></td></tr>
     <tr><td>ISBN</td><td><input type="text" name="isbn" size="40" id="isbn" placeholder="ハイフン(-)は入れずに入力で自動入力" ></td></tr>
     <tr><td></td><td><input type="submit" value="送信"></td></tr>

     </table>
    </fieldset>
    <a class="navbar-brand" href="select.php">MY本棚へ</a>
  </div>
  <div id="noisbn">
  </div>
</form>
<!-- Main[End] -->

<script>
 $("#isbn").change(function() {
      console.log($(this).val());
      // const isbn = $(this).val();
      // console.log(isbn);
      // google books APIに接続
      const url = "https://www.googleapis.com/books/v1/volumes?q=isbn:" + $(this).val();
      console.log(url);

$.getJSON(url, function(bdata) {
        if(!bdata.totalItems) {
          $("#name").text("");
          $("#writer").text("");
          $("#url").text("");
          $("#comme").text("");
          $("#noisbn").html('<p class="nobooks" id="nobooks">該当する書籍がないか、ISBNが間違ってます。</p>');
          $('#noisbn > p').fadeOut(3000);

        } else {

// 書籍が存在したら、JSONデータを取得
          $("#name").val(bdata.items[0].volumeInfo.title);
          $("#writer").val(bdata.items[0].volumeInfo.authors[0]);
          $("#url").val(bdata.items[0].volumeInfo.infoLink);
          $("#comme").val(bdata.items[0].volumeInfo.description);

          console.log(bdata.items[0].volumeInfo.title);
          console.log(bdata.items[0].volumeInfo.authors[0]);
          console.log(bdata.items[0].volumeInfo.infoLink);
          console.log(bdata.items[0].volumeInfo.description);
          
        }
      });
    });

</script>

</body>
</html>
