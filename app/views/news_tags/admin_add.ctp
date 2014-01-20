<div class="newsTags form">
<?php echo $this->Form->create('NewsTag');?>
	<fieldset>
		<legend><?php __('Add News Tag'); ?></legend>
	<?php
		echo $this->Form->input('tag');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List News Tags', true), array('action' => 'index'));?></li>
	</ul>
</div>