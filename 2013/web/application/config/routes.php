<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "auth/login";
$route['inscripcion'] = "convocatoria/registro/inscripcion";
$route['presupuesto'] = "presupuesto/presupuesto";
$route['administracion'] = "administracion/seguimiento";
$route['udra_registro'] = 'udra/udra_registro';
$route['segmentaciones'] = "segmentaciones/segmentaciones";
$route['udra'] = "udra/udra";
$route['convocatoria'] = "convocatoria/menu";
$route['informes'] = "informes/menu";
$route['seguimiento'] = "seguimiento/seguimiento";
$route['seleccion'] = "seleccion/menu";
$route['menu_udra'] = "udra/menu_udra";
$route['udra_reporte'] = "udra/udra_reporte";
$route['visor_de_cedulas'] = "visor/visor";
$route['caratula1'] = "visor/caratula1";
$route['capitulo1'] = "visor/capitulo1";
$route['bpr'] = "bpr/banco";
$route['consistencia/local/(:any)'] = "consistencia/consistencia/local/$1";
$route['consistencia/predio/(:any)/(:number)'] = "consistencia/consistencia/predios/$1/$2";
$route['consistencia'] = "consistencia/consistencia";
$route['ajax'] = "ajax/ajax";
$route['ajaxx'] = "ajaxx/ajax";
$route['tabulados'] = "tabulados/capitulo1/reporte_1";




$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */