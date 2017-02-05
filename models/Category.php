<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%category}}".
 *
 * @property integer $id
 * @property string $name
 *
 * @property CategoryLimit[] $categoryLimits
 * @property Transaction[] $transactions
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%category}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryLimits()
    {
        return $this->hasMany(CategoryLimit::className(), ['category_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransactions()
    {
        return $this->hasMany(Transaction::className(), ['category_id' => 'id']);
    }

    /**
     * Update container total
     * @param \DateTime $date
     * @param integer $amount
     * @return boolean
     */
    public function updateTotal(\DateTime $date, $amount)
    {
        /* @var CategoryLimit $limit */
        $limit = $this->getCategoryLimits()->where(['year' => $date->format('Y'), 'month' => $date->format('m')])->one();
        if ($limit !== null) {
            $limit->total = $limit->total + intval($amount);
            return $limit->save();
        }
        return true;
    }
}
