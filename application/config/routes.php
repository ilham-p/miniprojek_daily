<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'auth/login';

$route['login'] = 'auth/login';
$route['logout'] = 'admin/logout';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
