<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DogController;
use App\Models\Dog;
use App\Models\DogBreed;
use Illuminate\Http\Request;
use App\Http\Controllers\DogfoodController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LineMessengerController;//LINE連携


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::prefix('dogs') 
 ->middleware(['auth']) // 認証
 ->name('dogs.')// ルート名
 ->controller(DogController::class) // コントローラ指定
 ->group(function(){ // グループ化
 Route::get('/', 'index')->name('index'); // 犬一覧 画面
 Route::get('/create', 'create')->name('create'); //犬情報入力画面
 Route::post('/', 'store')->name('store'); //DBに保存
 Route::get('/{id}', 'show')->name('show'); //詳細画面
 Route::get('/{id}/edit', 'edit')->name('edit'); //編集画面
 Route::post('/{id}', 'update')->name('update'); //更新
 Route::post('/{id}/destroy', 'destroy')->name('destroy');//削除
 Route::post('/{id}/chart', 'chart')->name('chart'); //グラフ
 Route::get('/{id}/chart', 'chart')->name('chart'); //グラフ
 
 });
 
 

 
 Route::prefix('category') 
 ->middleware(['auth']) // 認証
 ->name('category.')// ルート名
 ->controller(CategoryController::class) // コントローラ指定
 ->group(function(){ // グループ化
 Route::get('/', 'index')->name('index');//カテゴリー一覧
//  Route::get('/{id}', 'show')->name('show');//レシピ一覧
//  Route::get('/{id}/gorecipe', 'gorecipe')->name('gorecipe');//レシピ詳細
 Route::get('/{id}/chartall', 'chartall')->name('chartall');//合計グラフ
 });
 
 
 
 Route::prefix('recipes') 
 ->middleware(['auth']) // 認証
 ->name('recipes.')// ルート名
 ->controller(RecipeController::class) // コントローラ指定
 ->group(function(){ // グループ化
 Route::get('/', 'index')->name('index');//レシピ一覧
 Route::get('/{id}', 'show')->name('show');//レシピ詳細
 Route::get('/{id}/gorecipe', 'gorecipe')->name('gorecipe');//レシピ選択
//  Route::get('/{id}/chartall', 'chartall')->name('chartall');//合計グラフ
Route::post('/save-intake', function() {
  session(['intake' => request()->input('intake')]);
});
 });
 
 
 
 
 //LINE連携
 Route::get('/linelogin', [LineLoginController::class, 'linelogin'])->name('linelogin');
Route::get('/callback', [LineLoginController::class, 'callback'])->name('callback');
 Route::get('/line/webhook', [LineMessengerController::class, 'webhook'])->name('line.webhook');// LINE メッセージ受信
 Route::get('/line/message', [LineMessengerController::class, 'message']);// LINE メッセージ送信用
 
 
 
 
 

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

