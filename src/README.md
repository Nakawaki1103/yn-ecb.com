# yn-ecb.com

不動産反響管理システム（Laravel + MySQL）

## 動作環境

- PHP 8.4
- Composer 2.x
- Node.js / npm
- Docker（MySQL 8.0コンテナ）

## 前提ツールのインストール

### Mac

Homebrewが入っていない場合は先にインストール：

```bash
/bin/bash -c "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/HEAD/install.sh)"
```

```bash
# PHP 8.4
brew install php@8.4
echo 'export PATH="/opt/homebrew/opt/php@8.4/bin:$PATH"' >> ~/.zshrc
source ~/.zshrc

# Composer
brew install composer

# Node.js / npm
brew install node

# Docker
brew install --cask docker
```

> DockerはインストールしたらアプリケーションからDocker Desktopを起動する。

### WSL / Ubuntu

```bash
# PHP 8.4
sudo add-apt-repository ppa:ondrej/php
sudo apt update
sudo apt install php8.4 php8.4-cli php8.4-mbstring php8.4-xml php8.4-curl php8.4-zip php8.4-mysql

# Composer
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer

# Node.js / npm
curl -fsSL https://deb.nodesource.com/setup_lts.x | sudo -E bash -
sudo apt install nodejs

# Docker
sudo apt install docker.io docker-compose-plugin
sudo usermod -aG docker $USER
```

> インストール後はターミナルを再起動してグループ変更を反映する。

---

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
npm install
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

### 6. マイグレーション＆シードを実行

```bash
php artisan migrate --seed
```

初期ユーザーが作成されます：

| 項目 | 値 |
|------|----|
| メール | test@example.com |
| パスワード | password |
| ロール | sysAdmin |

### 7. フロントエンドをビルド

**本番・動作確認時（1回だけ実行）:**

```bash
npm run build
```

**開発時（ホットリロードあり）:**

```bash
npm run dev
```

### 8. 開発サーバーを起動

```bash
php artisan serve
```

ブラウザで http://localhost:8000 にアクセス。

> `npm run dev` を使う場合は、`php artisan serve` と別ターミナルで同時に起動する。

## トラブルシューティング

### `port 3306 already in use`

WSL上でMySQLが起動中。停止してからDockerを再起動：

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
