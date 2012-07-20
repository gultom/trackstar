<?php
$this->breadcrumbs=array(
	'Issues'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Issues', 'url'=>array('index')),
	array('label'=>'Create Issues', 'url'=>array('create')),
	array('label'=>'Update Issues', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Issues', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Issues', 'url'=>array('admin')),
);
?>

<h1>View Issues #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'description',
		'project_id',
		'type_id',
		'status_id',
		'owner_id',
		'requester_id',
		'create_time',
		'create_userid',
		'update_time',
		'update_userid',
	),
)); ?>