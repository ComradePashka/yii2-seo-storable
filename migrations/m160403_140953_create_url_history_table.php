<?php

use yii\db\Migration;

class m160403_140953_create_url_history_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%url_history_table}}', [
            'entity_name' => Schema::TYPE_STRING . ' NOT NULL',
            'entity_pk' => Schema::TYPE_STRING . ' NOT NULL',
            'old_url' => Schema::TYPE_STRING . ' NOT NULL',
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%url_history_table}}');
    }
}
