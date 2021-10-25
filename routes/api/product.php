<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\ProductsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('products')->middleware(['auth'])->group(function () {
  Route::get("/", [ProductsController::class, "index"]);
  Route::get("/{product}", [ProductsController::class, "show"]);

  Route::post("/", [ProductsController::class, "store"]);
  Route::put("/{product}", [ProductsController::class, "update"]);
  Route::delete("/{product}", [ProductsController::class, "delete"]);
});


