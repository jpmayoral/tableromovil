<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/* Config general titles */

$config['recordListTitle']=' Listado de Entradad';
$config['recordAddTitle']=' Nueva Entradad';
$config['recordEditTitle']=' Editar Entradad';
$config['accessTitle']='<div class="accessTitle"> No tienes permiso para realizar esta operaci&oacute;n </div>';

/* Config labels of the form fields */

$config['entradad_id']='Id';
$config['entradad_din']='DIN';
$config['entradad_value']='VALUE';
$config['entradad_modulo']='M&oacute;dulo';
$config['entradad_descripcion']='Descripci&oacute;n';
$config['entradad_created_at']='Fecha de alta';
$config['entradad_updated_at']='Actualizado el';
$config['sismenu_id']='Men&uacute;';
$config['entradad_estado']='Estado';

/* Config fields for search */

$config['search_by_entradad_id']= 1;
$config['search_by_entradad_din']= 0;
$config['search_by_entradad_value']= 0;
$config['search_by_entradad_modulo']= 0;
$config['search_by_entradad_descripcion']= 0;
$config['search_by_entradad_created_at']= 0;
$config['search_by_entradad_updated_at']= 0;

/* Config fields for show in the result list */

$config['show_entradad_id']= 1;
$config['show_entradad_din']= 1;
$config['show_entradad_value']= 1;
$config['show_entradad_modulo']= 1;
$config['show_entradad_descripcion']= 1;
$config['show_entradad_created_at']= 1;
$config['show_entradad_updated_at']= 1;
$config['show_sismenu_id']= 1;
$config['show_entradad_estado']= 1;

/* Config required fields */

$config['isRequired_entradad_id']= 1;
$config['isRequired_entradad_din']= 1;
$config['isRequired_entradad_value']= 1;
$config['isRequired_entradad_modulo']= 1;
$config['isRequired_entradad_descripcion']= 1;
$config['isRequired_entradad_created_at']= 1;
$config['isRequired_entradad_updated_at']= 1;

/* Config params of pagination */

$config['pag_perpage']= 4;

/* Config flash messages */

$config['entradad_flash_add_message']= 'The entradad has been successfully added.';
$config['entradad_flash_edit_message']= 'The entradad has been successfully updated.';
$config['entradad_flash_delete_message']= 'The entradad has been successfully deleted';
$config['entradad_flash_error_delete_message']= 'The entradad hasn\'t been deletedd';
$config['entradad_flash_error_message']= 'A database error has occured, please contact your administrator.';

/* End of file entradad_settings.php */
/* Location: ./application/config/entradad_settings.php */
