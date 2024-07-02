<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%employee}}`.
 */
class m240627_222036_create_employee_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%employee}}', [
          'id'               => $this->primaryKey(),
          'name'             => $this->string(255)->notNull(),
          'email'            => $this->string(255)->unique()->notNull()->comment('Email пользователя. Уникален.'),
          'attestation_date' => $this->date()->comment('Дата аттестации'),
        ]);

        $this->addCommentOnTable('{{%employee}}', 'Таблица для хранения сотрудников');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%employee}}');
    }
}
