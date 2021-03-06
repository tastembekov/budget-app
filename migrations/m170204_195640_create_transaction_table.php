<?php

use yii\db\Migration;

/**
 * Handles the creation of table `transaction`.
 */
class m170204_195640_create_transaction_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('{{%transaction}}', [
            'id' => $this->primaryKey(),
            'container_id' => $this->integer()->notNull(),
            'category_id' => $this->integer()->notNull(),
            'date' => $this->date()->notNull(),
            'amount' => $this->float()->notNull(),
            'description' => $this->text(),
        ]);

        $this->addForeignKey('fk_transaction_container', '{{%transaction}}', 'container_id', '{{%container}}', 'id');
        $this->addForeignKey('fk_transaction_category', '{{%transaction}}', 'category_id', '{{%category}}', 'id');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_transaction_category', '{{%transaction}}');
        $this->dropForeignKey('fk_transaction_container', '{{%transaction}}');
        $this->dropTable('{{%transaction}}');
    }
}
