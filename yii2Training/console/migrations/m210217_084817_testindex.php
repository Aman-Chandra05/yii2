<?php

use yii\db\Migration;
use console\components\CheckTb;

/**
 * Class m210217_084817_testindex
 */
class m210217_084817_testindex extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $fields=['price'];
        if(CheckTb::cc('product_variants',$fields,'id7x'))
        {
            echo "Index exists";
        }
        else
        {
            echo "will be created";
            //$this->createIndex('id7x','product_variants','id,name',true);
        } 
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210217_084817_testindex cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210217_084817_testindex cannot be reverted.\n";

        return false;
    }
    */
}
