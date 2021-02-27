<?php

use yii\db\Migration;
use console\components\CheckTb;
/**
 * Class m210216_133844_addcolumn
 */
class m210216_133844_addcolumn extends Migration
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
        if(CheckTb::columnexists('newcol','product_variants'))
        {
            $this->dropColumn('product_variants', 'newcol');
        }
        else
        {
            echo "Column does not exists";
        }
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210216_133844_addcolumn cannot be reverted.\n";

        return false;
    }
    */
}
