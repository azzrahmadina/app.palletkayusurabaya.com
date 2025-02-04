<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BpjsController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\GasController;
use App\Http\Controllers\HPController;
use App\Http\Controllers\InternetController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\MultiController;
use App\Http\Controllers\PaketDataController;
use App\Http\Controllers\PbbController;
use App\Http\Controllers\PdamController;
use App\Http\Controllers\PlnController;
use App\Http\Controllers\PulsaController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\TokenListrikController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\WalletController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLoginForm']);
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');

Route::get('/register', [AuthController::class, 'showRegisterForm']);
Route::post('/register', [AuthController::class, 'register'])->name('auth.register');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Auth::routes([
    'register' => false,
    'login' => false,

]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/layanan', [LayananController::class, 'index'])->name('layanan');

    Route::resource('layanan/pulsa', PulsaController::class);
    Route::post('layanan/pulsa/transaction', [PulsaController::class, 'transaction'])->name('pulsa.transaction');

    Route::resource('layanan/paket', PaketDataController::class);
    Route::post('layanan/paket/transaction', [PaketDataController::class, 'transaction'])->name('paket.transaction');

    Route::resource('layanan/token', TokenListrikController::class);
    Route::post('layanan/token/transaction', [TokenListrikController::class, 'transaction'])->name('token.transaction');

    Route::resource('layanan/pln', PlnController::class);
    Route::post('layanan/pln/transaction', [PlnController::class, 'transaction'])->name('pln.transaction');

    Route::resource('layanan/e-wallet', WalletController::class);
    Route::post('layanan/e-wallet/transaction', [WalletController::class, 'transaction'])->name('wallet.transaction');

    Route::resource('layanan/pdam', PdamController::class);
    Route::post('layanan/pdam/transaction', [PdamController::class, 'transaction'])->name('pdam.transaction');

    Route::resource('layanan/gas', GasController::class);
    Route::post('layanan/gas/transaction', [GasController::class, 'transaction'])->name('gas.transaction');

    Route::resource('layanan/pbb', PbbController::class);
    Route::post('layanan/pbb/transaction', [PbbController::class, 'transaction'])->name('pbb.transaction');

    Route::resource('layanan/bpjs', BpjsController::class);
    Route::post('layanan/bpjs/transaction', [bpjsController::class, 'transaction'])->name('bpjs.transaction');

    Route::resource('layanan/internet', InternetController::class);
    Route::post('layanan/internet/transaction', [InternetController::class, 'transaction'])->name('internet.transaction');

    Route::resource('layanan/hp', HPController::class);
    Route::post('layanan/hp/transaction', [HPController::class, 'transaction'])->name('hp.transaction');

    Route::resource('layanan/multi', MultiController::class);
    Route::post('layanan/multi/transaction', [MultiController::class, 'transaction'])->name('multi.transaction');

    Route::resource('layanan/game', GameController::class);
    Route::post('layanan/game/transaction', [GameController::class, 'transaction'])->name('game.transaction');

    Route::resource('layanan/voucher', VoucherController::class);
    Route::post('layanan/voucher/transaction', [VoucherController::class, 'transaction'])->name('voucher.transaction');

    Route::resource('riwayat', RiwayatController::class);
    Route::post('/riwayat/detail', [RiwayatController::class, 'detail']);
});
