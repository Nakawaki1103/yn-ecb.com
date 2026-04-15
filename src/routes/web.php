<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// ログイン済み全員（member以上）
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // 反響一覧・詳細（未実装）
});

// admin以上
Route::middleware(['auth', 'role:admin'])->group(function () {
    // ステータス変更・メール送信・スタッフ管理（未実装）
});

// sysAdminのみ
Route::middleware(['auth', 'role:sysAdmin'])->group(function () {
    // 店舗管理（未実装）
});

require __DIR__.'/auth.php';
