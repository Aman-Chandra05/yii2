<?php

use yii\db\Migration;
use console\components\CheckTb;
/**
 * Class m210216_143229_index
 */
class m210216_143229_index extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createIndex('idx','product_variants','id,name',true);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210216_143229_index cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210216_143229_index cannot be reverted.\n";

        return false;
    }
    */
}
