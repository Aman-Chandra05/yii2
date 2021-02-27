<?php

use yii\db\Migration;
use console\components\CheckTb;
/**
 * Class m210217_060439_altcoltype
 */
class m210217_060439_altcoltype extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        //echo "aman";
        if(CheckTb::columnexists('newcol','product_variants'))
        {
            if(CheckTb::colwithtype('newcol','bigint','product_variants'))
            {
                echo "Column have same datatype";
                
            }
            else 
            {
                $this->alterColumn('product_variants','newcol','bigint');
            }
        }
        else
        {
            echo "Column doesnot exist";
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210217_060439_altcoltype cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210217_060439_altcoltype cannot be reverted.\n";

        return false;
    }
    */
}
