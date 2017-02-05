<?php

use app\models\Transaction;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\TransactionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Transactions');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transaction-index">

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Transaction'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'format' => 'html',
                'attribute' => 'date',
                'value' => function (Transaction $model) {
                    return Html::a(Yii::$app->formatter->asDate($model->date), Url::to(['view', 'id' => $model->id]));
                }
            ],
            [
                'attribute' => 'amount',
                'format' => ['decimal', 0],
            ],
            'container.currency.code',
            'container.name',
            'category.name',
            'description',
        ],
    ]); ?>
</div>
