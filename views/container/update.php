<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Container */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Container',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Containers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="container-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
