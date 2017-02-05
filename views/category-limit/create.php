<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CategoryLimit */

$this->title = Yii::t('app', 'Create Category Limit');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Category Limits'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-limit-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
