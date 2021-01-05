<?php
switch( theme_options('content', 'default_layout') ){
	case 'sidebar-left': return get_template_part('template', 'sidebar-left');
	break;
	case 'full-width': return get_template_part('template', 'full-width');
	break;
	default: return get_template_part('template', 'sidebar-right');
}
