# Laravel CSV Seeder

<https://laravel-csv-seeder.herokuapp.com/>

## 環境

* PHP : `>=7.0.0`
* Laravel : `5.5.*`

## ツールの概要
CSV形式のテキストをLaravelのクエリビルダに変換し、seederとして使用することを想定しています。  

テキストエリアにカンマ区切りのテキストを貼り付け、convertボタンを押下すると、下のテキストエリアにクエリビルダで記述されたコードが出力されます。  
テーブル名はダミーとなっていますので、変更後、ご使用のLaravel seederファイルなどにコピペしてお使い下さい。

### CSVの仕様

* 項目ごとはカンマ区切り
* 行は改行区切り
* 行は以下の仕様
	* 1行目 : 日本語項目名。変換後のコードには使用されません
	* 2行目 : 項目名。キーとして使用されます
	* 3行目以降 : インサートされる内容

例）

テーブル

| ID | 名前 | メールアドレス |
| :-- | :-- | :-- |
| id | name | email |
| 1 | たろう | taro@example.com |
| 2 | じろう | jiro@example.com |

CSVテキスト

```
ID,名前,メールアドレス
id,name,email
1,たろう,taro@example.com
2,じろう,jiro@example.com
```	

変換結果

```php
DB::table('TABLE_NAME_HERE')->insert([
['id' => '1', 'name' => 'たろう', 'email' => 'taro@example.com', ],
['id' => '2', 'name' => 'じろう', 'email' => 'jiro@example.com', ],
]);
```

##Heroku Button
自分のHeroku環境で動作させたい場合は以下のボタンをご使用下さい。

[![Heroku Deploy](https://www.herokucdn.com/deploy/button.png)](https://heroku.com/deploy?template=https://github.com/k-usk/laravel-csv-seeder)

環境変数の値で、`APP_KEY`のみ各自で設定して下さい。  
Herokuコマンドで直接設定する場合は、以下で設定出来ます。

```
heroku config:set APP_KEY=$(php artisan --no-ansi key:generate --show)
```