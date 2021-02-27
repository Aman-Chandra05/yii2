<?php

use yii\db\Migration;
use console\components\CheckTb;
/**
 * Handles the creation of table `{{%product_variants}}`.
 */
class m210216_104435_create_product_variants_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        if(CheckTb::tableexists('{{%product_variants}}'))
        {
            $this->createTable('{{%product_variants}}', [
            'id' => $this->bigPrimaryKey(),
            'product_id' =>$this->bigInteger()->notNull(),
            'name' => $this->string()->notNull(),
            'price' => $this->money(),
            'inventory' => $this->integer(),
            'created_at'=>$this->dateTime(),
            'updated_at'=>$this->timestamp(),
            'status'=>$this->boolean()
            ]);

            $this->addForeignkey('fk-productvariants-product_id','product_variants','product_id','products','id','CASCADE','CASCADE');  
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
       if(CheckTb::tableexists('{{%product_variants}}')){
            echo "Table does not Exists";
        }
        else{
            
            $this->dropTable('{{%product_variants}}');  
        }
    }
}
