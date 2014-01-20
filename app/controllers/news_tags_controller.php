<?php
class NewsTagsController extends AppController {

	var $name = 'NewsTags';
	
    function beforeFilter(){
    	    $this->Auth->allow("index");
    	    parent::beforeFilter();
    }

	function index() {
		$this->NewsTag->recursive = 0;
		$newsTags = $this->NewsTag->find('list');
		if($newsTags){
		    $newsTags = array_values($newsTags);
		} else  {
		    $newsTags = array();
		}
		
		$this->set(compact('newsTags'));
	}

	function admin_index() {
		$this->NewsTag->recursive = 0;
		$this->set('newsTags', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid tag', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('newsTag', $this->NewsTag->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->NewsTag->create();
			if ($this->NewsTag->save($this->data)) {
				$this->Session->setFlash(__('The tag has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tag could not be saved. Please, try again.', true));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid tag', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->NewsTag->save($this->data)) {
				$this->Session->setFlash(__('The tag has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tag could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->NewsTag->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for tag', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->NewsTag->delete($id)) {
			$this->Session->setFlash(__('Tag deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Tag was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>