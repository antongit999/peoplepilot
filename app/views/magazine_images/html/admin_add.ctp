<div class="magazineImages form" style='width:415px'>
<?php echo $this->Form->create('MagazineImage', array("url" => "/admin/magazineImages/add/" . $this->data['MagazineImage']['magazine_id'], 'type' => 'file'));?>
		<h2><?php __('Add Magazine Image'); ?></h2>
	<?php
	    echo $this->Form->hidden('id');
	    echo $this->Form->hidden("Page.redir", array("value" => $this->data['Page']['redir']));
		echo $this->Form->hidden('magazine_id');
		echo $this->Form->file("file");
		echo $this->Form->input('caption', array('type' => 'textarea'));
	?>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
