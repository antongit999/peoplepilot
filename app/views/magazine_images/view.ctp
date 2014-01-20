<div class="magazineImages view">
<h2><?php  __('Magazine Image');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $magazineImage['MagazineImage']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Magazine Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $magazineImage['MagazineImage']['magazine_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Caption'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $magazineImage['MagazineImage']['caption']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Magazine Image', true), array('action' => 'edit', $magazineImage['MagazineImage']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Magazine Image', true), array('action' => 'delete', $magazineImage['MagazineImage']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $magazineImage['MagazineImage']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Magazine Images', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Magazine Image', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
