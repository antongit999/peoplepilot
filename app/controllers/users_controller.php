<?php
class UsersController extends AppController {

	var $name = 'Users';

	//general call before any controller call.
	function beforeFilter(){
	    $allowed = array("login", "logout", "admin_login");
	    
	    if(!empty($this->data) && ($this->action == 'admin_login')){
	        $this->Auth->autoRedirect = false;
	    }
	    
	    if(in_array(strtolower($this->action), $allowed)){
	        $this->Auth->allow('*');
	        
	        if((strtolower($this->action) == 'admin_login') && $this->Auth->user('id')){
	            $this->redirect("/admin");
	        }
	    }
	    else {   
	        parent::beforeFilter();
	    }
	}
	
	
	//user listing for admin
	function admin_index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

	
	//user view for admin
	
	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('user', $this->User->read(null, $id));
	}
	
	
    //user add via admin
	function admin_add() {
		if (!empty($this->data)) {
			$this->User->create();
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
			}
		}
	}

	//user edit via admin
	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'index'));
		}
		
		if (empty($this->data)) {
			$this->data = $this->User->read(null, $id);
			unset($this->data['User']['password']);
		}
		$this->render("admin_add");
	}

	//user delete.
	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for user', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->User->delete($id)) {
			$this->Session->setFlash(__('User deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('User was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	
	//login
	function admin_login(){
	    if(!empty($_POST['data'])){
	        $this->data = $_POST['data'];
        
	        $this->data['User']['password'] = md5($this->data['User']['password']);
          //debug($this->data);exit;
	        if($user = $this->User->find("first", array("conditions" => Set::flatten($this->data)))){
	            $this->Session->write("Auth.User", $user['User']);
	            $this->redirect("/admin");
	        } else {
	            unset($this->data['User']['password']);
	            
	        }
	    }
	}
	
	
	//logout function.
	function logout(){
	    $this->Session->destroy();
	    $this->redirect("/");
	}
	
}
?>