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
use App\Http\Controllers\MascotasController;
use App\Http\Controllers\PdfPruebaController;
use App\Http\Controllers\IgualdadLaboralPrincipalController;
use App\Http\Controllers\BannerMascotasController;
use App\Http\Controllers\BannerInstalacionesController;
use App\Http\Controllers\ConstitucionDocumentosController;
use App\Http\Controllers\BannerDirectorioController;
use App\Http\Controllers\DesarrolloHumnPrincController;
use App\Http\Controllers\DesarrolloHumnTextoController;
use App\Http\Controllers\DesarrolloHumnDesarrollosController;
use App\Http\Controllers\RepresentativoPrinController;
use App\Http\Controllers\RepresentativoTextoController;
use App\Http\Controllers\RepresentativoDeporteController;
use App\Http\Controllers\RepresentativoCulturaController;

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
use App\Http\Controllers\CarreraController;
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
    return Inertia::render('Welcome', []);
});

Route::get('/carga', function () {
    return Inertia::render('carga', []);
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
    Route::get('modelo-educativo', function () {
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
    Route::get('ubicacion', function () {
        return Inertia::render('Componentes/Institucion/location');
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

    Route::get('DesarrolloHumano', function(){
        return Inertia::render('Componentes/FormacionIntegral/desarrolloHumano');
    });

    Route::get('Representativos', function(){
        return Inertia::render('Componentes/FormacionIntegral/representativos');
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
        'Cinstalaciones' => CarruselInstalacionesController::class,
        'rectoria' => RectoriaController::class,
        'Sacademica' => SecretariaAcademicaController::class,
        'Sadministrativa' => SecretariaAdministrativaController::class,
        'AboGeneral' => AbogadoGeneralController::class,
        'DPlanneacion' => DireccionPlaneacionController::class,
        'DTecInfCom' => DireccionTecnologiaInfomacionComunicacionController::class,
        'Dvinculacion' => DireccionVinculacionController::class,
        'ubicacion' => UbicacionController::class,
        'informe' => InformeRectorController::class,
        'rectorBanner' => RectorBannerController::class,
        'rectorParrafo' => RectorParagraphsController::class,
        'educationalBanner' => EducationalBannersController::class,
        'lenguaExtraImgPrincipal' => LenguaExtraImgPrincipalController::class,
        'lenguaExtraImgSecundario' => LenguaExtraImgSecundarioController::class,
        'lenguaExtraObjetivo' => LenguaExtraObjetivosController::class,
        'Mascotas' => MascotasController::class,
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
        'representativoPrin' => RepresentativoPrinController::class,
        'representativoTexto' => RepresentativoTextoController::class,
        'representativoDeporte' => RepresentativoDeporteController::class,
        'representativoCultura' => RepresentativoCulturaController::class,

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
Route::post('/RepresentativoText/bannerData', [RepresentativoTextoController::class, 'bannerData']);
Route::post('/Representativosprin/bannerData', [RepresentativoPrinController::class, 'bannerData']);
Route::post('/RepresentativosDeporte/bannerData', [RepresentativoDeporteController::class, 'bannerData']);
Route::post('/RepresentativosCultura/bannerData', [RepresentativoCulturaController::class, 'bannerData']);

Route::post('/ConstitucionDocumentos/bannerData', [ConstitucionDocumentosController::class, 'bannerData']);
Route::post('/LeyesEstatales/bannerData', [LeyesEstatalesController::class, 'bannerData']);
Route::post('/LeyesFederales/bannerData', [LeyesFederalesController::class, 'bannerData']);
Route::post('/LeyesGenerales/bannerData', [LeyesGeneralesController::class, 'bannerData']);
Route::post('/TratadosInternacionalesDocumentos/bannerData', [TratadosInternacionalesDocumentosController::class, 'bannerData']);
Route::post('/AcuerdosDocumentos/bannerData', [AcuerdosDocumentosController::class, 'bannerData']);
Route::post('/CatalogoDocumentos/bannerData', [CatalogoDocumentosController::class, 'bannerData']);
Route::post('/CircularesDocumentos/bannerData', [CircularesDocumentosController::class, 'bannerData']);
Route::post('/CodigosDocumentos/bannerData', [CodigosDocumentosController::class, 'bannerData']);
Route::post('/ConveniosInstitucionalesDocumentos/bannerData', [ConveniosInstitucionalesDocumentosController::class, 'bannerData']);
Route::post('/DecretosDocumentos/bannerData', [DecretosDocumentosController::class, 'bannerData']);
Route::post('/LineamientosDocumentos/bannerData', [LineamientosDocumentosController::class, 'bannerData']);
Route::post('/ManualesDocumentos/bannerData', [ManualesDocumentosController::class, 'bannerData']);
Route::post('/PlanDeDesarolloInstitucionalDocumentos/bannerData', [PlanDeDesarolloInstitucionalDocumentosController::class, 'bannerData']);
Route::post('/ProtocolosDocumentos/bannerData', [ProtocolosDocumentosController::class, 'bannerData']);
Route::post('/ReglamentosDocumentos/bannerData', [ReglamentosDocumentosController::class, 'bannerData']);
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

//Ruta para obtener un solo registro de la base de datos
Route::post('/carreras-unica',[CarreraController::class,'get_carrera'])->name('carrera.unica');

//Ruta para eliminar un registro de la base de datos
Route::post('/carrera-eliminar',[CarreraController::class,'delete_carrera'])->name('carrera.eliminar');

//Ruta para editar un registro de la base de datos
Route::post('/carrera-editar',[CarreraController::class,'update_carrera'])->name('carrera.editar');
Route::post('/bannerDatatercero', [TbCarruselTercerController::class, 'bannerData']);
