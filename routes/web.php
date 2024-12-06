<?php
use App\Http\Controllers\YouTubeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\TwitterController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('inicio');
});

Route::get('/about', function () {
    return view('nosotros');
});

Route::resource('cats', CategoriaController::class);
Route::resource('prods', ProductoController::class);
Route::resource('ventas', VentaController::class);



/*****************  SERVICIOS WEB  *************************/
Route::get('api/categorias', [CategoriaController::class, 'indexREST']);
Route::get('api/categorias/{id}', [CategoriaController::class, 'showREST']);
Route::post('api/categorias', [CategoriaController::class, 'storeREST']);
Route::put('api/categorias/{id}', [CategoriaController::class, 'updateREST']);
Route::delete('api/categorias/{id}', [CategoriaController::class, 'destroyREST']);


Route::get('/weather', [WeatherController::class, 'showWeather'])->name('showWeather');

Route::get('/youtube/search', [YouTubeController::class, 'search'])->name('youtube.search');

Route::get('/mapas', function () {return view('mapas.mapas');});


//Route::get('/search', [YouTubeController::class, 'search'])->name('youtube.search');

Route::get('/twitter/search', [TwitterController::class, 'searchUser'])->name('twitter.search');
