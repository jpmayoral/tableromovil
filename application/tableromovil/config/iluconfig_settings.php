<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/* Config general titles */

$config['recordListTitle']=' Listado de iluconfig';
$config['recordAddTitle']=' Nueva Luz';
$config['recordEditTitle']=' Editar iluconfig';
$config['accessTitle']='<div class="accessTitle"> No tienes permiso para realizar esta operaci&oacute;n </div>';

/* Config labels of the form fields */

$config['iluconfig_id']='Id';
$config['iluconfig_descripcion']='Descripci&oacute;n';
$config['salidad_id']='Relay';
$config['iluconfig_created_at']='Fecha de alta';
$config['iluconfig_updated_at']='Actualizado el';

/* Config fields for search */

$config['search_by_iluconfig_id']= 1;
$config['search_by_iluconfig_descripcion']= 0;
$config['search_by_salidad_id']= 0;
$config['search_by_iluconfig_created_at']= 0;
$config['search_by_iluconfig_updated_at']= 0;

/* Config fields for show in the result list */

$config['show_iluconfig_id']= 1;
$config['show_iluconfig_descripcion']= 1;
$config['show_salidad_id']= 1;
$config['show_iluconfig_created_at']= 0;
$config['show_iluconfig_updated_at']= 0;

/* Config required fields */

$config['isRequired_iluconfig_id']= 1;
$config['isRequired_iluconfig_descripcion']= 1;
$config['isRequired_salidad_id']= 1;
$config['isRequired_iluconfig_created_at']= 1;
$config['isRequired_iluconfig_updated_at']= 1;

/* Config params of pagination */

$config['pag_perpage']= 4;

/* Config flash messages */

$config['iluconfig_flash_add_message']= 'The iluconfig has been successfully added.';
$config['iluconfig_flash_edit_message']= 'The iluconfig has been successfully updated.';
$config['iluconfig_flash_delete_message']= 'The iluconfig has been successfully deleted';
$config['iluconfig_flash_error_delete_message']= 'The iluconfig hasn\'t been deletedd';
$config['iluconfig_flash_error_message']= 'A database error has occured, please contact your administrator.';

/* End of file iluconfig_settings.php */
/* Location: ./application/config/iluconfig_settings.php */
