<?php

function remove_media_library_tab($tabs) {
    if (isset($_REQUEST['theme_upload'])) {
    	unset($tabs['type_url']);
   	}
    return $tabs;
}
add_filter('media_upload_tabs', 'remove_media_library_tab');