# お問い合わせフォーム

## 環境構築

Docker ビルド

1. リポジトリをクローン  
   git clone git@github.com:kvujic/contact-form.git

2. コンテナを起動  
   docker-compose up -d --build

- MYSQL は、OS によって起動しない場合があるので、それぞれの環境に合わせて docker-compose.yml ファイルを編集してください。

Laravel 環境構築

1. PHP コンテナにログイン  
   docker-compose exec php bash

2. パッケージをインストール  
   composer install

3. .env を作成し、環境変数を変更  
   cp .env.example .env

4. APP_KEY 生成  
   php artisan key:generate

5. Fortify をインストール  
   composer require laravel/fortify
   php artisan vendor:publish --provider="Laravel\Fortify\FortifyServiceProvider"

6. Livewire をインストール  
   composer require livewire/livewire

7. マイグレーションを実行  
   php artisan migrate

8. シーディングを実行  
   php artisan db:seed

## 使用技術

- Laravel 8.83.29
- PHP 7.4.9
- MySql 8.0.26
- Fortify 1.19.1
- Livewire 2.12.8

## ER 図

![ER図](./images/er-drawio.png)

## URL

- 開発環境：http://localhost/
- phpMyAdmin：http://localhost:8080/
