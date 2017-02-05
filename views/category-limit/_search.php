<?php

use app\models\Category;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\CategoryLimitSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-limit-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="col-sm-4">
            <?= $form->field($model, 'category_id')->dropDownList(ArrayHelper::map(Category::find()->all(), 'id', 'name'), [
                'prompt' => Yii::t('app', 'Select category')
            ]) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'year') ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'month') ?>
        </div>
    </div>

    <div class="form-group pull-right">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
