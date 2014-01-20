<?php
class MagazinesController extends AppController {

	var $name = 'Magazines';
	
	function beforeFilter(){
	    $this->Auth->allow("index", "view", "imageCount", "likeIt");
	    parent::beforeFilter();
	}
	
	//Listing API call.
	function index(){
	    $this->Magazine->recursive = 0;
	    $magazines = $this->Magazine->find("all", array("order" => array("Magazine.season desc", "Magazine.name asc")));
	    
        
	    $magazines = array('magazines' => Set::extract($magazines, "{n}.Magazine"));
	    $this->set(compact('magazines'));
	}
	
	
	//Single Magazine API call.
	function view($id){
	    $magazine = $this->Magazine->find("first", array('conditions' => array('Magazine.id' => $id)));
        $magazine = $magazine['Magazine'];
	    $this->Magazine->appendImageInfo($id, $magazine);
	    $magazine = array('magazine' => $magazine);
	    
	    $magazine['magazine']['is_most_recent'] = ($this->Magazine->find("count", array("conditions" => array('Magazine.created is not null', "Magazine.created >" => $magazine['magazine']['created'])))) ? 0 : 1;
	    
	    $this->set(compact('magazine'));
	}
	
	
	//Image Count API call.
	function imageCount($id){
	    Controller::loadModel("MagazineImage");
	    $count = $this->MagazineImage->find("count", array("conditions" => array("MagazineImage.magazine_id" =>$id)));
	    $this->set('count', array('count' => $count));
	}
	
	function likeIt(){
	    $success = 404;
	    Controller::loadModel("UserLike");
	    if(!empty($_POST['user_id']) && !empty($_POST['magazine_id'])){
	        $conditions = array('user_id' => $_POST['user_id'], 'magazine_id' => $_POST['magazine_id']);
	        $like = $this->UserLike->find("first", array('conditions' => $conditions));
	        
	        if($like){
	            $success = 401;
	        } else {
	            if($this->UserLike->save($_POST)){
	                $success = 200;
	            }
	        }
	    }
	    
	    $this->set('success', array('success' => $success));
	}

	
	//Admin magazine listing .
	function admin_index() {
		$this->Magazine->recursive = 2;
		$magazines = $this->paginate();
		$this->set('magazines', $magazines);
	}

	
	//Admin magazine view.
	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid magazine', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Magazine->recursive = 2;
		$this->data = $this->Magazine->read(null, $id);
		$this->set('magazine', $this->data);
	}

	
	//Admin magazine add.
	function admin_add() {
		if (!empty($this->data)) {
			$this->Magazine->create();
			if ($this->Magazine->save($this->data)) {
				$this->Session->setFlash(__('The magazine has been saved. You can now add images.', true));
				$this->redirect(array('action' => 'edit', $this->Magazine->id));
			} else {
				$this->Session->setFlash(__('The magazine could not be saved. Please, try again.', true));
			}
		}
	}
	
	
    //Admin magazine edit.
	function admin_edit($id = null) {
	    $this->Magazine->recursive = 2;
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid magazine', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Magazine->save($this->data)) {
				$this->Session->setFlash(__('The magazine has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The magazine could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Magazine->read(null, $id);
		}
	}

	//Admin magazine delete.
	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for magazine', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Magazine->delete($id)) {
			$this->Session->setFlash(__('Magazine deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Magazine was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>