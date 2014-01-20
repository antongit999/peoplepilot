<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Magazine.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Magazine.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Magazines', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('New Magazine Image', true), array('controller' => 'magazine_images', 'action' => 'add', $this->data['Magazine']['id'] ,"?redir=" . $this->here)); ?> </li>
	</ul>
</div>

<div class="magazines form">
<?php echo $this->Form->create('Magazine');?>
	<fieldset>
		<legend><?php __('Edit Magazine'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('description_fr', array("label" => "Description (French)"));
		echo $this->Form->input('description_chs', array("label" => "Description (Chinese Simplified)"));
		echo $this->Form->input('description_ch', array("label" => "Description (Chinese)"));
		echo $this->Form->input('tags');
		echo $this->Form->input('tags_weibo');
		echo $this->Form->input('season');
		echo $this->Form->input('like_count');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>

<?php echo $this->element("magazine_images/images")?>
