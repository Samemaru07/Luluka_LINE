<?php

// データベースファイルの保存先パスを定義
$dbDir = __DIR__."/../data";
$dbPath = $dbDir."/bot.db";

// データベース格納用ディレクトリが存在しない場合は作成
if (! is_dir($dbDir)) {
    mkdir($dbDir, 0755, true);
}

try {
    // SQLiteデータベースへの接続を確立
    $pdo = new PDO("sqlite:".$dbPath);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 作成するテーブル名の配列
    $tables = [
        "late_message",
        "soon_message",
        "love_message",
        "imissyou_message",
    ];

    // 各テーブルの作成処理
    foreach ($tables as $table) {
        $pdo->exec("DROP TABLE IF EXISTS {$table}");
        $pdo->exec("CREATE TABLE {$table} (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            text TEXT NOT NULL
            )");
    }
} catch (PDOException $e) {
    echo "Database error: ".$e->getMessage()."\n";
    exit(1);
}
