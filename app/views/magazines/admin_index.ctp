<div class="magazines index">

	<h2><?php __('Magazines');?></h2>

<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('New Magazine', true), array('action' => 'add')); ?></li>
	</ul>
</div>

	<table cellpadding="0" cellspacing="0">
	<tr>
			<th>Thumb</th>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th><?php echo $this->Paginator->sort('tags');?></th>
			<th><?php echo $this->Paginator->sort('tags_weibo');?></th>
			<th><?php echo $this->Paginator->sort('season');?></th>
			<th><?php echo $this->Paginator->sort('like_count');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($magazines as $magazine):
	    $magazineImage = Set::extract($magazine, sprintf("/MagazineImage[id=%s]/file_name",$magazine['Magazine']['magazine_image_id']));
	    $src = (empty($magazine['Magazine']['magazine_image_id'])) ? "/img/no_image.gif" : "/img/magazines/" . $magazine['Magazine']['id'] . "/thumb_" . $magazineImage[0];
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><img src="<?php echo $src;?>"/></td>
		<td><?php echo $magazine['Magazine']['id']; ?>&nbsp;</td>
		<td><?php echo $magazine['Magazine']['name']; ?>&nbsp;</td>
		<td><?php echo $magazine['Magazine']['description']; ?>&nbsp;</td>
		<td><?php echo $magazine['Magazine']['tags']; ?>&nbsp;</td>
		<td><?php echo $magazine['Magazine']['tags_weibo']; ?>&nbsp;</td>
		<td><?php echo $magazine['Magazine']['season']; ?>&nbsp;</td>
		<td><?php echo $magazine['Magazine']['like_count']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $magazine['Magazine']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $magazine['Magazine']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $magazine['Magazine']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $magazine['Magazine']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
