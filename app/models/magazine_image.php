<?php
class MagazineImage extends AppModel {
	var $name = 'MagazineImage';
	var $magazine = null;
	
	
	//after image save, resize image.
	function afterSave($created){
	    $base = sprintf("%simg/magazines/%s/", WWW_ROOT, $this->data['MagazineImage']['magazine_id']);
	    $this->ImageSize = ClassRegistry::init("ImageSize");
        $imageSizes = $this->ImageSize->find("list", array("fields" => array("name", "value")));
        
        //resize images
        if(isset($this->data['MagazineImage']['file_name'])){	    
    	    $this->resizeImage($base,$this->data['MagazineImage']['file_name'], "thumb_" . $this->data['MagazineImage']['file_name'], $imageSizes['thumb_width'], $imageSizes['thumb_height']);
    	    $this->resizeImage($base,$this->data['MagazineImage']['file_name'], "resized_" . $this->data['MagazineImage']['file_name'], $imageSizes['resize_width'], $imageSizes['resize_width']);
        }
        
        if(isset($this->data['MagazineImage']['magazine_image_id'])){	    
    	    $this->Magazine = ClassRegistry::init("Magazine");
    	    $this->Magazine->id = $this->data['MagazineImage']['magazine_id'];
    	    $defaultImageId = $this->Magazine->field("magazine_image_id");
    	    //check if default image isnt set.
    	    if(empty($defaultImageId)){
    	        $this->Magazine->saveField("magazine_image_id", $this->id);
    	    }
        }
	}
	
	
	function beforeDelete($cascasde){
	    $this->magazine = $this->find("first", array("conditions" => array("MagazineImage.id" =>$this->id)));
	    return true;
	}
	
	
	//delete image files from filesystem after db row is deleted.
	function afterDelete(){
	    $magazine = $this->magazine;
	    $this->Magazine = ClassRegistry::init("Magazine");
	    $this->Magazine->id = $magazine['MagazineImage']['magazine_id'];
	    $defaultId = $this->Magazine->field("magazine_image_id");
	    if($defaultId == $magazine['MagazineImage']['id']){
	        $magazineImage = $this->find('first', array("MagazineImage.magazine_id" => $this->Magazine->id));
	        $defaultId = ($magazineImage) ? $magazineImage['MagazineImage']['id'] : "";
	        $this->Magazine->saveField("magazine_image_id", $defaultId);
	    }
	    
	    unlink(sprintf(WWW_ROOT . "img/magazines/%s/%s", $magazine['MagazineImage']['magazine_id'], $magazine['MagazineImage']['file_name']));
	    unlink(sprintf(WWW_ROOT ."img/magazines/%s/%s", $magazine['MagazineImage']['magazine_id'], "thumb_" . $magazine['MagazineImage']['file_name']));
	    unlink(sprintf(WWW_ROOT . "img/magazines/%s/%s", $magazine['MagazineImage']['magazine_id'], "resized_" .$magazine['MagazineImage']['file_name']));
	}
	
	
	//resize image based on aspect ratio and if required dimensions are smaller than original one.
	function resizeImage($baseUrl, $sourceFileName, $destinationFileName, $w, $h){
	    $convert = "/usr/bin/convert -resize %s %s %s";
	    
	    $fileName = $baseUrl  . $sourceFileName ;
	    $outputFile = $baseUrl . $destinationFileName;
	     list($width, $height, $type, $attr) = getimagesize($fileName);
         $aspectRatio = $width/$height;
         if( ($w >= $width) && ($h >= $height) ){ //current image smaller than required dimensions.
             copy($fileName, $outputFile);
         } else {
             // If image aspect ratio (expressed as width/height) is greater than the
             //specified aspect ratio, set image height to specified height dimension, and
            //adjust width accordingly to maintain aspect ratio
             $requiredAspect = $w/$h;
             
             if($aspectRatio > $requiredAspect){ //set height 
                 exec(sprintf($convert, "x" . $h, $fileName, $outputFile));
             } else { //set width
                 exec(sprintf($convert, $w . "x", $fileName, $outputFile));
             }
         }
	}
}
?>