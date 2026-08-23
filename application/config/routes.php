<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/* =========================================
   DEFAULT CONTROLLER
========================================= */

$route['default_controller'] = 'home';


/* =========================================
   MAIN PAGES
========================================= */

$route['home'] = 'home';

$route['about'] = 'about';

$route['services'] = 'services';

$route['notices'] = 'notices';

$route['contact'] = 'contact';


/* =========================================
   AUTHENTICATION
========================================= */

$route['login'] = 'login';

$route['register'] = 'register';

$route['forgot_password'] = 'Forgot_password';

$route['reset_password'] = 'Reset_password';




/* =========================================
   DASHBOARD
========================================= */

$route['dashboard'] = 'dashboard';


/* =========================================
   DEFAULT SETTINGS
========================================= */

$route['404_override'] = '';

$route['translate_uri_dashes'] = FALSE;