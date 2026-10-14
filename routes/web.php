<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\InovasiController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\Admin\AduanController;
use App\Http\Controllers\Admin\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\PasswordResetLinkController as AdminPasswordResetLinkController;
use App\Http\Controllers\Admin\Auth\NewPasswordController as AdminNewPasswordController;
use App\Http\Controllers\GeminiChatController;
use App\Http\Controllers\Admin\LayananContentController;
use App\Http\Controllers\admin\BannerController;


//RUTE PUBLIK
Route::get('/', [HomeController::class, 'index'])->name('landing');
Route::get('/layanan-informasi', [FaqController::class, 'index'])->name('faq.index');
Route::post('/chatbot/chat', [GeminiChatController::class, 'generateContent'])->name('chatbot.generate');

//RUTE LAYANAN
Route::prefix('layanan')->name('layanan.')->group(function () {
    Route::get('/spkt', [LayananController::class, 'spkt'])->name('spkt');
    Route::post('/aduan', [LayananController::class, 'storeAduan'])->name('aduan.store');
    Route::get('/pengaduan', [LayananController::class, 'pengaduan'])->name('pengaduan');
    Route::get('/bpkb-stnk', [LayananController::class, 'bpkbStnk'])->name('bpkb_stnk');
    Route::get('/izin-keramaian', [LayananController::class, 'izinKeramaian'])->name('izin_keramaian');
    Route::get('/pengawalan', [LayananController::class, 'pengawalan'])->name('pengawalan');
    Route::get('/besuk-tahanan', [LayananController::class, 'besukTahanan'])->name('besuk_tahanan');
    Route::get('/sidik-jari', [LayananController::class, 'sidikJari'])->name('sidik_jari');
    Route::get('/sp2hp', [LayananController::class, 'sp2hp'])->name('sp2hp');
    Route::get('/sim', [LayananController::class, 'sim'])->name('sim');
    Route::get('/skck', [LayananController::class, 'skck'])->name('skck');
});

//RUTE PROFIL
Route::get('/profil-publik', [ProfilController::class, 'showPublicProfil'])->name('profil.publik');
Route::prefix('profil')->name('profil.')->group(function () {
    // Rute ini akan menangani /profil/bagops, /profil/bagsdm, dll.
    Route::get('/{page}', [ProfilController::class, 'showSatuan'])->name('satuan');
});

//RUTE DETAIL SATUAN KERJA
Route::prefix('profil')->name('profil.')->group(function () {
    Route::get('/bagops', [ProfilController::class, 'bagops'])->name('bagops');
    Route::get('/bagsdm', [ProfilController::class, 'bagsdm'])->name('bagsdm');
    Route::get('/bagren', [ProfilController::class, 'bagren'])->name('bagren');
    Route::get('/baglog', [ProfilController::class, 'baglog'])->name('baglog');
    Route::get('/satintelkam', [ProfilController::class, 'satintelkam'])->name('satintelkam');
    Route::get('/satreskrim', [ProfilController::class, 'satreskrim'])->name('satreskrim');
    Route::get('/satresnarkoba', [ProfilController::class, 'satresnarkoba'])->name('satresnarkoba');
    Route::get('/satsamapta', [ProfilController::class, 'satsamapta'])->name('satsamapta');
    Route::get('/satlantas', [ProfilController::class, 'satlantas'])->name('satlantas');
    Route::get('/satpamobvit', [ProfilController::class, 'satpamobvit'])->name('satpamobvit');
    Route::get('/satpolairud', [ProfilController::class, 'satpolairud'])->name('satpolairud');
    Route::get('/sattahti', [ProfilController::class, 'sattahti'])->name('sattahti');
    Route::get('/siwas', [ProfilController::class, 'siwas'])->name('siwas');
    Route::get('/sipropam', [ProfilController::class, 'sipropam'])->name('sipropam');
    Route::get('/sihumas', [ProfilController::class, 'sihumas'])->name('sihumas');
    Route::get('/sikum', [ProfilController::class, 'sikum'])->name('sikum');
    Route::get('/sitik', [ProfilController::class, 'sitik'])->name('sitik');
    Route::get('/sium', [ProfilController::class, 'sium'])->name('sium');
    Route::get('/sikeu', [ProfilController::class, 'sikeu'])->name('sikeu');
    Route::get('/sidokkes', [ProfilController::class, 'sidokkes'])->name('sidokkes');
    Route::get('/spkt', [ProfilController::class, 'spkt'])->name('spkt');
});

Route::prefix('inovasi')->name('inovasi.')->group(function () {
    Route::get('/', [InovasiController::class, 'index'])->name('index');
    Route::get('/pos-digital-astuti', [InovasiController::class, 'posDigitalAstuti'])->name('pos_digital_astuti');
    Route::get('/sim-ceria', [InovasiController::class, 'simCeria'])->name('sim_ceria');
    Route::get('/sim-astuti', [InovasiController::class, 'simAstuti'])->name('sim_astuti');
    Route::get('/astuti-mobile', [InovasiController::class, 'astutiMobile'])->name('astuti_mobile');
    Route::get('/tacs', [InovasiController::class, 'tacs'])->name('tacs');
    Route::get('/tar', [InovasiController::class, 'tar'])->name('tar');
    Route::get('/mobil-senyum', [InovasiController::class, 'mobilSenyum'])->name('mobil_senyum');
});

//RUTE ADMIN
Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
        Route::post('/login', [AuthenticatedSessionController::class, 'store']);
        Route::post('/forgot-password', [AdminPasswordResetLinkController::class, 'store'])->name('password.email');
        Route::get('reset-password/{token}', [AdminNewPasswordController::class, 'create'])->name('password.reset');
        Route::post('reset-password', [AdminNewPasswordController::class, 'store'])->name('password.store');
    });

    Route::middleware('auth')->group(function () {
        Route::get('/login/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
        Route::resource('layanan-content', LayananContentController::class);
        Route::resource('beritas', BeritaController::class);
        Route::resource('galleries', GalleryController::class);
        Route::get('aduan', [AduanController::class, 'index'])->name('aduan.index');
        Route::get('aduan/map', [AduanController::class, 'map'])->name('aduan.map');
        Route::get('aduan/{aduan}', [AduanController::class, 'show'])->name('aduan.show');
        Route::delete('aduan/{aduan}', [AduanController::class, 'destroy'])->name('aduan.destroy');
        Route::patch('aduan/{aduan}/status', [AduanController::class, 'updateStatus'])->name('aduan.updateStatus');
        Route::get('/banner', [BannerController::class, 'index'])->name('banner.index');
        Route::post('/banner', [BannerController::class, 'storeOrUpdate'])->name('banner.store');
        Route::delete('/banner', [BannerController::class, 'destroy'])->name('banner.destroy');
    });
});
