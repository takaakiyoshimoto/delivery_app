<?php ini_set( 'display_errors', 1 ); ?>
<?php

session_start();

require "funcs.php";

$status=0;

if (isset($_SESSION["kanri_flg"])){
    $kanri_flg = $_SESSION["kanri_flg"];
}

//式
if (!isset($_SESSION["chk_ssid"])) {
    $status = 0;
  }elseif($_SESSION["chk_ssid"] != session_id()){
    $status = 1;
  }
  else{
    $_SESSION["chk_ssid"] = session_id();
    $status = 2;
}
//ユーザかショップかを判別する
if($status=2){
    if (isset($_SESSION["user_name"])){
        $status = 3;
        if ($kanri_flg==1){
            $status = 5;
        }
    }elseif(isset($_SESSION["shop_name"])){
        $status = 4;
    }
}

//statusの値でviewを変更する
if($status==3){
    $view ="<h3>ようこそ「".$_SESSION['user_name']."」さん</h3>";
    $view .="<p><a href='user_reserve.php'>献立確認</a></p>";
    $view .= "<p><a href='logout.php'>ログアウト</a></p>";
}elseif($status==4){
    $view ="<h3>ようこそ「".$_SESSION['shop_name']."」さん</h3>";
    $view .="<p><a href='cook_regist.php'>対応可能日登録</a></p>";
    $view .= "<p><a href='logout.php'>ログアウト</a></p>";
}elseif($status==5){
    $view ="<h3>ようこそ「".$_SESSION['user_name']."」さん</h3>";
    $view .="<p><a href='user_list.php'>ユーザ一覧</a></p>";
    $view .="<p><a href='shop_list.php'>ショップ一覧</a></p>";
    $view .= "<p><a href='logout.php'>ログアウト</a></p>";

}
else{
    $view = "<p><a href='create_user.php'>ユーザー作成</a></p>";
    $view .= "<p><a href='login.php'>ユーザーログイン</a></p>";
    $view .= "<p><a href='create_shop.php'>ショップ開設</a></p>";
    $view .= "<p><a href='loginshop.php'>ショップログイン</a>";
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- <p><a href="create_user.php">ユーザー作成</a></p>
    <p><a href="login.php">ユーザーログイン</a></p>
    <p><a href="logout.php">ログアウト</a></p>
    <p><a href="create_shop.php">ショップ開設</a></p>
    <p><a href="loginshop.php">ショップログイン</a> -->
    <!-- <p><a href="usermenu_management.php">献立作成</a></p> -->
    <?=$view?>
    
</body>
</html>