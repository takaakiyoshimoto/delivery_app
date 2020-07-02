<?php ini_set( 'display_errors', 1 ); ?>
<?php
$recivedata_id = $_GET["recivedata_id"];
require "funcs.php";
$pdo = db_con();
session_start();

$stmt = $pdo->prepare("SELECT * FROM menu_table WHERE recivedata_id=:recivedata_id");
$stmt->bindValue(':recivedata_id', $recivedata_id, PDO::PARAM_STR);
$status = $stmt->execute();

//3. SQL実行時にエラーがある場合STOP
if($status==false){
    sql_error($stmt);
}

$view="<p>登録済みメニュー</p>";
while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
    //.=で変数をつなぐことができる
    $view .= "<p>".$result['menu_title']."</p>";
}



$hidden = "<input type='hidden' name='recivedata_id' value=".$recivedata_id.">";
?>

<html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>メニュー登録</title>
</head>
    <body>
        <?=$view?>
        <form action="menu_regist_act.php" method="get">
        <fieldset>
            <legend>新規メニュー登録</legend>
            <label>メニュー名: <input type="text" name="menu_title" id="name"></label><br>
            <?=$hidden?>
            <input type="submit" value="送信" id="send">
        </fieldset>
        </form>
    </body>
</html>

