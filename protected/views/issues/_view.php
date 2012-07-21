<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->name), array('issues/view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type_id')); ?>:</b>
	<?php echo CHtml::encode($data->getTypeText()); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status_id')); ?>:</b>
	<?php echo CHtml::encode($data->getStatusText()); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('requester_id')); ?>:</b>
	<?php echo CHtml::encode($data->requester_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_time')); ?>:</b>
	<?php echo CHtml::encode($data->create_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_userid')); ?>:</b>
	<?php echo CHtml::encode($data->create_userid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update_time')); ?>:</b>
	<?php echo CHtml::encode($data->update_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update_userid')); ?>:</b>
	<?php echo CHtml::encode($data->update_userid); ?>
	<br />

	*/ ?>

</div>