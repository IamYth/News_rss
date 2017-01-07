<?php

use yii\db\Migration;

/**
 * Handles the creation of table `source`.
 */
class m170107_104439_create_source_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('source', [
            'id' => $this->primaryKey(),
            'link' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('source');
    }
}
