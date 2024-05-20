##お問合せフォーム

 ##環境構築
  1. git clone git@github.com:YuuT62/fashionably-late.git
  2. cd fashionably-late/
  3. docker-compose up -d --build

*MySQLは、OSによって起動しない場合があるので、それぞれのPCに合わせてdocker-compose.ymlファイルを編集してください。

##Laravel環境構築
 1. docker-compose exec php bash
 2. composer install
 3. .env.exampleファイルから.envファイルを作成し、環境変数を変更

      12行目)　DB_HOST=mysql
    
      14行目)　DB_DATABASE=laravel_db
    
      15行目)　DB_USERNAME=laravel_user
    
      16行目)　DB_PASSWORD=laravel_pass
    
 5. php artisan key:generate
 6. php artisan migrate
 7. php artisan db:seed

##使用技術
 ・ PHP 7.4.9
 ・ Laravel 8.83.8
 ・ MySQL 8.0.26

##ER図

![index](https://github.com/YuuT62/fashionably-late/assets/57668081/738b3796-2b95-4471-9f66-d5cce39f9a30)

##URL

 開発環境：http://localhost/
 
 お問い合わせフォーム入力ページ：/
 
 お問い合わせフォーム確認ページ：/confirm
 
 サンクスページ：/thanks
 
 管理画面：admin
 
 ユーザ登録ページ：register
 
 ログインページ：login

 ※Windowsの場合、ファイル権限エラーでアクセスできないことがあるため、以下のコマンドで回避
 
 sudo chmod -R 777 src/*


