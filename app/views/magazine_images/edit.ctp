<div class="magazineImages form">
<?php echo $this->Form->create('MagazineImage');?>
	<fieldset>
		<legend><?php __('Edit Magazine Image'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('magazine_id');
		echo $this->Form->input('caption');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('MagazineImage.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('MagazineImage.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Magazine Images', true), array('action' => 'index'));?></li>
	</ul>
</div>