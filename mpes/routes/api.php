<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\App;
use Stichoza\GoogleTranslate\GoogleTranslate;


/*
|-------------------ss-------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/add', [ProductController::class, 'add']);
Route::get('/getProducts', [ProductController::class, 'getProducts']);
Route::get('/searchByName/{product_name}', [ProductController::class, 'searchByName']);
Route::get('/searchByExpiry_date/{expiry_date}', [ProductController::class, 'searchByExpiry_date']);
Route::get('/searchByCategory/{category_name}', [ProductController::class, 'searchByCategory']);
Route::get('/sortingByType/{type}', [ProductController::class, 'sortingByType']);
Route::get('/showDetails/{id}', [ProductController::class, 'show']);
Route::post('/addLike/{id}', [ProductController::class, 'addLike']);
Route::get('/sortingByCategory/{category_id}', [ProductController::class, 'sortingByCategory']);
Route::get('/searchByType/{type}', [ProductController::class, 'searchByType']);
Route::post('/Register', [UserController::class, 'Register']);
Route::delete('/destroy/{id}', [ProductController::class, 'destroy']);
Route::get('/', function () {

   // return  GoogleTranslate::trans($product, 'fr');
});
/*to translate
    $source = 'es';
    $target = 'en';
    $text = 'buenos días';

    $trans = new GoogleTranslate();
    $result = $trans->translate($source, $target, $text);

    // Good morning

    echo $result;
 */
