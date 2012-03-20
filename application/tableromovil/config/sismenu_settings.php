<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/* Config general titles */

$config['recordListTitle']=' Listado de Sismenu_Controller';
$config['recordAddTitle']=' Nuevo Sismenu_Controller';
$config['recordEditTitle']=' Editar Sismenu_Controller';

/* Config labels of the form fields */

$config['sismenu_id']='sismenu_id';
$config['sismenu_descripcion']='sismenu_descripcion';
$config['sismenu_estado']='sismenu_estado';
$config['sismenu_parent']='sismenu_parent';
$config['sismenu_iconpath']='sismenu_iconpath';
$config['sismenu_created_at']='sismenu_created_at';
$config['sismenu_updated_at']='sismenu_updated_at';
$config['sisvinculos_link']='Link';

/* Config fields for search */

$config['search_by_sismenu_id']= 1;
$config['search_by_sismenu_descripcion']= 0;
$config['search_by_sismenu_estado']= 0;
$config['search_by_sismenu_parent']= 0;
$config['search_by_sismenu_iconpath']= 0;
$config['search_by_sismenu_created_at']= 0;
$config['search_by_sismenu_updated_at']= 0;

/* Config fields for show in the result list */

$config['show_sismenu_id']= 1;
$config['show_sismenu_descripcion']= 1;
$config['show_sismenu_estado']= 1;
$config['show_sismenu_parent']= 1;
$config['show_sismenu_iconpath']= 1;
$config['show_sismenu_created_at']= 1;
$config['show_sismenu_updated_at']= 1;
$config['show_sisvinculos_link']= 1;

/* Config params of pagination */

$config['pag_perpage']= 20;

/* Config flash messages */

$config['sismenu_flash_add_message']= 'The sismenu has been successfully added.';
$config['sismenu_flash_edit_message']= 'The sismenu has been successfully updated.';
$config['sismenu_flash_delete_message']= 'The sismenu has been successfully deleted';
$config['sismenu_flash_error_delete_message']= 'The sismenu hasn\'t been deletedd';
$config['sismenu_flash_error_message']= 'A database error has occured, please contact your administrator.';

/* End of file sismenu_settings.php */
/* Location: ./application/config/sismenu_settings.php */
