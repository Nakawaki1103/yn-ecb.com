# yn-ecb.com

不動産反響管理システム（Laravel + MySQL）

## 動作環境

- PHP 8.4
- Composer 2.x
- Docker（MySQL 8.0コンテナ）

## セットアップ手順

### 1. リポジトリをクローン

```bash
git clone <repository-url>
cd yn-ecb.com/src
```

### 2. MySQLコンテナを起動

```bash
docker compose up -d
```

### 3. 依存パッケージをインストール

```bash
composer install
```

### 4. 環境設定ファイルを作成

```bash
cp .env.example .env
```

`.env` のDB設定を以下に変更：

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ecb
DB_USERNAME=ecb_user
DB_PASSWORD=secret
```

### 5. アプリケーションキーを生成

```bash
php artisan key:generate
```

### 6. マイグレーションを実行

```bash
php artisan migrate
```

### 7. 開発サーバーを起動

```bash
php artisan serve
```

ブラウザで http://localhost:8000 にアクセス。

## トラブルシューティング

```bash
sudo service mysql stop
docker compose down && docker compose up -d
```

### `ecb_user` が存在しない / 接続拒否

古いボリュームが残っていて初期化が走らなかった可能性があります。ボリュームごと削除して再作成：

```bash
docker compose down -v
docker compose up -d
```

> **注意:** `-v` を付けるとDBデータがすべて削除されます。
