<?php
 class User extends AppModel {
	var $name = 'User';
	var $displayField = 'username';

    function beforeSave($options){
        if(!empty($_POST['data']['User']['password']) && !empty($_POST['data']['User']['confirm_password']) && ($_POST['data']['User']['password'] != $_POST['data']['User']['confirm_password']))
            return false;

       if(!empty($_POST['data']['User']['password'])){
           $this->data['User']['password'] = md5($_POST['data']['User']['password']);
       }
        return true;
    }	
}
?>