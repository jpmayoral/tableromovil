<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/* Config general titles */

$config['recordListTitle']=' Listado de C&aacute;meras';
$config['recordAddTitle']=' Nueva C&aacute;mara';
$config['recordEditTitle']=' Editar C&aacute;mera';
$config['accessTitle']='<div class="accessTitle"> No tienes permiso para realizar esta operaci&oacute;n </div>';

/* Config labels of the form fields */

$config['cameras_id']='Id';
$config['cameras_descripcion']='Descripci&oacute;n';
$config['cameras_url']='Url';
$config['cameras_port']='Puerto';
$config['cameras_estado']='Estado';
$config['cameras_estado_descripcion']='Estado';
$config['cameras_user']='Usuario';
$config['cameras_password']='Contrase&ntilde;a';
$config['cameras_created_at']='Fecha de alta';
$config['cameras_updated_at']='Actualizado el';

/* Config fields for search */

$config['search_by_cameras_id']= 1;
$config['search_by_cameras_descripcion']= 0;
$config['search_by_cameras_url']= 0;
$config['search_by_cameras_port']= 0;
$config['search_by_cameras_estado']= 0;
$config['search_by_cameras_user']= 0;
$config['search_by_cameras_password']= 0;
$config['search_by_cameras_created_at']= 0;
$config['search_by_cameras_updated_at']= 0;

/* Config fields for show in the result list */

$config['show_cameras_id']= 1;
$config['show_cameras_descripcion']= 1;
$config['show_cameras_url']= 1;
$config['show_cameras_port']= 1;
$config['show_cameras_estado']= 0;
$config['show_cameras_estado_descripcion']= 1;
$config['show_cameras_user']= 1;
$config['show_cameras_password']= 1;
$config['show_cameras_created_at']= 1;
$config['show_cameras_updated_at']= 1;

/* Config required fields */

$config['isRequired_cameras_id']= 1;
$config['isRequired_cameras_descripcion']= 1;
$config['isRequired_cameras_url']= 1;
$config['isRequired_cameras_port']= 1;
$config['isRequired_cameras_estado']= 1;
$config['isRequired_cameras_user']= 1;
$config['isRequired_cameras_password']= 1;
$config['isRequired_cameras_created_at']= 1;
$config['isRequired_cameras_updated_at']= 1;

/* Config params of pagination */

$config['pag_perpage']= 4;

/* Config flash messages */

$config['cameras_flash_add_message']= 'The cameras has been successfully added.';
$config['cameras_flash_edit_message']= 'The cameras has been successfully updated.';
$config['cameras_flash_delete_message']= 'The cameras has been successfully deleted';
$config['cameras_flash_error_delete_message']= 'The cameras hasn\'t been deletedd';
$config['cameras_flash_error_message']= 'A database error has occured, please contact your administrator.';

/* End of file cameras_settings.php */
/* Location: ./application/config/cameras_settings.php */
