<?php
//必ずsession_startは最初に記述
session_start();

// セッション変数を解除
$_SESSION = array();

// セッションcookieを削除
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time()-42000, '/');
}

// セッションを破棄
session_destroy();

//処理後、index.phpへリダイレクト
header("Location: index.php");
exit();

?>
