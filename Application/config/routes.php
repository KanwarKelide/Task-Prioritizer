<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
////
------------------Login routes---------------------
///
*/


$route['default_controller'] 	= 'Login';
$route['login'] 				= 'Login';
$route['verify'] 				= 'Login/login';
$route['register'] 				= 'Login/register';
$route['insert'] 				= 'Login/insert';
$route['reset'] 				= 'Login/reset';
$route['logout'] 				= 'Login/logout';


/*
////
------------------Dashboard routes----------------
///
*/



$route['dashboard']	 			= 'User/dashboard';


/*
////
------------------Task routes---------------------
///
*/

$route['add_task']	 			= 'User/addTask';
$route['insert_task'] 			= 'AddTask/insertTask';
$route['view_task']	 			= 'User/viewTask';


/*
////
------------------Visit routes---------------------
///
*/

$route['add_visit']	 			= 'User/addVisit';
$route['insert_visit'] 			= 'AddVisit/insertVisit'; 
$route['view_visit']	 		= 'User/viewVisit';

/*
////
-----------------Email routes--------------------
////
*/



$route['userprofile']			='User/profile';



$route['404_override'] 			= '';
$route['translate_uri_dashes'] 	= FALSE;
