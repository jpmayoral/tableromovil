<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/* Config general titles */

$config['recordListTitle']='Escenarios';
$config['recordAddTitle']=' Nuevo Escenario';
$config['recordEditTitle']=' Editar Escenario';
$config['accessTitle']='<div class="accessTitle"> No tienes permiso para realizar esta operaci&oacute;n </div>';

/* Config labels of the form fields */

$config['escenarios_id']='Id';
$config['escenarios_descripcion']='Descripci&oacute;n';
$config['escenarios_estado']='Estado';
$config['escenarios_created_at']='Fecha de alta';
$config['escenarios_updated_at']='Actualizado el';
$config['escenarios_iconpath']='Icono';

/* Config fields for search */

$config['search_by_escenarios_id']= 0;
$config['search_by_escenarios_descripcion']= 1;
$config['search_by_escenarios_estado']= 0;
$config['search_by_escenarios_created_at']= 0;
$config['search_by_escenarios_updated_at']= 0;

/* Config fields for show in the result list */

$config['show_escenarios_id']= 0;
$config['show_escenarios_descripcion']= 1;
$config['show_escenarios_estado']= 1;
$config['show_escenarios_created_at']= 0;
$config['show_escenarios_updated_at']= 0;


/* Config params of pagination */

$config['pag_perpage']= 10;

/* Config flash messages */

$config['perfiles_flash_add_message']= 'The Escenario has been successfully added.';
$config['perfiles_flash_edit_message']= 'The Escenario has been successfully updated.';
$config['perfiles_flash_delete_message']= 'The Escenario has been successfully deleted';
$config['perfiles_flash_error_delete_message']= 'The Escenario has not been deletedd';
$config['perfiles_flash_error_message']= 'A database error has occured, please contact your administrator.';

/* End of file perfiles_settings.php */
/* Location: ./application/config/perfiles_settings.php */
