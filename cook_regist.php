<?php ini_set( 'display_errors', 1 ); ?>
<?php
require "funcs.php";
$pdo = db_con();

session_start();
$shop_id=$_SESSION["shop_id"];

$stmt = $pdo->prepare("SELECT * FROM recivedata_table WHERE shop_id=:shop_id");
$stmt->bindValue(':shop_id', $shop_id, PDO::PARAM_STR);
$status = $stmt->execute();

//SQL実行時にエラーがある場合STOP
if($status==false){
    sql_error($stmt);
}

$view="";
while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    //.=で変数をつなぐことができる
    if($result['status']==1){
        $view .= "<p>"."<a href=menu_regist.php?recivedata_id=".$result['recivedata_id'].">"."申請中:".$result['data']."</a>"."</p>";
    }elseif($result['status']==2){
        $view .= "<p>"."承認:".$result['data']."</p>";
    }elseif($result['status']==3){
        $view .= "<p>"."却下:".$result['data']."</p>";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>予定表</title>
</head>
<body>
<?=$view?>
<form action="cook_regist_act.php" method="post">
    <fieldset>
        <label>予約日：<input type="date" name="date"></label><br>
        <label><input type="submit" value="送信" id="send"></label>
    </fieldset>
</form>

</body>
</html>