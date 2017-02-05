<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CategoryLimit */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Category Limit',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Category Limits'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="category-limit-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
