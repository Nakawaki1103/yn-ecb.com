# システム概要

## 背景

田中工務店グループは関東に5店舗を持つ注文住宅会社。
各店舗がSUUMO・HOME'Sなどのポータルサイトと自社LPで集客している。

問い合わせが入ると各ポータルからメールが届くが、現状は店舗ごとにそのメールを見て対応しているだけ。

## 課題

- どの問い合わせが対応済みか共有できない
- 複数ポータルから同じ人が問い合わせてきても気づけない
- 店長は自分の店舗の状況を把握したいが、メールを全部見るしかない
- 本部は全店舗の問い合わせ数を把握できていない

## 解決したいこと

各店舗の問い合わせを一画面で管理・検索・確認できるシステム

---

## システム全体図

```mermaid
flowchart TD
    subgraph portals["集客チャネル（外部）"]
        SUUMO
        HOMES["HOME'S"]
        LP["自社LP"]
    end

    subgraph ecb["ECB - 反響管理システム"]
        direction TB
        INBOX["反響受信・一覧"]
        STATUS["ステータス管理\n未対応 / 対応中 / 対応済"]
        SEARCH["検索・絞り込み"]
    end

    subgraph users["利用者"]
        MEMBER["member（スタッフ）\n自店舗の反響を閲覧"]
        ADMIN["admin（店長）\n自店舗の反響＋スタッフ管理"]
        SYSADMIN["sysAdmin（本部）\n全店舗の管理・集計"]
    end

    SUUMO -->|メール通知| INBOX
    HOMES  -->|メール通知| INBOX
    LP     -->|フォーム送信| INBOX

    INBOX --> STATUS
    INBOX --> SEARCH

    STATUS --> MEMBER
    STATUS --> ADMIN
    STATUS --> SYSADMIN
```
