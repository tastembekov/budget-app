<?php

use app\models\Container;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\TransactionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="transaction-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="col-sm-4">
            <?= $form->field($model, 'container_id')->dropDownList(ArrayHelper::map(Container::find()->all(), 'id', 'name'), [
                    'prompt' => Yii::t('app', 'Select container')
            ]) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'date') ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'amount') ?>
        </div>
    </div>

    <div class="form-group pull-right">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
