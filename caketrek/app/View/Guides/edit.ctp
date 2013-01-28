<div class="guides form">
<?php echo $this->Form->create('Guide'); ?>
	<fieldset>
		<legend><?php echo __('Edit Guide'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('languages');
		echo $this->Form->input('trek_number');
		echo $this->Form->input('qualification');
		echo $this->Form->input('tourist_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Guide.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Guide.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Guides'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Tourists'), array('controller' => 'tourists', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tourist'), array('controller' => 'tourists', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tracks'), array('controller' => 'tracks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Track'), array('controller' => 'tracks', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Votes'), array('controller' => 'votes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Vote'), array('controller' => 'votes', 'action' => 'add')); ?> </li>
	</ul>
</div>
