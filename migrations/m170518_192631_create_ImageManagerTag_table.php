<?php

use yii\db\Migration;

/**
 * Handles the creation of table `ImageManagerTag`.
 */
class m170518_192631_create_ImageManagerTag_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('ImageManagerTag', [
            'id' => $this->primaryKey(10)->unsigned(),
            'name' => $this->string(500)->notNull(),
            'createdBy' => $this->integer(10)->unsigned()->null()->defaultValue(null),
            'modifiedBy' => $this->integer(10)->unsigned()->null()->defaultValue(null),
            'created' => $this->dateTime()->notNull(),
            'modified' => $this->dateTime()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('ImageManagerTag');
    }
}
