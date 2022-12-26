<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title> 掲示板を作ろう</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <img src="4eachblog_logo.jpg">
    <header>
        <ul>
            <li>トップ</li>
            <li>プロフィール</li>
            <li>4eachについて</li>
            <li>登録フォーム</li>
            <li>問い合わせ</li>
            <li>その他</li>
        </ul>
    </header>


    <div class="mainbody">
        <div class="left">
            <h2>プログラムに役立つ掲示板</h2>
            <div class="inputform">
                <div class="inputtitle"><h3>入力フォーム</h3></div>
                <form method="POST" action="insert.php">
                    <div>
                        <label for="handlename">ハンドネーム</label>
                        <br>
                        <input type ="text" class="text" name="handlename" size="35" id="handlename">
                    </div>
                    <div>
                        <label for="title">タイトル</label>
                        <br>
                        <input type="text" class="text" name="title" size="35" id="title">
                    </div>
                    <div>
                        <label for="comments">コメント</label>
                        <br>
                        <textarea cols="55" rows="8" name="comments" id="comments"></textarea>
                    </div>
                    <div>
                        <input type="submit" class="submit" value="投稿する" style="background-color:gray; color:white;  border:none; border-bottom:2px solid black; border-radius:3px;">
                    </div>
            </div>

            <?php
                mb_internal_encoding("utf8");
                $pdo= new PDO("mysql:dbname=lesson01; host=localhost;", "root","mysql");

                $stmt=$pdo->query("select* from 4each_keijiban"); 

                while($row= $stmt->fetch()){
                    echo "<div class='kiji'>";
                    echo "<h3>".$row['title']."</h3>";
                    echo "<div class='contents'>";
                    echo $row['comments'];
                    echo "<div class='handlename'>posted by ".$row['handlename']."</div>";
                    echo "</div>";
                    echo "</div>";
                }
            ?>
        </div>

        <div class="right">
            <h3>人気の記事</h3>
            <ul>
                <li>PHPオススメ本</li>
                <li>PHP MyAdminの使い方</li>
                <li>いま人気のエディタTop5</li>
                <li>HTMLの基礎</li>
            </ul>
            <h3>オススメリンク</h3>
            <ul>
                <li>インターノウス株式会社</li>
                <li>XAMPPのダウンロード</li>
                <li>Eclipseのダウンロード</li>
                <li>Braketsのダウンロード</li>
            </ul>
            <h3>カテゴリ</h3>
            <ul>
                <li>HTML</li>
                <li>PHP</li>
                <li>MySQL</li>
                <li>JavaScript</li>
            </ul>
        </div>
    </div>

    <footer>
        <p>copyright © internous | 4each blog the which provides A to Z about programing.</p>
    </footer>
</body>
</html>
