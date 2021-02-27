<?php

use yii\db\Migration;
use console\components\CheckTb;
/**
 * Class m210216_143735_test
 */
class m210216_143735_test extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
       if(CheckTb::columnexists('newcol','product_variants'))
        {
            echo "Column already exists";
        }
        else
        {
            $this->addColumn('product_variants', 'newcol', $this->integer());
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210216_143735_test cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210216_143735_test cannot be reverted.\n";

        return false;
    }
    */
}
