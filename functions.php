<?php

require_once( TEMPLATEPATH.'/base/theme.php' );
require_once( TEMPLATEPATH.'/base/custom/config.php' );

$theme = new Theme();
$theme->init( $theme_config );