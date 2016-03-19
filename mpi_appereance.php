<?php
$mpiObj = new mpinstaller();
$han_plugins_list = array(
"WP Lipsum",
"Easy Featured Images",
"P3 (Plugin Performance Profiler)",
"Theme Check",
"Duplicate Post",
"WP Example Content",
"Disable Comments",
"Regenerate Thumbnails",
"WP Limit Login Attempts",
"WordPress File Monitor Plus",
"Maintenance",
"WP Lipsum",
"Convert Post Types");

$plListText = implode("&#13;&#10;", $han_plugins_list);
?>
<div class="wrap pc-wrap">
	<div class="mpiicon icon32"></div>
	<h2><?php _e('Hanuman Dev Plugins Installer','mpi') ?></h2>
	<?php
		if (!current_user_can('edit_plugins')) { 
			_e('You do not have sufficient permissions to manage plugins on this blog.<br>','mpi');
			return;
		}
	?>
	<div id="mpiblock">

			

		<div><?php if($mpiObj->mpi_app_DirTesting()){} else{ _e('<div class="mpi_error">oops!!! Seems like the directory permission are not set right so some functionalities of plugin will not work.<br/>Please set the directory permission for the folder "uploads" inside "wp-content" directory to 777.</div>','mpi'); } ?></div>
		
		<div id="poststuff" class="mpi-meta-box">
			<div class="postbox">
				<div class="handlediv" title="Click to toggle"><br/></div>
				<div class="inside">
					<form name="form_apu" method="post" action="">
						<?php wp_nonce_field($mpiObj->key); ?>
						<div> 				
							<p>You can also add your plugin at the end on list</p>
							<textarea style="border:1px solid #D1D1D1;width:575px;" name="mpi_wplists" id="mpi_wplists" cols="40" rows="10"><?php echo $plListText; ?></textarea><br/><small style="color:#9B0707;">&nbsp;(<?php _e('Please enter one name in one line.','mpi') ?>)</small>
							<br/><br/>
							<div>
								<input style="float:left;" class="button button-primary mpi_button" type="submit" name="mpi_wpInstall" value="<?php _e('Install plugins &raquo;','mpi'); ?>" />
								<input style="float:right;"  class="button button-primary mpi_button" type="submit" name="mpi_wpActivate" value="<?php _e('Install & Activate plugins &raquo;','mpi'); ?>" />
								<div class="mpi_clear"></div>
							</div>
						</div>
					</form>
					<?php
						if(isset($_POST['mpi_wpInstall']) && trim($_POST['mpi_wplists'])){
							$mpiObj->mpi_app_wpInstall('install');
						}
						if(isset($_POST['mpi_wpActivate']) && trim($_POST['mpi_wplists'])){
							$mpiObj->mpi_app_wpInstall('activate');
						}	
					?>
				</div>
			</div>		
		</div>
	</div>
</div>
