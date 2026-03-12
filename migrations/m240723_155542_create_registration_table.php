<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%registration}}`.
 */
class m240723_155542_create_registration_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%registration}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'course_id' => $this->integer()->notNull(),
            'registered_at' => $this->integer()->notNull(),
        ]);

        // Create indexes
        $this->createIndex(
            'idx-registration-user_id',
            '{{%registration}}',
            'user_id'
        );

        $this->createIndex(
            'idx-registration-course_id',
            '{{%registration}}',
            'course_id'
        );

        // Add foreign keys
        $this->addForeignKey(
            'fk-registration-user_id',
            '{{%registration}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-registration-course_id',
            '{{%registration}}',
            'course_id',
            '{{%course}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%registration}}');
    }
}
