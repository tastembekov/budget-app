<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%transaction}}".
 *
 * @property integer $id
 * @property integer $container_id
 * @property string $date
 * @property double $amount
 *
 * @property Container $container
 */
class Transaction extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%transaction}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['container_id', 'date', 'amount'], 'required'],
            [['container_id'], 'integer'],
            [['date'], 'safe'],
            [['amount'], 'number'],
            [['container_id'], 'exist', 'skipOnError' => true, 'targetClass' => Container::className(), 'targetAttribute' => ['container_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'container_id' => Yii::t('app', 'Container ID'),
            'date' => Yii::t('app', 'Date'),
            'amount' => Yii::t('app', 'Amount'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContainer()
    {
        return $this->hasOne(Container::className(), ['id' => 'container_id']);
    }
}
