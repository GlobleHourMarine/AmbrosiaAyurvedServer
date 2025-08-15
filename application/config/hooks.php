<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/userguide3/general/hooks.html
|
*/

$hook['post_controller_constructor'][] = array(
    'class'    => 'DbTweaks',
    'function' => 'adjust_mysql',
    'filename' => 'DbTweaks.php',
    'filepath' => 'hooks'
);

$hook['post_controller_constructor'][] = array(
    'class'    => '',
    'function' => 'check_maintenance_mode',
    'filename' => 'maintenance_hook.php',
    'filepath' => 'hooks'
);



