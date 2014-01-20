<div class="magazines form">
<?php echo $this->Form->create('Magazine');?>
	<fieldset>
		<legend><?php __('Add Magazine'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('description_fr', array("label" => "Description (French)"));
		echo $this->Form->input('description_chs', array("label" => "Description (Chinese Simplified)"));
		echo $this->Form->input('description_ch', array("label" => "Description (Chinese)"));
		echo $this->Form->input('tags');
		echo $this->Form->input('tags_weibo');
	//	echo $this->Form->input('magazine_images_id');
		echo $this->Form->input('season');
		echo $this->Form->input('like_count');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Magazines', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Magazine Images', true), array('controller' => 'magazine_images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Magazine Image', true), array('controller' => 'magazine_images', 'action' => 'add')); ?> </li>
	</ul>
</div>