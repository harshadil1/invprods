<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$hook['display_override'] = array(
    'class' => 'Layout',
    'function' => 'index',
    'filename' => 'layout.php',
    'filepath' => 'hooks'
);