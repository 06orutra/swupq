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
use App\Http\Controllers\NotaMascotaController;
use App\Http\Controllers\MensajeRectorController;
use App\Http\Controllers\CicloController;
use App\Http\Controllers\ModEduModalController;
use App\Http\Controllers\FilosofiaController;
use App\Http\Controllers\FilosofiaImgController;
use App\Http\Controllers\FilosofiaValorController;
use App\Http\Controllers\FilosofiaImgPrincController;
use App\Http\Controllers\HistoriaImgPrincController;
use App\Http\Controllers\HistoriaTextoController;
use App\Http\Controllers\HistoriaCarruselController;
use App\Http\Controllers\UbicacionController;
use App\Http\Controllers\InformeRectorController;
use App\Http\Controllers\RectorBannerController;
use App\Http\Controllers\RectorParagraphsController;
use App\Http\Controllers\EducationalBannersController;
use App\Http\Controllers\VideoLenguajeController;
use App\Http\Controllers\LenguaExtraImgPrincipalController;
use App\Http\Controllers\LenguaExtraImgSecundarioController;
use App\Http\Controllers\LenguaExtraObjetivosController;
use App\Http\Controllers\PdfPruebaController;
use App\Http\Controllers\MensajePoliPoloController;
use App\Http\Controllers\SpotypoliController;
use App\Http\Controllers\SpotypoloController;
use App\Http\Controllers\CarruselMascotaController;
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
    return Inertia::render('Welcome', []);
});

Route::prefix('servicios-universitarios')->group(function () {
    Route::get('/movilidad-academica', function () {
        return Inertia::render('Componentes/Servicios_Universitarios/movilidadAcademica');
    });
});
//Institución: Ordenado Alfabéticamente
Route::prefix('institucion')->group(function () {
    Route::get('filosofia', function () {
        return Inertia::render('Componentes/Institucion/Philosophy');
    });
    Route::get('mascotas', function () {
        return Inertia::render('Componentes/Institucion/mascotasPrincipal');
    });
    Route::get('laborEq', function () {
        return Inertia::render('Componentes/Institucion/Laborequality');
    });
    Route::get('instalaciones', function () {
        return Inertia::render('Componentes/Institucion/instalacionesPrincipal');
    });
    Route::get('laborEq', function () {
        return Inertia::render('Componentes/Institucion/Laborequality');
    });
    Route::get('sistemaGestion', function () {
        return Inertia::render('Componentes/Institucion/qualityManagement');
    });
    Route::get('mensajeRector', function () {
        return Inertia::render('Componentes/Institucion/rectorMessage');
    });

    Route::get('products', 'AdminController@listProducts'); // Ruta sería: /admin/products 

    Route::get('ubicacion', function () {
        return Inertia::render('Componentes/Institucion/location');
    });
    Route::get('historia', function () {
        return Inertia::render('Componentes/Institucion/Historia');
    });

    Route::get('instalaciones', function () {
        return Inertia::render('Componentes/Institucion/instalacionesPrincipal');
    });
    Route::get('mascotas', function () {
        return Inertia::render('Componentes/Institucion/mascotasPrincipal');
    });
    Route::get('/modelo-educativo', function () {
        return Inertia::render('Componentes/Institucion/Educational');
    });
    Route::get('filosofia', function () {
        return Inertia::render('Componentes/Institucion/Philosophy');
    });
    Route::get('ubicacion', function () {
        return Inertia::render('Componentes/Institucion/location');
    });
});

//¿Esto qué es xd?
Route::get('products', 'AdminController@listProducts'); // Ruta sería: /admin/products 

Route::get('marcoJuridico', function () {
    return Inertia::render('Componentes/Institucion/LegalFramework');
});
Route::get('lenguaExtranjera', function () {
    return Inertia::render('Componentes/Institucion/Foreignlanguage');
});

    Route::get('marcoJuridico', function(){
        return Inertia::render('Componentes/Institucion/LegalFramework');
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
        'Nmascota' => NotaMascotaController::class,
        'rector' => MensajeRectorController::class,
        'ciclo' => CicloController::class,
        'modalModEdu' => ModEduModalController::class,
        'filosofia' => FilosofiaController::class,
        'filosofiaImg' => FilosofiaImgController::class,
        'filosofiaValor' => FilosofiaValorController::class,
        'filosofiaImgPrinc' => FilosofiaImgPrincController::class,
        'historiaImgPrinc' => HistoriaImgPrincController::class,
        'historiaTexto' => HistoriaTextoController::class,
        'historiaCarrusel' => HistoriaCarruselController::class,
        'ubicacion' => UbicacionController::class,
        'informe' => InformeRectorController::class,
        'rectorBanner' => RectorBannerController::class,
        'rectorParrafo' => RectorParagraphsController::class,
        'educationalBanner' => EducationalBannersController::class,
        'lenguaExtraImgPrincipal' => LenguaExtraImgPrincipalController::class,
        'lenguaExtraImgSecundario' => LenguaExtraImgSecundarioController::class,
        'lenguaExtraObjetivo' => LenguaExtraObjetivosController::class,
        'pdfPrueba' => PdfPruebaController::class,
        'mensaje' => MensajePoliPoloController::class,
        'spotypoli' => SpotypoliController::class,
        'spotypolo' => SpotypoloController::class,
        'Cmascotas' => CarruselMascotaController::class,
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

//Ruta de modelo educativo
Route::post('/modeduCiclo/bannerData', [CicloController::class, 'bannerData']);

//Rutas por defecto?
Route::post('/historiaCarrusels/bannerData', [HistoriaCarruselController::class, 'bannerData']);
Route::post('/historiaTextos/bannerData', [HistoriaTextoController::class, 'bannerData']);
Route::post('/historiaImgPrinc/bannerData', [HistoriaImgPrincController::class, 'bannerData']);
Route::post('/filosofiaImgPrinc/bannerData', [FilosofiaImgPrincController::class, 'bannerData']);
Route::post('/filosofiaVal/bannerData', [FilosofiaValorController::class, 'bannerData']);
Route::post('/filosofiaImg/bannerData', [FilosofiaImgController::class, 'bannerData']);
Route::post('/filosofias/bannerData', [FilosofiaController::class, 'bannerData']);
Route::post('/videolenguajes', [ VideoLenguajeController::class, 'bannerData']);
// Route::post('/obtener-link', [SpotyPoliPoloController::class, 'bannerData']);

Route::post('/bannerData', [HomeController::class, 'bannerData']);
Route::post('/bannerDataNoticias', [TbCarruselNoticiasController::class, 'bannerDatafilter']);
Route::post('/bannerDataprimero', [TbCarruselPrimeroController::class, 'bannerData']);
Route::post('/bannerDatasegundo', [TbCarruselSegundoController::class, 'bannerData']);
Route::post('/bannerDatatercero', [TbCarruselTercerController::class, 'bannerData']);
