<?php

use yii\db\Migration;
use console\components\CheckTb;
/**
 * Handles the creation of table `{{%register}}`.
 */
class m210220_094125_create_register_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function init()
    {
        $this->db = 'db2';
        parent::init();
    }
    public function safeUp()
    {
        $this->init();
        if(CheckTb::tableexists('{{%register}}'))
        {
            $this->createTable('{{%register}}', [
            'id' => $this->PrimaryKey(),
            'name'=>$this->string()->notNull(),
            'mobile'=>$this->string()->unique(),
            'email'=>$this->text(),
            'image'=>$this->text(),
            'dob'=>$this->date(),
            'password'=>$this->text()
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
        if(CheckTb::tableexists('{{%register}}')){
            echo "Table does not Exists";
        }
        else{
            $this->dropTable('{{%register}}');  
        }
    }
}
