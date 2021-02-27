<?php

use yii\db\Migration;
use console\components\CheckTb;

/**
 * Handles the creation of table `{{%csv}}`.
 */
class m210223_102647_create_csv_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        if(CheckTb::tableexists('{{%csv}}'))
        {
            $this->createTable('{{%csv}}', [
            'id' => $this->PrimaryKey(),
            'name' => $this->string()->notNull(),
            'email' => $this->string(),
            ]);
        }
        else{
            echo "Table already Exists";
        } 
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%csv}}');
    }
}
