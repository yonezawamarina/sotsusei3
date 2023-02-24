<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DogController;
use App\Models\Dog;
use App\Models\DogBreed;
use Illuminate\Http\Request;
use App\Http\Controllers\DogfoodController;

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
 Route::post('/daykcl', 'daykcl')->name('daykcl');//カロリー表示画面
 Route::post('/', 'store')->name('store'); //DBに保存
 Route::get('/{id}', 'show')->name('show'); //詳細画面
 Route::get('/{id}/edit', 'edit')->name('edit'); //編集画面
 Route::post('/{id}', 'update')->name('update'); //更新
 Route::post('/{id}/destroy', 'destroy')->name('destroy');//削除 
 });
 
 Route::prefix('dogbreed') 
 ->middleware(['auth']) // 認証
 ->name('dogbreed.')// ルート名
 ->controller(DogBreedController::class) // コントローラ指定
 ->group(function(){ // グループ化
//  Route::get('/', 'index')->name('index'); // 犬一覧 画面
 Route::get('/create', 'create')->name('create'); //犬情報入力画面
//  Route::post('/daykcl', 'daykcl')->name('daykcl');//カロリー表示画面
//  Route::post('/', 'store')->name('store'); //DBに保存
//  Route::get('/{id}', 'show')->name('show'); //詳細画面
//  Route::get('/{id}/edit', 'edit')->name('edit'); //編集画面
//  Route::post('/{id}', 'update')->name('update'); //更新
//  Route::post('/{id}/destroy', 'destroy')->name('destroy');//削除 
 });
 
 
 

 
 Route::get('/dogfoods',[DogFoodController::class,'show'])->name('dogfoods.show');
//  Route::get('chart/{chart}',[ChartController::class,'show'])->name('chart.show');



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

