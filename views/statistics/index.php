<?php

/* @var $this yii\web\View */
/* @var $model \app\models\forms\StatisticsForm */
/* @var $categories \app\models\Category[] */
/* @var $transactions \app\models\Transaction[] */
/* @var $limits \app\models\CategoryLimit[] */
/* @var $transactionsPrev \app\models\Transaction[] */
/* @var $limitsPrev \app\models\CategoryLimit[] */
/* @var $transactionsNext \app\models\Transaction[] */
/* @var $limitsNext \app\models\CategoryLimit[] */

$this->title = Yii::t('app', 'Statistics');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="statistics-index">

    <table class="table table-bordered table-hover dataTable" role="grid">
        <thead>
        <tr>
            <th><?= Yii::t('app', 'Category') ?></th>
            <th><?= Yii::t('app', 'Amount') ?></th>
            <th><?= Yii::t('app', 'Limit') ?></th>
            <th><?= Yii::t('app', 'Amount') ?></th>
            <th><?= Yii::t('app', 'Limit') ?></th>
            <th><?= Yii::t('app', 'Amount') ?></th>
            <th><?= Yii::t('app', 'Limit') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($categories as $index => $category): ?>
            <tr>
                <td><?= $category->name ?></td>
                <td><?= isset($transactionsPrev[$category->id]) ? $transactionsPrev[$category->id]->amount : 0 ?></td>
                <td><?= isset($limitsPrev[$category->id]) ? $limitsPrev[$category->id]->amount : 0 ?></td>
                <td style="background-color: #EEE"><?= isset($transactions[$category->id]) ? $transactions[$category->id]->amount : 0 ?></td>
                <td style="background-color: #EEE"><?= isset($limits[$category->id]) ? $limits[$category->id]->amount : 0 ?></td>
                <td><?= isset($transactionsNext[$category->id]) ? $transactionsNext[$category->id]->amount : 0 ?></td>
                <td><?= isset($limitsNext[$category->id]) ? $limitsNext[$category->id]->amount : 0 ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
