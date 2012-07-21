<?php
$this->breadcrumbs=array(
	'Issues'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Issues', 'url'=>array('index', 'pid' => $model->project->id)),
	array('label'=>'Create Issues', 'url'=>array('create', 'pid' => $model->project->id)),
	array('label'=>'Update Issues', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Issues', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Issues', 'url'=>array('admin', 'pid' => $model->project_id)),
);
?>

<h1>View Issues #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'description',
        array (
            'name' => 'project_id',
            'value' => $model->project->name,
        ),
		array(
            'name' => 'type_id',
            'value' => $model->getTypeText()
        ),
        array(
            'name' => 'status_id',
            'value' => $model->getStatusText()
        ),
        array (
            'name' => 'owner_id',
            'value' => $model->owner->username,
        ),
        array (
            'name' => 'requester_id',
            'value' => $model->requester->username,
        ),
		'create_time',
		'create_userid',
		'update_time',
		'update_userid',
	),
)); ?>