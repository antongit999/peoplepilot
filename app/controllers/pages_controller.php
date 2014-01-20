<?php

class PagesController extends AppController {
	var $name = 'Pages';
    var $uses = array("ImageSize");
    
    function beforeFilter(){
        parent::beforeFilter();
    }
    
    function admin_home(){
        if(!empty($this->data['ImageSize'])){
            foreach($this->data['ImageSize'] as $is){
                $this->ImageSize->query(sprintf("update image_sizes set image_sizes.value=%s where image_sizes.id=%s", $is['value'], $is['id']));
            }
            $this->Session->setFlash(__('Size information has been saved.', true));
        }
        Controller::loadModel("ImageSize");
        $this->data = $this->ImageSize->find("all");
    }
	
	

}
