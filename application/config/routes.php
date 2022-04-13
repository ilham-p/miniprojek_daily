<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'auth';

$route['login'] = 'auth';
$route['logout'] = 'api/logout';


// AJAX Endpoint
$route['api/login']['POST'] = 'api/login';

$route['api/jabatan_jobdesk']['GET'] = 'api/jabatan_jobdesk';
$route['api/karyawan']['POST'] = 'api/karyawan_submit';
$route['api/karyawan']['GET'] = 'api/karyawan';

$route['api/laporan/all']['GET'] = 'api/laporan_all';
$route['api/laporan/activity/(:num)']['POST'] = 'api/chart_activity/$1';
$route['api/laporan/status/(:any)']['GET'] = 'api/laporan_masuk/$1';
$route['api/laporan/confirm/(:any)']['POST'] = 'api/laporan_acc/$1';
$route['api/laporan']['POST'] = 'api/input_laporan_karyawan';
$route['api/laporan/(:any)']['GET'] = 'api/laporan_karyawan/$1';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
