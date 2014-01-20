<div class="form">
<?php echo $this->Form->create('User' , array("url" => "/admin/users/add"));?>
	<h2>Add User</h2>
	<?php
	    echo $this->Form->hidden("id");
		echo $this->Form->input('first_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('username');
		echo $this->Form->input('password', array('type' => 'password'));
		echo $this->Form->input('confirm_password', array('type' => 'password'));
	?>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
