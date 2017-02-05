<?php

namespace app\controllers;

use app\models\Category;
use app\models\forms\StatisticsForm;
use Yii;
use yii\web\Controller;

/**
 * CategoryController implements the CRUD actions for Category model.
 */
class StatisticsController extends Controller
{
    /**
     * Lists all statistics.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new StatisticsForm();
        $model->year = date('Y');
        $model->month = date('m');
        $transactions = $model->getCurrentTransactions();
        $limits = $model->getCurrentLimits();
        $transactionsPrev = $model->getPrevTransactions();
        $limitsPrev = $model->getPrevLimits();
        $transactionsNext = $model->getNextTransactions();
        $limitsNext = $model->getNextLimits();

        $categories = Category::find()->all();

        return $this->render('index', [
            'model' => $model,
            'transactions' => $transactions,
            'categories' => $categories,
            'limits' => $limits,
            'transactionsPrev' => $transactionsPrev,
            'limitsPrev' => $limitsPrev,
            'transactionsNext' => $transactionsNext,
            'limitsNext' => $limitsNext,
        ]);
    }
}
