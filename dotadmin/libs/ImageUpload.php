<?php
require 'SimpleImage.php';

 class ImageUpload {

		  public function store_uploaded_image($url,$html_element_name, $new_img_width, $new_img_height, $newname) {

			$target_dir = $url;
			
			$target_file = $target_dir . basename($_FILES[$html_element_name]["name"]);
						
			$image = new SimpleImage();
			$image->load($_FILES[$html_element_name]['tmp_name']);
			$image->resize($new_img_width, $new_img_height);
			$image->save($target_file);
			rename($target_file,$target_dir.$newname.'.jpg');
			return $target_file; //return name of saved file in case you want to store it in you database or show confirmation message to user

		}
		
		public function store_uploaded_pdf($url,$html_element_name,$filename) {
			
			$targetfolder = $url;

			$targetfolder = $targetfolder . basename( $_FILES[$html_element_name]['name']);
			$target_file = $targetfolder . basename( $_FILES[$html_element_name]['name']);

			

			move_uploaded_file($_FILES[$html_element_name]['tmp_name'], $targetfolder);
			rename($targetfolder,$url.$filename.'.pdf');

		   return $target_file; //return name of saved file in case you want to store it in you database or show confirmation message to user

	   }
		
		public static function createdropzone($url, $id){
			return '<div class="row align-items-center">
						<div class="col">
								<div class="panel">
									<div class="panel-head">
										<h5 class="panel-title">Only One User Photo Upload</h5>
									</div>
									<div class="panel-body">
										<form action="'.$url.'" class="dropzone dz-clickable" id="'.$id.'">
											<div class="dz-default dz-message"><span><i class="icon-plus">
												</i>Drop files here or click here to upload. <br> Only Images Allowed</span>
											</div>
										</form>
										<div class="row mt-1 ml-1 mr-1 border" id="imglist">No Image found!</div>        
									</div>
								</div>
							</div>
						</div>';
		}

		public static function createdropzonepdf($url, $id){
			return '<div class="row align-items-center">
						<div class="col">
								<div class="panel">
									<div class="panel-head">
										<h5 class="panel-title">Only One PDF Upload</h5>
									</div>
									<div class="panel-body">
										<form action="'.$url.'" class="dropzone dz-clickable" id="'.$id.'">
											<div class="dz-default dz-message"><span><i class="icon-plus">
												</i>Drop files here or click here to upload. <br> Only PDF Allowed</span>
											</div>
										</form>
										<div class="row mt-1 ml-1 mr-1 border" id="imglist">No pdf found!</div>        
									</div>
								</div>
							</div>
						</div>';
		}

}
?>