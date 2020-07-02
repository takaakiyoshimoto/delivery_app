<?php
//フォームからデータを受け取る
$date = $_POST["date"];


session_start();

//DB接続します
require "funcs.php";
$pdo = db_con();


//既存のnameかぶっていないかを確認========================================================
//データ取得

$shop_id = $_SESSION["shop_id"];

$stmt = $pdo->prepare("INSERT INTO recivedata_table(recivedata_id,data,shop_id,status) VALUES (Null,:a1,:a2,:a3)");
$stmt->bindValue(':a1',$date, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a2',$shop_id, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a3',1, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
    sql_error($stmt);
}

header("Location: cook_regist.php");
?>