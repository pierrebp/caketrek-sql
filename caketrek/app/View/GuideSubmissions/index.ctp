<div class="guideSubmissions index">
	<h2><?php echo __('Guide Submissions'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('tourist_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($guideSubmissions as $guideSubmission): ?>
	<tr>
		<td><?php echo h($guideSubmission['GuideSubmission']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($guideSubmission['Tourist']['id'], array('controller' => 'tourists', 'action' => 'view', $guideSubmission['Tourist']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $guideSubmission['GuideSubmission']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $guideSubmission['GuideSubmission']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $guideSubmission['GuideSubmission']['id']), null, __('Are you sure you want to delete # %s?', $guideSubmission['GuideSubmission']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Guide Submission'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Tourists'), array('controller' => 'tourists', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tourist'), array('controller' => 'tourists', 'action' => 'add')); ?> </li>
	</ul>
</div>
