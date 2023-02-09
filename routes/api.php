<?php

use App\Http\Controllers\Api\GetController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Dash\AppCatController;
use App\Http\Controllers\Dash\AppController;
use App\Http\Controllers\Dash\ArticleController;
use App\Http\Controllers\Dash\AuthController;
use App\Http\Controllers\Dash\CatController;
use App\Http\Controllers\Dash\ContactController;
use App\Http\Controllers\Dash\GraphicCatController;
use App\Http\Controllers\Dash\GraphicController;
use App\Http\Controllers\Dash\InfoController;
use App\Http\Controllers\Dash\MotionCatController;
use App\Http\Controllers\Dash\MotionController;
use App\Http\Controllers\Dash\OrderController;
use App\Http\Controllers\Dash\PartnerController;
use App\Http\Controllers\Dash\ProductController;
use App\Http\Controllers\Dash\ServiceController;
use App\Http\Controllers\Dash\TeamController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('isAdmin')->get('/authenticated', function () {
    return true;
});

Route::post('/dashLogin', [AuthController::class, 'dashLogin']);
Route::post('/logout', [AuthController::class, 'logout']);

//this is the start of website apis:
Route::get('/team', [GetController::class, 'team']);
Route::get('/info', [GetController::class, 'info']);
Route::get('/services', [GetController::class, 'services']);
Route::get('/partners', [GetController::class, 'partners']);
Route::get('/articles', [GetController::class, 'articles']);
Route::get('/article/{id}', [GetController::class, 'article']);
Route::post('/contact', [PostController::class, 'contact']);
Route::post('/order', [PostController::class, 'order']);
Route::get('/apps', [GetController::class, 'apps']);
Route::get('/app/{id}', [GetController::class, 'app']);
Route::get('/products', [GetController::class, 'products']);
Route::get('/product/{id}', [GetController::class, 'product']);
Route::get('/motions', [GetController::class, 'motions']);
Route::get('/graphics', [GetController::class, 'graphics']);


// this is the start of the dashboard apis :
Route::group(['prefix' => 'dash', 'middleware' => 'isAdmin'], function () {
    // Users
    Route::get('users', [AuthController::class, 'users']);
    Route::get('user/show/{id}', [AuthController::class, 'show']);
    Route::post('user/add', [AuthController::class, 'dashRegister']);
    Route::post('user/edit/{id}', [AuthController::class, 'update']);
    Route::post('user/del/{id}', [AuthController::class, 'delUser']);

    // Info
    Route::get('/info', [InfoController::class, 'index']);
    Route::get('/all', [InfoController::class, 'all']);
    Route::post('/info/update', [InfoController::class, 'update']);

    // partners
    Route::get('/partners', [PartnerController::class, 'index']);
    Route::get('/partner/show/{id}', [PartnerController::class, 'show']);
    Route::post('/partner/store', [PartnerController::class, 'store']);
    Route::post('/partner/update/{id}', [PartnerController::class, 'update']);
    Route::post('/partner/destroy/{id}', [PartnerController::class, 'destroy']);

    // teams
    Route::get('/team', [TeamController::class, 'index']);
    Route::get('/team/show/{id}', [TeamController::class, 'show']);
    Route::post('/team/store', [TeamController::class, 'store']);
    Route::post('/team/update/{id}', [TeamController::class, 'update']);
    Route::post('/team/destroy/{id}', [TeamController::class, 'destroy']);

    // contacts
    Route::get('/contacts', [ContactController::class, 'index']);
    Route::post('/contact/destroy/{id}', [ContactController::class, 'destroy']);

    // orders
    Route::get('/orders', [OrderController::class, 'index']);
    Route::post('/order/destroy/{id}', [OrderController::class, 'destroy']);

    // services
    Route::get('/services', [ServiceController::class, 'index']);
    Route::get('/service/show/{id}', [ServiceController::class, 'show']);
    Route::post('/service/store', [ServiceController::class, 'store']);
    Route::post('/service/update/{id}', [ServiceController::class, 'update']);
    Route::post('/service/destroy/{id}', [ServiceController::class, 'destroy']);

    // articles
    Route::get('/articles', [ArticleController::class, 'index']);
    Route::get('/article/show/{id}', [ArticleController::class, 'show']);
    Route::post('/article/store', [ArticleController::class, 'store']);
    Route::post('/article/update/{id}', [ArticleController::class, 'update']);
    Route::post('/article/destroy/{id}', [ArticleController::class, 'destroy']);

    // app cats
    Route::get('/Appcats', [AppCatController::class, 'index']);
    Route::get('/Appcat/show/{id}', [AppCatController::class, 'show']);
    Route::post('/Appcat/store', [AppCatController::class, 'store']);
    Route::post('/Appcat/update/{id}', [AppCatController::class, 'update']);
    Route::post('/Appcat/destroy/{id}', [AppCatController::class, 'destroy']);

    // apps
    Route::get('/apps', [AppController::class, 'index']);
    Route::get('/app/show/{id}', [AppController::class, 'show']);
    Route::post('/app/store', [AppController::class, 'store']);
    Route::post('/app/update/{id}', [AppController::class, 'update']);
    Route::post('/app/destroy/{id}', [AppController::class, 'destroy']);

    // product cats
    Route::get('/cats', [CatController::class, 'index']);
    Route::get('/cat/show/{id}', [CatController::class, 'show']);
    Route::post('/cat/store', [CatController::class, 'store']);
    Route::post('/cat/update/{id}', [CatController::class, 'update']);
    Route::post('/cat/destroy/{id}', [CatController::class, 'destroy']);

    // products
    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/product/show/{id}', [ProductController::class, 'show']);
    Route::post('/product/store', [ProductController::class, 'store']);
    Route::post('/product/update/{id}', [ProductController::class, 'update']);
    Route::post('/product/destroy/{id}', [ProductController::class, 'destroy']);

    // motion cats
    Route::get('/motioncats', [MotionCatController::class, 'index']);
    Route::get('/motioncat/show/{id}', [MotionCatController::class, 'show']);
    Route::post('/motioncat/store', [MotionCatController::class, 'store']);
    Route::post('/motioncat/update/{id}', [MotionCatController::class, 'update']);
    Route::post('/motioncat/destroy/{id}', [MotionCatController::class, 'destroy']);

    // motions
    Route::get('/motions', [MotionController::class, 'index']);
    Route::get('/motion/show/{id}', [MotionController::class, 'show']);
    Route::post('/motion/store', [MotionController::class, 'store']);
    Route::post('/motion/update/{id}', [MotionController::class, 'update']);
    Route::post('/motion/destroy/{id}', [MotionController::class, 'destroy']);

    // graphic cats
    Route::get('/graphiccats', [GraphicCatController::class, 'index']);
    Route::get('/graphiccat/show/{id}', [GraphicCatController::class, 'show']);
    Route::post('/graphiccat/store', [GraphicCatController::class, 'store']);
    Route::post('/graphiccat/update/{id}', [GraphicCatController::class, 'update']);
    Route::post('/graphiccat/destroy/{id}', [GraphicCatController::class, 'destroy']);

    // graphics
    Route::get('/graphics', [GraphicController::class, 'index']);
    Route::get('/graphic/show/{id}', [GraphicController::class, 'show']);
    Route::post('/graphic/store', [GraphicController::class, 'store']);
    Route::post('/graphic/update/{id}', [GraphicController::class, 'update']);
    Route::post('/graphic/destroy/{id}', [GraphicController::class, 'destroy']);
});
