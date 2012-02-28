<?php

define('WWW_DIR',	dirname(__FILE__));
define('APP_DIR',	WWW_DIR . '/../app');
define('LIBS_DIR',	WWW_DIR . '/../libs');

// uncomment this line if you must temporarily take down your site for maintenance
//require APP_DIR . '/templates/maintenance.phtml';

require APP_DIR . '/bootstrap.php';
