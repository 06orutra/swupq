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
use App\Http\Controllers\SpotypoliController;
use App\Http\Controllers\SpotypoloController;
use App\Http\Controllers\MensajePoliPoloController;
use App\Http\Controllers\ImgPruebaController;
use App\Http\Controllers\CarruselMascotaController;
use App\Http\Controllers\FilosofiaController;
use App\Http\Controllers\FilosofiaImgController;
use App\Http\Controllers\FilosofiaValorController;
use App\Http\Controllers\FilosofiaImgPrincController;
use App\Http\Controllers\HistoriaImgPrincController;
use App\Http\Controllers\HistoriaTextoController;
use App\Http\Controllers\HistoriaCarruselController;
use App\Http\Controllers\VideoLenguajeController;
use App\Http\Controllers\RectoriaController;
use App\Http\Controllers\CarruselInstalacionesController;
use App\Http\Controllers\SecretariaAcademicaController;
use App\Http\Controllers\SecretariaAdministrativaController;
use App\Http\Controllers\AbogadoGeneralController;
use App\Http\Controllers\DireccionTecnologiaInfomacionComunicacionController;
use App\Http\Controllers\DireccionPlaneacionController;
use App\Http\Controllers\DireccionVinculacionController;
use App\Http\Controllers\LenguaExtraImgPrincipalController;
use App\Http\Controllers\LenguaExtraImgSecundarioController;
use App\Http\Controllers\LenguaExtraObjetivosController;
use App\Http\Controllers\PdfPruebaController;
use App\Http\Controllers\IgualdadLaboralPrincipalController;
use App\Http\Controllers\BannerMascotasController;
use App\Http\Controllers\BannerInstalacionesController;
use App\Http\Controllers\ConstitucionDocumentosController;
use App\Http\Controllers\BannerDirectorioController;
use App\Http\Controllers\DesarrolloHumnPrincController;
use App\Http\Controllers\DesarrolloHumnTextoController;
use App\Http\Controllers\DesarrolloHumnDesarrollosController;
use App\Http\Controllers\LeyesEstatalesController;
use App\Http\Controllers\LeyesFederalesController;
use App\Http\Controllers\LeyesGeneralesController;
use App\Http\Controllers\TratadosInternacionalesDocumentosController;
use App\Http\Controllers\AcuerdosDocumentosController;
use App\Http\Controllers\CatalogoDocumentosController;
use App\Http\Controllers\CircularesDocumentosController;
use App\Http\Controllers\CodigosDocumentosController;
use App\Http\Controllers\ConveniosInstitucionalesDocumentosController;
use App\Http\Controllers\DecretosDocumentosController;
use App\Http\Controllers\LineamientosDocumentosController;
use App\Http\Controllers\ManualesDocumentosController;
use App\Http\Controllers\PlanDeDesarolloInstitucionalDocumentosController;
use App\Http\Controllers\ProtocolosDocumentosController;
use App\Http\Controllers\ReglamentosDocumentosController;
use App\Http\Controllers\IgualdadLaboralTextosController;
use App\Http\Controllers\IgualdadLaboralPdfController;
use App\Http\Controllers\IgualdadLaboralImgSecundariaController;
use App\Http\Controllers\IgualdadLaboralPdfEticaController;
use App\Http\Controllers\IgualdadLaboralPdfIgualdadController;

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
    Route::get('modeloEducacional', function () {
        return Inertia::render('Componentes/Institucion/Educational');
    });
    Route::get('filosofia', function () {
        return Inertia::render('Componentes/Institucion/Philosophy');
    });
    Route::get('marcoJuridico', function(){
        return Inertia::render('Componentes/Institucion/LegalFramework');
    });
    Route::get('directorio', function(){
        return Inertia::render('Componentes/Institucion/Directorio');
    });
});   

Route::prefix('FormacionIntegral')->group(function () {

    Route::get('lenguaExtranjera', function(){
        return Inertia::render('Componentes/FormacionIntegral/lenguaExtran');
    });

    Route::get('DesarrolloHumano', function(){
        return Inertia::render('Componentes/FormacionIntegral/desarrolloHumano');
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
        'spotypoli' => SpotypoliController::class,
        'spotypolo' => SpotypoloController::class,
        'mensaje' => MensajePoliPoloController::class,
        'filosofia' => FilosofiaController::class,
        'filosofiaImg' => FilosofiaImgController::class,
        'filosofiaValor' => FilosofiaValorController::class,
        'filosofiaImgPrinc' => FilosofiaImgPrincController::class,
        'historiaImgPrinc' => HistoriaImgPrincController::class,
        'historiaTexto' => HistoriaTextoController::class,
        'historiaCarrusel' => HistoriaCarruselController::class,
        'Cinstalaciones' => CarruselInstalacionesController::class,
        'rectoria' => RectoriaController::class,
        'Sacademica' => SecretariaAcademicaController::class,
        'Sadministrativa' => SecretariaAdministrativaController::class,
        'AboGeneral' => AbogadoGeneralController::class,
        'DPlanneacion' => DireccionPlaneacionController::class,
        'DTecInfCom' => DireccionTecnologiaInfomacionComunicacionController::class,
        'Dvinculacion' => DireccionVinculacionController::class,
        'lenguaExtraImgPrincipal' => LenguaExtraImgPrincipalController::class,
        'lenguaExtraImgSecundario' => LenguaExtraImgSecundarioController::class,
        'lenguaExtraObjetivo' => LenguaExtraObjetivosController::class,
        'pdfPrueba' => PdfPruebaController::class,
        'mensaje' => MensajePoliPoloController::class,
        'spotypoli' => SpotypoliController::class,
        'spotypolo' => SpotypoloController::class,
        'Cmascotas' => CarruselMascotaController::class,
        'igualdadLaboralPrincipal' => IgualdadLaboralPrincipalController::class,
        'BannerMascotas' => BannerMascotasController::class,
        'BannerDirectorio' => BannerDirectorioController::class,
        'BannerInstalaciones' => BannerInstalacionesController::class,
        'desarrolloHumnPrinc' => DesarrolloHumnPrincController::class,
        'desarrolloHumnTexto' => DesarrolloHumnTextoController::class,
        'desarrolloHumnDesarrollos' => DesarrolloHumnDesarrollosController::class,
        'ConstitucionDocumentos' => ConstitucionDocumentosController::class,
        'LeyesEstatales' => LeyesEstatalesController::class,
        'LeyesFederales' => LeyesFederalesController::class,
        'LeyesGenerales' => LeyesGeneralesController::class,
        'TratadosInternacionalesDocumentos' => TratadosInternacionalesDocumentosController::class,
        'AcuerdosDocumentos' => AcuerdosDocumentosController::class,
        'CatalogoDocumentos' => CatalogoDocumentosController::class,
        'CircularesDocumentos' => CircularesDocumentosController::class,
        'CodigosDocumentos' => CodigosDocumentosController::class,
        'ConveniosInstitucionalesDocumentos' => ConveniosInstitucionalesDocumentosController::class,
        'DecretosDocumentos' => DecretosDocumentosController::class,
        'LineamientosDocumentos' => LineamientosDocumentosController::class,
        'ManualesDocumentos' => ManualesDocumentosController::class,
        'PlanDeDesarolloInstitucionalDocumentos' => PlanDeDesarolloInstitucionalDocumentosController::class,
        'ProtocolosDocumentos' => ProtocolosDocumentosController::class,
        'ReglamentosDocumentos' => ReglamentosDocumentosController::class,
        'IgualdadLaboralTextos' => IgualdadLaboralTextosController::class,
        'IgualdadLaboralPdf' => IgualdadLaboralPdfController::class,
        'IgualdadLaboralImgSecundaria' => IgualdadLaboralImgSecundariaController::class,
        'IgualdadLaboralPdfEtica' => IgualdadLaboralPdfEticaController::class,
        'IgualdadLaboralPdfIgualdad' => IgualdadLaboralPdfIgualdadController::class,
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

Route::post('/Sadministrativa/bannerData', [SecretariaAdministrativaController::class, 'bannerData']);
Route::post('/Sacademica/bannerData', [SecretariaAcademicaController::class, 'bannerData']);
Route::post('/rectoria/bannerData', [RectoriaController::class, 'bannerData']);
Route::post('/DTecInfCom/bannerData', [DireccionTecnologiaInfomacionComunicacionController::class, 'bannerData']);
Route::post('/AboGeneral/bannerData', [AbogadoGeneralController::class, 'bannerData']);
Route::post('/Dvinculacion/bannerData', [DireccionVinculacionController::class, 'bannerData']);
Route::post('/DPlanneacion/bannerData', [DireccionPlaneacionController::class, 'bannerData']);
Route::post('/BannerInstalaciones/bannerData', [BannerInstalacionesController::class, 'bannerData']);
Route::post('/BannerDirectorio/bannerData', [BannerDirectorioController::class, 'bannerData']);
Route::post('/BannerMascotas/bannerData', [BannerMascotasController::class, 'bannerData']);
Route::post('/CarruselInstalaciones/bannerData', [CarruselInstalacionesController::class, 'bannerData']);
Route::post('/CarruselMascota/bannerData', [CarruselMascotaController::class, 'bannerData']);
Route::post('/MensajePoliPolo/bannerData', [MensajePoliPoloController::class, 'bannerData']);
Route::post('/Spotypoli/bannerData', [SpotypoliController::class, 'bannerData']);
Route::post('/Spotypolo/bannerData', [SpotypoloController::class, 'bannerData']);
Route::post('/desarrolloHumnDesarrollo/bannerData', [DesarrolloHumnDesarrollosController::class, 'bannerData']);
Route::post('/desarrolloHumnTexto/bannerData', [DesarrolloHumnTextoController::class, 'bannerData']);
Route::post('/desarrolloHumnPrincs/bannerData', [DesarrolloHumnPrincController::class, 'bannerData']);
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
Route::post('/igualdadLaboralPrin/bannerData', [IgualdadLaboralPrincipalController::class, 'bannerData']);
Route::post('/IgualdadLaboralText/bannerData', [IgualdadLaboralTextosController::class, 'bannerData']);
Route::post('/IgualdadLaboralPdf/bannerData', [IgualdadLaboralPdfController::class, 'bannerData']);
Route::post('/IgualdadLaboralImgSecundaria/bannerData', [IgualdadLaboralImgSecundariaController::class, 'bannerData']);
Route::post('/IgualdadLaboralPdfEtica/bannerData', [IgualdadLaboralPdfEticaController::class, 'bannerData']);
Route::post('/IgualdadLaboralPdfIgualdad/bannerData', [IgualdadLaboralPdfIgualdadController::class, 'bannerData']);

// Route::post('/obtener-link', [SpotyPoliPoloController::class, 'bannerData']);

Route::post('/bannerData', [HomeController::class, 'bannerData']);
Route::post('/bannerDataNoticias', [TbCarruselNoticiasController::class, 'bannerDatafilter']);
Route::post('/bannerDataprimero', [TbCarruselPrimeroController::class, 'bannerData']);
Route::post('/bannerDatasegundo', [TbCarruselSegundoController::class, 'bannerData']);
Route::post('/bannerDatatercero', [TbCarruselTercerController::class, 'bannerData']);

