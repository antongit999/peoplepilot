<div class="actions">
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('NewsTag.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('NewsTag.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Tags', true), array('action' => 'index'));?></li>
	</ul>
</div>

<div class="newsTags form">
<?php echo $this->Form->create('NewsTag');?>
	<fieldset>
		<legend><?php __('Edit News Tag'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('tag');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
