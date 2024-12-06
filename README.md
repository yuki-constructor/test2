# test2
# アプリケーション名
お問い合わせフォーム

# 環境構築
## ⓵リポジトリをクローン
以下のコマンドで、Git リポジトリをクローンします。

$ git clone git@github.com:yuki-constructor/test2.git

## ⓶.env ファイルの作成
以下のコマンドで、 srcディレクトリに移動し、.env.example を .env にコピーします。

$ cd src/

$ cp .env.example .env

.env ファイルを開いて、以下の設定を変更します。

APP_TIMEZONE=Asia/Tokyo

APP_LOCALE=ja

DB_CONNECTION=mysql

DB_HOST=mysql

DB_PORT=3306

DDB_DATABASE=laravel_db

DB_USERNAME=laravel_user

DB_PASSWORD=laravel_pass

## ⓷Dockerコンテナのビルドと起動
以下のコマンドで、Dockerコンテナを起動します。

$ docker-compose up --build -d

## ⓸PHPコンテナ内にログイン
以下のコマンドで、PHPコンテナに接続します。

$ docker-compose exec php bash

## ⓹composerのインストール
以下のコマンドで、composerをインストールします。

$ composer install

## ⓺アプリケーションキーの生成
以下のコマンドで、Laravel のアプリケーションキーを生成します。

$ php artisan key:generate

## ⓻シンボリックリンクを設定
以下のコマンドで、画像を公開ディレクトリからアクセス可能にするために、シンボリックリンクを設定します。

$ php artisan storage:link

## ⓼データベースのマイグレーション
以下のコマンドで、データベースをセットアップするために、マイグレーションを実行します。

$ php artisan migrate

## ⑨アプリケーションの動作確認
http://localhost:8080 にアクセスすることで、phpMyAdminを確認できます。

## ⓾データベースのシーディング
以下のコマンドで、データベースにサンプルデータを挿入するためにシーディングを実行します。

$ php artisan db:seed

## ⑪アプリケーションの動作確認
http://localhost にアクセスすることで、アプリケーションが動作していることを確認できます。

もし、エラーとなった場合、storageとbootstrap/cacheディレクトリ書き込み権限を設定することで改善するか確認してください。

sudo chmod -R 777 src/*
chmod -R 777 www/.* （PHPコンテナ内に入っている場合は、こちらを実行）

# 使用技術(実行環境)
Laravel Framework 11.3.2
PHP 8.2 以上

# ER図
ER図

# URL
開発環境：git@github.com:yuki-constructor/test2.git