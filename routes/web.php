<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TbCarruselNoticiasController;
use App\Http\Controllers\TbCarruselPrimeroController;
use Illuminate\Http\Request;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::prefix('institucion')->group(function () {
    Route::get('mascotas', function(){
        return Inertia::render('Componentes/Institucion/mascotasPrincipal');
    });
    Route::get('products', 'AdminController@listProducts'); // Ruta sería: /admin/products 
});   

/*
ejemplo de como mandar a llamar una vista
return Inertia::render('Aqui se pone la ruta del archivo en Pages')

Route::get('/prueba', function () {
    return Inertia::render('Profile/Prueba', [
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});*/

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
/*     Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard'); */
    Route::get('/{any?}', function () {
        return Inertia::render('App');
    })->name('dashboard')->where('any','.*');


    // ---------- Rutas Home ------------
    
    //****controladores home carusel principal*******

    Route::post('/registrarBanner', [HomeController::class, 'registrarBanner']);

    Route::post('/eliminarBanner', [HomeController::class, 'eliminarBanner']);

    Route::post('/editarBanner', [HomeController::class, 'editarBanner']);

    //****controladores home carusel secundario noticias*******
    Route::post('/registrarBannerNoticias', [TbCarruselNoticiasController::class, 'registrarBanner']);

    Route::post('/eliminarBannerNoticias', [TbCarruselNoticiasController::class, 'eliminarBanner']);

    Route::post('/editarBannerNoticias', [TbCarruselNoticiasController::class, 'editarBanner']);

    //****controladores home carusel dividido primero*******

    Route::post('/registrarBannerprimero', [TbCarruselPrimeroController::class, 'registrarBanner']);

    Route::post('/eliminarBannerprimero', [TbCarruselPrimeroController::class, 'eliminarBanner']);

    Route::post('/editarBannerprimero', [TbCarruselPrimeroController::class, 'editarBanner']);
});

Route::post('/bannerData', [HomeController::class, 'bannerData']);
Route::post('/bannerDataNoticias', [TbCarruselNoticiasController::class, 'bannerData']);
Route::post('/bannerDataprimero', [TbCarruselPrimeroController::class, 'bannerData']);