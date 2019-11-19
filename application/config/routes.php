<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
$route['default_controller'] = 'auth';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

# custom routes

// election routes
$route['admin/elections'] = 'Admin/election';
$route['admin/election/(:num)/details'] = 'admin/election/detail/$1';
$route['admin/election/(:num)/delete'] = 'admin/election/delete/$1';
$route['admin/election/(:num)/edit'] = 'admin/election/edit/$1';
$route['admin/election/(:num)/stats'] = 'admin/election/stats/$1';
$route['admin/election/(:num)/report'] = 'admin/election/report/$1';
$route['admin/election/(:num)/export'] = 'admin/election/export/$1';
$route['admin/elections/export'] = 'admin/election/export';
$route['admin/elections/histories'] = 'admin/election/histories';

// candidate routes
$route['admin/candidates'] = 'admin/candidate';
$route['admin/candidate/(:num)/details'] = 'admin/candidate/detail/$1';
$route['admin/candidate/(:num)/delete'] = 'admin/candidate/delete/$1';
$route['admin/candidate/(:num)/edit'] = 'admin/candidate/edit/$1';
$route['admin/candidate/(:num)/export'] = 'admin/candidate/export/$1';
$route['admin/candidates/export'] = 'admin/candidate/export';

// user routes
$route['admin/users'] = 'admin/user';
$route['admin/user/create'] = 'admin/user/create';
$route['admin/user/(:num)'] = 'admin/user/detail/$1';
$route['admin/user/(:num)/details'] = 'admin/user/detail/$1';
$route['admin/user/(:num)/edit'] = 'admin/user/edit/$1';
$route['admin/user/(:num)/delete'] = 'admin/user/delete/$1';
