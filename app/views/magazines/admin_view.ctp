<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Edit Magazine', true), array('action' => 'edit', $magazine['Magazine']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Magazine', true), array('action' => 'delete', $magazine['Magazine']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $magazine['Magazine']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Magazines', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Magazine Image', true), array('controller' => 'magazine_images', 'action' => 'add', $this->data['Magazine']['id'] ,"?redir=" . $this->here)); ?> </li>
	</ul>
</div>

<div class="magazines ">
<h2><?php  __('Magazine');?></h2>



	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $magazine['Magazine']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $magazine['Magazine']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Desciption'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $magazine['Magazine']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Desciption (fr)'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $magazine['Magazine']['description_fr']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Desciption (chs)'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $magazine['Magazine']['description_chs']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Desciption (ch)'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $magazine['Magazine']['description_ch']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tags'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $magazine['Magazine']['tags']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tags Weibo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $magazine['Magazine']['tags_weibo']; ?>
			&nbsp;
		</dd>
		
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Like Count'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $magazine['Magazine']['like_count']; ?>
			&nbsp;
		</dd>
	</dl>
</div>

<?php echo $this->element("magazine_images/images")?>

