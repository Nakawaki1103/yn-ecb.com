# TODO

## 設計フェーズ
- [x] システム概要・課題整理
- [x] 機能一覧・ロール定義
- [x] DB設計
- [x] アーキテクチャ設計
- [x] インフラ構成

## 環境構築フェーズ
- [ ] Laravelプロジェクト作成
- [ ] Docker環境構築（ローカル開発用）
- [ ] AWSリソース作成（VPC / EC2 / RDS）
- [ ] Nginx設定
- [ ] Laravelデプロイ（手動）

## 実装フェーズ
- [x] マイグレーション作成（offices / users / notices / mail_logs）
- [ ] 認証機能（ログイン・ログアウト）
- [ ] ロール制御（member / admin / sysAdmin）
- [ ] 反響一覧・詳細画面
- [ ] ステータス変更機能
- [ ] メール送信・受信履歴機能
- [ ] スタッフ管理機能（admin）
- [ ] 店舗管理機能（sysAdmin）

## できればやる
- [ ] GitHub ActionsでCI/CDパイプライン構築
- [ ] SQSを使ったメール送信の非同期処理
- [ ] Lambda / API Gateway
- [ ] CloudWatchでのログ監視
