<?php

use yii\db\Migration;
use console\components\CheckTb;
/**
 * Handles the creation of table `{{%products}}`.
 */
class m210216_075326_create_products_table extends Migration
{
    /**
     * {@inheritdoc}
     */

    public function safeUp()
    {
        if(CheckTb::tableexists('{{%products}}'))
        {
            $this->createTable('{{%products}}', [
            'id' => $this->bigPrimaryKey(),
            'name'=>$this->string()->notNull(),
            'product-handle'=>$this->string()->unique(),
            'image'=>$this->text(),
            'price'=>$this->money(),
            'inventory'=>$this->integer(),
            'created_at'=>$this->dateTime(),
            'updated_at'=>$this->timestamp(),
            'status'=>$this->boolean()
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
        if(CheckTb::tableexists('{{%products}}')){
            echo "Table does not Exists";
        }
        else{
            $this->dropTable('{{%products}}');  
        }
    }
}
