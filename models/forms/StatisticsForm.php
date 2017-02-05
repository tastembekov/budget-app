<?php

namespace app\models\forms;

use app\models\CategoryLimit;
use app\models\Transaction;
use Yii;
use yii\base\Model;

/**
 * CategorySearch represents the model behind the search form about `app\models\Category`.
 */
class StatisticsForm extends Model
{
    public $year;
    public $month;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['year', 'month'], 'required'],
            ['month', 'integer', 'min' => 1, 'max' => 12],
            ['year', 'integer', 'min' => 2016, 'max' => 2100],
        ];
    }

    public function attributeLabels()
    {
        return [
            'year' => Yii::t('app', 'Year'),
            'month' => Yii::t('app', 'Month'),
        ];
    }

    public function getCurrentTransactions() {
        return self::getTransactions($this->year, $this->month);
    }

    public function getCurrentLimits() {
        return self::getLimits($this->year, $this->month);
    }

    public function getPrevTransactions(){
        $date = new \DateTime();
        $date->setDate($this->year, $this->month, 1);
        $date->modify("-1 month");
        return self::getTransactions($date->format('Y'), $date->format('m'));
    }

    public function getPrevLimits() {
        $date = new \DateTime();
        $date->setDate($this->year, $this->month, 1);
        $date->modify("-1 month");
        return self::getLimits($date->format('Y'), $date->format('m'));
    }

    public function getNextTransactions(){
        $date = new \DateTime();
        $date->setDate($this->year, $this->month, 1);
        $date->modify("+1 month");
        return self::getTransactions($date->format('Y'), $date->format('m'));
    }

    public function getNextLimits() {
        $date = new \DateTime();
        $date->setDate($this->year, $this->month, 1);
        $date->modify("+1 month");
        return self::getLimits($date->format('Y'), $date->format('m'));
    }

    private static function getLimits($year, $month) {
        return CategoryLimit::find()
            ->where(['year' => $year, 'month' => $month])
            ->groupBy('category_id')
            ->indexBy('category_id')
            ->all();
    }

    private static function getTransactions($year, $month) {
        $selected_date = new \DateTime();
        $selected_date->setDate($year, $month, 1);
        return Transaction::find()
            ->select(['category_id', 'sum(amount) as amount'])
            ->where(':month_start <= date AND date <= :month_end', [
                ':month_start' => $selected_date->format('Y-m-d H:i:s'),
                ':month_end' => $selected_date->modify('+1 month')->format('Y-m-d H:i:s'),
            ])
            ->groupBy('category_id')
            ->indexBy('category_id')
            ->all();
    }
}
