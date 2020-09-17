<?php
defined('BASEPATH') or exit('No direct script access allowed');

//API
$route['api/users']['GET']              = 'UserController/get_all';
$route['api/user/(:num)']['GET']        = 'UserController/get/$1';
$route['api/save']['POST']              = 'UserController/save';
$route['api/user/(:num)']['PUT']        = 'UserController/update/$1';
$route['api/user/(:num)']['DELETE']     = 'UserController/delete/$1';


$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
