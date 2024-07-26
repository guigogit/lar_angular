<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostControlador;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', [PostControlador::class, 'index']);
Route::post('/', [PostControlador::class, 'store']);
Route::delete('/{id}', [PostControlador::class, 'destroy']);
Route::get('/like/{id}', [PostControlador::class, 'like']);

