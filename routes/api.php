<?php

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\V1\PostController as Postv1;
use App\Http\Controllers\Api\V2\PostController as Postv2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('v1/posts', Postv1::class)->only(['index', 'show', 'destroy']);

Route::apiResource('v2/posts', Postv2::class)
    ->only(['index', 'show'])
    ->middleware('auth:sanctum');

Route::post('login', [LoginController::class, 'login']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
