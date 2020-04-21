<?php	// FUNCTIONS
	include_once('./db/db_conx.php');
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
?><?php // UPDATE SCRIPT
	if(isset($_GET['download'])) {
?>
<!DOCTYPE html>
	<html>
		<head>
		</head>
		<body>
		</body>
	</html>
<?php
		$l = '{"_comment":"Starting update"';
		$e = 0;
		$i = 0;
		$s = 0;
		// DOWNLOAD THE UPDATE ZIP
			set_time_limit(1200);
			$filename	= $app_info['Branch'].".zip";
			$foldername	= "MILG0IR-home-".$app_info['Device']."-".$app_info['Branch'];
			$file = file_get_contents('https://github.com/MILG0IR/MILG0IR-home-'.$app_info['Device'].'/archive/'.$app_info['Branch'].'.zip');
			file_put_contents($filename, $file);
			if(!file_exists($filename)) {
				$l .= ',"'.$i.'": "<span class=\'error\'>UNABLE TO GATHER THE REQUIRED FILES. Please try again later.</span>"';
				$e++;
				$i++;
			} else {
				$l .= ',"'.$i.'": "<span class=\'success\'>The required files have been downloaded successfully.</span>"';
				$s++;
				$i++;
			}
		// UNZIP THE UPDATE FILE
			if($s > 0) {
				$zip = new ZipArchive();
				$zip->open($filename);
				$destination = "./";
				$zip->extractTo($destination);
				if(!file_exists($foldername)) {
					$l .= ',"'.$i.'": "<span class=\'error\'>UNABLE TO UNZIP THE REQUIRED FILES. Please try again later.</span>"';
					$e++;
					$i++;
				} else {
					$l .= ',"'.$i.'": "<span class=\'success\'>The required files have been unzipped successfully.</span>"';
					$s++;
					$i++;
				}
			}
		// COPY AND REPLACE THE EXISTING FILES
			if($s > 1) {
				copy_directory($foldername, "./");
				if(!file_exists("api/")) {
					$l .= ',"'.$i.'": "<span class=\'error\'>Unable to install the required files, Get in contact to find a resolution.</span>"';
					$e++;
					$i++;
				} else {
					$l .= ',"'.$i.'": "<span class=\'success\'>The required files have been installed successfully.</span>"';
					$s++;
					$i++;
				}
			}
		// Remove the installation zip file
			if($s > 2) {
				unlink($filename);
				if(file_exists($filename)) {
					$l .= ',"'.$i.'": "<span class=\'error\'>Unable to remove the installation file - Minor issue, Please remove manually.</span>"';
					$e++;
					$i++;
				} else {
					$l .= ',"'.$i.'": "<span class=\'success\'>The installation file has been removed successfully.</span>"';
					$s++;
					$i++;
				}
			}
		// REMOVE THE INSTALLATION FILE
			if($s > 3) {
				delete_folder("./".$foldername."/");
				if(file_exists("./".$foldername."/")) {
					$l .= ',"'.$i.'": "<span class=\'error\'>Unable to remove the temp installation folder - Minor issue, Please remove manually.</span>"';
					$e++;
					$i++;
				} else {
					$l .= ',"'.$i.'": "<span class=\'success\'>The temp installation folder has been removed successfully.</span>"';
					$i++;
				}
			}
		// Ammend info.json
			// Open and decode the file
				$json = "etc/info.json";
				if(file_exists($json)) {
					$jsonString = file_get_contents($json);
					$data = json_decode($jsonString, true);
			// Ammend the needed values
					$data['Branch'] = $app_info['Branch'];
					$data['Device'] = $app_info['Device'];
			// Encode and close the file
					$newJsonString = json_encode($data, JSON_PRETTY_PRINT);
					file_put_contents($json, $newJsonString);
				}
			// Test
				$jsonString = file_get_contents($json);
				$data = json_decode($jsonString, true);
				if($data['Branch'] == $app_info['Branch']) {
					$l .= ',"'.$i.'": "<span class=\'success\'>The installation information has been saved successfully.</span>"';
					$i++;
				} else {
					$l .= ',"'.$i.'": "<span class=\'error\'>Unable to save the installation information.</span>"';
					$e++;
					$i++;
				}
		//	
		$l .= "}";
	}
	echo $URL = '/pages/settings.php?page=security&log='.$l.'&errors='.$e;
	header('Location: '.$URL);
?>