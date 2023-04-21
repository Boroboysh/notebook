<?php

use App\Http\Controllers\EntryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('v1/notebook')->group(function () {
    // Получение всех записей
    Route::get('/', [EntryController::class, 'getAllEntries']);
    // Получение записи по айди
    Route::get('/{id}', [EntryController::class, 'getEntryById']);
    // Создание новой записи
    Route::post('/', [EntryController::class, 'newEntry']);
    // Редактирование записи по айди
    Route::post('/{id}', [EntryController::class, 'updateEntryById']);
    // Удаление записи по айди
    Route::delete('/{id}', [EntryController::class, 'deleteEntryById']);
});
