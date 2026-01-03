<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SihooController;

           // 주소  // SihooController class의  // ~ 함수 실행 -> 그리고 그 함수에 별명 붙이기             
Route::post('store', [SihooController::class, 'store'])->name('store');
Route::get('/', [SihooController::class, 'print'])->name('print');
Route::post('destroy/{id}', [SihooController::class, 'destroy'])->name('destroy');