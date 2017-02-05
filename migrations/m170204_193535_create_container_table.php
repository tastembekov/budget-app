<?php

use yii\db\Migration;

/**
 * Handles the creation of table `container`.
 */
class m170204_193535_create_container_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('{{%container}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'currency_id' => $this->integer()->notNull(),
            'total' => $this->float()->notNull()->defaultValue(0),
        ]);

        $this->addForeignKey('fk_container_currency', '{{%container}}', 'currency_id', '{{%currency}}', 'id');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('{{%container}}');
    }
}
