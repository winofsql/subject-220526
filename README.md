# subject-220526

- ### jQuery
  - コンソールで参照のテスト\
  ![image](https://user-images.githubusercontent.com/1501327/170398540-55ee26ad-728a-4873-867d-f690634e7284.png)\
  ![image](https://user-images.githubusercontent.com/1501327/170398578-ba6dbfcb-1d01-4b8e-aa19-c914150da529.png)

```js
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
```

### 関数仕様書
![image](https://user-images.githubusercontent.com/1501327/170424469-68c9f6b9-b998-41d8-a132-a14ea790a5ca.png)

![image](https://user-images.githubusercontent.com/1501327/170450374-271aad9e-ff73-466c-98fa-50e5e23e16e7.png)
