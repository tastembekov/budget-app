<?php

use yii\db\Migration;

/**
 * Handles the creation of table `container_limit`.
 */
class m170204_200816_create_category_limit_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('{{%category_limit}}', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer()->notNull(),
            'year' => $this->integer()->notNull(),
            'month' => $this->integer()->notNull(),
            'amount' => $this->float()->notNull()->defaultValue(0)
        ]);

        $this->createIndex('uq_category_limit_year_month_container', '{{%category_limit}}',
            ['category_id', 'year', 'month'], true);
        $this->addForeignKey('fk_category_limit_category', '{{%category_limit}}', 'category_id', '{{%category}}', 'id');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('{{%category_limit}}');
    }
}
