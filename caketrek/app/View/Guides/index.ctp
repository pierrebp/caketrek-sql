<div class="guides index">
	<h2><?php echo __('Guides'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('languages'); ?></th>
			<th><?php echo $this->Paginator->sort('trek_number'); ?></th>
			<th><?php echo $this->Paginator->sort('qualification'); ?></th>
			<th><?php echo $this->Paginator->sort('tourist_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($guides as $guide): ?>
	<tr>
		<td><?php echo h($guide['Guide']['id']); ?>&nbsp;</td>
		<td><?php echo h($guide['Guide']['languages']); ?>&nbsp;</td>
		<td><?php echo h($guide['Guide']['trek_number']); ?>&nbsp;</td>
		<td><?php echo h($guide['Guide']['qualification']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($guide['Tourist']['id'], array('controller' => 'tourists', 'action' => 'view', $guide['Tourist']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $guide['Guide']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $guide['Guide']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $guide['Guide']['id']), null, __('Are you sure you want to delete # %s?', $guide['Guide']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Guide'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Tourists'), array('controller' => 'tourists', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tourist'), array('controller' => 'tourists', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tracks'), array('controller' => 'tracks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Track'), array('controller' => 'tracks', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Votes'), array('controller' => 'votes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Vote'), array('controller' => 'votes', 'action' => 'add')); ?> </li>
	</ul>
</div>
