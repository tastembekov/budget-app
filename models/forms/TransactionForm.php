<?php

namespace app\models\forms;

use app\models\Transaction;
use Yii;

/**
 * Transaction model save
 */
class TransactionForm
{
    private $_transaction = null;

    public function __construct(Transaction $model)
    {
        $this->_transaction = $model;
    }

    /**
     * Create transaction
     * @return boolean
     */
    public function create()
    {
        $transaction = Yii::$app->db->beginTransaction();
        try {
            $model = $this->getTransaction();
            if ($model->isNewRecord && $model->save() &&
                $model->container->updateTotal($model->amount) // Update container
            ) {
                $transaction->commit();
                return true;
            }
            throw new \Exception('Error');
        } catch (\Exception $e) {
            $transaction->rollBack();
            return false;
        }
    }

    /**
     * Update transaction
     * @return boolean
     */
    public function delete()
    {
        $transaction = Yii::$app->db->beginTransaction();
        try {
            $model = $this->getTransaction();

            if (!$model->isNewRecord &&
                $model->container->updateTotal(-1 * $model->amount) && // reduce by value
                $model->delete()
            ) {
                $transaction->commit();
                return true;
            }
            throw new \Exception('Error');
        } catch (\Exception $e) {
            $transaction->rollBack();
            return false;
        }
    }

    /**
     * Returns container model
     * @return Transaction
     * @throws \Exception
     */
    private function getTransaction()
    {
        if ($this->_transaction == null) {
            throw new \Exception('Transaction not set');
        }
        return $this->_transaction;
    }
}
