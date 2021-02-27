<?php

use yii\db\Migration;
use console\components\CheckTb;
/**
 * Class m210216_083055_check
 */
class m210216_083055_check extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        CheckTb::cc('product_variants','price');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210216_083055_check cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210216_083055_check cannot be reverted.\n";

        return false;
    }
    */
}
