<?php
    mb_internal_encoding("utf8");
    $pdo = new PDO("mysql:dbname=lesson01;host=localhost;","root","root");
    /*
    mysql:dbname=lesson01　→　MySQLに接続しデータベース「lesson01」を使用するという意味
    host=localhost　→　自分のPC(ローカル環境)のMAMPのMySQLサーバーを使用しているという意味
    "root","root"　→　ユーザー名,パスワード　windowsは"root","" Macは"root","root"
    */

    $sql = "INSERT INTO contactform(name, mail, age, comments) VALUES(?,?,?,?)";
    /*
    変数sqlに　SQL文を文字列として代入する※今回は登録のためのINSERT文を記述する
    ただしvalues内には具体的な値は書かず　代わりに?を記述しておく
    カラムの数だけ　カンマで?を区切る
    */
    $stmt =$pdo -> prepare($sql);
    /*
    prepareメゾットを使用し　作成したSQL文を変数stmtに格納する
    */

    $stmt -> bindValue(1,$_POST['name']);
    $stmt -> bindValue(2,$_POST['mail']);
    $stmt -> bindValue(3,$_POST['age']);
    $stmt -> bindValue(4,$_POST['comments']);

    $stmt -> execute();
?>  

<!doctype HTML>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>お問い合わせフォームを作る</title>
        <link rel="stylesheet" type="text/css" href="style2.css">
    </head>

    <body>
        <h1>お問い合わせフォーム</h1>
        <div class="confirm">
            <p>
                お問い合わせ有難うございました。<br>３営業日以内に担当者よりご連絡を差し上げます。
            </p>
        </div>
    </body>

</html>