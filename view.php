<!DOCTYPE html>
<html>
<head>
<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
<meta charset="utf-8">
<title>テキストデータを読込み</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/encoding-japanese/2.0.0/encoding.min.js"></script>

<!-- <script src="client.js?_=<?= time() ?>"></script> -->
<script>
// ロードイベント
$(function(){
  
    $("#text").val("こんにちは世界");

    $("#load").on("click",function(){

        var file = $("#file").get(0).files[0];
        var reader = new FileReader();
        reader.onload = function(reader_event) {
            alert(reader_event.target.result);
            $("#text").val(reader_event.target.result);
        };
        reader.readAsText(file);

    });

    $("#file").on("change",function(){
        // テキストエリアをクリア
        $("#text").val("");

        // ファイルオブジェクト
        var file = this.files[0];
        console.log(file);

        // ファイルを読み込む為のオブジェクト
        var reader = new FileReader();
        console.log(reader);

        reader.onload = function(reader_event) {
            console.log(reader_event.target.result);

            var codes = new Uint8Array(reader_event.target.result);
            // キャラクタセットを取得
            encoding = Encoding.detect(codes);
            console.log( encoding );

        }

        // キャラクタセットを知るための読み込み
        reader.readAsArrayBuffer(file);

        // alert("一旦停止");

        // 実行できるスタイルが一つの書き方
        $("#text").css("background-color","#c0c0c0");
        // $("#text").attr("placeholder","外部ファイルが読み込まれます");
        $("#text").prop("placeholder","外部ファイルが読み込まれます");
        $("#text").prop("readonly",true);

    });
    // alert("デバッグ");
    // console.log("裏デバッグ");
});
</script>

<style>
/* PC */
@media screen and ( min-width:480px ) {
    #content {
        margin: 26px;
    }
    #text {
        width: 480px;
        height: 360px
    }
}
/* スマホ */
@media screen and ( max-width:479px ) {
    #content {
        padding: 0px;
    }
    .btn {
        width: 100%;
    }
    #text {
        width: 100%;
        height: 400px
    }
}
</style>

</head>
<body>
<h3 class="alert alert-primary"><a href="control.php">テキストデータを読込み</a></h3>
<div id="content">
    <div>
        <input type="file" class="btn btn-secondary me-4" value="テキストファイル選択" id="file" -accept="text/*">
        <input type="button" class="btn btn-secondary me-4" value="読込み" id="load">
        <a href="." class="btn btn-secondary">フォルダ</a>
    </div>

    <div>
        <select id="charset" class="mt-4">
            <option value="0">UTF-8</option>
            <option value="1">SHIFT_JIS</option>
            <option value="2">EUC-JP</option>
        </select>
    </div>

    <div>
        <textarea id="text"></textarea>
    </div>
</div>
<div id="result" class="m-4"></div>


</body>
</html>
