<?php
class Magazine extends AppModel {
	var $name = 'Magazine';
	var $displayField = 'name';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasMany = array(
		'MagazineImage' => array(
			'className' => 'MagazineImage',
			'foreignKey' => 'magazine_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => 'file_name asc',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
	
	
	function appendImageInfo($id, &$magazine){
	    $this->MagazineImage = ClassRegistry::init("MagazineImage");
	    $images = $this->MagazineImage->find("all", array("conditions" => array("MagazineImage.magazine_id" => $id), 'order' => 'MagazineImage.file_name asc'));
	    $baseUrl = "/img/magazines/$id/";
	    
	    foreach($images as $image){
	        $image = $image['MagazineImage'];
	        $img = array();
	        $img['caption'] = $image['caption'];
	        $img['thumbnail'] = $baseUrl . "thumb_" . $image['file_name'];
	        $img['image'] = $baseUrl . "resized_" .$image['file_name'];
	        $img['id'] = $image['id'];
	        if(isset($magazine['magazine_image_id'])){
        	    if($image['id'] == $magazine['magazine_image_id']){
        	            unset($magazine['magazine_image_id']);
        	            $magazine['defaultImage'] = $img['image'];
        	     }
	        }
    	     
	        $magazine['images'][] = $img;    
	        
    	    
	    }
	}

}
?>