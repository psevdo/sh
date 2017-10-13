<?php

use yii\db\Migration;

/**
 * Handles the creation of table `gift`.
 */
class m171009_123010_create_gift_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('gift', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('gift');
    }
}
