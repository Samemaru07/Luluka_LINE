## 必要なパッケージのインストールおよび設定手順

### 1. パッケージのインストール

`sudo pacman -S php php-sqlite composer sqlite ca-certificates`

### 2. PHP の設定

`/etc/php/php.ini` を編集し、`;` を外し拡張を有効化

```ini
extension=curl
extension=openssl
extension=pdo_sqlite
extension=sqlite3
```

> `extension=openssl` は OpenSSL 拡張がデフォルトで組込まれている場合があり、存在しない可能性がある。

### 3. インストール・動作確認

設定が正しく反映されているか確認する。

```bash
# バージョン確認
php -v
composer --version


# 必要な拡張モジュールが読み込まれているか確認
php -m | grep -E "curl|openssl|pdo_sqlite|sqlite3"
```

## 開発手順

### 1. リポジトリをclone

### 2. 依存ライブラリのインストール

```bash
composer install
```
