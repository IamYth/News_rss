<?php

use yii\db\Migration;

/**
 * Handles adding logo to table `source`.
 */
class m170107_110623_add_logo_column_to_source_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('source', 'logo', $this->integer());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('source', 'logo');
    }
}
