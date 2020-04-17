<?php	// FUNCTIONS
	function copy_directory( $source, $destination ) {
		if ( is_dir( $source ) ) {
				@mkdir( $destination );
				$directory = dir( $source );
				while ( FALSE !== ( $readdirectory = $directory->read() ) ) {
						if ( $readdirectory == '.' || $readdirectory == '..' ) {
								continue;
						}
						$PathDir = $source . '/' . $readdirectory;
						if ( is_dir( $PathDir ) ) {
								copy_directory( $PathDir, $destination . '/' . $readdirectory );
								continue;
						}
						copy( $PathDir, $destination . '/' . $readdirectory );
				}
					$directory->close();
		}
		else {
				copy( $source, $destination );
		}
	}
	function delete_folder($target, $avoid = NULL) {
		if($avoid === NULL) {
			foreach(glob($target . '/*') as $file) {
				if(is_dir($file)) {
					delete_folder($file);
				} else {
					unlink($file);
				}
			}
			if(file_exists($target) && $target != "/" && $target != "./" && $target != "." && $target != "..") {
				rmdir($target);
			}
		} elseif($avoid != NULL) {
			foreach(glob($target . '/*') as $file) {
				if($file != $avoid && $file != $target.$avoid) {
					if(is_dir($file)) {
						delete_folder($file, $avoid);
					} else {
						unlink($file);
					}
				}
			}
			if(file_exists($target) && $target != "/" && $target != "./" && $target != "." && $target != ".." && $target != $avoid && $target != $target.$avoid) {
				rmdir($target);
			}
		} else {
			echo "ERROR;";
		}
	}
?><?php
	if(isset($_GET['download'])) {
		$log = array();
		$errors = array();
		$install_stage1 = false;
		$install_stage2 = false;
		$install_stage3 = false;
		$install_stage4 = false;
		// DOWNLOAD THE UPDATE ZIP
			echo "downloading";
			set_time_limit(1200);
			$filename	= $app_info['Branch'].".zip";
			$foldername	= "MILG0IR-home-".$app_info['Device']."-".$app_info['Branch'];
			$file = file_get_contents('https://github.com/MILG0IR/MILG0IR-home-'.$app_info['Device'].'/archive/'.$app_info['Branch'].'.zip');
			file_put_contents($filename, $file);
			if(!file_exists($filename)) {
				$log[] .= "<span class='error'>UNABLE TO GATHER THE REQUIRED FILES. Please try again later.</span>";
				$errors[] .= "x";
			} else {
				$log[] .= "<span class='success'>The required files have been downloaded successfully</span>";
				$install_stage1 = true;
			}
		// UNZIP THE UPDATE FILE
			if($install_stage1) {
				$zip = new ZipArchive();
				$zip->open($filename);
				$destination = "./";
				$zip->extractTo($destination);
				if(!file_exists($foldername)) {
					$log[] .= "<span class='error'>UNABLE TO UNZIP THE REQUIRED FILES. Please try again later.</span>";
					$errors[] .= "x";
				} else {
					$log[] .= "<span class='success'>The required files have been unzipped successfully</span>";
					$install_stage2 = true;
				}
			}
		// Remove the installation zip file
			if($install_stage2) {
				unlink($filename);
				if(file_exists($filename)) {
					$log[] .= "<span class='error'>Unable to remove the installation file - Minor issue, Please remove manually.</span>";
					$errors[] .= "x";
				} else {
					$log[] .= "<span class='success'>The installation file has been removed successfully</span>";
					$install_stage3 = true;
				}
			}
		// COPY AND REPLACE THE EXISTING FILES
			if($install_stage3) {
				copy_directory($foldername, "./");
				if(!file_exists("api/")) {
					$log[] .= "<span class='error'>Unable to install the required files, Get in contact to find a resolution.</span>";
					$errors[] .= "x";
				} else {
					$log[] .= "<span class='success'>The required files have been installed successfully</span>";
					$install_stage4 = true;
				}
			}
		// REMOVE THE INSTALLATION FILE
			if($install_stage4) {
				delete_folder($foldername);
				if(file_exists($foldername)) {
					$log[] .= "<span class='error'>Unable to remove the temp installation folder - Minor issue, Please remove manually.</span>";
					$errors[] .= "x";
				} else {
					$log[] .= "<span class='success'>The temp installation folder has been removed successfully</span>";
				}
			}
		// Echo the output
			print_r($log);
	} else {
		echo "not downloading";
	}
?>
<script>
	$(document).ready(function() {
		checkforupdate(<?php echo "\"".$app_info['Version']."\", \"".$app_info['Device']."\", \"".$app_info['Branch']."\"" ?>);
	});
</script>
<div class="content nav-inset">
	<h1 id="updatestatus"></h1>
	<div id="whatsnew"></div>
</div>