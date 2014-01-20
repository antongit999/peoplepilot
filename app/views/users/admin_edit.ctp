<div class="users form">
<?php echo $this->Form->create('User');?>
	<fieldset>
		<legend><?php __('Edit User'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('group_id');
		echo $this->Form->input('is_admin');
		echo $this->Form->input('first_name');
		echo $this->Form->input('middle_name');
		echo $this->Form->input('second_last_name');
		echo $this->Form->input('office');
		echo $this->Form->input('user_title');
		echo $this->Form->input('user_hierarchy');
		echo $this->Form->input('email');
		echo $this->Form->input('government_id');
		echo $this->Form->input('dob');
		echo $this->Form->input('gender');
		echo $this->Form->input('lang');
		echo $this->Form->input('address1');
		echo $this->Form->input('address2');
		echo $this->Form->input('address3');
		echo $this->Form->input('city');
		echo $this->Form->input('state');
		echo $this->Form->input('country');
		echo $this->Form->input('postal_code');
		echo $this->Form->input('telephone');
		echo $this->Form->input('question_group');
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->input('mfi_joining');
		echo $this->Form->input('leaving_last_office');
		echo $this->Form->input('office_joining');
		echo $this->Form->input('status');
		echo $this->Form->input('notes');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('User.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('User.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Groups', true), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group', true), array('controller' => 'groups', 'action' => 'add')); ?> </li>
	</ul>
</div>