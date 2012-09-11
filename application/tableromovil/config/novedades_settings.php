<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/* Config general titles */

$config['recordListTitle']=' Listado de novedades';
$config['recordAddTitle']=' Nueva novedad';
$config['recordEditTitle']=' Editar novedad';
$config['accessTitle']='<div class="accessTitle"> No tienes permiso para realizar esta operaci&oacute;n </div>';

/* Config labels of the form fields */

$config['novedades_id']='Id';
$config['novedades_fecha']='Fecha';
$config['novedades_fechaexacta']='Fecha';
$config['novedades_descripcion']='Descripci&oacute;n';
$config['novedades_estado']='Estado';
$config['novedades_estado_descripcion']='Estado';
$config['novedades_tipo']='Tipo';
$config['novedades_leido']='Leido';

/* Config fields for search */

$config['search_by_novedades_id']= 1;
$config['search_by_novedades_fecha']= 0;
$config['search_by_novedades_fechaexacta']= 0;
$config['search_by_novedades_descripcion']= 0;
$config['search_by_novedades_estado']= 0;
$config['search_by_novedades_tipo']= 0;
$config['search_by_novedades_leido']= 0;

/* Config fields for show in the result list */

$config['show_novedades_id']= 1;
$config['show_novedades_fecha']= 1;
$config['show_novedades_fechaexacta']= 1;
$config['show_novedades_descripcion']= 1;
$config['show_novedades_estado']= 1;
$config['show_novedades_estado_descripcion']= 1;
$config['show_novedades_tipo']= 1;
$config['show_novedades_leido']= 1;

/* Config params of pagination */

$config['pag_perpage']= 10;

/* Config flash messages */

$config['novedades_flash_add_message']= 'The novedades has been successfully added.';
$config['novedades_flash_edit_message']= 'The novedades has been successfully updated.';
$config['novedades_flash_delete_message']= 'The novedades has been successfully deleted';
$config['novedades_flash_error_delete_message']= 'The novedades hasn\'t been deletedd';
$config['novedades_flash_error_message']= 'A database error has occured, please contact your administrator.';

/* End of file novedades_settings.php */
/* Location: ./application/config/novedades_settings.php */
