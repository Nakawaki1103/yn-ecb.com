# API理解メモ

## APIとは

外部サービスからJSONでデータを送受信する仕組み。
ブラウザのフォーム送信と仕組みは同じで、HTMLの画面がなくJSONでやりとりする点が違う。

```
外部サービス（SUUMO等）          このサーバー（Laravel）
        |                               |
        |  POST /api/notices            |
        |  {                            |
        |    "name": "山田太郎",  -----> |  受け取って
        |    "tel": "090-xxxx",         |  noticesテーブルに保存
        |    "title": "問い合わせ",      |
        |    "body": "..."              |
        |  }                            |
        |                               |
        | ← 200 OK                      |
```

## Laravelでの構成

```
リクエスト
  ↓
routes/api.php        ← APIのルート定義（web.phpとは別ファイル）
  ↓
NoticeController      ← リクエストを受け取ってLogicに渡す
  ↓
NoticeLogic           ← バリデーション・加工
  ↓
NoticeRepository      ← DBに保存
  ↓
Notice（Model）        ← noticesテーブルのオブジェクト
```

## 作るファイル一覧

| ファイル | 役割 |
|---------|------|
| `routes/api.php` | URLとControllerを紐付ける |
| `app/Http/Controllers/NoticeController.php` | リクエストを受け取る |
| `app/Logic/NoticeLogic.php` | ビジネスロジック |
| `app/Repositories/NoticeRepository.php` | DB保存 |
| `app/Models/Notice.php` | Noticeモデル |

## データの流れ

```
1. POST /api/notices にリクエストが来る
2. NoticeController がリクエストを受け取る
3. NoticeLogic に渡してバリデーション
4. NoticeRepository に渡してDBに保存
5. NoticeController が 200 OK を返す
```

## レスポンスを返すのは誰か

`NoticeController` が返す。Controllerはリクエストの入口でもありレスポンスの出口でもある。

```php
return response()->json(['message' => 'ok'], 200);
```
