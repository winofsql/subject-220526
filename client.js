var encoding;
// *************************************
// jQuery
// *************************************
$(function(){

    // ファイル選択
    $("#file").on("change",function(){

        // テキストエリアをクリア
        $("#text").val("");

        // ファイルオブジェクト
        var file = this.files[0];

        // ファイルを読み込む為のオブジェクト
        var reader = new FileReader();

        // ファイルが読込み完了時に行う処理をイベントとして登録
        reader.onload = function(reader_event) {
            // データをバイナリに変換
            var codes = new Uint8Array(reader_event.target.result);
            // キャラクタセットを取得
            encoding = Encoding.detect(codes);
            console.log( encoding );

            // コンボボックスにキャラクタセットを表示
            if ( encoding == "EUCJP" ) {
                $("#charset").val("2");
            }
            if ( encoding == "SJIS" ) {
                $("#charset").val("1");
            }
            if ( encoding == "UTF8" ) {
                $("#charset").val("0");
            }
        };

        // キャラクタセットを知るための読み込み
        reader.readAsArrayBuffer(file);

    });

    // 読み込み
    $("#load").on("click",function(){

        // ファイルオブジェクト
        var file = $("#file").get(0).files[0];

        // ファイルを読み込む為のオブジェクト
        var reader = new FileReader();

        // ファイルが読込み完了時に行う処理をイベントとして登録
        reader.onload = function(reader_event) {
            $("#text").val(reader_event.target.result);
        };

        // キャラクタセットに合わせてテキストとして読み込み
        if ( encoding == "EUCJP" ) {
            reader.readAsText(file, "euc-jp");
        }
        if ( encoding == "SJIS" ) {
            reader.readAsText(file, "shift_jis");
        }
        if ( encoding == "UTF8" ) {
            reader.readAsText(file);
        }

    });

});
