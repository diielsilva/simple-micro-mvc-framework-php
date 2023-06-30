<?php

require_once '../app/config/constants.php';
require_once '../app/config/autoload.php';

Router::route(new LoginMiddleware('UserController', 'index', ['DashboardController']));
