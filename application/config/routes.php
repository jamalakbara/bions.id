<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['backpanel'] = 'admin/dashboard';

//$route['reg'] = 'user/register/';
$route['reg'] = 'registration/pra';
$route['registration'] = 'registration/pra';

$route['edukasi/event'] = 'event';
$route['edukasi/event/(:any)'] = 'event/detail/$1';

$route['career'] = 'career';
$route['edukasi'] = 'edukasi';
$route['event'] = 'event';
$route['faq'] = 'edukasi/faq';
$route['home'] = 'home';
$route['ipobukalapak'] = 'ipobukalapak';
$route['learning'] = 'edukasi';
$route['message'] = 'message';
$route['offeringbuka'] = 'offeringbuka';
$route['pages'] = 'pages';
$route['pdfview'] = 'pdfview';
$route['policy'] = 'policy';
$route['tentangbions'] = 'produk';
$route['user'] = 'user';
$route['welcome'] = 'welcome';

$route['edukasi/post/(:any)'] = 'edukasi/post/$1';
$route['edukasi/saham/(:any)'] = 'edukasi/post_saham/$1';
$route['edukasi/reksadana/(:any)'] = 'edukasi/post_reksadana/$1';
$route['edukasi/fixedincome/(:any)'] = 'edukasi/post_fixedincome/$1';
$route['edukasi/video/(:any)'] = 'edukasi/post_video/$1';
$route['edukasi/marketupdate/(:any)'] = 'edukasi/post_marketupdate/$1';

$route['zoom/Aktivasi-Rekening'] = 'RedirectLink';
$route['zoloz/complete'] = 'ZolozResultBlank';
$route['zoloz/error'] = 'ZolozResultBlank';
