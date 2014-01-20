<?php
 
class AppController extends Controller {
    
    var $components = array("RequestHandler" , "Session", "Auth");
    var $helpers = array("Form", "Html", "Session", "Javascript");
    
    function beforeFilter(){
        Security::setHash("md5");
       // $this->Auth->allow('*');
        $this->Auth->fields = array(
                'username' => 'username',
                'password' => 'password'
                );
        $this->Auth->loginAction = array("controller" => "users", "action" => "login", 'admin' => true);
        $this->Auth->logoutRedirect = array("controller" => "users", "action" => "login", 'admin' => true);
        $this->Auth->loginError = "Invalid username or password";
        
        $viewPath = $this->viewPath;
         if($this->RequestHandler->isAjax()) {
              $this->layout = 'ajax';
                
              if($this->RequestHandler->ext == 'html')
                $viewPath = sprintf("%s/html", $viewPath);
         }
        
        $this->viewPath = $viewPath;
    }
}
