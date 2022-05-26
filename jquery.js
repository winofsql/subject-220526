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
