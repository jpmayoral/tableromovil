<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/* Config general titles */

$config['recordListTitle']=' Listado de playlist';
$config['recordAddTitle']=' Nuevo playlist';
$config['recordEditTitle']=' Editar playlist';
$config['accessTitle']='<div class="accessTitle"> No tienes permiso para realizar esta operaci&oacute;n </div>';

/* Config labels of the form fields */

$config['playlist_id']='playlist_id';
$config['playlist_descripcion']='playlist_descripcion';
$config['usuarios_id']='usuarios_id';
$config['playlist_created_at']='playlist_created_at';
$config['playlist_updated_at']='playlist_updated_at';

/* Config fields for search */

$config['search_by_playlist_id']= 1;
$config['search_by_playlist_descripcion']= 0;
$config['search_by_usuarios_id']= 0;
$config['search_by_playlist_created_at']= 0;
$config['search_by_playlist_updated_at']= 0;

/* Config fields for show in the result list */

$config['show_playlist_id']= 1;
$config['show_playlist_descripcion']= 1;
$config['show_usuarios_id']= 1;
$config['show_playlist_created_at']= 1;
$config['show_playlist_updated_at']= 1;

/* Config params of pagination */

$config['pag_perpage']= 4;

/* Config flash messages */

$config['playlist_flash_add_message']= 'The playlist has been successfully added.';
$config['playlist_flash_edit_message']= 'The playlist has been successfully updated.';
$config['playlist_flash_delete_message']= 'The playlist has been successfully deleted';
$config['playlist_flash_error_delete_message']= 'The playlist hasn\'t been deletedd';
$config['playlist_flash_error_message']= 'A database error has occured, please contact your administrator.';

/* End of file playlist_settings.php */
/* Location: ./application/config/playlist_settings.php */
