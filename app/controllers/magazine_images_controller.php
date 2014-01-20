<?php
class MagazineImagesController extends AppController {

	var $name = 'MagazineImages';

	function beforeFilter(){
	    parent::beforeFilter();
	}
	
    //Save all	
	function admin_saveAll(){
        if($this->MagazineImage->saveAll($this->data['MagazineImage'])){
            if(!empty($this->data['Magazine']['defaultImage'][0])){
                Controller::loadModel("Magazine");
                $this->Magazine->id = $this->data['Magazine']['id'];
                $this->Magazine->saveField("magazine_image_id", $this->data['Magazine']['defaultImage'][0]);
                $this->redirect($this->data['Page']['redirect']);
            }
            $this->Session->setFlash(__('The magazine image info has been updated', true));
            
        } else{
            $this->Session->setFlash(__('Error saving magazine information', true));
        }
	}
	

	function admin_add($magazine_id) {
	    set_time_limit(18000);
		if (!empty($this->data)) {
            $dir = WWW_ROOT . "img/magazines/" . $magazine_id;
                    
            if(!is_dir($dir)){
                mkdir($dir, 0755, true);
            }

            $this->MagazineImage->Behaviors->attach('FileUpload.FileUpload', array(
              'uploadDir' => $dir,
              'forceWebroot' => false, //if false, files will be upload to the exact path of uploadDir
              'fields' => array('name' => 'file_name', 'type' => 'file_type', 'size' => 'size'),
              'allowedTypes' => array('*'),
              'required' => true, //default is false, if true a validation error would occur if a file wsan't uploaded.
              'maxFileSize' => false, //10megs
              'unique' => false, //filenames will overwrite existing files of the same name. (default true)
              'fileNameFunction' => false, //execute the Sha1 function on a filename before saving it (default false)
              'massSave' => false,
            ));
    
            
		    foreach($this->data['MagazineImage'] as $index=>$d){
		        if(isset($d['file']['name'])){
		            $this->data['MagazineImage'][$index]['file']['name'] = str_replace(" ", "_", $d['file']['name']); 
		        }
		          if($d['file']['error'] != 0)
		              unset($this->data['MagazineImage'][$index]); 
		    }
//debug($this->data);exit;
		    if ($this->MagazineImage->saveAll($this->data['MagazineImage'])) {
				$this->Session->setFlash(__('The magazine image has been saved', true));
				$this->redirect(!empty($this->data['Page']['redir']) ? $this->data['Page']['redir'] : array('action' => 'index'));
			} else {
			    //debug($this->validationErrors);
				$this->Session->setFlash(__('The magazine image could not be saved. Please, try again.', true));
			}
		}
		if(!empty($_GET['redir'])){
		    $this->data['Page']['redir'] = $_GET['redir'];
		}
		$this->data['MagazineImage']['magazine_id'] = $magazine_id;
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid magazine image', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->MagazineImage->save($this->data)) {
				$this->Session->setFlash(__('The magazine image has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The magazine image could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->MagazineImage->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for magazine image', true));
			$this->redirect($_GET['redir']);
		}
		if ($this->MagazineImage->delete($id)) {
			$this->Session->setFlash(__('Magazine image deleted', true));
			$this->redirect($_GET['redir']);
		}
		$this->Session->setFlash(__('Magazine image was not deleted', true));
		$this->redirect($_GET['redir']);
	}
}
?>