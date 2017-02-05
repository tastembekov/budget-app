<?php

use yii\db\Migration;

/**
 * Handles the creation of table `currency`.
 */
class m170204_193446_create_currency_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('{{%currency}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'code' => $this->string()->notNull(),
            'rate' => $this->float()->notNull()->defaultValue(1),
        ]);

        $this->createIndex('uq_currency_code', '{{%currency}}', 'code', true);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('{{%currency}}');
    }
}
