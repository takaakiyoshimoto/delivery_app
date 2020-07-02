# delivery_app

# Features
弁当配送用のアプリ

使用者の種類
・ユーザー
・管理者
・店

# image(未実装あり)
店が配送日とメニューを登録して、管理者に承認されると、
登録しているユーザに対して献立の提案がされる。
ユーザが承認すると、確定する。

店はメニュー登録時に栄養情報を登録し、
ユーザーは栄養情報の管理ができる。
https://cacoo.com/diagrams/veKSLEw1gWBJKBzs-5B331.png

# db
https://cacoo.com/diagrams/veKSLEw1gWBJKBzs-4B8D7.png

# 実装済み機能(一部imageと異なる)
■ユーザー
  ・指定した日に存在しているメニューを確認できる。

■管理者
  ・ユーザー一覧の確認
  ・店の一覧の確認
  
■店
  ・対応可能日を登録
  ・メニュー登録

# demo
■ユーザー
  index.php
    ユーザーログインを押下すると、login.phpに移動
  login.php
    ログインID,ログインパスワードに正しい値を入れると、index.phpにユーザ名が入った状態で移動
    (例．ログインID:0001,パスワード:P@ssw0rd)
  index.php(ログイン後)
    献立確認を押下すると、user_reserve.phpに移動
  user_reserve.php
    日にちに値を入れて、送信を押下するとuser_reserve.phpにdateに日にちが入った状態で移動
    (例.日にち:2020-07-09)
  user_reserve.php(dateに値が入った状態)
    指定された日にちで登録されているショップ名、メニューが表示される
    
■管理者
  index.php
    ユーザーログインを押下すると、login.phpに移動
  login.php
    ログインID,ログインパスワードに正しい値を入れると、index.phpにユーザ名が入った状態で移動(普通のユーザーとログイン方法は同じ)
    (例．ログインID:0002パスワード:P@ssw0rd)
  index.php(ログイン後)
    1.ユーザ一覧
      ユーザー名、住所が表示される
    2.ショップ一覧
      ショップ名、住所が表示される
    
■店
  index.php
    ショップログインを押下すると、loginshopに移動
  loginshop.php
    ログインID,ログインパスワードに正しい値を入れると、index.phpにショップ名が入った状態で移動
    (例．ログインID:1001,パスワード:P@ssw0rd)
  index.php(ログイン後)
    対応可能日を押下すると、cook_regist.phpに移動
  cook_regist.php
    1.日に日にちを入れて送信すると、その日にちのリンクが生成される。
    2.申請中のリンクを押下すとmenu_regist.phpに移動する(申請中、承認を変更するページは未実装)
  menu_regist.php
    登録済みのメニューが確認できる。
    メニュー名に値を入れて送信すると、メニューが追加される
  
