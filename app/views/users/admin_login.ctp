<div class='clear' style='margin-top: 50px;'></div>
<div class='loginBox'>

<?php 
    echo $this->Session->flash('auth');
    echo $form->create("User", array("url" => array("controller" => "users", "action" => "login")));
    echo $form->input("username");
    echo $form->input("password", array("type" => "password"));
    echo $form->submit("Login");
?>

</div>