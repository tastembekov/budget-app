<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%category_limit}}".
 *
 * @property integer $id
 * @property integer $category_id
 * @property integer $year
 * @property integer $month
 * @property double $amount
 *
 * @property Category $category
 */
class CategoryLimit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%category_limit}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'year', 'month'], 'required'],
            [['category_id', 'year', 'month'], 'integer'],
            [['amount'], 'number'],
            [['category_id', 'year', 'month'], 'unique', 'targetAttribute' => ['category_id', 'year', 'month'], 'message' => 'The combination of Category ID, Year and Month has already been taken.'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'category_id' => Yii::t('app', 'Category ID'),
            'year' => Yii::t('app', 'Year'),
            'month' => Yii::t('app', 'Month'),
            'amount' => Yii::t('app', 'Amount'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
}
