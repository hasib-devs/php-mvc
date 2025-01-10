<?php

use Core\Authenticator;
use Core\Router;

$auth = new Authenticator();

$auth->logout();

Router::redirect('/');
