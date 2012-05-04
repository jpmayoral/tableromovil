<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/* Config general titles */

$config['recordListTitle']=' Listado de salidad';
$config['recordAddTitle']=' Nuevo salidad';
$config['recordEditTitle']=' Editar salidad';
$config['accessTitle']='<div class="accessTitle"> No tienes permiso para realizar esta operaci&oacute;n </div>';

/* Config labels of the form fields */

$config['salidad_id']='Id';
$config['salidad_relay']='Relay';
$config['salidad_value']='Value';
$config['salidad_modulo']='M&oacute;dulo';
$config['salidad_descripcion']='Descripci&oacute;n';
$config['salidad_created_at']='Fecha de alta';
$config['salidad_updated_at']='Actualizado el';

/* Config fields for search */

$config['search_by_salidad_id']= 1;
$config['search_by_salidad_relay']= 0;
$config['search_by_salidad_value']= 0;
$config['search_by_salidad_modulo']= 0;
$config['search_by_salidad_descripcion']= 0;
$config['search_by_salidad_created_at']= 0;
$config['search_by_salidad_updated_at']= 0;

/* Config fields for show in the result list */

$config['show_salidad_id']= 1;
$config['show_salidad_relay']= 1;
$config['show_salidad_value']= 1;
$config['show_salidad_modulo']= 1;
$config['show_salidad_descripcion']= 1;
$config['show_salidad_created_at']= 1;
$config['show_salidad_updated_at']= 1;

/* Config required fields */

$config['isRequired_salidad_id']= 1;
$config['isRequired_salidad_relay']= 1;
$config['isRequired_salidad_value']= 1;
$config['isRequired_salidad_modulo']= 1;
$config['isRequired_salidad_descripcion']= 1;
$config['isRequired_salidad_created_at']= 1;
$config['isRequired_salidad_updated_at']= 1;

/* Config params of pagination */

$config['pag_perpage']= 4;

/* Config flash messages */

$config['salidad_flash_add_message']= 'The salidad has been successfully added.';
$config['salidad_flash_edit_message']= 'The salidad has been successfully updated.';
$config['salidad_flash_delete_message']= 'The salidad has been successfully deleted';
$config['salidad_flash_error_delete_message']= 'The salidad hasn\'t been deletedd';
$config['salidad_flash_error_message']= 'A database error has occured, please contact your administrator.';

/* End of file salidad_settings.php */
/* Location: ./application/config/salidad_settings.php */
