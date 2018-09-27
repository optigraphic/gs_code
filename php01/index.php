<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>かゆいのキライ</title>
<style>
    #canvas{
        background-image:url("images/mosmos.png");
        background-size: 100% 100%;
        display: block;
        margin: auto;
        border: 1px solid black;
    }
    .mosinn{
        width:1000px;
        height:600px;
        background-color: #fff;
        position:absolute;
        top: 50%;
        left: 50%;
        transform: translate3d(-50%,-53%,0);
    }
</style>
</head>
<body>


<div>

<!-- canvasタグはcssではなく直接サイズ指定 -->
<canvas id ="canvas" width="1600" height="900" class ="mosout"></canvas>
    <iframe class = "mosinn" src="index2.php">

    </iframe>


</div>



<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="js/script.js"></script>
</body>
</html>