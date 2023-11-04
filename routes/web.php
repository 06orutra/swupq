<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TbCarruselNoticiasController;
use App\Http\Controllers\TbCarruselPrimeroController;
use App\Http\Controllers\TbCarruselSegundoController;
use App\Http\Controllers\TbCarruselTercerController;
use App\Http\Controllers\TextoPruebaController;
use App\Http\Controllers\ImgPruebaController;
use App\Http\Controllers\FilosofiaController;
use App\Http\Controllers\FilosofiaImgController;
use App\Http\Controllers\FilosofiaValorController;
use App\Http\Controllers\FilosofiaImgPrincController;
use App\Http\Controllers\HistoriaImgPrincController;
use App\Http\Controllers\HistoriaTextoController;
use App\Http\Controllers\HistoriaCarruselController;
use App\Http\Controllers\VideoLenguajeController;
use App\Http\Controllers\LenguaExtraImgPrincipalController;
use App\Http\Controllers\LenguaExtraImgSecundarioController;
use App\Http\Controllers\LenguaExtraObjetivosController;
use App\Http\Controllers\PdfPruebaController;

use App\Http\Controllers\CarreraController;

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

    ]);
});

Route::prefix('institucion')->group(function () {
    Route::get('mascotas', function () {
        return Inertia::render('Componentes/Institucion/mascotasPrincipal');
    });

    Route::get('messageRector', function () {
        return Inertia::render('Componentes/Institucion/rectorMessage');
    });

    Route::get('laborEq', function () {
        return Inertia::render('Componentes/Institucion/Laborequality');
    });
    Route::get('instalaciones', function(){
        return Inertia::render('Componentes/Institucion/instalacionesPrincipal');
    });
    
    Route::get('products', 'AdminController@listProducts'); // Ruta sería: /admin/products 

    Route::get('ubicacion', function(){
        return Inertia::render('Componentes/Institucion/location');
    });
    Route::get('historia', function(){
        return Inertia::render('Componentes/Institucion/Historia');
    });
    Route::get('modeloEducacional', function(){
        return Inertia::render('Componentes/Institucion/Educational');
    });
    Route::get('filosofia', function(){
        return Inertia::render('Componentes/Institucion/Philosophy');
    });
    Route::get('marcoJuridico', function(){
        return Inertia::render('Componentes/Institucion/LegalFramework');
    });
});   

Route::prefix('FormacionIntegral')->group(function () {

    Route::get('lenguaExtranjera', function(){
        return Inertia::render('Componentes/FormacionIntegral/lenguaExtran');
    });
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
    })->name('dashboard')->where('any', '.*');


    // ---------- Rutas Home ------------

    $controllers = [
        'home' => HomeController::class,
        'videoLenguaje' => VideoLenguajeController::class,
        'noticias' => TbCarruselNoticiasController::class,
        'primero' => TbCarruselPrimeroController::class,
        'segundo' => TbCarruselSegundoController::class,
        'tercer' => TbCarruselTercerController::class,
        'texto' => TextoPruebaController::class,
        'img' => ImgPruebaController::class,
        'filosofia' => FilosofiaController::class,
        'filosofiaImg' => FilosofiaImgController::class,
        'filosofiaValor' => FilosofiaValorController::class,
        'filosofiaImgPrinc' => FilosofiaImgPrincController::class,
        'historiaImgPrinc' => HistoriaImgPrincController::class,
        'historiaTexto' => HistoriaTextoController::class,
        'historiaCarrusel' => HistoriaCarruselController::class,
        'lenguaExtraImgPrincipal' => LenguaExtraImgPrincipalController::class,
        'lenguaExtraImgSecundario' => LenguaExtraImgSecundarioController::class,
        'lenguaExtraObjetivo' => LenguaExtraObjetivosController::class,
        'pdfPrueba' => PdfPruebaController::class,
    ];
    // se declarar variables, 

    foreach ($controllers as $prefix => $controller) {
        Route::prefix($prefix)->group(function () use ($controller) {
            Route::post('bannerData', [$controller, 'bannerData']);
            Route::post('registrarBanner', [$controller, 'registrarBanner']);
            Route::post('eliminarBanner', [$controller, 'eliminarBanner']);
            Route::post('editarBanner', [$controller, 'editarBanner']);
        });
    }
});
Route::post('/pdfPrueba/bannerData', [PdfPruebaController::class, 'bannerData']);
Route::post('/lenguaExtraObjetivo/bannerData', [LenguaExtraObjetivosController::class, 'bannerData']);
Route::post('/lenguaExtraImgSecundario/bannerData', [LenguaExtraImgSecundarioController::class, 'bannerData']);
Route::post('/lenguaExtraImgPrincipal/bannerData', [LenguaExtraImgPrincipalController::class, 'bannerData']);
Route::post('/historiaCarrusels/bannerData', [HistoriaCarruselController::class, 'bannerData']);
Route::post('/historiaTextos/bannerData', [HistoriaTextoController::class, 'bannerData']);
Route::post('/historiaImgPrinc/bannerData', [HistoriaImgPrincController::class, 'bannerData']);
Route::post('/filosofiaImgPrinc/bannerData', [FilosofiaImgPrincController::class, 'bannerData']);
Route::post('/filosofiaVal/bannerData', [FilosofiaValorController::class, 'bannerData']);
Route::post('/filosofiaImg/bannerData', [FilosofiaImgController::class, 'bannerData']);
Route::post('/filosofias/bannerData', [FilosofiaController::class, 'bannerData']);
Route::post('/videolenguajes', [ VideoLenguajeController::class, 'bannerData']);
Route::post('/bannerData', [HomeController::class, 'bannerData']);
Route::post('/bannerDataNoticias', [TbCarruselNoticiasController::class, 'bannerDatafilter']);
Route::post('/bannerDataprimero', [TbCarruselPrimeroController::class, 'bannerData']);
Route::post('/bannerDatasegundo', [TbCarruselSegundoController::class, 'bannerData']);
Route::post('/bannerDatatercero', [TbCarruselTercerController::class, 'bannerData']);



/* rutas para el apartado de carreras*/
// Ruta para mostrar el json de los archivos subidos
Route::get('data', [CarreraController::class, 'index']) -> name('data');

//Ruta para mostrar el formulario de carreras
Route::get('carrera', [CarreraController::class, 'myform']) -> name('carrera');
//Ruta para subir el formulario de carreras
Route::post('/carrera-insertar', [CarreraController::class, 'store']);

//Ruta para actualizar el formulario de carreras
Route::get('carrera/{id}/edit', [CarreraController::class, 'edit']) -> name('carrera.edit');

//Ruta para actualizar el formulario de carreras
Route::put('carrera/{id}', [CarreraController::class, 'update']) -> name('carrera.update');

//Ruta para eliminar el formulario de carreras
Route::delete('carrera/{id}', [CarreraController::class, 'destroy']) -> name('carrera.destroy');

//ruta de insercion de prueba
Route::post('/carrera-prueba', [CarreraController::class, 'guardar'])->name('carrera.prueba');

//ruta para obtener las carreras disponibles
Route::post('/carreras-disponibles', [CarreraController::class, 'get_carreras_disponibles'])->name('carrera.disponibles');