<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%container}}".
 *
 * @property integer $id
 * @property string $name
 * @property integer $currency_id
 * @property double $total
 *
 * @property Currency $currency
 * @property Transaction[] $transactions
 */
class Container extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%container}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'currency_id'], 'required'],
            [['currency_id'], 'integer'],
            [['total'], 'number'],
            ['total', 'default', 'value' => 0],
            [['name'], 'string', 'max' => 255],
            [['currency_id'], 'exist', 'skipOnError' => true, 'targetClass' => Currency::className(), 'targetAttribute' => ['currency_id' => 'id']],
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
            'currency_id' => Yii::t('app', 'Currency ID'),
            'total' => Yii::t('app', 'Total'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCurrency()
    {
        return $this->hasOne(Currency::className(), ['id' => 'currency_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransactions()
    {
        return $this->hasMany(Transaction::className(), ['container_id' => 'id']);
    }

    /**
     * Update container total
     * @param integer $amount
     * @return boolean
     */
    public function updateTotal($amount) {
         $this->total = $this->total + intval($amount);
         return $this->save();
    }
}
