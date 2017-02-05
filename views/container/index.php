<?php

use app\models\Container;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ContainerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $total string */
/* @var $total_limit string */

$this->title = Yii::t('app', 'Containers');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-index">

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Container'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'showFooter' => true,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'currency.code',
            [
                'attribute' => 'total',
                'value' => function (Container $model) {
                    return $model->total . ' ' . $model->currency->code;
                },
            ],
            [
                'label' => Yii::t('app', 'Total ' . getenv('APP_MAIN_CURRENCY')),
                'value' => function (Container $model) {
                    return (new \app\models\ContainerView($model))->getTotalOnMainCurrency();
                },
                'format' => ['decimal', 0],
                'footer' => $total
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'footer' => $total_limit
            ],
        ],
    ]); ?>
</div>
