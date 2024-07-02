<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::view("/", "index")->name("index");

Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);

    return redirect()->back();
})->name('change_locale');

Route::group(['middleware' => 'web'], function () {
    Route::post('/destroy-session', [MainController::class, 'destroySession'])->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
});

Route::post('/save-visit-count', [MainController::class, 'saveVisitCount'])->name('visit-count');
Route::post('/save-click-count', [MainController::class, 'saveClickCount'])->name('click-count');
Route::get('/wa-wording', [MainController::class, 'getWaWording'])->name('get-wa-wording');

