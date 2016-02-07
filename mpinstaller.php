<?php
/*
Plugin Name: WP Hanuman Dev Plugins installer 
Plugin URI: http://ablog.gratun.am/hanum_developer_plugins_installer
Description: This plugin installs some helper plugins for developement. Plugin is frok of Multi Plugin Installer 
Author: Artak (hanuman) Kolyan
Version: 1.0.0
Author URI: http://ablog.gratun.am/
*/
//--------------------------------------------------------------------------
//including plugin class
require_once('mpi-Class.php');
$mpiobj = new mpinstaller(); 

//plugins admin interface
require_once('mpi-admin.php');

//define plugin constants
$mpi_uploadDir = wp_upload_dir();
define('MPIUPLOADDIR_PATH', $mpi_uploadDir['basedir']);
define('MPIPLUGIN_PATH', plugin_dir_path(__FILE__));
define('MPIPLUGIN_URL', plugin_dir_url(__FILE__));
define('MPI_WP_PLUGIN_DIR',dirname(plugin_dir_path(__FILE__)));

// ADD Styles and Script in head section
add_action('admin_init', 'mpi_backend_scripts');
function mpi_backend_scripts() {
	if(is_admin()){
		if(isset($_REQUEST['page']) && $_REQUEST['page']=="mpinstaller"){
			//wp_enqueue_script ('jquery');
			wp_enqueue_script( 'mpi_admin_script',plugins_url('js/mpi.js',__FILE__), array('jquery'));
			wp_enqueue_style( 'mpi_admin_style',plugins_url('css/mpi.css',__FILE__), false, '1.0.0' );
		}
	}
}

register_activation_hook(__FILE__,'mpi_activation');
function mpi_activation() {
    if(!is_dir(MPIUPLOADDIR_PATH.'/mpi_logs')){ @mkdir(MPIUPLOADDIR_PATH.'/mpi_logs', 0777);}
	if(!is_dir(MPIUPLOADDIR_PATH.'/mpi_logs/files')){ @mkdir(MPIUPLOADDIR_PATH.'/mpi_logs/files', 0777);}
	if(!is_dir(MPIUPLOADDIR_PATH.'/mpi_logs/files/tmp')){ @mkdir(MPIUPLOADDIR_PATH.'/mpi_logs/files/tmp', 0777);}
}
?>