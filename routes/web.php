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
